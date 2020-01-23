<?php echo validation_errors(); ?>
<div class="adminform-container">
    <div class="adminform-title">Gépjármű szerkesztése</div>
    <div class="adminform-body">
    <?php echo form_open('kocsik/edit_save'); ?>
        <label for="tipus">Típus</label>
        <input type="text" name="tipus" value="<?php echo($car->tipus); ?>" required/><br />
        <label for="rendszam">Rendszám</label>
        <input type="text" name="rendszam" value="<?php echo($car->rendszam); ?>" required/><br />
        <input type="hidden" name="id" value="<?php echo($car->kocsiid); ?>" />
        <input type="submit" name="submit" value="Mentés" />
    <?php echo(form_close()); ?>
    </div>
</div>