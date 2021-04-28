<?php

//custom excerpts
function get_excerpt( $content ) {
	$length = 40;
	$more = '...';
	$excerpt = strip_tags( trim( $content ) );
	$words = str_word_count( $excerpt, 2 );
	if ( count( $words ) > $length ) {
		$words = array_slice( $words, 0, $length, true );
		end( $words );
		$position = key( $words ) + strlen( current( $words ) );
		$excerpt = substr( $excerpt, 0, $position ) . $more;
	}
	return $excerpt;
}

//Shrink the excerpt
function custom_excerpt_length( $length ) {
        return 20;
    }
    add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );
?>