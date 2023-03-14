<?php

    session_start();
    session_destroy();
    header("location: log_in_page.php");

?>