<tbody id="userTableData">
    <?php
    $fetch_user_data = mysqli_query($conn, "SELECT * FROM users_info");

    $number = 1;

    if (mysqli_num_rows($fetch_user_data) > 0) {
        foreach ($fetch_user_data as $row) {
    ?>

    <!-- <tr class="data_row" id="<?= $row['id'] ?>" data-username="<?= $row['username'] ?>"
                            data-email="<?= $row['email'] ?>"> -->
    <tr class="data_row" id="<?= $row['id'] ?>">
        <td><?= $number ?></td>
        <td class="td_img">
            <img src="<?= '../uploaded_img/' . $row['image'] ?>" alt="Profile Pic">
        </td>
        <td data-target="fname"><?= $row['first_name'] ?></td>
        <td data-target="lname"><?= $row['last_name'] ?></td>
        <td data-target="username"><?= $row['username'] ?></td>
        <td data-target="email"><?= $row['email'] ?></td>
        <td data-target="contact_no"><?= $row['contact_no'] ?></td>
        <td data-target="role_as"><input id="hidden_role" type="hidden" name="role_as" value="<?= $row['role_as'] ?>">
            <?php
                    if ($row['role_as'] == 1) {
                        echo "<span>Admin</span>";
                    } elseif ($row['role_as'] == 0) {
                        echo "<span>User</span>";
                    }
                    ?>
        </td>
        <td style="min-width: 11rem;">
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