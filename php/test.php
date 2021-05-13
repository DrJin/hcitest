<?php
setcookie("index", ++$_COOKIE["index"]);
$list = ["Magnifier", "PinchZoom", "TouchZoom"];
?>
<!DOCTYPE html>
<html>

    <head>
        <script>
            var method = <? echo json_encode($list[ $_COOKIE["index"]%3 ]) ?>;
        </script>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, user-scalable=no">
        <link rel="stylesheet" href="../css/info.css">
        <link rel="stylesheet" href="../css/methods.css">
        <script type="text/javascript" src="../js/magnifier.js"></script>
        <script src="https://unpkg.com/pinch-zoom-js"></script>
    </head>

<body>
    <div class="layer">
        <div style="text-align:center;">

            <!-- 여기부터 실제 내용물 -->
            <h1 id="direction">이렇게 하세요.</h1>
            <script>
                switch(method){
                    case "Magnifier":
                        document.getElementById("direction").innerText="돋보기를 통해 다음을 찾으세요.";
                        break;
                    case "PinchZoom":
                        document.getElementById("direction").innerText="두 손가락으로 확대하여 다음을 찾으세요.";
                        break;
                    case "TouchZoom":
                        document.getElementById("direction").innerText="더블 터치로 확대하여 다음을 찾으세요.";
                        break;

                }
            </script>
            <div class="img-magnifier-container" id="element">
                <img id="image" src="" width="600" height="400" alt="image">
            <script>
                switch(parseInt(<?echo $_COOKIE["index"]?> / 3)){
                    case 0:
                        document.getElementById("image").src = "../images/subway.png";
                        break;
                    case 1:
                        document.getElementById("image").src = "../images/wally.jpg";
                        break;
                    case 2:
                        document.getElementById("image").src = "../images/text.jpg";
                        break;
                }
            </script>
            </div>
            <script>
                switch(method){
                    case "Magnifier":
                        magnify("image",3);
                        break;
                    case "PinchZoom":
                        document.getElementById("element").className +=" pinch-zoom";
                        break;
                }
                
            </script>
            <br>
            
            <?if($_COOKIE["index"] <8) :?>
                <input type="button"  value="다음" onclick="location.replace('./test.php')">
            <?else :?>
                <input type="button"  value="다음" onclick="location.replace('./vote.php')">
            <?endif?>
            

        </div>
    
    </div>
</body>

</html>