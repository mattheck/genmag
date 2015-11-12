//add actions and filters plugin from iamcardio/genmag

add_filter( 'publicize_checkbox_default', '__return_false');

// Check if we are on mobile
function jetpackme_is_mobile() {
 
    // Are Jetpack Mobile functions available?
    if ( ! function_exists( 'jetpack_is_mobile' ) )
        return false;
 
    // Is Mobile theme showing?
    if ( isset( $_COOKIE['akm_mobile'] ) && $_COOKIE['akm_mobile'] == 'false' )
        return false;
  
    return jetpack_is_mobile();
}
 
// Let's add the post author's Gravatar image, but only if we're on a mobile device
function jetpackme_maybe_add_filter() {
 
    // On mobile, and on the home page?
    if ( jetpackme_is_mobile() && is_home() ) {
        add_filter( 'the_content', 'jetpackme_author_image' );
    }
}
add_action( 'wp_head', 'jetpackme_maybe_add_filter' );
 
// Build the function
function jetpackme_author_image( $content ) {
 
    global $post;
    $avatar = get_avatar( $post->post_author );
 
    return $avatar . $content;
}