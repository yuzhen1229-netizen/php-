<?php
    // 關閉錯誤訊息 + 啟動 Session
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

        // 刪除指定使用者（GET傳入 id）
        $sql="delete from user where id='{$_GET['id']}'";

        // 執行 SQL
        if(!mysqli_query($conn,$sql))
            echo "使用者刪除錯誤";
        else
            echo "使用者刪除成功";

        // 回到使用者列表
        echo "<meta http-equiv=REFRESH content='3, url=18.user.php'>";
    }
?>