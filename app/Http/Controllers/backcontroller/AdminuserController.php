<?php

namespace App\Http\Controllers\backController;
use App\Http\Controllers\Controller;
use App\Models\AuthModel;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

use Intervention\Image\Facades\Image;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\GD\Driver;


class AdminuserController extends Controller
{
    
    public function index(){
       return view('admin/admin-user/index');
    }

    public function getdata(){
      $getdata = AuthModel::get();
      return Datatables::of($getdata)
      ->addIndexColumn()
      ->addColumn('status', function ($status) {
        return $status->status == 'active' ? '<a href="javascript:void(0);" onclick="status(' . $status->id . ')" class="btn fw-medium f-12 badge bg-success">Active</a>' : '<a onclick="status(' . $status->id . ')" href="javascirpt:void(0);" class="btn fw-medium f-12 badge bg-danger">Deactive</a>';
      })
      ->addColumn('action', function ($action) {
        return '<a href="' . route('admin-user.edit', $action->id) . '" class="py-2 px-2 btn fw-medium f-12 badge bg-success"><i class="fas fa-edit"></i></a> <a onclick="deletedata(' . $action->id . ')" href="javascript:void(0);" class="py-2 px-2 btn fw-medium f-12 badge bg-danger"><i class="fas fa-trash-alt"></i></a>';
      })
      ->rawColumns(['status','action'])
      ->make(true);

    }   
    public function create()
    {
       return view('admin/admin-user/create');
    }    
    public function store(Request $request)
    {
        if($request->ajax()){

            $validation = Validator::make($request->all(),[
                 'name'=>'required | string',
                 'email'=>'required | email',
                 'role_type'=>'required'
            ]);            
            if($validation->fails()){
                return response()->json([
                     'code'=>'400',
                     'message'=>$validation->errors()
                ]);
            }else{                
                AuthModel::create([
                    'name'=>$request->name,
                    'email'=>$request->email,
                    'role'=>$request->role_type
                ]);
                session()->flash('type', 'success');
                session()->flash('message', 'Successfully Created');
                return response()->json(['code' => '200']);
            }
        }
    }  
    public function edit(string $id)
    {
        $data = AuthModel::where('id',$id)->first();
        return view('admin/admin-user/edit',compact('data'));
    }   
    public function update(Request $request, string $id)
    {
        if($request->ajax()){

            $validation = Validator::make($request->all(),[
                 'name'=>'required | string',
                 'email'=>'required | email',
                 'role_type'=>'required'
            ]);            
            if($validation->fails()){
                return response()->json([
                     'code'=>'400',
                     'message'=>$validation->errors()
                ]);
            }else{                
                AuthModel::where('id',$id)->update([
                    'name'=>$request->name,
                    'email'=>$request->email,
                    'role'=>$request->role_type
                ]);
                session()->flash('type', 'success');
                session()->flash('message', 'Successfully Updated');
                return response()->json(['code' => '200']);
            }
        }
    }  
    public function delete(Request $request) {
        AuthModel::where('id', $request->id)->delete();
        return response()->json(['code' => '200']);
    }
    public function status(Request $request) {
        if ($request->ajax()) {
            $data = AuthModel::where('id', $request->id)->select('id', 'status')->first();
            $newStatus = $data->status === 'active' ? 'deactive' : 'active';
            AuthModel::where('id', $request->id)->update(['status' => $newStatus]);
            return response()->json(['code' => '200']);
        }
    }
    public function fileshow(){
        return view("admin/convert");
    }
    public function filestore(Request $request){
        fileupload('new',$request->file('file'));
    }
}
