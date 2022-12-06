<?php
use Gt\Config\Config;
use Gt\DomTemplate\DocumentBinder;
use Gt\Http\Response;
use Gt\Input\Input;
use Gt\Session\Session;

function go(Session $session, DocumentBinder $binder, Config $config):void {
	if($name = $session->getString("your-name")) {
		$binder->bindKeyValue("your-name", $name);
	}

	$binder->bindKeyValue("configSecret", $config->getString("example.secret"));
	$binder->bindKeyValue("configMessage", $config->getString("example.test_key"));
}

function do_greet(Input $input, Session $session, Response $response):void {
	$session->set("your-name", $input->getString("your-name"));
	$response->reload();
}
