<?php
header("Content-type: text/css; charset: UTF-8");

include '../../admin/config/dbConnect.php';

?>
/* common css starts here */

*,
*::after,
*::before,
ul {
box-sizing: border-box;
padding: 0;
margin: 0;
transition: all 0.2s linear;
}

ul,
ol,
li {
padding: 0;
margin: 0;
}

html {
font-size: 62.5%;
}

:root {
--white: #fff;
--black: #000;
--orange: #ff4900;
--dark-gray: #111111;
--gray: #707070;
}

body {
background: var(--black);
font-family: "Poppins", sans-serif;
color: var(--white);
font-size: 1.6rem;
}

#preloader {
position: fixed;
top: 0;
width: 100%;
height: 100vh;
background: #e9efef url(../images/loader.gif) no-repeat center center;
z-index: 999999;
opacity: 80%;
}

#page_desk {
background: var(--dark-gray);
padding: 4rem 0;
margin-top: 10rem;
}

section {
overflow: hidden;
padding-top: 10rem;
}

/* @media (min-width: 1600px) {
#navbar .container-fluid {
max-width: 96%;
}
}

@media (min-width: 1800px) {
#navbar .container-fluid {
max-width: 90%;
}
} */

@media (min-width: 1275px) {
.container {
max-width: 1250px;
}
}

@media (min-width: 1400px) {
.container {
max-width: 1320px;
}
}

.all {
padding-top: 0;
}

.vertical_path {
position: relative;
padding-top: 11rem;
}

.vertical_path::before {
position: absolute;
content: "";
width: 0.2rem;
height: 9.5rem;
background: var(--orange);
top: 0;
left: 50%;
clip-path: polygon( 100% 0, 100% 1.1rem, 0 1.1rem, 0 2rem, 100% 2rem, 100% 3.1rem, 0 3.1rem, 0 4rem, 100% 4rem, 100%
5.1rem, 0 5.1rem, 0 6rem, 100% 6rem, 100% 7.1rem, 0 7.1rem, 0 8rem, 100% 8rem, 100% 9.1rem, 0 9.1rem, 0 0);
}

.button {
display: inline-block;
background: none;
border: 0.1rem solid var(--white);
border-radius: 1rem;
color: var(--white);
font-size: 2.2rem;
text-transform: capitalize;
min-width: 24rem;
min-height: 8rem;
}

.button:hover {
background: var(--orange);
color: var(--white);
border: none;
}

.content {
max-width: 70%;
text-align: center;
margin: auto;
}

.heading {
font-size: 4rem;
text-transform: capitalize;
}

.para {
font-size: 1.8rem;
font-weight: 300;
margin: 2rem 0;
line-height: 1.8;
}

input#email {
text-transform: lowercase;
}

.modal-content {
background-color: var(--black);
border: solid var(--gray);
}

/* common css ends here */


/* header css starts here */

#navbar {
background: var(--black);
z-index: 1000;
}

.menu_btn {
font-size: 3.5rem;
cursor: pointer;
display: none;
}

.logo {
padding-top: 1rem;
overflow: hidden;
}

.logo a {
display: block;
}

.main_menu ul {
display: flex;
}

.dropdown {
position: relative;
}

.dropdown_menu {
position: absolute;
left: 9999rem;
background: #212735;
padding-bottom: 0.5rem;
width: 13.5rem;
transition: all 0.3s linear;
}

.dropdown:hover .dropdown_menu {
left: 0;
}

.dropdown_item {
padding: 0.5rem 1rem 0.5rem 2.5rem !important;
margin-top: 0.5rem;
border-radius: 0.5rem;
}

.main_menu ul li {
list-style: none;
}

.main_menu ul li a {
display: block;
font-size: 1.8rem;
text-decoration: none;
color: var(--white);
font-weight: 300;
padding: 6rem 1rem .5rem 1rem;
text-transform: capitalize;
}

.main_menu ul li a:hover {
background: var(--orange);
}

