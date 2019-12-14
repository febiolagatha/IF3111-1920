<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	 public function __construct()
	 {
		 parent::__construct();
		 $this->load->database();
	 		$this->load->model('Lapor');
	 }

	public function index()
	{
		$data['posts'] = $this->Lapor_model->tampilLapor();
		$this->load->view('halamanutama', $data);
	}

	public function tampilLaporan($id = NULL)
	{
			$data['post'] = $this->Lapor_model->tampilLapor($id);

			if (empty($data['post'])) {
				show_404();
			}

			$this->load->view('halamanutama');
	}

	public function buatlaporan($value='')
	{
		$this->form_validation->set_rules('laporan', 'Laporan', 'required|min_length[25]');
		$this->form_validation->set_rules('aspek', 'Aspek', 'required');

		if (empty($_FILES['upload']['name'])) {
				$this->form_validation->set_rules('upload', 'Upload', 'required');
		}

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('buatlaporan');
		}else{
			$config['upload_path'] = './tampilan/';
			$config['allowed_types'] = 'gif|jpg|png|doc|docx|xls|xlsx|ppt|pptx|pdf';

			$this->load->library('upload', $config);
			$data = array('upload_data' => $this->upload->data());
			$upload = $_FILES['userfile']['name'];
			$this->Lapor_model->tambahLapor($upload);
			redirect($_SERVER['HTTP_REFERER'].'../../../');
		}
	}
}
