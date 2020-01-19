<div class="adminform-container">
    <div class="adminform-title">Gépjármű törlése</div>
    <div class="adminform-body">
        <p><strong>Gépjármű típusa:</strong></p>
        <?php echo($car->tipus); ?>
        <p><strong>Gépjármű rendszáma:</strong></p>
        <?php echo($car->rendszam); ?>
        <?php echo(form_open('kocsik/delete_confirm')); ?>
            <input type="hidden" name="id" value="<?php echo($car->kocsiid); ?>" />
            <input type="submit" name="delete" value="Törlés" />
        <?php echo(form_close()); ?>
    </div>
</div>