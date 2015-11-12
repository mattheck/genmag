<?php 
                    $terms = get_the_terms($post->ID, 'ing_category' );
                    if ($terms && ! is_wp_error($terms)) :
                      $term_slugs_arr = array();
                      foreach ($terms as $term) {
                        $term_slugs_arr[] = $term->slug;
                      }
                      $terms_slug_str = join( " ", $term_slugs_arr);
                    endif;
                    echo $terms_slug_str;
?>