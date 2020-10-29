<?php

$link = 'mysql:host=localhost;dbname=kips45_usuarios';
$usuario = 'kips45_admin';
$contrase単a = 'kipschile2020A';

try{

    $pdo = new PDO($link,$usuario,$contrase単a);
    $pdo->exec("set names utf8");

    //echo 'Conectado <br>';

    //foreach($pdo->query('SELECT * FROM `colores`') as $fila) {
    //    print_r($fila);
    //}
	//
	//$link = 'mysql:host=localhost;dbname=pmtcl_sinextradb';
	//$usuario = 'pmtcl_sinextras';
	// $contrase単a = '!Alfredo2019!';
	//
	// csi39531_sinextradb
	// csi39531_extra
	// snxtr2019


} catch (PDOException $e) {
    print "臓Error!: " . $e->getMessage() . "<br/>";
    die();
}