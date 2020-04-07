<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
$APPLICATION->SetTitle("Главная");
?>

<?$APPLICATION->IncludeComponent(
	"opensource:order",
	"bascket",
	Array(
		"IBLOCK_ID" => 1
	)
);?>

<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');
?>
