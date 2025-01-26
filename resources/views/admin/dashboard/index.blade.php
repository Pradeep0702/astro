<x-adminlayout title="Dashboard"> 
   <div class="px-4 py-2 border-top-0 emp-dashboard">
      <div class="d-lg-flex d-md-flex d-block py-3 pb-4 align-items-center">
         <div id="welcome">       
            <h3 class="heading-h3 mb-0 f-21 font-weight-bold">Welcome {{ucwords(Auth::guard('admin_login')->user()->name)}}</h3>
           
         </div>                
      </div>              
   </div>
   <div class="content-wrapper">
      <div class="container-fluid">
          <div class="row g-4">    
            @if(Auth::guard('admin_login')->user()->role == 'admin')    
            <x-dashboardcard name="Testimonial" icon="star" href="{{route('testimonial.index')}}" count="{{$testimonial}}"/>
            <x-dashboardcard name="Career" icon="graduation-cap" href="{{route('career.index')}}" count="{{$career}}"/>
            <x-dashboardcard name="Blog Category" icon="book" href="{{route('blog-category.index')}}" count="{{$b_cat}}"/>
            <x-dashboardcard name="Blog" icon="book" href="{{route('blog.index')}}" count="{{$blog}}"/>
            <x-dashboardcard name="Work Category" icon="box" href="{{route('work-category.index')}}" count="{{$w_cat}}"/>
            <x-dashboardcard name="Work" icon="box" href="{{route('work.index')}}" count="{{$work}}"/>
            <x-dashboardcard name="Resume" icon="graduation-cap" href="{{route('jobresume.index')}}" count="{{$resume}}"/>
            <x-dashboardcard name="Contact" icon="phone-alt" href="{{route('contact.index')}}" count="{{$contact}}"/>
            @endif
            <x-dashboardcard name="Pending Blogs" icon="book" href="{{route('blog.pendingblogs')}}" count="{{$pendingblogs}}"/>
          </div>
      </div> 
   </div>
</x-adminlayout>