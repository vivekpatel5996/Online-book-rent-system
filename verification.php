<?php
  session_start();
  $temp=0;
  $con=new mysqli("127.0.0.1","root","","brs");
  if($con->connect_error){echo "connection failed";}
if(isset($_POST["hlogin"]))
{    
  
   $username=$_POST["uname"];
   $password=$_POST["pwd"];
   $captcha=$_POST["captcha"];

  
    $query="select * from user";
    $result=$con->query($query);
    if($result->num_rows>0)
    {

        while($row=$result->fetch_assoc())
        {
           
            $un=$row["username"];
            $pd=$row["password"];
            
            
            
            if($un==$username)
            {
                $temp=1;
                if($pd==$password)
                {
                    if($captcha==$_SESSION["captcha"])
                    {    
                     if(isset($_POST["remember"]))
                     {
                        setcookie('username',$un,time()+3600);
                        setcookie('password',$pd,time()+3600);
                     }
                     
                     $_SESSION["username"]=$un;
                     header("Location:HomePage.php?username=$un");
                    }
                    else
                    {
                        header("Location:LoginPage.php?cap=Invalid Captcha !!");
                    }    
                } 
                else
                {    
                     header("Location:LoginPage.php?msg=Password Is Wrong !!");
                }
                
                
            }
        }
        if($temp!=1)
        {    
          header("Location:LoginPage.php?msg=You Are New User Buddy !!");
        }  
    }        
    
        
      
    
}    
  
     
if(isset($_POST["hsignup"]))
{
    
       $username=$_POST["uname"];
       $password=$_POST["pwd"];
       $email=$_POST["email"];
       $contact=$_POST["contactno"];
       $dob_d=$_POST["date"];
       $dob_m=$_POST["month"];
       $dob_y=$_POST["year"];
       $gender=$_POST["gender"];
       $address=$_POST["address"];
       $query="select * from user";
       $result=$con->query($query);
       
       if($result->num_rows>0)
       {   
          while($row=$result->fetch_assoc())
          {
              $un=$row["username"];
              $emailid=$row["email_id"];
              $contactno=$row["contact_no"];
              if($un==$username || $emailid==$email ||$contact_no==$contact )
              {
                  $temp=1;
                  header("Location:SignUp.php?war=yes");
              }
              
          }
       }  
     if($temp!=1)
     {
           $entry="insert into user(username,password,email_id,contact_no,date,month,year,gender,address) 
                  values('$username','$password','$email','$contact','$dob_d','$dob_m','$dob_y','$gender','$address')"; 
    
           $con->query($entry);
           $_SESSION["username"]=$username;
           header("Location:HomePage.php?un=$username");
     
     }
    
}
                 
                 
                 
                 
             
            
        


?>