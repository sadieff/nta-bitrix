<?php namespace Fred\Нandlers;

use Bitrix\Main\ {
    Localization\Loc,
    Loader,
    LoaderException
};

/**
 * Class Main
 * @package Fred
 */
class Iblock
{
    /**
     * @throws LoaderException
     */
    public static function includeIblockModule()
    {
        if ( !Loader::includeModule('iblock') )
            throw new LoaderException( Loc::getMessage("MODULE_IBLOCK_ERROR") );
    }

    public static function OnIBlockPropertyBuildList () 
    {
        return [
            "PROPERTY_TYPE" => "Y",
            "USER_TYPE" =>"replaceString",
            "DESCRIPTION" => "Вопросы и ответы",
            "GetPropertyFieldHtml" => [
                self::class, 
                "GetPropertyFieldHtml"
            ],
            "GetPublicViewHTML" => [
                self::class,
                "GetPublicViewHTML"
            ],
            "ConvertToDB" => [
                self::class,
                "ConvertToDB"
            ],
            "GetAdminListViewHTML" => [
                self::class,
                "GetAdminListViewHTML"
            ],
        ];
    }  
    
    public static function GetPropertyFieldHtml ($arProperty, $value, $strHTMLControlName)
    {
        $html = '';
        $html .= '<table style="width: 100%;margin-bottom: 30px;background: #ebefe5;padding: 10px;">';

            /*$html .= '<thead>';
                $html .= '<tr>';
                $html .= '<th>';
                $html .= '<label>Вопрос:</label>';
                $html .= '</th>';
                $html .= '<th>';
                $html .= '<label>Ответ:</label>';
                $html .= '</th>';
                $html .= '</tr>';
            $html .= '</thead>';*/

            $html .= '<tbody>';
                $html .= '<tr>';
                    $html .= '<td>';
                    $html .= '<b>Заголовок:</b>';
                    $html .= '<input type="text" style="width: 100%;" name="'.$strHTMLControlName["DESCRIPTION"].'" value="' . $value['DESCRIPTION'] . '">';
                    $html .= '</td>';
            $html .= '</tr>';
            $html .= '<tr>';
                    $html .= '<td>';
                    $html .= '<b>Значение:</b>';
                    $html .= '<textarea style="width: 100%;" rows="3" name="'.$strHTMLControlName["VALUE"].'">' . $value['VALUE'] . '</textarea>';
                    $html .= '</td>';
                $html .= '</tr>';
            $html .= '</tbody>';

        $html .= '</table>';
        
        return $html; 
    }

    public static function GetAdminListViewHTML($arProperty, $value, $strHTMLControlName)
    {
        if(strlen($value["VALUE"]) > 0 && strlen($value["DESCRIPTION"]) > 0)
            return $value;
    }

    public static function GetPublicViewHTML($arProperty, $value, $strHTMLControlName)
    {
        if(strlen($value["VALUE"]) > 0 && strlen($value["DESCRIPTION"]) > 0)
            return $value;
    }

    public static function ConvertToDB($arProperty, $value)
    {
        if(strlen($value["VALUE"]) > 0 && strlen($value["DESCRIPTION"]) > 0)
            return $value;
    }

}