<?php
$this->load->view('common/sidebar');
?>
<div class="col-md-10 content-box-large">
	<h2>Reports</h2>

	<div class="col-md-12">

		<form class="form-inline">
  
		<!--<input type="text" class="form-control mb-2 mr-sm-2 mb-sm-0" id="inlineFormInput" placeholder="What are you looking for?">-->

  
						 <div class="form-group">
											
											<div class="col-sm-10">
												<select class="form-control input-sm" name="contract_type">
													<option>Select Contract Type</option>
													<?php 
														foreach ($contract_types as $contract_type):
															?>
														<option value="<?php echo $contract_type['contracttypeid'];?>"><?php echo $contract_type['type'];?></option>
													<?php
												endforeach
												?>
												</select>
											</div>
							</div>
							<div class="form-group">
											
											<div class="col-sm-10">
												<select class="form-control input-sm" name="contract_type">
													<option>Select Status</option>
													<?php 
														foreach ($statuses as $status):
															?>
														<option value="<?php echo $status['statusid'];?>"><?php echo $status['status'];?></option>
													<?php
												endforeach
												?>
												</select>
											</div>
							</div>

 						<div class="form-group">
								    <label for="effective_date" class="col-sm-2 control-label">Start Date<span class="text-danger">*</span></label>
								    <div class="col-sm-10">
								      <input type="date" class="form-control input-sm" id="effective_date" placeholder="Effective Date" name="effective_date" value="">
								    </div>
								  </div>

							<div class="form-group">
								    <label for="end_date" class="col-sm-2 control-label">End Date<span class="text-danger">*</span></label>
								    <div class="col-sm-10">
								      <input type="date" class="form-control input-sm" id="end_date" placeholder="Expiry Date" name="end_date" value="">
								    </div>
								  </div>

  <button type="submit" class="btn btn-primary">Execute</button>
</form>

	</div>

	</div>