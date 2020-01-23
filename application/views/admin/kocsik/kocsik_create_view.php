<?php echo validation_errors(); ?>
<div class="adminform-container">
    <div class="adminform-title">Gépjármű hozzáadása</div>
    <div class="adminform-body">
    <?php echo form_open('kocsik/create'); ?>
        <label for="tipus">Típus</label>
        <input type="text" name="tipus" required/><br />
        <label for="rendszam">Rendszám</label>
        <input type="text" name="rendszam" required/><br />
        <input type="submit" name="submit" value="Mentés" />
    <?php echo(form_close()); ?>
    </div>
</div>