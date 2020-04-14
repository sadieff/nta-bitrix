<?php
$arUrlRewrite=array (
  0 => 
  array (
    'CONDITION' => '#^\\/?\\/mobileapp/jn\\/(.*)\\/.*#',
    'RULE' => 'componentName=$1',
    'ID' => NULL,
    'PATH' => '/bitrix/services/mobileapp/jn.php',
    'SORT' => 100,
  ),
  2 => 
  array (
    'CONDITION' => '#^/bitrix/services/ymarket/#',
    'RULE' => '',
    'ID' => '',
    'PATH' => '/bitrix/services/ymarket/index.php',
    'SORT' => 100,
  ),
  3 => 
  array (
    'CONDITION' => '#^/catalog/#',
    'RULE' => '',
    'ID' => 'bitrix:catalog',
    'PATH' => '/catalog/index.php',
    'SORT' => 100,
  ),
  1 => 
  array (
    'CONDITION' => '#^/rest/#',
    'RULE' => '',
    'ID' => NULL,
    'PATH' => '/bitrix/services/rest/index.php',
    'SORT' => 100,
  ),
  4 =>
  array (
    'CONDITION' => '#^/news/(.*)/#',
    'RULE' => 'ELEMENT_CODE=$1',
    'ID' => 'bitrix:news',
    'PATH' => '/news/detail.php',
    'SORT' => 100,
  ),
  5 =>
  array (
    'CONDITION' => '#^/actions/(.*)/#',
    'RULE' => 'ELEMENT_CODE=$1',
    'ID' => 'bitrix:news',
    'PATH' => '/actions/detail.php',
    'SORT' => 100,
  ),
  6 =>
  array (
    'CONDITION' => '#^/articles/(.*)/#',
    'RULE' => 'ELEMENT_CODE=$1',
    'ID' => 'bitrix:news',
    'PATH' => '/articles/detail.php',
    'SORT' => 100,
  ),
   7 =>
   array (
    'CONDITION' => '#^/filter/(.+?)/apply/#',
    'RULE' => 'SMART_FILTER_PATH=$1',
    'ID' => '',
    'PATH' => '/filter/index.php',
    'SORT' => 99,
   ),
   8 =>
   array (
    'CONDITION' => '#^/search/filter/(.+?)/apply/#',
    'RULE' => 'SMART_FILTER_PATH=$1',
    'ID' => '',
    'PATH' => '/search/filter/index.php',
    'SORT' => 99,
   ),
);
