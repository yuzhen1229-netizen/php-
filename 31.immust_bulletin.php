<?php
    // 連接資料庫
    $conn=mysqli_connect("120.105.96.90","immust","immustimmust","immust");

    // 查詢所有佈告資料
    $result=mysqli_query($conn,"select * from bulletin");

    // 建立表格標題
    echo "<table border=2>
            <tr>
                <th>編號</th>
                <th>類別</th>
                <th>標題</th>
                <th>內容</th>
                <th>時間</th>
            </tr>";

    // 一筆一筆讀資料
    while($row=mysqli_fetch_array($result)){

        echo "<tr>";

        // 編號
        echo "<td>".$row["bid"]."</td>";

        // 類別判斷
        if($row["type"]==1) $type="系上公告";
        if($row["type"]==2) $type="獲獎資訊";
        if($row["type"]==3) $type="徵才資訊";
        echo "<td>".$type."</td>";

        // 標題 / 內容 / 時間
        echo "<td>".$row["title"]."</td>";
        echo "<td>".$row["content"]."</td>";
        echo "<td>".$row["time"]."</td>";

        echo "</tr>";
    }

    // 關閉表格
    echo "</table>";
?>