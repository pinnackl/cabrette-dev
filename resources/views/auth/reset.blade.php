@extends('layouts.public')

@section('content')

    @include('partials.navbar')

    <div class="container">
        <div class="row">
            <div class="cart cart-custom" style="min-height: 500px">
                <div class="cart-header" style="border-radius: 0.1875rem 0.1875rem 0 0;padding: 0.75rem 1.25rem;background-color: #f5f5f5;border-bottom: 0.0625rem solid #e5e5e5;">Réinitialisation du mot de passe</div>

                <div class="cart-block">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/password/reset') }}">
                        {!! csrf_field() !!}

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label class="col-md-4 form-control-label">Addresse E-Mail</label>

                            <div class="col-md-6">
                                <input type="email" class="form-control" name="email" value="{{ $email or old('email') }}">
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label class="col-md-4 form-control-label">Mot de passe</label>

                            <div class="col-md-6">
                                <input type="password" class="form-control" name="password">
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label class="col-md-4 form-control-label">Confirmez votre mot de passe</label>
                            <div class="col-md-6">
                                <input type="password" class="form-control" name="password_confirmation">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary" style="margin-top: 20px">
                                    <i class="fa fa-btn fa-refresh"></i>Réinitialiser mon mot de passe
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
