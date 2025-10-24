<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ComfaTime - Portal de Gestión</title>
    
    <!-- Tailwind CSS via CDN para desarrollo -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="shortcut icon" href="../public/images/favicon.ico" type="image/x-icon">
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Plus+Jakarta+Sans:wght@500;600;700;800&display=swap" rel="stylesheet">

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'health-yellow': '#f5f103',
                        'health-black': '#000000',
                        'health-green': '#009334',
                        'clean-white': '#F8FAFC',
                        'gradient-start': '#009334',
                        'gradient-end': '#007a2b'
                    },
                    animation: {
                        'pulse-soft': 'pulse-soft 3s ease-in-out infinite',
                        'float': 'float 6s ease-in-out infinite',
                        'bounce-soft': 'bounce-soft 2s infinite',
                        'slide-in': 'slide-in 0.5s ease-out'
                    },
                    keyframes: {
                        'pulse-soft': {
                            '0%, 100%': { opacity: '1' },
                            '50%': { opacity: '0.8' }
                        },
                        'float': {
                            '0%, 100%': { transform: 'translateY(0px)' },
                            '50%': { transform: 'translateY(-10px)' }
                        },
                        'bounce-soft': {
                            '0%, 100%': { transform: 'translateY(0)' },
                            '50%': { transform: 'translateY(-5px)' }
                        },
                        'slide-in': {
                            '0%': { transform: 'translateX(100%)', opacity: '0' },
                            '100%': { transform: 'translateX(0)', opacity: '1' }
                        }
                    }
                }
            }
        }
    </script>

    <style>
        /* Definición de colores personalizados */
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

        /* Tipografía */
        body {
            font-family: 'Inter', system-ui, -apple-system, sans-serif;
        }
        
        .font-heading {
            font-family: 'Plus Jakarta Sans', system-ui, -apple-system, sans-serif;
        }

        /* Efectos de glassmorphism */
        .glass-effect {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        /* Scrollbar personalizado */
        .custom-scrollbar::-webkit-scrollbar {
            width: 6px;
        }

        .custom-scrollbar::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 3px;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: #009334;
            border-radius: 3px;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb:hover {
            background: #007a2b;
        }

        /* Animación de entrada para elementos */
        .animate-slide-in {
            animation: slide-in 0.6s ease-out;
        }

        /* Efecto de brillo para cards */
        .card-glow {
            transition: all 0.3s ease;
        }

        .card-glow:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(0, 147, 52, 0.15);
        }

        /* Gradiente animado */
        .gradient-bg {
            background: linear-gradient(-45deg, #009334, #007a2b, #005a20, #003d14);
            background-size: 400% 400%;
            animation: gradient 15s ease infinite;
        }

        @keyframes gradient {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }
        
        /* Estilos para números de opción */
        .option-number {
            width: 28px;
            height: 28px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            font-weight: bold;
            font-size: 14px;
            margin-right: 10px;
            flex-shrink: 0;
        }
        
        /* Estilos para formularios en el chat */
        .form-group {
            margin-bottom: 15px;
        }
        
        .form-label {
            display: block;
            margin-bottom: 5px;
            font-weight: 500;
            color: #374151;
        }
        
        .form-input {
            width: 100%;
            padding: 10px 12px;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            font-size: 14px;
            transition: border-color 0.3s;
        }
        
        .form-input:focus {
            outline: none;
            border-color: #009334;
            box-shadow: 0 0 0 3px rgba(0, 147, 52, 0.1);
        }
        
        .date-inputs {
            display: flex;
            gap: 10px;
        }
        
        .date-inputs .form-input {
            flex: 1;
        }
        
        /* Estilos para botones de acción */
        .action-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 10px 16px;
            background-color: #009334;
            color: white;
            border: none;
            border-radius: 8px;
            font-weight: 500;
            font-size: 14px;
            cursor: pointer;
            transition: all 0.3s;
        }
        
        .action-btn:hover {
            background-color: #007a2b;
            transform: translateY(-2px);
        }
        
        .action-btn.secondary {
            background-color: #f3f4f6;
            color: #374151;
        }
        
        .action-btn.secondary:hover {
            background-color: #e5e7eb;
        }
        
        /* Estilos para resumen de solicitud */
        .request-summary {
            background-color: #f0fdf4;
            border: 1px solid #bbf7d0;
            border-radius: 8px;
            padding: 15px;
            margin-top: 15px;
        }
        
        .summary-item {
            display: flex;
            justify-content: space-between;
            margin-bottom: 8px;
        }
        
        .summary-label {
            font-weight: 500;
            color: #374151;
        }
        
        .summary-value {
            color: #065f46;
            font-weight: 600;
        }
    </style>
