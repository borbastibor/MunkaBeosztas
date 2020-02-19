<div class="dropdown">
    <button class="dropbtn">Controls</button>
    <div class="dropdown-content">
        <?php
        echo(anchor('home/shiftOneDayBack', 'Vissza 1 napot','class="dropdown-content"'));
        echo(anchor('home/shiftOneDayFwd', 'Előre 1 napot','class="dropdown-content"'));
        echo(anchor('home/shiftOneWeekBack', 'Vissza 7 napot','class="dropdown-content"'));
        echo(anchor('home/shiftOneWeekFwd', 'Előre 7 napot','class="dropdown-content"'));
        echo(anchor('home/resetToCurrentDay', 'Aktuális nap','class="dropdown-content"'));
        ?>
    </div>
</div>
<div class="dropdown">
    <button class="dropbtn">Admin</button>
    <div class="dropdown-content">
        <?php
        echo(anchor('kocsik/index','Gépkocsik','class="dropdown-content"'));
        echo(anchor('dolgozok/index', 'Dolgozók','class="dropdown-content"'));
        echo(anchor('munkak/index', 'Feladatok','class="dropdown-content"'));
        echo(anchor('gkfutas/index', 'Gépkocsifutások','class="dropdown-content"'));
        ?>
    </div>
</div>
