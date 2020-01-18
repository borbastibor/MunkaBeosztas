<div class="adminform-container">
    <div class="adminform-title">Gépjárművek</div>
    <div class="adminform-body">
        <table class="listview-table">
            <tr>
                <th class="listview-rowheader">Típus</th>
                <th class="listview-rowheader">Rendszám</th>
                <th class="listview-rowheader">Lehetőségek</th>
            </tr>
            <?php
            foreach ($kocsik as $kocsi_item):
                ?><tr>
                    <td class="listview-cell"><?php echo($kocsi_item['tipus']); ?></td>
                    <td class="listview-cell"><?php echo($kocsi_item['rendszam']); ?></td>
                    <td class="listview-cell"><?php
                        echo(anchor('kocsik/edit','Szerkeszt','id="'.$kocsi_item['kocsiid'].'"'));
                        echo('|');
                        echo(anchor('kocsik/delete','Eltávolít','id="'.$kocsi_item['kocsiid'].'"'));
                    ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>