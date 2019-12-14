<!DOCTYPE html>
<html lang="hu">
    <head>
        <meta charset="utf-8">
        <title>Munkabeosztás</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Munkabeosztást megjelenítő weboldal">
        <meta name="author" content="Borbás Tibor">
        <?php 
        if (isset($upd_interval)) {
            echo('<meta http-equiv="refresh" content="'.$upd_interval.'">');
        }
        ?>
        <link rel="stylesheet" type="text/css" href=<?php echo(base_url('css/styles.css')); ?>>
    </head>
    <body>