<?php
    /********
    Shortcodes
    *********/
    function shortcode_empty_paragraph_fix($content) {

    $array = array (
            '<p>[' => '[',
    '<p>]' => ']',
            ']</p>' => ']',
            '</p>[' => '[',
            ']<br />' => ']',
      ']<br>' => ']',
      '<br />[' => '[',
      '<br>[' => '[',
            '<br>' => '',
      '<p></p>' => '','<p>&nbsp;</p>' => '',
        );

        $content = strtr($content, $array);

        return $content;
}
add_filter( 'pre_option_image_default_size', 'my_default_image_size' );
add_filter( 'post_content', 'do_shortcode' );


/**
 * Filters the content to remove any extra paragraph or break tags
 * caused by shortcodes.
 *
 * @since 1.0.0
 *
 * @param string $content  String of HTML content.
 * @return string $content Amended string of HTML content.
 */
function tgm_io_shortcode_empty_paragraph_fix( $content ) {

    $array = array(
        '<p>['    => '[',
        ']</p>'   => ']',
        ']<br />' => ']'
    );
    return strtr( $content, $array );

}

/******** Basic********/

function span($atts, $content = null) {
    $content = preg_replace('#^<\/p>|<p>$#', '', $content);
    $content = shortcode_empty_paragraph_fix($content);
    return '<span>' . do_shortcode($content) . '</span>';

}
add_shortcode('span', 'span');

function button($atts, $content = null) {
    $content = preg_replace('#^<\/p>|<p>$#', '', $content);
    $content = shortcode_empty_paragraph_fix($content);
    return '<button class="button button-primary">' . do_shortcode($content) . '</button>';

}
add_shortcode('button', 'button');

function empty_line($atts, $content = null) {
    $content = preg_replace('#^<\/p>|<p>$#', '', $content);
    $content = shortcode_empty_paragraph_fix($content);
    return '<div class="empty_line">&nbsp;</div>';

}
add_shortcode('empty_line', 'empty_line');

function break_line($atts, $content = null) {
    $content = preg_replace('#^<\/p>|<p>$#', '', $content);
    $content = shortcode_empty_paragraph_fix($content);
    return '<div class="break-line para-break-line"></div>';

}
add_shortcode('break_line', 'break_line');

function break_line_long($atts, $content = null) {
    $content = preg_replace('#^<\/p>|<p>$#', '', $content);
    $content = shortcode_empty_paragraph_fix($content);
    return '<div class="break-line container-right"></div>';

}
add_shortcode('break_line_long', 'break_line_long');

function container($atts, $content = null) {
    $content = preg_replace('#^<\/p>|<p>$#', '', $content);
    $content = shortcode_empty_paragraph_fix($content);
    return '<div class="container">' . do_shortcode($content) . '</div>';

}
add_shortcode('container', 'container');

function row($atts, $content = null) {
    $content = preg_replace('#^<\/p>|<p>$#', '', $content);
    $content = shortcode_empty_paragraph_fix($content);
    return ' <div class="row">' . do_shortcode($content) . '</div>';

}
add_shortcode('row', 'row');


function highlight($atts, $content = null) {
    $content = preg_replace('#^<\/p>|<p>$#', '', $content);
    $content = shortcode_empty_paragraph_fix($content);
    return '<p><span class="highlightme"><sup>' . do_shortcode($content) . '</sup></span></p>';

}
add_shortcode('highlight', 'highlight');

/******Footer sections*******/

function copy_right($atts, $content = null) {
    $content = preg_replace('#^<\/p>|<p>$#', '', $content);
    $content = shortcode_empty_paragraph_fix($content);
    return '<div class="col-4 copy-right">' . do_shortcode($content) . '</div>';

}
add_shortcode('copy_right', 'copy_right');

function footer_menu($atts, $content = null) {
    $content = preg_replace('#^<\/p>|<p>$#', '', $content);
    $content = shortcode_empty_paragraph_fix($content);
    return '<div class="col-5">
                <div class="footer-menu">' . do_shortcode($content) . '</div></div>';

}
add_shortcode('footer_menu', 'footer_menu');

function footer_menu_col($atts, $content = null) {
    $content = preg_replace('#^<\/p>|<p>$#', '', $content);
    $content = shortcode_empty_paragraph_fix($content);
    return '<div class="footer-menu-col">' . do_shortcode($content) . '</div>';

}
add_shortcode('footer_menu_col', 'footer_menu_col');

function footer_social($atts, $content = null) {
    $content = preg_replace('#^<\/p>|<p>$#', '', $content);
    $content = shortcode_empty_paragraph_fix($content);
    return '<div class="col-3 social">' . do_shortcode($content) . '</div>';

}
add_shortcode('footer_social', 'footer_social');

