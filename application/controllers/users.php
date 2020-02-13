<?php
	/**
	 * 
	 */
	class Users extends My_Controller
	{
		
			 public function index()
	{
		$this->load->model('usermodel');
		
		$this->load->library('pagination');
			$config=[
				  'base_url' => base_url('users/index'),
				  'per_page' =>3,
				  'total_rows' => $this->usermodel->article_row(),
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
			$articles=$this->usermodel->all_articles($config['per_page'],$this->uri->segment(3));
		$this->load->view('users/articleList',compact('articles'));
	}
	}
?>