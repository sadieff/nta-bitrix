<?

class ClassForm
{
    // WEB-FORMS ###############################
    public static function onBeforeResultAddHandler($WEB_FORM_ID, &$arFields, &$arrVALUES) 
    {
        $arDealerField = array(
            // form id => field name
            2 => 'form_hidden_30',
            3 => 'form_hidden_36',
            5 => 'form_hidden_32',
            6 => 'form_hidden_31',
            7 => 'form_hidden_68', // заказ двери
        );
        $arSourceField = array(
            // form id => field name
            2 => 'form_hidden_33',
            3 => 'form_hidden_37',
            5 => 'form_hidden_34',
            //6 => 'form_hidden_35',
            7 => 'form_hidden_69', // заказ двери
        );
        if (array_key_exists($WEB_FORM_ID, $arDealerField) && check_email(CN_CITY_EMAIL)) {
            $arrVALUES[$arDealerField[$WEB_FORM_ID]] = CN_CITY_EMAIL;
        }

        if ($WEB_FORM_ID && array_key_exists($WEB_FORM_ID, $arSourceField) && CModule::IncludeModule("iblock")) {
            //$val = COption::GetOptionString('cn.b24conn', 'LEAD_SOURCE_ID', '');
            //CNLog::Add('web form values: '.print_r($arrVALUES, true));

            $host = $_SERVER['HTTP_HOST'];
            $dbElm = CIBlockElement::GetList(array(),
                array('IBLOCK_ID'=>CN_CITY_IBLOCK_ID,'=CODE'=>$host),
                false, false,
                array('ID','IBLOCK_ID','CODE','PROPERTY_SOURCE_ID')
            );
            if (($arElm = $dbElm->Fetch()) && !empty($arElm['PROPERTY_SOURCE_ID_VALUE'])) {
                $arrVALUES[$arSourceField[$WEB_FORM_ID]] = $arElm['PROPERTY_SOURCE_ID_VALUE'];
            }

        }
		
		if (
			$WEB_FORM_ID == 5 &&
			strpos($arrVALUES['form_text_297'], 'kak-stat-dilerom') !== false
		)
		{
			$arrVALUES['form_text_297'] = 'Как стать дилером';
        }
		
		if (
			$WEB_FORM_ID == 3 &&
			strlen($arrVALUES['form_text_13']) < 18
		)
		{
			//$arrVALUES['form_hidden_94'] = strlen($arrVALUES['form_text_13']);
			
			/* $APPLICATION->ThrowException('Введите корректный номер телефона');*/
			return false; 
        }
		
		

        //CNLog::Add('web form ID: '.$WEB_FORM_ID);
        //CNLog::Add('web form host: '.$_SERVER['HTTP_HOST']);
        //CNLog::Add('web form city id: ' . CN_CITY_ID);
        //CNLog::Add('web form Values: '.print_r($arrVALUES, true));
        //CNLog::Add('web form Fields: '.print_r($arFields, true));


        /*
        $arrVALUES['form_textarea_ADDITIONAL_283'] = $arrVALUES['utm_source'];
        $arrVALUES['form_textarea_ADDITIONAL_284'] = $arrVALUES['utm_medium'];
        $arrVALUES['form_textarea_ADDITIONAL_285'] = $arrVALUES['utm_campaign'];
        $arrVALUES['form_textarea_ADDITIONAL_286'] = $arrVALUES['utm_content'];
        $arrVALUES['form_textarea_ADDITIONAL_287'] = $arrVALUES['utm_term'];
        $arrVALUES['form_textarea_ADDITIONAL_288'] = 'WEB';
    */
    }
}

