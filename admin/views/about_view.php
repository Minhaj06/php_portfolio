<div class="container pt-4">
    <h1 class="text-capitalize mb-3">Update about</h1>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item breadcrumb-active"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="about_update.php">About Content</a></li>
        </ol>
    </nav>

    <!-- About Card Starts Here -->
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h2 class="mb-0">About Content</h2>
            <span class="edit_about_btn" role="button" data-bs-toggle="modal" data-bs-target="#edit_about_modal">
                <i class="fa-solid fa-pen-to-square"></i> Edit About
            </span>
        </div>

        <div class="card-body">
            <?php include("../admin/assets/includes/message.php"); ?>
            <div id="about_content" class="row mt-4 g-0">

                <?php
                $query = mysqli_query($conn, "SELECT * FROM `about` ");
                $result = mysqli_fetch_assoc($query);
                ?>

                <div class="about_img col-md-5 mb-4 mb-md-0">
                    <img src="../assets/images/<?= $result['about_image'] ?>" width="100%" height="100%" alt="">
                </div>
                <div class="col-md-7 p-4 skill_area">
                    <h3 class="h1"> <?= $result['about_title'] ?> </h3>
                    <p class="mt-3"><?= $result['about_desc'] ?></p>
                    <h3 class="mb-3">Working Experience: <span
                            class="text-decoration-underline"><?= $result['experience'] ?> Years</span>
                    </h3>

                    <!-- style="color: var(--primary-color)" -->

                    <div class="mt-5">
                        <div class="d-flex justify-content-between py-1 px-2 mb-4"
                            style="background: var(--body-color); color: var(--primary-color)">
                            <h2 class="mb-0">Skills</h2>
                            <span role="button" data-bs-target="#add_skill_modal" data-bs-toggle="modal">
                                <i class="fa-solid fa-plus"></i>
                                Add Skill
                            </span>
                        </div>
                        <ul class="skill_progress">
                            <?php

                            $skill_query = mysqli_query($conn, "SELECT * FROM `skills` LIMIT 4");

                            if ($skill_query) {
                                while ($select = mysqli_fetch_array($skill_query)) {
                            ?>

                            <li id="<?= $select['skill_id'] ?>" data-color="<?= $select['skill_color'] ?>"
                                class="<?= $select["skill_name"] . $select["skill_id"] ?> d-flex justify-content-between">

                                <span><span id="skill_name"><?= $select["skill_name"] ?></span> <span
                                        id="skill_percentage"><?= $select["skill_percentage"] ?></span>%</span>

                                <div class="skill_edit_delete">
                                    <span data-id="<?= $select['skill_id'] ?>"
                                        class="fs-4 text-capitalize edit_skill_btn" role="button"
                                        data-bs-target="#edit_skill_modal" data-bs-toggle="modal">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </span>

                                    <span data-id="<?= $select['skill_id'] ?>"
                                        class="fs-4 text-capitalize ms-4 delete_skill_btn" role="button"
                                        data-bs-target="#" data-bs-toggle="">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </span>
                                </div>

                            </li>

                            <?php }
                            }
                            ?>
                        </ul>
                    </div>

                    <button class="button float-end" data-bs-toggle="modal" data-bs-target="#view_all_skills">View
                        All</button>

                </div>
            </div>
        </div>

    </div>
    <!-- About Card Ends Here -->
</div>


