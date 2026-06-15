<?php
    // 關閉錯誤 + 啟動 Session
    error_reporting(0);
    session_start();

    // 檢查是否登入
    if (!$_SESSION["id"]) {
        echo "請登入帳號";
        echo "<meta http-equiv=REFRESH content='3, url=2.login.html'>";
    }
    else {

        // 連接資料庫
        $conn=mysqli_connect("120.105.96.90","immust","immustimmust","immust");

        // 刪除指定佈告（GET傳入 bid）
        $sql="delete from bulletin where bid='{$_GET['bid']}'";

        // 執行 SQL
        if(!mysqli_query($conn,$sql)){
            echo "佈告刪除錯誤";
        }
        else{
            echo "佈告刪除成功";
        }

        // 返回佈告列表
        echo "<meta http-equiv=REFRESH content='3, url=11.bulletin.php'>";
    }
?>