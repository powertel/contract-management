<?php
$this->load->view('common/sidebar');
?>
<div class="col-md-10">


  			<div class="content-box-large">
  				<div class="panel-heading">
					<div class="panel-title"><h3>Contracts</h3></div>
				</div>
  				<div class="panel-body">
  						<?php
						 if(isset($success)):

			  					?>
			  					<div class="alert alert-success"><?php echo $success; ?></div>
			  					

			  					<?php 
			  						endif
			  						?>


  					<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
						<thead>
							<tr>
								<th>Organisation</th>
								<th>Effective Date</th>
								<th>Expiry Date</th>
								<th>Contract Name</th>
								<th>Status</th>
								<th>Action</th>
							</tr>
						</thead>
						<?php
						 foreach ($contracts as $contract):
						 	?>
						 	<tr>
								<td><?php echo $contract['organisation_name']; ?></td>
								<td><?php echo $contract['effective_date']; ?></td>
								<td><?php echo $contract['end_date']; ?></td>
								<td><?php echo $contract['contract_name']; ?></td>
								<td>
									<span style="background-color: <?php echo $contract['status_color']; ?> ; padding:2px 2px;color:#fff;border-radius: 3px"><?php echo $contract['status']; ?></span>

								</td>
								<td><a href="<?php echo site_url('contract/edit/'.$contract['id']);?>">View & Edit</a>

									

								</td>
							</tr>
							<?php
						endforeach ?>
						<tbody>
							
						</tbody>
					</table>
  				</div>
  			</div>

</div>