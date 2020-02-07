<div class="adminform-container">
    <div class="adminform-title">
        <span>Dolgozó törlése</span>
        <?php echo(anchor('dolgozok/index','[X]',array('class' => 'cancel-button'))); ?>
    </div>
    <div class="adminform-body">
    <?php
        echo('<p><strong>Dolgozó neve:</strong></p>');
        echo($worker->dolgozo_nev);
        echo(form_open('dolgozok/delete_confirm','',array(
            'id' => $worker->dolgozo_id
        )));
        echo(form_submit(array(
            'name' => 'delete',
            'value' => 'Törlés'
        )));
        echo(form_close());
    ?>
    </div>
</div>