<!DOCTYPE html>

<?php
$nombre_de_pagina = "AJUSTES | GIVER";
include_once '../includes/header-inc.php'; ?>

</head>

<body>
    <div class="hidden message">
        <div class="message-content">
            <i class="fa-solid fa-mobile"></i>
            <p>Gira el celular</p>
        </div>
    </div>
    <main>
        <header class="header-title">
            <a href="./account.php" class="return-btn"><i class="fas fa-caret-left"></i></a>
            <p>Settings
            <p>
        </header>
        <nav>
            <!--menu-->
            <ul class="nav-menu">
                <a href="account.php" class="nav-main_link-item">
                    <i class="far fa-user-circle"></i>
                    Cuenta
                </a>
                <a href="#" class="nav-main_link-item">
                    <i class="far fa-bell"></i>
                    Eventos
                </a>
                <a href="idioma.html" class="nav-main_link-item">
                    <i class="fas fa-globe"></i>
                    Idioma
                </a>
                <a href="#" class="nav-main_link-item">
                    <i class="fa-solid fa-circle-info"></i>
                    Información
                </a>
                <a href="../logout.php" class="nav-main_link-item">
                    <i class="fas fa-sign-out-alt"></i>
                    Cerrar Sesión
                </a>
            </ul>
        </nav>
        <div class="logos">
            <img class="giver-logo" src="../resources/img/giverlogooriginal.svg" alt="">
            <img class="superate-logo" src="../resources/img/superatelogo.png" alt="">
        </div>

    </main>
</body>

</html>