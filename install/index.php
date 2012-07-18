<?php

$sDbName = 'derole';

mysql_connect('localhost:3306','root','pass');
mysql_query('set names utf8');
mysql_query('CREATE DATABASE '.$sDbName);
mysql_select_db($sDbName);

$sFileQuery = @file_get_contents('sql.sql');

$aQuery = explode(';',$sFileQuery);
foreach($aQuery as $sQuery) {
  mysql_query($sQuery);
}

echo mysql_error();
