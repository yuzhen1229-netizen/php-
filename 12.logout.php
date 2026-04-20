<?php
    session_start(); // 啟用 session
    unset($_SESSION["id"]); // 清除使用者 session
    echo "登出成功....";
    echo "<meta http-equiv=REFRESH content='3; url=2.login.html'>"; // 3 秒後回登入頁

?>