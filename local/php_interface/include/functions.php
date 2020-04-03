<?

/* отладка массивов */
function p($item, $name = '', $die = false) {
    global $USER;
    if ($USER->IsAdmin()) {
        $bt = debug_backtrace();
        $bt = $bt[0];
        $dRoot = $_SERVER["DOCUMENT_ROOT"];
        $dRoot = str_replace("/", "\\", $dRoot);
        $bt["file"] = str_replace($dRoot, "", $bt["file"]);
        $dRoot = str_replace("\\", "/", $dRoot);
        $bt["file"] = str_replace($dRoot, "", $bt["file"]);
        echo "<div style=\"font-family: 'Consolas';padding: 3px 5px; background:#de0017; color: #fff; font-weight: bold;\">File:" . $bt['file'] . " [" . $bt['line'] . "] - " . $name . "</div>";
        if (!$item) echo ' <br />пусто <br />';
        elseif (is_array($item) && empty($item)) echo '<br />массив пуст <br />';
        else echo ' <pre style="padding:20px;color: #000;font-size: 14px;font-family: \'Consolas\';line-height: 1.4;">' . print_r($item, true) . ' </pre>';
        if ($die)
            die();
    }
}

/* транслитирация символьного кода */
function createCode($s) {
    $s = (string) $s;
    $s = strip_tags($s);
    $s = str_replace(array("\n", "\r"), " ", $s);
    $s = preg_replace("/\s+/", ' ', $s);
    $s = trim($s);
    $s = function_exists('mb_strtolower') ? mb_strtolower($s) : strtolower($s);
    $s = strtr($s, array('а'=>'a','б'=>'b','в'=>'v','г'=>'g','д'=>'d','е'=>'e','ё'=>'e','ж'=>'j','з'=>'z','и'=>'i','й'=>'y','к'=>'k','л'=>'l','м'=>'m','н'=>'n','о'=>'o','п'=>'p','р'=>'r','с'=>'s','т'=>'t','у'=>'u','ф'=>'f','х'=>'h','ц'=>'c','ч'=>'ch','ш'=>'sh','щ'=>'shch','ы'=>'y','э'=>'e','ю'=>'yu','я'=>'ya','ъ'=>'','ь'=>''));
    $s = preg_replace("/[^0-9a-z-_ ]/i", "", $s);
    $s = str_replace(" ", "-", $s);
    return $s;
}

/* сокращение текста */
function reduce ($string, $lingth){
    $string = strip_tags($string);
    $string = substr($string, 0, $lingth);
    $string = rtrim($string, "!,.-");
    $string = substr($string, 0, strrpos($string, ' '));
    return $string;
}

function getAjaxContent($output){
    //$APPLICATION->RestartBuffer();
    while(ob_end_clean());
    echo $output;
    die();
}


function parseConditionCustom($condition, $params = array())
{
    $result = array();

    if (!empty($condition) && is_array($condition)) {
        if ($condition['CLASS_ID'] === 'CondGroup') {
            if (!empty($condition['CHILDREN'])) {
                foreach ($condition['CHILDREN'] as $child) {
                    $childResult = parseConditionCustom($child, $params);

                    // is group
                    if ($child['CLASS_ID'] === 'CondGroup') {
                        $result[] = $childResult;
                    } // same property names not overrides each other
                    elseif (isset($result[key($childResult)])) {
                        $fieldName = key($childResult);

                        if (!isset($result['LOGIC'])) {
                            $result = array(
                                'LOGIC' => $condition['DATA']['All'],
                                array($fieldName => $result[$fieldName])
                            );
                        }

                        $result[][$fieldName] = $childResult[$fieldName];
                    } else {
                        $result += $childResult;
                    }
                }

                if (!empty($result)) {
                    parsePropertyConditionCustom($result, $condition, $params);

                    if (count($result) > 1) {
                        $result['LOGIC'] = $condition['DATA']['All'];
                    }
                }
            }
        } else {
            $result += parseConditionLevelCustom($condition, $params);
        }
    }

    return $result;
}

