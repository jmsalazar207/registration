<!-- Other Information 2 -->
								<div class="tab-pane" id="other2">
									
									<form method = "POST" action = "save_other_info2.php" enctype="multipart/form-data">	
									<input type="hidden" name="empnoo2" class="form-control"  value = "<?php echo $user['empno']; ?>">
									<!-- Question No. 1 -->
									<div class="box box-primary">
										<div class="box-header with-border">									
											<h4 class="timeline-header"><a href="#">Other Information (Part 2)</a></h4>
										</div>
										<div class="box-body">
											<div class="form-group" style="width: 100%; float:left">
												<div class="row" style="padding-top: 8px">
													<div class="col-md-8">
														<label>Are you related by consanguinity or affinity to the appointing or recommending authority, or to the chief of bureau or office or to the person who has immediate supervision over you in the Office, Bureau or Department where you will be apppointed</label>								
													</div>										
													<div class="col-md-4">												
													</div>
												</div>
											</div>
									
											<div class="form-group" style="width: 100%; float:left">
												<div class="row" style="padding-top: 8px">
													<div class="col-md-8">
														<label>a. within the third degree?:</label>								
													</div>										
													<div class="col-md-2">
														<input type="radio" class="flat" name="other_Q1A" id="other_Q1A_Yes" value="1">
														<label> &nbsp YES</label>
													</div>
													<div class="col-md-2">
														<input type="radio" class="flat" name="other_Q1A" id="other_Q1A_No" value="0">
														
														<label> &nbsp NO</label>
													</div>
												</div>
											</div>
									
											<div class="form-group" style="width: 100%; float:left">
												<div class="row" style="padding-top: 8px">
													<div class="col-md-8">
														<label>b. within the fourth degree (for Local Government Unit - Career Employees)?</label>								
													</div>										
													<div class="col-md-2">
														<input type="radio" class="flat" name="other_Q1B" id="other_Q1B_Yes" value="1" >
														<label> &nbsp YES</label>
													</div>
													<div class="col-md-2">
														<input type="radio" class="flat" name="other_Q1B" id="other_Q1_No" value="0">
														<label> &nbsp NO</label>									
													</div>											
												</div>
											</div>
											
											<div class="form-group" style="width: 100%; float:left">
												<div class="row" style="padding-top: 8px">
													<div class="col-md-8">												
													</div>										
													<div class="col-md-4">
														<label>If YES, give details:</label>												
														<textarea class="form-control" name="other_Q1B_Details" style="text-transform: uppercase;" wrap="soft"></textarea>
													</div>											
												</div>
											</div>			
										</div>		
									</div>									
									
									<!-- Question No. 2-->
									<div class="box box-primary">
										<div class="box-body">										
											<div class="form-group" style="width: 100%; float:left">
												<div class="row" style="padding-top: 8px">
													<div class="col-md-8">
														<label>a. Have you ever been found guilty of any administrative offense? </label>								
													</div>										
													<div class="col-md-2">
														<input type="radio" class="flat" name="other_Q2A" id="other_Q2A_Yes" value="1">
														<label> &nbsp YES</label>
													</div>
													<div class="col-md-2">
														<input type="radio" class="flat" name="other_Q2A" id="other_Q2B_No" value="0">
														<label> &nbsp NO</label>
													</div>
												</div>
											</div>
											
											<div class="form-group" style="width: 100%; float:left">
												<div class="row" style="padding-top: 8px">
													<div class="col-md-8">												
													</div>										
													<div class="col-md-4">
														<label>If YES, give details:</label>
														<textarea class="form-control" name="other_Q2A_Details" style="text-transform: uppercase;" wrap="soft"></textarea>
													</div>											
												</div>
											</div>
									
											<div class="form-group" style="width: 100%; float:left">
												<div class="row" style="padding-top: 8px">
													<div class="col-md-8">
														<label>b. Have you been criminally charged before any court?</label>								
													</div>										
													<div class="col-md-2">
														<input type="radio" class="flat" name="other_Q2B" id="other_Q2B_Yes" value="1">
														<label> &nbsp YES</label>
													</div>
													<div class="col-md-2">
														<input type="radio" class="flat" name="other_Q2B" id="other_Q2B_No" value="0">
														
														<label> &nbsp No</label>									
													</div>											
												</div>
											</div>
									
											<div class="form-group" style="width: 100%; float:left">
												<div class="row" style="padding-top: 8px">
													<div class="col-md-8">												
													</div>										
													<div class="col-md-4">
														<label>If YES, give details:</label>												
													</div>																
												</div>
											</div>
											<div class="form-group" style="width: 100%; float:left">
												<div class="row" style="padding-top: 8px">
													<div class="col-md-9">												
													</div>										
													<div class="col-md-1">
														<label>Date Filed:</label>												
													</div>
													<div class="col-md-2">
														<input class="form-control" id="other_Q2B_DateFiled" name="other_Q2B_DateFiled" type="date" value= "" >
													</div>	
												</div>
											</div>
											<div class="form-group" style="width: 100%; float:left">
												<div class="row" style="padding-top: 8px">
													<div class="col-md-9">												
													</div>										
													<div class="col-md-1">
														<label>Status of Case:</label>												
													</div>
													<div class="col-md-2">
														<input class="form-control" id="other_Q2B_StatusofCase" name="other_Q2B_StatusofCase" type="text" value= "" style="text-transform: uppercase;">
													</div>	
												</div>
											</div>	
											
											
										</div>									
									</div>
									
									<!-- Question No. 3 -->
									<div class="box box-primary">
										<div class="box-body">
											<div class="form-group" style="width: 100%; float:left">
												<div class="row" style="padding-top: 8px">
													<div class="col-md-8">
														<label> Have you ever been convicted of any crime or violation of any law, decree, ordinance or regulation by any court or tribunal?</label>								
													</div>										
													<div class="col-md-2">
														<input type="radio" class="flat" name="other_Q3A" id="other_Q3A_Yes" value="1">
														
														<label> &nbsp YES</label>
													</div>
													<div class="col-md-2">
														<input type="radio" class="flat" name="other_Q3A" id="other_Q3A_No" value="0">
														
														<label> &nbsp NO</label>									
													</div>											
												</div>
											</div>
									
											<div class="form-group" style="width: 100%; float:left">
												<div class="row" style="padding-top: 8px">
													<div class="col-md-8">												
													</div>										
													<div class="col-md-4">
														<label>If YES, give details:</label>
														<textarea class="form-control" name="other_Q3A_Details" style="text-transform: uppercase;" wrap="soft"></textarea>
													</div>											
												</div>
											</div>
										</div>
									</div>
									<!-- Question No. 4 -->
									<div class="box box-primary">
										<div class="box-body">
											<div class="form-group" style="width: 100%; float:left">
												<div class="row" style="padding-top: 8px">
													<div class="col-md-8">
														<label> Have you ever been separated from the service in any of the following modes: resignation, retirement, dropped from the rolls, dismissal, termination, end of term, finished contract or phased out (abolition) in the public or private sector? </label>								
													</div>										
													<div class="col-md-2">
														<input type="radio" class="flat" name="other_Q4A" id="other_Q4A_Yes" value="1">
														
														<label> &nbsp YES</label>
													</div>
													<div class="col-md-2">
														<input type="radio" class="flat" name="other_Q4A" id="other_Q4A_No" value="0">
														
														<label> &nbsp NO</label>									
													</div>											
												</div>
											</div>
									
											<div class="form-group" style="width: 100%; float:left">
												<div class="row" style="padding-top: 8px">
													<div class="col-md-8">												
													</div>										
													<div class="col-md-4">
														<label>If YES, give details:</label>
														<textarea class="form-control" name="other_Q4A_Details" style="text-transform: uppercase;" wrap="soft"></textarea>
													</div>											
												</div>
											</div>	
										</div>
									</div>
									
									<!-- Question No. 5 -->
									<div class="box box-primary">
										<div class="box-body">
											<div class="form-group" style="width: 100%; float:left">
												<div class="row" style="padding-top: 8px">
													<div class="col-md-8">
														<label>a. Have you ever been a candidate in a national or local election held within the last year (except Barangay election)? </label>								
													</div>										
													<div class="col-md-2">
														<input type="radio" class="flat" name="other_Q5A" id="other_Q5A_Yes" value="1">
														
														<label> &nbsp YES</label>
													</div>
													<div class="col-md-2">
														<input type="radio" class="flat" name="other_Q5A" id="other_Q5A_No" value="0">
														
														<label> &nbsp NO</label>
													</div>
												</div>
											</div>
											
											<div class="form-group" style="width: 100%; float:left">
												<div class="row" style="padding-top: 8px">
													<div class="col-md-8">												
													</div>										
													<div class="col-md-4">
														<label>If YES, give details:</label>
														<textarea class="form-control" name="other_Q5A_Details" style="text-transform: uppercase;" wrap="soft"></textarea>
													</div>											
												</div>
											</div>
									
											<div class="form-group" style="width: 100%; float:left">
												<div class="row" style="padding-top: 8px">
													<div class="col-md-8">
														<label>b. Have you resigned from the goverment service during the three (3)-month period before the last election to promote/actively campaign for a national or local candidate? </label>								
													</div>										
													<div class="col-md-2">
														<input type="radio" class="flat" name="other_Q5B" id="other_Q5B_Yes" value="1">
														
														<label> &nbsp YES</label>
													</div>
													<div class="col-md-2">
														<input type="radio" class="flat" name="other_Q5B" id="other_Q5B_No" value="0">
														
														<label> &nbsp NO</label>									
													</div>											
												</div>
											</div>
											
											<div class="form-group" style="width: 100%; float:left">
												<div class="row" style="padding-top: 8px">
													<div class="col-md-8">												
													</div>										
													<div class="col-md-4">
														<label>If YES, give details:</label>
														<textarea class="form-control" name="other_Q5B_Details" style="text-transform: uppercase;" wrap="soft"></textarea>
													</div>											
												</div>
											</div>					
										</div>
									</div>
									
									<!-- Question No. 6 -->
									<div class="box box-primary">
										<div class="box-body">
											<div class="form-group" style="width: 100%; float:left">
												<div class="row" style="padding-top: 8px">
													<div class="col-md-8">
														<label> Have you acquired the status of an immigrant or permanent resident of another country?</label>								
													</div>										
													<div class="col-md-2">
														<input type="radio" class="flat" name="other_Q6A" id="other_Q6A_Yes" value="1">
														
														<label> &nbsp YES</label>
													</div>
													<div class="col-md-2">
														<input type="radio" class="flat" name="other_Q6A" id="other_Q6A_No" value="0">
														
														<label> &nbsp NO</label>									
													</div>											
												</div>
											</div>
									
											<div class="form-group" style="width: 100%; float:left">
												<div class="row" style="padding-top: 8px">
													<div class="col-md-8">												
													</div>										
													<div class="col-md-4">
														<label>If YES, give details(country):</label>
														<textarea class="form-control" name="other_Q6A_Details" style="text-transform: uppercase;" wrap="soft"></textarea>
													</div>											
												</div>
											</div>	
										
										</div>
									</div>
									
									<!-- Question No. 7 -->
									<div class="box box-primary">
										<div class="box-body">
																			
											<div class="form-group" style="width: 100%; float:left">
												<div class="row" style="padding-top: 8px">
													<div class="col-md-8">
														<label>Pursuant to: (a) Indigenous People's Act (RA 8371); (b) Magna Carta for Disabled Persons (RA 7277); and (c) Solo Parents Welfare Act of 2000 (RA 8972), please answer the following items:</label>								
													</div>										
													<div class="col-md-4">												
													</div>
												</div>
											</div>
										
											<div class="form-group" style="width: 100%; float:left">
												<div class="row" style="padding-top: 8px">
													<div class="col-md-8">
														<label>a. Are you a member of any indigenous group? </label>								
													</div>										
													<div class="col-md-2">
														<input type="radio" class="flat" name="other_Q7A" id="other_Q7A_Yes" value="1">
														
														<label> &nbsp YES</label>
													</div>
													<div class="col-md-2">
														<input type="radio" class="flat" name="other_Q7A" id="other_Q7A_No" value="0">
														
														<label> &nbsp NO</label>
													</div>
												</div>
											</div>
										
											<div class="form-group" style="width: 100%; float:left">
												<div class="row" style="padding-top: 8px">
													<div class="col-md-8">												
													</div>										
													<div class="col-md-4">
														<label>If YES, give details:</label>
														<textarea class="form-control" name="other_Q7A_Details" style="text-transform: uppercase;" wrap="soft"></textarea>
													</div>											
												</div>
											</div>	
										
											<div class="form-group" style="width: 100%; float:left">
												<div class="row" style="padding-top: 8px">
													<div class="col-md-8">
														<label>b. Are you differently abled? </label>								
													</div>										
													<div class="col-md-2">
														<input type="radio" class="flat" name="other_Q7B" id="other_Q7B_Yes" value="1">
														
														<label> &nbsp YES</label>
													</div>
													<div class="col-md-2">
														<input type="radio" class="flat" name="other_Q7B" id="other_Q7B_No" value="0">
														
														<label> &nbsp No</label>									
													</div>											
												</div>
											</div>
										
											<div class="form-group" style="width: 100%; float:left">
												<div class="row" style="padding-top: 8px">
													<div class="col-md-8">												
													</div>										
													<div class="col-md-4">
														<label>If YES, give details:</label>
														<textarea class="form-control" name="other_Q7B_Details" style="text-transform: uppercase;" wrap="soft"></textarea>
													</div>											
												</div>
											</div>

											<div class="form-group" style="width: 100%; float:left">
												<div class="row" style="padding-top: 8px">
													<div class="col-md-8">
														<label>c. Are you a solo parent? </label>								
													</div>										
													<div class="col-md-2">
														<input type="radio" class="flat" name="other_Q7C" id="other_Q7C_Yes" value="1">
														
														<label> &nbsp YES</label>
													</div>
													<div class="col-md-2">
														<input type="radio" class="flat" name="other_Q7C" id="other_Q7C_No" value="0">
														
														<label> &nbsp NO</label>									
													</div>											
												</div>
											</div>
											
											<div class="form-group" style="width: 100%; float:left">
												<div class="row" style="padding-top: 8px">
													<div class="col-md-8">												
													</div>										
													<div class="col-md-4">
														<label>If YES, give details:</label>
														<textarea class="form-control" name="other_Q7C_Details" style="text-transform: uppercase;" wrap="soft"></textarea>
													</div>											
												</div>
											</div>										
										</div>
										
										<div class="box-footer">
											<button type="submit" name="submit_info2" id="submit_info2" class="btn btn-primary pull-right">Save</button>
										</div>	
										
									</div>
									
									
								
									
									</form>
								</div>