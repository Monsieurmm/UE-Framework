<?php
session_name("UE-log");
session_start();

if (isset($_SESSION['auth']) && $_SESSION['auth']=true) {
    print("Nombre de fois où vous êtes venu ".++$_SESSION['nbr']);
} else {
    print("Vous n'avez pas le droit d'accéder à cette page.");
}
