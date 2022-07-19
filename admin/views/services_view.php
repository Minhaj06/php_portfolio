<div class="container pt-4">
    <h1 class="text-capitalize mb-3">Update Services</h1>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item breadcrumb-active"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="services_update.php">All Services</a></li>
        </ol>
    </nav>



    <?php
    $query = mysqli_query($conn, "SELECT * FROM `service_section` LIMIT 1 ");
    $result = mysqli_fetch_assoc($query);
    ?>




    <!-- About Card Starts Here -->
    <div class="row g-4">
        <?php include("../admin/assets/includes/message.php"); ?>
        <div class="card1 col-xl-6">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h2 class="mb-0">Service Content</h2>

                    <span class="" role="button" data-bs-toggle="modal" data-bs-target="#edit_service_content_modal">
                        <i class="fa-solid fa-pen-to-square"></i> Edit Content
                    </span>

                </div>

                <div class="card-body">
                    <div id="service_content">
                        <h2 class="heading m-0"><?= $result['service_title'] ?></h2>
                        <p class="mt-2"><?= $result['service_desc'] ?></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="card2 col-xl-6">
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
                                <th>Service Icon</th>
                                <th>Service Name</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <style>
                            .align-middle {
                                padding-top: 0 !important;
                                padding-bottom: 0 !important;
                            }
                            </style>


                            <?php
                            $serv_itmes_query = mysqli_query($conn, "SELECT * FROM `service_items`");

                            if (mysqli_num_rows($serv_itmes_query) > 0) {
                                while ($serv_item_result = mysqli_fetch_array($serv_itmes_query)) {
                            ?>

                            <tr id="<?= $serv_item_result['serv_item_id'] ?>">
                                <td data-target="service_icon" class="align-middle"
                                    style="font-size: 3.5rem; color: var(--primary-color)">
                                    <?= $serv_item_result['service_icon'] ?>
                                </td>

                                <td data-target="service_name" class="align-middle">
                                    <?= $serv_item_result['service_name'] ?>
                                </td>

                                <td class="align-middle">
                                    <span data-id="<?= $serv_item_result['serv_item_id'] ?>"
                                        class="fs-4 text-capitalize edit_service_btn" role="button"
                                        data-bs-target="#edit_service_modal" data-bs-toggle="modal">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </span>

                                    <span data-id="<?= $serv_item_result['serv_item_id'] ?>"
                                        class="fs-4 text-capitalize ms-4" id="delete_service_btn" role="button">
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
    </div>
    <!-- About Card Ends Here -->
</div>



<!-- Add Sevice Itme Modal Starts -->
<div class="modal fade text-capitalize" id="add_service_modal" data-bs-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title">Add Service</h2>
                <i class="fa-solid fa-xmark fs-2" role="button" data-bs-dismiss="modal"></i>
            </div>
            <div class="modal-body">
                <div class="form-group mb-3">
                    <label for="add_service_name">Service Name</label>
                    <span class="add_service_error ms-3">
                        <span class="text-danger"></span>
                    </span>
                    <input type="text" class="form-control fs-4" id="add_service_name" name="add_service_name"
                        placeholder="HTML5">
                </div>
                <div class="form-group mb-3">
                    <label for="add_service_icon">Service Icon</label>
                    <span class="add_service_icon_error ms-3">
                        <span class="text-danger"></span>
                    </span>
                    <input type="text" class="form-control fs-4" id="add_service_icon" name="add_service_icon"
                        placeholder='<i class="fa-brands fa-html5"></i>'>
                    <p class="mt-2 mb-0 text-success text-decoration-underline fs-4">
                        Use free fontawesome icon class like
                    </p>
                    <pre
                        class="text-success fw-bold text-lowercase"><code id="code"><i class="fa-brands fa-html5"></i></code></pre>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary fs-4" data-bs-dismiss="modal">Close</button>
                <button type="submit" id="add_service_btn" class="btn btn-secondary fs-4">Add Service</button>
            </div>
        </div>
    </div>
</div>
<!-- Add Sevice Itme Modal Ends -->


<!-- Edit Sevice Itme Modal Starts -->
<div class="modal fade text-capitalize" id="edit_service_modal" data-bs-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title">Edit Service</h2>
                <i class="fa-solid fa-xmark fs-2" role="button" data-bs-dismiss="modal"></i>
            </div>
            <div class="modal-body">
                <div class="form-group mb-3">
                    <label for="edit_service_name">Service Name</label>
                    <span class="edit_service_error ms-3">
                        <span class="text-danger"></span>
                    </span>
                    <input type="text" class="form-control fs-4" id="edit_service_name" name="edit_service_name"
                        placeholder="HTML5">
                </div>
                <div class="form-group mb-3">
                    <label for="edit_service_icon">Service Icon</label>
                    <span class="edit_service_icon_error ms-3">
                        <span class="text-danger"></span>
                    </span>
                    <input type="text" class="form-control fs-4" id="edit_service_icon" name="edit_service_icon"
                        placeholder='<i class="fa-brands fa-html5"></i>'>
                    <p class="mt-2 mb-0 text-success text-decoration-underline fs-4">
                        Use free fontawesome icon class like
                    </p>
                    <pre
                        class="text-success fw-bold text-lowercase"><code id="editCodeSample"><i class="fa-brands fa-html5"></i></code></pre>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary fs-4" data-bs-dismiss="modal">Close</button>
                <button type="submit" id="update_service_btn" class="btn btn-secondary fs-4">Update Service</button>
            </div>
        </div>
    </div>
</div>
<!-- Edit Sevice Itme Modal Ends -->


<!-- Update Sevice Content Modal Starts -->
<div class="modal fade text-capitalize" id="edit_service_content_modal" data-bs-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title">Edit Service Content</h2>
                <i class="fa-solid fa-xmark fs-2" role="button" data-bs-dismiss="modal"></i>
            </div>
            <div class="modal-body">
                <form action="">
                    <div class="row g-4">
                        <div class="form-group">
                            <label for="service_title" class="label-control">Title</label>
                            <div class="input_icon d-flex align-items-center">
                                <i class="fa-solid fa-heading fs-3 px-4"></i>
                                <input class="form-control fs-4 border-0 input" type="text" id="service_title"
                                    name="service_title" value="<?= $result['service_title'] ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <textarea class="form-control fs-4" placeholder="Service description goes here"
                                id="service_desc" name="service_desc" style="height: 130px"
                                maxlength="190"><?= $result['service_desc'] ?></textarea>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary fs-4" data-bs-dismiss="modal">Close</button>
                <button type="submit" id="update_service_btn" class="btn btn-secondary fs-4">Update</button>
            </div>
        </div>
    </div>
</div>
<!-- Update Sevice Content Modal Starts -->