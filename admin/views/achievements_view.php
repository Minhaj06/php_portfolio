<div class="container pt-4">
    <h1 class="text-capitalize mb-3">Update Achievements</h1>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item breadcrumb-active"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="achievements_update.php">Achievements</a></li>
        </ol>
    </nav>



    <!-- Achievements Card Starts Here -->
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h2 class="mb-0">Achievements</h2>

            <span class="" role="button" data-bs-toggle="modal" data-bs-target="#">
                <i class="fa-solid fa-pen-to-square"></i> Edit All
            </span>

        </div>

        <div class="card-body mt-4">

            <div class="row g-5">

                <?php
                $achieve_query = mysqli_query($conn, "SELECT * FROM `achievements` LIMIT 1");
                $achieve_query = mysqli_fetch_assoc($achieve_query);

                $clients = $achieve_query['clients'];
                $projects = $achieve_query['projects'];
                $awards = $achieve_query['awards'];
                $experience = $achieve_query['experience'];

                function achievement_item($num)
                {
                    echo (str_pad($num, 2, '0', STR_PAD_LEFT));
                }
                ?>

                <div class="col-md-6 col-xl-3">
                    <div class="card rounded-3">
                        <div class="card-header rounded-top d-flex justify-content-between align-items-center">
                            <h3>Clients</h3>
                            <span role="button"><i class="fa-solid fa-pen-to-square"></i>Edit</span>
                        </div>
                        <div class="card-body py-5 d-flex flex-column justify-content-center align-items-center"
                            style="color: var(--primary-color);background: var(--body-color);">
                            <h3 class="fw-bold" style="font-size: 4.5rem;"><span class="counter"
                                    data-target="<?php achievement_item($clients) ?>">00</span><span>+</span>
                            </h3>
                            <p class="h1">Clients</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-xl-3">
                    <div class="card rounded-3">
                        <div class="card-header rounded-top d-flex justify-content-between align-items-center">
                            <h3>Clients</h3>
                            <span role="button"><i class="fa-solid fa-pen-to-square"></i>Edit</span>
                        </div>
                        <div class="card-body py-5 d-flex flex-column justify-content-center align-items-center"
                            style="color: var(--primary-color);background: var(--body-color);">
                            <h3 class="fw-bold" style="font-size: 4.5rem;"><span class="counter"
                                    data-target="<?php achievement_item($projects) ?>">00</span>
                            </h3>
                            <p class="h1">Projects</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-xl-3">
                    <div class="card rounded-3">
                        <div class="card-header rounded-top d-flex justify-content-between align-items-center">
                            <h3>Clients</h3>
                            <span role="button"><i class="fa-solid fa-pen-to-square"></i>Edit</span>
                        </div>
                        <div class="card-body py-5 d-flex flex-column justify-content-center align-items-center"
                            style="color: var(--primary-color);background: var(--body-color);">
                            <h3 class="fw-bold" style="font-size: 4.5rem;"><span class="counter"
                                    data-target="<?php achievement_item($awards) ?>">00</span>
                            </h3>
                            <p class="h1">Awards</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-xl-3">
                    <div class="card rounded-3">
                        <div class="card-header rounded-top d-flex justify-content-between align-items-center">
                            <h3>Clients</h3>
                            <span role="button"><i class="fa-solid fa-pen-to-square"></i>Edit</span>
                        </div>
                        <div class="card-body py-5 d-flex flex-column justify-content-center align-items-center"
                            style="color: var(--primary-color);background: var(--body-color);">
                            <h3 class="fw-bold" style="font-size: 4.5rem;"><span class="counter"
                                    data-target="<?php achievement_item($experience) ?>">00</span>
                            </h3>
                            <p class="h1">Years Experience</p>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
    <!-- Achievements Card Ends Here -->
</div>