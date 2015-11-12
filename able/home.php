<?php get_header(); ?>

	<div id="primary" class="site-content">

		<div id="content" role="main">

			<article style="background-color: rgba(0,0,0,0); padding: 0; margin: 0; border-radius: 0; box-shadow: none;" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

				<div class="entry-content">

					<div class="homepageBOX">

						<div class="homepageBOX01">

							<?php putRevSlider("home") ?>

</div>

							<div style="text-align:center;margin-top:12px;"><a href="http://www.genmag.com/measure-blood-pressure-at-home/"><img style="width: 50%;" src="http://www.genmag.com/wp-content/uploads/2015/09/banner-1.jpg"/></a><a href="#"><img style="width: 50%;" src="http://www.genmag.com/wp-content/uploads/2015/09/banner-2.jpg" /></a></div>

							
						</div>

<?php

$args = array();

$color = array();

$color = array(

'1' => 'red',

'2' => 'azul',

'3' => 'green',

'4' => 'gray'

);

$args = array(

	'type'                     => 'post',

	'child_of'                 => 0,

	'parent'                   => 0,

	'orderby'                  => 'id',

	'order'                    => 'ASC',

	'hide_empty'               => 0,

	'hierarchical'             => 1,

	'exclude'                  => '',

	'include'                  => array(181,182,183,184,185),

	'number'                   => '',

	'taxonomy'                 => 'category',

	'pad_counts'               => false 

); 

$categories = get_categories($args);

//var_dump($categories);

$html_form = '';

if($categories)

{

	$html_titulo = '';

	$html_titulo .= '';

	foreach($categories as $cat)

	{

		if ($cat->category_parent == 0)

		{

			$html_titulo .= '<span class="titulo"> <input type="checkbox" name="catpadre" class="padre'.$cat->term_id.'" id="padre'.$cat->term_id.'" value="'.$cat->term_id.'" style="padding-right: 5px"/> '.$cat->name.'</span> ';

		}

	}

	

}

?>

			<div class="cardio-content-box homepageBOX0102">

				<div class="box_left" id="c_a">
				<h3 class="advanced-title">Advanced Search Filter</h3>
				<span><?php echo $html_titulo;?></span>
				<div id="c_b" class="filtros">

				<?php

				$categories = get_categories($args);

				$html_form = '';



				if($categories)

				{

					$xx = 0;

					foreach($categories as $cat)

					{

						

						//var_dump($cat);

						//1er nivel



						if ($cat->category_parent == 0)

						{

							$xx++;

							

							$html_form .= '<div class="box_category'.$xx.'">';

							//$html_form .= '<span class="category"><h4>'.$cat->name.'</h4></span>';

							

							$subargs = array(

							'type'                     => 'post',

							'child_of'                 => 0,

							'parent'                   => $cat->term_id,

							'orderby'                  => 'id',

							'order'                    => 'ASC',

							'hide_empty'               => 0,

							'hierarchical'             => 1,

							'taxonomy'                 => 'category',

							'pad_counts'               => false 

							); 

							$subategories = get_categories($subargs);

							$xx = 0;

							//$array_cat =  array();

							if($subategories)

							{

								//2do nivel

								

								foreach($subategories as $category)

								{

									//var_dump($category);

									//$array_cat[] = $category->term_id;

									$xx++;

									if ($category->category_parent == $cat->term_id)

									{

										

										$id_padre = $cat->term_id;

										

										$html_form .= '<div class="subbox_category">';

										$html_form .= '<span class="title_sub fondo'.$category->slug.'">'.$category->name.' </span>';

										

										$subargs2 = array(

										'type'                     => 'post',

										'child_of'                 => 0,

										'parent'                   => $category->term_id,

										'orderby'                  => 'id',

										'order'                    => 'ASC',

										'hide_empty'               => 0,

										'hierarchical'             => 1,

										'taxonomy'                 => 'category',

										'pad_counts'               => false

										);

										$subsubcategories = get_categories($subargs2);

										//$array_cat =  array();

										if($subsubcategories)

										{

											//3er nivel

											foreach($subsubcategories as $scat)

											{

												//var_dump($category);

												//$array_cat[] = $category->term_id;

												if ($scat->category_parent == $category->term_id)

												{

													$html_form .= '<input id="cat" data-padre="'.$id_padre.'" type="checkbox" value="'.$scat->term_id.'" name="categoria"> <small class="small-style">'.$scat->name.'</small> ';

													

												}

												

											}

												

										}

										

										$html_form .= '</div>';

									

									}

									

								}

									

							}	

							$html_form .= '</div>';

						}

						

					}

						

				}

				echo $html_form;

				?>

			</div>
			
			<h3 class="filtered_articles, home-h3">Filtered<span class="filtered_articles_two"> Articles</span></h3>
     			
			<div id="content_category">

			<?php

			$args = array();

			$args = array(

    				'post_type' => 'post',

    				'posts_per_page' => 9,

				'post_status'	=> 'publish',

				'tax_query' => array(

						//'relation' => 'AND',

							array(

							'taxonomy' => 'category',

							'field'    => 'id',

							'terms'    =>  array(181,182,183,184,185),

							'operator' => 'IN',

							),

						),

				//'category__in' => array(114,115)

    			);

    	$articulos = get_posts($args);

    	if($articulos)

  		{

  		$mm = 0;

  		foreach($articulos as $post)

  		{

  			$mm++;

        setup_postdata($post);

        $terms_noticias = wp_get_post_terms( $post->ID, 'category' );

        //var_dump($terms_noticias);

        //Ejes temáticos

        $html_terms = '';

        $xx = 0;

        if($terms_noticias)

        {

          foreach($terms_noticias as $term_single)

          {

            $xx++;

            if($xx > 1)

            {

                    break;

            }

            

            //$html_terms .= '<a href="'.get_term_link($term_single->slug, 'seccion').'">'.$term_single->name.'</a>';

            $html_terms .= $term_single->name;

            $color = get_option("cat_color".$term_single->term_id);

            

          }

        }

        //var_dump($color);

        if ( has_post_thumbnail($post->ID) ) 

        {

        $large_image_url = '';

        $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large' );

        $large_image_url = $large_image_url[0] ?  $large_image_url[0] : '';

        }

        else

        {

        	$large_image_url = 'http://genmag.com/wp-content/uploads/2015/09/genmag-favico.png';

        }

        //var_dump($large_image_url);

  			if($mm == 1)

  			{

  				echo '<div class="homepageBOX03">';

  			}

  			?>

		

				<div class="contentProxy cP0<?php echo $mm;?> outer" style="position: relative; background-image: url(<?php echo $large_image_url;?>) !important">

					<div class="inner innerbox">

						<div class="texto" style="background-color: <?php echo $color;?>"><a href="<?php the_permalink();?>"><?php the_title();?></a></div>

					</div>

					<a href="<?php the_permalink();?>"><div class="boxlink">

					</div></a>

				</div>

				

			

			<?php

        	if($mm == 3)

        	{

        		echo '</div>';

        		$mm = 0;

        	}

			}

			?>

			</div>
			</div>

			<?php

		}

		?>

			

		
		<div class="yt"><h3 class="yt-feed">YOUTUBE FEED</h3><?php putRevSlider("yt") ?></div>
		</div>
	
	</div>
	
