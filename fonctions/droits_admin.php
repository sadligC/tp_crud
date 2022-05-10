<?php

if (!isset($_SESSION) || $_SESSION ["role"] != 1) {
    header ('Location:interdit.php');
}

?>