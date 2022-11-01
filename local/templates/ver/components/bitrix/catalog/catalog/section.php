<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<? 
	$arSection = CIBlockSection::GetByID($arResult["VARIABLES"]["SECTION_ID"])->fetch();
	
?>
<div class="container">
	<h1><?=$arSection["NAME"]?></h1>
	<div class="catalog-page">
		<div class="main__content single-article width-80 catalog-prew">
			<p>
				<?=$arSection["DESCRIPTION"]?>
			</p>
			
		</div>
	</div>
</div>
<div class="gray-bg">
	<div class="container">
		<form class="search clearfix" action="/catalog/">
			<input class="search__txt" value="" name="q" placeholder="Поиск по названию, артикулу, EAN " type="text">
			<button class="search__submit" type="submit"><span>Найти</span></button>
		</form>
	</div>
</div>

<?
// $APPLICATION->IncludeComponent(
// 	"bitrix:search.form",
// 	"",
// 	Array(
// 		"PAGE" => "#SITE_DIR#search/index.php",
// 		"USE_SUGGEST" => "N"
// 	)
// );
?>
<?
// $APPLICATION->IncludeComponent(
// 	"bitrix:catalog.section.list",
// 	"",
// 	Array(
// 		"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
// 		"IBLOCK_ID" => $arParams["IBLOCK_ID"],
// 		"SECTION_ID" => $arResult["VARIABLES"]["SECTION_ID"],
// 		"SECTION_CODE" => $arResult["VARIABLES"]["SECTION_CODE"],
// 		"DISPLAY_PANEL" => "N",
// 		"CACHE_TYPE" => $arParams["CACHE_TYPE"],
// 		"CACHE_TIME" => $arParams["CACHE_TIME"],
// 		"CACHE_GROUPS" => $arParams["CACHE_GROUPS"],

// 		"SECTION_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["section"],
// 	),
// 	$component
	
// );
?>
<?
	$arSortFields = array(
		"SORT_ASC" => array( // параметр в url
			"ID" => "SORT_ASC",
			"ORDER"=> "ASC", //в возрастающем порядке
			"CODE" => "SORT", // Код поля для сортировки
			"NAME" => "по умолчанию", // имя для вывода в публичной части, редактировать в (/lang/ru/section.php)
			"ICON" => '<i class="fas fa-sort-alpha-up-alt"></i>'
		),
		"NAME" => array( // параметр в url
			"ID" => "NAME",
			"ORDER"=> "ASC", //в возрастающем порядке
			"CODE" => "NAME", // Код поля для сортировки
			"NAME" => "по алфавиту", // имя для вывода в публичной части, редактировать в (/lang/ru/section.php)
			"ICON" => '<i class="fas fa-sort-alpha-up-alt"></i>'
		),
		
		"PRICE_ASC"=> array(
			"ID" => "PRICE_ASC",
			"ORDER"=> "ASC",
			// "CODE" => "PROPERTY_MINIMUM_PRICE",  // изменен для сортировки по ТП
			"CODE" => "CATALOG_PRICE_1",
			"NAME" => 'по цене ↑',
			"ICON" => '<i class="fa-sort-amount-up"></i>'
		),
		"PRICE_DESC" => array(
			"ID" => "PRICE_DESC",
			"ORDER"=> "DESC",
			// "CODE" => "PROPERTY_MAXIMUM_PRICE", // изменен для сортировки по ТП
			"CODE" => "CATALOG_PRICE_1",
			"NAME" => "по цене ↓",
			"ICON" => '<i class="fa-sort-amount-down"></i>'
		)
	);
?>
<?
if(!empty($_REQUEST["SORT_FIELD"]) && !empty($arSortFields[$_REQUEST["SORT_FIELD"]])){

	setcookie("CATALOG_SORT_FIELD", $_REQUEST["SORT_FIELD"], time() + 60 * 60 * 24 * 30 * 12 * 2, "/");

	$arParams["ELEMENT_SORT_FIELD"] = $arSortFields[$_REQUEST["SORT_FIELD"]]["CODE"];
	$arParams["ELEMENT_SORT_ORDER"] = $arSortFields[$_REQUEST["SORT_FIELD"]]["ORDER"];

	$arSortFields[$_REQUEST["SORT_FIELD"]]["SELECTED"] = "Y";

}
elseif(!empty($_COOKIE["CATALOG_SORT_FIELD"]) && !empty($arSortFields[$_COOKIE["CATALOG_SORT_FIELD"]]))
{ // COOKIE

	$arParams["ELEMENT_SORT_FIELD"] = $arSortFields[$_COOKIE["CATALOG_SORT_FIELD"]]["CODE"];
	$arParams["ELEMENT_SORT_ORDER"] = $arSortFields[$_COOKIE["CATALOG_SORT_FIELD"]]["ORDER"];
	$arSortFields[$_COOKIE["CATALOG_SORT_FIELD"]]["SELECTED"] = "Y";
}
?>
<?
	//check selected item
	foreach($arSortFields as $arSortField){
		if($arSortField["SELECTED"] == "Y"){
			$arSortSelected = $arSortField;
		}
	}
	//check found selected item
	if(empty($arSortSelected)){
		$selectItemIndex = array_key_first($arSortFields);
		$arSortSelected = $arSortFields[$selectItemIndex];
		$arSortFields[$selectItemIndex]["SELECTED"] = "Y";
	}
