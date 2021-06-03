<?php 

class Main extends CI_Controller {
    public function index(){
        $this->load->view('pokemon_view');
    }
}