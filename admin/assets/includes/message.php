<!-- <div class=""> -->
<!-- <div class="message_show my-4 p-3 alert alert-info alert-dismissible show d-flex d-none fade" role="alert">
    <strong>
        <?php if (!isset($_SESSION['auth'])) {
            echo "Hey!";
        } else {
            echo "Hey, " . $_SESSION['auth_user']['user_fname'] . "!";
        }
        ?>
    </strong> <span class="ms-3 ation_message"></span>
    <button type="button" class="btn-close" data-bs-dismiss="" aria-label=""></button>
</div> -->
<!-- </div> -->


<!-- Message Modal -->
<div class="modal fade" id="messageBox" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content border-0 bg-transparent">
            <div class="modal-body rounded-3 text-center text-info message_show px-2 py-5 mx-5 mx-sm-0 mb-0"
                style="background: #000;">
                <h3 class="ation_message py-5 py-sm-2"></h3>
            </div>
        </div>
    </div>
</div>