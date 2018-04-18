<?php

class Home extends CI_controller
{

	var $folder =   "Home";
    var $tables =   "tr_schedule2";
    var $pk     =   "id";
    var $title  =   "Home";
	
	
		function __construct() 
		{
			
			parent::__construct(); 
        }
		
		
		function index()
		{
			
			$this->template->load('template', $this->folder.'/view','');
		
		}
		

		
		
		
		
		
}
?>