<!DOCTYPE html>
<?php
session_start();

if (!isset($_SESSION['user_data'])) {
    header("location: ./pages/welcome.php");
}

if (isset($_POST["addPost"])) {
    $post = $conn->real_escape_string($_POST['post']);
}

// LOOP THROUGH USER INFO

require_once './database/giverapp-functions.php';
$user_object    = new GiverAppFunctions;
foreach ($_SESSION['user_data'] as $key => $value) {
    $user_id        = $value['id'];
    $promo          = $value['promo'];
    $user_firstname = $value['firstname'];
    $user_lastname  = $value['lastname'];
}

// SET USER ID IN ORDER TO LOAD MESSAGES FROM ITS ID
$user_object->setUserId($user_id);

// WHEN PAGE LOADS, LOAD THE CHAT DATA
require_once './database/giverchat-functions.php';
$chat_object = new GiverChatFunctions;
$chat_data = $chat_object->get_all_chat_data();

// HTML FROM THE PAGE
$nombre_de_pagina = "INICIO | GIVER";
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Name of the page saved in variable -->
    <title><?php echo $nombre_de_pagina ?></title>

    <!-- Stylesheets -->
    <link rel="shortcut icon" href="./resources/img/icons/giverlogo.ico" type="image/x-icon">
    <link rel="stylesheet" href="./resources/style/general-styles.css">
    <link rel="stylesheet" href="./resources/style/app.css">

    <!-- FONTS -->
    <link rel="stylesheet" href="../Superate-GivingBack_App/resources/fontawesome-free/css/all.css">

    <script src="./remove-banner.js"></script>
    <!-- PUSHER CONNECTION -->
    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
    <script>
        // Enable pusher logging - don't include this in production
        Pusher.logToConsole = true;

        var pusher = new Pusher('dcffce94095e36ccd002', {
            cluster: 'us2'
        });

        var channel = pusher.subscribe('giver-app');
        channel.bind('my-event', function(data) {
            // alert(JSON.stringify(data));
            let user_name = $('#msg_userFirstName').val() + ' ' + $('#msg_userLastName').val();
            if (data.user_name == user_name) {
                var from = "Me";
                var bg_class = "message-from-me";
            } else {
                var from = data.user_name;
                var bg_class = "message-from-someone"
            }

            let chatjoinedmessage = `
            <div class="message-box ${bg_class}">
                    <div class="message-profile">Photo</div>
                    <div class="message-body">
                        <div class="message-user">
                            <div class="message-user-name">${from}</div>
                            <div class="message-user-promo">${data.promo}</div>
                        </div>
                        <div class="message-content">
                            ${data.message}
                        </div>
                    </div>
                </div>
            `;

            $('#message-box').append(chatjoinedmessage);
        });
    </script>

    <!-- MANIFEST - MAKES THE PAGE AN APP -->
    <link rel="manifest" href="./manifest.json">
</head>

<body>


    <div class="hidden message">
        <p>No compatible con este dispositivo.</p>
        <p>Abrir desde un móvil</p>
    </div>
    <div id="loader-wrapper">
        <div id="loader-centered">

            <div id="loader"></div>

            <div class="loader-section section-left"></div>
            <div class="loader-logo section-left"></div> <!-- This is the logo, a bit bug but.. works -->
            <div class="loader-section section-right"></div>

        </div>
    </div>
    <main>
        <div class="content">
            <input type="hidden" id="msg_userFirstName" value="<?php echo $user_firstname; ?>">
            <input type="hidden" id="msg_userLastName" value="<?php echo $user_lastname; ?>">
            <input type="hidden" id="msg_userid" value="<?php echo $user_id; ?>">
            <input type="hidden" id="msg_promo" value="<?php echo $promo; ?>">
            <div class="top-message-box">
                <span>Hola, <b><?php echo ($_COOKIE['username']); ?></b></span>
                <span>Esto es lo nuevo para tí</span>
            </div>
            <div class="message-box touch-to-up"></div>
            <div id="messages-box" class="main-message-box">

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

        <!-- ADD POST POP UP -->
        <div class="add-post-container">
            <div id="add-post-close" class="add-post-closebtn"><i class="fa-solid fa-circle-xmark"></i></div>
            <form id="message-form" class="add-post-body" method="POST">
                <div class="add-post-userinfo">
                    <div class="profile">Photo</div>
                    <div class="userinfo">
                        <div class="userinfo-name"><b>Jorge González</b></div>
                        <div class="userinfo-promo">Senior</div>
                    </div>
                </div>
                <textarea class="add-post-message" id="message"></textarea>
                <div class="add-post-footer">
                    <div class="footer-icons">
                        <div class="camera-icon">
                            <label for="open-camera">
                                <i class="fa-solid fa-camera"></i>
                            </label>
                            <input id="open-camera" type="file" hidden>
                        </div>
                    </div>
                    <div class="add-post-submitbtn">
                        <input type="submit" value="POST">
                    </div>
                </div>
            </form>
        </div>
        <?php include "./includes/footer-inc.php" ?>
    </main>


    <script>
        if ('serviceWorker' in navigator) {
            window.addEventListener('load', function() {
                navigator.serviceWorker.register('service-worker.js').then(function(
                    registratration) {
                    console.log("Registration with scope: ", registratration.scope);
                }, function(err) {
                    console.log("Registration Failed: ", err);
                })
            })
        }
    </script>
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

            $('.home-btn').addClass('active');
            $('.main-message-box').scrollTop($('.main-message-box')[0].scrollHeight);

            /* *******************
            SEND MESSAGES TO DATABASE
            *********************** */
            $('#message-form').on('submit', function(event) {
                console.log("PreventDeafult");
                event.preventDefault();

                $('.add-post-container').fadeOut(500);

                if ($('#message').val() != '') {

                    var user_id = $('#msg_userid').val();
                    var user_firstname = $('#msg_userFirstName').val();
                    var user_lastname = $('#msg_userLastName').val();
                    var promo = $('#msg_promo').val();
                    var message = $('#message').val();
                    // console.log(message);
                    var data = {
                        user_id: user_id,
                        user_firstname: user_firstname,
                        user_lastname: user_lastname,
                        promo: promo,
                        message: message
                    };

                    $.post('./includes/chat-handler.php', data, function(response) {
                        console.log('THE RESPONSE IS: ' + response);
                    });


                    $('#messages-box').scrollTop($('#messages-box')[0].scrollHeight);
                }
                $('#message')[0].reset();

            });

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
    <!-- <script src="./resources/scripts/install-app.js"></script> -->
</body>

</html>