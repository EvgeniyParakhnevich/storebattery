<?
	function getComponentHTML($name, $template = "", $arParams = array()){

        //globals
        global $APPLICATION;

        //vars
        $componentResult = false;

        //check args
        if(!empty($name)){

            //start buffer
            ob_start();

            //get component
            $APPLICATION->IncludeComponent($name, $template, $arParams);

            //write buffer
            $componentResult = ob_get_contents();

            //clear buffer
            ob_end_clean();

        }

        //result
        return $componentResult;

    }

	function convertEncoding($data){

        //array
        if(is_array($data)){
            return array_map(function($value){
                return \Bitrix\Main\Text\Encoding::convertEncoding($value, "UTF-8", LANG_CHARSET);
            }, $data);
        }

        //string
        else{
            return !defined("BX_UTF") ? \Bitrix\Main\Text\Encoding::convertEncoding($data, "UTF-8", LANG_CHARSET) : $data;
        }

    }


	//set siteId from request
	if(!empty($_REQUEST["siteId"])){
		define("SITE_ID", $_REQUEST["siteId"]);
	}

	//increase productivity
	define("STOP_STATISTICS", true);
	define("NO_AGENT_CHECK", true);

	//load bitrix core
	require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");

	//load modules
	// if(!\Bitrix\Main\Loader::includeModule("dw.deluxe")){
	// 	die;
	// }

	//application
	$application = \Bitrix\Main\Application::getInstance();

	//context
	$context = $application->getContext();

	//get request
	$request = $context->getRequest();

	//get request vars
	$actionType = $request->getPost("actionType");

	//get transmitted data
	$arTransmitted = $request->getPostList()->toArray();
	
	//check encoding
	if(!defined("BX_UTF")){
		$arTransmitted = convertEncoding($arTransmitted);
	}

	//check action type
	if($actionType == "getSection"){

		//check
		if(!empty($arTransmitted)){

			//vars
			$arReturn = array();

            //set filter
            if(!empty($arTransmitted["component"]["arParams"]["FILTER_NAME"]) && !empty($arTransmitted["component"]["filter"])){
                ${$arTransmitted["component"]["arParams"]["FILTER_NAME"]} = $arTransmitted["component"]["filter"];
            }

			//sort
			if(!empty($arTransmitted["direction"]["SORT_FIELD"]) && !empty($arTransmitted["additonal"]["SORT"][$arTransmitted["direction"]["SORT_FIELD"]["ID"]])){
				setcookie("CATALOG_SORT_FIELD", $arTransmitted["direction"]["SORT_FIELD"]["ID"], (time() + 60 * 60 * 24 * 30 * 12 * 2), "/");
				$arTransmitted["component"]["arParams"]["ELEMENT_SORT_FIELD"] = $arTransmitted["additonal"]["SORT"][$arTransmitted["direction"]["SORT_FIELD"]["ID"]]["CODE"];
				$arTransmitted["component"]["arParams"]["ELEMENT_SORT_ORDER"] = $arTransmitted["additonal"]["SORT"][$arTransmitted["direction"]["SORT_FIELD"]["ID"]]["ORDER"];
			}

			elseif(!empty($_COOKIE["CATALOG_SORT_FIELD"]) && !empty($arTransmitted["additonal"]["SORT"][$_COOKIE["CATALOG_SORT_FIELD"]])){ // COOKIE
				$arTransmitted["component"]["arParams"]["ELEMENT_SORT_FIELD"] = $arTransmitted["additonal"]["SORT"][$_COOKIE["CATALOG_SORT_FIELD"]]["CODE"];
				$arTransmitted["component"]["arParams"]["ELEMENT_SORT_ORDER"] = $arTransmitted["additonal"]["SORT"][$_COOKIE["CATALOG_SORT_FIELD"]]["ORDER"];
			}

			//sort to
			if(!empty($arTransmitted["direction"]["SORT_TO"]) && $arTransmitted["additonal"]["SORT_NUMBER"][$arTransmitted["direction"]["SORT_TO"]]){
				setcookie("CATALOG_SORT_TO", $arTransmitted["direction"]["SORT_TO"], (time() + 60 * 60 * 24 * 30 * 12 * 2), "/");
				$arTransmitted["component"]["arParams"]["PAGE_ELEMENT_COUNT"] = $arTransmitted["direction"]["SORT_TO"];
			}

			elseif(!empty($_COOKIE["CATALOG_SORT_TO"]) && $arTransmitted["additonal"]["SORT_NUMBER"][$_COOKIE["CATALOG_SORT_TO"]]){
				$arTransmitted["component"]["arParams"]["PAGE_ELEMENT_COUNT"] = $_COOKIE["CATALOG_SORT_TO"];
			}

			//view
			if(!empty($arTransmitted["direction"]["VIEW"]) && $arTransmitted["additonal"]["TEMPLATES"][$arTransmitted["direction"]["VIEW"]]){
				setcookie("CATALOG_VIEW", $arTransmitted["direction"]["VIEW"], (time() + 60 * 60 * 24 * 30 * 12 * 2), "/");
				$arTransmitted["component"]["arParams"]["CATALOG_TEMPLATE"] = $arTransmitted["direction"]["VIEW"];
			}

			elseif(!empty($_COOKIE["CATALOG_VIEW"]) && $arTransmitted["additonal"]["TEMPLATES"][$_COOKIE["CATALOG_VIEW"]]){
				$arTransmitted["component"]["arParams"]["CATALOG_TEMPLATE"] = $_COOKIE["CATALOG_VIEW"];
			}

			//set base link
			if(!empty($arTransmitted["urlPath"])){
				$arTransmitted["component"]["arParams"]["PAGER_BASE_LINK"] = $arTransmitted["urlPath"];
			}

			//push component
			$arReturn["COMPONENT_HTML"] = getComponentHTML(
				$arTransmitted["component"]["name"],
				!empty($arTransmitted["component"]["arParams"]["CATALOG_TEMPLATE"]) ? strtolower($arTransmitted["component"]["arParams"]["CATALOG_TEMPLATE"]) : $arTransmitted["component"]["template"],
				$arTransmitted["component"]["arParams"]
			);

			//print json
			echo \Bitrix\Main\Web\Json::encode($arReturn);

		}

	}

?>