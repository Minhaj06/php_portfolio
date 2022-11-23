<!-- Registered Users table Starts -->
<div class="container">
    <h1 class="text-capitalize mb-3">Users</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item breadcrumb-active"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="view_register.php">Users</a></li>
        </ol>
    </nav>

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h2 class="mb-0">Registered Users</h2>
            <button id="add_user" class="btn btn-success fs-3" data-bs-target="#add_user_modal"
                data-bs-toggle="modal">Add User/Admin</button>
        </div>
        <div class="card-body">
            <?php include("../admin/assets/includes/message.php"); ?>

            <div class="table-responsive">
                <table id="usersDataTable" class="table table-striped table-hover pt-3">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>image</th>
                            <th>first name</th>
                            <th>last name</th>
                            <th>username</th>
                            <th>email</th>
                            <th>phone</th>
                            <th>role as</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="userData">
                        <?php
                        $fetch_user_data = mysqli_query($conn, "SELECT * FROM users_info");

                        $number = 1;

                        if (mysqli_num_rows($fetch_user_data) > 0) {
                            foreach ($fetch_user_data as $row) {
                        ?>

                        <!-- <tr class="data_row" id="<?= $row['id'] ?>" data-username="<?= $row['username'] ?>"
                            data-email="<?= $row['email'] ?>"> -->
                        <tr class="data_row" id="<?= $row['id'] ?>">
                            <td class="align-middle"><?= $number ?></td>
                            <td class="align-middle" class="td_img">
                                <img src="<?= base_url("uploaded_img/" . $row['image']) ?>" alt="Profile Pic"
                                    loading="lazy">
                            </td>
                            <td class="align-middle" data-target="fname"><?= $row['first_name'] ?></td>
                            <td class="align-middle" data-target="lname"><?= $row['last_name'] ?></td>
                            <td class="align-middle" data-target="username"><?= $row['username'] ?></td>
                            <td class="align-middle" data-target="email"><?= $row['email'] ?></td>
                            <td class="align-middle" data-target="contact_no"><?= $row['contact_no'] ?></td>
                            <td class="align-middle" data-target="role_as"><input id="hidden_role" type="hidden"
                                    name="role_as" value="<?= $row['role_as'] ?>">
                                <?php
                                        if ($row['role_as'] == 1) {
                                            echo "<span>Admin</span>";
                                        } elseif ($row['role_as'] == 0) {
                                            echo "<span>User</span>";
                                        }
                                        ?>
                            </td>
                            <td class="align-middle" style="min-width: 10rem;">
                                <span data-role="view" role="button" data-id="<?= $row['id'] ?>"
                                    class="text-decoration-none me-3 view_btn text-success" data-bs-toggle="modal"
                                    data-bs-target="#viewModal">
                                    <i class="fa-solid fa-eye"></i>
                                </span>
                                <span data-role="edit" role="button" data-id="<?= $row['id'] ?>"
                                    class="text-decoration-none me-3 edit_btn text-info" data-bs-toggle="modal"
                                    data-bs-target="#staticBackdrop">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </span>
                                <span data-role="delete" role="button" data-id="<?= $row['id'] ?>"
                                    class="text-decoration-none delete_btn text-danger">
                                    <i class="fa-solid fa-trash-can"></i>
                                </span>
                            </td>
                        </tr>
                        <?php $number++ ?>
                        <?php
                            }
                        } else {
                            echo "No records founded";
                        }

                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- Registered Users table Ends -->


<!-- Add User/Admin Modal Starts -->
<div class="modal fade" id="add_user_modal" data-bs-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title">Add User or Admin</h2>
                <button class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="" id="add_user_form">
                <div class="modal-body">
                    <div class="row g-4 text-capitalize">
                        <div class="form-group col-sm-6">
                            <label for="add_fname" class="label-control">first name</label>
                            <div class="input_icon d-flex align-items-center">
                                <i class="fa-solid fa-user fs-3 px-4"></i>
                                <input class="form-control fs-4 border-0 input" type="text" id="add_fname"
                                    name="add_fname">
                            </div>
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="add_lname" class="label-control">last name</label>
                            <div class="input_icon d-flex align-items-center">
                                <i class="fa-solid fa-user fs-3 px-4"></i>
                                <input class="form-control fs-4 border-0 input" type="text" id="add_lname"
                                    name="add_lname">
                            </div>
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="add_username" class="label-control">username</label>
                            <span class="add_username_error ms-3"></span>
                            <div class="input_icon d-flex align-items-center">
                                <i class="fa-solid fa-user fs-3 px-4"></i>
                                <input class="form-control fs-4 border-0 input" type="text" id="add_username"
                                    name="add_username">
                            </div>
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="add_email" class="label-control">email</label>
                            <span class="add_email_error ms-3"></span>
                            <div class="input_icon d-flex align-items-center">
                                <i class="fa-solid fa-envelope fs-3 px-4"></i>
                                <input class="form-control fs-4 border-0 input" type="email" id="add_email"
                                    name="add_email">
                            </div>
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="add_contact_no" class="label-control">contact</label>
                            <div class="input_icon d-flex align-items-center">
                                <i class="fa-solid fa-phone fs-3 px-4"></i>
                                <input class="form-control fs-4 border-0 input" type="phone" name="add_contact_no"
                                    id="add_contact_no">
                            </div>
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="add_password" class="label-control">password</label>
                            <div class="input_icon d-flex align-items-center">
                                <i class="fa-solid fa-lock fs-3 px-4"></i>
                                <input class="form-control fs-4 border-0 input" type="password" name="add_password"
                                    id="add_password">
                            </div>
                        </div>
                        <div class="form-groud col-sm-6">
                            <label for="add_role_select" class="label-control">role as</label>
                            <div class="input_icon d-flex align-items-center">
                                <i class="fa-solid fa-gear fs-3 px-4"></i>
                                <select class="w-100 p-1" name="add_role_select" id="add_role_select">
                                    <option>--Select Role--</option>
                                    <option value="0">User</option>
                                    <option value="1">Admin</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="add_image">Profile Pic</label>
                            <div class="input_icon d-flex align-items-center">
                                <i class="fa-solid fa-address-card fs-3 px-4"></i>
                                <input class="form-control fs-4 border-0 input" type="file" name="add_image"
                                    id="add_image" accept="image/jpg, image/png, image/jpeg, image/gif, image/jfif">
                            </div>
                        </div>
                        <input type="hidden" id="action" name="action" value="add_user">
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary fs-3" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="add_user btn btn-primary fs-3">Add User/Admin</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Add User/Admin Modal Ends -->



