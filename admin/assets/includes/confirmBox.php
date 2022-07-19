<div class="modal fade" id="confirmBox" tabindex="-1" data-bs-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title"><?= $confirm_title ?></h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h2 class="text-danger"><?= $confirm_text ?></h2>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary fs-3" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-danger fs-3" id="confirm_ok">Yes, Delete</button>
            </div>
        </div>
    </div>
</div>