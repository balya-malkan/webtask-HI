<?php

class Activity extends CI_controller
{

	var $folder =   "Activity";
    var $tables =   "tr_schedule";
    var $pk     =   "id";
    var $title  =   "Activity";
	
	
		function __construct() 
		{
        parent::__construct(); 
        }
		
		function index()
		{
			$query ="SELECT * FROM tr_schedule WHERE ntypeCD = 3 order by ddate desc";
			$data['record']=  $this->db->query($query)->result();
			$data['title']  = $this->title;
			$data['desc']    =   "";
			$this->template->load('template', $this->folder.'/view',$data);
		//echo "ok";
		}
		
		Public function post()
		{
			if(isset($_POST['submit']))
			{
				$type  = 3;
				$date =     $this->input->post('tanggal');
				$desc =     $this->input->post('desc');
				$member =   $this->input->post('member');
				$waktu   =   $this->input->post('waktu');
				$waktuend   =   $this->input->post('waktu2');
				$lokasi = $this->input->post('lokasi');
				
				$rip = $_SERVER['REMOTE_ADDR'];
				$rdate = date("d/m/Y h:i:s");
				$rusername = $this->session->userdata('username');
				
				$data   =   array('ntypecd'=>$type,
								  'dDate'=>$date,
								  'swaktu'=>$waktu,
								  'swaktuEnd'=>$waktuend,
							      'sDesc'=>$desc,
							      'sMember'=>$member,
								  'slocation'=>$lokasi,
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
				$type  = 3;
				$date =     $this->input->post('tanggal');
				$desc =     $this->input->post('desc');
				$member =   $this->input->post('member');
				$waktu   =   $this->input->post('waktu');
				$waktuend   =   $this->input->post('waktu2');
				$lokasi = $this->input->post('lokasi');
				
				$rip = $_SERVER['REMOTE_ADDR'];
				$rdate = date('d-m-Y h:i:s');
				$rusername = $this->session->userdata('username');
				
				$data   =   array('ntypecd'=>$type,
								  'dDate'=>$date,
								  'swaktu'=>$waktu,
								  'swaktuEnd'=>$waktuend,
							      'sDesc'=>$desc,
							      'sMember'=>$member,
								  'slocation'=>$lokasi,
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