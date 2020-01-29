<div class="adminform-container">
    <div class="adminform-title">
        <span>Dolgozó hozzáadása</span>
        <?php echo(anchor('dolgozok/index','[X]',array('class' => 'cancel-button'))); ?>
    </div>
    <div class="adminform-body">
    <?php echo($errors); ?>
    <?php echo(form_open('dolgozok/create')); ?>
        <label for="csnev">Családnév</label>
        <input type="text" name="csnev" placeholder="Írja be a családnevet..." value="<?php echo(set_value('csnev')); ?>"/><br />
        <label for="knev">Keresztnév</label>
        <input type="text" name="knev" placeholder="Írja be a keresztnevet..." value="<?php echo(set_value('knev')); ?>"/><br />
        <input type="submit" name="submit" value="Mentés" />
    <?php echo(form_close()); ?>
    </div>
</div>