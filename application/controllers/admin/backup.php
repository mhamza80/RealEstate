<?php

	class Backup extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();
			session_start();
			if($this->session->userdata('userId') < 1 )
			{
				redirect(base_url());	
			}
			
		}
		
		public function index()
		{
			
	        
	        
	        
	        $this->load->database();
	        $this->load->dbutil();

        $prefs = array(     
                'format'      => 'gz',             
                'filename'    => 'my_db_backup.sql'
              );


        $backup =& $this->dbutil->backup($prefs); 

        $db_name = 'backup-on-'. date("Y-m-d-H-i-s") .'.zip';
        $save = 'pathtobkfolder/'.$db_name;

        $this->load->helper('file');
        write_file($save, $backup); 


        $this->load->helper('download');
        force_download($db_name, $backup); 
       
		}
	}