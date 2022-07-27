<?php header("Content-type: text/css; charset: UTF-8");
include '../../config/dbConnect.php';
?>
/* common css starts here */

*,
*::after,
*::before,
h1,
h2,
h3,
h4,
h5,
h6,
ul,
li {
box-sizing: border-box;
padding: 0;
margin: 0;
}

ul,
ol,
li {
padding: 0;
}

/* ::selection {
color: var(--text-color);
background: var(--primary-color);
} */

root {
/* ===== colors ===== */
--sidebar-color: #fff;
--primary-color: #2aa9b1;
/* --primary-color-light: #f6f5ff; */
--primary-color-light: #e9fdff;
/* --body-color: #e4e9f7; */
--body-color: #d7ebed;
--toggle-color: #ddd;
--text-color: #707070;
/* ====== Transition ====== */
--tran-03: all 0.3s ease;
--tran-04: all 0.4s ease;
}

:root {
/* ===== colors ===== */
--sidebar-color: #fff;
--primary-color: #000;
--primary-color-light: #f6f5ff;
/* --primary-color-light: #e9fdff; */
--body-color: #e4e9f7;
/* --body-color: #d7ebed; */
--toggle-color: #ddd;
--text-color: #707070;
/* ====== Transition ====== */
--tran-03: all 0.3s ease;
--tran-04: all 0.4s ease;
}

body.dark {
--primary-color: #fff;
/* --primary-color: var(--primary-color-light); */
--primary-color-light: #3a3b3c;
--body-color: #18191a;
--sidebar-color: #242526;
--toggle-color: #fff;
--text-color: #ccc;
}

html {
font-size: 62.5%;
}

body {
font-family: "Poppins", sans-serif;
font-size: 1.6rem;
min-height: 100vh;
color: var(--text-color);
background: var(--body-color);
transition: var(--tran-03);
}

a {
color: var(--text-color);
}

.button {
color: var(--sidebar-color);
background: none;
border: 1px solid var(--sidebar-color);
padding: 0.5rem 2.5rem;
border-radius: 0.5rem;
font-size: 1.8rem;
}

body.dark .button {
color: var(--primary-color);
border-color: var(--primary-color);
}

.button:hover {
opacity: 65%;
}


/*.button:hover {
color: var(--primary-color);
background: var(--sidebar-color);
}*/

.card {
background-color: var(--sidebar-color);
border: none;
}

.card-header {
background: var(--primary-color);
color: #b4b4b4;
}

body.dark .card-header {
background: var(--text-color);
color: var(--body-color);
border: 1px solid rgba(0,0,0,.125);
}

.heading {
font-size: 2.5rem;
margin-top: 1rem;
margin-bottom: 2rem;
text-transform: capitalize;
}

table {
color: var(--text-color) !important;
}

.table-striped>tbody>tr:nth-of-type(odd)>* {
color: var(--text-color);
}

body.dark .table-striped>tbody>tr:nth-of-type(odd)>* {
background-color: var(--body-color);
}

.table-hover>tbody>tr:hover>* {
color: var(--text-color);
background-color: var(--body-color);
}

body.dark .table-hover>tbody>tr:hover>* {
background-color: #4a4c4e;
}

table th {
text-transform: capitalize;
}

td img {
width: 7rem;
height: 5rem;
border-radius: 0.3rem;
}


/* customized scrollbar */

::-webkit-scrollbar {
height: 0.8rem;
width: 1rem;
}

::-webkit-scrollbar-track {
background: var(--primary-color);
}

::-webkit-scrollbar-thumb {
background: var(--text-color);
border-radius: 1rem;
}

.scrollbar::-webkit-scrollbar-track {
background: var(--primary-color-light);
}

.scrollbar::-webkit-scrollbar-thumb {
background: var(--text-color);
}

::-webkit-scrollbar-thumb:hover {
background: #878686;
}

.scrollbar::-webkit-scrollbar-thumb:hover {
background: var(--primary-color);
}


