<div class="adminform-container">
    <div class="adminform-title">
        <span>Munka hozzáadása</span>
        <?php echo(anchor('munkak/index','[X]',array('class' => 'cancel-button'))); ?>
    </div>
    <div class="adminform-body">
    <?php
        echo($errors);
        echo(form_open('munkak/create'));

        // Helyszín textbox
        echo(form_label('Helyszín', 'helyszin'));
        echo(form_input(array(
            'name' => 'helyszin',
            'id' => 'helyszin',
            'value' => set_value('helyszin'),
            'placeholder' => 'Írja be a helyszínt...'
        )));

        // Dátumválasztó
        echo(form_label('Dátum', 'datum'));
        echo(form_input(array(
            'type' => 'date',
            'name' => 'datum',
            'id' => 'datum',
            'value' => set_value('datum'),
        )));

        // Munkaleírás textbox
        echo(form_label('Leírás', 'leiras'));
        echo(form_input(array(
            'name' => 'leiras',
            'id' => 'leiras',
            'value' => set_value('leiras'),
            'placeholder' => 'Adjon leírást a munkáról...'
        )));

        // Gépjárművek legördülő lista
        echo(form_label('Gépjármű', 'kocsi'));
        foreach ($kocsik as $kocsi_item):
            $kocsi_array[$kocsi_item['kocsiid']] = $kocsi_item['tipus'].' ('.$kocsi_item['rendszam'].')';
        endforeach;
        echo(form_dropdown('kocsi', $kocsi_array, ''));

        // Dolgozók checklist
        echo(form_label('Dolgozók', 'dolgozo'));
        echo('<div class="checkbox-list">');
        foreach ($dolgozok as $dolgozo_item):
            echo(form_checkbox(array(
                'name' => $dolgozo_item['dolgozoid'],
                'id' => $dolgozo_item['dolgozoid'],
                'value' => $dolgozo_item['csaladnev'].' '.$dolgozo_item['keresztnev'],
                'checked' => FALSE
            )));
            echo($dolgozo_item['csaladnev'].' '.$dolgozo_item['keresztnev'].'<br />');
        endforeach;
        echo('</div>');

        // Mentés gomb
        echo(form_submit(array(
            'name' => 'submit',
            'value' => 'Mentés'
        )));
        echo(form_close());
    ?>
    </div>
</div>