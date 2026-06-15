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

        // 查詢指定佈告 (GET帶 bid)
        $result=mysqli_query($conn,"select * from bulletin where bid={$_GET['bid']}");
        $row=mysqli_fetch_array($result);

        // radio預設勾選
        $checked1="";
        $checked2="";
        $checked3="";

        if($row['type']==1) $checked1="checked";
        if($row['type']==2) $checked2="checked";
        if($row['type']==3) $checked3="checked";

        // 顯示修改表單（預填資料）
        echo "
        <form method=post action=27.bulletin_edit.php>

            佈告編號：{$row['bid']}
            <input type=hidden name=bid value={$row['bid']}><br>

            標題：<input type=text name=title value={$row['title']}><br>

            內容：
            <textarea name=content rows=20 cols=20>{$row['content']}</textarea><br>

            類型：
            <input type=radio name=type value=1 {$checked1}>系上公告
            <input type=radio name=type value=2 {$checked2}>獲獎資訊
            <input type=radio name=type value=3 {$checked3}>徵才資訊<br>

            日期：
            <input type=date name=time value={$row['time']}><br>

            <input type=submit value=修改佈告>
            <input type=reset value=清除>

        </form>
        ";
    }
?>