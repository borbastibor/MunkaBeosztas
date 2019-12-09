<?php

class Kocsi {
    private $kocsiId;
    private $tipus;
    private $rendszam;

    function getKocsiId() {
        return $this->kocsiId;
    }

    function getTipus() {
        return $this->tipus;
    }

    function getRendszam() {
        return $this->rendszam;
    }

    function setKocsiId($id) {
        $this->kocsiId = $id;
    }

    function setTipus($tipus) {
        $this->tipus = $tipus;
    }

    function setRendszam($rendszam) {
        $this->rendszam = $rendszam;
    }

    function toString() {
        return $this->kocsiId." ".$this->tipus." ".$this->rendszam;
    }
}

?>