<?php
   session_start();
   if(!empty($_GET['user']) && !empty($_GET['pwd']))
     {
        echo "Fill the username and password";
     }
   else
  {
   $n=$_POST['user'];
   $p=$_POST['pwd'];
   $condition=array("user"=>$n,"pwd"=>$p);
   $con=mysql_connect("localhost","root","");
   $m = new MongoClient();
   $db = $m->project;
   $collection = $db->login_details;
   $cursor = $collection->find( $condition );
   if($cursor->count()>0) {
		$_SESSION['user'] = $n;
		$_SESSION['pwd']= $p;
		header('Location: Registereduser.php');
   }
   else{
          echo"Invalid user";
         }
   } 
?>
