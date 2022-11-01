<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?><?if (!empty($arResult)):?>
<ul id="horizontal-multilevel-menu" class="header__menu">

<?
$previousLevel = 0;
foreach($arResult as $arItem):?>

	<?if ($previousLevel && $arItem["DEPTH_LEVEL"] < $previousLevel):?>
		<?=str_repeat("</ul></li>", ($previousLevel - $arItem["DEPTH_LEVEL"]));?>
	<?endif?>

	<?if ($arItem["IS_PARENT"]):?>

		<?if ($arItem["DEPTH_LEVEL"] == 1):?>
			<li class="<?if ($arItem["SELECTED"]):?>has-children<?else:?> <?endif?>"><a href="<?=$arItem["LINK"]?>" class="<?if ($arItem["SELECTED"]):?>root-item-selected<?else:?>root-item<?endif?>"><?=$arItem["TEXT"]?></a>
				<ul class="sub-menu">
		<?else:?>
			<li<?if ($arItem["SELECTED"]):?> class="item-selected"<?endif?>><a href="<?=$arItem["LINK"]?>" class="parent"><?=$arItem["TEXT"]?></a>
				<ul>
		<?endif?>

	<?else:?>

		<?if ($arItem["PERMISSION"] > "D"):?>

			<?if ($arItem["DEPTH_LEVEL"] == 1):?>
				<li><a href="<?=$arItem["LINK"]?>" class="<?if ($arItem["SELECTED"]):?>root-item-selected<?else:?>root-item<?endif?>"><?=$arItem["TEXT"]?></a></li>
			<?else:?>
				<li<?if ($arItem["SELECTED"]):?> class="item-selected"<?endif?>><a href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a></li>
			<?endif?>

		<?else:?>

			<?if ($arItem["DEPTH_LEVEL"] == 1):?>
				<li><a href="" class="<?if ($arItem["SELECTED"]):?>root-item-selected<?else:?>root-item<?endif?>" title="<?=GetMessage("MENU_ITEM_ACCESS_DENIED")?>"><?=$arItem["TEXT"]?></a></li>
			<?else:?>
				<li><a href="" class="denied" title="<?=GetMessage("MENU_ITEM_ACCESS_DENIED")?>"><?=$arItem["TEXT"]?></a></li>
			<?endif?>

		<?endif?>

	<?endif?>

	<?$previousLevel = $arItem["DEPTH_LEVEL"];?>

<?endforeach?>

<?if ($previousLevel > 1)://close last item tags?>
	<?=str_repeat("</ul></li>", ($previousLevel-1) );?>
<?endif?>

</ul>
<div class="menu-clear-left"></div>
<?endif?>
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