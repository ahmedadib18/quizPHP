<?php
   session_start();
   
   if(!isset($_SESSION['username'])){
   	header('location:login.php');
   }
$con=mysqli_connect('localhost','root');
mysqli_select_db($con,'quizdb');
if($con){
    
    echo"success";
}
    
   
   
  
   
   ?>
<!DOCTYPE html>
<html>
   <head>
      <title></title>
       <link rel="stylesheet" type="text/css" href="bootstrap.css">
     
   </head>
   <body>
       <div class="container"></div>
       <h1 class="text-center text-success">WELCOME <?php echo $_SESSION['username'];?></h1>
        <form action="check.php" method="post">
            <br>
        <?php
            for($i=1 ; $i<6 ; $i++ )
                        
          {
        $q= " select * from questions where qid=$i   " ;
            
        $query= mysqli_query($con,$q); 
        while($rows=mysqli_fetch_array($query))
            
        {
            ?>
        
            <h4><?php echo $rows['questions'];?></h4>
        
            <?php
             $q= " select * from answers where ansid= $i " ;
            
                     $query= mysqli_query($con,$q); 
        while($rows=mysqli_fetch_array($query))
            
        {
            ?>
            <input type="radio" name="quizcheck[<?php echo $rows['ansid']?>];"value="<?php     echo $rows['aid']; ?>">
            <?php echo $rows['answers'];?>
            
            
       
       
      <?php
        }
        }
        }
            ?>
        
        <br>
       
        <input type="submit" name="submit" value="Submit">
       </form>
        
      
       
    <a href="logout.php">  Logout </a>  

   
        
       
    </body>
</html>