</head>
<body class="bg-clean-white min-h-screen font-sans overflow-x-hidden">
    <!-- Header -->
    <header class="gradient-bg text-white py-6 px-8">
        <div class="max-w-7xl mx-auto flex items-center justify-between">
            <div class="flex items-center space-x-4">
                <div class="w-12 h-12 bg-white rounded-2xl flex items-center justify-center shadow-2xl">
                <img src="../public/images/logo-comfachoco.png" alt="Logo de comfachoco">
                </div>
                <div>
                    <h1 class="text-2xl font-heading font-bold">ComfaTime</h1>
                    <p class="text-white/80 text-sm">Gestión Inteligente de Vacaciones</p>
                </div>
            </div>
            <div class="flex items-center space-x-6">
                <button class="flex items-center space-x-2 bg-white/20 hover:bg-white/30 px-4 py-2 rounded-xl transition-all duration-300">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                    </svg>
                    <span>Mi Cuenta</span>
                </button>
                <button class="bg-health-yellow text-health-black hover:bg-white px-6 py-2 rounded-xl font-semibold transition-all duration-300 transform hover:scale-105">
                    Cerrar Sesión
                </button>
            </div>
        </div>
    </header>

    <!-- Contenido Principal -->
    <main class="max-w-7xl mx-auto py-8 px-4 lg:px-8">
        <div class="grid lg:grid-cols-2 gap-8">
            
            <!-- Columna Izquierda - Dashboard Simplificado -->
            <div class="space-y-8">
                <!-- Bienvenida Personalizada Simplificada -->
                <div class="glass-effect rounded-3xl p-8 shadow-2xl card-glow">
                    <div class="flex items-center justify-between mb-6">
                        <div>
                            <h2 class="text-3xl font-heading font-bold text-health-black mb-2">
                                ¡Bienvenido, <span class="text-health-green">Carlos!</span>
                            </h2>
                            <p class="text-gray-600">Aquí tienes un resumen de tus vacaciones</p>
                        </div>
                        <div class="text-right">
                            <div class="text-2xl font-bold text-health-green">15</div>
                            <div class="text-sm text-gray-500">Días disponibles</div>
                        </div>
                    </div>
                    
                    <!-- Estadísticas Rápidas Simplificadas -->
                    <div class="grid grid-cols-3 gap-4 mb-6">
                        <div class="text-center p-4 bg-health-green/5 rounded-2xl border border-health-green/20">
                            <div class="font-bold text-health-black text-xl">5</div>
                            <div class="text-xs text-gray-600">Solicitudes</div>
                        </div>
                        <div class="text-center p-4 bg-health-yellow/5 rounded-2xl border border-health-yellow/20">
                            <div class="font-bold text-health-black text-xl">3</div>
                            <div class="text-xs text-gray-600">Aprobadas</div>
                        </div>
                        <div class="text-center p-4 bg-red-50 rounded-2xl border border-red-200">
                            <div class="font-bold text-health-black text-xl">1</div>
                            <div class="text-xs text-gray-600">Pendientes</div>
                        </div>
                    </div>

                    <!-- Acciones Rápidas Simplificadas -->
                    <div class="space-y-4">
                        <h3 class="font-heading font-bold text-lg text-health-black">Acciones Rápidas</h3>
                        <div class="grid grid-cols-2 gap-4">
                            <button class="flex items-center justify-center space-x-2 p-4 bg-health-green hover:bg-health-green/90 text-white rounded-2xl transition-all duration-300 transform hover:scale-105">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                                </svg>
                                <span class="font-semibold">Nueva Solicitud</span>
                            </button>
                            <button class="flex items-center justify-center space-x-2 p-4 bg-white border-2 border-health-green text-health-green hover:bg-health-green hover:text-white rounded-2xl transition-all duration-300 transform hover:scale-105">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                                </svg>
                                <span class="font-semibold">Mis Solicitudes</span>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Próximas Vacaciones Simplificadas -->
                <div class="glass-effect rounded-3xl p-8 shadow-2xl card-glow">
                    <h3 class="font-heading font-bold text-xl text-health-black mb-6">Próximas Vacaciones</h3>
                    <div class="space-y-4">
                        <div class="flex items-center justify-between p-4 bg-health-green/5 rounded-2xl border border-health-green/20">
                            <div>
                                <div class="font-semibold text-health-black">Vacaciones de Verano</div>
                                <div class="text-sm text-gray-600">15 - 25 Julio 2024</div>
                            </div>
                            <div class="bg-health-green text-white px-3 py-1 rounded-full text-sm font-semibold">
                                Aprobado
                            </div>
                        </div>

                        <div class="flex items-center justify-between p-4 bg-health-yellow/5 rounded-2xl border border-health-yellow/20">
                            <div>
                                <div class="font-semibold text-health-black">Permiso Médico</div>
                                <div class="text-sm text-gray-600">10 Agosto 2024</div>
                            </div>
                            <div class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-sm font-semibold">
                                Pendiente
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Columna Derecha - ChatBot Integrado -->
            <div class="space-y-8">
                <!-- ChatBot Container -->
                <div class="glass-effect rounded-3xl shadow-2xl overflow-hidden h-[800px] flex flex-col">
                    
                    <!-- Header del ChatBot -->
                    <div class="gradient-bg text-white p-6">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center space-x-4">
                                <div class="w-12 h-12 bg-white rounded-2xl flex items-center justify-center shadow-lg">
                                    <img src="../public/images/logo-comfachoco.png" alt="Logo de comfachocó">
                                </div>
                                <div>
                                    <h3 class="font-heading font-bold text-xl">Asistente Virtual</h3>
                                    <div class="flex items-center space-x-2">
                                        <div class="w-2 h-2 bg-health-yellow rounded-full animate-pulse"></div>
                                        <span class="text-white/80 text-sm">Disponible 24/7</span>
                                    </div>
                                </div>
                            </div>
                            <div class="flex items-center space-x-2">
                                <button id="reset-chat" class="p-2 hover:bg-white/10 rounded-xl transition-colors" title="Reiniciar conversación">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Área de Mensajes -->
                    <div id="chat-messages" class="flex-1 p-6 overflow-y-auto bg-gray-50 space-y-4 custom-scrollbar">
                        <!-- Mensaje de bienvenida -->
                        <div class="flex items-start space-x-3 animate-slide-in">
                            <div class="w-10 h-10 bg-health-green rounded-full flex items-center justify-center flex-shrink-0 shadow-lg">
                                <img src="../public/images/logo-comfachoco.png" alt="">
                            </div>
                            <div class="bg-white rounded-2xl rounded-tl-none px-4 py-3 shadow-sm max-w-[80%]">
                                <p class="text-sm text-gray-800">¡Hola Carlos! 👋 Soy tu asistente de ComfaTime. Estoy aquí para ayudarte con la gestión de tus vacaciones y permisos.</p>
                                <p class="text-sm text-gray-800 mt-2">Por favor, selecciona una opción para continuar:</p>
                                <div class="mt-3 space-y-2">
                                    <div class="flex items-center">
                                        <span class="option-number bg-health-green text-white">1</span>
                                        <span class="text-sm text-gray-700">Solicitar vacaciones</span>
                                    </div>
                                    <div class="flex items-center">
                                        <span class="option-number bg-health-green text-white">2</span>
                                        <span class="text-sm text-gray-700">Consultar días disponibles</span>
                                    </div>
                                    <div class="flex items-center">
                                        <span class="option-number bg-health-green text-white">3</span>
                                        <span class="text-sm text-gray-700">Estado de solicitudes</span>
                                    </div>
                                    <div class="flex items-center">
                                        <span class="option-number bg-health-green text-white">4</span>
                                        <span class="text-sm text-gray-700">Políticas de vacaciones</span>
                                    </div>
                                    <div class="flex items-center">
                                        <span class="option-number bg-health-green text-white">5</span>
                                        <span class="text-sm text-gray-700">Contactar con RRHH</span>
                                    </div>
                                </div>
                                <span class="text-xs text-gray-500 mt-1 block">11:30 AM</span>
                            </div>
                        </div>
                    </div>

                    <!-- Indicador de escritura -->
                    <div id="typing-indicator" class="hidden px-6 py-4">
                        <div class="flex items-center space-x-3">
                            <div class="w-10 h-10 bg-health-green rounded-full flex items-center justify-center flex-shrink-0 shadow-lg">
                                <img src="../public/images/logo-comfachoco.png" alt="Logo de comfachocó">
                            </div>
                            <div class="bg-white rounded-2xl rounded-tl-none px-4 py-3 shadow-sm">
                                <div class="flex space-x-1">
                                    <div class="w-2 h-2 bg-gray-400 rounded-full animate-bounce"></div>
                                    <div class="w-2 h-2 bg-gray-400 rounded-full animate-bounce" style="animation-delay: 0.1s"></div>
                                    <div class="w-2 h-2 bg-gray-400 rounded-full animate-bounce" style="animation-delay: 0.2s"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Área de entrada con opciones numeradas -->
                    <div id="chat-options" class="p-6 border-t border-gray-200 bg-white">
                        <div class="grid grid-cols-3 gap-3 mb-4">
                            <button class="option-btn flex items-center justify-center p-3 bg-health-green/10 text-health-green hover:bg-health-green hover:text-white rounded-xl transition-all duration-300" data-option="1">
                                <span class="font-semibold">1. Solicitar</span>
                            </button>
                            <button class="option-btn flex items-center justify-center p-3 bg-health-green/10 text-health-green hover:bg-health-green hover:text-white rounded-xl transition-all duration-300" data-option="2">
                                <span class="font-semibold">2. Consultar</span>
                            </button>
                            <button class="option-btn flex items-center justify-center p-3 bg-health-green/10 text-health-green hover:bg-health-green hover:text-white rounded-xl transition-all duration-300" data-option="3">
                                <span class="font-semibold">3. Estado</span>
                            </button>
                        </div>
                        <div class="grid grid-cols-2 gap-3">
                            <button class="option-btn flex items-center justify-center p-3 bg-health-green/10 text-health-green hover:bg-health-green hover:text-white rounded-xl transition-all duration-300" data-option="4">
                                <span class="font-semibold">4. Políticas</span>
                            </button>
                            <button class="option-btn flex items-center justify-center p-3 bg-health-green/10 text-health-green hover:bg-health-green hover:text-white rounded-xl transition-all duration-300" data-option="5">
                                <span class="font-semibold">5. Contacto</span>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Información de Contacto -->
                <div class="glass-effect rounded-3xl p-6 shadow-2xl card-glow">
                    <h3 class="font-heading font-bold text-xl text-health-black mb-4">¿Necesitas ayuda adicional?</h3>
                    <div class="space-y-3">
                        <div class="flex items-center space-x-3 p-3 bg-health-green/5 rounded-2xl">
                            <div class="w-10 h-10 bg-health-green rounded-xl flex items-center justify-center">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                </svg>
                            </div>
                            <div>
                                <div class="font-semibold text-health-black">Línea Directa RRHH</div>
                                <div class="text-sm text-gray-600">+57 1 234 5678</div>
                            </div>
                        </div>
                        <div class="flex items-center space-x-3 p-3 bg-health-yellow/5 rounded-2xl">
                            <div class="w-10 h-10 bg-health-yellow rounded-xl flex items-center justify-center">
                                <svg class="w-5 h-5 text-health-black" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                </svg>
                            </div>
                            <div>
                                <div class="font-semibold text-health-black">Correo Electrónico</div>
                                <div class="text-sm text-gray-600">rrhh@comfatime.com</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script>
        // Base de conocimiento del chatbot con flujos completos
        const chatbotFlows = {
            // Flujo 1: Solicitar vacaciones
            '1': {
                steps: [
                    {
                        message: 'Perfecto, vamos a solicitar tus vacaciones. ¿Qué tipo de ausencia necesitas solicitar?',
                        options: [
                            { number: '1', text: 'Vacaciones ordinarias' },
                            { number: '2', text: 'Permiso médico' },
                            { number: '3', text: 'Permiso personal' },
                            { number: '4', text: 'Licencia especial' },
                            { number: '5', text: 'Volver al menú principal' }
                        ]
                    },
                    {
                        message: 'Excelente elección. Ahora necesito que me proporciones las fechas de tu solicitud.',
                        form: {
                            type: 'date_range',
                            fields: [
                                {
                                    id: 'start_date',
                                    label: 'Fecha de inicio',
                                    type: 'date',
                                    required: true
                                },
                                {
                                    id: 'end_date',
                                    label: 'Fecha de fin',
                                    type: 'date',
                                    required: true
                                }
                            ]
                        },
                        options: [
                            { number: '1', text: 'Continuar' },
                            { number: '2', text: 'Cancelar solicitud' }
                        ]
                    },
                    {
                        message: 'Por favor, describe brevemente el motivo de tu solicitud (opcional):',
                        form: {
                            type: 'text_input',
                            fields: [
                                {
                                    id: 'reason',
                                    label: 'Motivo',
                                    type: 'textarea',
                                    required: false,
                                    placeholder: 'Ej: Descanso vacacional, asuntos personales...'
                                }
                            ]
                        },
                        options: [
                            { number: '1', text: 'Enviar solicitud' },
                            { number: '2', text: 'Modificar fechas' },
                            { number: '3', text: 'Cancelar' }
                        ]
                    },
                    {
                        message: '¡Perfecto! He recibido tu solicitud de vacaciones. Aquí tienes un resumen:',
                        summary: true,
                        options: [
                            { number: '1', text: 'Confirmar y enviar' },
                            { number: '2', text: 'Hacer cambios' },
                            { number: '3', text: 'Cancelar solicitud' }
                        ]
                    },
                    {
                        message: '✅ Tu solicitud ha sido enviada exitosamente. Número de referencia: #VAC-2024-0876. Recibirás una confirmación por correo electrónico y podrás seguir el estado en "Mis Solicitudes". ¿Necesitas ayuda con algo más?',
                        options: [
                            { number: '1', text: 'Sí, realizar otra acción' },
                            { number: '2', text: 'No, gracias' }
                        ]
                    }
                ]
            },
            
            // Flujo 2: Consultar días disponibles
            '2': {
                steps: [
                    {
                        message: 'Te muestro tu balance actual de días disponibles:',
                        options: [
                            { number: '1', text: 'Ver detalle por tipo' },
                            { number: '2', text: 'Historial de uso' },
                            { number: '3', text: 'Proyección anual' },
                            { number: '4', text: 'Volver al menú principal' }
                        ]
                    },
                    {
                        message: 'Detalle por tipo de ausencia:\n\n🏖️ Vacaciones ordinarias: 15 días\n🏥 Enfermedad: 10 días\n📋 Permisos personales: 5 días\n🎯 Días acumulados: 3 días\n\n¿Qué más te gustaría consultar?',
                        options: [
                            { number: '1', text: 'Ver políticas de uso' },
                            { number: '2', text: 'Calcular días necesarios' },
                            { number: '3', text: 'Volver al menú principal' }
                        ]
                    }
                ]
            },
            
            // Flujo 3: Estado de solicitudes
            '3': {
                steps: [
                    {
                        message: 'Aquí tienes el estado de tus solicitudes recientes:',
                        options: [
                            { number: '1', text: 'Solicitudes pendientes' },
                            { number: '2', text: 'Solicitudes aprobadas' },
                            { number: '3', text: 'Solicitudes rechazadas' },
                            { number: '4', text: 'Todas las solicitudes' },
                            { number: '5', text: 'Volver al menú principal' }
                        ]
                    },
                    {
                        message: 'Solicitudes Pendientes (1):\n\n• #VAC-2024-0875: Permiso médico - 10 Ago 2024 (En revisión)\n\nSolicitudes Aprobadas (3):\n\n• #VAC-2024-0870: Vacaciones verano - 15-25 Jul 2024 ✅\n• #VAC-2024-0865: Permiso personal - 5 Jun 2024 ✅\n• #VAC-2024-0858: Vacaciones - 20-22 Mar 2024 ✅\n\n¿Qué acción te gustaría realizar?',
                        options: [
                            { number: '1', text: 'Ver detalles de una solicitud' },
                            { number: '2', text: 'Solicitar seguimiento' },
                            { number: '3', text: 'Volver al menú principal' }
                        ]
                    }
                ]
            },
            
            // Flujo 4: Políticas de vacaciones
            '4': {
                steps: [
                    {
                        message: 'Te explico las políticas de vacaciones en ComfaTime:',
                        options: [
                            { number: '1', text: 'Días y acumulación' },
                            { number: '2', text: 'Proceso de aprobación' },
                            { number: '3', text: 'Restricciones y condiciones' },
                            { number: '4', text: 'Preguntas frecuentes' },
                            { number: '5', text: 'Volver al menú principal' }
                        ]
                    },
                    {
                        message: 'Políticas de Días y Acumulación:\n\n• 15 días de vacaciones anuales\n• Acumulación mensual proporcional (1.25 días/mes)\n• Máximo 30 días de acumulación\n• Los días no usados se pagan al final del año\n• Período de vacaciones: Enero - Diciembre\n\n¿Te interesa conocer otro aspecto de las políticas?',
                        options: [
                            { number: '1', text: 'Proceso de aprobación' },
                            { number: '2', text: 'Restricciones y condiciones' },
                            { number: '3', text: 'Volver al menú principal' }
                        ]
                    }
                ]
            },
            
            // Flujo 5: Contactar con RRHH
            '5': {
                steps: [
                    {
                        message: 'Puedes contactar a nuestro equipo de RR.HH. de las siguientes formas:',
                        options: [
                            { number: '1', text: 'Información de contacto' },
                            { number: '2', text: 'Solicitar cita' },
                            { number: '3', text: 'Enviar consulta específica' },
                            { number: '4', text: 'Horarios de atención' },
                            { number: '5', text: 'Volver al menú principal' }
                        ]
                    },
                    {
                        message: 'Información de Contacto RR.HH.:\n\n📞 Línea directa: +57 1 234 5678\n📧 Email: rrhh@comfatime.com\n📍 Oficina: Piso 3, Edificio Principal\n🕒 Horario: Lunes a Viernes 8:00 - 17:00\n\nPara consultas urgentes fuera de horario, deja un mensaje y te contactaremos al siguiente día hábil.',
                        options: [
                            { number: '1', text: 'Solicitar cita' },
                            { number: '2', text: 'Enviar consulta' },
                            { number: '3', text: 'Volver al menú principal' }
                        ]
                    }
                ]
            }
        };

        // Elementos del DOM
        const chatMessages = document.getElementById('chat-messages');
        const chatOptions = document.getElementById('chat-options');
        const typingIndicator = document.getElementById('typing-indicator');
        const resetChatBtn = document.getElementById('reset-chat');

        // Estado de la conversación
        let conversationState = {
            currentFlow: null,
            currentStep: 0,
            formData: {}
        };

        // Funciones de utilidad
        function addMessage(text, isUser = false, options = null, form = null, summary = false) {
            const messageDiv = document.createElement('div');
            messageDiv.className = `flex items-start space-x-3 ${isUser ? 'flex-row-reverse space-x-reverse' : ''} animate-slide-in`;
            
            const avatar = document.createElement('div');
            avatar.className = `w-10 h-10 rounded-full flex items-center justify-center flex-shrink-0 shadow-lg ${
                isUser ? 'bg-health-yellow' : 'bg-health-green'
            }`;
            
            if (isUser) {
                avatar.innerHTML = '<svg class="w-5 h-5 text-health-black" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>';
            } else {
                avatar.innerHTML = '<img src="../public/images/logo-comfachoco.png" alt="Logo de comfachocó">';
            }
            
            const messageContent = document.createElement('div');
            messageContent.className = `rounded-2xl px-4 py-3 shadow-sm max-w-[80%] ${
                isUser 
                    ? 'bg-health-green text-white rounded-br-none' 
                    : 'bg-white text-gray-800 rounded-tl-none'
            }`;
            
            const messageText = document.createElement('div');
            messageText.className = 'text-sm whitespace-pre-line';
            messageText.innerHTML = text.replace(/\n/g, '<br>');
            
            // Agregar formulario si existe
            if (form) {
                const formElement = createForm(form);
                messageText.appendChild(formElement);
            }
            
            // Agregar resumen si es necesario
            if (summary) {
                const summaryElement = createRequestSummary();
                messageText.appendChild(summaryElement);
            }
            
            // Agregar opciones si existen
            if (options && options.length > 0) {
                const optionsElement = createOptions(options);
                messageText.appendChild(optionsElement);
            }
            
            const messageTime = document.createElement('span');
            messageTime.className = `text-xs block mt-1 ${
                isUser ? 'text-white/70' : 'text-gray-500'
            }`;
            messageTime.textContent = new Date().toLocaleTimeString('es-CO', { 
                hour: '2-digit', 
                minute: '2-digit' 
            });
            
            messageContent.appendChild(messageText);
            messageContent.appendChild(messageTime);
            messageDiv.appendChild(avatar);
            messageDiv.appendChild(messageContent);
            
            chatMessages.appendChild(messageDiv);
            scrollToBottom();
        }

        function createForm(formConfig) {
            const formDiv = document.createElement('div');
            formDiv.className = 'mt-4';
            
            if (formConfig.type === 'date_range') {
                const dateInputs = document.createElement('div');
                dateInputs.className = 'date-inputs';
                
                formConfig.fields.forEach(field => {
                    const formGroup = document.createElement('div');
                    formGroup.className = 'form-group';
                    
                    const label = document.createElement('label');
                    label.className = 'form-label';
                    label.textContent = field.label;
                    label.htmlFor = field.id;
                    
                    const input = document.createElement('input');
                    input.type = field.type;
                    input.id = field.id;
                    input.className = 'form-input';
                    input.required = field.required;
                    
                    if (field.id === 'start_date') {
                        // Establecer fecha mínima como hoy
                        const today = new Date().toISOString().split('T')[0];
                        input.min = today;
                    }
                    
                    formGroup.appendChild(label);
                    formGroup.appendChild(input);
                    dateInputs.appendChild(formGroup);
                });
                
                formDiv.appendChild(dateInputs);
            } else if (formConfig.type === 'text_input') {
                formConfig.fields.forEach(field => {
                    const formGroup = document.createElement('div');
                    formGroup.className = 'form-group';
                    
                    const label = document.createElement('label');
                    label.className = 'form-label';
                    label.textContent = field.label;
                    label.htmlFor = field.id;
                    
                    let input;
                    if (field.type === 'textarea') {
                        input = document.createElement('textarea');
                        input.rows = 3;
                        input.placeholder = field.placeholder || '';
                    } else {
                        input = document.createElement('input');
                        input.type = field.type;
                    }
                    
                    input.id = field.id;
                    input.className = 'form-input';
                    input.required = field.required;
                    
                    formGroup.appendChild(label);
                    formGroup.appendChild(input);
                    formDiv.appendChild(formGroup);
                });
            }
            
            return formDiv;
        }

        function createRequestSummary() {
            const summaryDiv = document.createElement('div');
            summaryDiv.className = 'request-summary';
            
            // Datos de ejemplo para el resumen
            const summaryData = [
                { label: 'Tipo de solicitud', value: 'Vacaciones ordinarias' },
                { label: 'Fecha de inicio', value: '15 de Julio, 2024' },
                { label: 'Fecha de fin', value: '25 de Julio, 2024' },
                { label: 'Días solicitados', value: '10 días' },
                { label: 'Días restantes', value: '5 días' },
                { label: 'Motivo', value: 'Descanso vacacional' }
            ];
            
            summaryData.forEach(item => {
                const itemDiv = document.createElement('div');
                itemDiv.className = 'summary-item';
                
                const labelSpan = document.createElement('span');
                labelSpan.className = 'summary-label';
                labelSpan.textContent = item.label;
                
                const valueSpan = document.createElement('span');
                valueSpan.className = 'summary-value';
                valueSpan.textContent = item.value;
                
                itemDiv.appendChild(labelSpan);
                itemDiv.appendChild(valueSpan);
                summaryDiv.appendChild(itemDiv);
            });
            
            return summaryDiv;
        }

        function createOptions(options) {
            const optionsDiv = document.createElement('div');
            optionsDiv.className = 'mt-4 space-y-2';
            
            options.forEach(option => {
                const optionDiv = document.createElement('div');
                optionDiv.className = 'flex items-center';
                
                const numberSpan = document.createElement('span');
                numberSpan.className = 'option-number bg-health-green text-white';
                numberSpan.textContent = option.number;
                
                const textSpan = document.createElement('span');
                textSpan.className = 'text-sm text-gray-700 ml-2';
                textSpan.textContent = option.text;
                
                optionDiv.appendChild(numberSpan);
                optionDiv.appendChild(textSpan);
                optionsDiv.appendChild(optionDiv);
            });
            
            return optionsDiv;
        }

        function updateOptions(options) {
            // Limpiar opciones actuales
            chatOptions.innerHTML = '';
            
            if (!options || options.length === 0) return;
            
            // Agrupar opciones en filas
            const firstRow = options.slice(0, 3);
            const secondRow = options.slice(3, 5);
            
            // Crear primera fila
            if (firstRow.length > 0) {
                const firstRowDiv = document.createElement('div');
                firstRowDiv.className = 'grid grid-cols-3 gap-3 mb-4';
                
                firstRow.forEach(option => {
                    const button = document.createElement('button');
                    button.className = 'option-btn flex items-center justify-center p-3 bg-health-green/10 text-health-green hover:bg-health-green hover:text-white rounded-xl transition-all duration-300';
                    button.dataset.option = option.number;
                    button.innerHTML = `<span class="font-semibold">${option.number}. ${option.text.split(' ')[0]}</span>`;
                    
                    button.addEventListener('click', () => {
                        handleOptionSelect(option.number);
                    });
                    
                    firstRowDiv.appendChild(button);
                });
                
                chatOptions.appendChild(firstRowDiv);
            }
            
            // Crear segunda fila
            if (secondRow.length > 0) {
                const secondRowDiv = document.createElement('div');
                secondRowDiv.className = 'grid grid-cols-2 gap-3';
                
                secondRow.forEach(option => {
                    const button = document.createElement('button');
                    button.className = 'option-btn flex items-center justify-center p-3 bg-health-green/10 text-health-green hover:bg-health-green hover:text-white rounded-xl transition-all duration-300';
                    button.dataset.option = option.number;
                    button.innerHTML = `<span class="font-semibold">${option.number}. ${option.text.split(' ')[0]}</span>`;
                    
                    button.addEventListener('click', () => {
                        handleOptionSelect(option.number);
                    });
                    
                    secondRowDiv.appendChild(button);
                });
                
                chatOptions.appendChild(secondRowDiv);
            }
        }

        function showTypingIndicator() {
            typingIndicator.classList.remove('hidden');
            scrollToBottom();
        }

        function hideTypingIndicator() {
            typingIndicator.classList.add('hidden');
        }

        function scrollToBottom() {
            chatMessages.scrollTop = chatMessages.scrollHeight;
        }

        function simulateTyping(response, callback, options = null, form = null, summary = false) {
            showTypingIndicator();
            
            setTimeout(() => {
                hideTypingIndicator();
                callback(response, options, form, summary);
            }, 1500 + Math.random() * 1000);
        }

        function handleOptionSelect(option) {
            // Si estamos en el menú principal
            if (conversationState.currentFlow === null) {
                if (option === '5') {
                    // Opción 5 siempre vuelve al menú principal
                    resetConversation();
                    return;
                }
                
                // Iniciar un nuevo flujo
                conversationState.currentFlow = option;
                conversationState.currentStep = 0;
                conversationState.formData = {};
                
                addMessage(getOptionText(option), true);
                
                const flow = chatbotFlows[option];
                if (flow && flow.steps.length > 0) {
                    const step = flow.steps[0];
                    simulateTyping(
                        step.message, 
                        (response, options, form, summary) => {
                            addMessage(response, false, options, form, summary);
                            updateOptions(step.options);
                        },
                        step.options,
                        step.form,
                        step.summary
                    );
                }
            } else {
                // Estamos en un flujo activo
                const flow = chatbotFlows[conversationState.currentFlow];
                
                // Manejar opción "Volver al menú principal"
                if (option === '5') {
                    resetConversation();
                    return;
                }
                
                // Manejar opción "Cancelar" en medio de un flujo
                if (option === '3' && conversationState.currentStep > 0) {
                    addMessage('He cancelado tu solicitud. ¿En qué más puedo ayudarte?', true);
                    resetConversation();
                    return;
                }
                
                addMessage(getOptionText(option, flow.steps[conversationState.currentStep].options), true);
                
                // Avanzar al siguiente paso
                conversationState.currentStep++;
                
                // Si hay más pasos en el flujo
                if (conversationState.currentStep < flow.steps.length) {
                    const step = flow.steps[conversationState.currentStep];
                    
                    simulateTyping(
                        step.message, 
                        (response, options, form, summary) => {
                            addMessage(response, false, options, form, summary);
                            updateOptions(step.options);
                        },
                        step.options,
                        step.form,
                        step.summary
                    );
                } else {
                    // Flujo completado
                    simulateTyping(
                        '¡Gracias por usar el asistente de ComfaTime! ¿Necesitas ayuda con algo más?',
                        (response) => {
                            addMessage(response, false);
                            resetConversation();
                        }
                    );
                }
            }
        }

        function getOptionText(optionNumber, options = null) {
            if (options) {
                const option = options.find(opt => opt.number === optionNumber);
                return option ? option.text : `Opción ${optionNumber}`;
            }
            
            // Textos para el menú principal
            const mainOptions = {
                '1': 'Solicitar vacaciones',
                '2': 'Consultar días disponibles',
                '3': 'Estado de solicitudes',
                '4': 'Políticas de vacaciones',
                '5': 'Contactar con RRHH'
            };
            
            return mainOptions[optionNumber] || `Opción ${optionNumber}`;
        }

        function resetConversation() {
            conversationState = {
                currentFlow: null,
                currentStep: 0,
                formData: {}
            };
            
            // Restaurar opciones del menú principal
            updateOptions([
                { number: '1', text: 'Solicitar' },
                { number: '2', text: 'Consultar' },
                { number: '3', text: 'Estado' },
                { number: '4', text: 'Políticas' },
                { number: '5', text: 'Contacto' }
            ]);
        }

        // Event Listeners
        document.querySelectorAll('.option-btn').forEach(button => {
            button.addEventListener('click', () => {
                const option = button.dataset.option;
                handleOptionSelect(option);
            });
        });

        resetChatBtn.addEventListener('click', () => {
            // Solo agregar mensaje de confirmación si hay una conversación activa
            if (conversationState.currentFlow !== null) {
                addMessage('Reiniciar conversación', true);
                simulateTyping(
                    'Conversación reiniciada. ¿En qué puedo ayudarte?',
                    (response) => {
                        addMessage(response, false);
                        resetConversation();
                    }
                );
            }
        });

        // Inicialización
        scrollToBottom();
        
        // Efecto de carga inicial para mensajes
        setTimeout(() => {
            document.querySelectorAll('.animate-slide-in').forEach((el, index) => {
                el.style.animationDelay = `${index * 0.1}s`;
            });
        }, 100);
    </script>
</body>
</html>