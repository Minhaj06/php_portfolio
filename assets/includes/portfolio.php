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

        <div class="port_items row g-5 g-sm-4 g-lg-5 g-xxl-4 justify-content-center">

            <?php
            $portfolio_query = mysqli_query($conn, "SELECT * FROM `portfolio_items` LIMIT 8 ");

            if (mysqli_num_rows($portfolio_query) > 0) {
                while ($portfolio_result = mysqli_fetch_array($portfolio_query)) {
            ?>

            <div class="col-xxl-3 col-xl-4 col-sm-6 port_single"
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
            <button class="button view_all" data-bs-target="#view_all_portfolio_modal" data-bs-toggle="modal">view
                all</button>
        </div>
    </div>
</section>
<!-- portfolio section ends here -->



<!-- Show All Portfolio Modal Starts -->
<div class="modal fade text-capitalize " id="view_all_portfolio_modal" data-bs-backdrop="static">
    <div class="modal-dialog modal-xl modal-fullscreen-xl-down">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title">All Portfolio</h2>
                <i class="fa-solid fa-xmark fs-2" role="button" data-bs-dismiss="modal"></i>
            </div>
            <div class="modal-body py-5" id="modal-body">
                <div class="inner_portfolio container-fluid vertical_path">
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

                    <div class="port_items row g-5 g-sm-4 justify-content-center">

                        <?php
                        $portfolio_query = mysqli_query($conn, "SELECT * FROM `portfolio_items`");

                        if (mysqli_num_rows($portfolio_query) > 0) {
                            while ($portfolio_result = mysqli_fetch_array($portfolio_query)) {
                        ?>

                        <div class="col-lg-4 col-sm-6 port_single"
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
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn fs-4" data-bs-dismiss="modal"
                    style="background-color: var(--gray); color: var(--white)">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- Show All Portfolio Modal Ends -->