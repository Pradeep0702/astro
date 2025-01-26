<?php
namespace App\Http\Controllers\backcontroller;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\TestimonialModel;
use Yajra\DataTables\Facades\DataTables;
use Intervention\Image\Facades\Image;

class TestimonialController extends Controller {
    
    public function index() {
        return view('/admin/testimonial/index');
    }
    public function getdata(Request $request) {        
        if ($request->ajax()) {
            $datas = TestimonialModel::get();
            return DataTables::of($datas)->addIndexColumn()->addColumn('image', function ($img) {
                return '<img id="img" class="img-fluid" src="' . asset('upload/' . $img->image) . '"/>';
            })->addColumn('status', function ($status) {
                return $status->status == 'active' ? '<a href="javascript:void(0);" onclick="status(' . $status->id . ')" class="btn fw-medium f-12 badge bg-success">Active</a>' : '<a onclick="status(' . $status->id . ')" href="javascirpt:void(0);" class="btn fw-medium f-12 badge bg-danger">Deactive</a>';
            })->addColumn('action', function ($action) {
                return '<a href="' . route('testimonial.edit', $action->id) . '" class="py-2 px-2 btn fw-medium f-12 badge bg-success"><i class="fas fa-edit"></i></a> <a onclick="deletedata(' . $action->id . ')" href="javascript:void(0);" class="py-2 px-2 btn fw-medium f-12 badge bg-danger"><i class="fas fa-trash-alt"></i></a>';
            })->rawColumns(['action', 'status', 'image'])->make(true);
        }
    }
    public function create() {
        return view('/admin/testimonial/create');
    }
    public function store(Request $request) {
        if ($request->ajax()) {
             $validation = validator::make($request->all(),[
                 'c_name' => 'required | string',
                 'cd' => 'required',
                 'c_image' => 'required | max:2000 | image',
                 'c_review' => 'required'
             ]);
            if ($validation->fails()) {
                return response()->json(['code' => '400', 'message' => $validation->errors() ]);
            } else {
                $filename = fileupload('review', $request->file('c_image'));
                TestimonialModel::create(['name' => $request->c_name, 'desgination' => $request->cd, 'image' => $filename, 'rating' => "", 'review' => $request->c_review, ]);
                session()->flash('type', 'success');
                session()->flash('message', 'Successfully Created');
                return response()->json(['code' => '200']);
            }
        }
    }
    public function status(Request $request) {
        if ($request->ajax()) {
            $data = TestimonialModel::where('id', $request->id)->select('id', 'status')->first();
            $newStatus = $data->status === 'active' ? 'deactive' : 'active';
            TestimonialModel::where('id', $request->id)->update(['status' => $newStatus]);
            return response()->json(['code' => '200']);
        }
    }
    public function edit(string $id) {
        $data = TestimonialModel::where('id', $id)->first();
        return view('admin/testimonial/edit', compact('data'));
    }
    public function update(Request $request, string $id) {
        if ($request->ajax()) {
            $validation = validator::make($request->all(),[
                 'c_name' => 'required | string',
                 'cd' => 'required',
                 'c_image' => 'max:2000 | image',
                 'c_review' => 'required'
                ]);
            if ($validation->fails()) {
                return response()->json(['code' => '400', 'message' => $validation->errors() ]);
            } else {
                $data = TestimonialModel::select('image')->where('id', $id)->first();
                if ($request->c_image != "") {
                    $filename = fileupload('review', $request->file('c_image'));
                }
                $image = $request->c_image == "" ? $data->image : $filename;
                if ($request->c_image != "") {
                    removeimage($data->image);
                }
                TestimonialModel::where('id', $id)->update(['name' => $request->c_name, 'desgination' => $request->cd, 'image' => $image, 'rating' => "", 'review' => $request->c_review, ]);
                session()->flash('type', 'success');
                session()->flash('message', 'Successfully Updated');
                return response()->json(['code' => '200']);
            }
        }
    }
    public function delete(Request $request) {
        $getimagepath = TestimonialModel::select('image')->where('id', $request->id)->first();
        $getimagepath->where('id', $request->id)->delete();
        removeimage($getimagepath->image);
        return response()->json(['code' => '200']);
    }
}
