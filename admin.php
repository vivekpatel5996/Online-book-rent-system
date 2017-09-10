<?php
      session_start();
      $con=new mysqli("127.0.0.1","root","","brs");
      if(!$con){echo "connection failed";}
      
	              
                  
      ?>
<html>
    <head>
        
             <meta charset="utf-8">
             <meta name="viewport" content="width=device-width, initial-scale=1">
             <link rel="stylesheet" href="/BookRentSystem/css/bootstrap.min.css">
             <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
             <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    </head>
    <style>
        .container
        {
            margin:50px;
        }
        label
        {
            text-align: right;
            float:left;
            width:30%;
        }
        input
        {
            margin-left:15px;
            float:left;
            width:20%;
        }
    
        #buttons button
        {
           margin:10px 150px;
                       
        }
        tr
        {
                     
            margin:25px 25px;
                     
        }
        td
        {
          padding:15px 50px;
                     
        }
        th
        {
             padding:10px 50px;
                     
        }
    </style>
    <body>
    <script>
           
            /*$(document).ready(function(){            
                 //   alert("in");
                $("#ins_btn").click(function(){
                       if($("#insert").is(':visible'))
                       {
					     //slideToggle()
                           $("#insert").show();
                       }
                       else
                       {
					    if($("#update").is(':visible'))
                        {
                           $("#update").hide();
                        }
					       //$("#update").slideToggle();
                           $("#insert").show();
					   }
                     
                    
                });
            });
              
            $(document).ready(function(){            
                 //   alert("in");
                $("#upd_btn").click(function(){
                       if($("#update").is(':visible'))
                       {
                           $("#update").hide();
                       }
                       else
                       {
					        if($("#insert").is(':visible'))
                            {
							   //slideToggle()
                               $("#insert").toggle();
                            }
                            //slideDown()
                           $("#update").show();
                       }
                    
                    
                });
            });*/
    </script>
   
    
        <?php
              if(isset($_POST["insert"]))
              {
                  $temp=1;
                  
                  $type=$_POST["type"];
                  $bookname=$_POST["bookname"];
                  $author=$_POST["author"];
                  $price=$_POST["price"];
                  $stock=$_POST["stock"];
				  $rent_3=$_POST["r3"];
				  $rent_6=$_POST["r6"];
				  $rent_9=$_POST["r9"];
				  $rent_12=$_POST["r12"];
                 //$image=$_POST["uploadimage"];
                  
                  
				  
				  
                  $target_dir=$type."/";
				  //Check whether category folder on server,if is not it will be created.
				  if(!file_exists($type))
				  {
                     mkdir($type);				  
				  }
				  $target_file=$target_dir.basename($_FILES["ui"]["name"]);
                  $imagepath="/BookRentSystem/".$target_file;
                  //echo $imagepath;
                  $imagefiletype=pathinfo($target_file,PATHINFO_EXTENSION);
                  if($imagefiletype != "jpg" && $imagefiletype != "png" && $imagefiletype != "jpeg"
                          && $imagefiletype != "gif" ) 
				  {
                       $temp=0;
                  }
                /*  if(file_exists($target_file))
                  {
                      $temp=0;
                  }*/
                  if($temp!=0)
                  {
                      
                      move_uploaded_file($_FILES["ui"]["tmp_name"],$target_file);
                      
					  $insert_book="insert into book(type,name,author,price,stock,url) values('$type','$bookname','$author','$price','$stock','$imagepath')";
                      $con->query($insert_book);
					  $re=$con->query("select id from book where name='$bookname'");
					  $row=$re->fetch_assoc();
					  $bi=$row["id"];
					 
					  $insert_rent="insert into rent(id,3month,6month,9month,12month) values('$bi','$rent_3','$rent_6','$rent_9','$rent_12')";
					  if($con->query($insert_rent))
					  {
					    echo "<font color=green align=center><strong>your book is added.</strong></font>";
                      }
					  else
					  {
					      echo $con->error."<br>".$insert_book."<br>".$insert_rent;
					  }
                    
                  }
              }
              
              
                 
              
            
              
        
        ?>
        <div id="buttons">
            <div style="margin:20px"><strong><font color="black">To Insert a new Book.</font></strong></div>
            <!--<button type="button" class="btn btn-danger" data-target="#insert" data-toggle="collapse" id="ins_btn">Insert</button>
            --->
            
        </div>
        
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="panel">
                        <div class="panel-body">
                           
                            
                            <!--To Insert Into Database-->
                           <!--<form action="" class="form-horizontal" method="POST" id="insert" style="display:none"  enctype="multipart/form-data">-->
                            <form action="" class="form-horizontal" method="POST" id="insert"   enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>Type:</label>
                                    <input type="text" name="type"/>
                                </div>
                                <div class="form-group">
                                    <label>Book Name:</label>
                                    <input type="text" name="bookname"/>
                                </div>
                                <div class="form-group">
                                    <label>Author:</label>
                                    <input type="text" name="author"/>
                                </div>
                                <div class="form-group">
                                    <label>Price:</label>
                                    <input type="text" name="price"/>
                                </div>
                                <div class="form-group">
                                    <label>Stock:</label>
                                    <input type="text" name="stock"/>
                                </div>
                                <div class="form-group">
                                    <label>Select Image:</label>
                                    <input type="file" name="ui"/>
                                </div>
								<div class="form-group">
								     <label color="green">Enter rent percentage of price.</label>
								</div>
                                <div class="form-group">
                                    <label>For 3 month:</label>
                                    <input type="text" name="r3"/>
		     				    </div>
                                <div class="form-group">
                                    <label>For 6 month:</label>
                                    <input type="text" name="r6"/>
		     				    </div>
                                <div class="form-group">
                                    <label>For 9 month:</label>
                                    <input type="text" name="r9"/>
		     				    </div>
                                <div class="form-group">
                                    <label>For 12 month:</label>
                                    <input type="text" name="r12"/>
		     				    </div>
       
								
								<div class="form-group">
                                    <input type="hidden" name="insert" value="insert"/>
                                    <input type="submit" value="insert" class="btn btn-danger" style="margin-left:300px;"/>
                                </div>
								
                            </form>
							
                        </div>
                    </div>  
                </div>
            </div>
           <!-- <div class="row">			
				<div class="col-sm-12">
				    <div class="panel">
                       <div class="panel-body">
				       
				        </div>		  
				     </div>		  
			    </div>
            </div>-->
            <div class="row">
                <div class="col-sm-12">
                  
         </div>
        </div>
    </div>                  
    </body>
</html>

