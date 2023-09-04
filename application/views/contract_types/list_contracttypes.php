<?php
$this->load->view('common/sidebar');
?>
<div class="col-md-6">


  			<div class="content-box-large">
  				<div class="panel-heading">
					<div class="panel-title"><h3>Contract Types</h3></div>
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
								<th>Type</th>
								
								<th>Action</th>
							</tr>
						</thead>
						<?php
						 foreach ($ctypes as $type):
						 	?>
						 	<tr>
								<td><?php echo $type['type']; ?></td>
								
								<td><a href="<?php echo site_url('contracttype/edit/'.$type['contracttypeid']);?>">Edit</a> |

									<a href="<?php echo site_url('contracttype/delete/'.$type['contracttypeid']);?>">Delete</a>
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