.main_menu ul li a.active {
background: var(--orange);
}

.link_active {
background: var(--orange);
}

.hire_btn {
background: var(--orange);
padding: 1rem 2rem !important;
margin-top: 3.8rem;
margin-left: 1rem;
border-radius: 0.5rem;
}


/* header css ends Here */


/* home section css starts here */

<?php
$sql = mysqli_query($conn, "SELECT image FROM home");
$result = mysqli_fetch_assoc($sql);
?>

.inner_hero {
background-image: url("../../uploaded_img/<?= $result['image'] ?>");
background-repeat: no-repeat;
background-position-x: right;
background-position-y: center;
padding: 3rem 0;
}

.name_indi {
display: block;
width: 20rem;
height: 8.2rem;
text-align: center;
font-size: 2.2rem;
font-weight: 300;
padding-top: 1.5rem;
background: var(--orange);
clip-path: polygon( 20rem 0, 20rem 6.4rem, 11rem 6.4rem, 10rem 8.2rem, 9rem 6.4rem, 0 6.4rem, 0 0);
}

.hero_content h1 {
font-size: 7rem;
font-weight: bold;
}

.hero_content p {
font-size: 2rem;
font-weight: 300;
margin: 2rem 0 4rem 0px;
}


/* home section css ends here */


/* skill section css starts here */

#skill_area {
padding-bottom: 7rem;
}

.skill_image {
position: relative;
}

.skill_image img {
width: 100%;
min-height: 45rem;
height: 100%;
border-radius: .5rem;
}

.skills h3 {
font-size: 4rem;
margin-bottom: 2rem;
}

.experience_highlight {
background: var(--dark-gray);
width: 26.2rem;
height: 24.3rem;
position: absolute;
bottom: -6.5rem;
left: -7.5rem;
border-radius: 1rem;
}

.experience_content {
padding: 0 4.5rem;
}

.experience_content h3 {
font-size: 5rem;
font-weight: bold;
margin-top: 6rem;
}

.experience_content h4 {
font-size: 3rem;
font-weight: bold;
}

.experience_content::before {
position: absolute;
top: 0;
content: "";
width: 17.8rem;
height: 4rem;
background-color: var(--white);
clip-path: polygon( 100% 0, 100% 100%, 15.9rem 100%, 15.9rem 0, 12.5rem 0, 12.5rem 100%, 10.6rem 100%, 10.6rem 0, 7.2rem
0, 7.2rem 100%, 5.3rem 100%, 5.3rem 0, 1.9rem 0, 1.9rem 100%, 0 100%, 0 0);
}

.skills p {
font-size: 1.8rem;
font-weight: 200;
}

.skill_progress li {
list-style: none;
text-transform: uppercase;
font-size: 1.8rem;
font-weight: 300;
position: relative;
margin: 4rem 0;
}

.skill_progress li::before {
content: "";
position: absolute;
width: 100%;
height: 0.5rem;
background-color: var(--gray);
top: calc(100% + 0.5rem);
left: 0;
}

.skill_progress li::after {
content: "";
position: absolute;
width: 0;
height: 0.5rem;
background-color: var(--gray);
top: calc(100% + 0.5rem);
left: 0;
animation-duration: 1s;
animation-timing-function: linear;
animation-delay: 1s;
animation-fill-mode: forwards;
}

<?php

$result = mysqli_query($conn, "SELECT * FROM `skills` ");

if ($result) {
    while ($select = mysqli_fetch_array($result)) {
?>

<?php $anim = $select["skill_name"] . $select["skill_id"] ?>

.skill_progress li.<?php echo $anim ?>::after {
animation-name: <?php echo $anim ?>;
}

@keyframes <?php echo $anim ?> {
to {
width: <?= $select["skill_percentage"] ?>%;
background-color: var(--orange);
background-color: <?= $select["skill_color"] ?>;
}
}



<?php }
}
?>

