<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel CRUD API — Swagger UI</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .code-block {
            position: relative;
        }

        .copy-btn {
            position: absolute;
            top: 8px;
            right: 8px;
        }

        .copy-feedback {
            position: absolute;
            top: 8px;
            right: 40px;
            font-size: 0.875rem;
            color: #10b981;
            font-weight: 500;
            opacity: 0;
            transition: opacity 0.3s;
        }

        .copy-feedback.show {
            opacity: 1;
        }
    </style>
</head>

<body class="bg-gray-50 text-gray-800">

    <!-- Header -->
    <header class="bg-blue-600 text-white py-10">
        <div class="max-w-5xl mx-auto px-4">
            <h1 class="text-3xl font-semibold">Backend API — Learning Sandbox</h1>
            <p class="mt-2 text-blue-100 text-lg max-w-3xl">
                A small Laravel backend API with CRUD endpoints and Swagger UI documentation — built for learners to explore, learn, and experiment with authenticated API workflows.
            </p>
        </div>
    </header>

    <main class="max-w-5xl mx-auto px-4 py-10 space-y-10">

        <!-- What this project provides -->
        <section class="bg-white p-6 rounded-xl shadow-sm border border-gray-200">
            <h2 class="text-xl font-semibold mb-4">What this project provides</h2>
            <ul class="list-disc pl-6 space-y-1">
                <li><strong>RESTful user CRUD</strong> endpoints: register, login, list, show, create, update, delete.</li>
                <li><strong>Bearer token authentication</strong> for protected endpoints.</li>
                <li><strong>Swagger UI</strong> interactive docs for exploring request/response models.</li>
                <li>Simple codebase ideal for learning API design and Laravel controller patterns.</li>
            </ul>
        </section>

        <!-- Quick links -->
        <section class="bg-white p-6 rounded-xl shadow-sm border border-gray-200">
            <h2 class="text-xl font-semibold mb-4">Quick links</h2>

            <a href="/api/documentation" target="_blank"
                class="inline-block bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
                Open Swagger UI
            </a>
            <span class="text-gray-500 ml-2">(interactive API docs)</span>

            <p class="mt-4 text-gray-500">
                <a href="/" class="hover:text-blue-600">Home</a> ·
                <a href="/api/documentation" target="_blank" class="hover:text-blue-600">API Docs</a>
            </p>
        </section>

        <!-- How to run -->
        <section class="bg-white p-6 rounded-xl shadow-sm border border-gray-200">
            <h2 class="text-xl font-semibold mb-4">How to run and use (local)</h2>
            <ol class="list-decimal pl-6 space-y-4">
                <li>
                    Start the dev server:
                    <div class="code-block">
                        <pre class="bg-gray-900 text-gray-200 p-4 rounded-lg mt-2 overflow-x-auto text-sm">php artisan serve --host=127.0.0.1 --port=8000</pre>
                        <button class="copy-btn bg-blue-500 hover:bg-blue-600 text-white p-2 rounded transition" onclick="copyCode(this)" title="Copy">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                            </svg>
                        </button>
                        <div class="copy-feedback">Copied!</div>
                    </div>
                </li>
                <li>
                    Open Swagger UI:
                    <code class="bg-gray-100 px-2 py-1 rounded">http://127.0.0.1:8000/api/documentation</code>
                </li>
                <li>Or use curl / HTTP client to call endpoints.</li>
            </ol>
        </section>

        <!-- API Examples -->
        <section class="bg-white p-6 rounded-xl shadow-sm border border-gray-200">
            <h2 class="text-xl font-semibold mb-4">Common API examples</h2>
            <p class="text-gray-600 mb-4">Register, login and use Bearer token to call protected endpoints.</p>

            <h3 class="font-semibold mt-4">1) Register</h3>
            <div class="code-block">
                <pre class="bg-gray-900 text-gray-200 p-4 rounded-lg text-sm overflow-x-auto">curl -s -X POST http://127.0.0.1:8000/api/register \
  -H "Content-Type: application/json" \
  -d '{"name":"Alice","email":"alice@example.com","password":"secret123"}'</pre>
                <button class="copy-btn bg-blue-500 hover:bg-blue-600 text-white p-2 rounded transition" onclick="copyCode(this)" title="Copy">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                    </svg>
                </button>
                <div class="copy-feedback">Copied!</div>
            </div>

            <h3 class="font-semibold mt-4">2) Login</h3>
            <div class="code-block">
                <pre class="bg-gray-900 text-gray-200 p-4 rounded-lg text-sm overflow-x-auto">curl -s -X POST http://127.0.0.1:8000/api/login \
  -H "Content-Type: application/json" \
  -d '{"email":"alice@example.com","password":"secret123"}'
