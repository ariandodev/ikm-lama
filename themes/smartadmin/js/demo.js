$('#ribbon')
    .append(
        '<div class="demo"><span id="demo-setting"><i class="fa fa-cog txt-color-blueDark"></i></span> <form><legend class="no-padding margin-bottom-10">Pengaturan Tampilan</legend><section><label><input name="subscription" id="smart-fixed-nav" type="checkbox"  class="checkbox style-0"><span>Header Tetap</span></label><label><input type="checkbox" name="terms" id="smart-fixed-ribbon" class="checkbox style-0"><span>Ribbon Tetap</span></label><label><input type="checkbox" name="terms" id="smart-fixed-navigation" class="checkbox style-0"><span>Navigasi Tetap</span></label><label><input type="checkbox" name="terms" id="smart-fixed-container" class="checkbox style-0"><span>Tambah Latar <div class="font-xs text-right">(tidak-responsif)</div></span></label><label style="display:none;"><input type="checkbox" name="terms" id="smart-rtl" class="checkbox style-0"><span>Right to left <b>(rtl)</b></span></label> <span id="smart-bgimages"></span></section><section><h6 class="margin-top-10 semi-bold margin-bottom-5">Bersihkan Cache</h6><a href="javascript:void(0);" class="btn btn-xs btn-block btn-primary" id="reset-smart-widget"><i class="fa fa-refresh"></i> Reset</a></section> <h6 class="margin-top-10 semi-bold margin-bottom-5">Ganti Tema</h6><section id="smart-styles"><a href="javascript:void(0);" id="smart-style-0" data-skinlogo="'+window.APP_THEMES+'img/images/'+$logo_default+'" class="btn btn-block btn-xs txt-color-white margin-right-5" style="background-color:#4E463F;"><i class="fa fa-check fa-fw" id="skin-checked"></i>Tema Standar</a><a href="javascript:void(0);" id="smart-style-1" data-skinlogo="'+window.APP_THEMES+'img/images/'+$logo_dark+'" class="btn btn-block btn-xs txt-color-white" style="background:#3A4558;">Gelap</a><a href="javascript:void(0);" id="smart-style-2" data-skinlogo="'+window.APP_THEMES+'img/images/'+$logo_ultra+'" class="btn btn-xs btn-block txt-color-darken margin-top-5" style="background:#fff;">Putih</a><a href="javascript:void(0);" id="smart-style-3" data-skinlogo="'+window.APP_THEMES+'img/images/'+$logo_googleskin+'" class="btn btn-xs btn-block txt-color-white margin-top-5" style="background:#f78c40">Oranye</a></section></form> </div>'
)

// hide bg options
var smartbgimage =
    "<h6 class='margin-top-10 semi-bold'>Background</h6><img src='"+window.APP_THEMES+"img/pattern/graphy-xs.png' data-htmlbg-url='"+window.APP_THEMES+"img/pattern/graphy.png' width='22' height='22' class='margin-right-5 bordered cursor-pointer'><img src='"+window.APP_THEMES+"img/pattern/tileable_wood_texture-xs.png' width='22' height='22' data-htmlbg-url='"+window.APP_THEMES+"img/pattern/tileable_wood_texture.png' class='margin-right-5 bordered cursor-pointer'><img src='"+window.APP_THEMES+"img/pattern/sneaker_mesh_fabric-xs.png' width='22' height='22' data-htmlbg-url='"+window.APP_THEMES+"img/pattern/sneaker_mesh_fabric.png' class='margin-right-5 bordered cursor-pointer'><img src='"+window.APP_THEMES+"img/pattern/nistri-xs.png' data-htmlbg-url='img/pattern/nistri.png' width='22' height='22' class='margin-right-5 bordered cursor-pointer'><img src='"+window.APP_THEMES+"img/pattern/paper-xs.png' data-htmlbg-url='img/pattern/paper.png' width='22' height='22' class='bordered cursor-pointer'>";
$("#smart-bgimages")
    .fadeOut();

$('#demo-setting')
    .click(function () {
        //console.log('setting');
        $('#ribbon .demo')
            .toggleClass('activate');
    })

/*
 * FIXED HEADER
 */
