<?php if (!defined('ALLOW_PAGSEGURO_CONFIG')) { die('No direct script access allowed'); }
/*
************************************************************************
PagSeguro Config File
************************************************************************
*/

$PagSeguroConfig = array();

$PagSeguroConfig['environment'] = Array();
$PagSeguroConfig['environment']['environment'] = "production";

$PagSeguroConfig['credentials'] = Array();
$PagSeguroConfig['credentials']['email'] = "financeiro@centraldoveiculo.com.br";
$PagSeguroConfig['credentials']['token'] = "B9AEF459FC6C45B5AFAB0A7D84E6D2A1";

$PagSeguroConfig['application'] = Array();
$PagSeguroConfig['application']['charset'] = "UTF-8";

$PagSeguroConfig['log'] = Array();
$PagSeguroConfig['log']['active'] = FALSE;
$PagSeguroConfig['log']['fileLocation'] = "";

?>