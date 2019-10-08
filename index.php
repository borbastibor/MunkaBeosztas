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
$currentSite = "settings";
$settings = parse_ini_file("config.ini");
$_SESSION['updTime'] = date("Y-m-d H:i");
$_SESSION['dataFile'] = $settings['dataFile'];
$_SESSION['updDensity'] = $settings['updDensity'];
$_SESSION['intervalFrom'] = $settings['intervalFrom'];
$_SESSION['intervalTo'] = $settings['intervalTo'];

if (isset($_GET['oldal'])) {
    $currentSite = $_GET['oldal'];
}

if (isset($_POST['dataFile'])) {
    $isError = FALSE;
    if($_POST['dataFile'] != "") {
        if(file_exists($_POST['dataFile'])) {
            $settings['dataFile'] = $_POST['dataFile'];
            $_SESSION['dataFile'] = $settings['dataFile'];
        } else {
            $isError = TRUE;
            ?><script>alert("Nem létezik a megadott fájl!");</script><?php
        }
    }
    if($_POST['updDensity'] != "") {
        if(intval($_POST['updDensity']) > 0 && intval($_POST['updDensity']) < 60) {
            $settings['updDensity'] = $_POST['updDensity'];
            $_SESSION['updDensity'] = $settings['intervalFrom'];
        } else {
            $isError = TRUE;
            ?><script>alert("A frissítés gyakorisága 1 és 59 közötti érték kell legyen!");</script><?php
        }
    }
    if($_POST['intervalFrom'] != "" && $_POST['intervalTo'] != "") {
        $iFrom = new DateTime(date("Y-m-d")." ".$_POST['intervalFrom']);
        $iTo = new DateTime(date("Y-m-d")." ".$_POST['intervalTo']);
        if($iFrom < $iTo) {
            $settings['intervalFrom'] = $_POST['intervalFrom'];
            $_SESSION['intervalFrom'] = $settings['intervalFrom'];
            $settings['intervalTo'] = $_POST['intervalTo'];
            $_SESSION['intervalTo'] = $settings['intervalTo'];
        } else {
            $isError = TRUE;
            ?><script>alert("A kezdő időpont kissebb kell legyen, mint a befejező időpont!");</script><?php
        }
    }
    if(!$isError) {
        $inifile = fopen("config.ini", "w");
        fwrite($inifile,"[settings]".PHP_EOL);
        fwrite($inifile,"dataFile = ".$settings['dataFile'].PHP_EOL);
        fwrite($inifile,"updDensity = ".$settings['updDensity'].PHP_EOL);
        fwrite($inifile,"intervalFrom = ".$settings['intervalFrom'].PHP_EOL);
        fwrite($inifile,"intervalTo = ".$settings['intervalTo'].PHP_EOL);
        fclose($inifile);
    }
}
?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="author" content="Borbás Tibor">
    <title>Munkabeosztás</title>
    <!-- A következő sort írtam bele -->
    <meta http-equiv="refresh" content="15">
    <link rel="stylesheet" href="styles.css" type="text/css">
</head>
<body>
    <div class="headercontainer">
        <?php
            if($currentSite == "table") {
                echo("<a class='active' href='?oldal=table'>Táblázat</a>");
                echo("<a class='navbutton' href='?oldal=settings'>Beállítások</a>");
            } else {
                echo("<a class='navbutton' href='?oldal=table'>Táblázat</a>");
                echo("<a class='active' href='?oldal=settings'>Beállítások</a>");
            }
        ?>
        <div class="textbox">
            <?php echo("Utoljára frissítve: ".$_SESSION['updTime']); ?>
        </div>
        <div class="textbox" id="updtextbox"></div>
    </div>
    <?php
        include(realpath(dirname(__FILE__))."../".$currentSite.".php");
    ?>
</body>
</html>
