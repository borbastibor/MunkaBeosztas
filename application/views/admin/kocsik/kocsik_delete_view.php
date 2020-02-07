<div class="adminform-container">
    <div class="adminform-title">
        <span>Gépkocsi törlése</span>
        <?php echo(anchor('kocsik/index','[X]',array('class' => 'cancel-button'))); ?>
    </div>
    <div class="adminform-body">
    <?php
        echo('<p><strong>Gépkocsi típusa és rendszáma:</strong></p>');
        echo($car->gepkocsi);
        echo(form_open('kocsik/delete_confirm','',array(
            'id' => $car->gk_id
        )));
        echo(form_submit(array(
            'name' => 'delete',
            'value' => 'Törlés'
        )));
        echo(form_close());
    ?>
    </div>
</div>