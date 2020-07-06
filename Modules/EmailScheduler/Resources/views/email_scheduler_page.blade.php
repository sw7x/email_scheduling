@include('header')

@include('sidebar')

		
		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<section class="content-header">
				<h1>Email scheduler</h1>
				

				
				
				<!-- 
				<ol class="breadcrumb">
					<li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
					<li class="active">Here</li>
				</ol>
				-->		

				<!-- Main content -->
				<section class="content container-fluid">
					<div class="row">
						<div class="col-md-10">
							<h3>Email scheduler form</h3><br>
							<form class="email-scheduler-form" action="emailscheduler/submit" encType="multipart/form-data" autocomplete="off">
								@csrf
								<input type="hidden" id="user_id" name="user_id" value="{{ Auth::id()}}">
								<div class="form-group">
									<label class="control-label" for="email_alias">Email alias</label> 
									<input required id="email_alias" name="email_alias" placeholder="Marketing email" type="email" class="form-control">
								</div>
								<div class="form-group">
									<label for="email_subject" class="control-label">Email Subject</label> 
									<input required id="email_subject" name="email_subject" placeholder="Hooray! This is the email subject" type="text" class="form-control">
								</div>
								<div class="form-group">
									<label for="textarea" class="control-label">Email Body</label> 
									<div id="editor"></div>
									<div class="editor-contents"></div>
								</div>

								<div class="form-group">
									<label for="text2" class="control-label">Attachments</label>

									<div class="input-group">
										<label class="input-group-btn">
											<span class="btn btn-primary">
												Browse&hellip; <input id="attachments" type="file" style="display: none;" multiple>
											</span>
										</label>
										<input type="text" class="form-control" readonly>
									</div>
									<span class="help-block">
										Try selecting one or more files
									</span>
								</div>

								<div class="form-group">
									<label for="text3" class="control-label">Send Date</label> 
									<input required id="send_date" name="send_date_datepicker" type="text" class="form-control send-date-datepicker">
								</div>

								<div class="form-group">
									<label for="select" class="control-label">Select Email Batches</label> 
									
									<select required id="email-batches" name="batches[]" class="select2 email-batches select form-control" multiple="multiple">
										@foreach($batchData as $batchValueArr)
											<option value="{{$batchValueArr['bid']}}">{{$batchValueArr['bname']}}</option>
										@endforeach
									</select> 


									<span id="selectHelpBlock" class="help-block">can select multiple batches in here</span>
								</div> 

								<div class="form-group">
									<button name="Submit" type="submit" class="btn btn-primary">Submit</button>
									<button name="Cancel" type="reset" class="btn btn-danger">Cancel</button>
								</div>
							</form>
						</div>
					</div>
				</section>


			</section>
			<!-- /.content -->		
		</div>
		<!-- /.content-wrapper -->


@include('footer')