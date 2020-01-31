@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-md-offset-2">
                <div class="card">
                    <div class="card-header">Set up Google Authenticator</div>

                    <div class="card-body" style="text-align: center;">
                        <p>Set up your two factor authentication by scanning the barcode below. Alternatively, you can use the code {{ $secret }}</p>
                        <div>
                            <img src="{{ $QR_Image }}">
                        </div>
                        @if (!@$reauthenticating)
                        <p>You must set up your Google Authenticator app before continuing. You will be unable to login otherwise</p>
                        <div>
                            <a href="/complete-registration"><button class="btn-primary">Complete Registration</button></a>
                        </div>
                        @endif

                        <form method="POST" action="" {{ route('user.settings.twoFactor.google.validate') }}>
                                @csrf


                            <div class="form-group row">
                                <label for="googleAuth" class="col-md-4 col-form-label text-md-right">{{ __('Google Authenticator') }}</label>

                                <div class="col-md-6">
                                    <input id="googleAuth" type="text" class="form-control @error('Google Authenticator') is-invalid @enderror" name="googleAuth" value="{{ old('Google Authenticator') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Activate') }}
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
