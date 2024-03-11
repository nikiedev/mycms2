<!DOCTYPE html>
<html class="scroller" lang="ru">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title><?= $page->title ?? 'sFlight' ?></title>
	<meta name="description" content="">
	<base href="<?= base_url() ?>">
	<!-- Favicons -->
	<link rel="icon" href="<?= TEMPLATE ?>img/favicon.png">
	<link rel="apple-touch-icon" href="<?= TEMPLATE ?>img/apple-touch-icon.png">
	<!-- Google Fonts -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i">
	<!-- ======= CSS Styles ======= -->
	<?= $this->include('partials/_styles') ?>
</head>

<body>
	<div id="overlay-wrapper">
	
	<!-- ======= Top Bar ======= -->
	<?= $this->include('partials/top') ?>
	
	<!-- ======= Header ======= -->
	<?= $this->include('partials/header') ?>
	
	<!-- ======= Main ======= -->
	<?= $this->renderSection('content') ?>
	
	<!-- ======= Footer ======= -->
	<?= $this->include('partials/footer') ?>
	
	<!-- ======= Bottom ======= -->
	<?= $this->include('partials/bottom') ?>
	
	<!-- ======= JS Scripts ======= -->
	<?= $this->include('partials/_scripts') ?>
	
	</div>
</body>
</html>