<!-- User UPDATE Modal Starts -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title">Update User</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="text-center modal_profile mb-3">
                    <img id="modal_img" class="profile_pic" src="" alt="profile_pic">
                    <h3 id="modal_username"></h3>
                    <h4 id="modal_email"></h4>
                </div>
                <div class="row g-4 text-capitalize">
                    <div class="form-group col-sm-6">
                        <label for="fname" class="label-control">first name</label>
                        <div class="input_icon d-flex align-items-center">
                            <i class="fa-solid fa-user fs-3 px-4"></i>
                            <input class="form-control fs-4 border-0 input" type="text" id="fname" name="fname"
                                required>
                        </div>
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="lname" class="label-control">last name</label>
                        <div class="input_icon d-flex align-items-center">
                            <i class="fa-solid fa-user fs-3 px-4"></i>
                            <input class="form-control fs-4 border-0 input" type="text" id="lname" name="lname"
                                required>
                        </div>
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="username" class="label-control">username</label>
                        <span class="username_error ms-3"></span>
                        <div class="input_icon d-flex align-items-center">
                            <i class="fa-solid fa-user fs-3 px-4"></i>
                            <input class="form-control fs-4 border-0 input" type="text" id="username" name="username"
                                required>
                        </div>
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="email" class="label-control">email</label>
                        <span class="email_error ms-3"></span>
                        <div class="input_icon d-flex align-items-center">
                            <i class="fa-solid fa-envelope fs-3 px-4"></i>
                            <input class="form-control fs-4 border-0 input" type="email" id="email" name="email"
                                required>
                        </div>
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="contact_no" class="label-control">contact</label>
                        <div class="input_icon d-flex align-items-center">
                            <i class="fa-solid fa-phone fs-3 px-4"></i>
                            <input class="form-control fs-4 border-0 input" type="text" name="contact_no"
                                id="contact_no" required>
                        </div>
                    </div>
                    <div class="form-groud col-sm-6">
                        <label for="role_select" class="label-control">role as</label>
                        <div class="input_icon d-flex align-items-center">
                            <i class="fa-solid fa-gear fs-3 px-4"></i>
                            <select class="w-100 p-1" name="role_select" id="role_select">
                                <option value="" class="option_1"></option>
                                <option value="" class="option_2"></option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group col-12">
                        <label for="image">Profile Pic</label>
                        <div class="input_icon d-flex align-items-center">
                            <i class="fa-solid fa-address-card fs-3 px-4"></i>
                            <input class="form-control fs-4 border-0 input" type="file" name="image" id="image"
                                accept="image/jpg, image/png, image/jpeg, image/gif, image/jfif">
                        </div>
                    </div>
                    <input type="hidden" id="user_id" name="user_id">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary fs-3" data-bs-dismiss="modal">Close</button>
                <button type="submit" id="update_user" class="btn btn-success fs-3">Update</button>
            </div>
        </div>
    </div>
</div>

<!-- User UPDATE Modal Ends -->


<!-- View user data modal starts -->
<div class="modal fade" id="viewModal" data-bs-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title">User Details</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <center>
                    <img id="view_modal_img" class="profile_pic mb-4" src="" alt="user_img">
                </center>
                <table class="table table-bordered table-striped">
                    <tbody>
                        <tr>
                            <th>First Name</th>
                            <td id="view_fname"></td>
                        </tr>
                        <tr>
                            <th>Last Name</th>
                            <td id="view_lname"></td>
                        </tr>
                        <tr>
                            <th>username</th>
                            <td id="view_username"></td>
                        </tr>
                        <tr>
                            <th>email</th>
                            <td id="view_email" style="word-break: break-all;"></td>
                        </tr>
                        <tr>
                            <th>phone</th>
                            <td id="view_contact"></td>
                        </tr>
                        <tr>
                            <th>role as</th>
                            <td id="view_role"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary fs-3" data-bs-dismiss="modal">Close</button>

                <button type="button" data-role="edit" data-id="<?= $row['id'] ?>"
                    class="edit_btn btn btn-warning fs-3 px-5" data-bs-toggle="modal"
                    data-bs-target="#staticBackdrop">Edit</button>
            </div>
        </div>
    </div>
</div>
<!-- View user data modal ends -->



<!-- Delete user modal starts -->
<?php

$confirm_title = "Delete user data";
$confirm_text = "Do you want to delete this user?";

include_once "../admin/assets/includes/confirmBox.php";

?>
<!-- Delete user modal ends -->