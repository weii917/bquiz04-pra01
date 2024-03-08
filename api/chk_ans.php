<?php
session_start();
echo ($_SESSION['ans'] == $_POST['ans']) ? 1 : 0;
