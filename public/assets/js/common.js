jQuery('img.svg').each(function () {
    var $img = jQuery(this);
    var imgID = $img.attr('id');
    var imgClass = $img.attr('class');
    var imgURL = $img.attr('src');

    jQuery.get(imgURL, function (data) {
        // Get the SVG tag, ignore the rest
        var $svg = jQuery(data).find('svg');

        // Add replaced image's ID to the new SVG
        if (typeof imgID !== 'undefined') {
            $svg = $svg.attr('id', imgID);
        }
        // Add replaced image's classes to the new SVG
        if (typeof imgClass !== 'undefined') {
            $svg = $svg.attr('class', imgClass + ' replaced-svg');
        }

        // Remove any invalid XML tags as per http://validator.w3.org
        $svg = $svg.removeAttr('xmlns:a');
        $svg = $svg.removeAttr('width');
        $svg = $svg.removeAttr('height');

        // Replace image with new SVG
        $img.replaceWith($svg);

    }, 'xml');
});

$(document).ready(function() {
    $("section.social a").each(function() {
        $(this).mouseover(function() {
            $(this).find('path, polygon').css({fill: $(this).data('color')});
        })
        .mouseout(function () {
            $(this).find('path, polygon').css({ fill: "#000" });
        })
    });
    $(".my-slider-portfolio, .my-slider").slick({
        infinite: false,
        arrows: false,
        slidesToShow: 4,
        slidesToScroll: 4,
        responsive: [
          {
            breakpoint: 1024,
            settings: {
              slidesToShow: 2,
              slidesToScroll: 2
            }
          },
          {
            breakpoint: 768,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1
            }
          }
        ]
    });
    $(".portfolio-img-slider").slick({
        dots: true,
        infinite: false,
        arrows: false,
        autoplay: true,
        autoplaySpeed: 3000,
    });
});
