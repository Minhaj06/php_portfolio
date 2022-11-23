<div class="container pt-4">
    <h1 class="text-capitalize mb-3">Site Settings</h1>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item breadcrumb-active"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="site-settings">Site Settings</a></li>
        </ol>
    </nav>



    <!-- Hire Me Card Starts Here -->
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h2 class="mb-0">Site Info</h2>
            <span role="button" class="edit_home_btn" data-bs-toggle="modal" data-bs-target="#edit_hire_me_modal">
                <i class="fa-solid fa-pen-to-square"></i> Edit Home
            </span>
        </div>
        <div class="card-body">
            <?php include("../admin/assets/includes/message.php"); ?>

            <div class="row g-5" id="site_info">

                <?php
                $site_info_query = mysqli_query($conn, "SELECT `site_title`, `site_title2`, `site_description`, `site_keywords`, `site_logo`, `og_title`, `og_description`, `og_url`, `og_image` FROM `site_settings`");

                $site_info_result = mysqli_fetch_assoc($site_info_query);
                ?>

                <div class="col-xl-6 order-2 order-xl-1">
                    <div>
                        <div class="mb-4">
                            <h2>Site Title</h2>
                            <p class="opacity-75"><?= $site_info_result['site_title'] ?></p>
                        </div>
                        <div class="mb-4">
                            <h2>Site Title 2</h2>
                            <p class="opacity-75"><?= $site_info_result['site_title2'] ?></p>
                        </div>
                        <div class="mb-4">
                            <h2>Site Description</h2>
                            <p class="opacity-75"><?= $site_info_result['site_description'] ?></p>
                        </div>
                        <div class="mb-4">
                            <h2>Site Keywords</h2>
                            <p class="opacity-75"><?= $site_info_result['site_keywords'] ?></p>
                        </div>
                        <div class="mb-4">
                            <h2>Open Graph Title</h2>
                            <p class="opacity-75"><?= $site_info_result['og_title'] ?></p>
                        </div>
                        <div class="mb-4">
                            <h2>Open Graph Description</h2>
                            <p class="opacity-75"><?= $site_info_result['og_description'] ?></p>
                        </div>
                        <div class="mb-4">
                            <h2>Open Graph URL</h2>
                            <p class="opacity-75"><?= $site_info_result['og_url'] ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 order-1 order-xl-2" id="og_image">
                    <div>
                        <h2 class="mb-4">Open Graph Preview Image</h2>
                        <img class="w-100 h-100" src="<?= base_url("uploaded_img/" . $site_info_result['og_image']) ?>"
                            alt="Open Graph Image" loading="lazy">
                    </div>
                </div>
            </div>

        </div>
        <div class="card-footer text-end py-4">
            <button class="btn btn-secondary fs-4 me-3" data-bs-toggle="modal"
                data-bs-target="#change_site_info_modal">Change Data</button>
            <button class="btn btn-secondary fs-4 me-3" data-bs-toggle="modal"
                data-bs-target="#change_logo_modal">Change
                Logo</button>
            <button class="btn btn-secondary fs-4" data-bs-toggle="modal" data-bs-target="#change_og_image_modal">Change
                Image</button>
        </div>
    </div>
    <!-- Hire Me Card Ends Here -->
</div>



<!-- Update Site Info Modal Starts Here -->
<div class="modal fade text-capitalize" id="change_site_info_modal" data-bs-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title">Update Site Info</h2>
                <button class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">

                <div class="row">
                    <div class="form-group mb-4 col-lg-6">
                        <label for="site_title" class="label-control">Site Title</label>
                        <input class="form-control fs-4" type="text" id="site_title" name="site_title"
                            value="<?= $site_info_result['site_title'] ?>" placeholder="Site title">
                    </div>

                    <div class="form-group mb-4 col-lg-6">
                        <label for="site_title2" class="label-control">Site Title 2</label>
                        <input class="form-control fs-4" type="text" id="site_title2" name="site_title2"
                            value="<?= $site_info_result['site_title2'] ?>" placeholder="Site Title 2">
                    </div>
                    <div class="form-group mb-4 col-lg-12">
                        <label for="site_description" class="label-control">Site Description</label>
                        <textarea class="form-control fs-4" placeholder="Site description goes here"
                            id="site_description" name="site_description" rows="4"
                            maxlength="190"><?= $site_info_result['site_description'] ?></textarea>
                    </div>
                    <div class="form-group mb-4 col-lg-12">
                        <label for="site_keywords" class="label-control">Site Keywords</label>
                        <textarea class="form-control fs-4" placeholder="Site description goes here" id="site_keywords"
                            name="site_keywords" rows="4"
                            maxlength="190"><?= $site_info_result['site_keywords'] ?></textarea>
                    </div>
                    <div class="form-group mb-4 col-lg-6">
                        <label for="og_title" class="label-control">Open Graph Title</label>
                        <input class="form-control fs-4" type="text" id="og_title" name="og_title"
                            value="<?= $site_info_result['og_title'] ?>" placeholder="Site Title 2">
                    </div>
                    <div class="form-group mb-4 col-lg-6">
                        <label for="og_url" class="label-control">Open Graph URL</label>
                        <input class="form-control fs-4" type="text" id="og_url" name="og_url"
                            value="<?= $site_info_result['og_url'] ?>" placeholder="Site Title 2">
                    </div>
                    <div class="form-group mb-4 col-lg-12">
                        <label for="og_description" class="label-control">Open Graph Description</label>
                        <textarea class="form-control fs-4" placeholder="Site description goes here" id="og_description"
                            name="og_description" rows="4"
                            maxlength="190"><?= $site_info_result['og_description'] ?></textarea>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger fs-4" data-bs-dismiss="modal">Close</button>
                <button type="submit" id="update_site_info" name="update_site_info"
                    class="btn btn-secondary fs-4">Update Info</button>
            </div>
        </div>
    </div>
</div>
<!-- Update Site Info Modal Ends Here -->


<!-- Change Logo Modal -->
<div class="modal fade" id="change_logo_modal" data-bs-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title">Change Logo</h2>
                <button class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="" id="change_logo_form" enctype="multipart/form-data">
                <div class="modal-body">
                    <label class="label-control" for="logo_input">Choose a logo</label>
                    <input class="form-control fs-4" name="logo_input" id="logo_input" type="file" accept="image/png"
                        required>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger fs-4" data-bs-dismiss="modal">Close</button>
                    <button type="submit" id="change_logo" name="change_logo" class="btn btn-secondary fs-4">Change
                        Logo</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Change Open Graph Image Modal -->
<div class="modal fade" id="change_og_image_modal" data-bs-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title">Change Open Graph Image</h2>
                <button class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="" id="change_og_image_form" enctype="multipart/form-data">
                <div class="modal-body">
                    <label class="label-control" for="og_image_input">Choose a image</label>
                    <input class="form-control fs-4" name="og_image_input" id="og_image_input" type="file"
                        accept="image/png" required>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger fs-4" data-bs-dismiss="modal">Close</button>
                    <button type="submit" id="change_og_image" name="change_og_image"
                        class="btn btn-secondary fs-4">Change
                        Image</button>
                </div>
            </form>
        </div>
    </div>
</div>