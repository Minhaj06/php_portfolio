<!-- sidebar starts here -->
<div class="sidebar close">
    <div class="img_text position-relative d-flex align-items-start">
        <span class="image d-flex align-items-center me-3">
            <img src="assets/images/admin.png" alt="admin_img" />
        </span>
        <div class="text admin_desc d-flex flex-column">
            <span
                class="name"><?= $_SESSION['auth_user']['user_fname'] . " " . $_SESSION['auth_user']['user_lname'] ?></span>
            <span class="profession">Web Developer</span>
        </div>
        <!-- <i class="fa-solid fa-chevron-right toggle"></i> -->
    </div>

    <!-- <div class="side_logo">
        <a href=""><img src="assets/images/logo.png" alt=""></a>
    </div> -->

    <div class="menu_bar">
        <div class="menu">
            <li class="search_box">
                <i class="fa-solid fa-magnifying-glass icon"></i>
                <input type="text" placeholder="Search...">
            </li>
            <ul class="menu_links p-0">
                <li class="nav_link">
                    <a class="active" href="index.php">
                        <i class='fa-solid fa-gauge icon'></i>
                        <span class="text nav_text">Dashboard</span>
                    </a>
                </li>
                <li class="nav_link">
                    <a href="../index.php">
                        <i class='fa-solid fa-home icon'></i>
                        <span class="text nav_text">Home</span>
                    </a>
                </li>
                <li class="nav_link">
                    <a href="view_register.php">
                        <i class='fa-solid fa-users icon'></i>
                        <span class="text nav_text">Registerd users</span>
                    </a>
                </li>
                <li class="nav_link dropdown1">
                    <a href="#">
                        <i class="fa-solid fa-newspaper icon"></i>
                        <span class="text nav_text">Manage blogs</span>
                        <i class='fa-solid fa-chevron-down toggle_icon drop_icon1'></i>
                    </a>
                    <ul class="sub_menu sub_menu1">
                        <li><a href="">add post</a></li>
                        <li><a href="">manage posts</a></li>
                        <li><a href="">add category</a></li>
                        <li><a href="">mange category</a></li>
                    </ul>
                </li>
                <li class="nav_link dropdown2">
                    <a href="#">
                        <i class="fa-solid fa-gear icon"></i>
                        <span class="text nav_text">section control</span>
                        <i class='fa-solid fa-chevron-down toggle_icon drop_icon2'></i>
                    </a>
                    <ul class="sub_menu sub_menu2">
                        <li><a href="home_update.php">Home</a></li>
                        <li><a href="about_update.php">About</a></li>
                        <li><a href="services_update.php">Services</a></li>
                        <li><a href="achievements_update.php">Achievements</a></li>
                        <li><a href="portfolio_update.php">Portfolio</a></li>
                        <li><a href="testimonials_update.php">Testimonials</a></li>
                        <li><a href="hire_me_update.php">hire me</a></li>
                    </ul>
                </li>
                <li class="nav_link">
                    <a href="#">
                        <i class="fa-solid fa-shapes icon"></i>
                        <span class="text nav_text">Analytics</span>
                    </a>
                </li>
            </ul>
        </div>
        <div class="bottom_content">
            <li class="">
                <a href="../logout.php">
                    <i class='fa-solid fa-right-from-bracket icon'></i>
                    <span class="text nav_text">Logout</span>
                </a>
            </li>
            <li class="mode">
                <div class="sun_moon">
                    <i class='fa-solid fa-moon icon moon'></i>
                    <i class='fa-solid fa-sun icon sun'></i>
                </div>
                <span class="mode_text text">Dark mode</span>
                <div class="toggle_switch">
                    <span class="switch"></span>
                </div>
            </li>
        </div>
    </div>
</div>
<!-- sidebar ends here -->