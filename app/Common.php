<?php

/**
 * The goal of this file is to allow developers a location
 * where they can overwrite core procedural functions and
 * replace them with their own. This file is loaded during
 * the bootstrap process and is called during the frameworks
 * execution.
 *
 * This can be looked at as a `master helper` file that is
 * loaded early on, and may also contain additional functions
 * that you'd like to use throughout your entire application
 *
 * @link: https://codeigniter4.github.io/CodeIgniter4/
 */

/*if (!function_exists('view'))
{
	function view($tpl, $data = []) {
		
		//$appPaths = new \Config\Paths();
		//$appViewPaths = $appPaths->viewDirectory;
		//https://stackoverflow.com/questions/63174050/integrate-twig-with-codeigniter-4
		
		$loader = new \Twig\Loader\FilesystemLoader([ROOTPATH . 'modules', APPPATH . 'Views']);
		$loader->addPath(ROOTPATH . 'modules', 'modules');
//		$loader->setPaths([ROOTPATH . 'modules', APPPATH . 'Views']);
		//composer require symfony/yaml
		$twig = new \Twig\Environment($loader, [
//			'debug' => true,
			'auto_reload' => true,
			'cache' => WRITEPATH.'/cache/twig'
		]);
		
		if (!stripos($tpl, '.html.twig')) {
			$tpl = $tpl . '.html.twig';
		}
		
		$moduleIncludeFunction = new Twig\TwigFunction('Module', function ($name, $view) {
			return \App\Libraries\Module::load($name, $view);
		});
		
		$twig->addFunction($moduleIncludeFunction);
//		$twig->addGlobal('module', new App\Libraries\Module());
		
		return $twig->render($tpl, $data);
	}
}

if (!function_exists('viewBlock'))
{
	function viewBlock($tpl, $block, $data = []) {
		
		$loader = new \Twig\Loader\FilesystemLoader([ROOTPATH . 'modules', APPPATH . 'Views']);
		$loader->addPath(ROOTPATH . 'modules', 'modules');

		$twig = new \Twig\Environment($loader, [
			'auto_reload' => true,
			'cache' => WRITEPATH.'/cache/twig'
		]);
		
		if (!stripos($tpl, '.html.twig')) {
			$tpl = $tpl . '.html.twig';
		}
		
		
		
		$moduleIncludeFunction = new Twig\TwigFunction('Module', function ($name, $view) {
			return \App\Libraries\Module::getData($name, $view);
		});
		
		$twig->addFunction($moduleIncludeFunction);
		$template = $twig->load($tpl);
		return $template->renderBlock($block, $data);
	}
}
*/