<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	</head>
	<body>
		<!--0 0 0 0 0

		<br/><br/>
		<a href="nothing.php">Move</a><br/><br/>-->

		<?php

print "한국상하수도협회 교육홈페이지 방문자수 (테스트용)" . "<br/><br/>";

$page = 1;
$perPage = 5;

print "출력 횟수: " . $perPage . "<br/><br/>";

$serviceKey = "jJIP7tDlfl4QoksxclTp5r6cyl5%2Bn7WZnQUwsw3g5FXJSaXJyBRdYVyc2jEv5iuiXbwCKarsivrF63lpQxjxWA%3D%3D";

$url = "https://api.odcloud.kr/api/15093373/v1/uddi:2d2989e6-8233-40f6-a4db-dbe92e979691?page=" . $page . "&perPage=" . $perPage . "&serviceKey=" . $serviceKey;

$ch = curl_init();  // curl 초기화
curl_setopt($ch, CURLOPT_URL, $url);  // URL 지정하기
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);  // 요청 결과를 문자열로 반환 
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);  // connection timeout 10초 
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);  // 원격 서버의 인증서가 유효한지 검사 안함
 
//

print "request 전송..." . "<br/><br/>";

$response = curl_exec($ch);
print "response : " . $response . "<br/><br/>";

//

$arr = json_decode($response, true);
print "결과 횟수 (=출력 횟수): " . $arr["currentCount"] . "<br/><br/>";

print "방문자수 / 접속년도 / 접속월 /" . "<br/>";

foreach ($arr["data"] as $a) {
	foreach ($a as $b) {
		print $b;
		print "  /  ";
	}
	print "<br/>";
}

print "<br/>";

//

print "방문자수 최대값: ";

$max = 0;

foreach ($arr["data"] as $a) {
	$i = 0;

	foreach ($a as $b) {
		if($i == 0){     // $arr["data"][n]["방문자수"] 가 값을 못 불러와서 each for문으로 대신 구현했습니다 ㅠㅠ
			if($max < $b){
				$max = $b;
			}

			break;
		}

		$i += 1;
	}
}

print $max . "<br/>";

//

curl_close($ch);

		?>
	</body>
</html>
