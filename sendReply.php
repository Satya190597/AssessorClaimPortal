<?php
	include_once 'connection/connection.php';
	include_once 'class/controller.php';
	$jsonData = json_decode(file_get_contents('php://input'));
	$object = new accessorOperations();
	$object->sendReply($jsonData->adhar,$jsonData->reply,$jsonData->requestId);
?>