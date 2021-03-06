@extends('layouts.master')

@section('content')

  <div class="col-md-6 col-md-offset-3">

  	<h1>Edit Your Account</h1>

  	</br>

  	@if($errors->has())
  		<ul>
  	   	@foreach ($errors->all() as $error)
  	      <li>{{ $error }}</li>
  	  	@endforeach
  	  </ul>
  	@endif

  	{{ Form::model($user, array('route' => array('user.update', $user->id), 'method' => 'PUT')) }}

  	 <div class="form-group {{ $errors -> has('username') ? 'has-error' : ''}}">
        <label for="username"> Enter Username </label>
        <input id="username" class="form-control" type="text" name="username" value="@if(isset($request)) {{ $request['username'] }} @else {{ $user['username'] }} @endif">
      </div>

      <div class="form-group {{ $errors -> has('email') ? 'has-error' : ''}}">
        <label for="email"> Enter Email </label>
        <input id="email" class="form-control" type="text" name="email" value="@if(isset($request)) {{ $request['email'] }} @else {{ $user['email'] }} @endif">
      </div>

      <div class="form-group {{ $errors -> has('password') ? 'has-error' : ''}}">
        <label for="password"> Enter Password </label>
        <input id="password" class="form-control" type="password" name="password" value="">
      </div>

      <div class="form-group">

        @if (Auth::user()->isAdmin())
          <label for="admin"> Make Admin User </label>
          <input class="checkbox-inline" id="admin" type="checkbox" name="admin" @if(isset($request['admin'])) checked @elseif($user['admin'] === '1') checked @endif> 
        @endif 

      </div>

  		{{ Form::submit('Submit', array('class' => 'btn btn-primary')) }}

  	{{ Form::close() }}

  </div>

@endsection