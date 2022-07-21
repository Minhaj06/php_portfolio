<!-- services section starts here -->
<section id="services">
    <div class="inner_service container vertical_path">
        <div class="content">
            <h2 class="heading">
                <?= $select['service_title'] ?>
            </h2>
            <p class="para">
                <?= $select['service_desc'] ?>
            </p>
        </div>
        <div class="service_box row g-5">

            <?php
            $serv_itmes_query = mysqli_query($conn, "SELECT * FROM `service_items` LIMIT 6");

            if (mysqli_num_rows($serv_itmes_query) > 0) {
                while ($serv_item_result = mysqli_fetch_array($serv_itmes_query)) {
            ?>

            <div class="serv_item col-xl-4 col-md-6">
                <div>
                    <div class="icon">
                        <?= $serv_item_result['service_icon'] ?>
                    </div>
                    <div class="serv_name">
                        <?= $serv_item_result['service_name'] ?>
                    </div>
                    <div class="arrow">
                        <i class="fa-solid fa-arrow-right-long"></i>
                    </div>
                </div>
            </div>

            <?php
                }
            }
            ?>
        </div>
        <div class="text-center mt-5 pt-5">
            <a href="services.php" data-bs-target="#view_all_services" data-bs-toggle="modal"><button
                    class="button">view all</button></a>
        </div>
    </div>
</section>
<!-- services section ends here -->

<!-- Show All Skills Modal Starts -->
<div class="modal fade text-capitalize " id="view_all_services" data-bs-backdrop="static">
    <div class="modal-dialog modal-xl modal-fullscreen-lg-down">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title">All Services</h2>
                <i class="fa-solid fa-xmark fs-2" role="button" data-bs-dismiss="modal"></i>
            </div>
            <div class="modal-body py-5">
                <div class="inner_service container vertical_path">
                    <div class="content">
                        <h2 class="heading">
                            <?= $select['service_title'] ?>
                        </h2>
                        <p class="para">
                            <?= $select['service_desc'] ?>
                        </p>
                    </div>
                    <div class="service_box row g-5 justify-content-center">

                        <?php
                        $serv_itmes_query = mysqli_query($conn, "SELECT * FROM `service_items`");

                        if (mysqli_num_rows($serv_itmes_query) > 0) {
                            while ($serv_item_result = mysqli_fetch_array($serv_itmes_query)) {
                        ?>

                        <div class="serv_item col-xl-4 col-md-6">
                            <div>
                                <div class="icon">
                                    <?= $serv_item_result['service_icon'] ?>
                                </div>
                                <div class="serv_name">
                                    <?= $serv_item_result['service_name'] ?>
                                </div>
                                <div class="arrow">
                                    <i class="fa-solid fa-arrow-right-long"></i>
                                </div>
                            </div>
                        </div>

                        <?php
                            }
                        }
                        ?>
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
<!-- Show All Skills Modal Ends -->