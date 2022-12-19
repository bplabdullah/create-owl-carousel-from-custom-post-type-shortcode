function create_core_carousel(){
       $args = array(
           "post_type" => "core",
           "posts_per_page" => 5,
       );
       $wp_query = new WP_Query($args);
       if($wp_query->have_posts() ){
		   ?>
           <div class="carousel">
			   <?php
           while($wp_query->have_posts()){
               $wp_query->the_post(); ?>
               <div class="carousel-item">
                                <img src="<?php echo get_the_post_thumbnail_url(); ?>">
                                <div class="carousel-item-content">
                                    <h2><?php echo get_the_title(); ?></h2>
                                    <p><?php echo get_the_excerpt(); ?></p>
                                </div>
                        </div>
<?php
           }
?>
           </div>
<?php
       }
       wp_reset_postdata();
    }
    add_shortcode("core_carousel", "create_core_carousel");
