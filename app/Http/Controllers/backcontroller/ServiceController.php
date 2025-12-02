<?php

namespace App\Http\Controllers\backController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ServiceCategoryModel;
use App\Models\ServiceModel;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Mockery\Expectation;
use Yajra\DataTables\Facades\DataTables;

class ServiceController extends Controller
{
    public function index(){        
        return view('admin/service/index');
    }
   
    public function create(){ 
        $categories = ServiceCategoryModel::orderBy('order')->get();
        return view('admin/service/create',compact('categories'));
    }

    public function getdata(Request $request){
        if($request->ajax()){
            $servce = ServiceModel::with('categoryname')->select(['id','cat_id','menu_name','menu_slug','status'])->get();
            return DataTables::of($servce)->addIndexColumn() 
            ->addColumn('cat_name',function($catnames){
                $category_name="";
                foreach($catnames->categoryname as $catname){
                    $category_name=$catname->category_name;
                }

                return $category_name;
            })
            ->addColumn('status', function ($action) {  
                $statusbtntext = $action->status == 'active' ? 'Active' : 'Deactive';  
                $statusbtncolor = $action->status == 'active' ? 'success' : 'danger';         
                $statusbtn = '<a class="py-2 px-2 btn fw-medium f-12 badge bg-'.$statusbtncolor.'" onclick="statuschange('.$action->id.');"  href="javascript:void(0)">'.$statusbtntext.'</a>';
                return  $statusbtn;
            })
            ->addColumn('action', function ($action) {              
                $actionbtn = '<a class="py-2 px-2 btn fw-medium f-12 badge bg-success" href="'.route('service.edit',$action->id).'"><i class="fas fa-edit"></i></a> 
                <a class="py-2 px-2 btn fw-medium f-12 badge bg-danger" onclick="deletedata('.$action->id.');"  href="javascript:void(0)"><i class="fas fa-trash"></i></a>';
                return  $actionbtn;
            })  
            ->rawColumns(['action','status'])
            ->make(true);
        }
    }
    
    public function store(Request $request){

        if ($request->ajax()) { 

            $validation = Validator::make($request->all(),[
               'cat_id' => 'required ',
               'menu_name' => 'required | string | unique:service_page,menu_name',

               'page_banner_image' => 'nullable|file|mimes:jpeg,png,jpg,webp|max:2048',
               'page_banner_title' => 'nullable|string|max:255',
               'page_banner_subtitle' => 'nullable|string|max:255',
               'page_banner_description' => 'nullable|string|max:500',

               'center.*.banner_image' => 'nullable|file|mimes:jpeg,png,jpg,webp|max:2048',
               'center.*.subtitle' => 'nullable|string|max:255',
               'center.*.title' => 'nullable|string|max:255',
               'center.*.description' => 'nullable|string|max:500',
               
           ],[
            'cat_id' => 'The Category filed is required',
           ]);

           if ($validation->fails()) {
               return response()->json(['code' => '400', 'message' => $validation->errors(), ]);
           } else {

            try{
                
            $main_section=[];
            $faq_section=[];

            $main_section[] = [
                "main_center_section_title" => $request->main_center_section_title
            ];
         
            foreach($request->center as $data){
                $filename = isset($data['banner_image']) ? fileupload('service', $data['banner_image']) : "";
                $main_section[] = [
                    'title'=>$data['title']  ?? "",
                    'subtitle'=>$data['subtitle']  ?? "",
                    'description'=>$data['description']  ?? "",
                    'image'=>$filename
                ]; 
            }

            foreach($request->faq as $data){
                $faq_section[] = [
                    'q'=>$data['q']  ?? "",
                    'ans'=>$data['ans']  ?? "",                 
                ]; 
            }

 

            $create = ServiceModel::create([
                'cat_id'=>$request->cat_id,
                'menu_name'=>$request->menu_name,
                'menu_icon'=>$request->icon,
                'menu_slug'=>str::slug($request->menu_name),
                'meta_data'=>[
                    'title'=>$request->meta_title ?? "",
                    'keywords'=>$request->meta_keywords  ?? "",
                    'des'=>$request->meta_desc  ?? "",
                ],
                'hero_section'=>[
                    'title'=>$request->page_title  ?? "",
                    'description'=>$request->page_description  ?? "",
                ],
                'info_card_section'=>[
                     'heading'=>$request->section_heading  ?? "",
                     'card1'=>[
                        'icon'=>$request->card_icon_1  ?? "",
                        'title'=>$request->card_title_1  ?? "",
                        'description'=>$request->card_description_1  ?? ""
                     ],
                     'card2'=>[
                        'icon'=>$request->card_icon_2  ?? "",
                        'title'=>$request->card_title_2 ?? "",
                        'description'=>$request->card_description_2  ?? ""
                     ],
                     'card3'=>[
                        'icon'=>$request->card_icon_3  ?? "",
                        'title'=>$request->card_title_3  ?? "",
                        'description'=>$request->card_description_3  ?? ""
                     ]
                 ],
                'page_banner_section'=>[
                    'image'=> isset($request->page_banner_image) ? fileupload('service',$request->page_banner_image) : "",
                    'title'=>$request->page_banner_title  ?? "",
                    'subtitle'=>$request->page_banner_subtitle  ?? "",
                    'description'=>$request->page_banner_description  ?? "",                    
                ],
                'main_section'=>$main_section,
                'bottom_content'=>$request->bottom_content  ?? "",
                'faq_section'=>$faq_section 
            ]);  
            
            if($create){
                session()->flash('type', 'success');
                session()->flash('message', 'Successfully Created');
                return response()->json(['code' => '200']);
            }else{
                return response()->json(['code' => '400','Something Went Wrong']); 
            }

            } catch (\Exception $e) {
               return response()->json(['code' => '500', 'message' => 'Something Went Wrong', 'error' => $e->getMessage()]);
            }
            
           }
       }    
    }   

