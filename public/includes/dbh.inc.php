<?php
//connection to database
$con = new PDO('mysql:host=localhost;dbname=timelogs;charset=utf8', 'root', '');
$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$con->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
