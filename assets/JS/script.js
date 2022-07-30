window.addEventListener("load", () => {
    document.getElementById("preloader").style.display = "none";
});

// menu ul container class add
let btn = document.querySelector(".menu_btn");
let menu = document.querySelector(".main_menu ul");
btn.addEventListener("click", () => {
    menu.classList.toggle("container");
});

// main menu link active
const menu_link = document.querySelectorAll(".menu_link");

menu_link.forEach((element) => {
    element.addEventListener("click", function() {
        menu_link.forEach((link) => link.classList.remove("active"));

        this.classList.add("active");
    });
});

// show main menu
let menuBtn = document.querySelector(".menu_btn");
let showNav = document.querySelector(".main_menu");

menuBtn.addEventListener("click", () => {
    showNav.classList.toggle("show");
});

window.onscroll = () => {
    showNav.classList.remove("show");
};

// portfolio menu
const p_cats = document.querySelector(".p_cats");
const p_cat_li = document.querySelectorAll(".p_cats li");
const p_cat = document.querySelectorAll(".p_cat");
const p_single = document.querySelectorAll(".port_items div");

p_cat_li.forEach((port_menu_li) => {
    port_menu_li.addEventListener("click", function() {
        p_cat_li.forEach((mb) => mb.classList.remove("bottom_space"));

        this.classList.add("bottom_space");
    });
});

p_cat.forEach((port_menu) => {
    port_menu.addEventListener("click", function() {
        p_cat.forEach((active) => active.classList.remove("active"));

        this.classList.add("active");
    });
});

// show hide portfolio menu
let portMenuBtn = document.querySelector(".port_menu_icon");
let portMenu = document.querySelector(".p_cats");

portMenuBtn.addEventListener("click", () => {
    portMenu.classList.toggle("show_p_cats");
});


// Filter Portfolio Items By Category
// let portfolio_category = document.querySelector("port_single");

p_cats.addEventListener("click", (event) => {
    console.log(event.target);

    if (event.target.classList.contains("p_cat")) {
        const filterValue = event.target.getAttribute("data-filter");

        p_single.forEach((category) => {
            let port_cat = category.getAttribute("portfolio_category");

            if (port_cat == filterValue || filterValue === "all") {
                category.classList.remove("hide");
                category.classList.add("display");
            } else {
                category.classList.remove("display");
                category.classList.add("hide");
            }
        });

    }
});

// Achivements counter

window.addEventListener("load", () => {
    setTimeout(function() {
        let counters = document.querySelectorAll(".counter");
        let time = 300;

        counters.forEach((counter) => {
            let updateCount = () => {
                let target = counter.getAttribute("data-target");
                let count = +counter.innerText;

                let increament = target / time;

                if (count < target) {
                    counter.innerText = Math.ceil(count + increament);
                    setTimeout(updateCount, 150);
                } else {
                    counter.innerText = target;
                }
            };
            updateCount();
        });
    }, 600);
});
//testimonial swiper
var swiper = new Swiper(".testimonial_slider", {
    loop: true,
    spaceBetween: 20,
    autoplay: {
        delay: 7500,
        disableOnInteraction: false,
    },
    centeredSlides: true,
    breakpoints: {
        992: {
            slidesPerView: 1.3,
        },
    },
    pagination: {
        el: ".swiper-pagination",
        type: "fraction",
    },
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
});