<?php

defined('BASEPATH') OR exit('No direct script access allowed');

if ($content == 'munkak_list_view') {
    $this->load->view($header, array('upd_interval' => '30'));
} else {
    $this->load->view($header);
}
$this->load->view($menu);
$this->load->view($content);
$this->load->view($footer);

?>