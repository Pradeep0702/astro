<div class="modal fade" id="blogmodel" tabindex="-1" aria-labelledby="blogmodelLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="blogmodelLabel">Title : {{$data->title}}</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
           <img src="{{asset('upload/'.$data->thumbnail_image)}}" class="img-fluid"/>
           <section id="content" class="my-4">
             {!! $data->content !!}
           </section>           
        </div>
      </div>
    </div>
  </div>