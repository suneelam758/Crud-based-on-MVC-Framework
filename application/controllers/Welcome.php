<?php
class Welcome extends Controller
{
   
    function __construct()
    {
        parent::__construct();
		Auth::handleLogin();
		
		
    }
    function index()
    {    
		// $this->view->a="hello";
        $this->view->render('index/show');    
    }

   
    function read()
    {
        $login_model = $this->loadModel('Login');
        $data=$login_model->read(); 
		//  echo "<pre>";
        //  print_r($data);
        echo json_encode($data);
    }
    function insert()
    {    
        $this->view->render('index/insert');    
    }
	function edit()
    {    
        $this->view->render('index/edit');    
    }
    function formalldata()
	{
	
		$id=$_POST['id'];
		$login_model = $this->loadModel('Login');
        $data=$login_model->read3($id); 
        echo json_encode($data);
	
	}
	public function update()
	{
		

			//  $id="38";
		// 	$name=$_POST['name'];
		// $email=$_POST['email'];
		// $number=$_POST['number'];
		// $telephone=$_POST['telephone'];
		// $password=$_POST['password'];
   
		$checkbox=$_POST['checkbox'];
		$checkbox1=implode(",",$checkbox);
   
		// $date=$_POST['date'];
		// $month=$_POST['month'];
		// $radio=$_POST['radio'];
		// $range=$_POST['range_input'];
		// $select=$_POST['select_input'];
		// $color=$_POST['color'];
	
			
	
			$data=array(
				'id'=>$_POST['id'],
				'name'=>$_POST['user'],
				'email'=>$_POST['email'],
				'number'=>$_POST['number'],
				'telephone'=>$_POST['telephone'],
				'password'=>$_POST['password'],
				'checkbox'=>$checkbox1,
				'date'=>$_POST['date'],
				'month'=>$_POST['month'],
				'radio'=>$_POST['radio'],
				'range_input'=>$_POST['range_input'],
				'select_input'=>$_POST['select_input'],
				'color'=>$_POST['color']
				
			);
			// echo $id;
			// print_r($id);
			$login_model=$this->loadModel('Login');
			$model=$login_model->updateData($data); 
			echo json_encode($model);
	     }
		  function delete()
		 {
	 
			  $id=$_POST['id'];
			  $login_model = $this->loadModel('Login');
			   $model=$login_model->deleteData($id); 
			  echo json_encode($model);
		 }
    function read1()
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

        $login_model = $this->loadModel('Login');
        $login_model->insertData($data); 
		// echo json_encode($model);
		
    }
// ---------------------signup form-------------
function signup(){
	$name=$_POST['name'];
	$password=$_POST['pass'];
   
		

		$data2=array(
			'name'=>$name,
		
			'password'=>$password
	
		);
print_r($data2);
exit;
        $login_model = $this->loadModel('Login');
        $login_model->signn($data2); 

}

// ---------------------signup form-------------

	function login()
    {
		$user=$_POST['username'];
		$pass=$_POST['password'];
    
       $login_model=$this->loadModel('Login');
       $model=$login_model->checklogin($user,$pass); 
     if($model == true){
	
		 echo json_encode($model);
	 }  
	 else{
		echo false;
	 }


        
    }
	function logout(){
		session_destroy();
		header('location: http://localhost/HRMSGLOBAL2');
		}


}


