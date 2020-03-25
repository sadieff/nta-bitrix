<?
/*
Чтобы изменить сохраняемые поля, необходимо модифицировать одноименные поля в массивах $_POST и $_FILES, значения всех свойств необходимо модифицировать в массиве $PROP.
*/

// p($dontsave, 'dontsave');
// p($error, 'error');
// p($view, 'view');
// p($Update, 'Update');
// p($REQUEST_METHOD, 'REQUEST_METHOD');
// p($_REQUEST, '_REQUEST');

  
if($REQUEST_METHOD=="POST" && strlen($Update)>0 && $view!="Y" && (!$error) && empty($dontsave)){
    //$error = new _CIBlockError(2, "DESCRIPTION_REQUIRED", "ошибка");
    foreach($PROP['52'] as $key1 => $val){
        
        $arCustomFilter = Bitrix\Main\Web\Json::decode($_POST['CUSTOM_FILTER']);
        $arChildren = array();
        foreach($arCustomFilter['CHILDREN'] as $arChild){
//p($arChild['DATA'], 'arChild DATA');  
            foreach($arChild['DATA'] as $key2 => $data){
                $arChild['DATA'][$key2] = (string)$data;
            }
            
            $arChildren[] = $arChild;
        }
        $arCustomFilter['CHILDREN'] = $arChildren;
        $PROP['52'][$key1] = Bitrix\Main\Web\Json::encode($arCustomFilter);
 
    }
//p($PROP, 'PROP',1);
}
/*function BXIBlockAfterSave($arFields)
{
    p($arFields, 'arFields',1);
    
}*/
?>