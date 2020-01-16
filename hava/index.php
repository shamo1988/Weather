<?php

    function ara($bas, $son, $yazi)
    {
      @preg_match_all('/' . preg_quote($bas, '/') .
      '(.*?)'. preg_quote($son, '/').'/i', $yazi, $m);
      return @$m[1];
    }

    $link = "https://weather.day.az/az/locations/";
    $icerik = file_get_contents($link);
    $title2 = ara('<h1>','</h1>',$icerik);

    $seher = ara('<p>','</a>',$icerik);
    $bugun=date("d.m.Y");

$sayfa = file_get_contents('https://weather.day.az/az/locations/');
preg_match_all('~<p><a href="(.*?)">(.*)</a>~', $sayfa, $cikti);

          $x = array_reverse($cikti[0],true);
$y=array_reverse($cikti[0]);

   $url = file_get_contents('https://weather.day.az/az/city/100147622/today.html');

    $sagkenar=ara('<p>','</p>',$url);
        $derece=ara('<p class="degree">','</p>',$url);
       $kulek=ara('<p class="wind">','</p>',$url);
    preg_match_all('#<div class="state-icon" title="(.*?)"><img src="(.*?)">(.*)</div>#', $url, $title);
    preg_match_all('#<div class="state-icon" title="(.*?)"><img src="(.*?)">(.*)</div>#', $url, $sekil);


     preg_match_all('#<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 current_state text-center"><img src="(.*?)>(.*?)</div>#', $url, $onsekil);

            preg_match_all('@<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 current_state text-center">(.*?)</div>@si',$url,$dizi);

    $html=$dizi[0][0];
    
    $metin  = $html; 
	
  $eski   = '/assets';
	
  $yeni   ='https://weather.day.az/assets';
    
	
  $metin = str_replace($eski, $yeni, $metin);
	
   $url2 = file_get_contents('https://weather.day.az/az/city/100147622/week.html');
   
  $sagkenar2=ara('<p>','</p>',$url2);
        $derece=ara('<p class="degree">','</p>',$url);
       $kulek=ara('<p class="wind">','</p>',$url);
    preg_match_all('@<div class="row">(.*?)</div>@si', $url2, $komple);
    preg_match_all('@<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">(.*?)</div>@si', $url2, $sagkenarhefte);
    
    //print_r($sagkenarhefte[0][0]);
$hmtl1=$komple[0][3];
$hmtl2=$komple[0][4];
$hmtl3=$komple[0][5];
$hmtl4=$komple[0][6];
$hmtl5=$komple[0][7];
$hmtl6=$komple[0][8];
$hmtl7=$komple[0][9];

    $metin2  = $hmtl1; 
    $metin3  = $hmtl2; 
    $metin4  = $hmtl3; 
    $metin5  = $hmtl4; 
    $metin6  = $hmtl5; 
    $metin7  = $hmtl6; 
    $metin8  = $hmtl7; 
   

  $eski2   = '/assets';
	
  $yeni2   ='https://weather.day.az/assets';
      $heftesol1 = str_replace($eski2, $yeni2, $metin2);
      $heftesol2 = str_replace($eski2, $yeni2, $metin3);
      $heftesol3 = str_replace($eski2, $yeni2, $metin4);
      $heftesol4 = str_replace($eski2, $yeni2, $metin5);
      $heftesol5 = str_replace($eski2, $yeni2, $metin6);
      $heftesol6 = str_replace($eski2, $yeni2, $metin7);
      $heftesol7 = str_replace($eski2, $yeni2, $metin8);

?>

<!DOCTYPE html>
<html>

