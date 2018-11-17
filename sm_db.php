<?php
require 'color.php';
$body1=array("亲~~ 敬爱的会户您好: <BR>","亲~~ 尊敬的会员您好: <BR>","尊敬的会员您好: <BR>","亲爱的会员您好: <BR>","敬爱的会员您好: <BR>","尊敬的会员您好: <BR>");
$body2=array("省小钱靠记帐，赚大钱靠投资 <BR>","存钱不会让现在变轻松，却会让未来，充满希望<br>","花更多钱，不一定会得到更多满足；存更多钱，却一定能实现更多梦想<br>","改变存钱态度，就能改变财务自由度<br>","别抗拒改变，因为改变是为了更好<br>","今天先存一点钱，明天就多一点机会<br>","先苦后甘不是妥协，而是计画<br>","别埋怨你过的生活，别去过你会埋怨的生活<br>","存钱就像爬山，再怎么累，也只是登顶的过程<br>","你存的钱不会背叛你，它能实现你想要的人生<br>","储值就像一把钥匙，它能开启你想要的人生<br>","幸福人生不是計較出來的，是計畫出來的<br>","你可以忽视小钱的购买力，但不要忽视小钱的爆发力<br>","目标，有可能是别人的；而梦想，绝对都是自己的 <BR>","留财不留富，早晚财变负 <BR>","钱花出去是「财产」，不花叫「遗产」 <BR>","先交富朋友，再做富爸爸<BR>","花钱投资，幸福一辈子<BR>","投资理财就像打高尔夫球，一杆进洞总是令人陶醉<BR>","平时不理财，老年没财理","想知道土豪都怎么养成的吗?<BR>","生财又生息，日后就能常休息<BR>","钱乃身外之物，可是身外之物都要用钱买……<BR>","投资理财就像坐上载满人的拥挤火车，过程虽然辛苦，一旦抵达目的地下车，就会感受自由带来的美好<BR>","你不需要成为有钱人才能理财，但你需要理财才能成为有钱人<BR>","靠老板加薪去理财，不如靠自己理财来加薪<BR>","有时候，投资并不只是投入本金，更是投入人生希望<BR>","犹豫，只能让你遇到问题；行动，才能让你找到答案<BR>","理财，也许无法让你住豪宅，但可能让你……有机会住好宅<BR>","理财，表面上看起来挣扎，骨子里却是种争气<BR>");
$body3=array("天天存款，天天送助攻彩金318元， <strong>提供快速兑现</strong>棋牌热门游戏<BR> ","首存68％，18倍流水， <strong>提供快速兑现</strong>棋牌热门游戏<BR> ","储多给您更多 ， <strong>提供快速兑现</strong>棋牌热门游戏<BR>","日日返水2.5％无上限， <strong>提供快速兑现</strong>棋牌热门游戏<BR>","特邀存送優惠码 50送58，18倍流水， <strong>提供快速兑现</strong>棋牌热门游戏<BR>");
$body4=array("惠仲买车专线huc445.com","惠仲祝您顺心dada128.com","惠仲换房专线huc445.com","最后三天优惠，快来加入惠仲吧huc445.com","成功路径dada128.com","微笑专用huc445.com","换女友>专线huc445.com","换车专线dada128.com","惠仲买房专线huc445.com");
$title1=array("huc445.com","dada128.com");
$title2=array("限時新會員惠优","新5款游戏上架","光棍节优惠大放送","现时回馈会员","夏天专案快速出款","青年专案真人直播","庆祝百万会元");
$title3=array("慢了就沒囉!","你還在等什麼?","名額有限,别再犹豫","最后3天把握机会","3亿人都惊呆了","你还不知道吗?","你被边缘了吗?");
$name=array("vip客服","VVIP客服","彩票","平台","Huc");


    $title1_keys=array_rand($title1,1);
    $title2_keys=array_rand($title2,1);
    $title3_keys=array_rand($title3,1);
    $title=$title1[$title1_keys].$title2[$title2_keys].$title3[$area3_keys];
    $today=date("Y-m-d H:i:s");
   //=============body====================================
    $body1_keys=array_rand($body1,1);
    $body2_keys=array_rand($body2,2);
    $body3_keys=array_rand($body3,1);
    $body4_keys=array_rand($body4,1);
    $body="<html><body>";
    $body.=$body1[$body1_keys].$body2[$body2_keys[0]].$body3[$body3_keys].$body2[$body2_keys[1]].$body4[$body4_keys];
    $body.="</body></html>";
   // db select id,email from testimonial where Send='N' order by rand() limit 1
	 $SQL="select id,email from link where Send='N' order by rand() limit 1";
     $result=mysql_query($SQL);
     $row = mysql_fetch_array($result);
     $num=mysql_num_rows($result);
  //=================name========================================
     $name_keys=array_rand($name,1);
     $name="惠仲".$name[$name_keys];
  
  $to = $row['email']; 

  $headers = "MIME-Version: 1.0" . "\r\n";
  $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n"; 
  $headers .= "From: $name <market@huc445.com>"; 
  
        $Check=explode("@",$to);
        if($Check[1] == "qq.com")
        {
           $title=$title." (AD)";
        }

  if(mail("$to", "$title", "$body", "$headers"))
  {
   echo "mail send".$to."success。";
   $sql="update link set Send='Y' where id=".$row['id'];
   mysql_query($sql);
  }
  else 
  {
   echo "mail ".$to."fail！";
  }
  

?>