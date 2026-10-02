
(function ($) {
    new WOW().init();

    window.lazySizesConfig = window.lazySizesConfig || {};
    window.lazySizesConfig.lazyClass = "lazy";
    lazySizesConfig.srcAttr = "data-original";
    lazySizesConfig.loadMode = 1;

    var getSiblings = function (elem) {
        const siblings = [];
        let sibling = elem.parentNode.firstChild;
        for (; sibling;)
            1 === sibling.nodeType && sibling !== elem && siblings.push(sibling),
                (sibling = sibling.nextSibling);
        return siblings;
    },
        slideUp = (target, time) => {
            const duration = time || 500;
            (target.style.transitionProperty = "height, margin, padding"),
                (target.style.transitionDuration = duration + "ms"),
                (target.style.boxSizing = "border-box"),
                (target.style.height = target.offsetHeight + "px"),
                target.offsetHeight,
                (target.style.overflow = "hidden"),
                (target.style.height = 0),
                window.setTimeout(() => {
                    (target.style.display = "none"),
                        target.style.removeProperty("height"),
                        target.style.removeProperty("overflow"),
                        target.style.removeProperty("transition-duration"),
                        target.style.removeProperty("transition-property");
                }, duration);
        },
        slideDown = (target, time) => {
            const duration = time || 500;
            target.style.removeProperty("display");
            let display = window.getComputedStyle(target).display;
            "none" === display && (display = "block"),
                (target.style.display = display);
            const height = target.offsetHeight;
            (target.style.overflow = "hidden"),
                (target.style.height = 0),
                target.offsetHeight,
                (target.style.boxSizing = "border-box"),
                (target.style.transitionProperty = "height, margin, padding"),
                (target.style.transitionDuration = duration + "ms"),
                (target.style.height = height + "px"),
                window.setTimeout(() => {
                    target.style.removeProperty("height"),
                        target.style.removeProperty("overflow"),
                        target.style.removeProperty("transition-duration"),
                        target.style.removeProperty("transition-property");
                }, duration);
        };

    const offcanvasHeader = function () {
        const offcanvasOpen = document.querySelector(
            ".offcanvas__header--menu__open--btn"
        ),
            offcanvasClose = document.querySelector(".offcanvas__close--btn"),
            offcanvasHeader = document.querySelector(".offcanvas__header"),
            offcanvasMenu = document.querySelector(".offcanvas__menu"),
            body = document.querySelector("body");
        offcanvasMenu &&
            offcanvasMenu
                .querySelectorAll(".offcanvas__sub_menu")
                .forEach(function (ul) {
                    const subMenuToggle = document.createElement("button");
                    subMenuToggle.classList.add("offcanvas__sub_menu_toggle");
                    // ul.parentNode.appendChild(subMenuToggle)
                }),
            offcanvasOpen &&
            offcanvasOpen.addEventListener("click", function (e) {
                e.preventDefault(),
                    null != e.target.dataset.offcanvas &&
                    (offcanvasHeader.classList.add("open"),
                        body.classList.add("mobile_menu_open"));
            }),
            offcanvasClose &&
            offcanvasClose.addEventListener("click", function (e) {
                e.preventDefault(),
                    null != e.target.dataset.offcanvas &&
                    (offcanvasHeader.classList.remove("open"),
                        body.classList.remove("mobile_menu_open"));
            });
        let mobileMenuWrapper = document.querySelector(".offcanvas__menu_ul");
        mobileMenuWrapper &&
            mobileMenuWrapper.addEventListener("click", function (e) {
                let targetElement = e.target;
                if (targetElement.classList.contains("offcanvas__sub_menu_toggle")) {
                    const parent = targetElement.parentElement;
                    parent.classList.contains("active")
                        ? (targetElement.classList.remove("active"),
                            parent.classList.remove("active"),
                            parent
                                .querySelectorAll(".offcanvas__sub_menu")
                                .forEach(function (subMenu) {
                                    subMenu.parentElement.classList.remove("active"),
                                        subMenu.nextElementSibling.classList.remove("active"),
                                        slideUp(subMenu);
                                }))
                        : (targetElement.classList.add("active"),
                            parent.classList.add("active"),
                            slideDown(targetElement.previousElementSibling),
                            getSiblings(parent).forEach(function (item) {
                                item.classList.remove("active"),
                                    item
                                        .querySelectorAll(".offcanvas__sub_menu")
                                        .forEach(function (subMenu) {
                                            subMenu.parentElement.classList.remove("active"),
                                                subMenu.nextElementSibling.classList.remove("active"),
                                                slideUp(subMenu);
                                        });
                            }));
                }
            }),
            offcanvasHeader &&
            document.addEventListener("click", function (event) {
                event.target.closest(".offcanvas__header--menu__open--btn") ||
                    event.target.classList.contains(
                        ".offcanvas__header--menu__open--btn".replace(/\./, "")
                    ) ||
                    event.target.closest(".offcanvas__header") ||
                    event.target.classList.contains(
                        ".offcanvas__header".replace(/\./, "")
                    ) ||
                    (offcanvasHeader.classList.remove("open"),
                        body.classList.remove("mobile_menu_open"));
            }),
            offcanvasHeader &&
            window.addEventListener("resize", function () {
                window.outerWidth >= 992 &&
                    (offcanvasHeader.classList.remove("open"),
                        body.classList.remove("mobile_menu_open"));
            });
    };
    offcanvasHeader();

    let prevArrow =
        '<button class="slick-btn slick-prev slick-arrow" aria-label="Previous Button"><svg width="22" height="37" viewBox="0 0 22 37" fill="currentcolor" xmlns="http://www.w3.org/2000/svg"><path d="M22 3.30758L18.6444 0L0 18.5L18.6632 37L22 33.6924L6.67352 18.5L22 3.30758Z" fill="currentcolor"/></svg></button>';
    let nextArrow =
        '<button class="slick-btn slick-next slick-arrow" aria-label="Next Button"><svg width="22" height="37" viewBox="0 0 22 37" fill="currentcolor" xmlns="http://www.w3.org/2000/svg"><path d="M0 33.6924L3.35561 37L22 18.5L3.33676 0L0 3.30758L15.3265 18.5L0 33.6924Z" fill="currentcolor"/></svg></button>';

    var hero_slider = $(".hero-slider-js");
    hero_slider.slick({
        centerMode: false,
        arrows: false,
        slidesToShow: 1,
        fade: true,
        speed: 1000,
        autoplay: true,
        autoplaySpeed: 2000,
        cssEase: "ease-in-out",
        touchThreshold: 100,
        prevArrow: prevArrow,
        nextArrow: nextArrow,
    });

    $(".search-toggle, .header__search--btn").on("click", function () {
        if ($(this).hasClass("active")) {
            $(this).siblings("form").find(".input-wrapper").removeClass("active");
            $(this).removeClass("active");
        } else {
            $(this).siblings("form").find(".input-wrapper").addClass("active");
            $(this).toggleClass("active");
        }
    });
    $(".close-icon").on("click", function () {
        $(".search-toggle").trigger("click");
        $(".header__search--btn").trigger("click");
    });

    $(".button.right").on("click", function () {
        $(".button-group").removeClass("left");
        $(".button-group").addClass("right");
        $(".button").removeClass("active");
        $(this).addClass("active");
    });

    $(".button.left").on("click", function () {
        $(".button-group").removeClass("right");
        $(".button-group").addClass("left");
        $(".button").removeClass("active");
        $(this).addClass("active");
    });

    var cat = $(".category-slider");

    cat.slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        centerMode: true,
        arrows: true,
        dots: false,
        speed: 300,
        autoplay: true,
        autoplaySpeed: 1500,
        centerPadding: "20px",
        infinite: true,
        prevArrow: prevArrow,
        nextArrow: nextArrow,
    });

    var about_logo_slider = $(".about__logo-slider");

    about_logo_slider.slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        arrows: false,
        dots: false,
        speed: 500,
        autoplay: true,
        autoplaySpeed: 2000,
        infinite: true,
        prevArrow: prevArrow,
        nextArrow: nextArrow,
    });

    var project_about_logo_slider = $("#project_about__logo_slider");

    project_about_logo_slider.slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        arrows: false,
        dots: false,
        speed: 500,
        autoplay: true,
        autoplaySpeed: 2000,
        infinite: true,
        prevArrow: prevArrow,
        nextArrow: nextArrow,
        adaptiveHeight: true,
        responsive: [
            {
                breakpoint: 767,
                settings: {
                    slidesToShow: 3
                }
            }
        ]
    });

    var about_brand_slider = $(".about__brand-slider");

    about_brand_slider.slick({
        slidesToShow: 5,
        slidesToScroll: 1,
        arrows: false,
        dots: false,
        speed: 800,
        autoplay: true,
        autoplaySpeed: 2400,
        infinite: true,
        prevArrow: prevArrow,
        nextArrow: nextArrow,
        adaptiveHeight: true,
        responsive: [
            {
                breakpoint: 767,
                settings: {
                    slidesToShow: 4
                }
            }
        ]
    });
    var consultant_brand_slider = $(".consultants__logo-slider");

    consultant_brand_slider.slick({
        slidesToShow: 5,
        slidesToScroll: 1,
        arrows: false,
        dots: false,
        speed: 1000,
        autoplay: true,
        autoplaySpeed: 3000,
        infinite: true,
        prevArrow: prevArrow,
        nextArrow: nextArrow,
        adaptiveHeight: true,
        responsive: [
            {
                breakpoint: 767,
                settings: {
                    slidesToShow: 4
                }
            }
        ]
    });


    var rev = $(".rev_slider");
    rev
        .on("init", function (event, slick, currentSlide) {
            var cur = $(slick.$slides[slick.currentSlide]),
                next = cur.next(),
                prev2 = cur.prev().prev(),
                prev = cur.prev();
            prev.addClass("slick-sprev");
            next.addClass("slick-snext");
            prev2.addClass("slick-pprev");
            cur.removeClass("slick-snext").removeClass("slick-sprev").removeClass("slick-pprev");
            slick.$prev = prev;
            slick.$next = next;
            slick.$prev2 = prev2;
        })
        .on("beforeChange", function (event, slick, currentSlide, nextSlide) {

            var cur = $(slick.$slides[nextSlide]);

            slick.$prev.removeClass("slick-sprev");
            slick.$next.removeClass("slick-snext");
            slick.$prev2.removeClass("slick-pprev");
            (next = cur.next()), (prev = cur.prev()), (prev2 = cur.prev().prev());
            prev.prev();
            prev.next();
            prev2.next();
            prev.addClass("slick-sprev");
            next.addClass("slick-snext");
            prev2.addClass("slick-pprev");
            slick.$prev = prev;
            slick.$next = next;
            slick.$prev2 = prev2;
            cur.removeClass("slick-next").removeClass("slick-sprev").removeClass("slick-pprev");
        });

    rev.slick({
        speed: 1000,
        arrows: false,
        dots: false,
        focusOnSelect: true,
        prevArrow: prevArrow,
        nextArrow: nextArrow,
        infinite: true,
        centerMode: true,
        slidesPerRow: 1,
        slidesToShow: 1,
        slidesToScroll: 1,
        centerPadding: "0",
        swipe: true,
        autoplay: false,
        autoplaySpeed: 1500,
        customPaging: function (slider, i) {
            return "";
        },
        /*infinite: false,*/
    });



    const project_navigation__slider = new Swiper('.project_navigation__slider', {
        loop: true,
        centerMode: false,
        speed: 1000,
        autoplay: true,
        autoplaySpeed: 1600,
        swipe: true,
        pagination: {
            el: '.swiper-pagination',
            clickable: true
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        responsive: [
            {
                breakpoint: 991,
                settings: {
                    slidesToShow: 1,
                    arrows: false,
                    dots: false,
                   
                }
            },
        ]
    });


    Fancybox.bind('[data-fancybox],[data-fancybox="gallery"]');




    var offer__slider = $(".offer__slider");

    offer__slider.slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        centerMode: true,
        arrows: true,
        dots: false,
        speed: 300,
        autoplay: true,
        autoplaySpeed: 1600,
        centerPadding: "20px",
        infinite: true,
        prevArrow: prevArrow,
        nextArrow: nextArrow,
        responsive: [
            {
                breakpoint: 991,
                settings: {
                    slidesToShow: 2,
                    arrows: false,
                    dots: true,
                    centerMode: false
                }
            },
            {
                breakpoint: 767,
                settings: {
                    slidesToShow: 2,
                    arrows: false,
                    dots: true,
                    centerMode: false
                }
            }
        ]
    });

    $('.testimonial-slider').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        centerMode: true,
        arrows: false,
        dots: false,
        speed: 500,
        centerPadding: '20px',
        infinite: true,
        autoplaySpeed: 2000,
        autoplay: true,
        prevArrow: prevArrow,
        nextArrow: nextArrow,
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 1,
                    arrows: false,
                    dots: true,
                    centerMode: false
                }
            },
            {
                breakpoint: 767,
                settings: {
                    slidesToShow: 1,
                    arrows: false,
                    dots: true,
                    centerMode: false
                }
            }
        ]
    });

    

    $(window).on("load", function () {
        $(".pl-imgloading").delay(3500).fadeOut("slow");
    });

    $('body').click(function () {
        $('.pdf_box').css('display', 'none');
    });

    /////-------toggle button bothside

    //$(document).on("click", ".schedule_button", function (e) {
    //    e.preventDefault();
    //    $('#schedule_container').toggle();
    //});
    //$('.schedule_button').on('click', function () {
    //    if (!$('.schedule_container').hasClass('on')) {
    //        $('.schedule_container').css('display', 'block');
    //        $('.schedule_container').addClass('on');
    //    } else {
    //        $('.schedule_container').css('display', 'none');
    //        $('.schedule_container').removeClass('on');
    //    }
    //});
    //////---------------toggle and collapse
    //$(document).on('click touchend', function (event) {
    //    if (!$(event.target).closest('.schedule_container').length && !$(event.target).hasClass('schedule_button')) {
    //        $('.schedule_container').css('display', 'none');
    //    }

    //});



    /////////schedule close

    //////////pdf box open
    /*$(document).on("click", ".pdf_button", function (e) {
        e.preventDefault();
        $('#pdf_box').toggle();
    });*/

})(jQuery);


