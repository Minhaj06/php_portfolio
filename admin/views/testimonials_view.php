<div class="container pt-4">
    <h1 class="text-capitalize mb-3">Update Testimonials</h1>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item breadcrumb-active"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="testimonials_update.php">Testimonials</a></li>
        </ol>
    </nav>

    <?php include("../admin/assets/includes/message.php"); ?>

    <!-- Testimonial Table Card Starts Here -->
    <!-- Testimonial Content Start -->
    <div class="card mb-5">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h2 class="mb-0">Testimonial Content</h2>

            <span class="" role="button" data-bs-toggle="modal" data-bs-target="#edit_testimonial_content_modal">
                <i class="fa-solid fa-pen-to-square"></i> Edit Content
            </span>
        </div>

        <div class="card-body" id="testimonial_content">

            <?php
            $query = mysqli_query($conn, "SELECT * FROM `testimonial_section` LIMIT 1 ");
            $result = mysqli_fetch_assoc($query);
            ?>

            <h2 class="heading m-0"><?= $result['testimonial_title'] ?></h2>
            <p class="mt-2"><?= $result['testimonial_desc'] ?></p>
        </div>
    </div>
    <!-- Testimonial Content End -->

    <!-- Testimonial Items Start -->
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h2 class="mb-0">Testimonials Comments</h2>

            <span id="" role="button" data-bs-target="#add_testimonial_modal" data-bs-toggle="modal">
                <i class="fa-solid fa-plus"></i>
                Add Testimonial
            </span>
        </div>

        <div class="card-body" id="testimonial_items">
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Reviewer Name</th>
                            <th>Reviewer Title</th>
                            <th>Reviewer Comment</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        $port_itmes_query = mysqli_query($conn, "SELECT * FROM `testimonial_items`");

                        if (mysqli_num_rows($port_itmes_query) > 0) {
                            while ($test_item_result = mysqli_fetch_array($port_itmes_query)) {
                        ?>
                        <tr id="<?= $test_item_result['test_item_id'] ?>">
                            <td data-target="<?= $test_item_result['test_item_id'] ?>">
                                <img id="<?= $test_item_result['test_item_id'] ?>test_reviewer_image"
                                    style="width: 10rem; height: 8rem;"
                                    src="../uploaded_img/<?= $test_item_result['test_reviewer_image'] ?>"
                                    alt="Reviewer Image">
                            </td>

                            <td data-target="test_reviewer_name" style="min-width: 20rem;">
                                <?= $test_item_result['test_reviewer_name'] ?>
                            </td>

                            <td data-target="test_reviewer_title" style="min-width: 20rem;">
                                <?= $test_item_result['test_reviewer_title'] ?>
                            </td>

                            <td data-target="test_reviewer_comment" style="min-width: 30rem">
                                <?php
                                        $string = $test_item_result['test_reviewer_comment'];

                                        if (strlen($string) > 100) {

                                            $stringCut = substr($string, 0, 100);
                                            $endPoint = strrpos($stringCut, ' ');

                                            $string = $endPoint ? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
                                            $string .= "<b>.......</b>";

                                            echo $string;
                                        } else {
                                            echo $string;
                                        }

                                        ?>
                                <input type="hidden" id="<?= $test_item_result['test_item_id'] ?>full_comment"
                                    value="<?= $test_item_result['test_reviewer_comment'] ?>">
                            </td>

                            <td style="min-width: 10rem;">
                                <span data-id="<?= $test_item_result['test_item_id'] ?>"
                                    class="fs-4 text-capitalize text-success" id="view_testiomonial_btn" role="button"
                                    data-bs-target="#view_testimonial_modal" data-bs-toggle="modal">
                                    <i class="fa-solid fa-eye"></i>
                                </span>

                                <span data-id="<?= $test_item_result['test_item_id'] ?>"
                                    class="fs-4 text-capitalize ms-4 text-info" id="edit_testimonial_btn" role="button"
                                    data-bs-target="#edit_testimonial_modal" data-bs-toggle="modal">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </span>

                                <span data-id="<?= $test_item_result['test_item_id'] ?>"
                                    class="fs-4 text-capitalize ms-4 text-danger" id="delete_testiomonial_btn"
                                    role="button">
                                    <i class="fa-solid fa-trash-can"></i>
                                </span>
                            </td>
                        </tr>
                        <?php
                            }
                        }
                        ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Testimonial Items End -->
    <!-- Testimonial Table Card Ends Here -->
</div>



<!-- Update Testimonial Content Modal Starts -->
<div class="modal fade text-capitalize" id="edit_testimonial_content_modal" data-bs-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title">Edit Testimonial Content</h2>
                <i class="fa-solid fa-xmark fs-2" role="button" data-bs-dismiss="modal"></i>
            </div>
            <div class="modal-body">
                <div class="row g-4">
                    <div class="form-group">
                        <label for="testimonial_title" class="label-control">Title</label>
                        <div class="input_icon d-flex align-items-center">
                            <i class="fa-solid fa-heading fs-3 px-4"></i>
                            <input class="form-control fs-4 border-0 input" type="text" id="testimonial_title"
                                name="testimonial_title" placeholder="Testimonial Title"
                                value="<?= $result['testimonial_title'] ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <textarea class="form-control fs-4" placeholder="Testimonial description goes here"
                            id="testimonial_desc" name="testimonial_desc" style="height: 130px"
                            maxlength="190"><?= $result['testimonial_desc'] ?></textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary fs-4" data-bs-dismiss="modal">Close</button>
                <button type="submit" id="update_testimonial_content_btn" class="btn btn-secondary fs-4">Update</button>
            </div>
        </div>
    </div>
