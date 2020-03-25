<?php

use Bitrix\Highloadblock as HL;
use Bitrix\Main\Entity;

/**
 * [cnGetHighloadList description]
 * @param  [type] $hlblock_id [description]
 * @return [type]             [description]
 */
function cnGetHighloadList($hlblock_id, $arFilter=array()) {

	if (!CModule::IncludeModule('highloadblock')) {
		return false;
	}
	if (!is_array($arFilter)) {
		$arFilter = array();
	}

	$hlblock = HL\HighloadBlockTable::getById($hlblock_id)->fetch();
	$entity  = HL\HighloadBlockTable::compileEntity($hlblock);

	$main_query = new Entity\Query($entity);
	$main_query->setSelect(array('*'));
	if (count($arFilter)) {
		$main_query->setFilter($arFilter);
	}
	$result = $main_query->exec();
	$result = new CDBResult($result);
	$arList = array();
	while ($row = $result->Fetch()) {
		$arList[] = $row;
	}

	return $arList;
}
