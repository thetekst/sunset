<?php
###
#	К сожалению, если хостер выставил в php.ini allow_url_fopen = false 
#	(т.е. запретил удаленно открывать файлы), то загрузить что-то удаленно, 
#	не получится. Да и серьезные веб сайты таким способом парсить не стоит, 
#	лучше использовать CURL с поддержкой proxy и ssl. 

require_once('./lib.php');

$url = 'http://dateandtime.info/ru/city.php?id=524901';
$response = file_get_contents($url);
$pattern = '/Заход солнца: \n\t<span.*>\d{2}:\d{2}/m';

preg_match_sunset($pattern, $response);

#Парсить один раз в день. Затем посчитать таймаут. Уменьшить таймаут до минуты, когда останеться 5 мин.
?>
<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
<script>
	function showTime(){
		var now = new Date();
		var t = now.toLocaleTimeString();
		console.log(t);
		//console.log(unixTime(now));
		
		
		
		//var match = unixTime(now);
		
		
		//var d = parseInt(new Date(getYear(),getMonth(), getDate, split[0], split[1], 0).getTime()/1000);
		
		
	}
	function unixTime(thisTime){
		return parseInt(thisTime.getTime()/1000);
	}
	$(document).ready(function() {
		var timer;
		var time = $('time').text();
		var split = time.split(':');
		
		if(!timer) {
			timer = window.setInterval("showTime()", 1000);
		}
		var t = parseInt(new Date(getYear(),getMonth(), getDate, split[0], split[1], 0).getTime()/1000);
		console.log(t);
	});
</script>