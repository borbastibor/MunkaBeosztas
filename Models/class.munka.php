<?php
class Munka {
    private $munkaId;
    private $helyszin;
    private $datum;
    private $leiras;
    private $kocsiId;
    private $dolgozoId;

    function getMunkaId() {
        return $this->munkaId;
    }

    function getHelyszin() {
        return $this->helyszin;
    }

    function getDatum() {
        return $this->datum;
    }

    function getLeiras() {
        return $this->leiras;
    }

    function getKocsiId() {
        return $this->kocsiId;
    }

    function getDolgozoId() {
        return $this->dolgozoId;
    }

    function setMunkaId($id) {
        $this->munkaId = $id;
    }

    function setHelyszin($hely) {
        $this->helyszin = $hely;
    }

    function setDatum($datum) {
        $this->datum = $datum;
    }

    function setLeiras($szoveg) {
        $this->leiras = $szoveg;
    }

    function setKocsiId($id) {
        $this->kocsiId = $id;
    }

    function setDolgozoId($id) {
        $this->dolgozoId = $id;
    }

    function toString() {
        return $this->munkaId." ".$this->helyszin." ".$this->datum." ".
        $this->leiras." ".$this->kocsiId." ".$this->dolgozoId;
    }
}

?>