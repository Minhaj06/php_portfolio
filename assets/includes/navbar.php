    <!-- header starts here -->
    <header id="navbar" class="position-fixed w-100 top-0">
        <div class="container">
            <nav class="inner_nav d-flex align-items-center justify-content-between">
                <div class="logo">
                    <a href="<?php base_url("") ?>"><img src="<?php base_url("assets/images/logo.png") ?>" alt="" /></a>
                </div>
                <div class="main_menu">

                    <?php
                    // if (isset($home_index) && $home_index == base_url("")) {
                    //     function index()
                    //     {
                    //         echo "";
                    //     };
                    // } else {
                    //     function index()
                    //     {
                    //         base_url("");
                    //     };
                    // }
                    ?>

                    <ul>
                        <li>
                            <a class="menu_link active" href="<?php base_url("#home") ?>">home</a>
                        </li>
                        <li>
                            <a class="menu_link" href="<?php base_url("#skill_area") ?>">about me</a>
                        </li>
                        <li>
                            <a class="menu_link" href="<?php base_url("#services") ?>">services</a>
                        </li>
                        <li>
                            <a class="menu_link" href="<?php base_url("#portfolio") ?>">portfolio</a>
                        </li>
                        <li>
                            <a class="menu_link" href="<?php base_url("#projects") ?>">code projects</a>
                        </li>
                        </li>
                        <li><a class="menu_link" href="<?php base_url("#blogs") ?>">blogs</a></li>
                        <li>
                            <a class="menu_link" href="#footer">contact us</a>
                        </li>

                        <?php if (isset($_SESSION['auth_user']) && $_SESSION['auth_role'] == 1) { ?>

                        <li class="dropdown">
                            <a class="menu_link" href="javascript: void(0)">
                                <?= $_SESSION['auth_user']['username']; ?><i class="fa-solid fa-chevron-down ps-3"></i>
                            </a>
                            <ul class="dropdown_menu flex-column">
                                <li>
                                    <a class="dropdown_item" href="<?php base_url("user_profile.php") ?>">my profile</a>
                                </li>
                                <li>
                                    <a class="dropdown_item" href="<?php base_url("admin/index.php") ?>"
                                        target="_blank">dashboard</a>
                                </li>
                                <li>
                                    <a class="dropdown_item" href="<?php base_url("logout.php") ?>">logout</a>
                                </li>
                            </ul>
                        </li>

                        <?php } elseif (isset($_SESSION['auth_user'])) { ?>

                        <li class="dropdown">
                            <a class="menu_link" href="#">
                                <?= $_SESSION['auth_user']['username']; ?><i class="fa-solid fa-chevron-down ps-3"></i>
                            </a>
                            <ul class="dropdown_menu flex-column">
                                <li>
                                    <a class="dropdown_item" href="<?php base_url("user_profile.php") ?>">my profile</a>
                                </li>
                                <li>
                                    <a class="dropdown_item" href="<?php base_url("logout.php") ?>">logout</a>
                                </li>
                            </ul>
                        </li>

                        <?php } else { ?>

                        <li>
                            <a class="menu_link" href="<?php base_url("login.php") ?>">login</a>
                        </li>
                        <li>
                            <a class=" menu_link"
                                href="<?php base_url("login.php?action=user-registration") ?>">Register</a>
                        </li>

                        <?php } ?>

                        <li>
                            <a class="hire_btn" href="<?php base_url("#hire_me") ?>">hire me!</a>
                        </li>
                    </ul>
                </div>
                <div class="menu_btn">
                    <i class="fas fa-bars"></i>
                </div>
            </nav>
        </div>
    </header>
    <!-- header ends here -->