function facebook($atts, $content = null) {
    $content = preg_replace('#^<\/p>|<p>$#', '', $content);
    $content = shortcode_empty_paragraph_fix($content);
    $link     = $atts['link'];
    return '<li><a class="no-effect" href="'.$link.'"><i class="fa fa-facebook-f"></i></a></li>';

}
add_shortcode('facebook', 'facebook');
function instagram($atts, $content = null) {
    $content = preg_replace('#^<\/p>|<p>$#', '', $content);
    $content = shortcode_empty_paragraph_fix($content);
    $link     = $atts['link'];
    return '<li><a class="no-effect" href="'.$link.'"><i class="fa fa-instagram"></i></a></li>';

}
add_shortcode('instagram', 'instagram');

/*******Generic Page shortcode********/

function content_img($atts, $content = null) {
    $content = preg_replace('#^<\/p>|<p>$#', '', $content);
    $content = shortcode_empty_paragraph_fix($content);
    return '<figure class="content-image container-right">' . do_shortcode($content) . '</figure>';
}
add_shortcode('content_img', 'content_img');

function video_section($atts, $content = null) {
    $content = preg_replace('#^<\/p>|<p>$#', '', $content);
    $content = shortcode_empty_paragraph_fix($content);
    $link     = $atts['link'];
    return '<figure class="container-right">
                                <div class="embed-responsive embed-responsive-16by9">
                                    <iframe src="'.$link.'" width="640" height="360" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                                </div>
                            </figure>';
}
add_shortcode('video_section', 'video_section');

function blockquote_long($atts, $content = null) {
    $content = preg_replace('#^<\/p>|<p>$#', '', $content);
    $content = shortcode_empty_paragraph_fix($content);
    return '<div class="sub-introcontent middle-block">
                                <div class="content-image  fluid-wrapper">
                                    <blockquote>
                                        <div class="container">
                                            <div class="blockquote">' . do_shortcode($content) . '</div>
                                        </div>
                                    </blockquote>
                                </div></div>';
}
add_shortcode('blockquote_long', 'blockquote_long');

function blockquote_short($atts, $content = null) {
    $content = preg_replace('#^<\/p>|<p>$#', '', $content);
    $content = shortcode_empty_paragraph_fix($content);
    return '<div class="sub-introcontent middle-block">
                                <div class="content-image  fluid-wrapper">
                                    <blockquote>
                                        <div class="fluid-wrapper-col">
                                            <div class="blockquote">' . do_shortcode($content) . '</div>
                                        </div>
                                    </blockquote>
                                </div></div>';
}
add_shortcode('blockquote_short', 'blockquote_short');

function content_card_section($atts, $content = null) {
    $content = preg_replace('#^<\/p>|<p>$#', '', $content);
    $content = shortcode_empty_paragraph_fix($content);
    return '<div class="container-right"><div class="row"><div class="col-10">' . do_shortcode($content) . '</div></div></div>';
}
add_shortcode('content_card_section', 'content_card_section');

function cardrow($atts, $content = null) {
    $content = preg_replace('#^<\/p>|<p>$#', '', $content);
    $content = shortcode_empty_paragraph_fix($content);
    return '<div class="row sub-cardrow">' . do_shortcode($content) . '</div>';
}
add_shortcode('cardrow', 'cardrow');

function cardrow_img($atts, $content = null) {
    $content = preg_replace('#^<\/p>|<p>$#', '', $content);
    $content = shortcode_empty_paragraph_fix($content);
    $link     = $atts['link'];
    return '<div class="col-6"><a href="'.$link.'">' . do_shortcode($content) . '</a></div>';
}
add_shortcode('cardrow_img', 'cardrow_img');

function cardrow_content($atts, $content = null) {
    $content = preg_replace('#^<\/p>|<p>$#', '', $content);
    $content = shortcode_empty_paragraph_fix($content);
    $link     = $atts['link'];
    return '<div class="col-6 sub-cardrow-content">' . do_shortcode($content) . '</div>';
}
add_shortcode('cardrow_content', 'cardrow_content');

function slider_quote($atts, $content = null) {
    $content = preg_replace('#^<\/p>|<p>$#', '', $content);
    $content = shortcode_empty_paragraph_fix($content);
    $link     = $atts['link'];
    return '<div class="content-image fluid-wrapper">
                                <blockquote class="testimonial-slider">' . do_shortcode($content) . '</blockquote></div>';
}
add_shortcode('slider_quote', 'slider_quote');

function single_quote($atts, $content = null) {
    $content = preg_replace('#^<\/p>|<p>$#', '', $content);
    $content = shortcode_empty_paragraph_fix($content);
    $link     = $atts['link'];
    return '<div><div class="container"><div class="blockquote">' . do_shortcode($content) . '</div></div></div>';
}
add_shortcode('single_quote', 'single_quote');

