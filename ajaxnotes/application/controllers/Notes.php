<?php 

class Notes extends CI_Controller{
    public function index(){
        $this->load->model('Note');
        $notes = $this->Note->get_all_note();
    
        $this->load->view('notes_view', array('notes' => $notes));
    }

    public function create(){
        $this->load->model('Note');
        if(strlen($this->input->post('title')) > 0)
        $this->Note->create_note($this->input->post());

        $notes = $this->Note->get_all_note();
        $this->load->view('partial_notes', array('notes' => $notes));
    }

    public function update($id){
        $this->load->model('Note');
        $this->Note->update_note($id, $this->input->post());
        $notes = $this->Note->get_all_note();
        $this->load->view('partial_notes', array('notes' => $notes));
    }

    public function remove($id){
        $this->load->model('Note');
        $this->Note->remove_note($id);
        $notes = $this->Note->get_all_note();
        $this->load->view('partial_notes', array('notes' => $notes));
    }
}