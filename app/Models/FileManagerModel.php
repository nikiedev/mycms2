<?php

namespace App\Models;

use CodeIgniter\Model;

class FileManagerModel extends Model
{
	// Set to false to disable delete button and delete POST request.
	public $allow_delete = true;
	// Set to true to allow upload files
	public $allow_upload = true;
	// Set to false to disable folder creation
	public $allow_create_folder = true;
	// Set to false to only allow downloads and not direct link
	public $allow_direct_link = true;
	// Set to false to hide all subdirectories
	public $allow_show_folders = true;

	public $disallowed_patterns = ['*.php', '*.phtml', '*.html'];  // must be an array.  Matching files not allowed to be uploaded
	public $hidden_patterns = ['*.php','.*']; // Matching files hidden in directory index
	
	public $MAX_UPLOAD_SIZE = 0;
	
	public $tmp_dir = MEDIA;
	
	public function getFullPath($file)
	{
		if(DIRECTORY_SEPARATOR==='\\') {
			$this->tmp_dir = str_replace('/',DIRECTORY_SEPARATOR,$this->tmp_dir);
		}
		return $this->get_absolute_path($this->tmp_dir . '/' .$file);
	}
	
	public function makeAction($file)
	{
		if ($_GET['do'] == 'list') {
			if (is_dir($file)) {
				$directory = $file;
				$result = [];
				$files = array_diff(scandir($directory), ['.', '..']);
				foreach ($files as $entry) if (!$this->is_entry_ignored($entry, $this->allow_show_folders, $this->hidden_patterns)) {
					$i = $directory . '/' . $entry;
					$stat = stat($i);
					$result[] = [
						'mtime' => $stat['mtime'],
						'size' => $stat['size'],
						'name' => basename($i),
						'path' => preg_replace('@^\./@', '', $i),
						'is_dir' => is_dir($i),
						'is_deleteable' => $this->allow_delete && ((!is_dir($i) && is_writable($directory)) ||
								(is_dir($i) && is_writable($directory) && $this->is_recursively_deleteable($i))),
						'is_readable' => is_readable($i),
						'is_writable' => is_writable($i),
						'is_executable' => is_executable($i),
					];
				}
				usort($result, function ($f1, $f2) {
					$f1_key = ($f1['is_dir'] ?: 2) . $f1['name'];
					$f2_key = ($f2['is_dir'] ?: 2) . $f2['name'];
					return $f1_key > $f2_key;
				});
			} else {
				$this->err(412, "Not a Directory");
			}
			echo json_encode(['success' => true, 'is_writable' => is_writable($file), 'results' => $result]);
			
		} elseif ($_POST['do'] == 'delete') {
			if ($this->allow_delete) {
				$this->rmrf($file);
			}
			exit;
		} elseif ($_POST['do'] == 'mkdir' && $this->allow_create_folder) {
			// don't allow actions outside root. we also filter out slashes to catch args like './../outside'
			$dir = $_POST['name'];
			$dir = str_replace('/', '', $dir);
			if (substr($dir, 0, 2) === '..')
				exit;
			chdir($file);
			@mkdir($_POST['name']);
			exit;
		} elseif ($_POST['do'] == 'upload' && $this->allow_upload) {
			foreach ($this->disallowed_patterns as $pattern)
				if (fnmatch($pattern, $_FILES['file_data']['name']))
					$this->err(403, "Files of this type are not allowed.");
			
			move_uploaded_file($_FILES['file_data']['tmp_name'], $file . '/' . $_FILES['file_data']['name']);
			exit;
		} elseif ($_GET['do'] == 'download') {
			foreach ($this->disallowed_patterns as $pattern)
				if (fnmatch($pattern, $file))
					$this->err(403, "Files of this type are not allowed.");
			
			$filename = basename($file);
			$finfo = finfo_open(FILEINFO_MIME_TYPE);
			header('Content-Type: ' . finfo_file($finfo, $file));
			header('Content-Length: ' . filesize($file));
			header(sprintf('Content-Disposition: attachment; filename=%s',
				strpos('MSIE', $_SERVER['HTTP_REFERER']) ? rawurlencode($filename) : "\"$filename\""));
			ob_flush();
			readfile($file);
			exit;
		}
		
	}
	
	
	private function is_entry_ignored($entry, $allow_show_folders, $hidden_patterns)
	{
		if ($entry === basename(__FILE__)) {
			return true;
		}
		
		if (is_dir($entry) && !$allow_show_folders) {
			return true;
		}
		foreach ($hidden_patterns as $pattern) {
			if (fnmatch($pattern, $entry)) {
				return true;
			}
		}
		return false;
	}
	
