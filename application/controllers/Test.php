<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller {

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
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	

	public function __construct()
	{
       parent::__construct();
       $this->load->helper(array('form', 'url'));
       $this->load->library('form_validation');
       $this->load->model('publicaciones_model');
 
    }

	public function index()
	{

		$this->form_validation->set_rules('fecha', 'Fecha', 'required');

		if ($this->form_validation->run() == FALSE)
        {
                $this->load->view('plantilla/head');
				$this->load->view('plantilla/formulario');
				$this->load->view('plantilla/footer');
        }
        else
        {		
        	
        	$config['upload_path']          = '/uploads/files/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 100;
            $config['max_width']            = 1024;
            $config['max_height']           = 768;
    		$fecha = $this->input->post('fecha');


    		$this->publicaciones_model->insertar_publicacion($fecha);
    		$idPublicacion = $this->db->insert_id();
    		
    		if (!empty($_FILES['images']['name'][0])) {

    			$this->upload_files($_FILES['images'],$idPublicacion);
    			
                
            }                   

		}
	}

	public function upload_files($files,$idPublicacion)
	{
		$config = array(
	        'upload_path'   => __DIR__ . '/../../uploads/files/',
	        'allowed_types' => 'jpg|gif|png|PNG',
	        'overwrite'     => 1,                       
	    );

	    $this->load->library('upload', $config);

	    foreach ($files['name'] as $key => $image) {

	    	$_FILES['images']['name']= $files['name'][$key];
	        $_FILES['images']['type']= $files['type'][$key];
	        $_FILES['images']['tmp_name']= $files['tmp_name'][$key];
	        $_FILES['images']['error']= $files['error'][$key];
	        $_FILES['images']['size']= $files['size'][$key];

	        $config['file_name'] = md5($files['name'][$key]);

	        $this->upload->initialize($config);

	        if ($this->upload->do_upload('images')) {
	        	
	            $dataImagen = $this->upload->data();

	        	$this->publicaciones_model->insertar_imagen($idPublicacion, $dataImagen['file_name']);

	        } else {
	        	print($this->upload->display_errors());
	            return false;
	        }
	    }

	    return true;
	}
}