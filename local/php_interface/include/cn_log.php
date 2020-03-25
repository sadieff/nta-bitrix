<?

define('CN_LOG', $_SERVER["DOCUMENT_ROOT"]."/local/logs/cn_log.txt");

/**
 * Класс для ведения логирования
 *
 * @author sallee AT info-expert.ru
 */
class CNLog {

	private $active=false;

	private function __construct() {}
	/**
	 * Запись в лог
	 * @param string  $msg   текст, который будет записан в лог
	 * @param boolean $clean если установлено - очистит лог-файл
	 */
	public static function Add($msg, $clean=false) {
		if (defined('CN_LOG') && is_string($msg)) {
			$DATE = date('Y-m-d H:i:s');
			$strCalledFrom = '';
			if (function_exists('debug_backtrace')) {
				$locations = debug_backtrace();
				$strCalledFrom = 'F: '.$locations[0]['file']. "\n" . '      L: '.$locations[0]['line'];
			}
			$logMsg = "\n" .
					'date: ' . $DATE . "\n" .
					'mess: ' . $msg . "\n" .
					'from: ' . $strCalledFrom . "\n" .
					'uri : ' . $_SERVER['REQUEST_URI'] . "\n" .
					'----------------------------------------------------------';
			if ($clean) {
				CNLog::CleanLog();
			}
			CNLog::AppendLog($logMsg);
		}
	}

	/**
	 * Функция добавления новой записи в лог
	 * @param string $msg текст записи
	 */
	private static function AppendLog($msg) {
		if ($fp = fopen(CN_LOG, 'ab')) {
			fwrite($fp, $msg);
			fclose($fp);
		}
	}

	/**
	 * Удаление лог-файла
	 */
	private static function CleanLog() {
		@unlink(CN_LOG);
	}

	/**
	 * Получение лог-файла
	 */
	public static function GetLog() {
		$log = false;
		if ($fp = fopen(CN_LOG, 'rb')) {
			$log = fread($fp);
			fclose($fp);
		}
		return $log;
	}

}


