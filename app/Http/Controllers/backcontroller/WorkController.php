<?php
namespace App\Http\Controllers\backcontroller;
use App\Http\Controllers\Controller;
use App\Models\WorkcategoryModel;
use App\Models\WorkModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

class WorkController extends Controller {
    public function index() {       
        return view("admin/work/index");
    }
    public function create() {
        $datas = WorkcategoryModel::get();
        return view("admin/work/create", compact("datas"));
    }
    public function getdata(Request $request) {
        if ($request->ajax()) {
            $work = WorkModel::with("withdata")->get();
            return DataTables::of($work)->addIndexColumn()
            ->addColumn("category_name", function ($category_name) {
                $cat_name = "";
                foreach ($category_name->withdata as $cat_name) {
                    $cat_name = $cat_name->category_name;
                }
                return $cat_name;
            })->addColumn("slug", function ($slug) {
                return "<a target='target' href=" . route("front.workurl", ["workurl" => $slug->slug]) . ">$slug->slug</a>";
            })->addColumn("showimages", function ($showimages) {
                return '<button onclick="showimages(' . $showimages->id . ')" class="btn badge bg-primary f-10 font-weight-normal" type="button" " data-bs-toggle="offcanvas" data-bs-target="#showimg" aria-controls="showimg">Show Images</button>';
            })->addColumn("action", function ($action) {
                return '<a href="' . route("work.edit", $action->id) . '" class="py-2 px-2 btn fw-medium f-12 badge bg-success"><i class="fas fa-edit"></i></a> <a onclick="deletedata(' . $action->id . ')" href="javascript:void(0);" class="py-2 px-2 btn fw-medium f-12 badge bg-danger"><i class="fas fa-trash-alt"></i></a>';
            })->rawColumns(["action", "slug", "showimages"])->make(true);
        }
    }
    public function store(Request $request) {
        if ($request->ajax()) {
             $validation = Validator::make($request->all(),[
                 "category" => "required | numeric",
                 "title" => "required | string",
                 "t_image" => "required | max:2000 | image",
                 "content" => "required",
                 "c_logo" => "required | max:2000 | image",
             ]);
            if ($validation->fails()) {
                return response()->json(["code" => "400", "message" => $validation->errors(), ]);
            } else { 
                $workImages = [];
                foreach ($request->workimages as $image) {
                    $workImages[] = fileupload("work", $image);
                }
                  if(!empty($request->v1) && !empty($request->video1)){
                    $video1 = $request->v1.'1**1'.$request->video1;
                 }
                
                 if(!empty($request->v2) && !empty($request->video2)){
                    $video2 = $request->v2.'1**1'.$request->video2;
                 }
                 if(!empty($request->v3) && !empty($request->video3)){
                    $video3 = $request->v3.'1**1'.$request->video3;
                 }
                 if(!empty($request->v4) && !empty($request->video4)){
                    $video4 = $request->v4.'1**1'.$request->video4;
                 }
                 if(!empty($request->v5) && !empty($request->video5)){
                    $video5 = $request->v5.'1**1'.$request->video5;
                 }
                 if(!empty($request->v6) && !empty($request->video6)){
                    $video6 = $request->v6.'1**1'.$request->video6;
                 }
          
                WorkModel::create([
                     "c_id" => $request->category,
                     "title" => $request->title,
                     "slug" => Str::slug($request->title),
                     "thumbnail_image" => fileupload("work-thumbnail", $request->file("t_image")),
                     "client_logo" => fileupload("client_logo", $request->file("c_logo")),
                     "hero_banner"=> fileupload("hero_banner", $request->file("hero_banner")),
                     "content" => $request->content,
                     "work_images" => $workImages,
                     "sm_icons" => icon($request->all(["fb", "insta", "yt", "pt", "ln", "tw"])),
                     "video1"=>$video1 ?? "",
                     "video2"=>$video2 ?? "",
                     "video3"=>$video3 ?? "",
                     "video4"=>$video4 ?? "",
                     "video5"=>$video5 ?? "",
                     "video6"=>$video6 ?? "",
                 ]);
                session()->flash("type", "success");
                session()->flash("message", "Successfully Created");
                return response()->json(["code" => "200"]);
            }
        }
    }
    public function edit(string $id) {
        $datas = WorkcategoryModel::get();
        $workdata = WorkModel::where("id", $id)->first();
        $video1 = $workdata->video1 != "" ? explode('1**1',$workdata->video1) : '';
        $video2 = $workdata->video2 != "" ? explode('1**1',$workdata->video2) : '';
        $video3 = $workdata->video3 != "" ? explode('1**1',$workdata->video3) : '';
        $video4 = $workdata->video4 != "" ? explode('1**1',$workdata->video4) : '';
        $video5 = $workdata->video5 != "" ? explode('1**1',$workdata->video5) : '';
        $video6 = $workdata->video6 != "" ? explode('1**1',$workdata->video6) : '';
        return view("admin/work/edit", compact("datas", "workdata",'video1','video2','video3','video4','video5','video6'));
    }
    public function update(Request $request, string $id) {
        if ($request->ajax()) {
             $sm_icons = icon($request->all(["fb", "insta", "yt", "pt", "ln", "tw"]));
             $workImages = [];
             if ($request->workimages != "") {
                foreach ($request->workimages as $image) {
                    $workImages[] = fileupload("work", $image);
                }
             }
             if (!empty($workImages) && !empty($request->image_data)) {
                $work_images_files = array_merge($request->image_data, $workImages);
             } elseif (!empty($workImages)) {
                $work_images_files = $workImages;
             } elseif (!empty($request->image_data)) {
                $work_images_files = $request->image_data;
             } else {
                $work_images_files = [];
             }
             $validation = Validator::make($request->all(),[
                  "category" => "required | numeric",
                  "title" => "required | string",
                  "t_image" => "max:2000 | image",
                  "content" => "required",
                  "c_logo" => "max:2000 | image",
                 ]);
             if ($validation->fails()) {
                return response()->json(["code" => "400", "message" => $validation->errors(), ]);
             } else {
                 $work = WorkModel::find($id);
                 if (!$work) {
                    return response()->json(["code" => "404", "message" => "Work not found"], 404);
                 }
                 $filename = $work->thumbnail_image;
                 if ($request->hasFile("t_image")) {
                    $filename = fileupload("work-thumbnail", $request->file("t_image"));
                    if ($work->thumbnail_image) {
                        removeimage($work->thumbnail_image);
                    }
                 }
                 $client_logo_filename = $work->client_logo;
                 if ($request->hasFile("c_logo")) {
                    $client_logo_filename = fileupload("client_logo", $request->file("c_logo"));
                    if ($work->client_logo) {
                        removeimage($work->client_logo);
                    }
                 }
                 $hero_banner_filename = $work->hero_banner;
                 if ($request->hasFile("hero_banner")) {
                    $hero_banner_filename = fileupload("hero_banner", $request->file("hero_banner"));
                    if ($work->hero_banner) {
                        removeimage($work->hero_banner);
                    }
                 }
                  if(!empty($request->v1) && !empty($request->video1)){
                   $video1 = $request->v1.'1**1'.$request->video1;
                  }
                  if(!empty($request->v2) && !empty($request->video2)){
                     $video2 = $request->v2.'1**1'.$request->video2;
                  }
                  if(!empty($request->v3) && !empty($request->video3)){
                     $video3 = $request->v3.'1**1'.$request->video3;
                  }
                  if(!empty($request->v4) && !empty($request->video4)){
                     $video4 = $request->v4.'1**1'.$request->video4;
                  }
                  if(!empty($request->v5) && !empty($request->video5)){
                     $video5 = $request->v5.'1**1'.$request->video5;
                  }
                  if(!empty($request->v6) && !empty($request->video6)){
                     $video6 = $request->v6.'1**1'.$request->video6;
                  }
                 $work->update([
                     "c_id" => $request->category,
                     "title" => $request->title,
                     "slug" => Str::slug($request->title),
                     "thumbnail_image" => $filename,
                     "client_logo" => $client_logo_filename,
                     "hero_banner"=> $hero_banner_filename,
                     "content" => $request->content,
                     "work_images" => $work_images_files,
                     "sm_icons" => $sm_icons,
                     'video1'=>$video1 ?? "",
                     'video2'=>$video2 ?? "",
                     'video3'=>$video3 ?? "",
                     'video4'=>$video4 ?? "",
                     'video5'=>$video5 ?? "",
                     'video6'=>$video6 ?? "",                     
                 ]);

                session()->flash("type", "success");
                session()->flash("message", "Successfully Updated");
                return response()->json(["code" => "200"]);
            }
        }
    }
    public function delete(Request $request) {
        if ($request->ajax()) {
            $work = WorkModel::find($request->id);
            if (!$work) {
                return response()->json(["code" => "404", "message" => "Work not found"], 404);
            }
            foreach ($work->work_images as $image) {
                removeimage($image);
            }
            removeimage($work->thumbnail_image);
            removeimage($work->client_logo);
            removeimage($work->hero_banner);
            $work->delete();
            session()->flash("type", "success");
            session()->flash("message", "Successfully Deleted");
            return response()->json(["code" => "200"]);
        }
        return response()->json(["code" => "400", "message" => "Invalid request"], 400);
    }
    public function getimages(Request $request) {
        if ($request->ajax()) {
            $datas = WorkModel::select("id", "title", "work_images")->where("id", $request->id)->first();
            $html = view("admin.backlayout.show-images", compact("datas"))->render();
            return response()->json(["html" => $html, "message" => "success", ]);
        }
    }
    public function removeimg(Request $request) {
        removeimage($request->img);
        return response()->json(["code" => "200", "message" => "Remove Image"], 200);
    }
}
