<div class="body-container">
    <div class="body-title">Új munka létrehozása</div>
    <div class="body-body">
        <form action="" method="POST">
            <label for="jobdate">Dátum:</label><br />
            <input type="date" id="jobdate"><br /><br />
            <label for="jobplace">Helyszín:</label><br />
            <input type="text" id="jobplace"><br /><br />
            <input type="checkbox" name="fixedjob" value="fixed">Átütemezhető?<br /><br />
            <input type="submit" value="Mentés">
            <div class="cancel-button"><?php echo(anchor('home','Mégse',array('class' => 'cancel-button'))); ?></div>
        </form>
    </div>
</div>