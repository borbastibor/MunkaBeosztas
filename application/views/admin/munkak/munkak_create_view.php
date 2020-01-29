<div class="adminform-container">
    <div class="adminform-title">
        <span>Munka hozzáadása</span>
        <?php echo(anchor('munkak/index','[X]',array('class' => 'cancel-button'))); ?>
    </div>
    <div class="adminform-body">
    <?php echo($errors); ?>
    <?php echo(form_open('munkak/create')); ?>
        <label for="helyszin">Helyszín</label>
        <input type="text" name="helyszin" placeholder="Írja be a helyszínt..." value="<?php echo(set_value('helyszin')); ?>"/><br />
        <label for="datum">Dátum</label>
        <input type="date" name="datum" placeholder="Válasszon dátumot..." value="<?php echo(set_value('datum')); ?>"/><br />
        <label for="leiras">Leírás</label>
        <input type="text" name="leiras" placeholder="Adjon leírást a munkáról..." value="<?php echo(set_value('leiras')); ?>"/><br />
        <label for="kocsi">Gépjármű</label>
        <input type="text" name="kocsi" value="<?php echo(set_value('kocsi')); ?>"/><br />
        <div class="checkbox-list">
            
        </div>
        <input type="submit" name="submit" value="Mentés" />
    <?php echo(form_close()); ?>
    </div>
</div>