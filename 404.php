    <?php
    $title = "404 || Not Found";
    include_once("admin/config/dbConnect.php");
    include_once("assets/includes/head.php");
    ?>
    </head>

    <body>

        <div
            class="404_wrapper p-4 p-sm-5 position-absolute start-0 top-0 w-100 h-100 d-flex flex-column justify-content-center align-items-center text-center">
            <div class="_404_content_wrapper p-5"
                style="background: #242526; box-shadow: .5rem .5rem 1rem rgba(255,255,255, .5);">
                <div class="_404_content p-5">
                    <h1 class="" style="font-size: 9rem;"><i class="fa-solid fa-face-frown"></i></h1>
                    <h1 class="text_404" style="font-size: 6rem;font-weight: 800; color: var(--orange)">4<i
                            class="fa-solid fa-bug"></i>4
                    </h1>
                    <h2 style="font-size: 3.5rem;" class="mb-3">Opps! page not found</h2>
                    <p>Oops! The page you are looking for does not exist. It might have been moved or deleted.</p>

                    <a href="<?php base_url("") ?>"
                        class="btn btn-primary rounded-pill px-5 py-3 bg-transparent text-primary fs-3">
                        <span><i class="fa-solid fa-house-chimney"></i></span>
                        Back Home
                    </a>
                    <a href="<?php base_url("blogs.php") ?>"
                        class="btn btn-success rounded-pill px-5 py-3 bg-transparent text-success fs-3">
                        <span><i class="fa-solid fa-newspaper"></i></span>
                        Read Blog
                    </a>
                </div>
            </div>
        </div>

    </body>

    </html>