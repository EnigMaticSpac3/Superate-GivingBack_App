<!DOCTYPE html>
<?php
session_start();
require_once '../database/giverapp-functions.php';

if (!isset($_SESSION['user_data'])) {
  header("location: ../index.php");
}
foreach ($_SESSION['user_data'] as $key => $value) {
  $user_id    =   $value['id'];
  $firstname  =   $value['firstname'];
  $lastname   =   $value['lastname'];
  $promo      =   $value['promo'];
}
$user_object = new GiverAppFunctions;
$user_object->setUserId($user_id);
$user_object->get_user_data_by_id();

require_once '../database/giverchat-functions.php';
$chat_object = new GiverChatFunctions;
$chat_data = $chat_object->get_all_chat_data_descending();

$nombre_de_pagina = "CUENTA | GIVER";
include_once '../includes/header-inc.php';
?>
<link rel="stylesheet" href="../resources/style/app.css">
<link rel="stylesheet" href="../resources/style/account.css">

</head>

<body>

    <div class="hidden message">
        <p>No compatible con este dispositivo.</p>
        <p>Abrir desde un móvil</p>
    </div>
    
    <main>
        <div class="account-content">
            <input type="hidden" id="msg_userFirstName" value="<?php echo $user_firstname; ?>">
            <input type="hidden" id="msg_userLastName" value="<?php echo $user_lastname; ?>">
            <input type="hidden" id="msg_userid" value="<?php echo $user_id; ?>">
            <input type="hidden" id="msg_promo" value="<?php echo $promo; ?>">
            
            <div class="settings-btn"><i class="fa-solid fa-gear"></i></div>
            <div id="messages-box" class="main-box">
                <div class="top-photo"></div>
                <div class="description-box">
                    <div class="name"><b><?php echo $firstname, " ", $lastname ?></b></div>
                    <div class="promo"><?php echo $promo ?></div>
                    <div class="description">[description]</div>
                </div>
                <div class="recent-box">
                <?php
                foreach ($chat_data as $chat) {
                    if ($user_id == $chat['user_id']) {
                        $from               = "Me";
                        $background_class   = "message-from-me";
                    } else {
                        $from               = $chat['user_firstname'] . ' ' . $chat['user_lastname'];
                        $background_class   = 'message-from-someone';
                    }
                ?>
                    <div class="message-box <?php echo $background_class ?>">
                        <div class="message-profile">Photo</div>
                        <div class="message-body">
                            <div class="message-user">
                                <div class="message-user-name"><?php echo $from ?></div>
                                <div class="message-user-promo"><?php echo $chat['promo'] ?></div>
                            </div>
                            <div class="message-content">
                                <?php echo $chat['comment'] ?>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>  
                </div>

            </div>
        </div>

        <?php include "../includes/footer-inc.php" ?>
    </main>


    <script type="text/javascript">
        $(document).ready(function() {
            const list = document.querySelectorAll(".list");

            function activeLink() {
                list.forEach((item) =>
                    item.classList.remove('active'));
                this.classList.add('active')
            }
            list.forEach((item) =>
                item.addEventListener('click', activeLink));
            
            // Menu Settings
            $('.user-btn').addClass('active');
            $('.settings-btn').click(function () { window.location.href = "./settings.php"; })
            $('.add-btn').click(function () { window.location.href = "../app.php"; });
            $('.home-btn').click(function () { window.location.href = "../app.php"; });
            $('.recent-box').scrollTop();

            

            // Open ADD-POST POP-UP
            $('#add-post-open').click(function() {
                $('.add-post-container').fadeIn();
                $('.add-post-container').css('display', 'block');
            });

            // CLOSE ADD-POST POP-UP
            $('#add-post-close').click(function() {
                $('.add-post-container').fadeOut(500);
            });

        })
    </script>
</body>

</html>