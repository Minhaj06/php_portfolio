<div class="container pt-4">
    <h1 class="text-capitalize mb-3">Update Blog</h1>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item breadcrumb-active"><a href="<?php base_url('admin/') ?>">Dashboard</a></li>
            <li class="breadcrumb-item">Blogs</li>
        </ol>
    </nav>


    <?php
    $query = mysqli_query($conn, "SELECT * FROM `blog_section` LIMIT 1 ");
    $result = mysqli_fetch_assoc($query);
    ?>


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
                                <a href="<?= base_url("category/" . $category_result['slug']) ?>" target="_blank"
                                    class="fs-4 text-success"><i class="fa-solid fa-eye"></i></a>

                                <span data-id="<?= $category_result['id'] ?>" class="fs-4 text-info ms-4"
                                    id="edit_blog_cat_btn" role="button" data-bs-target="#edit_blog_cotegory_modal"
                                    data-bs-toggle="modal">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </span>

                                <span data-id="<?= $category_result['id'] ?>" class="fs-4 text-danger ms-4"
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
                <h2 class="mb-0">Blog Posts</h2>

                <span id="add_blog_post" role="button" data-bs-target="#add_blog_post_modal" data-bs-toggle="modal">
                    <i class="fa-solid fa-plus"></i>
                    Add Post
                </span>
            </div>

            <div class="card-body" id="blog_posts">
                <div class="table-responsive">
                    <table id="usersDataTable" class="table display table-striped table-hover"
                        style="min-width: 950px;">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Title</th>
                                <th>status</th>
                                <th>category</th>
                                <th>views</th>
                                <th>created on</th>
                                <th>actions</th>
                            </tr>
                        </thead>

                        <style>
                        td a {
                            text-decoration: none;
                        }

                        td a:hover {
                            color: var(--text-color)
                        }
                        </style>

                        <tbody>
                            <?php
                            $blog_post_query = mysqli_query($conn, "SELECT * FROM `blog_posts` ORDER BY id DESC");

                            if (mysqli_num_rows($blog_post_query) > 0) {
                                while ($blog_post_result = mysqli_fetch_array($blog_post_query)) {
                            ?>

                            <tr class="blog<?= $blog_post_result['id'] ?>">
                                <td class="align-middle">
                                    <a href="<?= base_url('post/' . $blog_post_result['slug']) ?>" target="_blank">
                                        <img src="<?= base_url('uploaded_img/' . $blog_post_result['image']) ?>"
                                            alt="Portfolio_image"
                                            style="width: 12rem; height: 9rem; background: var(--primary-color-light); padding: .5rem; border: 1px solid;">
                                    </a>
                                </td>

                                <td class="align-middle"><?= $blog_post_result['title'] ?></td>

                                <td class="align-middle">
                                    <?php
                                            if ($blog_post_result['status'] == '1') {
                                                echo "Publushed";
                                            } else {
                                                echo "Unpublished";
                                            }
                                            ?>
                                </td>

                                <td class="align-middle"><?= $blog_post_result['category'] ?></td>

                                <td class="align-middle"><?= $blog_post_result['views'] ?></td>

                                <td class="align-middle" style="min-width: 13rem;">
                                    <?php
                                            $timestamp =  $blog_post_result['created_at'];
                                            $date = date("M d, Y", strtotime($timestamp));
                                            echo $date;
                                            ?>
                                </td>

                                <td class="align-middle" style="min-width: 10rem;">
                                    <!-- <span data-id="<?= $blog_post_result['id'] ?>"
                                        class="fs-4 text-capitalize text-success" id="view_blog_post_btn" role="button"
                                        data-bs-target="#view_blog_post_modal" data-bs-toggle="modal">
                                        <i class="fa-solid fa-eye"></i>
                                    </span> -->

                                    <a href="<?php base_url("post/" . $blog_post_result['slug']) ?>" target="_blank"
                                        class="fs-4 text-capitalize text-success"><i class="fa-solid fa-eye"></i></a>

                                    <span data-id="<?= $blog_post_result['id'] ?>"
                                        class="fs-4 text-capitalize text-info ms-4" id="edit_blog_post_btn"
                                        role="button" data-bs-target="#edit_blog_post_modal" data-bs-toggle="modal">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </span>

                                    <span data-id="<?= $blog_post_result['id'] ?>"
                                        class="fs-4 text-capitalize text-danger ms-4" id="delete_blog_post_btn"
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
                        <span class="edit_cat_error ms-3"></span>
                        <input class="form-control fs-4" type="text" id="edit_blog_cat_name" name="edit_blog_cat_name"
                            placeholder="Type category name">
                    </div>

                    <div class="form-group col-lg-6">
                        <label for="edit_blog_cat_slug" class="label-control">Slug(URL)</label>
                        <span class="edit_cat_slug_error ms-3"></span>
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


<!-- Add Blog Post Modal Starts -->
<div class="modal fade" id="add_blog_post_modal" data-bs-backdrop="static">
    <div class="modal-dialog modal-fullscreen-xl-down modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title">Add Post</h2>
                <i class="fa-solid fa-xmark fs-2" role="button" data-bs-dismiss="modal"></i>
            </div>

            <form action="" id="add_blog_post_form" enctype="multipart/form-data">
                <div style="max-height: fit-content;" class="modal-body pb-5">
                    <div class="row g-4">

                        <div class="form-group col-lg-6">
                            <label for="add_post_title" class="label-control">Title</label>
                            <input class="form-control fs-4" type="text" id="add_post_title" required
                                name="add_post_title" placeholder="Enter post title">
                        </div>

                        <div class="form-group col-lg-6">
                            <label for="add_post_slug" class="label-control">Slug (URL)</label>
                            <span class="add_post_slug_error ms-3"></span>
                            <input class="form-control fs-4" type="text" id="add_post_slug" required
                                name="add_post_slug" placeholder="Enter slug (URL)">
                        </div>

                        <div class="form-group col-12">
                            <label for="add_post_description" class="label-control">Description</label>
                            <textarea class="form-control fs-4" placeholder="Post description goes here"
                                id="add_post_description" required name="add_post_description" rows="6"></textarea>
                        </div>

                        <div class="form-group col-12">
                            <label for="add_post_meta_title" class="label-control">Meta Title</label>
                            <input class="form-control fs-4" type="text" id="add_post_meta_title" required
                                name="add_post_meta_title" placeholder="Type meta title">
                        </div>

                        <div class="form-group col-lg-6">
                            <label for="add_post_meta_keywords" class="label-control">Meta Keywords</label>
                            <textarea class="form-control fs-4" placeholder="Type meta keywords"
                                id="add_post_meta_keywords" required name="add_post_meta_keywords" rows="4"></textarea>
                        </div>

                        <div class="form-group col-lg-6">
                            <label for="add_post_meta_description" class="label-control">Meta Description</label>
                            <textarea class="form-control fs-4" placeholder="Meta description goes here"
                                id="add_post_meta_description" required name="add_post_meta_description"
                                rows="4"></textarea>
                        </div>

                        <div class="form-group col-lg-6">
                            <label for="add_post_image" class="label-control">Post Image</label>
                            <input class="form-control fs-4" type="file"
                                accept="image/jpg, image/png, image/jpeg, image/gif, image/jfif" id="add_post_image"
                                required name="add_post_image" placeholder="Type portfolio URL">
                        </div>

                        <div class="form-group col-lg-6">
                            <label for="add_post_category">Portfolio Category</label>
                            <select class="form-select fs-4" name="add_post_category" id="add_post_category">

                                <option value="">-- Select Category --</option>

                                <?php
                                $category_query = mysqli_query($conn, "SELECT name FROM `blog_categories` WHERE status ='1' ");

                                if (mysqli_num_rows($category_query) > 0) {
                                    while ($category_result = mysqli_fetch_array($category_query)) {
                                ?>
                                <option value="<?= $category_result['name'] ?>">
                                    <?= $category_result['name'] ?></option>

                                <?php }
                                } ?>

                            </select>
                        </div>

                        <div class="form-group col-lg-12">
                            <input class="form-check-input" type="checkbox" value="" id="add_post_status"
                                name="add_post_status">
                            <label class="form-check-label" for="add_post_status">Status</label>
                        </div>

                        <input type="hidden" required name="add_blog_post">

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary fs-4" data-bs-dismiss="modal">Close</button>
                    <button type="submit" id="add_blog_post_btn" class="btn btn-secondary fs-4">Add
                        Post</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Add Blog Post Modal Ends -->


<!-- View Blog Post Modal Starts -->
<!-- <div class="modal fade" id="view_blog_post_modal" data-bs-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title">View Portfolio</h2>
                <i class="fa-solid fa-xmark fs-2" role="button" data-bs-dismiss="modal"></i>
            </div>
            <div class="modal-body">

                <div style="border-bottom: 1px solid var(--primary-color);" class="home_img text-center pb-3 mb-4">

                    <a href="" id="" target="_blank">
                        <img id="view_post_image" style="height: 40rem; border: 2px solid; border-radius: .5rem;"
                            width="100%" class="home_modal_img p-2" src="" alt="Portfolio Image">
                    </a>

                </div>

                <table class="table table-striped table-bordered">
                    <tbody>
                        <tr>
                            <th class="align-middle">Title</th>
                            <td class="align-middle" id="view_post_title"></td>
                        </tr>
                        <tr>
                            <th class="align-middle">Slug (URL)</th>
                            <td class="align-middle" id="view_post_slug"></td>
                        </tr>
                        <tr>
                            <th class="align-middle">Portfolio Category</th>
                            <td class="align-middle" id="view_post_category"></td>
                        </tr>
                        <tr>
                            <th class="align-middle">Status</th>
                            <td class="align-middle" id="view_post_status"></td>
                        </tr>
                        <tr>
                            <th class="align-middle">Created On</th>
                            <td class="align-middle" id="view_post_created_at"></td>
                        </tr>
                        <tr>
                            <th class="align-middle">Meta Title</th>
                            <td class="align-middle" id="view_post_meta_title"></td>
                        </tr>
                        <tr>
                            <th class="align-middle">Meta Keywords</th>
                            <td class="align-middle" id="view_post_meta_keywords"></td>
                        </tr>
                        <tr>
                            <th class="align-middle">Meta Description</th>
                            <td class="align-middle" id="view_post_meta_description"></td>
                        </tr>
                        <tr>
                            <th class="align-middle">Post Description</th>
                            <td class="align-middle" id="view_post_description"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div> -->
<!-- View Blog Post Modal Starts -->


<!-- Edit Blog Post Modal Starts -->
<div class="modal fade" id="edit_blog_post_modal" data-bs-backdrop="static">
    <div class="modal-dialog modal-fullscreen-xl-down modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title">Add Post</h2>
                <i class="fa-solid fa-xmark fs-2" role="button" data-bs-dismiss="modal"></i>
            </div>

            <form action="" id="edit_blog_post_form" enctype="multipart/form-data">
                <div style="max-height: fit-content;" class="modal-body pb-5">
                    <div class="row g-4">

                        <div class="form-group col-lg-6">
                            <label for="edit_post_title" class="label-control">Title</label>
                            <input class="form-control fs-4" type="text" id="edit_post_title" required
                                name="edit_post_title" placeholder="Enter post title">
                        </div>

                        <div class="form-group col-lg-6">
                            <label for="edit_post_slug" class="label-control">Slug (URL)</label>
                            <span class="edit_post_slug_error ms-3"></span>
                            <input class="form-control fs-4" type="text" id="edit_post_slug" required
                                name="edit_post_slug" placeholder="Enter slug (URL)">
                        </div>

                        <div class="form-group col-12">
                            <label for="edit_post_description" class="label-control">Description</label>
                            <textarea class="form-control fs-4" placeholder="Post description goes here"
                                id="edit_post_description" required name="edit_post_description" rows="6"></textarea>
                        </div>

                        <div class="form-group col-12">
                            <label for="edit_post_meta_title" class="label-control">Meta Title</label>
                            <input class="form-control fs-4" type="text" id="edit_post_meta_title" required
                                name="edit_post_meta_title" placeholder="Type meta title">
                        </div>

                        <div class="form-group col-lg-6">
                            <label for="edit_post_meta_keywords" class="label-control">Meta Keywords</label>
                            <textarea class="form-control fs-4" placeholder="Type meta keywords"
                                id="edit_post_meta_keywords" required name="edit_post_meta_keywords"
                                rows="4"></textarea>
                        </div>

                        <div class="form-group col-lg-6">
                            <label for="edit_post_meta_description" class="label-control">Meta Description</label>
                            <textarea class="form-control fs-4" placeholder="Meta description goes here"
                                id="edit_post_meta_description" required name="edit_post_meta_description"
                                rows="4"></textarea>
                        </div>

                        <div class="form-group col-lg-6">
                            <label for="edit_post_image" class="label-control">Post Image</label>
                            <input class="form-control fs-4" type="file"
                                accept="image/jpg, image/png, image/jpeg, image/gif, image/jfif" id="edit_post_image"
                                name="edit_post_image" placeholder="Type portfolio URL">
                        </div>

                        <div class="form-group col-lg-6">
                            <label for="edit_post_category">Portfolio Category</label>
                            <select class="form-select fs-4" name="edit_post_category" id="edit_post_category">

                                <option value="uncategorized">Uncategorized</option>

                                <?php
                                $category_query = mysqli_query($conn, "SELECT name FROM `blog_categories` WHERE status ='1' ");

                                if (mysqli_num_rows($category_query) > 0) {
                                    while ($category_result = mysqli_fetch_array($category_query)) {
                                ?>
                                <option value="<?= $category_result['name'] ?>">
                                    <?= $category_result['name'] ?></option>

                                <?php }
                                } ?>

                            </select>
                        </div>

                        <div class="form-group col-lg-12">
                            <input class="form-check-input" type="checkbox" value="" id="edit_post_status"
                                name="edit_post_status">
                            <label class="form-check-label" for="edit_post_status">Status</label>
                        </div>

                        <input type="hidden" required id="update_blog_post_id" name="update_blog_post_id">

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary fs-4" data-bs-dismiss="modal">Close</button>
                    <button type="submit" id="update_post_btn" class="btn btn-secondary fs-4">Update
                        Post</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Edit Blog Post Modal Ends -->


<!-- Delete Confirm Modal Modal Starts Here -->
<?php
$confirm_title = "Delete Alert";
$confirm_text = "Do you want to delete this?";
?>
<!-- Delete Confirm Modal Ends Here -->