<?php
function preg_match_sunset($pattern, $response) {
	if(!empty($pattern) && !empty($response)) {
		if(preg_match($pattern,$response,$matches)) {
			$response2 = implode("", $matches);
			$pattern2 = '/\d{2}:\d{2}/m';
			if(preg_match($pattern2, $response2, $matches2)) {
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
						echo '<p>Заход солнца был в <time>'.$string_date.'</time>. Пора бы закрыть окно.</p>';
					} else {
						echo '<p>Солнце зайдет в <time>'.$string_date.'</time></p>';
					}
				}
			}
		}
	}
}
?>