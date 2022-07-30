<div class="container pt-4">
    <h1 class="text-capitalize mb-3">Update Portfolio</h1>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item breadcrumb-active"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="portfolio_update.php">Portfolio</a></li>
        </ol>
    </nav>


    <?php
    $query = mysqli_query($conn, "SELECT * FROM `portfolio_section` LIMIT 1 ");
    $result = mysqli_fetch_assoc($query);
    ?>


    <!-- Portfolio Card Starts Here -->
    <div class="row g-4">
        <style>
        .message_show {
            margin-bottom: 0 !important;
        }
        </style>
        <?php include("../admin/assets/includes/message.php"); ?>
        <div class="card-left col-lg-6">

            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h2 class="mb-0">Portfolio Content</h2>

                    <span class="" role="button" data-bs-toggle="modal" data-bs-target="#edit_portfolio_content_modal">
                        <i class="fa-solid fa-pen-to-square"></i> Edit Content
                    </span>
                </div>

                <div class="card-body" id="portfolio_content">
                    <h2 class="heading m-0"><?= $result['portfolio_title'] ?></h2>
                    <p class="mt-2"><?= $result['portfolio_desc'] ?></p>
                </div>
            </div>

            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h2 class="mb-0">Portfolio Category</h2>

                    <span id="add_service" role="button" data-bs-target="#add_portfolio_cotegory_modal"
                        data-bs-toggle="modal">
                        <i class="fa-solid fa-plus"></i>
                        Add Category
                    </span>
                </div>

                <div class="card-body" id="portfolio_category">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover display" style="min-width: 50rem;">
                            <thead>
                                <tr>
                                    <th>Category Name</th>
                                    <th>Status</th>
                                    <th>No. Of Posts</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                $category_query = mysqli_query($conn, "SELECT * FROM `portfolio_category`");

                                if (mysqli_num_rows($category_query) > 0) {
                                    while ($category_result = mysqli_fetch_array($category_query)) {
                                ?>

                                <tr id="<?= $category_result['port_cat_id'] ?>">
                                    <td data-target="port_cat_name" class="align-middle">
                                        <?= $category_result['port_cat_name'] ?></td>

                                    <td data-target="port_cat_status" class="align-middle">
                                        <?php
                                                if ($category_result['port_cat_status'] == 1) {
                                                    echo "Visible";
                                                } else {
                                                    echo "Hidden";
                                                }
                                                ?>
                                    </td>

                                    <td data-target="" class="align-middle">
                                        <?= $category_result['no_of_port'] ?>
                                    </td>

                                    <td class="align-middle">
                                        <span data-id="<?= $category_result['port_cat_id'] ?>"
                                            class="fs-4 text-capitalize" id="edit_port_cat_btn" role="button"
                                            data-bs-target="#edit_portfolio_cotegory_modal" data-bs-toggle="modal">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </span>

                                        <span data-id="<?= $category_result['port_cat_id'] ?>"
                                            class="fs-4 text-capitalize ms-4" id="delete_port_cat_btn" role="button">
                                            <i class="fa-solid fa-trash-can"></i>
                                        </span>
                                    </td>
                                </tr>

                                <?php
                                    }
                                } else {
                                    ?>

                                <tr>
                                    <td colspan="4">No category founded!</td>
                                </tr>

                                <?php } ?>

                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>

        <div class="card-right col-lg-6">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h2 class="mb-0">Portfolio Items</h2>

                    <span id="add_service" role="button" data-bs-target="#add_service_modal" data-bs-toggle="modal">
                        <i class="fa-solid fa-plus"></i>
                        Add Service
                    </span>
                </div>

                <div class="card-body" id="service_items">
                    <table id="usersDataTable" class="table display table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Service Icon</th>
                                <th>Service Name</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr id="">
                                <td data-target="service_icon" class="align-middle">

                                </td>

                                <td data-target="service_name" class="align-middle">

                                </td>

                                <td class="align-middle">
                                    <span data-id="" class="fs-4 text-capitalize" id="edit_portfolio_btn" role="button"
                                        data-bs-target="#edit_portfolio_modal" data-bs-toggle="modal">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </span>

                                    <span data-id="" class="fs-4 text-capitalize ms-4" id="delete_portfolio_btn"
                                        role="button">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </span>
                                </td>
                            </tr>




                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
    <!-- Portfolio Card Ends Here -->