function vertical_card_section($atts, $content = null) {
    $content = preg_replace('#^<\/p>|<p>$#', '', $content);
    $content = shortcode_empty_paragraph_fix($content);
    $link     = $atts['link'];
    return '<section class="body-bg section-init section-divider fluid-wrapper">
                                <div class="container">
                                    <div class="row m-0">' . do_shortcode($content) . '</div></div></section>';
}
add_shortcode('vertical_card_section', 'vertical_card_section');

function vertical_tile($atts, $content = null) {
    $content = preg_replace('#^<\/p>|<p>$#', '', $content);
    $content = shortcode_empty_paragraph_fix($content);
    $link     = $atts['link'];
    return '<a href="'.$link.'" class="vertical-tile col-6 p-0">' . do_shortcode($content) . '</a>';
}
add_shortcode('vertical_tile', 'vertical_tile');

function vertical_tile_img($atts, $content = null) {
    $content = preg_replace('#^<\/p>|<p>$#', '', $content);
    $content = shortcode_empty_paragraph_fix($content);
    $link     = $atts['link'];
    return '<div class="vertical-tile-banner">' . do_shortcode($content) . '</div>';
}
add_shortcode('vertical_tile_img', 'vertical_tile_img');

function vertical_tile_cont($atts, $content = null) {
    $content = preg_replace('#^<\/p>|<p>$#', '', $content);
    $content = shortcode_empty_paragraph_fix($content);
    $link     = $atts['link'];
    return '<div class="vertical-tile-content">' . do_shortcode($content) . '</div>';
}
add_shortcode('vertical_tile_cont', 'vertical_tile_cont');

/*******************
* Product details page
*******************/
function Product_Description($atts, $content = null) {
    $content = preg_replace('#^<\/p>|<p>$#', '', $content);
    $content = shortcode_empty_paragraph_fix($content);

    return '<ul class="tabs-links"></ul><div class="tabs-content generic-list">' . do_shortcode($content) . '</div>';
}
add_shortcode('Product_Description', 'Product_Description');

function link_1($atts, $content = null) {
    $content = preg_replace('#^<\/p>|<p>$#', '', $content);
    $content = shortcode_empty_paragraph_fix($content);
    return '<div id="tab1" class="tab active"><div class="col-10 pl-0">' . do_shortcode($content) . '</div></div>';
}
add_shortcode('link_1', 'link_1');

function link_2($atts, $content = null) {
    $content = preg_replace('#^<\/p>|<p>$#', '', $content);
    $content = shortcode_empty_paragraph_fix($content);
    return '<div id="tab2" class="tab"><div class="col-10 pl-0">' . do_shortcode($content) . '</div></div>';
}
add_shortcode('link_2', 'link_2');

function link_3($atts, $content = null) {
    $content = preg_replace('#^<\/p>|<p>$#', '', $content);
    $content = shortcode_empty_paragraph_fix($content);
    return '<div id="tab3" class="tab"><div class="col-10 pl-0">' . do_shortcode($content) . '</div></div>';
}
add_shortcode('link_3', 'link_3');

function link_4($atts, $content = null) {
    $content = preg_replace('#^<\/p>|<p>$#', '', $content);
    $content = shortcode_empty_paragraph_fix($content);
    return '<div id="tab4" class="tab"><div class="col-10 pl-0">' . do_shortcode($content) . '</div></div>';
}
add_shortcode('link_4', 'link_4');

function link_5($atts, $content = null) {
    $content = preg_replace('#^<\/p>|<p>$#', '', $content);
    $content = shortcode_empty_paragraph_fix($content);
    return '<div id="tab5" class="tab"><div class="col-10 pl-0">' . do_shortcode($content) . '</div></div>';
}
add_shortcode('link_5', 'link_5');

function link_6($atts, $content = null) {
    $content = preg_replace('#^<\/p>|<p>$#', '', $content);
    $content = shortcode_empty_paragraph_fix($content);
    return '<div id="tab6" class="tab"><div class="col-10 pl-0">' . do_shortcode($content) . '</div></div>';
}
add_shortcode('link_6', 'link_6');

function link_7($atts, $content = null) {
    $content = preg_replace('#^<\/p>|<p>$#', '', $content);
    $content = shortcode_empty_paragraph_fix($content);
    return '<div id="tab7" class="tab"><div class="col-10 pl-0">' . do_shortcode($content) . '</div></div>';
}
add_shortcode('link_7', 'link_7');


function product_quote($atts, $content = null) {
    $content = preg_replace('#^<\/p>|<p>$#', '', $content);
    $content = shortcode_empty_paragraph_fix($content);

    return '<blockquote class="no-bg">
                                            <div class="blockquote">' . do_shortcode($content) . '</div></blockquote>';
}
add_shortcode('product_quote', 'product_quote');

