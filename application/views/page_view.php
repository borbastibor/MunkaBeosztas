<?php

defined('BASEPATH') OR exit('No direct script access allowed');

$this->load->view($header);
$this->load->view($menu);
$this->load->view($content);
$this->load->view($footer);

?>