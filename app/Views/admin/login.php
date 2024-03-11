<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
	      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<meta name="robots" content="nofollow,noindex">
	<link rel="icon" type="image/ico" href="<?= TEMPLATE ?>admin/img/favicon.ico">
	<title>Админка</title>
	<link rel="stylesheet" href="<?= TEMPLATE ?>admin/css/login.css">
</head>
<body class="rain">

<!--<div id="falling-leaves"></div>-->
<?php if (isset($error)) : ?>
<div class="alert-danger">
    <?= $error ?>
</div>
<?php endif; ?>
<div class="login-page">
	<div class="form">
		<h1>Админка</h1>
		<form class="login-form" action="" method="post">
			<input name="login" type="text" placeholder="Логин" required>
			<input name="password" type="password" placeholder="Пароль"
			       required>
			<button>Вход</button>
		</form>
	</div>
</div>
<div class="links">
	<a href="/">Домой</a>
</div>

<!--<script src="--><?//= TEMPLATE ?><!--admin/js/TweenMax.min.js"></script>-->
<!--<script src="--><?//= TEMPLATE ?><!--admin/js/leaves.js"></script>-->


<!--<audio class="" src="/media/audio/rain-and-thunder-crash.wav" id="audio" muted autoplay loop></audio>-->
<!--<button id="unmuteButton">-</button>-->
<script src="<?= TEMPLATE ?>admin/js/three.min.js"></script>
<script src="<?= TEMPLATE ?>admin/js/rain.js"></script>


</body>
</html>
