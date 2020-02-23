<?php
    echo('<div class="menu-control-container">');
    if ($iscalendarview) {
        echo(anchor('home/shiftOneDayBack', '<', array('class' => 'calendar-control-btn')));
        echo(anchor('home/shiftOneWeekBack', '&#8810', array('class' => 'calendar-control-btn')));
        echo(anchor('home/resetToCurrentDay', 'C', array('class' => 'calendar-control-btn')));
        echo(anchor('home/shiftOneWeekFwd', '&#8811', array('class' => 'calendar-control-btn')));
        echo(anchor('home/shiftOneDayFwd', '>', array('class' => 'calendar-control-btn')));
    }
    if ($isadmin != null) {
        echo(anchor('kocsik/index', 'Gépkocsik', array('class' => 'calendar-control-btn')));
        echo(anchor('dolgozok/index', 'Dolgozók', array('class' => 'calendar-control-btn')));
        echo(anchor('munkak/index', 'Feladatok', array('class' => 'calendar-control-btn')));
        echo(anchor('gkfutas/index', 'Gépkocsifutások', array('class' => 'calendar-control-btn')));
    }
    echo('</div>');
?>