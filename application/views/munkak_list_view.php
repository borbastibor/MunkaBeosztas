<a href=""><div class="create-button">+</div></a>
<table class="calendar">
    <tr>
        <?php
        $weekdays = [
            '1' => 'Hétfő',
            '2' => 'Kedd',
            '3' => 'Szerda',
            '4' => 'Csütörtök',
            '5' => 'Péntek',
            '6' => 'Szombat',
            '7' => 'Vasárnap'
        ];
        $begin = new DateTime();
        $end = new DateTime();
        date_add($end, new DateInterval('P7D'));
        $interval = new DateInterval('P1D');
        $period = new DatePeriod($begin, $interval, $end);
        foreach ($period as $dt) {
            switch ($dt->format('N')) {
                case '6':
                    $bgcolor = ' style="background-color: green;"';
                    break;
                
                case '7':
                    $bgcolor = ' style="background-color: red;"';
                    break;

                default:
                    $bgcolor = '';
                    break;
            }
            echo('<th class="calendar"'.$bgcolor.'>'.$dt->format('Y.m.d').' ('.$weekdays[$dt->format('N')].')</th>');
        }
        ?>
    </tr>
    <tr>
        <td class="calendar">
            <div class="job-container">
                <div class="job-title">
                    <a class="jobtitle-menuitem" href="">Szerkeszt</a>
                    <a class="jobtitle-menuitem" href="">Eltávolít</a>
                </div>
                <div class="job-body">
                    Kiss Géza<br />
                    Toyota Hilux (KXX-123)<br />
                    Székesfehérvár<br />
                    Munkatérkép előkészítés
                </div>
            </div>
            <div class="job-container">
                <div class="job-title">fejléc</div>
                <div class="job-body">
                    Kiss Géza<br />
                    Toyota Hilux (KXX-123)<br />
                    Székesfehérvár<br />
                    Munkatérkép előkészítés
                </div>
            </div>
        </td>
        <td class="calendar">
            <div class="job-container">
                <div class="job-title">fejléc</div>
                <div class="job-body">
                    Kiss Géza<br />
                    Toyota Hilux (KXX-123)<br />
                    Székesfehérvár<br />
                    Munkatérkép előkészítés
                </div>
            </div>
        </td>
        <td class="calendar"></td>
        <td class="calendar"></td>
        <td class="calendar"></td>
        <td class="calendar"></td>
        <td class="calendar"></td>
    </tr>
</table