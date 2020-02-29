<div class="adminform-container">
    <div class="adminform-title">
        <span>Feladat hozzárendelés szerkesztése</span>
        <?php echo(anchor('gkfutas/index','[X]',array('class' => 'cancel-button'))); ?>
    </div>
    <div class="adminform-body">
    <?php
        echo($errors);
        echo(form_open('gkfutas/edit_save','',array('id' => $gkfutas[0]['gk_futas_id'])));

        // Dátum választó
        echo(form_label('Dátum', 'datum'));
        echo(form_input(array(
            'name' => 'datum',
            'id' => 'datum',
            'type' => 'date',
            'value' => $gkfutas[0]['datum']
        )));

        // Gépkocsi választó
        echo(form_label('Gépkocsi', 'gepkocsi'));
        echo(form_dropdown('gepkocsi',$caroptions, $gkfutas[0]['gepkocsi']));

        // Dolgozók választó
        echo(form_label('Dolgozók', 'dolgozok'));
        echo('<div class="checkbox-list">');
        $dolgozok_values = array();
        foreach ($gkfutas['dolgozok'] as $dolgozo_item) {
            array_push($dolgozok_values, $dolgozo_item['dolgozo_nev']);
        }
        foreach ($dolgozolist as $dlist_item) {
            $isSelected = in_array($dlist_item['dolgozo_nev'], $dolgozok_values) ? TRUE : FALSE;
            echo(form_checkbox(array(
                'name' => 'dolgozok[]',
                'value' => $dlist_item['dolgozo_id'],
                'checked' => $isSelected
            )));
            echo($dlist_item['dolgozo_nev'].'<br />');
        }
        echo('</div>');

        // Feladat és ütemezes választó
        echo(form_label('Feladatok', 'feladatok'));
        echo('<div class="checkbox-list">');
        echo('<table class="checkbox-list-table">');
        $feladatok_values = array();
        foreach ($gkfutas['feladatok'] as $feladat_item) {
            array_push($feladatok_values, $feladat_item['feladat_id']);
        }
        foreach ($feladatlist as $flist_item) {
            $isSelected = in_array($flist_item['feladat_id'], $feladatok_values) ? TRUE : FALSE;
            foreach ($utemezesek as $utemezes_item) {
                if ($utemezes_item['feladat_id'] == $flist_item['feladat_id'] && $utemezes_item['utemezheto'] == 1) {
                    $isUtemezheto = TRUE;
                } elseif ($utemezes_item['feladat_id'] == $flist_item['feladat_id'] && $utemezes_item['utemezheto'] == 0) {
                    $isUtemezheto = FALSE;
                } else {
                    $isUtemezheto = FALSE;
                }
            }
            echo('<tr class="checkbox-list-row"><td>');
            echo(form_checkbox(array(
                'name' => 'feladatok[]',
                'value' => $flist_item['feladat_id'],
                'checked' => $isSelected
            )));
            echo($flist_item['feladat_leiras']);
            echo('</td><td>');
            echo(form_checkbox(array(
                'name' => 'utemezesek[]',
                'value' => $flist_item['feladat_id'],
                'checked' => $isUtemezheto
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