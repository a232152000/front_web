<?php
$filename = "FanPagePictureAndCoverUrl.json";
$pic_cov = "";
if(file_exists($filename)){
	$file = fopen($filename, "r");
	if($file != NULL){
		//當檔案未執行到最後一筆，迴圈繼續執行(fgets一次抓一行)
		while (!feof($file)) {
			$pic_cov .= fgets($file);
		}
		fclose($file);
	}
}
$json_p = $pic_cov;
$pic_cov = json_decode($pic_cov, true);
//echo "送過來的值：".$_GET["g"];

$getKey = $_GET["g"];

$filename = "FanPage.json";
$fanpage_json="";
if(file_exists($filename)){
	$file = fopen($filename, "r");
	if($file != NULL){
		//當檔案未執行到最後一筆，迴圈繼續執行(fgets一次抓一行)
		while (!feof($file)) {
			$fanpage_json .= fgets($file);
		}
		fclose($file);
	}
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
        
    <link rel=stylesheet type="text/css" href="test.css">
    <script src="test.js" language="javascript" type="text/javascript" ></script>
    </head>    
    <body lang="zh-tw" >data-spy="scroll" data-target="#navbar-example">
        <header id='header'>
      <nav id="navbar-example" class="navbar navbar-default navbar-fixed-top">
        <div class='container'>
              <ul class="nav navbar-nav">
                <li class="active"><a href="index.html">首頁</a></li>
                <li><a href="#event">遊戲</a></li>
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
        
        <div id="list">
            <div id="user">            
                <div id="bg">
                      <?php echo '<h1>'.$getKey.'</h1>'; ?>   
                </div>            
            </div>
        </div>
        <script>
            var game = '<?php echo $getKey; ?>';
            
            var div = document.getElementById("list");
            var fanpage_json = '<?php echo $fanpage_json; ?>';
            fanpage_json = JSON.parse(fanpage_json);
            

            var users_json = '<?php echo $json_p; ?>';
            users_json = JSON.parse(users_json);
            
            var gameNum = Object.keys(fanpage_json).indexOf(game);
            
            var usersNum = fanpage_json[Object.keys(fanpage_json)[gameNum]].length;
            for(var i = 0; i < usersNum; i += 1){
                var usersPos = Object.keys(users_json).indexOf(fanpage_json[Object.keys(fanpage_json)[gameNum]][i][0]);
                div.innerHTML += '<div id="user">'+
                                    '<div id="bg">'+
                                        '<div id="cov">'+
                                            '<img src='+users_json[Object.keys(users_json)[usersPos]].cover+'>'+
                                        '</div>'+
                                        '<div id="pic">'+
                                            '<img id = img_picture src='+users_json[Object.keys(users_json)[usersPos]].picture+'>'+
                                            '<span>'+fanpage_json[Object.keys(fanpage_json)[gameNum]][i][0]+'</span>'+
                                        '</div>'+                                        
                                        '<div id="info">'+
                                            '<span style="color:red;>玩了 : '+fanpage_json[Object.keys(fanpage_json)[gameNum]][i][1]+'次s</span>'+
                                        '</div>'+
                                    '</div>'+
                                '</div>'; 
                div.innerHTML += '<div id="rank">'+
                                            '<img id = img_picture src='+users_json[Object.keys(users_json)[usersPos]].picture+'>'+
                                            '<span>ddddddddddddddddddd</span>'+
                                        '</div>';
            }                                         

        </script>
                      
    </body>
</html>