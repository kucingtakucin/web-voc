<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Email extends MY_Controller
{
	private $_path = 'email/';
	private $_from = 'vocationofthechampions@gmail.com';
	// public $to = 'adam.faizal.af6@student.uns.ac.id';

	const API_KEY = '985727e407961ef259c440f6e32e82ba';
	const SECRET_KEY = 'bc8f165b071f3102871acfbae7258e2f';
	const SMTP_SERVER = 'tls://in-v3.mailjet.com';
	const PORT = 465; // 25, 587, 465

	public function __construct()
	{
		parent::__construct();
		$this->load->library('email');
	}

	public function index()
	{
		if ($this->input->method() != 'post') {
			return $this->output->set_content_type('application/json')
				->set_status_header(405)
				->set_output(json_encode([
					'status' => false,
					'message' => 'Method not allowed'
				]));
		}

		$config['protocol'] = 'smtp';
		$config['smtp_host'] = self::SMTP_SERVER;
		$config['smtp_user'] = self::API_KEY;
		$config['smtp_pass'] = self::SECRET_KEY;
		$config['smtp_port'] = self::PORT;
		$config['crlf'] = "\r\n";
		$config['newline'] = "\r\n";
		$config['mailtype'] = 'html';
		// $config['mailtype'] = 'text';
		$config['wordwrap'] = true;

		$this->email->initialize([
			'protocol' => 'smtp',
			'smtp_host' => self::SMTP_SERVER,
			'smtp_user' => self::API_KEY,
			'smtp_pass' => self::SECRET_KEY,
			'smtp_port' => self::PORT,
			'crlf' => "\r\n",
			'newline' => "\r\n",
		]);

		$this->email->from($this->_from, 'Vocation Of The Champions');
		$this->email->to($this->input->post('to'));

		$this->email->subject('Email Confirmation');
		$this->email->set_mailtype('html');

		$this->email->message($this->load->view($this->_path . 'email', [
			'judul' => 'Vocation Of The Champions',
			'lomba' => $this->input->post('id_lomba'),
			'nama' => $this->input->post('nama'),
		], true));
		// $this->email->message('test');


		$this->email->send(FALSE);
		echo $this->email->print_debugger(['headers', 'subject', 'body']);
	}
}
