<?php

class Event extends CI_controller
{

	var $folder =   "Event";
    var $tables =   "tr_schedule";
    var $pk     =   "id";
    var $title  =   "Event";
	
	
		function __construct() 
		{
        parent::__construct(); 
        }
		
		function index($nYear=0, $nMonth=0)
		{
			if($nYear==0 || $nMonth==0){
				$sWhere=" WHERE YEAR(tm.dDate)=".date("Y")." AND MONTH(tm.dDate)=".date("m")." ";	//Current Date
				$nYear	= date("Y");
				$nMonth	= date("m");
			}else{
				$sWhere=" WHERE YEAR(tm.dDate)=".$nYear." AND MONTH(tm.dDate)=".$nMonth." ";
			}
			 

			$query = "SELECT   t1.dDate,
							   t1.sDesc AS eventin,
							   t1.swaktu AS mulaiin,
							   t1.swaktuEnd AS selesaiin,
							   t1.slocation AS tempatin,
							   t1.plant AS plantin,
							   t1.sMember AS picin,
							   t2.sName AS authorin
							FROM tr_schedule t1, tm_user t2
							WHERE t1.nTypeCD = 1 AND t1.idUser = t2.idUser
							ORDER BY t1.dDate ASC";

			$query2 = "SELECT  t1.dDate,
							   t1.sDesc AS eventex,
							   t1.swaktu AS mulaiex,
							   t1.swaktuEnd AS selesaiex,
							   t1.slocation AS tempatex,
							   t1.plant AS plantex,
							   t1.sMember AS picex,
							   t2.sName AS authorex
							FROM tr_schedule t1, tm_user t2
							WHERE t1.nTypeCD = 2 AND t1.idUser = t2.idUser
							ORDER BY t1.dDate ASC";
					
			$data['record']=  $this->db->query($query)->result_array();
			$data['record2']=  $this->db->query($query2)->result_array(); 
			$data['title']  = $this->title;
			$data['desc']    =   "";
			$data['nMonth'] = $nMonth;
			$data['nYear'] = $nYear;
			$data['total_days'] = cal_days_in_month(CAL_GREGORIAN,$nMonth,$nYear);
			$this->template->load('template', $this->folder.'/view',$data);
		    //var_dump( $this->db->mysql_num($data['record2'])); exit;
		}
		
		function PrevMonth ($nYear, $nMonth){
			$NextDate	= new DateTime(''.$nYear.'-'.$nMonth.'-1'); 
			$NextDate->modify('-1 month');
			$nYear 	= $NextDate->format('Y'); 
			$nMonth = $NextDate->format('m');
			$this->index($nYear, $nMonth);
		}

		
		function NextMonth ($nYear, $nMonth){
			$NextDate	= new DateTime(''.$nYear.'-'.$nMonth.'-1'); 
			$NextDate->modify('+1 month');
			$nYear 	= $NextDate->format('Y'); 
			$nMonth = $NextDate->format('m');
			$this->index($nYear, $nMonth);
		}
		
		Public function post()
		{
			if(isset($_POST['submit']))
			{
				$iduser = $this->session->userdata('id_users');
				$type = $this->input->post('type');
				$desc =     $this->input->post('desc');
				$waktu   =   $this->input->post('waktu');
				$waktuend   =   $this->input->post('waktu2');
				$room = $this->input->post('room');
				
				/*if ($room == 1){
				}else if($room == 1){
					$roomtext = 'Ruang Meeting 1';
				}else if($room == 2){
					$roomtext = 'Ruang Meeting 2';
				}else if($room == 3){
					$roomtext = 'Ruang Meeting 3';
				}else{
					$roomtext = 'Lobby';
				}*/
				
				$plant = $this->input->post('plant');
				
				$pic =   $this->input->post('pic');
				$date= $this->input->post('tanggal');
				
				
				$rip = $_SERVER['REMOTE_ADDR'];
				$rdate = date('d-m-y h:i:s');
				$rusername = $this->session->userdata('username');
				
				$data   =   array('idUser'=>$iduser,
								  'ntypecd'=>$type,
								  'dDate'=>$date,
								  'swaktu'=>$waktu,
								  'swaktuEnd'=>$waktuend,
							      'sDesc'=>$desc,
								  'slocation'=>$room,
								  'plant'=>$plant,
							      'sMember'=>$pic,
								  'sRenewalIP'=>$rip,
								  'sRenewalName'=>$rusername,
								  'dRenewalDate'=>$rdate);
								  
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
				$type  = 2;
				$date =     $this->input->post('tanggal');
				$desc =     $this->input->post('desc');
				$member =   $this->input->post('member');
				$waktu   =   $this->input->post('waktu');
				$waktuend   =   $this->input->post('waktu2');
				$lokasi = $this->input->post('lokasi');
				
				$rip = $_SERVER['REMOTE_ADDR'];
				$rdate = date('d-m-y h:i:s');
				$rusername = $this->session->userdata('username');
				
				$data   =   array('ntypecd'=>$type,
								  'dDate'=>$date,
								  'swaktu'=>$waktu,
								  'swaktuEnd'=>$waktuend,
							      'sDesc'=>$desc,
								  'slocation'=>$lokasi,
							      'sMember'=>$member,
								  'sRenewalIP'=>$rip,
								  'sRenewalName'=>$rusername,
								  'dRenewalDate'=>$rdate);
								  
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