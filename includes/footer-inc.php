<footer class="footer-container">
    <div class="footer-navigation">
        <ul>
            <!-- HOME BUTTON -->
            <li class="list home-btn"> <!-- active -->
                <a href="#">
                    <span class="icon">
                        <i class="fa-solid fa-house"></i>
                        <!-- <ion-icon name="home-outline"></ion-icon> -->
                    </span>
                    <span class="text">Inicio</span>
                </a>
            </li>
            <!-- EVENTS BUTTON -->
            <li class="list notifications-btn">
                <a href="#">
                    <span class="icon">
                        <i class="fa-solid fa-calendar-day"></i>
                        <!-- <ion-icon name="notifications-outline"></ion-icon> -->
                    </span>
                    <span class="text">Notifications</span>
                </a>
            </li>
            <!-- ADD MESSAGE BUTTON -->
            <li class="list add-btn">
                <a href="#" id="add-post-open">
                    <span class="icon" style="color: #fff;">
                        <i class="fa-regular fa-plus"></i>
                        <!-- <ion-icon name="add-outline"></ion-icon> -->
                    </span>
                    <span class="text">Post</span>
                </a>
            </li>
            <!-- EVENTs BUTTON -->
            <li class="list event-btn">
                <a href="#">
                    <span class="icon">
                        <i class="fa-regular fa-newspaper"></i>
                        <!-- <ion-icon name="newspaper-outline"></ion-icon> -->
                    </span>
                    <span class="text">Events</span>
                </a>
            </li>
            <!-- USER BUTTON -->
            <li class="list user-btn">
                <a href="../../Superate-GivingBack_App/pages/account.php">
                    <span class="icon">
                        <i class="fa-solid fa-user"></i>
                    </span>
                    <span class="text">Settings</span>
                </a>
            </li>
            <div class="indicator"></div>
        </ul>
    </div>
</footer>

<!-- IONICONS SCRIPTS
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script> -->
<!-- SCRIPTS -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function() {
        lock('portrait');

        // const list = $('.list');
        // function activeLink () {
        //     list.forEach((item)=> 
        //     item.classList.remove('active'));
        //     this.classList.add('active')
        // }
        // list.forEach((item) => 
        // item.addEventListener('click', activeLink));

    })
</script>