<head>
       <meta charset="utf-8">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <title>Hava proqnozu</title>
    <style>
        
     .fixed {
	position: fixed;
	top: 0;
	height: 70px;
	z-index: 1;
}
        .olke{
                opacity: 0.7;
    font-size: 14px;
    margin-top: 15px;
}
         
        .seherler,.olkeler{
            position: absolute;
    box-shadow: rgb(241, 236, 236) 0px 0px 12px 0px;
            left: 0px;
    top: 53px;
    width: 135px;
    z-index: 1;
    text-align: center;
            
        }
        
        body{
            overflow: auto;
        }
        .forecast {
    background: #ffffffc7;
    border-radius: 30px;
}
        .copyright {
    color: #b90101;
    text-align: center;
}
        section.footer .row3 {
    padding-top: 30px;
    padding-bottom: 30px;
    background-color: #dcedfc;
    color: white;
}
        .olke1{
            
           margin-left: -76px;
    opacity: 0.7;
}
        .olkeler1,.seherler1{
        position: absolute;
    box-shadow: rgb(241, 236, 236) 0px 0px 12px 0px;
    border-radius: 14px;
    left: 65px;
    top: 53px;
    width: 615px;
    z-index: 1;
    text-align: center;
        }
        .thumbnail {
            display: block;
            padding: 4px;
            margin-bottom: 20px;
            line-height: 1.42857143;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 4px;
            -webkit-transition: all .2s ease-in-out;
            -o-transition: all .2s ease-in-out;
            transition: all .2s ease-in-out;
        }

        ul{
            list-style-type: :none;
        }
        
            .form-group .icon {
      position: absolute;
      top: 50% !important;
      right: 35px;
      font-size: 16px;
      -webkit-transform: translateY(-50%);
      -ms-transform: translateY(-50%);
      transform: translateY(-50%); }
        
        
     .form-group .icon span {
        color: rgba(0, 0, 0, 0.2) !important; }
        
            .form-group .select-wrap {
      position: relative; }
      .form-group .select-wrap  {
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none; }
        
        .ion-ios-arrow-down:before {
    content: "\f3d0"
}
        .list-group-item:hover{
            background-color: #95cdfb;
        }
        input, textarea, select {
    font-size: 20px;
 padding: 8px;
    /* margin-bottom: 16px; */
    border-radius: 31px !important;
    /* width: 100%; */
    color: #176fd3;
    background-color: #dcedfc;
         
}
    
    
    
        input, textarea, select:hover {
    font-size: 20px;
    padding: 8px;
    /* margin-bottom: 16px; */
    border-radius: 31px !important;
    /* width: 100%; */
    color: blue;
    background-color: #fff;
    
} 

       @media only screen and (min-width: 767px) and (max-width: 1024px) {
.list-group-item {
    position: relative;
    display: block;
    padding: .75rem 1.25rem;
    background-color: #fff;
    border: 1px solid rgba(0,0,0,.125);
    font-size: 35px;
}
   .olke1{
            margin-left: 32px;
    opacity: 0.7;
    width: 468px;
}
    .olke{
    margin-left: 760px;
    opacity: 0.7;
    width: 216px;
    font-size: 20px;
}   
           input, textarea, select {
    font-size: 40px;
 padding: 8px;
    /* margin-bottom: 16px; */
    border-radius: 31px !important;
    /* width: 100%; */
    color: #176fd3;
    background-color: #dcedfc;
           
}
    
    
    
        input, textarea, select:hover {
    font-size: 40px;
    padding: 8px;
    /* margin-bottom: 16px; */
    border-radius: 31px !important;
    /* width: 100%; */
    color: blue;
    background-color: #fff;
                
            
} 
    .olkeler1,.seherler1{
position: absolute;
    box-shadow: rgb(241, 236, 236) 0px 0px 12px 0px;
    border-radius: 14px;
    left: 138px;
    top: 69px;
    width: 690px;
    z-index: 1;
    text-align: center;
        
    } 
           
      .olkeler, .seherler {
    position: absolute;
    box-shadow: rgb(241, 236, 236) 0px 0px 12px 0px;
    border-radius: 14px;
    margin-left: 760px;
    top: 69px;
    width: 174px;
    z-index: 1;
    text-align: center;
       font-size: 26px;
}
        #seherad{
               
    background-color: #3c98ed;
    text-align: center;
    color: #ffffff;
    box-shadow: 0 0 12px 0px #f1ecec;
    font-size: 60px;

    border-radius: 14px;
    /* border-radius: 30%; */
           }
           forecast img {
    padding: 0px;
    width: 76%;
}
           .current_state .degree {
    font-size: 48px;
    color: #176FD3;
}
           .h4, h4 {
    font-size: 3.5rem;
}
           .today_forecast p {
    margin: 4px 0;
    font-size: 35px;
    color: #280296;
}
           .day_time {
    font-weight: bold;
    font-size: 45px;
    color: #c3073a;
}
           .forecast .state-icon img {
    height: 120%;
}
           .degree {
    font-weight: bold;
    font-size: 48px;
    color: #176FD3;
}
           .wind {
    color: #b5088e;
    font-size: 35px;
}
           .forecast_list .degree {
    font-size: 40px;
    color: #176FD3;
}
           .forecast_list p {
    margin: 4px;
    font-size: 33px;
    color: #280296;
    /* margin-bottom: -5px; */
    margin-left: 80px;
    width: 430px;
}
           .forecast_list .weekday {
    font-size: 48px;
    font-weight: bold;
    color: #28a745;
    margin-left: -150px;
}
           .forecast_list .date {
    font-size: 38px;
    font-weight: normal;
    margin-left: -150px;
}
           .forecast_list img {
    width: 160%;
    margin-left: -31px;
    margin-top: 5px;
}
           .forecast_list .row {
    padding: 10px 0;
    width: 423px;
    height: 400px;
}
           .list-inline {
    padding-left: 0;
    list-style: none;
    margin-left: -210px;
}
           .list-inline-item{
        width:100%;
    }
       #load3{
               
   margin-left: 150px;
    margin-top: 211px;
    z-index: 1000;
    height: 500px;
    width: 500px;
    font-size: 150px;
    border-radius: 15px;
    display: none;

           }
}
        
