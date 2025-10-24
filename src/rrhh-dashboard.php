<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ComfaTime - Dashboard RRHH Premium</title>
    <link rel="shortcut icon" href="../public/images/favicon.ico" type="image/x-icon">
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Plus+Jakarta+Sans:wght@500;600;700;800&display=swap" rel="stylesheet">

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'health-yellow': '#f5f103',
                        'health-black': '#000000',
                        'health-green': '#009334',
                        'clean-white': '#F8FAFC',
                        'light-gray': '#F5F7FA',
                        'dark-gray': '#4B5563',
                        'elite-card': '#FFFFFF',
                        'gradient-start': '#009334',
                        'gradient-end': '#007a2b'
                    },
                    animation: {
                        'pulse-soft': 'pulse-soft 3s ease-in-out infinite',
                        'float': 'float 6s ease-in-out infinite',
                        'bounce-soft': 'bounce-soft 2s infinite',
                        'slide-in': 'slide-in 0.5s ease-out',
                        'fade-in': 'fade-in 0.8s ease-out',
                        'shimmer': 'shimmer 2s infinite linear',
                        'modal-enter': 'modal-enter 0.3s ease-out',
                        'modal-exit': 'modal-exit 0.2s ease-in'
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
                        },
                        'fade-in': {
                            '0%': { opacity: '0' },
                            '100%': { opacity: '1' }
                        },
                        'shimmer': {
                            '0%': { transform: 'translateX(-100%)' },
                            '100%': { transform: 'translateX(100%)' }
                        },
                        'modal-enter': {
                            '0%': { opacity: '0', transform: 'scale(0.9)' },
                            '100%': { opacity: '1', transform: 'scale(1)' }
                        },
                        'modal-exit': {
                            '0%': { opacity: '1', transform: 'scale(1)' },
                            '100%': { opacity: '0', transform: 'scale(0.9)' }
                        }
                    }
                }
            }
        }
    </script>

    <style>
        /* Estilos personalizados */
        body {
            font-family: 'Inter', system-ui, -apple-system, sans-serif;
            background: linear-gradient(135deg, #F8FAFC 0%, #F1F5F9 100%);
        }
        
        .font-heading {
            font-family: 'Plus Jakarta Sans', system-ui, -apple-system, sans-serif;
        }

        .premium-card {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.5);
            border-radius: 16px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.06);
            transition: all 0.3s ease;
        }

        .premium-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 40px rgba(0, 0, 0, 0.1);
        }

        .metric-card {
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.95), rgba(248, 250, 252, 0.95));
            border: 1px solid rgba(255, 255, 255, 0.8);
            border-radius: 14px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.04);
        }

        .metric-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.08);
        }

        .gradient-border {
            position: relative;
            border-radius: 16px;
            padding: 1px;
            background: linear-gradient(135deg, #009334, #f5f103);
        }

        .gradient-border::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            border-radius: 16px;
            padding: 2px;
            background: linear-gradient(135deg, #009334, #f5f103);
            mask: linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0);
            -webkit-mask: linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0);
            -webkit-mask-composite: xor;
            mask-composite: exclude;
        }

        .glass-effect {
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        .scrollbar-custom::-webkit-scrollbar {
            width: 6px;
        }

        .scrollbar-custom::-webkit-scrollbar-track {
            background: rgba(0, 0, 0, 0.05);
            border-radius: 3px;
        }

        .scrollbar-custom::-webkit-scrollbar-thumb {
            background: linear-gradient(to bottom, #009334, #f5f103);
            border-radius: 3px;
        }

        .scrollbar-custom::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(to bottom, #007a2b, #e5e103);
        }

        .status-approved {
            background: linear-gradient(135deg, rgba(0, 147, 52, 0.12), rgba(0, 147, 52, 0.08));
            color: #009334;
            border: 1px solid rgba(0, 147, 52, 0.2);
        }

        .status-pending {
            background: linear-gradient(135deg, rgba(245, 241, 3, 0.12), rgba(245, 241, 3, 0.08));
            color: #8B8000;
            border: 1px solid rgba(245, 241, 3, 0.2);
        }

        .pulse-dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: #009334;
            animation: pulse-soft 2s infinite;
        }

        .nav-item {
            position: relative;
            transition: all 0.3s ease;
        }

        .nav-item::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 0;
            height: 2px;
            background: linear-gradient(to right, #009334, #f5f103);
            transition: width 0.3s ease;
        }

        .nav-item:hover::after {
            width: 100%;
        }

        .nav-item.active::after {
            width: 100%;
        }

        .progress-bar {
            height: 6px;
            border-radius: 3px;
            background-color: #E5E7EB;
            overflow: hidden;
        }
        
        .progress-fill {
            height: 100%;
            border-radius: 3px;
            transition: width 0.5s ease;
        }

        .table-header {
            background-color: #F9FAFB;
            border-bottom: 1px solid #E5E7EB;
        }
        
        .table-row:hover {
            background-color: #F9FAFB;
        }
        
        /* Efectos de carga y shimmer */
        .shimmer {
            position: relative;
            overflow: hidden;
        }
        
        .shimmer::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(
                90deg,
                transparent,
                rgba(255, 255, 255, 0.4),
                transparent
            );
            animation: shimmer 2s infinite;
        }
        
        /* Efectos de tarjetas interactivas */
        .interactive-card {
            transition: all 0.3s ease;
            cursor: pointer;
        }
        
        .interactive-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 32px rgba(0, 0, 0, 0.12);
        }
        
        /* Animaciones de botones */
        .btn-primary {
            background: linear-gradient(135deg, #009334, #007a2b);
            transition: all 0.3s ease;
        }
        
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(0, 147, 52, 0.3);
        }
        
        /* Efectos de iconos */
        .icon-hover {
            transition: all 0.3s ease;
        }
        
        .icon-hover:hover {
            transform: scale(1.1);
            color: #009334;
        }
        
        /* Estados de carga */
        .loading {
            opacity: 0.7;
            pointer-events: none;
        }
        
        /* Indicadores visuales */
        .notification-badge {
            position: absolute;
            top: -5px;
            right: -5px;
            background: linear-gradient(135deg, #f5f103, #e5e103);
            color: #000;
            border-radius: 50%;
            width: 18px;
            height: 18px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 10px;
            font-weight: bold;
            animation: pulse-soft 2s infinite;
        }
        
        /* Estilos del modal */
        .modal-overlay {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.5);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 1000;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
        }
        
        .modal-overlay.active {
            opacity: 1;
            visibility: visible;
        }
        
        .modal-container {
            background: white;
            border-radius: 16px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.2);
            width: 90%;
            max-width: 1200px;
            max-height: 90vh;
            overflow: hidden;
            transform: scale(0.9);
            opacity: 0;
            transition: all 0.3s ease;
        }
        
        .modal-overlay.active .modal-container {
            transform: scale(1);
            opacity: 1;
        }
        
        .modal-header {
            padding: 1.5rem 2rem;
            border-bottom: 1px solid #E5E7EB;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .modal-body {
            padding: 2rem;
            overflow-y: auto;
            max-height: calc(90vh - 120px);
        }
        
        .modal-close {
            background: none;
            border: none;
            font-size: 1.5rem;
            cursor: pointer;
            color: #4B5563;
            transition: all 0.3s ease;
        }
        
        .modal-close:hover {
            color: #000;
            transform: rotate(90deg);
        }
        
        /* Estilos específicos para la vista de empleados */
        .employee-card {
            transition: all 0.3s ease;
            border: 1px solid #E5E7EB;
            border-radius: 12px;
            overflow: hidden;
        }
        
        .employee-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            border-color: #009334;
        }
        
        .employee-avatar {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            font-size: 1.5rem;
            color: white;
        }
        
        .employee-status {
            display: inline-block;
            width: 10px;
            height: 10px;
            border-radius: 50%;
            margin-right: 6px;
        }
        
        .employee-status.active {
            background-color: #009334;
        }
        
        .employee-status.inactive {
            background-color: #EF4444;
        }
        
        .employee-status.vacation {
            background-color: #F59E0B;
        }
        
        /* Filtros y búsqueda */
        .search-box {
            position: relative;
        }
        
        .search-box input {
            padding-left: 2.5rem;
        }
        
        .search-box svg {
            position: absolute;
            left: 0.75rem;
            top: 50%;
            transform: translateY(-50%);
            color: #6B7280;
        }
    </style>
