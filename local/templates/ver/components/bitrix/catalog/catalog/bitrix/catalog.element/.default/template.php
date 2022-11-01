<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>


<div class="main">
            <div class="container">
              <!-- Хлебные крошки -->
              
              <h1 class="mob-show">
                Аккумулятор 9V (крона) Ni-Mh 175мАч Energizer
                <br class="tab-hidden" />Power Plus 1 шт.
              </h1>
    <!-- Карточка товара -->


	<div class="single-product">
					<div class="single-product__top row">
						<div class="width-48">
							<div class="tovar-picts">
								<!-- Слайдер миниатюр -->
								<div class = "tovar-picts__slider-wr">
									<div class="slider-for">
									<? foreach($arResult['PROPERTIES']['FILES']['VALUE'] as $image) {
													?>
														<div><a rel="example_group" href="<?=CFile::GetPath($image)?>" class="js-img-modal" title=""><img src="<?=CFile::GetPath($image) ?>" alt="" /></a></div>
													<?
													
												} ?>
									</div>
									
									 <div class="slider-nav">
									 <? foreach($arResult['PROPERTIES']['FILES']['VALUE'] as $image) {
												?> <div><img src="<?=CFile::GetPath($image)?>" alt="" /></div>
												  <?	} ?>
									</div>
								</div>
								<!-- END Слайдер миниатюр -->
							</div>
						</div>
						<div class="width-52">
							<h1 class = "mob-hidden"><?=$arResult["NAME"]?></h1>
							<div class="sku">Артикул: <span><?=$arResult ["PROPERTIES"]["VENDOR_CODE"]["VALUE"]?></span></div>
							<div class = "lost">Остатки товара:<div class="right"> &lt; 100</div></div>
							<div class="short-desc">
								<h3>Краткое описание</h3>
								<ul class="short-desc__list">
								<li>Бренд: <span><?=$arResult ["PROPERTIES"]["BR"]["VALUE"]?></span></li>
									<li>Типоразмер: <span><?=$arResult ["PROPERTIES"]["TI"]["VALUE"]?></span></li>
									<li>Напряжение: <span><?=$arResult ["PROPERTIES"]["NA"]["VALUE"]?></span></li>
									<li>Химический состав: <span><?=$arResult ["PROPERTIES"]["HI"]["VALUE"]?></span></li>
									<li>Количество в упаковке: <span><?=$arResult ["PROPERTIES"]["KO"]["VALUE"]?></span></li>
								</ul>
							</div>
							<div class="price">
								<h3>Цены </h3>
								<ul class="price__list">
								<li>Прейскурант, безналичный<div class="right"><?=$arResult["PRICES"]["Розничная"]["PRINT_DISCOUNT_VALUE"]?></div></li>
									<li>Предоплата, безналичный <span>-15%</span> <div class="right"><?=$arResult["PRICES"]["Розничная"]["PRINT_DISCOUNT_VALUE"]?></div></li>
									<li>Остатки товара<div class="right"><?=$arResult["PRODUCT"]["QUANTITY"]?></div></li>
								</ul>
							</div>							
						</div>
					</div>
					<div class="single-product__options">
						<div class="long-desc">
							<h2>Описание товара</h2>
							<p><?=$arResult["DETAIL_TEXT"]?></p>
							<p><?=$arResult["PREVIEW_TEXT"]?></p>
						</div>
						<div class="options-data">
							<h2>Характеристики товара</h2>
							<ul class="options-data__list">
								<li><div class="left">Бренд:</div><div class="right"><?=$arResult ["PROPERTIES"]["BR"]["VALUE"]?></div></li>
								<li><div class="left">Типоразмер:</div><div class="right"><?=$arResult ["PROPERTIES"]["TI"]["VALUE"]?></div></li>
								<li><div class="left">Напряжение:</div><div class="right"><?=$arResult ["PROPERTIES"]["NA"]["VALUE"]?></div></li>
								<li><div class="left">Химический состав:</div><div class="right"><?=$arResult ["PROPERTIES"]["HI"]["VALUE"]?></div></li>
								<li><div class="left">Количество в упаковке:</div><div class="right"><?=$arResult ["PROPERTIES"]["KO"]["VALUE"]?></div></li>
								<li><div class="left">Страна-производитель:</div><div class="right"><?=$arResult ["PROPERTIES"]["ST"]["VALUE"]?></div></li>
								<li><div class="left">Поставщик в РБ:</div><div class="right"><?=$arResult ["PROPERTIES"]["PO"]["VALUE"]?></div></li>
								<li><div class="left">Гарантия:</div><div class="right"><?=$arResult ["PROPERTIES"]["GA"]["VALUE"]?></div></li>
								<li><div class="left">Количество в упаковке:</div><div class="right"><?=$arResult ["PROPERTIES"]["KO"]["VALUE"]?></div></li>
								<li><div class="left">Количество в упаковке:</div><div class="right"><?=$arResult ["PROPERTIES"]["KO"]["VALUE"]?></div></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>

		
		<!--123 -->
		





			