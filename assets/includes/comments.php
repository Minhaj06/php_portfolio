<div class="comments_area_wrapper pt-5" id="comments">

    <?php
    $post_id = $single_post_result['id'];

    $comments = mysqli_query($conn, "SELECT * FROM `$comment_table` WHERE `blog_id` = '$post_id' ORDER BY COMMENT_ID DESC");

    $total_comments = mysqli_num_rows($comments);

    ?>

    <h2 class="widget_title mb-4"><?= str_pad($total_comments, 2, '0', STR_PAD_LEFT) ?> Comments</h2>

    <div class="comment_box d-flex mb-4">
        <?php
        if (!isset($_SESSION['auth'])) {
        ?>
        <img src="<?php base_url("assets/images/avatar.jpg") ?>" alt="commenter_img"
            class="commenter_img rounded-circle me-4">
        <?php
        } else { ?>
        <img src="<?php base_url("uploaded_img/" . $_SESSION['auth_user']['image']) ?>" alt="commenter_img"
            class="commenter_img rounded-circle me-4">
        <?php } ?>


        <div class="add_comment_box">
            <div id="comment_input" class="comment_input edit_content mb-2" contenteditable="true"
                placeholder="Add a comment...">
            </div>

            <div class="comment_buttons text-end">
                <button id="comment_cancel" class="comment_cancel cancel_btn btn">cancel</button>
                <button id="comment_submit" data-post-id="<?= $post_id ?>" class="comment_submit submit_btn btn"
                    disabled>comment</button>

            </div>
        </div>

    </div>


    <div class="all_comments" id="all_comments">
        <?php
        if ($total_comments > 0) {
            while ($comments_result = mysqli_fetch_array($comments)) {

                // $post_id = $comments_result['blog_id'];
                $comment_id = $comments_result['comment_id'];
                $user_id = $comments_result['user_id'];

                $commenter_data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT `first_name`, `last_name`, `image` FROM `users_info` WHERE id = '$user_id' "));
        ?>

        <div id="single_comment<?= $comment_id ?>" class="single_comment d-flex mb-4">
            <img src="<?php base_url("uploaded_img/" . $commenter_data['image']) ?>" alt="commenter_img"
                class="commenter_img rounded-circle me-4">

            <div class="add_comment_box">

                <?php
                        if (isset($_SESSION['auth']) && $_SESSION['auth_user']['user_id'] === $user_id) {
                        ?>
                <div class="d-flex justify-content-between comment_data">

                    <div class="commenter_comment comment_edit_delete_area">
                        <h4 class="commenter_name mb-4 pb-1">
                            <?= $commenter_data['first_name'] . ' ' . $commenter_data['last_name'] ?>
                        </h4>
                        <p class="comment_text"><?= $comments_result['comment'] ?></p>
                    </div>

                    <div class="comment_edit_delete_icons_area">
                        <button class="comment_edit_delete_ellipsis fa-solid fa-ellipsis-vertical"
                            data-comment-id="<?= $comment_id ?>"></button>
                        <!-- <div> -->
                        <div id="comment_edit_delete_icons<?= $comment_id ?>" class="comment_edit_delete_icons d-none">
                            <button id="edit_comment_btn<?= $comment_id ?>" class="edit_comment_btn"
                                data-comment-id="<?= $comment_id ?>"><i class="fa-solid fa-pen-fancy"></i>
                                Edit</button>
                            <button id="delete_comment_btn<?= $comment_id ?>" class="delete_comment_btn"
                                data-comment-id="<?= $comment_id ?>"><i class="fa-solid fa-trash-can"></i>
                                Delete</button>
                        </div>
                        <!-- </div> -->
                    </div>

                </div>


                <div class="comment_edit d-none" style="margin-bottom: -1rem;">
                    <div id="update_comment_input<?= $comment_id ?>" data-comment-id="<?= $comment_id ?>"
                        class="update_comment_input edit_content mb-2" contenteditable="true"
                        placeholder="Type to update..."></div>

                    <div class="text-end">
                        <button id="comment_update_cancel<?= $comment_id ?>" data-comment-id="<?= $comment_id ?>"
                            class="comment_update_cancel cancel_btn btn px-4">cancel</button>
                        <button id="comment_update<?= $comment_id ?>" data-comment-id="<?= $comment_id ?>" class="comment_update submit_btn btn
                                    px-4" disabled>update</button>
                    </div>
                </div>


                <?php  } else {  ?>
                <div class="commenter_comment">
                    <h4 class="commenter_name mb-4 pb-1">
                        <?= $commenter_data['first_name'] . ' ' . $commenter_data['last_name'] ?>
                    </h4>
                    <p class="comment_text"><?= $comments_result['comment'] ?></p>
                </div>
                <?php } ?>

                <div class="comment_reacts d-flex align-items-center float-start">
                    <div class="me-4">
                        <span role="button" title="I like this comment"><i class="fa-regular fa-thumbs-up"></i></span>
                        5.3k
                    </div>
                    <div class="me-4">
                        <span role="button" title="I dislike this comment"><i
                                class="fa-regular fa-thumbs-down"></i></span>
                        23
                    </div>
                </div>

                <button class="reply_btn" data-comment-id="<?= $comment_id ?>">reply</button>

                <div>
                    <div id="reply_box<?= $comment_id ?>" class="reply_box mt-2 d-flex d-none"
                        style="margin-bottom: -1rem;">
                        <img src="<?php base_url("assets/images/avatar.jpg") ?>" alt="replier_img"
                            class="replier_img rounded-circle me-4">

                        <div class="add_reply_box">
                            <div id="reply_input<?= $comment_id ?>" data-comment-id="<?= $comment_id ?>"
                                class="reply_input edit_content mb-2" contenteditable="true"
                                placeholder="Add a reply...">
                                <?= '@' . $commenter_data['first_name'] . ' ' . $commenter_data['last_name'] . ',&nbsp' ?>
                            </div>

                            <div class="text-end">
                                <button id="reply_cancel<?= $comment_id ?>" data-comment-id="<?= $comment_id ?>"
                                    class="reply_cancel cancel_btn btn px-4">cancel</button>
                                <button id="reply_submit<?= $comment_id ?>" data-comment-id="<?= $comment_id ?>" class="reply_submit submit_btn btn
                                    px-4" disabled>reply</button>
                            </div>
                            <!-- <button id="reply_cancel" class="reply_cancel btn float-end">cancel</button> -->
                        </div>
                    </div>
                </div>



                <?php
                        $replies_query = mysqli_query($conn, "SELECT * FROM `$reply_table` WHERE `comment_id` = $comment_id");

                        $total_replies = mysqli_num_rows($replies_query);

                        if ($total_replies > 0) {
                        ?>

                <button class="show_replies_button mt-2" data-comment-id="<?= $comment_id ?>"><i
                        class="fa-solid fa-caret-down fs-3 me-2"></i>
                    <?php
                                echo $total_replies;
                                if ($total_replies > 1) {
                                    echo " REPLIES";
                                } else {
                                    echo " REPLY";
                                }
                                ?>
                </button>
                <div id="comment_replies<?= $comment_id ?>" class="comment_replies d-none">

                    <?php
                                while ($replies_result = mysqli_fetch_array($replies_query)) {

                                    $reply_id = $replies_result['reply_id'];
                                    $replier_id = $replies_result['user_id'];

                                    $replier_data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT `first_name`, `last_name`, `image` FROM `users_info` WHERE id = '$replier_id' "));
                                ?>

                    <div class="comment_reply_single d-flex mt-2">
                        <img src="<?php base_url("uploaded_img/" . $replier_data['image']) ?>" alt="replier_img"
                            class="replier_img rounded-circle me-4">
                        <div class="add_comment_box">

                            <div class="d-flex justify-content-between">
                                <div>
                                    <h4 class="commenter_name mb-4 pb-1">
                                        <?= $replier_data['first_name'] . ' ' . $replier_data['last_name'] ?></h4>
                                    <p class="comment_text"><?= $replies_result['reply'] ?></p>
                                </div>

                                <?php
                                                if (isset($_SESSION['auth']) && $_SESSION['auth_user']['user_id'] === $replier_id) {
                                                ?>

                                <div class="reply_edit_delete_icons_area">
                                    <button class="reply_edit_delete_ellipsis fa-solid fa-ellipsis-vertical"
                                        data-reply-id="<?= $reply_id ?>"></button>
                                    <div>
                                        <div id="reply_edit_delete_icons<?= $reply_id ?>"
                                            class="reply_edit_delete_icons d-none">
                                            <button id="delete_reply_btn<?= $reply_id ?>" class="delete_reply_btn"
                                                data-reply-id="<?= $reply_id ?>"><i class="fa-solid fa-pen-fancy"></i>
                                                Delete</button>
                                            <button id="delete_reply_btn<?= $reply_id ?>" class="delete_reply_btn"
                                                data-reply-id="<?= $reply_id ?>"><i class="fa-solid fa-trash-can"></i>
                                                Delete</button>
                                        </div>
                                    </div>
                                </div>

                                <?php } ?>

                            </div>

                            <div class="comment_reacts d-flex">
                                <div class="me-4">
                                    <span role="button" title="I like this comment"><i
                                            class="fa-regular fa-thumbs-up"></i></span> 5.3k
                                </div>
                                <div>
                                    <span role="button" title="I dislike this comment"><i
                                            class="fa-regular fa-thumbs-down"></i></span>
                                    23
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php
                                }
                                ?>

                </div>

                <?php

                        }

                        ?>
            </div>
        </div>

        <?php }
        } else { ?>
        <h2 class="text-capitalize text-center" style="color: var(--orange);">no comments yet!</h2>
        <p class="text-center">Be the first to comment</p>
        <?php } ?>

    </div>

</div>