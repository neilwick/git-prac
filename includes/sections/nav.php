<?php
$query = 'SELECT menu, `name` FROM nav JOIN page on nav.pageID=page.pageID order by sort;';
$result = $db->query($query);

?>

<nav>
    <ul>
    <?php

// echo $currpage["name"];
foreach ($result as $row) {
    //echo $row["menu"] . "<br />" . $row["name"] . '<hr />';
    echo '<li class="' .
        ($currpage["name"] === $row["name"] ? 'active' : 'inactive') .
        '"><a href="?p=' .
        $row["name"] . '">' .
        $row["menu"] .
        '</a></li>';
}

?>
    </ul>
</nav>