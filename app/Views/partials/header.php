<header id="header" class="d-flex align-items-center">
	<div class="container d-flex align-items-center justify-content-between">

		<div class="logo"><a href="/"><span>ADVANT</span> Travel</a></div>
		<!-- Uncomment below if you prefer to use an image logo -->
		<!-- <a href="/" class="logo"><img src="assets/img/logo.png" alt=""></a>-->

		<nav id="navbar" class="navbar">
			<ul>
				<?php if (isset($menu)): ?>
				<?php foreach ($menu as $item): ?>
					<li><a class="nav-link scrollto<?= $item->basename == uri_string() ? ' active' : '' ?>" href="<?= $item->url ?>"><?= $item->name ?></a></li>
				<?php endforeach; ?>
				<?php endif; ?>
<!--				<li><a class="nav-link scrollto active" href="#hero">Главная</a></li>-->
<!--				<li><a class="nav-link scrollto" href="#about">О компании</a></li>-->
<!--				<li><a class="nav-link scrollto" href="#services">Услуги</a></li>-->
<!--				<li class="dropdown"><a href="tour"><span>Туры</span> <i class="bi bi-chevron-down"></i></a>-->
<!--					<ul>-->
<!--						<li>-->
<!--							<div class="container-fluid">-->
<!--								<div class="row">-->
<!--									<div class="col-sm-3">-->
<!--										left-->
<!--									</div>-->
<!--									<div class="col-sm-9">-->
<!--										right-->
<!--									</div>-->
<!--								</div>-->
<!--							</div>-->
<!--						</li>-->
<!--					</ul>-->
<!--				</li>-->
<!--				<li class="dropdown"><a href="blog"><span>Блог</span> <i class="bi bi-chevron-down"></i></a>-->
<!--					<ul>-->
<!--						<li><a href="#">Drop Down 1</a></li>-->
				
						<!--						<li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-right"></i></a>-->
						<!--							<ul>-->
						<!--								<li><a href="#">Deep Drop Down 1</a></li>-->
						<!--								<li><a href="#">Deep Drop Down 2</a></li>-->
						<!--								<li><a href="#">Deep Drop Down 3</a></li>-->
						<!--								<li><a href="#">Deep Drop Down 4</a></li>-->
						<!--								<li><a href="#">Deep Drop Down 5</a></li>-->
						<!--							</ul>-->
						<!--						</li>-->
				
<!--						<li><a href="#">Drop Down 2</a></li>-->
<!--						<li><a href="#">Drop Down 3</a></li>-->
<!--						<li><a href="#">Drop Down 4</a></li>-->
<!--					</ul>-->
<!--				</li>-->
<!--				<li><a class="nav-link scrollto" href="#team">Команда</a></li>-->
<!--				<li><a class="nav-link scrollto" href="#contact">Контакты</a></li>-->
			</ul>
			
		</nav><!-- .navbar -->
		<i class="bi bi-list mobile-nav-toggle"></i>
	</div>
</header>