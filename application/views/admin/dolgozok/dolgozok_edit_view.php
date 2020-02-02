<div class="adminform-container">
    <div class="adminform-title">
        <span>Dolgozó szerkesztése</span>
        <?php echo(anchor('dolgozok/index','[X]',array('class' => 'cancel-button'))); ?>
    </div>
    <div class="adminform-body">
    <?php
        echo($errors);
        echo(form_open('dolgozok/edit_save','',array(
            'id' => $worker->dolgozoid
        )));

        // Családnév textbox
        echo(form_label('Családnév', 'csnev'));
        echo(form_input(array(
            'name' => 'csnev',
            'id' => 'csnev',
            'value' => set_value($worker->csaladnev),
            'placeholder' => 'Írja be a családnevet...'
        )));

        // Keresztnév textbox
        echo(form_label('Keresztnév', 'knev'));
        echo(form_input(array(
            'name' => 'knev',
            'id' => 'knev',
            'value' => set_value($worker->keresztnev),
            'placeholder' => 'Írja be a keresztnevet...'
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