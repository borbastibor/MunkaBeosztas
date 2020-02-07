<div class="adminform-container">
    <div class="adminform-title">
        <span>Feladat törlése</span>
        <?php echo(anchor('munkak/index','[X]',array('class' => 'cancel-button'))); ?>
    </div>
    <div class="adminform-body">
    <?php
        echo('<p><strong>Feladat:</strong></p>');
        echo($job->feladat_leiras);
        echo(form_open('munkak/delete_confirm','',array(
            'id' => $job->feladat_id
        )));
        echo(form_submit(array(
            'name' => 'delete',
            'value' => 'Törlés'
        )));
        echo(form_close());
    ?>
    </div>
</div>