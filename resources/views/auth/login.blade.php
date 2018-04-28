@extends('layouts.app')

@section('content')

<div class="container" >
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default" style="height: 400px;margin-top:100px;background:transparent; border:none;">
                <div class="panel-heading" style="background:transparent; border:none;"><span class="text-danger text-center" style="font-size: 20px;display: block;" >登 录</span></div>
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}" style="margin-bottom: 25px;">
                            <label for="email" class="col-md-4 control-label">邮箱地址</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus style="background:transparent; border:none;box-shadow:0 0 10px 3px #00bfc7;">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}" style="margin-bottom: 25px;">
                            <label for="password" class="col-md-4 control-label">密 码</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required style="background:transparent; border:none;box-shadow:0 0 10px 3px #00bfc7;">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input value="remember me" type="checkbox" name="remember" style="cursor: pointer" {{ old('remember') ? 'checked' : '' }}>
                                        <span class="text-muted">请记住我</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div>

                            
                        </div>
                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    登 录
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    忘记密码？
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
