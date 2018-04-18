<?php

class Schedule extends CI_controller
{

	var $folder =   "Schedule";
    var $tables =   "tr_schedule2";
    var $pk     =   "id";
    var $title  =   "Schedule";
	
	
		function __construct() 
		{
			parent::__construct(); 
			//$this->load->model('mcrud', 'evencal');
        }
		
		
		function index($nYear=0, $nMonth=0)
		{
			$level = $this->session->userdata('level');
			if ($level == 1 or $level == 2 or $level == 4 ){
			if($nYear==0 || $nMonth==0){
				$sWhere=" WHERE YEAR(t1.sdate)=".date("Y")." AND MONTH(t1.sdate)=".date("m")." ";	//Current Date
				$nYear	= date("Y");
				$nMonth	= date("m");
			}else{
				$sWhere=" WHERE YEAR(t1.sdate)=".$nYear." AND MONTH(t1.sdate)=".$nMonth." ";
			}
			
			$query ="SELECT 
					t1.sdate AS Date,
					GROUP_CONCAT(if(t2.idUser = 2, t1.sdestination, Null)separator ', ') as 'Mr.Tadatoshi Yoshimoto',
					GROUP_CONCAT(if(t2.idUser = 3, t1.sdestination, Null)separator ', ') as 'Mr.Fery Tjandra',
					GROUP_CONCAT(if(t2.idUser = 4, t1.sdestination, Null)separator ', ') as 'Mr.Dally Wijaya',
					GROUP_CONCAT(if(t2.idUser = 5, t1.sdestination, Null)separator ', ') as 'Mr. Ikuhiro Yamaishi',
					GROUP_CONCAT(if(t2.idUser = 6, t1.sdestination, Null)separator ', ') as 'Mr. Kuniaki Nakato',
					GROUP_CONCAT(if(t2.idUser = 7, t1.sdestination, Null)separator ', ') as 'Mr. Noriyuki Uchida',
					GROUP_CONCAT(if(t2.idUser = 8, t1.sdestination, Null)separator ', ') as 'Mr. Masakazu Nakajima',
					GROUP_CONCAT(if(t2.idUser = 9, t1.sdestination, Null)separator ', ') as 'Mr. Seiichi Murakami',
					GROUP_CONCAT(if(t2.idUser = 10, t1.sdestination, Null)separator ', ') as 'Mr. Hiroshi Yabuno',
					GROUP_CONCAT(if(t2.idUser = 11, t1.sdestination, Null)separator ', ') as 'Mr. Yoshito Wakizaka',
					GROUP_CONCAT(if(t2.idUser = 12, t1.sdestination, Null)separator ', ') as 'Mr. T Matsumoto',
					GROUP_CONCAT(if(t2.idUser = 13, t1.sdestination, Null)separator ', ') as 'Mr. Takeshi Yamakado',
					GROUP_CONCAT(if(t2.idUser = 14, t1.sdestination, Null)separator ', ') as 'Mr. Wahju Tulus',
					GROUP_CONCAT(if(t2.idUser = 15, t1.sdestination, Null)separator ', ') as 'Mr. Gandjar W',
					GROUP_CONCAT(if(t2.idUser = 16, t1.sdestination, Null)separator ', ') as 'Mr. Simin W',
					GROUP_CONCAT(if(t2.idUser = 17, t1.sdestination, Null)separator ', ') as 'Mrs. Yanny',
					GROUP_CONCAT(if(t2.idUser = 18, t1.sdestination, Null)separator ', ') as 'Mrs. Rinayani',
					GROUP_CONCAT(if(t2.idUser = 19, t1.sdestination, Null)separator ', ') as 'Mr. Mukiyar',
					GROUP_CONCAT(if(t2.idUser = 20, t1.sdestination, Null)separator ', ') as 'Mr. Alif Cholisana',
					GROUP_CONCAT(if(t2.idUser = 117, t1.sdestination, Null)separator ', ') as 'Mr. Ali Akbar',
				 	GROUP_CONCAT(if(t2.idUser = 21, t1.sdestination, Null)separator ', ') as 'Mr. Adiya Talka Lubis',
					GROUP_CONCAT(if(t2.idUser = 22, t1.sdestination, Null)separator ', ') as 'Mr. Andriansah',
					GROUP_CONCAT(if(t2.idUser = 23, t1.sdestination, Null)separator ', ') as 'Mrs. Endah',
					GROUP_CONCAT(if(t2.idUser = 106, t1.sdestination, Null)separator ', ') as 'Mr. Dindin k',
					GROUP_CONCAT(if(t2.idUser = 107, t1.sdestination, Null)separator ', ') as 'Mr. Dedy Yuliadi',
					GROUP_CONCAT(if(t2.idUser = 108, t1.sdestination, Null)separator ', ') as 'Mr. Supyan',
					GROUP_CONCAT(if(t2.idUser = 24, t1.sdestination, Null)separator ', ') as 'Mr. Prijanto',
					GROUP_CONCAT(if(t2.idUser = 115, t1.sdestination, Null)separator ', ') as 'Mr. Suhanda',
					GROUP_CONCAT(if(t2.idUser = 101, t1.sdestination, Null)separator ', ') as 'Mrs. Syafitri',
					GROUP_CONCAT(if(t2.idUser = 100, t1.sdestination, Null)separator ', ') as 'Mrs. Anita Tresia'
					FROM tr_schedule2 as t1
					JOIN tm_user as t2 ON t2.idUser = t1.idUser
					$sWhere
					Group by t1.sdate
					order by t1.sdate ASC";
			
			$data['record']=  $this->db->query($query)->result_array();
			$data['title']  = $this->title;
			$data['desc']    =   "";
			$data['numcolumn'] = $this->db->query($query)->num_fields();		//Get Count Of Field Column
			$data['list_fieldname'] = $this->db->query($query)->list_fields();	//Get List Fields Name of Table
			$data['nMonth'] = $nMonth;
			$data['nYear'] = $nYear;
			$data['total_days'] = cal_days_in_month(CAL_GREGORIAN,$nMonth,$nYear);
			//$data['total_days'] = ;
			$this->template->load('template', $this->folder.'/view',$data);
			}else{
						$this->session->sess_destroy();
						redirect('auth/login');
			}
		
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
				$tanggal1 =     new datetime($this->input->post('tanggal'));
				$tanggal2 =     new datetime($this->input->post('tanggalto'));
				$level = $this->session->userdata('level');

				if ($tanggal1 < $tanggal2){
					$tanggal = $this->input->post('tanggal');
				}else{
					$tanggal = $this->input->post('tanggalto');
				}
				
				$jmlhhari =     $tanggal1->diff($tanggal2);
				
				for ($i=0;$i<=$jmlhhari->d;$i++){
				
					if ($level == 4 or $level == 1){
						$iduser = $this->input->post('bosnya');
					}else{
						$iduser =   $this->session->userdata('id_users');
					}
					
					$renewalidUser = $this->session->userdata('id_users');
					$date =     $tanggal;
					$desc =     $this->input->post('desti');
					$member =   $this->input->post('att');
					
					
					$data   =   array('idUser'=>$iduser,
									  'sdate'=>$date,
									  'sdestination'=>$desc,
									  'sattendance'=>$member,
									  'renewal_idUser'=>$renewalidUser);
									  
					$this->db->insert($this->tables,$data);
					$newdate = date('Y-m-d', strtotime('+1 days', strtotime($tanggal))); 
					$tanggal = $newdate;
				}
				redirect($this->uri->segment(1));
			}
			else
			{
				$data['title']  = $this->title;
				$data['desc']    =   "";
				$this->template->load('template', $this->folder.'/post',$data);
			}
		}
		
		
}
?>