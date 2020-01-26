<?php
$config = array(
    'kocsik_rules' => array(
        array(
            'field' => 'tipus',
            'label' => 'Típus',
            'rules' => 'required',
            'errors' => array(
                'required' => 'Nincs típus megadva!'
            )
        ),
    
        array(
            'field' => 'rendszam',
            'label' => 'Rendszám',
            'rules' => array(
                'required',
                'exact_length[7]',
                'regex_match[/^[A-Z]{3}-[0-9]{3}$/]',
                'is_unique[kocsik.rendszam]'
            ),
            'errors' => array(
                'required' => 'Nincs rendszám megadva!',
                'exact_length[7]' => 'Nem megfelelő formátum! (ABC-123)',
                'regex_match[/^[A-Z]{3}-[0-9]{3}$/]' => 'Nem megfelelő formátum! (ABC-123)',
                'is_unique[kocsik.rendszam]' => 'Már létezik ilyen rendszám!'
            )
        )
    ),

    'dolgozok' => array(
        array(
            'field' => 'keresztnev',
            'label' => 'Keresztnév',
            'rules' => 'required',
            'errors' => array(
                'required' => 'Nincs keresztnév megadva!'
            )
        ),

        array(
            'field' => 'csaladnev',
            'label' => 'Családnév',
            'rules' => 'required',
            'errors' => array(
                'required' => 'Nincs családnév megadva!'
            )
        )
    )
);

$config['error_prefix'] = '<p class="error">';
$config['error_suffix'] = '</p>';
?>