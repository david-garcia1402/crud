<?php
//conexão com o banco de dados
define('HOST', 'localhost');
define('USER', 'root');
define('PASS', 'hardness');
define('BASE', 'sqlform');

$conn = new MySQLi(HOST, USER, PASS, BASE);