    public function edit(string $id){
        $editdata = ServiceModel::find($id);
        $categories = ServiceCategoryModel::orderBy('order')->get();
        if($editdata){ 
            return view('admin/service/edit',compact('editdata','categories')); 
        }else{
            abort('404');
        }
    }

    
    public function update(Request $request, string $id){

        try{            
        $main_section = [];
        $faq_section = [];
        
        $main_section[] = [
            "main_center_section_title" => $request->main_center_section_title
        ];
        
        foreach ($request->faq as $data) {
            $faq_section[] = [
                'q' => $data['q'],
                'ans' => $data['ans'],
            ];
        }  

        $service = ServiceModel::find($id);
        foreach($request->center as $index => $data){ 
            $filename = null;
            $dataIndex = $index - 1;
            if(!empty($data['banner_image'])){  
                if(isset($data['banner_image'])){
                     $filename = fileupload('service', $data['banner_image']);
                     removeimage($service->main_section[$dataIndex]['image']);
                }else{
                     $filename="";
                }              
           
            }else{          
                $filename = isset( $service->main_section[$dataIndex]['image']) ?  $service->main_section[$dataIndex]['image'] : '';                
            }     

            $main_section[] = [
                'title'=>$data['title'],
                'subtitle'=>$data['subtitle'],
                'description'=>$data['description'],
                'image'=>$filename
            ]; 
        }             
      
        // PageBanner Image Condition  

        if (!empty($request->page_banner_image)) {
            $uploadedImage = fileupload('service', $request->page_banner_image);
            if ($uploadedImage) {
                if(isset($service->page_banner_section['image'])){
                    removeimage($service->page_banner_section['image']);
                    $imagePath = $uploadedImage;
                }else{
                    $imagePath ="";
                }
            } else {
                $imagePath = $service->page_banner_section['image'];
            }
        } else {
            $imagePath = isset($service->page_banner_section['image']) ? $service->page_banner_section['image'] : '' ;
        }

        if ($request->main_category_page == 'yes') {
                ServiceModel::where('cat_id', $request->cat_id)->update(['main_category_page' => '0']);
                $mainCategoryValue = '1';
        } else {
                $mainCategoryValue = '0';
        }

        $update = $service->update([
            'cat_id' => $request->cat_id,
            'menu_name' => $request->menu_name,
            'menu_slug' => str::slug($request->menu_name),
            'main_category_page'=> $mainCategoryValue,
            'meta_data' => [
                'title' => $request->meta_title,
                'keywords' => $request->meta_keywords,
                'des' => $request->meta_desc
            ],
            'hero_section' => [
                'title' => $request->page_title,
                'description' => $request->page_description,
            ],
            'info_card_section'=>[
                'heading'=>$request->section_heading,
                'card1'=>[
                   'icon'=>$request->card_icon_1,
                   'title'=>$request->card_title_1,
                   'description'=>$request->card_description_1
                ],
                'card2'=>[
                   'icon'=>$request->card_icon_2,
                   'title'=>$request->card_title_2,
                   'description'=>$request->card_description_2
                ],
                'card3'=>[
                   'icon'=>$request->card_icon_3,
                   'title'=>$request->card_title_3,
                   'description'=>$request->card_description_3
                ]
            ],
            'page_banner_section' => [
                'image' => $imagePath,
                'title' => $request->page_banner_title,
                'subtitle' => $request->page_banner_subtitle,
                'description' => $request->page_banner_description,
            ],
            'main_section' => $main_section,
            'bottom_content'=>$request->bottom_content  ?? "",
            'faq_section' => $faq_section
        ]);

        if($update){
            session()->flash('type', 'success');
            session()->flash('message', 'Successfully Updated');
            return response()->json(['code' => '200']);
        }else{
            return response()->json(['code' => '400','Something Went Wrong']); 
        } 

        } catch (\Exception $e) {
            return response()->json(['code' => '500', 'message' => 'Something Went Wrong', 'error' => $e->getMessage()]);
        }
     
        
    }

  
    public function delete(Request $request)
    {
        
        $data = ServiceModel::select('page_banner_section','main_section')->find($request->id);        
        $delete = $data->where('id',$request->id)->delete();
        if($delete){        
            removeimage($data->page_banner_section['image']);
            foreach($data->main_section as $mainsection){           
                removeimage($mainsection['image']);
            }   
            session()->flash('type', 'success');
            session()->flash('message', 'Successfully Deleted');
            return response()->json(['code' => '200']);
        }  

    }
}
