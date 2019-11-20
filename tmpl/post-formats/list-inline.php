<?php
/**
 * The default template for displaying inline posts
 */

?>
<article id="post-<?php the_ID(); ?>">
	<?php 
		if ( has_post_thumbnail() ) {

			$mirasat_photo_class = 'photo';
        	$mirasat_layout = get_query_var( 'mirasat_layout' );

			$mirasat_image_src = wp_get_attachment_image_src( get_post_thumbnail_id( get_The_ID()), 'full' );

			if ($mirasat_image_src[2] > $mirasat_image_src[1]) $mirasat_photo_class .= ' vertical';
			
		    echo '<a href="'.esc_url(get_the_permalink()).'" class="'.esc_attr($mirasat_photo_class).'">';

	    		the_post_thumbnail();

		    echo '</a>';
		}
	?>
    <div class="description">
   		<?php

   			mirasat_get_the_cats_archive();
   			
   		?>
        <a href="<?php esc_url( the_permalink() ); ?>" class="header"><h3><?php the_title(); ?></h3></a>
        <?php if ( !has_post_thumbnail() ): ?>
        <div class="text text-page">
			<?php
				add_filter( 'the_content', 'mirasat_excerpt' );
			    if( strpos( $post->post_content, '<!--more-->' ) ) {

			        the_content( esc_html__( 'Read more', 'mirasat' ) );
			    }
			    	else  {

			    	the_excerpt();
			    }	

			?>
        </div>            
    	<?php endif; ?>
    	<div class="blog-info">
    	<?php
			mirasat_the_post_info();
    	?>
    	</div>
    </div>  
</article>