# Response: { "token": "1|abc..." }</pre>
                <button class="copy-btn bg-blue-500 hover:bg-blue-600 text-white p-2 rounded transition" onclick="copyCode(this)" title="Copy">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                    </svg>
                </button>
                <div class="copy-feedback">Copied!</div>
            </div>

            <h3 class="font-semibold mt-4">3) Create a user (protected)</h3>
            <div class="code-block">
                <pre class="bg-gray-900 text-gray-200 p-4 rounded-lg text-sm overflow-x-auto">curl -s -X POST http://127.0.0.1:8000/api/users \
  -H "Content-Type: application/json" \
  -H "Authorization: Bearer YOUR_TOKEN_HERE" \
  -d '{"name":"Bob","email":"bob@example.com","password":"secret123"}'</pre>
                <button class="copy-btn bg-blue-500 hover:bg-blue-600 text-white p-2 rounded transition" onclick="copyCode(this)" title="Copy">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                    </svg>
                </button>
                <div class="copy-feedback">Copied!</div>
            </div>

            <h3 class="font-semibold mt-4">4) List users (public)</h3>
            <div class="code-block">
                <pre class="bg-gray-900 text-gray-200 p-4 rounded-lg text-sm overflow-x-auto">curl -s http://127.0.0.1:8000/api/users</pre>
                <button class="copy-btn bg-blue-500 hover:bg-blue-600 text-white p-2 rounded transition" onclick="copyCode(this)" title="Copy">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                    </svg>
                </button>
                <div class="copy-feedback">Copied!</div>
            </div>

            <p class="text-gray-500 mt-2">
                Note: tokens are in the form <code class="bg-gray-100 px-1 py-0.5 rounded">&lt;id&gt;|&lt;secret&gt;</code>.
            </p>
        </section>

        <!-- Tech Stack -->
        <section class="bg-white p-6 rounded-xl shadow-sm border border-gray-200">
            <h2 class="text-xl font-semibold mb-4">Tech Stack</h2>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <h3 class="font-semibold text-blue-600 mb-2">Backend Framework</h3>
                    <ul class="list-disc pl-6 space-y-1 text-sm">
                        <li><strong>Laravel 12.49.0</strong> — PHP web framework for rapid API development</li>
                        <li><strong>PHP 8.3+</strong> — Server-side language</li>
                    </ul>
                </div>
                <div>
                    <h3 class="font-semibold text-blue-600 mb-2">Authentication & Security</h3>
                    <ul class="list-disc pl-6 space-y-1 text-sm">
                        <li><strong>Bearer Token Auth</strong> — Custom middleware for stateless API auth</li>
                        <li><strong>Sanctum Tokens</strong> — Personal access tokens stored with sha256 hashing</li>
                        <li><strong>Laravel Policies</strong> — Role-based authorization</li>
                    </ul>
                </div>
                <div>
                    <h3 class="font-semibold text-blue-600 mb-2">Database</h3>
                    <ul class="list-disc pl-6 space-y-1 text-sm">
                        <li><strong>MySQL / MariaDB</strong> — Relational database for users, products, orders</li>
                        <li><strong>Eloquent ORM</strong> — Laravel's expressive query builder</li>
                        <li><strong>Migrations & Seeders</strong> — Schema versioning and sample data</li>
                    </ul>
                </div>
                <div>
                    <h3 class="font-semibold text-blue-600 mb-2">API Documentation</h3>
                    <ul class="list-disc pl-6 space-y-1 text-sm">
                        <li><strong>L5-Swagger</strong> — Generates OpenAPI/Swagger docs from PHP annotations</li>
                        <li><strong>Swagger UI</strong> — Interactive API explorer and request tester</li>
                        <li><strong>OpenAPI 3.0</strong> — API contract specification</li>
                    </ul>
                </div>

            </div>
        </section>

        <!-- Learning benefits -->
        <section class="bg-white p-6 rounded-xl shadow-sm border border-gray-200">
            <h2 class="text-xl font-semibold mb-4">How this helps learners grow</h2>
            <ul class="list-disc pl-6 space-y-1">
                <li>See a minimal Laravel API structure (routes, controllers, models).</li>
                <li>Understand token-based auth flows and how Bearer tokens work.</li>
                <li>Learn database design with migrations, seeders, and Eloquent ORM.</li>
                <li>Experiment with Swagger UI to understand request/response contracts.</li>
                <li>Explore role-based authorization using Laravel Policies.</li>
                <li>Modify controllers or add routes, then regenerate docs with <code class="bg-gray-100 px-1 rounded">php artisan l5-swagger:generate</code>.</li>
            </ul>
        </section>

        <!-- Developer notes -->
        <section class="bg-white p-6 rounded-xl shadow-sm border border-gray-200">
            <h2 class="text-xl font-semibold mb-4">Developer notes</h2>
            <ul class="list-disc pl-6 space-y-2">
                <li>
                    Regenerate Swagger docs:
                    <div class="code-block">
                        <pre class="bg-gray-900 text-gray-200 p-4 rounded-lg text-sm overflow-x-auto">php artisan l5-swagger:generate</pre>
                        <button class="copy-btn bg-blue-500 hover:bg-blue-600 text-white p-2 rounded transition" onclick="copyCode(this)" title="Copy">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                            </svg>
                        </button>
                        <div class="copy-feedback">Copied!</div>
                    </div>
                </li>
                <li>Logs: <code class="bg-gray-100 px-1 rounded">storage/logs/laravel.log</code></li>
                <li>DB config in <code class="bg-gray-100 px-1 rounded">.env</code>. Run migrations and seeders as needed.</li>
            </ul>
        </section>

        <footer class="text-center text-gray-500 py-10">
            Built for learning — explore <code class="bg-gray-100 px-1 rounded">app/Http/Controllers/Api</code> and try adding endpoints.
        </footer>

    </main>

    <!-- Scroll to Top Button -->
    <button id="scrollTopBtn" class="fixed bottom-8 right-8 bg-blue-600 text-white p-3 rounded-full shadow-lg hover:bg-blue-700 transition opacity-0 invisible duration-300" title="Scroll to top">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7-7m0 0L5 14m7-7v12"></path>
        </svg>
    </button>

    <script>
        // Copy code to clipboard
        function copyCode(button) {
            const codeBlock = button.closest('.code-block');
            const preElement = codeBlock.querySelector('pre');
            const text = preElement.textContent;

            navigator.clipboard.writeText(text).then(() => {
                const feedback = codeBlock.querySelector('.copy-feedback');
                feedback.classList.add('show');
                setTimeout(() => feedback.classList.remove('show'), 2000);
            }).catch(err => console.error('Copy failed:', err));
        }

        const scrollTopBtn = document.getElementById('scrollTopBtn');

        // Show/hide scroll to top button
        window.addEventListener('scroll', () => {
            if (window.pageYOffset > 300) {
                scrollTopBtn.classList.remove('opacity-0', 'invisible');
                scrollTopBtn.classList.add('opacity-100', 'visible');
            } else {
                scrollTopBtn.classList.add('opacity-0', 'invisible');
                scrollTopBtn.classList.remove('opacity-100', 'visible');
            }
        });

        // Scroll to top on click
        scrollTopBtn.addEventListener('click', () => {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    </script>

</body>

</html>