/* pdf drawer and download */
$(document).ready(function () {
 
    function toggleDrawer() {
        $("#drawer").toggleClass("active");
        $("#overlay").toggleClass("active"); 
    }

    function downloadPDF(fileName) {
        let filePath = "/assets/" + fileName;
        let link = document.createElement("a");
        link.href = filePath;
        link.download = fileName;
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
    }

    $(".open-btn").on("click", toggleDrawer); 
    $(".close-btn").on("click", toggleDrawer);
    $("#overlay").on("click", toggleDrawer);
    /*$(".pdf-item-style").on("click", function () {
        let fileName = $(this).text().replace(" ", "").toLowerCase() + ".pdf";
        downloadPDF(fileName);
    });*/


  
});


/* pdf button */
$(document).ready(function () {
        $('.pdf-item-style').on('click', function (e) {
                e.preventDefault(); 

            let button = $(this);
            let buttonInitialState = button.html()
                let buttonText = button.find('.buttonText');
                let progressBar = button.find('.progress-bar');
                let fileUrl = button.attr('href'); // Get file URL
            let fileName = button.attr('download') || 'download.pdf';


          

                if (button.hasClass('display')) return;
                if (button.hasClass('downloading')) return;
                button.addClass('downloading');
                button.addClass('fill-bg')

                let progress = 0;
                buttonText.html('0%');

                function animateProgress() {
                    if (progress < 100) {
                        progress += 1;
                        buttonText.html(progress + '%');
                        progressBar.css('width', progress + '%');
                        requestAnimationFrame(animateProgress); 
                    } else {
                        buttonText.html('✔ Done');
                        button.removeClass('downloading')

                        button.addClass('disabled')
                        button.prop('disabled', true)

                        setTimeout(() => {
                            let link = document.createElement('a');
                            link.href = fileUrl;
                            link.download = fileName;
                            document.body.appendChild(link);
                            link.click();
                            document.body.removeChild(link);

                            buttonText.html('Downloaded')
                            setTimeout(() => {
                                buttonText.html(buttonInitialState)
                                progressBar.css('width', '0%');
                                button.addClass('pdf-item-style')
                                
                            }, 1000);
                        }, 2000);
                    }
            }
       
            requestAnimationFrame(animateProgress);
           
            },);
})




