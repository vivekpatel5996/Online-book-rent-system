<html>
    <head>
        <title> Sign Up </title>
         <meta charset="utf-8">
         <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="/BookRentSystem/css/bootstrap.min.css">
         <style>
             body
             {
                  background-image:url("bg.jpg");
                 //background-color:#c1ffff;
             }
            
             #tf label{
                 width:30%;
                float:left;
                text-align: right;
             }
             #tf input{
                 width:35%;
                 margin-left:25px;
                 float:left;
             }
             #dob label{
                    width:30%;
                    float:left;
                    text-align:right;
             }
             #dob input {
                    width:10%;
                    float:left;
                    margin-left:25px;
             }
             #gender label{
                      width:30%;
                      float:left;
                      text-align:right;
                     }
                 
             #radio label
             {
                    width:10%;
                    float:left;
                    margin-left:25px;            
             }          
             #address label{
                      width:30%;
                      float:left;
                      text-align:right;
             }     
             #address textarea{
                 float:left;
                 margin-left:25px;
             }
             .form-group{
                 padding:5px;
             }
              .container{
                      
                       float:right;
                       padding-top:10px;
                       padding-left:15px;
                       width:calc(100%-200px);
                      // left-margin:200px;
                       margin-top:0px;
                      // margin-left:100px;
                 }
            /* .container{
                 padding:20px;
                 margin-left:300px;
                  
             }*/
             .col-sm-12{
                 //border-style:inset;
                 padding:40px;
                 //background-color:#e4a9d7;
             }
              .category{
                     
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
                 li h4{
                     margin:0;
                     display:box;
                     padding:5px;
                     text-align:center;
                     //font-style:italic;
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
                   .panel
             {
                 border:solid 2px black;
                 border-style:solid;
                 margin:auto;
                // background-color:#99ffff;    
             }
             h1{
                 text-align:center;
                 padding:5px;
                 font-family:"Lucida Console", Monaco, monospace;
                 margin:0;
                 
             }
             #r{
                 
                 margin-left:700px;
             }
             #war{
                 margin-top:30px;
                 margin-left:0px;
                 
             }
             
         </style>
    </head>
    <body>
        <div>
            <h1 id="tl">Book Rent System</h1>
        </div>
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
          <div class="row">     
           <div class="col-sm-12">
            <div class="panel">
              <div class="panel-body" align="center">  
                   
                  <form class="form-horizontal" action="verification.php" method="POST">
                    <div id="tf">
                        <?php if(isset($_GET["war"])){echo "<div id=war><strong><font color=red>username or email id or contact no already Exists !</font></strong></div>";}?>
                        <div id="r"><font color="red">*Required Field</font></div>   
                    <div class="form-group">
                        <label><font color="red">*</font>USERNAME:</label>
                        <input type="text" name="uname" required> 
                          
                    </div>    
                       
                    
                    <div class="form-group">
                        <label><font color="red">*</font>PASSWORD:</label>
                        <input type="password" name="pwd" required/>
                    </div>
                    <div class="form-group">
                        <label><font color="red">*</font>Email ID:</label>
                        <input type="email" name="email" placeholder="abc@Gmail.com" required/>
                    </div>
                    <div class="form-group">
                        <label>Contact No:</label>
                        <input type="text"  name="contactno" pattern="[0-9]{10}" title="Enter 10 Digits !"/>
                    </div>
                    </div>    
                    <div class="form-group" id="dob">
                        <label>Date of Birth:</label>
                        <input type="text" name="date" min="1" max="31" size="5" placeholder="Date" required/>
                        <input type="text" name="month" min="1" max="12" size="5" placeholder="Month" />
                        <input type="text" name="year" min="1950" max="2016" size="5" placeholder="year"/>
                    </div>
                    <div class="form-group" id="gender">
                        <label>Gender:</label>
                      <div id="radio" required>  
                        <label><input type="radio" name="gender" value="male"> Male</label>
                        <label><input type="radio" name="gender" value="female"> Female</label>
                        <label><input type="radio" name="gender" value="other"> Other</label>
                      </div>  
                    </div>
                    <div class="form-group" id="address">
                        <label>Address:</label>
                        <textarea name="address" rows="4" cols="60" required></textarea>
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="hsignup" value="hsignup"/>
                         <input type="submit" value="Login" class="btn btn-danger" float="center"/>
                    </div>
                </form>
              </div>    
            </div>
           </div>  
          </div> 
        </div>
       
               
    </body>
</html>


