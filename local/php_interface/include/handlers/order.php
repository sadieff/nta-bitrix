<?
use \Bitrix\Main\Loader;

class ClassSale
{
    public static function OnSaleComponentOrderOneStepFinalHandler($orderId, $arOrder, $arParams)
    {
        global $APPLICATION;
        
        \Bitrix\Main\Loader::includeModule('sale');
        \Bitrix\Main\Loader::includeModule('iblock');
// p($orderId, 'OnSaleComponentOrderOneStepFinalHandler orderId');
// p($_SESSION['YM_ORDER_ID_NNN'], 'YM_ORDER_ID_NNN');
        if (isset($_SESSION['YM_ORDER_ID_NNN']) && $_SESSION['YM_ORDER_ID_NNN'] == $orderId) {
            return;
        }
 
        if (!($arOrder = \CSaleOrder::GetByID($orderId))) {
//p($arOrder, '!!!arOrder!!!');   
            return;
        }
 
        $site = \Bitrix\Main\SiteTable::getRowById($arOrder['LID']);
 
        $server = \Bitrix\Main\Application::getInstance()->getContext()->getServer();
 
        $output = [
            'ecommerce' => [
                'currencyCode' => (string)$arOrder['CURRENCY'],
                'purchase' => [
                    'actionField' => [
                        'id' => (int)$arOrder['ID'],
                        'affiliation' => (is_array($site) ? $site['NAME'] : $server->getHttpHost()),
                        'revenue' => (float)$arOrder['PRICE'],
                        'tax' => 0.00,
                        'shipping' => (float)$arOrder['PRICE_DELIVERY'],
                        // 'goal_id' => 19768025,
                    ],
                    'products' => [],
                ],
            ]
        ];
 
        $basketIterator = \CSaleBasket::GetList(
            array(
                'NAME' => 'ASC',
            ),
            array(
                'ORDER_ID' => $orderId,
            ),
            false,
            false,
            array(
                'PRODUCT_ID',
                'NAME',
                'PRICE',
                'QUANTITY',
            )
        );
 
        $basketItems = array();
 
        $productsIds = array();
 
        $productsData = array();
 
        while ($basketItem = $basketIterator->fetch()) {
            $basketItems[] = $basketItem;
 
            $productsIds[] = $basketItem['PRODUCT_ID'];
        }
 
        unset($basketItem);
 
        $resProducts = \CIBlockElement::GetList(
            array(),
            array(
                'ID' => array_unique($productsIds)
            ),
            false,
            false,
            array(
                'ID',
                'IBLOCK_ID',
                'IBLOCK_SECTION_ID',
            )
        );
        while ($arProduct = $resProducts->Fetch()) {
 
            $arProduct['SECTION_NAME'] = '';
 
            // получим раздел к которому принадлежит товар
            $arElementFilter = array('ID' => \CIBlockElement::SubQuery('PROPERTY_CML2_LINK', array('ID' => $arProduct['ID'])));
            $rsElements = \CIBlockElement::GetList(array(), $arElementFilter, false, false, array('ID', 'IBLOCK_ID', 'IBLOCK_SECTION_ID'));
            if($arElement = $rsElements->GetNext())
            {
                $arProduct['IBLOCK_SECTION_ID'] = $arElement['IBLOCK_SECTION_ID'];
            }
            
            if (intval($arProduct['IBLOCK_SECTION_ID']) > 0) {
 
                $sectionIterator = \CIBlockSection::GetList(
                    array(),
                    array(
                        'ID' => $arProduct['IBLOCK_SECTION_ID'],
                    ),
                    false,
                    array(
                        'NAME',
                    )
                );
 
                if ($arSection = $sectionIterator->Fetch()) {
                    $arProduct['SECTION_NAME'] = $arSection['NAME'];
                }
 
            }
 
            $productsData[$arProduct['ID']] = $arProduct;
        }
 
        foreach ($basketItems as $basketItem) {
            $output['ecommerce']['purchase']['products'][] = [
                'id' => (int)$basketItem['PRODUCT_ID'],
                'name' => (string)$basketItem['NAME'],
                'category' => (string)(isset($productsData[$basketItem['PRODUCT_ID']])
                    ? $productsData[$basketItem['PRODUCT_ID']]['SECTION_NAME']
                    : ''),
                'price' => (float)$basketItem['PRICE'],
                'quantity' => (int)$basketItem['QUANTITY'],
            ];
        }
 

        \Bitrix\Main\Page\Asset::getInstance()->addString(
            '<script>(window.dataLayer || []).push(' . \CUtil::PhpToJSObject($output, false, true, true) . '); console.log("window.dataLayer push");</script>',
            true
        );
 
        $_SESSION['YM_ORDER_ID_NNN'] = $orderId;
//p($output, 'output',1);
    }
   
}

?>