<?php

class Lapor_model extends CI_Model {
  public function __construct()
  {
    parent::__construct();
    $this->load->database();
  }

  public function tampilLapor($id = FALSE)
  {
    if ($id == FALSE) {
				$this->db->order_by('id', 'DESC');
				$query = $this->db->get('lapor');
				return $query->result_array();
			}
			$query = $this->db->get_where('lapor', array('id' => $id));
			return $query->row_array();
  }

  public function tambahLapor($upload)
  {
      $data = array (
          "laporan" => $this->input->post('laporan'),
          "aspek" => $this->input->post('aspek'),
          "file" => $this->input->post('upload')
      );

      $this->db->insert('lapor', $data);
  }

  public function hapusLapor($id)
  {
      $this->db->where('id', $id);
      $this->db->delete('lapor');
      return true;
  }

  public function updateLapor($upload)
  {
      $data = array(
          "laporan" => $this->input->post('laporan'),
          "aspek" => $this->input->post('aspek'),
          "file" => $this->input->post('upload')
        );

      $this->db->where('id', $this->input->post('id'));
      return $this->db->update('lapor', $data);
  }
}

 ?>
