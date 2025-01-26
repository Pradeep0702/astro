<?php
namespace App\Http\Controllers\backcontroller;
use App\Http\Controllers\Controller;
use App\Models\CareerModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class CareerController extends Controller {
    public function index() {
        return view('admin/career/index');
    }
    public function getdata(Request $request) {
        if ($request->ajax()) {
            $datas = CareerModel::latest()->get();
            return DataTables::of($datas)->addIndexColumn()->addColumn('action', function ($action) {
                return '<a href="' . route('career.edit', $action->id) . '" class="py-2 px-2 btn fw-medium f-12 badge bg-success"><i class="fas fa-edit"></i></a> <a onclick="deletedata(' . $action->id . ')" href="javascript:void(0);" class="py-2 px-2 btn fw-medium f-12 badge bg-danger"><i class="fas fa-trash-alt"></i></a>';
            })->addColumn('job_deatils', function ($jobs) {
                $jobdata = "";
                foreach ($jobs->job_details as $key => $job) {
                    $jobdata.= '<div> <i class="far fa-circle"></i> ' . $job . '</div>';
                }
                return '<button class="py-2 btn badge bg-primary fs-13 fw-medium" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample' . $key . '" aria-expanded="false" aria-controls="collapseExample' . $key . '">
                      View Details
                     </button>
                     <div class="collapse border-0" id="collapseExample' . $key . '">
                    <div class="card card-body border-0 shadow-none">
                       ' . $jobdata . '
                    </div>
                    </div>';
            })->addColumn('status', function ($status) {
                return $status->status == 'active' ? '<a href="javascript:void(0);" onclick="status(' . $status->id . ')" class="btn fw-medium f-12 badge bg-success">Active</a>' : '<a onclick="status(' . $status->id . ')" href="javascirpt:void(0);" class="btn fw-medium f-12 badge bg-danger">Deactive</a>';
            })->rawColumns(['action', 'job_deatils', 'status'])->make(true);
        }
    }
    public function create() {
        return view('admin/career/create');
    }
    public function store(Request $request) {
        if ($request->ajax()) {
            $validation = Validator::make($request->all(), ['title' => 'required | string', 'd_name' => 'required | string', 'job_type' => 'required | string', 'work_from_type' => 'required | string', ]);
            if ($validation->fails()) {
                return response()->json(['code' => '400', 'message' => $validation->errors(), ]);
            } else {
                CareerModel::create(['title' => $request->title, 'designation_name' => $request->d_name, 'job_type' => $request->job_type, 'work_type' => $request->work_from_type, 'job_details' => $request->job_details, ]);
                session()->flash('type', 'success');
                session()->flash('message', 'Successfully Created');
                return response()->json(['code' => '200']);
            }
        }
    }
    public function status(Request $request) {
        if ($request->ajax()) {
            $data = CareerModel::where('id', $request->id)->select('id', 'status')->first();
            $newStatus = $data->status === 'active' ? 'deactive' : 'active';
            CareerModel::where('id', $request->id)->update(['status' => $newStatus]);
            return response()->json(['code' => '200']);
        }
    }
    public function edit(string $id) {
        $data = CareerModel::where('id', $id)->first();
        return view("admin/career/edit", compact('data'));
    }
    public function update(Request $request, string $id) {
        if ($request->ajax()) {
            $validation = Validator::make($request->all(), ['title' => 'required | string', 'd_name' => 'required | string', 'job_type' => 'required | string', 'work_from_type' => 'required | string', ]);
            if ($validation->fails()) {
                return response()->json(['code' => '400', 'message' => $validation->errors(), ]);
            } else {
                CareerModel::where('id', $id)->update(['title' => $request->title, 'designation_name' => $request->d_name, 'job_type' => $request->job_type, 'work_type' => $request->work_from_type, 'job_details' => $request->job_details, ]);
                session()->flash('type', 'success');
                session()->flash('message', 'Successfully Updated');
                return response()->json(['code' => '200']);
            }
        }
    }
    public function delete(Request $request) {
        CareerModel::where('id', $request->id)->delete();
        return response()->json(['code' => '200']);
    }
    public function viewform() {
        $html = view('admin/career/ajax/create')->render();
        return response()->json(['code' => '200', 'html' => $html, ]);
    }
}