?>
<div class="container">
<!-- Сортировка -->
<div class="catalog-area__header">
	<div class="title">Подбор по параметрам</div>
	<div class="sort mob-hidden">
		<div class="label">Сортировка:</div>
		<ul class="sort__opt">
			<?foreach($arSortFields as $arSortFieldCode => $arSortField):?>
				<li class="<?if($arSortField["SELECTED"] == "Y"):?> selected<?endif;?>"><a href="" class="panel-click" data-value="<?="?SORT_FIELD=".$arSortFieldCode?>" data-direction='<?=\Bitrix\Main\Web\Json::encode(array("SORT_FIELD" => $arSortField))?>' title=""><?=$arSortField["NAME"]?></a></li>
			<?endforeach;?>
		</ul>
	</div>					
	<div class = "mobile-filter-trigger"></div>
</div>
<?
if (CModule::IncludeModule("iblock"))
{
    $arFilter = array(
        "ACTIVE" => "Y",
        "GLOBAL_ACTIVE" => "Y",
        "IBLOCK_ID" => $arParams["IBLOCK_ID"],
    );
    if(strlen($arResult["VARIABLES"]["SECTION_CODE"])>0)
    {
        $arFilter["=CODE"] = $arResult["VARIABLES"]["SECTION_CODE"];
    }
    elseif($arResult["VARIABLES"]["SECTION_ID"]>0)
    {
        $arFilter["ID"] = $arResult["VARIABLES"]["SECTION_ID"];
    }
        
    $obCache = new CPHPCache;
    if($obCache->InitCache(36000, serialize($arFilter), "/iblock/catalog"))
    {
        $arCurSection = $obCache->GetVars();
    }
    else
    {
        $arCurSection = array();
        $dbRes = CIBlockSection::GetList(array(), $arFilter, false, array("ID"));
        $dbRes = new CIBlockResult($dbRes);
   if(defined("BX_COMP_MANAGED_CACHE"))
        {
            global $CACHE_MANAGER;
            $CACHE_MANAGER->StartTagCache("/iblock/catalog");

            if ($arCurSection = $dbRes->GetNext())
            {
                $CACHE_MANAGER->RegisterTag("iblock_id_".$arParams["IBLOCK_ID"]);
            }
            $CACHE_MANAGER->EndTagCache();
        }
        else
        {
            if(!$arCurSection = $dbRes->GetNext())
                $arCurSection = array();
        }
      $obCache->EndDataCache($arCurSection);
    }
    ?>
	<div class="width-25 aside mobile-filters">
		<?$APPLICATION->IncludeComponent(
			"bitrix:catalog.smart.filter",
			//   "smart.filter",
			"custom",
			Array(
				"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
				"IBLOCK_ID" => $arParams["IBLOCK_ID"],
				"SECTION_ID" => $arCurSection['ID'],
				"FILTER_NAME" => $arParams["FILTER_NAME"],
				"PRICE_CODE" => $arParams["PRICE_CODE"],
				"CACHE_TYPE" => $arParams["CACHE_TYPE"],
				"CACHE_TIME" => $arParams["CACHE_TIME"],
				"CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
				"SAVE_IN_SESSION" => "N",
				"FILTER_VIEW_MODE" => $arParams["FILTER_VIEW_MODE"],
				"XML_EXPORT" => "Y",
				"SECTION_TITLE" => "NAME",
				"SECTION_DESCRIPTION" => "DESCRIPTION",
				'HIDE_NOT_AVAILABLE' => $arParams["HIDE_NOT_AVAILABLE"],
				//"TEMPLATE_THEME" => $arParams["TEMPLATE_THEME"],
				'CONVERT_CURRENCY' => $arParams['CONVERT_CURRENCY'],
				'CURRENCY_ID' => $arParams['CURRENCY_ID'],
				"SEF_MODE" => $arParams["SEF_MODE"],
				"SEF_RULE" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["smart_filter"],
				"SMART_FILTER_PATH" => $arResult["VARIABLES"]["SMART_FILTER_PATH"],
				"PAGER_PARAMS_NAME" => $arParams["PAGER_PARAMS_NAME"],
				// "INSTANT_RELOAD" => $arParams["INSTANT_RELOAD"],
				"INSTANT_RELOAD" => "Y",
			),
			$component,
			array('HIDE_ICONS' => 'Y')
		);?>
	</div>
<?}?>
<? 
	$sort = $_REQUEST["sort"];

?>
<? 
	if(array_key_exists("ajax", $_REQUEST) && $_REQUEST["ajax"] == "Y")
		{
			$APPLICATION->RestartBuffer();
		}
