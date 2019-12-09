<?php

class Dolgozo {
    private $dolgozoId;
    private $csaladnev;
    private $keresztnev;

    function getDolgozoId() {
        return $this->dolgozoId;
    }

    function getCsaladnev() {
        return $this->csaladnev;
    }

    function getKeresztnev() {
        return $this->keresztnev;
    }

    function setDolgozoId($id) {
        $this->dolgozoId = $id;
    }

    function setCsaladnev($csnev) {
        $this->csaladnev = $csnev;
    }

    function setKeresztnev($knev) {
        $this->keresztnev = $knev;
    }

    function toString() {
        return $this->dolgozoId." ".$this->csaladnev." ".$this->keresztnev;
    }
}

?>