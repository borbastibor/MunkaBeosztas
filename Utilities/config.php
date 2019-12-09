<?php
session_start();

$fejlec = array(
    "cim" => "Munkabeosztás"
);

$nezetek = array(
    "/" => array("fajl" => "JobListView", "szoveg" => "Munkák"),
    "createjob" => array("fajl" => "JobCreateView", "szoveg" => "Új munka felvétele"),
    "editjob" => array("fajl" => "JobEditView", "szoveg" => "Munka szerkesztése"),
    "deletejob" => array("fajl" => "JobDeleteView", "szoveg" => "Munka törlése"),
    "personlist" => array("fajl" => "PersonListView", "szoveg" => "Dolgozók"),
    "createperson" => array("fajl" => "PersonCreateView", "szoveg" => "Új dolgozó felvétele"),
    "editperson" => array("fajl" => "PersonEditView", "szoveg" => "Dolgozó szerkesztése"),
    "deleteperson" => array("fajl" => "PersonDeleteView", "szoveg" => "Dolgozó törlése"),
    "carlist" => array("fajl" => "CarListView", "szoveg" => "Kocsik"),
    "createcar" => array("fajl" => "CarCreateView", "szoveg" => "Új kocsi felvétele"),
    "editcar" => array("fajl" => "CarEditView", "szoveg" => "Kocsi szerkesztése"),
    "deletecar" => array("fajl" => "CarDeleteView", "szoveg" => "Kocsi törlése"));

$hiba_nezetek = array ('fajl' => '404', 'szoveg' => 'A keresett oldal nem található!');

$aktualisNezet = 0;



?>