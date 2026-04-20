<?php
    error_reporting(0);// 關閉錯誤訊息
    session_start(); // 啟用 session
    if (!$_SESSION["id"]) { // 檢查是否已登入
        echo "請先登入";
        echo "<meta http-equiv=REFRESH content='3, url=2.login.html'>";
    }
    else{ //顯示歡迎訊息及導覽連結：登出、管理使用者、新增佈告
        echo "歡迎, ".$_SESSION["id"]."[<a href=12.logout.php>登出</a>] [<a href=18.user.php>管理使用者</a>] [<a href=22.bulletin_add_form.php>新增佈告</a>]<br>";
        // 參數分別為：主機位址、帳號、密碼、資料庫名稱
        $conn=mysqli_connect("120.105.96.90", "immust", "immustimmust", "immust");
        // 從 'bulletin' 資料表中選取所有欄位的所有資料
        $result=mysqli_query($conn, "select * from bulletin"); // 取得所有佈告資料
        echo "<table border=2><tr><td></td><td>佈告編號</td><td>佈告類別</td><td>標題</td><td>佈告內容</td><td>發佈時間</td></tr>";
        // 使用 mysqli_fetch_array() 逐筆抓取資料，直到沒有資料為止
        while ($row=mysqli_fetch_array($result)){
            echo "<tr><td><a href=26.bulletin_edit_form.php?bid={$row["bid"]}>修改</a> 
            <a href=28.bulletin_delete.php?bid={$row["bid"]}>刪除</a></td><td>";
            echo $row["bid"];// 佈告編號
            echo "</td><td>";
            echo $row["type"];// 佈告類別
            echo "</td><td>"; 
            echo $row["title"];// 標題
            echo "</td><td>";
            echo $row["content"]; // 內容
            echo "</td><td>";
            echo $row["time"]; // 發佈時間
            echo "</td></tr>";
        }
        echo "</table>"; // 表格結束
     
    }

?>