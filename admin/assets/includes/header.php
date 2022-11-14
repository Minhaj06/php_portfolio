<!-- header statst here -->
<header id="header" class="position-fixed top-0">
    <div class="container-fluid">
        <nav class="top_nav d-md-flex align-items-center justify-content-between">
            <div class="top_nav_left d-flex align-items-center justify-content-between">
                <a href="./"><img class="logo" src="assets/images/logo.png" alt="logo" /></a>

                <i class="fas fa-bars toggle ms-5"></i>
            </div>

            <div class="top_nav_right mb-3 mb-sm-0">
                <div class="welcome_admin d-flex align-items-center justify-content-between">
                    <div class="top_nav_icons">
                        <div class="notification top_icon_single me-3">
                            <i class="fa-solid fa-bell"></i>
                            <span>22</span>
                        </div>
                        <div class="messege top_icon_single">
                            <i class="fa-solid fa-message"></i>
                            <span>54</span>
                        </div>
                    </div>
                    <p>Welcome, <span><?= $_SESSION['auth_user']['username']; ?></span></p>
                    <img src="<?= "../uploaded_img/" . $_SESSION['auth_user']['username'] . ".jpg" ?>"
                        alt="admin_img" />
                </div>
            </div>
        </nav>
    </div>
</header>
<!-- header ends here -->