/* customized scrollbar */

.breadcrumb li a {
text-decoration: none;
color: var(--text-color);
}

.breadcrumb-active {
opacity: 70%;
}

.modal-content {
background: var(--sidebar-color);
border: solid;
}

.modal-body {
max-height: 50rem;
overflow-y: auto;
}

#view_all_skills .modal-content {
background: #000;
color: #fff;
}

.profile_pic {
width: 15rem;
height: 15rem;
border-radius: 50%;
margin-bottom: 1rem;
}

.input {
border: 1px solid var(--text-color) !important;
}

.input_icon {
color: var(--sidebar-color);
background: var(--text-color);
border-radius: 0.4rem;
}

.input_icon i {
width: 5rem;
}

.input_icon input {
border-top-left-radius: 0;
border-bottom-left-radius: 0;
}

body.dark .input_icon {
background: #6c757d;
}

input:focus {
outline: 0px !important;
-webkit-appearance: none;
box-shadow: none !important;
}


/*.message_show {
display: none;
}*/

.progress_color[type="radio"] {
width: 3.5rem;
height: 3rem;
background: #ff4900;
border-radius: .3rem;
border: none;
}

.progress_color[type="radio"]:checked {
border: 2px solid var(--primary-color);
background: #ff4900;
}

.progress_color1[type="radio"] {
background: #FF4900;
}

.progress_color1[type="radio"]:checked {
background: #FF4900;
}

.progress_color2[type="radio"] {
background: #FF7004;
}

.progress_color2[type="radio"]:checked {
background: #FF7004;
}

.progress_color3[type="radio"] {
background: #FF9809;
}

.progress_color3[type="radio"]:checked {
background: #FF9809;
}

.progress_color4[type="radio"] {
background: #FFBF0D;
}

.progress_color4[type="radio"]:checked {
background: #FFBF0D;
}


/* common css ends here */


/* header css starts here */

#header {
width: 100%;
display: flex;
align-items: center;
background: var(--primary-color);
transition: var(--tran-03);
z-index: 1030;
}

body.dark #header {
background: var(--sidebar-color);
box-shadow: 0 0.5rem 1.5rem rgb(0 0 0 / 50%);
}

.logo {
max-height: 6rem;
}

.toggle {
font-size: 2.6rem;
cursor: pointer;
color: #fff;
}

.top_nav_icons {
display: flex;
align-items: center;
margin-right: 1rem;
padding-right: 1.5rem;
border-right: 1px solid #ccc;
}

.top_icon_single {
position: relative;
font-size: 1.6rem;
}

.top_icon_single i {
padding: 1rem;
border-radius: 0.5rem;
color: var(--primary-color);
background: var(--sidebar-color);
transition: var(--tran-03);
}

.top_icon_single span {
position: absolute;
top: 0;
right: 2px;
font-size: 1.4rem;
color: var(--primary-color);
background-color: var(--sidebar-color);
border-radius: 50%;
font-weight: 600;
transition: var(--tran-03);
}

.welcome_admin p {
font-size: 1.6rem;
font-weight: 300;
color: #fff;
margin-bottom: 0;
margin-right: 1rem;
}

.welcome_admin img {
width: 5rem;
height: 5rem;
border-radius: 50%;
/* border: 2px solid #ccc; */
border: 2px solid #fff;
}


/* header css ends here */


/* sidebar css starts here */

.sidebar {
position: fixed;
top: 6rem;
left: 0;
width: 25rem;
height: calc(100% - 6rem);
background: var(--sidebar-color);
padding: 1rem;
padding-top: 2rem;
transition: var(--tran-03);
z-index: 1020;
}

.sidebar li {
list-style: none;
margin-top: 1rem;
position: relative;
}

.sidebar.close {
width: 8rem;
}

.sidebar.close .admin_desc {
overflow: hidden;
}

.img_text {
height: 9rem;
}

.sidebar.close .image img {
width: 6rem;
height: 5rem;
}

