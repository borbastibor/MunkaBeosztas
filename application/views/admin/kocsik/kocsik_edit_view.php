<div class="adminform-container">
    <div class="adminform-title">
        <span>Gépjármű szerkesztése</span>
        <?php echo(anchor('kocsik/index','[X]',array('class' => 'cancel-button'))); ?>
    </div>
    <div class="adminform-body">
    <?php echo($errors); ?>
    <?php echo(form_open('kocsik/edit_save')); ?>
        <label for="tipus">Típus</label>
        <input type="text" name="tipus" value="<?php echo($car->tipus); ?>" /><br />
        <label for="rendszam">Rendszám</label>
        <input type="text" name="rendszam" value="<?php echo($car->rendszam); ?>" /><br />
        <input type="hidden" name="id" value="<?php echo($car->kocsiid); ?>" />
        <input type="submit" name="submit" value="Mentés" />
    <?php echo(form_close()); ?>
    </div>
</div>