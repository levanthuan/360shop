<?php
$dbHost='localhost';
$dbUser='root';
$dbPass='';
$dbName='360shop';
$dbConnect=mysql_connect($dbHost,$dbUser,$dbPass);
$dbSelect=mysql_select_db($dbName,$dbConnect);
$dbSetLang=mysql_query("SET NAMES 'utf8'");
?>