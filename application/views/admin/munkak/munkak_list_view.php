<div class="adminform-container">
    <div class="adminform-title">Feladatok</div>
    <?php echo(anchor('home/index','[X]',array('class' => 'cancel-button'))); ?>
    <div class="adminform-body">
        <?php echo(anchor('munkak/create','Új munka','class="itemcreate-button"')); ?>
        <br />
        <table class="listview-table">
            <tr>
                <th class="listview-rowheader">Feladat</th>
                <th class="listview-rowheader">Lehetőségek</th>
            </tr>
            <?php
            foreach ($munkak as $munka_item):
                ?><tr class="listview-row">
                    <td class="listview-cell"><?php echo($munka_item['feladat_leiras']); ?></td>
                    <td class="listview-cell"><?php
                        echo(anchor('munkak/edit/'.$munka_item['feladat_id'],'Szerkeszt'));
                        echo('|');
                        echo(anchor('munkak/delete/'.$munka_item['feladat_id'],'Eltávolít'));
                    ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>