/*.skill_progress li.wordpress::after {
animation-name: wordpress;
}

@keyframes wordpress {
to {
width: 90%;
background-color: var(--orange);
}
}

.skill_progress li.html::after {
animation-name: html;
}

@keyframes html {
to {
width: 95%;
background-color: #ff7004;
}
}

.skill_progress li.css::after {
animation-name: css;
}

@keyframes css {
to {
width: 85%;
background-color: #ff9809;
}
}

.skill_progress li.php::after {
animation-name: php;
}

@keyframes php {
to {
width: 80%;
background-color: #ffbf0d;
}
}*/


/* skill section css ends here */


/* service section css starts here */

.serv_item>div {
display: flex;
align-items: center;
background: var(--dark-gray);
padding: 2rem 4rem 2rem 1rem;
border-radius: 0.5rem;
position: relative;
cursor: pointer;
}

.serv_item>div:hover {
background: var(--orange);
}

.serv_item>div:hover .icon {
background: var(--white);
color: var(--black);
}

.serv_item>div:hover .arrow {
color: var(--white);
}

.serv_item .icon {
width: 7rem;
height: 7rem;
background: var(--black);
border-radius: 50%;
font-size: 4rem;
position: relative;
margin-right: 2rem;
}

.serv_item .icon>i {
position: absolute;
top: 50%;
left: 50%;
transform: translate(-50%, -50%);
}

.serv_item .serv_name {
font-size: 2.2rem;
font-weight: 300;
}

.serv_item .arrow {
font-size: 3rem;
color: var(--orange);
position: absolute;
right: 1rem;
}


/* service section css ends here */


/* achivements section css starts here */

.achive_item>div {
background: var(--dark-gray);




background-image: repeating-linear-gradient(0deg, var(--gray), var(--gray) 13px, transparent 13px, transparent 23px,
var(--gray)
23px), repeating-linear-gradient(90deg, var(--gray), var(--gray) 13px, transparent 13px, transparent 23px, var(--gray)
23px),
repeating-linear-gradient(180deg, var(--gray), var(--gray) 13px, transparent 13px, transparent 23px, var(--gray) 23px),
repeating-linear-gradient(270deg, var(--gray), var(--gray) 13px, transparent 13px, transparent 23px, var(--gray) 23px);





background-size: 1px 100%, 100% 1px, 1px 100% , 100% 1px;
background-position: 0 0, 0 0, 100% 0, 0 100%;
background-repeat: no-repeat;
padding: 5rem 1rem;
border-radius: 10px;
}

.achive_item>div:hover {
background: var(--orange);
}

.achive_item>div h3 {
font-size: 5rem;
font-weight: 700;
}

.achive_item>div h4 {
font-size: 3rem;
}


/* achivements section css ends here */


/* portfolio section css starts here */

.port_single.hide {
display: none;
}

.port_menu ul li {
list-style: none;
margin: 1rem;
cursor: pointer;
}

.port_menu ul li:hover .p_cat {
color: var(--orange);
border-bottom: 3px solid var(--orange);
}

.bottom_space {
margin-bottom: 4rem !important;
transition: 0s;
}

.port_menu .p_cats .p_cat {
text-decoration: none;
color: var(--white);
font-size: 1.8rem;
font-weight: 300;
padding: 0.5rem 1rem;
}

.port_menu .p_cats .p_cat.active {
color: var(--orange);
border-bottom: 3px solid var(--orange);
}

.port_single>div {
position: relative;
overflow: hidden;
height: 100%;
}

.port_single>div img {
width: 100%;
min-height: 40rem;
max-height: 45rem;
height: 100%;
border-radius: 5px;
}

