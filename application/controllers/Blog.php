<?php

class Blog extends CI_Controller {

	function index() {
		$data = array();
		$action = 'create';
		$crud_label = 'Create';
		
		if ($blog = $this->blogmodel->get()) {
			$data['blog'] = $blog;
			$crud_label = 'Update';
			$action = 'update/' .$blog->id;
		}
		if ($blogs = $this->blogmodel->getAll()) {
			$data['blogs'] = $blogs;
		}
		
		$data['action'] = $action;
		$data['title'] = $crud_label;
		$this->load->view('blog_view', $data);
	}
	
	function create() {
		$data = array(
				'title'		=> $this->input->post('title'),
				'content'	=> $this->input->post('content')
		);
		
		$this->blogmodel->addRecode($data);
		$this->index();
	}
	
	function update() {
		$data = array(
				'title'		=> $this->input->post('title'),
				'content'	=> $this->input->post('content')
		);
		
		$this->blogmodel->updateRecode($data);
		$this->index();
	}
	
	function delete() {
		$this->blogmodel->deleteRecord();
		$this->index();
	}
}
