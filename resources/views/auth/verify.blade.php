@extends('layouts.app2')

@section('content')
<div class="login-box">
    <div class="login-logo">
        <a href="../../index2.html"><b>JM</b>PROGRAMMING</a>
    </div>
    <div class="card">
        <div class="card-header"><b>{{ __('Verify Your Email Address') }}</b></div>

        <div class="card-body">
            @if (session('resent'))
            <div class="alert alert-success" role="alert">
                {{ __('A fresh verification link has been sent to your email address.') }}
            </div>
            @endif

            {{ __('Before proceeding, please check your email for a verification link.') }}
            {{ __('If you did not receive the email') }}, <a href="{{ route('verification.resend') }}">{{ __('click here to request another') }}</a>.
        </div>
    </div>
</div>


@endsection

