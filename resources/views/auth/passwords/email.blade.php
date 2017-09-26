@extends('layouts.app')

@section('content')
<div class="container auth">
    <div class="col-md-10">
        <div class="card m-3">
            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                <form role="form" method="POST" action="{{ route('password.email') }}">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="email" class="form-control-label">E-Mail Address</label>
                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                        @if ($errors->has('email'))
                            <span class="form-text">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-primary">
                        Send Password Reset Link
                    </button>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection
