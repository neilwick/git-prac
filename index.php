<?php

require_once 'includes/config/secrets.php';
require_once 'includes/config/dbconn.php';
require_once 'includes/config/visits.php';
require_once 'includes/sections/page.php';
require_once 'includes/sections/head.php';

?>

<body>
<?php require_once 'includes/sections/nav.php';?>
<h1><?php echo $currpage["title"] ?></h1>
<hr />
<?php

echo $visit_count;
echo $currpage['content'];
//echo $page;
$page_file = "includes/pages/" . $currpage["file"] . ".php";
if (file_exists($page_file)) {
    include $page_file;
}

?>
</body>
</html>
