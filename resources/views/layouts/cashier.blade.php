<!DOCTYPE html>
<html class="light" lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'CafeKita - Cashier')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
</head>
<body class="font-body antialiased">
    <!-- Sidebar -->
    <x-cashier.sidebar />

    <!-- Main Content Area -->
    <main id="main-content" class="ml-[300px] min-h-screen">
        <!-- Background Decor -->
        <div class="fixed top-0 right-0 w-64 h-64 bg-[#FFE8D1]/20 blur-[100px] -z-10 rounded-full pointer-events-none"></div>
        <div class="fixed bottom-0 left-[300px] w-96 h-96 bg-[#005246]/5 blur-[120px] -z-10 rounded-full pointer-events-none"></div>

        @yield('content')

        @stack('scripts')
    </main>

    <script>
        (function() {
            'use strict';

            function getPath(url) {
                try {
                    const u = new URL(url, window.location.origin);
                    return u.pathname.replace(/\/$/, '') || '/';
                } catch { return url.replace(/\/$/, '') || '/'; }
            }

            function updateActiveNav(currentPath) {
                document.querySelectorAll('nav a').forEach(function(link) {
                    const navHref = link.getAttribute('href');
                    if (!navHref) return;

                    const navPath = getPath(navHref);
                    const isExact = navPath === currentPath;
                    const isChild = currentPath.startsWith(navPath + '/');

                    link.classList.toggle('active-nav', isExact || isChild);
                });
            }

            function isNavigationLink(link) {
                if (!link || link.getAttribute('target') === '_blank') return false;
                const href = link.getAttribute('href');
                if (!href || href === '#' || href.startsWith('javascript:')) return false;
                if (link.hasAttribute('download') || link.matches('a[href$=".pdf"], a[href$=".zip"]')) return false;
                if (href.startsWith('//') || href.startsWith('http')) return false;
                return true;
            }

            function replaceContent(html) {
                const parser = new DOMParser();
                const doc = parser.parseFromString(html, 'text/html');
                const newContent = doc.querySelector('#main-content');
                if (!newContent) return false;
                document.querySelector('#main-content').innerHTML = newContent.innerHTML;
                document.title = doc.title;
                return true;
            }

            function executeScripts() {
                document.querySelectorAll('#main-content script').forEach(function(oldScript) {
                    var newScript = document.createElement('script');
                    Array.from(oldScript.attributes).forEach(function(attr) {
                        newScript.setAttribute(attr.name, attr.value);
                    });
                    newScript.textContent = oldScript.textContent;
                    oldScript.replaceWith(newScript);
                });
            }

            document.addEventListener('click', function(e) {
                var link = e.target.closest('a');
                if (!isNavigationLink(link)) return;

                var href = link.getAttribute('href');
                e.preventDefault();

                var currentPath = getPath(window.location.href);
                var newPath = getPath(href);
                if (currentPath === newPath) return;

                history.pushState({ url: href }, '', href);

                fetch(href, {
                    headers: { 'X-Requested-With': 'XMLHttpRequest' }
                })
                .then(function(res) {
                    if (!res.ok) throw new Error();
                    return res.text();
                })
                .then(function(html) {
                    if (!replaceContent(html)) { window.location.href = href; return; }
                    executeScripts();
                    updateActiveNav(newPath);
                })
                .catch(function() {
                    window.location.href = href;
                });
            });

            window.addEventListener('popstate', function(e) {
                if (e.state && e.state.url) {
                    window.location.href = e.state.url;
                }
            });

            updateActiveNav(getPath(window.location.href));
        })();
    </script>
</body>
</html>
