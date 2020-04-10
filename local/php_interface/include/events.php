<?
use Bitrix\Main;
use Bitrix\Main\Loader;

/*AddEventHandler('catalog', 'OnSuccessCatalogImport1C', 'catalogImport');

function catalogImport(){
    file_put_contents($_SERVER["DOCUMENT_ROOT"] . "/local/php_interface/log/1Ctrigger.log",  "1");
}*/

/* создадим пользователя, если его нет, при оформлении заказа */
global $USER;
$USER = new CUser;
if (!$USER->IsAuthorized()) Main\EventManager::getInstance()->addEventHandler('sale', 'OnSaleOrderBeforeSaved', 'createUser');

function createUser(Main\Event $event)
{
    /** @var Order $order */

    /* получим свойства */
    $order = $event->getParameter("ENTITY");
    $propertyCollection = $order->getPropertyCollection();
    $somePropValue = $propertyCollection->getItemByOrderPropertyId(4); // EMAIL
    $email = $somePropValue->getValue();
    $arErrors = array();

    /* создадим пользователя */

    Loader::includeModule('sale');
    $newUserId = CSaleUser::DoAutoRegisterUser(
        $email,
        $email,
        "S1",
        $arErrors,
        array("ACTIVE" => "N")
    );

    /* передадим номер созданного пользователя в заказ */
    $order->setFieldNoDemand("USER_ID", $newUserId);

}