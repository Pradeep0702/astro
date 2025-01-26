<?php
namespace App\Http\Controllers\backcontroller;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BussinessContactModel;
use  Yajra\DataTables\Facades\DataTables;

class BussinesscontactController extends Controller
{
     public function index(){
        return view('admin/bussiness-contact/index');
     }
    
     public function store(Request $request){

        $validate = $request->validate([
            'companyName'=>'required | string | max:200',
            'locations'=>'required',
            'fullName'=>'required | string | max:100',
            'mobileNumber'=>'required | digits:10 | numeric',
            'email'=>'required | email'
        ]);
         $create = BussinessContactModel::create([
            'company_name'=>$request->companyName,
            'number_of_location'=>$request->locations,
            'full_name'=>$request->fullName,
            'mobile_number'=>$request->mobileNumber,
            'bussiness_email'=>$request->email
        ]); 
        
        if($create){             
            session()->flash('type','success');
            session()->flash('message','successfully Submitted');
            return redirect()->route('front.getstarted');           
        }        
     } 

     public function getdata(Request $request){

      if($request->ajax()){       
        $data = BussinessContactModel::get();
        return DataTables::of($data)
        ->addIndexColumn()
        ->addColumn('date', function ($date) {
            return date('d M Y - h:i a', strtotime($date->created_at));
        })
        ->addColumn('email', function ($mail) {
            return '<a href="mailto:' . $mail->email . '">' . $mail->bussiness_email . '</a>';
        })->addColumn('action', function ($action) {
            return '<a onclick="deletedata(' . $action->id . ')" href="javascript:void(0);" class="btn fw-medium f-12 badge bg-danger"><i class="fas fa-trash-alt"></i></a>';
        })
        ->rawColumns(['action', 'email','date'])
        ->make(true);
      }

     }
     public function delete(Request $request){
        BussinessContactModel::where('id', $request->id)->delete();
        return response()->json(['code' => '200']);
     }

}
