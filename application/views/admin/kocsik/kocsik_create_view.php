<div class="adminform-container">
    <div class="adminform-title">
        <span>Gépjármű hozzáadása</span>
        <?php echo(anchor('kocsik/index','[X]',array('class' => 'cancel-button'))); ?>
    </div>
    <div class="adminform-body">
    <?php echo($errors); ?>
    <?php echo(form_open('kocsik/create')); ?>
        <label for="tipus">Típus</label>
        <input type="text" name="tipus" value="<?php echo(set_value('tipus')); ?>"/><br />
        <label for="rendszam">Rendszám</label>
        <input type="text" name="rendszam" value="<?php echo(set_value('rendszam')); ?>"/><br />
        <input type="submit" name="submit" value="Mentés" />
    <?php echo(form_close()); ?>
    </div>
</div>