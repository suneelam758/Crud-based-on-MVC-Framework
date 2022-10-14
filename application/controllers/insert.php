<?php
class Insert extends Controller
{
   
    function __construct()
    {
        parent::__construct();
		
    }
    function insert()
    {    
        $this->view->render('index/insert');    
    }
	

   
    function read()
    {   	
		$name=$_POST['name'];
		$email=$_POST['email'];
		$number=$_POST['number'];
		$telephone=$_POST['telephone'];
		$password=$_POST['password'];
   
		$checkbox=$_POST['checkbox'];
		$checkbox1=implode(",",$checkbox);
   
		$date=$_POST['date'];
		$month=$_POST['month'];
		$radio=$_POST['radio'];
		$range=$_POST['range_input'];
		$select=$_POST['select_input'];
		$color=$_POST['color'];

		

		$data=array(
			'name'=>$name,
			'email'=>$email,
			'number'=>$number,
			'telephone'=>$telephone,
			'password'=>$password,
			'checkbox'=>$checkbox1,
			'date'=>$date,
			'month'=>$month,
			'radio'=>$radio,
			'range_input'=>$range,
			'select_input'=>$select,
			'color'=>$color
			
		);

        // print_r($data); exit;
        $login_model = $this->loadModel('Insert');
        $model=$login_model->insertData($data); 
		 echo json_encode($model);
    }
}