<!-- Show All Skills Modal Starts -->
<div class="modal fade text-capitalize" id="view_all_skills" data-bs-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title">All Skills</h2>
                <i class="fa-solid fa-xmark fs-2" role="button" data-bs-dismiss="modal"></i>
            </div>
            <div class="modal-body">
                <ul class="skill_progress">
                    <?php

                    $skill_query = mysqli_query($conn, "SELECT * FROM `skills`");

                    if ($skill_query) {
                        while ($select = mysqli_fetch_array($skill_query)) {
                    ?>
                    <li id="<?= $select['skill_id'] ?>" data-color="<?= $select['skill_color'] ?>"
                        class="<?= $select["skill_name"] . $select["skill_id"] ?> d-flex justify-content-between">

                        <span><span id="skill_name"><?= $select["skill_name"] ?></span> <span
                                id="skill_percentage"><?= $select["skill_percentage"] ?></span>%</span>

                        <div class="skill_edit_delete">
                            <span data-id="<?= $select['skill_id'] ?>" class="fs-4 text-capitalize edit_skill_btn"
                                role="button" data-bs-target="#edit_skill_modal"
                                onclick="$('#edit_skill_modal').modal('toggle')">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </span>

                            <span data-id="<?= $select['skill_id'] ?>"
                                class="fs-4 text-capitalize ms-4 delete_skill_btn" role="button" data-bs-target="#"
                                data-bs-toggle="">
                                <i class="fa-solid fa-trash-can"></i>
                            </span>
                        </div>

                    </li>
                    <?php }
                    }
                    ?>
                </ul>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary fs-4" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- Show All Skills Modal Ends -->


<!-- Add Skill Modal Starts Here -->
<div class="modal fade text-capitalize" id="add_skill_modal" data-bs-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title">Add Skill</h2>
                <i class="fa-solid fa-xmark fs-2" role="button" data-bs-dismiss="modal"></i>
            </div>
            <div class="modal-body">
                <form id="add_skill_form" action="">
                    <div class="form-group mb-3">
                        <label for="add_skill_name">Skill Name</label>
                        <input class="form-control fs-4" id="add_skill_name" name="add_skill_name" type="text"
                            placeholder="Enter skill name">
                    </div>
                    <div class="form-group mb-3">
                        <label for="add_skill_percentage">Skill Percentage</label>
                        <select class="form-select fs-4" name="add_skill_percentage" id="add_skill_percentage">

                            <option value="">--Select Percentage--</option>

                            <?php
                            for ($i = 70; $i <= 100; $i++) {
                            ?>
                            <option value="<?= $i ?>">

                                <?= $i ?>% </option>
                            <?php
                            }
                            ?>

                        </select>
                    </div>


                    <p class="mb-0">Chose Skill Progess Color(Optional) : </p>

                    <input class="form-check-input progress_color progress_color1 me-3" type="radio"
                        name="add_skill_color" id="progress_color1" value="#FF4900">

                    <input class="form-check-input progress_color progress_color2 me-3" type="radio"
                        name="add_skill_color" id="progress_color2" value="#FF7004">

                    <input class="form-check-input progress_color progress_color3 me-3" type="radio"
                        name="add_skill_color" id="progress_color3" value="#FF9809">

                    <input class="form-check-input progress_color progress_color4" type="radio" name="add_skill_color"
                        id="progress_color4" value="#FFBF0D">
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary fs-4" data-bs-dismiss="modal">Close</button>
                <button type="submit" id="add_skill_btn" class="btn btn-info fs-4">Update</button>
            </div>
        </div>
    </div>
</div>
<!-- Add Skill Modal Ends Here -->


<!-- Edit Skill Modal Starts Here -->
<div class="modal fade text-capitalize" id="edit_skill_modal" data-bs-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title">Edit Skill</h2>
                <i class="fa-solid fa-xmark fs-2" role="button" data-bs-dismiss="modal"></i>
            </div>
            <div class="modal-body">

                <div class="form-group mb-3">
                    <label for="edit_skill_name">Skill Name</label>
                    <input class="form-control fs-4" id="edit_skill_name" name="edit_skill_name" type="text"
                        placeholder="Enter skill name">
                </div>
                <div class="form-group mb-3">
                    <label for="edit_skill_percentage">Skill Percentage</label>
                    <select class="form-select fs-4" name="edit_skill_percentage" id="edit_skill_percentage">

                        <option value="">--Select Percentage--</option>

                        <?php
                        for ($i = 70; $i <= 100; $i++) {
                        ?>
                        <option value="<?= $i ?>">

                            <?= $i ?>% </option>
                        <?php
                        }
                        ?>

                    </select>
                </div>


                <p class="mb-0">Chose Skill Progess Color(Optional) : </p>

                <input class="form-check-input progress_color progress_color1 me-3" type="radio" name="edit_skill_color"
                    id="edit_progress_color1" value="#FF4900">

                <input class="form-check-input progress_color progress_color2 me-3" type="radio" name="edit_skill_color"
                    id="edit_progress_color2" value="#FF7004">

                <input class="form-check-input progress_color progress_color3 me-3" type="radio" name="edit_skill_color"
                    id="edit_progress_color3" value="#FF9809">

                <input class="form-check-input progress_color progress_color4" type="radio" name="edit_skill_color"
                    id="edit_progress_color4" value="#FFBF0D">

            </div>


            <div class="modal-footer">
                <button class="btn btn-secondary fs-4" data-bs-dismiss="modal">Close</button>
                <button type="submit" id="update_skill_btn" class="btn btn-info fs-4">Update</button>
            </div>


        </div>
    </div>
