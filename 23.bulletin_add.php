<?php
    // 關閉錯誤 + 啟動 Session
    error_reporting(0);
    session_start();

    // 檢查是否登入
    if (!$_SESSION["id"]) {
        echo "please login first";
        echo "<meta http-equiv=REFRESH content='3, url=2.login.html'>";
    }
    else {

        // 連接資料庫
        $conn=mysqli_connect("120.105.96.90","immust","immustimmust","immust");

        // 新增佈告 SQL
        $sql="insert into bulletin(title, content, type, time)
              values(
                  '{$_POST['title']}',
                  '{$_POST['content']}',
                  {$_POST['type']},
                  '{$_POST['time']}'
              )";

        // 執行 SQL
        if(!mysqli_query($conn,$sql)){
            echo "新增命令錯誤";
        }
        else{
            echo "新增佈告成功，三秒後回到網頁";
        }

        // 返回佈告列表
        echo "<meta http-equiv=REFRESH content='3, url=11.bulletin.php'>";
    }
?>