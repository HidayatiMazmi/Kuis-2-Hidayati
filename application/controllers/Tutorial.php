<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tutorial extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->helper('url','form');
        $this->load->library('pagination','form_validation');
        $this->load->model('Tutorial_model');
        
    }

    public function title()
    {
        $tutorial = $this->Tutorial_model
    	->list();
  		$data = [
    	'title' => 'Data Tutorial',
    	'tutorial' => $tutorial
		];
  		$this->load->view('tutorial/tutorial', $data);
    }

	public function index()
	{
		$data = [];
        $total = $this->Tutorial_model->getTotal();

        if ($total > 0) {
            $limit = 3;
            $start = $this->uri->segment(3, 0);

            $config = [
                'base_url' => base_url() . 'tutorial/index',
                'total_rows' => $total,
                'per_page' => $limit,
                'uri_segment' => 3,

                // Bootstrap 3 Pagination
                'first_link' => '&laquo;',
                'last_link' => '&raquo;',
                'next_link' => 'Next',
                'prev_link' => 'Prev',
                'full_tag_open' => '<ul class="pagination">',
                'full_tag_close' => '</ul>',
                'num_tag_open' => '<li>',
                'num_tag_close' => '</li>',
                'cur_tag_open' => '<li class="active"><span>',
                'cur_tag_close' => '<span class="sr-only">(current)</span></span></li>',
                'next_tag_open' => '<li>',
                'next_tag_close' => '</li>',
                'prev_tag_open' => '<li>',
                'prev_tag_close' => '</li>',
                'first_tag_open' => '<li>',
                'first_tag_close' => '</li>',
                'last_tag_open' => '<li>',
                'last_tag_close' => '</li>',
            ];
            $this->pagination->initialize($config);

            $data = [
                'results' => $this->Tutorial_model->list($limit, $start),
                'links' => $this->pagination->create_links(),
                'tutorial_list' => $this->Tutorial_model->getDataTutorial()
            ];
        }

        $this->load->view('tutorial/tutorial', $data);
	}

		public function create()
	{
        $where=$this->input->post('namaUser');
		$namaUser=$this->Tutorial_model->getUser($where);
		$this->form_validation->set_rules('nama_tutorial', 'Nama', 'trim|required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'trim|required');
        $this->form_validation->set_rules('idUser', 'IdUser', 'trim|required');
		//$this->tgl_lahir=date('Y-m-d', strtotime($this->tgl_lahir));
        if ($this->form_validation->run()==FALSE)
        {
			$this->load->view('tutorial/tambah_tutorial_view');
		}else{

			$config['upload_path']='./assets/upload/';
			$config['allowed_types']='gif|jpg|png';
			$config['max_size']=1000000000;
			$config['max_width']=10240;
			$config['max_height']=7680;

			$this->load->library('upload', $config);
			if (! $this->upload->do_upload('foto_tutorial')) {
				$error = array('error' => $this->upload->display_errors());
				$this->load->view('tutorial/tambah_tutorial_view',$error);
			} else {
				$this->Tutorial_model->insertTutorial();
				echo "<script>alert('Successfully Created'); </script>";
				$data = [
                    'tutorial_list' => $this->Tutorial_model->getDataTutorial(),
                    'user_list' => $this->Tutorial_model->getUser($where)
                ];
				$this->load->view('tutorial/tutorial',$data);
			}
		}
	}

	public function update()
	{
        $this->form_validation->set_rules('nama_tutorial', 'Nama', 'trim|required');
        $this->form_validation->set_rules('idUser', 'IdUser', 'trim|required');
		$this->form_validation->set_rules('deskripsi', 'Deskripsi', 'trim|required');
		$id = $this->uri->segment(3);
		$data["tutorial"] = $this->Tutorial_model->getTutorial($id);
		if ($this->form_validation->run()==FALSE){
			$this->load->view('tutorial/edit_tutorial_view',$data);
		}else{
			$this->User_model->updateById($id);
			echo "<script>alert('Successfully Updated'); </script>";
			$data = [
                'tutorial_list' => $this->Tutorial_model->getDataTutorial(),
                'user_list' => $this->Tutorial_model->getUser($where)
            ];
			$this->load->view('tutorial/tutorial',$data);
		}
	}

	public function delete()
	{
		echo "<script>alert('Successfully Deleted'); </script>";
		$id = $this->uri->segment(3);
		$this->tutorial_model->deleteById($id);
		$data["tutorial_list"] = $this->tutorial_model->getDataTutorial();
		$this->load->view('tutorial/tutorial',$data);

	}

	public function search() {
		$keyword = $this->uri->segment(3);
        $data['results']    =   $this->Tutorial_model->cari($keyword);
        $this->load->view('tutorial/tutorial',$data);
    }


}

/* End of file Pegawai.php */
/* Location: ./application/controllers/Pegawai.php */