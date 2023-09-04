<?php
$this->load->view('common/sidebar');
?>
<div class="col-md-10">

	<div class="col-md-6">
	  					<div class="content-box-large">
			  				<div class="panel-heading">
					            <div class="panel-title"><h3><?php echo $title;?></h3></div>
					          

					        </div>
			  				<div class="panel-body">

	
			  					<div class="text-danger"><?php echo validation_errors(); ?></div>


			  					<?php
			  					if(isset($success)):

			  					?>
			  					<div class="alert alert-success"><?php echo $success; ?></div>
			  					

			  					<?php 
			  						endif
?>
			  					<!--<form class="form-horizontal" role="form">-->
			  						<?php 

			  						$attributes = array(
			  							'class' =>'form-horizontal' ,
			  							'role'  =>'role'
			  							 );
			  						echo form_open('status/save/'.$status_item['statusid'],$attributes);
			  						?>
			  					<div class="form-group">
								    <label for="status" class="col-sm-2 control-label">Status<span class="text-danger">*</span></label>
								    <div class="col-sm-10">
								      <input type="text" value="<?php echo $status_item['status'] ?>" class="form-control input-sm" id="status" placeholder="Status Name" name="status" value="<?php echo $status_item['status']?>" >
								    </div>
								  </div>

								  <div class="form-group">
								    <label for="status_color" class="col-sm-2 control-label">Status Colour<span class="text-danger">*</span></label>
								    <div class="col-sm-10">
								      <input type="text" value="<?php echo $status_item['status_color'] ?>" class="form-control input-sm" id="status_color" placeholder="Status Colour" name="status_color">
								    </div>
								  </div>

								  
								  <div class="form-group">
								    <div class="col-sm-offset-2 col-sm-10">
								      <button type="submit" class="btn btn-primary">Edit Status</button>
								    </div>
								  </div>
								</form>
			  				</div>
			  			</div>
	  				</div>

</div>

