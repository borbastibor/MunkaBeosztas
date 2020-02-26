<div class="adminform-container">
    <div class="adminform-title">
        <span>Új feladat hozzárendelés létrehozása</span>
        <?php echo(anchor('gkfutas/index','[X]',array('class' => 'cancel-button'))); ?>
    </div>
    <div class="adminform-body">
    <?php
        echo($errors);
        echo(form_open('gkfutas/create'));

        // Dátum választó
        echo(form_label('Dátum', 'datum'));
        echo(form_input(array(
            'name' => 'datum',
            'id' => 'datum',
            'type' => 'date',
            'value' => set_value('datum')
        )));

        // Gépkocsi választó
        echo(form_label('Gépkocsi', 'gepkocsi'));
        echo(form_dropdown('gepkocsi',$caroptions, set_value('gepkocsi')));

        // Dolgozók választó
        echo(form_label('Dolgozók', 'dolgozok'));
        echo('<div class="checkbox-list">');
        foreach ($dolgozolist as $dlist_item) {
            echo(form_checkbox(array(
                'name' => 'dolgozok[]',
                'value' => $dlist_item['dolgozo_id'],
                'checked' => FALSE
            )));
            echo($dlist_item['dolgozo_nev'].'<br />');
        }
        echo('</div>');

        // Feladat és ütemezes választó
        echo(form_label('Feladatok', 'feladatok'));
        echo('<div class="checkbox-list">');
        echo('<table class="checkbox-list-table">');
        foreach ($feladatlist as $flist_item) {
            echo('<tr class="checkbox-list-row"><td>');
            echo(form_checkbox(array(
                'name' => 'feladatok[]',
                'value' => $flist_item['feladat_id'],
                'checked' => FALSE
            )));
            echo($flist_item['feladat_leiras']);
            echo('</td><td>');
            echo(form_checkbox(array(
                'name' => 'utemezesek[]',
                'value' => $flist_item['feladat_id'],
                'checked' => FALSE
            )));
            echo('Ütemezhető');
            echo('</td></tr>');
        }
        echo('</table>');
        echo('</div>');

        // Mentés gomb
        echo(form_submit(array(
            'name' => 'submit',
            'value' => 'Mentés'
        )));
        echo(form_close());
    ?>
    </div>
</div>