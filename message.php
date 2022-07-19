<?php
if (isset($_SESSION['message'])) {
?>
<div class="my-5 p-3 alert alert-info alert-dismissible fade show d-flex" role="alert">
    <div>
        <strong>
            <?php if (!isset($_SESSION['auth'])) {
                    echo "Hey!";
                } else {
                    echo "Hey, " . $_SESSION['auth_user']['user_fname'] . "!";
                }

                ?>
        </strong> <?= $_SESSION['message'] ?>
    </div>
    <div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
</div>
<?php
    unset($_SESSION['message']);
}
?>