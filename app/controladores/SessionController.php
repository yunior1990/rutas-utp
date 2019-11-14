<?php
class SessionController {
	private $session;
	public function __construct() {
       // $this->session = new UsersModel();
        $this->modelo('UsuariModelo');
	}
	public function login($user, $pass) {
        $this->session->validate_user($user, $pass);
        
	}
	public function logout() {
		session_start();
		session_destroy();
		header('Location: ./');
	}
	public function __destruct() {
		unset($this);
	}
}