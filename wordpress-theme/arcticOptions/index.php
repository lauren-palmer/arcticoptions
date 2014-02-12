<?php get_header();?>
<div id="container">
	
<header id="slideshow" class="row">
	    <div class="active item whale">
	    	<cite>
	    		Photo credit: <a href="https://www.morguefile.com/creative/matthew_hull">Matthew G. Hull</a> 
	    	</cite>
	    </div>
	    <div class="item ice darker-text">
	    	<cite>
	    		Photo credit: <a href="http://www.flickr.com/photos/usgeologicalsurvey/4371010590/">Patrick Kelley</a>, U.S. Coast Guard under <a href="http://creativecommons.org/licenses/by/4.0/legalcode">CC 4.0 license</a>.
	    	</cite>
	    </div>
	    <div class="item boat">
	    	<cite>
	    		Photo credit: <a href="http://www.flickr.com/photos/adactio/2526096623/">Jeremy Keith</a> under <a href="http://creativecommons.org/licenses/by/2.0/legalcode">CC 2.0 license</a>.
	    	</cite>
	    </div>   
	 	<div class="item family darker-text">
	 		<cite>
	 			Photo credit: <a href="http://www.flickr.com/photos/lac-bac/7342566364/">Gar Lunney. National Film Board of Canada</a> under <a href="http://creativecommons.org/licenses/by/2.0/legalcode">CC 2.0 license</a>.
	 		</cite>
	 	</div>   
</header>
<script>
function slideSwitch() {
    var $active = $('#slideshow .active');
    var $next =  $active.next().length ? $active.next()
        : $('#slideshow .item:first');
    

    $active.addClass('last-active');
        
    $next.css({opacity: 0.0})
        .addClass('active')
        .animate({opacity: 1.0}, 1000, function() {
            $active.removeClass('active last-active');
        });
}

$(function() {
    setInterval( "slideSwitch()", 5000 );
});

//Hide the header divider
$('#header-divider').css('display', 'none');

</script>
 
    <div id="content" class="home-page">

		<?php /* Top post navigation */ ?>
		<?php global $wp_query; $total_pages = $wp_query->max_num_pages; if ( $total_pages > 1 ) { ?>

		<?php } ?>
		
		<?php /* The Loop — with comments! */ ?>
		
		<?php
		 $x = 0;
				 while ( have_posts() ) : the_post();
				 			$x++;
							$archive = FALSE;
							 $cats = explode( "\n", get_the_category_list("\n") );
							foreach($cats as $cat){
								if (strpos($cat,'Event Archive') !== false) {
								    $archive = TRUE;									
								}
							}
				
		if($x==2){ //After the sticky
			print('<h1>Upcoming Events</h1>');
		}
						
		?>
		<?php /* Create a div with a unique ID thanks to the_ID() and semantic classes with post_class() */ ?>
		                <div id="post-<?php the_ID(); ?>" <?php if($archive){ post_class('archive'); } else{ post_class(); }?>>
		<?php /* an h2 title */ ?>
		                    <h2 class="entry-title <?php if($archive){print('archive'); } ?>"><?php if($archive){print('<span class="archive-title">Past event </span>'); } ?><a href="<?php the_permalink(); ?>" title="<?php printf( __('Permalink to %s', 'hbd-theme'), the_title_attribute('echo=0') ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>

		<?php /* Microformatted, translatable post meta */ ?>
		                    <div class="entry-meta">
		                        <span class="meta-prep meta-prep-author"><?php _e('By ', 'hbd-theme'); ?></span>
		                        <span class="author vcard"><a class="url fn n" href="<?php echo get_author_link( false, $authordata->ID, $authordata->user_nicename ); ?>" title="<?php printf( __( 'View all posts by %s', 'hbd-theme' ), $authordata->display_name ); ?>"><?php the_author(); ?></a></span>
		                        <span class="meta-sep"> | </span>
		                        <span class="meta-prep meta-prep-entry-date"><?php _e('Published ', 'hbd-theme'); ?></span>
		                        <span class="entry-date"><abbr class="published" title="<?php the_time('Y-m-d\TH:i:sO') ?>"><?php the_time( get_option( 'date_format' ) ); ?></abbr></span>
		                        <?php edit_post_link( __( 'Edit', 'hbd-theme' ), "<span class=\"meta-sep\">|</span>\n\t\t\t\t\t\t<span class=\"edit-link\">", "</span>\n\t\t\t\t\t" ) ?>
		                    </div><!-- .entry-meta -->

		<?php /* The entry content */ ?>
		                    <div class="entry-content">
		<?php the_content( __( 'Continue reading <span class="meta-nav">&raquo;</span>', 'hbd-theme' )  ); ?>
		<?php wp_link_pages('before=<div class="page-link">' . __( 'Pages:', 'hbd-theme' ) . '&after=</div>') ?>
		                    </div><!-- .entry-content -->

		<?php /* Microformatted category and tag links along with a comments link */ ?>
		                    <div class="entry-utility">
		                        <span class="cat-links"><span class="entry-utility-prep entry-utility-prep-cat-links"><?php _e( 'Posted in ', 'hbd-theme' ); ?></span><?php echo get_the_category_list(', '); ?></span>
		                        <span class="meta-sep"> | </span>
		                        <?php the_tags( '<span class="tag-links"><span class="entry-utility-prep entry-utility-prep-tag-links">' . __('Tagged ', 'hbd-theme' ) . '</span>', ", ", "</span>\n\t\t\t\t\t\t<span class=\"meta-sep\">|</span>\n" ) ?>
		                        <span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'hbd-theme' ), __( '1 Comment', 'hbd-theme' ), __( '% Comments', 'hbd-theme' ) ) ?></span>
		                        <?php edit_post_link( __( 'Edit', 'hbd-theme' ), "<span class=\"meta-sep\">|</span>\n\t\t\t\t\t\t<span class=\"edit-link\">", "</span>\n\t\t\t\t\t\n" ) ?>
		                    </div><!-- #entry-utility -->
		                </div><!-- #post-<?php the_ID(); ?> -->

		<?php /* Close up the post div and then end the loop with endwhile */ ?>      

		<?php endwhile; ?>
		
		<?php /* Bottom post navigation */ ?>
		<?php global $wp_query; $total_pages = $wp_query->max_num_pages; if ( $total_pages > 1 ) { ?>
		                <div id="nav-below" class="navigation">
		                    <?php next_posts_link(__( '<span class="meta-nav">&laquo;</span> Older posts', 'hbd-theme' )) ?> <span style="color: #bbb;">&#8226;</span> <?php previous_posts_link(__( 'Newer posts <span class="meta-nav">&raquo;</span>', 'hbd-theme' )) ?>
		                </div><!-- #nav-below -->
		<?php } ?>
		
		<?php if ( get_post_custom_values('comments') ) comments_template() // Add a custom field with Name and Value of "comments" to enable comments on this page ?>
    </div><!-- #content -->

	<?php get_sidebar(); ?>
 
</div><!-- #container -->
 
<?php get_footer(); ?>