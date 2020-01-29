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
                'regex_match[/^[A-Z]{3}-[0-9]{3}$/]'
            ),
            'errors' => array(
                'required' => 'Nincs rendszám megadva!',
                'exact_length' => 'A rendszám 7 karakter kell legyen! (ABC-123)',
                'regex_match' => 'Nem megfelelő a rendszám formátum! (ABC-123)'
            )
        )
    ),

    'dolgozok_rules' => array(
        array(
            'field' => 'csaladnev',
            'label' => 'Családnév',
            'rules' => 'required',
            'errors' => array(
                'required' => 'Nincs családnév megadva!'
            )
        ),

        array(
            'field' => 'keresztnev',
            'label' => 'Keresztnév',
            'rules' => 'required',
            'errors' => array(
                'required' => 'Nincs keresztnév megadva!'
            )
        )
    ),

    'munkak_rules' => array(
        array(
            'field' => 'helyszin',
            'label' => 'Helyszín',
            'rules' => 'required',
            'errors' => array(
                'required' => 'Nincs helyszín megadva!'
            )
        ),

        array(
            'field' => 'idopont',
            'label' => 'Időpont',
            'rules' => 'required',
            'errors' => array(
                'required' => 'Nincs dátum megadva!'
            )
        ),

        array(
            'field' => 'leiras',
            'label' => 'Leírás',
            'rules' => 'required',
            'errors' => array(
                'required' => 'Nincs leírás megadva!'
            )
        ),

        array(
            'field' => 'kocsi',
            'label' => 'Gépjármű',
            'rules' => 'required',
            'errors' => array(
                'required' => 'Nincs gépjármű megadva!'
            )
        )
    )
);

$config['error_prefix'] = '<p class="error">';
$config['error_suffix'] = '</p>';
?>