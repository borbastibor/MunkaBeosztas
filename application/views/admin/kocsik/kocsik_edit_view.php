<div class="adminform-container">
    <div class="adminform-title">
        <span>Gépjármű szerkesztése</span>
        <?php echo(anchor('kocsik/index','[X]',array('class' => 'cancel-button'))); ?>
    </div>
    <div class="adminform-body">
    <?php
        echo($errors);
        echo(form_open('kocsik/edit_save','',array(
            'id' => $car->kocsiid
        )));

        // Típus textbox
        echo(form_label('Típus', 'tipus'));
        echo(form_input(array(
            'name' => 'tipus',
            'id' => 'tipus',
            'value' => $car->tipus,
            'placeholder' => 'Írja be a típust...'
        )));

        // Rendszám textbox
        echo(form_label('Rendszám', 'rendszam'));
        echo(form_input(array(
            'name' => 'rendszam',
            'id' => 'rendszam',
            'value' => $car->rendszam,
            'placeholder' => 'Írja be a rendszámot (ABC-123)...'
        )));

        // Mentés gomb
        echo(form_submit(array(
            'name' => 'submit',
            'value' => 'Mentés'
        )));
        echo(form_close());
    ?>
    </div>
</div>