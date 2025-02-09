<x-adminlayout title="Create Page"> 
    <div class="content-wrapper">
        <div>
            <a href="{{route('service.index')}}" class="btn btn-primary f-14"><i class="fas fa-long-arrow-alt-left"></i> Back</a>
        </div> 
        <form id="submitform" method="post" enctype="multipart/form-data">
        @csrf
        @method('post')
        <div class="card mt-3">
            <div class="card-header py-3"><h5>Select Category</h5></div>
            <div class="card-body">             
                  <div class="row">
                      <div class="col-md-12">                    
                          <x-form labelname="Service Category" name="cat_id">
                            <select name="cat_id" class="form-control text-capitalize">
                             <option value="">Select Category</option>   
                             @foreach($categories as $category)   
                             <option class="text-capitalize" value="{{$category->id}}">{{$category->category_name}}</option>
                             @endforeach
                            </select>
                          </x-form>                                          
                      </div>                                           
                  </div>                       
            </div>
         </div>
         <div class="card mt-3">
            <div class="card-header py-3"><h5>Menu Show Category Name</h5></div>
            <div class="card-body">             
                  <div class="row">
                      <div class="col-md-12">                    
                         <x-form labelname="Menu name" name="menu_name">
                            <input type="text" name="menu_name" class="form-control f-14" placeholder="Menu Name"/>
                         </x-form>   
                         <span class="text-danger badge">Note : The slug will be created based on this menu name and will appear in the menu.</span>                                     
                      </div>                        
                  </div>                       
            </div>
         </div>
        <div class="card mt-3">
            <div class="card-header py-3"><h5>Meta Data SEO</h5></div>
            <div class="card-body">             
                  <div class="row">
                      <div class="col-md-12">                    
                          <x-form labelname="Meta Title" name="meta_title" :danger=false>
                             <input type="text" name="meta_title" class="form-control f-14" placeholder="Meta Title"/>
                          </x-form>
                          <x-form labelname="Meta Keywords" name="meta_keywords" :danger=false>
                            <input type="text" name="meta_keywords" class="form-control f-14" placeholder="Meta Keywords"/>
                         </x-form>
                         <x-form labelname="Meta Description" name="meta_desc" :danger=false>
                            <input type="text" name="meta_desc" class="form-control f-14" placeholder="Meta Description"/>
                         </x-form>                    
                      </div>                        
                  </div>                       
            </div>
         </div>
        <div class="card mt-3">
           <div class="card-header py-3"><h5>Hero Section</h5></div>
           <div class="card-body">             
                 <div class="row">
                     <div class="col-md-12">                    
                         <x-form labelname="Page Title" name="page_title" :danger=false>
                            <input type="text" name="page_title" class="form-control f-14" placeholder="Page Title"/>
                         </x-form>
                         <x-form labelname="Page Description" name="page_description" :danger=false>                         
                            <textarea name="page_description" class="form-control f-14"></textarea>
                         </x-form>
                     </div>                        
                 </div>                       
           </div>
        </div> 
        <div class="card mt-3">
            <div class="card-header py-3"><h5>Card Information Section</h5></div>
            <div class="card-body">             
                  <div class="row">
                      <div class="col-md-12">                    
                          <x-form labelname="Section Heading" name="section_heading" :danger=false>
                             <input type="text" name="section_heading" class="form-control f-14" placeholder="Section Heading"/>
                          </x-form>
                          <div class="row">
                             <div class="col-md-4">
                                 <x-form labelname="Card Icon 1" name="card_icon_1" :danger=false>
                                    <input type="text" name="card_icon_1" class="form-control f-14" placeholder="Card Icon"/>
                                 </x-form>
                                <x-form labelname="Card Title 1" name="card_title_1" :danger=false>
                                    <input type="text" name="card_title_1" class="form-control f-14" placeholder="Card Title"/>
                                 </x-form>
                                 <x-form labelname="Card Description" name="card_description_1" :danger=false>                         
                                    <textarea name="card_description_1" class="form-control f-14"></textarea>
                                 </x-form>
                             </div>
                             <div class="col-md-4">
                              <x-form labelname="Card Icon 2" name="card_icon_2" :danger=false>
                                 <input type="text" name="card_icon_2" class="form-control f-14" placeholder="Card Icon"/>
                              </x-form>
                                <x-form labelname="Card Title 2" name="card_title_2" :danger=false>
                                    <input type="text" name="card_title_2" class="form-control f-14" placeholder="Card Title"/>
                                 </x-form>
                                 <x-form labelname="Card Description" name="card_description_2" :danger=false>                         
                                    <textarea name="card_description_2" class="form-control f-14"></textarea>
                                 </x-form>
                             </div>
                             <div class="col-md-4">
                              <x-form labelname="Card Icon 3" name="card_icon_3" :danger=false>
                                 <input type="text" name="card_icon_3" class="form-control f-14" placeholder="Card Icon"/>
                              </x-form>
                                <x-form labelname="Card Title 3" name="card_title_3" :danger=false>
                                    <input type="text" name="card_title_3" class="form-control f-14" placeholder="Card Title"/>
                                 </x-form>
                                 <x-form labelname="Card Description" name="card_description_3" :danger=false>                         
                                    <textarea name="card_description_3" class="form-control f-14"></textarea>
                                 </x-form>
                             </div>
                          </div>                         
                      </div>                        
                  </div>                          
            </div>
        </div> 
        <div class="card mt-3">
            <div class="card-header py-3"><h5>Page Banner Section</h5></div>
            <div class="card-body">             
                  <div class="row">
                      <div class="col-md-12"> 
                        <x-form labelname="Page Banner Image" name="page_banner_image" :danger=false>
                            <input accept="image/webp" type="file" class="form-control file" name="page_banner_image">
                         </x-form>                        
                          <x-form labelname="Page Banner Title" name="page_banner_title" :danger=false>
                             <input type="text" name="page_banner_title" class="form-control f-14" placeholder="Banner Title"/>
                          </x-form>
                          <x-form labelname="Page Banner Sub Title" name="page_banner_subtitle" :danger=false>
                            <input type="text" name="page_banner_subtitle" class="form-control f-14" placeholder="Banner Sub Title"/>
                         </x-form>
                          <x-form labelname="Banner Description" name="page_banner_description" :danger=false>                         
                             <textarea name="page_banner_description" class="form-control f-14"></textarea>
                          </x-form>
                      </div>                        
                  </div>                       
            </div>
         </div>
         <div class="card mt-3">
            <div class="card-header py-3"><h5>Main Center Section</h5></div>
            <div class="card-body" id="divmain">             
                <div class="row form-group mb-4 dynamic-group" data-index="1">
                      <div class="col-md-6"> 
                        <x-form labelname="Sub Title" name="center_1_subtitle" :danger=false>
                            <input type="text" name="center[1][subtitle]" class="form-control f-14" placeholder="Sub Title"/>
                         </x-form>                                           
                          <x-form labelname="Title" name="center_1_title" :danger=false>
                             <input type="text" name="center[1][title]" class="form-control f-14" placeholder="Title"/>
                          </x-form>                         
                          <x-form labelname="Description" name="center_1_description">                         
                             <textarea name="center[1][description]" class="form-control f-14"></textarea>
                          </x-form>
                      </div> 
                      <div class="col-md-6">
                        <x-form labelname="Banner Image" name="center_1_banner_image" :danger=false>
                            <input type="file" class="form-control file" name="center[1][banner_image]">
                         </x-form>   
                      </div>                     
                </div> 
            </div>
            <button class="btn btn-warning f-14 mb-2 mx-2" type="button" id="addmore">Add More</button>
         </div> 
         <div class="card mt-3">
            <div class="card-header py-3"><h5>Faq Section</h5></div>
            <div class="card-body">             
                <div class="row form-group mb-4" id="faqgrp">
                    <div class="faq-dynamic-div pb-4" data-faqindex="1">
                        <x-form labelname="Question" name="faq_1_q" :danger=false>
                            <input type="text" name="faq[1][q]" class="form-control f-14" placeholder="Question"/>
                         </x-form>  
                         <x-form labelname="Answer" name="faq_1_ans" :danger=false>
                            <input type="text" name="faq[1][ans]" class="form-control f-14" placeholder="Answer"/>
                         </x-form> 
                    </div>                                         
                </div>                
            </div>
            <button class="btn btn-warning f-14 mb-2 mx-2" type="button" id="addmorefaq">Add More Faq</button>
         </div>
     <button class="btn btn-primary f-14 mt-5" id="submitbtn">Submit <i class="fas fa-long-arrow-alt-right"></i></button>
    </form> 
     </div>    