</article><!-- #post-## -->

</div><!-- #content -->

</div><!-- #primary .site-content -->

<script type='text/javascript' src='https://code.jquery.com/jquery-1.11.1.min.js'></script>

<script type="text/javascript">

var base_url = "<?php bloginfo('template_directory'); ?>/";

function getidscheckbox1() {         

 var allVals = [];

 $('#c_a :checked').each(function() {

   allVals.push($(this).val());

 });

 if(allVals.length>0)

 {

 	return allVals;

	 }

}

function getidscheckbox2() {         

 var allVals = [];

 $('#c_b :checked').each(function() {

   allVals.push($(this).val());

 });

 if(allVals.length>0)

 {

 	return allVals;

	 }

}

$(document).ready(function() {

	$('#loading').hide();

	$("#c_a").click(function(){

		var id_cat = '';

		var id_cat = getidscheckbox1();

		get_contenido(id_cat);

		

	});

	$("#tag-depace").click(function(){

		$("#content_category").html("Loading...");

		$.ajax(

		      {

		      type: "POST",

		      data: {tag: 'depace'},

		      url: base_url+"processb.php",

		      dataType: "json",

		      }

    ).done(function(d){

      //console.log(d);

      var tbody = "";

      var x = 0;

      //console.log(d);

      //return false;

      if(d.length>0){

				for(var item in d){

					x++;

					//console.log(x);

					if(x == 1)

					{

						tbody += "<div class='homepageBOX03'>";

					}

				

					tbody += "<div class='contentProxy cP0"+x+" outer' style='position: relative; background-image: url("+d[item].images+") !important'>";

          tbody += "<div class='inner innerbox'><div class='texto' style='background-color: "+d[item].color+"'><a href='"+d[item].permalink+"'>"+d[item].post_title+"</div></div><a href='"+d[item].permalink+"'><div class='boxlink'></div></a></div>";

          			

          			if(x ==3)

					{

						tbody += "</div>";

						x = 0;

					}

          

        }

    	}else{

    		tbody += 'There are no results.';

    	}

    	

      $("#content_category").html(tbody);

    });

  //return false;

		

	});

	$("#c_b").click(function(){

		var id_cat = '';

		var id_cat = getidscheckbox2();

		get_contenido(id_cat);

		

	});

});		

	

function get_contenido(id_cat){

$("#content_category").html("Loading...");

$.ajax(

      {

      type: "POST",

      data: {cod_cat: id_cat},

      url: base_url+"process.php",

      dataType: "json",

      }

    ).done(function(d){

      //console.log(d);

      var tbody = "";

      var x = 0;

      //console.log(d);

      //return false;

      if(d.length>0){

				for(var item in d){

					x++;

					//console.log(x);

					if(x == 1)

					{

						tbody += "<div class='homepageBOX03'>";

					}

				

					tbody += "<div class='contentProxy cP0"+x+" outer' style='position: relative; background-image: url("+d[item].images+") !important'>";

          tbody += "<div class='inner innerbox'><div class='texto' style='background-color: "+d[item].color+"'><a href='"+d[item].permalink+"'>"+d[item].post_title+"</div></div><a href='"+d[item].permalink+"'><div class='boxlink'></div></a></div>";

          			

          			if(x ==3)

					{

						tbody += "</div>";

						x = 0;

					}

          

        }

    	}else{

    		tbody += 'There are no results.';

    	}

    	

      $("#content_category").html(tbody);

    });

  return false;

}

</script>

<?php get_sidebar(); ?>

<?php get_footer(); ?>