<?php

class User extends CI_Controller
{
	function index()
	{
		$this->load->model('User_model');
		$users = $this->User_model->all();
		$data = array();
		$data['users'] = $users;
		$this->load->view('list', $data);
	}

	function Create()
	{
		$this->load->model('User_model');
		$this->form_validation->set_rules('name', 'Name', 'min_length[5]');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|min_length[5]|valid_email');

		if ($this->form_validation->run() == false) {
			// show error if there is any
			$this->load->view('create');
		} else {
			//else save to database
			$formArray = array();
			$formArray['name'] = $this->input->post('name');
			$formArray['email'] = $this->input->post('email');
			$formArray['created_at'] = date('Y-m-d');
			$this->User_model->create($formArray);
			$this->session->set_flashdata('success', 'Record added successfully');
			redirect(base_url() . 'index.php/user/index');
		}
	}

	function edit($user_id)
	{
		$this->load->model('User_model');
		$user = $this->User_model->getUser($user_id);
		$data = array();
		$data['user'] = $user;

		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');
		if ($this->form_validation->run() == false)
			$this->load->view('edit', $data);
		else {
			$formArray = array();
			$formArray['name'] = $this->input->post('name');
			$formArray['email'] = $this->input->post('email');
			$this->User_model->updateUser($user_id, $formArray);
			$this->session->set_flashdata('success', 'Updated successfully');
			redirect(base_url() . 'index.php/user/index');
		}
	}

	function delete($user_id)
	{
		$this->load->model('User_model');
		$user = $this->User_model->getUser($user_id);
		if (empty($user)) {
			$this->session->set_flashdata('failure', 'Not found in database');
			redirect(base_url() . 'index.php/user/index');
		}
		$this->User_model->delete($user_id);
		$this->session->set_flashdata('success', 'Deleted successfully');
		redirect(base_url() . 'index.php/user/index');
	}
}

?>
