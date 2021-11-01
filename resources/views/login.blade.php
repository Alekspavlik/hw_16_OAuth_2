<form method="POST" action="/login">
        @csrf
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" name="name" class="form-control" id="username" value="{{ old('name') }}">
            @if($errors->has('name'))
            <div class="alert alert-danger">{{ $errors->first('name') }}</div>
            @endif
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" id="password" value="{{ old('password') }}">
            @if($errors->has('password'))
                <div class="alert alert-danger">{{ $errors->first('password') }}</div>
            @endif
        </div>
        <br>
        <input type="submit" class="btn btn-primary" value="Login" />
    <br>
        <p><a href="{{ $oauth_dropbox_uri }}">Войти через Dropbox</a></p>
    </form>



