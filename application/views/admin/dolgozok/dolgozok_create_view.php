<div class="adminform-container">
    <div class="adminform-title">
        <span>Dolgozó hozzáadása</span>
        <?php echo(anchor('dolgozok/index','[X]',array('class' => 'cancel-button'))); ?>
    </div>
    <div class="adminform-body">
    <?php
        echo($errors);
        echo(form_open('dolgozok/create'));

        // Családnév textbox
        echo(form_label('Családnév', 'csnev'));
        echo(form_input(array(
            'name' => 'csnev',
            'id' => 'csnev',
            'value' => set_value('csnev'),
            'placeholder' => 'Írja be a családnevet...'
        )));

        // Keresztnév textbox
        echo(form_label('Keresztnév', 'knev'));
        echo(form_input(array(
            'name' => 'knev',
            'id' => 'knev',
            'value' => set_value('knev'),
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