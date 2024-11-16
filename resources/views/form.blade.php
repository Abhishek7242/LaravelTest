@extends('layouts/main')
@push('title')
    Home
@endpush
@section('main-section')

<div class="container">
    <h1>{{$title}}</h1>
    <form class="d-flex flex-column bg-dark text-white p-4" action="{{$url}}" method="POST">
          @csrf 
          <div class="d-flex flex-wrap">

            <x-input value="{{ old('name', !$customer?'':$customer->name) }}" type='text' name="name" label="Username"/>
          <x-input  value="{{ old('email', !$customer?'':$customer->email) }}" type='email' name="email" label="Email"/>
        <x-input   type='password' name="password" label="Password"/>
      <x-input   type='password' name="confirm_password" label="Confirm Password"/>
    <x-input   value="{{ old('country',  !$customer?'':$customer->country) }}" type='text' name="country" label="Country"/>
  <x-input  value="{{ old('state', !$customer?'':$customer->state) }}" type='text' name="state" label="State"/>
<x-input  value="{{ old('address',!$customer?'':$customer->address) }}" type='text' name="address" label="Address"/>
</div>
<div class="d-flex w-25 flex-column">
<h3>Gender</h3>
<div class="d-flex w-75">

  <x-input type='radio' name="gender" class="form-check-input" label="Male" value="M" checked="{{ old('gender') == 'checked' ? 'checked' : 'checked' }}" />
<x-input type='radio' name="gender" class="form-check-input" label="Female"  checked="{{ old('gender', !$customer?'':$customer->gender) == 'F' ? 'checked' : '' }}" value="F"/>
<x-input type='radio' name="gender" class="form-check-input" label="Others"  checked="{{ old('gender',!$customer?'':$customer->gender) == 'O' ? 'checked' : '' }}" value="O" />
</div>
   </div>

     <x-input  value="{{!$customer?'':$customer->dob}}" type='date' name="dob"  label="DOB"/>

  {{-- <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div> --}}
  
  <button type="submit" class="btn btn-primary w-25">Submit</button>
</form></div>

@endsection