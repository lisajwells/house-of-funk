<?php
/*
 * Template Name: Portfolio
 */

//* Remove the secondary nav
remove_action( 'genesis_before_content_sidebar_wrap', 'genesis_do_subnav' );

//* Remove the edit link
add_filter ( 'genesis_edit_post_link' , '__return_false' );

add_action('genesis_after_content', 'hf_add_portfolio_thumbs');
function hf_add_portfolio_thumbs() {
?>
    <div class="port-thumbs">

        <a href="<?php echo get_site_url(); ?>/portfolio/can-barn-glamorous"><div class="port-thumb">
            <img class="port-thumb-img" src="http://staging.houseoffunk.flywheelsites.com/wp-content/uploads/2016/07/funk-design-studio-portfolio-interiors-styles-3-220x220.jpg">
            <div class="port-thumb-title">
                Can a Barn be Glamorous?
            </div>
        </div></a>

        <a href="<?php echo get_site_url(); ?>/portfolio/moderne-updated"><div class="port-thumb">
            <img class="port-thumb-img" src="http://staging.houseoffunk.flywheelsites.com/wp-content/uploads/2016/07/funk-design-studio-portfolio-interiors-styles-3-220x220.jpg">
            <div class="port-thumb-title">
                Moderne Updated
            </div>
        </div></a>

        <a href="<?php echo get_site_url(); ?>/portfolio/livable-luxury"><div class="port-thumb">
            <img class="port-thumb-img" src="http://staging.houseoffunk.flywheelsites.com/wp-content/uploads/2016/07/funk-design-studio-portfolio-interiors-styles-3-220x220.jpg">
            <div class="port-thumb-title">
                Livable Luxury
            </div>
        </div></a>

        <a href="<?php echo get_site_url(); ?>/portfolio/1700s-farmhouse"><div class="port-thumb">
            <img class="port-thumb-img" src="http://staging.houseoffunk.flywheelsites.com/wp-content/uploads/2016/07/funk-design-studio-portfolio-interiors-styles-3-220x220.jpg">
            <div class="port-thumb-title">
                1700’s Farmhouse
            </div>
        </div></a>

        <a href="<?php echo get_site_url(); ?>/portfolio/casual-elegance"><div class="port-thumb">
            <img class="port-thumb-img" src="http://staging.houseoffunk.flywheelsites.com/wp-content/uploads/2016/07/funk-design-studio-portfolio-interiors-styles-3-220x220.jpg">
            <div class="port-thumb-title">
                Casual Elegance
            </div>
        </div></a>

    </div>


<?php }



?>



<?php
genesis();
