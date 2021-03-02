<?php

$query = 'INSERT INTO `log` (ip_address) VALUES (:addr);';
$pdo_getpage = $db->prepare($query);

$pdo_getpage->execute(["addr" => $_SERVER['REMOTE_ADDR']]);

$result = $db->query("SELECT count(logID) AS c from `log`");

$visit_count = $result->fetch()['c'];
