<?php
echo(anchor("kocsik/index","Gépkocsik",''));
echo(anchor("dolgozok/index", "Dolgozók",''));
echo(anchor("munkak/index", "Feladatok",''));
echo(anchor("gkfutas/index", "Gépkocsifutások",''));
echo(anchor("home/shiftOneDayBack", "<",''));
echo(anchor("home/shiftOneDayFwd", ">",''));
echo(anchor("home/resetToCurrentDay", "C",''));
echo(anchor("home/shiftOneWeekBack", "<<",''));
echo(anchor("home/shiftOneWeekFwd", ">>",''));
?>