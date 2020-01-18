<div class="adminform-container">
    <div class="adminform-title">Gépjármű törlése</div>
    <div class="adminform-body">
        <p>Gépjármű típusa:</p>
        <?php echo($car->tipus); ?>
        <p>Gépjármű rendszáma:</p>
        <?php echo($car->rendszam); ?>
        <?php echo form_open('kocsik/delete_confirm'); ?>
            <input type="hidden" name="id" value="<?php echo($car->kocsiid); ?>" />
            <input type="submit" name="delete" value="Törlés" />
        </form>
    </div>
</div>