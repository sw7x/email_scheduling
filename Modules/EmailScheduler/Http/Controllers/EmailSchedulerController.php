<?php

namespace Modules\EmailScheduler\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
//use Mail;


use Modules\EmailManager\Entities\Batch;
use Modules\EmailScheduler\Entities\ScheduledAttachement;
use Modules\EmailScheduler\Entities\ScheduledDetail;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;



class EmailSchedulerController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        

        // $sd = ScheduledDetail::find(2);
        // $att = $sd->scheduledAttachements;
        // dd($att);

        if(Auth::check()){
            
            //get this authenticated users batch names
            $matchThese = ['user_id' => Auth::id()];
            $results = Batch::where($matchThese)->get();

            $arr = array();
            foreach ($results as $value) {
                $arr[] = array('bname' => $value->title, 'bid' => $value->id );
            }          

            return view('emailscheduler::email_scheduler_page')->with('batchData', $arr);

        }else{
            return redirect()->route('home');
        }
        
    }


    public function submit(Request $request)
    {

        try{

            $batch_arr = array_map('intval', explode (",", $request->batches));
            //dd($batch_arr); 

            //server side validations
            $validator = Validator::make($request->all(),[
                'email'     => 'required|email',
                'subject'   => 'required',
                'emailBody' => 'required',
                'sendDate' => 'required'
            ]);       

            if ($validator->fails()) {
                //$error = $validator->errors()->first();                
                throw new \Exception('Form validation error');
            }




            DB::beginTransaction();                     

            //inser schedule details
            $schedetails = new ScheduledDetail;
            $schedetails->email     = $request->email;
            $schedetails->subject   = $request->subject;
            $schedetails->emailBody = $request->emailBody;  
            $schedetails->send_date = Carbon::createFromFormat('Y/m/d', $request->sendDate)->format('Y-m-d');
            $schedetails->save();

            //last insert id
            $scheduleId = $schedetails->id;


            //populate schedule_batch pivot table
            $scheduledDetail = ScheduledDetail::find($schedetails->id);
            foreach ($batch_arr as $value) {                
                $scheduledDetail->batchs()->attach($value);
            }
            



            
            $uploadedFiles  = array();
            // Handle File Upload
            if($request->hasFile('attachements')){

                $time = time();                             
                foreach ($request->file('attachements') as $key => $file) {              
                    
                    // Get filename with the extension
                    $filenameWithExt = $file->getClientOriginalName();
                    
                    $fileNameToStore = $filenameWithExt;

                    //upload folder                   
                    $folderName      = 'schedule_email_files/user_'.Auth::id().'_'.$time;
                    // $folderName      = 'article-images';

                    $fileCheckPath = public_path().'/storage/'.$folderName.'/'. $fileNameToStore;
                    
                    if (file_exists($fileCheckPath)){
                        //throw new exception($fileCheckPath . " already exists");
                        throw new \Exception("file already exists");
                    }

                    // Upload Image
                    $path = $file->storeAs('public/'.$folderName, $fileNameToStore);
                    //$path = $request->file('avatar')->storeAs('public', $fileNameToStore);

                    $fileStorePath = '/storage/'.$folderName.'/'.$fileNameToStore;                   
                    $uploadedFiles[] = $fileStorePath;                  
                    
                }                   

            }           
            
            //insert uploaded attchement file paths 
            foreach ($uploadedFiles as $value) {                
                $att = new ScheduledAttachement;
                $att->path    = $value;
                $att->schedule_details_id = $scheduleId;
                $att->save();                
            }

            DB::commit();

            $response = array(
                "status" => "success",
                "error" => false,
                "message" => "Schedule Inserted Successfully",
            );

        }catch (\PDOException $e) {

            DB::rollBack();           

            //insert into db fail
            $response = array(
                "status" => "error",
                "error" => false,
                "message" => "Email Schedule Submit failed - Database error",
            );

        }catch (\Exception $e) {

            // Woopsy
            DB::rollBack();

            $response = array(
                "status" => "error",
                "error" => false,
                "message" => "Email Schedule Submit failed",
                "message" => $e->getMessage(),
            );
        }

        //dd($uploadedFiles);     

        echo json_encode($response);
    }


    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('emailscheduler::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('emailscheduler::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        return view('emailscheduler::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }


    public function basic_email() {
        
        // Instantiation and passing `true` enables exceptions
        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
            $mail->isSMTP();                                            // Send using SMTP
            $mail->Host       = env('MAIL_HOST',null);                    // Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
            $mail->Username   = env('MAIL_USERNAME',null);                    // SMTP username
            $mail->Password   = env('MAIL_PASSWORD',null);                    // SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $mail->Port       = env('MAIL_PORT',null);                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

            //Recipients
            $mail->setFrom('from@example.com', 'Mailer');
            $mail->addAddress('joe@example.net', 'Joe User');     // Add a recipient
            $mail->addAddress('ellen@example.com');               // Name is optional
            $mail->addReplyTo('info@example.com', 'Information');
            $mail->addCC('cc@example.com');
            $mail->addBCC('bcc@example.com');

            // Attachments
            // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
            // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

            // Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Here is the subject';
            $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }


        /*
        $data = array('name'=>"Virat Gandhi");

        Mail::send(['text'=>'emailscheduler::mail'], $data, function($message) {

           $message->to('abc@gmail.com', 'Tutorials Point')
                    ->subject('Laravel Basic Testing Mail');
           $message->from('xyz@gmail.com','Virat Gandhi');
        });
        */

        echo "Basic Email Sent. Check your inbox.";
   }


}