@media only screen and (max-width: 479px) {
.list-group-item {
    position: relative;
    display: block;
    padding: .75rem 1.25rem;
    background-color: #fff;
    border: 1px solid rgba(0,0,0,.125);
    font-size: 35px;
}
   input, textarea, select {
    font-size: 40px;
 padding: 8px;
    /* margin-bottom: 16px; */
    border-radius: 31px !important;
    /* width: 100%; */
    color: #176fd3;
    background-color: #dcedfc;
          
}
    
    .olke1{
            margin-left: 32px;
    opacity: 0.7;
    width: 468px;
}
    .olke{
    margin-left: 760px;
    opacity: 0.7;
    width: 216px;
    font-size: 20px;
}
    
        input, textarea, select:hover {
    font-size: 40px;
    padding: 8px;
    /* margin-bottom: 16px; */
    border-radius: 31px !important;
    /* width: 100%; */
    color: blue;
    background-color: #fff;
               
            
} 
   .olkeler1,.seherler1{
position: absolute;
    box-shadow: rgb(241, 236, 236) 0px 0px 12px 0px;
    border-radius: 14px;
    left: 138px;
    top: 69px;
    width: 690px;
    z-index: 1;
    text-align: center;
    } 
           
   .olkeler, .seherler {
    position: absolute;
    box-shadow: rgb(241, 236, 236) 0px 0px 12px 0px;
    border-radius: 14px;
    margin-left: 760px;
    top: 69px;
    width: 174px;
    z-index: 1;
    text-align: center;
       font-size: 26px;
}
      #seherad{
               
    background-color: #3c98ed;
    text-align: center;
    color: #ffffff;
    box-shadow: 0 0 12px 0px #f1ecec;
    font-size: 60px;

    border-radius: 14px;
    /* border-radius: 30%; */
           }
    forecast img {
    padding: 0px;
    width: 76%;
}
    .current_state .degree {
    font-size: 48px;
    color: #176FD3;
}
    .h4, h4 {
    font-size: 3.5rem;
}
    .today_forecast p {
    margin: 4px 0;
    font-size: 35px;
    color: #280296;
}
    .day_time {
    font-weight: bold;
    font-size: 45px;
    color: #c3073a;
}
    .forecast .state-icon img {
    height: 120%;
}
    .degree {
    font-weight: bold;
    font-size: 48px;
    color: #176FD3;
}
    .wind {
    color: #b5088e;
    font-size: 35px;
}
    .forecast_list .degree {
    font-size: 40px;
    color: #176FD3;
}
    .forecast_list p {
    margin: 4px;
    font-size: 33px;
    color: #280296;
    /* margin-bottom: -5px; */
    margin-left: 80px;
    width: 430px;
}
    .forecast_list .weekday {
    font-size: 48px;
    font-weight: bold;
    color: #28a745;
    margin-left: -150px;
}
    .forecast_list .date {
    font-size: 38px;
    font-weight: normal;
    margin-left: -150px;
}
           .forecast_list img {
    width: 160%;
    margin-left: -31px;
    margin-top: 5px;
}
    .forecast_list .row {
    padding: 10px 0;
    width: 423px;
    height: 400px;
}
    .list-inline {
    padding-left: 0;
    list-style: none;
    margin-left: -210px;
}
    .list-inline-item{
        width:100%;
    }
       #load3{
               
   margin-left: 300px;
    margin-top: 211px;
    z-index: 1000;
    height: 500px;
    width: 500px;
    font-size: 150px;
    border-radius: 15px;
    display: none;

           }
}
    </style>
