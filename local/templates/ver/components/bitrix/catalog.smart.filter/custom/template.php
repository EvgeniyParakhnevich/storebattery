<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);?>

<div class="aside__filter accordion">
	<form name="<?=$arResult["FILTER_NAME"]."_form"?>" action="<?=$arResult["FORM_ACTION"]?>" method="GET" id="smartFilterForm">
		<?foreach($arResult["HIDDEN"] as $arItem):?>
		<input type="hidden" name="<?=$arItem["CONTROL_NAME"]?>" id="<?=$arItem["CONTROL_ID"]?>" value="<?=$arItem["HTML_VALUE"]?>" />
		<?endforeach;?>
	<?
	foreach($arResult["ITEMS"] as $key => $arItem)//prices
	{
		$key = $arItem["ENCODED_ID"];
		if(isset($arItem["PRICE"])):
			if ($arItem["VALUES"]["MAX"]["VALUE"] - $arItem["VALUES"]["MIN"]["VALUE"] <= 0)
				continue;

			$precision = 2;
			if (Bitrix\Main\Loader::includeModule("currency")) {
				$res = CCurrencyLang::GetFormatDescription($arItem["VALUES"]["MIN"]["CURRENCY"]);
				$precision = $res["DECIMALS"];
			}
		?>
		<? /*
		<div class="rangeSlider" id="sl_<?=$arItem["ID"]?>">
			<label><?=GetMessage("CT_BCSF_FILTER_FROM")?></label><input name="<?=$arItem["VALUES"]["MIN"]["CONTROL_NAME"]?>" type="text" value="<?=empty($arItem["VALUES"]["MIN"]["HTML_VALUE"]) ? round($arItem["VALUES"]["MIN"]["VALUE"]) : round($arItem["VALUES"]["MIN"]["HTML_VALUE"])?>" id="<?=$arItem["VALUES"]["MIN"]["CONTROL_ID"]?>" onchange="smartFilter.keyup(this)" data-default="<?=round($arItem["VALUES"]["MIN"]["VALUE"])?>" data-val="<?=round($arItem["VALUES"]["MIN"]["VALUE"])?>">
			<label><?=GetMessage("CT_BCSF_FILTER_TO")?></label><input name="<?=$arItem["VALUES"]["MAX"]["CONTROL_NAME"]?>" type="text" value="<?=empty($arItem["VALUES"]["MAX"]["HTML_VALUE"]) ? round($arItem["VALUES"]["MAX"]["VALUE"]) : round($arItem["VALUES"]["MAX"]["HTML_VALUE"])?>" id="<?=$arItem["VALUES"]["MAX"]["CONTROL_ID"]?>" onchange="smartFilter.keyup(this)" data-default="<?=round($arItem["VALUES"]["MAX"]["VALUE"])?>" data-val="<?=round($arItem["VALUES"]["MAX"]["VALUE"])?>">
			<div class="slider">
				<div class="handler">
					<div class="blackoutLeft"><ins id="s_<?=$arItem["VALUES"]["MIN"]["CONTROL_ID"]?>" class="left"></ins></div>
					<div class="blackoutRight"><ins id="s_<?=$arItem["VALUES"]["MAX"]["CONTROL_ID"]?>" class="right"></ins></div>
				</div>
			</div>
		</div>
		*/ ?>
		<div class="aside__filter__item">
			<div class="aside__filter__item__title accordion-item">
				<?=preg_replace("/\[.*\]/", "", $arItem["NAME"])?>
			</div>
			<div class="aside__filter__item__var data">
				<!-- START::NEW_UI_SLIDER-->
				<div class="filter__attrs cr-filter__price">
					<dl class="b-filter-attr j-slider_range" from="<?=round($arItem["VALUES"]["MIN"]["VALUE"])?>" to="<?=round($arItem["VALUES"]["MAX"]["VALUE"])?>">
						<dd class="filter-attr__value slider-input">
							<div class="filter__textlabel slider-input__left">
								<span class="dscr">от </span>
								<span class="g-form__inputwrap">
									<input
										onchange="smartFilter.keyup(this)"
										class="g-form__text"
										name="<?=$arItem["VALUES"]["MIN"]["CONTROL_NAME"]?>"
										maxlength="11"
										placeholder="<?=round($arItem["VALUES"]["MIN"]["VALUE"])?>"
										type="text"
										value="<?=empty($arItem["VALUES"]["MIN"]["HTML_VALUE"]) ? round($arItem["VALUES"]["MIN"]["VALUE"]) : round($arItem["VALUES"]["MIN"]["HTML_VALUE"])?>"
										id="<?=$arItem["VALUES"]["MIN"]["CONTROL_ID"]?>"
										data-default="<?=round($arItem["VALUES"]["MIN"]["VALUE"])?>"
										data-val="<?=round($arItem["VALUES"]["MIN"]["VALUE"])?>"
									/>
								</span>
							</div>
							

							<div class="filter__textlabel slider-input__right">
								<span class="dscr">до</span>
								<span class="g-form__inputwrap">
									<input
										onchange="smartFilter.keyup(this)"
										class="g-form__text"
										name="<?=$arItem["VALUES"]["MAX"]["CONTROL_NAME"]?>"
										maxlength="11"
										placeholder="<?=round($arItem["VALUES"]["MAX"]["VALUE"])?>"
										type="text"
										value="<?=empty($arItem["VALUES"]["MAX"]["HTML_VALUE"]) ? round($arItem["VALUES"]["MAX"]["VALUE"]) : round($arItem["VALUES"]["MAX"]["HTML_VALUE"])?>"
										id="<?=$arItem["VALUES"]["MAX"]["CONTROL_ID"]?>"
										data-default="<?=round($arItem["VALUES"]["MAX"]["VALUE"])?>"
										data-val="<?=round($arItem["VALUES"]["MAX"]["VALUE"])?>"
									/>
								</span>
							</div>
						</dd>
					</dl>
				</div>
				<!-- END::NEW_UI_SLIDER-->
				<!-- <div class="checkbox">
					<label>
						<input id="" class="" name="" value="" type="checkbox" />
						<span>Новинка</span>
					</label>
				</div> -->
			</div>
		</div>


		<?endif;?>
	<?}?>
	<?
		//not prices
		foreach($arResult["ITEMS"] as $key => $arItem)
		{
			if(empty($arItem["VALUES"])	|| isset($arItem["PRICE"])){
				continue;
			}

			if(($arItem["DISPLAY_TYPE"] == "A" || $arItem["DISPLAY_TYPE"] == "B") && ($arItem["VALUES"]["MAX"]["VALUE"] - $arItem["VALUES"]["MIN"]["VALUE"] <= 0)){
				continue;
			}
			$i = 0;
		?>

		<div class="aside__filter__item">
			<div class="aside__filter__item__title accordion-item">
				<?=preg_replace("/\[.*\]/", "", $arItem["NAME"])?>
			</div>
			<div class="aside__filter__item__var data">
				<ul class="checkbox">
					<?foreach($arItem["VALUES"] as $val => $ar):
						$i++
					?>
						<li>
							<label>
								<input
									onclick="smartFilter.click(this)"
									id="<?=$ar["CONTROL_ID"]?>"
									class=""
									name="<?=$ar["CONTROL_NAME"]?>"
									value="<?=$ar["HTML_VALUE"]?>"
									type="checkbox"
									<?=$ar["CHECKED"]? 'checked="checked"': ''?>
									<?=$ar["DISABLED"] ? 'disabled="disabled"': ''?>
								/>
								<span><?=$ar["VALUE"]?></span>
							</label>
						</li>
					<?endforeach;?>
				</ul>
			</div>
		</div>
		<?/*
		<ul class="checkbox">
			<?foreach($arItem["VALUES"] as $val => $ar):?>
				<?$i++;?>
				<li class="<?=($i > 5) ? "off" : ""?>">
					<input 
						type="checkbox"
						value="<?=$ar["HTML_VALUE"]?>"
						name="<?=$ar["CONTROL_NAME"]?>"
						id="<?=$ar["CONTROL_ID"]?>"
						onclick="smartFilter.click(this)" 
						<?=$ar["CHECKED"]? 'checked="checked"': ''?>
						<?=$ar["DISABLED"] ? 'disabled="disabled"': ''?>
					/>
					<label for="<?=$ar["CONTROL_ID"]?>" data-role="label_<?=$ar["CONTROL_ID"]?>" <?=$ar["DISABLED"] ? 'class="disabled"': ''?>>
						<?=$ar["VALUE"]?>
						<?if ($arParams["DISPLAY_ELEMENT_COUNT"] !== "N" && isset($ar["ELEMENT_COUNT"])):?>
							<ins class="elCount" data-role="count_<?=$ar["CONTROL_ID"]?>">(<?=$ar["ELEMENT_COUNT"]?>)</ins>
						<?endif;?>
					</label>
				</li>
			<?endforeach;?>

			<?if(count($arItem["VALUES"]) > 5):?>
				<li><a href="#" class="showALL"><?=GetMessage("CT_BCSF_FILTER_SHOW_ALL")?> <?=count($arItem["VALUES"])-5?></a></li>
			<?endif;?>
		</ul>
		*/?>

		<?}?>
		<div class="aside__filter__item btn-wr mob-hidden">
			<a href="#" id="del_filter" class="btn gray" title="">Очистить фильтры</a>
		</div>
		<div class="aside__filter__item btn-wr mobile-filter-active">
			<a href="#" id="del_filter" class="btn gray" title="">Очистить</a>
			<a href="#" class="btn appruve" title=""><span>Готово</span></a>
		</div>
		<? /*
		<div id="modef" <?=(!isset($arResult["ELEMENT_COUNT"])) ? 'style="display:none"' : 'style="display: inline-block;"';?>>
			<a href="#" class="close"><i class="fa fa-times" aria-hidden="true"></i></a>
			<?=GetMessage("CT_BCSF_FILTER_COUNT", array("#ELEMENT_COUNT#" => '<span id="modef_num">'.intval($arResult["ELEMENT_COUNT"]).'</span>'));?>
			<a href="<?=$arResult["FILTER_URL"]?>" id="modef_send" class="modef_send_link"><?=GetMessage("CT_BCSF_FILTER_SHOW")?></a>
		</div>
		<div id="smartFilterControls">
			<a id="set_filter" class="button button--green" href="#"><?=GetMessage("CT_BCSF_SET_FILTER")?> <span id="set_filter_num"></span></a>
			<a id="del_filter" href="#"></a>
		</div>
		*/?>
	</form>
