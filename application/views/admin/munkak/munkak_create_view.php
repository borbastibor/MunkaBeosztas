<div class="adminform-container">
    <div class="adminform-title">
        <span>Feladat hozzáadása</span>
        <?php echo(anchor('munkak/index','[X]',array('class' => 'cancel-button'))); ?>
    </div>
    <div class="adminform-body">
    <?php
        echo($errors);
        echo(form_open('munkak/create'));

        // Feladat textbox
        echo(form_label('Feladat', 'feladat'));
        echo(form_textarea(array(
            'name' => 'feladat',
            'id' => 'feladat',
            'value' => set_value('feladat'),
            'placeholder' => 'Írja be a feladatot...'
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