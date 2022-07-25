<div class="container pt-4">
    <h1 class="text-capitalize mb-3">Update Achievements</h1>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item breadcrumb-active"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="achievements_update.php">Achievements</a></li>
        </ol>
    </nav>


    <?php include("../admin/assets/includes/message.php"); ?>
    <!-- Achievements Card Starts Here -->
    <div class="card" id="achievements_content">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h2 class="mb-0">Achievements</h2>

            <span class="" role="button" data-bs-target="#edit_all_achive_modal" data-bs-toggle="modal">
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
                            <span role="button" data-bs-target="#edit_total_clients_modal" data-bs-toggle="modal"><i
                                    class="fa-solid fa-pen-to-square"></i>Edit</span>
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
                            <h3>Projects</h3>
                            <span role="button" data-bs-target="#edit_total_projects_modal" data-bs-toggle="modal"><i
                                    class="fa-solid fa-pen-to-square"></i>Edit</span>
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
                            <h3>Awards</h3>
                            <span role="button" data-bs-target="#edit_total_awards_modal" data-bs-toggle="modal"><i
                                    class="fa-solid fa-pen-to-square"></i>Edit</span>
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
                            <h3>Experience</h3>
                            <span role="button" data-bs-target="#edit_experience_modal" data-bs-toggle="modal"><i
                                    class="fa-solid fa-pen-to-square"></i>Edit</span>
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


<!-- Edit All Achievements Modal Start Here -->
<div class="modal fade" id="edit_all_achive_modal" data-bs-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h2 class="modal-title">Update Achievements</h2>
                <i class="fa-solid fa-xmark fs-2" role="button" data-bs-dismiss="modal"></i>
            </div>

            <div class="modal-body">

                <div class="form-group mb-3">
                    <label for="clients" class="label-control">Clients</label>
                    <div class="input_icon d-flex align-items-center">
                        <i class="fa-solid fa-people-carry-box fs-3 px-3"></i>
                        <input class="form-control fs-4" type="number" min="1" name="clients" id="clients"
                            placeholder="Number of clients" value="<?= $clients ?>">
                    </div>
                </div>

                <div class="form-group mb-3">
                    <label for="projects" class="label-control">Projects</label>
                    <div class="input_icon d-flex align-items-center">
                        <i class="fa-solid fa-square-check fs-2 px-3"></i>
                        <input class="form-control fs-4" type="number" min="1" name="projects" id="projects"
                            placeholder="Number of clients" value="<?= $projects ?>">
                    </div>
                </div>

                <div class="form-group mb-3">
                    <label for="awards" class="label-control">Awards</label>
                    <div class="input_icon d-flex align-items-center">
                        <i class="fa-solid fa-award fs-2 px-3"></i>
                        <input class="form-control fs-4" type="number" min="1" name="awards" id="awards"
                            placeholder="Number of clients" value="<?= $awards ?>">
                    </div>
                </div>
                <div class="form-group mb-3">
                    <label for="experience" class="label-control">Experience (Year)</label>
                    <div class="input_icon d-flex align-items-center">
                        <i class="fa-solid fa-clock-rotate-left fs-3 px-3"></i>
                        <input class="form-control fs-4" type="number" min="1" name="experience" id="experience"
                            placeholder="Number of clients" value="<?= $experience ?>">
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary fs-4" data-bs-dismiss="modal">Close</button>
                <button type="submit" id="update_achivements" class="btn btn-secondary fs-4">Update</button>
            </div>
        </div>
    </div>
</div>
<!-- Edit All Achievements Modal End Here -->






<!-- Edit Total Clients Modal Start Here -->
<div class="modal fade" id="edit_total_clients_modal" data-bs-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h2 class="modal-title">Update Total Clients</h2>
                <i class="fa-solid fa-xmark fs-2" role="button" data-bs-dismiss="modal"></i>
            </div>

            <div class="modal-body">

                <div class="form-group mb-3">
                    <label for="clients_total" class="label-control">Clients</label>
                    <div class="input_icon d-flex align-items-center">
                        <i class="fa-solid fa-people-carry-box fs-3 px-3"></i>
                        <input class="form-control fs-4" type="number" min="1" name="clients_total" id="clients_total"
                            placeholder="Number of clients" value="<?= $clients ?>">
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary fs-4" data-bs-dismiss="modal">Close</button>
                <button type="submit" id="update_clients" class="btn btn-secondary fs-4">Update</button>
            </div>
        </div>
    </div>
</div>
<!-- Edit Total Clients Modal End Here -->


<!-- Edit Total Projects Modal Start Here -->
<div class="modal fade" id="edit_total_projects_modal" data-bs-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h2 class="modal-title">Update Total Clients</h2>
                <i class="fa-solid fa-xmark fs-2" role="button" data-bs-dismiss="modal"></i>
            </div>

            <div class="modal-body">

                <div class="form-group mb-3">
                    <label for="projects_total" class="label-control">Projects</label>
                    <div class="input_icon d-flex align-items-center">
                        <i class="fa-solid fa-square-check fs-2 px-3"></i>
                        <input class="form-control fs-4" type="number" min="1" name="projects_total" id="projects_total"
                            placeholder="Number of clients" value="<?= $projects ?>">
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary fs-4" data-bs-dismiss="modal">Close</button>
                <button type="submit" id="update_projects" class="btn btn-secondary fs-4">Update</button>
            </div>
        </div>
    </div>
</div>
<!-- Edit Total Projects Modal End Here -->


<!-- Edit Total Awards Modal Start Here -->
<div class="modal fade" id="edit_total_awards_modal" data-bs-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h2 class="modal-title">Update Total Awards</h2>
                <i class="fa-solid fa-xmark fs-2" role="button" data-bs-dismiss="modal"></i>
            </div>

            <div class="modal-body">

                <div class="form-group mb-3">
                    <label for="awards_total" class="label-control">Awards</label>
                    <div class="input_icon d-flex align-items-center">
                        <i class="fa-solid fa-award fs-2 px-3"></i>
                        <input class="form-control fs-4" type="number" min="1" name="awards_total" id="awards_total"
                            placeholder="Number of clients" value="<?= $awards ?>">
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary fs-4" data-bs-dismiss="modal">Close</button>
                <button type="submit" id="update_awards" class="btn btn-secondary fs-4">Update</button>
            </div>
        </div>
    </div>
</div>
<!-- Edit Total Awards Modal End Here -->


<!-- Edit Experience Modal Start Here -->
<div class="modal fade" id="edit_experience_modal" data-bs-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h2 class="modal-title">Update Experience</h2>
                <i class="fa-solid fa-xmark fs-2" role="button" data-bs-dismiss="modal"></i>
            </div>

            <div class="modal-body">

                <div class="form-group mb-3">
                    <label for="experience_total" class="label-control">Experience (Year)</label>
                    <div class="input_icon d-flex align-items-center">
                        <i class="fa-solid fa-clock-rotate-left fs-3 px-3"></i>
                        <input class="form-control fs-4" type="number" min="1" name="experience_total"
                            id="experience_total" placeholder="Number of clients" value="<?= $experience ?>">
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary fs-4" data-bs-dismiss="modal">Close</button>
                <button type="submit" id="update_experience" class="btn btn-secondary fs-4">Update</button>
            </div>
        </div>
    </div>
</div>
<!-- Edit Experience Modal End Here -->