</div>


<?if(false):?>




<div id="smartFilter">
	<span class="filter-title"><?=GetMessage("CT_BCSF_FILTER_TITLE")?></span>
	<form name="<?=$arResult["FILTER_NAME"]."_form"?>" action="<?=$arResult["FORM_ACTION"]?>" method="GET" id="smartFilterForm">
		<?foreach($arResult["HIDDEN"] as $arItem):?>
		<input type="hidden" name="<?=$arItem["CONTROL_NAME"]?>" id="<?=$arItem["CONTROL_ID"]?>" value="<?=$arItem["HTML_VALUE"]?>" />
		<?endforeach;?>

		<?foreach($arResult["ITEMS"] as $key => $arItem)//prices
		{
			$key = $arItem["ENCODED_ID"];
			if(isset($arItem["PRICE"])):
				if ($arItem["VALUES"]["MAX"]["VALUE"] - $arItem["VALUES"]["MIN"]["VALUE"] <= 0)
					continue;

				$precision = 2;
				if (Bitrix\Main\Loader::includeModule("currency")) {
					$res = CCurrencyLang::GetFormatDescription($arItem["VALUES"]["MIN"]["CURRENCY"]);
					$precision = $res["DECIMALS"];
				}
				?>
				<div class="paramsBox">
					<div class="paramsBoxTitle">
						<span><?=preg_replace("/\[.*\]/", "", $arItem["NAME"])?></span>
					</div>
 					<ins class="propExpander expanded"></ins>
					<div class="params">
						<div class="rangeSlider" id="sl_<?=$arItem["ID"]?>">
							<label><?=GetMessage("CT_BCSF_FILTER_FROM")?></label><input name="<?=$arItem["VALUES"]["MIN"]["CONTROL_NAME"]?>" type="text" value="<?=empty($arItem["VALUES"]["MIN"]["HTML_VALUE"]) ? round($arItem["VALUES"]["MIN"]["VALUE"]) : round($arItem["VALUES"]["MIN"]["HTML_VALUE"])?>" id="<?=$arItem["VALUES"]["MIN"]["CONTROL_ID"]?>" onchange="smartFilter.keyup(this)" data-default="<?=round($arItem["VALUES"]["MIN"]["VALUE"])?>" data-val="<?=round($arItem["VALUES"]["MIN"]["VALUE"])?>">
							<label><?=GetMessage("CT_BCSF_FILTER_TO")?></label><input name="<?=$arItem["VALUES"]["MAX"]["CONTROL_NAME"]?>" type="text" value="<?=empty($arItem["VALUES"]["MAX"]["HTML_VALUE"]) ? round($arItem["VALUES"]["MAX"]["VALUE"]) : round($arItem["VALUES"]["MAX"]["HTML_VALUE"])?>" id="<?=$arItem["VALUES"]["MAX"]["CONTROL_ID"]?>" onchange="smartFilter.keyup(this)" data-default="<?=round($arItem["VALUES"]["MAX"]["VALUE"])?>" data-val="<?=round($arItem["VALUES"]["MAX"]["VALUE"])?>">
							<div class="slider">
								<div class="handler">
									<div class="blackoutLeft"><ins id="s_<?=$arItem["VALUES"]["MIN"]["CONTROL_ID"]?>" class="left"></ins></div>
									<div class="blackoutRight"><ins id="s_<?=$arItem["VALUES"]["MAX"]["CONTROL_ID"]?>" class="right"></ins></div>
								</div>
							</div>
						</div>
					</div>	


					<script>
						$(function(){
							$("#sl_<?=$arItem["ID"]?>").rangeSlider({
								min: <?=round($arItem["VALUES"]["MIN"]["VALUE"])?>,
								max: <?=round($arItem["VALUES"]["MAX"]["VALUE"])?>,
								step: 1,
								leftButton: '#s_<?=$arItem["VALUES"]["MIN"]["CONTROL_ID"]?>',
								rightButton: '#s_<?=$arItem["VALUES"]["MAX"]["CONTROL_ID"]?>',
								inputLeft: '#<?=$arItem["VALUES"]["MIN"]["CONTROL_ID"]?>',
								inputRight: '#<?=$arItem["VALUES"]["MAX"]["CONTROL_ID"]?>'
							});
						});
					</script>
				</div>
			<?endif;
		}

		//not prices
		foreach($arResult["ITEMS"] as $key => $arItem)
		{
			if(empty($arItem["VALUES"])	|| isset($arItem["PRICE"])){
				continue;
			}

			if(($arItem["DISPLAY_TYPE"] == "A" || $arItem["DISPLAY_TYPE"] == "B") && ($arItem["VALUES"]["MAX"]["VALUE"] - $arItem["VALUES"]["MIN"]["VALUE"] <= 0)){
				continue;
			}
			?>
			<div class="paramsBox">
				<div class="paramsBoxTitle">
					<?if ($arItem["FILTER_HINT"] <> ""):?>
						<div class="hint">
							<div class="hintValue">
								<?=$arItem["FILTER_HINT"]?>
								<ins class="close">&times;</ins>
							</div>
						</div>
					<?endif?>
					<span><?=preg_replace("/\[.*\]/", "", $arItem["NAME"])?></span>
					<i class="fa fa-angle-right propExpander <?if ($arItem["DISPLAY_EXPANDED"]== "Y"):?>expanded<?else:?><?endif?>" aria-hidden="true"></i>
						<? /*
					<ins class="propExpander <?if ($arItem["DISPLAY_EXPANDED"]== "Y"):?>expanded<?else:?><?endif?>"></ins>
						*/?>
				</div> 
				<div class="params <?if ($arItem["DISPLAY_EXPANDED"]== "Y"):?> <?else:?>collapsed<?endif?>">
					<?
					$arCur = current($arItem["VALUES"]);
					switch ($arItem["DISPLAY_TYPE"])
					{
						case "A"://NUMBERS_WITH_SLIDER
							?>
						<div class="rangeSlider" id="sl_<?=$arItem["ID"]?>">
							<label><?=GetMessage("CT_BCSF_FILTER_FROM")?></label><input name="<?=$arItem["VALUES"]["MIN"]["CONTROL_NAME"]?>" type="text" value="<?=empty($arItem["VALUES"]["MIN"]["HTML_VALUE"]) ? round($arItem["VALUES"]["MIN"]["VALUE"]) : round($arItem["VALUES"]["MIN"]["HTML_VALUE"])?>" id="<?=$arItem["VALUES"]["MIN"]["CONTROL_ID"]?>" onchange="smartFilter.keyup(this)" data-default="<?=round($arItem["VALUES"]["MIN"]["VALUE"])?>" data-val="<?=empty($arItem["VALUES"]["MIN"]["HTML_VALUE"]) ? round($arItem["VALUES"]["MIN"]["VALUE"]) : round($arItem["VALUES"]["MIN"]["HTML_VALUE"])?>">
							<label><?=GetMessage("CT_BCSF_FILTER_TO")?></label><input name="<?=$arItem["VALUES"]["MAX"]["CONTROL_NAME"]?>" type="text" value="<?=empty($arItem["VALUES"]["MAX"]["HTML_VALUE"]) ? round($arItem["VALUES"]["MAX"]["VALUE"]) : round($arItem["VALUES"]["MAX"]["HTML_VALUE"])?>" id="<?=$arItem["VALUES"]["MAX"]["CONTROL_ID"]?>" onchange="smartFilter.keyup(this)" data-default="<?=round($arItem["VALUES"]["MAX"]["VALUE"])?>" data-val="<?=empty($arItem["VALUES"]["MAX"]["HTML_VALUE"]) ? round($arItem["VALUES"]["MAX"]["VALUE"]) : round($arItem["VALUES"]["MAX"]["HTML_VALUE"])?>">
							
							<div class="slider">
								<div class="handler">
									<div class="blackoutLeft"><ins id="s_<?=$arItem["VALUES"]["MIN"]["CONTROL_ID"]?>" class="left"></ins></div>
									<div class="blackoutRight"><ins id="s_<?=$arItem["VALUES"]["MAX"]["CONTROL_ID"]?>" class="right"></ins></div>
								</div>
							</div>
						</div>
						<script>
							$(function(){
								$('#sl_<?=$arItem["ID"]?>').rangeSlider({
									min: <?=round($arItem["VALUES"]["MIN"]["VALUE"])?>,
									max: <?=round($arItem["VALUES"]["MAX"]["VALUE"])?>,
									step: 1,
									leftButton: '#s_<?=$arItem["VALUES"]["MIN"]["CONTROL_ID"]?>',
									rightButton: '#s_<?=$arItem["VALUES"]["MAX"]["CONTROL_ID"]?>',
									inputLeft: '#<?=$arItem["VALUES"]["MIN"]["CONTROL_ID"]?>',
									inputRight: '#<?=$arItem["VALUES"]["MAX"]["CONTROL_ID"]?>'
								});
							});
						</script>
							<?
							break;
						case "B"://NUMBERS
							?>
							<div class="rangeSlider">
								<label><?=GetMessage("CT_BCSF_FILTER_FROM")?></label><input name="<?=$arItem["VALUES"]["MIN"]["CONTROL_NAME"]?>" type="text" value="<?=empty($arItem["VALUES"]["MIN"]["HTML_VALUE"]) ? round($arItem["VALUES"]["MIN"]["VALUE"]) : round($arItem["VALUES"]["MIN"]["HTML_VALUE"])?>" id="<?=$arItem["VALUES"]["MIN"]["CONTROL_ID"]?>" onchange="smartFilter.keyup(this)" data-default="<?=round($arItem["VALUES"]["MIN"]["VALUE"])?>" data-val="<?=empty($arItem["VALUES"]["MIN"]["HTML_VALUE"]) ? round($arItem["VALUES"]["MIN"]["VALUE"]) : round($arItem["VALUES"]["MIN"]["HTML_VALUE"])?>">
								<label><?=GetMessage("CT_BCSF_FILTER_TO")?></label><input name="<?=$arItem["VALUES"]["MAX"]["CONTROL_NAME"]?>" type="text" value="<?=empty($arItem["VALUES"]["MAX"]["HTML_VALUE"]) ? round($arItem["VALUES"]["MAX"]["VALUE"]) : round($arItem["VALUES"]["MAX"]["HTML_VALUE"])?>" id="<?=$arItem["VALUES"]["MAX"]["CONTROL_ID"]?>" onchange="smartFilter.keyup(this)" data-default="<?=round($arItem["VALUES"]["MAX"]["VALUE"])?>" data-val="<?=empty($arItem["VALUES"]["MAX"]["HTML_VALUE"]) ? round($arItem["VALUES"]["MAX"]["VALUE"]) : round($arItem["VALUES"]["MAX"]["HTML_VALUE"])?>">
							</div>
							<?
							break;
						case "G"://CHECKBOXES_WITH_PICTURES
							?>
							<?$i = 0;?>
							<ul class="checkboxList inline">
							<?foreach ($arItem["VALUES"] as $val => $ar):
								$i++;
								$class = "";

								if ($ar["CHECKED"])
									$class.= "selected ";
								if ($ar["DISABLED"])
									$class.= "disabled ";
							?>
								<li class="<?=($i > 5) ? "off" : ""?>">
									<input
										type="checkbox"
										name="<?=$ar["CONTROL_NAME"]?>"
										id="<?=$ar["CONTROL_ID"]?>"
										value="<?=$ar["HTML_VALUE"]?>"
										<?=$ar["CHECKED"]? 'checked="checked"': ''?>
										<?=$ar["DISABLED"] ? 'disabled="disabled"': ''?>
									/>
									<label for="<?=$ar["CONTROL_ID"]?>" class="<?=$class?>" data-role="label_<?=$ar["CONTROL_ID"]?>" onclick="smartFilter.keyup(BX('<?=CUtil::JSEscape($ar["CONTROL_ID"])?>')); BX.toggleClass(this, 'selected');">
										<?if (isset($ar["FILE"]) && !empty($ar["FILE"]["SRC"])):?>
											<span class="icon">
												<span class="wrap" style="background-image:url('<?=$ar["FILE"]["SRC"]?>');"></span>
											</span>
										<?endif?>
									</label>
							<?endforeach?>
							</ul>
							<?
							break;
						case "H"://CHECKBOXES_WITH_PICTURES_AND_LABELS
							?>
							<?$i = 0;?>
							<ul class="checkboxList">
							<?foreach ($arItem["VALUES"] as $val => $ar):
								$i++;
								$class = "";

								if ($ar["CHECKED"])
									$class.= "selected ";
								if ($ar["DISABLED"])
									$class.= "disabled ";
							?>
								<li class="<?=($i > 5) ? "off" : ""?>">
									<input
										type="checkbox"
										name="<?=$ar["CONTROL_NAME"]?>"
										id="<?=$ar["CONTROL_ID"]?>"
										value="<?=$ar["HTML_VALUE"]?>"
										<?=$ar["CHECKED"]? 'checked="checked"': ''?>
										<?=$ar["DISABLED"] ? 'disabled="disabled"': ''?>
									/>
									<label for="<?=$ar["CONTROL_ID"]?>" data-role="label_<?=$ar["CONTROL_ID"]?>" class="<?=$class?>" onclick="smartFilter.keyup(BX('<?=CUtil::JSEscape($ar["CONTROL_ID"])?>')); BX.toggleClass(this, 'selected');">
										<?if (isset($ar["FILE"]) && !empty($ar["FILE"]["SRC"])):?>
											<span class="icon">
												<span class="wrap" style="background-image:url('<?=$ar["FILE"]["SRC"]?>');"></span>
											</span>
										<?endif?>
										<span class="value">
											<?=$ar["VALUE"];?> 
											<?if ($arParams["DISPLAY_ELEMENT_COUNT"] !== "N" && isset($ar["ELEMENT_COUNT"])):?>
												<ins class="elCount" data-role="count_<?=$ar["CONTROL_ID"]?>">(<?=$ar["ELEMENT_COUNT"]?>)</ins>
											<?endif;?>
										</span>
									</label>
								</li>
							<?endforeach?>
							</ul>
							<?
							break;
						case "P": //DROPDOWN
							$checkedItemExist = false;
							$checkedItemValue = GetMessage("CT_BCSF_FILTER_ALL");
							?>

							<?
							foreach ($arItem["VALUES"] as $val => $ar) {
								if ($ar["CHECKED"]) {
									$checkedItemExist = true;
									$checkedItemValue = $ar["VALUE"];
								}
							}
							?>

							<div class="dropdown">
								<span class="checkedItem"><?=$checkedItemValue?></span>

								<ul class="dropdownList">
									<li>
										<label for="<?="all_".$arCur["CONTROL_ID"]?>" class="item" onclick="smartFilter.selectDropDownItem(this, '<?=CUtil::JSEscape("all_".$arCur["CONTROL_ID"])?>')"><?=GetMessage("CT_BCSF_FILTER_ALL")?></label>
										<input
											type="radio"
											name="<?=$arCur["CONTROL_NAME_ALT"]?>"
											id="<?="all_".$arCur["CONTROL_ID"]?>"
											value=""
										/>
									</li>
									<?foreach ($arItem["VALUES"] as $val => $ar):
										$class = "";
										if ($ar["CHECKED"])
											$class.= " selected";
										if ($ar["DISABLED"])
											$class.= " disabled";
									?>
										<li class="<?=$class?>">
											<input
												type="radio"
												name="<?=$ar["CONTROL_NAME_ALT"]?>"
												id="<?=$ar["CONTROL_ID"]?>"
												value="<?=$ar["HTML_VALUE_ALT"]?>"
												<?=$ar["CHECKED"] ? 'checked="checked"': '' ?>
												<?=$ar["DISABLED"] ? 'disabled="disabled"': '' ?>
											/>
											<label for="<?=$ar["CONTROL_ID"]?>" data-role="label_<?=$ar["CONTROL_ID"]?>" class="item" onclick="smartFilter.selectDropDownItem(this, '<?=CUtil::JSEscape($ar["CONTROL_ID"])?>')">
												<?=$ar["VALUE"]?>
												<?if ($arParams["DISPLAY_ELEMENT_COUNT"] !== "N" && isset($ar["ELEMENT_COUNT"])):?>
													<ins class="elCount" data-role="count_<?=$ar["CONTROL_ID"]?>">(<?=$ar["ELEMENT_COUNT"]?>)</ins>
												<?endif;?>
											</label>
										</li>
									<?endforeach?>
								</ul>
							</div>
							<?
							break;
						case "R"://DROPDOWN_WITH_PICTURES_AND_LABELS
							$checkedItemExist = false;
							$checkedItemValue = GetMessage("CT_BCSF_FILTER_ALL");
							$checkedItemPicSrc = "";

							foreach ($arItem["VALUES"] as $val => $ar) {
								if ($ar["CHECKED"]) {

									if (isset($ar["FILE"]) && !empty($ar["FILE"]["SRC"])) {
										$checkedItemPicSrc = $ar["FILE"]["SRC"];
									}
								
									$checkedItemExist = true;
									$checkedItemValue = $ar["VALUE"];
								}
							}?>

							<div class="dropdown pics">
								<span class="checkedItem">
									<label for="<?="all_".$arCur["CONTROL_ID"]?>" class="dropdownTrigger">
										<span class="icon">
											<span class="wrap" style="background-image: url(<?=$checkedItemPicSrc?>)"></span>
										</span>
										<span class="value"><?=$checkedItemValue?></span> 
									</label>
								</span>

								<ul class="dropdownList">
									<li>
										<label for="<?="all_".$arCur["CONTROL_ID"]?>" class="item" onclick="smartFilter.selectDropDownItem(this, '<?=CUtil::JSEscape("all_".$arCur["CONTROL_ID"])?>')">
											<span class="icon">
												<span class="wrap"></span>
											</span>
											<span class="value"><?=GetMessage("CT_BCSF_FILTER_ALL")?></span>
										</label>
										<input
											type="radio"
											name="<?=$arCur["CONTROL_NAME_ALT"]?>"
											id="<?="all_".$arCur["CONTROL_ID"]?>"
											value=""
										/>
									</li>
									<?
									foreach ($arItem["VALUES"] as $val => $ar):
										$class = "";
										if ($ar["CHECKED"])
											$class.= " selected";
										if ($ar["DISABLED"])
											$class.= " disabled";
									?>
										<li class="<?=$class?>">
											<input
												type="radio"
												name="<?=$ar["CONTROL_NAME_ALT"]?>"
												id="<?=$ar["CONTROL_ID"]?>"
												value="<?=$ar["HTML_VALUE_ALT"]?>"
												<?=$ar["CHECKED"] ? 'checked="checked"': '' ?>
												<?=$ar["DISABLED"] ? 'disabled="disabled"': '' ?>
											/>
											<label for="<?=$ar["CONTROL_ID"]?>" data-role="label_<?=$ar["CONTROL_ID"]?>" class="item" onclick="smartFilter.selectDropDownItem(this, '<?=CUtil::JSEscape($ar["CONTROL_ID"])?>')">
												<?if (isset($ar["FILE"]) && !empty($ar["FILE"]["SRC"])):?>
													<span class="icon">
														<span class="wrap" style="background-image:url('<?=$ar["FILE"]["SRC"]?>');"></span>
													</span>	
												<?endif?>
												<span class="value">
													<?=$ar["VALUE"]?>
													<?if ($arParams["DISPLAY_ELEMENT_COUNT"] !== "N" && isset($ar["ELEMENT_COUNT"])):?>
														<ins class="elCount" data-role="count_<?=$ar["CONTROL_ID"]?>">(<?=$ar["ELEMENT_COUNT"]?>)</ins>
													<?endif;?>
												</span>
											</label>
										</li>
									<?endforeach?>
								</ul>
							</div>
									
							<?
							break;
						case "K"://RADIO_BUTTONS
							?>
							<?$i = 0;?>
							<ul class="radio">
								<li>
									<input
										type="radio"
										value=""
										name="<?=$arCur["CONTROL_NAME_ALT"] ?>"
										id="<?="all_".$arCur["CONTROL_ID"] ?>"
										onclick="smartFilter.click(this)"
									/>
									<label for="<?="all_".$arCur["CONTROL_ID"] ?>">
										<?=GetMessage("CT_BCSF_FILTER_ALL")?>
									</label>
								</li>
							<?foreach($arItem["VALUES"] as $val => $ar):?><?$i++?>
								<li class="<?=($i > 4) ? "off" : ""?>">
									<input
										type="radio"
										value="<?=$ar["HTML_VALUE_ALT"]?>"
										name="<?=$ar["CONTROL_NAME_ALT"]?>"
										id="<?=$ar["CONTROL_ID"]?>"
										onclick="smartFilter.click(this)"
										<?=$ar["CHECKED"] ? 'checked="checked"': '' ?>
										<?=$ar["DISABLED"] ? 'disabled="disabled"': '' ?>
									/>
									<label for="<? echo $ar["CONTROL_ID"] ?>" data-role="label_<?=$ar["CONTROL_ID"]?>">
										<?=$ar["VALUE"];?>
										<?if ($arParams["DISPLAY_ELEMENT_COUNT"] !== "N" && isset($ar["ELEMENT_COUNT"])):?>
											<ins class="elCount" data-role="count_<?=$ar["CONTROL_ID"]?>">(<?=$ar["ELEMENT_COUNT"]?>)</ins>
										<?endif;?>
									</label>
								</li>
							<?endforeach;?>
							<?if(count($arItem["VALUES"]) > 4):?>
								<li><a href="#" class="showALL"><?=GetMessage("CT_BCSF_FILTER_SHOW_ALL")?> <?=count($arItem["VALUES"])-4?></a></li>
							<?endif;?>
							</ul>
							<?
							break;
						case "U"://CALENDAR
							?>
							<div class="filterCalendar">
								<?$APPLICATION->IncludeComponent(
									'bitrix:main.calendar',
									'',
									array(
										'FORM_NAME' => $arResult["FILTER_NAME"]."_form",
										'SHOW_INPUT' => 'Y',
										'INPUT_ADDITIONAL_ATTR' => 'class="calendar" placeholder="'.FormatDate("SHORT", $arItem["VALUES"]["MIN"]["VALUE"]).'" onkeyup="smartFilter.keyup(this)" onchange="smartFilter.keyup(this)"',
										'INPUT_NAME' => $arItem["VALUES"]["MIN"]["CONTROL_NAME"],
										'INPUT_VALUE' => $arItem["VALUES"]["MIN"]["HTML_VALUE"],
										'SHOW_TIME' => 'N',
										'HIDE_TIMEBAR' => 'Y',
									),
									null,
									array('HIDE_ICONS' => 'Y')
								);?>

								<i class="fakeCalendarIcon"></i>
							</div>
							<div class="filterCalendar">
								<?$APPLICATION->IncludeComponent(
									'bitrix:main.calendar',
									'',
									array(
										'FORM_NAME' => $arResult["FILTER_NAME"]."_form",
										'SHOW_INPUT' => 'Y',
										'INPUT_ADDITIONAL_ATTR' => 'class="calendar" placeholder="'.FormatDate("SHORT", $arItem["VALUES"]["MAX"]["VALUE"]).'" onkeyup="smartFilter.keyup(this)" onchange="smartFilter.keyup(this)"',
										'INPUT_NAME' => $arItem["VALUES"]["MAX"]["CONTROL_NAME"],
										'INPUT_VALUE' => $arItem["VALUES"]["MAX"]["HTML_VALUE"],
										'SHOW_TIME' => 'N',
										'HIDE_TIMEBAR' => 'Y',
									),
									null,
									array('HIDE_ICONS' => 'Y')
								);?>
								<i class="fakeCalendarIcon"></i>
							</div>
							<?
							break;
						default://CHECKBOXES
							?>
							<?$i = 0;?>
							<ul class="checkbox">
								<?foreach($arItem["VALUES"] as $val => $ar):?><?$i++;?>
									<li class="<?=($i > 5) ? "off" : ""?>">
										<input 
											type="checkbox"
											value="<?=$ar["HTML_VALUE"]?>"
											name="<?=$ar["CONTROL_NAME"]?>"
											id="<?=$ar["CONTROL_ID"]?>"
											onclick="smartFilter.click(this)" 
											<?=$ar["CHECKED"]? 'checked="checked"': ''?>
											<?=$ar["DISABLED"] ? 'disabled="disabled"': ''?>
										/>
										<label for="<?=$ar["CONTROL_ID"]?>" data-role="label_<?=$ar["CONTROL_ID"]?>" <?=$ar["DISABLED"] ? 'class="disabled"': ''?>>
											<?=$ar["VALUE"]?>
											<?if ($arParams["DISPLAY_ELEMENT_COUNT"] !== "N" && isset($ar["ELEMENT_COUNT"])):?>
												<ins class="elCount" data-role="count_<?=$ar["CONTROL_ID"]?>">(<?=$ar["ELEMENT_COUNT"]?>)</ins>
											<?endif;?>
										</label>
									</li>
								<?endforeach;?>

								<?if(count($arItem["VALUES"]) > 5):?>
									<li><a href="#" class="showALL"><?=GetMessage("CT_BCSF_FILTER_SHOW_ALL")?> <?=count($arItem["VALUES"])-5?></a></li>
								<?endif;?>
							</ul>
					<?
					}
					?>
				</div>
			</div>
		<?
		}
		?>
		<?/*
			<ul id="smartFilterControls">
				<li><a id="set_filter" class="button button--green" href="#"><?=GetMessage("CT_BCSF_SET_FILTER")?> <span id="set_filter_num"></span></a>
				<li><a id="del_filter" href="#"><?=GetMessage("CT_BCSF_DEL_FILTER")?></a>
			</ul>
		*/?>
		<div id="smartFilterControls">
			<a id="set_filter" class="button button--green" href="#"><?=GetMessage("CT_BCSF_SET_FILTER")?> <span id="set_filter_num"></span></a>
			<a id="del_filter" href="#"></a>
		</div>
		<div id="modef" <?=(!isset($arResult["ELEMENT_COUNT"])) ? 'style="display:none"' : 'style="display: inline-block;"';?>>
			<a href="#" class="close"><i class="fa fa-times" aria-hidden="true"></i></a>
			<?=GetMessage("CT_BCSF_FILTER_COUNT", array("#ELEMENT_COUNT#" => '<span id="modef_num">'.intval($arResult["ELEMENT_COUNT"]).'</span>'));?>
			<a href="<?=$arResult["FILTER_URL"]?>" id="modef_send" class="modef_send_link"><?=GetMessage("CT_BCSF_FILTER_SHOW")?></a>
		</div>
	</form>
</div>
<?endif;?>
<script>
	var smartFilter = new JCSmartFilter('<?=CUtil::JSEscape($arResult["FORM_ACTION"])?>', '<?=CUtil::JSEscape($arParams["FILTER_VIEW_MODE"])?>', <?=CUtil::PhpToJSObject($arResult["JS_FILTER_PARAMS"])?>);
	var	SMART_FILTER_LANG = {
		HIDE_ALL: "<?=GetMessage("FILTER_HIDE_ALL")?>",
		SHOW_ALL: "<?=GetMessage("FILTER_SHOW_ALL")?>"
	};
</script>