<?php

$conf = array(
    'dbDatabase' => 'sqlform',
    'dbHost'     => '127.0.0.1',
    'dbUser'     => 'root',
    'dbPass'     => 'hardness'

);

$conn = new mysqli("dbDatabase", "dbHost", "dbUser", "dbPass");