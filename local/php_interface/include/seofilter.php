<?

use \Bitrix\Main\Loader;

class SeoFilter
{

    public static function getLinkSeoArr($isLinkSeo = false)
    {
        $arLinkSeoResult = array();
        
        Loader::includeModule('iblock');
        
        $cacheTime = 86400*60;
        $cacheId = 'iblock_id_'.SEO_IBLOCK_ID;
        $cacheDir = 's1/steelline/linkseo';
        $сache = Bitrix\Main\Data\Cache::createInstance();
        if ($сache->initCache($cacheTime, $cacheId, $cacheDir))
        {
            $arLinkSeoResult = $сache->getVars();
        }
        elseif ($сache->startDataCache())
        {
            $arLinkSeoResult = array(); 
            
            if (defined('BX_COMP_MANAGED_CACHE')) {

                $tagCache = new Bitrix\Main\Data\TaggedCache();
                $tagCache->startTagCache($cacheDir);
                $tagCache->registerTag(sprintf('iblock_id_%s', SEO_IBLOCK_ID));
                $tagCache->endTagCache();
            }

            
            $rsOb = CIBlockElement::GetList(
                array('SORT'=>'ASC','NAME' => 'ASC'),
                array('IBLOCK_ID' => SEO_IBLOCK_ID, 'ACTIVE' => 'Y'),
                false,
                false,
                array('IBLOCK_ID','ID','PROPERTY_URL_ADDRESS', 'PROPERTY_CUSTOM_FILTER')
            );
            
            while($arSeo = $rsOb->Fetch()){
                if($arSeo['PROPERTY_URL_ADDRESS_VALUE'] && $arSeo['PROPERTY_CUSTOM_FILTER_VALUE']){
                    $arLinkSeoResult['MD'][md5($arSeo['PROPERTY_CUSTOM_FILTER_VALUE'])] = trim($arSeo['PROPERTY_URL_ADDRESS_VALUE']);
                    $arLinkSeoResult['LINK'][trim($arSeo['PROPERTY_URL_ADDRESS_VALUE'])] = trim($arSeo['PROPERTY_CUSTOM_FILTER_VALUE']);
                }
            }
            
            $сache->endDataCache($arLinkSeoResult);
        }
        
        if($isLinkSeo)
            return $arLinkSeoResult['LINK'];
        else
            return $arLinkSeoResult['MD'];
        
    }
    
