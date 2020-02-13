<div class="adminform-container">
    <div class="adminform-title">Feladat hozzárendelések</div>
    <div class="adminform-body">
        <?php echo(anchor('gkfutas/create','Új hozzárendelés','class="itemcreate-button"')); ?>
        <br />
        <?php print_r($futasok); ?>
        <table class="listview-table">
            <tr>
                <th class="listview-rowheader">Dátum</th>
                <th class="listview-rowheader">Gépkocsi</th>
                <th class="listview-rowheader">Dolgozók</th>
                <th class="listview-rowheader">Feladat</th>
                <th class="listview-rowheader">Lehetőségek</th>
            </tr>
            <?php
            foreach ($futasok as $futas_item):
                ?><tr class="listview-row">
                    <td class="listview-cell"><?php echo($futas_item['datum']); ?></td>
                    <td class="listview-cell"><?php echo($futas_item['gepkocsi']); ?></td>
                    <td class="listview-cell"><?php
                        foreach ($futas_item['dolgozo_nev'] as $dnev) {
                            echo($dnev.'\n');
                        }
                    ?></td>
                    <td class="listview-cell"><?php
                        foreach ($futas_item['feladat_leiras'] as $fleiras) {
                            echo($fleiras.'\n');
                        }
                    ?></td>
                    <td class="listview-cell"><?php
                        echo(anchor('gkfutas/edit/'.$futas_item['gk_futas_id'],'Szerkeszt'));
                        echo('|');
                        echo(anchor('gkfutas/delete/'.$futas_item['gk_futas_id'],'Eltávolít'));
                    ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>