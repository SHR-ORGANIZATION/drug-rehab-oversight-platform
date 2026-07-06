<?php

use App\Livewire\Forms\LoginForm;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component
{
    public LoginForm $form;

    public string $roleError = '';

    /**
     * Handle an incoming authentication request.
     */
    public function login(): void
    {
        $this->validate();

        // Authenticate using the caregiver guard
        $credentials = $this->form->only(['email', 'password']);
        $remember = $this->form->remember;

        if (!Auth::guard('caregiver')->attempt($credentials, $remember)) {
            $this->roleError = 'These credentials do not match our records.';
            return;
        }

        Session::regenerate();

        $this->redirect(route('caregiver.dashboard', absolute: false), navigate: false);
    }
}; ?>

<div>
    <main class="auth-cover-wrapper" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); min-height: 100vh;">
        <div class="auth-cover-content-inner">
            <div class="auth-cover-content-wrapper">
                <div class="auth-img">
                    <img src="{{ asset('assets/images/auth/auth-cover-login-bg.svg') }}" alt="" class="img-fluid" style="opacity: 0.85; filter: brightness(1.1);">
                </div>
            </div>
        </div>
        <div class="auth-cover-sidebar-inner">
            <div class="auth-cover-card-wrapper">
                <div class="auth-cover-card p-sm-5">
                    <div class="wd-50 mb-5">
                        <img src="{{ asset('assets/images/logo-abbr.png') }}" alt="" class="img-fluid">
                    </div>
                    <div class="mb-4">
                        <span class="badge bg-info text-white px-3 py-2 fs-11 fw-semibold">
                            <i class="feather-heart me-1"></i> Caregiver Portal
                        </span>
                    </div>
                    <h2 class="fs-20 fw-bolder mb-3">Caregiver Login</h2>
                    <h4 class="fs-13 fw-bold mb-2">Welcome back, Caregiver</h4>
                    <p class="fs-12 fw-medium text-muted">Access your patient monitoring dashboard. Sign in with your caregiver credentials to continue.</p>
                    @if($roleError)
                    <div class="alert alert-warning mt-3 mb-0">
                        <i class="feather-alert-circle me-2"></i>{{ $roleError }}
                    </div>
                    @endif
                    <form wire:submit="login" class="w-100 mt-4 pt-2">
                        <div class="mb-4">
                            <label class="form-label fs-12 fw-semibold text-muted">Email Address</label>
                            <input type="email" wire:model="form.email" class="form-control" placeholder="caregiver@example.com" required autocomplete="username">
                            @error('form.email') <span class="text-danger small">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label fs-12 fw-semibold text-muted">Password</label>
                            <input type="password" wire:model="form.password" class="form-control" placeholder="Enter your password" required autocomplete="current-password">
                            @error('form.password') <span class="text-danger small">{{ $message }}</span> @enderror
                        </div>
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" wire:model="form.remember" class="custom-control-input" id="rememberMe">
                                    <label class="custom-control-label c-pointer" for="rememberMe">Remember Me</label>
                                </div>
                            </div>
                            <div>
                                <a href="{{ route('password.request') }}" class="fs-11 text-primary" wire:navigate>Forgot password?</a>
                            </div>
                        </div>
                        <div class="mt-5">
                            <button type="submit" class="btn btn-lg btn-info w-100 text-white fw-semibold">
                                <i class="feather-log-in me-2"></i>Sign In as Caregiver
                            </button>
                        </div>
                    </form>
                    <div class="mt-5 text-muted text-center">
                        <span>Doctor? </span>
                        <a href="{{ route('login') }}" class="fw-bold text-primary" wire:navigate>Doctor Portal Login</a>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
