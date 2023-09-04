<?php
$this->load->view('common/sidebar');
?>
<div class="col-md-6">


  			<div class="content-box-large">
  				<div class="panel-heading">
					<div class="panel-title"><h3>Statuses</h3></div>
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
								<th>Status</th>
								
								<th>Action</th>
							</tr>
						</thead>
						<?php
						 foreach ($statuses as $status):
						 	?>
						 	<tr>
								<td><?php echo $status['status']; ?></td>
								
								<td>
									<a href="<?php echo site_url('status/edit/'.$status['statusid']);?>">Edit</a> | <a href="<?php echo site_url('status/delete/'.$status['statusid']);?>">Delete</a>
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