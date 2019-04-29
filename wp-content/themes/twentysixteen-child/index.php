<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header(); ?>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			
		<?php
			$stuff_request = 'https://api.untappd.com/v4/search/beer?client_id=3B699F2A6042F01F5F198865B533DAE74E4498EF&client_secret=6A750CCE8AC023F996133E376E3B58EC5478BCD5&q=spruce beer';


			$stuff_response = wp_remote_get( $stuff_request);
			
			if( is_array($stuff_response ) ) {

				$response = wp_remote_retrieve_body( $stuff_response );
				$data = json_decode($response, true);
			
				foreach( $data["response"]["beers"]["items"] as $item){
					if ($item["beer"]["beer_name"]== "Spruce Beer"){
						$id = $item["beer"]["bid"];
						break;
					}
				}
			}

			$beer_data = 'https://api.untappd.com/v4/beer/info/'.$id.'?client_id=3B699F2A6042F01F5F198865B533DAE74E4498EF&client_secret=6A750CCE8AC023F996133E376E3B58EC5478BCD5&bid=110569';
			$spruce_data = wp_remote_get( $beer_data);
			if( is_array($spruce_data) ) {

				$spruce_body = wp_remote_retrieve_body( $spruce_data );
				$data2 = json_decode($spruce_body, true);
				$counter = 0;
				$beer_label = $data2["response"]["beer"]["beer_label"];
				$beer_date = $data2["response"]["beer"]["created_at"];
				$beer_name = $data2["response"]["beer"]["beer_name"];
				$brewery_name = $data2["response"]["beer"]["brewery"]["brewery_name"];
				$brewery_label = $data2["response"]["beer"]["brewery"]["brewery_label"];
				$beer_style = $data2["response"]["beer"]["beer_style"];
				$beer_abv = $data2["response"]["beer"]["beer_abv"];
				$beer_ibu = $data2["response"]["beer"]["beer_ibu"];
				$beer_rate = $data2["response"]["beer"]["rating_score"];
				$beer_rate_count = $data2["response"]["beer"]["rating_count"];
				$beer_description = $data2["response"]["beer"]["beer_description"];

		?>
			<div class="box">
				<div class="beer_label" style="display:inline; float:left;">
					<?php 
						echo '<img class="beer_logo" height="100px" src="'.$beer_label.'">';
					?>
				</div>
				<div class="beer_info" style="display:inline-block">
					<div class="site-title" style="display:block"><?php echo $beer_name ?> &nbsp;
						<?php 
							echo str_repeat('<i class="material-icons" style="color:#ffb503e6">star</i> ',intval($beer_rate));
							echo is_float($beer_rate) ? '<i class="material-icons" style="color:#ffb503e6">star_half</i>&nbsp;':"";
						?>
					</div>
					<div class="site-description" style="display:block"><?php echo $beer_style ?></div>
					<div class="site-description" style="display:block">
						<div class="details" style="display:inline-block;">				
							<p class="abv" style="padding-left:0px;"><?php echo $beer_abv ?> ABV</p>
							<p class="ibu"><?php echo $beer_ibu ?> IBU</p>
							<p class="raters"><?php echo $beer_rate_count ?> Ratings </p>
							<p class="date">Added <?php echo date('m/d/Y',strtotime($beer_date)) ?></p>
						</div>
					</div>
				</div><!-- .beer_info -->
				<div class="brewery_info" style="display:inline; float:right;">
					<div class="site-description" style="display:block"><?php echo $brewery_name ?></div>
					<?php echo '<img class="brewery_logo" height="100px" src="'.$brewery_label.'" style="float:right;">'; ?>
				</div><!-- .brewery_info -->
			<div class="site-description"><?php echo $beer_description ?></div>
			</div><!-- .box -->

		<div class="box">
			<h3> Images </h3>
		<?php
			foreach ($data2["response"]["beer"]["checkins"]["items"] as $item) {
				foreach ($item["media"]["items"] as $value) {
					echo '
						<div class="images" style="display:inline;">
							<img class="beer_photo" src="'.$value["photo"]["photo_img_md"].'" height="100px" width="100px" style="padding: 5px 5px 5px 0px;">
						</div>';
				}
			}
		?>
		</div><!-- .box -->
		<div class="box">
			<h3> Reviews </h3>
		<?php
			foreach ($data2["response"]["beer"]["checkins"]["items"] as $item) {
				$fname = $item["user"]["first_name"];
				$lname = $item["user"]["last_name"];
				$comment = $item["checkin_comment"];
				$avatar = $item["user"]["user_avatar"];
				$date = $item["created_at"];
				$rate = $item["rating_score"];
		?>
				<div class="review" style="display:block; border-bottom: solid 1px thistle; padding-bottom:10px;">
					<div class="user_logo" style="display:inline; float:left;">
						<?php echo '<img class="user_pic" src="'.$avatar.'" height="30px" width="30px" style="border-radius:15px; padding-top: 5px;">';?>
					</div>
					<div class="review_details" style="display:inline-block">
						<div class="site-title" style="display:block; font-size:1.60rem;">&nbsp;<?php echo $fname.'' .$lname ?>&nbsp;
							<div class="site-description" style="display:inline-block; padding-bottom: 5px;">
							<?php
								echo str_repeat('<i class="material-icons" style="color:#ffb503e6">star</i> ',
									intval($rate));
								echo is_float($rate) ? '<i class="material-icons" style="color:#ffb503e6">star_half</i>&nbsp;':"";
							?>
							</div>
							<div class="site-description" style="display:inline-block">
								<?php echo date('m/d/Y',strtotime($date))?>
							</div>
						</div>
						<?php 
							if( !empty($comment) ){ 
						?>
								<div class="site-description" style="display:inline-block; padding-bottom: 5px;">
								<?php 
									echo $comment 
								?>
								</div>	
						<?php 
							}
						?>
						
					</div>
				</div><!-- .review -->
			<?php
					$counter++;
					if ( $counter == 10 ){
						break;
					}
	 			} 
			}
			?>
		</div><!-- .box -->
		</main><!-- .site-main -->
	</div><!-- .content-area -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
