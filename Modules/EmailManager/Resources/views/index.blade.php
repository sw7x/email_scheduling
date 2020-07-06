<!-- 
@extends('emailmanager::layouts.master')

@section('content')
    <h1>Hello World</h1>

    <p>
        This view is loaded from module: {!! config('emailmanager.name') !!}
    </p>
@stop -->


@include('header')

@include('sidebar')


		
		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<section class="content-header">
				<h1>Email manager</h1>
				
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
							<h3>Step 01 - Download Pre-formatted Excel file </h3>
							<p>columns - Id, Name, Number, email address</p>
							<br>
							<a class="download-link" href="{{ URL::to('/') }}/pre-formatted-excel-sheet.xlsx" download="">
								<img src="{{ URL::to('/') }}/dist/img/excel.png" class="" alt="">
							</a>
						</div>
				</section>

				


				<section class="content container-fluid">
					<div class="row">
						<div class="col-md-10">
							<h3>Step 02 -  Excel file upload </h3>
							<p>upload the filled excel file and it will be saved</p>
							<br>

							<form class="email-manager-form">							
								<div class="form-group">
									<label for="batch_name" class="control-label">Batch Name</label> 
									<input id="batch_name" name="batch_name" placeholder="Type batch name" type="text" class="form-control">
								</div>
								<div class="form-group">
									<label for="text2" class="control-label">Attachments</label>

									<div class="input-group">
										<label class="input-group-btn">
											<span class="btn btn-primary">
												Browse&hellip; <input type="file" style="display: none;" accept=".xls, .xlsx">
											</span>
										</label>
										<input type="text" class="form-control" readonly>
									</div>
									<span class="help-block">Try selecting one file</span>
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