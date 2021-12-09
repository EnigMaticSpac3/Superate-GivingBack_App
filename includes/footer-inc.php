<footer class="footer-container">
    <div class="footer-navigation">
        <ul>
            <!-- HOME BUTTON -->
            <li class="list active">
                <a href="#">
                    <span class="icon">
                    <i class="fas fa-home"></i>
                    </span>
                    <span class="text">Inicio</span>
                </a>
            </li>
            <!-- SEARCH BUTTON -->
            <li class="list">
                <a href="#">
                    <span class="icon">
                        <i class="far fa-bell"></i>
                    </span>
                    <span class="text">Notifications</span>
                </a>
            </li>
            <!-- ADD MESSAGE BUTTON -->
            <li class="list add-btn">
                <a href="#">
                    <span class="icon">
                        <i class="fas fa-plus"></i>
                    </span>
                    <span class="text">Post</span>
                </a>
            </li>
            <!-- EVENTs BUTTON -->
            <li class="list">
                <a href="#">
                    <span class="icon">
                        <i class="fas fa-newspaper"></i>
                    </span>
                    <span class="text">Events</span>
                </a>
            </li>
            <!-- CONFIGURATION BUTTON -->
            <li class="list">
                <a href="#">
                    <span class="icon">
                        <i class="fas fa-cog"></i>
                    </span>
                    <span class="text">Settings</span>
                </a>
            </li>
            <div class="indicator"></div>
        </ul>
    </div>
</footer>
<script>
    const list = document.querySelectorAll(".list");
    function activeLink () {
        list.forEach((item)=> 
        item.classList.remove('active'));
        this.classList.add('active')
    }
    list.forEach((item) => 
    item.addEventListener('click', activeLink));
</script>