</head>
<body class="min-h-screen overflow-x-hidden">
    <!-- Header Premium -->
    <header class="sticky top-0 z-50 glass-effect border-b border-white/20">
        <div class="max-w-7xl mx-auto px-6 py-4">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-4">
                    <div class="gradient-border">
                        <div class="w-12 h-12 bg-white rounded-xl flex items-center justify-center">
                            <div class="w-10 h-10 bg-gradient-to-r from-health-green to-health-yellow rounded-lg flex items-center justify-center text-white font-bold text-sm shimmer">
                                <img src="../public/images/logo-comfachoco.png" alt="Logo de Comfachocó">
                            </div>
                        </div>
                    </div>
                    <div>
                        <h1 class="text-2xl font-heading font-bold text-health-black">ComfaTime RRHH</h1>
                        <p class="text-sm text-dark-gray">Gestión Integral de Talento Humano</p>
                    </div>
                </div>
                
                <div class="flex items-center space-x-6">
                    <!-- Notificaciones -->
                    <div class="relative">
                        <div class="pulse-dot absolute -top-1 -right-1"></div>
                        <div class="notification-badge">3</div>
                        <button class="p-2 glass-effect rounded-xl hover:bg-white/50 transition-all duration-300 icon-hover">
                            <svg class="w-6 h-6 text-dark-gray" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-5 5v-5zM4.93 4.93l9.07 9.07-9.07 9.07L4.93 4.93z"/>
                            </svg>
                        </button>
                    </div>
                    
                    <!-- Perfil de usuario -->
                    <div class="flex items-center space-x-3 interactive-card p-2 rounded-xl">
                        <div class="w-10 h-10 rounded-xl bg-gradient-to-r from-health-green to-health-yellow flex items-center justify-center text-white font-bold">
                            MG
                        </div>
                        <div class="hidden md:block">
                            <div class="font-semibold text-health-black">María González</div>
                            <div class="text-xs text-dark-gray">Directora de RRHH</div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Navegación -->
            <div class="flex space-x-8 mt-6">
                <a href="#" class="nav-item active text-health-black font-medium py-2">Dashboard</a>
                <a href="#" id="open-employees-modal" class="nav-item text-dark-gray hover:text-health-black font-medium py-2">Empleados</a>
                <a href="#" class="nav-item text-dark-gray hover:text-health-black font-medium py-2">Permisos</a>
                <a href="#" class="nav-item text-dark-gray hover:text-health-black font-medium py-2">Reportes</a>
                <a href="#" class="nav-item text-dark-gray hover:text-health-black font-medium py-2">Políticas</a>
                <a href="#" class="nav-item text-dark-gray hover:text-health-black font-medium py-2">Configuración</a>
            </div>
        </div>
    </header>

    <!-- Contenido Principal -->
    <main class="max-w-7xl mx-auto px-6 py-8">
        <!-- Encabezado -->
        <div class="mb-8 animate-fade-in">
            <h2 class="text-4xl font-heading font-bold text-health-black mb-2">Dashboard de RRHH</h2>
            <p class="text-dark-gray">Gestión integral de empleados, permisos y políticas organizacionales</p>
        </div>

        <!-- Métricas Principales -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <div class="metric-card p-6 premium-card interactive-card">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-dark-gray text-sm font-medium">Total Empleados</p>
                        <h3 class="text-3xl font-bold text-health-black mt-2">142</h3>
                    </div>
                    <div class="w-12 h-12 bg-health-green/10 rounded-xl flex items-center justify-center icon-hover">
                        <svg class="w-6 h-6 text-health-green" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                        </svg>
                    </div>
                </div>
                <div class="mt-4 flex items-center">
                    <span class="text-health-green font-medium flex items-center">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"/>
                        </svg>
                        +5%
                    </span>
                    <span class="text-dark-gray text-sm ml-2">vs mes anterior</span>
                </div>
            </div>

            <div class="metric-card p-6 premium-card interactive-card">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-dark-gray text-sm font-medium">Solicitudes Pendientes</p>
                        <h3 class="text-3xl font-bold text-health-black mt-2">23</h3>
                    </div>
                    <div class="w-12 h-12 bg-health-yellow/10 rounded-xl flex items-center justify-center icon-hover">
                        <svg class="w-6 h-6 text-health-yellow" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                </div>
                <div class="mt-4 flex items-center">
                    <span class="text-orange-500 font-medium flex items-center">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"/>
                        </svg>
                        +12%
                    </span>
                    <span class="text-dark-gray text-sm ml-2">vs mes anterior</span>
                </div>
            </div>

            <div class="metric-card p-6 premium-card interactive-card">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-dark-gray text-sm font-medium">Tasa de Aprobación</p>
                        <h3 class="text-3xl font-bold text-health-black mt-2">87%</h3>
                    </div>
                    <div class="w-12 h-12 bg-health-green/10 rounded-xl flex items-center justify-center icon-hover">
                        <svg class="w-6 h-6 text-health-green" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                </div>
                <div class="mt-4 flex items-center">
                    <span class="text-health-green font-medium flex items-center">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"/>
                        </svg>
                        +3%
                    </span>
                    <span class="text-dark-gray text-sm ml-2">vs mes anterior</span>
                </div>
            </div>

            <div class="metric-card p-6 premium-card interactive-card">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-dark-gray text-sm font-medium">Días Promedio Vacaciones</p>
                        <h3 class="text-3xl font-bold text-health-black mt-2">14.5</h3>
                    </div>
                    <div class="w-12 h-12 bg-health-yellow/10 rounded-xl flex items-center justify-center icon-hover">
                        <svg class="w-6 h-6 text-health-yellow" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                    </div>
                </div>
                <div class="mt-4 flex items-center">
                    <span class="text-health-green font-medium flex items-center">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"/>
                        </svg>
                        -2%
                    </span>
                    <span class="text-dark-gray text-sm ml-2">vs mes anterior</span>
                </div>
            </div>
        </div>

        <!-- Sección Principal -->
        <div class="grid grid-cols-1 xl:grid-cols-3 gap-8">
            <!-- Columna Izquierda - Gráficos y Análisis -->
            <div class="xl:col-span-2 space-y-8">
                <!-- Gráficos de Distribución -->
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                    <div class="premium-card p-6 interactive-card">
                        <div class="flex items-center justify-between mb-6">
                            <h3 class="text-xl font-heading font-bold text-health-black">Distribución por Tipo</h3>
                            <button class="text-health-green hover:text-health-green/80 text-sm font-medium flex items-center icon-hover">
                                Ver detalles
                                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                </svg>
                            </button>
                        </div>
                        <div class="relative h-64">
                            <canvas id="employeeTypeChart"></canvas>
                        </div>
                    </div>

                    <div class="premium-card p-6 interactive-card">
                        <div class="flex items-center justify-between mb-6">
                            <h3 class="text-xl font-heading font-bold text-health-black">Solicitudes por Mes</h3>
                            <button class="text-health-green hover:text-health-green/80 text-sm font-medium flex items-center icon-hover">
                                Ver detalles
                                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                </svg>
                            </button>
                        </div>
                        <div class="relative h-64">
                            <canvas id="requestsChart"></canvas>
                        </div>
                    </div>
                </div>

                <!-- Últimos Permisos Solicitados -->
                <div class="premium-card p-6 interactive-card">
                    <div class="flex items-center justify-between mb-6">
                        <h3 class="text-xl font-heading font-bold text-health-black">Últimos Permisos Solicitados</h3>
                        <button class="text-health-green hover:text-health-green/80 text-sm font-medium flex items-center icon-hover">
                            Ver todos
                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </button>
                    </div>
                    
                    <div class="overflow-x-auto scrollbar-custom">
                        <table class="w-full">
                            <thead>
                                <tr class="border-b border-gray-200">
                                    <th class="text-left py-3 px-4 text-sm font-semibold text-dark-gray">Empleado</th>
                                    <th class="text-left py-3 px-4 text-sm font-semibold text-dark-gray">Tipo</th>
                                    <th class="text-left py-3 px-4 text-sm font-semibold text-dark-gray">Fecha</th>
                                    <th class="text-left py-3 px-4 text-sm font-semibold text-dark-gray">Estado</th>
                                    <th class="text-left py-3 px-4 text-sm font-semibold text-dark-gray">Acciones</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100">
                                <tr class="hover:bg-gray-50 transition-colors duration-300">
                                    <td class="py-3 px-4">
                                        <div class="flex items-center">
                                            <div class="w-8 h-8 bg-health-green rounded-full flex items-center justify-center text-white font-medium text-sm mr-3">
                                                CG
                                            </div>
                                            <div>
                                                <div class="font-medium text-health-black">Carlos González</div>
                                                <div class="text-sm text-dark-gray">Desarrollo</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="py-3 px-4 text-dark-gray">Vacaciones</td>
                                    <td class="py-3 px-4 text-dark-gray">15 - 25 Jul 2024</td>
                                    <td class="py-3 px-4">
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium status-approved">
                                            Aprobado
                                        </span>
                                    </td>
                                    <td class="py-3 px-4">
                                        <button class="text-health-green hover:text-health-green/80 font-medium text-sm icon-hover">
                                            Ver detalles
                                        </button>
                                    </td>
                                </tr>
                                <tr class="hover:bg-gray-50 transition-colors duration-300">
                                    <td class="py-3 px-4">
                                        <div class="flex items-center">
                                            <div class="w-8 h-8 bg-health-yellow rounded-full flex items-center justify-center text-white font-medium text-sm mr-3">
                                                MP
                                            </div>
                                            <div>
                                                <div class="font-medium text-health-black">María Pérez</div>
                                                <div class="text-sm text-dark-gray">Marketing</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="py-3 px-4 text-dark-gray">Permiso Médico</td>
                                    <td class="py-3 px-4 text-dark-gray">10 Ago 2024</td>
                                    <td class="py-3 px-4">
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium status-pending">
                                            Pendiente
                                        </span>
                                    </td>
                                    <td class="py-3 px-4">
                                        <button class="text-health-green hover:text-health-green/80 font-medium text-sm icon-hover">
                                            Revisar
                                        </button>
                                    </td>
                                </tr>
                                <tr class="hover:bg-gray-50 transition-colors duration-300">
                                    <td class="py-3 px-4">
                                        <div class="flex items-center">
                                            <div class="w-8 h-8 bg-health-green rounded-full flex items-center justify-center text-white font-medium text-sm mr-3">
                                                AL
                                            </div>
                                            <div>
                                                <div class="font-medium text-health-black">Ana López</div>
                                                <div class="text-sm text-dark-gray">Ventas</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="py-3 px-4 text-dark-gray">Vacaciones</td>
                                    <td class="py-3 px-4 text-dark-gray">5 - 12 Sep 2024</td>
                                    <td class="py-3 px-4">
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium status-approved">
                                            Aprobado
                                        </span>
                                    </td>
                                    <td class="py-3 px-4">
                                        <button class="text-health-green hover:text-health-green/80 font-medium text-sm icon-hover">
                                            Ver detalles
                                        </button>
                                    </td>
                                </tr>
                                <tr class="hover:bg-gray-50 transition-colors duration-300">
                                    <td class="py-3 px-4">
                                        <div class="flex items-center">
                                            <div class="w-8 h-8 bg-health-yellow rounded-full flex items-center justify-center text-white font-medium text-sm mr-3">
                                                RM
                                            </div>
                                            <div>
                                                <div class="font-medium text-health-black">Roberto Martínez</div>
                                                <div class="text-sm text-dark-gray">Operaciones</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="py-3 px-4 text-dark-gray">Permiso Personal</td>
                                    <td class="py-3 px-4 text-dark-gray">22 Ago 2024</td>
                                    <td class="py-3 px-4">
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium status-pending">
                                            Pendiente
                                        </span>
                                    </td>
                                    <td class="py-3 px-4">
                                        <button class="text-health-green hover:text-health-green/80 font-medium text-sm icon-hover">
                                            Revisar
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Acciones Rápidas -->
                <div class="premium-card p-6 interactive-card">
                    <h3 class="text-xl font-heading font-bold text-health-black mb-6">Acciones Rápidas</h3>
                    
                    <div class="grid grid-cols-2 gap-4">
                        <button class="flex flex-col items-center justify-center p-4 bg-health-green/10 hover:bg-health-green/20 text-health-green rounded-xl transition-all duration-300 transform hover:scale-105 border border-health-green/20 icon-hover">
                            <div class="w-12 h-12 bg-health-green rounded-xl flex items-center justify-center mb-2">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                                </svg>
                            </div>
                            <span class="font-semibold text-sm text-center">Nuevo Empleado</span>
                        </button>
                        
                        <button class="flex flex-col items-center justify-center p-4 bg-health-yellow/10 hover:bg-health-yellow/20 text-health-yellow rounded-xl transition-all duration-300 transform hover:scale-105 border border-health-yellow/20 icon-hover">
                            <div class="w-12 h-12 bg-health-yellow rounded-xl flex items-center justify-center mb-2">
                                <svg class="w-6 h-6 text-health-black" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                                </svg>
                            </div>
                            <span class="font-semibold text-sm text-black text-center">Gestionar Permisos</span>
                        </button>
                        
                        <button class="flex flex-col items-center justify-center p-4 bg-health-green/10 hover:bg-health-green/20 text-health-green rounded-xl transition-all duration-300 transform hover:scale-105 border border-health-green/20 icon-hover">
                            <div class="w-12 h-12 bg-health-green rounded-xl flex items-center justify-center mb-2">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                                </svg>
                            </div>
                            <span class="font-semibold text-sm text-center">Reportes</span>
                        </button>
                        
                        <button class="flex flex-col items-center justify-center p-4 bg-health-yellow/10 hover:bg-health-yellow/20 text-health-yellow rounded-xl transition-all duration-300 transform hover:scale-105 border border-health-yellow/20 icon-hover">
                            <div class="w-12 h-12 bg-health-yellow rounded-xl flex items-center justify-center mb-2">
                                <svg class="w-6 h-6 text-health-black" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                            </div>
                            <span class="font-semibold text-sm text-black text-center">Configuración</span>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Columna Derecha - Información Detallada -->
            <div class="space-y-8">
                <!-- Días de Permiso por Empleado -->
                <div class="premium-card p-6 interactive-card">
                    <h3 class="text-xl font-heading font-bold text-health-black mb-6">Días de Permiso por Empleado</h3>
                    
                    <div class="space-y-4">
                        <div class="flex items-center justify-between p-4 bg-health-green/5 rounded-xl border border-health-green/20 hover:bg-health-green/10 transition-all duration-300">
                            <div>
                                <div class="font-semibold text-health-black">Carlos González</div>
                                <div class="text-sm text-dark-gray">Desarrollo - Tiempo Completo</div>
                            </div>
                            <div class="text-right">
                                <div class="font-bold text-health-green text-lg">15</div>
                                <div class="text-xs text-dark-gray">días disponibles</div>
                            </div>
                        </div>
                        
                        <div class="flex items-center justify-between p-4 bg-health-yellow/5 rounded-xl border border-health-yellow/20 hover:bg-health-yellow/10 transition-all duration-300">
                            <div>
                                <div class="font-semibold text-health-black">María Pérez</div>
                                <div class="text-sm text-dark-gray">Marketing - Tiempo Completo</div>
                            </div>
                            <div class="text-right">
                                <div class="font-bold text-health-green text-lg">12</div>
                                <div class="text-xs text-dark-gray">días disponibles</div>
                            </div>
                        </div>
                        
                        <div class="flex items-center justify-between p-4 bg-health-green/5 rounded-xl border border-health-green/20 hover:bg-health-green/10 transition-all duration-300">
                            <div>
                                <div class="font-semibold text-health-black">Ana López</div>
                                <div class="text-sm text-dark-gray">Ventas - Medio Tiempo</div>
                            </div>
                            <div class="text-right">
                                <div class="font-bold text-health-green text-lg">8</div>
                                <div class="text-xs text-dark-gray">días disponibles</div>
                            </div>
                        </div>
                        
                        <div class="flex items-center justify-between p-4 bg-health-yellow/5 rounded-xl border border-health-yellow/20 hover:bg-health-yellow/10 transition-all duration-300">
                            <div>
                                <div class="font-semibold text-health-black">Roberto Martínez</div>
                                <div class="text-sm text-dark-gray">Operaciones - Tiempo Completo</div>
                            </div>
                            <div class="text-right">
                                <div class="font-bold text-health-green text-lg">10</div>
                                <div class="text-xs text-dark-gray">días disponibles</div>
                            </div>
                        </div>
                    </div>
                    
                    <button class="w-full mt-6 flex items-center justify-center space-x-2 p-3 btn-primary text-white rounded-xl transition-all duration-300">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                        </svg>
                        <span class="font-semibold">Ver todos los empleados</span>
                    </button>
                </div>

                <!-- Políticas de Empleado -->
                <div class="premium-card p-6 interactive-card">
                    <h3 class="text-xl font-heading font-bold text-health-black mb-6">Políticas de Empleado</h3>
                    
                    <div class="space-y-4">
                        <div class="p-4 bg-health-green/5 rounded-xl border border-health-green/20 hover:bg-health-green/10 transition-all duration-300">
                            <div class="flex items-start">
                                <div class="w-10 h-10 bg-health-green rounded-xl flex items-center justify-center flex-shrink-0 mr-4 icon-hover">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-health-black">Vacaciones Anuales</h4>
                                    <p class="text-sm text-dark-gray mt-1">15 días hábiles por año, acumulables hasta 30 días.</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="p-4 bg-health-yellow/5 rounded-xl border border-health-yellow/20 hover:bg-health-yellow/10 transition-all duration-300">
                            <div class="flex items-start">
                                <div class="w-10 h-10 bg-health-yellow rounded-xl flex items-center justify-center flex-shrink-0 mr-4 icon-hover">
                                    <svg class="w-5 h-5 text-health-black" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-health-black">Permisos Médicos</h4>
                                    <p class="text-sm text-dark-gray mt-1">Hasta 5 días por año con certificado médico.</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="p-4 bg-health-green/5 rounded-xl border border-health-green/20 hover:bg-health-green/10 transition-all duration-300">
                            <div class="flex items-start">
                                <div class="w-10 h-10 bg-health-green rounded-xl flex items-center justify-center flex-shrink-0 mr-4 icon-hover">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-health-black">Permisos Personales</h4>
                                    <p class="text-sm text-dark-gray mt-1">3 días por año para asuntos personales urgentes.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <button class="w-full mt-6 flex items-center justify-center space-x-2 p-3 bg-white border-2 border-health-green text-health-green hover:bg-health-green hover:text-white rounded-xl transition-all duration-300 icon-hover">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                        <span class="font-semibold">Ver políticas completas</span>
                    </button>
                </div>
            </div>
        </div>
    </main>

    <!-- Modal de Empleados -->
    <div id="employees-modal" class="modal-overlay">
        <div class="modal-container">
            <div class="modal-header">
                <div>
                    <h2 class="text-2xl font-heading font-bold text-health-black">Gestión de Empleados</h2>
                    <p class="text-dark-gray mt-1">Administra la información de los empleados de la organización</p>
                </div>
                <button id="close-employees-modal" class="modal-close">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
            
            <div class="modal-body">
                <!-- Barra de búsqueda y filtros -->
                <div class="flex flex-col md:flex-row gap-4 mb-6">
                    <div class="search-box flex-1">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                        <input type="text" placeholder="Buscar empleados..." class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-health-green focus:border-transparent">
                    </div>
                    
                    <div class="flex gap-2">
                        <select class="px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-health-green focus:border-transparent">
                            <option value="">Todos los departamentos</option>
                            <option value="desarrollo">Desarrollo</option>
                            <option value="marketing">Marketing</option>
                            <option value="ventas">Ventas</option>
                            <option value="operaciones">Operaciones</option>
                        </select>
                        
                        <select class="px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-health-green focus:border-transparent">
                            <option value="">Todos los estados</option>
                            <option value="activo">Activo</option>
                            <option value="inactivo">Inactivo</option>
                            <option value="vacaciones">Vacaciones</option>
                        </select>
                    </div>
                </div>
                
                <!-- Estadísticas rápidas -->
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-6">
                    <div class="bg-health-green/10 p-4 rounded-lg border border-health-green/20">
                        <p class="text-sm text-dark-gray">Total Empleados</p>
                        <h3 class="text-2xl font-bold text-health-black">142</h3>
                    </div>
                    <div class="bg-health-yellow/10 p-4 rounded-lg border border-health-yellow/20">
                        <p class="text-sm text-dark-gray">Activos</p>
                        <h3 class="text-2xl font-bold text-health-black">128</h3>
                    </div>
                    <div class="bg-health-green/10 p-4 rounded-lg border border-health-green/20">
                        <p class="text-sm text-dark-gray">En Vacaciones</p>
                        <h3 class="text-2xl font-bold text-health-black">8</h3>
                    </div>
                    <div class="bg-health-yellow/10 p-4 rounded-lg border border-health-yellow/20">
                        <p class="text-sm text-dark-gray">Nuevos este mes</p>
                        <h3 class="text-2xl font-bold text-health-black">5</h3>
                    </div>
                </div>
                
                <!-- Lista de empleados -->
                <div class="overflow-x-auto scrollbar-custom">
                    <table class="w-full">
                        <thead>
                            <tr class="border-b border-gray-200">
                                <th class="text-left py-3 px-4 text-sm font-semibold text-dark-gray">Empleado</th>
                                <th class="text-left py-3 px-4 text-sm font-semibold text-dark-gray">Departamento</th>
                                <th class="text-left py-3 px-4 text-sm font-semibold text-dark-gray">Cargo</th>
                                <th class="text-left py-3 px-4 text-sm font-semibold text-dark-gray">Estado</th>
                                <th class="text-left py-3 px-4 text-sm font-semibold text-dark-gray">Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            <tr class="hover:bg-gray-50 transition-colors duration-300">
                                <td class="py-3 px-4">
                                    <div class="flex items-center">
                                        <div class="employee-avatar bg-gradient-to-r from-health-green to-health-yellow mr-3">
                                            CG
                                        </div>
                                        <div>
                                            <div class="font-medium text-health-black">Carlos González</div>
                                            <div class="text-sm text-dark-gray">carlos.gonzalez@empresa.com</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="py-3 px-4 text-dark-gray">Desarrollo</td>
                                <td class="py-3 px-4 text-dark-gray">Desarrollador Senior</td>
                                <td class="py-3 px-4">
                                    <span class="inline-flex items-center">
                                        <span class="employee-status active"></span>
                                        <span class="text-xs font-medium">Activo</span>
                                    </span>
                                </td>
                                <td class="py-3 px-4">
                                    <div class="flex space-x-2">
                                        <button class="text-health-green hover:text-health-green/80 font-medium text-sm icon-hover">
                                            Editar
                                        </button>
                                        <button class="text-blue-500 hover:text-blue-700 font-medium text-sm icon-hover">
                                            Ver
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr class="hover:bg-gray-50 transition-colors duration-300">
                                <td class="py-3 px-4">
                                    <div class="flex items-center">
                                        <div class="employee-avatar bg-gradient-to-r from-health-yellow to-orange-400 mr-3">
                                            MP
                                        </div>
                                        <div>
                                            <div class="font-medium text-health-black">María Pérez</div>
                                            <div class="text-sm text-dark-gray">maria.perez@empresa.com</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="py-3 px-4 text-dark-gray">Marketing</td>
                                <td class="py-3 px-4 text-dark-gray">Especialista en Marketing</td>
                                <td class="py-3 px-4">
                                    <span class="inline-flex items-center">
                                        <span class="employee-status vacation"></span>
                                        <span class="text-xs font-medium">Vacaciones</span>
                                    </span>
                                </td>
                                <td class="py-3 px-4">
                                    <div class="flex space-x-2">
                                        <button class="text-health-green hover:text-health-green/80 font-medium text-sm icon-hover">
                                            Editar
                                        </button>
                                        <button class="text-blue-500 hover:text-blue-700 font-medium text-sm icon-hover">
                                            Ver
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr class="hover:bg-gray-50 transition-colors duration-300">
                                <td class="py-3 px-4">
                                    <div class="flex items-center">
                                        <div class="employee-avatar bg-gradient-to-r from-health-green to-health-yellow mr-3">
                                            AL
                                        </div>
                                        <div>
                                            <div class="font-medium text-health-black">Ana López</div>
                                            <div class="text-sm text-dark-gray">ana.lopez@empresa.com</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="py-3 px-4 text-dark-gray">Ventas</td>
                                <td class="py-3 px-4 text-dark-gray">Ejecutiva de Ventas</td>
                                <td class="py-3 px-4">
                                    <span class="inline-flex items-center">
                                        <span class="employee-status active"></span>
                                        <span class="text-xs font-medium">Activo</span>
                                    </span>
                                </td>
                                <td class="py-3 px-4">
                                    <div class="flex space-x-2">
                                        <button class="text-health-green hover:text-health-green/80 font-medium text-sm icon-hover">
                                            Editar
                                        </button>
                                        <button class="text-blue-500 hover:text-blue-700 font-medium text-sm icon-hover">
                                            Ver
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr class="hover:bg-gray-50 transition-colors duration-300">
                                <td class="py-3 px-4">
                                    <div class="flex items-center">
                                        <div class="employee-avatar bg-gradient-to-r from-health-yellow to-orange-400 mr-3">
                                            RM
                                        </div>
                                        <div>
                                            <div class="font-medium text-health-black">Roberto Martínez</div>
                                            <div class="text-sm text-dark-gray">roberto.martinez@empresa.com</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="py-3 px-4 text-dark-gray">Operaciones</td>
                                <td class="py-3 px-4 text-dark-gray">Coordinador de Operaciones</td>
                                <td class="py-3 px-4">
                                    <span class="inline-flex items-center">
                                        <span class="employee-status active"></span>
                                        <span class="text-xs font-medium">Activo</span>
                                    </span>
                                </td>
                                <td class="py-3 px-4">
                                    <div class="flex space-x-2">
                                        <button class="text-health-green hover:text-health-green/80 font-medium text-sm icon-hover">
                                            Editar
                                        </button>
                                        <button class="text-blue-500 hover:text-blue-700 font-medium text-sm icon-hover">
                                            Ver
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                
                <!-- Botones de acción -->
                <div class="flex justify-between items-center mt-6 pt-6 border-t border-gray-200">
                    <div class="text-sm text-dark-gray">
                        Mostrando 4 de 142 empleados
                    </div>
                    <div class="flex space-x-3">
                        <button class="px-4 py-2 bg-white border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors duration-300">
                            Anterior
                        </button>
                        <button class="px-4 py-2 bg-white border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors duration-300">
                            Siguiente
                        </button>
                        <button class="px-4 py-2 btn-primary text-white rounded-lg transition-all duration-300">
                            <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                            </svg>
                            Nuevo Empleado
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Inicialización de gráficos
        document.addEventListener('DOMContentLoaded', function() {
            // Gráfico de tipos de empleado
            const employeeTypeCtx = document.getElementById('employeeTypeChart').getContext('2d');
            const employeeTypeChart = new Chart(employeeTypeCtx, {
                type: 'doughnut',
                data: {
                    labels: ['Tiempo Completo', 'Medio Tiempo', 'Contratistas'],
                    datasets: [{
                        data: [98, 32, 12],
                        backgroundColor: [
                            '#009334',
                            '#f5f103',
                            '#4B5563'
                        ],
                        borderColor: [
                            '#009334',
                            '#f5f103',
                            '#4B5563'
                        ],
                        borderWidth: 2,
                        hoverOffset: 10
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: 'bottom',
                            labels: {
                                color: '#1A202C',
                                font: {
                                    family: 'Inter'
                                }
                            }
                        }
                    },
                    cutout: '70%'
                }
            });

            // Gráfico de solicitudes por mes
            const requestsCtx = document.getElementById('requestsChart').getContext('2d');
            const requestsChart = new Chart(requestsCtx, {
                type: 'bar',
                data: {
                    labels: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul'],
                    datasets: [{
                        label: 'Solicitudes',
                        data: [45, 52, 38, 65, 72, 58, 63],
                        backgroundColor: 'rgba(0, 147, 52, 0.7)',
                        borderColor: '#009334',
                        borderWidth: 2,
                        borderRadius: 6,
                        hoverBackgroundColor: 'rgba(0, 147, 52, 0.9)'
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            grid: {
                                color: 'rgba(0, 0, 0, 0.05)'
                            },
                            ticks: {
                                color: '#475569'
                            }
                        },
                        x: {
                            grid: {
                                display: false
                            },
                            ticks: {
                                color: '#475569'
                            }
                        }
                    }
                }
            });

            // Animaciones de entrada
            const cards = document.querySelectorAll('.premium-card');
            cards.forEach((card, index) => {
                card.style.animationDelay = `${index * 0.1}s`;
                card.classList.add('animate-fade-in');
            });

            // Simulación de notificaciones en tiempo real
            setInterval(() => {
                const notificationDot = document.querySelector('.pulse-dot');
                if (notificationDot && Math.random() > 0.7) {
                    notificationDot.style.animation = 'none';
                    setTimeout(() => {
                        notificationDot.style.animation = 'pulse-soft 2s infinite';
                    }, 10);
                }
            }, 5000);

            // Interactividad adicional para botones
            const buttons = document.querySelectorAll('button');
            buttons.forEach(button => {
                button.addEventListener('click', function() {
                    // Efecto de clic sutil
                    this.style.transform = 'scale(0.98)';
                    setTimeout(() => {
                        this.style.transform = '';
                    }, 150);
                    
                    // Simulación de carga
                    if (this.textContent.includes('Ver') || this.textContent.includes('Revisar')) {
                        const originalText = this.textContent;
                        this.classList.add('loading');
                        this.textContent = 'Cargando...';
                        
                        setTimeout(() => {
                            this.classList.remove('loading');
                            this.textContent = originalText;
                        }, 1000);
                    }
                });
            });

            // Efectos de hover en elementos interactivos
            const interactiveCards = document.querySelectorAll('.interactive-card');
            interactiveCards.forEach(card => {
                card.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateY(-5px)';
                    this.style.boxShadow = '0 12px 32px rgba(0, 0, 0, 0.12)';
                });
                
                card.addEventListener('mouseleave', function() {
                    this.style.transform = '';
                    this.style.boxShadow = '';
                });
            });

            // Simulación de datos en tiempo real
            setInterval(() => {
                // Actualizar métricas aleatoriamente
                const metrics = document.querySelectorAll('.metric-card h3');
                metrics.forEach(metric => {
                    const currentValue = parseInt(metric.textContent);
                    if (Math.random() > 0.7) {
                        const change = Math.random() > 0.5 ? 1 : -1;
                        const newValue = currentValue + change;
                        metric.textContent = newValue;
                        
                        // Efecto visual de actualización
                        metric.style.color = '#009334';
                        setTimeout(() => {
                            metric.style.color = '#000000';
                        }, 500);
                    }
                });
            }, 5000);

            // Funcionalidad del modal de empleados
            const employeesModal = document.getElementById('employees-modal');
            const openEmployeesModal = document.getElementById('open-employees-modal');
            const closeEmployeesModal = document.getElementById('close-employees-modal');

            // Abrir modal
            openEmployeesModal.addEventListener('click', function(e) {
                e.preventDefault();
                employeesModal.classList.add('active');
                document.body.style.overflow = 'hidden';
            });

            // Cerrar modal
            closeEmployeesModal.addEventListener('click', function() {
                employeesModal.classList.remove('active');
                document.body.style.overflow = 'auto';
            });

            // Cerrar modal al hacer clic fuera del contenido
            employeesModal.addEventListener('click', function(e) {
                if (e.target === employeesModal) {
                    employeesModal.classList.remove('active');
                    document.body.style.overflow = 'auto';
                }
            });

            // Cerrar modal con tecla Escape
            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape' && employeesModal.classList.contains('active')) {
                    employeesModal.classList.remove('active');
                    document.body.style.overflow = 'auto';
                }
            });
        });
    </script>
</body>
</html>