jQuery(document).ready(function () {
    jQuery("#range").slider({});
    jQuery("#range").on("slide", function(slideEvt) {
        console.log(slideEvt.value);
        jQuery(".block-number").val(slideEvt.value);
    });
    jQuery('.testimonials-slide').slick({
        nextArrow: '<i class="fa fa-arrow-right"></i>',
        prevArrow: '<i class="fa fa-arrow-left"></i>',
        responsive: [
            {
                breakpoint: 769,
                settings: {
                    arrows: false,
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    dots: true
                }
            },
            {
                breakpoint: 480,
                settings: {
                    arrows: false,
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    dots: true
                }
            }
        ]

    });


    jQuery('.works-slide').slick({
        nextArrow: '<i class="fa fa-arrow-right"></i>',
        prevArrow: '<i class="fa fa-arrow-left"></i>',
        arrows: true,
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 1,
        centerPadding: '40px',
        responsive: [
            {
                breakpoint: 769,
                settings: {
                    arrows: false,
                    slidesToShow: 3,
                    slidesToScroll: 1,
                    dots:true
                }
            },
            {
                breakpoint: 480,
                settings: {
                    arrows: false,
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    dots: true
                }
            }
        ]

    });
    jQuery('.related').slick({
        nextArrow: '<i class="fa fa-arrow-right"></i>',
        prevArrow: '<i class="fa fa-arrow-left"></i>',
        arrows: true,
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 1,
        centerPadding: '40px',
        responsive: [
            {
                breakpoint: 769,
                settings: {
                    arrows: false,
                    slidesToShow: 3,
                    slidesToScroll: 1,
                    dots:true
                }
            },
            {
                breakpoint: 480,
                settings: {
                    arrows: false,
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    dots: true
                }
            }
        ]

    });
    jQuery('.partners-slider').slick({
        nextArrow: '<i class="fa fa-arrow-right"></i>',
        prevArrow: '<i class="fa fa-arrow-left"></i>',
        arrows: true,
        slidesToShow: 5,
        slidesToScroll: 1,
        responsive: [
            {
                breakpoint: 769,
                settings: {
                    arrows: false,
                    slidesToShow: 2,
                    slidesToScroll: 1,
                    dots: true
                }
            },
            {
                breakpoint: 480,
                settings: {
                    arrows: false,
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    dots: true
                }
            }
        ]
    });
    jQuery('.slide-portfolio').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        fade: true,
        asNavFor: '.nav-portfolio'
    });
    jQuery('.nav-portfolio').slick({
        nextArrow: '<i class="fa fa-arrow-right"></i>',
        prevArrow: '<i class="fa fa-arrow-left"></i>',
        slidesToShow: 6,
        asNavFor: '.slide-portfolio',
        focusOnSelect: true,
        arrows:true,
        responsive: [
            {
                breakpoint: 769,
                settings: {
                    arrows: true,
                    slidesToShow: 3,
                    slidesToScroll: 1,
                }
            },
            {
                breakpoint: 480,
                settings: {
                    arrows: false,
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    dots: true
                }
            }
        ]
    });
});

///////////////////////////////////////////
jQuery('.gallery ').slick({
    nextArrow: '<i class="fa fa-arrow-right"></i>',
    prevArrow: '<i class="fa fa-arrow-left"></i>',
    slidesToShow: 4,
    slidesToScroll: 1,
    infinite: false,
    responsive: [
        {
            breakpoint: 769,
            settings: {
                arrows: false,
                slidesToShow: 2,
                slidesToScroll: 2,
                dots:true
            }
        },
        {
            breakpoint: 480,
            settings: {
                arrows: false,
                slidesToShow: 1,
                slidesToScroll: 1,
                dots: true
            }
        }
    ]
});



$("a.plus_minus").click(function () {

    $(this).find("span.plus").toggleClass("hide");
    $(this).find("span.minus").toggleClass("hide");

});


























var a = document.getElementsByClassName("lic");
var cfImg = document.getElementsByClassName("coverflow__image")

var scaleI = 0;
for (scaleI; scaleI < a.length; scaleI++) {
    if (scaleI === 3) {
        continue;
    } else {
        a[scaleI].style.cursor = "default";
        a[scaleI].addEventListener("click", prevDef);
    }
}

function prevDef(e) {
    e.preventDefault();
}

function forScale(coverflowPos) {
    for (scaleI = 0; scaleI < a.length; scaleI++) {
        a[scaleI].style.cursor = "default";
        a[scaleI].addEventListener("click", prevDef);
    }
    for (scaleI = 0; scaleI < cfImg.length; scaleI++) {
        if (cfImg[scaleI].getAttribute("data-coverflow-index") == coverflowPos) {
            cfImg[scaleI].parentElement.style.cursor = "pointer";
            cfImg[scaleI].parentElement.removeEventListener("click", prevDef);
        }
    }
}
//end added by Chase

