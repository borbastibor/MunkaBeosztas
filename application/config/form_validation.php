<?php
$config = array(
    'kocsik_rules' => array(
        array(
            'field' => 'gepkocsi',
            'label' => 'Gépkocsi',
            'rules' => 'required',
            'errors' => array(
                'required' => 'Nincs gépkocsi megadva!'
            )
        )
    ),

    'dolgozok_rules' => array(
        array(
            'field' => 'dolgozonev',
            'label' => 'Dolgozó neve',
            'rules' => 'required',
            'errors' => array(
                'required' => 'Nincs név megadva!'
            )
        )
    ),

    'munkak_rules' => array(
        array(
            'field' => 'feladat',
            'label' => 'Feladat',
            'rules' => 'required',
            'errors' => array(
                'required' => 'Nincs feladat megadva!'
            )
        )
    )
);

$config['error_prefix'] = '<p class="error">';
$config['error_suffix'] = '</p>';
?>