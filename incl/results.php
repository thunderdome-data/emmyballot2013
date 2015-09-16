<?php
include('../config.php');
require_once '../Connection.class.php';
$connection = new Connection('featuresupdate','emmys');

// CLEAN USER INPUT
$nom_id = mysqli_real_escape_string($connection->con,$_GET['nom_id']);
$cat_id = mysqli_real_escape_string($connection->con,$_GET['cat_id']);

$data;

$sql = "UPDATE emmys_votes_2015
            SET	votes = votes + 1
            WHERE nom_id = '$nom_id' LIMIT 1";
$results = mysqli_query($connection->con,$sql);

$sql = "SELECT * FROM emmys_votes_2015
            where cat_id='$cat_id'
            order by votes desc";
$results = mysqli_query($connection->con,$sql);
while($data[]=mysqli_fetch_array($results));


$nomData;
if ( $data_source === 'csv' ):
    $nomDataAll = csv_to_array('../data/' . $current_year . '/nominees.csv');
    foreach ( $nomDataAll as $key => $value ):
        if ( intval($value['category']) == intval($_GET['cat_id']) ):
            $nomData[intval($value['nom_id'])] = $value;
        endif;
    endforeach;
else:
	$sql = "SELECT * FROM emmys13_nominees 
				where cat_id='$cat_id'
				order by votes desc";
	$results = mysqli_query($connection->con,$sql);
	while($nomData[]=mysqli_fetch_array($results));
endif;
	

$totalVotes = 0;
for ($i = 0; $i < count($data)-1; $i++):
    $totalVotes += $data[$i]['votes'];
endfor;

?>

			<div class="span4">
				<div class="closebtn">close [x]</div>
				<h4 id="resultCatName">User Poll Results: Best XXXXX</h4>
				<?php 
					for ($i = 0; $i < count($data)-1; $i++): 
                        $nom_id = intval($data[$i]['nom_id']);
						
						$barPerc = $data[$i]['votes'] * 400 / $totalVotes; ?>
						
					 	<div id="results_list">
							
							<div class="bwrap" id="nom<?php echo $nom_id; ?>"> 
								<strong><?php if ($nomData[$nom_id]['first_name'] != '') { echo $nomData[$nom_id]['first_name'] . ' ' . $nomData[$nom_id]['last_name']. ' '; }  ?> <?php echo $nomData[$nom_id]['movie'] ?></strong>
								<div class="bar">
									 <div class="color" title="<?php echo $barPerc ?>"></div>
								</div>
								<span><?php echo $data[$i]['votes'] ?> Votes</span>
						  </div> <!-- end wrap -->
								 
						</div>
									
					<?php endfor; ?>
			</div>

