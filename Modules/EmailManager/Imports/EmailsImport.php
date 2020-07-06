<?php


namespace Modules\EmailManager\Imports;

use Maatwebsite\Excel\Concerns\ToModel;
use Modules\EmailManager\Entities\EmailDetail;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\Auth;
use Modules\EmailManager\Entities\Batch;


class EmailsImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {   
        //get last batch id from this user
        $matchThese = ['user_id' => Auth::id()];
        $lastId = Batch::where($matchThese)->get()->last()->id;      

        return new EmailDetail([
                'email_id'      => $row['id'],
                'name'          => $row['name'],
                'number'        => $row['number'],
                'email'         => $row['email_address'],
                'batch_id'      => $lastId
        ]);

    }

}
