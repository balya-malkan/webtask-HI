<?php

class User extends CI_controller
{

	var $folder =   "User";
    var $tables =   "tm_user";
    var $pk     =   "idUser";
    var $title  =   "User";
	
	
		function __construct() 
		{
        parent::__construct(); 
        }
		
		function index()
		{
			$level = $this->session->userdata('level');
			if ($level == 1){
			$query ="SELECT  m.idUser,m.sName,mj.jabatan,m.nActive,mm.snamadivisi as sDivisi,m.dLastLogin 	
					 FROM   tm_user m,tm_divisi mm,tm_jabatan mj
					 WHERE m.nkddivisi = mm.nkddivisi and m.jabatanID = mj.jabatanID";
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
		
	function level($level)
    {
        if($level==1)
        {
            return 'Admin';
        }
        else
        {
            return 'User';
        }
      
    }
		Public function post()
		{
			if(isset($_POST['submit']))
			{
				$nama  =        $this->input->post('nama');
				$username =     $this->input->post('userlogin');
				$password =     $this->input->post('password');
				$divisi =       $this->input->post('divisi');
				$jabatan = 		$this->input->post('jabatan');
				//var_dump($jabatan);exit;
				$level   =      $this->input->post('level');
				$status = 		$this->input->post('status');
				$data   =   	array('sName'=>$nama,
								  'sUsername'=>$username,
							      'spassword'=>md5($password),
							      'nkddivisi'=>$divisi,
								  'nLevel'=>$level,
								  'nActive'=>$status,
								  'jabatanID'=>$jabatan);
								  
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
				$nama  =        $this->input->post('nama');
				$username =     $this->input->post('userlogin');
				$password =     $this->input->post('password');
				$divisi =       $this->input->post('divisi');
				$level   =      $this->input->post('level');
				$status = 		$this->input->post('status');
				$jabatan = $this->input->post('jabatan');
				if ($password == '')
				{
					$data   =   array('sName'=>$nama,
								  'sUsername'=>$username,
							      'nkddivisi'=>$divisi,
								  'nLevel'=>$level,
								  'nActive'=>$status,
								  'jabatanID'=>$jabatan);
				}else
				{
					$data   =   array('sName'=>$nama,
								  'sUsername'=>$username,
							      'spassword'=>md5($password),
							      'nkddivisi'=>$divisi,
								  'nLevel'=>$level,
								  'nActive'=>$status,
								  'jabatanID'=>$jabatan);
				}
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
		
		function profile()
		{
        $id=  $this->session->userdata('id_users');
        if(isset($_POST['submit']))
        {
            $username=  $this->input->post('username');
            $password=  $this->input->post('password');
            $data    =  array('sUsername'=>$username,'spassword'=>  md5($password));
            $this->mcrud->update($this->tables,$data, $this->pk,$id);
            redirect('home/index');
        }
        else
        {
            $data['title']=  $this->title;
            $data['r']   =  $this->mcrud->getByID($this->tables,  $this->pk,$id)->row_array();
            $this->template->load('template', $this->folder.'/profile',$data);
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