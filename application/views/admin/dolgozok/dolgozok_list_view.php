<div class="adminform-container">
    <div class="adminform-title">Dolgozók</div>
    <div class="adminform-body">
        <?php echo(anchor('dolgozok/create','Új dolgozó','class="itemcreate-button"')); ?>
        <br />
        <table class="listview-table">
            <tr>
                <th class="listview-rowheader">Családnév</th>
                <th class="listview-rowheader">Keresztnév</th>
                <th class="listview-rowheader">Lehetőségek</th>
            </tr>
            <?php
            foreach ($dolgozok as $dolgozo_item):
                ?><tr class="listview-row">
                    <td class="listview-cell"><?php echo($dolgozo_item['csaladnev']); ?></td>
                    <td class="listview-cell"><?php echo($dolgozo_item['keresztnev']); ?></td>
                    <td class="listview-cell"><?php
                        echo(anchor('dolgozok/edit/'.$dolgozo_item['dolgozoid'],'Szerkeszt'));
                        echo('|');
                        echo(anchor('dolgozok/delete/'.$dolgozo_item['dolgozoid'],'Eltávolít'));
                    ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>