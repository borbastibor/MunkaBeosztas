<div class="adminform-container">
    <div class="adminform-title">Munkák</div>
    <div class="adminform-body">
        <?php echo(anchor('munkak/create','Új munka','class="itemcreate-button"')); ?>
        <br />
        <table class="listview-table">
            <tr>
                <th class="listview-rowheader">Időpont</th>
                <th class="listview-rowheader">Helyszín</th>
                <th class="listview-rowheader">Leírás</th>
                <th class="listview-rowheader">Gépjármű</th>
                <th class="listview-rowheader">Dolgozók</th>
                <th class="listview-rowheader">Lehetőségek</th>
            </tr>
            <?php
            foreach ($munkak as $munka_item):
                ?><tr class="listview-row">
                    <td class="listview-cell"><?php echo($munka_item['datum']); ?></td>
                    <td class="listview-cell"><?php echo($munka_item['helyszin']); ?></td>
                    <td class="listview-cell"><?php echo($munka_item['leiras']); ?></td>
                    <td class="listview-cell"><?php echo($munka_item['tipus'].' ('.$munka_item['rendszam'].')'); ?></td>
                    <td class="listview-cell">
                    <?php
                        foreach ($munka_item['dolgozok'] as $dolgozo_item) {
                            echo($dolgozo_item['csaladnev'].' '.$dolgozo_item['keresztnev'].'<br />');
                        }    
                    ?></td>
                    <td class="listview-cell"><?php
                        echo(anchor('munkak/edit/'.$munka_item['munkaid'],'Szerkeszt'));
                        echo('|');
                        echo(anchor('munkak/delete/'.$munka_item['munkaid'],'Eltávolít'));
                    ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>