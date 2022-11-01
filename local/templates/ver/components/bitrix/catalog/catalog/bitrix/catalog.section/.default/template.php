<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?php

?>

<div class="width-75">
	<div class="clearfix catalog-list">

		<?foreach($arResult["ITEMS"] as $cell=>$arElement):?>
			<?php
				//debug($arElement);
				?>
			<div class="item">
								<a href="<?=$arElement['DETAIL_PAGE_URL'] ?>" class="products-item">
									<div class="products-item__pic">
										<img style="width:160px; height:200px;" src="<?= CFile::GetPath($arElement["PREVIEW_PICTURE"]['ID']) ?>" alt="">
									</div>
									<h2 class="products-item__title"><?=$arElement['NAME'] ?></h2>
									<ul class="products-item__options">
										<li class="price"><span class = "left">Прейскурант безнал.</span><span class = "right"><?= $arElement['MIN_PRICE']['VALUE_VAT'] ?>б.р.</span></li>
										<li class="price"><span class = "left">Предоплата безнал.</span><span class = "right"><?= $arElement['MIN_PRICE']['VALUE_VAT'] ?>б.р.</span></li>
										<li class="remainder"><span class = "left">Остатки товара</span><span class = "right"><?= $arElement['PRODUCT']['QUANTITY'] ?></span></li>
									</ul>
								</a>
							</div>			
		<?endforeach; // foreach($arResult["ITEMS"] as $arElement):?>

		


</div>
<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<?=$arResult["NAV_STRING"]?>
<?endif; ?>
</div>
<?if($arResult["ORIGINAL_PARAMETERS"]["PARENT_NAME"] == "bitrix:catalog" || true):?>
	<script>
		var catalogSectionParams = <?=\Bitrix\Main\Web\Json::encode(array("arParams" => array_merge($arParams, array("PAGER_BASE_LINK_ENABLE" => "Y")),	"name" => $component->GetName(), "template" => $templateName, "filter" => $filter));?>;
		
	</script>
<?endif;?>