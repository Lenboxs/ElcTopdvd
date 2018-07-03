@component( 'sections.box' )

    @slot('title')
        Sign Up
    @endslot
<div class="col-md-12">
    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
        {{ csrf_field() }}

        <div class="form-group{{ $errors->has('register-name') ? ' has-error' : '' }}">
            <label for="register-name" class="control-label">Name</label>

            <input id="register-name" type="text" class="form-control" name="register-name" value="{{ old('register-name') }}" required autofocus>

            @if ($errors->has('register-name'))
                <span class="help-block">
                    <strong>{{ $errors->first('register-name') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group{{ $errors->has('register-email') ? ' has-error' : '' }}">
            <label for="register-email" class="control-label">Email</label>

            <input id="register-email" type="email" class="form-control" name="register-email" value="{{ old('register-email') }}" required>

            @if ($errors->has('register-email'))
                <span class="help-block">
                    <strong>{{ $errors->first('register-email') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group{{ $errors->has('register-password') ? ' has-error' : '' }}">
            <label for="register-password" class="control-label">Password</label>

            <input id="register-password" type="password" class="form-control" name="register-password" required>

            @if ($errors->has('register-password'))
                <span class="help-block">
                    <strong>{{ $errors->first('register-password') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group">
            <label for="password-confirm" class="control-label">Confirm Password</label>

            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>

        </div>

        <br />

        <div class="form-group">
            <button type="submit" class="btn btn-success col-md-12 register-btn">
                Register
            </button>
        </div>
    </form>
    </div>
@endcomponent
