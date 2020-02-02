<div class="adminform-container">
    <div class="adminform-title">
        <span>Gépjármű törlése</span>
        <?php echo(anchor('kocsik/index','[X]',array('class' => 'cancel-button'))); ?>
    </div>
    <div class="adminform-body">
    <?php
        echo('<p><strong>Gépjármű típusa:</strong></p>');
        echo($car->tipus);
        echo('<p><strong>Gépjármű rendszáma:</strong></p>');
        echo($car->rendszam);
        echo(form_open('kocsik/delete_confirm','',array(
            'id' => $car->kocsiid
        )));
        echo(form_submit(array(
            'name' => 'delete',
            'value' => 'Törlés'
        )));
        echo(form_close());
    ?>
    </div>
</div>