</head>

<body style="background: url(images/bg.png);background-size: cover;background-repeat: no-repeat;background-position: bottom;">
<div align="center" id="fixed" style="margin-top: 10px;">
           <select style="" name="olke" id="olke" class="olke1">
           

            <option value="aze"><?php echo $title2[0];?></option>
            <option value="xarici"><?php echo $title2[1];?></option>
               </select>
<br>
<select style="display:none; " name="seherler" id="seherler" class="seherler1">
 <option class="gizle" value="">Şəhər seçin &#8595;</option>
  <?php
   $i=0;
 foreach ($cikti[0] as $link=>$key2) {
     
    
       $trim2=substr($key2,42,9);  
$i++;
    if($i==73){
   break;
      
        }
        else{
    
   echo '<option id="'.$link.'" value="'.$trim2.'">'.$key2.'</option>';
        }
    }?>
</select>               
          <select style="display:none;" name="olkeler" id="olkeler" class="olkeler1">
          <option value="">Şəhər seçin &#8595;</option>

  <?php
   $i=0;
    
 foreach ($y as $link1=>$key3) {

       $trim3=substr($key3,42,9);  

$i++;
 if($i==59){

   break;
      
        }
         else{
             
             
             
             
     echo '<option  id="'.$link1.'" value="'.$trim3.'">'.$key3.'</option>';

         }


    }?>
</select>        
           </div>
           
 <br>
 <br>

 <div style="clear:both;"></div>
  <!--<div align="center" class= "col-sm-12 col-md-12 col-lg-12">
    //<div class="col-lg-12 col-md-12 col-sm-12 col-xs-10 text-center">-->
    <section class="inner-page-contents ptl">
    <div class="block weather" style="height: auto !important;">

    <div class="row">
     <div class="col-sm-12 col-md-12 col-lg-7" style="margin-left:20px;" >
                              <div id="secim">
                       		<h3 id="seherad" style=""></h3>
                              </div>
<div align="center" class="forecast container-fluid ">

<div class="row">
           
            <?php echo $metin;?>          
        <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 today_forecast">
            <h4 style="color:#176FD3;">Bugün <?php echo $bugun;?> </h4>
             
