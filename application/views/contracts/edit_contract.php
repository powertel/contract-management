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
			  						echo form_open_multipart('contract/save/'.$contract_item['contracttypeid'],$attributes);
			  						?>
			  					<div class="form-group">
								    <label for="contract_name" class="col-sm-2 control-label">Contract Name<span class="text-danger">*</span></label>
								    <div class="col-sm-10">
								      <input type="text" class="form-control input-sm" id="contract_name" placeholder="Contract Name" name="contract_name" value="<?php echo $contract_item['contract_name']?>">
								    </div>
								  </div>
								  <div class="form-group">
											<label class="control-label col-sm-2">Contract Type</label>
											<div class="col-sm-10">
												<select class="form-control input-sm" name="contract_type">
													<option>Select Contract Type</option>
													<?php 
														foreach ($contract_types as $contract_type):
															?>
														<option <?php if($contract_type['contracttypeid'] ==$contract_item['contract_type_id']){ echo 'selected="selected"';}  ?>value="<?php echo $contract_type['contracttypeid'];?>"><?php echo $contract_type['type'];?></option>
													<?php
												endforeach
												?>
												</select>
											</div>
									</div>

									<div class="form-group">
											<label class="control-label col-sm-2">Status</label>
											<div class="col-sm-10">
												<select class="form-control input-sm" name="status">
													<option>Select Status</option>
													<?php 
														foreach ($statuses as $status):
															?>
														<option <?php if($status['statusid'] ==$contract_item['status_id']){ echo 'selected="selected"';}  ?>value="<?php echo $status['statusid'];?>"><?php echo $status['status'];?></option>
													<?php
												endforeach
												?>
												</select>
											</div>
									</div>

										<!--<div class="form-group">
											<label class="control-label col-sm-2">Contract Type</label>
											<div class="col-sm-10">
												<select class="form-control input-sm" name="contract_type">
													<option>Select Contract Type</option>
													<?php 
													//	foreach ($contract_types as $contract_type):
															?>
														<option <?php /*if($contract_type['id'] ==$contract_item['contract_type_id']){ echo 'selected="selected"';}  ?>value="<?php echo $contract_type['id'];?>"><?php echo $contract_type['type'];*/?></option>
													<?php
											//	endforeach
												?>
												</select>
											</div>
									</div>-->

						<div class="form-group">
								    <label for="effective_date" class="col-sm-2 control-label">Effective Date<span class="text-danger">*</span></label>
								    <div class="col-sm-10">
								      <input type="date" class="form-control input-sm" id="effective_date" placeholder="Effective Date" name="effective_date" value="<?php echo $contract_item['effective_date']?>">
								    </div>
								  </div>

							<div class="form-group">
								    <label for="end_date" class="col-sm-2 control-label">Expiry Date<span class="text-danger">*</span></label>
								    <div class="col-sm-10">
								      <input type="date" class="form-control input-sm" id="end_date" placeholder="Expiry Date" name="end_date" value="<?php echo $contract_item['end_date']?>">
								    </div>
								  </div>

			  					<div class="form-group">
								    <label for="organisation" class="col-sm-2 control-label">Organisation<span class="text-danger">*</span></label>
								    <div class="col-sm-10">
								      <input type="text" class="form-control input-sm" id="organisation" placeholder="Organisation" name="organisation" value="<?php echo $contract_item['organisation_name']?>">
								    </div>
								  </div>

								  <div class="form-group">
								    <label for="contact_person" class="col-sm-2 control-label">Contact Person<span class="text-danger">*</span></label>
								    <div class="col-sm-10">
								      <input type="text" class="form-control input-sm" id="contact_person" placeholder="Contact Person" name="contact_person" value="<?php echo $contract_item['contact_person']?>">
								    </div>
								  </div>

								  <div class="form-group">
								    <label for="phone" class="col-sm-2 control-label">Phone Number<span class="text-danger">*</span></label>
								    <div class="col-sm-10">
								      <input type="text" class="form-control input-sm" id="phone" placeholder="Phone" name="phone" value="<?php echo $contract_item['phone']?>">
								    </div>
								  </div>

								 <div class="form-group">
								    <label for="address" class="col-sm-2 control-label">Organisation Address</label>
								    <div class="col-sm-10">
								      <textarea class="form-control input-sm" placeholder="Address" rows="3" name="address"><?php echo $contract_item['org_address']?></textarea>
								    </div>
								  </div>

								  <div class="form-group">
											<label class="col-md-2 control-label">Attach Contract Document</label>
											<div class="col-md-10">
												<input type="file" class="btn btn-default" id="exampleInputFile1" name="contract_file">
												<p class="help-block">
													only pdf type are allowed.
												</p>
												<span><a href="<?php echo $this->config->item('base_url').$contract_item['file']?>"><?php
												 $filename= explode("/",$contract_item['file']);
												 	echo $filename[2];
												 ?></a></span>
											</div>
										</div>

								  
								  <div class="form-group">
								    <div class="col-sm-offset-2 col-sm-10">
								      <button type="submit" class="btn btn-primary">Edit Contract</button>
								    </div>
								  </div>
								</form>
			  				</div>
			  			</div>
	  				</div>

</div>

