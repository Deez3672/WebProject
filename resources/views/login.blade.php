<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In - Cook with Experts</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Animations */
        @keyframes fadeIn { from { opacity: 0; transform: translateY(-10px); } to { opacity: 1; transform: translateY(0); } }
        @keyframes slideIn { from { opacity: 0; transform: translateX(-20px); } to { opacity: 1; transform: translateX(0); } }
        @keyframes pulse { 0%, 100% { transform: scale(1); } 50% { transform: scale(1.05); } }
        @keyframes spin { to { transform: rotate(360deg); } }
        @keyframes modalFadeIn { from { opacity: 0; transform: scale(0.9); } to { opacity: 1; transform: scale(1); } }

        /* Form animation and inputs */
        .form-container { animation: fadeIn 0.6s ease-out; }
        .input-group { animation: slideIn 0.4s ease-out; }

        input:focus {
            box-shadow: 0 0 0 3px rgba(249, 115, 22, 0.1);
        }

        .input-error {
            border-color: #dc2626;
            box-shadow: 0 0 0 3px rgba(220, 38, 38, 0.1);
        }

        .input-success {
            border-color: #16a34a;
            box-shadow: 0 0 0 3px rgba(22, 163, 74, 0.1);
        }

        /* Buttons */
        .btn-primary:hover {
            transform: translateY(-1px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }
        .btn-loading {
            position: relative;
            color: transparent;
        }
        .btn-loading::after {
            content: '';
            position: absolute;
            width: 16px;
            height: 16px;
            top: 50%;
            left: 50%;
            margin-left: -8px;
            margin-top: -8px;
            border: 2px solid #ffffff;
            border-radius: 50%;
            border-top-color: transparent;
            animation: spin 1s linear infinite;
        }

        /* Messages */
        .message {
            padding: 12px 16px;
            border-radius: 8px;
            margin-bottom: 16px;
            font-size: 14px;
            font-weight: 500;
        }
        .message-error {
            background-color: #fef2f2;
            color: #dc2626;
            border: 1px solid #fecaca;
        }
        .message-success {
            background-color: #f0fdf4;
            color: #16a34a;
            border: 1px solid #bbf7d0;
        }

        /* Misc */
        a { transition: all 0.2s ease; }
        .modal-enter { animation: modalFadeIn 0.3s ease-out; }
    </style>
</head>
<body class="min-h-screen bg-gradient-to-br from-orange-50 to-red-50">
    <div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8">
            <div class="text-center">
                <div class="mx-auto h-12 w-12 bg-gradient-to-r from-orange-400 to-red-500 rounded-full flex items-center justify-center mb-4">
                    <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                    </svg>
                </div>
                <h2 class="text-3xl font-extrabold text-gray-900">Welcome back</h2>
                <p class="mt-2 text-sm text-gray-600">Sign in to continue cooking with the experts</p>
            </div>

            <form class="mt-8 space-y-6" id="loginForm">
                <div class="rounded-lg bg-white p-8 shadow-xl">
                    <div class="space-y-6">
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                                Email address
                            </label>
                            <input
                                id="email"
                                name="email"
                                type="email"
                                autocomplete="email"
                                required
                                class="appearance-none relative block w-full px-4 py-3 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent transition-all duration-200"
                                placeholder="Enter your email"
                            >
                        </div>

                        <div>
                            <label for="password" class="block text-sm font-medium text-gray-700 mb-2">
                                Password
                            </label>
                            <div class="relative">
                                <input
                                    id="password"
                                    name="password"
                                    type="password"
                                    autocomplete="current-password"
                                    required
                                    class="appearance-none relative block w-full px-4 py-3 pr-12 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent transition-all duration-200"
                                    placeholder="Enter your password"
                                >
                                <button type="button" id="togglePassword" class="absolute inset-y-0 right-0 pr-3 flex items-center">
                                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>

                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <input id="remember-me" name="remember-me" type="checkbox" class="h-4 w-4 text-orange-600 focus:ring-orange-500 border-gray-300 rounded">
                                <label for="remember-me" class="ml-2 block text-sm text-gray-900">
                                    Remember me
                                </label>
                            </div>
                            <div class="text-sm">
                                <a href="#" class="font-medium text-orange-600 hover:text-orange-500 transition-colors">
                                    Forgot password?
                                </a>
                            </div>
                        </div>

                        <div>
                            <button
                                type="submit"
                                class="group relative w-full flex justify-center py-3 px-4 border border-transparent text-sm font-medium rounded-lg text-white bg-gradient-to-r from-orange-500 to-red-500 hover:from-orange-600 hover:to-red-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500 transition-all duration-200 transform hover:scale-105"
                            >
                                Sign in
                            </button>
                        </div>
                    </div>
                </div>
            </form>
             <div class="text-center">
                <p class="text-sm text-gray-600">
                    Don't have an account?
                    <a href="signup.html" class="font-medium text-orange-600 hover:text-orange-500 transition-colors">
                        Sign up here
                    </a>
                </p>
            </div>
        </div>
    </div>

    <script>
        // JS from auth-utils.js
        function validateEmail(email) {
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return emailRegex.test(email);
        }

        function showMessage(text, type, container) {
            const existing = container.querySelectorAll('.message');
            existing.forEach(msg => msg.remove());

            const message = document.createElement('div');
            message.className = `message message-${type}`;
            message.textContent = text;
            container.insertBefore(message, container.firstChild);

            setTimeout(() => message.remove(), 5000);
        }

        function showLoadingState(button) {
            button.classList.add('btn-loading');
            button.disabled = true;
        }

        function hideLoadingState(button) {
            button.classList.remove('btn-loading');
            button.disabled = false;
        }

        // JS for Login functionality
        document.addEventListener('DOMContentLoaded', () => {
            const loginForm = document.getElementById('loginForm');
            const emailInput = document.getElementById('email');
            const passwordInput = document.getElementById('password');
            const togglePasswordButton = document.getElementById('togglePassword');
            const submitButton = loginForm.querySelector('button[type="submit"]');

            // Password visibility toggle
            togglePasswordButton.addEventListener('click', () => {
                const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                passwordInput.setAttribute('type', type);

                // Update SVG icon (optional but good practice)
                const eyeOpen = `<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>`;
                const eyeClosed = `<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.542-7 1.274-4.057 5.064-7 9.542-7 1.746 0 3.332.477 4.5 1.253"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.613 14.613L16 16m0 0l-1.387-1.387M16 16l-1.387 1.387"></path>`;
                togglePasswordButton.innerHTML = `<svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">${type === 'password' ? eyeOpen : eyeClosed}</svg>`;
            });


            loginForm.addEventListener('submit', async (e) => {
                e.preventDefault();

                const email = emailInput.value;
                const password = passwordInput.value;

                if (!validateEmail(email)) {
                    showMessage('Please enter a valid email address.', 'error', loginForm);
                    emailInput.classList.add('input-error');
                    return;
                }

                emailInput.classList.remove('input-error');
                showLoadingState(submitButton);

                // Laravel-specific code for form submission
                try {
                    const response = await fetch('/login', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        },
                        body: JSON.stringify({ email, password })
                    });

                    if (response.ok) {
                        const data = await response.json();
                        showMessage('Login successful! Redirecting...', 'success', loginForm);
                        // Redirect to a dashboard or a success page
                        window.location.href = data.redirect || '/dashboard';
                    } else {
                        const errorData = await response.json();
                        showMessage(errorData.message || 'Login failed. Please check your credentials.', 'error', loginForm);
                    }
                } catch (error) {
                    showMessage('An unexpected error occurred. Please try again later.', 'error', loginForm);
                    console.error('Login error:', error);
                } finally {
                    hideLoadingState(submitButton);
                }
            });
        });
    </script>
</body>
</html>