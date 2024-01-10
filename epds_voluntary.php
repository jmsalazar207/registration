								<!-- Voluntary Work or Involvement -->
								<div class="tab-pane" id="voluntary">
									<form method = "POST" action = "save_voluntary_work.php" enctype="multipart/form-data">	
									<input type="hidden" name="empnoV" class="form-control"  value = "">
									<div class="box box-primary">
										<div class="box-header with-border">									
											<h4 class="timeline-header"><a href="#">Voluntary Work or Involvement</a></h4>
										</div>
										<div class="box-body">
											<div class="form-group" style="width: 100%; float:left">
												<table  class="table table-bordered" id="tblVoluntary">
													<thead  >
														<th width = "25%"  rowspan=2 >Name and Address of Organization</th>
														<th width = "30%"  colspan = 2>Inclusive Date</th>
														<th width = "15%">Number of Hours</th>
														<th width = "25%">Position / Nature of Work</th>									
														<th width = "5%"></th>
													</thead>
													
													<tbody>
														<tr>
															<td></td>	
															<td>From</td>
															<td>TO</td>
														</tr>
														
														
														<tr>
																
																		<td><input class="form-control" id="voluntary_name_and_address'.$withRow.'" name="voluntary_name_and_address[]" type="text" value= "" style="text-transform: uppercase;"></td>
																		
																		<td><input type= "date" class="form-control" id="voluntary_date_from'.$withRow.'" name="voluntary_date_from[]" value= ""></td>
																		
																		<td><input type= "date" class="form-control" id="voluntary_date_to'.$withRow.'" name="voluntary_date_to[]" type="text" value= ""></td>
																		
																		<td><input class="form-control" id="voluntary_no_of_hours'.$withRow.'" name="voluntary_no_of_hours[]" type="number" value= ""></td>
																		
																		<td><input class="form-control" id="voluntary_position'.$withRow.'" name="voluntary_position[]" type="text" value= "" style="text-transform: uppercase;"></td>
																		
																		<td><a href="#" class="AddVoluntary"><center><i class="fa fa-plus-square fa-fw"></i></center></a>
																				
																					<a href="#" class="removeVoluntary"><center><i class="fa fa-minus-square fa-fw"></i></center></a>
																				
																	</td>
																		</tr>		
															
														
														<tr>
															<td>
																<input class="form-control" id="voluntary_name_and_address0" name="voluntary_name_and_address[]" type="text" style="text-transform: uppercase;">
															</td>
															
															<td>
																<input type= "date" class="form-control" id="voluntary_date_from0" name="voluntary_date_from[]">
															</td>

															<td>
																<input type= "date" class="form-control" id="voluntary_date_to0" name="voluntary_date_to[]">
															</td>			
															
															<td>
																<input class="form-control" id="voluntary_no_of_hours0" name="voluntary_no_of_hours[]" type="number">
															</td>											
								
															<td>
																<input class="form-control" id="voluntary_position0" name="voluntary_position[]" type="text" style="text-transform: uppercase;">
															</td>	

															
															<td width='%' class='td-bold-text td-row-h'>
																<a href='#' class='AddVoluntary'><center><i class='fa fa-plus-square fa-fw'>  </center></i></a>
															</td>													
														</tr>
														
														<tr>
														
															<td width='%' class='td-bold-text td-row-h'>
																<input type='hidden' id='txtCountVoluntary' name='txtCountVoluntary' readonly='true' value=''/>
															</td>					
														</tr>
													</tbody>
												</table>
											</div>										
										</div>
										<div class="box-footer">											
											<button type="submit" name="submit_voluntary" id="submit_voluntary" class="btn btn-primary pull-right">Save</button>
										</div>	
									</div>
									</form>
								</div>