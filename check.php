<?php
   session_start();
   
   if(!isset($_SESSION['username'])){
   	header('location:login.php');
   }
$con=mysqli_connect('localhost','root');
mysqli_select_db($con,'quizdb');
   if(isset($_POST['submit']))
   {
       
       if(!empty($_POST['quizcheck']  ) );{
           $count=count($_POST['quizcheck']);
           echo "Out of 5,you have selected" .$count.  "options";
           $result= 0 ;
           $i=1 ;
           $selected =$_POST['quizcheck'];
           print_r($selected);
           $q= "select * from questions";
           $query= mysqli_query($con,$q);
           while ($rows=mysqli_fetch_array($query))
           {
             print_r($rows['ansid']) ;  
            $checked = $rows['ansid'] == $selected[$i];
                if($checked){
                    $result++;
                }
               $i++;
           } 
           echo"<br> your total score is ".$result;
           
       }
   }
?>
   