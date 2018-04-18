<?php

class Dtevent extends CI_controller
{

	var $folder =   "Dtevent";
    var $tables =   "tr_schedule";
    var $pk     =   "id";
    var $title  =   "Data Event";
	
	
		function __construct() 
		{
        parent::__construct(); 
        }
		
		function index()
		{
			$ruserid = $this->session->userdata('id_users');
			$level = $this->session->userdata('level');
			if ($level == 1){
				$where ="WHERE t1.idUser = t2.idUser
						ORDER BY t1.dDate ASC";
			}else{
				$where = "WHERE t1.idUser = ".$ruserid." AND t1.idUser = t2.idUser order by dDate desc";
			}
			//var_dump($ruserid);exit;
			$query ="SELECT    t1.id,
							   t1.dDate,
							   t1.sDesc,
							   t1.swaktu,
							   t1.swaktuEnd,
							   t1.slocation,
							   t1.plant,
							   t1.sMember ,
							   t2.sName AS author
							FROM tr_schedule t1, tm_user t2
							$where";
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
				$desc =     $this->input->post('desc');
				$waktu =   $this->input->post('waktu');
				$waktu2 =   $this->input->post('waktu2');
				$room =   $this->input->post('room');
				$plant = $this->input->post('plant');
				$member =   $this->input->post('member');

				//$rusername = $this->session->userdata('username');
				
				//var_dump($username);
				
				$data   =   array(
								  'dDate'=>$date,
							      'sDesc'=>$desc,
								  'swaktu'=>$waktu,
								  'swaktuEnd'=>$waktu2,
								  'slocation'=>$room,
								  'plant'=>$plant,
								  'sMember'=>$member
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