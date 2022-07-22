<!-- achivements section starts here -->
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

<section id="achivements">
    <div class="container">
        <div class="row g-5 text-capitalize text-center">
            <div class="achive_item col-lg-3 col-sm-6">
                <div class="h-100">
                    <h3>
                        <span class="counter" data-target="<?php achievement_item($clients) ?>">00</span><span>+<span>
                    </h3>
                    <h4>clients</h4>
                </div>
            </div>
            <div class="achive_item col-lg-3 col-sm-6">
                <div class="h-100">
                    <h3>
                        <span class="counter" data-target="<?php achievement_item($projects) ?>">00</span>
                    </h3>
                    <h4>projects</h4>
                </div>
            </div>
            <div class="achive_item col-lg-3 col-sm-6">
                <div class="h-100">
                    <h3>
                        <span class="counter" data-target="<?php achievement_item($awards) ?>">00</span>
                    </h3>
                    <h4>awards</h4>
                </div>
            </div>
            <div class="achive_item col-lg-3 col-sm-6">
                <div class="h-100">
                    <h3>
                        <span class="counter" data-target="<?php achievement_item($experience) ?>">00</span>
                    </h3>
                    <h4>years experience</h4>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- achivements section ends here -->