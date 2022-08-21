<div class="container pt-4">
    <h1 class="text-capitalize mb-3">Update Blog</h1>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item breadcrumb-active"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="blog_update.php">Blog</a></li>
        </ol>
    </nav>


    <?php
    $query = mysqli_query($conn, "SELECT * FROM `blog_section` LIMIT 1 ");
    $result = mysqli_fetch_assoc($query);
    ?>


    <?php include("../admin/assets/includes/message.php"); ?>

    <!-- Blog section content card starts here -->
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h2 class="mb-0">Blog Content</h2>

            <span class="" role="button" data-bs-toggle="modal" data-bs-target="#edit_blog_content_modal">
                <i class="fa-solid fa-pen-to-square"></i> Edit Content
            </span>
        </div>

        <div class="card-body" id="blog_content">
            <h2 class="heading m-0"><?= $result['blog_title'] ?></h2>
            <p class="mt-2"><?= $result['blog_desc'] ?></p>
        </div>
    </div>
    <!-- Blog section content card ends here -->


    <!-- Blog categories card starts here -->
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h2 class="mb-0">Blog Category</h2>

            <span id="add_blog_category" role="button" data-bs-target="#add_blog_cotegory_modal" data-bs-toggle="modal">
                <i class="fa-solid fa-plus"></i>
                Add Category
            </span>
        </div>

        <div class="card-body" id="blog_category">
            <div class="table-responsive">
                <table class="table table-striped table-hover display" style="min-width: 100rem;">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Slug(URL)</th>
                            <th>Meta Title</th>
                            <th>Meta Keywords</th>
                            <th>No. Of Posts</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        $category_query = mysqli_query($conn, "SELECT * FROM `blog_categories`");

                        if (mysqli_num_rows($category_query) > 0) {
                            while ($category_result = mysqli_fetch_array($category_query)) {
                        ?>

                        <tr id="cat<?= $category_result['id'] ?>">
                            <td data-target="category_name" class="align-middle">
                                <?= $category_result['name'] ?></td>

                            <td data-target="category_slug" class="align-middle">
                                <?= $category_result['slug'] ?></td>

                            <td data-target="category_meta_title" class="align-middle">
                                <?= $category_result['meta_title'] ?></td>

                            <td data-target="category_meta_keywords" class="align-middle">
                                <?= $category_result['meta_keywords'] ?></td>

                            <td data-target="" class="align-middle">
                                <?= $category_result['no_of_post'] ?>
                            </td>

                            <td data-target="category_status" class="align-middle">
                                <?php
                                        if ($category_result['status'] == 1) {
                                            echo "Visible";
                                        } else {
                                            echo "Hidden";
                                        }
                                        ?>
                            </td>

                            <td class="align-middle">
                                <span data-id="<?= $category_result['id'] ?>" class="fs-4 text-capitalize"
                                    id="edit_blog_cat_btn" role="button" data-bs-target="#edit_blog_cotegory_modal"
                                    data-bs-toggle="modal">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </span>

                                <span data-id="<?= $category_result['id'] ?>" class="fs-4 text-capitalize ms-4"
                                    id="delete_blog_cat_btn" role="button">
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
    <!-- Blog categories card ends here -->


    <!-- Blog posts card starts here -->
    <div class="card-right">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h2 class="mb-0">Portfolio Items</h2>

                <span id="add_service" role="button" data-bs-target="#add_portfolio_modal" data-bs-toggle="modal">
                    <i class="fa-solid fa-plus"></i>
                    Add Portfolio
                </span>
            </div>

            <div class="card-body" id="portfolio_items">
                <div class="table-responsive">
                    <table id="usersDataTable" class="table display table-striped table-hover"
                        style="min-width: 1270px;">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Technology</th>
                                <th>Description</th>
                                <th>URL</th>
                                <th>Category</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            $portfolio_query = mysqli_query($conn, "SELECT * FROM `portfolio_items`");

                            if (mysqli_num_rows($portfolio_query) > 0) {
                                while ($portfolio_result = mysqli_fetch_array($portfolio_query)) {
                            ?>

                            <tr class="<?= $portfolio_result['port_item_id'] ?>">
                                <td>
                                    <a href="<?= $portfolio_result['portfolio_url'] ?>" target="_blank">
                                        <img id="<?= $portfolio_result['port_item_id'] ?>view_image"
                                            src="../uploaded_img/<?= $portfolio_result['portfolio_image'] ?>"
                                            alt="Portfolio_image"
                                            style="width: 8rem; height: 10rem; background: var(--primary-color-light); padding: .5rem; border: 1px solid;">
                                    </a>
                                </td>

                                <td data-target="portfolio_name">
                                    <?= $portfolio_result['portfolio_name'] ?>
                                </td>

                                <td data-target="portfolio_technology">
                                    <?= $portfolio_result['portfolio_technology'] ?>
                                </td>

                                <td data-target="portfolio_description">
                                    <?= $portfolio_result['portfolio_description'] ?>
                                </td>

                                <style>
                                a:hover {
                                    color: var(--primary-color)
                                }
                                </style>

                                <td data-target="portfolio_url">
                                    <a href="<?= $portfolio_result['portfolio_url'] ?>"
                                        target="_blank"><?= $portfolio_result['portfolio_url'] ?></a>
                                </td>

                                <td data-target="portfolio_category">
                                    <?= $portfolio_result['portfolio_category'] ?>
                                </td>

                                <td style="min-width: 10rem;">
                                    <span data-id="<?= $portfolio_result['port_item_id'] ?>"
                                        class="fs-4 text-capitalize text-success" id="view_portfolio_btn" role="button"
                                        data-bs-target="#view_portfolio_modal" data-bs-toggle="modal">
                                        <i class="fa-solid fa-eye"></i>
                                    </span>

                                    <span data-id="<?= $portfolio_result['port_item_id'] ?>"
                                        class="fs-4 text-capitalize text-info ms-4" id="edit_portfolio_btn"
                                        role="button" data-bs-target="#edit_portfolio_modal" data-bs-toggle="modal">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </span>

                                    <span data-id="<?= $portfolio_result['port_item_id'] ?>"
                                        class="fs-4 text-capitalize text-danger ms-4" id="delete_portfolio_btn"
                                        role="button">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </span>
                                </td>
                            </tr>

                            <?php
                                }
                            } else {
                                ?>

                            <tr>
                                <td class="text-center py-5 fs-1" colspan="8">No portfolio founded!</td>
                            </tr>

                            <?php } ?>

                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
    <!-- Blog posts card ends here -->

    <!-- Blog Card Ends Here -->
</div>



<!-- Update Blog Content Modal Starts -->
<div class="modal fade text-capitalize" id="edit_blog_content_modal" data-bs-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title">Edit Blog Content</h2>
                <i class="fa-solid fa-xmark fs-2" role="button" data-bs-dismiss="modal"></i>
            </div>
            <div class="modal-body">
                <form action="">
                    <div class="row g-4">
                        <div class="form-group">
                            <label for="blog_title" class="label-control">Title</label>
                            <div class="input_icon d-flex align-items-center">
                                <i class="fa-solid fa-heading fs-3 px-4"></i>
                                <input class="form-control fs-4 border-0 input" type="text" id="blog_title"
                                    name="blog_title" value="<?= $result['blog_title'] ?>"
                                    placeholder="Type blog section title">
                            </div>
                        </div>

                        <div class="form-group">
                            <textarea class="form-control fs-4" placeholder="Blog section description goes here"
                                id="blog_desc" name="blog_desc" style="height: 130px"
                                maxlength="190"><?= $result['blog_desc'] ?></textarea>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary fs-4" data-bs-dismiss="modal">Close</button>
                <button type="submit" id="update_blog_content_btn" class="btn btn-secondary fs-4">Update</button>
            </div>
        </div>
    </div>
</div>
<!-- Update Blog Content Modal Ends -->


<!-- Add Blog Category Modal Starts -->
<div class="modal fade text-capitalize" id="add_blog_cotegory_modal" data-bs-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title">Add Category</h2>
                <i class="fa-solid fa-xmark fs-2" role="button" data-bs-dismiss="modal"></i>
            </div>
            <div class="modal-body">

                <div class="row g-4">

                    <div class="form-group col-lg-6">
                        <label for="blog_cat_name" class="label-control">Category name</label>
                        <span class="add_cat_error ms-3"></span>
                        <input class="form-control fs-4" type="text" id="blog_cat_name" name="blog_cat_name"
                            placeholder="Type category name">
                    </div>

                    <div class="form-group col-lg-6">
                        <label for="blog_cat_slug" class="label-control">Slug(URL)</label>
                        <span class="add_cat_slug_error ms-3"></span>
                        <input class="form-control fs-4" type="text" id="blog_cat_slug" name="blog_cat_slug"
                            placeholder="Type category slug">
                    </div>

                    <div class="form-group col-lg-6">
                        <label for="blog_cat_description" class="label-control">description</label>
                        <textarea class="form-control fs-4" placeholder="Blog category description goes here"
                            id="blog_cat_description" name="blog_cat_description" rows="4" maxlength="190"></textarea>
                    </div>

                    <div class="form-group col-lg-6">
                        <label for="blog_cat_meta_title" class="label-control">Meta Title</label>
                        <input class="form-control fs-4" type="text" id="blog_cat_meta_title" name="blog_cat_meta_title"
                            placeholder="Type category meta title">
                    </div>

                    <div class="form-group col-lg-6">
                        <label for="blog_cat_meta_description" class="label-control">meta description</label>
                        <textarea class="form-control fs-4" placeholder="Category meta description goes here"
                            id="blog_cat_meta_description" name="blog_cat_meta_description" rows="4"
                            maxlength="190"></textarea>
                    </div>

                    <div class="form-group col-lg-6">
                        <label for="blog_cat_meta_keywords" class="label-control">meta keywords</label>
                        <textarea class="form-control fs-4" placeholder="Category meta keywords goes here"
                            id="blog_cat_meta_keywords" name="blog_cat_meta_keywords" rows="4"
                            maxlength="190"></textarea>
                    </div>

                    <div class="form-group col-lg-12">
                        <input class="form-check-input" type="checkbox" value="" id="blog_cat_status"
                            name="blog_cat_status">
                        <label class="form-check-label" for="blog_cat_status">Status</label>
                    </div>

                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary fs-4" data-bs-dismiss="modal">Close</button>
                <button type="submit" id="add_blog_category_btn" class="btn btn-secondary fs-4">Add
                    Category</button>
            </div>
        </div>
    </div>
</div>
<!-- Add Blog Category Modal Ends -->


<!-- Edit Blog Category Modal Starts -->
<div class="modal fade text-capitalize" id="edit_blog_cotegory_modal" data-bs-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title">Edit Category</h2>
                <i class="fa-solid fa-xmark fs-2" role="button" data-bs-dismiss="modal"></i>
            </div>
            <div class="modal-body">

                <div class="row g-4">

                    <div class="form-group col-lg-6">
                        <label for="edit_blog_cat_name" class="label-control">Category name</label>
                        <span class="add_cat_error ms-3"></span>
                        <input class="form-control fs-4" type="text" id="edit_blog_cat_name" name="edit_blog_cat_name"
                            placeholder="Type category name">
                    </div>

                    <div class="form-group col-lg-6">
                        <label for="edit_blog_cat_slug" class="label-control">Slug(URL)</label>
                        <span class="add_cat_slug_error ms-3"></span>
                        <input class="form-control fs-4" type="text" id="edit_blog_cat_slug" name="edit_blog_cat_slug"
                            placeholder="Type category slug">
                    </div>

                    <div class="form-group col-lg-6">
                        <label for="edit_blog_cat_description" class="label-control">description</label>
                        <textarea class="form-control fs-4" placeholder="Blog category description goes here"
                            id="edit_blog_cat_description" name="edit_blog_cat_description" rows="4"
                            maxlength="190"></textarea>
                    </div>

                    <div class="form-group col-lg-6">
                        <label for="edit_blog_cat_meta_title" class="label-control">Meta Title</label>
                        <input class="form-control fs-4" type="text" id="edit_blog_cat_meta_title"
                            name="edit_blog_cat_meta_title" placeholder="Type category meta title">
                    </div>

                    <div class="form-group col-lg-6">
                        <label for="edit_blog_cat_meta_description" class="label-control">meta description</label>
                        <textarea class="form-control fs-4" placeholder="Category meta description goes here"
                            id="edit_blog_cat_meta_description" name="edit_blog_cat_meta_description" rows="4"
                            maxlength="190"></textarea>
                    </div>

                    <div class="form-group col-lg-6">
                        <label for="edit_blog_cat_meta_keywords" class="label-control">meta keywords</label>
                        <textarea class="form-control fs-4" placeholder="Category meta keywords goes here"
                            id="edit_blog_cat_meta_keywords" name="edit_blog_cat_meta_keywords" rows="4"
                            maxlength="190"></textarea>
                    </div>

                    <div class="form-group col-lg-12">
                        <input class="form-check-input" type="checkbox" value="" id="edit_blog_cat_status"
                            name="edit_blog_cat_status">
                        <label class="form-check-label" for="edit_blog_cat_status">Status</label>
                    </div>

                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary fs-4" data-bs-dismiss="modal">Close</button>
                <button id="update_blog_category_btn" class="btn btn-secondary fs-4">Update
                    Category</button>
            </div>
        </div>
    </div>
</div>
<!-- Edit Blog Category Modal Ends -->


<!-- Add Portfolio Modal Starts -->
<div class="modal fade text-capitalize" id="add_portfolio_modal" data-bs-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title">Add Portfolio</h2>
                <i class="fa-solid fa-xmark fs-2" role="button" data-bs-dismiss="modal"></i>
            </div>

            <form action="" id="add_portfolio_form" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row g-4">

                        <div class="form-group col-lg-6">
                            <label for="port_name" class="label-control">Portfolio Name</label>
                            <input class="form-control fs-4" type="text" id="port_name" name="port_name"
                                placeholder="Type portfolio name">
                        </div>

                        <div class="form-group col-lg-6">
                            <label for="port_technology" class="label-control">Portfolio Technology</label>
                            <input class="form-control fs-4" type="text" id="port_technology" name="port_technology"
                                placeholder="What technology have you used?">
                        </div>

                        <div class="form-group col-lg-6">
                            <label for="port_url" class="label-control">Portfolio URL</label>
                            <input class="form-control fs-4" type="text" id="port_url" name="port_url"
                                placeholder="https://minhajkobir.com">
                        </div>

                        <div class="form-group col-lg-6">
                            <label for="port_image" class="label-control">Portfolio Image</label>
                            <input class="form-control fs-4" type="file"
                                accept="image/jpg, image/png, image/jpeg, image/gif, image/jfif" id="port_image"
                                name="port_image" placeholder="Type portfolio URL">
                        </div>

                        <div class="form-group col-12">
                            <label for="port_cat">Portfolio Category</label>
                            <select class="form-select fs-4" name="port_category" id="port_category">

                                <option value="">--Select Category--</option>

                                <?php
                                $category_query = mysqli_query($conn, "SELECT port_cat_name FROM `portfolio_category` WHERE port_cat_status ='1' ");

                                if (mysqli_num_rows($category_query) > 0) {
                                    while ($category_result = mysqli_fetch_array($category_query)) {
                                ?>
                                <option value="<?= $category_result['port_cat_name'] ?>">
                                    <?= $category_result['port_cat_name'] ?></option>

                                <?php }
                                } ?>

                            </select>
                        </div>

                        <div class="form-group col-12">
                            <label for="port_description" class="label-control">Portfolio Description (Max Length:
                                120)</label>
                            <textarea class="form-control fs-4" placeholder="Portfolio description goes here"
                                id="port_description" name="port_description" style="height: 130px"
                                maxlength="120"></textarea>
                        </div>

                        <input type="hidden" name="add_portfolio">

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary fs-4" data-bs-dismiss="modal">Close</button>
                    <button type="submit" id="add_portfolio_btn" class="btn btn-secondary fs-4">Add
                        Portfolio</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Add Portfolio Modal Ends -->


<!-- View Portfolio Modal Starts -->
<div class="modal fade" id="view_portfolio_modal" data-bs-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title">View Portfolio</h2>
                <i class="fa-solid fa-xmark fs-2" role="button" data-bs-dismiss="modal"></i>
            </div>
            <div class="modal-body" style="max-height: 60rem;">

                <div style="border-bottom: 1px solid var(--primary-color);" class="home_img text-center pb-3 mb-4">

                    <a href="" id="view_port_img_modal_url" target="_blank">
                        <img id="view_port_img_modal"
                            style="max-height: 45rem; border: 2px solid; border-radius: .5rem;" width="100%"
                            class="home_modal_img p-2" src="" alt="Portfolio Image">
                    </a>

                </div>

                <table class="table table-striped table-bordered table-hover">
                    <tbody>
                        <tr>
                            <th class="align-middle">Portfolio Name</th>
                            <td class="align-middle" id="view_port_name"></td>
                        </tr>
                        <tr>
                            <th class="align-middle">Using Technology</th>
                            <td class="align-middle" id="view_port_technology"></td>
                        </tr>
                        <tr>
                            <th class="align-middle">Description</th>
                            <td class="align-middle" id="view_port_description"></td>
                        </tr>
                        <tr>
                            <th class="align-middle">Portfolio URL</th>
                            <td class="align-middle" id="view_port_url">
                                <a href="" target="_blank"></a>
                            </td>
                        </tr>
                        <tr>
                            <th class="align-middle">Portfolio Category</th>
                            <td class="align-middle" id="view_port_category"></td>
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
<!-- View Portfolio Modal Starts -->


<!-- Edit Portfolio Modal Starts -->
<div class="modal fade text-capitalize" id="edit_portfolio_modal" data-bs-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title">Edit Portfolio</h2>
                <i class="fa-solid fa-xmark fs-2" role="button" data-bs-dismiss="modal"></i>
            </div>

            <form action="" id="edit_portfolio_form" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row g-4">

                        <div class="form-group col-lg-6">
                            <label for="edit_port_name" class="label-control">Portfolio Name</label>
                            <input class="form-control fs-4" type="text" id="edit_port_name" name="edit_port_name"
                                placeholder="Type portfolio name">
                        </div>

                        <div class="form-group col-lg-6">
                            <label for="edit_port_technology" class="label-control">Portfolio Technology</label>
                            <input class="form-control fs-4" type="text" id="edit_port_technology"
                                name="edit_port_technology" placeholder="What technology have you used?">
                        </div>

                        <div class="form-group col-lg-6">
                            <label for="edit_port_url" class="label-control">Portfolio URL</label>
                            <input class="form-control fs-4" type="text" id="edit_port_url" name="edit_port_url"
                                placeholder="https://minhajkobir.com">
                        </div>

                        <div class="form-group col-lg-6">
                            <label for="edit_port_image" class="label-control">Portfolio Image</label>
                            <input class="form-control fs-4" type="file"
                                accept="image/jpg, image/png, image/jpeg, image/gif, image/jfif" id="edit_port_image"
                                name="edit_port_image">
                        </div>

                        <div class="form-group col-12">
                            <label for="edit_port_category">Portfolio Category</label>
                            <select class="form-select fs-4" name="edit_port_category" id="edit_port_category">

                                <option value="">Uncategorized</option>

                                <?php
                                $category_query = mysqli_query($conn, "SELECT port_cat_name FROM `portfolio_category` WHERE port_cat_status ='1' ");

                                if (mysqli_num_rows($category_query) > 0) {
                                    while ($category_result = mysqli_fetch_array($category_query)) {
                                ?>
                                <option value="<?= $category_result['port_cat_name'] ?>">
                                    <?= $category_result['port_cat_name'] ?></option>

                                <?php }
                                } ?>

                            </select>
                        </div>

                        <div class="form-group col-12">
                            <label for="edit_port_description" class="label-control">Portfolio Description (Max Length:
                                120)</label>
                            <textarea class="form-control fs-4" placeholder="Portfolio description goes here"
                                id="edit_port_description" name="edit_port_description" style="height: 130px"
                                maxlength="120"></textarea>
                        </div>

                        <input type="hidden" value="" name="edit_port_id" id="edit_port_id">
                        <input type="hidden" name="update_portfolio">

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary fs-4" data-bs-dismiss="modal">Close</button>
                    <button type="submit" id="update_portfolio_btn" class="btn btn-secondary fs-4">Add
                        Portfolio</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Edit Portfolio Modal Ends -->


<!-- Delete Confirm Modal Modal Starts Here -->
<?php
$confirm_title = "Delete Alert";
$confirm_text = "Do you want to delete this?";

include_once "../admin/assets/includes/confirmBox.php";
?>
<!-- Delete Confirm Modal Ends Here -->