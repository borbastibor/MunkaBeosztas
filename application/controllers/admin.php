<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

    private $valid_passwords;
    private $valid_users;
    private $user;
    private $pass;

	public function __construct() {
        parent::__construct();
        // Ide jönnek a felhasználónév - jelszó párosok
        $this->valid_passwords = array(
            'teszt' => 'teszt',
            'teszt1' => 'teszt1'
        );
        $this->valid_users = array_keys($this->valid_passwords);
        if (isset($_SERVER['PHP_AUTH_USER'])) {
            $this->user = $_SERVER['PHP_AUTH_USER'];
        } else {
            $this->user = null;
        }
        if (isset($_SERVER['PHP_AUTH_PW'])) {
            $this->pass = $_SERVER['PHP_AUTH_PW'];
        } else {
            $this->pass = null;
        }
    }
    
    public function index() {
        $validated = (in_array($this->user, $this->valid_users)) && ($this->pass == $this->valid_passwords[$this->user]);
        if (!$validated) {
            header('WWW-Authenticate: Basic realm="My Realm"');
            header('HTTP/1.0 401 Unauthorized');
            die('Nem jogosult a hozzáféréshez!');
            exit();
        }
          
        // Ha ide elér akkor validált felhasználó.
        $this->session->set_userdata('isAdmin', TRUE);
        redirect('home/index');  
    }
}

?>