<?php

$config = array(
    'kocsik' => array(
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
                array($this->Kocsik_model, 'isValidRendszam')
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
        ),
    )
    

);

?>