<?php

class ContactController extends BaseController
{
	
	protected $contactModel;
	public $errors = [];
	public function __construct()
	{
		$this->loadModel('ContactModel');
		$this->contactModel = new ContactModel;
	}

	public function index()
	{

		return $this->view('site.contact.index', [
			
		]);
	}

	public function submitForm()
	{
		$data = [
			'message' => $_POST['message'],
			'name' => $_POST['name'],
			'email' => $_POST['email'],
			'phone' => $_POST['phone']
		];

		$this->contactModel->createData($data);
		header('location: ./?controller=contact');
	}
}
