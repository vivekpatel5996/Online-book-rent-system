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
	      <div class="container">
		   <div style="margin:20px"><strong><font color="black">To Update a book details and remove a book from database.</font></strong></div>
	      <div class="row">			
				<div class="col-sm-12">
				    <div class="panel">
                       <div class="panel-body">
				              <?php
							 //To Update From Database
                            if(isset($_GET["update"]))
                            {
							  $var1="3month";
							  $var2="6month";
							  $var3="9month";
							  $var4="12month";
                              $up_id=$_GET["update"];
                              $result=$con->query("select * from book where id='$up_id'");
                              $row=$result->fetch_assoc();
							  $result_rent=$con->query("select * from rent where id='$up_id'");
							  $row_rent=$result_rent->fetch_assoc();
                              echo"
                              
							  <form action='' class='form-horizontal' method='POST' id='update' enctype='multipart/form-data'>
                                <div class='form-group'>
                                    <label>Type:</label>
                                    <input type='text' name='type' value='$row[type]'/>
                                </div>
                                <div class='form-group'>
                                    <label>Book Name:</label>
                                    <input type='text' name='bookname' value='$row[name]'/>
                                </div>
                                <div class='form-group'>
                                    <label>Author:</label>
                                    <input type='text' name='author' value='$row[author]'/>
                                </div>
                                <div class='form-group'>
                                    <label>Price:</label>
                                    <input type='text' name='price' value='$row[price]'/>
                                </div>
                                 <div class='form-group'>
                                    <label>Stock:</label>
                                    <input type='text' name='stock' value='$row[stock]'/>
                                </div>
                                
                                <div class='form-group'>
                                    <label>Select Image:</label>
                                    <input type='file' name='ui' value='$row[url]'/>
                                </div>
								
								<div class='form-group'>
                                    <label>For 3 month:</label>
                                    <input type='text' name='r3' value='$row_rent[$var1]'/>
		     				    </div>
                                <div class='form-group'>
                                    <label>For 6 month:</label>
                                    <input type='text' name='r6' value='$row_rent[$var2]'/>
		     				    </div>
                                <div class='form-group'>
                                    <label>For 9 month:</label>
                                    <input type='text' name='r9' value='$row_rent[$var3]'/>
		     				    </div>
                                <div class='form-group'>
                                    <label>For 12 month:</label>
                                    <input type='text' name='r12' value='$row_rent[$var4]'/>
		     				    </div>
                                <div class='form-group'>
                                    <input type='hidden' name='hiupdate' value='$up_id'/>
                                     <input type='submit' value='update' class='btn btn-danger' style='margin-left:300px;'/>
                                </div>
       
                                </form>";
                            }
							
						    if(isset($_POST["hiupdate"]))
                            {
                              
                               $id=$_POST["hiupdate"];
                               $t=$_POST["type"];
                               $n=$_POST["bookname"];
                               $a=$_POST["author"];
                               $p=$_POST["price"];
							   $s=$_POST["stock"];
							   $rent_3=$_POST["r3"];
							   $rent_6=$_POST["r6"];
							   $rent_9=$_POST["r9"];
							   $rent_12=$_POST["r12"];
                              
                                $update_book="UPDATE book SET type='$t',name='$n',author='$a',price='$p',stock='$s' WHERE id='$id'";
								$update_rent="UPDATE rent SET $var1='$rent_3',$var2='$rent_6',$var3='$rent_9',$var4='$rent_12' WHERE id='$id'";
                               if( $con->query($update_book) && $con->query($update_rent))
							   {
							         echo "<div><font color=green style='text-align:center'><strong>Book details is updated.</strong></font></div>";
							   }
							   else
							   {
                                       echo $con->error."<br>".$update_book."<br>".$update_rent;
							   }
                              
                            }
                        
                           
                          ?>
						  
						  
						  <table class=" table table-bordered">
                    <thead>
                    <tr>
                        <td>No.</td>
                        <td>BookId</td>
                        <td>Category</td>
                        <td>BookName</td>
                        <td>Author</td>
                        <td>Price</td>
                        
                        <td>Update</td>
                        <td>Remove</td>
                            
                    <tr>
                    </thead>
                    <tbody>
                        
                   <?php
                   
                   
                   
                         //To Delete From Database
                          if(isset($_GET["delete"]))
                          {
                                  $del_id=$_GET["delete"];
                              //    echo $del_id;
                                  $con->query("delete from book where id='$del_id'");
                          }
                          
                              
                        $i=1;
                        $select="select * from book";
                        $result=$con->query($select);
                       
                        while($row=$result->fetch_assoc())
                        {
                           echo 
                            "
                                   <tr>
                                        <td>$i</td>
                                        <td>$row[id]</td>
                                        <td>$row[type]</td> 
                                        <td>$row[name]</td>
                                        <td>$row[author]</td>
                                        <td>$row[price]</td>
                        
                                        <td><a href=update_remove.php?update=$row[id]><button class='btn btn-default' id='upd_btn' data-target='#update' data-toggle='collapse'>Update</button></a></td>    
                                        <td><a href=update_remove.php?delete=$row[id]><button class='btn btn-default'>Remove</button></a></td>  
                                         
                                   </tr>


                            ";
                         $i++;   
                        }
                        $x=28;
                        
                        $today=date("d-m-Y",strtotime("today"));
                        $due=date("d-m-Y",strtotime("+2 months"));
                        $i="UPDATE rentedbook SET startdate='$today',duedate='$due' WHERE id='$x'";
                        $con->query($i);
                        
                        $pri="select * from rentedbook where id='$x'";
                        $r=$con->query($pri);
                        $row=$r->fetch_assoc();
                        echo $row["startdate"];
                        echo $row["duedate"];
                        $d1=date_create($today);
                        $d2=date_create($due);
                        $diff=date_diff($d1,$d2);
                        $di=$diff->format("%R%a");
                         
                        
                   ?>
                    <tbody>   
                   
            
          </table>
				        </div>		  
				     </div>		  
			    </div>
            </div>
	    </div>		
	</body>
	</html>