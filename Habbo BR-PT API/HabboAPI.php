<?php

class HabboAPI {
	
	private function GetUser($name) { 

		$url = 'https://habboapi.uwhosting.com.br/habbo/'.$name;

		$ch = curl_init();

		curl_setopt($ch, CURLOPT_URL, $url);

		curl_setopt($ch, CURLOPT_HEADER, false);

		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);

		curl_setopt($ch,CURLOPT_SSL_VERIFYPEER, false);

		$result = curl_exec($ch);

		return json_decode($result);

		curl_close($ch); 

	} 

	public static function GetInfo($name) {
	
		$info = self::GetUser($name);

		return $info;

	}

}

?>