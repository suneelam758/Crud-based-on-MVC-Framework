<?php


class LoginModel
{
   
    public function __construct(Database $db)
    {
        $this->db = $db;

    }
    
	
	public function read()
    { 
      $select = 'Select * from allinput';
      $query=$this->db->prepare($select);
      $query->execute();
      $result= $query->fetchAll();
      if ($result)
       {
        return $result;
      }
	  }
    public function read3($id)
    { 
      $select = 'Select * from allinput where id= ?';
      $query=$this->db->prepare($select);
      $query->execute(array( $id));
      $result= $query->fetch();
      if ($result)
       {
        return $result;
      }
	  }
    public function updateData($data)
    { 
      $id=$data['id'];
      $name=$data['name'];
      $email=$data['email'];
      $number=$data['number'];
      $telephone=$data['telephone'];
      $password=$data['password'];
      $checkbox=$data['checkbox'];
      $date=$data['date'];
      $month=$data['month'];
      $radio=$data['radio'];
      $range=$data['range_input'];
      $select=$data['select_input'];
      $color=$data['color'];
     
      

		
    $sql = "UPDATE `allinput` SET `name`='$name',`email`='$email',`number`='$number',`telephone`='$telephone',
    `password`='$password',`checkbox`='$checkbox',`date`='$date',`month`='$month',`radio`='$radio',
    `range_input`='$range',`select_input`='$select',`color`='$color' WHERE id ='$id'";
    $stmt= $this->db->prepare($sql);

    $stmt->execute(); 

     return true;
    }

      public function insertData($data)
      { 
      
        $name=$data['name'];
        $email=$data['email'];
        $number=$data['number'];
        $telephone=$data['telephone'];
        $password=$data['password'];
       
        $checkbox=$data['checkbox'];
       
        $date=$data['date'];
        $month=$data['month'];
        $radio=$data['radio'];
        $range=$data['range_input'];
        $select=$data['select_input'];
        $color=$data['color'];
    
        
        $sql = "INSERT INTO `allinput`(`name`,`email`,`number`,`telephone`,`password`,`checkbox`,`date`,`month`,`radio`,`range_input`,`select_input`,`color`)
               VALUES (:name,:email,:number,:telephone,:password,:checkbox,:date,:month,:radio,:range_input,:select_input,:color)";

              
        $stmt= $this->db->prepare($sql);
    
        $data1=array(
          ':name'=>$name,
          ':email'=>$email,
          ':number'=>$number,
          ':telephone'=>$telephone,
          ':password'=>$password,
          ':checkbox'=>$checkbox,
          ':date'=>$date,
          ':month'=>$month,
          ':radio'=>$radio,
          ':range_input'=>$range,
          ':select_input'=>$select,
          ':color'=>$color
          
        );
      $stmt->execute( $data1); 
  
      // return true;
    
  }

  public function signn($data2)
  { 
  
    $name=$data2['name'];
   
    $password=$data2['password'];
    $sqls = "INSERT INTO `users`(`Username`, `Password`) VALUES (':name',':password')";       
    $stmt= $this->db->prepare($sqls);

    $data3=array(
      ':name'=>$name,
     
      ':password'=>$password
      
    );
  $stmt->execute( $data3); 



}
  
  public function deleteData($id)
  { 
  $sql = "DELETE FROM `allinput` WHERE id= ?";
  $stmt= $this->db->prepare($sql);
  $stmt->execute( array( $id)); 

  return true;

}
public function checklogin($user,$pass)
{ 


  $select = "SELECT * FROM `users` WHERE (`Username`=? && `Password`=?)";
  $query=$this->db->prepare($select);

  // $data1=array(
  //   ':name'=>$user,
  //   ':pass'=>$pass
    
  // );
  $query->execute(array($user,$pass));
  $fetch=$query -> fetch();
if($query -> rowCount() > 0)
{
session::init();
  $_SESSION['user']=$fetch->Username;
  // echo $_SESSION['user'];
    return true;
  }
  else{
    return false;
  }
}


}
