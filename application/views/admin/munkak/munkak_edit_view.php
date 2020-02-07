<div class="adminform-container">
    <div class="adminform-title">
        <span>Feladat szerkesztése</span>
        <?php echo(anchor('munkak/index','[X]',array('class' => 'cancel-button'))); ?>
    </div>
    <div class="adminform-body">
    <?php
        echo($errors);
        echo(form_open('munkak/edit_save','',array(
            'id' => $munka->feladat_id
        )));

        // Feladat textbox
        echo(form_label('Feladat', 'feladat'));
        echo(form_textarea(array(
            'name' => 'feladat',
            'id' => 'feladat',
            'value' => $munka->feladat_leiras,
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