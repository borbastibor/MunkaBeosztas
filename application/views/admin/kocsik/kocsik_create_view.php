<div class="adminform-container">
    <div class="adminform-title">
        <span>Gépjármű hozzáadása</span>
        <?php echo(anchor('kocsik/index','[X]',array('class' => 'cancel-button'))); ?>
    </div>
    <div class="adminform-body">
    <?php
        echo($errors);
        echo(form_open('kocsik/create'));

        // Típus textbox
        echo(form_label('Típus', 'tipus'));
        echo(form_input(array(
            'name' => 'tipus',
            'id' => 'tipus',
            'value' => set_value('tipus'),
            'placeholder' => 'Írja be a típust...'
        )));

        // Rendszám textbox
        echo(form_label('Rendszám', 'rendszam'));
        echo(form_input(array(
            'name' => 'rendszam',
            'id' => 'rendszam',
            'value' => set_value('rendszam'),
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