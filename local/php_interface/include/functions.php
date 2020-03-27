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