<div class="adminform-container">
    <div class="adminform-title">
        <span>Gépkocsik</span>
        <?php echo(anchor('home/index','[X]',array('class' => 'cancel-button'))); ?>
    </div>
    <div class="adminform-body">
        <?php echo(anchor('kocsik/create','Új gépkocsi','class="itemcreate-button"')); ?>
        <br />
        <table class="listview-table">
            <tr>
                <th class="listview-rowheader">Típus és rendszám</th>
                <th class="listview-rowheader">Lehetőségek</th>
            </tr>
            <?php
            foreach ($kocsik as $kocsi_item):
                ?><tr class="listview-row">
                    <td class="listview-cell"><?php echo($kocsi_item['gepkocsi']); ?></td>
                    <td class="listview-cell"><?php
                        echo(anchor('kocsik/edit/'.$kocsi_item['gk_id'],'Szerkeszt'));
                        echo('|');
                        echo(anchor('kocsik/delete/'.$kocsi_item['gk_id'],'Eltávolít'));
                    ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>