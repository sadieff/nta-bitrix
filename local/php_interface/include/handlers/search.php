<?
use \Bitrix\Main\Loader;

class ClassSearch
{
    // создаем обработчик события "BeforeIndex"
    public static function BeforeIndexHandler($arFields)
    {
        if(!Loader::includeModule("iblock")) // подключаем модуль
            return $arFields;
            
        if($arFields["MODULE_ID"] == "iblock")
        {
            
            if($arFields['PARAM2'] == CATALOG_IBLOCK_ID){
                /*$resEl = CIBlockElement::GetByID($arFields['ITEM_ID']);
                if($arEl = $resEl->Fetch()){

                    if($arEl['IBLOCK_SECTION_ID'] == 628){
                        unset($arFields["BODY"]);
                        unset($arFields["TITLE"]);
                        $arFields["BODY"]='';
                        $arFields["TITLE"]='';
                        
                        return $arFields;
                    }
                    else{
                        $nav = CIBlockSection::GetNavChain($arEl['IBLOCK_ID'], $arEl['IBLOCK_SECTION_ID'], array('ID'));
                        while($arSection = $nav->Fetch()){
                            if($arSection['ID'] == 628){
                                unset($arFields["BODY"]);
                                unset($arFields["TITLE"]);
                                $arFields["BODY"]='';
                                $arFields["TITLE"]='';
                                
                                return $arFields;
                            }
                        } 
                    }
                }*/ 
                
                $dbProps = CIBlockElement::GetProperty(                        // Запросим свойства индексируемого элемента
                    $arFields["PARAM2"],         // BLOCK_ID индексируемого свойства
                    $arFields["ITEM_ID"],          // ID индексируемого свойства
                    array("sort" => "asc"),       // Сортировка (можно упустить)
                    Array("CODE"=>"NAME_RUS")
                ); // CODE свойства (в данном случае артикул)
                
                if($arProps = $dbProps->Fetch())
                    $arFields["TITLE"] .= " (".$arProps["VALUE"].") ";   // Добавим свойство в конец заголовка индексируемого элемента
            }
            /*elseif($arFields['PARAM2'] == SEO_IBLOCK_ID){
                
            }*/
            
            
           
        }
        return $arFields; // вернём изменения
    }

}

?>