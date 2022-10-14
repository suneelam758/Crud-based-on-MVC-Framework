<?php


class InsertModel
{
   
    public function __construct(Database $db)
    {
        $this->db = $db;
    }
    
	
	public function insertData($data)
    { 
    $sql = "INSERT INTO `allinput`(`name`,`email`,`number`,`telephone`,`password`,`checkbox`,`date`,`month`,`radio`,`range_input`,`select_input`,`color`)
                        VALUES (':name',':email',':numbar',':telephone',':password',':checkbox',':date',':month',':radio',':',':range_input',':select_input',':color')";
    $stmt= $this->db->prepare($sql);
    $stmt->execute(array( $data)); 

    return true;
  
}
}