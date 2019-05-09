<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class E_shop extends CI_Controller
{
	
	public function index()
	{
		$this->load->view('header');
		$this->load->view('index');
		$this->load->view('footer');
	}

	public function products()
	{
		$this->load->view('header');	
		$this->load->view('products');
		$this->load->view('footer');
	}

	public function product_details()
	{
		$this->load->view('header');
		$this->load->view('product_page');
		$this->load->view('footer');
	}
	public function checkout()
	{
		$this->load->view('header');
		$this->load->view('checkout');
		$this->load->view('footer');
	}
	public function create()
	{
		$data['username']=$this->input->post('user');
		$data['email']=$this->input->post('email');
		$data['phone']=$this->input->post('phone');
		$data['gender']=$this->input->post('gender');
		$data['password']=md5($this->input->post('password'));

		$this->load->model('shop_model');
		$insert = $this->shop_model->create_acc($data);
		if($insert==true){

				echo'1';
		}else{
			
				echo'0';
		}

	}

	public function login()
	{
		$user = $this->input->post('user');
		$psw = md5($this->input->post('password'));
		$this->load->model('shop_model');
		$data = $this->shop_model->dologin($user,$psw);
			if($data==true)
			{
				$this->session->set_userdata('id',$data);
				echo'1';
			}else{
				echo'0';
			}
	}

	public function logout()
	{
		$this->session->unset_userdata('id');
		redirect('e_shop/index');
	}
	
	public function captchacode()
		{
			error_reporting(-1);
			ini_set('display_errors',1);
		$this->load->helper('captcha');
		$config = array(
				    'img_path'      => 'captcha/',
				    'img_url'       => base_url().'captcha/',
				    'img_width'     => '150',
				    'img_height'    => 50,
				    'word_length'   => 8,
				    'font_size'     => 16
				);
				$captcha['image'] = create_captcha($config);
		$this->load->view('captchademo',$captcha);
		// echo $cap['image'];
		}	
}
 ?>