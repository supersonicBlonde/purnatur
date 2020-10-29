<?php

/*
	
@package purnatur
	
	========================
		THEME SUPPORT
	========================
*/



add_theme_support('post-thumbnails');

//menu options
function quanta_register_nav_menu() {
	register_nav_menu( 'primary-left' , 'This is the Main Top Menu Left Side' );
	register_nav_menu( 'primary-right' , 'This is the Main Top Menu Right Side' );
}

add_action( 'after_setup_theme', 'quanta_register_nav_menu');


/*
========================
		BLOG LOOP CUSTOM FUNCTIONS
	========================
*/
function quanta_posted_meta() {

	$posted_on = human_time_diff( get_the_time('U'), current_time( 'timestamp') ) . 'ago';

	$categories = get_the_category();
	$separator = ',';
	$output = '';
	$i = 1;

	if(!empty($categories)):
		foreach ($categories as $cat) {
			
			if($i > 1 ): $output .= $separator; endif;

			$output .= '<a href="'. esc_url(get_category_link( $cat->term_id ) ).'" alt="'.esc_attr('View all posts in %s', $cat->name  ).'">'.esc_html($cat->name).'</a>';
			$i++;
		}
	endif;

	return '<span class="posted-on">Posted <a href="'. esc_url(get_the_permalink() ).'">'.$posted_on.'</a></span> / <span class="posted-in">'. $output .'</span>';
}

function quanta_posted_footer() {
	$comments_num = get_comments_number();
	if(comments_open()) {
		if($comments_num == 0) {
			$comments = __('No comments');
		}
		elseif($comments_num > 1) {
			$comments = $comments_num. __(' Comments');
		}
		else {
			$comments = __('1 Comment');	
		}
		$comments = '<a class="comments-link" href="'. get_comments_link() .'">'.$comments.'<span class="np-icons np-comment"></span></a>';
	} else {
		$comments = 'Comments are closed';
	}

	return '<div class="post-footer-container"><div class="row"><div class="col-xs-12 col-sm-6">'. get_the_tag_list( '<div class="tags-list"><span class="np-icons quanta-tag"></span>', '', '</div>') .'</div><div class="col-xs-12 col-sm-6 text-right">'. $comments .'</div></div></div>';
}


function quanta_get_attachment( $num = 1 ) {

	$output = '';

	if (has_post_thumbnail() && $num == 1 ): 
			
		$output = wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()));

	 else: 

		$attachments = get_posts( array(
			'post_type'   		=> 'attachment',
			'posts_per_page'	=> $num,
			'post_parent'		=> get_the_ID()
		));


		if($attachments && $num == 1):
		
			foreach($attachments as $attachment):
				$output = wp_get_attachment_url( $attachment->ID );
			endforeach;

		elseif($attachments && $num > 1):

			$output = $attachments;
		
		endif;

		wp_reset_postdata();

	 endif;

	return $output;
}


function quanta_embed_media($type = array()) {
		$content = do_shortcode( apply_filters ('the_content' , get_the_content()));

		$embed = get_media_embedded_in_content( $content, array('audio' , 'iframe') );

		if( in_array('audio' , $type) ):
			$output = str_replace( '?visual=true' , '?visual=false' , $embed[0]);
		else:
			$output = $embed[0];
		endif;

		return $output;
}



function quanta_grab_url() {
	if( ! preg_match( '/<a\s[^>]*?href=[\'"](.+?)[\'"]/i', get_the_content(), $links ) ){
		return false;
	}
	return esc_url_raw( $links[1] );
}


function quanta_get_current_url() {
	$http = isset($_SERVER['HTTPS'])?'https://':'http://';
	$referer = $http . $_SERVER['HTTP_HOST'];
	return  $referer.$_SERVER['REQUEST_URI']; 
}