function setupCoverflow(coverflowContainer) {
    var coverflowContainers;

    if (typeof coverflowContainer !== "undefined") {
        if (Array.isArray(coverflowContainer)) {
            coverflowContainers = coverflowContainer;
        } else {
            coverflowContainers = [coverflowContainer];
        }
    } else {
        coverflowContainers = Array.prototype.slice.apply(document.getElementsByClassName('coverflow'));
    }

    coverflowContainers.forEach(function(containerElement) {
        var coverflow = {};
        var prevArrows, nextArrows;

        //capture coverflow elements
        coverflow.container = containerElement;
        coverflow.images = Array.prototype.slice.apply(containerElement.getElementsByClassName('coverflow__image'));
        coverflow.position = Math.floor(coverflow.images.length / 2) + 1;

        //set indicies on images
        coverflow.images.forEach(function(coverflowImage, i) {
            coverflowImage.dataset.coverflowIndex = i + 1;
        });

        //set initial position
        coverflow.container.dataset.coverflowPosition = coverflow.position;

        //get prev/next arrows
        prevArrows = Array.prototype.slice.apply(coverflow.container.getElementsByClassName("prev-arrow"));
        nextArrows = Array.prototype.slice.apply(coverflow.container.getElementsByClassName("next-arrow"));

        //add event handlers
        function setPrevImage() {
            coverflow.position = Math.max(1, coverflow.position - 1);
            coverflow.container.dataset.coverflowPosition = coverflow.position;
            //call the functin forScale added
            forScale(coverflow.position);
        }

        function setNextImage() {
            coverflow.position = Math.min(coverflow.images.length, coverflow.position + 1);
            coverflow.container.dataset.coverflowPosition = coverflow.position;
            //call the function Chase added
            forScale(coverflow.position);
        }

        function jumpToImage(evt) {
            if(evt.target.dataset.coverflowIndex == coverflow.container.dataset.coverflowPosition){
                createPopUp(evt.target);
            }
            coverflow.position = Math.min(coverflow.images.length, Math.max(1, evt.target.dataset.coverflowIndex));
            coverflow.container.dataset.coverflowPosition = coverflow.position;
            //start added by Chase
            setTimeout(function() {
                forScale(coverflow.position);
            }, 1);
            //end added by Chase
        }

        function onKeyPress(evt) {
            switch (evt.which) {
                case 37: //left arrow
                    setPrevImage();
                    break;
                case 39: //right arrow
                    setNextImage();
                    break;
            }
        }
        function createPopUp(env) {
            var divMain = document.createElement("div");
            divMain.setAttribute('id','modal-image');
            var div = document.createElement("div");
            div.setAttribute('id','modal-content');
            var span = document.createElement("span");
            span.setAttribute('id','close-modal');
            span.innerText = "X";
            span.addEventListener('click',closeModal);
            divMain.addEventListener('click',closeModal);
            var img = new Image();
            img.src = env.src;
            div.appendChild(span);
            div.appendChild(img);
            divMain.appendChild(div);
            document.body.appendChild(divMain);
        }
        function closeModal(env){
            if(env.target instanceof HTMLImageElement) return false;
            var x = document.getElementById('modal-image');
            x.remove();
        }
        prevArrows.forEach(function(prevArrow) {
            prevArrow.addEventListener('click', setPrevImage);
        });
        nextArrows.forEach(function(nextArrow) {
            nextArrow.addEventListener('click', setNextImage);
        });
        coverflow.images.forEach(function(image) {
            image.addEventListener('click', jumpToImage);
        });
        window.addEventListener('keyup', onKeyPress);
    });
}

setupCoverflow();


function loadSlide (id) {
    jQuery('#categories' + id).slick({
            nextArrow: '<i class=\"fa fa-arrow-right\"></i>',
            prevArrow: '<i class=\"fa fa-arrow-left\"></i>',
            arrows: true,
            infinite: true,
            slidesToShow: 3,
            slidesToScroll: 1,
            lazyLoad: true,
            responsive: [
                {
                    breakpoint: 768,
                    settings: {
                        arrows: true,
                        centerPadding: '40px',
                        slidesToShow: 2,
                        slidesToScroll: 1,
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        arrows: true,
                        centerPadding: '40px',
                        slidesToShow: 1,
                        slidesToScroll: 1,
                    }
                },
            ],
        });
    jQuery('#categories' + id).slick('resize');
}
jQuery(document).ready(function () {
    jQuery('#all').slick({
        nextArrow: '<i class=\"fa fa-arrow-right\"></i>',
        prevArrow: '<i class=\"fa fa-arrow-left\"></i>',
        arrows: true,
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 1,
        responsive: [
            {
                breakpoint: 992,
                settings: {
                    arrows: true,
                    centerPadding: '40px',
                    slidesToShow: 2,
                    slidesToScroll: 1,
                }
            },
            {
                breakpoint: 480,
                settings: {
                    arrows: false,
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    dots:true
                }
            }
        ]
    });
});
jQuery('a.show-menu').on('click', function (event) {
    event.preventDefault();
    jQuery( ".mobile-menu-content" ).toggleClass( "show" )
});



