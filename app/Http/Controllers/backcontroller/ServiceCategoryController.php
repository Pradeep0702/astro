<?php

namespace App\Http\Controllers\backController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ServiceCategoryModel;
use Illuminate\Support\Facades\Validator;


class ServiceCategoryController extends Controller
{
   
    public function index(){
       return view('admin/service-category/index');
    }
    
    public function create(){
        return view('admin/service-category/create'); 
    }

    public function getdata(Request $request){
        if ($request->ajax()) {
            $start = $request->get('start');
            $length = $request->get('length');
            $searcharr = $request->get('search');
            $search = $searcharr['value'];
            $recordsTotal = ServiceCategoryModel::count();
            $filterData = ServiceCategoryModel::when($search, function ($query, $search) {
                return $query->where('category_name', 'like', '%' . $search . '%');
            })->count();
            $datas = ServiceCategoryModel::limit($length)->offset($start)->when($search, function ($query, $search) {
                return $query->where('category_name', 'like', '%' . $search . '%');
            })->orderBy('order', 'ASC')->get();
            $jsondata = [];
            foreach ($datas as $key => $data) {
                $jsondata[] = array('id' => $data->id, 'index' => '<i class="bi bi-arrows-move"></i> ' . $key + 1, 'c_name' => $data->category_name, 'action' => '<a href="' . route('service-category.edit', $data->id) . '" class="py-2 px-2 btn fw-medium f-12 badge bg-success"><i class="fas fa-edit"></i></a> <a onclick="deletedata(' . $data->id . ')" href="javascript:void(0);" class="py-2 px-2 btn fw-medium f-12 badge bg-danger"><i class="fas fa-trash-alt"></i></a>',);
            }
            return response()->json(["draw" => $request->draw, "recordsTotal" => $recordsTotal, "recordsFiltered" => $filterData, "data" => $jsondata]);
        }

    }    
  
    public function store(Request $request){
        if ($request->ajax()) {
            $validation = Validator::make($request->all(),[
               'c_name' => 'required | string | unique:service_category,category_name', 
               'icon' => 'required', 
               'bg' => 'required', 
               'text_color'=>'required'
           ]);
           if ($validation->fails()) {
               return response()->json(['code' => '400', 'message' => $validation->errors(), ]);
           } else {
               ServiceCategoryModel::create([
                'category_name' => $request->c_name,
                'category_icon' => $request->icon,
                'category_design' =>[
                    'bg'=>$request->bg,
                    'text_color'=>$request->text_color
                 ]
               ]);
               session()->flash('type', 'success');
               session()->flash('message', 'Successfully Created');
               return response()->json(['code' => '200']);
           }
       }
    } 
  
    public function edit(string $id)
    {
        $data = ServiceCategoryModel::where('id', $id)->first();
        return view('admin/service-category/edit', compact('data'));
    }

    public function update(Request $request, string $id)
    {
        if ($request->ajax()) {
                $validation = Validator::make($request->all(),[
                    'c_name' => 'required | string', 
                    'icon' => 'required', 
                    'bg' => 'required', 
                    'text_color'=>'required'
                ]);
            if ($validation->fails()) {
                return response()->json(['code' => '400', 'message' => $validation->errors(), ]);
            } else {
                ServiceCategoryModel::where('id', $id)->update([
                    'category_name' => $request->c_name,
                    'category_icon' => $request->icon,
                    'category_design' =>[
                        'bg'=>$request->bg,
                        'text_color'=>$request->text_color
                     ]
                 ]);
                session()->flash('type', 'success');
                session()->flash('message', 'Successfully Updated');
                return response()->json(['code' => '200']);
            }
        }
    }

   
    public function delete(Request $request)
    {
        ServiceCategoryModel::where('id', $request->id)->delete();
        return response()->json(['code' => '200']);
    }

    public function order(Request $request) {
        $orders = $request->id;
        foreach ($orders as $key => $neworder) {
            ServiceCategoryModel::where('id', $neworder)->update(['order' => $key + 1]);
        }
        return response()->json(['code' => '200']);
    }
}
