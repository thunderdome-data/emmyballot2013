<?php
include('../config.php');

$cat_id = intval($_GET['cat_id']);
$data;

if ( $data_source === 'csv' ):
    $catData;
    $catDataAll = csv_to_array('../data/' . $current_year . '/categories.csv');
    $nomData = csv_to_array('../data/' . $current_year . '/nominees.csv');

    // Build the nominee data
    foreach ( $nomData as $key => $value ):
        if ( intval ( $value['category'] ) == $cat_id ):
            $data[] = $value;
        endif;
    endforeach;
    $catData[] = $catDataAll[$cat_id - 1];
else:
	require_once 'Connection.class.php';
	$connection = new Connection('featuresupdate','features');
	$cat_id = mysqli_real_escape_string($connection->con,$cat_id);
	$catData;


	$sql = "SELECT * FROM emmys13_nominees where cat_id=$cat_id";
	$results = mysqli_query($connection->con,$sql);
	while($data[]=mysqli_fetch_array($results));
	
	$sql = "SELECT * FROM emmys13_categories where cat_id=$cat_id";
	$results = mysqli_query($connection->con,$sql);
	while($catData[]=mysqli_fetch_array($results));
    $cat_id = 0;

// Tabulate the total votes for the category for the nominees
$totalVotes = 0;

	for ($i = 0; $i < count($data)-1; $i++) {
		
		$totalVotes += $data[$i]['votes'];
	
	}

$winPerc;
endif;

?>
   <h2>NOMINEES FOR: Best <?php echo $catData[0]['category'] ?></h2>
   <p class="crit"><?php echo $catData[0]['description'] ?></p>
    <?php if ( trim($catData[0]['lastwinner']) != '' ): ?>
   <p class="crit">Last year's winner: <?php echo $catData[0]['lastwinner'] ?></p>
    <?php endif; ?>
	<ul class="endscreen_thumb">
		
		<?php 
			
			for ($i = 0; $i < count($data)-1; $i++) { 
				
				if ($data[$i]['votes'] == 0) {
					$winPerc = 0;
				} else {
					$winPerc = round(($data[$i]['votes'] * 100) / $totalVotes);
				}
				
				?>
			
				<li id="nom<?php echo $data[$i]['nom_id'] ?>">
				<a href="javascript: void(0);" alt="" class="nomSelect" rel="popover" data-content="<?php echo $data[$i]['blurb'] ?>" data-original-title='<?php 
				if ($data[$i]["first_name"] != '') { echo $data[$i]["first_name"] . ' ' . $data[$i]["last_name"]; } else {  echo $data[$i]["movie"]; } ?>'><img src="img/<?php echo $current_year . '/' . $data[$i]['image'] ?>" /></a><p class="end_thumb"><?php if ($data[$i]['first_name'] != '') { echo $data[$i]['first_name'] . ' ' . $data[$i]['last_name']. '<br /><span class="movieName">'.$data[$i]['movie'].'</span>'; } else { echo $data[$i]['movie']; } ?></p>
				<!--THIS IS FOR WHEN VOTING ENDS-->
                <!--
                    <p class="votePerc"><span class="percent"><?php echo $winPerc ?>%</span><br />of users' votes</p>
                -->
				<!--THIS IS FOR WHEN VOTING HAPPENS AND IT SHOULD BE CONFIGURABLE-->
				<a class="vote_btn btn btn-small" id="<?php echo $data[$i]['nom_id'] ?>" href="javascript:void(0);">VOTE</a>  <!--a class="readmore" href="<?php echo $data[$i]['story_links'] ?>" target="new" >Read more</a-->
				</li>
			
		<?php } ?>

	</ul>

<script>
$(function () { 
	$(".nomSelect").popover({trigger:'hover', placement: 'bottom', html: true });
});
</script>


	

