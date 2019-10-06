<?php
/*
 * table.php
 * Az .xlsx fájlból beolvassa az adatokat és megjeleníti formázottan
 * a weblapon egy táblázatban. A végén található javascript gondoskodik
 * a weblap frissítéséről (újratölti) a megadott időközönként.
 * Készítette: Borbás Tibor
 * Utolsó módosítás: 2019. szeptember 03.
*/
?>
<div class="mainframe">
    <table id="vistable">
        <?php
            function checkSheetName($datestr) {
                $dates = explode("-",$datestr);
                $lowerDate = explode(".",$dates[0]);
                $upperDate = explode(".",$dates[1]);
                $lDate = new DateTime(date("Y")."-".$lowerDate[0]."-".$lowerDate[1]);
                $uDate = new DateTime(date("Y")."-".$upperDate[0]."-".$upperDate[0]);
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
            }
            echo("<tr><td style='margin: 0px; padding: 20px; height: 100%; font-size: 18px; font-weight: bold; text-align: center; border: none;'>Nincs kiválasztva adatfájl!</td></tr>");
        ?>
    </table>
</div>
<script>
window.onload = function() {
    var updInterval = parseInt(<?php echo($settings['updDensity']); ?>) * 60000;
    var rawUpdFrom = "<?php echo($settings['intervalFrom']); ?>";
    var rawUpdTo = "<?php echo($settings['intervalTo']); ?>";
    var updFrom = rawUpdFrom.split(":");
    var updTo = rawUpdTo.split(":");

    setInterval(loadTable, updInterval);

    function loadTable() {
        var today = new Date();
        var current = new Date(today.getFullYear(),today.getMonth(),today.getDate(),today.getHours(),today.getMinutes());
        var updLowerBound = new Date(today.getFullYear(),today.getMonth(),today.getDate(),parseInt(updFrom[0]),parseInt(updFrom[1]));
        var updUpperBound = new Date(today.getFullYear(),today.getMonth(),today.getDate(),parseInt(updTo[0]),parseInt(updTo[1]));
        var date = today.getFullYear() + "-" + (today.getMonth()+1) + "-" + today.getDate();
        var time = today.getHours() + ":" + today.getMinutes();
        var timestamp = date + " " + time;
        if(current >= updLowerBound && current < updUpperBound) {
            sessionStorage.setItem("updTime", timestamp);
            location.reload(true);
        }
        
    }
}
</script>
