<?php
	 session_start();
     header ("Content-type: image/png");
	  $text = substr(str_shuffle(str_repeat("01234569", 5)), 0, 5);
	 $_SESSION["captcha"] = $text;
	 $font  = 'KGMakesYouStronger.TTF';
    /*if(!isset($_SESSION["captcha"]))
    {    
	 $text = substr(str_shuffle(str_repeat("abcdefghijklmnopqrstuvwxyz", 5)), 0, 5);
	 $_SESSION["captcha"] = $text;
	 $font  = 'KGMakesYouStronger.TTF';
    }
    else 
    {
         $text=$_SESSION["captcha"];   
         $font  = 'KGMakesYouStronger.TTF';
    }*/
	
     $im = ImageCreate (100,30);
     $grey = ImageColorAllocate ($im, 230, 230, 230);
     $black = ImageColorAllocate ($im, 0, 0, 0);
   
     ImageTTFText($im, 20, 0, 10, 25, $black, $font,$text);
     ImagePng ($im);
     ImageDestroy ($im); 
?>