.overlay_bg {
position: absolute;
background: var(--orange);
background-image: linear-gradient(45deg, #1bdd82, transparent);
height: 100%;
width: 100%;
opacity: 85%;
top: 0;
left: 0;
border-radius: 5px;
transform: translateY(102%);
transition: all 0.3s linear;
}

.port_single>div:hover .overlay_bg {
transform: none;
}

.overlay_content {
position: absolute;
width: 100%;
top: 50%;
left: 50%;
transform: translate(-50%, -50%);
padding: 3rem;
text-align: center;
}

.overlay_content h3 {
font-size: 2.2rem;
}

.overlay_content h4 {
font-size: 15px;
margin: 1.5rem 0 5rem 0;
}

.overlay_content .button {
background-color: var(--white);
color: var(--black);
border: solid var(--black);
}

.overlay_content .button:hover {
background-color: var(--black);
color: var(--white);
border: solid var(--white);
}


/* portfolio section css ends here */


/* testimonial section starts here */

.slide_btn {
color: var(--orange);
margin-top: 2rem;
}

.swiper-pagination {
color: var(--orange);
}

.testimonial_single {
background: var(--dark-gray);
position: relative;
text-align: center;
margin-top: 15rem;
}

.slider_img {
width: 20rem;
height: 20rem;
position: absolute;
top: 0;
left: 50%;
transform: translate(-50%, -50%);
}

.slider_img img {
border-radius: 50%;
display: block;
width: 100%;
height: 100%;
}

.slider_desc {
padding: 15rem 3rem 2rem 3rem;
}

.slider_desc h3 {
font-size: 2.5rem;
color: var(--orange);
cursor: pointer;
}

.slider_desc h4 {
font-size: 1.8rem;
font-weight: 300;
margin-bottom: 4rem;
}


/* testimonial section ends here */


/* hire me are starts here */

.hire_me_content {
background-image: url(../images/hire_bg.png);
background-position: center;
background-size: cover;
background-repeat: no-repeat;
position: relative;
}

.bg_overlay {
background: var(--black);
width: 100%;
height: 100%;
position: absolute;
opacity: 75%;
}

.inner_hire {
padding: 15rem 0;
display: flex;
align-items: center;
justify-content: space-around;
}

.hire_content {
z-index: 1;
text-align: center;
}

.hire_content h3 {
font-size: 2.2rem;
}

.hire_content h2 {
margin: 2rem 0 6rem 0;
}

.hire_button {
background: var(--orange);
border: none;
}

.hire_button:hover {
background: var(--black);
}


/* hire me are ends here */


/* blog section starts here */

.blog_item {
background: var(--dark-gray);
cursor: pointer;
}

.blog_item:hover img {
filter: grayscale(100%);
}

.blog_item img {
width: 100%;
height: 23rem;
}

.blog_content {
padding: 0 3rem 4rem 3rem;
}

.blog_content h3 {
font-size: 2.2rem;
font-weight: 300;
margin-bottom: 3rem;
}

.blog_content a {
display: flex;
align-items: center;
text-decoration: none;
font-size: 1.6rem;
font-weight: 300;
color: var(--white);
text-transform: capitalize;
}

.blog_content a:hover {
color: var(--orange);
}

.blog_content a i {
font-size: 2rem;
margin-left: 1rem;
}


/* blog section ends here */


/* footer starts here */

#footer {
overflow: hidden;
padding-top: 10rem;
}

.icon_text {
display: flex;
align-items: center;
margin: 5rem 0;
}

.ft_icon {
margin-right: 3rem;
}

.ft_icon i {
font-size: 2rem;
border: 1px solid var(--gray);
padding: 1.5rem;
border-radius: 50%;
}

.text h5 {
font-size: 1.6rem;
color: var(--gray);
font-weight: 300;
text-transform: capitalize;
}

.text h4 {
font-size: 2rem;
font-weight: 300;
}

.find_me {
font-size: 2.5rem;
line-height: 2;
}

.social_icons {
background: var(--orange);
border-top-right-radius: 1rem;
border-bottom-right-radius: 1rem;
padding: 0.5rem 0 0.5rem 1rem;
}

.social_icons span {
font-size: 5rem;
margin-right: 2rem;
cursor: pointer;
}

.social_icons span:hover {
color: var(--black);
}

.footer form {
margin-top: 3rem;
}

