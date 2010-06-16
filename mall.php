<?php 
session_start();
require 'inc/template.php';
$template = new template();

$template->setTitle('Index');
$template->addScript(array('test.js','script.js'));
$template->addCSS(array('index.css'));


include 'layout/head.php';
?>
		Nu är frågan om det är så här vi ska göra (:
<?php include 'layout/bottom.php'; ?>