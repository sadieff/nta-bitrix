<?

use Bitrix\Main\{
    EventManager,
    Loader,
    Diag\Debug
};

Loader::registerAutoLoadClasses(null, array(
    '\ClassSale' => '/local/php_interface/include/handlers/order.php',
    '\ClassMain' => '/local/php_interface/include/handlers/main.php',
    '\ClassSearch' => '/local/php_interface/include/handlers/search.php',
    '\ClassForm' => '/local/php_interface/include/handlers/form.php',
    '\SeoFilter' => '/local/php_interface/include/seofilter.php',
    "\Fred\Нandlers\Iblock" => "/local/php_interface/iblock/Iblock.php",
));


$eventManager = \Bitrix\Main\EventManager::getInstance();

// main
$eventManager->addEventHandlerCompatible('main', 'OnProlog', array('\ClassMain', 'OnPrologHandler'));
$eventManager->addEventHandlerCompatible('main', 'OnBeforeEventAdd', array('\ClassMain', 'OnBeforeEventAddHandler'));

$eventManager->addEventHandlerCompatible('form', 'onBeforeResultAdd', array('\ClassForm', 'onBeforeResultAddHandler'));

$eventManager->addEventHandler(
    "iblock",
    "OnIBlockPropertyBuildList",
    [
        "Fred\\Нandlers\\Iblock",
        "OnIBlockPropertyBuildList"
    ]
);

require_once 'cn_log.php';