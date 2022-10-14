<?php


class Index extends Controller
{
   
    function __construct() {
            parent::__construct();	
            	// Auth::handleLogin();
    }

    function index()
    {
       
        $this->view->render('login/index');     
        
    }
    function sign(){
		$this->view->render('login/signup');   

	}
    function login()
    {
    //    $username=$_POST['username'];
    //    $password=$_POST['password'];
       $data=array(
            'username'=>$_POST['username'],
            'password'=>$_POST['password']
       );

       $login_model=$this->loadModel('Login');
       $model=$login_model->checklogin($data); 
       echo json_encode($model);
        
    }
}
