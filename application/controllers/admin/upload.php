<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Upload extends CI_Controller {
	
    protected $path_img_upload_folder;
    protected $path_img_thumb_upload_folder;
    protected $path_url_img_upload_folder;
    protected $path_url_img_thumb_upload_folder;

    protected $delete_img_url;

  function __construct() {
        parent::__construct();
  		if($this->session->userdata('userId') < 1 )
			{
				redirect(base_url());	
			}
  

//Set relative Path with CI Constant
        $this->setPath_img_upload_folder("resources/assets/img/articles/");
        $this->setPath_img_thumb_upload_folder("resources/assets/img/articles/thumbnails/");

        
//Delete img url
        $this->setDelete_img_url(base_url() . 'admin/upload/deleteImage/');
 

//Set url img with Base_url()
        $this->setPath_url_img_upload_folder(base_url()."resources/assets/img/articles/");
        $this->setPath_url_img_thumb_upload_folder(base_url()."resources/assets/img/articles/thumbnails/");
  }



    public function upload_img() {
        $name = $_FILES['userfile']['name'];
        $name = strtr($name, 'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ', 'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');

// remplacer les caracteres autres que lettres, chiffres et point par _

         $name = preg_replace('/([^.a-z0-9]+)/i', '_', $name);

        //Your upload directory, see CI user guide
        $config['upload_path'] = $this->getPath_img_upload_folder();
  
        $config['allowed_types'] = 'pdf|gif|jpg|png|JPG|GIF|PNG|doc|docx';
        $config['max_size'] = '10000';
        $config['file_name'] = $name;

       //Load the upload library
        $this->load->library('upload', $config);
        $this->upload->initialize($config); 

       if ( $this->do_upload()) {
            
       	
            //If you want to resize 
            $config['new_image'] = $this->getPath_img_thumb_upload_folder();
            $config['image_library'] = 'gd2';
            $config['source_image'] = $this->getPath_img_upload_folder() . $name;
            $config['create_thumb'] = FALSE;
            $config['maintain_ratio'] = TRUE;
            $config['width'] = 193;
            $config['height'] = 94;
            
            
	

            $this->load->library('image_lib', $config);

            $this->image_lib->resize();

           $data = $this->upload->data();
           
			$files['file_path'] = $data['file_path'];
		    $files['file_name'] = $data['file_name'];	
			$files['file_type'] = $data['file_type'];
			$section_id = $this->input->post('section_id');
			$date_now = date("Y-m-d");
			if($this->input->post('documents')== TRUE)
			{
				$this->document->add($data);
				
			}
      		if($this->input->post('pic')== TRUE)
			{
				$this->document->add_pic($data);
				
			}
			if($this->input->post('rentals') == TRUE)
			{
				$this->rental->document($data);
			}
       		if($this->input->post('long') == TRUE)
			{
				$this->long_documents->add($data);
			}
            //Get info 
            $info = new stdClass();
            
            $info->name = $name;
            $info->size = $data['file_size'];
            $info->type = $data['file_type'];
            $info->url = base_url() ."resources/assets/img/articles/". $name;
            $info->thumbnail_url = base_url() ."resources/assets/img/articles/thumbnails/" . $name; //I set this to original file since I did not create thumbs.  change to thumbnail directory if you do = $upload_path_url .'/thumbs' .$name
            $info->delete_url = $this->getDelete_img_url() . $name;
            $info->delete_type = 'DELETE';


           //Return JSON data
           if (IS_AJAX) {   //this is why we put this in the constants to pass only json data
                echo json_encode(array($info));
                //this has to be the only the only data returned or you will get an error.
                //if you don't give this a json array it will give you a Empty file upload result error
                //it you set this without the if(IS_AJAX)...else... you get ERROR:TRUE (my experience anyway)
            } else {   // so that this will still work if javascript is not enabled
                $file_data['upload_data'] = $this->upload->data();
                echo json_encode(array($info));
            }
            
           
        } 
        
        else {

           // the display_errors() function wraps error messages in <p> by default and these html chars don't parse in
           // default view on the forum so either set them to blank, or decide how you want them to display.  null is passed.
            $error = array('error' => $this->upload->display_errors('',''));

            echo json_encode(array($error));
        }
 

       }
  


//Function for the upload : return true/false
  public function do_upload() {

        if (!$this->upload->do_upload()) {

            return false;
        } else {
            //$data = array('upload_data' => $this->upload->data());

            return true;
        }
     }

public function deleteImage() {
		
        //Get the name in the url
       $file = $this->uri->segment(4);

      	$success = PUBPATH.'resources/assets/img/articles/'.$file;
      	unlink($success);      
      	$success_th = PUBPATH.'resources/assets/img/articles/thumbnails/'.$file;
      	unlink($success_th);
		$delete  = $this->forms->delete_by_name($file);
        //info to see if it is doing what it is supposed to 
        $info = new stdClass();
        $info->sucess = $success;
        $info->path = $this->getPath_url_img_upload_folder() . $file;
        $info->file = is_file($this->getPath_img_upload_folder() . $file);
        if (IS_AJAX) {//I don't think it matters if this is set but good for error checking in the console/firebug
            echo json_encode(array($info));
        } else {     //here you will need to decide what you want to show for a successful delete
            var_dump($file);
        }
    }

    public function get_files() {

        $this->get_scan_files();
    }

    public function get_scan_files() {

        $file_name = isset($_REQUEST['file']) ?
                basename(stripslashes($_REQUEST['file'])) : null;
        if ($file_name) {
            $info = $this->get_file_object($file_name);
        } else {
            $info = $this->get_file_objects();
        }
        header('Content-type: application/json');
        echo json_encode($info);
    }

    protected function get_file_object($file_name) {
        $file_path = $this->getPath_img_upload_folder() . $file_name;
        if (is_file($file_path) && $file_name[0] !== '.') {

            $file = new stdClass();
            $file->name = $file_name;
            $file->size = filesize($file_path);
            $file->url = $this->getPath_url_img_upload_folder() . rawurlencode($file->name);
            $file->thumbnail_url = $this->getPath_url_img_thumb_upload_folder() . rawurlencode($file->name);
            //File name in the url to delete 
            $file->delete_url = $this->getDelete_img_url() . rawurlencode($file->name);
            $file->delete_type = 'DELETE';
            
            return $file;
        }
        return null;
    }

    protected function get_file_objects() {
        return array_values(array_filter(array_map(
             array($this, 'get_file_object'), scandir($this->getPath_img_upload_folder())
                   )));
    }


    public function getPath_img_upload_folder() {
        return $this->path_img_upload_folder;
    }

    public function setPath_img_upload_folder($path_img_upload_folder) {
        $this->path_img_upload_folder = $path_img_upload_folder;
    }

    public function getPath_img_thumb_upload_folder() {
        return $this->path_img_thumb_upload_folder;
    }

    public function setPath_img_thumb_upload_folder($path_img_thumb_upload_folder) {
        $this->path_img_thumb_upload_folder = $path_img_thumb_upload_folder;
    }

    public function getPath_url_img_upload_folder() {
        return $this->path_url_img_upload_folder;
    }

    public function setPath_url_img_upload_folder($path_url_img_upload_folder) {
        $this->path_url_img_upload_folder = $path_url_img_upload_folder;
    }

    public function getPath_url_img_thumb_upload_folder() {
        return $this->path_url_img_thumb_upload_folder;
    }

    public function setPath_url_img_thumb_upload_folder($path_url_img_thumb_upload_folder) {
        $this->path_url_img_thumb_upload_folder = $path_url_img_thumb_upload_folder;
    }

    public function getDelete_img_url() {
        return $this->delete_img_url;
    }

    public function setDelete_img_url($delete_img_url) {
        $this->delete_img_url = $delete_img_url;
    }
    
    public function delete()
    {
    	 $delete_id = $this->uri->segment(5);
    	 $this->forms->delete($delete_id);
    	 $file =  $this->uri->segment(4);
    	 $id = $this->uri->segment(6);
    	 $delete = PUBPATH.'resources/assets/img/articles/'.$file;
    	 unlink($delete);
    	 $success_th = PUBPATH.'resources/assets/img/articles/thumbnails/'.$file;
      	 unlink($success_th);	 
      	 $info = new stdClass();
         $info->delete = $delete;
         $info->path = $this->getPath_url_img_upload_folder() . $file;
         $info->file = is_file($this->getPath_img_upload_folder() . $file);
         if (IS_AJAX) {//I don't think it matters if this is set but good for error checking in the console/firebug
            echo json_encode(array($info));
        } else {     //here you will need to decide what you want to show for a successful delete
          	$this->session->set_flashdata('sucess','تم الحذف بنجاح');
          	redirect('admin/dashboard/section_details/'.$id);
        }
    }
    
 	public function delete_photo()
    {
    	 $delete_id = $this->uri->segment(5);
    	 $this->document->delete_photo($delete_id);
    	 $file =  $this->uri->segment(4);
    	 $id = $this->uri->segment(6);
    	 $delete = PUBPATH.'resources/assets/img/articles/'.$file;
    	 unlink($delete);
    	 $success_th = PUBPATH.'resources/assets/img/articles/thumbnails/'.$file;
      	 unlink($success_th);	 
      	 $info = new stdClass();
         $info->delete = $delete;
         $info->path = $this->getPath_url_img_upload_folder() . $file;
         $info->file = is_file($this->getPath_img_upload_folder() . $file);
         if (IS_AJAX) {//I don't think it matters if this is set but good for error checking in the console/firebug
            echo json_encode(array($info));
        } else {     //here you will need to decide what you want to show for a successful delete
          	$this->session->set_flashdata('sucess','تم الحذف بنجاح');
          	redirect('admin/estates/details/'.$id);
        }
    }
    
	public function delete_document()
    {
    	 $delete_id = $this->uri->segment(5);
    	 $this->document->delete($delete_id);
    	 $file =  $this->uri->segment(4);
    	 $id = $this->uri->segment(6);
    	 $delete = PUBPATH.'resources/assets/img/articles/'.$file;
    	 unlink($delete);
    	 $success_th = PUBPATH.'resources/assets/img/articles/thumbnails/'.$file;
      	 unlink($success_th);	 
      	 $info = new stdClass();
         $info->delete = $delete;
         $info->path = $this->getPath_url_img_upload_folder() . $file;
         $info->file = is_file($this->getPath_img_upload_folder() . $file);
         if (IS_AJAX) {//I don't think it matters if this is set but good for error checking in the console/firebug
            echo json_encode(array($info));
        } else {     //here you will need to decide what you want to show for a successful delete
          	$this->session->set_flashdata('sucess','تم الحذف بنجاح');
          	redirect('admin/estates/details/'.$id);
        }
    }
    
	public function estate_delete($id)
    {
    	
    		$pictures  = $this->document->get_by_pic($id);
			$documents = $this->document->get_by_id($id);
			if(is_array($pictures) or is_array($documents))
			{
				 $file =  $pictures[0]['file_name'];
				 $delete = PUBPATH.'resources/assets/img/articles/'.$pictures[0]['file_name'];
		    	 unlink($delete);
		    	 $success_th = PUBPATH.'resources/assets/img/articles/thumbnails/'.$pictures[0]['file_name'];
		      	 unlink($success_th);
		      	 $this->document->delete_photo($id);
		      	 $info = new stdClass();
		         $info->delete = $delete;
		         $info->path = $this->getPath_url_img_upload_folder() . $file;
		         $info->file = is_file($this->getPath_img_upload_folder() . $file);
			}
			if(is_array($documents))
			{
				$file =  $pictures[0]['file_name'];
				 $delete = PUBPATH.'resources/assets/img/articles/'.$documents[0]['file_name'];
		    	 unlink($delete);
		    	 $success_th = PUBPATH.'resources/assets/img/articles/thumbnails/'.$documents[0]['file_name'];
		      	 unlink($success_th);
		      	 $this->document->delete($id);
		      	 $info = new stdClass();
		         $info->delete = $delete;
		         $info->path = $this->getPath_url_img_upload_folder() . $file;
		         $info->file = is_file($this->getPath_img_upload_folder() . $file);
			}
			
			//$this->estate->delete($id);
		}
		
		
}