function parsePropertyConditionCustom(array &$result, array $condition, $params)
{
    if (!empty($result)) {
        $subFilter = array();

        foreach ($result as $name => $value) {
            if (!empty($result[$name]) && is_array($result[$name])) {
                parsePropertyConditionCustom($result[$name], $condition, $params);
            } else {
                if (($ind = strpos($name, 'CondIBProp')) !== false) {
                    list($prefix, $iblock, $propertyId) = explode(':', $name);
                    $operator = $ind > 0 ? substr($prefix, 0, $ind) : '';

                    $catalogInfo = \CCatalogSku::GetInfoByIBlock($iblock);
                    if (!empty($catalogInfo)) {
                        if (
                            $catalogInfo['CATALOG_TYPE'] != \CCatalogSku::TYPE_CATALOG
                            && $catalogInfo['IBLOCK_ID'] == $iblock
                        ) {
                            $subFilter[$operator . 'PROPERTY_' . $propertyId] = $value;
                        } else {
                            $result[$operator . 'PROPERTY_' . $propertyId] = $value;
                        }
                    }

                    unset($result[$name]);
                }
            }
        }

        if (!empty($subFilter) && !empty($catalogInfo)) {
            $offerPropFilter = array(
                'IBLOCK_ID' => $catalogInfo['IBLOCK_ID'],
                'ACTIVE_DATE' => 'Y',
                'ACTIVE' => 'Y'
            );

            if ($params['HIDE_NOT_AVAILABLE_OFFERS'] === 'Y') {
                $offerPropFilter['HIDE_NOT_AVAILABLE'] = 'Y';
            } elseif ($params['HIDE_NOT_AVAILABLE_OFFERS'] === 'L') {
                $offerPropFilter[] = array(
                    'LOGIC' => 'OR',
                    'CATALOG_AVAILABLE' => 'Y',
                    'CATALOG_SUBSCRIBE' => 'Y'
                );
            }

            if (count($subFilter) > 1) {
                $subFilter['LOGIC'] = $condition['DATA']['All'];
                $subFilter = array($subFilter);
            }

            $result['=ID'] = \CIBlockElement::SubQuery(
                'PROPERTY_' . $catalogInfo['SKU_PROPERTY_ID'],
                $offerPropFilter + $subFilter
            );
        }
    }
}

function parseConditionLevelCustom($condition, $params)
{
    $result = array();

    if (!empty($condition) && is_array($condition)) {
        $name = parseConditionNameCustom($condition);
        if (!empty($name)) {
            $operator = parseConditionOperatorCustom($condition);
            $value = parseConditionValueCustom($condition, $name);
            $result[$operator . $name] = $value;

            if ($name === 'SECTION_ID') {
                $result['INCLUDE_SUBSECTIONS'] = isset($params['INCLUDE_SUBSECTIONS']) && $params['INCLUDE_SUBSECTIONS'] === 'N' ? 'N' : 'Y';

                if (isset($params['INCLUDE_SUBSECTIONS']) && $params['INCLUDE_SUBSECTIONS'] === 'A') {
                    $result['SECTION_GLOBAL_ACTIVE'] = 'Y';
                }

                $result = array($result);
            }
        }
    }

    return $result;
}

function parseConditionNameCustom(array $condition)
{
    $name = '';
    $conditionNameMap = array(
        'CondIBXmlID' => 'XML_ID',
//            'CondIBActive' => 'ACTIVE',
        'CondIBSection' => 'SECTION_ID',
        'CondIBDateActiveFrom' => 'DATE_ACTIVE_FROM',
        'CondIBDateActiveTo' => 'DATE_ACTIVE_TO',
        'CondIBSort' => 'SORT',
        'CondIBDateCreate' => 'DATE_CREATE',
        'CondIBCreatedBy' => 'CREATED_BY',
        'CondIBTimestampX' => 'TIMESTAMP_X',
        'CondIBModifiedBy' => 'MODIFIED_BY',
        'CondIBTags' => 'TAGS',
        'CondCatQuantity' => 'CATALOG_QUANTITY',
        'CondCatWeight' => 'CATALOG_WEIGHT'
    );

    if (isset($conditionNameMap[$condition['CLASS_ID']])) {
        $name = $conditionNameMap[$condition['CLASS_ID']];
    } elseif (strpos($condition['CLASS_ID'], 'CondIBProp') !== false) {
        $name = $condition['CLASS_ID'];
    }

    return $name;
}

function parseConditionOperatorCustom($condition)
{
    $operator = '';

    switch ($condition['DATA']['logic']) {
        case 'Equal':
            $operator = '';
            break;
        case 'Not':
            $operator = '!';
            break;
        case 'Contain':
            $operator = '%';
            break;
        case 'NotCont':
            $operator = '!%';
            break;
        case 'Great':
            $operator = '>';
            break;
        case 'Less':
            $operator = '<';
            break;
        case 'EqGr':
            $operator = '>=';
            break;
        case 'EqLs':
            $operator = '<=';
            break;
    }

    return $operator;
}

function parseConditionValueCustom($condition, $name)
{
    $value = $condition['DATA']['value'];

    switch ($name) {
        case 'DATE_ACTIVE_FROM':
        case 'DATE_ACTIVE_TO':
        case 'DATE_CREATE':
        case 'TIMESTAMP_X':
            $value = ConvertTimeStamp($value, 'FULL');
            break;
    }

    return $value;
}