.footer form input,
textarea {
background: none;
border: 1px solid var(--gray);
font-size: 2rem;
padding: 2.2rem;
width: 100%;
color: var(--gray);
outline: none;
border-radius: 0.3rem;
}

.copy_right {
text-align: center;
margin-top: 5rem;
border-top: 1px solid var(--gray);
}


/* footer ends here */


/* media queries starts here */

@media (max-width: 1480px) {
.experience_highlight {
left: -2rem;
}
}

@media (max-width: 1275px) {
.button {
min-width: 20rem;
min-height: 5rem;
border-radius: .5rem;
}
.dropdown_menu {
width: unset;
}
.menu_btn {
display: block;
}
.main_menu ul {
display: block !important;
padding: 0 2rem;
}
.logo {
padding-top: 0;
}
.main_menu ul li a {
padding: 0.3rem 2rem;
margin: 1rem 0;
border-radius: 0.3rem;
}
.main_menu ul li .active {
background: none !important;
}
.main_menu ul li a:hover {
background: var(--orange);
}
.main_menu ul li a:first-child:hover {
background: var(--orange) !important;
}
.hire_btn {
background: none;
padding: 0.3rem 2rem !important;
margin: 1rem 0;
margin: 11rem 0 1rem 0;
margin-left: 0;
border-radius: 0;
}
.main_menu {
background: var(--black);
position: absolute;
top: 8rem;
left: -110%;
transition: 0.3s linear;
width: 100%;
height: calc(100vh - 0rem);
}
.dropdown_menu {
background: none;
margin: -1rem 0 -1rem 3rem;
}
.dropdown_item {
padding: 0 1rem !important;
margin-top: 0 !important;
margin-bottom: 0 !important;
}
.dropdown:hover .dropdown_menu {
position: unset;
}
.show {
left: 0;
}
.experience_highlight {
left: auto;
}
}

@media (max-width: 991px) {
.content {
max-width: 100%;
}
.skills button {
margin-bottom: 1rem;
}

/* Portfolio menu */
.port_menu {
position: relative;
}

.p_cats {
position: absolute;
top: 0;
left: 0;
width: 100%;
background: var(--black);
padding-bottom: 1rem;
clip-path: polygon(100% 0, 100% 5rem, 0 5rem, 0 0);
z-index: 1;
transition: .3s;
}
.show_p_cats {
clip-path: polygon(100% 0, 100% 100%, 0 100%, 0 0);
}
.bottom_space {
margin-bottom: 1rem !important;
}
.port_menu_icon {
position: absolute;
top: .5rem;
right: 1rem;
font-size: 2.3rem;
cursor: pointer;
z-index: 2;
}
.port_items {
margin-top: 10rem;
}

}

@media (max-width: 767px) {
.hero_content h1 {
font-size: 8vw;
}
.port_menu ul li {
margin: 1.5rem 0;
}
.bottom_space {
margin-bottom: 0 !important;
margin-left: 2rem !important;
}
}

/*@media (max-width: 520px) {
#skill_area {
padding-bottom: 0;
}
.button {
min-width: 18rem;
min-height: 4rem;
}
.experience_highlight {
bottom: -28rem;
width: calc(100% - 1.5rem);
left: auto;
margin: 0;
}
.skill_image {
margin-bottom: 30rem;
}
}

@media (max-width: 420px) {
html {
font-size: 55%;
}
.logo img {
max-height: 6rem;
}
.main_menu {
top: 5.5rem;
}
}*/
@media (max-width: 420px) {
html {
font-size: 55%;
}

.btn {
min-width: 18rem;
}
.logo img {
max-height: 6rem;
}
.main_menu {
top: 5.5rem;
}
}

@media (max-width: 375px) {
html {
font-size: 48%;
}
#skill_area {
padding-bottom: 0;
}
.experience_highlight {
position:relative;
display: flex;
width: 100%;
}
.skill_image img {
height: auto;
}
}
@media (max-width: 300px) {
html {
font-size: 45%;
}
}

/* media queries ends here */