<?php
            foreach (@$sagkenar as $link=>$havabugun) {?>
     

            <p><?php echo @$havabugun;?></p>
           
                           
                       <?php }?>
        </div>
                                                             

    </div>

    <div class="row weather_forecast">
                    <div class="col-xs-3 col-md-3 col-sm-3 state">
                <!-- 2019-12-30 22:00:00 --> 
                <span class="day_time">Axşam</span>
                <div class="state-icon" title="<?php echo $title[1][0];?>"><img src="https://weather.day.az/<?php echo $sekil[2][0];?>" alt=""></div>
                <p class="degree"><?php echo $derece[1];?></p>
                <p class="wind"><?php echo $kulek[0];?></p>
            </div>
                    <div class="col-xs-3 col-md-3 col-sm-3 state">
                <!-- 2019-12-31 04:00:00 --> 
                <span class="day_time">Gecə</span>
                <div class="state-icon" title="<?php echo $title[1][1];?>"><img src="https://weather.day.az/<?php echo $sekil[2][1];?>" alt=""></div>
                <p class="degree"><?php echo $derece[2];?></p>
                <p class="wind"><?php echo $kulek[1];?></p>
            </div>
                   
                    <div class="col-xs-3 col-md-3 col-sm-3 state">
                <!-- 2019-12-31 10:00:00 --> 
                <span class="day_time">Səhər</span>
                <div class="state-icon" title="<?php echo $title[1][2];?>"><img src="https://weather.day.az/<?php echo $sekil[2][2];?>" alt=""></div>
                <p class="degree"><?php echo $derece[3];?></p>
                <p class="wind"><?php echo $kulek[2];?></p>
            </div>
                    <div class="col-xs-3 col-md-3 col-sm-3 state">
                <!-- 2019-12-31 16:00:00 --> 
                <span class="day_time">Gün</span>
                <div class="state-icon" title="<?php echo $title[1][3];?>"><img src="https://weather.day.az/<?php echo $sekil[2][3];?>" alt=""></div>
                <p class="degree"><?php echo $derece[4];?></p>
                <p class="wind"><?php echo $kulek[3];?></p>
            </div>

            </div>
                   <hr>

    <div class="forecast_list">
            <h4 style="color: #176FD3;"> Həftəlik praqnoz</h4>

                       <ul class="list-inline">

            <li class="list-inline-item"><div class="row">
            <!--div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 text-center ">
                <p class="weekday">Ç.a.</p>
                <p class="date">31.12</p>
            </div-->
            <?php echo $heftesol1;?>
         <?php echo $sagkenarhefte[0][0];?> 
        </div></li>
        <br><br>
         <hr>
          <li class="list-inline-item"><div class="row">
            <!--div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 text-center ">
                <p class="weekday">Ç.</p>
                <p class="date">1.01</p>
            </div-->
                        <?php echo $heftesol2;?>

                   <?php echo $sagkenarhefte[0][1];?> 

              </div></li>
              <br><br>
         <hr>
           <li class="list-inline-item"><div class="row">
            <!--div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 text-center ">
                <p class="weekday">C.a.</p>
                <p class="date">2.01</p>
            </div-->
                       <?php echo $heftesol3;?>

                   <?php echo $sagkenarhefte[0][2];?> 

        </div></li> 
                             <br><br><hr>
           <li class="list-inline-item"> <div class="row">
            <!--div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 text-center ">
                <p class="weekday">C.</p>
                <p class="date">3.01</p>
            </div-->
                     <?php echo $heftesol4;?>

                    <?php echo $sagkenarhefte[0][3];?> 

        </div></li>
           <br><br>
         <hr>
            <li class="list-inline-item"><div class="row">
            <!--div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 text-center weekend">
                <p class="weekday">Ş.</p>
                <p class="date">4.01</p>
            </div-->
                        <?php echo $heftesol5;?>

                  <?php echo $sagkenarhefte[0][4];?> 

        </div></li>
                             <br><br>
         <hr>

           <li class="list-inline-item"> <div class="row">
            <!--div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 text-center weekend">
                <p class="weekday">В.</p>
                <p class="date">5.01</p>
            </div-->
                       <?php echo $heftesol6;?>

               <?php echo $sagkenarhefte[0][5];?> 

        </div></li>
           <br><br>
         <hr>
            <li class="list-inline-item"><div class="row">
            <!--div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 text-center ">
                <p class="weekday">B.e.</p>
                <p class="date">6.01</p>
            </div-->
                        <?php echo $heftesol7;?>

                 <?php echo $sagkenarhefte[0][6];?> 

        </div></li>
<br><br>
        </ul>
    </div>
  
</div>
  
  
   </div>
    
    
