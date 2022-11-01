<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);?>
<div class="gray-bg">
              <div class="container">
                <form action="<?=$arResult["FORM_ACTION"]?>" class="search clearfix">
                  <input
                    class="search__txt"
                    value=""
                    placeholder="Поиск по названию, артикулу, EAN "
                    type="text"
                  />
                  <button class="search__submit" type="submit">
                    <span><input name="s" type="submit" value="<?=GetMessage("BSF_T_SEARCH_BUTTON");?>" /></span>
                  </button>
                </form>
              </div>
            </div>

