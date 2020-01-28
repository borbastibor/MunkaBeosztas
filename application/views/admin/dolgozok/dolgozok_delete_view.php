<div class="adminform-container">
    <div class="adminform-title">Dolgozó törlése</div>
    <div class="adminform-body">
        <p><strong>Családnév:</strong></p>
        <?php echo($worker->csaladnev); ?>
        <p><strong>Keresztnév:</strong></p>
        <?php echo($worker->keresztnev); ?>
        <?php echo(form_open('dolgozok/delete_confirm')); ?>
            <input type="hidden" name="id" value="<?php echo($worker->dolgozoid); ?>" />
            <input type="submit" name="delete" value="Törlés" />
        <?php echo(form_close()); ?>
    </div>
</div>