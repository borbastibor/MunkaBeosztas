<?php
    echo('<table>');
    echo('<tr>');
    echo('<td>');
    if ($iscalendarview) {
        echo('<div class="menu-control-container">');
        echo(anchor('home/shiftOneDayBack', '<', array('class' => 'calendar-control-btn')));
        echo(anchor('home/shiftOneWeekBack', '&#8810', array('class' => 'calendar-control-btn')));
        echo(anchor('home/resetToCurrentDay', 'C', array('class' => 'calendar-control-btn')));
        echo(anchor('home/shiftOneWeekFwd', '&#8811', array('class' => 'calendar-control-btn')));
        echo(anchor('home/shiftOneDayFwd', '>', array('class' => 'calendar-control-btn')));
        echo('</div>');
    }
    echo('</td>');

    echo('<td>');
    if ($isadmin != null) {
        echo('<div class="dropdown">');
        echo('<button class="dropbtn">Admin</button>');
        echo('<div class="dropdown-content">');
        echo(anchor('kocsik/index', 'Gépkocsik', ''));
        echo(anchor('dolgozok/index', 'Dolgozók', ''));
        echo(anchor('munkak/index', 'Feladatok', ''));
        echo(anchor('gkfutas/index', 'Gépkocsifutások', ''));
        echo('</div>');
        echo('</div>');
    }
    echo('</td>');
    echo('</tr>');
    echo('</table>');
?>