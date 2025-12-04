<section id="contactform" class="ptb">
    <div class="container-fluid res-container">
        <div class="row mx-md-5 mx-lg-5 align-items-center">          
            <div class="col-md-6">           
               <form id="contactformsubmit" method="post">
                    @csrf
                    @method('post')
                   <h6 class="font-size-heading text-start">let's Connect We're Here to Assist You</h6>         
                   <div class="row">           
                          <div class="col-md-6">
                              <div class="mb-3">                        
                                  <input name="name" type="text" class="form-control" placeholder="Name">
                                  <span id="name-error" class="badge text-danger fw-medium"></span>
                              </div>                    
                          </div>
                          <div class="col-md-6">
                              <div class="mb-3">                        
                                  <input name="number" inputmode="numeric" maxlength="10" type="text" class="form-control" placeholder="Number">
                                  <span id="number-error" class="badge text-danger fw-medium text-wrap"></span>
                              </div>                    
                          </div>  
                          <div class="col-md-6">
                              <div class="mb-3">                        
                                  <input name="email" type="email" class="form-control" placeholder="Email">
                                  <span id="email-error" class="badge text-danger fw-medium text-wrap"></span>
                              </div>                    
                          </div>  
                          <div class="col-md-6">
                              <div class="mb-3"> 
                                   <select class="form-control" name="country" id="result-list"></select>
                                   <span id="country-error" class="badge text-danger fw-medium text-wrap"></span>
                              </div>                    
                          </div>
                          <div class="col-md-12">                         
                            <textarea name="message" class="form-control" placeholder="Message"></textarea>
                           </div>
                           <button class="btn btn-primary" id="submitbtn">Submit</button>
                      </div>  
                  </form>
            </div>   
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-4">                 
                            <h6><img src="{{asset('/images/india.webp')}}" class="img-fluid"/> H-14(B), Electronic Complex, Road No.1, IPIA,<br> Kota, Rajasthan 324009</h6>
                            <a href="tel:{{config('constant.phoneLink')}}"><img src="{{asset('/images/india.webp')}}" class="img-fluid"/> {{config('constant.phone')}}</a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-4">                 
                            <h6><img src="{{asset('/images/us.webp')}}" class="img-fluid"/> 1751 2nd Ave, New York City,<br> NY, 10128</h6>
                        </div>
                    </div>
                </div> 
                <div class="marquee">
                    <div class="left"></div>
                    <div class="slide">
                        <h4>Schedule a meeting</h4>     
                        <h4>Schedule a meeting</h4> 
                    </div>
                    <div class="slide">
                        <h4>Schedule a meeting</h4>     
                        <h4>Schedule a meeting</h4> 
                    </div> 
                    <div class="right"></div>                            
                </div>            
            </div>           
        </div>
    </div>   
   </section>
   @push('js')
   <script>
    const notyf = new Notyf({dismissible: true,position: {x: 'right', y: 'top',}});
    $('#contactformsubmit').on('submit',function(e){
       e.preventDefault();
       $('#submitbtn').html('<div class="spinner-border" role="status"></div>');
       $('#submitbtn').attr('disabled',true); 
       $('#name-error').empty();   
       $('#number-error').empty();   
       $('#email-error').empty();  
       $('#country-error').empty(); 
       $.ajax({
           url:"{{route('contact.store')}}",
           type:'POST',
           data:$('#contactformsubmit').serialize(),
           success:function(res){
             $('#submitbtn').html('Submit');
             $('#submitbtn').attr('disabled',false); 
             if(res.code == 400){
                 $('#name-error').html(res.message.name); 
                 $('#number-error').html(res.message.number);
                 $('#email-error').html(res.message.email);
                 $('#country-error').html(res.message.country);
             }
             if(res.code == 200){
                notyf.success('Successfully submitted'); 
                $('#contactformsubmit')[0].reset();
             }
           }
       });
     });
     function countrydata(){
        $.ajax({
            url:"{{route('contact.getcountry')}}",
            type:"get",            
            success:function(res){
                res.forEach(element => { 
                   $('#result-list').append(`<option ${element.name == 'INDIA' ? 'selected' : ''} value='${element.name}'>${element.name}</option>`)                   
                });             
             }
          })
     }  
     countrydata();
</script>  
@endpush
 