.image img {
width: 5rem;
height: 5rem;
border-radius: 0.5rem;
background-color: var(--primary-color);
}

body.dark .image img {
background-color: var(--primary-color-light);
}

.sidebar .img_text .name {
font-size: 1.8rem;
font-weight: 700;
}

.sidebar .img_text .profession {
font-size: 1.6rem;
font-weight: 500;
display: block;
}

.sidebar .menu_bar {
height: calc(100% - 9rem);
overflow-y: scroll;
display: flex;
flex-direction: column;
justify-content: space-between;
}

.menu_bar::-webkit-scrollbar {
display: none;
}

.sidebar li.search_box {
display: flex;
align-items: center;
background: var(--primary-color-light);
border-radius: 0.5rem;
cursor: pointer;
transition: var(--tran-03);
}

.sidebar li.search_box input {
font-size: 1.7rem;
height: 100%;
width: 100%;
border: none;
background: none;
outline: none;
font-weight: 500;
transition: var(--tran-03);
}

.sub_menu {
padding-left: 6rem;
background: var(--primary-color);
border-radius: 0.5rem;
margin-top: -1rem;
padding-bottom: 1rem;
display: none;
}

body.dark .sub_menu {
background: var(--primary-color-light);
}

.sub_menu_show {
display: block !important;
}

.rotate {
transform: rotate(-90deg);
}

.sub_menu li {
margin-top: 0;
}

.sub_menu li a {
font-size: 1.7rem;
padding-left: 1rem;
color: #fff;
}

.sub_menu li a:hover {
color: #b8cbed;
padding-left: 1.5rem;
}

.toggle_icon {
position: absolute;
right: 1rem;
font-size: 1.4rem;
transition: var(--tran-03);
}

.sidebar li .icon {
min-width: 6rem;
height: 5rem;
font-size: 1.8rem;
display: flex;
align-items: center;
justify-content: center;
border-radius: 0.5rem;
transition: var(--tran-03);
}

.sidebar li a {
color: var(--text-color);
height: 100%;
width: 100%;
display: flex;
align-items: center;
text-decoration: none;
border-radius: 0.5rem;
text-transform: capitalize;
transition: var(--tran-03);
}

.active {
color: var(--sidebar-color);
background: var(--primary-color);
}

body.dark .active {
color: var(--text-color);
background: var(--primary-color-light);
}

.sidebar li a:hover,
.sidebar li a.active {
color: var(--sidebar-color);
background: var(--primary-color);
}

body.dark .sidebar li a:hover,
body.dark .sidebar li a.active {
color: var(--text-color);
background-color: var(--primary-color-light);
}

.sub_menu li a {
color: var(--sidebar-color);
opacity: 75%;
}

.sub_menu li a:hover {
opacity: 60%;
}

body.dark .sub_menu li a {
color: var(--text-color);
}

body.dark .sub_menu li a {
opacity: 85%;
}

body.dark .sub_menu li a:hover {
opacity: 60%;
}

.sidebar .text {
font-size: 1.7rem;
font-weight: 500;
transition: var(--tran-03);
}

.sidebar.close .text {
/* opacity: 0; */
display: none;
}

.sidebar.close .toggle_icon {
/* opacity: 0; */
display: none;
}

body.dark .sidebar li a:hover .icon,
body.dark .sidebar li a:hover .text {
color: var(--text-color);
}

.menu_bar .mode {
display: flex;
align-items: center;
background-color: var(--primary-color-light);
border-radius: 0.5rem;
position: relative;
transition: var(--tran-03);
}

.menu_bar .mode .sun_moon {
height: 5rem;
width: 6rem;
display: flex;
align-items: center;
}

.menu_bar .mode i {
position: absolute;
transition: var(--tran-03);
}

.menu_bar .mode i.sun {
opacity: 0;
}

body.dark .mode i.sun {
opacity: 1;
}

body.dark .mode i.moon {
opacity: 0;
}

