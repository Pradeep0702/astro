@props([
    'labelname' => $labelname,
    'name' => $name,
    'danger' => true
])
<div class="mb-3">
    @if(!empty($labelname))<label class="form-label">{{$labelname}}@endif
      @if($danger)
      <span class='text-danger'>*</span>
      @endif
    </label>
    {{$slot}}
    <div class="text-danger validation-error badge text-wrap" id="{{$name}}"></div>
</div>