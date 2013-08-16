<?php
/**
 * Template Name: Media Tags Template
 * Description: pulls in media tags loops
 *
 * @package WordPress
 * @subpackage planningpress
 */

get_header(); ?>

		<div id="primary">
			<div id="content">

				<?php the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> role="article">
					<header class="entry-header">
						<h1 class="entry-title"><?php the_title(); ?></h1>
					</header><!-- .entry-header -->

					<div class="entry-content clearfix">
						<?php the_content(); ?>
						<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'bikeshare' ), 'after' => '</div>' ) ); ?>
						<?php edit_post_link( __( 'Edit', 'bikeshare' ), '<span class="edit-link">', '</span>' ); ?>
					</div><!-- .entry-content -->
				</article><!-- #post-<?php the_ID(); ?> -->

				<?php if ( pprss_is_plugin_active('media-tags/media_tags.php') ) {
    
				$tfp_media_tags = get_mediatags(); 
//print_r($tfp_media_tags);
        if ($tfp_media_tags) {
          ?><ul id="media-tags-menu" class="clearfix"><?php
  				foreach($tfp_media_tags as $tag) { 
            $tag_items = get_attachments_by_media_tags('media_tags=' . $tag->slug);
            if ($tag_items) {
              ?><li><a href="#<?php echo $tag->slug; ?>"><?php echo $tag->name; ?></a></li> <?php
            }
          }
          
          $wehavevideos = term_exists('video', 'pprss_page_tag');
          if ($wehavevideos !== 0 && $wehavevideos !== null) { ?>
            <li><a href="#videos">Videos</a></li> 
            <?php }

          ?></ul><?php
  				foreach($tfp_media_tags as $tag) { 
            $tag_items = get_attachments_by_media_tags('media_tags=' . $tag->slug);
            if ($tag_items) {
              ?><div id="<?php echo $tag->slug; ?>" class="hentry media-tag">
    				  <?php /* <h2 class="media-tag-name"><a href="<?php echo $tag->slug; ?>"><?php echo $tag->name; ?></a></h2> */ ?>
    				  <h4 class="media-tag-name"><?php echo $tag->name; ?></h4>
    				  <p class="media-tag-description"><?php echo $tag->description; ?></p>
              <ul class="media-tag-items"><?php
              sort($tag_items);
    		  		foreach($tag_items as $item) {
//print_r($item);
                $item_mime_type = $item->post_mime_type;
                $item_class = str_replace('/',' ',$item_mime_type);
                $item_class = str_replace('+','-',$item_class);
                $the_item_mime_type = str_replace('application/','',$item_mime_type);
                $the_item_mime_type = str_replace('image/','',$the_item_mime_type);
                $the_item_mime_type = str_replace('vnd.ms-','',$the_item_mime_type);
                ?>
                <li class="<?php echo $item_class; ?>">
                  <a class="download-link" href="<?php echo $item->guid; ?>"><span class="post-title"><?php echo $item->post_title; ?></span> <span class="mime-type">(<?php echo $the_item_mime_type; ?>)</span></a>
                  <p class="media-tag-item-description"><?php echo $item->post_content; ?></p>
                </li>
                <?php
      				}
              ?></ul><?php
              ?></div><?php
            }
          }
        }

        } ?>





        <?php
        $wehavevideos = term_exists('video', 'pprss_page_tag');
        if ($wehavevideos !== 0 && $wehavevideos !== null) { ?>
          <div id="videos" class="hentry media-tag">
            <h4 class="media-tag-name">Videos</h4>
      			<p class="media-tag-description"><?php echo $tag->description; ?></p>
            <ul class="media-tag-items">
              <?php
              $args = array(
              	 'posts_per_page' => -1,
              	 'post_type' => 'page',
              	 'pprss_page_tag' => 'video',
              	 'post_status' => 'publish'
              );
              $video_posts = get_posts( $args );

              foreach ( $video_posts as $post ) : setup_postdata( $post ); ?>
                <li class="video">
                  <a class="download-link" href="<?php the_permalink(); ?>"><span class="post-title"><?php the_title(); ?></span> <span class="mime-type">(Video)</span></a>
                  <div class="media-tag-item-description"><?php the_excerpt(); ?></div>
                </li>
              <?php 
              endforeach; 
              wp_reset_postdata(); 
              ?>
            </ul>
          </div>
          <?php } ?>





			</div><!-- #content -->
		</div><!-- #primary -->

<?php get_footer(); ?>