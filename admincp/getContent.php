<?php
include('header.php');
//goi file fckeditor
include_once('../public/FCKeditor/fckeditor.php') ;

$name = $_GET['name'];

getFCKeditor($name);
?>