.menu_bar .mode .toggle_switch {
position: absolute;
right: 0;
display: flex;
align-items: center;
justify-content: center;
height: 100%;
width: 6rem;
}

.toggle_switch .switch {
position: relative;
height: 2.2rem;
width: 4.4rem;
border-radius: 2.5rem;
background-color: var(--toggle-color);
cursor: pointer;
transition: var(--tran-03);
}

.switch::before {
position: absolute;
content: "";
height: 1.5rem;
width: 1.5rem;
border-radius: 50%;
top: 50%;
left: 0.5rem;
transform: translateY(-50%);
background-color: var(--sidebar-color);
cursor: pointer;
transition: var(--tran-03);
}

body.dark .switch::before {
left: 2.5rem;
}


/* sidebar css ends here */


/* main grid layout starts here */

.main {
min-height: calc(100vh - 6rem);
position: absolute;
top: 6rem;
left: 25rem;
padding-top: 1.5rem;
padding-bottom: 7rem;
width: calc(100% - 25rem);
color: var(--text-color);
transition: var(--tran-03);
}

.sidebar.close~.main {
left: 8rem;
width: calc(100% - 8rem);
}

.item1 {
grid-area: Write_new;
}

.item2 {
grid-area: Shares;
}

.item3 {
grid-area: Counter;
}

.item4 {
grid-area: TopArt;
}

.item5 {
grid-area: Comments;
}

.item6 {
grid-area: RecentArt;
}

.item7 {
grid-area: Used;
}

.grid_container {
display: grid;
grid-template-columns: 1fr 1fr 1fr 1fr 1fr 1fr;
grid-template-areas:
"Counter Counter Counter Counter Counter Counter"
"Shares Shares Write_new Write_new Write_new Write_new"
"Shares Shares Used Used Used Used"
"TopArt TopArt TopArt TopArt Comments Comments"
"RecentArt RecentArt RecentArt RecentArt RecentArt RecentArt";
grid-gap: 1rem;
}

.grid_container>div {
overflow: hidden;
border-radius: 0.5rem;
}


/* main grid layout starts here */


/* counters starts here */

.counters .counter_single {
display: flex;
align-items: center;
justify-content: space-between;
border-radius: 0.5rem;
background-color: var(--sidebar-color);
}

.counter_single .icon {
width: 5rem;
height: 5rem;
display: flex;
align-items: center;
justify-content: space-around;
border-radius: 0.5rem;
background-color: var(--body-color);
}

.counter_single .icon i {
font-size: 3rem;
width: 100%;
height: 100%;
display: flex;
align-items: center;
justify-content: space-around;
border-radius: 0.5rem;
background: var(--body-color);
color: var(--primary-color);
transition: var(--tran-03);
}

.counter_text h3 {
font-size: 3rem;
font-weight: 700;
}

.counter_text h4 {
text-transform: capitalize;
color: var(--text-color);
}

body.dark .counter_text h4 {
color: #fff;
}

.count1 .icon i {
color: #695cfe;
}

.count2 .icon i {
color: #65c20e;
}

.count3 .icon i {
color: #f9a946;
}

.count4 .icon i {
color: #ff5bfa;
}

.count5 .icon i {
color: #2aa9b1;
}

.count6 .icon i {
color: #1282e8;
}


/* counters starts here */


/* social_shares starts here */

.social_shares {
padding: 1rem;
padding-bottom: 0;
background: var(--sidebar-color);
}

.share_single {
position: relative;
display: flex;
align-items: center;
font-size: 2rem;
margin-bottom: 1.5rem;
}

.share_single i {
width: 4rem;
height: 4rem;
font-size: 2.5rem;
display: flex;
align-items: center;
justify-content: space-around;
border-radius: 0.5rem;
margin-left: 3rem;
margin-right: 2rem;
}

.share_count {
position: absolute;
right: 2rem;
font-size: 2.2rem;
font-weight: 700;
}

.share_single .share_icon {
background: var(--body-color);
color: #2aa9b1;
}

