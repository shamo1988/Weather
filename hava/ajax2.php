<?php
if(@$_GET['func']=='hava'){
    
      function ara($bas, $son, $yazi)
    {
      @preg_match_all('/' . preg_quote($bas, '/') .
      '(.*?)'. preg_quote($son, '/').'/i', $yazi, $m);
      return @$m[1];
    }
 
    
$id = $_POST['data'];
    $bugun=date("d.m.Y");

   $url = file_get_contents('https://weather.day.az/az/city/'.$id.'/today.html');

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
	
   $url2 = file_get_contents('https://weather.day.az/az/city/'.$id.'/week.html');
   
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

}?>
	

		  <div class="row">
           
            <?php echo $metin;?>          
        <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 today_forecast">
            <h4 style="color:#176FD3;">Bugün <?php echo $bugun;?> </h4>
             
<?php
            foreach ($sagkenar as $link[1]=>$havabugun) {?>
     

            <p><?php echo $havabugun;?></p>
           
                           
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
         
          <li class="list-inline-item"><div class="row">
            <!--div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 text-center ">
                <p class="weekday">Ç.</p>
                <p class="date">1.01</p>
            </div-->
                        <?php echo $heftesol2;?>

                   <?php echo $sagkenarhefte[0][1];?> 

              </div></li>
           <li class="list-inline-item"><div class="row">
            <!--div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 text-center ">
                <p class="weekday">C.a.</p>
                <p class="date">2.01</p>
            </div-->
                       <?php echo $heftesol3;?>

                   <?php echo $sagkenarhefte[0][2];?> 

        </div></li> 
                             <hr>

           <li class="list-inline-item"> <div class="row">
            <!--div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 text-center ">
                <p class="weekday">C.</p>
                <p class="date">3.01</p>
            </div-->
                     <?php echo $heftesol4;?>

                    <?php echo $sagkenarhefte[0][3];?> 

        </div></li>
            <li class="list-inline-item"><div class="row">
            <!--div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 text-center weekend">
                <p class="weekday">Ş.</p>
                <p class="date">4.01</p>
            </div-->
                        <?php echo $heftesol5;?>

                  <?php echo $sagkenarhefte[0][4];?> 

        </div></li>
                             <hr>

           <li class="list-inline-item"> <div class="row">
            <!--div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 text-center weekend">
                <p class="weekday">В.</p>
                <p class="date">5.01</p>
            </div-->
                       <?php echo $heftesol6;?>

               <?php echo $sagkenarhefte[0][5];?> 

        </div></li>
            <li class="list-inline-item"><div class="row">
            <!--div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 text-center ">
                <p class="weekday">B.e.</p>
                <p class="date">6.01</p>
            </div-->
                        <?php echo $heftesol7;?>

                 <?php echo $sagkenarhefte[0][6];?> 

        </div></li>
                   <hr>

        </ul>
    </div>