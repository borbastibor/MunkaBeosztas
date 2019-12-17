<?php echo(anchor('home/create','<div class="create-button">+</div>')); ?>
<?php echo(anchor('home/stepLeft','<div class="leftshift-button">&#8810;</div>')); ?>
<?php echo(anchor('home/stepRight','<div class="rightshift-button">&#8811;</div>')); ?>
<table class="calendar-container">
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
            echo('<th class="calendar-header"'.$bgcolor.'>'.$dt->format('Y.m.d').' ('.$weekdays[$dt->format('N')].')</th>');
        }
        ?>
    </tr>
    <tr>
        <td class="calendar-cell">
            <div class="tag-container">
                <div class="tag-title">
                    <table class="tag-title-table">
                        <tr>
                            <td class="tag-title-tablecell">
                                <?php
                                $anchordata = [
                                    'class' => 'tag-title-menuitem',
                                    'style' => 'border-radius: 4px 0px 0px 0px',
                                    'id' => '' // Ide jön a munkaid
                                ];
                                echo(anchor('home/edit','Szerkeszt',$anchordata));
                                ?>
                            </td>
                            <td class="tag-title-tablecell">
                                <?php
                                $anchordata = [
                                    'class' => 'tag-title-menuitem',
                                    'style' => 'border-radius: 0px 4px 0px 0px',
                                    'id' => '' // ide jön a munkaid
                                ];
                                echo(anchor('home/delete','Eltávolít',$anchordata));
                                ?>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="tag-body">
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
        <td class="calendar-cell"></td>
        <td class="calendar-cell"></td>
        <td class="calendar-cell"></td>
        <td class="calendar-cell"></td>
        <td class="calendar-cell"></td>
        <td class="calendar-cell"></td>
    </tr>
</table