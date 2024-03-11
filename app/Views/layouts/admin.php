<!DOCTYPE html>
<html class="scroller" lang="ru">
<head>
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1.0" name="viewport">
	<title><?= $page->title ?? 'Admin Panel' ?></title>
	<meta name="description" content="sFlight - CMS based on CI4 | Admin Panel">
	<meta name="robots" content="noindex, nofollow">
	<base href="<?= base_url() ?>">
	<!-- Favicon -->
	<link rel="icon" href="<?= TEMPLATE ?>admin/img/icons/icon-48x48.png">
	<!-- Google Fonts -->
<!--	<link rel="preconnect" href="https://fonts.gstatic.com">-->
	<?= $this->include('admin/partials/_styles') ?>
</head>
<body>
	<div class="wrapper">
		<?= $this->include('admin/partials/sidebar') ?>
		<div class="main">
			<?= $this->include('admin/partials/nav') ?>
			<?= $this->renderSection('content') ?>
			<?= $this->include('admin/partials/footer') ?>
		</div>
	</div>
	<?= $this->include('admin/partials/_scripts') ?>
</body>
</html>
