<form method="{{ $method }}" action="{{ $route }}">
    @csrf

    <div class="form-group row">
        <label for="title" class="col-sm-4 col-form-label text-md-right">{{ __('Title') }}</label>

        <div class="col-md-6">
            <input id="title" type="title" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                   name="title" value="{{ old('title') }}" required autofocus>
            @if ($errors->has('title'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('title') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group row">
        <label for="body" class="col-md-4 col-form-label text-md-right">{{ __('Body') }}</label>

        <div class="col-md-6">
            <textarea id="body" type="body"
              class="form-control{{ $errors->has('body') ? ' is-invalid' : '' }}"
              name="body" required>
            </textarea>

            @if ($errors->has('body'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('body') }}</strong>
                </span>
            @endif
        </div>
    </div>


    <div class="form-group row mb-0">
        <div class="col-md-8 offset-md-4">
            <button type="submit" class="btn btn-primary">
                {{ __('Save') }}
            </button>
        </div>
    </div>
</form>