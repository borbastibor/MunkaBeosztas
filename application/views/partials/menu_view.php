<div class="dropbtn-container">
    <div class="dropdown">
        <button class="dropbtn">Admin</button>
        <div class="dropdown-content">
            <?php
            echo(anchor('kocsik/index', 'Gépkocsik', ''));
            echo(anchor('dolgozok/index', 'Dolgozók', ''));
            echo(anchor('munkak/index', 'Feladatok', ''));
            echo(anchor('gkfutas/index', 'Gépkocsifutások', ''));
            ?>
        </div>
    </div>
</div>