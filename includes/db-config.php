<?php
header("Content-Type: text/html; charset=ISO-8859-1");

 //database.php  
 class Databases{  
      public $con;  
      public function __construct()  
      {  
           $this->con = mysqli_connect("localhost", "harbourdash", "Iaa4oubsCnitLVrH", "harbour1");  
           if(!$this->con)  
           {  
                echo 'Database Connection Error ' . mysqli_connect_error($this->con);  
           }  
      }  
      
      public function select($table_name, $cat_id)  
      {  
           $array = array();  
           $query = "SELECT * FROM ".$table_name." WHERE status = 1 and cat_id =".$cat_id;  
           $result = mysqli_query($this->con, $query);  
           while($row = mysqli_fetch_assoc($result))  
           {  
                $array[] = $row;  
           }  
           return $array;  
      }  

      public function select_single($table_name, $id)  
      {  
           $array = array();  
           $query = "SELECT * FROM ".$table_name." where id=".$id;  
           $result = mysqli_query($this->con, $query);  
           $row = mysqli_fetch_assoc($result);
           //print_r($row);exit;
           return $row;  
      }  

      function create_slug($string){
          $slug=preg_replace('/[^A-Za-z0-9-]+/', '-', $string);
          return strtolower($slug);
       }


       public function caseStudiesFormSub($casePostData){
          $array = array();  
          $name  = $casePostData['name'];
          $companyName  = $casePostData['companyName'];
          $mobile  = $casePostData['mobile'];
          $email  = $casePostData['email'];
          $post_id  = $casePostData['post_id'];
          $ipaddress  = $casePostData['ipaddress'];

          $query = "INSERT INTO `caseStudiesPdfForm` (`name`, `companyName`, `mobile`, `email`, `post_id`,`ipaddress`) 
                    VALUES ('$name', '$companyName', '$mobile', '$email', '$post_id', '$ipaddress')";  
                    
          $result = mysqli_query($this->con, $query); 
          //print_r($casePostData);exit;
          
          $query2 = "SELECT * FROM posts where id=".$post_id;  
          $result2 = mysqli_query($this->con, $query2);  
          $row = mysqli_fetch_assoc($result2);
          return $row; 
       }

       public function getcaseStudiesPdf($case_id){
          $array = array();  
          $query = "SELECT * FROM posts where id=".$case_id;  
          $result = mysqli_query($this->con, $query);  
          $row = mysqli_fetch_assoc($result);
          //print_r($row);exit;
          return $row;  
       }
 }  
 ?>  
