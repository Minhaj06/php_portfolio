<div class="container pt-4">
    <h1 class="text-capitalize mb-3">Update Testimonials</h1>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item breadcrumb-active"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="testimonials_update.php">Testimonials</a></li>
        </ol>
    </nav>


    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h2 class="mb-0">Service Items</h2>

            <span id="add_service" role="button" data-bs-target="#add_service_modal" data-bs-toggle="modal">
                <i class="fa-solid fa-plus"></i>
                Add Service
            </span>
        </div>

        <div class="card-body" id="service_items">
            <table id="usersDataTable" class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Reviewer Image</th>
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
                        <td data-target="test_reviewer_image">
                            <img style="width: 10rem; height: 8rem;"
                                src="../uploaded_img/<?= $test_item_result['test_reviewer_image'] ?>"
                                alt="Reviewer Image">
                        </td>

                        <td data-target="test_reviewer_name">
                            <?= $test_item_result['test_reviewer_name'] ?>
                        </td>

                        <td data-target="test_reviewer_title">
                            <?= $test_item_result['test_reviewer_title'] ?>
                        </td>

                        <td data-target="test_reviewer_comment">
                            <?= $test_item_result['test_reviewer_comment'] ?>
                        </td>

                        <td style="min-width: 10rem;">
                            <span data-id="<?= $test_item_result['test_item_id'] ?>" class="fs-4 text-capitalize"
                                id="edit_testiomonial_btn" role="button" data-bs-target="#" data-bs-toggle="modal">
                                <i class="fa-solid fa-eye"></i>
                            </span>

                            <span data-id="<?= $test_item_result['test_item_id'] ?>" class="fs-4 text-capitalize ms-4"
                                id="edit_testimonial_btn" role="button" data-bs-target="#" data-bs-toggle="modal">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </span>

                            <span data-id="<?= $test_item_result['test_item_id'] ?>" class="fs-4 text-capitalize ms-4"
                                id="delete_testiomonial_btn" role="button">
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