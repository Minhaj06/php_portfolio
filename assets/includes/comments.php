<?php
$post_id = $single_post_result['id'];
?>

<div class="comments_area_wrapper pt-5" id="respond">
    <h2 class="widget_title mb-4">874 Comments</h2>

    <div class="comment_box d-flex mb-4">

        <img src="<?php base_url("img/robot.jpg") ?>" alt="commenter_img" class="commenter_img rounded-circle me-4">

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
        ?>

        <div class="single_comment d-flex mb-4">
            <img src="<?php base_url("uploaded_img/168234.png") ?>" alt="commenter_img"
                class="commenter_img rounded-circle me-4">

            <div class="add_comment_box">

                <div class="d-flex justify-content-between">
                    <h4 class="commenter_name">Eric Odinson</h4>
                    <div class="comment_edit_delete_icons_area">
                        <button class="comment_edit_delete_ellipsis"><i
                                class="fa-solid fa-ellipsis-vertical"></i></button>
                        <div>
                            <div class="comment_edit_delete_icons" style="display: none">
                                <button><i class="fa-solid fa-pen-fancy"></i> Edit</button>
                                <button><i class="fa-solid fa-trash-can"></i> Delete</button>
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
                    <div class="reply_box mt-2" style="display: none; margin-bottom: -2rem;">
                        <img src="<?php base_url("img/robot.jpg") ?>" alt="replier_img"
                            class="replier_img rounded-circle me-4">

                        <div class="add_reply_box">
                            <div id="reply_input" class="reply_input mb-2" contenteditable="true"
                                placeholder="Add a reply...">
                            </div>

                            <!-- <div class="comment_buttons text-end"> -->
                            <button id="reply_cancel" class="reply_cancel btn">cancel</button>
                            <button id="reply_submit" data-post-id="<?= $post_id ?>" class="reply_submit btn px-4"
                                disabled>reply</button>

                            <!-- </div> -->
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