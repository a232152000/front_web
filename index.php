<?php

  set_time_limit(0);

  if(@isset($_POST[fb_token]))
  {
    $fb_token = $_POST[fb_token];
    echo("Congratulations!\n");
    system("python get_fanpage_posts.py $fb_token",$ret);
    echo("ret is $ret");
  }
?>
<!DOCTYPE html>
<html lang="tw">

  <head>
    <meta http-equiv="Content-Language" content="zh-tw" />
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, minimal-ui" />

    <title></title>

    <link href="css/public.css" rel="stylesheet" type="text/css" />
    <link href="css/icon.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="css/bootstrap.css">

    <script src="js/jquery_v1.10.2/jquery-1.10.2.min.js" language="javascript" type="text/javascript" ></script>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js" type="text/javascript"></script>
    <script src="js/bootstrap.js" type="text/javascript"></script>

    <script src="js/imgLiquid-min.js"></script>
    <script src="js/public.js" language="javascript" type="text/javascript" ></script>


    <script type="text/javascript">
    $(function(){
    $('body').scrollspy({ target: '#navbar-example' })
    });
    </script>


    <script type="text/javascript">
      $(function(){
        $("ul>li>a").click(function(event) {
          event.preventDefault();
          var ref = $(this).attr("href");
          $("body,html").animate({scrollTop: $(ref).offset().top },1000);
        });
        $('body').scrollspy({target: '#navbar-example'})
      });
      </script>

  </head>

  <body lang="zh-tw" >data-spy="scroll" data-target="#navbar-example">
    <header id='header'>
      <nav id="navbar-example" class="navbar navbar-default navbar-fixed-top">
        <div class='container'>
              <ul class="nav navbar-nav">
                <li class="active"><a href="#top">首頁</a></li>
                <li><a href="#event">遊戲</a></li>
                <li><a href="#end">即時分析</a></li>
              </ul>
        </div>
      </nav>
    </header>

    <div id='top'>
      <div class='logo'>實況主所玩熱門遊戲</div>
    </div>

    <div id='banner'>
        <div class='container'>
          <div>實況主最近都在玩那些熱門遊戲?</div>
          <h1>遊戲被那些實況主玩</h1>
        </div>
      </div>


      <div id='event'>
        <div class='container'>
          <header>
            <h2>熱門遊戲</h2>
          </header>

        <div class='events'>

          <a class='event' href="discussion.php?g=尼爾：自動人形">
            <img src='img/events/1.png' />
            <span>尼爾：自動人形</span>
          </a>
          <a class='event' href="discussion.php?g=鐵拳7">
            <img src='img/events/2.png' />
            <span>鐵拳7</span>
          </a>
          <a class='event' href="discussion.php?g=DOTA2">
            <img src='img/events/3.png' />
            <span>DOTA2</span>
          </a>
          <a class='event' href="discussion.php?g=天堂2：革命">
            <img src='img/events/4.png' />
            <span>天堂2：革命</span>
          </a>
          <a class='event' href="discussion.php?g=十三號星期五">
            <img src='img/events/5.png' />
            <span>十三號星期五</span>
          </a>
          <a class='event' href="discussion.php?g=伊蘇8">
            <img src='img/events/6.png' />
            <span>伊蘇8</span>
          </a>
          <a class='event' href="discussion.php?g=崩壞3rd">
            <img src='img/events/7.png' />
            <span>崩壞3rd</span>
          </a>
          <a class='event' href="discussion.php?g=完全征服">
            <img src='img/events/8.png' />
            <span>完全征服</span>
          </a>
          <a class='event' href="discussion.php?g=爐石戰記">
            <img src='img/events/9.png' />
            <span>爐石戰記</span>
          </a>
          <a class='event' href="discussion.php?g=Dead Cells">
            <img src='img/events/10.png' />
            <span>Dead Cells</span>
          </a>
          <a class='event' href="discussion.php?g=星宮獵手">
            <img src='img/events/11.png' />
            <span>星宮獵手</span>
          </a>
          <a class='event' href="discussion.php?g=暴雪英霸">
            <img src='img/events/12.png' />
            <span>暴雪英霸</span>
          </a>
          <a class='event' href="discussion.php?g=鬥陣特攻">
            <img src='img/events/13.png' />
            <span>鬥陣特攻</span>
          </a>
          <a class='event' href="discussion.php?g=熾焰帝國2">
            <img src='img/events/14.png' />
            <span>熾焰帝國2</span>
          </a>
          <a class='event' href="discussion.php?g=陰陽師">
            <img src='img/events/15.png' />
            <span>陰陽師</span>
          </a>
          <a class='event' href="discussion.php?g=夢幻龍族">
            <img src='img/events/16.png' />
            <span>夢幻龍族</span>
          </a>
          <a class='event' href="discussion.php?g=傳說對決">
            <img src='img/events/17.png' />
            <span>傳說對決</span>
          </a>
          <a class='event' href="discussion.php?g=新世界的神">
            <img src='img/events/18.png' />
            <span>新世界的神</span>
          </a>
          <a class='event' href="discussion.php?g=闇影詩章">
            <img src='img/events/19.png' />
            <span>闇影詩章</span>
          </a>
          <a class='event' href="discussion.php?g=LOL">
            <img src='img/events/20.png' />
            <span>英雄聯盟</span>
          </a>
          <a class='event' href="discussion.php?g=仙劍奇俠傳">
            <img src='img/events/21.png' />
            <span>仙劍奇俠傳</span>
          </a>
          <a class='event' href="discussion.php?g=千姬大亂鬥">
            <img src='img/events/22.png' />
            <span>千姬大亂鬥</span>
          </a>
          <a class='event' href="discussion.php?g=陰屍路">
            <img src='img/events/23.png' />
            <span>陰屍路</span>
          </a>
          <a class='event' href="discussion.php?g=麥當勞報報">
            <img src='img/events/24.png' />
            <span>麥當勞報報</span>
          </a>
          <a class='event' href="discussion.php?g=技嘉科技">
            <img src='img/events/25.png' />
            <span>技嘉科技</span>
          </a>
          <a class='event' href="discussion.php?g=夢幻誅仙">
            <img src='img/events/26.png' />
            <span>夢幻誅仙</span>
          </a>
        </div>

      </div>
    </div>

<br>
<br>

    <div id='end'>
      <div class='container'>
        <header>
          <h2>即時分析</h2>

          <form action="index.php" method="post">
　           FB_token:
            <input type="test" name="fb_token">
　          <input type="submit" value="進行分析">
          </form>
        </header>
      </div>
    </div>

  </body>
</html>
