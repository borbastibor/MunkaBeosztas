<div class="adminform-container">
    <div class="adminform-title">
        <span>Gépkocsi hozzáadása</span>
        <?php echo(anchor('kocsik/index','[X]',array('class' => 'cancel-button'))); ?>
    </div>
    <div class="adminform-body">
    <?php
        echo($errors);
        echo(form_open('kocsik/create'));

        // Gépkocsi textbox
        echo(form_label('Gépkocsi', 'gepkocsi'));
        echo(form_input(array(
            'name' => 'gepkocsi',
            'id' => 'gepkocsi',
            'value' => set_value('gepkocsi'),
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