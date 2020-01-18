<?php echo validation_errors(); ?>
<div class="adminform-container">
    <div class="adminform-title">Gépjármű hozzáadása</div>
    <div class="adminform-body">
    <?php echo form_open('kocsik/create'); ?>
        <label for="tipus">Típus</label>
        <input type="text" name="tipus" /><br />
        <label for="rendszam">Rendszám</label>
        <input type="text" name="rendszam" /><br />
        <input type="submit" name="submit" value="Mentés" />
    </form>
    </div>
</div>