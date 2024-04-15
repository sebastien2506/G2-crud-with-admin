<?php

// si on essaye de se déconnecter (administratorDisconnect nous redirige vers l'accueil)
if(isset($_GET['disconnect'])) administratorDisconnect();

// chargement de la vue de l'accueil de l'administration
require "../view/private/admin.homepage.html.php";