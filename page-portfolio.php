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

        <div class="port-thumb">
            <img class="port-thumb-img" src="http://staging.houseoffunk.flywheelsites.com/wp-content/uploads/2016/07/funk-design-studio-portfolio-interiors-styles-3-180x180.jpg">
            <div class="port-thumb-title">
                Can a Barn be Glamorous?
            </div>
        </div>

        <div class="port-thumb">
            <img class="port-thumb-img" src="http://staging.houseoffunk.flywheelsites.com/wp-content/uploads/2016/07/funk-design-studio-portfolio-interiors-styles-3-180x180.jpg">
            <div class="port-thumb-title">
                Moderne Updated
            </div>
        </div>

        <div class="port-thumb">
            <img class="port-thumb-img" src="http://staging.houseoffunk.flywheelsites.com/wp-content/uploads/2016/07/funk-design-studio-portfolio-interiors-styles-3-180x180.jpg">
            <div class="port-thumb-title">
                Livable Luxury
            </div>
        </div>

        <div class="port-thumb">
            <img class="port-thumb-img" src="http://staging.houseoffunk.flywheelsites.com/wp-content/uploads/2016/07/funk-design-studio-portfolio-interiors-styles-3-180x180.jpg">
            <div class="port-thumb-title">
                1700’s Farmhouse
            </div>
        </div>

        <div class="port-thumb">
            <img class="port-thumb-img" src="http://staging.houseoffunk.flywheelsites.com/wp-content/uploads/2016/07/funk-design-studio-portfolio-interiors-styles-3-180x180.jpg">
            <div class="port-thumb-title">
                Casual Elegance
            </div>
        </div>

    </div>


<?php }



?>



<?php
genesis();