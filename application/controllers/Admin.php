<?php
	
	class Admin extends My_Controller
	{
		  
		public function index()
		{
			$this->session->unset_userdata('id');
			$this->form_validation->set_rules('uname','user name','required|alpha');
			$this->form_validation->set_rules('password','password','required|max_length[12]');
			$this->form_validation->set_error_delimiters('<div class="text-danger">','</div>');

			if($this->form_validation->run())
			{
				$uname=$this->input->post('uname');
				$pass=$this->input->post('password');
				$this->load->model('Loginmodel');
				$login_id=$this->Loginmodel->isvalidate($uname,$pass);
				
				if($login_id)
				{
					  $this->session->set_userdata('id',$login_id);
					  return redirect('admin/welcome');
				}
				else
				{
					$this->session->set_flashdata('login_error','invalid username/password');
					return redirect('admin/index');
				}
			}
			else
			{
				$this->load->view('admin/login');
			}
		}
		public function welcome()
		{
			$id=$this->session->userdata('id');
			$this->load->model('Loginmodel');
			$this->load->library('pagination');
			$config=[
				  'base_url' => base_url('admin/welcome'),
				  'per_page' =>3,
				  'total_rows' => $this->Loginmodel->find_article($id),
				  'full_tag_open'=>"<ul class='pagination'>",
				  'full_tag_close'=>"</ul>",
				  'next_tag_open' =>"<li>",
				  'next_tag_close' =>"</li>",
				  'prev_tag_open' =>"<li>",
				  'prev_tag_close' =>"</li>",
				  'num_tag_open' =>"<li>",
				  'num_tag_close' =>"<li>",
				  'cur_tag_open' =>"<li class='active'><a>",
				  'cur_tag_close' =>"</a></li>"
		   ];
			$this->pagination->initialize($config);
			
			if(!$this->session->userdata('id')){
			return redirect('admin/index');
			}
			else{
				$this->load->model('Loginmodel');
			$articles=$this->Loginmodel->articleList($config['per_page'],$this->uri->segment(3));
				$this->load->view('admin/dashbord',['articles'=>$articles]);
			}
			 
		}
		 public function logout()
		 {
			 $this->session->unset_userdata('id');
			 return redirect('admin/index');
		 }
		   public function adduser()
		   {
			   $this->load->view('admin/add_article');
		   }
		   public function userValidate()
		   {
			   $config=[
						'upload_path'=>'./upload/',
						'allowed_types'=>'gif|png|jpg',
			   ];
			   $this->load->library('upload',$config);


				if($this->form_validation->run('add_article_rules') && $this->upload->do_upload())
				{
					$post=$this->input->post();
					$data=$this->upload->data();

					$image_path=base_url("upload/".$data['raw_name'].$data['file_ext']);
					$post['image']=$image_path;
					$this->load->model('Loginmodel');
					if($this->Loginmodel->add_articles($post))
					{
						$this->session->set_flashdata('msg','article add successfully');
						$this->session->set_flashdata('msg_class','alert-success');
						return redirect('admin/welcome');
					}
					else
					{
						$this->session->set_flashdata('msg','article not inserted');
						$this->session->set_flashdata('msg_class','alert-danger');
						return redirect('admin/welcome');
					}
					
				}
				else
				{
					$upload_error=$this->upload->display_errors();
					$this->load->view('admin/add_article',compact('upload_error'));
				}
		   }
		public function signup_user()
		{
			$this->form_validation->set_rules('username','user name','required|alpha');
			$this->form_validation->set_rules('password','password','required|max_length[12]');
			$this->form_validation->set_rules('firstname','First name','required|alpha|max_length[7]');
			$this->form_validation->set_rules('lastname','Last name','required|alpha|max_length[7]');
			$this->form_validation->set_rules('email','Email','required|valid_email|is_unique[user.email]');
			$this->form_validation->set_error_delimiters('<div class=text-danger>','</div>');

			if($this->form_validation->run())
			{
				$post=$this->input->post();
				$this->load->model('Loginmodel');
				if($this->Loginmodel->useradd($post))
				{
					$this->session->set_flashdata('user','user added successfully');
						$this->session->set_flashdata('user_class','alert-success');
						
				}
				else
				{
					$this->session->set_flashdata('user','user not added please try again!!');
						$this->session->set_flashdata('user_class','alert-danger');
						
				}
				return redirect('admin/signup_user');
			}
			else
			{
				$this->load->view('admin/register.php');
			}
		}
		 public function delarticle()
		 {
			$id=$this->input->post('id');
			$this->load->model('Loginmodel');
					if($this->Loginmodel->article_del($id))
					{
						$this->session->set_flashdata('msg','article delete successfully');
						$this->session->set_flashdata('msg_class','alert-success');
						
					}
					else
					{
						$this->session->set_flashdata('msg','article not deleted');
						$this->session->set_flashdata('msg_class','alert-danger');
						
					}
					return redirect('admin/welcome');
		 }   
		 public function editarticle()
		 {

			$id=$this->input->post('id');
			 $this->load->model('Loginmodel');
			$rt=$this->Loginmodel->article_edit($id);
			$this->load->view('admin/edit_article',['article'=>$rt]);
		 }
		 public function updatarticle($article_id)
		 {
			 
			if($this->form_validation->run('add_article_rules'))
				{
					$post=$this->input->post();
					$this->load->model('Loginmodel');
					if($this->Loginmodel->article_update($article_id,$post))
					{
						$this->session->set_flashdata('msg','article update successfully');
						$this->session->set_flashdata('msg_class','alert-success');
						return redirect('admin/welcome');
					}
					else
					{
						$this->session->set_flashdata('msg','article not updated');
						$this->session->set_flashdata('msg_class','alert-danger');
						return redirect('admin/welcome');
					}
					
				}
				else
				{
					$this->load->view('admin/editarticle');
				}
		 }
		  
	}
?>