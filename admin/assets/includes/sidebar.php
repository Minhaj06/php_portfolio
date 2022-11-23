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
            <li title="Search" class="search_box">
                <i class="fa-solid fa-magnifying-glass icon"></i>
                <input type="text" placeholder="Search...">
            </li>
            <ul class="menu_links p-0">
                <li title="Visit Site" class="nav_link">
                    <a href="<?php base_url("") ?>">
                        <i class='fa-solid fa-home icon'></i>
                        <span class="text nav_text">Visit Site</span>
                    </a>
                </li>
                <li title="Dashboard" class="nav_link">
                    <a class="<?php echo $view == 'dashboard' ? 'active' : ''; ?>" href="./">
                        <i class='fa-solid fa-gauge icon'></i>
                        <span class="text nav_text">Dashboard</span>
                    </a>
                </li>

                <li title="Manage Blog Posts" class="nav_link dropdown11">
                    <a class="<?php echo $view == 'blog_update' ? 'active' : ''; ?>" href="posts">
                        <i class="fa-solid fa-newspaper icon"></i>
                        <span class="text nav_text">Manage Posts</span>
                    </a>
                </li>

                <li title="Manage Project Posts" class="nav_link dropdown22">
                    <a class="<?php echo $view == 'project_update' ? 'active' : ''; ?>" href="projects">
                        <i class="fa-solid fa-code icon"></i>
                        <span class="text nav_text">Manage Projects</span>
                    </a>
                </li>

                <li title="Manage Portfolio" class="nav_link">
                    <a class="<?php echo $view == 'portfolio_update' ? 'active' : ''; ?>" href="portfolio">
                        <i class="fa-solid fa-list-check icon"></i>
                        <span class="text nav_text">Manage Portfolio</span>
                    </a>
                </li>

                <li title="Manage Testimonials" class="nav_link">
                    <a class="<?php echo $view == 'testimonials_update' ? 'active' : ''; ?>" href="testimonials">
                        <i class="fa-regular fa-star-half-stroke icon"></i>
                        <span class="text nav_text">Testimonials</span>
                    </a>
                </li>

                <li title="Section Control" class="nav_link dropdown3">
                    <a class="<?php echo $view == 'home_update' || $view == 'about_update' || $view == 'services_update' ||  $view == 'achievements_update' ||  $view == 'hire_me_update' ? 'active' : '' ?>"
                        href="javascript: void(0)">
                        <i class="fa-solid fa-gears icon"></i>
                        <span class="text nav_text">section control</span>
                        <i class='fa-solid fa-chevron-down toggle_icon drop_icon3'></i>
                    </a>
                    <ul class="sub_menu sub_menu3">
                        <li>
                            <a class="<?php echo $view == 'home_update' ? 'sub_active' : ''; ?>" href="home">Home</a>
                        </li>
                        <li>
                            <a class="<?php echo $view == 'about_update' ? 'sub_active' : ''; ?>" href="about">About</a>
                        </li>
                        <li>
                            <a class="<?php echo $view == 'services_update' ? 'sub_active' : ''; ?>"
                                href="services">Services</a>
                        </li>
                        <li>
                            <a class="<?php echo $view == 'achievements_update' ? 'sub_active' : ''; ?>"
                                href="achievements">Achievements</a>
                        </li>
                        <li>
                            <a class="<?php echo $view == 'hire_me_update' ? 'sub_active' : ''; ?>" href="hire-me">hire
                                me</a>
                        </li>
                    </ul>
                </li>

                <li title="Site Settings" class="nav_link">
                    <a class="<?php echo $view == 'site_settings' ? 'active' : ''; ?>" href="site-settings">
                        <i class="fa-solid fa-gear icon"></i>
                        <span class="text nav_text">Site Settings</span>
                    </a>
                </li>

                <li title="Users" class="nav_link">
                    <a class="<?php echo $view == 'view_register' ? 'active' : ''; ?>" href="users">
                        <i class='fa-solid fa-users icon'></i>
                        <span class="text nav_text">Users</span>
                    </a>
                </li>

                <li title="Analytics" class="nav_link">
                    <a class="<?php echo $view == 'analytics' ? 'active' : ''; ?>" href="#">
                        <i class="fa-solid fa-shapes icon"></i>
                        <span class="text nav_text">Analytics</span>
                    </a>
                </li>
            </ul>
        </div>
        <div class="bottom_content">
            <li title="Logout" class="">
                <a href="../logout">
                    <i class='fa-solid fa-right-from-bracket icon'></i>
                    <span class="text nav_text">Logout</span>
                </a>
            </li>
            <li title="Change Theme" class="mode">
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