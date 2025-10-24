<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ComfaTime - Gestión de Vacaciones</title>
    <link href="./output.css" rel="stylesheet">
    <link rel="shortcut icon" href="../public/images/favicon.ico" type="image/x-icon">
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Plus+Jakarta+Sans:wght@500;600;700;800&display=swap" rel="stylesheet">
</head>
<body class="bg-clean-white min-h-screen flex items-center justify-center p-4 overflow-hidden font-sans">
    <!-- Fondo Corporativo Elegante -->
    <div class="absolute inset-0 bg-gradient-to-br from-white to-gray-50">
        <!-- Patrón de ondas corporativas -->
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-0 left-0 w-full h-32 bg-health-green animate-wave" style="background: repeating-linear-gradient(90deg, #009334, #009334 20px, transparent 20px, transparent 40px);"></div>
            <div class="absolute top-32 left-0 w-full h-24 bg-health-yellow animate-wave" style="animation-delay: -2s; background: repeating-linear-gradient(90deg, #f5f103, #f5f103 15px, transparent 15px, transparent 30px);"></div>
            <div class="absolute bottom-0 left-0 w-full h-28 bg-health-green animate-wave" style="animation-delay: -4s; background: repeating-linear-gradient(90deg, #009334, #009334 25px, transparent 25px, transparent 50px);"></div>
        </div>

        <!-- Elementos flotantes corporativos -->
        <div class="absolute top-1/4 left-1/6 w-16 h-16 bg-health-green/10 rounded-full animate-float">
            <svg class="w-6 h-6 text-health-green/30 absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"/>
            </svg>
        </div>
        <div class="absolute top-1/3 right-1/5 w-12 h-12 bg-health-yellow/10 rounded-full animate-float" style="animation-delay: -2s;">
            <svg class="w-5 h-5 text-health-yellow/30 absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"/>
            </svg>
        </div>
        <div class="absolute bottom-1/4 right-1/6 w-20 h-20 bg-health-green/10 rounded-full animate-float" style="animation-delay: -4s;">
            <svg class="w-8 h-8 text-health-green/30 absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/>
            </svg>
        </div>
    </div>

    <!-- Contenedor Principal -->
    <div class="relative z-10 flex w-full max-w-6xl bg-white/95 backdrop-blur-lg rounded-3xl shadow-2xl overflow-hidden border border-gray-100">
        
        <!-- Lado Izquierdo - Información Corporativa -->
        <div class="bg-[#009334] hidden md:flex md:w-1/2 p-12 text-white relative overflow-hidden">
            <div class="absolute inset-0 bg-black/10"></div>
            
            <!-- Elementos decorativos corporativos -->
            <div class="absolute -top-20 -right-20 w-40 h-40 bg-white/10 rounded-full"></div>
            <div class="absolute -bottom-20 -left-20 w-40 h-40 bg-health-yellow/20 rounded-full"></div>
            
            <div class="relative z-10">
                <!-- Logo -->
                <div class="flex items-center mb-8">
                    <div class="w-16 h-16 bg-white rounded-2xl flex items-center justify-center mr-4 shadow-lg">
                       <img src="../public/images/logo-comfachoco.png" alt="Logo de Comfachocó">
                    </div>
                    <div>
                        <h1 class="text-3xl font-bold font-heading">ComfaTime</h1>
                        <p class="text-white/80 text-sm">Gestión de Vacaciones y Permisos</p>
                    </div>
                </div>

                <!-- Mensaje de bienvenida -->
                <div class="mb-12">
                    <h2 class="text-4xl font-bold mb-4 leading-tight font-heading">
                        Tu bienestar laboral,<br>
                        <span class="text-health-yellow">simplificado</span>
                    </h2>
                    <p class="text-lg text-white/90 leading-relaxed">
                        Gestiona tus vacaciones, permisos y licencias de manera fácil y transparente. 
                        Menos trámites, más tiempo para lo importante.
                    </p>
                </div>

                <!-- Beneficios -->
                <div class="space-y-6">
                    <div class="flex items-center">
                        <div class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center mr-4">
                            <svg class="w-6 h-6 text-health-yellow" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-semibold font-heading">Gestión Rápida</h3>
                            <p class="text-white/80 text-sm">Solicita permisos en minutos</p>
                        </div>
                    </div>
                    
                    <div class="flex items-center">
                        <div class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center mr-4">
                            <svg class="w-6 h-6 text-health-yellow" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-semibold font-heading">Transparencia Total</h3>
                            <p class="text-white/80 text-sm">Sigue el estado de tus solicitudes</p>
                        </div>
                    </div>
                    
                    <div class="flex items-center">
                        <div class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center mr-4">
                            <svg class="w-6 h-6 text-health-yellow" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M11.3 1.046A1 1 0 0112 2v5h4a1 1 0 01.82 1.573l-7 10A1 1 0 018 18v-5H4a1 1 0 01-.82-1.573l7-10a1 1 0 011.12-.38z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-semibold font-heading">Autogestión</h3>
                            <p class="text-white/80 text-sm">Controla tus días disponibles</p>
                        </div>
                    </div>
                </div>

                <!-- Cita inspiradora -->
                <div class="mt-12 p-6 bg-white/10 rounded-2xl border border-white/20">
                    <p class="text-lg italic text-white/90">
                        "El equilibrio perfecto entre productividad y bienestar comienza con una buena gestión del tiempo."
                    </p>
                    <p class="text-right text-white/70 mt-2">- Sistema ComfaTime</p>
                </div>
            </div>
        </div>

        <!-- Lado Derecho - Formulario de Login -->
        <div class="w-full md:w-1/2 p-12">
            <!-- Header móvil -->
            <div class="md:hidden flex items-center justify-center mb-8">
                <div class="w-16 h-16 bg-health-green rounded-2xl flex items-center justify-center mr-4 shadow-lg">
                    <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"/>
                    </svg>
                </div>
                <div>
                    <h1 class="text-2xl font-bold text-health-black font-heading">ComfaTime</h1>
                    <p class="text-gray-600 text-sm">Gestión de Vacaciones</p>
                </div>
            </div>

            <!-- Título del formulario -->
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-health-black mb-2 font-heading">Bienvenido</h2>
                <p class="text-gray-600">Accede a tu portal de autogestión</p>
            </div>

            <!-- Formulario -->
            <form class="space-y-6" id="employeeLoginForm">
                <!-- Campo Email -->
                <div class="space-y-2">
                    <label class="flex items-center text-sm font-semibold text-health-black">
                        <svg class="w-4 h-4 mr-2 text-health-green" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"/>
                            <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"/>
                        </svg>
                        Correo Corporativo
                    </label>
                    <div class="relative group">
                        <input 
                            type="email" 
                            name="email"
                            required
                            class="w-full px-4 py-4 bg-gray-50 border-2 border-gray-200 rounded-xl text-health-black placeholder-gray-500 focus:outline-none focus:border-health-green focus:ring-4 focus:ring-health-green/10 transition-all duration-300 group-hover:border-health-green/50"
                            placeholder="tu.email@empresa.com"
                        >
                        <div class="absolute inset-y-0 right-0 flex items-center pr-4">
                            <svg class="w-5 h-5 text-health-green/60 group-hover:text-health-green transition-colors duration-300" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"/>
                                <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"/>
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Campo Teléfono -->
                <div class="space-y-2">
                    <label class="flex items-center text-sm font-semibold text-health-black">
                        <svg class="w-4 h-4 mr-2 text-health-green" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M7 2a2 2 0 00-2 2v12a2 2 0 002 2h6a2 2 0 002-2V4a2 2 0 00-2-2H7zm3 14a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"/>
                        </svg>
                        Teléfono Móvil
                    </label>
                    <div class="relative group">
                        <input 
                            type="tel" 
                            name="phone"
                            required
                            class="w-full px-4 py-4 bg-gray-50 border-2 border-gray-200 rounded-xl text-health-black placeholder-gray-500 focus:outline-none focus:border-health-green focus:ring-4 focus:ring-health-green/10 transition-all duration-300 group-hover:border-health-green/50"
                            placeholder="+57 300 123 4567"
                            pattern="[+]?[0-9\s\-]+"
                        >
                        <div class="absolute inset-y-0 right-0 flex items-center pr-4">
                            <svg class="w-5 h-5 text-health-green/60 group-hover:text-health-green transition-colors duration-300" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M7 2a2 2 0 00-2 2v12a2 2 0 002 2h6a2 2 0 002-2V4a2 2 0 00-2-2H7zm3 14a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Información de verificación -->
                <div class="p-4 bg-blue-50 border border-blue-200 rounded-xl">
                    <div class="flex items-start text-sm text-blue-700">
                        <svg class="w-5 h-5 mr-3 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                        </svg>
                        <div>
                            <strong class="font-semibold">Verificación en dos pasos</strong>
                            <p class="mt-1">Te enviaremos un código de verificación a tu teléfono para confirmar tu identidad.</p>
                        </div>
                    </div>
                </div>

                <!-- Opciones adicionales -->
                <div class="flex items-center justify-between text-sm">
                    <label class="flex items-center text-gray-600 hover:text-health-green transition-colors duration-300 cursor-pointer">
                        <input type="checkbox" class="rounded border-health-green bg-white text-health-green focus:ring-health-green mr-2">
                        Recordar en este equipo
                    </label>
                    <a href="#" class="text-health-green hover:text-health-black font-semibold transition-colors duration-300">
                        ¿Problemas para acceder?
                    </a>
                </div>

                <!-- Botón de Login -->
                <button 
                    type="submit"
                    class="w-full bg-health-green hover:bg-health-green/90 text-white font-bold py-4 px-6 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:scale-105 focus:outline-none focus:ring-4 focus:ring-health-green/20 group font-heading"
                >
                <span class="flex items-center justify-center text-lg">
                    <svg class="w-5 h-5 mr-3 group-hover:rotate-12 transition-transform duration-300" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M3 3a1 1 0 011 1v12a1 1 0 11-2 0V4a1 1 0 011-1zm7.707 3.293a1 1 0 010 1.414L9.414 9H17a1 1 0 110 2H9.414l1.293 1.293a1 1 0 01-1.414 1.414l-3-3a1 1 0 010-1.414l3-3a1 1 0 011.414 0z" clip-rule="evenodd"/>
                    </svg>
                    Acceder al Portal
                </span>
                </button>

                <!-- Selector de Rol -->
                <div class="text-center">
                    <p class="text-gray-600 text-sm mb-3">Acceso rápido por departamento:</p>
                    <div class="flex justify-center space-x-4">
                        <button type="button" class="department-btn px-4 py-2 bg-gray-100 hover:bg-health-green hover:text-white rounded-lg transition-all duration-300 text-sm font-medium" data-dept="employee">
                            <svg class="w-4 h-4 mr-2 inline" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"/>
                            </svg>
                            Empleado
                        </button>
                        <button type="button" class="department-btn px-4 py-2 bg-gray-100 hover:bg-health-green hover:text-white rounded-lg transition-all duration-300 text-sm font-medium" data-dept="supervisor">
                            <svg class="w-4 h-4 mr-2 inline" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"/>
                            </svg>
                            Supervisor
                        </button>
                        <button type="button" class="department-btn px-4 py-2 bg-gray-100 hover:bg-health-green hover:text-white rounded-lg transition-all duration-300 text-sm font-medium" data-dept="hr">
                            <svg class="w-4 h-4 mr-2 inline" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 1a4.5 4.5 0 00-4.5 4.5V9H5a2 2 0 00-2 2v6a2 2 0 002 2h10a2 2 0 002-2v-6a2 2 0 00-2-2h-.5V5.5A4.5 4.5 0 0010 1zm3 8V5.5a3 3 0 10-6 0V9h6z" clip-rule="evenodd"/>
                            </svg>
                            RRHH
                        </button>
                    </div>
                </div>

                <!-- Mensaje de error -->
                <div id="loginErrorMessage" class="hidden bg-red-50 border border-red-200 text-red-600 px-4 py-3 rounded-xl text-sm">
                    <svg class="w-4 h-4 mr-2 inline" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.28 7.22a.75.75 0 00-1.06 1.06L8.94 10l-1.72 1.72a.75.75 0 101.06 1.06L10 11.06l1.72 1.72a.75.75 0 101.06-1.06L11.06 10l1.72-1.72a.75.75 0 00-1.06-1.06L10 8.94 8.28 7.22z" clip-rule="evenodd"/>
                    </svg>
                    <span id="loginErrorText">Credenciales incorrectas</span>
                </div>
            </form>

            <!-- Información de seguridad -->
            <div class="mt-8 p-4 bg-health-yellow/10 rounded-xl border border-health-yellow/20">
                <div class="flex items-center text-sm text-health-black">
                    <svg class="w-5 h-5 text-health-green mr-3" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"/>
                    </svg>
                    <span>Sistema seguro - Tus datos de vacaciones están protegidos</span>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('employeeLoginForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const email = this.email.value;
            const phone = this.phone.value;
            const errorDiv = document.getElementById('loginErrorMessage');
            const errorText = document.getElementById('loginErrorText');
            
            // Validación básica
            if (email === '' || phone === '') {
                errorText.textContent = 'Complete todos los campos requeridos';
                errorDiv.classList.remove('hidden');
                return;
            }
            
            // Validación de email corporativo
            if (!email.includes('@')) {
                errorText.textContent = 'Ingrese un correo corporativo válido';
                errorDiv.classList.remove('hidden');
                return;
            }
            
            // Validación de teléfono (mínimo 10 caracteres)
            if (phone.replace(/\D/g, '').length < 10) {
                errorText.textContent = 'Ingrese un número de teléfono válido';
                errorDiv.classList.remove('hidden');
                return;
            }
            
            // Simulación de login exitoso
            const button = this.querySelector('button[type="submit"]');
            const originalText = button.innerHTML;
            
            button.innerHTML = `
                <svg class="w-5 h-5 mr-2 animate-spin" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 1a9 9 0 100 18 9 9 0 000-18zM2 10a8 8 0 1116 0 8 8 0 01-16 0z" clip-rule="evenodd"/>
                </svg>
                Verificando credenciales...
            `;
            button.disabled = true;
            
            // Simular envío de código SMS
            setTimeout(() => {
                button.innerHTML = `
                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                    </svg>
                    Código enviado - Verificando...
                `;
                
                setTimeout(() => {
                    // Redirigir al dashboard
                    window.location.href = 'chatbot.php';
                }, 1500);
            }, 2000);
        });

        // Botones de departamento
        document.querySelectorAll('.department-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                const dept = this.getAttribute('data-dept');
                const emailField = document.querySelector('input[name="email"]');
                const phoneField = document.querySelector('input[name="phone"]');
                
                // Resetear todos los botones
                document.querySelectorAll('.department-btn').forEach(b => {
                    b.classList.remove('bg-health-green', 'text-white');
                    b.classList.add('bg-gray-100', 'text-gray-700');
                });
                
                // Activar botón clickeado
                this.classList.remove('bg-gray-100', 'text-gray-700');
                this.classList.add('bg-health-green', 'text-white');
                
                // Auto-completar según departamento
                switch(dept) {
                    case 'employee':
                        emailField.value = 'empleado.ejemplo@empresa.com';
                        phoneField.value = '+57 300 123 4567';
                        break;
                    case 'supervisor':
                        emailField.value = 'supervisor.departamento@empresa.com';
                        phoneField.value = '+57 301 234 5678';
                        break;
                    case 'hr':
                        emailField.value = 'rrhh.administracion@empresa.com';
                        phoneField.value = '+57 302 345 6789';
                        break;
                }
                
                // Efecto visual
                this.style.transform = 'scale(0.95)';
                setTimeout(() => {
                    this.style.transform = 'scale(1)';
                }, 150);
            });
        });

        // Formateador de teléfono
        document.querySelector('input[name="phone"]').addEventListener('input', function(e) {
            let value = e.target.value.replace(/\D/g, '');
            
            if (value.startsWith('57')) {
                value = '+' + value;
            }
            
            if (value.length > 2) {
                value = value.substring(0, 3) + ' ' + value.substring(3);
            }
            if (value.length > 7) {
                value = value.substring(0, 7) + ' ' + value.substring(7);
            }
            if (value.length > 11) {
                value = value.substring(0, 11) + ' ' + value.substring(11, 15);
            }
            
            e.target.value = value;
        });

        // Efectos de entrada mejorados
        document.querySelectorAll('input').forEach(input => {
            input.addEventListener('focus', function() {
                this.parentElement.classList.add('ring-4', 'ring-health-green/10');
                this.style.backgroundColor = '#FFFFFF';
            });
            
            input.addEventListener('blur', function() {
                this.parentElement.classList.remove('ring-4', 'ring-health-green/10');
                this.style.backgroundColor = '';
            });
        });

        // Efecto de carga inicial
        window.addEventListener('load', function() {
            document.body.style.opacity = '0';
            document.body.style.transition = 'opacity 0.8s ease';
            
            setTimeout(() => {
                document.body.style.opacity = '1';
            }, 100);
        });
    </script>

    <style>
        /* ===== TIPOGRAFÍA PROFESIONAL ===== */
        body {
            font-family: 'Inter', system-ui, -apple-system, sans-serif;
        }
        
        .font-heading {
            font-family: 'Plus Jakarta Sans', system-ui, -apple-system, sans-serif;
        }

        /* ===== DEFINICIÓN DE COLORES ===== */
        .bg-health-yellow { background-color: #f5f103; }
        .text-health-yellow { color: #f5f103; }
        .border-health-yellow { border-color: #f5f103; }
        
        .bg-health-black { background-color: #000000; }
        .text-health-black { color: #000000; }
        .border-health-black { border-color: #000000; }
        
        .bg-health-green { background-color: #009334; }
        .text-health-green { color: #009334; }
        .border-health-green { border-color: #009334; }
        
        .bg-clean-white { background-color: #F8FAFC; }

        /* ===== ANIMACIONES ===== */
        @keyframes pulse-soft {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.8; }
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }
        
        @keyframes wave {
            0% { transform: translateX(0); }
            100% { transform: translateX(-100%); }
        }
        
        .animate-pulse-soft {
            animation: pulse-soft 3s ease-in-out infinite;
        }
        
        .animate-float {
            animation: float 6s ease-in-out infinite;
        }
        
        .animate-wave {
            animation: wave 8s linear infinite;
        }

        /* ===== MEJORAS DE DISEÑO ===== */
        .backdrop-blur-lg {
            backdrop-filter: blur(16px);
        }
        
        /* Suavizado de fuentes */
        body {
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
            text-rendering: optimizeLegibility;
        }
    </style>
</body>
</html>