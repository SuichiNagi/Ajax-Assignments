<?php

class Note extends CI_Model{
    function get_all_note(){
        $query = $this->db->query('SELECT * FROM notes ORDER BY created_at DESC ');
        return $query->result_array();
    }

    function create_note($data){
        $query = $this->db->query('INSERT INTO notes (title, description, created_at) VALUES (?, ?, NOW())',
        array($data['title'], $data['description']));
    }

    function update_note($id, $data){
        $query = $this->db->query('UPDATE notes SET description = ?, updated_at = NOW() WHERE id = ?',
        array($data['description'], $id));
    }

    function remove_note($id){
        $query = $this->db->query('DELETE FROM notes WHERE id = ?',
        array($id));
    }
}