<?php
session_start();

if (!isset($_SESSION['userID'])) {
    session_unset();
    session_destroy();
    header("location: ./pages/welcome.php");
} else {
    echo "PROBANDO LA PARTE DE MENSAJERÍA";
};

include './database/connect-db.php';

if(isset($_POST["addPost"])) {
    $post = $conn -> real_escape_string($_POST['post']);

    // $conn -> query("INSERT INTO messages (user_id, messages) VALUES ('".$_SESSION['userID']"', '$post', NOW())");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "./includes/meta-inc.php" ?>
    <title>Home</title>
    <link rel="stylesheet" href="./resources/style/homestyles.css">
    <script src="https://kit.fontawesome.com/38243fb2c1.js" crossorigin="anonymous"></script>
    <!-- MANIFEST - MAKES THE PAGE AN APP -->
    <link rel="manifest" href="../manifest.json">
</head>
<body>
    <div id="WelcomeDiv">
            <div id="loader-wrapper">
                <div id="loader"></div>

                <div class="loader-section section-left"></div>
                <div class="loader-section section-right"></div>

            </div>
    </div>

    
    <?php include "./includes/footer-inc.php" ?>   

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    if ('serviceWorker' in navigator) {
            window.addEventListener('load', function(){
                navigator.serviceWorker.register('service-worker.js').then(function(
                    registratration) {
                    console.log("Registration with scope: "
                    , registratration.scope);
                }, function(err) {
                    console.log("Registration Failed: ", err);
                })
            })
        }
</script>
<script type="text/javascript">
    $(document).ready(function () {
        $("#addPost").on('click', function () {
            var post = $("mainPost").val();

            if (post.length > 5) {
                $.ajax({
                    url: "index.php",
                    method: "POST",
                    dataType: "text",
                    data: {
                        addPost: 1,
                        post: post
                    }, success: function (response) {
                        console.log(response);
                    }
                })
            }
        })
    })

</script>
</body>
</html>