<?php
$host="127.0.0.1";
$db='class';
$user='root';
$pwd='root';
$charset="UTF8";
$dbh=new PDO("mysql:host={$host};dbname={$db};charset={$charset}",$user,$pwd);