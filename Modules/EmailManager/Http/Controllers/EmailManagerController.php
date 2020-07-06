<?php

namespace Modules\EmailManager\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;


use Illuminate\Support\Facades\Validator;

use Modules\EmailManager\Imports\EmailsImport;
use Maatwebsite\Excel\Facades\Excel;
use Modules\EmailManager\Entities\Batch;


class EmailManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()    
    {
        if(Auth::check ()){
            //return view('emailmanager::index');
            return view('emailmanager::email_manager_page');
        }else{
            return redirect()->route('home');
        }
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('emailmanager::create');
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
        return view('emailmanager::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        return view('emailmanager::edit');
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



    public function upload(Request $request)
    {

        $response = array();        

        try{

            //server side validations
            $validator = Validator::make($request->all(),[
                'batchName'      => 'required'
            ]);       

            if ($validator->fails()) {
                throw new \Exception('Batch Name is required');
            }

            if(!$request->hasFile('file')){
                throw new \Exception('Excel file need to upload');
            }


            //check batch name already exsist for this use        
            $userid = Auth::id();
            $batchName = $request->batchName;

            $matchThese = ['user_id' => $userid, 'title' => $batchName];
            $results = Batch::where($matchThese)->get();
            $resultCount = $results->count();        


            if($resultCount>0){
                
                $response = array(
                    "status" => "error",
                    "error" => true,
                    "message" => "Batch name already exsists",
                );

                echo json_encode($response);
                return;

            }else{

                //insert batch           
                $batch = new Batch;
                $batch->title = $batchName;
                $batch->user_id = $userid;
                $batch->save();

                $batchId = $batch->id;
            }                      


            // $batch = Batch::find(1);
            // $user = $batch->users;
            // echo '<pre>';
            // print_r($user);
            // echo '</pre>';

            // $batch = Batch::find(1);
            // $emaildetails = $batch->emailDetails;
            // echo '<pre>';
            // print_r($emaildetails);
            // echo '</pre>';   


            $rt = Excel::import(new EmailsImport, request()->file('file'));
            

            $response = array(
                "status" => "success",
                "error" => false,
                "message" => "Batch Inserted Successfully",
            );

        }catch(\Illuminate\Database\QueryException $ex){

            //Return error message
            $response = array(
                "status" => "error",
                "error" => true,
                "message" => 'Batch insert into database failed - check you excel file data format'
                //"message" => $ex->getMessage()
            );

        }catch(\Exception $ex){

            $msg = $ex->getMessage();

            if($msg != 'Excel file need to upload' && $msg !='Batch Name is required'){
                $msg = 'Error processing batch';
            }


            //Return error message
            $response = array(
                "status" => "error",
                "error" => true,
                //"message" => "No file was sent!",
                //"message" => 'Error processing batch'
                "message" => $msg
                //"message" => $ex->getMessage()

            );
        }

        echo json_encode($response);
        return;
    }


}