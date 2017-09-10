<?php
    include("class.php");
     session_start();
     //print_r($_SESSION["cart"]);
     $con=new mysqli("127.0.0.1","root","","brs");
     if(!$con){echo "connection failed";}
?>
<html>
    <head>
        <title>view cart</title>
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
               		   
		   
               <table class="tabel table-hover" boder='1'>
                   <thead>
                       <tr>
                           <th>No.</th>
                           <th>BookName</th>
                           <th>Price</th>
                           <th>Rent</th>
                           <th>Renttime</th>
                           
                          
                       </tr> 
                   </thead>
                   <tbody>
                         <?php
                                if(isset($_SESSION["username"]))
                                {
                                 $u=$_SESSION["username"];
                                
                                 $i=1;
                                }
                                if(isset($_SESSION["cart"]) && !empty($_SESSION["cart"]))
                                {    
								
                                    foreach($_SESSION["cart"] as $item)
								    {
								    
									
									    echo"<tr>
                                              <td>$i</td>
                                              <td>$item->c_bookname</td>
                                              <td>$item->c_bookprice</td>    
                                              <td>$item->c_bookrent</td>
                                              <td>$item->c_renttime month</td>
                                              
                                              
                                                  
                                              <td><a href=viewcart.php?bookid=$item->c_bookid><button type='btn'' class='btn btn-danger'>Remove</button></a></td>
                                              </tr>    
                                             ";
                                          if(!isset($totalamount))
                                         {
                                             $totalamount=$item->c_bookrent;
											 //echo $totalamount;
                                         }
                                         else 
                                         {
                                             $totalamount=$totalamount+$item->c_bookrent;
											 //echo $totalamount;
                                         }
                                        $i++;
                                     
                                    }
								    if(isset($totalamount))
									{
                                    echo "<tr><td colspan=3></td>
                                          <td colspan=3><font color=red>Total Amount:
                                          Rs.".$totalamount."</font></td>
									      <td><a href='placeorder.php'><button type='button' class='btn btn-success'>Place order</button></a></td>
                                          </tr>";
								    }
									
							    }
                                else
                                {
                                 
                                        echo "<tr><td>Your Cart is Empty !</td></tr>";
                                
								
                                }
								if(isset($totalamount))
								{
								$_SESSION["ta"]=$totalamount;
								}
                         ?>
                   </tbody>
               </table> 
    
           </div>           
                 
               
            
        </div>        
   </body>
</html>