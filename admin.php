<?php
require_once 'includes/config/secrets.php';
require_once 'includes/config/dbconn.php';

if (isset($_POST['name']) && isset($_POST['content'])) {
    echo $_POST['content'];

    $query = 'UPDATE page SET content = :content WHERE `name` = :name';

    $pdo_updatepage = $db->prepare($query);

    $pdo_updatepage->execute(["content" => $_POST['content'], "name" => $_POST['name']]);
}

require_once 'includes/sections/page.php';
require_once 'includes/sections/head.php';

?>

<body>
<?php require_once 'includes/sections/nav.php';?>
<h1><?php echo $currpage["title"] ?></h1>
<hr />

<form action="admin.php" method="POST"
    enctype="application/x-www-form-urlencoded">
    <textarea name="content"><?php echo $currpage['content'] ?></textarea>
    <input type="hidden" name="name" value="<?php echo $currpage['name'] ?>" />
    <input type="submit" />
</form>

<?php

echo $currpage['content'];
//echo $page;
$page_file = "includes/pages/" . $currpage["file"] . ".php";
if (file_exists($page_file)) {
    include $page_file;
}

?>
</body>
</html>
