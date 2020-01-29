<div class="adminform-container">
    <div class="adminform-title">Dolgozó szerkesztése</div>
    <div class="adminform-body">
    <?php echo($errors); ?>
    <?php echo(form_open('dolgozok/edit_save')); ?>
        <label for="csnev">Családnév</label>
        <input type="text" name="csnev" value="<?php echo($worker->csaladnev); ?>" /><br />
        <label for="knev">Keresztnév</label>
        <input type="text" name="knev" value="<?php echo($worker->keresztnev); ?>" /><br />
        <input type="hidden" name="id" value="<?php echo($worker->dolgozoid); ?>" />
        <input type="submit" name="submit" value="Mentés" />
    <?php echo(form_close()); ?>
    </div>
</div>