@push('js')
<script>
    $('#submitform').on('submit',function(e){
        e.preventDefault();
        $('.validation-error').empty();
        $('#submitbtn').html('<div class="spinner-border" role="status"></div> Loading...');
        $('#submitbtn').attr('disabled',true)
        const formdata = new FormData(this);
        $.ajax({
            url:"{{route('service.store')}}",
            type: 'POST',
            data: formdata,
            contentType: false,
            processData: false,
            success:function(res){
                     if(res.code == 200){
                       window.location.href="{{route('service.index')}}"
                     }    
                     if(res.code == 400){
                        $.each(res.message, function(key, value) { 
                            var searchString = "."; 
                            var replaceString = "_"; 

                            if (key.includes(searchString)) {
                                key = key.replace('.', '_')
                                key = key.replace('.', '_')
                                console.log(key);
                            } else {
                               
                            }

                            $(`#${key}`).html(value); 
                        });
                     }  
                     if(res.code == 500){                    
                              Toast.fire({
                              icon: "error",
                              title: `${res.message} ${res.error}`
                         });
                     }              
                     $('#submitbtn').html('Submit <i class="fas fa-long-arrow-alt-right"></i>');
                     $('#submitbtn').attr('disabled',false)     
                }
            }) 
    });
    
 // ===================================== Faq Section =============================================== 

 function faqdiv(faqindex){
  
    const faqdiv = `<div class="faq-dynamic-div border-top border-primary pt-4 pb-4" data-faqindex="${faqindex}">
                        <x-form labelname="Question" name="faq_${faqindex}_q" :danger=false>
                            <input type="text" name="faq[${faqindex}][q]" class="form-control f-14" placeholder="Question"/>
                         </x-form>  
                         <x-form labelname="Answer" name="faq_${faqindex}_ans" :danger=false>
                            <input type="text" name="faq[${faqindex}][ans]" class="form-control f-14" placeholder="Answer"/>
                         </x-form> 
                    <button type="button" class="w-25 btn btn-danger remove-btn-faq" data-faqindex="${faqindex}"><i class="fas fa-trash-alt"></i></button>
                    </div>`;
        return faqdiv;
 }

   let faqindex = 2;
   $('#addmorefaq').click(function () {
            $('#faqgrp').append(faqdiv(faqindex));            
            faqindex++;             
    });

    $('body').on('click', '.remove-btn-faq', function () {
        const index = $(this).data('faqindex');    
        $(`.faq-dynamic-div[data-faqindex="${index}"]`).remove();
    })

 // ===================================== Main Div Center =============================================== 
 
 
 function dynamicmaindiv(index){
    const dynamicdiv = ` <div class="row form-group mb-4 pt-4 dynamic-group border-top border-primary pt-4 pb-4" data-index="${index}">
                      <div class="col-md-6"> 
                        <x-form labelname="Sub Title" name="center_${index}_subtitle" :danger=false>
                            <input type="text" name="center[${index}][subtitle]" class="form-control f-14" placeholder="Sub Title"/>
                         </x-form>                                           
                          <x-form labelname="Title" name="center_${index}_title" :danger=false>
                             <input type="text" name="center[${index}][title]" class="form-control f-14" placeholder="Title"/>
                          </x-form>                         
                          <x-form labelname="Description" name="center_${index}_description" :danger=false>                         
                             <textarea name="center[${index}][description]" class="form-control f-14"></textarea>
                          </x-form>
                      </div> 
                      <div class="col-md-6">
                        <x-form labelname="Banner Image" name="banner_image_${index}" :danger=false>
                            <input accept="image/webp" type="file" class="form-control file" name="center[${index}][banner_image]">
                         </x-form>   
                      </div> 
                      <div class="col-12 mt-2">
                        <button type="button" class="w-25 btn btn-danger remove-btn" data-index="${index}"><i class="fas fa-trash-alt"></i></button>
                      </div>
                </div> ` ;                
       return dynamicdiv;
 }     

    let index = 2;
    $('#addmore').click(function () {  

                $('#divmain').append(dynamicmaindiv(index));
                $('.file').not('.dropify-initialized').dropify();
                index++;             
    });

    $('body').on('click', '.remove-btn', function () {
        const index = $(this).data('index');    
        $(`.dynamic-group[data-index="${index}"]`).remove();
    }) 
</script>        
@endpush
</x-adminlayout>