	private function rmrf($dir)
	{
		if (is_dir($dir)) {
			$files = array_diff(scandir($dir), ['.', '..']);
			foreach ($files as $file)
				$this->rmrf("$dir/$file");
			$this->rmdir($dir);
		} else {
			unlink($dir);
		}
	}
	
	private function is_recursively_deleteable($d)
	{
		$stack = [$d];
		while ($dir = array_pop($stack)) {
			if (!is_readable($dir) || !is_writable($dir))
				return false;
			$files = array_diff(scandir($dir), ['.', '..']);
			foreach ($files as $file) if (is_dir($file)) {
				$stack[] = "$dir/$file";
			}
		}
		return true;
	}

	// from: http://php.net/manual/en/function.realpath.php#84012
	private function get_absolute_path($path)
	{
		$path = str_replace(['/', '\\'], DIRECTORY_SEPARATOR, $path);
		$parts = explode(DIRECTORY_SEPARATOR, $path);
		$absolutes = [];
		foreach ($parts as $part) {
			if ('.' == $part) continue;
			if ('..' == $part) {
				array_pop($absolutes);
			} else {
				$absolutes[] = $part;
			}
		}
		return implode(DIRECTORY_SEPARATOR, $absolutes);
	}
	
	private function err($code, $msg)
	{
		http_response_code($code);
		header("Content-Type: application/json");
		echo json_encode(['error' => ['code' => intval($code), 'msg' => $msg]]);
		exit;
	}
	
	private function asBytes($ini_v)
	{
		$ini_v = trim($ini_v);
		$s = ['g' => 1 << 30, 'm' => 1 << 20, 'k' => 1 << 10];
		return intval($ini_v) * ($s[strtolower(substr($ini_v, -1))] ?: 1);
	}
	
	public function checkXSRF($tmp, $file)
	{
		if($tmp === false)
			$this->err(404,'File or Directory Not Found');
		if(substr($tmp, 0,strlen($this->tmp_dir)) !== $this->tmp_dir)
			$this->err(403,"Forbidden");
		if(strpos($file, DIRECTORY_SEPARATOR) === 0)
			$this->err(403,"Forbidden");
		if(preg_match('@^.+://@',$file)) {
			$this->err(403,"Forbidden");
		}
		
		
		if(!$_COOKIE['_sfm_xsrf'])
			setcookie('_sfm_xsrf',bin2hex(openssl_random_pseudo_bytes(16)));
		if($_POST) {
			if($_COOKIE['_sfm_xsrf'] !== $_POST['xsrf'] || !$_POST['xsrf'])
				$this->err(403,"XSRF Failure");
		}
		
		
	}
	
	public function setMaxUploadFile()
	{
		$this->MAX_UPLOAD_SIZE = min($this->asBytes(ini_get('post_max_size')), $this->asBytes(ini_get('upload_max_filesize')));
	}
	
	public function setLocaleUTF8()
	{
		// must be in UTF-8 or `basename` doesn't work
		setlocale(LC_ALL,'en_US.UTF-8');
	}
	
	// rewrite
	
	public function getList($file)
	{
		$file = MEDIA;
		if (is_dir($file)) {
			$directory = $file;
			$result = [];
			$files = array_diff(scandir($directory), ['.', '..']);
			foreach ($files as $entry) if (!$this->is_entry_ignored($entry, $this->allow_show_folders, $this->hidden_patterns)) {
				$i = $directory . '/' . $entry;
				$stat = stat($i);
				$result[] = [
					'mtime' => $stat['mtime'],
					'size' => $stat['size'],
					'name' => basename($i),
					'path' => preg_replace('@^\./@', '', $i),
					'is_dir' => is_dir($i),
					'is_deleteable' => $this->allow_delete && ((!is_dir($i) && is_writable($directory)) ||
							(is_dir($i) && is_writable($directory) && $this->is_recursively_deleteable($i))),
					'is_readable' => is_readable($i),
					'is_writable' => is_writable($i),
					'is_executable' => is_executable($i),
				];
			}
			usort($result, function ($f1, $f2) {
				$f1_key = ($f1['is_dir'] ?: 2) . $f1['name'];
				$f2_key = ($f2['is_dir'] ?: 2) . $f2['name'];
				return $f1_key > $f2_key;
			});
		} else {
			$this->err(412, "Not a Directory");
		}
		echo json_encode(['success' => true, 'is_writable' => is_writable($file), 'results' => $result]);
	}
	
}