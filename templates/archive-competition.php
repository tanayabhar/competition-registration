<style>
    .row {
    width: 300px;
    display: inline-flex;
    margin: 20px;
}
</style>
<?php

get_header();
add_image_size('archive', 300, 300, true );
?>
<div id="content" class="site-content">
    <div class="container">
		

	<div id="primary" class="content-area primary">

		
				<section class="archive-description">
			<h1 class="page-title archive-title">Competitions</h1>		</section>
	
					<main id="main" class="site-main">
                        <?php
                        if( have_posts() ): while(have_posts()) : the_post();
                        $attachment_id = get_post_thumbnail_id( get_the_ID() ); 
                        $img_src = wp_get_attachment_image_url( $attachment_id, 'archive' );
                            ?>
				<div class="row">
                    <article class="competition-archive">
		                <div class="post-format">
	<div class="post-content">
		<div class="post-thumb"><div class="post-thumb-img-content post-thumb"><a href="<?php the_permalink(); ?>"><img src="<?php echo $img_src; ?>" class="wp-post-image"></a></div></div><h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>		
       
					<div class="excerpt-container">
				<?php the_content(); ?>
			</div>
				<div class="entry-content clear" itemprop="text">
					</div><!-- .entry-content .clear -->
	</div><!-- .post-content -->
</div> <!-- .blog-layout-4 -->
	</article><!-- #post-## -->
</div>			
<?php
endwhile;
endif;
?>
</main><!-- #main -->
			
		
		
	</div><!-- #primary -->


	</div> <!-- ast-container -->
	</div>
<?php
get_footer();