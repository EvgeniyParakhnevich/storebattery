<?php if ( ! defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die(); ?>

<?
$assets = \Bitrix\Main\Page\Asset::getInstance();

$assets->addCss(SITE_TEMPLATE_PATH."/css/style.css");
$assets->addCss(SITE_TEMPLATE_PATH."/libs/font-awesome-4.2.0/css/font-awesome.min.css");
$assets->addCss(SITE_TEMPLATE_PATH."/libs/owl-carousel/assets/owl.carousel.css");
$assets->addCss(SITE_TEMPLATE_PATH."/libs/fancybox/jquery.fancybox.css");
$assets->addCss(SITE_TEMPLATE_PATH."/libs/easy-responsive-tabs-to-accordion/easy-responsive-tabs.css");
$assets->addCss(SITE_TEMPLATE_PATH."/libs/slick-1.8.0/slick/slick.css");
$assets->addCss(SITE_TEMPLATE_PATH."/libs/slick-1.8.0/slick/slick-theme.css");
$assets->addCss(SITE_TEMPLATE_PATH."/css/fonts.css");
$assets->addCss(SITE_TEMPLATE_PATH."/css/media.css");



$assets->addJs(SITE_TEMPLATE_PATH.'/libs/jquery/jquery-1.7.1.js');
$assets->addJs(SITE_TEMPLATE_PATH.'/libs/jquery/jquery-migrate-1.2.1.min.js');
// $assets->addJs('https://code.jquery.com/jquery-3.6.1.min.js');
$assets->addJs(SITE_TEMPLATE_PATH.'/libs/owl-carousel/owl.carousel.min.js');
$assets->addJs(SITE_TEMPLATE_PATH.'/libs/fancybox/jquery.fancybox.pack.js');
$assets->addJs(SITE_TEMPLATE_PATH.'/libs/jquery/jquery-ui-1.8.11.js');
$assets->addJs(SITE_TEMPLATE_PATH.'/libs/easy-responsive-tabs-to-accordion/easyResponsiveTabs.js');
$assets->addJs(SITE_TEMPLATE_PATH.'/libs/slick-1.8.0/slick/slick.js');

$assets->addJs(SITE_TEMPLATE_PATH.'/js/custom-ui-slider.js');
$assets->addJs(SITE_TEMPLATE_PATH.'/js/jquery.ui.touch-punch.min.js');
$assets->addJs(SITE_TEMPLATE_PATH.'/js/common.js');
?>



<!DOCTYPE html>
<html lang="ru">
<!--<![endif]-->
	<head>
		<!--<meta charset="utf-8" />-->
		<title>Каталог | Тралс</title>

		<?$APPLICATION->ShowHead();?> 
		
		
		

		<? /*
		
		<!--<meta name="description" content="" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<meta name="cmsmagazine" content="aa4cc816c3e233bc68ec4386b3eabcf3" />
		<link rel="shortcut icon" href="favicon.png">
		<!-- style include -->
		<!-- <script src="<?=SITE_TEMPLATE_PATH?>/libs/jquery/jquery-1.7.1.js"></script>
		<script src="<?=SITE_TEMPLATE_PATH?>/libs/jquery/jquery-migrate-1.2.1.min.js"></script>
		<script src="<?=SITE_TEMPLATE_PATH?>/libs/owl-carousel/owl.carousel.min.js"></script>	
		<script src="<?=SITE_TEMPLATE_PATH?>/libs/fancybox/jquery.fancybox.pack.js"></script>			
		<script src="<?=SITE_TEMPLATE_PATH?>/libs/jquery/jquery-ui-1.8.11.js"></script>
		<script src="<?=SITE_TEMPLATE_PATH?>/libs/easy-responsive-tabs-to-accordion/easyResponsiveTabs.js"></script>
		<script src="<?=SITE_TEMPLATE_PATH?>/libs/slick-1.8.0/slick/slick.js"></script>
		<script src="<?=SITE_TEMPLATE_PATH?>/js/custom-ui-slider.js"></script>
		<script src="<?=SITE_TEMPLATE_PATH?>/js/common.js"></script> -->

		<!--<link rel="stylesheet" href="libs/font-awesome-4.2.0/css/font-awesome.min.css" />
		<link rel="stylesheet" href="libs/owl-carousel/assets/owl.carousel.css" />		
		<link rel="stylesheet" href="libs/fancybox/jquery.fancybox.css" />		
		<link rel="stylesheet" href="libs/easy-responsive-tabs-to-accordion/easy-responsive-tabs.css" />
		<link rel="stylesheet" href="libs/slick-1.8.0/slick/slick.css" />
		<link rel="stylesheet" href="libs/slick-1.8.0/slick/slick-theme.css" />
		<link rel="stylesheet" href="css/fonts.css" />
		<link rel="stylesheet" href="css/style.css" />-->
		<!--[if lt IE 9]>
			<script src="libs/html5shiv/es5-shim.min.js"></script>
			<script src="libs/html5shiv/html5shiv.min.js"></script>
			<script src="libs/html5shiv/html5shiv-printshiv.min.js"></script>
			<script src="libs/respond/respond.min.js"></script>
		<![endif]-->
		//$APPLICATION->SetAdditionalCss(SITE_TEMPLATE_PATH."/local/templates/ver/css/media.css");
		<link rel="stylesheet" href="css/media.css" />
		*/?>
		
		
		
		
		<script src="https://api-maps.yandex.ru/2.0-stable/?load=package.standard&lang=ru-RU" type="text/javascript"> </script>
		<script type="text/javascript">
			ymaps.ready(init);
			var myMap, 
				myPlacemark;

			function init(){ 
				myMap=new ymaps.Map("ya-map", {
					center: [53.9443346,27.6099203],
					zoom: 17
				}); 
				myMap.controls.add(
				   new ymaps.control.ZoomControl()
				);				
				var myPlacemark=new ymaps.Placemark([53.9443346,27.6099203], {
					hintContent: 'Тралс',
					balloonContent: 'Минск, Логойский тракт, 15 корпус 4'
				}, {
					iconImageHref: 'images/i/baloon_map.png',
					iconImageSize: [23,30],
					iconImageOffset: [-12, -30]
				});				
				myMap.geoObjects.add(myPlacemark);
			}
		</script>
	</head>
	<body>
		<?$APPLICATION->ShowPanel();?>
					<!-- -->
		<div class="bd-site">
			<div class = "b-fixed-footer">
				<div class = "b-footer-padding">
		<!-- // -->
		
		<!-- Мобильное меню -->
		<div class="mobile-aside mobile-aside__nav">
			<div class = "mobile-aside__nav__header">
				<div class = "mobile-aside__nav__close">
					<i></i> Закрыть
				</div>
			</div>
			<nav class = "mobile-aside__nav__body">
				<ul class="mobile__menu">
					<li class="has-children">
						<a href="#" title="">Каталог товаров</a>
						<ul class="sub-menu">
							<li><a href="#" title="">Элементы питания</a></li>
							<li><a href="#" title="">Бытовые аккумуляторы</a></li>
							<li><a href="#" title="">Зарядные устройства</a></li>
							<li><a href="#" title="">Индустриальные аккумуляторы</a></li>
							<li><a href="#" title="">Лампы</a></li>
							<li><a href="#" title="">Инверторы</a></li>
							<li><a href="#" title="">Стационарные аккумуляторы</a></li>
							<li><a href="#" title="">Сервис и ремент аккумуляторов</a></li>
							<li><a href="#" title="">Портативные аккумуляторы</a></li>
							<li><a href="#" title="">Светильники</a></li>
						</ul>
					</li>
					<li><a href="#" title="">О компании</a></li>
					<li><a href="#" title="">Партнеры</a></li>
					<li><a href="#" title="">Торговые марки</a></li>
					<li><a href="#" title="">Статьи</a></li>
					<li><a href="#" title="">Контакты</a></li>
				</ul>
			</nav>
		</div>
		
		<!-- Мобильные контакты -->
		<div class="mobile-aside mobile-aside__contact">
			<div class = "mobile-aside__contact__header">
				<div class = "mobile-aside__contact__close">
					<i></i> Закрыть
				</div>
			</div>
			<div class = "mobile-aside__contact__body">
				<ul class="header__contact">
						<li>
							<div class="header__contact__label">Отдел элементов <br>питания:</div>
							<div class="header__contact__data"><a href = "tel:+375172693133" title = "">+375 (17) 269-31-3</a> <br>office@trals.by</div>
						</li>
						<li>
							<div class="header__contact__label">Отдел герметичных <br>аккумуляторов:</div>
							<div class="header__contact__data"><a href = "tel:+375172693155" title = "">+375 (17) 269-31-55</a> <br>indbat@trals.by</div>
						</li>
						<li>
							<div class="header__contact__label">Отдел ламп бытового <br>освещения:</div>
							<div class="header__contact__data"><a href = "tel:+375172693144" title = "">+375 (17) 269-31-44</a> <br>lamps@trals.by</div>
						</li>
						<li>
							<div class="header__contact__label">Общий номер: <br>&nbsp;</div>
							<div class="header__contact__data"><a href = "tel:+375172693122" title = "">+375 (17) 269-31-22</a> <br>trals@trals.by</div>
						</li>
					</ul>
					<div class="header__address address">
						<p>Pеспублика Беларусь, 220113, Минск, <br>Логойский тракт, д.15, к.4</p>
						<a href="#fb-map" class="address__map js-open-modal" title=""><span>Посмотреть на карте</span></a>
					</div>
			</div>
		</div>
	
		<header class="header">
			<!-- Шапка верх -->
			<div class="header__top">
				<div class="container">
					<ul class="header__contact flex">
						<li>
							<div class="header__contact__label"><?
                                                                $APPLICATION->IncludeFile(
                                                                SITE_DIR."include/main_elements.php",
                                                                Array(),
                                                                Array("MODE"=>"html")
                                                                );
                                                                ?></div>
							<div class="header__contact__data"><?
                                                                $APPLICATION->IncludeFile(
                                                                SITE_DIR."include/elements.php",
                                                                Array(),
                                                                Array("MODE"=>"html")
                                                                );
                                                                ?></div>
						</li>
						<li>
							<div class="header__contact__label"><?
                                                                $APPLICATION->IncludeFile(
                                                                SITE_DIR."include/main_geometry.php",
                                                                Array(),
                                                                Array("MODE"=>"html")
                                                                );
                                                                ?></div>
							<div class="header__contact__data"><?
                                                                $APPLICATION->IncludeFile(
                                                                SITE_DIR."include/geometry.php",
                                                                Array(),
                                                                Array("MODE"=>"html")
                                                                );
                                                                ?></div>
						</li>
						<li>
							<div class="header__contact__label"><?
								$APPLICATION->IncludeFile(
									SITE_DIR."include/main_lamp.php",
									Array(),
									Array("MODE"=>"html")
									);
								?>
							</div>
							<div class="header__contact__data"><?
								$APPLICATION->IncludeFile(
									SITE_DIR."include/lamp.php",
									Array(),
									Array("MODE"=>"html")
									);
								?>
							</div>
						</li>
						<li>
							<div class="header__contact__label"><?
								$APPLICATION->IncludeFile(
									SITE_DIR."include/main_number.php",
									Array(),
									Array("MODE"=>"html")
									);
								?>
							</div>
							<div class="header__contact__data"><?
								$APPLICATION->IncludeFile(
									SITE_DIR."include/number.php",
									Array(),
									Array("MODE"=>"html")
									);
								?>
							</div>
						</li>
					</ul>
				</div>
			</div>
			<!-- Шапка низ + меню -->
			<div class="header__center clearfix">
				<div class="container">
					<div class = "flex">
						<div class = "mobile-trigger">
							<i></i><span>Меню</span>
						</div>
						<?
							$APPLICATION->IncludeFile(
							SITE_DIR."include/header_logo.php",
							Array(),
							Array("MODE"=>"html")
							);
						?>
						<!--<a href="/" class="header__logo" title="">
							<img src="<?//=SITE_TEMPLATE_PATH?>/images/i/pic-logo.png" alt="">
						</a>-->
						<?$APPLICATION->IncludeComponent(
							"bitrix:menu", 
							"horizontal_ver", 
							array(
								"COMPONENT_TEMPLATE" => "horizontal_ver",
								"ROOT_MENU_TYPE" => "top",
								"MENU_CACHE_TYPE" => "N",
								"MENU_CACHE_TIME" => "3600",
								"MENU_CACHE_USE_GROUPS" => "Y",
								"MENU_CACHE_GET_VARS" => array(
								),
								"MAX_LEVEL" => "3",
								"CHILD_MENU_TYPE" => "left",
								"USE_EXT" => "Y",
								"DELAY" => "N",
								"ALLOW_MULTI_SELECT" => "N"
							),
							false
						);?>
						<!--<ul class="header__menu">
							<li class="has-children">
								<a href="#" title="">Каталог товаров</a>
								<ul class="sub-menu">
									<li><a href="#" title="">Элементы питания</a></li>
									<li><a href="#" title="">Бытовые аккумуляторы</a></li>
									<li><a href="#" title="">Зарядные устройства</a></li>
									<li><a href="#" title="">Индустриальные аккумуляторы</a></li>
									<li><a href="#" title="">Лампы</a></li>
									<li><a href="#" title="">Инверторы</a></li>
									<li><a href="#" title="">Стационарные аккумуляторы</a></li>
									<li><a href="#" title="">Сервис и ремент аккумуляторов</a></li>
									<li><a href="#" title="">Портативные аккумуляторы</a></li>
									<li><a href="#" title="">Светильники</a></li>
								</ul>
							</li>
							<li><a href="#" title="">О компании</a></li>
							<li><a href="#" title="">Партнеры</a></li>
							<li><a href="#" title="">Торговые марки</a></li>
							<li><a href="#" title="">Статьи</a></li>
							<li><a href="#" title="">Контакты</a></li>
						</ul>-->
						<div class="header__address address">
							<?
								$APPLICATION->IncludeFile(
								SITE_DIR."include/header_address_with_map.php",
								Array(),
								Array("MODE"=>"html")
								);
							?>
						</div>
						<div class = "mobile-address-trigger">
							<i></i>
						</div>
					</div>
				</div>
			</div>
		</header>