//---------tab filter start ----------
function filterSelection(evt, TabName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("image_gallery_container");

    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("img__button");

    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(TabName).style.display = "block";
    evt.currentTarget.className += " active";
}

//---------tab filter end ----------

//FAQ ---------
function filterSelection1(evnt, TabName1) {
    var i, tabcontent1, tablinks1;

    tabcontent1 = document.getElementsByClassName("poster_banner_section");
    for (i = 0; i < tabcontent1.length; i++) {
        tabcontent1[i].style.display = "none";
    }

    tablinks1 = document.getElementsByClassName("project_view");
    for (i = 0; i < tablinks1.length; i++) {
        tablinks1[i].className = tablinks1[i].className.replace(" active", "");
    }
    document.getElementById(TabName1).style.display = "block";
    evnt.currentTarget.className += " active";
}


//FAQ ---------
function filterSelection2(event, TabName2) {
    var i, tabcontent2, tablinks2;

    tabcontent2 = document.getElementsByClassName("award_program_section");
    for (i = 0; i < tabcontent2.length; i++) {
        tabcontent2[i].style.display = "none";
    }

    tablinks2 = document.getElementsByClassName("evt_button");
    for (i = 0; i < tablinks2.length; i++) {
        tablinks2[i].className = tablinks2[i].className.replace(" active", "");
    }
    document.getElementById(TabName2).style.display = "block";
    event.currentTarget.className += " active";
}

