<?php
$this->load->view('common/sidebar');
?>

<div class="col-md-10 content-box-large" >
	<!--<div class="col-md-12">

	<div class="col-md-3">
  			<div class="content-box-large">
  				<i class="icon-dashboard icon-large"></i>
  				New Contract
  			</div>

	</div>
	<div class="col-md-3">
  			<div class="content-box-large">
  				New Status
  			</div>

	</div>
	<div class="col-md-3">
  			<div class="content-box-large">
  				New Contract Type
  			</div>

	</div>
	<div class="col-md-3">
  			<div class="content-box-large">
  				
  			</div>

	</div>
	</div>-->



<div class="col-md-12">


	<div class="col-md-4">
						<div class="panel panel-default">
  		<div class="panel-heading"><h5>Recently Created</h5></div>
  		<div class="panel-body"> 
  			<table class="table table-striped">
				              <thead>
				                <tr>
				                  <th>#</th>
				                  <th>Organisation</th>
				                  <th>Title</th>
				                  <th>Type</th>
				                </tr>
				              </thead>
				              <tbody>
				              	<?php
				              	$i=1;
				              //	var_dump($recent_contracts);exit;
				              	foreach ($recent_contracts as $recent) {
				              		
				             
				              	?>

				                <tr>
				                  <td><?php echo $i++ ?></td>
				                  <td><?php echo $recent->organisation_name ?></td>
				                  <td><?php echo $recent->contract_name ?></td>
				                  <td><?php echo $recent->type ?></td>
				                </tr>
				                <?php
				            }
				                ?>
				              </tbody>
				            </table>

  		</div>
		</div>

	</div>
	<div class="col-md-4">
		<div class="panel panel-default">
  		<div class="panel-heading"><h5>Recently Renewed Contracts</h5></div>
  		<div class="panel-body"> 
  			<table class="table table-striped">
				              <thead>
				                <tr>
				                  <th>#</th>
				                  <th>Organisation</th>
				                  <th>Title</th>
				                  <th>Type</th>
				                </tr>
				              </thead>
				              <tbody>
				                <?php
				              	$i=1;
				              //	var_dump($recent_contracts);exit;
				              	foreach ($recently_rcontracts as $renewed) {
				              		
				             
				              	?>

				                <tr>
				                  <td><?php echo $i++ ?></td>
				                  <td><?php echo $renewed->organisation_name ?></td>
				                  <td><?php echo $renewed->contract_name ?></td>
				                  <td><?php echo $renewed->type ?></td>
				                </tr>
				                <?php
				            }
				                ?>
				              </tbody>
				            </table>

  		</div>
		</div>
		
	</div>
	<div class="col-md-4">
		
					<div class="panel panel-default">
  		<div class="panel-heading"><h5>Recently Expired Contracts</h5></div>
  		<div class="panel-body"> 
  			<table class="table table-striped">
				              <thead>
				                <tr>
				                  <th>#</th>
				                  <th>Organisation</th>
				                  <th>Title</th>
				                  <th>Date</th>
				                </tr>
				              </thead>
				              <tbody>
				                <?php
				              	$i=1;
				              //	var_dump($recent_contracts);exit;
				              	foreach ($recently_econtracts as $expired) {
				              		
				             
				              	?>

				                <tr>
				                  <td><?php echo $i++ ?></td>
				                  <td><?php echo $expired->organisation_name ?></td>
				                  <td><?php echo $expired->contract_name ?></td>
				                  <td><?php echo $expired->end_date ?></td>
				                </tr>
				                <?php
				            }
				                ?>
				              </tbody>
				            </table>

  		</div>
		</div>
		
	</div>
</div>


</div>