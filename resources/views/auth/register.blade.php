@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2" style="margin-top: 60px; margin-left: 140px">
            <div class="panel panel-default" style="background:transparent; border:none;">
                <div class="panel-heading" style="background:transparent; border:none; text-align: center;">Register</div>
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}" style="margin-bottom: 25px;">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus style="background:transparent; border:none;box-shadow:0 0 10px 3px #00bfc7;"> 

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group" style="margin-bottom: 25px;">
                            <label for="password-confirm" class="col-md-4 control-label">nickname</label>

                            <div class="col-md-6">
                                <input  type="text" class="form-control" name="nickname" required style="background:transparent; border:none;box-shadow:0 0 10px 3px #00bfc7;">
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}" style="margin-bottom: 25px;">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required style="background:transparent; border:none;box-shadow:0 0 10px 3px #00bfc7;">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}" style="margin-bottom: 25px;">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required style="background:transparent; border:none;box-shadow:0 0 10px 3px #00bfc7;">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group" style="margin-bottom: 25px;">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required style="background:transparent; border:none;box-shadow:0 0 10px 3px #00bfc7;">
                            </div>
                        </div>

                        <div class="form-group" style="margin-bottom: 25px;">
                            <div class="col-md-6 col-md-offset-4" style="margin-left: 69.333333%">
                                <button type="submit" class="btn btn-primary" >
                                    Register
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
