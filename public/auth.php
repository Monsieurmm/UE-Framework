<?php
session_name("UE-log");
session_start();

$_SESSION['auth']=true;
$_SESSION['nbr']=0;

print("Bienvenue, vous êtes authentifié");