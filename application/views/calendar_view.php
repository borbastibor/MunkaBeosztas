<table class="calendar-container">
    <tr>
    <?php
        $weekdays = array(
            1 => 'Hétfő',
            2 => 'Kedd',
            3 => 'Szerda',
            4 => 'Csütörtök',
            5 => 'Péntek',
            6 => 'Szombat',
            7 => 'Vasárnap'
        );
        $period_dates = array(
            $sdate,
	        date_add(new DateTime($sdate), new DateInterval('P1D'))->format('Y-m-d'),
	        date_add(new DateTime($sdate), new DateInterval('P2D'))->format('Y-m-d'),
	        date_add(new DateTime($sdate), new DateInterval('P3D'))->format('Y-m-d'),
	        date_add(new DateTime($sdate), new DateInterval('P4D'))->format('Y-m-d'),
	        date_add(new DateTime($sdate), new DateInterval('P5D'))->format('Y-m-d'),
	        date_add(new DateTime($sdate), new DateInterval('P6D'))->format('Y-m-d')
        );
        foreach ($period_dates as $date) {
            $stylestring = '';
            $daynum = (new DateTime($date))->format('N');
            if ($daynum == 6) {
                $stylestring = $stylestring.'background-color: green; ';
            }
            if ($daynum == 7) {
                $stylestring = $stylestring.'background-color: red; ';
            }
            echo('<th class="calendar-header" style="'.$stylestring.'">'.$date.' ('.$weekdays[$daynum].')</th>');
        }
    ?>
    </tr>
    <tr>
    <?php
        foreach ($period_dates as $pdate) {
            $stylestring ='';
            if ($pdate == date('Y-m-d')) {
                $stylestring = 'background-color: rgba(255, 150, 0, 0.4); ';
            }
            echo('<td class="calendar-cell" style="'.$stylestring.'">');
            foreach ($futasok as $futas_item) {
                if ($futas_item['datum'] == $pdate) {
                    echo('<div class="tag-container">');
                    echo('<div class="tag-title-container">');
                    echo($futas_item['gepkocsi']);
                    echo('</div>');
                    echo('<div class="tag-body">');
                    foreach ($futas_item['dolgozok'] as $dolgozo) {
                        echo($dolgozo['dolgozo_nev'].'<br />');
                    }
                    foreach ($futas_item['feladatok'] as $feladat) {
                        if ($feladat['utemezheto'] == 0) {
                            echo('<span style="color: red">'.$feladat['feladat_leiras'].';</span><br />');
                        } else {
                            echo('<span>'.$feladat['feladat_leiras'].';</span><br />');
                        }
                    }
                    echo('</div>');
                    echo('</div>');
                }
            }
            echo('</td>');
        }
    ?>
    </tr>
</table>