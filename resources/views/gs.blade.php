@extends('frontlayout.mainlayout')
@section('section')
<section class="bg">
        <div class="overlay">
            <div class="form-container">
                @if(!session()->has('type') && !session()->has('message'))
                <h2 class="form-header">Gain instant access to watch the free product demo</h2>
                <form action="{{route('front.getstarted.store')}}" method="post">
                    @csrf 
                    @method('POST')
                    <div class="mb-3">                        
                         <label for="companyName" class="form-label">Your company name</label>
                         <input type="text" class="form-control" name="companyName" value="{{old('companyName')}}">
                         @error('companyName')
                          <small class="error badge text-danger fw-medium">{{$message}}</small>
                         @enderror
                    </div>           
                    <div class="mb-3">
                         <label for="locations" class="form-label">Number of locations</label>
                         <select class="form-select" name="locations">
                            <option value="" selected>Number of locations</option>
                            <option value="1">1</option>
                            <option value="2-5">2-5</option>
                            <option value="6-10">6-10</option>
                            <option value="10+">10+</option>
                         </select>
                         @error('locations')
                         <small class="error badge text-danger fw-medium">{{$message}}</small>
                         @enderror
                    </div>
                    <div class="colrow">
                    <div class="mb-3 colrow-group">
                         <label for="fullName" class="form-label">Full name</label>                   
                         <input type="text" class="form-control" name="fullName" value="{{old('fullName')}}">  
                         @error('fullName')
                         <small class="error badge text-danger fw-medium">{{$message}}</small>
                         @enderror                  
                    </div>              
                    <div class="mb-3 colrow-group">
                         <label for="mobileNumber" class="form-label">Mobile number</label>
                         <input type="text" inputmode="numeric" minlength="10" maxlength="10" class="form-control" name="mobileNumber" value="{{old('mobileNumber')}}">
                         @error('mobileNumber')
                         <small class="error badge text-danger fw-medium">{{$message}}</small>
                         @enderror
                    </div>
                  </div>
                    <div class="mb-3">
                         <label for="email" class="form-label">Business email</label>
                         <input type="email" class="form-control" name="email" value="{{old('email')}}">
                         @error('email')
                         <small class="error badge text-danger fw-medium">{{$message}}</small>
                         @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Get Started</button>
                </form>
                <div class="mt-3 text-center">
                    <small>By continuing, you agree to Socialit <a href="{{route('front.pp')}}">Privacy Policy</a> and consent to receive communications from us.</small>
                </div> 
                @else
                <h4 class="mb-3">Thank You!</h4>
                <p>Thanks for showing interset for socialit servies. Our Reputation specialist will contact you within 24 hours to follow up on your interest.</p>
                <a href="tel:+916375610393">Can't wait Call us 6375610393</a>
                @endif
            </div>
        </div>    
</section>
@endsection
