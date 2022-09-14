    <!-- home section starts here -->
    <section id="home">
        <div class="container">
            <?php include('message.php'); ?>
            <div class="inner_hero">
                <!-- <div class="d-flex align-items-center col-md-8 order-2 order-md-1"> -->
                <div class="hero_content">
                    <span class="name_indi">Hello, I am</span>
                    <h1><?= $select['fname'] . " " . $select['lname'] ?></h1>
                    <p><?= $select['subtitle'] ?></p>
                    <a href="<?php base_url("cv.php") ?>" target="_blank"><button
                            class="button first_btn mb-4 me-4">Download
                            CV</button></a>
                    <a href="<?php base_url("#portfolio") ?>"><button class="button mb-4">my work</button></a>
                </div>

                <!-- <div class="hero_image col-md-4 order-1 order-md-2">
                    <img src="assets/images/MINHAJ.png" alt="banner_image" />
                </div> -->
            </div>
        </div>
    </section>
    <!-- home section ends here -->