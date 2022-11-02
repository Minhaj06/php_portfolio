$(selector).append('\
<div id="single_comment2" class="single_comment d-flex mb-4">\
    <img src="http://localhost/coder/uploaded_img/Minhaj06.jpg" alt="commenter_img" class="commenter_img rounded-circle me-4">\
    <div class="add_comment_box">\
        <div class="d-flex justify-content-between comment_data">\
            <div class="commenter_comment comment_edit_delete_area">\
                <h4 class="commenter_name mb-4 pb-1">Md. Minhaj Kobir</h4>\
                <p class="comment_text">Thank you</p>\
            </div>\
            <div class="comment_edit_delete_icons_area">\
                <button class="comment_edit_delete_ellipsis fa-solid fa-ellipsis-vertical"></button>\
                <div>\
                    <div class="comment_edit_delete_icons" style="display: none;">\
                        <button id="edit_comment_btn2" class="edit_comment_btn" data-comment-id="2"><i class="fa-solid fa-pen-fancy"></i>Edit</button>\
                        <button id="delete_comment_btn2" class="delete_comment_btn" data-comment-id="2"><i class="fa-solid fa-trash-can"></i>Delete</button>\
                    </div>\
                </div>\
            </div>\
        </div>\
        <div class="comment_edit d-none" style="margin-bottom: -1rem;">\
            <div id="update_comment_input2" data-comment-id="2" class="update_comment_input edit_content mb-2" contenteditable="true" placeholder="Type to update..."></div>\
            <div class="text-end">\
                <button id="comment_update_cancel2" data-comment-id="2" class="comment_update_cancel cancel_btn btn px-4">cancel</button>\
                <button id="comment_update2" data-comment-id="2" class="comment_update submit_btn btn px-4" disabled="">update</button>\
            </div>\
        </div>\
        <div class="comment_reacts d-flex align-items-center float-start">\
            <div class="me-4"><span role="button" title="I like this comment"><i class="fa-regular fa-thumbs-up"></i></span> 5.3k</div>\
            <div class="me-4"><span role="button" title="I dislike this comment"><i class="fa-regular fa-thumbs-down"></i></span> 23</div>\
        </div>\
        <button class="reply_btn">reply</button>\
        <div>\
            <div id="reply_box2" class="reply_box mt-2" style="display: none; margin-bottom: -1rem;">\
                <img src="http://localhost/coder/assets/images/avatar.jpg" alt="replier_img" class="replier_img rounded-circle me-4">\
                <div class="add_reply_box">\
                    <div id="reply_input2" data-comment-id="2" class="reply_input edit_content mb-2" contenteditable="true" placeholder="Add a reply...">@Md. Minhaj Kobir,&nbsp;</div>\
                    <div class="text-end">\
                        <button id="reply_cancel2" data-comment-id="2" class="reply_cancel cancel_btn btn px-4">cancel</button>\
                        <button id="reply_submit2" data-comment-id="2" class="reply_submit submit_btn btn px-4" disabled="">reply</button>\
                    </div>\
                </div>\
            </div>\
        </div>\
    </div>\
</div>\
');