.share_single .icon1 {
color: #2d73cf;
}

.share_single .icon2 {
color: #4bc75b;
}

.share_single .icon3 {
color: #006aff;
}

.share_single .icon4 {
color: #1da0f0;
}

.share_single .icon5 {
color: #3f729b;
}

.share_single .icon6 {
color: #229ed9;
}

.share_single .icon7 {
color: #053eff;
}

.total_shares strong {
font-size: 3rem;
word-spacing: 0.5rem;
text-transform: uppercase;
}


/* social_shares ends here */


/* hello_admin starts here */

.hello_admin {
padding: 1rem;
background: var(--sidebar-color);
}

.welcome p {
font-size: 1.8rem;
line-height: 1.8;
color: var(--text-color);
}

.welcome a {
text-decoration: none;
color: var(--sidebar-color);
background: var(--text-color);
font-size: 2rem;
padding: 1rem;
border-radius: 0.5rem;
display: inline-block;
transition: var(--tran-03);
}

.welcome a:hover {
background: var(--primary-color);
color: #fff;
}

.welcome_img img {
height: 100%;
width: 100%;
}


/* hello_admin ends here */


/* today's articles starts here */

.today_article {
background: var(--sidebar-color);
padding-bottom: 1rem;
display: inherit;
}

.today_article h2 {
padding: 1rem;
}

.today_article_single {
padding: 1rem;
border-bottom: 1px solid var(--text-color);
}

.today_article h3 {
background: #505050;
color: #ccc;
padding: 2rem 1rem;
text-align: center;
}

.today_article p {
color: var(--text-color);
font-size: 1.6rem;
}

.today_article h5 span {
color: var(--primary-color);
}

body.dark .today_article h5 span {
color: #fff;
}


/* today's articles ends here */


/* top_articles starts here */

.top_articles {
padding: 1rem;
background: var(--sidebar-color);
}

.publish_month .icon i {
font-size: 1.6rem;
color: var(--primary-color);
}

.publish_month select {
background: none;
border: none;
outline: none;
font-size: 1.6rem;
text-transform: capitalize;
color: var(--text-color);
}

.top_article_single td span {
display: flex;
align-items: center;
margin-right: 1rem;
}

.top_article_single td span i {
color: var(--primary-color);
padding-right: 0.5rem;
}

.td_p {
font-size: 1.4rem;
width: 42rem;
}


/* top_articles ends here */


/* recent_comments starts here */

.recent_comments {
background: var(--sidebar-color);
padding: 1rem;
}

.comment_single {
border-radius: 0.5rem;
margin-bottom: 1.2rem;
}

.comment_single .img {
width: 5rem;
height: 5rem;
margin-right: 1rem;
}

.comment_single .img img {
width: 5rem;
height: 5rem;
border-radius: 0.5rem;
}

.commenter_name {
color: var(--primary-color);
font-weight: bold;
}

.commenter_name span {
text-transform: capitalize;
color: #bbb;
transition: var(--tran-03);
}

body.dark .commenter_name span {
color: #707070;
}

.comment {
margin-top: 0.75rem;
font-size: 1.4rem;
}

.comment_article_id {
color: var(--primary-color);
}


/* recent_comments ends here */


/* recent_articles starts here */

.recent_articles {
padding: 1rem;
background-color: var(--sidebar-color);
}

.recent_articles table tbody th,
.recent_articles table tbody td {
vertical-align: middle;
}

td.recent_article_title {
min-width: 45rem;
}

.recent_articles td.recent_date {
min-width: 12rem;
}

.recent_articles table tbody tr .cat {
color: var(--body-color);
padding: 1.2rem 1.5rem;
border-radius: 0.5rem;
text-transform: capitalize;
text-align: center;
transition: var(--tran-03);
}

.recent_articles table tbody tr:nth-child(odd) .cat {
background: var(--text-color);
color: var(--body-color);
}

