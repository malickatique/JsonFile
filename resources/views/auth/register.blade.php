@extends('layouts.app')

@section('content')
<div class="container mb-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <h4 class="text-center"> Basic Info: </h4>
                        <hr>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Full Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row text-md-right">

                                <div class="custom-control custom-radio col-md-6">
                                    <input type="radio" id="individual" name="type" value="individual" class="custom-control-input" checked>
                                    <label class="custom-control-label" for="individual">Individual</label>
                                </div>

                                <div class="custom-control custom-radio col-2">
                                    <input type="radio" id="customRadio2" name="type" value="organization" class="custom-control-input">
                                    <label class="custom-control-label" for="customRadio2">Organization</label>
                                </div>
                        </div>

                        <div id='show-me' style='display:none'>
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Company Name') }}</label>
                                <div class="col-md-6">
                                    <input id="company_name" type="text" class="form-control @error('name') is-invalid @enderror" name="company_name" 
                                    value="{{ old('company_name') }}" autocomplete="company_name" autofocus minlength="3" maxlength="99" >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Position') }}</label>
                                <div class="col-md-6">
                                    <input id="position" type="text" class="form-control @error('name') is-invalid @enderror" name="position" 
                                    value="{{ old('position') }}" autocomplete="position" autofocus minlength="3" maxlength="99" >
                                </div>
                            </div>
                        </div>
                        <hr>
                            <h4 class="text-center"> Address Info: </h4>
                            <hr>

                            <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Street Address') }}</label>
                            <div class="col-md-6">
                                <input id="street" type="text" class="form-control @error('name') is-invalid @enderror" name="street" 
                                value="{{ old('street') }}" required autocomplete="street" autofocus minlength="5" maxlength="99" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Country/Region') }}</label>
                            <div class="col-md-6">
                                <select class="form-control" name="country" id="country" required>
                                    <option value="">Select Country</option>
                                    @foreach ($countries as $country) 
                                        <option value="{{ $country->id }}">
                                            {{ $country->country_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('State/Province') }}</label>
                            <div class="col-md-6">
                                <select class="form-control" name="state" id="state" required>
                                    <!-- <option value="">Select State</option> -->
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Town or City') }}</label>
                            <div class="col-md-6">
                                <select class="form-control" name="city" id="city" required>
                                    <!-- <option value="">Select City</option> -->
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Postal/Zip') }}</label>
                            <div class="col-md-6">
                                <input id="post_code" type="number" class="form-control @error('name') is-invalid @enderror" name="post_code" 
                                value="{{ old('post_code') }}" required autocomplete="post_code" autofocus minlength="3" maxlength="7" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function () { 

    $('input[type="radio"]').click(function() {
       if($(this).attr('id') == 'customRadio2') {
            $('#show-me').show();           
       }
       else {
            $('#show-me').hide();   
       }
   });

   // Ajax address
   $('#country').change(function(){
        var cid = $(this).val();
        if(cid){
        $.ajax({
           type:"get",
           url:"getStates/"+cid, //Please see the note at the end of the post**
           success:function(res)
           {       
                if(res)
                {
                    $("#state").empty();
                    $("#city").empty();
                    $("#state").append('<option>Select State</option>');
                    $.each(res,function(key,value){
                        $("#state").append('<option value="'+key+'">'+value+'</option>');
                    });
                }
           }

        });
        }
    });

    $('#state').change(function(){
        var sid = $(this).val();
        
        if(sid){
        $.ajax({
           type:"GET",
           url:"getCities/"+sid, //Please see the note at the end of the post**
           success:function(res)
           {     
                if(res)
                {
                    $("#city").empty();
                    $("#city").append('<option>Select City</option>');
                    $.each(res,function(key,value){
                        $("#city").append('<option value="'+key+'">'+value+'</option>');
                    });
                }
           }

        });
        }
    }); 

});
</script>

@endsection