function sb_content($atts, $content = null) {
    $content = preg_replace('#^<\/p>|<p>$#', '', $content);
    $content = shortcode_empty_paragraph_fix($content);
    return '<div class="rightnav-content">' . do_shortcode($content) . '</div>';
}
add_shortcode('sb_content', 'sb_content');

function sb_break($atts, $content = null) {
    $content = preg_replace('#^<\/p>|<p>$#', '', $content);
    $content = shortcode_empty_paragraph_fix($content);

    return '<div class="break-line"></div>';
}
add_shortcode('sb_break', 'sb_break');

function sb_product_card($atts, $content = null) {
    $content = preg_replace('#^<\/p>|<p>$#', '', $content);
    $content = shortcode_empty_paragraph_fix($content);
    $link     = $atts['link'];
    return ' <div class="product-listing">
                                    <a href="'.$link.'" class="card no-effect zoom-in">' . do_shortcode($content) . '</a></div>';
}
add_shortcode('sb_product_card', 'sb_product_card');

function sb_card_cont($atts, $content = null) {
    $content = preg_replace('#^<\/p>|<p>$#', '', $content);
    $content = shortcode_empty_paragraph_fix($content);
    $link     = $atts['link'];
    return '<div class="card-content">' . do_shortcode($content) . '</div>';
}
add_shortcode('sb_card_cont', 'sb_card_cont');

function unit_price($atts, $content = null) {
    $content = preg_replace('#^<\/p>|<p>$#', '', $content);
    $content = shortcode_empty_paragraph_fix($content);
    return '<span class="unitprice">&#8377;' . do_shortcode($content) . '</span>';
}
add_shortcode('unit_price', 'unit_price');

function sb_cardrow($atts, $content = null) {
    $content = preg_replace('#^<\/p>|<p>$#', '', $content);
    $content = shortcode_empty_paragraph_fix($content);
    $link     = $atts['link'];
    return '<div class="card-row"><a href="'.$link.'"><figure>' . do_shortcode($content) . '</figure></a></div>';
}
add_shortcode('sb_cardrow', 'sb_cardrow');

function sb_cardimg($atts, $content = null) {
    $content = preg_replace('#^<\/p>|<p>$#', '', $content);
    $content = shortcode_empty_paragraph_fix($content);
    return '<div class="c-image">' . do_shortcode($content) . '</div>';
}
add_shortcode('sb_cardimg', 'sb_cardimg');

function sb_cardcont($atts, $content = null) {
    $content = preg_replace('#^<\/p>|<p>$#', '', $content);
    $content = shortcode_empty_paragraph_fix($content);
    return '<figcaption>' . do_shortcode($content) . '</figcaption>';
}
add_shortcode('sb_cardcont', 'sb_cardcont');

function data_sheet($atts, $content = null) {
    $content = preg_replace('#^<\/p>|<p>$#', '', $content);
    $content = shortcode_empty_paragraph_fix($content);
    return '<div class="table-data-sheet">' . do_shortcode($content) . '</div>';
}
add_shortcode('data_sheet', 'data_sheet');

function intro_text($atts, $content = null) {
    $content = preg_replace('#^<\/p>|<p>$#', '', $content);
    $content = shortcode_empty_paragraph_fix($content);
    return '<div class="introtext"><p>' . do_shortcode($content) . '<p></div>';
}
add_shortcode('intro_text', 'intro_text');

function ph_ico($atts, $content = null) {
    $content = preg_replace('#^<\/p>|<p>$#', '', $content);
    $content = shortcode_empty_paragraph_fix($content);
    return '<i class="fa fa-phone"></i>';
}
add_shortcode('ph_ico', 'ph_ico');

function whatsapp_ico($atts, $content = null) {
    $content = preg_replace('#^<\/p>|<p>$#', '', $content);
    $content = shortcode_empty_paragraph_fix($content);
    return '<i class="fa fa-whatsapp"></i>';
}
add_shortcode('whatsapp_ico', 'whatsapp_ico');

function tel($atts, $content = null) {
    $content = preg_replace('#^<\/p>|<p>$#', '', $content);
    $content = shortcode_empty_paragraph_fix($content);
    $mobile    = $atts['mobile'];
    return '<a class="no-effect" href="tel:'.$mobile.'">' . do_shortcode($content) . '</a>';
}
add_shortcode('tel', 'tel');
function mail_ico($atts, $content = null) {
    $content = preg_replace('#^<\/p>|<p>$#', '', $content);
    $content = shortcode_empty_paragraph_fix($content);
    return '<i class="fa fa-envelope"></i>';
}
add_shortcode('mail_ico', 'mail_ico');
?>
