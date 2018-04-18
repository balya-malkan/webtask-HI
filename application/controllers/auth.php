<?php
class auth extends CI_Controller
{
    
    
    function __construct() {
        parent::__construct();
        $this->load->helper('captcha','string');
    }
    
    
    function index()
    {
        redirect('login');
    }
    
    function login()
    {
        if(isset($_POST['submit']))
        {
            $username   =  $this->input->post('username');
            $password   =  $this->input->post('password');
            $capth        = strtoupper( $this->input->post('kode_aman'));
            $login =  $this->db->get_where('tm_user',array('susername'=>$username,'spassword'=>  md5($password)));
            if($login->num_rows()>0 and $this->session->userdata('mycaptcha')==$capth)
            {
                $r=  $login->row_array();
                $data=array('id_users'=>$r['idUser'],
                            'level'=>$r['nLevel'],
                            'sess_login'=>  substr(waktu(), 0,10),
                            'keterangan'=>$r['sRemaks'],
                            'username'=>$username);
                $this->session->set_userdata($data);
                
				$this->mcrud->update('tm_user',array('dlastlogin'=>  waktu()), 'susername',$username);
                redirect('home');
				//echo "login sukses";
                
            }
            else
            {
                redirect('auth/login');
            }
        }
        else
        {
            
             $vals = array(
                'img_path'	 => './captcha/',
                'img_url'	 => base_url().'captcha/',
                'img_width'	 => '280',
                'img_height' => 50,
                'word'	=> strtoupper(random_string('alnum', 3)),
                'border' => 0, 
                'expiration' => 7200
            );
 
            // create captcha image
            $cap = create_captcha($vals);
 
            // store image html code in a variable
            $data['image'] = $cap['image'];
 
            // store the captcha word in a session
           $this->session->set_userdata('mycaptcha', $cap['word']);
           $this->load->view('login',$data);
        }
    }
    
    function logout()
    {
        $this->session->sess_destroy();
        redirect('auth/login');
    }
    
    function logoutpmb()
    {
        $this->session->sess_destroy();
        redirect('publik/loginpsb');
    }
}