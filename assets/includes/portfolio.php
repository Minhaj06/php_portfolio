<!-- portfolio section starts here -->
<section id="portfolio">
    <div class="inner_portfolio container vertical_path">
        <div class="content">
            <h2 class="heading"><?= $select['portfolio_title'] ?></h2>
            <p class="para"><?= $select['portfolio_desc'] ?></p>
        </div>

        <div class="port_menu mt-5 mb-5">
            <ul class="p_cats d-lg-flex justify-content-center align-items-center">

                <li class="bottom_space"><span class="p_cat active" data-filter="all">ALL</span></li>

                <?php
                $port_cat_query = mysqli_query($conn, "SELECT port_cat_name FROM `portfolio_category` WHERE port_cat_status = '1' ");

                if (mysqli_num_rows($port_cat_query) > 0) {
                    while ($port_cat_result = mysqli_fetch_array($port_cat_query)) {
                ?>

                <li><span class="p_cat"
                        data-filter="<?= $port_cat_result['port_cat_name'] ?>"><?= $port_cat_result['port_cat_name'] ?></span>
                </li>

                <?php }
                } ?>

            </ul>
            <div class="port_menu_icon d-lg-none">
                <i class="fa-solid fa-bars-staggered"></i>
            </div>
        </div>

        <div class="port_items row g-4 g-lg-5 justify-content-center">

            <?php
            $portfolio_query = mysqli_query($conn, "SELECT * FROM `portfolio_items` LIMIT 6 ");

            if (mysqli_num_rows($portfolio_query) > 0) {
                while ($portfolio_result = mysqli_fetch_array($portfolio_query)) {
            ?>

            <div class="col-xl-4 col-md-6 port_single"
                portfolio_category="<?= $portfolio_result['portfolio_category'] ?>">
                <div>
                    <a href="<?= $portfolio_result['portfolio_url'] ?>">
                        <img src="uploaded_img/<?= $portfolio_result['portfolio_image'] ?>">
                    </a>
                    <div class="overlay_bg">
                        <div class="overlay_content">
                            <h3><?= $portfolio_result['portfolio_name'] ?></h3>
                            <h4><?= $portfolio_result['portfolio_technology'] ?></h4>
                            <p class="para"><?= $portfolio_result['portfolio_description'] ?></p>
                            <a href="<?= $portfolio_result['portfolio_url'] ?>" target="_blank">
                                <button class="button">Live preview</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <?php }
            } ?>

        </div>
        <div class="text-center mt-5 pt-5">
            <a href="portfolio.php"><button class="button">view all</button></a>
        </div>
    </div>
</section>
<!-- portfolio section ends here -->