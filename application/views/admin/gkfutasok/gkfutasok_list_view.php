<div class="adminform-container">
    <div class="adminform-title">Kiküldetések</div>
    <?php echo(anchor('home/index','[X]',array('class' => 'cancel-button'))); ?>
    <div class="adminform-body">
        <table style="padding: 0; margin: 0; border-collapse: collapse; border: none; text-align: center;">
            <tr>
                <td><?php echo(anchor('gkfutas/create','Új kiküldetés',array('class' => 'itemcreate-button', 'style' => 'width: 200px; margin-right: 5px;'))); ?></td>
                <td><?php echo(anchor('gkfutas/createAll','Üres kiküldetések adott napra',array('class' => 'itemcreate-button', 'style' => 'width: 200px'))); ?></td>
            </tr>
        </table>
        <br />
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
                        foreach ($futas_item['dolgozok'] as $dolgozo) {
                            echo($dolgozo['dolgozo_nev'].'<br />');
                        }
                    ?></td>
                    <td class="listview-cell"><?php
                        foreach ($futas_item['feladatok'] as $feladat) {
                            echo($feladat['feladat_leiras'].'<br />');
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