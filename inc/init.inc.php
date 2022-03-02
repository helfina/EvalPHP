<?php
//Création/ouverture du fichier de session
session_start();
//PREMIRE LIGNE DE CODE, se positionne en haut et en premier avant tout traitements php
//------------------------------------------------------------
//Connexion à la BDD :
//if()
//$pdo  = new PDO('mysql:host=localhost;dbname=gk_wf3_php_intermediaire_gaelle', 'root', 'root' , array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_WARNING ) );

//------------------------------------------------------------
//definition d'une constante :
if(is_dir('C:')){
    $pdo  = new PDO('mysql:host=localhost;dbname=gk_wf3_php_intermediaire_gaelle', 'root', 'root' , array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_WARNING ) );
    $serverName = 'evalphp.test';
    define( 'URL', "http://".$serverName."/");
}else{
    $user = '';
    $pass = '';
    $pdo  = new PDO('mysql:host=localhost;dbname=gk_wf3_php_intermediaire_gaelle', $user, $pass , array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_WARNING ) );
    $serverName = 'evalphp.g.maxslid.com';
    define( 'URL', "https://".$serverName."/");
}

//http://evalphp.test/
//[SERVER_NAME] => evalphp.test
//correspond à l'URL de la racine de notre site

//------------------------------------------------------------
//definition des variables :
$content = ''; //variable prévue pour recevoir du contenu
$error = ''; //variable prévue pour recevoir les messages d'erreurs

//------------------------------------------------------------
//Inclusion des fonctions :
require_once "functions.inc.php";

//debug($_SERVER);
//[HTTP_REFERER] => http://php_wf3.test/EvalPHP/index.php