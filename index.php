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
				//file_put_contents('replace.txt',var_export($matches2,true));
				echo implode('', $matches2);
			}
		}
	}
}
?>