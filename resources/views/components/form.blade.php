@props([
    'danger' => true
])
<div class="mb-3">
    <label class="form-label">{{$labelname}} 
      @if($danger)
      <span class='text-danger'>*</span>
      @endif
    </label>
    {{$slot}}
    <div class="text-danger validation-error badge text-wrap" id="{{$name}}"></div>
</div>