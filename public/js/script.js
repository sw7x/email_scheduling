

// initializing datepicker
$('.send-date-datepicker').datepicker({
    format:'yyyy/mm/dd',
    startDate: '+0d',
    autoclose: true
}).datepicker("setDate",'now');



// initializing batch select dropdown
$(document).ready(function() {
    $('.email-batches').select2();
});



// initializing quill wisywig editor	
if($('#editor').length >0){	
	var quillEmailBody = new Quill('#editor', {
		modules: {
			toolbar: 
				[
					[{'font': []}],              
					[{'size': [] }], 
					[ 'bold', 'italic', 'underline', 'strike' ],
					[{ 'color': [] }, { 'background': [] }], 
					[{ 'script': 'super' }, { 'script': 'sub' }], 
					[{ 'header': '1' }, { 'header': '2' } , 'blockquote', 'code-block' ],
					[{ 'list': 'ordered' }, { 'list': 'bullet'}, { 'indent': '-1' }, { 'indent': '+1' }], 
					[ 'direction', { 'align': [] }], 
					//[ 'link', 'image', 'video', 'formula' ],
					[ 'link', 'formula' ],
					[ 'clean' ]
			]
		},
		placeholder: 'Compose an epic...',
	  	theme: 'snow'  // or 'bubble'
	});
	
	/*
	quillEmailBody.on('text-change', function(delta, oldDelta, source) {			
		let quillContents = quillEmailBody.root.innerHTML;
		$('.editor-contents').html(JSON.stringify(quillContents));

	    console.log('QUILL', JSON.stringify(quillContents));
	    //console.log('delta', delta);
	    //console.log('source', quill.getText());
	    //console.log('d2', quill.getContents());			    
	});	
	*/
}




$(function() {
	// We can attach the `fileselect` event to all file inputs on the page
	$(document).on('change', ':file', function() {
		var input = $(this),
		numFiles = input.get(0).files ? input.get(0).files.length : 1,
		label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
		input.trigger('fileselect', [numFiles, label]);
	});

	// We can watch for our custom `fileselect` event like this
	$(document).ready( function() {
		$(':file').on('fileselect', function(event, numFiles, label) {

			var input = $(this).parents('.input-group').find(':text'),
			log = numFiles > 1 ? numFiles + ' files selected' : label;

			if( input.length ) {
				input.val(log);
			} else {
				if( log ) alert(log);
			}
		});
	});
});



$('form.email-scheduler-form button[type="reset"]').on('click',function(event){
	event.preventDefault();
	resetEmailSchedulerForm();
});


// reset Email Scheduler Form
function resetEmailSchedulerForm(){
	$('form.email-scheduler-form').find("input[type=text],input[type=email],textarea").val("");
	$('form.email-scheduler-form').find(".select2").val('').trigger('change');	
	quillEmailBody.setText('');
	$('form.email-scheduler-form .send-date-datepicker').datepicker({
        format:'dd/mm/yyyy',
    }).datepicker("setDate",'now');
}


//email scheduler form
$(".email-scheduler-form").submit(function(e){

	e.preventDefault(); // avoid to execute the actual submit of the form.

	var form = $(this);
    var url = form.attr('action');
    var csrfToken = $('.email-scheduler-form input[name="_token"]').val();
    var userid = $('.email-scheduler-form input[name="user_id"]').val();

    var email 	= $('.email-scheduler-form input[name="email_alias"]').val();
    var subject = $('.email-scheduler-form input[name="email_subject"]').val();
    var batches = $('#email-batches').val();
    var sendDate = $('#send_date').val();

    let quillContents = quillEmailBody.root.innerHTML;
    if(	quillContents == "<p><br></p>" || quillContents == "" || 
    	quillContents == '<p><br></p>' || quillContents == ''){
    	alert('email body cant be empty');
    	return false;
    }


    var formData = new FormData();
	//formData.append('file', $('#batch_file')[0].files[0]);
	//formData.append('file', $('#batch_file').files);
	formData.append('_token', csrfToken);
	formData.append('userid', userid);
	formData.append('email', email);
	formData.append('subject', subject);
	formData.append('batches', batches);
	formData.append('sendDate', sendDate);
	formData.append('emailBody', quillContents);

	for (var i = 0; i < $('#attachments').get(0).files.length; ++i) {
	    formData.append('attachements[]', $('#attachments').get(0).files[i]);
	}

	$.ajax({
       	type: "POST",
       	url: url,
       	data: formData,
       	processData: false,
		contentType: false,	           	
       	success: function(data)
       	{
           var resp = JSON.parse(data);
           alert(resp.message);

           if(resp.status == 'success'){	               		
           		resetEmailSchedulerForm();
           }

           console.log(resp.message); // show response from the php script.
       	},
       	error:function(request,errorType,errorMessage)
		{
			alert ('error - '+errorType+'with message - '+errorMessage);
		}
     });	
    //console.log('aaa');
});




//email manager form
$(".email-manager-form").submit(function(e) {

    e.preventDefault(); // avoid to execute the actual submit of the form.

    var form = $(this);
    var url = form.attr('action');
    var csrfToken = $('.email-manager-form input[name="_token"]').val();
    var userid = $('.email-manager-form input[name="user_id"]').val();
    var batchName = $('.email-manager-form input[name="batch_name"]').val();

    if(typeof $('#batch_file')[0].files[0] == 'undefined'){
		alert('Batch file need to upload');
    	return false;    	
    }   

    var formData = new FormData();
	formData.append('file', $('#batch_file')[0].files[0]);

	formData.append('file', $('#batch_file').files);
	formData.append('userid', userid);
	formData.append('batchName', batchName);
	formData.append('_token', csrfToken);			

	$.ajax({
       	type: "POST",
       	url: url,
       	data: formData,
       	processData: false,
		contentType: false,	           	
       	success: function(data)
       	{
           var resp = JSON.parse(data);
           alert(resp.message);

           if(resp.status == 'success'){	               		
           		$('.email-manager-form')[0].reset();
           }

           console.log(resp.message); // show response from the php script.
       	},
       	error:function(request,errorType,errorMessage)
		{
			alert ('error - '+errorType+'with message - '+errorMessage);
		}
     });
});