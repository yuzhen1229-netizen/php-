<?php
// 關閉錯誤訊息
error_reporting(0);

// 啟動 Session
session_start();

// 檢查是否登入
if (!$_SESSION["id"]) {
    echo "請登入帳號";
    echo "<meta http-equiv=REFRESH content='3, url=2.login.html'>";
}
else {

    // 建立資料庫連線
    $conn=mysqli_connect("120.105.96.90","immust","immustimmust","immust");

    // 新增使用者資料
    $sql="insert into user(id,pwd)
          values('{$_POST['id']}','{$_POST['pwd']}')";

    // 執行 SQL 指令
    if(!mysqli_query($conn,$sql)){
        echo "新增命令錯誤";
    }
    else{
        echo "新增使用者成功，三秒鐘後回到網頁";
        echo "<meta http-equiv=REFRESH content='3, url=18.user.php'>";
    }
}
?>