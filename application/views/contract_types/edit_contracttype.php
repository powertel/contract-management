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
			  						echo form_open_multipart('contracttype/save',$attributes);
			  						?>
			  					<div class="form-group">
								    <label for="contract_type" class="col-sm-2 control-label">Contract Type<span class="text-danger">*</span></label>
								    <div class="col-sm-10">
								      <input type="text" class="form-control input-sm" id="contract_type" placeholder="Contract Type" name="contract_type" value="<?php echo $contract_item_type['type']?>" >
								    </div>
								  </div>


								  
								  <div class="form-group">
								    <div class="col-sm-offset-2 col-sm-10">
								      <button type="submit" class="btn btn-primary">Edit</button>
								    </div>
								  </div>
								</form>
			  				</div>
			  			</div>
	  				</div>

</div>

