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

        // 更新使用者密碼（POST傳入 id + pwd）
        $sql="update user set pwd='{$_POST['pwd']}' where id='{$_POST['id']}'";

        // 執行 SQL
        if(!mysqli_query($conn,$sql)){
            echo "修改錯誤";
        }
        else{
            echo "修改成功，三秒後回到網頁";
        }

        // 回到使用者列表
        echo "<meta http-equiv=REFRESH content='3, url=18.user.php'>";
    }
?>