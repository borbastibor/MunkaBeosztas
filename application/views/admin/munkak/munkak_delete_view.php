<div class="adminform-container">
    <div class="adminform-title">
        <span>Munka törlése</span>
        <?php echo(anchor('munkak/index','[X]',array('class' => 'cancel-button'))); ?>
    </div>
    <div class="adminform-body">
    <?php
        echo('<p><strong>Helyszín:</strong></p>');
        echo($job->helyszin);
        echo('<p><strong>Dátum:</strong></p>');
        echo($job->datum);
        echo('<p><strong>Leírás:</strong></p>');
        echo($job->leiras);
        echo('<p><strong>Gépjármű:</strong></p>');
        echo($job->kocsi);
        echo('<p><strong>Dolgozók:</strong></p>');
        foreach ($job->leiras as $dolgozo_item) {
            echo($dolgozo_item);
        }
        echo(form_open('munkak/delete_confirm','',array(
            'id' => $job->munkaid
        )));
        echo(form_submit(array(
            'name' => 'delete',
            'value' => 'Törlés'
        )));
        echo(form_close());
    ?>
    </div>
</div>