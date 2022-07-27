<!-- portfolio section starts here -->
<section id="portfolio">
    <div class="inner_portfolio container vertical_path">
        <div class="content">
            <h2 class="heading"><?= $select['portfolio_title'] ?></h2>
            <p class="para"><?= $select['portfolio_desc'] ?></p>
        </div>

        <div class="port_menu mt-5 mb-5">
            <ul class="p_cats d-md-flex justify-content-center align-items-center">
                <li class="bottom_space"><span class="p_cat active" data-filter="all">ALL</span></li>
                <li><span class="p_cat" data-filter="development">Web Development</span></li>
                <li><span class="p_cat" data-filter="html">HTML</span></li>
                <li><span class="p_cat" data-filter="ui">UI/UX</span></li>
                <li><span class="p_cat" data-filter="design">Web Design</span></li>
            </ul>
        </div>

        <div class="port_items row g-5 justify-content-center align-items-center">




            <div class="col-xl-4 col-md-6 port_single development">
                <div>
                    <a href="#"><img src="uploaded_img/port_item_1.png" alt="portfolio_image" /></a>
                    <div class="overlay_bg">
                        <div class="overlay_content">
                            <h3>Application Development</h3>
                            <h4>HTML, CSS, jQuery</h4>
                            <p class="para">
                                Lorem ipsum dolor sit amet,Stet clita kasd lorem ipsum dolor sit amet. sed diam
                                eirmod tempor dolore.
                            </p>
                            <a href="https://minhaj06.github.io/systematic/" target="_blank">
                                <button class="button">Live preview</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>






        </div>
        <div class="text-center mt-5 pt-5">
            <a href="portfolio.php"><button class="button">view all</button></a>
        </div>
    </div>
</section>
<!-- portfolio section ends here -->