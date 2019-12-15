<?php echo(anchor('home/create','<div class="navbar-button">M</div>')); ?>
<div class="navbar-container">
    <?php
    echo(anchor('home', 'Munkák', array('class' => 'navbar-menuitem')));
    echo('<br />');
    echo(anchor('dolgozok', 'Dolgozók', array('class' => 'navbar-menuitem')));
    echo('<br />');
    echo(anchor('kocsik', 'Kocsik', array('class' => 'navbar-menuitem')));
    ?>
</div>