.recent_articles table tbody tr:nth-child(even) .cat {
background: var(--primary-color);
color: var(--body-color);
}


/* recent_articles ends here */

#about_content:not(body.dark #about_content) {
background: var(--primary-color);
color: #b4b4b4;
border-radius: .8rem;
}

#about_content img {
border-radius: .8rem;
}

<!-- body.dark .skill_area {
    background: var(--)
}

-->
/* Skill Progess bar start here */


/*.skill_progress li:first-child {
margin-top: 0;
}*/

.skill_progress li {
list-style: none;
text-transform: uppercase;
font-size: 1.8rem;
font-weight: 300;
position: relative;
margin: 3.5rem 0;
}

.skill_progress li:first-child {
margin-top: 0;
}

.skill_progress li::before {
content: "";
position: absolute;
width: 100%;
height: 0.5rem;
background-color: #707070;
top: calc(100% + 0.5rem);
left: 0;
}

.skill_progress li::after {
content: "";
position: absolute;
width: 0;
height: 0.5rem;
background-color: #707070;
top: calc(100% + 0.5rem);
left: 0;
animation-duration: 1s;
animation-timing-function: linear;
animation-delay: 1s;
animation-fill-mode: forwards;
}

<?php $result = mysqli_query($conn, "SELECT * FROM `skills` ");
if ($result) {
    while ($select = mysqli_fetch_array($result)) {
?><?php $anim = $select["skill_name"] . $select["skill_id"] ?>.skill_progress li.<?php echo $anim ?>::after {
animation-name: <?php echo $anim ?>;
}
@keyframes <?php echo $anim ?> {
to {
width: <?= $select["skill_percentage"] ?>%;
background-color: #ff4900;
background-color: <?= $select["skill_color"] ?>;
}
}
<?php
    }
}

?>
/* Skill Progess bar end here */


/* footer starts here */

#footer {
left: 25rem;
width: calc(100% - 25rem);
background: var(--primary-color);
color: #fff;
transition: var(--tran-03);
}

body.dark #footer {
background: var(--body-color);
}

.sidebar.close~.main #footer {
left: 8rem;
width: calc(100% - 8rem);
}

.copy_right span {
color: #2aa9b1;
transition: var(--tran-03);
}


/* footer ends here */


/* media queries starts here */

@media (max-width: 1400px) {
.main {
left: 8rem;
width: calc(100% - 8rem)
}
#footer {
left: 8rem;
width: calc(100% - 8rem);
}
}

@media (max-width: 1200px) {
.share_single i {
margin-left: 0;
margin-right: 1rem;
}
.share_count {
right: 1rem;
}
}

@media (max-width: 991px) {
.grid_container {
grid-template-areas: "Counter Counter Counter Counter Counter Counter" "Write_new Write_new Write_new Write_new
Write_new Write_new" "Shares Shares Shares Comments Comments Comments" "Used Used Used Used Used Used" "TopArt TopArt
TopArt TopArt TopArt TopArt" "RecentArt RecentArt RecentArt RecentArt RecentArt RecentArt";
}
}

@media (max-width: 767px) {
.top_nav_right {
padding-bottom: 0.5rem;
display: none;
}
.show_right_nav {
display: block;
}
.sideTop {
top: 11rem;
height: calc(100% - 11rem);
}
.mainTop {
top: 11.5rem;
}
.grid_container {
grid-template-columns: 1fr;
grid-template-areas: "Counter" "Write_new" "Shares" "Comments" "Used" "TopArt" "RecentArt";
}
}

@media (max-width: 400px) {
html {
font-size: 50%;
}
.sidebar.close {
left: -300px;
}
.sidebar.close~.main {
left: 0;
width: 100%;
}
.sidebar.close .img_text .image img {
display: none;
transition: var(--tran-03);
}
.total_shares strong {
font-size: 2.5rem;
}
#footer {
left: 0;
width: 100%;
}
.sidebar.close~.main #footer {
left: 0;
width: 100%;
}
}


/* media queries ends here */