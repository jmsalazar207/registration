<!-- Other Information 1 -->
								<div class="tab-pane" id="other1">
									<form method = "POST" action = "save_other_info1.php" enctype="multipart/form-data">	
									<input type="hidden" name="empnoo1" class="form-control"  value = "">
									<div class="box box-primary">
										<div class="box-header with-border">									
											<h4 class="timeline-header"><a href="#">Other Information (Part 1)</a></h4>
										</div>
										<div class="box-body">
											<div class="form-group" style="width: 100%; float:left">
												<table  class="table table-bordered" id="tblSkills">
													<thead  >
														<th width = "32%">Special Skills and Hobbies</th>
														<th width = "32%">Non-Academic Distinctions / Recognition </th>
														<th width = "32%">Membership in Associtions / Organization</th>														
														<th width = "4%"></th>
													</thead>
													
													<tbody>	
													<tr>
																	
																	<td>
																		<input class="form-control" id="other_special_skills'.$withRow.'" name="other_special_skills[]" type="text" style="text-transform: uppercase;" value= "" >
																	</td>	
																	
																	<td>
																		<input class="form-control" id="other_non_academic'.$withRow.'" name="other_non_academic[]" type="text"  style="text-transform: uppercase;" value= "">
																	</td>
																	
																	<td>
																		<input class="form-control" id="other_membership'.$withRow.'" name="other_membership[]" type="text"  style="text-transform: uppercase;" value= "">
																	</td>																	

																		
																		<td><a href="#" class="AddOther1"><center><i class="fa fa-plus-square fa-fw"></i></center></a>
																				<a href="#" class="removeOther1"><center><i class="fa fa-minus-square fa-fw"></i></center></a>
																				
																	</td>
																		</tr>
														<tr>
															<td>
																<input class="form-control" id="other_special_skills0" name="other_special_skills[]" type="text" style="text-transform: uppercase;"  >
															</td>						

															<td>
																<input class="form-control" id="other_non_academic0" name="other_non_academic[]" type="text"  style="text-transform: uppercase;">
															</td>
															
															<td>
																<input class="form-control" id="other_membership0" name="other_membership[]" type="text"  style="text-transform: uppercase;" >
															</td>
															
															<td width='%' class='td-bold-text td-row-h'>
																<a href='#' class='AddOther1'><center><i class='fa fa-plus-square fa-fw'>  </center></i></a>
															</td>												
														</tr>
														
														<tr>
															
															<td width='%' class='td-bold-text td-row-h'>
																<input type='hidden' id='txtCountOther1' name='txtCountOther1' readonly='true' value=''/>
															</td>					
														</tr>
													</tbody>
												</table>
											</div>


										</div>
										<div class="box-footer">											
											<button type="submit" name="submit_info1" id="submit_info1" class="btn btn-primary pull-right">Save</button>
										</div>		
									</div>
									</form>
								</div>