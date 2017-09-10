<?php
    session_start();
     
	
    /*if(isset($_GET["un"]))  
    {
        $_SESSSION["username"]=$_GET["un"];
    }
    if(isset($_GET["username"]))
    {
        $_SESSION["username"]=$_GET["username"];
    }*/
        
    
     $con=new mysqli("127.0.0.1","root","","brs");
     if($con->connect_error){ echo "connection failed";}
	 $categories=array();
	 $select_category="select distinct type from book";
	 $result_category=$con->query($select_category);
	 while($row_category=$result_category->fetch_assoc())
	 {
	   array_push($categories,$row_category["type"]);
	 }
	 //print_r($categories);
	 
	 foreach($categories as $cat)
	 {
	    //To create dynamic variables.
	    ${"create".$cat}="create view ".$cat."view as select * from book where type='$cat'";
	/*	if($con->query(${"create".$cat}))
		   echo "done";
		else
		    echo $con->error;
  	*/	
		//while($row=$result->fetch_assoc())
		//echo $row["type"],$row["price"];
		//print_r(${"create".$cat}); 
	 }
?>


    <!DOCTYPE html>
    <html lang="en">
    <head>
             <meta charset="utf-8">
             <meta name="viewport" content="width=device-width, initial-scale=1">
             <link rel="stylesheet" href="/BookRentSystem/css/bootstrap.min.css">
          <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
             <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>-->
    </head>
             <style>
                body
             {
                  background-image:url("bg.jpg");
                 //background-color:#c1ffff;
             }
             
                 #main
                 {
                     display:inline-block;
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
                 .col-sm-3
                 {
                      
                     padding:15px;
                    
                     margin-bottom:1px;
                 }
                 
                 img
                 {
                      width:120px;
                      height:150px;
                 }
                 
                 .panel-footer,.panel-heading
                 {
                     font-family:Cursive;
                     background-color:#0099ff;
                     color:#ffffff;
                     
                 }
                 .panel-body
                 {
                     font-family:Tahoma, Geneva, sans-serif;    
                 
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
                      height:1000px;
                      background-color:#cccccc;
                      left-margin:0;
                      
					  //overflow-y:scroll;
                      //overflow-x:hidden;
                      
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
                 
                     
                 
                 
                 
             </style>
    </head>
<body>
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
			<li><a href="HomePage.php?pageno=1" class="active">Home</a></li>
			<?php
			     foreach($categories as $cat)
				 {
				    echo "<li><a href='HomePage.php?t=$cat&pageno=1'>$cat</a></li>";
				 }
			?>
            <!--<li><a href="HomePage.php?pageno=1" class="active">Home</a></li>
            <li><a href="HomePage.php?t=Biography&pageno=1">Biography</a></li>
            <li><a href="HomePage.php?t=Fiction&pageno=1">Fiction</a></li>
            <li><a href="HomePage.php?t=NonFiction&pageno=1">Non Fiction</a></li>
            <li><a href="HomePage.php?t=Thriller&pageno=1">Thriller</a></li>
            -->
        </ul>
      </div>   
    
    <div class="container">
	    <div class="row text-center">
         <?php
                //$count=0;
               
                 
       
             
                   
                        //$id=$row["id"];
                        if(isset($_GET["t"]) && isset($_GET["pageno"]))
                        {
						     
						    $pageno=$_GET["pageno"];
							$ty=$_GET["t"];
							$range=$pageno*10-10;
                            $select_t="select * from $ty"."view LIMIT $range,10";
                            $result_t=$con->query($select_t);                           
						    /*if($con->query($select_t))
							  echo "succes t query";
                            else
                              echo $con->error ."<br>".$select_t;							
							*/
						     
							
							while($row=$result_t->fetch_assoc())
                            {
                              echo"
                                 <div class='col-sm-3'> 
                                  <div class=panel panel-primary>
                                   <div class=panel-heading>$row[name]</div>
                                    <div class=panel-body><img src=$row[url] /></div>
                                    <div class=panel-body><b>Author</b>:$row[author]<br> 
                                     <b>Price</b>:Rs.$row[price]<br>
                                     </div>    
                                   <div class=panel-footer><a href=selecthand.php?id=$row[id]><button type='button' class='btn btn-danger' >RENT</button></a></div>    
                                  </div>
                                 </div> ";
                              
                            }
							
							
       					    
                
                        }
                        else if((isset($_GET["pageno"]) && !isset($_GET["t"])) || !isset($_GET["pageno"]))
                        {
						    if(!isset($_GET["pageno"]))
							{
							   $pageno=1;
							}
							else
							{
						       $pageno=$_GET["pageno"];
						    }
							$range=$pageno*10-10;
							$select="select * from book LIMIT $range,10";
                            $result=$con->query($select);                          
 						   while($row=$result->fetch_assoc())
						   {
                             echo"
                             <div class='col-sm-3'> 
                              <div class=panel panel-primary>
                               <div class=panel-heading>$row[name]</div>
                                <div class=panel-body><img src=$row[url] /></div>
                                   <div class=panel-body>
                                   <font face=verdana color=green><b>$row[type]</b></font><br>
                                   <b>Author</b>:$row[author]<br>
                                   <b>Price</b>:Rs.$row[price]<br>
                                   
                                    </div>    
                                    <div class=panel-footer><a href=selecthand.php?id=$row[id]><button type='button' class='btn btn-danger'>RENT</button></a></div> 
                                </div>
                                </div> ";
                             //$count++;
                            }
                           
                  
                            							
                        }
                    
               
               
          			   
             ?>
              
	     </div>
		     <?php 
			 
			      //For pagination
			      if(isset($_GET["t"]) && isset($_GET["pageno"]))
                  {
				    $t=$_GET["t"];
				    $total_books="select count(*) from $t"."view";
				    $result=$con->query($total_books);
                   
					//print_r($result->fetch_assoc());
                    $row=$result->fetch_assoc();
					$tb=$row["count(*)"];//total books
					if($tb%10==0)
					{
					    $tp=$tb/10;//total pages
					}
					else
					{
					    $tp=$tb/10;
						$tp++;
					}
				       /* echo"
						        <ul class='pagination'>
									<li><a href='HomePage.php?pageno=1&t=$t'>1</a></li>
									<li><a href='HomePage.php?pageno=2&t=$t'>2</a></li>
								    <li><a href='HomePage.php?pageno=3&t=$t'>3</a></li>
									<li><a href='HomePage.php?pageno=4&t=$t'>4</a></li>
									<li><a href='HomePage.php?pageno=5&t=$t'>5</a></li>
							    </ul>
							  ";*/
					if($tp>=2)
                    { 					
					  	echo" <ul class='pagination'>";	  
                        for($i=1;$i<=$tp;$i++)
                        {
						  echo "<li><li><a href='HomePage.php?pageno=$i&t=$t'>$i</a></li></li>";
						}
						echo " </ul>";
				    }
				  }
				  if((isset($_GET["pageno"]) && !isset($_GET["t"])) || !isset($_GET["pageno"]))
				  {
				           echo"
							      <ul class='pagination'>
									<li><a href='HomePage.php?pageno=1'>1</a></li>
									<li><a href='HomePage.php?pageno=2'>2</a></li>
									<li><a href='HomePage.php?pageno=3'>3</a></li>
					              </ul>
							  ";
				  }
				  
				  
			 ?>
    </div>   
</div>
    
	
</body>    
</html>

 

+