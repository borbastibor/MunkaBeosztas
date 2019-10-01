<?php
/*
 * settings.php
 * A weblaphoz tartozó beállításokat kezeli a kód,
 * amihez egy egyszerű felhasználói felületed ad.
 * Készítette: Borbás Tibor
 * Utolsó módosítás: 2019. szeptember 03.
*/
?>
<div class="mainframe">
    <div class="formcontainer">
        <div class="formtitle">Jelenlegi beállítások<hr></div>
        <div class="formbody">
            <?php
                echo("<b>Adatfájl:</b> ".$_SESSION['dataFile']."<br>");
                echo("<b>Frissítés gyakorisága:</b> ".$_SESSION['updDensity']." perc<br>");
                echo("<b>Frissítés kezdete:</b> ".$_SESSION['intervalFrom']."<br>");
                echo("<b>Frissítés vége:</b> ".$_SESSION['intervalTo']."<br>");
            ?>
        </div>
    </div>
    <div class="formcontainer">
        <div class="formtitle">Beállítások módosítása<hr></div>
        <div class="formbody">
            <form action="" method="POST">
                <label for="srcinput">Adatfájl (.xlsx):</label>
                <input type="file" accept=".xlsx" id="srcinput" name="dataFile"><br><br>
                <label for="deninput">Frissítés gyakorisága (1 - 59 perc):</label>
                <input type="number" id="deninput" name="updDensity" min="1" max="59" value="<?php echo($updDensity); ?>"><br><br>
                <label for="valfrominput">Napon belüli frissítési intervallum:</label>
                <input type="time" id="valfrominput" name="intervalFrom" value="<?php echo($intervalFrom); ?>">-tól
                <input type="time" name="intervalTo" value="<?php echo($intervalTo); ?>">-ig (módosításhoz mindkét értéket meg kell adni!)<br><br>
                <input type="submit" value="Mentés">
            </form>
        </div>
    </div>
</div>