//FAQ ---------
function filterSelection3(event3, TabName3) {
    var i, tabcontent3, tablinks3;

    tabcontent3 = document.getElementsByClassName("main_blog");
    for (i = 0; i < tabcontent3.length; i++) {
        tabcontent3[i].style.display = "none";
    }

    tablinks3 = document.getElementsByClassName("img__button");
    for (i = 0; i < tablinks3.length; i++) {
        tablinks3[i].className = tablinks3[i].className.replace(" active", "");
    }
    document.getElementById(TabName3).style.display = "block";
    event3.currentTarget.className += " active";
}

//VIDEO Gallery ---------
function filterSelection4(event4, TabName4) {
    var i, tabcontent4, tablinks4;

    tabcontent4 = document.getElementsByClassName("main_blog");
    for (i = 0; i < tabcontent4.length; i++) {
        tabcontent4[i].style.display = "none";
    }

    tablinks4 = document.getElementsByClassName("video__button");
    for (i = 0; i < tablinks4.length; i++) {
        tablinks4[i].className = tablinks4[i].className.replace(" active", "");
    }
    document.getElementById(TabName4).style.display = "block";
    event4.currentTarget.className += " active";
}

//document.getElementById("defaultOpen1").click();

//--GoldPalace Photo Gallery

let slideIndex = 0;
showSlides();

