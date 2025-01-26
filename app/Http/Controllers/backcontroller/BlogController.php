<?php
namespace App\Http\Controllers\backcontroller;
use App\Http\Controllers\Controller;
use App\Models\BlogcategoryModel;
use App\Models\BlogModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Auth;
use App\Events\Blogrequest;
use DOMDocument;

class BlogController extends Controller {
    public function index() {
        return view('admin/blog/index');
    }
    public function create() {
        $datas = BlogcategoryModel::select('id', 'category_name')->latest('id', 'DESC')->get();
        return view('admin/blog/create', compact('datas'));
    }
    public function getdata(Request $request) {
        if ($request->ajax()) {
            $blogs = BlogModel::with('blogdata')->get();
            return DataTables::of($blogs)->addIndexColumn()->addColumn('category_name', function ($c_name) {
                $cate_name = "";
                foreach ($c_name->blogdata as $category_name) {
                    $cate_name.= $category_name->category_name;
                }
                return $cate_name;
            })->addColumn('slug', function ($slug) {
                return  '<a target="_blank" href="'.url('/blog/' . $slug->slug) .'" type="button" 
                          class="fw-medium f-12 badge bg-primary">
                          Slug
                         </a>';
                // return '<a class=text-truncate w-25" target="_blank" href="' . url('/blog/' . $slug->slug) . '">' . $slug->slug . '</a>';
            })->addColumn('cu', function ($cu) {
                return date('d-m-Y',strtotime($cu->created_at)) .' <b>/</b> '. date('d-m-Y',strtotime($cu->updated_at));
            })->addColumn('action', function ($action) {
                $bg = $action->status == 'active' ? 'success' : 'warning';  
                return ' <a href="" class="py-2 px-2 btn fw-medium f-12 badge bg-'.$bg.'">'.$action->status.'</a>
                 <a href="' . route('blog.edit', $action->id) . '" class="py-2 px-2 btn fw-medium f-12 badge bg-success"><i class="fas fa-edit"></i></a> <a onclick="deletedata(' . $action->id . ')" href="javascript:void(0);" class="py-2 px-2 btn fw-medium f-12 badge bg-danger"><i class="fas fa-trash-alt"></i></a>';
            })
            ->rawColumns(['action', 'slug','cu'])
            ->make(true);
        }
    }
    public function uploadimage(Request $request) {
        if ($request->hasFile('file')) {
            $filename = fileupload('blog', $request->file("file"));
            return array('url' => asset('upload/' . $filename));
        } else {
            return response()->json('Something Went Wrong');
        }
    }
    public function store(Request $request) {
        if ($request->ajax()) {
             $validation = Validator::make($request->all(),[
                 'category' => 'required | numeric',
                 'title' => 'required | string',
                 'meta_d' => 'required',
                 'meta_key' => 'required',
                 't_image' => 'required | max:2000 | image',
                 'content' => 'required',
             ]);
            if ($validation->fails()) {
                return response()->json(['code' => '400', 'message' => $validation->errors(), ]);
            } else {
                $requestslug = Str::slug($request->title);
                $slugCheck = BlogModel::where('slug',$requestslug)->first(['slug']);
                if(!$slugCheck){
                    $filename = fileupload('blog', $request->file("t_image"));
                    $blog = BlogModel::create(['c_id' => $request->category, 'title' => $request->title, 'meta_d' => $request->meta_d, 'meta_key' => $request->meta_key, 'slug' => Str::slug($request->title), 'thumbnail_image' => $filename, 'content' => $request->content, ]);
                    if($blog){
                        $username = Auth::guard('admin_login')->user()->name;
                        // broadcast(new Blogrequest(ucwords($username)));
                        session()->flash('type', 'success');
                        session()->flash('message', ' Your blog has been created but needs approval. Please contact the admin.');
                        return response()->json(['code' => '200']);
                     }               
                }
                return response()->json(['message'=>'Title Alredy Exists','code' => '404']);
            }
        }
    }
    public function edit(string $id) {
        $cates = BlogcategoryModel::get();
        $data = BlogModel::where('id', $id)->first();
        return view('admin/blog/edit', compact('data', 'cates'));
    }
    public function update(Request $request, string $id) {
        if ($request->ajax()) {
            $validation = Validator::make($request->all(),[
                 'category' => 'required | numeric',
                 'title' => 'required | string',
                 'content' => 'required',
                 't_image' => 'max:2000 | image',
             ]);
            if ($validation->fails()) {
                return response()->json(['code' => '400', 'message' => $validation->errors(), ]);
            } else {
                if ($request->t_image != "") {
                    $filename = fileupload('blog', $request->file('t_image'));
                }
                $data = BlogModel::select('thumbnail_image')->where('id', $id)->first();
                $image = $request->t_image == "" ? $data->thumbnail_image : $filename;
                if ($request->t_image != "") {
                    removeimage($data->thumbnail_image);
                }
                BlogModel::where('id', $id)->update(['title' => $request->title, 'meta_d' => $request->meta_d, 'meta_key' => $request->meta_key, 'thumbnail_image' => $image, 'slug' => Str::slug($request->title), 'content' => $request->content, 'c_id' => $request->category, ]);
                session()->flash('type', 'success');
                session()->flash('message', 'Successfully Updated');
                return response()->json(['code' => '200']);
            }
        }
    }
    public function delete(Request $request) { 
        if(Auth::guard('admin_login')->user()->role == 'admin'){
            $getdata = BlogModel::select('content', 'thumbnail_image')->where('id', $request->id)->first();
            $decode_data = htmlspecialchars_decode($getdata->content);
            $dom = new DOMDocument();
            $dom->loadHTML($decode_data);
            $imgTags = $dom->getElementsByTagName('img');
            foreach ($imgTags as $imgTag) {
                $src = $imgTag->getAttribute('src');
                $filename = pathinfo($src, PATHINFO_BASENAME);
                removeimage($filename);
            }
            removeimage($getdata->thumbnail_image);
            $getdata->where('id', $request->id)->delete();
            return response()->json(['code' => '200']);
        }else{
            return response()->json(['message'=>'You are not authorized to delete this blog.','code' => '400' ,'page'=>'blog']);
        }
        
    }
    public function deleteimg(Request $request) {
        if ($request->ajax()) {
            removeimage($request->file);
            return response()->json(['status' => 'success', 'code' => 200]);
        }
    }
    public function pendingblogs(){
         $pendingblogs = BlogModel::where('status','pending')
         ->latest()
         ->get(['title','thumbnail_image','id']);
         return view('admin/blog/pendingblog',compact('pendingblogs'));
    }
    public function blogview(Request $request){
         $data = BlogModel::with('blogdata')
         ->where('id',$request->id)
         ->where('status','pending')
         ->first(['title','thumbnail_image','id','content']);
         $html = view("admin.blog.blogview", compact("data"))->render();
         return response()->json(["html" => $html, "message" => "success", ]);
    }
    public function accpectblog(string $id){
         BlogModel::where('id',$id)->update([
            'status'=>'active'
         ]);
         session()->flash('type', 'success');
         session()->flash('message', 'Successfully Updated');
         return redirect()->route('blog.pendingblogs');
    }
    public function blogshow(Request $request){
        if($request->ajax()){            
            $page = $request->page * 1 ?? 0;
            $datas = BlogModel::with('blogdata')->where('status','active')
            ->latest('created_at')  
            ->limit(6)
            ->offset($page)
            ->get(); 
            $count = $datas->count();
            if($count != 0){
                $html = view('frontlayout.blogshow',compact('datas'))->render();
                return response()->json(['html'=>$html,'page'=>$page,'count'=>$count]);
            }
            return response()->json(['message'=>'Data Not Found','code'=>'404']);
        }       
    }


}
