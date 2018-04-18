<?php

class Dtschedule extends CI_controller
{

	var $folder =   "Dtschedule";
    var $tables =   "tr_schedule2";
    var $pk     =   "id";
    var $title  =   "Data Schedule";
	
	
		function __construct() 
		{
        parent::__construct(); 
        }
		
		function index()
		{
			$ruserid = $this->session->userdata('id_users');
			$level = $this->session->userdata('level');
			
			$sql ="";
			if ($level == 1 ){
				$sql ="SELECT * FROM tr_schedule2 t1, tm_user m1
						WHERE t1.idUser = m1.idUser";
			}elseif($level == 4){
				$sql = "SELECT * FROM tr_schedule2 t1, tm_user m1
						WHERE t1.idUser = m1.idUser
						AND t1.renewal_idUser = ".$ruserid." order by sdate desc";
			}else{
				$sql = "SELECT * FROM tr_schedule2 t1, tm_user m1
						WHERE t1.idUser = m1.idUser
						AND t1.idUser = ".$ruserid." order by sdate desc";
			}
			
			$query ="$sql";
			$data['record']=  $this->db->query($query)->result();
			$data['title']  = $this->title;
			$data['desc']    =   "";
			$this->template->load('template', $this->folder.'/view',$data);
		//echo "ok";
		}
		
		
		public function edit()
		{
			 if(isset($_POST['submit']))
			{
				$id     = $this->input->post('id');
				$date =     $this->input->post('tanggal');
				$desc =     $this->input->post('desti');
				$att =   $this->input->post('att');
				$level = $this->session->userdata('level');
				
					if ($level == 4 or $level == 1){
						$iduser = $this->input->post('bosnya');
					}else{
						$iduser =   $this->session->userdata('id_users');
					}
				
				$data   =   array(
								  'sdate'=>$date,
							      'sdestination'=>$desc,
								  'sattendance'=>$att,
								  'idUser'=>$iduser
							      );
								  
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