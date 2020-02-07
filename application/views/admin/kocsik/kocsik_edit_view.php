<div class="adminform-container">
    <div class="adminform-title">
        <span>Gépkocsi szerkesztése</span>
        <?php echo(anchor('kocsik/index','[X]',array('class' => 'cancel-button'))); ?>
    </div>
    <div class="adminform-body">
    <?php
        echo($errors);
        echo(form_open('kocsik/edit_save','',array(
            'id' => $car->gk_id
        )));

        // Gépkocsi textbox
        echo(form_label('Gépkocsi', 'gepkocsi'));
        echo(form_input(array(
            'name' => 'gepkocsi',
            'id' => 'gepkocsi',
            'value' => $car->gepkocsi,
            'placeholder' => 'Írja be a típust és rendszámot...'
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