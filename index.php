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
    <div class="mainframe">
    <table id="vistable">
        <?php
            function checkSheetName($datestr) {
                $dates = explode("-",$datestr);
                $lowerDate = explode(".",$dates[0]);
                $upperDate = explode(".",$dates[1]);
                $lDate = new DateTime(date("Y")."-".$lowerDate[0]."-".$lowerDate[1]);
                $uDate = new DateTime(date("Y")."-".$upperDate[0]."-".$upperDate[1]);
                $cDate = new DateTime(date("Y-m-d"));
                if($cDate >= $lDate && $cDate <= $uDate) {
                    return TRUE;
                }
                return FALSE;
            }

            require 'vendor/autoload.php';
            use PhpOffice\PhpSpreadsheet\Xlsx;

            if($settings['dataFile'] != "") {
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
                $spreadsheet = $reader->load($settings['dataFile']);
                $sheetnames = $spreadsheet->getSheetNames();
                foreach ($sheetnames as $value) {
                    if(checkSheetName($value)) {
                        $worksheet = $spreadsheet->getSheetByName($value);
                        $highestRow = $worksheet->getHighestRow();
                        $highestColumn = $worksheet->getHighestColumn();
                        $highestColumnIndex = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($highestColumn);
                        echo("<table>".PHP_EOL);
                        for($row = 1; $row <= $highestRow; ++$row) {
                            echo("<tr>".PHP_EOL);
                            $namecol = FALSE;
                            $holidaycol = FALSE;
                            $sickcol = FALSE;
                            $absencecol = FALSE;
                            for($col = 1; $col <= $highestColumnIndex; ++$col) {
                                $styleString = "";
                                $value = $worksheet->getCellByColumnAndRow($col, $row)->getValue();
                                switch($value) {
                                    case "Név":
                                        $namecol = TRUE;
                                        break;

                                    case "Szabadság":
                                        $holidaycol = TRUE;
                                        break;

                                    case "Beteg":
                                        $sickcol = TRUE;
                                        break;

                                    case "Távollét":
                                        $absencecol = TRUE;
                                        break;
                                }
                                if($namecol) {
                                    $styleString = $styleString." border-width: 1px 3px 3px 3px; ";
                                }
                                if($holidaycol) {
                                    $styleString = $styleString." color: rgb(0,180,0); ";
                                }
                                if($sickcol) {
                                    $styleString = $styleString." color: rgb(0,0,255); ";
                                }
                                if($absencecol) {
                                    $styleString = $styleString." color: rgb(255,0,0); ";
                                }
                                if($row == 1 || $col == 1) {
                                    $styleString = $styleString." font-weight: bold; background-color: rgb(170,170,170); ";
                                    if($row == 1) {
                                        $styleString = $styleString." border-width: 1px 3px 3px 3px; ";
                                    }
                                }
                                if($col == 7 || $col == 8) {
                                    $styleString = $styleString." background-color: rgb(98, 171, 255); ";
                                }
                                echo("<td style= '".$styleString."'>".$value."</td>");
                            }
                            echo("</tr>".PHP_EOL);
                        }
                        echo("</table>".PHP_EOL);
                    }
                }
            } else {
                echo("<tr><td style='margin: 0px; padding: 20px; height: 100%; font-size: 18px; font-weight: bold; text-align: center; border: none;'>Nincs kiválasztva adatfájl!</td></tr>");
            }
        ?>
    </table>
    </div>
</body>
</html>
