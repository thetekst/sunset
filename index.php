<?php
$str = file_get_contents('http://dateandtime.info/ru/city.php?id=524901');
$pattern = '/Заход солнца: \n\t<span.*>\d{2}:\d{2}/m';

preg_match_sunset($pattern, $str);

function preg_match_sunset($pattern, $str) {
	if(!empty($pattern) && !empty($str)) {
		if(preg_match($pattern,$str,$matches)) {
			$str2 = implode("", $matches);
			$pattern2 = '/\d{2}:\d{2}/m';
			if(preg_match($pattern2, $str2, $matches2)) {
				$string_date = implode('', $matches2);
				$array_hour_and_minute = explode(':', $string_date);
				if(count($array_hour_and_minute) == 2) {
					$hour 	= $array_hour_and_minute[0];
					$minute = $array_hour_and_minute[1];
					
					$array_date = explode(',', date("s,m,d,Y"));
					
					$second = $array_date[0];
					$month	= $array_date[1];
					$day	= $array_date[2];
					$year	= $array_date[3];
					
					$expired = mktime($hour, $minute, $second, $month, $day, $year);
					$now = time();
					
					if($now >= $expired) {
						echo 'Заход солнца был в '.$string_date.'. Пора бы закрыть окно.';
					} else {
						echo 'Заход солнца будут в '.$string_date;
					}
				}
			}
		}
	}
}
?>