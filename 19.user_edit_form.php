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

        // 查詢指定使用者資料（GET傳入id）
        $result=mysqli_query($conn,"select * from user where id='{$_GET['id']}'");

        // 取出資料
        $row=mysqli_fetch_array($result);

        // 顯示修改表單（預填資料）
        echo "
        <form method=post action=20.user_edit.php>

            <!-- 隱藏帳號（不允許修改） -->
            <input type=hidden name=id value={$row['id']}>

            帳號：{$row['id']}<br>

            <!-- 可修改密碼 -->
            密碼：<input type=text name=pwd value={$row['pwd']}><p></p>

            <input type=submit value=修改>
        </form>
        ";
    }
?>