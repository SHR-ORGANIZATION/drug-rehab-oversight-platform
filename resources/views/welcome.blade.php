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
	<title>Welcome — NexusCare</title>
	<meta name="description" content="Professional drug rehab management system — patient tracking, clinical reports, alerts, and caregiver coordination." />
	<script src="https://cdn.tailwindcss.com"></script>
	<style>
		/* Custom animations */
		@keyframes fadeUp { from { opacity: 0; transform: translateY(12px); } to { opacity: 1; transform: translateY(0); } }
		.animate-fade-up { animation: fadeUp 700ms cubic-bezier(.16,.84,.29,1) both; }
		.glass { background: rgba(255,255,255,0.8); backdrop-filter: blur(6px); }
		/* Smooth scrolling for anchor nav */
		html { scroll-behavior: smooth; }
		#install-prompt {
			position: fixed;
			bottom: 20px;
			right: 20px;
			background: linear-gradient(135deg, #2563eb 0%, #0284c7 100%);
			color: white;
			padding: 16px 24px;
			border-radius: 12px;
			box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
			display: flex;
			gap: 12px;
			align-items: center;
			z-index: 100;
			max-width: 400px;
			animation: slideUp 0.3s ease-out;
		}
		#install-prompt.hidden { display: none; }
		@media (max-width: 640px) {
			#install-prompt {
				bottom: 10px;
				right: 10px;
				left: 10px;
				max-width: none;
			}
		}
		@keyframes slideUp {
			from {
				transform: translateY(120px);
				opacity: 0;
			}
			to {
				transform: translateY(0);
				opacity: 1;
			}
		}
		#install-prompt button {
			background: white;
			color: #2563eb;
			border: none;
			padding: 8px 16px;
			border-radius: 6px;
			font-weight: 600;
			cursor: pointer;
			transition: all 0.2s;
		}
		#install-prompt button:hover {
			transform: scale(1.05);
		}
		#install-prompt .close {
			background: rgba(255, 255, 255, 0.2);
			color: white;
			padding: 4px 8px;
			cursor: pointer;
			border-radius: 4px;
			margin-left: auto;
		}
	</style>
