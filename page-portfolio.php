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

        <a href="<?php echo get_site_url(); ?>/portfolio/barn-renovation"><div class="port-thumb">
            <img class="port-thumb-img" nopin="nopin" src="http://staging.houseoffunk.flywheelsites.com/wp-content/uploads/2016/07/glam-barn.jpg">
            <div class="port-thumb-title">
                Glamorous Barn
            </div>
        </div></a><a href="<?php echo get_site_url(); ?>/portfolio/modern-updated"><div class="port-thumb">
            <img class="port-thumb-img" nopin="nopin" src="http://staging.houseoffunk.flywheelsites.com/wp-content/uploads/2016/07/moderne-updated.jpg">
            <div class="port-thumb-title">
                Modern Updated
            </div>
        </div></a><a href="<?php echo get_site_url(); ?>/portfolio/livable-luxury"><div class="port-thumb">
            <img class="port-thumb-img" nopin="nopin" src="http://staging.houseoffunk.flywheelsites.com/wp-content/uploads/2016/07/livable-luxury.jpg">
            <div class="port-thumb-title">
                Livable Luxury
            </div>
        </div></a><a href="<?php echo get_site_url(); ?>/portfolio/1700s-farmhouse"><div class="port-thumb">
            <img class="port-thumb-img" nopin="nopin" src="http://staging.houseoffunk.flywheelsites.com/wp-content/uploads/2016/07/1700s-farmhouse-1.jpg">
            <div class="port-thumb-title">
                1700’s Farmhouse
            </div>
        </div></a><a href="<?php echo get_site_url(); ?>/portfolio/casual-elegance"><div class="port-thumb">
            <img class="port-thumb-img" nopin="nopin" src="http://staging.houseoffunk.flywheelsites.com/wp-content/uploads/2016/07/casual-elegance.jpg">
            <div class="port-thumb-title">
                Casual Elegance
            </div>
        </div></a>

    </div>


<?php }



?>



<?php
genesis();
