@extends('layouts.guest')

@section('title', 'Confirmer son adresse email')

@section('content')
    <section class="bg-primary py-5">
        <div class="row">
            <div class="col-md-4 mx-auto bg-white rounded">
                <div class="row align-items-center">
                    <div class="col-md-12 col-12">
                        <div class="container p-5">
                            @if (session('resent'))
                                <div class="alert alert-success" role="alert">
                                    {{ __('A fresh verification link has been sent to your email address.') }}
                                </div>
                            @endif

                            {{ __('Before proceeding, please check your email for a verification link.') }}
                            {{ __('If you did not receive the email') }}, <br />
                            <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                                @csrf
                                <button type="submit"
                                    class="btn btn-primary mt-3 align-baseline">{{ __('Click here to request another') }}</button>.
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