?>

<div id="ajaxSection">

	<?$APPLICATION->IncludeComponent(
		"bitrix:catalog.section",
		"",
		Array(
			"ADD_SECTIONS_CHAIN" => "Y",
			"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
			"IBLOCK_ID" => $arParams["IBLOCK_ID"],
			"ELEMENT_SORT_FIELD" => $arParams["ELEMENT_SORT_FIELD"],
			"ELEMENT_SORT_ORDER" => $arParams["ELEMENT_SORT_ORDER"],
			"PROPERTY_CODE" => $arParams["LIST_PROPERTY_CODE"],
			"META_KEYWORDS" => $arParams["LIST_META_KEYWORDS"],
			"META_DESCRIPTION" => $arParams["LIST_META_DESCRIPTION"],
			"BROWSER_TITLE" => $arParams["LIST_BROWSER_TITLE"],
			"INCLUDE_SUBSECTIONS" => $arParams["INCLUDE_SUBSECTIONS"],
			"BASKET_URL" => $arParams["BASKET_URL"],
			"ACTION_VARIABLE" => $arParams["ACTION_VARIABLE"],
			"PRODUCT_ID_VARIABLE" => $arParams["PRODUCT_ID_VARIABLE"],
			"SECTION_ID_VARIABLE" => $arParams["SECTION_ID_VARIABLE"],
			"FILTER_NAME" => $arParams["FILTER_NAME"],
			"DISPLAY_PANEL" => $arParams["DISPLAY_PANEL"],
			"CACHE_TYPE" => $arParams["CACHE_TYPE"],
			"CACHE_TIME" => $arParams["CACHE_TIME"],
			"CACHE_FILTER" => $arParams["CACHE_FILTER"],
			"CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
			"SET_TITLE" => $arParams["SET_TITLE"],
			"SET_STATUS_404" => $arParams["SET_STATUS_404"],
			"DISPLAY_COMPARE" => $arParams["USE_COMPARE"],
			"PAGE_ELEMENT_COUNT" => $arParams["PAGE_ELEMENT_COUNT"],
			"LINE_ELEMENT_COUNT" => $arParams["LINE_ELEMENT_COUNT"],
			"PRICE_CODE" => $arParams["PRICE_CODE"],
			"USE_PRICE_COUNT" => $arParams["USE_PRICE_COUNT"],
			"SHOW_PRICE_COUNT" => $arParams["SHOW_PRICE_COUNT"],

			"PRICE_VAT_INCLUDE" => $arParams["PRICE_VAT_INCLUDE"],

			"DISPLAY_TOP_PAGER" => $arParams["DISPLAY_TOP_PAGER"],
			"DISPLAY_BOTTOM_PAGER" => $arParams["DISPLAY_BOTTOM_PAGER"],
			"PAGER_TITLE" => $arParams["PAGER_TITLE"],
			"PAGER_SHOW_ALWAYS" => $arParams["PAGER_SHOW_ALWAYS"],
			"PAGER_TEMPLATE" => $arParams["PAGER_TEMPLATE"],
			"PAGER_DESC_NUMBERING" => $arParams["PAGER_DESC_NUMBERING"],
			"PAGER_DESC_NUMBERING_CACHE_TIME" => $arParams["PAGER_DESC_NUMBERING_CACHE_TIME"],
			"PAGER_SHOW_ALL" => $arParams["PAGER_SHOW_ALL"],

			"OFFERS_CART_PROPERTIES" => $arParams["OFFERS_CART_PROPERTIES"],
			"OFFERS_FIELD_CODE" => $arParams["LIST_OFFERS_FIELD_CODE"],
			"OFFERS_PROPERTY_CODE" => $arParams["LIST_OFFERS_PROPERTY_CODE"],
			"OFFERS_SORT_FIELD" => $arParams["OFFERS_SORT_FIELD"],
			"OFFERS_SORT_ORDER" => $arParams["OFFERS_SORT_ORDER"],
			"OFFERS_LIMIT" => $arParams["LIST_OFFERS_LIMIT"],

			"SECTION_ID" => $arResult["VARIABLES"]["SECTION_ID"],
			"SECTION_CODE" => $arResult["VARIABLES"]["SECTION_CODE"],
			"SECTION_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["section"],
			"DETAIL_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["element"],
		),
		$component
	);
	?>
</div>
<?
	if(array_key_exists("ajax", $_REQUEST) && $_REQUEST["ajax"] == "Y")
	{
		die();
	}
?>
</div>

<script>
	var catalogSiteId = "<?=SITE_ID?>";
	var catalogAjaxPath = "<?=$templateFolder?>/ajax/ajax.php";
	var catalogAdditonal = <?=\Bitrix\Main\Web\Json::encode(array("SORT_NUMBER" => $arSortProductNumber, "SORT" => $arSortFields, "TEMPLATES" => $arTemplates));?>;
	
	
</script>
<?$this->addExternalJS($templateFolder."/js/catalog-panel.js");?>