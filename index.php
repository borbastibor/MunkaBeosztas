<?php
/*
 * index.php
 * A weblap kinézetének a vázát adja meg egy fejléccel,
 * navigációs gombokkal és egy információs sávval. Ezenkívül
 * front controller-ként működik lekezelve a GET és POST kéréseket.
 * Készítette: Borbás Tibor
 * Utolsó módosítás: 2019. szeptember 03.
*/
session_start();
$settings = parse_ini_file("config.ini");
$_SESSION['dataFile'] = $settings['dataFile'];
$_SESSION['updDensity'] = $settings['updDensity'];

?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="author" content="Borbás Tibor">
    <title>Munkabeosztás</title>
    <meta http-equiv="refresh" content=<?php $settings['updDensity'] ?>>
    <link rel="stylesheet" href="styles.css" type="text/css">
</head>
<body>
    <?php
        include(realpath(dirname(__FILE__))."../".$currentSite.".php");
    ?>
</body>
</html>
