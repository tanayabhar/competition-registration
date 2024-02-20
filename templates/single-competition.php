<style>
    .post-thumb{
        width:600px;
        height: 600px;
    }
	.competition-entry {
    display: inline-block;
    color: #fff !important;
    border: 1px solid #CCC;
    background: var(--ast-global-color-0);
    box-shadow: 0 0 5px -1px rgba(0,0,0,0.2);
    cursor: pointer;
    vertical-align: middle;
    max-width: 106px;
    padding: 5px;
    text-align: center;
	}
	.competition-entry a{
		color: #fff
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
			</section>
	
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
		<header class="entry-header"><h1 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>	</header>
        <div class="post-thumb"><div class="post-thumb-img-content post-thumb"><a href="<?php the_permalink(); ?>"><img src="<?php echo $img_src; ?>" class="wp-post-image"></a></div></div>	
       
					<div class="excerpt-container">
				<?php the_content(); ?>
                <div class="competition-entry"><a href="<?php echo get_the_permalink(); ?>./submit-entry">Submit entry</a></div>
                
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