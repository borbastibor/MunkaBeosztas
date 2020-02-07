<div class="adminform-container">
    <div class="adminform-title">
        <span>Dolgozók</span>
        <?php echo(anchor('home/index','[X]',array('class' => 'cancel-button'))); ?>
    </div>
    <div class="adminform-body">
        <?php echo(anchor('dolgozok/create','Új dolgozó','class="itemcreate-button"')); ?>
        <br />
        <table class="listview-table">
            <tr>
                <th class="listview-rowheader">Dolgozó neve</th>
                <th class="listview-rowheader">Lehetőségek</th>
            </tr>
            <?php
            foreach ($dolgozok as $dolgozo_item):
                ?><tr class="listview-row">
                    <td class="listview-cell"><?php echo($dolgozo_item['dolgozo_nev']); ?></td>
                    <td class="listview-cell"><?php
                        echo(anchor('dolgozok/edit/'.$dolgozo_item['dolgozo_id'],'Szerkeszt'));
                        echo('|');
                        echo(anchor('dolgozok/delete/'.$dolgozo_item['dolgozo_id'],'Eltávolít'));
                    ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>