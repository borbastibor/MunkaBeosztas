<div class="adminform-container">
    <div class="adminform-title">
        <span>Dolgozó szerkesztése</span>
        <?php echo(anchor('dolgozok/index','[X]',array('class' => 'cancel-button'))); ?>
    </div>
    <div class="adminform-body">
    <?php
        echo($errors);
        echo(form_open('dolgozok/edit_save','',array(
            'id' => $worker->dolgozo_id
        )));

        // Dolgozó neve textbox
        echo(form_label('Dolgozó neve', 'dolgozonev'));
        echo(form_input(array(
            'name' => 'dolgozonev',
            'id' => 'dolgozonev',
            'value' => set_value($worker->dolgozo_nev),
            'placeholder' => 'Írja be a dolgozó nevét...'
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