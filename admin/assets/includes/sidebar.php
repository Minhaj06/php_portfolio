<!-- sidebar starts here -->
<div class="sidebar hide">

    <div class="img_text position-relative d-flex align-items-start">
        <span class="image d-flex align-items-center me-3">
            <img src="assets/images/admin.png" alt="admin_img" />
        </span>
        <div class="text admin_desc d-flex flex-column">
            <span
                class="name"><?= $_SESSION['auth_user']['user_fname'] . " " . $_SESSION['auth_user']['user_lname'] ?></span>
            <span class="profession">Web Developer</span>
        </div>
    </div>


    <div class="menu_bar">
        <div class="menu">
            <li class="search_box">
                <i class="fa-solid fa-magnifying-glass icon"></i>
                <input type="text" placeholder="Search...">
            </li>
            <ul class="menu_links p-0">
                <li class="nav_link">
                    <a href="<?php base_url("") ?>">
                        <i class='fa-solid fa-home icon'></i>
                        <span class="text nav_text">Home</span>
                    </a>
                </li>
                <li class="nav_link">
                    <a class="active" href="./">
                        <i class='fa-solid fa-gauge icon'></i>
                        <span class="text nav_text">Dashboard</span>
                    </a>
                </li>

                <li class="nav_link dropdown11">
                    <a href="posts">
                        <i class="fa-solid fa-newspaper icon"></i>
                        <span class="text nav_text">Manage Posts</span>
                    </a>
                </li>

                <li class="nav_link dropdown22">
                    <a href="projects">
                        <i class="fa-solid fa-code icon"></i>
                        <span class="text nav_text">Manage Projects</span>
                    </a>
                </li>

                <li class="nav_link">
                    <a href="portfolio">
                        <i class="fa-solid fa-list-check icon"></i>
                        <span class="text nav_text">Manage Portfolio</span>
                    </a>
                </li>

                <li class="nav_link">
                    <a href="testimonials">
                        <i class="fa-regular fa-star-half-stroke icon"></i>
                        <span class="text nav_text">Testimonials</span>
                    </a>
                </li>


                <li class="nav_link dropdown3">
                    <a href="javascript: void(0)">
                        <i class="fa-solid fa-gears icon"></i>
                        <span class="text nav_text">section control</span>
                        <i class='fa-solid fa-chevron-down toggle_icon drop_icon3'></i>
                    </a>
                    <ul class="sub_menu sub_menu3">
                        <li><a href="home">Home</a></li>
                        <li><a href="about">About</a></li>
                        <li><a href="services">Services</a></li>
                        <li><a href="achievements">Achievements</a></li>
                        <li><a href="hire-me">hire me</a></li>
                    </ul>
                </li>

                <li class="nav_link">
                    <a href="site-settings">
                        <i class="fa-solid fa-gear icon"></i>
                        <span class="text nav_text">Site Settings</span>
                    </a>
                </li>

                <li class="nav_link">
                    <a href="users">
                        <i class='fa-solid fa-users icon'></i>
                        <span class="text nav_text">Users</span>
                    </a>
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