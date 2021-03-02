<?php

$page = "home";

if (isset($_GET['p'])) {
    $tpage = $_GET['p'];
    $tpage = strtolower(strip_tags($tpage));
    $page = $tpage;
}

// while ($row = $result->fetch()) {
//     echo $row['title'] . '<br />';
// }

// positional
// $query = 'SELECT `pageID`,`name`,`title`,`menu`,`file` FROM `page` WHERE `name` = ?';
// $result = $pdo_getpage->execute(["home"]);

// name/associative
$query = 'SELECT `pageID`,`name`,`title`,`file`,`content` FROM `page` WHERE `name` = :grod';

$pdo_getpage = $db->prepare($query);
$pdo_getpage->execute(["grod" => $page]);

$currpage;
if ($row = $pdo_getpage->fetch()) {
    $currpage = $row;
} else {
    $pdo_getpage->execute(["grod" => "home"]);
    $currpage = $pdo_getpage->fetch();
}
