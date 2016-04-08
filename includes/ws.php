<?php
/*
    Copyright (C) 2013-2016 xtr4nge [_AT_] gmail.com

    This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/

class WebService {
	
	private $global_webserver;
	private $s;
	private $username;
	private $token;
	
	public function __construct($token)
	{
		
		// Include Requests library
		include('../../api/includes/Requests/Requests.php');
	
		// load Requests internal classes
		Requests::register_autoloader();
		
		$this->global_webserver = "http://127.0.0.1:20000";
		
		// Set up session
		$this->s = new Requests_Session($this->global_webserver);
		$this->s->headers['Accept'] = 'application/json';
		$this->s->useragent = 'FruityDNS';
		
		// Set up login user/pass
		$this->username = $username;
		$this->password = $password;
		$this->token = $token;
		
	}
	
	public function __destruct()
	{
		//
	}
	
	private function login()
	{
		//
	}
	
	public function getModules()
	{
		$output = $this->s->get($this->global_webserver."/");
		return json_encode(json_decode($output->body));
	}
	public function setModulesStatus($module, $action)
	{
		$output = $this->s->get($this->global_webserver."/setModulesStatus/$module/$action");
		return json_encode(json_decode($output->body));
	}
	public function getModulesStatusAll()
	{
		$output = $this->s->get($this->global_webserver."/getModulesStatusAll");
		return json_encode(json_decode($output->body));
	}
	//-------------->
	public function getA()
	{
		$output = $this->s->get($this->global_webserver."/dns/A");
		return json_encode(json_decode($output->body));
	}
	public function setA($domain, $ip)
	{
		$output = $this->s->get($this->global_webserver."/dns/add/".$domain."/".$ip);
		return json_encode(json_decode($output->body));
	}
	public function delA($domain)
	{
		$output = $this->s->get($this->global_webserver."/dns/del/".$domain);
		return json_encode(json_decode($output->body));
	}
}


?>