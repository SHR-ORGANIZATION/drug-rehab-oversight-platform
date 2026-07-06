<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta name="theme-color" content="#2563eb" />
	<meta name="mobile-web-app-capable" content="yes" />
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />
	<meta name="apple-mobile-web-app-title" content="NexusCare" />
	<meta name="apple-mobile-web-app-screen-capture" content="no" />
	<link rel="manifest" href="/manifest.json" />
	<link rel="apple-touch-icon" href="/icon-192.png" />
	<link rel="icon" type="image/png" href="/icon-192.png" />
	<title>NexusCare — Clinical & Care Coordination Platform</title>
	<meta name="description" content="Professional drug rehab management system — patient tracking, clinical reports, alerts, and caregiver coordination." />
	<script src="https://cdn.tailwindcss.com"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
	<style>
		@keyframes fadeUp { from { opacity: 0; transform: translateY(20px); } to { opacity: 1; transform: translateY(0); } }
		@keyframes fadeIn { from { opacity: 0; } to { opacity: 1; } }
		@keyframes slideRight { from { transform: translateX(-100%); } to { transform: translateX(0); } }
		@keyframes pulse { 0%, 100% { opacity: 1; } 50% { opacity: 0.5; } }
		@keyframes float { 0%, 100% { transform: translateY(0); } 50% { transform: translateY(-10px); } }
		@keyframes gradient { 0% { background-position: 0% 50%; } 50% { background-position: 100% 50%; } 100% { background-position: 0% 50%; } }
		
		.animate-fade-up { animation: fadeUp 0.8s cubic-bezier(.16,.84,.29,1) both; }
		.animate-fade-in { animation: fadeIn 1s ease both; }
		.animate-float { animation: float 3s ease-in-out infinite; }
		.animate-gradient { background-size: 200% 200%; animation: gradient 8s ease infinite; }
		
		.glass { background: rgba(255,255,255,0.85); backdrop-filter: blur(12px); -webkit-backdrop-filter: blur(12px); }
		.glass-dark { background: rgba(0,0,0,0.2); backdrop-filter: blur(12px); }
		
		.gradient-text { background: linear-gradient(135deg, #2563eb 0%, #7c3aed 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text; }
		.gradient-bg { background: linear-gradient(135deg, #2563eb 0%, #7c3aed 50%, #ec4899 100%); }
		
		.hero-pattern { background-image: radial-gradient(circle at 1px 1px, rgba(37,99,235,0.15) 1px, transparent 0); background-size: 40px 40px; }
		
		.card-hover { transition: all 0.3s cubic-bezier(.16,.84,.29,1); }
		.card-hover:hover { transform: translateY(-8px); box-shadow: 0 25px 50px -12px rgba(0,0,0,0.15); }
		
		.btn-primary { background: linear-gradient(135deg, #2563eb 0%, #1d4ed8 100%); transition: all 0.3s; }
		.btn-primary:hover { transform: translateY(-2px); box-shadow: 0 10px 25px -5px rgba(37,99,235,0.5); }
		
		.btn-secondary { background: linear-gradient(135deg, #7c3aed 0%, #6d28d9 100%); transition: all 0.3s; }
		.btn-secondary:hover { transform: translateY(-2px); box-shadow: 0 10px 25px -5px rgba(124,58,237,0.5); }
		
		html { scroll-behavior: smooth; }
		
		.stat-card { position: relative; overflow: hidden; }
		.stat-card::before { content: ''; position: absolute; top: 0; left: 0; right: 0; height: 4px; background: linear-gradient(90deg, #2563eb, #7c3aed); }
		
		#install-prompt {
			position: fixed;
			bottom: 20px;
			right: 20px;
			background: linear-gradient(135deg, #2563eb 0%, #7c3aed 100%);
			color: white;
			padding: 16px 24px;
			border-radius: 16px;
			box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2);
			display: flex;
			gap: 12px;
			align-items: center;
			z-index: 100;
			max-width: 400px;
			animation: slideUp 0.4s cubic-bezier(.16,.84,.29,1);
		}
		#install-prompt.hidden { display: none; }
		@keyframes slideUp { from { transform: translateY(120px); opacity: 0; } to { transform: translateY(0); opacity: 1; } }
		#install-prompt button { background: white; color: #2563eb; border: none; padding: 10px 20px; border-radius: 8px; font-weight: 600; cursor: pointer; transition: all 0.2s; }
		#install-prompt button:hover { transform: scale(1.05); }
		#install-prompt .close { background: rgba(255, 255, 255, 0.2); color: white; padding: 6px 10px; cursor: pointer; border-radius: 6px; margin-left: auto; }
		
		@media (max-width: 768px) {
			.hero-title { font-size: 2.5rem !important; }
			#install-prompt { bottom: 10px; right: 10px; left: 10px; max-width: none; }
		}
	</style>
</head>
<body class="bg-gray-50 text-gray-800 antialiased">
	<!-- Header -->
	<header class="w-full border-b border-gray-100 glass fixed top-0 left-0 right-0 z-30 bg-slate-900 text-white">
		<div class="max-w-7xl mx-auto px-6 py-3 flex items-center justify-between">
			<div class="flex items-center gap-3">
				<div class="relative">
					<div class="w-12 h-12 rounded-2xl gradient-bg flex items-center justify-center shadow-lg shadow-blue-500/30 animate-gradient">
						<span class="text-white font-bold text-2xl">N</span>
					</div>
					<div class="absolute -top-1 -right-1 w-3 h-3 bg-green-400 rounded-full border-2 border-white"></div>
				</div>
				<div>
					<a href="/" class="text-2xl font-extrabold gradient-text tracking-tight">NexusCare</a>
					<div class="text-xs text-white font-medium -mt-0.5">Clinical & Care Coordination</div>
					{{-- <div class="text-xs text-gray-500 font-medium -mt-0.5">Clinical & Care Coordination</div> --}}

				</div>
			</div>

			{{-- <nav class="hidden lg:flex items-center gap-1">
				<a href="#features" class="px-4 py-2 text-gray-600 hover:text-blue-600 hover:bg-blue-50 rounded-lg transition-all text-sm font-medium">Features</a>
				<a href="#how-it-works" class="px-4 py-2 text-gray-600 hover:text-blue-600 hover:bg-blue-50 rounded-lg transition-all text-sm font-medium">How it Works</a>
				<a href="#vision" class="px-4 py-2 text-gray-600 hover:text-blue-600 hover:bg-blue-50 rounded-lg transition-all text-sm font-medium">Vision</a>
				<a href="#contact" class="px-4 py-2 text-gray-600 hover:text-blue-600 hover:bg-blue-50 rounded-lg transition-all text-sm font-medium">Contact</a>
			</nav> --}}

			<nav class="hidden lg:flex items-center gap-1">
				<a href="#features" class="px-4 py-2 text-white hover:text-blue-600 hover:bg-blue-50 rounded-lg transition-all text-sm font-medium">Features</a>
				<a href="#how-it-works" class="px-4 py-2 text-white hover:text-blue-600 hover:bg-blue-50 rounded-lg transition-all text-sm font-medium">How it Works</a>
				<a href="#vision" class="px-4 py-2 text-white hover:text-blue-600 hover:bg-blue-50 rounded-lg transition-all text-sm font-medium">Vision</a>
				<a href="#contact" class="px-4 py-2 text-white hover:text-blue-600 hover:bg-blue-50 rounded-lg transition-all text-sm font-medium">Contact</a>
			</nav>

			<div class="hidden lg:flex items-center gap-3">
				<a href="{{ route('caregiver.login') }}" class="group relative px-5 py-2.5 text-white rounded-xl text-sm font-semibold overflow-hidden transition-all hover:scale-105">
					<div class="absolute inset-0 bg-gradient-to-r from-purple-600 via-purple-500 to-pink-500 animate-gradient"></div>
					<span class="relative flex items-center gap-2">
						<i class="fas fa-hands-helping text-xs"></i>
						Login
					</span>
				</a>
				{{-- <a href="{{ route('login') }}" class="group relative px-5 py-2.5 text-white rounded-xl text-sm font-semibold overflow-hidden transition-all hover:scale-105">
					<div class="absolute inset-0 bg-gradient-to-r from-blue-600 via-blue-500 to-cyan-500 animate-gradient"></div>
					<span class="relative flex items-center gap-2">
						<i class="fas fa-user-md text-xs"></i>
						Doctor
					</span>
				</a> --}}
			</div>

			<div class="lg:hidden flex items-center gap-2">
				{{-- <a href="{{ route('login') }}" class="px-4 py-2 btn-primary text-white rounded-lg text-sm font-medium flex items-center gap-1.5">
					<i class="fas fa-user-md text-xs"></i>Doctor
				</a> --}}
				<a href="{{ route('caregiver.login') }}" class="px-4 py-2 btn-secondary text-white rounded-lg text-sm font-medium flex items-center gap-1.5">
					<i class="fas fa-hands-helping text-xs"></i>Login
				</a>
			</div>
		</div>
	</header>

	<!-- Hero Section -->
	<main class="pt-24">
		<section class="relative min-h-[90vh] flex items-center hero-pattern overflow-hidden">
			<!-- Background decorations -->
			<div class="absolute top-20 right-10 w-72 h-72 bg-blue-400 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-float"></div>
			<div class="absolute bottom-20 left-10 w-72 h-72 bg-purple-400 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-float" style="animation-delay: 1s;"></div>
			<div class="absolute top-1/2 left-1/2 w-96 h-96 bg-pink-300 rounded-full mix-blend-multiply filter blur-3xl opacity-10"></div>
			
			<div class="max-w-7xl mx-auto px-6 py-20 relative z-10">
				<div class="grid lg:grid-cols-2 gap-16 items-center">
					<div class="space-y-8">
						<div class="inline-flex items-center gap-2 px-4 py-2 bg-blue-50 border border-blue-100 rounded-full text-blue-700 text-sm font-medium animate-fade-up">
							<i class="fas fa-shield-alt text-xs"></i>
							<span>Secure | Ready&Safe Platform</span>
						</div>
						
						<h1 class="hero-title text-5xl lg:text-6xl font-extrabold leading-tight animate-fade-up" style="animation-delay: 100ms;">
							Modern care coordination for <span class="gradient-text">substance use recovery</span>
						</h1>
						
						<p class="text-xl text-gray-600 leading-relaxed animate-fade-up" style="animation-delay: 200ms;">
							A comprehensive platform that helps rehabilitation centers manage patient intake, clinical reporting, and caregiver coordination with confidence and clarity.
						</p>

						<div class="flex flex-col sm:flex-row gap-4 animate-fade-up" style="animation-delay: 300ms;">
							{{-- <a href="{{ route('login') }}" class="inline-flex items-center justify-center gap-2 px-8 py-4 btn-primary text-white rounded-xl font-semibold shadow-xl shadow-blue-500/30">
								<i class="fas fa-user-md"></i>
								Doctor Portal
							</a> --}}
							<a href="{{ route('caregiver.login') }}" class="inline-flex items-center justify-center gap-2 px-8 py-4 btn-secondary text-white rounded-xl font-semibold shadow-xl shadow-purple-500/30">
								<i class="fas fa-hands-helping"></i>
								Caregiver Portal
							</a>
						</div>

						<!-- Stats -->
						<div class="grid grid-cols-3 gap-4 pt-8 animate-fade-up" style="animation-delay: 400ms;">
							<div class="relative group">
								<div class="absolute inset-0 bg-gradient-to-br from-blue-500 to-cyan-500 rounded-2xl opacity-10 group-hover:opacity-20 transition-opacity"></div>
								<div class="relative p-5 rounded-2xl border border-blue-100 bg-white">
									<div class="flex items-center gap-3 mb-2">
										<div class="w-10 h-10 rounded-xl bg-gradient-to-br from-blue-500 to-cyan-500 flex items-center justify-center text-white shadow-lg shadow-blue-500/30">
											<i class="fas fa-users"></i>
										</div>
										<div class="text-3xl font-extrabold text-gray-900">{{ $stats['patients'] }}</div>
									</div>
									<div class="text-sm font-medium text-gray-500">Patients</div>
									<div class="mt-2 h-1 bg-gradient-to-r from-blue-500 to-cyan-500 rounded-full" style="width: 80%"></div>
								</div>
							</div>
							<div class="relative group">
								<div class="absolute inset-0 bg-gradient-to-br from-purple-500 to-pink-500 rounded-2xl opacity-10 group-hover:opacity-20 transition-opacity"></div>
								<div class="relative p-5 rounded-2xl border border-purple-100 bg-white">
									<div class="flex items-center gap-3 mb-2">
										<div class="w-10 h-10 rounded-xl bg-gradient-to-br from-purple-500 to-pink-500 flex items-center justify-center text-white shadow-lg shadow-purple-500/30">
											<i class="fas fa-hands-helping"></i>
										</div>
										<div class="text-3xl font-extrabold text-gray-900">{{ $stats['caregivers'] }}</div>
									</div>
									<div class="text-sm font-medium text-gray-500">Caregivers</div>
									<div class="mt-2 h-1 bg-gradient-to-r from-purple-500 to-pink-500 rounded-full" style="width: 60%"></div>
								</div>
							</div>
							<div class="relative group">
								<div class="absolute inset-0 bg-gradient-to-br from-emerald-500 to-teal-500 rounded-2xl opacity-10 group-hover:opacity-20 transition-opacity"></div>
								<div class="relative p-5 rounded-2xl border border-emerald-100 bg-white">
									<div class="flex items-center gap-3 mb-2">
										<div class="w-10 h-10 rounded-xl bg-gradient-to-br from-emerald-500 to-teal-500 flex items-center justify-center text-white shadow-lg shadow-emerald-500/30">
											<i class="fas fa-user-md"></i>
										</div>
										<div class="text-3xl font-extrabold text-gray-900">{{ $stats['doctors'] }}</div>
									</div>
									<div class="text-sm font-medium text-gray-500">Doctors</div>
									<div class="mt-2 h-1 bg-gradient-to-r from-emerald-500 to-teal-500 rounded-full" style="width: 40%"></div>
								</div>
							</div>
						</div>
					</div>

					<!-- Hero Card -->
					<div class="relative animate-fade-up" style="animation-delay: 300ms;">
						<div class="relative rounded-3xl overflow-hidden shadow-2xl border border-gray-100 bg-white p-8">
							<div class="flex items-center justify-between mb-6">
								<div>
									<div class="text-xs text-gray-400 uppercase tracking-wider font-semibold">Live Dashboard</div>
									<div class="text-2xl font-bold text-gray-900 mt-1">{{ $stats['patients'] }} Active Patients</div>
								</div>
								<div class="flex items-center gap-2 px-4 py-2 bg-green-50 text-green-700 rounded-full text-sm font-semibold">
									<span class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></span>
									Live
								</div>
							</div>

							<div class="grid grid-cols-2 gap-4 mb-6">
								<div class="stat-card p-5 bg-gradient-to-br from-blue-50 to-blue-100/50 rounded-2xl border border-blue-100">
									<div class="flex items-center gap-3 mb-3">
										<div class="w-10 h-10 bg-blue-500 rounded-xl flex items-center justify-center text-white">
											<i class="fas fa-file-medical"></i>
										</div>
										<span class="text-sm font-medium text-blue-700">Total Reports</span>
									</div>
									<div class="text-3xl font-bold text-blue-900">{{ $stats['reports'] }}</div>
								</div>
								<div class="stat-card p-5 bg-gradient-to-br from-purple-50 to-purple-100/50 rounded-2xl border border-purple-100">
									<div class="flex items-center gap-3 mb-3">
										<div class="w-10 h-10 bg-purple-500 rounded-xl flex items-center justify-center text-white">
											<i class="fas fa-users"></i>
										</div>
										<span class="text-sm font-medium text-purple-700">Caregivers</span>
									</div>
									<div class="text-3xl font-bold text-purple-900">{{ $stats['caregivers'] }}</div>
								</div>
							</div>

							<div class="space-y-3">
								<div class="flex items-center justify-between text-sm">
									<span class="text-gray-600">Review Completion</span>
									<span class="font-bold text-gray-900">{{ $stats['completionRate'] }}%</span>
								</div>
								<div class="h-3 bg-gray-100 rounded-full overflow-hidden">
									<div class="h-3 gradient-bg rounded-full transition-all duration-500" style="width:{{ $stats['completionRate'] }}%"></div>
								</div>
							</div>

						<div class="mt-6 pt-6 border-t border-gray-100 space-y-3">
							@if($recentReports->count() > 0)
							<div class="flex items-center gap-3">
								<div class="w-8 h-8 bg-green-100 rounded-full flex items-center justify-center">
									<i class="fas fa-check text-green-600 text-xs"></i>
								</div>
								<div class="flex-1">
									<div class="text-sm font-medium text-gray-900">New report submitted</div>
									<div class="text-xs text-gray-500">{{ $recentReports->first()->report_date->diffForHumans() }}</div>
								</div>
							</div>
							@endif
							@if($recentPatients->count() > 0)
							<div class="flex items-center gap-3">
								<div class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center">
									<i class="fas fa-user-plus text-blue-600 text-xs"></i>
								</div>
								<div class="flex-1">
									<div class="text-sm font-medium text-gray-900">New patient registered</div>
									<div class="text-xs text-gray-500">{{ $recentPatients->first()->created_at->diffForHumans() }}</div>
								</div>
							</div>
							@endif
							@if($stats['completionRate'] > 0)
							<div class="flex items-center gap-3">
								<div class="w-8 h-8 bg-purple-100 rounded-full flex items-center justify-center">
									<i class="fas fa-chart-line text-purple-600 text-xs"></i>
								</div>
								<div class="flex-1">
									<div class="text-sm font-medium text-gray-900">{{ $stats['completionRate'] }}% review completion</div>
									<div class="text-xs text-gray-500">Great progress!</div>
								</div>
							</div>
							@endif
							@if($recentReports->count() == 0 && $recentPatients->count() == 0)
							<div class="flex items-center gap-3">
								<div class="w-8 h-8 bg-gray-100 rounded-full flex items-center justify-center">
									<i class="fas fa-inbox text-gray-400 text-xs"></i>
								</div>
								<div class="flex-1">
									<div class="text-sm font-medium text-gray-500">No activity yet</div>
									<div class="text-xs text-gray-400">Activity will appear here</div>
								</div>
							</div>
							@endif
						</div>
						</div>
						
						<!-- Floating badges -->
						<div class="absolute -top-4 -right-4 px-4 py-2 bg-white rounded-xl shadow-lg border border-gray-100 animate-float">
							<div class="flex items-center gap-2">
								<i class="fas fa-shield-alt text-green-500"></i>
								<span class="text-sm font-semibold text-gray-700">Stay safe</span>
							</div>
						</div>
						<div class="absolute -bottom-4 -left-4 px-4 py-2 bg-white rounded-xl shadow-lg border border-gray-100 animate-float" style="animation-delay: 1.5s;">
							<div class="flex items-center gap-2">
								<i class="fas fa-lock text-blue-500"></i>
								<span class="text-sm font-semibold text-gray-700">Encrypted Connection</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

		<!-- Features Section -->
		<section id="features" class="max-w-7xl mx-auto px-6 py-24">
			<div class="mb-16 text-center">
				<div class="inline-flex items-center gap-2 px-4 py-2 bg-blue-50 border border-blue-100 rounded-full text-blue-700 text-sm font-medium mb-4">
					<i class="fas fa-star text-xs"></i>
					<span>Key Features</span>
				</div>
				<h2 class="text-4xl font-bold text-slate-900">Powerful tools for recovery care teams</h2>
				<p class="mt-4 text-lg text-gray-600 max-w-2xl mx-auto">Everything you need to manage patient care, clinical reporting, and team coordination in one platform.</p>
			</div>

			<div class="grid md:grid-cols-3 gap-8">
				<div class="card-hover group p-8 bg-white rounded-3xl shadow-lg border border-gray-100 animate-fade-up">
					<div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-blue-500 to-blue-600 flex items-center justify-center text-white mb-6 group-hover:scale-110 transition-transform">
						<i class="fas fa-user-injured text-2xl"></i>
					</div>
					<h3 class="text-xl font-bold text-slate-900 mb-3">Patient Management</h3>
					<p class="text-gray-600 leading-relaxed">Register patients, track treatment progress, and assign caregivers from one intuitive dashboard.</p>
					<div class="mt-6 pt-6 border-t border-gray-100">
						<ul class="space-y-2 text-sm text-gray-500">
							<li class="flex items-center gap-2"><i class="fas fa-check text-green-500"></i> Complete patient records</li>
							<li class="flex items-center gap-2"><i class="fas fa-check text-green-500"></i> Caregiver assignment</li>
							<li class="flex items-center gap-2"><i class="fas fa-check text-green-500"></i> Treatment tracking</li>
						</ul>
					</div>
				</div>
				
				<div class="card-hover group p-8 bg-white rounded-3xl shadow-lg border border-gray-100 animate-fade-up" style="animation-delay:100ms">
					<div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-emerald-500 to-teal-600 flex items-center justify-center text-white mb-6 group-hover:scale-110 transition-transform">
						<i class="fas fa-file-medical-alt text-2xl"></i>
					</div>
					<h3 class="text-xl font-bold text-slate-900 mb-3">Clinical Reporting</h3>
					<p class="text-gray-600 leading-relaxed">Generate standardized SOAP notes and clinical reports for care review and documentation.</p>
					<div class="mt-6 pt-6 border-t border-gray-100">
						<ul class="space-y-2 text-sm text-gray-500">
							<li class="flex items-center gap-2"><i class="fas fa-check text-green-500"></i> SOAP note format</li>
							<li class="flex items-center gap-2"><i class="fas fa-check text-green-500"></i> ICD-10 coding</li>
							<li class="flex items-center gap-2"><i class="fas fa-check text-green-500"></i> Doctor review workflow</li>
						</ul>
					</div>
				</div>
				
				<div class="card-hover group p-8 bg-white rounded-3xl shadow-lg border border-gray-100 animate-fade-up" style="animation-delay:200ms">
					<div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-amber-500 to-orange-600 flex items-center justify-center text-white mb-6 group-hover:scale-110 transition-transform">
						<i class="fas fa-exclamation-triangle text-2xl"></i>
					</div>
					<h3 class="text-xl font-bold text-slate-900 mb-3">Risk & Alerts</h3>
					<p class="text-gray-600 leading-relaxed">Monitor patient risk scores and receive instant alerts for cases requiring immediate attention.</p>
					<div class="mt-6 pt-6 border-t border-gray-100">
						<ul class="space-y-2 text-sm text-gray-500">
							<li class="flex items-center gap-2"><i class="fas fa-check text-green-500"></i> Real-time risk scoring</li>
							<li class="flex items-center gap-2"><i class="fas fa-check text-green-500"></i> Critical case alerts</li>
							<li class="flex items-center gap-2"><i class="fas fa-check text-green-500"></i> Priority management</li>
						</ul>
					</div>
				</div>
			</div>
		</section>

		<!-- How it Works Section -->
		<section id="how-it-works" class="py-24 bg-gradient-to-b from-gray-50 to-white">
			<div class="max-w-7xl mx-auto px-6">
				<div class="mb-16 text-center">
					<div class="inline-flex items-center gap-2 px-4 py-2 bg-emerald-50 border border-emerald-100 rounded-full text-emerald-700 text-sm font-medium mb-4">
						<i class="fas fa-route text-xs"></i>
						<span>How it Works</span>
					</div>
					<h2 class="text-4xl font-bold text-slate-900">Simple workflow for care teams</h2>
					<p class="mt-4 text-lg text-gray-600 max-w-2xl mx-auto">From intake to ongoing monitoring, support the full rehabilitation care cycle with clarity and speed.</p>
				</div>
	
				<div class="grid md:grid-cols-3 gap-8 relative">
					<!-- Connection line -->
					<div class="hidden md:block absolute top-24 left-1/4 right-1/4 h-0.5 bg-gradient-to-r from-blue-200 via-purple-200 to-amber-200"></div>
						
					<div class="card-hover relative bg-white rounded-3xl shadow-lg border border-gray-100 p-8 animate-fade-up">
						<div class="absolute -top-6 left-8 w-12 h-12 rounded-2xl bg-gradient-to-br from-blue-500 to-blue-600 flex items-center justify-center text-white font-bold text-xl shadow-lg shadow-blue-500/30">1</div>
						<div class="pt-6">
							<h3 class="text-xl font-bold text-slate-900 mb-3">Register Patient</h3>
							<p class="text-gray-600 leading-relaxed">Capture demographics, intake history, and care assignments in one secure record.</p>
						</div>
					</div>
						
					<div class="card-hover relative bg-white rounded-3xl shadow-lg border border-gray-100 p-8 animate-fade-up" style="animation-delay:100ms">
						<div class="absolute -top-6 left-8 w-12 h-12 rounded-2xl bg-gradient-to-br from-purple-500 to-purple-600 flex items-center justify-center text-white font-bold text-xl shadow-lg shadow-purple-500/30">2</div>
						<div class="pt-6">
							<h3 class="text-xl font-bold text-slate-900 mb-3">Create Reports</h3>
							<p class="text-gray-600 leading-relaxed">Log observations, treatment plans, and progress notes with structured SOAP tools.</p>
						</div>
					</div>
						
					<div class="card-hover relative bg-white rounded-3xl shadow-lg border border-gray-100 p-8 animate-fade-up" style="animation-delay:200ms">
						<div class="absolute -top-6 left-8 w-12 h-12 rounded-2xl bg-gradient-to-br from-amber-500 to-amber-600 flex items-center justify-center text-white font-bold text-xl shadow-lg shadow-amber-500/30">3</div>
						<div class="pt-6">
							<h3 class="text-xl font-bold text-slate-900 mb-3">Monitor & Respond</h3>
							<p class="text-gray-600 leading-relaxed">Review risk alerts, metrics, and caregiver activity to prioritize patient support.</p>
						</div>
					</div>
				</div>
			</div>
		</section>
	
		<!-- Vision Section -->
		<section id="vision" class="max-w-7xl mx-auto px-6 py-24">
			<div class="grid lg:grid-cols-2 gap-12 items-center">
				<div class="animate-fade-up">
					<div class="inline-flex items-center gap-2 px-4 py-2 bg-purple-50 border border-purple-100 rounded-full text-purple-700 text-sm font-medium mb-4">
						<i class="fas fa-eye text-xs"></i>
						<span>Our Vision</span>
					</div>
					<h2 class="text-4xl font-bold text-slate-900 mb-6">A safer, connected recovery journey</h2>
					<p class="text-lg text-gray-600 leading-relaxed mb-6">We envision a recovery ecosystem where every care decision is supported by real-time patient data and clear team coordination.</p>
					<div class="space-y-4">
						<div class="flex items-start gap-4">
							<div class="w-10 h-10 rounded-xl bg-blue-100 flex items-center justify-center text-blue-600 flex-shrink-0">
								<i class="fas fa-chart-line"></i>
							</div>
							<div>
								<h4 class="font-semibold text-slate-900">Data-Driven Decisions</h4>
								<p class="text-gray-600">Real-time analytics for better patient outcomes</p>
							</div>
						</div>
						<div class="flex items-start gap-4">
							<div class="w-10 h-10 rounded-xl bg-green-100 flex items-center justify-center text-green-600 flex-shrink-0">
								<i class="fas fa-users"></i>
							</div>
							<div>
								<h4 class="font-semibold text-slate-900">Team Collaboration</h4>
								<p class="text-gray-600">Seamless coordination between doctors and caregivers</p>
							</div>
						</div>
						<div class="flex items-start gap-4">
							<div class="w-10 h-10 rounded-xl bg-amber-100 flex items-center justify-center text-amber-600 flex-shrink-0">
								<i class="fas fa-shield-alt"></i>
							</div>
							<div>
								<h4 class="font-semibold text-slate-900">Patient Safety</h4>
								<p class="text-gray-600">Early risk detection and immediate alerts</p>
							</div>
						</div>
					</div>
				</div>
					
				<div class="relative animate-fade-up" style="animation-delay:200ms">
					<div class="rounded-3xl overflow-hidden shadow-2xl gradient-bg p-1">
						<div class="bg-white rounded-3xl p-8">
							<div class="text-center mb-8">
								<div class="w-20 h-20 rounded-2xl gradient-bg flex items-center justify-center text-white mx-auto mb-4">
									<i class="fas fa-heart text-3xl"></i>
								</div>
								<h3 class="text-2xl font-bold text-slate-900">Our Mission</h3>
							</div>
							<p class="text-gray-600 text-center leading-relaxed mb-8">Deliver a modern, secure system for registering patients, generating reports, assigning caregivers, and identifying risks early.</p>
							<div class="grid grid-cols-2 gap-4">
								<div class="text-center p-4 bg-blue-50 rounded-2xl">
									<div class="text-3xl font-bold gradient-text">{{ $stats['reports'] }}</div>
									<div class="text-sm text-gray-600 mt-1">Reports</div>
								</div>
								<div class="text-center p-4 bg-green-50 rounded-2xl">
									<div class="text-3xl font-bold gradient-text">{{ $stats['doctors'] }}</div>
									<div class="text-sm text-gray-600 mt-1">Doctors</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	
		<!-- Contact Section -->
		<section id="contact" class="py-24 bg-gradient-to-b from-white to-gray-50">
			<div class="max-w-7xl mx-auto px-6">
				<div class="mb-16 text-center">
					<div class="inline-flex items-center gap-2 px-4 py-2 bg-amber-50 border border-amber-100 rounded-full text-amber-700 text-sm font-medium mb-4">
						<i class="fas fa-envelope text-xs"></i>
						<span>Contact Us</span>
					</div>
					<h2 class="text-4xl font-bold text-slate-900">Reach our team</h2>
					<p class="mt-4 text-lg text-gray-600 max-w-2xl mx-auto">Connect with us through multiple channels for fast support.</p>
				</div>
	
				<div class="grid md:grid-cols-4 gap-6">
					<div class="card-hover group bg-white rounded-3xl shadow-lg border border-gray-100 p-8 text-center animate-fade-up">
						<div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-blue-500 to-blue-600 flex items-center justify-center text-white mx-auto mb-4 group-hover:scale-110 transition-transform">
							<i class="fas fa-phone text-2xl"></i>
						</div>
						<h3 class="text-lg font-bold text-slate-900 mb-2">Call Us</h3>
						<p class="text-gray-600">0783394797</p>
					</div>
					<div class="card-hover group bg-white rounded-3xl shadow-lg border border-gray-100 p-8 text-center animate-fade-up" style="animation-delay:100ms">
						<div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-green-500 to-emerald-600 flex items-center justify-center text-white mx-auto mb-4 group-hover:scale-110 transition-transform">
							<i class="fab fa-whatsapp text-2xl"></i>
						</div>
						<h3 class="text-lg font-bold text-slate-900 mb-2">WhatsApp</h3>
						<p class="text-gray-600">0783394797</p>
					</div>
					<div class="card-hover group bg-white rounded-3xl shadow-lg border border-gray-100 p-8 text-center animate-fade-up" style="animation-delay:200ms">
						<div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-red-500 to-pink-600 flex items-center justify-center text-white mx-auto mb-4 group-hover:scale-110 transition-transform">
							<i class="fas fa-envelope text-2xl"></i>
						</div>
						<h3 class="text-lg font-bold text-slate-900 mb-2">Email</h3>
						<p class="text-gray-600 text-sm">yusrasaid2003@gmail.com</p>
					</div>
					<div class="card-hover group bg-white rounded-3xl shadow-lg border border-gray-100 p-8 text-center animate-fade-up" style="animation-delay:300ms">
						<div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-purple-500 to-pink-600 flex items-center justify-center text-white mx-auto mb-4 group-hover:scale-110 transition-transform">
							<i class="fab fa-instagram text-2xl"></i>
						</div>
						<h3 class="text-lg font-bold text-slate-900 mb-2">Social</h3>
						<p class="text-gray-600">Instagram & TikTok</p>
					</div>
				</div>
			</div>
		</section>
	</main>
	
	<!-- Footer -->
	<footer class="bg-slate-900 text-white py-16">
		<div class="max-w-7xl mx-auto px-6">
			<div class="grid md:grid-cols-4 gap-12 mb-12">
				<div class="md:col-span-2">
					<div class="flex items-center gap-3 mb-4">
						<div class="w-11 h-11 rounded-xl gradient-bg flex items-center justify-center shadow-lg shadow-blue-500/30">
							<span class="text-white font-bold text-xl">N</span>
						</div>
						<div>
							<div class="text-xl font-bold">NexusCare</div>
							<div class="text-xs text-gray-400">Clinical & Care Coordination</div>
						</div>
					</div>
					<p class="text-gray-400 leading-relaxed max-w-md">A modern platform for rehabilitation centers to manage patient care, clinical reporting, and team coordination.</p>
				</div>
				<div>
					<h4 class="font-semibold mb-4">Quick Links</h4>
					<ul class="space-y-2 text-gray-400">
						<li><a href="#features" class="hover:text-white transition-colors">Features</a></li>
						<li><a href="#how-it-works" class="hover:text-white transition-colors">How it Works</a></li>
						<li><a href="#vision" class="hover:text-white transition-colors">Vision</a></li>
						<li><a href="#contact" class="hover:text-white transition-colors">Contact</a></li>
					</ul>
				</div>
				<div>
					<h4 class="font-semibold mb-4">Portals</h4>
					<ul class="space-y-2 text-gray-400">
						<li><a href="{{ route('login') }}" class="hover:text-white transition-colors">Doctor Login</a></li>
						<li><a href="{{ route('caregiver.login') }}" class="hover:text-white transition-colors">Caregiver Login</a></li>
					</ul>
				</div>
			</div>
			<div class="pt-8 border-t border-slate-800 flex flex-col md:flex-row items-center justify-between gap-4">
				<div class="text-gray-400 text-sm">© <span id="year"></span> NexusCare. All rights reserved.</div>
				<div class="text-gray-400 text-sm">Developed with <i class="fas fa-heart text-red-500"></i> by <strong class="text-white">Yussra Said</strong></div>
			</div>
		</div>
	</footer>

	<script>
		document.getElementById('year').textContent = new Date().getFullYear();
	</script>

	<!-- PWA Install Prompt -->
	<div id="install-prompt">
		{{-- <div>
			<div style="font-weight: 600; font-size: 1rem;">📱 Install NexusCare</div>
			<div style="font-size: 0.875rem; opacity: 0.9;">Add to Home Screen for quick access</div>
		</div> --}}
		<button id="install-btn" style="white-space: nowrap;">Install</button>
		<span class="close" id="close-prompt">✕</span>
	</div>

	<!-- Service Worker Registration & PWA Install Handling -->
	<script>
		// Register Service Worker
		if ('serviceWorker' in navigator) {
			window.addEventListener('load', () => {
				navigator.serviceWorker.register('/service-worker.js')
					.then(registration => {
						console.log('Service Worker registered:', registration);
					})
					.catch(error => {
						console.log('Service Worker registration failed:', error);
					});
			});
		}

		// PWA Install Prompt Handling
		let deferredPrompt;
		const installPrompt = document.getElementById('install-prompt');
		const installBtn = document.getElementById('install-btn');
		const closePrompt = document.getElementById('close-prompt');
		let isIOS = /iPad|iPhone|iPod/.test(navigator.userAgent);
		let isAndroid = /Android/.test(navigator.userAgent);

		// Check if app is already installed
		function checkIfInstalled() {
			return window.navigator.standalone === true || 
			       window.matchMedia('(display-mode: standalone)').matches;
		}

		// Hide prompt if already installed
		if (checkIfInstalled()) {
			console.log('App is already installed in standalone mode');
			installPrompt.classList.add('hidden');
		}

		// Capture the install prompt event (Chrome, Edge, etc.)
		window.addEventListener('beforeinstallprompt', (e) => {
			console.log('beforeinstallprompt event fired!');
			e.preventDefault();
			deferredPrompt = e;
			// Show the custom install prompt
			installPrompt.classList.remove('hidden');
		});

		// Install button click handler
		installBtn?.addEventListener('click', async () => {
			if (deferredPrompt) {
				console.log('📲 Showing install prompt...');
				deferredPrompt.prompt();
				const { outcome } = await deferredPrompt.userChoice;
				console.log(`👤 User response: ${outcome}`);
				deferredPrompt = null;
				installPrompt.classList.add('hidden');
			} else {
				// No deferredPrompt - show manual instructions
				showManualInstallInstructions();
			}
		});

		// Close button handler
		closePrompt?.addEventListener('click', () => {
			installPrompt.classList.add('hidden');
		});

		// Hide install prompt when app is installed
		window.addEventListener('appinstalled', () => {
			console.log('App installed successfully!');
			installPrompt.classList.add('hidden');
			deferredPrompt = null;
		});

		// Function to show manual installation instructions
		function showManualInstallInstructions() {
			let instructions = '📱 Installation Instructions:\n\n';
			
			if (isIOS) {
				instructions += '📲 iPhone/iPad:\n' +
					'1. Tap the Share button at the bottom\n' +
					'2. Scroll and tap "Add to Home Screen"\n' +
					'3. Tap "Add" to confirm';
			} else if (isAndroid) {
				instructions += '📲 Android:\n' +
					'1. Tap the menu button (⋮) at the top right\n' +
					'2. Tap "Install app" or "Add to Home Screen"\n' +
					'3. Tap "Install" to confirm';
			} else {
				instructions += '🖥️ Desktop (Chrome/Edge):\n' +
					'1. Click the Install button that should appear\n' +
					'2. Or click the address bar icon\n' +
					'3. Select "Install app"\n\n' +
					'🍎 iOS Safari:\n' +
					'1. Tap Share button\n' +
					'2. Tap "Add to Home Screen"\n\n' +
					'📱 Android Chrome:\n' +
					'1. Tap menu (⋮)\n' +
					'2. Tap "Install app"';
			}
			
			alert(instructions);
		}

		// For development/testing: Always show prompt if not installed
		window.addEventListener('load', () => {
			if (!deferredPrompt && !checkIfInstalled()) {
				// Delay showing to give beforeinstallprompt a chance to fire
				setTimeout(() => {
					if (!deferredPrompt) {
						console.log('beforeinstallprompt did not fire, but showing prompt anyway');
						// Keep showing the prompt for manual installation
					}
				}, 2000);
			}
		});

		// Listen for updates to the service worker
		if ('serviceWorker' in navigator) {
			navigator.serviceWorker.ready.then(registration => {
				registration.addEventListener('updatefound', () => {
					const newWorker = registration.installing;
					newWorker.addEventListener('statechange', () => {
						if (newWorker.state === 'installed' && navigator.serviceWorker.controller) {
							console.log('New service worker available. App will update on next load.');
						}
					});
				});
			});
		}
	</script>
</body>
</html>
