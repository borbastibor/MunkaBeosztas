<!DOCTYPE html>
<html lang="hu">
    <head>
        <meta charset="utf-8">
        <title>Munkabeosztás</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Munkabeosztást megjelenítő weboldal">
        <meta name="author" content="Borbás Tibor">
        <?php
            if ($iscalendarview) {
                echo('<meta http-equiv="refresh" content="'.$refreshinterval.'">');
            }
        ?>
        <link rel="stylesheet" type="text/css" href=<?php echo(base_url('css/mainStyles.css')); ?>>
        <link rel="stylesheet" type="text/css" href=<?php echo(base_url('css/tagStyles.css')); ?>>
        <link rel="stylesheet" type="text/css" href=<?php echo(base_url('css/tableStyles.css')); ?>>
        <link rel="stylesheet" type="text/css" href=<?php echo(base_url('css/controlStyles.css')); ?>>
    </head>
    <body>