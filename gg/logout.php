<?php

    require_once("db.inc.php");

    session_destroy();

    header("Location: index.php");