</head>
<body class="bg-gradient-to-b from-gray-50 to-gray-100 text-gray-800">
	<header class="w-full border-b bg-white/60 glass fixed top-0 left-0 right-0 z-30">
		<div class="max-w-6xl mx-auto px-6 py-4 flex items-center justify-between">
			<div class="flex items-center gap-4">
				<div class="w-10 h-10 rounded-md bg-blue-600 flex items-center justify-center text-white font-bold">NC</div>
				<div>
					<a href="/" class="text-lg font-semibold">NexusCare</a>
					<div class="text-xs text-gray-500">Clinical & Care Coordination</div>
				</div>
			</div>

			<nav class="hidden md:flex items-center gap-6 text-sm">
				<a href="#how" class="hover:text-blue-600">How it works</a>
				<a href="#vision" class="hover:text-blue-600">Vision</a>
				<a href="#mission" class="hover:text-blue-600">Mission</a>
				<a href="#contact" class="hover:text-blue-600">Contact</a>
				<a href="{{ route('login') }}" class="px-3 py-2 bg-blue-600 text-white rounded-md text-sm">Doctor Login</a>
				<a href="{{ route('caregiver.login') }}" class="px-3 py-2 bg-purple-600 text-white rounded-md text-sm">Caregiver Login</a>
				<a href="{{ route('register') }}" class="px-3 py-2 border border-gray-200 rounded-md text-sm">Register</a>
			</nav>

			<div class="md:hidden flex items-center gap-3">
				<a href="{{ route('login') }}" class="px-3 py-2 bg-blue-600 text-white rounded-md text-sm">Doctor</a>
				<a href="{{ route('caregiver.login') }}" class="px-3 py-2 bg-purple-600 text-white rounded-md text-sm">Caregiver</a>
			</div>
		</div>
	</header>

	<main class="pt-28">
		<section class="max-w-6xl mx-auto px-6 py-16">
			<div class="grid md:grid-cols-2 gap-12 items-center">
				<div class="space-y-6">
					<h1 class="text-4xl md:text-5xl font-extrabold leading-tight animate-fade-up">Modern care coordination for substance use recovery</h1>
					<p class="text-lg text-gray-600 animate-fade-up" style="animation-delay:80ms">A modern platform that helps rehabilitation centers manage patient intake, clinical reporting, and caregiver coordination with confidence.</p>

					{{-- <div class="flex flex-col sm:flex-row sm:items-center gap-4 mt-4 animate-fade-up" style="animation-delay:160ms">
					<a href="{{ route('login') }}" class="inline-flex items-center justify-center gap-2 px-5 py-3 bg-blue-600 text-white rounded-md shadow">Login</a>
					<a href="{{ route('register') }}" class="inline-flex items-center justify-center gap-2 px-5 py-3 border border-gray-200 rounded-md">Register</a>
					</div> --}}

					<div class="mt-3 text-sm text-gray-600 animate-fade-up" style="animation-delay:220ms">
						<p>Register as a parent to submit daily reports about your child.</p>
					</div>

					<div class="mt-8 grid gap-3 sm:grid-cols-3 text-sm text-gray-700 animate-fade-up" style="animation-delay:280ms">
						<div class="rounded-3xl border border-gray-200 bg-white p-4 shadow-sm">
							<div class="font-semibold">Secure data</div>
							<p class="mt-2 text-gray-500">Encrypted patient records with role-based access.</p>
						</div>
						<div class="rounded-3xl border border-gray-200 bg-white p-4 shadow-sm">
							<div class="font-semibold">Parent daily reports</div>
							<p class="mt-2 text-gray-500">Parents submit home observations about their child each day.</p>
						</div>
						<div class="rounded-3xl border border-gray-200 bg-white p-4 shadow-sm">
							<div class="font-semibold">Real-time alerts</div>
							<p class="mt-2 text-gray-500">Monitor risk and respond to critical cases without delay.</p>
						</div>
					</div>

					<div class="mt-6 grid grid-cols-2 gap-3 text-sm">
						<div class="p-3 bg-white rounded-md shadow-sm">
							<div class="font-semibold">Improved Outcomes</div>
							<div class="text-gray-500">Real-time tracking and reports to support clinical decisions.</div>
						</div>
						<div class="p-3 bg-white rounded-md shadow-sm">
							<div class="font-semibold">Secure & Compliant</div>
							<div class="text-gray-500">Role-based access and audit-ready records.</div>
						</div>
					</div>
				</div>

				<div class="relative">
					<div class="rounded-xl overflow-hidden shadow-lg border border-gray-100 bg-gradient-to-br from-white to-gray-50 p-6">
						<div class="flex items-center justify-between">
							<div>
								<div class="text-xs text-gray-400">Example Dashboard</div>
								<div class="text-lg font-medium">Today: 24 active patients</div>
							</div>
							<div class="px-3 py-1 bg-green-100 text-green-700 rounded-full text-sm">Stable</div>
						</div>

						<div class="mt-6 grid grid-cols-2 gap-4">
							<div class="p-3 bg-white rounded-lg shadow-sm">
								<div class="text-xs text-gray-400">New Reports</div>
								<div class="text-xl font-semibold">8</div>
							</div>
							<div class="p-3 bg-white rounded-lg shadow-sm">
								<div class="text-xs text-gray-400">High Risk</div>
								<div class="text-xl font-semibold text-red-600">2</div>
							</div>
						</div>

						<div class="mt-6">
							<div class="h-2 bg-gray-200 rounded-full overflow-hidden">
								<div class="h-2 bg-blue-500 rounded-full" style="width:62%"></div>
							</div>
							<div class="text-xs text-gray-500 mt-2">Care plan completion: 62%</div>
						</div>
					</div>
					<div class="absolute -right-8 -bottom-8 w-40 h-40 rounded-full bg-gradient-to-tr from-blue-400 to-teal-300 opacity-30 blur-3xl"></div>
				</div>
			</div>
		</section>

		<section id="how" class="max-w-6xl mx-auto px-6 py-12">
			<div class="mb-10 text-center">
				<div class="text-sm uppercase tracking-[0.35em] text-blue-600">Key Features</div>
				<h2 class="mt-4 text-3xl font-bold text-slate-900">Powerful tools designed for recovery care teams</h2>
				<p class="mt-3 text-gray-600 max-w-2xl mx-auto">A modern platform that combines patient management, reporting, alerts, and caregiver coordination in one polished interface.</p>
			</div>

			<div class="grid md:grid-cols-3 gap-6">
				<div class="p-8 bg-white rounded-3xl shadow-xl border border-gray-100 animate-fade-up">
					<div class="flex items-center justify-between gap-3">
						<div class="rounded-2xl bg-blue-50 p-3 text-blue-600">
							<span class="text-xl">📋</span>
						</div>
						<div>
							<h3 class="text-lg font-semibold text-slate-900">Patient Management</h3>
							<p class="mt-2 text-gray-500 text-sm">Easily register patients, track status, and assign caregivers from one dashboard.</p>
						</div>
					</div>
				</div>
				<div class="p-8 bg-white rounded-3xl shadow-xl border border-gray-100 animate-fade-up" style="animation-delay:60ms">
					<div class="flex items-center justify-between gap-3">
						<div class="rounded-2xl bg-teal-50 p-3 text-teal-600">
							<span class="text-xl">📈</span>
						</div>
						<div>
							<h3 class="text-lg font-semibold text-slate-900">Clinical Reporting</h3>
							<p class="mt-2 text-gray-500 text-sm">Generate standardized clinical reports for care review and documentation.</p>
						</div>
					</div>
				</div>
				<div class="p-8 bg-white rounded-3xl shadow-xl border border-gray-100 animate-fade-up" style="animation-delay:120ms">
					<div class="flex items-center justify-between gap-3">
						<div class="rounded-2xl bg-amber-50 p-3 text-amber-600">
							<span class="text-xl">⚠️</span>
						</div>
						<div>
							<h3 class="text-lg font-semibold text-slate-900">Risk & Alerts</h3>
							<p class="mt-2 text-gray-500 text-sm">Monitor patient risk scores and receive alerts for cases that require attention.</p>
						</div>
					</div>
				</div>
			</div>
		</section>

		<section class="max-w-6xl mx-auto px-6 py-10" id="how-it-works">
			<div class="mb-10 text-center">
				<div class="text-sm uppercase tracking-[0.35em] text-blue-600">How it works</div>
				<h2 class="mt-4 text-3xl font-bold text-slate-900">Simple workflow for care teams</h2>
				<p class="mt-3 text-gray-600 max-w-2xl mx-auto">From intake to ongoing monitoring, this system supports the full rehabilitation care cycle with clarity and speed.</p>
			</div>

			<div class="grid md:grid-cols-3 gap-6">
				<div class="p-8 bg-white rounded-3xl shadow-xl border border-gray-100 animate-fade-up">
					<div class="text-blue-600 text-3xl">1</div>
					<h3 class="mt-4 text-xl font-semibold text-slate-900">Register patient details</h3>
					<p class="mt-3 text-gray-500 leading-7">Capture demographics, intake history, and care assignments in one secure record.</p>
				</div>
				<div class="p-8 bg-white rounded-3xl shadow-xl border border-gray-100 animate-fade-up" style="animation-delay:60ms">
					<div class="text-teal-600 text-3xl">2</div>
					<h3 class="mt-4 text-xl font-semibold text-slate-900">Create clinical reports</h3>
					<p class="mt-3 text-gray-500 leading-7">Log observations, treatment plans, and progress notes with structured report tools.</p>
				</div>
				<div class="p-8 bg-white rounded-3xl shadow-xl border border-gray-100 animate-fade-up" style="animation-delay:120ms">
					<div class="text-amber-600 text-3xl">3</div>
					<h3 class="mt-4 text-xl font-semibold text-slate-900">Monitor and respond</h3>
					<p class="mt-3 text-gray-500 leading-7">Review risk alerts, performance metrics, and caregiver activity to prioritize support.</p>
				</div>
			</div>
		</section>

		<section class="max-w-6xl mx-auto px-6 py-10">
			<div class="grid lg:grid-cols-4 gap-6">
				<div class="p-8 bg-white rounded-3xl shadow-xl border border-gray-100 animate-fade-up">
					<div class="text-xs uppercase tracking-[0.3em] text-blue-600">Vision</div>
					<h2 class="mt-4 text-2xl font-semibold text-slate-900">A safer, connected recovery journey</h2>
					<p class="mt-4 text-gray-600 leading-7">We envision a recovery ecosystem where every care decision is supported by real-time patient data and clear team coordination.</p>
				</div>
				<div class="p-8 bg-white rounded-3xl shadow-xl border border-gray-100 animate-fade-up" style="animation-delay:80ms">
					<div class="text-xs uppercase tracking-[0.3em] text-teal-600">Mission</div>
					<h2 class="mt-4 text-2xl font-semibold text-slate-900">Empower clinical teams with one platform</h2>
					<p class="mt-4 text-gray-600 leading-7">Deliver a modern, secure system for registering patients, generating reports, assigning caregivers, and identifying risks early.</p>
				</div>
				<div class="lg:col-span-2 grid gap-6 lg:grid-cols-2">
					<div class="p-8 bg-gradient-to-br from-blue-600 to-cyan-500 text-white rounded-3xl shadow-2xl animate-fade-up" style="animation-delay:160ms">
						<div class="text-xs uppercase tracking-[0.3em] text-blue-200">Why it matters</div>
						<h3 class="mt-4 text-2xl font-semibold">Improve outcomes with clarity</h3>
						<p class="mt-4 text-blue-100 leading-7">Unified patient data reduces delays and helps caregivers act faster when a patient’s condition changes.</p>
					</div>
					<div class="p-8 bg-white rounded-3xl shadow-xl border border-gray-100 animate-fade-up" style="animation-delay:220ms">
						<div class="text-xs uppercase tracking-[0.3em] text-slate-400">Support</div>
						<h3 class="mt-4 text-2xl font-semibold text-slate-900">We’re here for your team</h3>
						<p class="mt-3 text-gray-600 leading-7">Contact us for setup, training, or custom workflow support so your team can start using the system quickly.</p>
					</div>
				</div>
			</div>
		</section>

		<section id="contact" class="max-w-6xl mx-auto px-6 py-10">
			<div class="mb-10 text-center">
				<div class="text-sm uppercase tracking-[0.35em] text-blue-600">Contact</div>
				<h2 class="mt-4 text-3xl font-bold text-slate-900">Reach our team</h2>
				<p class="mt-3 text-gray-600 max-w-2xl mx-auto">Connect with us through call, WhatsApp, email, or social media. Each channel is organized for fast support.</p>
			</div>

			<div class="grid md:grid-cols-4 gap-6">
				<div class="p-8 bg-white rounded-3xl shadow-xl border border-gray-100 animate-fade-up">
					<div class="text-3xl">📞</div>
					<h3 class="mt-4 text-xl font-semibold text-slate-900">Call</h3>
					<p class="mt-3 text-gray-500">0783394797</p>
				</div>
				<div class="p-8 bg-white rounded-3xl shadow-xl border border-gray-100 animate-fade-up" style="animation-delay:60ms">
					<div class="text-3xl">💬</div>
					<h3 class="mt-4 text-xl font-semibold text-slate-900">WhatsApp</h3>
					<p class="mt-3 text-gray-500">0783394797</p>
				</div>
				<div class="p-8 bg-white rounded-3xl shadow-xl border border-gray-100 animate-fade-up" style="animation-delay:120ms">
					<div class="text-3xl">✉️</div>
					<h3 class="mt-4 text-xl font-semibold text-slate-900">Email</h3>
					<p class="mt-3 text-gray-500">yusrasaid2003@gmail.com</p>
				</div>
				<div class="p-8 bg-white rounded-3xl shadow-xl border border-gray-100 animate-fade-up" style="animation-delay:180ms">
					<div class="text-3xl">📱</div>
					<h3 class="mt-4 text-xl font-semibold text-slate-900">Instagram & TikTok</h3>
					<p class="mt-3 text-gray-500">@yourhandle</p>
				</div>
			</div>
		</section>

	</main>
			<div class="grid md:grid-cols-3 gap-6">
				<div class="p-6 bg-white rounded-3xl shadow-lg border border-gray-100 animate-fade-up">
					<div class="text-xs uppercase tracking-[0.3em] text-gray-400">Why this system</div>
					<h4 class="mt-4 text-xl font-semibold text-slate-900">Organize care without friction</h4>
					<p class="mt-3 text-gray-600 leading-7">Centralized records and guided workflows help clinicians keep patient care consistent and transparent.</p>
				</div>
				<div class="p-6 bg-white rounded-3xl shadow-lg border border-gray-100 animate-fade-up" style="animation-delay:80ms">
					<div class="text-xs uppercase tracking-[0.3em] text-gray-400">Core goals</div>
					<h4 class="mt-4 text-xl font-semibold text-slate-900">Focus on outcomes</h4>
					<ul class="mt-3 space-y-2 text-gray-600 text-sm">
						<li class="flex items-start gap-3"><span class="mt-1 inline-flex h-6 w-6 items-center justify-center rounded-full bg-blue-100 text-blue-600 text-xs font-bold">1</span>Reliable patient tracking</li>
						<li class="flex items-start gap-3"><span class="mt-1 inline-flex h-6 w-6 items-center justify-center rounded-full bg-blue-100 text-blue-600 text-xs font-bold">2</span>Clear clinical reporting</li>
						<li class="flex items-start gap-3"><span class="mt-1 inline-flex h-6 w-6 items-center justify-center rounded-full bg-blue-100 text-blue-600 text-xs font-bold">3</span>Automated alerts for high-risk cases</li>
					</ul>
				</div>
				<div class="p-6 bg-white rounded-3xl shadow-lg border border-gray-100 animate-fade-up" style="animation-delay:160ms">
					<div class="text-xs uppercase tracking-[0.3em] text-gray-400">Support</div>
					<h4 class="mt-4 text-xl font-semibold text-slate-900">We’re here for your team</h4>
					<p class="mt-3 text-gray-600 leading-7">Contact us for setup, training, or custom workflow support so your team can start using the system quickly.</p>
				</div>
			</div>
		</section>
	</main>

	<footer class="mt-12 py-8 border-t">
		<div class="max-w-6xl mx-auto px-6 text-sm text-gray-500 flex items-center justify-between">
			<div>© <span id="year"></span> NexusCare — All rights reserved.</div>
			<div>Built for coordinated patient care</div>
		</div>
	</footer>

	<script>
		document.getElementById('year').textContent = new Date().getFullYear();
	</script>

	<!-- PWA Install Prompt -->
	<div id="install-prompt">
		<div>
			<div style="font-weight: 600; font-size: 1rem;">📱 Install NexusCare</div>
			<div style="font-size: 0.875rem; opacity: 0.9;">Add to Home Screen for quick access</div>
		</div>
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
						console.log('✅ Service Worker registered:', registration);
					})
					.catch(error => {
						console.log('❌ Service Worker registration failed:', error);
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
			console.log('✅ App is already installed in standalone mode');
			installPrompt.classList.add('hidden');
		}

		// Capture the install prompt event (Chrome, Edge, etc.)
		window.addEventListener('beforeinstallprompt', (e) => {
			console.log('✅ beforeinstallprompt event fired!');
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
			console.log('🎉 App installed successfully!');
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
						console.log('⚠️ beforeinstallprompt did not fire, but showing prompt anyway');
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
							console.log('🔄 New service worker available. App will update on next load.');
						}
					});
				});
			});
		}
	</script>
</body>
</html>
