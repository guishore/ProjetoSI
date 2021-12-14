<?php

session_start();
session_unset();
header('Location: ../login-register.php');
