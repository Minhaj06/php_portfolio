<div class="container pt-4">
    <h1 class="text-capitalize mb-3">Update Achievements</h1>

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
        <div class="card1 col-lg-6">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h2 class="mb-0">Service Content</h2>

                    <span class="" role="button" data-bs-toggle="modal" data-bs-target="#edit_portfolio_content_modal">
                        <i class="fa-solid fa-pen-to-square"></i> Edit Content
                    </span>
                </div>

                <div class="card-body">
                    <div id="portfolio_content">
                        <h2 class="heading m-0"><?= $result['portfolio_title'] ?>o</h2>
                        <p class="mt-2"><?= $result['portfolio_desc'] ?></p>
                    </div>
                </div>
            </div>


        </div>

        <div class="card2 col-lg-6">
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
<!-- Update Portfolio Content Modal Starts -->