<?php
namespace App\Http\Controllers\backcontroller;
use App\Http\Controllers\Controller;
use App\Models\WorkcategoryModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class WorkcategoryController extends Controller {
    public function index() {
        return view('admin/work-category/index');
    }
    public function getdata(Request $request) {
        if ($request->ajax()) {
            $start = $request->get('start');
            $length = $request->get('length');
            $searcharr = $request->get('search');
            $search = $searcharr['value'];
            $recordsTotal = WorkcategoryModel::count();
            $filterData = WorkcategoryModel::when($search, function ($query, $search) {
                return $query->where('category_name', 'like', '%' . $search . '%');
            })->count();
            $datas = WorkcategoryModel::limit($length)->offset($start)->when($search, function ($query, $search) {
                return $query->where('category_name', 'like', '%' . $search . '%');
            })->orderBy('order', 'ASC')->get();
            $jsondata = [];
            foreach ($datas as $key => $data) {
                $jsondata[] = array('id' => $data->id, 'index' => '<i class="bi bi-arrows-move"></i> ' . $key + 1, 'c_name' => $data->category_name, 'action' => '<a href="' . route('work-category.edit', $data->id) . '" class="py-2 px-2 btn fw-medium f-12 badge bg-success"><i class="fas fa-edit"></i></a> <a onclick="deletedata(' . $data->id . ')" href="javascript:void(0);" class="py-2 px-2 btn fw-medium f-12 badge bg-danger"><i class="fas fa-trash-alt"></i></a>',);
            }
            return response()->json(["draw" => $request->draw, "recordsTotal" => $recordsTotal, "recordsFiltered" => $filterData, "data" => $jsondata]);
        }
    }
    public function create() {
        return view('admin/work-category/create');
    }
    public function store(Request $request) {
        if ($request->ajax()) {
             $validation = Validator::make($request->all(),[
                'c_name' => 'required | string | unique:work_category,category_name', 
            ]);
            if ($validation->fails()) {
                return response()->json(['code' => '400', 'message' => $validation->errors(), ]);
            } else {
                WorkcategoryModel::create(['category_name' => $request->c_name, ]);
                session()->flash('type', 'success');
                session()->flash('message', 'Successfully Created');
                return response()->json(['code' => '200']);
            }
        }
    }
    public function edit(string $id) {
        $data = WorkcategoryModel::where('id', $id)->first();
        return view('admin/work-category/edit', compact('data'));
    }
    public function update(Request $request, string $id) {
        if ($request->ajax()) {
            $validation = Validator::make($request->all(), ['c_name' => 'required | string', ]);
            if ($validation->fails()) {
                return response()->json(['code' => '400', 'message' => $validation->errors(), ]);
            } else {
                WorkcategoryModel::where('id', $id)->update(['category_name' => $request->c_name, ]);
                session()->flash('type', 'success');
                session()->flash('message', 'Successfully Updated');
                return response()->json(['code' => '200']);
            }
        }
    }
    public function delete(Request $request) {
        WorkcategoryModel::where('id', $request->id)->delete();
        return response()->json(['code' => '200']);
    }
    public function order(Request $request) {
        $orders = $request->id;
        foreach ($orders as $key => $neworder) {
            WorkcategoryModel::where('id', $neworder)->update(['order' => $key + 1]);
        }
        return response()->json(['code' => '200']);
    }
}
