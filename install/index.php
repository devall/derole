<?php

mysql_connect('localhost:3306','root','pass');
mysql_query('set names utf8');
mysql_query("CREATE DATABASE derole");

$sFileQuery = @file_get_contents('sql.sql');
mysql_query($sFileQuery);