<div style="margin-left: 20px;" class="col-sm-12 col-md-12 col-lg-2 listing">

    
<div style="" class="">
                                        <div style="z-index: 1;" class="listing">
    <ul id="azelist">
        <li style="text-align:center;" class="list-group-item">Azərbaycanda hava</li>
                     <?php
   $i=0;
 foreach ($cikti[0] as $link5=>$key5) {
     
    
       $trim4=substr($key5,42,9);  
$i++;
    if($i==73){
   break;
      
        }
        else{
    
$htmlaze='<p><a href="http://weather.day.az/az/city/'.$trim4.'/today.html"><strong>'.$key5.'</strong></a>';
    
    $metina  = $htmlaze; 
	
  $eskia  = '<p><a href="http://weather.day.az/az/city/'.$trim4.'/today.html">';
	
  $yenia  ='';
    
	
  $metinsona = str_replace($eskia, $yenia, $metina);
            
            
            
            
            
            
              echo'
                    <li class="list-group-item" style="border-radius: 15px;">
                   
                    <span style="cursor: pointer; text-align:center;" id="'.$trim4.'" class="alist">'.$metinsona.'</span>
                    <span class="weather_factical"><img src="/assets/images/icons/states/d300.svg" alt=""><span class="text-muted"></span></span>
            </li>';
                   
         }}?>
                    
    </ul>
</div>               
                       </div>
           </div>    
    
<div style="margin-left: 20px;" class="col-sm-12 col-md-12 col-lg-2 listing">
    <div style="" class="">
    <div class="listing">
    <ul id="xaricilist">
        <li style="text-align:center;" class="list-group-item">Xaricdə hava</li>
                     <?php
   $i=0;
 foreach ($y as $link2=>$key4) {
     
    
       $trim3=substr($key4,42,9);  
$i++;
    if($i==59){
   break;
      
        }
        else{
$htmlxarici='<p><a href="http://weather.day.az/az/city/'.$trim3.'/today.html"><strong>'.$key4.'</strong></a>';
    
    $metinx  = $htmlxarici; 
	
  $eskix   = '<p><a href="http://weather.day.az/az/city/'.$trim3.'/today.html">';
	
  $yenix   ='';
    
      
            
            
            
            
	
  $metinsonx = str_replace($eskix, $yenix, $metinx);

              echo'
                    <li class="list-group-item" style="border-radius: 15px;">
                   
                    <span style="cursor: pointer;" id="'.$trim3.'" class="xlist">'.$metinsonx.'</span>
                    <span class="weather_factical"><img src="/assets/images/icons/states/d300.svg" alt=""> <span class="text-muted"></span></span>
            </li>';
                   
         }}?>
    </ul>
</div> 
      </div>
    
           </div>
    
  <div id="load3"  class="animated fadeIn faster" style="display:none; position: absolute;
    left: 7%;
    top: 200px;
    display: none;
    z-index: 1000;
    height: 500px;
    width: 500px;font-size:150px; border-radius:15px; content:'yuklenir';"><img class="sekil" width="" height="" src="images/gif8.gif"></div>
        </div>
                              
                              
                              
        </div>                      
    </section>
    <section class="footer">
   
    <!-- 2ND ROW ENDS -->
    <!-- 3RD ROW STARTS -->
    <div class="row3">
        <div class="container">
            <div class="row">
                <div style="font-size:20px;" class="col-lg-12 copyright">ⒸCreated by Shamo Hasanli / Hava proqnozu weather.day.az tərəfindən təqdim olunub.</div>
            </div>
        </div>
    </div>
    <!-- 3RD ROW ENDS -->
</section>
      
   

