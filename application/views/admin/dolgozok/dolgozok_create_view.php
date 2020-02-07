<div class="adminform-container">
    <div class="adminform-title">
        <span>Dolgozó hozzáadása</span>
        <?php echo(anchor('dolgozok/index','[X]',array('class' => 'cancel-button'))); ?>
    </div>
    <div class="adminform-body">
    <?php
        echo($errors);
        echo(form_open('dolgozok/create'));

        // Dolgozó neve textbox
        echo(form_label('Dolgozó neve', 'dolgozonev'));
        echo(form_input(array(
            'name' => 'dolgozonev',
            'id' => 'dolgozonev',
            'value' => set_value('dolgozonev'),
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