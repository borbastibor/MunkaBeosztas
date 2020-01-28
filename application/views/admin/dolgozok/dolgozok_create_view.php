<div class="adminform-container">
    <div class="adminform-title">Dolgozó hozzáadása</div>
    <div class="adminform-body">
    <?php echo(validation_errors()); ?>
    <?php echo(form_open('dolgozo/create')); ?>
        <label for="csnev">Családnév</label>
        <input type="text" name="csnev" value="<?php echo(set_value('csnev')); ?>"/><br />
        <label for="knev">Keresztnév</label>
        <input type="text" name="knev" value="<?php echo(set_value('knev')); ?>"/><br />
        <input type="submit" name="submit" value="Mentés" />
    <?php echo(form_close()); ?>
    </div>
</div>