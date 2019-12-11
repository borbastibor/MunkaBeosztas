<?php

class Kocsi extends Model {
    private $kocsiId;
    private $tipus;
    private $rendszam;

    public function getKocsiId() {
        return $this->kocsiId;
    }

    public function getTipus() {
        return $this->tipus;
    }

    public function getRendszam() {
        return $this->rendszam;
    }

    public function setKocsiId($id) {
        $this->kocsiId = $id;
    }

    public function setTipus($tip) {
        $this->tipus = $tid;
    }

    public function setRendszam($rszam) {
        $this->rendszam = $rszam;
    }

    public function isValid() {
        if (preg_match("^[A-Z]{3}\-[0-9]{3}$", $this->rendszam) === TRUE) {
            return TRUE;
        }
    }
}

?>