<!-- testimonials section starts here -->
<section id="testimonials">
    <div class="inner_testimonials container vertical_path">
        <div class="content">
            <h2 class="heading"><?= $select['testimonial_title'] ?></h2>
            <p class="para"><?= $select['testimonial_desc'] ?></p>
        </div>
        <div class="testimonial_wrapper">
            <div class="testimonial_slider swiper">
                <div class="swiper-wrapper">


                    <?php
                    $port_itmes_query = mysqli_query($conn, "SELECT * FROM `testimonial_items`");

                    if (mysqli_num_rows($port_itmes_query) > 0) {
                        while ($test_item_result = mysqli_fetch_array($port_itmes_query)) {
                    ?>

                    <div class="testimonial_single swiper-slide h-auto">
                        <div class="inner-card h-100">
                            <div class="slider_img">
                                <img src="uploaded_img/<?= $test_item_result['test_reviewer_image'] ?>"
                                    alt="testimonial_img" />
                            </div>
                            <div class="slider_desc">
                                <h3><?= $test_item_result['test_reviewer_name'] ?></h3>
                                <h4><?= $test_item_result['test_reviewer_title'] ?></h4>
                                <p class="para"><?= $test_item_result['test_reviewer_comment'] ?></p>
                            </div>
                        </div>
                    </div>

                    <?php }
                    } ?>

                </div>
                <div class="swiper-button-next slide_btn"></div>
                <div class="swiper-button-prev slide_btn"></div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </div>
</section>
<!-- testimonials ends starts here -->