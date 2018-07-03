@component( 'sections.box' )

    @slot('title')
        Sign In
    @endslot

<div class="col-md-12">
  <form class="form-horizontal" method="POST" action="{{ route('login') }}">
      {{ csrf_field() }}

      <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
          <label for="email" class="control-label">Email</label>
          <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

          @if ($errors->has('email'))
              <span class="help-block">
                  <strong>{{ $errors->first('email') }}</strong>
              </span>
          @endif
      </div>

      <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
          <label for="password" class="control-label">Password</label>
          <input id="password" type="password" class="form-control" name="password" required>

          @if ($errors->has('password'))
              <span class="help-block">
                  <strong>{{ $errors->first('password') }}</strong>
              </span>
          @endif
      </div>

      <div class="form-group">
          <div class="checkbox">
              <label>
                  <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
              </label>
          </div>
      </div>

      <div class="form-group">
          <button type="submit" class="btn btn-success col-6 login-btn">
              Login
          </button>

          <a class="btn btn-link" href="{{ route('password.request') }}">
              Forgot Your Password?
          </a>
      </div>
  </form>
</div>


@endcomponent
