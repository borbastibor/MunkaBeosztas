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
    include("Views/HederPartialView.php");
    include("Views/".$oldalak[$aktualisNezet].".php");
    ?>
</body>
</html>