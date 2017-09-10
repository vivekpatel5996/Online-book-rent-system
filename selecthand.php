<?php
include("class.php");
     session_start();
     $con=new mysqli("127.0.0.1","root","","brs");
     if(!$con){echo "connection failed !";}
      if(!isset($_SESSION["username"]))
      {
           header("Location:LoginPage.php?homepage=You have to Log in First!");

      }
     if(isset($_GET["id"]))
     { 
         $id=$_GET["id"];
         $select="select * from book where id='$id'";
         $res=$con->query($select);
         $row=$res->fetch_assoc();
         $b=$row["name"];
         $t=$row["type"];
         $p=$row["price"];
         
     }
     
?>

    <head>
           <meta charset="utf-8">
             <meta name="viewport" content="width=device-width, initial-scale=1">
             <link rel="stylesheet" href="/BookRentSystem/css/bootstrap.min.css">
    </head>
    <style>
        body
        {
            background-image:url("bg.jpg");
            
        }
      
        .col-sm-4
        {
            margin-left:100px;
        }
        .form-horizontal
        {
            padding:10px;
        }
        label:not(#cat)
        {
            float:left;
            text-align:right;
            width:30%;
        }
         #war
         {
                 margin-top:30px;
                 margin-left:0px;
                 
         }
         #choice
         {
                 width:50%;
                 
                 margin-left:10px;
         }
         #last
          {
                margin-left:100px;
          }
           .container
                 {
                      
                       float:right;
                       padding-top:10px;
                       padding-left:15px;
                       width:calc(100%-200px);
                      // left-margin:200px;
                       top-margin:0px;
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
                     font-weight:bold;
                     font-family:monospace;
                     
                 }
                  li h4
                 {
                     margin:0;
                     display:box;
                     padding:5px;
                     text-align:center;
                    /// font-style:italic;
                     //font-family:"Comic Sans MS", cursive, sans-serif;
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
                      left-margin:0;
                      
                     // overflow-y:scroll;
                      //overflow-x:hidden;
                      
                 }
                   .panel-footer,.panel-heading
                 {
                     font-family:Cursive;
                     background-color: #0066ff;
                     color:#ffffff;
                     
                 }
                 .active{
                     background-color:#0066ff;
                     color:#ffffff;
                     font-weight:bold;
                 }
                 #wel{
                    
                     margin:5px 0px 5px 1180px;
                     color:#ffffff;    
                     text-align:right;
                 }
                   li h4
                 {
                     margin:0;
                     display:box;
                     padding:5px;
                     text-align:center;
                    /// font-style:italic;
                     //font-family:"Comic Sans MS", cursive, sans-serif;
                     border:2px solid black;
                 }
                 .active{
                     background-color:#0066ff;
                     color:#ffffff;
                     font-weight:bold;
                 }
                 
             
    </style>
    <body>
        
                    
        
        <?php
                 
                   if(isset($_POST["hid"]))
				   {
                        if(isset($_SESSION["username"]))
                        {   
                          
							  $book_id=$_POST["hid"];
							 $renttime=$_POST["rent_time"];
							 $getrent="select ".$renttime."month from rent where id='$book_id'";
							 if($res_getrent=$con->query($getrent))
							 {
							     $row_getrent=$res_getrent->fetch_assoc();
								 echo $row_getrent[$renttime."month"]."hey !";
								 $rent_percentage=$row_getrent[$renttime."month"];
							 }
							 else
							 {
							     echo $con->error."<br>".$getrent;
							 }
							 //$row_getrent=$res_getrent->fetch_assoc();
							// $rent=$row["".$renttime."month"];
						//	 echo "rent is $renttime";
                             $temp=0;
                            
                             $select="select * from book where id='$book_id'";
                             $resu=$con->query($select);
							 $inc=0;
                              while($row=$resu->fetch_assoc())
                              {
                               
                                      
                                      $temp=1;
                                      $bi=$row["id"];                                    
                                
                                   if(!isset($_SESSION["cart"]))
                                   {
                                        $_SESSION["cart"]=array();
                                   } 
     
                                   if(!isset($_SESSION["count"]))
                                   {
                                      $_SESSION["count"]=1;
                                   }
                                   else 
                                   {
                                        $_SESSION["count"]++;
                                
                                   }
                            
                                    //print_r($_SESSION["cart"]);
                                    $u=$_SESSION["username"];
                                    $price=$row["price"];
                                    $bookname=$row["name"];
								$stock=$row["stock"];
									echo $price,$rent_percentage;
                                    $rent=($rent_percentage/100)*$price;
                                    echo "rent is $rent....";
								   $k=1;
								  
                                    
								  
								  
								  //To make cartobject and push it in session cart array.
								   
								   $co=new Cartobject($bi,$bookname,$price,$rent,$renttime);
								   array_push($_SESSION["cart"],$co);
								   echo "cart array  ";
								   print_r($_SESSION["cart"]);
								  
                                   
                                    
                                    break;
                                
                                
                              }
                              if($temp!=1)
                              {
                                  //header("Location:selecthand.php?sorry=Sorry,Not Available !");
                              }
                              
                        }
                                 
                   } 
                   
                   /*function array_push_assoc($array, $key, $value){
                           $array[$key] = $value;
                           return $array;
                                   }*/
               ?>
            
          <?php if(isset($_SESSION["username"])){echo "<div id=wel><strong style='text-transform:uppercase'>WELCOME ".$_SESSION["username"]."</strong></div>";}           
                         ?>
            <div class="nav navbar-default">
                <div class="container-fluid">
                    <ul class="nav navbar-nav">
                        <li><a href="HomePage.php">HOME</a></li>
                        <li><a href="AboutUs.php">About Us</a></li>
        
                      
                        
                        
                        
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="viewcart.php"><span class="glyphicon glyphicon-shopping-cart"></span> CART<span class="badge"><?php if(isset($_SESSION["count"])){echo $_SESSION["count"];}else{ echo "0";} ?></span></a></li>
                        
                         <?php if(!isset($_SESSION["username"]))
                            {
                                echo" <li><a href=SignUp.php><span class=glyphicon glyphicon-user></span> Sign Up</a></li>
                                 <li><a href=LoginPage.php><span class=glyphicon glyphicon-log-in></span> Log in</a></li> ";
                             }
                         ?> 
                        <li><a href="">
                         <?php
                                if(isset($_SESSION["username"])){echo $_SESSION["username"];}
                         ?>
                        </a></li>
                        <li>
                            <a href="LoginPage.php?log=log">Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        <div id="main">
      <div class="category"> 
          
        <ul id="ul">
            <li><h4><label id="cat">CATEGORY</label></h4></li>
            <li><a href="" class="active">Home</a></li>
            <li><a href="HomePage.php?t=Biography">Biography</a></li>
            <li><a href="HomePage.php?t=Fiction">Fiction</a></li>
            <li><a href="HomePage.php?t=NonFiction">Non Fiction</a></li>
            <li><a href="HomePage.php?t=Thriller">Thriller</a></li>
            
        </ul>
      </div>  
            
       
       
            
             <div class="container">
            <div class="col-sm-4">
              <div class="panel panel-sucess">  
                  <div class="panel-body">
                      
                      
                  <form action="" class="form-horizontal" method="POST">
                      <?php if(isset($temp)){ if($temp==0){echo "<div id=war><strong><font color=red>Sorry Not Availabel !</font></strong></div>";}}
                          if(isset($temp)) {                              
                              if($temp==1){echo "<font color=green><strong>Congrats ! You have Rented Your Book.</strong></font>";}
    
                               }?>
                   
                       <?php
                             //After Click On RENT         
                            if(isset($id))
                           { 
                           echo "<div class='form-group'>
                                 <label>BookName:</label>
                                 <font>".$b."</font>
                                 </div>
                                 
                                 <div class='form-group'>
                                 <label>Type:</label>
                                 <font>".$t."</font>
                                 </div>
                                 
                                 <div class='form-group'>
                                 <label>Price:</label>
                                 <font>Rs.".$p."</font>
                                 </div>
                   
                   <div class=form-group>
                      <label>Select Rent time:</label>
                      <select name=rent_time id=choice>
                        <option value='3'>3 month</option>
                        <option value='6'>6 month</option>
                        <option value='9'>9 month</option>
                        <option value='12'>12 month</option>
                        
                      </select>
                   </div>
                  
                   
                       
                     <div class='form-group' id='last'>
                         <input type='hidden' name='hid' value=".$id."/>
                        <input class='btn btn-primary' type='submit' value='RENT'>
                     </div>";
                           }
                           ?>
                  </form>
                  </div>        
              </div>      
            </div>             
        </div>

            </div>

                     
                   
                           
                           <!--For Quntity
                             
                             /*foreach($_SESSION["cart"] as $i=>$bi)
                             {
                                 
                                 if($book_id==$bi)
                                 {
                                     $quntity++;
                                     
                                 }
                             } 
                             if(!isset($_SESSION["count"]))
                             {
                                 $_SESSION["count"]=1;
                             }
                             else 
                             {
                                 if($quntity==1)
                                 {    
                                   $_SESSION["count"]++;
                                 }  
                             }
                             
                             array_push($_SESSION["cart"],$book_id);
                             
                             $select="SELECT * FROM book WHERE id='$book_id'";
                             $res=$con->query($select);
                             $row=$res->fetch_assoc();
                             
                             //To Insert Rented Book In database
                             $u=$_SESSION["username"];
                             $bookname=$row["name"];
                             $rentontime=6-$row["rentcount"];
                             $price=$row["price"];
                             
                             switch($rentontime)
                             {
                                case 1:
                                              $rent=$price;
                                              break;
                                    
                                case 2:
                                               $rent=0.8*$price;
                                               break;
                                           
                                case 3:   
                                               $rent=0.6*$price;
                                               break;        
                                
                                case 4:
                                               $rent=0.4*$price;
                                               break;        

                                case 5:       
                                               $rent=0.2*$price;
                                               break;
                                       
                                
                                
                              }
                          
                         
                          if($quntity==1)
                          {   
                             $totalrent=$price;
                             $insert="INSERT into rentedbook(username,bookid,bookname,rentontime,price,rent,quntity,totalrent)
                                      values('$u','$book_id','$bookname','$rentontime','$price','$rent','$quntity','$totalrent')";
                             $con->query($insert);
                          }
                          else
                          {
                             //To Get last totalrent 
                              $get_tr="SELECT * FROM rentedbook WHERE bookid='$book_id'";
                              $get=$con->query($get_tr);
                              $tr=$get->fetch_assoc();
                              $totalrent=$tr["totalrent"];
                              $newtr=$totalrent+$rent;
                             
                                  
                              $update="UPDATE rentedbook SET quntity='$quntity',rentontime='$rentontime',totalrent='$newtr' WHERE bookid='$book_id'";
                              $con->query($update);
                          }
                             //TO decrease stock and rentcount
                             
                             $stock=$row["stock"];
                             $stock--;
                             $rentcount=$row["rentcount"];
                             $rentcount--;
                             $change="UPDATE book SET stock='$stock',rentcount='$rentcount' WHERE id='$book_id'";
                             $con->query($change);
                                 
                         }
                         else
                         {
                              header("Location:LoginPage.php?homepage=You have to Log in First!");
                         }
                   }    
                   -->
            
                     
       

    </body>
</html>