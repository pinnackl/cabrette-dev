@extends('layouts.public')

        <!-- Main Content -->
@section('content')

    @include('partials.navbar')

    <div class="container">
        <div class="row" style="min-height: 500px">
            <div class="cart cart-custom">
                <div class="card-header">Réinitialisation du mot de passe</div>
                <div class="cart-block">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/password/email') }}">
                        {!! csrf_field() !!}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label class="col-md-4 form-control-label">Addresse E-Mail</label>

                            <div class="col-md-6">
                                <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary" style="margin-top: 20px">
                                    <i class="fa fa-btn fa-envelope"></i>Envoyer le lien à cette adresse
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
