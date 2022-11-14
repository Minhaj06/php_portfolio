<div class="container pt-4">
    <h1 class="text-capitalize mb-3">Update Services</h1>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item breadcrumb-active"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="hire_me_update.php">Services</a></li>
        </ol>
    </nav>



    <!-- Hire Me Card Starts Here -->
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h2 class="mb-0">Home Content</h2>
            <span role="button" class="edit_home_btn" data-bs-toggle="modal" data-bs-target="#edit_hire_me_modal">
                <i class="fa-solid fa-pen-to-square"></i> Edit Home
            </span>
        </div>
        <div class="card-body">
            <?php include("../admin/assets/includes/message.php"); ?>

            <div id="hire_me_content">
                <?php
                $hire_me_query = mysqli_query($conn, "SELECT * FROM `hire`");
                $hire_me_result = mysqli_fetch_assoc($hire_me_query);
                ?>

                <div class="text-white d-flex flex-column justify-content-center align-items-center gap-4"
                    style="background-image: url(../uploaded_img/<?= $hire_me_result['hire_bg'] ?>); background-repeat: no-repeat; background-size: cover; min-height: 45rem; filter: grayscale(.6)">

                    <!-- <img style="min-height: 35rem;" src="../assets/images/hire_bg.png" width="100%" alt="home_img"> -->

                    <h2 style="font-size: 3rem;"><?= $hire_me_result['hire_title'] ?></h2>
                    <h1 style="font-size: 4rem;"><?= $hire_me_result['hire_text'] ?></h1>

                    <a href="#" class="btn btn-warning fs-1 px-5 py-2">Hire Me!</a>

                </div>
            </div>

        </div>
    </div>
    <!-- Hire Me Card Ends Here -->
</div>



<!-- Update Hire Me Modal Starts Here -->

<div class="modal fade text-capitalize" id="edit_hire_me_modal" data-bs-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title">Edit Hire Me Content</h2>
                <button class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="" id="update_hire_me_form" enctype="multipart/form-data">
                <div class="modal-body">

                    <div class="form-group mb-4">
                        <label for="hire_title" class="label-control">Hire Me Title</label>
                        <input class="form-control fs-4" type="text" id="hire_title" name="hire_title"
                            value="<?= $hire_me_result['hire_title'] ?>" placeholder="Type hire title">
                    </div>

                    <div class="form-group mb-4">
                        <label for="hire_text" class="label-control">Hire Me Text</label>
                        <input class="form-control fs-4" type="text" id="hire_text" name="hire_text"
                            value="<?= $hire_me_result['hire_text'] ?>" placeholder="Type hire description">
                    </div>

                    <div class="form-group">
                        <label for="hire_bg" class="label-control">Hire Me Text</label>
                        <input class="form-control fs-4 border-0 input" type="file" id="hire_bg" name="hire_bg"
                            accept="image/jpg, image/png, image/jpeg, image/gif, image/jfif">
                    </div>

                    <input type="hidden" name="update_hire_me">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary fs-4" data-bs-dismiss="modal">Close</button>
                    <button type="submit" id="update_hire_me_btn" name="update_hire_me_btn"
                        class="btn btn-info fs-4">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Update Hire Me Modal Ends Here -->