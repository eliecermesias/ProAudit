<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ProAudit | Auditorías ISO Inteligentes</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-50 text-gray-800">

    <!-- Header -->
    <header class="bg-white text-blue-900 fixed w-full z-10 shadow">
        <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
            <!-- Logo -->
            <div class="flex items-center space-x-3">
            <img src="{{ asset('images/logo-proaudit_md.png') }}" alt="Logo ProAudit" class="h-10 w-auto" />
            </div>
            <nav class="space-x-6">
            <a href="#beneficios" class="hover:text-blue-500">Beneficios</a>
            <a href="#normas" class="hover:text-blue-500">Normas ISO</a>
            <a href="#contacto" class="hover:text-blue-500">Contacto</a>
            <a href="/login" class="px-4 py-2 bg-blue-900 text-white rounded hover:bg-blue-700">Login</a>
            <a href="/register" class="px-4 py-2 bg-gradient-to-r from-blue-400 to-blue-600 text-white rounded hover:from-blue-300 hover:to-blue-500 font-semibold">Registro</a>
            </nav>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="pt-24 pb-16 bg-blue-900 text-white">
        <div class="max-w-6xl mx-auto px-4 grid md:grid-cols-2 gap-8 items-center">
        <div>
            <h2 class="text-4xl font-serif font-bold mb-4">Auditorías ISO sin complicaciones</h2>
            <p class="text-lg mb-6">Planifica, ejecuta y reporta auditorías internas con eficiencia y claridad.</p>
            <a href="/register" class="px-6 py-3 bg-gradient-to-r from-blue-400 to-blue-600 text-white font-semibold rounded shadow hover:from-blue-300 hover:to-blue-500">Empieza ahora</a>
        </div>
        <div>
            <!-- Imagen principal -->
            <div class="w-full h-64 bg-gray-300 rounded shadow-lg flex items-center justify-center">
                <img src="{{ asset('images/frontPeople.png') }}" alt="Logo ProAudit"  class="rounded"/>
            </div>
        </div>
        </div>
    </section>

    <!-- Beneficios -->
    <section id="beneficios" class="py-16 bg-gray-50">
        <div class="max-w-6xl mx-auto px-4 text-center">
        <h3 class="text-2xl font-bold text-blue-900 mb-8">¿Por qué elegir ProAudit?</h3>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-white p-6 rounded shadow border border-blue-100">
            <!-- Imagen de beneficio 1 -->
            <div class="w-full h-24 bg-gray-200 mb-4 flex items-center justify-center rounded">
                <span class="text-gray-600 text-sm">[Imagen Multi-norma]</span>
            </div>
            <h4 class="font-semibold text-blue-800 mb-2">Multi-norma</h4>
            <p>Audita bajo ISO 9001, 14001, 45001 y 27001 desde una sola plataforma.</p>
            </div>
            <div class="bg-white p-6 rounded shadow border border-blue-100">
            <!-- Imagen de beneficio 2 -->
            <div class="w-full h-24 bg-gray-200 mb-4 flex items-center justify-center rounded">
                <span class="text-gray-600 text-sm">[Imagen Reportes automáticos]</span>
            </div>
            <h4 class="font-semibold text-blue-800 mb-2">Reportes automáticos</h4>
            <p>Genera informes PDF listos para certificación.</p>
            </div>
            <div class="bg-white p-6 rounded shadow border border-blue-100">
            <!-- Imagen de beneficio 3 -->
            <div class="w-full h-24 bg-gray-200 mb-4 flex items-center justify-center rounded">
                <span class="text-gray-600 text-sm">[Imagen Acceso seguro]</span>
            </div>
            <h4 class="font-semibold text-blue-800 mb-2">Acceso seguro</h4>
            <p>Roles definidos y control de acceso por empresa.</p>
            </div>
        </div>
        </div>
    </section>

    <!-- Footer -->
    <footer id="contacto" class="bg-blue-900 text-white py-8 text-center">
        <p class="text-sm">© 2026 ProAudit. Todos los derechos reservados.</p>
        <div class="mt-2 space-x-4">
        <a href="#" class="hover:text-blue-300">LinkedIn</a>
        <a href="#" class="hover:text-blue-300">Twitter</a>
        <a href="#" class="hover:text-blue-300">Email</a>
        </div>
    </footer>
</body>
</html>