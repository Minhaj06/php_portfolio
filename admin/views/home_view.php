<div class="container pt-4">
    <h1 class="text-capitalize mb-3">Update Home</h1>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item breadcrumb-active"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="home_update.php">Home Content</a></li>
        </ol>
    </nav>

    <?php
    $query = mysqli_query($conn, "SELECT * FROM home");
    $result = mysqli_fetch_assoc($query);

    ?>

    <!-- Home Card Starts Here -->
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h2 class="mb-0">Home Content</h2>
            <span role="button" class="edit_home_btn" data-bs-toggle="modal" data-bs-target="#edit_home_modal">
                <i class="fa-solid fa-pen-to-square"></i> Edit Home
            </span>
        </div>
        <div class="card-body">
            <?php include("../admin/assets/includes/message.php"); ?>
            <div id="home_content" class="row mt-4">
                <div class="col-lg-4 col-xl-3 mb-5 mb-lg-0">
                    <div style="border: 4px solid var(--primary-color);" class="home_img p-4 rounded-3 d-inline-block">
                        <img style="border: 4px solid var(--primary-color);" class="home_img rounded-circle"
                            src="../uploaded_img/<?= $result['image'] ?>" width="200" height="200" alt="home_img">
                    </div>
                </div>
                <div class="col-lg-8 col-xl-9">
                    <div class="home_content">
                        <h3 class="home_name h1" style="color: var(--primary-color)">
                            <span class="home_fname"><?= $result['fname'] ?></span>
                            <span class="home_lname"><?= $result['lname'] ?></span>
                        </h3>
                        <h4 class="home_occu">
                            <?= $result['occupation'] ?>
                        </h4>
                        <p class="mt-4 home_desc">
                            <?= $result['subtitle'] ?>
                        </p>
                        <a style="color: var(--primary-color);" href="cv.display.php?download">Show
                            CV</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Home Card Ends Here -->
</div>


<!--Update Modal Starts -->
<div class="modal fade text-capitalize" id="edit_home_modal" data-bs-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title">Edit Home Content</h2>
                <button class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div style="border: 4px solid var(--primary-color);" class="home_img text-center p-4 mb-5 rounded-3">
                    <img style="border: 4px solid var(--primary-color);" class="home_modal_img rounded-circle" src=""
                        width="200" height="200" alt="home_img">
                </div>

                <form action="" id="update_home_form">
                    <div class="row g-4">
                        <div class="form-group col-lg-6">
                            <label for="home_fname" class="label-control">first name</label>
                            <div class="input_icon d-flex align-items-center">
                                <i class="fa-solid fa-user fs-3 px-4"></i>
                                <input class="form-control fs-4 border-0 input" type="text" id="home_fname"
                                    name="home_fname">
                            </div>
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="home_lname" class="label-control">last name</label>
                            <div class="input_icon d-flex align-items-center">
                                <i class="fa-solid fa-user fs-3 px-4"></i>
                                <input class="form-control fs-4 border-0 input" type="text" id="home_lname"
                                    name="home_lname">
                            </div>
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="home_occu" class="label-control">Occupation</label>
                            <div class="input_icon d-flex align-items-center">
                                <i class="fa-solid fa-user fs-3 px-4"></i>
                                <input class="form-control fs-4 border-0 input" type="text" id="home_occu"
                                    name="home_occu">
                            </div>
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="home_img" class="label-control">Image</label>
                            <div class="input_icon d-flex align-items-center">
                                <i class="fa-solid fa-address-card fs-3 px-4"></i>
                                <input class="form-control fs-4 border-0 input" type="file" id="home_img"
                                    name="home_img" accept="image/jpg, image/png, image/jpeg, image/gif, image/jfif">
                            </div>
                        </div>
                        <div class="form-group col-lg-12">
                            <label for="home_cv" class="label-control">CV</label>
                            <div class="input_icon d-flex align-items-center">
                                <i class="fa-solid fa-file-lines fs-2 px-4"></i>
                                <input class="form-control fs-4 border-0 input" type="file" id="home_cv" name="home_cv"
                                    accept="application/msword, application/vnd.ms-powerpoint, application/pdf" />
                            </div>
                        </div>
                        <div class="form-group col-lg-12">
                            <textarea class="form-control fs-4" placeholder="Home description goes here" id="home_desc"
                                name="home_desc" style="height: 100px" maxlength="160"></textarea>
                        </div>

                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary fs-4" data-bs-dismiss="modal">Close</button>
                <button type="submit" id="update_home_btn" class="btn btn-info fs-4">Update</button>
            </div>
        </div>
    </div>
</div>