</body>
<script>
    window.onload = function () {
jQuery('#seherler').show();
            jQuery('#seherler').get(0).selectedIndex = 30;
        jQuery('#olke').css('opacity','0.7');
}
    
    
    
    
    jQuery('span.xlist, span.alist').click(function(){
        var data=jQuery(this).attr("id");
             


             if (data==""){
                     jQuery('.forecast').hide();
             }
             else{
         jQuery("#load3").show();             
    jQuery('.forecast').hide();

           jQuery.ajax({
        type: 'post',
        url: 'ajax2.php?func=hava',
        data: {data:data},
        success: function(result) {
                             

            jQuery("#load3").hide();             
    jQuery('.forecast').show();

    jQuery('.forecast').html(result);


      },
               
           statusCode:{
               
               404:function(){
                   
                   alert("yoxdu sehife");
                   
                   
               }
           }   
          })
             }
        
        
    });
         jQuery('#seherler,#olkeler').change(function(){
              

var data=jQuery(this).val();
             
           


             if (data==""){
                     jQuery('.forecast, .listing').hide();
             }
             else{
         jQuery("#load3").show();             
    jQuery('.forecast').hide();

           jQuery.ajax({
        type: 'post',
        url: 'ajax.php?func=hava',
        data: {data:data},
        success: function(result) {
                             

            jQuery("#load3").hide();             
    jQuery('.forecast, .listing').show();


      },
               
           statusCode:{
               
               404:function(){
                   
                   alert("yoxdu sehife");
                   
                   
               }
           }   
          })
             }
    
              });
    
 
    
$(function() {
  // choose target dropdown
  var select = $('select#olkeler');
  select.html(select.find('option').sort(function(x, y) {
    // to change to descending order switch "<" for ">"
    return $(x).text() > $(y).text() ? 1 : -1;

  }));
select.get(0).selectedIndex = 57;
});
    
    
    
    
    jQuery('#olke').change(function(){
        if (jQuery('#olke option:selected').val()=="aze"){
            jQuery('#seherler').show();
            jQuery('#seherler').get(0).selectedIndex = 0;
    jQuery('.forecast').hide();
  jQuery('#seherad').html("");
            jQuery('#olkeler').hide();
            jQuery('#olke').css('opacity','0.7');
        }
          else if(jQuery('#olke option:selected').val()=="xarici"){

            jQuery('#olkeler').show();
         jQuery('#olkeler').get(0).selectedIndex = 57;
  jQuery('#seherad').html("");

                  jQuery('.forecast').hide();

             jQuery('#seherler').hide();
              jQuery('#olke').css('opacity','0.7');
          }  
    
    });
    
    $('#olkeler').change(function(){
    $('select[name=olkeler] option:eq(57)').css('display', 'none');
             var textxarici=jQuery("#olkeler option:selected").text();  

    });
    
    $('#seherler').change(function(){
    $('select[name=seherler] option.gizle').css('display', 'none');
                  var textaze=jQuery("#seherler option:selected").text();

    });
    
     $('.xlist').click(function(){
                  var textxarici=$(this).text();
     $('#olkeler').show();
         jQuery('#olkeler option:selected').text(textxarici);
                   $('#seherler').hide();
jQuery('#olke').get(0).selectedIndex = 1;
                       jQuery('#olke').css('opacity','0.7');


    });
      $('.alist').click(function(){
                  var textaze=jQuery(this).text();
 $('#olkeler').hide();
                   $('#seherler').show();
                   jQuery('#seherler option:selected').text(textaze);

jQuery('#olke').get(0).selectedIndex = 0;
                        jQuery('#olke').css('opacity','0.7');

    });
    
      $(".xlist, .alist, #olkeler, #seherler").click(function(e){
           e.preventDefault();
   $(window).scrollTop(0);

      });
    

    </script>
    <script>
    $(document).ready(function(){
	   $(window).bind('scroll', function() {
	   var navHeight = $( window ).height() - 500;
			 if ($(window).scrollTop() > navHeight) {
				 $('#fixed').addClass('fixed');
                  $('#olke').addClass('olke');
                 $('#olke').removeClass('olke1');
                 $('#olkeler').removeClass('olkeler1');
                  $('#olkeler').addClass('olkeler');
                  $('#seherler').addClass('seherler');
                  $('#seherler').removeClass('seherler1');
			 }
			 else {
				 $('#fixed').removeClass('fixed');
                    $('#olke').removeClass('olke');
                     $('#olke').addClass('olke1');

                  $('#olkeler').removeClass('olkeler');
                   $('#olkeler').addClass('olkeler1');

                  $('#seherler').removeClass('seherler');
                   $('#seherler').addClass('seherler1');

			 }
		});
	});
    
    
    </script>
     
</html>
