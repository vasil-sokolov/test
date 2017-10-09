<?php 
include_once dirname(__File__) . '/system/autoload.php';
	
\Aurora\System\Api::Init();

$DbHost = '127.0.0.1';
$DbLogin = 'root';
$DbPassword = '';
$DbName = 'aurora';

$oCoreDecorator = \Aurora\System\Api::GetModuleDecorator('Core');

if ($oCoreDecorator)
{
	$oCoreDecorator->UpdateSettings($DbLogin, $DbPassword, $DbName, $DbHost);
}