    public static function GetSeoData($idElement = false)
    {

        $cacheTime = 86400*7;
        $cacheId = 'iblock_id_'.SEO_IBLOCK_ID;
        $cacheDir = 's1/steelline/linkseofilter';
        $сache = Bitrix\Main\Data\Cache::createInstance();
        if ($сache->initCache($cacheTime, $cacheId, $cacheDir))
        {
            $arLinkSeoResult = $сache->getVars();
        }
        elseif ($сache->startDataCache())
        {
            \Bitrix\Main\Loader::includeModule('iblock');
            
            $arLinkSeoResult = array(); 
            
            if (defined('BX_COMP_MANAGED_CACHE')) {

                $tagCache = new Bitrix\Main\Data\TaggedCache();
                $tagCache->startTagCache($cacheDir);
                $tagCache->registerTag(sprintf('iblock_id_%s', SEO_IBLOCK_ID));
                $tagCache->endTagCache();
            }

            
            $rsOb = CIBlockElement::GetList(
                array('SORT'=>'ASC', 'NAME' => 'ASC'),
                array('IBLOCK_ID' => SEO_IBLOCK_ID, 'ACTIVE' => 'Y'),
                false,
                false,
                array('IBLOCK_ID','ID','PROPERTY_URL_ADDRESS', 'PROPERTY_CUSTOM_FILTER', 'PROPERTY_DEPTH_LEVEL')
            );
            
            $arF = array(
                'IBLOCK_ID' => CATALOG_IBLOCK_ID, 
                'ACTIVE' => 'Y',
                'INCLUDE_SUBSECTIONS' => 'Y'
            );
            
            $arLinkSeoResult = $arResult = array();
            
            while($arSeo = $rsOb->Fetch()){
                
                if($arSeo['PROPERTY_URL_ADDRESS_VALUE'] && $arSeo['PROPERTY_CUSTOM_FILTER_VALUE']){
                    
                    //$arLinkSeoResult['MD'][md5($arSeo['PROPERTY_CUSTOM_FILTER_VALUE'])] = trim($arSeo['PROPERTY_URL_ADDRESS_VALUE']);
                    
                    //$arLinkSeoResult['LINK'][trim($arSeo['PROPERTY_URL_ADDRESS_VALUE'])] = trim($arSeo['PROPERTY_CUSTOM_FILTER_VALUE']);
                    
                    $arLinkSeoResult['LINK'][ trim($arSeo['PROPERTY_URL_ADDRESS_VALUE']) ] = trim($arSeo['NAME']);
                    
                    $arResult[] = $arSeo;
                    
                }
                
            }
            
            foreach($arResult as $arSeo)
            {
                
                //построение фильтра и выборка элементов
                
                $customFilter = parseConditionCustom(Bitrix\Main\Web\Json::decode($arSeo['PROPERTY_CUSTOM_FILTER_VALUE']));
                
                //p($arSeo, 'arSeo');
                
                $arFilter = array_merge( $arF , $customFilter );
                
                //p($arFilter, 'arFilter');
                
                // выбираем двери по СЕО фмльтру
                $rsEl = CIBlockElement::GetList(
                    array('SORT'=>'ASC','NAME' => 'ASC'),
                    $arFilter,
                    false,
                    false,
                    array('IBLOCK_ID', 'ID', 'NAME')
                );
                
                while($arEl = $rsEl->Fetch())
                {
                    
                    //p($arEl, 'arEl');
                    
                    if($arSeo['PROPERTY_DEPTH_LEVEL_VALUE'] == 2)
                    {
                        
                        
                        $arUrl = explode('/', $arSeo['PROPERTY_URL_ADDRESS_VALUE']);
                        
                        $url = '/'.$arUrl[1].'/'.$arUrl[2].'/';
                        
                        /*$i = 0;
                        foreach($arUrl as $code){
                            
                            if($code == 'vhodnie-dveri'){
                                $i++;
                            }    
                            elseif($i == 1){
                                $url .= $code;
                                break;
                            }
                        }*/
                        //p($arUrl);
                        if(isset($arLinkSeoResult['LINK'][$url])){
                        
                            $arLinkSeoResult['ELEMENTS'][ $arEl['ID'] ][1] = array(
                                'NAME' => $arLinkSeoResult['LINK'][$url],
                                'LINK' => $url
                            );
                            
                            $arLinkSeoResult['ELEMENTS'][ $arEl['ID'] ][ $arSeo['PROPERTY_DEPTH_LEVEL_VALUE'] ] = array(
                                'NAME' => $arSeo['NAME'],
                                'LINK' => $arSeo['PROPERTY_URL_ADDRESS_VALUE']
                            );
                        }
                        else{
                            //p($url, 'url');
                            
                            if( !$arLinkSeoResult['ELEMENTS'][ $arEl['ID'] ] ){
                                $arLinkSeoResult['ELEMENTS'][ $arEl['ID'] ][ $arSeo['PROPERTY_DEPTH_LEVEL_VALUE'] ] = array(
                                    'NAME' => $arSeo['NAME'],
                                    'LINK' => $arSeo['PROPERTY_URL_ADDRESS_VALUE']
                                );
                            }
                        }
                        
                        //p($arLinkSeoResult['ELEMENTS'], 'ELEMENTS');
                        //p($customFilter, 'customFilter',1);
                    }
                    elseif($arSeo['PROPERTY_DEPTH_LEVEL_VALUE'] == 1){
                        
                        if( !$arLinkSeoResult['ELEMENTS'][ $arEl['ID'] ] ){
                            $arLinkSeoResult['ELEMENTS'][ $arEl['ID'] ][ $arSeo['PROPERTY_DEPTH_LEVEL_VALUE'] ] = array(
                                'NAME' => $arSeo['NAME'],
                                'LINK' => $arSeo['PROPERTY_URL_ADDRESS_VALUE']
                            );
                        }
                        
                    }
                }
     
            }
            
            $сache->endDataCache($arLinkSeoResult);
        }
        
        if($idElement){
            if($arLinkSeoResult['ELEMENTS'] && $arLinkSeoResult['ELEMENTS'][$idElement])
                return $arLinkSeoResult['ELEMENTS'][$idElement];
            else
                return false;
        }
        else
            return $arLinkSeoResult;

    /*
    [ELEMENTS] => Array
            (
            [567] => Array // ID товара
                (
                    [1] => Array // структура сео элементов
                        (
                            [NAME] => Утеплённые входные двери
                            [LINK] => /vhodnie-dveri/uteplyennye/
                        )

                    [2] => Array
                        (
                            [NAME] => Утеплённые входные двери с шумоизоляцией
                            [LINK] => /vhodnie-dveri/uteplyennye/s-shumoizolyatsiey/
                        )

                ) 
             )
    */    
        //p($arLinkSeoResult['ELEMENTS'], 'ELEMENTS');
        //p($arLinkSeoResult, 'arLinkSeoResult');
    }
    
    
    public static function getSeoDataByUrl($requestURLDir)
    {

        $resSeo = array();
        
        if(!$requestURLDir)
            return $resSeo;
        
        $cacheTime = 86400*60;
        $cacheId = 'iblock_id_'.SEO_IBLOCK_ID.$requestURLDir;
        $cacheDir = 's1/steelline/catalog';
        $сache = Bitrix\Main\Data\Cache::createInstance();
        if ($сache->initCache($cacheTime, $cacheId, $cacheDir))
        {
            $resSeo = $сache->getVars();
        }
        elseif ($сache->startDataCache())
        {
            $resSeo = array(); 

            $rsOb = CIBlockElement::GetList(
                array('SORT'=>'ASC','NAME' => 'ASC'),
                array('IBLOCK_ID' => SEO_IBLOCK_ID, 'ACTIVE' => 'Y', 'PROPERTY_URL_ADDRESS' => $requestURLDir),
                false,
                false,
                array('IBLOCK_ID', 'ID', 'CODE', 'NAME', 'PREVIEW_TEXT', 'DETAIL_TEXT', 'PROPERTY_DEPTH_LEVEL', 'PROPERTY_URL_ADDRESS', 'PROPERTY_SORT', 'IBLOCK_SECTION_ID')
            );
            
            if($resSeo = $rsOb->Fetch()){
       
                if (defined('BX_COMP_MANAGED_CACHE')) {

                    $tagCache = new Bitrix\Main\Data\TaggedCache();
                    $tagCache->startTagCache($cacheDir);
                    $tagCache->registerTag(sprintf('iblock_id_%s', SEO_IBLOCK_ID));
                    $tagCache->endTagCache();
                }
                
                $dbProps = CIBlockElement::GetProperty($resSeo['IBLOCK_ID'], $resSeo['ID'], array('sort' => 'asc'), Array('CODE'=>'LINK_EL'));
                $arF = array(
                    'IBLOCK_ID' => CATALOG_IBLOCK_ID, 
                    'ACTIVE' => 'Y',
                    'INCLUDE_SUBSECTIONS' => 'Y'
                );
                while($arProps = $dbProps->Fetch()){
                    
                    if(!$arProps['VALUE'])
                        continue;
                    // получим данные о связанных элементах
                    $rsElSeo = CIBlockElement::GetList(
                        array('SORT'=>'ASC','NAME' => 'ASC'),
                        array('IBLOCK_ID' => SEO_IBLOCK_ID, 'ACTIVE' => 'Y', 'ID' => $arProps['VALUE']),
                        false,
                        false,
                        array('IBLOCK_ID', 'ID', 'NAME', 'PROPERTY_URL_ADDRESS', 'PROPERTY_CUSTOM_FILTER')
                    );
                    
                    if($arElSeo = $rsElSeo->Fetch()){

                        //получим количесвто элементов по фильтру
                        //построение фильтра и выборка элементов
                        $customFilter = parseConditionCustom(Bitrix\Main\Web\Json::decode($arElSeo['PROPERTY_CUSTOM_FILTER_VALUE']));
                        $arFilter = array_merge( $arF , $customFilter );
                        // выбираем двери по СЕО фмльтру
                        $rsEl = CIBlockElement::GetList(
                            array('SORT'=>'ASC'),
                            $arFilter,
                            false,
                            false,
                            array('IBLOCK_ID', 'ID')
                        );
                        
                        $cntElem = $rsEl->SelectedRowsCount();
                        
                        $resSeo['PROPERTY_LINK_EL_VALUE'][$arProps['VALUE']] = array(
                            'NAME' => $arElSeo['NAME'],
                            'DETAIL_PAGE_URL' => $arElSeo['PROPERTY_URL_ADDRESS_VALUE'],
                            'CNT_ELEM' => $cntElem,
                        );
                    }
                }
                
                $ipropValues = new \Bitrix\Iblock\InheritedProperty\ElementValues($resSeo['IBLOCK_ID'], $resSeo['ID']);
                $resSeo['IPROPERTY_VALUES'] = $ipropValues->getValues();
                
                $arChains = array();

            //p($resSeo, 'resSeo');
                if($resSeo['PROPERTY_DEPTH_LEVEL_VALUE'] == 2){ // получим первый уровень
                    /*$rsSect = CIBlockSection::GetList(
                        array('SORT'=>'ASC','NAME' => 'ASC'),
                        array('IBLOCK_ID' => SEO_IBLOCK_ID, 'ACTIVE' => 'Y', 'ID' => $resSeo['IBLOCK_SECTION_ID']),
                        false,
                        array('IBLOCK_ID', 'ID', 'NAME', 'UF_LINK')
                    );
                    if($arSect = $rsSect->fetch()){
            //p($arSect, 'arSect');
                        $arChains[] = array(
                            'NAME' => $arSect['NAME'],
                            'LINK' => $arSect['UF_LINK'],
                        );
                    }*/
                    
                    $arUrl = explode('/', $resSeo['PROPERTY_URL_ADDRESS_VALUE']);
                    
                    $url = '/'.$arUrl[1].'/'.$arUrl[2].'/';
                    
                    $rsElSeo = CIBlockElement::GetList(
                        array('SORT'=>'ASC','NAME' => 'ASC'),
                        array('IBLOCK_ID' => SEO_IBLOCK_ID, 'ACTIVE' => 'Y', 'PROPERTY_URL_ADDRESS' => $url),
                        false,
                        false,
                        array('IBLOCK_ID', 'ID', 'CODE', 'NAME', 'DETAIL_TEXT', 'PROPERTY_DEPTH_LEVEL', 'PROPERTY_URL_ADDRESS')
                    );
                    
                    if($arElSeo = $rsElSeo->Fetch()){
                        
                        $arChains[] = array(
                            'NAME' => $arElSeo['NAME'],
                            'LINK' => $arElSeo['PROPERTY_URL_ADDRESS_VALUE'],
                        );
                    }
                    
                }
                
                $arChains[] = array(
                    'NAME' => $resSeo['NAME'],
                    'LINK' => $requestURLDir
                );
                
                $resSeo['CHAIN'] = $arChains;    

                $сache->endDataCache($resSeo); 
            }
            else{
                //$cache->abortDataCache();
            }
        }
        
        return $resSeo;
        
    }    
        
