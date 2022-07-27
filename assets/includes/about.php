<!-- skills section starts here -->
<section id="skill_area">
    <div class="container">
        <div class="inner_skill row">
            <div class="skill_image pe-xxl-5 col-md-6 mb-5 mb-md-0">
                <img src="uploaded_img/<?= $select['about_image'] ?>" alt="skill_img" />
                <div class="experience_highlight">
                    <div class="experience_content">
                        <div class="text-center">
                            <h3><?php echo (str_pad($select['experience'], 2, '0', STR_PAD_LEFT)) ?></h3>
                            <h4>Years of</h4>
                            <h4>Experience</h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="skills ps-xxl-5 col-md-6 mt-5 mt-md-0 pt-5 pt-md-0">
                <h3><?= $select['about_title'] ?></h3>
                <p><?= $select['about_desc'] ?></p>
                <ul class="skill_progress">

                    <?php

                    $skill_query = mysqli_query($conn, "SELECT * FROM `skills` LIMIT 4");

                    if ($skill_query) {
                        while ($skill_result = mysqli_fetch_array($skill_query)) {
                    ?>
                    <li class="<?= $skill_result["skill_name"] . $skill_result["skill_id"] ?>">
                        <?= $skill_result["skill_name"] . " " . $skill_result["skill_percentage"] ?>%</li>
                    <?php }
                    }
                    ?>

                </ul>

                <a href="#" data-bs-toggle="modal" data-bs-target="#view_all_skills">
                    <button class="button me-4 mt-xl-5">View All</button>
                </a>

                <a href="#">
                    <button class="button mt-xl-5">Aboute Me</button>
                </a>
            </div>
        </div>
    </div>


    <!-- Show All Skills Modal Starts -->
    <div class="modal fade text-capitalize" id="view_all_skills" data-bs-backdrop="static">
        <div class="modal-dialog modal-xl modal-fullscreen-g-down">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title">All Skills</h2>
                    <i class="fa-solid fa-xmark fs-2" role="button" data-bs-dismiss="modal"></i>
                </div>
                <div class="modal-body py-5">

                    <ul class="skill_progress">
                        <div class="row g-5">
                            <?php

                            $skill_query = mysqli_query($conn, "SELECT * FROM `skills`");

                            if (mysqli_num_rows($skill_query) > 0) {
                                while ($skill_result = mysqli_fetch_array($skill_query)) {
                            ?>

                            <div class="col-lg-6">
                                <li style="margin: 0;"
                                    class="<?= $skill_result["skill_name"] . $skill_result["skill_id"] ?>">
                                    <?= $skill_result["skill_name"] . " " . $skill_result["skill_percentage"] ?>%</li>
                            </div>

                            <?php }
                            }
                            ?>
                        </div>
                    </ul>

                </div>
                <div class="modal-footer">
                    <button class="btn fs-4" data-bs-dismiss="modal"
                        style="background-color: var(--gray); color: var(--white)">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Show All Skills Modal Ends -->


</section>
<!-- skills section ends here -->