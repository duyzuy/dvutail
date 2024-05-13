<?php 





class NewPost extends WP_Widget {

	

	function __construct() {

		// Instantiate the parent object

		$widget_ops = array(

			'classname'	=>	'dv-new-post',

			'description'	=>	'Custom widget for display new post',

		);

		parent::__construct( 'dv_archive_post', 'DV - New Post', $widget_ops );

	}

	function form( $instance ) {

		

		// Output admin widget options form

		$title 	= (!empty($instance['title']) ? $instance['title'] : 'New Post');

		$number = (!empty($instance['number']) ? $instance['number'] : 4);

		

		

		$output = '<p>';

		$output .= '<label for="'.esc_attr($this->get_field_id('title')).'">Title</label>';

		$output .= '<input type="text" class="widefat" id="'.esc_attr($this->get_field_id('title')).'" name ="'.esc_attr($this->get_field_name('title')).'" value="'.esc_attr($title).'">';

		$output .= '</p>';

            

     	

		$output .= '<p>';

		$output .= '<label for="'.esc_attr($this->get_field_id('number')).'">Number post display</label>';

		$output .= '<input type="number" class="widefat" id="'.esc_attr($this->get_field_id('number')).'" name ="'.esc_attr($this->get_field_name('number')).'" value="'.esc_attr($number).'">';

		$output .= '</p>';

		

		echo $output;

	}

	function update( $new_instance, $old_instance ) {

		// Save widget options

		$instance =  $old_instance;

		$instance['title'] = (!empty($new_instance['title']) ? strip_tags($new_instance['title']) : '');

		$instance['number'] = (!empty($new_instance['number']) ? strip_tags($new_instance['number']) : 4);

		return $instance;

	}





	function widget( $args, $instance ) {

		// Widget output

		global $post;

		$number = absint( $instance['number'] );

	

			$post_args = array(

				'post_type'			=>	'post',

				'posts_per_page'		=>	$number,



			);

	

		echo $args['before_widget'];


			if(!empty($instance['title']) ):

				echo $args['before_title'].apply_filters( 'widget_title', $instance['title'] ). $args['after_title'];

			endif;

			$query = new WP_Query( $post_args );

			if($query -> have_posts()):

				echo '<ul id="new-post-'.rand(1,99).'" class="new-posts">';

				$output ='';

				while($query -> have_posts()): $query -> the_post();

					$link = get_the_permalink();

					$title = get_the_title();

					$excerpt = get_the_excerpt();

					if(has_post_thumbnail()){

						$url = get_the_post_thumbnail_url($post->ID, 'thumbnail');

					}

					else{

						$url = '';

					}



				$output .=	'<li class="item">';

				$output .=	'<a href="'.$link.'" title="'.$title.'"><img class="img-responsive" src="'.$url.'">';

				$output .=	'<h5 class="title">'.$title.'</h5>';
                $output  .= '<p class="date">' . get_the_date(get_option('date_fomat')) . '</p>';
				$output  .=	'</a></li>';

				endwhile;
                wp_reset_postdata();
				echo $output;

				echo '</ul>';

				

			else: 

				echo 'no post in found';

			endif;

		echo $args['after_widget'];



	}
	

}



function dv_new_post_widget() {

	register_widget( 'NewPost' );

}



add_action( 'widgets_init', 'dv_new_post_widget' );