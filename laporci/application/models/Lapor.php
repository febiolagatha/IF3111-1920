<?php

class Lapor extends CI_Model {
  public function __construct()
  {
    parent::__construct();
    $this->load->database();
  }

  public function tambahLapor()
  {
      $data = [
          "id" => $this->input->post(''),
          "laporan" => $this->input->post('laporan'),
          "aspek" => $this->input->post('aspek'),
          "tanggal" => $this->input->post(''),
          "file" => $this->input->post('upload')
      ];

      $this->db->insert('lapor', $data);
  }

}

 ?>
