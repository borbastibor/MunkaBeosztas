<div class="adminform-container">
    <div class="adminform-title">
        <span>Kiküldetés törlése</span>
        <?php echo(anchor('gkfutas/index','[X]',array('class' => 'cancel-button'))); ?>
    </div>
    <div class="adminform-body">
    <?php
        echo('<p><strong>Dátum:</strong></p>');
        echo($gkfutas[0]['datum']);
        echo('<p><strong>Gépkocsi:</strong></p>');
        echo($gkfutas[0]['gepkocsi']);
        echo('<p><strong>Dolgozók:</strong></p>');
        foreach ($gkfutas['dolgozok'] as $dolgozo) {
            echo($dolgozo['dolgozo_nev'].'<br />');
        }
        echo('<p><strong>Feladatok:</strong></p>');
        foreach ($gkfutas['feladatok'] as $feladat) {
            echo($feladat['feladat_leiras'].'<br />');
        }
        echo(form_open('gkfutas/delete_confirm','',array(
            'id' => $gkfutas[0]['gk_futas_id']
        )));
        echo(form_submit(array(
            'name' => 'delete',
            'value' => 'Törlés'
        )));
        echo(form_close());
    ?>
    </div>
</div>