$('input[type="checkbox"]#smart-fixed-nav')
    .click(function () {
        if ($(this)
            .is(':checked')) {
            //checked
            $.root_.addClass("fixed-header");
            nav_page_height();
        } else {
            //unchecked
            $('input[type="checkbox"]#smart-fixed-ribbon')
                .prop('checked', false);
            $('input[type="checkbox"]#smart-fixed-navigation')
                .prop('checked', false);

            $.root_.removeClass("fixed-header");
            $.root_.removeClass("fixed-navigation");
            $.root_.removeClass("fixed-ribbon");

        }
    });

/*
 * FIXED RIBBON
 */
$('input[type="checkbox"]#smart-fixed-ribbon')
    .click(function () {
        if ($(this)
            .is(':checked')) {
            //checked
            $('input[type="checkbox"]#smart-fixed-nav')
                .prop('checked', true);

            $.root_.addClass("fixed-header");
            $.root_.addClass("fixed-ribbon");

            $('input[type="checkbox"]#smart-fixed-container')
                .prop('checked', false);
            $.root_.removeClass("container");

        } else {
            //unchecked
            $('input[type="checkbox"]#smart-fixed-navigation')
                .prop('checked', false);
            $.root_.removeClass("fixed-ribbon");
            $.root_.removeClass("fixed-navigation");
        }
    });
jQuery(document).ready(function($) {
        $(".jarviswidget-fullscreen-btn").click();
    });


/*
 * FIXED NAV
 */
$('input[type="checkbox"]#smart-fixed-navigation')
    .click(function () {
        if ($(this)
            .is(':checked')) {

            //checked
            $('input[type="checkbox"]#smart-fixed-nav')
                .prop('checked', true);
            $('input[type="checkbox"]#smart-fixed-ribbon')
                .prop('checked', true);

            //apply
            $.root_.addClass("fixed-header");
            $.root_.addClass("fixed-ribbon");
            $.root_.addClass("fixed-navigation");

            $('input[type="checkbox"]#smart-fixed-container')
                .prop('checked', false);
            $.root_.removeClass("container");

        } else {
            //unchecked
            $.root_.removeClass("fixed-navigation");
        }
    });

/*
 * RTL SUPPORT
 */
$('input[type="checkbox"]#smart-rtl')
    .click(function () {
        if ($(this)
            .is(':checked')) {

            //checked
            $.root_.addClass("smart-rtl");

        } else {
            //unchecked
            $.root_.removeClass("smart-rtl");
        }
    });


/*
 * INSIDE CONTAINER
 */
$('input[type="checkbox"]#smart-fixed-container')
    .click(function () {
        if ($(this)
            .is(':checked')) {
            //checked
            $.root_.addClass("container");

            $('input[type="checkbox"]#smart-fixed-ribbon')
                .prop('checked', false);
            $.root_.removeClass("fixed-ribbon");

            $('input[type="checkbox"]#smart-fixed-navigation')
                .prop('checked', false);
            $.root_.removeClass("fixed-navigation");

            if (smartbgimage) {
                $("#smart-bgimages")
                    .append(smartbgimage)
                    .fadeIn(1000);
                $("#smart-bgimages img")
                    .bind("click", function () {
                        var $this = $(this);
                        var $html = $('html')
                        bgurl = ($this.data("htmlbg-url"));
                        $html.css("background-image", "url(" +
                            bgurl + ")");
                    })

                smartbgimage = null;
            } else {
                $("#smart-bgimages")
                    .fadeIn(1000);
            }


        } else {
            //unchecked
            $.root_.removeClass("container");
            $("#smart-bgimages")
                .fadeOut();
            // console.log("container off");
        }
    });

/*
 * REFRESH WIDGET
 */
$("#reset-smart-widget")
    .bind("click", function () {
        $('#refresh')
            .click();
        return false;
    });

/*
 * STYLES
 */
$("#smart-styles > a")
    .bind("click", function () {
        var $this = $(this);
        var $logo = $("#logo img");
        $.root_.removeClassPrefix('smart-style')
            .addClass($this.attr("id"));
        $logo.attr('src', $this.data("skinlogo"));
        $("#smart-styles > a #skin-checked")
            .remove();
        $this.prepend(
            "<i class='fa fa-check fa-fw' id='skin-checked'></i>"
        );
    });