<!-- Learning and Development -->
								<div class="tab-pane" id="learning">
									<form method = "POST" action = "save_learning_development.php" enctype="multipart/form-data">	
									<input type="hidden" name="empnoL" class="form-control"  value = "<?php echo $user['empno']; ?>">
									<div class="box box-primary">
										<div class="box-header with-border">									
											<h4 class="timeline-header"><a href="#">Learning and Development(L&D) Interventions/Training Attended</a></h4>
										</div>
										<div class="box-body">
											<div class="form-group" style="width: 100%; float:left">
												<table  class="table table-bordered" id="tblLearning">
													<thead  >
														<th width = "30%"  rowspan=2>Title of Learning and Development Interventions / Training Programs</th>
														<th width = "20%"  colspan = 2>Inclusive Date</th>
														<th width = "10%">Number of Hours</th>
														<th width = "10%">Type of LD</th>
														<th width = "25%">Conducted/Sponsored By</th>									
														<th width = "5%"></th>
													</thead>
													
													<tbody>
														<tr>
															<td></td>	
															<td>From</td>
															<td>TO</td>
														</tr>
														<tr>
																	
																	<td>
																		<input class="form-control" id="training_title'.$withRow.'" name="training_title[]" type="text"  style="text-transform: uppercase;" value= "">
																	</td>
																	
																	<td>
																		<input type= "date" class="form-control" id="training_date_from'.$withRow.'" name="training_date_from[]" value= "">
																	</td>
																	
																	<td>
																		<input type= "date" class="form-control" id="training_date_to'.$withRow.'" name="training_date_to[]" value= "">
																	</td>			
															
																	<td>
																		<input class="form-control" id="training_no_of_hours'.$withRow.'" name="training_no_of_hours[]" type="number" value= "">
																	</td>

																	<td>
																		<input class="form-control" id="training_type_of_ld'.$withRow.'" name="training_type_of_ld[]" type="text" style="text-transform: uppercase;" value= "">
																	</td>

																	<td>
																		<input class="form-control" id="training_conducted'.$withRow.'" name="training_conducted[]" type="text" style="text-transform: uppercase;" value= "">
																	</td>	
																		

																		
																		<td>
																			<a href="#" class="AddWork"><center><i class="fa fa-plus-square fa-fw"></i></center></a>
																				<a href="#" class="removeWork"><center><i class="fa fa-minus-square fa-fw"></i></center></a>
																				
																	</td>
																		</tr>		
															
														
														
														
														<tr>
															<td>
																<input class="form-control" id="training_title0" name="training_title[]" type="text"  style="text-transform: uppercase;">
															</td>
															
															<td>
																<input type= "date" class="form-control" id="training_date_from0" name="training_date_from[]">
															</td>

															<td>
																<input type= "date" class="form-control" id="training_date_to0" name="training_date_to[]">
															</td>			
															
															<td>
																<input class="form-control" id="training_no_of_hours0" name="training_no_of_hours[]" type="number">
															</td>											
								
															<td>
																<input class="form-control" id="training_type_of_ld0" name="training_type_of_ld[]" type="text" style="text-transform: uppercase;">
															</td>

															<td>
																<input class="form-control" id="training_conducted0" name="training_conducted[]" type="text" style="text-transform: uppercase;">
															</td>														

															
															<td width='%' class='td-bold-text td-row-h'>
																<a href='#' class='AddLearning'><center><i class='fa fa-plus-square fa-fw'>  </center></i></a>
															</td>													
														</tr>
														
														<tr>
															
															<td width='%' class='td-bold-text td-row-h'>
																<input type='text' id='txtCountLearning' name='txtCountLearning' readonly='true' value=''/>
															</td>					
														</tr>
													</tbody>
												</table>
											</div>										
										</div>
										<div class="box-footer">											
											<button type="submit" name="submit_learning" id="submit_learning" class="btn btn-primary pull-right">Save</button>
										</div>	
									</div>
									</form>
								</div>