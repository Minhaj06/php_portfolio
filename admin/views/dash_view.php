<div class="container">
    <h1 class="text-capitalize mb-3">dashboard</h1>
    <div class="grid_container">
        <!-- hello_admin starts here -->
        <div class="item1 hello_admin">
            <div class="row">
                <div class="welcome col-sm-8 order-2 order-sm-0">
                    <h2 class="heading">Hello <span>Minhaj</span>!</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat rem, inventore esse dicta amet
                        tempora?</p>
                    <a href="">Write new post</a>
                </div>
                <div class="welcome_img col-sm-4 order-1">
                    <img src="assets/images/write_new_post.png" alt="">
                </div>
            </div>
        </div>
        <!-- hello_admin ends here -->
        <!-- social_shares starts here -->
        <div class="item2 social_shares">
            <h2 class="heading">social media shared</h2>
            <div class="shares_wrapper text-capitalize">
                <div class="share_single">
                    <i class="share_icon icon1 fa-brands fa-facebook"></i><span class="social_name">facebook</span><span
                        class="share_count">30k</span>
                </div>
                <div class="share_single">
                    <i class="share_icon icon2 fa-brands fa-whatsapp"></i><span class="social_name">whatsapp</span><span
                        class="share_count">29K</span>
                </div>
                <div class="share_single">
                    <i class="share_icon icon3 fa-brands fa-facebook-messenger"></i><span
                        class="social_name">messenger</span><span class="share_count">28.1K</span>
                </div>
                <div class="share_single">
                    <i class="share_icon icon4 fa-brands fa-twitter"></i><span class="social_name">twitter</span><span
                        class="share_count">04.1K</span>
                </div>
                <div class="share_single">
                    <i class="share_icon icon5 fa-brands fa-instagram"></i><span
                        class="social_name">instagram</span><span class="share_count">2.1K</span>
                </div>
                <div class="share_single">
                    <i class="share_icon icon6 fa-brands fa-telegram"></i><span class="social_name">Telegram</span><span
                        class="share_count">2.1K</span>
                </div>
                <div class="share_single">
                    <i class="share_icon icon7 fa-brands fa-behance"></i><span class="social_name">behance</span><span
                        class="share_count">2.1K</span>
                </div>
            </div>
            <div class="total_shares mt-5 mb-5 mb-md-0 text-center">
                <strong><i class="fa-solid fa-calculator"></i> total <span>93.30K</span> </strong>
            </div>
        </div>
        <!-- social_shares ends here -->
        <!-- counters starts here -->
        <div class="item3 counters">
            <?php include '../message.php'; ?>
            <div class="row g-4">
                <div class="col-xl-3 col-md-4 col-sm-6">
                    <div class="px-4 py-5 counter_single count1">
                        <div class="icon"><i class="fa-solid fa-users"></i></div>
                        <div class="counter_text">
                            <h3>12,20</h3>
                            <h4>flowers</h4>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-4 col-sm-6">
                    <div class="px-4 py-5 counter_single count2">
                        <div class="icon"><i class="fa-brands fa-blogger-b"></i></div>
                        <div class="counter_text">
                            <h3>124</h3>
                            <h4>articles</h4>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-4 col-sm-6">
                    <div class="px-4 py-5 counter_single count3">
                        <div class="icon"><i class="fa-solid fa-hourglass"></i></div>
                        <div class="counter_text">
                            <h3>03</h3>
                            <h4>pending articles</h4>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-4 col-sm-6">
                    <div class="px-4 py-5 counter_single count4">
                        <div class="icon"><i class="fa-solid fa-thumbs-up"></i></div>
                        <div class="counter_text">
                            <h3>150k</h3>
                            <h4>likes</h4>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-4 col-sm-6">
                    <div class="px-4 py-5 counter_single count5">
                        <div class="icon"><i class="fa-solid fa-comments"></i></div>
                        <div class="counter_text">
                            <h3>12,20</h3>
                            <h4>comments</h4>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-4 col-sm-6">
                    <div class="px-4 py-5 counter_single count6">
                        <div class="icon"><i class="fa-solid fa-chart-column"></i></div>
                        <div class="counter_text">
                            <h3>122</h3>
                            <h4>daily visits</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- counters ends here -->
        <!-- top_article starts here -->
        <div class="item4 top_articles">
            <div class="article_sec_header d-flex align-items-center justify-content-between">
                <h2 class="heading">top articles</h2>
                <div class="publish_month d-flex align-items-center justify-content-between">
                    <span class="icon"><i class="fa-solid fa-calendar-days"></i></span>
                    <select name="" id="">
                        <option value="">january</option>
                        <option class="op" value="">February</option>
                        <option value="">March</option>
                        <option value="">April</option>
                        <option value="">May</option>
                        <option value="">June</option>
                        <option value="">July</option>
                        <option value="">August</option>
                        <option value="">September</option>
                        <option value="">October</option>
                        <option value="">November</option>
                        <option value="">december</option>
                    </select>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Thumbnail</th>
                            <th>Summary</th>
                            <th>Views</th>
                            <th>Likes</th>
                            <th>Comments</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="top_article_single">
                            <th>01</th>
                            <td><img src="assets/images/web.jpg" alt="article_image"></td>
                            <td>
                                <p class="td_p">>
                                    Web design is the visual look of a website and the functionality from a user's
                                    perspective. ... Web development is the process...
                                </p>
                                <h5 class="publish_date">Feb 13, 2022</h5>
                            </td>
                            <td><span><i class="fa-solid fa-eye"></i> 6.1K</span></td>
                            <td><span><i class="fa-solid fa-thumbs-up"></i> 4.88K</span></td>
                            <td><span><i class="fa-solid fa-comments"></i> 2.8K</span></td>
                        </tr>
                        <tr class="top_article_single">
                            <th>02</th>
                            <td><img src="assets/images/python.jpg" alt="article_image"></td>
                            <td>
                                <p class="td_p">>
                                    কম্পিউটার সায়েন্সের খবর রাখেন অথচ পাইথন (Python) প্রোগ্রামিং ল্যাঙ্গুয়েজের নাম
                                    শোনেননি
                                    এমন কাউকে খুঁজে...
                                </p>
                                <h5 class="publish_date">Feb 13, 2022</h5>
                            </td>
                            <td><span><i class="fa-solid fa-eye"></i> 6.1K</span></td>
                            <td><span><i class="fa-solid fa-thumbs-up"></i> 4.88K</span></td>
                            <td><span><i class="fa-solid fa-comments"></i> 2.8K</span></td>
                        </tr>
                        <tr class="top_article_single">
                            <th>03</th>
                            <td><img src="assets/images/c_programming.jpg" alt="article_image"></td>
                            <td>
                                <p class="td_p">>
                                    By learning C, you will be able to understand and visualize the inner workings of
                                    computer systems...
                                </p>
                                <h5 class="publish_date">Feb 13, 2022</h5>
                            </td>
                            <td><span><i class="fa-solid fa-eye"></i> 6.1K</span></td>
                            <td><span><i class="fa-solid fa-thumbs-up"></i> 4.88K</span></td>
                            <td><span><i class="fa-solid fa-comments"></i> 2.8K</span></td>
                        </tr>
                        <tr class="top_article_single">
                            <th>04</th>
                            <td><img src="assets/images/java.jpg" alt="article_image"></td>
                            <td>
                                <p class="td_p">>
                                    জাভা মূলত একটি প্রোগ্রামিং ল্যাঙ্গুয়েজ। আর প্রোগ্রামিং ল্যাঙ্গুয়েজ হলেও মূলত একটি
                                    ভাষা। এই ধরনের ভাষা এগুলো শুধুমাত্র...
                                </p>
                                <h5 class="publish_date">Feb 13, 2022</h5>
                            </td>
                            <td><span><i class="fa-solid fa-eye"></i> 6.1K</span></td>
                            <td><span><i class="fa-solid fa-thumbs-up"></i> 4.88K</span></td>
                            <td><span><i class="fa-solid fa-comments"></i> 2.8K</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- top_article ends here -->
        <!-- recent commnets starts here -->
        <div class="item5 recent_comments">
            <h2 class="heading">comments</h2>
            <div class="comment_wrapper">
                <div class="comment_single d-flex position-relative">
                    <div class="img">
                        <img src="assets/images/commenter1.jpg" alt="commenter_img">
                    </div>
                    <div class="comment_text">
                        <h5 class="commenter_name">Mr. Nayan <span>has commented</span></h5>
                        <h3 class="comment">Than you so much bro. I have known many things from this article. Kindly
                            write
                            an article about Java vs JavaScript</h3>
                    </div>
                    <h4 class="comment_article_id position-absolute end-0 fs-2">226</h4>
                </div>
                <div class="comment_single d-flex position-relative">
                    <div class="img">
                        <img src="assets/images/commenter2.jfif" alt="commenter_img">
                    </div>
                    <div class="comment_text">
                        <h5 class="commenter_name">Robert Downey Jr. <span>has commented</span></h5>
                        <h3 class="comment">Than you so much bro. I have known many things from this article. Kindly
                            write
                            an article about Java vs JavaScript</h3>
                    </div>
                    <h4 class="comment_article_id position-absolute end-0 fs-2">02</h4>
                </div>
                <div class="comment_single d-flex position-relative">
                    <div class="img">
                        <img src="assets/images/commenter3.jfif" alt="commenter_img">
                    </div>
                    <div class="comment_text">
                        <h5 class="commenter_name">John Abraham <span>has commented</span></h5>
                        <h3 class="comment">Than you so much bro. I have known many things from this article. Kindly
                            write
                            an article about Java vs JavaScript</h3>
                    </div>
                    <h4 class="comment_article_id position-absolute end-0 fs-2">16</h4>
                </div>
                <div class="comment_single d-flex position-relative">
                    <div class="img">
                        <img src="assets/images/commenter4.jfif" alt="commenter_img">
                    </div>
                    <div class="comment_text">
                        <h5 class="commenter_name">Mr. Alex <span>has commented</span></h5>
                        <h3 class="comment">Than you so much bro. I have known many things from this article. Kindly
                            write
                            an article about Java vs JavaScript</h3>
                    </div>
                    <h4 class="comment_article_id position-absolute end-0 fs-2">226</h4>
                </div>
                <div class="comment_single d-flex position-relative">
                    <div class="img">
                        <img src="assets/images/commenter5.jfif" alt="commenter_img">
                    </div>
                    <div class="comment_text">
                        <h5 class="commenter_name">Steave Rogers <span>has commented</span></h5>
                        <h3 class="comment">Than you so much bro. I have known many things from this article. Kindly
                            write
                            an article about Java vs JavaScript</h3>
                    </div>
                    <h4 class="comment_article_id position-absolute end-0 fs-2">226</h4>
                </div>
            </div>
        </div>
        <!-- recent commnets ends here -->
        <!-- recent_articles starts here -->
        <div class="item6 recent_articles">
            <h2 class="heading">recent articles</h2>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>no</th>
                            <th>article title</th>
                            <th>post date</th>
                            <th>category</th>
                            <th>comment</th>
                            <th>liked</th>
                            <th>shared</th>
                            <th>viewers</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th>
                                <div class="sl_no">1</div>
                            </th>
                            <td class="recent_article_title">
                                <div class="d-flex align-items-center">
                                    <img class="me-4" src="assets/images/java.jpg" alt="article_img">
                                    <p>জাভা প্রোগ্রামিং ল্যাঙ্গুয়েজ এর গুরুত্ব এবং এর ব্যবহার ক্ষেত্র</p>
                                </div>
                            </td>
                            <td class="recent_date">17 Feb 2022</td>
                            <td>
                                <div class="cat">programming</div>
                            </td>
                            <td>332</td>
                            <td>8.5K</td>
                            <td>988</td>
                            <td>12K</td>
                        </tr>
                        <tr>
                            <th>
                                <div class="sl_no">2</div>
                            </th>
                            <td class="recent_article_title">
                                <div class="d-flex align-items-center">
                                    <img class="me-4" src="assets/images/web.jpg" alt="article_img">
                                    <p>What is the difference between Web Design and Development</p>
                                </div>
                            </td>
                            <td class="recent_date">15 Feb 2022</td>
                            <td>
                                <div class="cat">web design</div>
                            </td>
                            <td>332</td>
                            <td>8.5K</td>
                            <td>988</td>
                            <td>12K</td>
                        </tr>
                        <tr>
                            <th>
                                <div class="sl_no">3</div>
                            </th>
                            <td class="recent_article_title">
                                <div class="d-flex align-items-center">
                                    <img class="me-4" src="assets/images/web.jpg" alt="article_img">
                                    <p>পাইথন কি ? পাইথন কেন শিখবেন ?</p>
                                </div>
                            </td>
                            <td class="recent_date">15 Feb 2022</td>
                            <td>
                                <div class="cat">programming</div>
                            </td>
                            <td>332</td>
                            <td>8.5K</td>
                            <td>988</td>
                            <td>12K</td>
                        </tr>
                        <tr>
                            <th>
                                <div class="sl_no">4</div>
                            </th>
                            <td class="recent_article_title">
                                <div class="d-flex align-items-center">
                                    <img class="me-4" src="assets/images/web.jpg" alt="article_img">
                                    <p>Benefits of Learning C programming Language</p>
                                </div>
                            </td>
                            <td class="recent_date">15 Feb 2022</td>
                            <td>
                                <div class="cat">programming</div>
                            </td>
                            <td>332</td>
                            <td>8.5K</td>
                            <td>988</td>
                            <td>12K</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- recent_articles ends here -->
        <div class="item7 today_article">
            <h2 class="heading">today's articles</h2>
            <h3>Feb 15, 2022</h3>
            <div class="today_article_single d-flex">
                <div class="publish_time ms-xxl-5 ms-sm-5 me-sm-5 fs-3" style="min-width: 10rem;">12:30 AM</div>
                <div class="today_article_title">
                    <p class="mb-0">
                        কম্পিউটার সায়েন্সের খবর রাখেন অথচ পাইথন (Python) প্রোগ্রামিং ল্যাঙ্গুয়েজের
                    </p>
                    <h5>Assigned by <span>Minhaj</span></h5>
                </div>
            </div>
            <div class="today_article_single d-flex">
                <div class="publish_time ms-xxl-5 ms-sm-5 me-sm-5 fs-3" style="min-width: 10rem;">08:30 PM</div>
                <div class="today_article_title">
                    <p class="mb-0">
                        Importance of Learning English and It's Benefits
                    </p>
                    <h5>Assigned by <span>Minhaj</span></h5>
                </div>
            </div>
            <div class="today_article_single d-flex">
                <div class="publish_time ms-xxl-5 ms-sm-5 me-sm-5 fs-3" style="min-width: 10rem;">11:30 PM</div>
                <div class="today_article_title">
                    <p class="mb-0">
                        জাভা মূলত একটি প্রোগ্রামিং ল্যাঙ্গুয়েজ। আর প্রোগ্রামিং ল্যাঙ্গুয়েজ
                    </p>
                    <h5>Assigned by <span>Minhaj</span></h5>
                </div>
            </div>
        </div>
    </div>
</div>