<?php

class Jabatan extends CI_controller
{

	var $folder =   "Jabatan";
    var $tables =   "tm_jabatan";
    var $pk     =   "jabatanID";
    var $title  =   "Position";
	
	
		function __construct() 
		{
        parent::__construct(); 
        }
		
		function index()
		{
			$level = $this->session->userdata('level');
			if ($level == 1){
			$query ="SELECT  * FROM tm_jabatan";
			$data['record']=  $this->db->query($query)->result();
			//$data['record']=  $this->db->get($this->tables)->result();
			$data['title']  = $this->title;
			$data['desc']    =   "";
			$this->template->load('template', $this->folder.'/view',$data);
			}else{
				        $this->session->sess_destroy();
						redirect('auth/login');
			}
		//echo "ok";
		}
		
	
		Public function post()
		{
			if(isset($_POST['submit']))
			{
				$jabatancd  =        $this->input->post('jabatancd');
				$jabatan =     $this->input->post('jabatan');

				$data   =   	array(  'jabatancd'=>$jabatancd,
										'jabatan'=>$jabatan);
								  
				$this->db->insert($this->tables,$data);
				redirect($this->uri->segment(1));
			}
			else
			{
				$data['title']  = $this->title;
				$data['desc']    =   "";
				$this->template->load('template', $this->folder.'/post',$data);
			}
		}
		
		public function edit()
		{
			 if(isset($_POST['submit']))
			{
				$id     = $this->input->post('id');
				$jabatancd  =        $this->input->post('jabatancd');
				$jabatan =     $this->input->post('jabatan');

					$data   =   array('jabatancd'=>$jabatancd,
									  'jabatan'=>$jabatan);
				$this->mcrud->update($this->tables,$data, $this->pk,$id);
				redirect($this->uri->segment(1));
			}
			else
			{
				$data['title']  = $this->title;
				$data['desc']    =   "";
				$id          =  $this->uri->segment(3);
				$data['r']   =  $this->mcrud->getByID($this->tables,  $this->pk,$id)->row_array();
				$this->template->load('template', $this->folder.'/edit',$data);
			}
		}
		

		
	function delete()
    {
        $id     =  $this->uri->segment(3);
        $chekid = $this->db->get_where($this->tables,array($this->pk=>$id));
       // if($chekid>0)
        //{
            $this->mcrud->delete($this->tables,$this->pk,$this->uri->segment(3));
       // }
        redirect($this->uri->segment(1));
    }
		
}
?>