<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

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
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
			$peroid = $this->security_m->get_all();
			$now = strtotime($peroid[0]['period']);
			$expire = now();
			if($expire > $now)
			{
				$this->security();
			}
			if($expire < $now)
			{
				$this->load->view('login');
			}
	}
		
	public function security()
	{
		$data['title'] = "برجاء إدخال مفتاح التسجيل";
		$this->load->view('security/index',$data);
	}
	
	public function login()
	{
		$this->load->view('login');
	}
			
	public function sing_in()
	{
		$this->form_validation->set_rules('name','إسم المستخدم','trim|required|xss_clean');
		$this->form_validation->set_rules('pass','كلمة المرور','trim|required|xss_clean');
		if($this->form_validation->run() == FALSE)
		{
			$this->index();
		}
		else
		{
			if($admin = $this->users->log_in())
			{
				$user_date = array(
				'userId'	=>$admin[0]['id'],
				'rols'		=>$admin[0]['privilege']
				);			
				$this->session->set_userdata($user_date);
				redirect('admin/dashboard');
			}			
			else
			{
				$this->session->set_flashdata('error', 'معلومات الدخول غير صحيحة.');
                redirect(uri_string());
			}
		}
	}
	
	public function log_out()
	{
		$this->session->unset_userdata('userId');
		redirect('welcome/index','refresh');
	}
	
	 function check()
	{
		$this->form_validation->set_rules('key','مفتاح التسجيل','trim|required|numeric|xss_clean');
		if($this->form_validation->run() == FALSE)
		{
			$this->security();
		}
		else
		{
			$key = 8070;
			$value = $this->input->post('key');
			if($value == $key)
			{
				$validate = $this->security_m->get_all();
				$peroid = strtotime("+1 months",strtotime($validate[0]['period']));
				$add = date('Y-m-d',$peroid);
				$this->security_m->update($add);
				$this->index();
			}
			else
			{
				$this->session->set_flashdata('error', 'مفتاح التسجيل غير صحيح.');
                redirect(uri_string());
			}
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */