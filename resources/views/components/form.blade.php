@php
    $socialMediaKeys = ['fb', 'yt', 'insta', 'ld', 'pt', 'tw'];
@endphp
<div class="mb-3">
    <label class="form-label">{{$labelname}} 
      @if(!in_array($name, $socialMediaKeys))
      <span class='text-danger'>*</span>
      @endif
    </label>
    {{$slot}}
    <div class="text-danger validation-error badge text-wrap" id="{{$name}}"></div>
</div>