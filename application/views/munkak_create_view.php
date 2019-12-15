<div class="body-container">
    <div class="body-title">
        <span>Új munka létrehozása</span>
        <?php echo(anchor('home','[X]',array('class' => 'cancel-button'))); ?>
    </div>
    <div class="body-body">
        <form action="" method="POST">
            <label for="jobdate">Dátum:</label><br />
            <input type="date" id="jobdate" required><br /><br />
            <label for="jobplace">Helyszín:</label><br />
            <input type="text" id="jobplace" required><br /><br />
            <label for="jobdesc">Leírás:</label><br />
            <input type="text" id="jobdesc" required><br /><br />
            <label for="worker">Dolgozó:</label><br />
            <select id="worker" required></select>
            <label for="car">Gépjármű:</label><br />
            <select id="car" required></select>
            <input type="checkbox" name="fixedjob" value="fixed">Átütemezhető?<br /><br />
            <input type="submit" value="Mentés">
        </form>
    </div>
</div>