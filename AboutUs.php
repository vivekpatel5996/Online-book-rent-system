.<?php
   include("info.php");
?>
<html>
    <head>
        <title>About Us</title>
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
             
        h4{
            margin-left:630px;
            color:#66ffff;
            font-family: "Comic Sans MS", cursive, sans-serif;
        }
        #m h4{
              margin-left:630px;
              color:#66ffff;
              font-family: "Comic Sans MS", cursive, sans-serif;
              
        }
        img
        {
            width:170px;
            height:150px;
            border-radius:100px;
            border-color: #000000;
        }
        
        .data
        {
              display:inline-block;
              margin-left:50px;
        }
        .panel{
            border:2px solid black;
        }
        li a:hover{
            background-color:#0066ff;
            color:#ffffff;
            font-weight:bold;
        }
        #guide{
            margin-top:15px;
        }
              
    </style>
    <body>
        <div class="nav navbar-default">
                <div class="container-fluid">
                    <ul class="nav navbar-nav">
                        <li><a href="HomePage.php">HOME</a></li>
                        <li><a href="AboutUs.php">About Us</a></li>
        
                        <!-- <li class="dropdown">
                             <a class="dropdown-toggle" data-toggle="dropdown" href="">Category<span class="caret"></span></a> 
                             
                             <ul class="dropdown-menu">
                                 <li><a href="">Science</a></li>
                                 <li><a href="">Novels</a></li>
                                 <li><a href="">Education</a></li>
                             </ul>
                         </li>-->   
                        
                        
                        
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="SignUp.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                        <li><a href="LoginPage.php"><span class="glyphicon glyphicon-log-in"></span> Log in</a></li>
                        
                    </ul>
                </div>
            </div>
        <h4>GUIDED BY</h4>
       <div class="container" id="guide">
             <div class=col-sm-12>
                 <div class=panel panel-success>
                   <div class=panel-body>
                       
                       <div class="data"><img src="HAPSir.jpg"/></div>
                               <div class="data">
                                   <label>NAME</label>:Prof.Hariom A Pandya
                                   
                               </div>    
                   </div>
                </div>
              </div>
       </div> 
        <div id="m"><h4>MADE BY</h4></div>
           <div class="container"> 
       <?php
        for($i=0;$i<8;$i++)
       {
         
         
          echo "
                <div class=col-sm-12>
                  <div class=panel panel-success>
                  <div class=panel-body>
                   <div class=data><img src=/BookRentSystem/Members/$image[$i] /></div>
                   <div class=data><label>NAME:</label>
                     <font style='type:Cursive'><strong>PATEL $name[$i]</strong></font><br> 
                     <label>ROLL NO:</label>
                        CE $rn[$i]
                   </div>   
               </div>
              </div>           
             </div>
           ";
         }
       
       
       ?>
              
    </div>
    </body>
</html>

