<?php
$post_id = $single_post_result['id'];
?>

<div class="comments_area_wrapper pt-5" id="respond">
    <h2 class="widget_title mb-4">874 Comments</h2>

    <div class="comment_box d-flex mb-4">
        <?php
        if (!isset($_SESSION['auth'])) {
        ?>
        <img src="<?php base_url("img/avatar2.jpg") ?>" alt="commenter_img" class="commenter_img rounded-circle me-4">
        <?php
        } else { ?>
        <img src="<?php base_url("uploaded_img/" . $_SESSION['auth_user']['image']) ?>" alt="commenter_img"
            class="commenter_img rounded-circle me-4">
        <?php } ?>



        <div class="add_comment_box">
            <div id="comment_input" class="comment_input mb-2" contenteditable="true" placeholder="Add a comment...">
            </div>

            <div class="comment_buttons text-end">
                <button id="comment_cancel" class="comment_cancel btn">cancel</button>
                <button id="comment_submit" data-post-id="<?= $post_id ?>" class="comment_submit btn"
                    disabled>comment</button>

            </div>
        </div>

    </div>


    <div class="all_comments" id="all_comments">
        <?php
        $comments = mysqli_query($conn, "SELECT * FROM `blog_comments` WHERE `blog_id` = '$post_id'");
        if (mysqli_num_rows($comments) > 0) {
            while ($comments_result = mysqli_fetch_array($comments)) {

                // $post_id = $comments_result['blog_id'];
                $comment_id = $comments_result['comment_id'];
                $user_id = $comments_result['user_id'];

                $commenter_data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT `first_name`, `last_name`, `image` FROM `users_info` WHERE id = '$user_id' "));
        ?>

        <div class="single_comment d-flex mb-4">
            <img src="<?php base_url("uploaded_img/" . $commenter_data['image']) ?>" alt="commenter_img"
                class="commenter_img rounded-circle me-4">

            <div class="add_comment_box">

                <div class="d-flex justify-content-between">
                    <h4 class="commenter_name"><?= $commenter_data['first_name'] . ' ' . $commenter_data['last_name'] ?>
                    </h4>
                    <div class="comment_edit_delete_icons_area">
                        <button class="comment_edit_delete_ellipsis"><i
                                class="fa-solid fa-ellipsis-vertical"></i></button>
                        <div>
                            <div class="comment_edit_delete_icons" style="display: none">
                                <button data-comment-id="<?= $comment_id ?>"><i class="fa-solid fa-pen-fancy"></i>
                                    Edit</button>
                                <button data-comment-id="<?= $comment_id ?>"><i class="fa-solid fa-trash-can"></i>
                                    Delete</button>
                            </div>
                        </div>
                    </div>
                </div>

                <p class="comment_text"><?= $comments_result['comment'] ?></p>

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

                <button class="reply_btn">reply</button>

                <div>
                    <div id="reply_box<?= $comment_id ?>" class="reply_box mt-2"
                        style="display: none; margin-bottom: -2.5rem;">
                        <img src="<?php base_url("img/robot.jpg") ?>" alt="replier_img"
                            class="replier_img rounded-circle me-4">

                        <div class="add_reply_box">
                            <div id="reply_input<?= $comment_id ?>" data-comment-id="<?= $comment_id ?>"
                                class="reply_input mb-2" contenteditable="true" placeholder="Add a reply...">
                                <?= '@' . $commenter_data['first_name'] . ' ' . $commenter_data['last_name'] ?> &nbsp;
                            </div>

                            <div class="text-end">
                                <button id="reply_cancel<?= $comment_id ?>" data-comment-id="<?= $comment_id ?>"
                                    class="reply_cancel btn px-4">cancel</button>
                                <button id="reply_submit<?= $comment_id ?>" data-comment-id="<?= $comment_id ?>" class="reply_submit btn
                                    px-4" disabled>reply</button>
                            </div>
                            <!-- <button id="reply_cancel" class="reply_cancel btn float-end">cancel</button> -->
                        </div>
                    </div>
                </div>



                <button class="mt-3 show_replies_button"><i class="fa-solid fa-caret-down fs-3"></i> 43
                    REPLIES
                </button>

                <div>
                    <div class="comment_replies" style="display: none;">
                        <div class="comment_reply_single d-flex mt-3">
                            <img src="<?php base_url("img/robot.jpg") ?>" alt="replier_img"
                                class="replier_img rounded-circle me-4">
                            <div class="add_comment_box">

                                <div class="d-flex justify-content-between">
                                    <h4 class="commenter_name">Eric Odinson</h4>
                                    <div class="comment_edit_delete_icons_area">
                                        <button class="comment_edit_delete_ellipsis"><i
                                                class="fa-solid fa-ellipsis-vertical"></i></button>
                                        <div>
                                            <div class="comment_edit_delete_icons" style="display: none">
                                                <button><i class="fa-solid fa-pen-fancy"></i>
                                                    Edit</button>
                                                <button><i class="fa-solid fa-trash-can"></i>
                                                    Delete</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <p class="comment_text">Lorem ipsum, dolor sit amet consectetur
                                    adipisicing elit.</p>

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
                    </div>
                </div>

            </div>
        </div>

        <?php }
        } else { ?>
        <h2 class="text-capitalize text-center" style="color: var(--orange);">no comments yet!</h2>
        <p class="text-center">Be the first to comment</p>
        <?php } ?>

    </div>

</div>