</div>
<!-- Edit Skill Modal Ends Here -->


<!--Update Modal Starts -->
<div class="modal fade text-capitalize" id="edit_about_modal" data-bs-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title">Edit About Content</h2>
                <i class="fa-solid fa-xmark fs-2" role="button" data-bs-dismiss="modal"></i>
            </div>
            <div class="modal-body">
                <div style="border: 4px solid var(--primary-color);"
                    class="about_modal_img text-center p-4 mb-5 rounded-3">
                    <img style="border: 4px solid var(--primary-color);" class="about_modal_img rounded-circle" src=""
                        width="200" height="200" alt="about_img">
                </div>

                <form action="" id="update_about_form">
                    <div class="row g-4">
                        <div class="form-group col-12">
                            <label for="about_title" class="label-control">About Title</label>
                            <div class="input_icon d-flex align-items-center">
                                <i class="fa-solid fa-heading fs-3 px-4"></i>
                                <input class="form-control fs-4 border-0 input" type="text" id="about_title"
                                    name="about_title" value="<?= $result['about_title'] ?>">
                            </div>
                        </div>


                        <div class="form-group col-12">
                            <label for="experience" class="label-control">Year of Experience</label>
                            <div class="input_icon d-flex align-items-center">
                                <i class="fa-solid fa-calendar-check px-4"></i>
                                <select class="form-select fs-4" name="experience" id="experience"
                                    aria-label="Default select example">
                                    <?php
                                    for ($i = 1; $i <= 16; $i++) {
                                    ?>

                                    <option value="<?= $i ?>" <?php
                                                                    if ($result['experience'] == $i) {
                                                                        echo "selected";
                                                                    }
                                                                    ?>>
                                        <?= $i ?>
                                    </option>;

                                    <?php
                                    }
                                    ?>

                                </select>
                            </div>
                        </div>


                        <div class="form-group col-12">
                            <label for="about_img" class="label-control">Image</label>
                            <div class="input_icon d-flex align-items-center">
                                <i class="fa-solid fa-address-card fs-3 px-4"></i>
                                <input class="form-control fs-4 border-0 input" type="file" id="about_img"
                                    name="about_img" accept="image/jpg, image/png, image/jpeg, image/gif, image/jfif">
                            </div>
                        </div>


                        <div class="form-group col-12">
                            <textarea class="form-control fs-4" placeholder="About description goes here" id="home_desc"
                                name="about_desc" style="height: 100px"
                                maxlength="200"><?= $result['about_desc'] ?></textarea>
                        </div>

                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary fs-4" data-bs-dismiss="modal">Close</button>
                <button type="submit" id="update_about_btn" class="btn btn-info fs-4">Update</button>
            </div>
        </div>
    </div>
</div>

<!-- Update Modal Ends Here -->

<!-- Delete Modal Starts Here -->
<?php
$confirm_title = "Delete skill";
$confirm_text = "Do you want to delete this skill?";

include_once "../admin/assets/includes/confirmBox.php";
?>
<!-- Delete Modal Starts Here -->