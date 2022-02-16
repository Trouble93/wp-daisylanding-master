document.querySelectorAll('a[href*="#"]').forEach((link) => {
    link.addEventListener("click", function (event) {
        event.preventDefault();

        var blockID = link.getAttribute('href').substr(1)

        document.getElementById(blockID).scrollIntoView({
            behavior: 'smooth', block: 'start'
        })
    })
})
jQuery(document).ready(function () {
    jQuery('.header_burger').click(function (event) {
        jQuery('.header_burger,.hero-menu').toggleClass('active');
        jQuery('body').toggleClass('overflow-hidden');
    });
});
/// iiun
var list = document.querySelectorAll('.main-menu .menu-port');
list.forEach(e => {
    e.addEventListener('click', function (event) {
        var tagId = e.dataset.id;
        // console.log(tagId);
        var data = new FormData();
        data.append('action', "portfolio");
        data.append('cat_id', tagId);
        (async () => {
            var response = await fetch(filters_ajax.url, {
                method: 'POST', body: data
            });

            var result = await response.json();
            // console.log(result)
            if (result !== null) {
                var parser = new DOMParser();
                var doc = parser.parseFromString(result.content, 'text/html');
                var mainResult = doc.querySelectorAll('.port-items');
                var mainBlock = document.querySelector('.images-port');
                // console.log(mainResult);
                if (mainResult) {
                    mainBlock.innerHTML = '';
                    mainResult.forEach(el => {
                        mainBlock.appendChild(el);
                    });
                }
                // mainBlock.classList.remove('d-none');
                // mainCat.forEach((el) => {
                //     el.classList.add('d-none');
                // });
            } else {
                console.log('error');
            }
        })();

    })
})


jQuery(document).ready(function () {
    var services = document.querySelector('.service-block');

    if (jQuery(window).width() < 920) {
        services.classList.add('owl-carousel');
        jQuery(".service-block").owlCarousel({
            items: 4, nav: false, dots: false, responsive: {

                0      : {
                    items: 1, loop: true,
                }, 500 : {
                    loop: true, items: 1,

                }, 600 : {
                    loop: true, items: 2,

                }, 750 : {
                    loop: true, items: 3,

                }, 920 : {
                    loop: true, items: 3,

                }, 1200: {
                    items: 4,

                }
            }
        });
    }
    var teammates = document.querySelector('.teammates');
    if (jQuery(window).width() < 880) {
        teammates.classList.add('owl-carousel');
        jQuery(document).ready(function () {
            jQuery(".teammates").owlCarousel({
                items: 4, responsiveClass: true, nav: false, dots: false, responsive: {

                    0      : {
                        items: 1, loop: true,
                    }, 500 : {
                        loop: true, items: 1,

                    }, 600 : {
                        loop: true, items: 2,

                    }, 750 : {
                        loop: true, items: 2,

                    }, 920 : {
                        loop: true, items: 3,

                    }, 1200: {
                        items: 3,

                    }
                }
            });
        });
    }

});
jQuery(document).ready(function () {
    jQuery(".employees-images").owlCarousel({
        items: 1, loop: true, center: true, nav: true, dots: false, navText: ["<img src=\"" + filters_ajax.theme_uri + "/assets/images/Фигура_11_копия.svg\" alt=\"\">", "<img src=\"" + filters_ajax.theme_uri + "/assets/images/Фигура_11.svg\" alt=\"\">"]

    });


});
var map;

function initMap()
{
    map = new google.maps.Map(document.getElementById("map"), {
        center: {lat: -34.397, lng: 150.644}, zoom: 8,
    });
}