</div>
<!-- Update Testimonial Content Modal Ends -->


<!-- Add testimonial Modal Starts -->
<div class="modal fade text-capitalize" id="add_testimonial_modal" data-bs-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title">Add Testimonial</h2>
                <i class="fa-solid fa-xmark fs-2" role="button" data-bs-dismiss="modal"></i>
            </div>

            <form action="" id="add_testimonial_form" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row g-4">

                        <div class="form-group col-lg-6">
                            <label for="test_reviewer_name" class="label-control">Reviewer Name</label>
                            <input class="form-control fs-4" type="text" id="test_reviewer_name"
                                name="test_reviewer_name" placeholder="Type testimonial name">
                        </div>

                        <div class="form-group col-lg-6">
                            <label for="test_reviewer_title" class="label-control">Reviewer Technology</label>
                            <input class="form-control fs-4" type="text" id="test_reviewer_title"
                                name="test_reviewer_title" placeholder="Type Reviewer title">
                        </div>

                        <div class="form-group col-12">
                            <label for="test_reviewer_image" class="label-control">Reviewer Image</label>
                            <input class="form-control fs-4" type="file"
                                accept="image/jpg, image/png, image/jpeg, image/gif, image/jfif"
                                id="test_reviewer_image" name="test_reviewer_image">
                        </div>

                        <div class="form-group col-12">
                            <label for="test_reviewer_comment" class="label-control">Reviewer Comment (Max
                                Length:
                                350)</label>
                            <textarea class="form-control fs-4" placeholder="testimonial description goes here"
                                id="test_reviewer_comment" name="test_reviewer_comment" style="height: 18rem"
                                maxlength="400"></textarea>
                        </div>

                        <input type="hidden" name="add_testimonial">

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary fs-4" data-bs-dismiss="modal">Close</button>
                    <button type="submit" id="add_testimonial_btn" class="btn btn-secondary fs-4">Add
                        testimonial</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Add testimonial Modal Ends -->


<!-- View Testimonial Modal Starts -->
<div class="modal fade" id="view_testimonial_modal" data-bs-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title">View testimonial</h2>
                <i class="fa-solid fa-xmark fs-2" role="button" data-bs-dismiss="modal"></i>
            </div>
            <div class="modal-body">

                <center>
                    <img id="view_test_img_modal" class="mb-4 rounded-circle" width="200" height="200" src=""
                        alt="reviewer_img" style="background: var(--body-color);">
                </center>

                <table class="table table-striped table-bordered">
                    <tbody>
                        <tr>
                            <th class="align-middle">Name</th>
                            <td class="align-middle" id="view_test_reviewer_name"></td>
                        </tr>
                        <tr>
                            <th class="align-middle">Title</th>
                            <td class="align-middle" id="view_test_reviewer_title"></td>
                        </tr>
                        <tr>
                            <th class="align-middle">Comment</th>
                            <td class="align-middle" id="view_test_reviewer_comment"></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary fs-4" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- View Testimonial Modal Ends -->


<!-- Edit Testimonial Modal Starts -->
<div class="modal fade text-capitalize" id="edit_testimonial_modal" data-bs-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title">Edit Testimonial</h2>
                <i class="fa-solid fa-xmark fs-2" role="button" data-bs-dismiss="modal"></i>
            </div>

            <form action="" id="edit_testimonial_form" enctype="multipart/form-data">
                <div class="modal-body">

                    <center>
                        <img id="edit_view_test_img_modal" class="mb-4 rounded-circle" width="200" height="200" src=""
                            alt="reviewer_img" style="background: var(--body-color);">
                    </center>

                    <div class="row g-4">

                        <div class="form-group col-lg-6">
                            <label for="edit_test_reviewer_name" class="label-control">Reviewer Name</label>
                            <input class="form-control fs-4" type="text" id="edit_test_reviewer_name"
                                name="edit_test_reviewer_name" placeholder="Type testimonial name">
                        </div>

                        <div class="form-group col-lg-6">
                            <label for="edit_test_reviewer_title" class="label-control">Reviewer Technology</label>
                            <input class="form-control fs-4" type="text" id="edit_test_reviewer_title"
                                name="edit_test_reviewer_title" placeholder="Type Reviewer title">
                        </div>

                        <div class="form-group col-12">
                            <label for="edit_test_reviewer_image" class="label-control">Reviewer Image</label>
                            <input class="form-control fs-4" type="file"
                                accept="image/jpg, image/png, image/jpeg, image/gif, image/jfif"
                                id="edit_test_reviewer_image" name="edit_test_reviewer_image">
                        </div>

                        <div class="form-group col-12">
                            <label for="edit_test_reviewer_comment" class="label-control">Reviewer Comment (Max
                                Length:
                                350)</label>
                            <textarea class="form-control fs-4" placeholder="testimonial description goes here"
                                id="edit_test_reviewer_comment" name="edit_test_reviewer_comment" style="height: 18rem"
                                maxlength="400"></textarea>
                        </div>

                        <input type="hidden" id="edit_testimonial_id" name="edit_testimonial_id">

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary fs-4" data-bs-dismiss="modal">Close</button>
                    <button type="submit" id="update_testimonial_btn" class="btn btn-secondary fs-4">Add
                        testimonial</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Edit Testimonial Modal Ends -->


<!-- Delete Confirm Modal Starts Here -->
<?php
$confirm_title = "Delete Alert";
$confirm_text = "Do you want to delete this testimonial?";

include_once "../admin/assets/includes/confirmBox.php";
?>
<!-- Delete Confirm Modal Ends Here -->