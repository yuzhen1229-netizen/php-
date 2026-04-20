<html>
    <head><title>使用者管理</title></head>
    <body>
    <?php
        error_reporting(0);  // 關閉錯誤訊息
        session_start(); // 啟用 session
        // 若 Session 中沒有 id，代表使用者未經過登入程序，強制導回
        if (!$_SESSION["id"]) {
            echo "請登入帳號";
            // 3秒後自動跳轉至 2.login.html
            echo "<meta http-equiv=REFRESH content='3, url=2.login.html'>";
        }
        else{   
            // 顯示頁面標題與功能選單
            echo "<h1>使用者管理</h1>
                [<a href=14.user_add_form.php>新增使用者</a>] [<a href=11.bulletin.php>回佈告欄列表</a>]<br>
                <table border=1>
                    <tr><td></td><td>帳號</td><td>密碼</td></tr>";
            //伺服器：120.105.96.90，帳號：immust，密碼：immustimmust，資料庫：immust
            $conn=mysqli_connect("120.105.96.90", "immust", "immustimmust", "immust");
            // 從 'user' 資料表中取出所有的欄位與資料
            $result=mysqli_query($conn, "select * from user"); // 取得所有使用者資料
            // mysqli_fetch_array 會將每一列資料存入 $row 陣列中
            while ($row=mysqli_fetch_array($result)){
               // 產生「修改」與「刪除」連結，並透過 GET 方法傳遞該帳號的 ID
                echo "<tr><td><a href=19.user_edit_form.php?id={$row['id']}>修改</a>||<a href=17.user_delete.php?id={$row['id']}>刪除</a></td><td>{$row['id']}</td><td>{$row['pwd']}</td></tr>";
            }// 顯示帳號 (id) 與 密碼 (pwd)
           //  關閉表格 
            echo "</table>";
        }
    ?> 
    </body>
</html>