<?php
/*
 * Template Name: Portfolio
 */

remove_action( 'genesis_before_content_sidebar_wrap', 'genesis_do_subnav' );

add_action('genesis_after_content', 'hf_add_portfolio_thumbs');
function hf_add_portfolio_thumbs() {
?>
    <div class="port-thumbs">

        <div class="port-thumb">
            <img class="port-thumb-img" src="http://staging.houseoffunk.flywheelsites.com/wp-content/uploads/2016/07/funk-design-studio-portfolio-interiors-styles-3-180x180.jpg">
        </div>

        <div class="port-thumb">
            <img class="port-thumb-img" src="http://staging.houseoffunk.flywheelsites.com/wp-content/uploads/2016/07/funk-design-studio-portfolio-interiors-styles-3-180x180.jpg">
        </div>

        <div class="port-thumb">
            <img class="port-thumb-img" src="http://staging.houseoffunk.flywheelsites.com/wp-content/uploads/2016/07/funk-design-studio-portfolio-interiors-styles-3-180x180.jpg">
        </div>

        <div class="port-thumb">
            <img class="port-thumb-img" src="http://staging.houseoffunk.flywheelsites.com/wp-content/uploads/2016/07/funk-design-studio-portfolio-interiors-styles-3-180x180.jpg">
        </div>

        <div class="port-thumb">
            <img class="port-thumb-img" src="http://staging.houseoffunk.flywheelsites.com/wp-content/uploads/2016/07/funk-design-studio-portfolio-interiors-styles-3-180x180.jpg">
        </div>

    </div>


<?php }



?>



<?php
genesis();
