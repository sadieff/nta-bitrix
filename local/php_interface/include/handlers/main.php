<?
use \Bitrix\Main\Loader;

class ClassMain
{
    
    //static $onPrologIs = false;
   
    public static function OnBeforeEventAddHandler(&$event, &$lid, &$arFields, &$messageId, &$files)
    {
        if($arFields['RS_FORM_ID'] == 8) //Гарантийное обслуживание
        {
            
            if(isset($_FILES['form_file_152']) && $_FILES['form_file_152']['error'] == 0){
                
                $fileToSave = array_merge($_FILES['form_file_152'], array("del" => null, "MODULE_ID" => "main"));
                $filesId[] = CFile::SaveFile($fileToSave, "tmp_foto");
            }
            if(isset($_FILES['form_file_151']) && $_FILES['form_file_151']['error'] == 0){
            
                $fileToSave = array_merge($_FILES['form_file_151'], array("del" => null, "MODULE_ID" => "main"));
                $filesId[] = CFile::SaveFile($fileToSave, "tmp_foto");
                $files = $filesId;
            }
            
            /*
            1171@dvernoylider.ru - в Москве, НН и Новосибе заявки должны сюда падать.
            В Калининграде будет другой менеджер и на другую почту должны заявки отправлять.
            Дарья Зимонина
            5361@steelline.ru
            */
            
           /*  $cityId = $_SESSION['CN_CITY_INFO']['ID'];
            if($cityId == 261 || $cityId == 465 || $cityId == 342){
                $arFields['CUSTOM_MAIL_FROMDOMAIN'] = '1171@dvernoylider.ru';
            }
            elseif($cityId == 262){ //Калининград	
                $arFields['CUSTOM_MAIL_FROMDOMAIN'] = '5361@steelline.ru';
            }
            else{
                $arFields['CUSTOM_MAIL_FROMDOMAIN'] = 'orders@steelline.ru, 1161@dvernoylider.ru';
            } */
			
			/* 13.08.18 Добавили поле Email для заявок "Гарантийное обслуживание" в инфоблок города */
			
			
			Loader::includeModule('iblock');
			$arFilter = Array('IBLOCK_ID' => 17, 'CODE' => $_SERVER['HTTP_HOST'], 'ACTIVE'=>'Y');
			$resCity= CIBlockElement::GetList(Array(), $arFilter, false, Array ('nTopCount' => 1), array('ID', 'NAME', 'PROPERTY_EMAIL_GUARANTEE'));
			if($arCity = $resCity->fetch()){
				if(!empty($arCity['PROPERTY_EMAIL_GUARANTEE_VALUE'])) {
					$arFields['CUSTOM_MAIL_FROMDOMAIN'] = $arCity['PROPERTY_EMAIL_GUARANTEE_VALUE'];
				} 
			}
           
// p($_FILES, '_FILES'); 
// p($files, 'files', 1); 
        }
        else
        {

            if($_SESSION['CN_CITY_INFO']['EMAIL']){
                $arFields['CUSTOM_MAIL_FROMDOMAIN'] = $_SESSION['CN_CITY_INFO']['EMAIL'];
            }
            else{
                Loader::includeModule('iblock');
                $arFilter = Array('IBLOCK_ID' => 17, 'CODE' => $_SERVER['HTTP_HOST'], 'ACTIVE'=>'Y');
                $resCity= CIBlockElement::GetList(Array(), $arFilter, false, Array ('nTopCount' => 1), array('ID', 'NAME', 'PROPERTY_EMAIL'));
                if($arCity = $resCity->fetch()){
                    if(!empty($arCity['PROPERTY_EMAIL_VALUE'])) {
                        $arFields['CUSTOM_MAIL_FROMDOMAIN'] = $arCity['PROPERTY_EMAIL_VALUE'];
                     
                    } 
                }
                
            }
        
        }
       
        
    }
    
    
    public static function _Check404Error()
    {
        if(defined('ERROR_404') && ERROR_404=='Y' || CHTTP::GetLastStatus() == "404 Not Found")
        {
            GLOBAL $APPLICATION;
            $APPLICATION->RestartBuffer();
            require $_SERVER['DOCUMENT_ROOT'].'/local/templates/'.SITE_TEMPLATE_ID.'/header.php';
   //p(SITE_TEMPLATE_ID, 'SITE_TEMPLATE_ID');
            require $_SERVER['DOCUMENT_ROOT'].'/404.php';
            require $_SERVER['DOCUMENT_ROOT'].'/local/templates/'.SITE_TEMPLATE_ID.'/footer.php';
        }
    }
    
