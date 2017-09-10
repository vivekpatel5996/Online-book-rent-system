<?php
                 
       session_start();
    
?>

<html>
    <head>
        <title>Login Page</title>
         <meta charset="utf-8">
         <meta name="viewport" content="width=device-width, initial-scale=1">
         <link rel="stylesheet" href="/BookRentSystem/css/bootstrap.min.css">
         
         <style>
             
                 
             
             body
             {
                  background-image:url("bg.jpg");
                 //background-color:#c1ffff;
             }
             
             #main{
                     display:inline-block;
             }
            .container{
                      
                       float:right;
                     //  padding-top:10px;
                       //padding-left:15px;
                      width:calc(100%-200px);
                      
                      // left-margin:200px;
                       margin-top:200px;
                       margin-left:10px;
                      // margin-left:100px;
                 }
             .panel
             {
                 border:solid 2px black;
                 border-style:solid;
                 margin:auto;
                 // background-color:#99ffff;    
             }
            
             
            
             
                 .btn btn-danger{margin:auto;}
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
                     //overflow-y:scroll;
                     //overflow-x:hidden;
                      
                 }
                 #ins{
                     margin:5px;
                 }
         </style>
    </head>
    <body>
        <div class="nav navbar-default">
                <div class="container-fluid">
                    <ul class="nav navbar-nav">
                        <li><a href="HomePage.php">HOME</a></li>
                        <li><a href="AboutUs.php">About Us</a></li>
        
                      
                        
                        
                        
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="SignUp.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                        <li><a href="LoginPage.php"><span class="glyphicon glyphicon-log-in"></span> Log in</a></li>
                        
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
           <div class="col-sm-12"> 
            <div class="panel">
              <div class="panel-body" align="center">  
                <form class="form-horizontal" action="verification.php" method="POST">
                    <div id="ins"><strong><font color="red" >
                    <?php
                      
                       
                      if(isset($_GET["msg"])){echo $_GET["msg"];} 
                      if(isset($_GET["homepage"])){echo $_GET["homepage"];}
                      if(isset($_GET["log"]))
                      {
                          echo "You Are Successfully Loged Out !";
                          session_unset();
                          session_destroy();
                          
                      }
                      if(isset($_GET["cap"])){echo $_GET["cap"];}
                    ?>
                    </font></strong></div> 
                    <div class="form-group">
                       
                        <label>USERNAME :</label>
                        <input type="text" name="uname" value="<?php if(isset($_COOKIE["username"])){echo $_COOKIE["username"];}?>" required/> 
                    </div>
                    <div class="form-group">
                        <label>PASSWORD:</label>
                        <input type="password" name="pwd" value="<?php if(isset($_COOKIE["username"])){echo $_COOKIE["password"];}?>" required/>
                    </div>
                    <div class="form-group">
                        
                        <label>Enter Captcha:</label>
                        <img src="captchafont.php">
                        <input type="text" name="captcha" required/>
                    </div>
                    <div class="form-group">
                        <input type="checkbox" name="remember"/>
                        <label>Remember Me</label>
                    </div>
                    <div class="form-group">
                         <input type="submit" value="Login" class="btn btn-danger"/>
                    </div>
                    <div class="form-group">
                        <input type="hidden" value="hlogin" name="hlogin"/>
                        <a href="SignUp.php">New User ? Click Here</a>
                    </div>
                </form>
              </div>    
            <div>
            </div>     
        </div>
    </body>       
</html>

