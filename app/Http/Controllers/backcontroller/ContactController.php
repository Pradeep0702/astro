<?php
namespace App\Http\Controllers\backcontroller;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContactModel;
use App\Models\CountryModel;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class ContactController extends Controller {
    public function index() {
        return view('admin/contact/index');
    }
    public function store(Request $request) {
        if ($request->ajax()) {
            $validation = Validator::make($request->all(), ['name' => 'required | string', 'number' => 'required | digits:10 | numeric', 'email' => 'required | email', 'country' => 'required | string', ]);
            if ($validation->fails()) {
                return response(['code' => '400', 'message' => $validation->errors(), ]);
            } else {
                ContactModel::create(['name' => $request->name, 'phone' => $request->number, 'email' => $request->email, 'country' => $request->country, 'message' => $request->message??'', ]);
                return response(['code' => '200', ]);
            }
        }
    }
    public function getcountry(Request $request) {
        if ($request->ajax()) {
            $country = CountryModel::where('name', 'like', '%' . $request->country . '%')->get(['name', 'phonecode']);
            if ($country->count() != 0) {
                return response()->json($country);
            }
        }
    }
    public function getdata(Request $request) {
        if ($request->ajax()) {
            $contact = ContactModel::latest('id', 'DESC')->get();
            return DataTables::of($contact)->addIndexColumn()->addColumn('email', function ($action) {
                return '<a href="mailto:' . $action->email . '">' . $action->email . '</a>';
            })->addColumn('date', function ($date) {
                return date('d M Y - h:i a', strtotime($date->created_at));
            })->addColumn('action', function ($action) {
                return '<a onclick="deletedata(' . $action->id . ')" href="javascript:void(0);" class="btn fw-medium f-12 badge bg-danger"><i class="fas fa-trash-alt"></i></a>';
            })->rawColumns(['action', 'email'])->make(true);
        }
    }
    public function delete(Request $request) {
        ContactModel::where('id', $request->id)->delete();
        return response()->json(['code' => '200']);
    }
}