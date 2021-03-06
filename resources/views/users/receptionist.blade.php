@extends('...layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="row">
            <div id="custom-search-input">
                {{--search form--}}
                <form class="form-horizontal" method="get" action="{{ route('patientExists') }}">
                    <div class="input-group col-md-offset-3 col-md-6">
                        <input type="text" class="search-query form-control" name="query" placeholder="Search to confirm if a patient exists in our system" />
                        <span class="input-group-btn">
                                    <button class="btn btn-danger" type="button">
                                            <i class="fa fa-search"></i>
                                    </button>
                                    </span>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-10 col-md-offset-1 receptionist-panel">
            <div class="panel">
                <div class="panel-heading green-bg">Add a Patient using the form below:</div>

                <div class="panel-body">
                     <form class="form-horizontal" role="form" method="POST" action="{{ url('/register-patient') }}">
                                            {{ csrf_field() }}

                                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                                <label for="name" class="col-md-4 control-label">Name</label>

                                                <div class="col-md-6">
                                                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}">

                                                    @if ($errors->has('name'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('name') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                                <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                                                <div class="col-md-6">
                                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">

                                                    @if ($errors->has('email'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('email') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }}">
                                                  <label for="gender" class="col-md-4 control-label">Gender</label>

                                                       <div class="col-md-6">
                                                          <div class="radio">
                                                            <label><input type="radio" value="1" name="gender">Male</label>
                                                          </div>
                                                          <div class="radio">
                                                            <label><input type="radio" value="2" name="gender">Female</label>
                                                          </div>

                                                               @if ($errors->has('gender'))
                                                                  <span class="help-block">
                                                                      <strong>{{ $errors->first('gender') }}</strong>
                                                                  </span>
                                                           @endif
                                                       </div>
                                            </div>


                                            <div class="form-group{{ $errors->has('phone_number') ? ' has-error' : '' }}">
                                                <label for="phone_number" class="col-md-4 control-label">Phone Number</label>

                                                <div class="col-md-6">
                                                    <input id="phone_number" type="text" class="form-control" name="phone_number" value="{{ old('phone_number') }}">

                                                    @if ($errors->has('phone_number'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('phone_number') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>


                                            <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                                                <label for="address" class="col-md-4 control-label">Address</label>

                                                <div class="col-md-6">
                                                    <input id="address" type="text" class="form-control" name="address" value="{{ old('address') }}">

                                                    @if ($errors->has('address'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('address') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                                <label for="password" class="col-md-4 control-label">Password</label>

                                                <div class="col-md-6">
                                                    <input id="password" type="password" class="form-control" name="password">

                                                    @if ($errors->has('password'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('password') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                                <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                                                <div class="col-md-6">
                                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation">

                                                    @if ($errors->has('password_confirmation'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-md-6 col-md-offset-6">
                                                    <button type="submit" class="btn btn-primary">
                                                        <i class="fa fa-btn fa-user"></i> Register Patient
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