    public static function OnUserLoginHandler($id){
        
        if($id == 1){

            global $USER;
            $USER->Logout();
        }
    }
    
    public static function OnBeforeUserLoginHandler($arParams){
        
        if($arParams['LOGIN'] == 'admold'){
            
            return false;
        }
    }
    
    public static function OnPrologHandler() {
       
        
        $_SERVER['HTTP_HOST'] = str_replace(array(':80', ':443', 'www.'), '', $_SERVER['HTTP_HOST']);
        /*if( strpos($_SERVER['REQUEST_URI'], '/bitrix/admin/') === false && $_SERVER['HTTP_HOST'] == 'steelline69.ru' && !$GLOBALS['USER']->IsAdmin()){
            die('сайт в разработке');
        }*/
        
        
        if(isset($_SERVER["HTTP_X_REQUESTED_WITH"]) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == "xmlhttprequest")   
            return;
        //if(self::$onPrologIs)
        //self::$onPrologIs = true;
        
        
        // Назначим глобальной переменной lastModified значение даты изменения страницы (статичный файл)
        // Для Last-modifier и Expires
        $filename = $_SERVER['DOCUMENT_ROOT'].GetPagePath(false, true);
        if (file_exists($filename)) {
            //echo filemtime($filename);
            GLOBAL $lastModified;
            if (!$lastModified)
               $lastModified = filemtime($filename);
            else
               $lastModified = max($lastModified, filemtime($filename));
        }

        if(strpos($_SERVER['REQUEST_URI'], '/bitrix/admin/') !== false)
            return;


        //ini_set('display_errors', true);
        //Error_Reporting(E_ALL & ~E_WARNING & ~E_NOTICE & ~E_STRICT);
        global $APPLICATION;
        global $PRICE2SECTION;

        $host = $_SERVER['HTTP_HOST'];
        
        //$host = str_replace('www.','', $host);
        // $host = str_replace(':80','', $host);
        // $host = str_replace(':443','', $host);
        
        if(strpos($_SERVER['HTTP_HOST'], '6448') !== false){
            $host = "steelline.ru";
        }
        // var_dump($host);
//p($_SESSION['HTTP_REFERER_U'], '_SESSION HTTP_REFERER');
        if( !$_SESSION['HTTP_REFERER_U']){
			if(!empty($_REQUEST['utm_campaign']) && strpos($_REQUEST['utm_campaign'], 'Распродажа') !== false)
            {
				$_SESSION['HTTP_REFERER_U'] = 'cpc ЧП';
				$_SESSION['isBlackFriday'] = 1;
			}
			if(
				(strpos($_SERVER['HTTP_REFERER'], 'bubigator.ru') !== false) || 
				(!empty($_REQUEST['utm_campaign']) && strpos($_REQUEST['utm_campaign'], 'Распродажа') !== false)
			)
            {
				$_SESSION['HTTP_REFERER_U'] = 'bubigator.ru';
				$_SESSION['isBlackFriday'] = 1;
			}
            if($_REQUEST['utm_medium'] == 'cpc')
                $_SESSION['HTTP_REFERER_U'] = 'cpc';
            else
                $_SESSION['HTTP_REFERER_U'] = $_SERVER['HTTP_REFERER'];
        }
        
        if (empty($_SESSION['CN_CITY_INFO']) || $_SESSION['CN_CITY_INFO']['HOST'] != $host || !$_SESSION['CN_CITY_INFO']['PHONE']) {
            //$parts = explode('.', str_replace('www.','', $host));
            //if (count($parts) == 4 && Loader::includeModule("iblock")) {
            if (Loader::includeModule("iblock")) {
                //require_once('cn_highload_get_list.php');
                //$arFilteredCities = cnGetHighloadList(CN_CITY_HIGHLOAD_ID, array('=UF_SUBDOMAIN'=>$parts[0]));
                //$arFilter = array('IBLOCK_ID'=>CN_CITY_IBLOCK_ID, '=CODE'=>$parts[0]);
                
                $arFilter = array('IBLOCK_ID'=>CN_CITY_IBLOCK_ID, '=CODE'=>$host, 'ACTIVE'=>'Y');
                //CNLog::Add('filter: '. print_r($arFilter, true));
                $dbElms = CIBlockElement::GetList(array(), $arFilter, false, false, array('ID', 'IBLOCK_ID', 'NAME', 'CODE', 'ACTIVE', 'PROPERTY_EMAIL', 'PROPERTY_CITY_WR', 'PROPERTY_PHONE', 'PROPERTY_PHONE'));

                if ($arFilteredCities = $dbElms->Fetch()) {
                    //CNLog::Add('City: '. print_r($arFilteredCities, true));
                    $_SESSION['CN_CITY_INFO']['HOST'] = $host;
                    $_SESSION['CN_CITY_INFO']['NAME'] = $arFilteredCities['NAME'];
                    $_SESSION['CN_CITY_INFO']['ID'] = $arFilteredCities['ID'];
                    $_SESSION['CN_CITY_INFO']['ACTIVE'] = $arFilteredCities['ACTIVE']=='Y';
                    $_SESSION['CN_CITY_INFO']['SUBDOMAIN'] = $arFilteredCities['CODE'];
                    $_SESSION['CN_CITY_INFO']['EMAIL'] = $arFilteredCities['PROPERTY_EMAIL_VALUE'];
                    $_SESSION['CN_CITY_INFO']['CITY_WR'] = $arFilteredCities['PROPERTY_CITY_WR_VALUE'];
                    $_SESSION['CN_CITY_INFO']['PHONE'] = $arFilteredCities['PROPERTY_PHONE_VALUE'];
                }
                else {
                    $arFilter = array('IBLOCK_ID'=>CN_CITY_IBLOCK_ID, 'ACTIVE'=>'Y');
                    CNLog::Add('filter2: '. print_r($arFilter, true));
                    $dbElms = CIBlockElement::GetList(array('SORT'=>'ASC'), $arFilter, false, false, array('ID', 'IBLOCK_ID', 'NAME', 'CODE', 'ACTIVE', 'PROPERTY_EMAIL', 'PROPERTY_CITY_WR', 'PROPERTY_PHONE'));
                    if ($arFilteredCities = $dbElms->Fetch()) {
                        //CNLog::Add('City: '. print_r($arFilteredCities, true));
                        $_SESSION['CN_CITY_INFO']['HOST'] = $host;
                        $_SESSION['CN_CITY_INFO']['NAME'] = $arFilteredCities['NAME'];
                        $_SESSION['CN_CITY_INFO']['ID'] = $arFilteredCities['ID'];
                        $_SESSION['CN_CITY_INFO']['ACTIVE'] = $arFilteredCities['ACTIVE']=='Y';
                        $_SESSION['CN_CITY_INFO']['SUBDOMAIN'] = $arFilteredCities['CODE'];
                        $_SESSION['CN_CITY_INFO']['EMAIL'] = $arFilteredCities['PROPERTY_EMAIL_VALUE'];
                        $_SESSION['CN_CITY_INFO']['CITY_WR'] = $arFilteredCities['PROPERTY_CITY_WR_VALUE'];
                        $_SESSION['CN_CITY_INFO']['PHONE'] = $arFilteredCities['PROPERTY_PHONE_VALUE'];
                    }
                }
                //p($_SESSION['CN_CITY_INFO']);
            }
        }
        
        if(!!($cityId = $_SESSION['CN_CITY_INFO']['ID']))
        {
            Loader::includeModule('iblock');
            Loader::includeModule('catalog');

            $arStore = CCatalogStore::GetList(
              array(),
              array(
                'ACTIVE' => 'Y',
                'UF_CITY' => $cityId,
              ),
              false,
              array(
                'nTopCount' => 1
              ),
              array(
                'ID'
              )
            )->Fetch();

            if(!!$arStore['ID'])
            {
                define('CATALOG_QUANTITY_STORE', 'CATALOG_STORE_AMOUNT_'.$arStore['ID']);
            }
            else
            {
                define('CATALOG_QUANTITY_STORE', 'CATALOG_QUANTITY');
            }

            
            $arCity = array();
            $cacheTime = 84200*30;
            $cacheDir = 's1/steelline/city';
            $cacheId = 'city_'.$cityId;
            $сache = Bitrix\Main\Data\Cache::createInstance();
            if ($сache->initCache($cacheTime, $cacheId, $cacheDir))
            {
                $arCity = $сache->getVars();
            }
            elseif ($сache->startDataCache())
            {
                $arCity = array();
                
                if (defined('BX_COMP_MANAGED_CACHE')) {

                    $tagCache = new Bitrix\Main\Data\TaggedCache();
                    $tagCache->startTagCache($cacheDir);
                    $tagCache->registerTag(sprintf('iblock_id_%s', CN_CITY_IBLOCK_ID));
                    $tagCache->endTagCache();
                }
                
                
                $resCity = CIBlockElement::GetList( array(), array('IBLOCK_ID' => CN_CITY_IBLOCK_ID, 'ID' => $cityId), false, false, array('PROPERTY_CODE_ROISTAT', 'PROPERTY_CODE_YANDEX_METRIKA', 'PROPERTY_YANDEX_METRIKA_ID', 'PROPERTY_CODE_GOOGLE_ANALYTICS', 'PROPERTY_CODE_GTM', 'PROPERTY_CODE_IFRAME_GTM', 'PROPERTY_BITRIX_WIDGET', 'PROPERTY_CLASS_ROISTAT', 'PROPERTY_PRICE_CODE', 'PROPERTY_PRICE_CODE_2', 'PROPERTY_PRICE_CODE_3', 'PROPERTY_PRICE_CODE_4', 'PROPERTY_JIVOSITE') );
                
                if(!$arCity = $resCity->GetNext())
                {
                    $cache->abortDataCache();
                }
                else{
                
                    if(!empty($arCity['PROPERTY_PRICE_CODE_VALUE']))
                        $PRICE_CODE = $arCity['PROPERTY_PRICE_CODE_VALUE'];
                    else
                        $PRICE_CODE = 'Типовое соглашение';
                    
                    $dbPriceType = CCatalogGroup::GetList(array(), array("NAME" => $PRICE_CODE));
                    if($arPriceType = $dbPriceType->Fetch())
                    {
                        $arCity['PRICE_TYPE_ID'] = $arPriceType['ID'];;
                    }
                    
                    $resLink = CIBlockElement::GetProperty(CN_CITY_IBLOCK_ID, $cityId, array(), array('CODE' => 'SOC_LINK'));
                    while($socLink = $resLink->Fetch()){

                        if($socLink['VALUE'])
                            $arCity['SOC_LINK'][] = $socLink['VALUE'];
                    
                    }
                
                }

                $сache->endDataCache($arCity);
            } 
    //p($arCity['PRICE_TYPE_ID'], 'arCity');  
            if(count($arCity) > 0)
            {

                if($arCity['~PROPERTY_CODE_ROISTAT_VALUE'])
                   $APPLICATION->AddViewContent('counters', $arCity['~PROPERTY_CODE_ROISTAT_VALUE']['TEXT']);
                
                if($arCity['~PROPERTY_CODE_YANDEX_METRIKA_VALUE'])
                   $APPLICATION->AddViewContent('metrika', $arCity['~PROPERTY_CODE_YANDEX_METRIKA_VALUE']['TEXT']);
               
                if($arCity['PROPERTY_YANDEX_METRIKA_ID_VALUE'])
                   $_SESSION['CN_CITY_INFO']['YM_ID'] = $arCity['PROPERTY_YANDEX_METRIKA_ID_VALUE'];
               
                if($arCity['~PROPERTY_CODE_GOOGLE_ANALYTICS_VALUE'])
                   $APPLICATION->AddViewContent('googleanalitics', $arCity['~PROPERTY_CODE_GOOGLE_ANALYTICS_VALUE']['TEXT']);
                
                if($arCity['~PROPERTY_CODE_GTM_VALUE'])
                   $APPLICATION->AddViewContent('gtm_counter', str_replace('<script', '<script data-skip-moving="true"', $arCity['~PROPERTY_CODE_GTM_VALUE']['TEXT']));

                if($arCity['~PROPERTY_CODE_IFRAME_GTM_VALUE'])
                   $APPLICATION->AddViewContent('gtm_iframe', $arCity['~PROPERTY_CODE_IFRAME_GTM_VALUE']['TEXT']);
                
                if($arCity['PROPERTY_BITRIX_WIDGET_VALUE'])
                   $APPLICATION->AddViewContent('bitrix_widget', $arCity['~PROPERTY_BITRIX_WIDGET_VALUE']);
               
               if($arCity['PROPERTY_JIVOSITE_VALUE'])
                   $APPLICATION->AddViewContent('jivosite_widget', $arCity['~PROPERTY_JIVOSITE_VALUE']);
                
                if($arCity['PROPERTY_CLASS_ROISTAT_VALUE'])
                    define('CN_CITY_ROISTAT_CLASS', $arCity['PROPERTY_CLASS_ROISTAT_VALUE']);
                
                if(!empty($arCity['PROPERTY_PRICE_CODE_VALUE']))
                    define('CN_CITY_PRICE_CODE', $arCity['PROPERTY_PRICE_CODE_VALUE']);
                else
                    define('CN_CITY_PRICE_CODE', 'Типовое соглашение');
                
                if(!empty($arCity['PROPERTY_PRICE_CODE_2_VALUE']))
                    define('CN_CITY_PRICE_CODE_2', $arCity['PROPERTY_PRICE_CODE_2_VALUE']);
                else
                    define('CN_CITY_PRICE_CODE_2', 'NSK');  
				
				if(!empty($arCity['PROPERTY_PRICE_CODE_3_VALUE']))
                    define('CN_CITY_PRICE_CODE_3', $arCity['PROPERTY_PRICE_CODE_3_VALUE']);
                else
                    define('CN_CITY_PRICE_CODE_3', 'NSK');
				
				if(!empty($arCity['PROPERTY_PRICE_CODE_4_VALUE']))
                    define('CN_CITY_PRICE_CODE_4', $arCity['PROPERTY_PRICE_CODE_4_VALUE']);
                else
                    define('CN_CITY_PRICE_CODE_4', 'NSK');
                
            
                if($arCity['SOC_LINK'])
                    $_SESSION['CN_CITY_INFO']['SOC_LINK'] = $arCity['SOC_LINK'];
                
                if($arCity['PRICE_TYPE_ID'])
                    $_SESSION['CN_CITY_INFO']['PRICE_TYPE_ID'] = $arCity['PRICE_TYPE_ID'];
                
               
            }
            //
            /*if($roistat = CIBlockElement::GetProperty(CN_CITY_IBLOCK_ID, $cityId, array(), array('CODE'=>'CODE_ROISTAT'))->Fetch())
            {
                $APPLICATION->AddViewContent('counters', $roistat['VALUE']['TEXT']);
            }
            //

            if($ya_metrika = CIBlockElement::GetProperty(CN_CITY_IBLOCK_ID, $cityId, array(), array('CODE'=>'CODE_YANDEX_METRIKA'))->Fetch())
            {
              //$APPLICATION->AddViewContent('counters', $ya_metrika['VALUE']['TEXT']);
              $APPLICATION->AddViewContent('metrika', $ya_metrika['VALUE']['TEXT']);
            }
            if($ya_metrika_id = CIBlockElement::GetProperty(CN_CITY_IBLOCK_ID, $cityId, array(), array('CODE'=>'YANDEX_METRIKA_ID'))->Fetch())
            { 
                
                $_SESSION['CN_CITY_INFO']['YM_ID'] = $ya_metrika_id['VALUE'];
                // $yandexTaget404 = "<script>
                // $(function () {
                    // var url = document.location.pathname + document.location.search;
                    // var url_referrer = document.referrer;
                    // var yaParams = {error404: {page: url, from: url_referrer}};
                    // yaCounter".$ya_metrika_id['VALUE'].".reachGoal('targeterror404');
                // });
                // </script>";
                // $APPLICATION->AddViewContent('yandexTaget404', $yandexTaget404);
            }
            if($ggl_analytics = CIBlockElement::GetProperty(CN_CITY_IBLOCK_ID, $cityId, array(), array('CODE'=>'CODE_GOOGLE_ANALYTICS'))->Fetch())
            {
              $APPLICATION->AddViewContent('googleanalitics', $ggl_analytics['VALUE']['TEXT']);
            }
            if($gtm_code = CIBlockElement::GetProperty(CN_CITY_IBLOCK_ID, $cityId, array(), array('CODE'=>'CODE_GTM'))->Fetch())
            {
              $APPLICATION->AddViewContent('gtm_counter', $gtm_code['VALUE']['TEXT']);
            }
            if($gtm_iframe = CIBlockElement::GetProperty(CN_CITY_IBLOCK_ID, $cityId, array(), array('CODE'=>'CODE_IFRAME_GTM'))->Fetch())
            {
              $APPLICATION->AddViewContent('gtm_iframe', $gtm_iframe['VALUE']['TEXT']);
            }
            
            if($bitrixWidget = CIBlockElement::GetProperty(CN_CITY_IBLOCK_ID, $cityId, array(), array('CODE'=>'BITRIX_WIDGET'))->Fetch())
            {
              $APPLICATION->AddViewContent('bitrix_widget', $bitrixWidget['VALUE']);
            }

            if($roistat_class = CIBlockElement::GetProperty(CN_CITY_IBLOCK_ID, $cityId, array(), array('CODE'=>'CLASS_ROISTAT'))->Fetch())
            {
                define('CN_CITY_ROISTAT_CLASS', $roistat_class['VALUE']);
            }

            $price_code = CIBlockElement::GetProperty(CN_CITY_IBLOCK_ID, $cityId, array(), array('CODE'=>'PRICE_CODE'))->Fetch();
            if(!empty($price_code['VALUE']))
                define('CN_CITY_PRICE_CODE', $price_code['VALUE']);
            else
                define('CN_CITY_PRICE_CODE', 'Типовое соглашение');

            $price_code_2 = CIBlockElement::GetProperty(CN_CITY_IBLOCK_ID, $cityId, array(), array('CODE'=>'PRICE_CODE_2'))->Fetch();
            if(!empty($price_code_2['VALUE']))
                define('CN_CITY_PRICE_CODE_2', $price_code_2['VALUE']);
            else
                define('CN_CITY_PRICE_CODE_2', 'NSK');*/
        }
        
        define('CN_CITY_NAME', $_SESSION['CN_CITY_INFO']['NAME']);
        define('CN_CITY_ID', $_SESSION['CN_CITY_INFO']['ID']);
        define('CN_CITY_ACTIVE', $_SESSION['CN_CITY_INFO']['ACTIVE']);
        define('CN_CITY_SUBDOMAIN', $_SESSION['CN_CITY_INFO']['SUBDOMAIN']);
        define('CN_CITY_EMAIL', $_SESSION['CN_CITY_INFO']['EMAIL']);
//p($_SESSION['CN_CITY_INFO'], 'CN_CITY_INFO');
        $PRICE2SECTION = array(
            396 => CN_CITY_PRICE_CODE_2,
        );
        //CNLog::Add('Session city: '. print_r($_SESSION['CN_CITY_INFO'], true));
    }

    
    
}

?>