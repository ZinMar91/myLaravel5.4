<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ImportController extends Controller
{
    public function index()
    {
        $users = User::all();
        /*$users = User::select(['id','name','email','created_at']);
        dd($users);*/
        return view('users.import', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function import(Request $request)
    {
        if($request->file('imported-file'))
        {
            $path = $request->file('imported-file')->getRealPath();
            $data = Excel::load($path, function($reader) {
            })->get();

            if(!empty($data) && $data->count()) {
                /*$data = $data->toArray();
                for($i=0;$i<count($data);$i++)
                {
                    $dataImported[] = $data[$i];
                }*/
                foreach ($data->toArray() as $row) {
                    if (!empty($row)) {
                        $dataArray[] =
                            [
                                'name' => $row['name'],
                                'email' => $row['email'],
                                'password' => bcrypt($row['password']),
                                'created_at' => $row['created_at']
                            ];
                    }
                }
//            User::insert($dataImported);
                if (!empty($dataArray)) {
                    User::insert($dataArray);
                    return back();
                }
            }
        }
//        return back();
    }

    /**
     * export a file in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function export(){
        $users = User::all();
        Excel::create('items', function($excel) use($users) {
            $excel->sheet('ExportFile', function($sheet) use($users) {
                $sheet->fromArray($users);
            });
        })->export('xls');

    }
}
