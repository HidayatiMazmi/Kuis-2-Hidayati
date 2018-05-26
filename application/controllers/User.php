<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->helper('url','form');
        $this->load->library('pagination','form_validation');
        $this->load->model('User_model');
    }

    public function title()
    {
        $user = $this->User_model
    	->list();
  		$data = [
    	'title' => 'Data User',
    	'user' => $user
		];
  		$this->load->view('user/user', $data);
    }

	public function index()
	{ 
        if($this->uri->segment(3))
        {
            $search=$this->uri->segment(3);
        } else
        {
            if($this->input->post("search"))
            {
                $search = $this->input->post("search");
            }else
            {
                $search='null';
            }
        }
        $data = [];
        $total = $this->User_model->getTotal($search);

        if ($total > 0) {
            $limit = 3;
            $start = $this->uri->segment(3, 0);

            $config = [
                'base_url' => base_url() . 'user/index'.$search,
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
                'results' => $this->User_model->list($limit, $start, $search),
                'links' => $this->pagination->create_links(),
                'user_list' => $this->User_model->getDataUser()
            ];
        }

        $this->load->view('user/user', $data);
    }

		public function create()
	{
		
		$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		//$this->tgl_lahir=date('Y-m-d', strtotime($this->tgl_lahir));
		if ($this->form_validation->run()==FALSE){
			$this->load->view('user/tambah_user_view');
		}else{

			$config['upload_path']='./assets/upload/';
			$config['allowed_types']='gif|jpg|png';
			$config['max_size']=1000000000;
			$config['max_width']=10240;
			$config['max_height']=7680;

			$this->load->library('upload', $config);
			if (! $this->upload->do_upload('foto')) {
				$error = array('error' => $this->upload->display_errors());
				$this->load->view('user/tambah_user_view',$error);
			} else {
				$this->User_model->insertUser();
				echo "<script>alert('Successfully Created'); </script>";
				$data = [
                        'user_list' => $this->User_model->getDataUser()
                ];
				redirect('user');
			}
		}
    }

	public function update()
	{
        $this->form_validation->set_rules('namaUser', 'Nama', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		$id = $this->uri->segment(3);
		$data["user"] = $this->User_model->getUser($id);
		if ($this->form_validation->run()==FALSE){
			$this->load->view('user/edit_user_view',$data);
		}else{
			$this->User_model->updateById($id);
			echo "<script>alert('Successfully Updated'); </script>";
			$data["user_list"] = $this->User_model->getDataUser();
			$this->load->view('user/user',$data);
		}
    }

	public function delete()
	{
		echo "<script>alert('Successfully Deleted'); </script>";
		$id = $this->uri->segment(3);
		$this->User_model->deleteById($id);
		$data["user_list"] = $this->User_model->getDataUser();
		$this->load->view('user/user',$data);

	}

	public function search() {
        $keyword    =   $this->input->post('cari'); //tergantung namenya apa
        $data['results']    =   $this->User_model->cari($keyword);
        $this->load->view('user/user',$data);
    }

    // public function loadRecord($rowno=0){

    //     // Search text
    //     $search_text = "";
    //     if($this->input->post('submit') != NULL ){
    //       $search_text = $this->input->post('search');
    //       $this->session->set_userdata(array("search"=>$search_text));
    //     }else{
    //       if($this->session->userdata('search') != NULL){
    //         $search_text = $this->session->userdata('search');
    //       }
    //     }
    
    //     // Row per page
    //     $rowperpage = 5;
    
    //     // Row position
    //     if($rowno != 0){
    //       $rowno = ($rowno-1) * $rowperpage;
    //     }
     
    //     // All records count
    //     $allcount = $this->Main_model->getrecordCount($search_text);
    
    //     // Get records
    //     $users_record = $this->Main_model->getData($rowno,$rowperpage,$search_text);
    
    //     // Initialize
    //     $this->pagination->initialize($config);
     
    //     $data['pagination'] = $this->pagination->create_links();
    //     $data['result'] = $users_record;
    //     $data['row'] = $rowno;
    //     $data['search'] = $search_text;
    
    //     // Load view
    //     $this->load->view('user_view',$data);
     
    //   }


}

/* End of file Pegawai.php */
/* Location: ./application/controllers/Pegawai.php */