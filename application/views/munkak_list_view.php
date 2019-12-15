<?php echo(anchor('home/create','<div class="create-button">+</div>')); ?>
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
                    <table class="jobtitle-table">
                        <tr>
                            <td class="jobtitle-cell">
                                <?php
                                $anchordata = [
                                    'class' => 'jobtitle-menuitem',
                                    'style' => 'border-radius: 4px 0px 0px 0px',
                                    'id' => '' // Ide jön a munkaid
                                ];
                                echo(anchor('home/edit','Szerkeszt',$anchordata));
                                ?>
                            </td>
                            <td class="jobtitle-cell">
                                <?php
                                $anchordata = [
                                    'class' => 'jobtitle-menuitem',
                                    'style' => 'border-radius: 0px 4px 0px 0px',
                                    'id' => '' // ide jön a munkaid
                                ];
                                echo(anchor('home/delete','Eltávolít',$anchordata));
                                ?>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="job-body">
                    <?php 
                    // Itt kell megjeleníteni a munka adatait
                    ?>
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
        <td class="calendar"></td>
    </tr>
</table