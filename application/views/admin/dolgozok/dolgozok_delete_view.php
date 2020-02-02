<div class="adminform-container">
    <div class="adminform-title">
        <span>Dolgozó törlése</span>
        <?php echo(anchor('dolgozok/index','[X]',array('class' => 'cancel-button'))); ?>
    </div>
    <div class="adminform-body">
    <?php
        echo('<p><strong>Családnév:</strong></p>');
        echo($worker->csaladnev);
        echo('<p><strong>Keresztnév:</strong></p>');
        echo($worker->keresztnev);
        echo(form_open('dolgozok/delete_confirm','',array(
            'id' => $worker->dolgozoid
        )));
        echo(form_submit(array(
            'name' => 'delete',
            'value' => 'Törlés'
        )));
        echo(form_close());
    ?>
    </div>
</div>