<?php

class Configs
{
	public function base_url(){
		if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') {
			$base_url = "https://";
		}else{
			$base_url = "http://";
		}
		$base_url .= $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
		return explode("installation/",$base_url)[0];
	}
}