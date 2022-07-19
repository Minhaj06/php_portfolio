<div class="message_show">
    <div class="my-4 p-3 alert alert-info alert-dismissible fade show d-flex" role="alert">
        <strong>
            <?php if (!isset($_SESSION['auth'])) {
                echo "Hey!";
            } else {
                echo "Hey, " . $_SESSION['auth_user']['user_fname'] . "!";
            }
            ?>
        </strong> <span class="ms-3 ation_message"></span>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
</div>