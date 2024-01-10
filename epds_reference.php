								<!-- References -->
								<div class="tab-pane" id="references">
									<form method = "POST" action = "save_references.php" enctype="multipart/form-data">	
									<input type="hidden" name="empnoR" class="form-control"  value = "<?php echo $user['empno']; ?>">
									<div class="box box-primary">
										<div class="box-header with-border">									
											<h4 class="timeline-header"><a href="#">References</a></h4>
										</div>
										<div class="box-body">
											<div class="form-group" style="width: 100%; float:left">
												<table  class="table table-bordered" id="tblSkills">
													<thead>
														<th width="40%">Name</th>
														<th width="40%">Address</th>
														<th width="20%">Telephone No.</th>												
													</thead>
													<tbody>
														<tr>
															<td><input class="form-control" id="reference_name1" name="reference_name1" type="text" value="" style="text-transform: uppercase;"></td>
															<td><input class="form-control" id="reference_address1" name="reference_address1" type="text" value="" style="text-transform: uppercase;"></td>
															<td><input class="form-control" id="reference_telephone1" name="reference_telephone1" type="text" value="" style="text-transform: uppercase;"></td>
														</tr>
														<tr>
															<td><input class="form-control" id="reference_name2" name="reference_name2" type="text" value="" style="text-transform: uppercase;"></td>
															<td><input class="form-control" id="reference_address2" name="reference_address2" type="text" value="" style="text-transform: uppercase;"></td>
															<td><input class="form-control" id="reference_telephone2" name="reference_telephone2" type="text" value="" style="text-transform: uppercase;"></td>
														</tr>
														<tr>
															<td><input class="form-control" id="reference_name3" name="reference_name3" type="text" value="" style="text-transform: uppercase;"></td>
															<td><input class="form-control" id="reference_address3" name="reference_address3" type="text" value="" style="text-transform: uppercase;"></td>
															<td><input class="form-control" id="reference_telephone3" name="reference_telephone3" type="text" value="" style="text-transform: uppercase;"></td>
														</tr>
													</tbody>
												</table>
											</div>														
										</div>											
									</div>

									<div class="box box-primary">
										<div class="box-body">
											<div class="form-group" style="width: 100%; float:left">
												<table  class="table table-bordered" id="tblSkills">
													<thead>
														<th width="30%">Goverment Issued ID</th>
														<th width="30%">ID/License/Passport No.</th>
														<th width="40%">Date/Place of Issuance</th>												
													</thead>
													<tbody>
														<tr>
															<td><input class="form-control" id="government_issued_id" name="government_issued_id" type="text" value="" style="text-transform: uppercase;"></td>
															<td><input class="form-control" id="id_no" name="id_no" type="text" value="" style="text-transform: uppercase;"></td>
															<td><input class="form-control" id="issuance" name="issuance" type="text" value="" style="text-transform: uppercase;"></td>
														</tr>												
													</tbody>
												</table>
											</div>			
										</div>
										<div class="box-footer">
											
							
											<a href="#print_preview" data-toggle="modal" class="btn btn-success btn-sm "> Print Preview</a>
											
											<button type="submit" name="submit_references" id="submit_references" class="btn btn-primary pull-right"> Save</button>
								
											
										</div>
										
									</div>
									</form>
								</div>