// Next-previous control
function nextSlide() {
    slideIndex++;
    showSlides();
    timer = _timer; // reset timer
}

function prevSlide() {
    slideIndex--;
    showSlides();
    timer = _timer;
}

// Thumbnail image controlls
function currentSlide(n) {
    slideIndex = n - 1;
    showSlides();
    timer = _timer;
}
function showSlides() {
    let slides = document.querySelectorAll(".mySlides");
    let dots = document.querySelectorAll(".dots");

    if (slideIndex > slides.length - 1) slideIndex = 0;
    if (slideIndex < 0) slideIndex = slides.length - 1;

    // hide all slides
    slides.forEach((slide) => {
        slide.style.display = "none";
    });

    // show one slide base on index number
    //slides[slideIndex].style.display = "block";

    dots.forEach((dot) => {
        dot.classList.remove("active");
    });

   // dots[slideIndex].classList.add("active");
}

// autoplay slides 
let timer = 7;
const _timer = timer;

// this function runs every 1 second
setInterval(() => {
    timer--;

    if (timer < 1) {
        nextSlide();
        timer = _timer;
    }
}, 1000); 

//----Video Gallery playcontrol
var videos = document.querySelectorAll(".youtube");
for (var i = 0; i < videos.length; i++) {
    var youtube = videos[i];
    // Get function
    getVideos(youtube);
}

// Get videos function
function getVideos(el) {
    var img = document.createElement("img");
    // Get minified images
    img.setAttribute('src', 'http://i.ytimg.com/vi/' + el.id + '/mqdefault.webp'); // other types : https://www.thewebtaylor.com/articles/how-to-get-a-youtube-videos-thumbnail-image-in-high-quality
    // Insert tag
    el.appendChild(img);
    // On click get video
    el.addEventListener('click', function () {
        var iframe = document.createElement("iframe");
        iframe.setAttribute('class', 'youtube_video');
        iframe.setAttribute('src', 'https://www.youtube.com/embed/' +
            this.id + '?autoplay=1&autohide=1&border=0&wmode=opaque&enablejsapi=1');
        // Replace img for video
        this.parentNode.replaceChild(iframe, this);
    }, false);
}

window.addEventListener("touchstart", function (e) {
    e.preventDefault();
},Modernizr.passiveeventlisteners ? { passive: true } : false);