</div>



<!-- Update Portfolio Content Modal Starts -->
<div class="modal fade text-capitalize" id="edit_portfolio_content_modal" data-bs-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title">Edit Portfolio Content</h2>
                <i class="fa-solid fa-xmark fs-2" role="button" data-bs-dismiss="modal"></i>
            </div>
            <div class="modal-body">
                <form action="">
                    <div class="row g-4">
                        <div class="form-group">
                            <label for="portfolio_title" class="label-control">Title</label>
                            <div class="input_icon d-flex align-items-center">
                                <i class="fa-solid fa-heading fs-3 px-4"></i>
                                <input class="form-control fs-4 border-0 input" type="text" id="portfolio_title"
                                    name="portfolio_title" value="<?= $result['portfolio_title'] ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <textarea class="form-control fs-4" placeholder="Service description goes here"
                                id="portfolio_desc" name="portfolio_desc" style="height: 130px"
                                maxlength="190"><?= $result['portfolio_desc'] ?></textarea>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary fs-4" data-bs-dismiss="modal">Close</button>
                <button type="submit" id="update_portfolio_content_btn" class="btn btn-secondary fs-4">Update</button>
            </div>
        </div>
    </div>
</div>
<!-- Update Portfolio Content Modal Ends -->


<!-- Add Portfolio Category Modal Starts -->
<div class="modal fade text-capitalize" id="add_portfolio_cotegory_modal" data-bs-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title">Add Category</h2>
                <i class="fa-solid fa-xmark fs-2" role="button" data-bs-dismiss="modal"></i>
            </div>
            <div class="modal-body">

                <div class="form-group mb-4">
                    <label for="port_cat_name" class="label-control">Category name</label>
                    <span class="add_cat_error ms-3"></span>
                    <input class="form-control fs-4" type="text" id="port_cat_name" name="port_cat_name"
                        placeholder="Type category name">
                </div>

                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="port_cat_status"
                        name="port_cat_status">
                    <label class="form-check-label" for="port_cat_status">Status</label>
                </div>

            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary fs-4" data-bs-dismiss="modal">Close</button>
                <button type="submit" id="add_portfolio_category_btn" class="btn btn-secondary fs-4">Add
                    Category</button>
            </div>
        </div>
    </div>
</div>
<!-- Add Portfolio Category Modal Ends -->


<!-- Edit Portfolio Category Modal Starts -->
<div class="modal fade text-capitalize" id="edit_portfolio_cotegory_modal" data-bs-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title">Update Category</h2>
                <i class="fa-solid fa-xmark fs-2" role="button" data-bs-dismiss="modal"></i>
            </div>
            <div class="modal-body">

                <div class="form-group mb-4">
                    <label for="edit_port_cat_name" class="label-control">Category name</label>
                    <span class="edit_cat_error ms-3"></span>
                    <input class="form-control fs-4" type="text" id="edit_port_cat_name" name="edit_port_cat_name"
                        placeholder="Type category name">
                </div>

                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="edit_port_cat_status"
                        name="edit_port_cat_status">
                    <label class="form-check-label" for="edit_port_cat_status">Status</label>
                </div>

            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary fs-4" data-bs-dismiss="modal">Close</button>
                <button type="submit" id="update_portfolio_category_btn" class="btn btn-secondary fs-4">Update
                    Category</button>
            </div>
        </div>
    </div>
</div>
<!-- Edit Portfolio Category Modal Ends -->