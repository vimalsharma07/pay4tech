@extends('layouts.app')

@section('title', 'Login — ' . config('app.name', 'Payomatix IT'))
@section('meta_description', 'Login to access the admin panel.')

@section('content')
    <section class="page-hero">
        <div class="container">
            <div class="page-hero__inner reveal">
                <h1 class="page-hero__title">Login</h1>
                <p class="page-hero__subtitle">Access your account to manage the website.</p>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <div class="auth-wrap reveal">
                <form class="form auth-card" method="POST" action="{{ route('login.perform') }}">
                    @csrf

                    <label class="field">
                        <span class="field__label">Email</span>
                        <input class="field__input" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                            <span class="field__error">{{ $message }}</span>
                        @enderror
                    </label>

                    <label class="field">
                        <span class="field__label">Password</span>
                        <input class="field__input" type="password" name="password" required autocomplete="current-password">
                        @error('password')
                            <span class="field__error">{{ $message }}</span>
                        @enderror
                    </label>

                    <label class="check">
                        <input type="checkbox" name="remember" value="1">
                        <span>Remember me</span>
                    </label>

                    <button class="btn btn--primary btn--full" type="submit">Login</button>
                </form>
            </div>
        </div>
    </section>
@endsection

