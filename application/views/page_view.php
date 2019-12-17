<?php

defined('BASEPATH') OR exit('No direct script access allowed');

if ($content == 'munkak_list_view' || $content == 'munkak_admin_list_view') {
    $this->load->view($header, array('upd_interval' => '30'));
} else {
    $this->load->view($header);
}
$data['content'] = $content;
$this->load->view($menu, $data);
$this->load->view($content);
$this->load->view($footer);

?>