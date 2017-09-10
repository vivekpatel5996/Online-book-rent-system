<?php
    include("class.php");
     session_start();
     //print_r($_SESSION["cart"]);
     $con=new mysqli("127.0.0.1","root","","brs");
     if(!$con){echo "connection failed";}
?>
<html>
    <head>
        <title>placeorder</title>
        <meta charset="utf-8">
         <meta name="viewport" content="width=device-width, initial-scale=1">
         <link rel="stylesheet" href="/BookRentSystem/css/bootstrap.min.css">
		<!-- <script src="/BookRentSystem/js/bootstrap.min.js"></script>
	     <script src="/BookRentSystem/js/jquery.min.js"></script>-->
		 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


        <!-- <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">-->
    </head>
    <style>
             body
             {
                  background-image:url("bg.jpg");
                 //background-color:#c1ffff;
             }
             table{
                 margin-top:20px;
                 background-color:#ffffff;
             }
         .container
                 {
                      
                       float:right;
                       padding-top:10px;
                       padding-left:15px;
                       width:calc(100%-200px);
                      // left-margin:200px;
                       margin-top:10px;
                 }
                 .category
                 {
                     
                     float:left;
                     top-margin:2px;
                     left-margin:0px;
                     width:150px;
                 }
                  .category  li a
                 {
                     display:block;
                     color:#000000;
                     text-decoration:none;
                     padding:4px;
                     text-align:center;
                     font-size:17px;
                     font-family:monospace;
                     font-weight:bold;
                     
                     
                 }
                 li h4{
                     margin:0;
                     display:box;
                     padding:5px;
                     text-align:center;
                     //font-style:italic;
                    // font-family:"Comic Sans MS", cursive, sans-serif;
                     border:2px solid black;
                 }
                 li a:hover
                 {
                     background-color:#0066ff;
                     color:#ffffff;
                     font-weight:bold;
                 }
               
                .category ul
                 {
                      border:1px solid black;
                      list-style-type:none;
                      margin-top:25px;
                      padding:0;
                      width:150px;
                      height:500px;
                      background-color:#cccccc;
                      margin-left:0;
                     // overflow-y:scroll;
                      //overflow-x:hidden;
                      
                 }
                 tr
                 {
                     
                     margin:25px 25px;
                     
                 }
                 td{
                     padding:15px 50px;
                     
                 }
                 th{
                     padding:10px 50px;
                     
                 }
				 .form-horizontal{
				  
				  padding:15px;
				  
				 }
				 .form-group{
				 left-padding:5px;
				 }
				
    </style>
  <body>
            <?php
                     //To Remove from cart
                    if(isset($_GET["bookid"]))
                    {
                        $bookid=$_GET["bookid"];
                       
                       
                           
                            //To Renove from sessio array of cart.    
                            $del=0;
							foreach($_SESSION["cart"] as $cartitem)
                            {
	                           					
                              if($cartitem->c_bookid==$bookid)
                              {
							    unset($_SESSION["cart"][$del]);
                                $_SESSION["count"]--;
								
                               }
							   $del++;
                            }
							print_r($_SESSION["cart"]);
                        
                                               
                       
                    }
            ?>
      
      
            <div class="nav navbar-default">
                <div class="container-fluid">
                    <ul class="nav navbar-nav">
                        <li><a href="HomePage.php">HOME</a></li>
                        <li><a href="AboutUs.php">About Us</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="">
                         <?php 
                            if(isset($_SESSION["username"])) { echo $_SESSION["username"];}
                         ?>
                        </a></li>
                         <li>
                            <?php if(isset($_SESSION["username"]))
                            {
                               echo "<a href=LoginPage.php?log=log>Logout</a>";
                            }?>
                        </li>
                        
                    </ul>
                </div>
            </div>
        <div id="main">
         <div class="category"> 
          
           <ul id="ul">
            <li><h4><label>CATEGORY</label></h4></li>
            <li><a href="HomePage.php" class="active">Home</a></li>
            <li><a href="HomePage.php?t=Biography">Biography</a></li>
            <li><a href="HomePage.php?t=Fiction">Fiction</a></li>
            <li><a href="HomePage.php?t=NonFiction">Non Fiction</a></li>
            <li><a href="HomePage.php?t=Thriller">Thriller</a></li>
            
           </ul>
         </div>
		 <div class="container">
            <div class="col-sm-5">
              <div class="panel panel-sucess">  
                  <div class="panel-body">
				    <form action="" class="form-horizontal" method="POST">
                      <?php if(isset($_POST["cf"]))
					        {
         					  
							  echo "<font color=green><strong>Congrats! your order has been confirmed, will be delivered in 3 or 4 days.</strong></font>";
							 						  
							  $u=$_SESSION["username"];
							  $add=$_POST["address"];
							  $pin=$_POST["pincode"];
							  $contact=$_POST["contactno"];
							  $k=1;
							  foreach($_SESSION["cart"] as $citem)
							  {
							  
							  //To insert book in rentedbook table
                                    $insert="insert into rentedbook(username,bookid,bookname,startdate,renttime,price,rent,quntity,totalrent,address,pincode,contactno)
                                      values('".$_SESSION["username"]."','$citem->c_bookid','$citem->c_bookname',CURDATE(),'$citem->c_renttime',
									  '$citem->c_bookprice','$citem->c_bookrent','$k','$citem->c_bookrent','$add','$pin','$contact')";
                                   if( $con->query($insert))
								   echo "successfully inserted.";
								   else
								   echo $insert ."<br>". $con->error;
                                  
								   //To decrese stock
                                   
                                    $change="UPDATE book SET stock=stock-1 WHERE id='$citem->c_bookid' and stock>0";
                                    $con->query($change);
						      }
							   unset($_SESSION["cart"]);
                               $_SESSION["count"]=0;	
						    }
                            if(isset($temp)) 
							{                              
                               if($temp==1)
								{
								echo "<div id=war><strong><font color=red>Sorry Not Availabel !</font></strong></div>";  
							    }
    
                            }?>
                   
                       <?php
                             //After Click On RENT         
                         
                           echo "<div class='form-group'>
                                 <label>Address:</label>
                                 <textarea rows='4' cols='50' name='address'>
										Enter your address here..</textarea>
                                 </div>
								 
								 <div class='form-group'>
                                 <label>Pincode:</label>
                                 <input type='text' name='pincode' pattern='[0-9]{6}' title='Enter valid pincode!'/>
                                 </div>
                                 
                                 <div class='form-group'>
                                 <label>Contact No:</label>
                                 <input type='text' name='contactno' pattern='[0-9]{10}' title='Enter 10 Digits !'/>
                                 </div>
                                 
                                 <div class='form-group'>
                                 <label>Payable amount:</label>
                                 <font>Rs.".$_SESSION["ta"]."</font>
                                 </div>
								 
								 <div class='form-group'>
								   <input type='hidden' value='confirm' name='cf'/>
								   <input type='submit' class='btn btn-success' value='confirm order'/>
								 </div>
								 
								 
								 ";
                           
						         
						    
                           ?>
                  </form>
                  
				  
				  </div>
			  </div>
		    </div>
		 </div>
		 
		 </div>
		 