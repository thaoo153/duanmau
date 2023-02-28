<<?php
    session_start();
    session_destroy();
    header("Location: /duanmau_copy/views/index.php");
    ?>