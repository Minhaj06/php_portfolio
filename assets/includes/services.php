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
        <div class="text-center mt-5 pt-5">
            <a href="services.php"><button class="button">view all</button></a>
        </div>
    </div>
</section>
<!-- services section ends here -->