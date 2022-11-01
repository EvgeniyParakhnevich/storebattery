		
</div>
</div>
		<footer class="footer">
			<!-- Подвал верх -->
			<div class="footer__top">
				<div class="container">
					<div id="back_top" class="back_top"></div>
					<div class="row">
						<div class="width-28">
							<?
                                                                $APPLICATION->IncludeFile(
                                                                SITE_DIR."include/footer_logo.php",
                                                                Array(),
                                                                Array("MODE"=>"html")
                                                                );
                                                                ?>
							<!--<a href="/" class="mob-hidden footer__logo" title="">
								<img src="<?//=SITE_TEMPLATE_PATH?>/images/i/pic-logo.png" alt="">
							</a>-->
							                                    <?
                                                                $APPLICATION->IncludeFile(
                                                                SITE_DIR."include/about.php",
                                                                Array(),
                                                                Array("MODE"=>"html")
                                                                );
                                                                ?>
						</div>
						<div class="width-72">
						    <nav class="footer__nav">
						    <?$APPLICATION->IncludeComponent(
	"bitrix:menu", 
	"horizontal_ver", 
	array(
		"COMPONENT_TEMPLATE" => "horizontal_ver",
		"ROOT_MENU_TYPE" => "bottom",
		"MENU_CACHE_TYPE" => "N",
		"MENU_CACHE_TIME" => "3600",
		"MENU_CACHE_USE_GROUPS" => "Y",
		"MENU_CACHE_GET_VARS" => array(
		),
		"MAX_LEVEL" => "1",
		"CHILD_MENU_TYPE" => "left",
		"USE_EXT" => "Y",
		"DELAY" => "N",
		"ALLOW_MULTI_SELECT" => "N"
	),
	false
);?>
							
								<!--<ul class="footer__menu clearfix">
									<li><a href="#" title="">Каталог товаров</a></li>
									<li><a href="#" title="">О компании</a></li>
									<li><a href="#" title="">Партнеры</a></li>
									<li><a href="#" title="">Торговые марки</a></li>
									<li><a href="#" title="">Статьи</a></li>
									<li><a href="#" title="">Контакты</a></li>
								</ul>-->
							</nav>
							<ul class="footer__contact flex">
								<li class="address">
									<div class="title"><?
                                                                $APPLICATION->IncludeFile(
                                                                SITE_DIR."include/main_adress.php",
                                                                Array(),
                                                                Array("MODE"=>"html")
                                                                );
                                                                ?></div>
									                            <?
                                                                $APPLICATION->IncludeFile(
                                                                SITE_DIR."include/adress.php",
                                                                Array(),
                                                                Array("MODE"=>"html")
                                                                );
                                                                ?>
									<a href="#fb-map" class="address__map js-open-modal" title=""><span>Посмотреть на карте</span></a>
								</li>
								<li>
									<div class="title"><?
                                                                $APPLICATION->IncludeFile(
                                                                SITE_DIR."include/main_time.php",
                                                                Array(),
                                                                Array("MODE"=>"html")
                                                                );
                                                                ?></div>
									                            <?
                                                                $APPLICATION->IncludeFile(
                                                                SITE_DIR."include/time.php",
                                                                Array(),
                                                                Array("MODE"=>"html")
                                                                );
                                                                ?>
								</li>
								<li>
									<div class="title"><?
                                                                $APPLICATION->IncludeFile(
                                                                SITE_DIR."include/main_number_footer.php",
                                                                Array(),
                                                                Array("MODE"=>"html")
                                                                );
                                                                ?></div>
									<?
                                                                $APPLICATION->IncludeFile(
                                                                SITE_DIR."include/number_footer.php",
                                                                Array(),
                                                                Array("MODE"=>"html")
                                                                );
                                                                ?>
								</li>
							</ul>
						</div>
					</div>				
				</div>
			</div>
			<!-- Подвал копирайт -->
			<div class="footer__copyright">
				<div class="container">
					<div class="flex">
						<p>© 2002-2017 ООО «Trals.by». Все права защищены</p>
						<a class="go-site-map" href="#" title="">Карта сайта</a>
						<p>Разработка сайта: <a href="#" class="" title="">webcompany.by</a></p>
					</div>
				</div>
			</div>
		</footer>
		
		<!-- -->
		</div>
		<!-- // -->
		
		<!-- Модальная карта -->
		<div id="fb-map" class="g-modal-win" style="display: none;">
			<div class="g-modal-win__content">
				<div class="modal__address"><span>Адрес:</span> Республика Беларусь, индекс 220113, г.Минск, Лагойский тракт, д.15, к.4 </div>
				<div id="ya-map" class="ya-map"></div>
				<div class="clearfix">
					<div class="modal__phone">
						<div class="title">Номера телефонов: </div>
						<p>Отдел елементов питания: <span><a href = "tel:+37517312693133" title = "">+375 (17) 31-269-31-33</a></span> <br class = "mob-hidden">Отдел герметичных аккумулятор: <span><a href = "tel:+375172693155" title = "">+375 (17) 269-31-55</a></span> <br class = "mob-hidden">
						Отдел лапм бытового освещения: <span><a href = "tel:+375172693144" title = "">+375 (17) 269-31-44</a></span> <br class = "mob-hidden">Общий номер: <span><a href = "tel:+375172693132" title = "">+375 (17) 269-31-32</a></span></p>
					</div>
					<div class="modal__time">
						<div class="title">Время работы: </div>
						<p>понедельник — пятница: <span>с 9:00 до 19:00</span> <br>суббота: <span>с 10:00 до 17:00</span> <br>воскресенье: <span>выходной</span> </p>
					</div>
				</div>
			</div>
		</div>
		
		<!-- scrits include -->
		
		<!-- Yandex.Metrika counter --><!-- /Yandex.Metrika counter -->
		<!-- Google Analytics counter --><!-- /Google Analytics counter -->
	</body>
</html>