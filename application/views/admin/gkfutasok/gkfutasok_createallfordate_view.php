<div class="adminform-container">
    <div class="adminform-title">
        <span>Üres kiküldetések létrehozása</span>
        <?php echo(anchor('gkfutas/index','[X]',array('class' => 'cancel-button'))); ?>
    </div>
    <div class="adminform-body">
    <?php
        echo($errors);
        echo(form_open('gkfutas/createAll'));

        // Dátum választó
        if (isset($datum)) {
            $datumvalue = $datum;
        } else {
            $datumvalue = set_value('datum');
        }
        echo(form_label('Dátum', 'datum'));
        echo(form_input(array(
            'name' => 'datum',
            'id' => 'datum',
            'type' => 'date',
            'value' => $datumvalue
        )));

        // Mentés gomb
        echo(form_submit(array(
            'name' => 'submit',
            'value' => 'Rekordok létrehozása'
        )));
        echo(form_close());
    ?>
    </div>
</div>