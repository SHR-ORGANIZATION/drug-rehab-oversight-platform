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

        // Logout any existing caregiver session first
        if (Auth::guard('caregiver')->check()) {
            Auth::guard('caregiver')->logout();
        }

        $this->form->authenticate();

        Session::invalidate();
        Session::regenerate();

        // Check if the authenticated user has the doctor role
        $user = Auth::user();
        if (!$user->hasRole('doctor')) {
            Auth::logout();
            $this->roleError = 'This login is for doctors only. If you are a caregiver, please use the caregiver portal.';
            Session::invalidate();
            Session::regenerate();
            return;
        }

        $this->redirect(route('admin.dashboard', absolute: false), navigate: false);
    }
}; ?>

<div>
    <main class="auth-cover-wrapper">
        <div class="auth-cover-content-inner">
            <div class="auth-cover-content-wrapper d-flex flex-column justify-content-center align-items-center text-center" style="background: url('{{ asset('assets/images/auth/Rehabilitation-Prog-and-Services.jpeg') }}') center center / cover no-repeat; min-height: 100vh; position: relative;">
                <div style="position: absolute; inset: 0; background: linear-gradient(135deg, rgba(37, 99, 235, 0.8) 0%, rgba(124, 58, 237, 0.8) 100%);"></div>
                <div style="position: relative; z-index: 1;">
                    <div class="d-flex align-items-center justify-content-center rounded-3 mb-3" style="width: 70px; height: 70px; background: rgba(255,255,255,0.2); backdrop-filter: blur(10px); animation: bounce 2s infinite;">
                        <span class="text-white fw-bold" style="font-size: 2rem;">N</span>
                    </div>
                    <h2 class="fw-bold text-white mb-1" style="font-size: 1.8rem; animation: fadeInUp 0.8s ease-out;">NexusCare</h2>
                    <p class="text-white-50 mb-0" style="animation: fadeInUp 1s ease-out;">Clinical & Care Coordination</p>
                </div>
            </div>
        </div>
        <div class="auth-cover-sidebar-inner">
            <div class="auth-cover-card-wrapper">
                <div class="auth-cover-card p-sm-5" style="border: none; box-shadow: 0 20px 60px rgba(0,0,0,0.08); border-radius: 20px;">
                    <!-- NexusCare Branding -->
                    <div class="d-flex align-items-center gap-3 mb-4">
                        <div class="d-flex align-items-center justify-content-center rounded-3" style="width: 52px; height: 52px; background: linear-gradient(135deg, #2563eb 0%, #7c3aed 100%); animation: bounce 2s infinite; box-shadow: 0 8px 25px rgba(37, 99, 235, 0.35);">
                            <span class="text-white fw-bold fs-4">N</span>
                        </div>
                        <div>
                            <h3 class="fw-bold mb-0" style="background: linear-gradient(135deg, #2563eb 0%, #7c3aed 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent; animation: fadeInUp 0.8s ease-out; font-size: 1.5rem;">NexusCare</h3>
                            <small class="text-muted" style="animation: fadeInUp 1s ease-out;">Clinical & Care Coordination</small>
                        </div>
                    </div>
                    
                    <style>
                        @keyframes bounce {
                            0%, 100% { transform: translateY(0); }
                            50% { transform: translateY(-6px); }
                        }
                        @keyframes fadeInUp {
                            from { opacity: 0; transform: translateY(10px); }
                            to { opacity: 1; transform: translateY(0); }
                        }
                        .form-control:focus {
                            border-color: #2563eb !important;
                            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.15) !important;
                        }
                        .input-group-text {
                            border-color: #e5e7eb;
                        }
                    </style>
                    
                    <h2 class="fs-20 fw-bolder mb-2" style="color: #1e293b;">Doctor Portal</h2>
                    <p class="fs-12 fw-medium text-muted">Welcome back!</p>
                    
                    @if($roleError)
                    <div class="alert alert-danger mt-3 mb-0" style="border-radius: 12px;">
                        <i class="feather-alert-circle me-2"></i>{{ $roleError }}
                    </div>
                    @endif
                    
                    <form wire:submit="login" class="w-100 mt-4 pt-2">
                        <div class="mb-4">
                            <label class="form-label fs-12 fw-semibold text-muted mb-2">Email Address</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0" style="border-radius: 12px 0 0 12px;"><i class="feather-mail text-muted"></i></span>
                                <input type="email" wire:model="form.email" class="form-control border-start-0" style="border-radius: 0 12px 12px 0; padding: 12px 16px;" placeholder="doctor@example.com" required autocomplete="username">
                            </div>
                            @error('form.email') <span class="text-danger small mt-1 d-block">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label fs-12 fw-semibold text-muted mb-2">Password</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0" style="border-radius: 12px 0 0 12px;"><i class="feather-lock text-muted"></i></span>
                                <input type="password" wire:model="form.password" class="form-control border-start-0" style="border-radius: 0 12px 12px 0; padding: 12px 16px;" placeholder="Enter your password" required autocomplete="current-password">
                            </div>
                            @error('form.password') <span class="text-danger small mt-1 d-block">{{ $message }}</span> @enderror
                        </div>
                        <div class="d-flex align-items-center justify-content-between my-4">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" wire:model="form.remember" class="custom-control-input" id="rememberMe">
                                <label class="custom-control-label c-pointer fs-12" for="rememberMe">Remember Me</label>
                            </div>
                            <div>
                                <a href="{{ route('password.request') }}" class="fs-11 text-primary fw-semibold" wire:navigate>Forgot Password?</a>
                            </div>
                        </div>
                        <div class="mt-4">
                            <button type="submit" class="btn btn-lg w-100 text-white fw-semibold" style="background: linear-gradient(135deg, #2563eb 0%, #1d4ed8 100%); border: none; border-radius: 12px; padding: 14px; box-shadow: 0 8px 25px rgba(37, 99, 235, 0.35); transition: all 0.3s ease;">
                                <i class="feather-log-in me-2"></i>Sign In to Doctor Portal
                            </button>
                        </div>
                    </form>
                    
                    {{-- <div class="mt-4 pt-4 border-top text-center">
                        <span class="text-muted fs-13">Are you a caregiver? </span>
                        <a href="{{ route('caregiver.login') }}" class="fw-bold text-primary fs-13" wire:navigate>Caregiver Portal →</a>
                    </div> --}}
                    
                    <!-- Footer -->
                    <div class="mt-4 text-center">
                        <p class="fs-11 text-muted mb-0">© {{ date('Y') }} NexusCare. Developed with ❤ by <strong>Yussra Said</strong></p>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>