    public static function GetSeoMenuElements($linkEl = false, $cntElem = false)
    {

        $cacheTime = 86400*60;
        $cacheId = 'iblock_id_'.SEO_IBLOCK_ID.$linkEl;
        $cacheDir = 's1/steelline/catalogseo.menu';
        $сache = Bitrix\Main\Data\Cache::createInstance();
        if ($сache->initCache($cacheTime, $cacheId, $cacheDir))
        {
            $arResultEl = $сache->getVars();
        }
        elseif ($сache->startDataCache())
        {
            \Bitrix\Main\Loader::includeModule('iblock');
            
            $resSeo = array(); 
            
            $arFilter = array('IBLOCK_ID' => SEO_IBLOCK_ID, 'ACTIVE' => 'Y');
            
            //if($linkEl)
                //$arFilter['%PROPERTY_URL_ADDRESS'] = $linkEl;
           
            $arSelect = array('IBLOCK_ID', 'TIMESTAMP_X', 'ID', 'NAME', 'PROPERTY_DEPTH_LEVEL', 'PROPERTY_URL_ADDRESS');
            
            if($cntElem)
                $arSelect[] = 'PROPERTY_CUSTOM_FILTER';
            
            if (defined('BX_COMP_MANAGED_CACHE')) {

                $tagCache = new Bitrix\Main\Data\TaggedCache();
                $tagCache->startTagCache($cacheDir);
                $tagCache->registerTag(sprintf('iblock_id_%s', SEO_IBLOCK_ID));
                $tagCache->endTagCache();
            }
            
            $rsOb = CIBlockElement::GetList(
                array('SORT'=>'ASC','NAME' => 'ASC'),
                $arFilter,
                false,
                false,
                $arSelect
            );
            
            $arResEl = array();
            
            while($resSeo = $rsOb->Fetch())
            {
                $arResEl[ $resSeo['PROPERTY_DEPTH_LEVEL_VALUE'] ][ $resSeo['ID'] ] = array(
                    'DETAIL_PAGE_URL' => $resSeo['PROPERTY_URL_ADDRESS_VALUE'],
                    'NAME' => $resSeo['NAME'],
                    'TIMESTAMP_X' => $resSeo['TIMESTAMP_X'],
                );
                
                if($cntElem && $resSeo['PROPERTY_DEPTH_LEVEL_VALUE'] == 2){ // получим количесвто элементов для дочерних разделов
                    $arResEl[ $resSeo['PROPERTY_DEPTH_LEVEL_VALUE'] ][ $resSeo['ID'] ]['PROPERTY_CUSTOM_FILTER_VALUE'] = $resSeo['PROPERTY_CUSTOM_FILTER_VALUE'];
                }
            }
            
            $arF = array(
                'IBLOCK_ID' => CATALOG_IBLOCK_ID, 
                'ACTIVE' => 'Y',
                'INCLUDE_SUBSECTIONS' => 'Y'
            );
            $arResultEl = array();
            foreach($arResEl[1] as $arEl){
                
                $arResultEl[$arEl['DETAIL_PAGE_URL']] = $arEl;
                
                foreach($arResEl[2] as $key => $arEl2){

                    if( strpos( $arEl2['DETAIL_PAGE_URL'], $arEl['DETAIL_PAGE_URL']) !== false){ // если является подразделом
                 // p($cntElem, 'cntElem');  
                    //p($linkEl, 'linkEl');  
                    //p($arEl2['DETAIL_PAGE_URL'], 'DETAIL_PAGE_URL');          
                        if($cntElem && $linkEl == $arEl['DETAIL_PAGE_URL']){ //получим количесвто элементов по фильтру
                        
                  
                            //построение фильтра и выборка элементов
                            $customFilter = parseConditionCustom(Bitrix\Main\Web\Json::decode($arEl2['PROPERTY_CUSTOM_FILTER_VALUE']));
                            $arFilter = array_merge( $arF , $customFilter );
                   // p($customFilter, 'customFilter');
                            
                            // выбираем двери по СЕО фмльтру
                            $rsEl = CIBlockElement::GetList(
                                array('SORT'=>'ASC'),
                                $arFilter,
                                false,
                                false,
                                array('IBLOCK_ID', 'ID')
                            );
                            
                            $arEl2['CNT_ELEM'] = $rsEl->SelectedRowsCount();
                        }  
                        
                        unset($arEl2['PROPERTY_CUSTOM_FILTER_VALUE']);
                        $arResultEl[$arEl['DETAIL_PAGE_URL']]['CHILD'][] = $arEl2;
                        unset($arResEl[2][$key]);
                        
                    }
                }
                
                
            }
            
           // p($arResultEl, 'arResultEl', 1);

                /*$arChains = array();
                
                
                $rsElSeo = CIBlockElement::GetList(
                    array('SORT'=>'ASC','NAME' => 'ASC'),
                    array('IBLOCK_ID' => SEO_IBLOCK_ID, 'ACTIVE' => 'Y', 'SECTION_ID' => $resSeo['IBLOCK_SECTION_ID'], '!ID' => $resSeo['ID']),
                    false,
                    false,
                    array('IBLOCK_ID', 'ID', 'CODE', 'NAME', 'DETAIL_TEXT', 'PROPERTY_DEPTH_LEVEL', 'PROPERTY_URL_ADDRESS')
                );

            //p($resSeo, 'resSeo');
                if($resSeo['PROPERTY_DEPTH_LEVEL_VALUE'] == 1){ // получим дочерние элементы

                    $rsElSeo = CIBlockElement::GetList(
                        array('SORT'=>'ASC','NAME' => 'ASC'),
                        array('IBLOCK_ID' => SEO_IBLOCK_ID, 'ACTIVE' => 'Y', 'SECTION_ID' => $resSeo['IBLOCK_SECTION_ID'], '!ID' => $resSeo['ID']),
                        false,
                        false,
                        array('IBLOCK_ID', 'ID', 'CODE', 'NAME', 'DETAIL_TEXT', 'PROPERTY_DEPTH_LEVEL', 'PROPERTY_URL_ADDRESS')
                    );
                    
                    if($rsElSeo->SelectedRowsCount() > 0){
                        
                        while($arElSeo = $rsElSeo->Fetch()){
                            
                            $arChains[] = array(
                                'TEXT' => $arElSeo['NAME'],
                                'LINK' => $arElSeo['PROPERTY_URL_ADDRESS_VALUE'],
                            );
                        }
                        
                    }
                        
                    //arItem Array
                    // (
                        // [TEXT] => Двери в квартиру
                        // [LINK] => /vhodnie-dveri/v-kvartiru/
                        // [SELECTED] => 
                        // [PERMISSION] => X
                        // [ADDITIONAL_LINKS] => Array
                            // (
                            // )

                        // [ITEM_TYPE] => D
                        // [ITEM_INDEX] => 0
                        // [PARAMS] => Array
                            // (
                            // )

                        // [DEPTH_LEVEL] => 1
                        // [IS_PARENT] => 
                    // )
                    
                    // $arUrl = explode('/', $resSeo['PROPERTY_URL_ADDRESS_VALUE']);
                    
                    // $url = '/'.$arUrl[1].'/'.$arUrl[2].'/';
                    
                    // $rsElSeo = CIBlockElement::GetList(
                        // array('SORT'=>'ASC','NAME' => 'ASC'),
                        // array('IBLOCK_ID' => SEO_IBLOCK_ID, 'ACTIVE' => 'Y', 'PROPERTY_URL_ADDRESS' => $url),
                        // false,
                        // false,
                        // array('IBLOCK_ID', 'ID', 'CODE', 'NAME', 'DETAIL_TEXT', 'PROPERTY_DEPTH_LEVEL', 'PROPERTY_URL_ADDRESS')
                    // );
                    
                    // if($arElSeo = $rsElSeo->Fetch()){
                        
                        // $arChains[] = array(
                            // 'NAME' => $arElSeo['NAME'],
                            // 'LINK' => $arElSeo['PROPERTY_URL_ADDRESS_VALUE'],
                        // );
                    // }
                    
                }*/
            //}
            
            $сache->endDataCache($arResultEl);	
            
        }
        
        if($linkEl){
            return $arResultEl[$linkEl];
        }
        else
            return $arResultEl;
        
    }

}