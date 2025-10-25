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

        .status-rejected {
            background: linear-gradient(135deg, rgba(239, 68, 68, 0.12), rgba(239, 68, 68, 0.08));
            color: #DC2626;
            border: 1px solid rgba(239, 68, 68, 0.2);
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
        
        /* Estilos para permisos */
        .permission-badge {
            display: inline-flex;
            align-items: center;
            padding: 0.25rem 0.75rem;
            border-radius: 9999px;
            font-size: 0.75rem;
            font-weight: 600;
        }
        
        .permission-badge.vacation {
            background-color: rgba(59, 130, 246, 0.1);
            color: #1D4ED8;
            border: 1px solid rgba(59, 130, 246, 0.2);
        }
        
        .permission-badge.medical {
            background-color: rgba(16, 185, 129, 0.1);
            color: #047857;
            border: 1px solid rgba(16, 185, 129, 0.2);
        }
        
        .permission-badge.personal {
            background-color: rgba(245, 158, 11, 0.1);
            color: #B45309;
            border: 1px solid rgba(245, 158, 11, 0.2);
        }
        
        .permission-badge.emergency {
            background-color: rgba(239, 68, 68, 0.1);
            color: #B91C1C;
            border: 1px solid rgba(239, 68, 68, 0.2);
        }
        
        /* Indicadores de prioridad */
        .priority-indicator {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            display: inline-block;
            margin-right: 6px;
        }
        
        .priority-high {
            background-color: #EF4444;
        }
        
        .priority-medium {
            background-color: #F59E0B;
        }
        
        .priority-low {
            background-color: #10B981;
        }
        
        /* Estilos para reportes */
        .report-card {
            transition: all 0.3s ease;
            border: 1px solid #E5E7EB;
            border-radius: 12px;
            overflow: hidden;
        }
        
        .report-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            border-color: #009334;
        }
        
        .report-badge {
            display: inline-flex;
            align-items: center;
            padding: 0.25rem 0.75rem;
            border-radius: 9999px;
            font-size: 0.75rem;
            font-weight: 600;
        }
        
        .report-badge.analytics {
            background-color: rgba(59, 130, 246, 0.1);
            color: #1D4ED8;
            border: 1px solid rgba(59, 130, 246, 0.2);
        }
        
        .report-badge.operational {
            background-color: rgba(16, 185, 129, 0.1);
            color: #047857;
            border: 1px solid rgba(16, 185, 129, 0.2);
        }
        
        .report-badge.financial {
            background-color: rgba(245, 158, 11, 0.1);
            color: #B45309;
            border: 1px solid rgba(245, 158, 11, 0.2);
        }
        
        .report-badge.compliance {
            background-color: rgba(139, 92, 246, 0.1);
            color: #7C3AED;
            border: 1px solid rgba(139, 92, 246, 0.2);
        }
        
        .chart-container {
            position: relative;
            height: 300px;
            width: 100%;
        }

        /* Estilos para el modal de políticas */
        .policy-category {
            margin-bottom: 2rem;
        }
        
        .policy-item {
            background: #F8FAFC;
            border-radius: 12px;
            padding: 1.5rem;
            margin-bottom: 1rem;
            border-left: 4px solid #009334;
            transition: all 0.3s ease;
        }
        
        .policy-item:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
        }
        
        .policy-icon {
            width: 48px;
            height: 48px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 1rem;
            flex-shrink: 0;
        }
        
        .policy-requirements {
            background: #F1F5F9;
            border-radius: 8px;
            padding: 1rem;
            margin-top: 0.75rem;
        }
        
        .policy-requirements ul {
            list-style-type: disc;
            margin-left: 1.5rem;
        }
        
        .policy-tag {
            display: inline-flex;
            align-items: center;
            padding: 0.25rem 0.75rem;
            border-radius: 9999px;
            font-size: 0.75rem;
            font-weight: 600;
            margin-right: 0.5rem;
            margin-bottom: 0.5rem;
        }
        
        .policy-tag.vacation {
            background-color: rgba(59, 130, 246, 0.1);
            color: #1D4ED8;
            border: 1px solid rgba(59, 130, 246, 0.2);
        }
        
        .policy-tag.maternity {
            background-color: rgba(236, 72, 153, 0.1);
            color: #BE185D;
            border: 1px solid rgba(236, 72, 153, 0.2);
        }
        
        .policy-tag.medical {
            background-color: rgba(16, 185, 129, 0.1);
            color: #047857;
            border: 1px solid rgba(16, 185, 129, 0.2);
        }
        
        .policy-tag.special {
            background-color: rgba(245, 158, 11, 0.1);
            color: #B45309;
            border: 1px solid rgba(245, 158, 11, 0.2);
        }
        
        .policy-tag.emergency {
            background-color: rgba(239, 68, 68, 0.1);
            color: #B91C1C;
            border: 1px solid rgba(239, 68, 68, 0.2);
        }

        /* Estilos para el calendario */
        .calendar-container {
            width: 100%;
            overflow-x: auto;
        }
        
        .calendar {
            width: 100%;
            border-collapse: collapse;
        }
        
        .calendar th {
            padding: 12px;
            text-align: center;
            font-weight: 600;
            color: #4B5563;
            border-bottom: 1px solid #E5E7EB;
        }
        
        .calendar td {
            padding: 10px;
            text-align: center;
            vertical-align: top;
            border: 1px solid #E5E7EB;
            height: 100px;
            width: 14.28%;
            cursor: pointer;
            transition: all 0.2s ease;
        }
        
        .calendar td:hover {
            background-color: #F9FAFB;
        }
        
        .calendar-day {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 30px;
            height: 30px;
            border-radius: 50%;
            margin: 0 auto 5px;
        }
        
        .calendar-day.current-day {
            background-color: #009334;
            color: white;
        }
        
        .calendar-event {
            font-size: 0.75rem;
            padding: 2px 4px;
            border-radius: 4px;
            margin-bottom: 2px;
            text-align: left;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }
        
        .calendar-event.vacation {
            background-color: rgba(59, 130, 246, 0.1);
            color: #1D4ED8;
            border-left: 3px solid #3B82F6;
        }
        
        .calendar-event.medical {
            background-color: rgba(16, 185, 129, 0.1);
            color: #047857;
            border-left: 3px solid #10B981;
        }
        
        .calendar-event.personal {
            background-color: rgba(245, 158, 11, 0.1);
            color: #B45309;
            border-left: 3px solid #F59E0B;
        }
        
        .calendar-event.emergency {
            background-color: rgba(239, 68, 68, 0.1);
            color: #B91C1C;
            border-left: 3px solid #EF4444;
        }
        
        .calendar-navigation {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1rem;
        }
        
        .calendar-month {
            font-size: 1.5rem;
            font-weight: 700;
            color: #1F2937;
        }
        
        .calendar-actions {
            display: flex;
            gap: 0.5rem;
        }
        
        .day-details {
            margin-top: 1.5rem;
            padding: 1.5rem;
            background-color: #F9FAFB;
            border-radius: 8px;
            border-left: 4px solid #009334;
        }
        
        .day-details h3 {
            margin-bottom: 1rem;
            font-weight: 600;
            color: #1F2937;
        }
        
        .permission-item {
            padding: 0.75rem;
            margin-bottom: 0.5rem;
            background-color: white;
            border-radius: 6px;
            border-left: 3px solid #009334;
        }
        
        .permission-item-header {
            display: flex;
            justify-content: space-between;
            margin-bottom: 0.25rem;
        }
        
        .permission-employee {
            font-weight: 600;
            color: #1F2937;
        }
        
        .permission-type {
            font-size: 0.75rem;
            padding: 0.25rem 0.5rem;
            border-radius: 9999px;
        }
        
        .permission-dates {
            font-size: 0.875rem;
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
                                <img src="../public/images/logo-comfachoco.png" alt="Logo de comfachoco">
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
                <a href="#" id="open-permissions-modal" class="nav-item text-dark-gray hover:text-health-black font-medium py-2">Permisos</a>
                <a href="#" id="open-reports-modal" class="nav-item text-dark-gray hover:text-health-black font-medium py-2">Reportes</a>
                <a href="#" id="open-policies-modal" class="nav-item text-dark-gray hover:text-health-black font-medium py-2">Políticas</a>
                <a href="#" id="open-settings-modal" class="nav-item text-dark-gray hover:text-health-black font-medium py-2">Configuración</a>
                <a href="#" id="open-calendar-modal" class="nav-item text-dark-gray hover:text-health-black font-medium py-2">Calendario</a>
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
                        
                        <button id="open-settings-modal-action" class="flex flex-col items-center justify-center p-4 bg-health-yellow/10 hover:bg-health-yellow/20 text-health-yellow rounded-xl transition-all duration-300 transform hover:scale-105 border border-health-yellow/20 icon-hover">
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
                    
                    <button id="open-policies-modal-action" class="w-full mt-6 flex items-center justify-center space-x-2 p-3 bg-white border-2 border-health-green text-health-green hover:bg-health-green hover:text-white rounded-xl transition-all duration-300 icon-hover">
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

    <!-- Modal de Permisos -->
    <div id="permissions-modal" class="modal-overlay">
        <div class="modal-container">
            <div class="modal-header">
                <div>
                    <h2 class="text-2xl font-heading font-bold text-health-black">Gestión de Permisos</h2>
                    <p class="text-dark-gray mt-1">Administra y revisa las solicitudes de permisos de los empleados</p>
                </div>
                <button id="close-permissions-modal" class="modal-close">
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
                        <input type="text" placeholder="Buscar permisos..." class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-health-green focus:border-transparent">
                    </div>
                    
                    <div class="flex gap-2">
                        <select class="px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-health-green focus:border-transparent">
                            <option value="">Todos los tipos</option>
                            <option value="vacaciones">Vacaciones</option>
                            <option value="medico">Permiso Médico</option>
                            <option value="personal">Permiso Personal</option>
                            <option value="emergencia">Emergencia</option>
                        </select>
                        
                        <select class="px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-health-green focus:border-transparent">
                            <option value="">Todos los estados</option>
                            <option value="pendiente">Pendiente</option>
                            <option value="aprobado">Aprobado</option>
                            <option value="rechazado">Rechazado</option>
                        </select>
                        
                        <input type="date" class="px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-health-green focus:border-transparent">
                    </div>
                </div>
                
                <!-- Estadísticas rápidas -->
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-6">
                    <div class="bg-health-green/10 p-4 rounded-lg border border-health-green/20">
                        <p class="text-sm text-dark-gray">Total Solicitudes</p>
                        <h3 class="text-2xl font-bold text-health-black">67</h3>
                    </div>
                    <div class="bg-health-yellow/10 p-4 rounded-lg border border-health-yellow/20">
                        <p class="text-sm text-dark-gray">Pendientes</p>
                        <h3 class="text-2xl font-bold text-health-black">23</h3>
                    </div>
                    <div class="bg-health-green/10 p-4 rounded-lg border border-health-green/20">
                        <p class="text-sm text-dark-gray">Aprobados</p>
                        <h3 class="text-2xl font-bold text-health-black">38</h3>
                    </div>
                    <div class="bg-red-100 p-4 rounded-lg border border-red-200">
                        <p class="text-sm text-dark-gray">Rechazados</p>
                        <h3 class="text-2xl font-bold text-health-black">6</h3>
                    </div>
                </div>
                
                <!-- Lista de permisos -->
                <div class="overflow-x-auto scrollbar-custom">
                    <table class="w-full">
                        <thead>
                            <tr class="border-b border-gray-200">
                                <th class="text-left py-3 px-4 text-sm font-semibold text-dark-gray">Empleado</th>
                                <th class="text-left py-3 px-4 text-sm font-semibold text-dark-gray">Tipo</th>
                                <th class="text-left py-3 px-4 text-sm font-semibold text-dark-gray">Fecha Solicitud</th>
                                <th class="text-left py-3 px-4 text-sm font-semibold text-dark-gray">Período</th>
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
                                <td class="py-3 px-4">
                                    <span class="permission-badge vacation">Vacaciones</span>
                                </td>
                                <td class="py-3 px-4 text-dark-gray">10 Jul 2024</td>
                                <td class="py-3 px-4 text-dark-gray">15 - 25 Jul 2024</td>
                                <td class="py-3 px-4">
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium status-approved">
                                        Aprobado
                                    </span>
                                </td>
                                <td class="py-3 px-4">
                                    <div class="flex space-x-2">
                                        <button class="text-health-green hover:text-health-green/80 font-medium text-sm icon-hover">
                                            Ver
                                        </button>
                                        <button class="text-blue-500 hover:text-blue-700 font-medium text-sm icon-hover">
                                            Editar
                                        </button>
                                    </div>
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
                                <td class="py-3 px-4">
                                    <span class="permission-badge medical">Médico</span>
                                </td>
                                <td class="py-3 px-4 text-dark-gray">05 Ago 2024</td>
                                <td class="py-3 px-4 text-dark-gray">10 Ago 2024</td>
                                <td class="py-3 px-4">
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium status-pending">
                                        <span class="priority-indicator priority-high"></span>
                                        Pendiente
                                    </span>
                                </td>
                                <td class="py-3 px-4">
                                    <div class="flex space-x-2">
                                        <button class="text-health-green hover:text-health-green/80 font-medium text-sm icon-hover">
                                            Aprobar
                                        </button>
                                        <button class="text-red-500 hover:text-red-700 font-medium text-sm icon-hover">
                                            Rechazar
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
                                        <div class="w-8 h-8 bg-health-green rounded-full flex items-center justify-center text-white font-medium text-sm mr-3">
                                            AL
                                        </div>
                                        <div>
                                            <div class="font-medium text-health-black">Ana López</div>
                                            <div class="text-sm text-dark-gray">Ventas</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="py-3 px-4">
                                    <span class="permission-badge personal">Personal</span>
                                </td>
                                <td class="py-3 px-4 text-dark-gray">20 Jul 2024</td>
                                <td class="py-3 px-4 text-dark-gray">05 - 12 Sep 2024</td>
                                <td class="py-3 px-4">
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium status-approved">
                                        Aprobado
                                    </span>
                                </td>
                                <td class="py-3 px-4">
                                    <div class="flex space-x-2">
                                        <button class="text-health-green hover:text-health-green/80 font-medium text-sm icon-hover">
                                            Ver
                                        </button>
                                        <button class="text-blue-500 hover:text-blue-700 font-medium text-sm icon-hover">
                                            Editar
                                        </button>
                                    </div>
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
                                <td class="py-3 px-4">
                                    <span class="permission-badge emergency">Emergencia</span>
                                </td>
                                <td class="py-3 px-4 text-dark-gray">15 Ago 2024</td>
                                <td class="py-3 px-4 text-dark-gray">22 Ago 2024</td>
                                <td class="py-3 px-4">
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium status-pending">
                                        <span class="priority-indicator priority-medium"></span>
                                        Pendiente
                                    </span>
                                </td>
                                <td class="py-3 px-4">
                                    <div class="flex space-x-2">
                                        <button class="text-health-green hover:text-health-green/80 font-medium text-sm icon-hover">
                                            Aprobar
                                        </button>
                                        <button class="text-red-500 hover:text-red-700 font-medium text-sm icon-hover">
                                            Rechazar
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
                        Mostrando 4 de 67 solicitudes
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
                            Nueva Solicitud
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal de Calendario -->
    <div id="calendar-modal" class="modal-overlay">
        <div class="modal-container">
            <div class="modal-header">
                <div>
                    <h2 class="text-2xl font-heading font-bold text-health-black">Calendario de Permisos</h2>
                    <p class="text-dark-gray mt-1">Visualiza todos los permisos y vacaciones de los empleados</p>
                </div>
                <button id="close-calendar-modal" class="modal-close">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
            
            <div class="modal-body">
                <!-- Filtros para el calendario -->
                <div class="flex flex-col md:flex-row gap-4 mb-6">
                    <div class="flex gap-2 flex-1">
                        <select class="px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-health-green focus:border-transparent flex-1">
                            <option value="">Todos los departamentos</option>
                            <option value="desarrollo">Desarrollo</option>
                            <option value="marketing">Marketing</option>
                            <option value="ventas">Ventas</option>
                            <option value="operaciones">Operaciones</option>
                        </select>
                        
                        <select class="px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-health-green focus:border-transparent">
                            <option value="">Todos los tipos</option>
                            <option value="vacaciones">Vacaciones</option>
                            <option value="medico">Permiso Médico</option>
                            <option value="personal">Permiso Personal</option>
                            <option value="emergencia">Emergencia</option>
                        </select>
                    </div>
                    
                    <div class="flex gap-2">
                        <button class="px-4 py-2 bg-health-green text-white rounded-lg hover:bg-health-green/90 transition-colors duration-300">
                            <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"/>
                            </svg>
                            Filtrar
                        </button>
                        <button class="px-4 py-2 bg-white border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors duration-300">
                            <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                            </svg>
                            Limpiar
                        </button>
                    </div>
                </div>
                
                <!-- Leyenda de colores -->
                <div class="flex flex-wrap gap-4 mb-6">
                    <div class="flex items-center">
                        <div class="w-4 h-4 bg-blue-100 border-l-4 border-blue-500 rounded mr-2"></div>
                        <span class="text-sm text-dark-gray">Vacaciones</span>
                    </div>
                    <div class="flex items-center">
                        <div class="w-4 h-4 bg-green-100 border-l-4 border-green-500 rounded mr-2"></div>
                        <span class="text-sm text-dark-gray">Permiso Médico</span>
                    </div>
                    <div class="flex items-center">
                        <div class="w-4 h-4 bg-yellow-100 border-l-4 border-yellow-500 rounded mr-2"></div>
                        <span class="text-sm text-dark-gray">Permiso Personal</span>
                    </div>
                    <div class="flex items-center">
                        <div class="w-4 h-4 bg-red-100 border-l-4 border-red-500 rounded mr-2"></div>
                        <span class="text-sm text-dark-gray">Emergencia</span>
                    </div>
                </div>
                
                <!-- Calendario -->
                <div class="premium-card p-6 mb-6">
                    <div class="calendar-navigation">
                        <button id="prev-month" class="p-2 rounded-lg bg-gray-100 hover:bg-gray-200 transition-colors duration-300">
                            <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                            </svg>
                        </button>
                        <h3 id="current-month" class="calendar-month">Septiembre 2024</h3>
                        <button id="next-month" class="p-2 rounded-lg bg-gray-100 hover:bg-gray-200 transition-colors duration-300">
                            <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </button>
                    </div>
                    <div class="calendar-container">
                        <table class="calendar w-full">
                            <thead>
                                <tr>
                                    <th>Dom</th>
                                    <th>Lun</th>
                                    <th>Mar</th>
                                    <th>Mié</th>
                                    <th>Jue</th>
                                    <th>Vie</th>
                                    <th>Sáb</th>
                                </tr>
                            </thead>
                            <tbody id="calendar-body">
                                <!-- Los días se generarán dinámicamente con JavaScript -->
                            </tbody>
                        </table>
                    </div>
                </div>
                
                <!-- Detalles del día seleccionado -->
                <div id="day-details" class="day-details hidden">
                    <h3 id="selected-date">Permisos para el día seleccionado</h3>
                    <div id="permissions-list">
                        <!-- Los permisos se cargarán aquí dinámicamente -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal de Reportes -->
    <div id="reports-modal" class="modal-overlay">
        <div class="modal-container">
            <div class="modal-header">
                <div>
                    <h2 class="text-2xl font-heading font-bold text-health-black">Reportes y Analytics</h2>
                    <p class="text-dark-gray mt-1">Genera y visualiza reportes detallados de la gestión de RRHH</p>
                </div>
                <button id="close-reports-modal" class="modal-close">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
            
            <div class="modal-body">
                <!-- Filtros para reportes -->
                <div class="flex flex-col md:flex-row gap-4 mb-6">
                    <div class="flex gap-2 flex-1">
                        <select class="px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-health-green focus:border-transparent flex-1">
                            <option value="">Tipo de Reporte</option>
                            <option value="empleados">Reporte de Empleados</option>
                            <option value="permisos">Reporte de Permisos</option>
                            <option value="asistencia">Reporte de Asistencia</option>
                            <option value="rendimiento">Reporte de Rendimiento</option>
                            <option value="rotacion">Reporte de Rotación</option>
                        </select>
                        
                        <select class="px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-health-green focus:border-transparent">
                            <option value="">Departamento</option>
                            <option value="desarrollo">Desarrollo</option>
                            <option value="marketing">Marketing</option>
                            <option value="ventas">Ventas</option>
                            <option value="operaciones">Operaciones</option>
                            <option value="todos">Todos</option>
                        </select>
                    </div>
                    
                    <div class="flex gap-2">
                        <input type="date" class="px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-health-green focus:border-transparent" value="2024-01-01">
                        <span class="flex items-center px-2">a</span>
                        <input type="date" class="px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-health-green focus:border-transparent" value="2024-12-31">
                    </div>
                </div>
                
                <!-- Estadísticas de reportes -->
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-6">
                    <div class="bg-health-green/10 p-4 rounded-lg border border-health-green/20">
                        <p class="text-sm text-dark-gray">Reportes Generados</p>
                        <h3 class="text-2xl font-bold text-health-black">24</h3>
                    </div>
                    <div class="bg-health-yellow/10 p-4 rounded-lg border border-health-yellow/20">
                        <p class="text-sm text-dark-gray">Este Mes</p>
                        <h3 class="text-2xl font-bold text-health-black">8</h3>
                    </div>
                    <div class="bg-health-green/10 p-4 rounded-lg border border-health-green/20">
                        <p class="text-sm text-dark-gray">Programados</p>
                        <h3 class="text-2xl font-bold text-health-black">5</h3>
                    </div>
                    <div class="bg-purple-100 p-4 rounded-lg border border-purple-200">
                        <p class="text-sm text-dark-gray">Compartidos</p>
                        <h3 class="text-2xl font-bold text-health-black">12</h3>
                    </div>
                </div>
                
                <!-- Gráficos de reportes -->
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
                    <div class="premium-card p-6">
                        <h3 class="text-xl font-heading font-bold text-health-black mb-4">Distribución de Permisos</h3>
                        <div class="chart-container">
                            <canvas id="permissionsDistributionChart"></canvas>
                        </div>
                    </div>
                    
                    <div class="premium-card p-6">
                        <h3 class="text-xl font-heading font-bold text-health-black mb-4">Tendencia Mensual</h3>
                        <div class="chart-container">
                            <canvas id="monthlyTrendChart"></canvas>
                        </div>
                    </div>
                </div>
                
                <!-- Reportes predefinidos -->
                <div class="mb-6">
                    <h3 class="text-xl font-heading font-bold text-health-black mb-4">Reportes Predefinidos</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                        <div class="report-card p-4 bg-health-green/5 rounded-xl border border-health-green/20 hover:bg-health-green/10 transition-all duration-300">
                            <div class="flex items-start mb-3">
                                <div class="w-10 h-10 bg-health-green rounded-xl flex items-center justify-center flex-shrink-0 mr-4">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-health-black">Reporte de Empleados</h4>
                                    <p class="text-sm text-dark-gray mt-1">Informe completo de la plantilla laboral</p>
                                </div>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="report-badge analytics">Analítico</span>
                                <button class="text-health-green hover:text-health-green/80 font-medium text-sm icon-hover">
                                    Generar
                                </button>
                            </div>
                        </div>
                        
                        <div class="report-card p-4 bg-health-yellow/5 rounded-xl border border-health-yellow/20 hover:bg-health-yellow/10 transition-all duration-300">
                            <div class="flex items-start mb-3">
                                <div class="w-10 h-10 bg-health-yellow rounded-xl flex items-center justify-center flex-shrink-0 mr-4">
                                    <svg class="w-5 h-5 text-health-black" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-health-black">Reporte de Permisos</h4>
                                    <p class="text-sm text-dark-gray mt-1">Análisis de solicitudes y aprobaciones</p>
                                </div>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="report-badge operational">Operacional</span>
                                <button class="text-health-green hover:text-health-green/80 font-medium text-sm icon-hover">
                                    Generar
                                </button>
                            </div>
                        </div>
                        
                        <div class="report-card p-4 bg-health-green/5 rounded-xl border border-health-green/20 hover:bg-health-green/10 transition-all duration-300">
                            <div class="flex items-start mb-3">
                                <div class="w-10 h-10 bg-health-green rounded-xl flex items-center justify-center flex-shrink-0 mr-4">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-health-black">Reporte Financiero</h4>
                                    <p class="text-sm text-dark-gray mt-1">Costos de nómina y beneficios</p>
                                </div>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="report-badge financial">Financiero</span>
                                <button class="text-health-green hover:text-health-green/80 font-medium text-sm icon-hover">
                                    Generar
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Reportes recientes -->
                <div class="overflow-x-auto scrollbar-custom">
                    <table class="w-full">
                        <thead>
                            <tr class="border-b border-gray-200">
                                <th class="text-left py-3 px-4 text-sm font-semibold text-dark-gray">Reporte</th>
                                <th class="text-left py-3 px-4 text-sm font-semibold text-dark-gray">Tipo</th>
                                <th class="text-left py-3 px-4 text-sm font-semibold text-dark-gray">Fecha Generación</th>
                                <th class="text-left py-3 px-4 text-sm font-semibold text-dark-gray">Estado</th>
                                <th class="text-left py-3 px-4 text-sm font-semibold text-dark-gray">Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            <tr class="hover:bg-gray-50 transition-colors duration-300">
                                <td class="py-3 px-4">
                                    <div class="font-medium text-health-black">Reporte Mensual de Empleados</div>
                                    <div class="text-sm text-dark-gray">Resumen completo de la plantilla</div>
                                </td>
                                <td class="py-3 px-4">
                                    <span class="report-badge analytics">Analítico</span>
                                </td>
                                <td class="py-3 px-4 text-dark-gray">01 Sep 2024</td>
                                <td class="py-3 px-4">
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium status-approved">
                                        Completado
                                    </span>
                                </td>
                                <td class="py-3 px-4">
                                    <div class="flex space-x-2">
                                        <button class="text-health-green hover:text-health-green/80 font-medium text-sm icon-hover">
                                            Descargar
                                        </button>
                                        <button class="text-blue-500 hover:text-blue-700 font-medium text-sm icon-hover">
                                            Compartir
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr class="hover:bg-gray-50 transition-colors duration-300">
                                <td class="py-3 px-4">
                                    <div class="font-medium text-health-black">Análisis de Permisos Q3</div>
                                    <div class="text-sm text-dark-gray">Tendencias y estadísticas de permisos</div>
                                </td>
                                <td class="py-3 px-4">
                                    <span class="report-badge operational">Operacional</span>
                                </td>
                                <td class="py-3 px-4 text-dark-gray">15 Ago 2024</td>
                                <td class="py-3 px-4">
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium status-approved">
                                        Completado
                                    </span>
                                </td>
                                <td class="py-3 px-4">
                                    <div class="flex space-x-2">
                                        <button class="text-health-green hover:text-health-green/80 font-medium text-sm icon-hover">
                                            Descargar
                                        </button>
                                        <button class="text-blue-500 hover:text-blue-700 font-medium text-sm icon-hover">
                                            Compartir
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr class="hover:bg-gray-50 transition-colors duration-300">
                                <td class="py-3 px-4">
                                    <div class="font-medium text-health-black">Reporte de Rotación</div>
                                    <div class="text-sm text-dark-gray">Análisis de entrada y salida de personal</div>
                                </td>
                                <td class="py-3 px-4">
                                    <span class="report-badge compliance">Cumplimiento</span>
                                </td>
                                <td class="py-3 px-4 text-dark-gray">10 Ago 2024</td>
                                <td class="py-3 px-4">
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium status-pending">
                                        En Proceso
                                    </span>
                                </td>
                                <td class="py-3 px-4">
                                    <div class="flex space-x-2">
                                        <button class="text-gray-400 font-medium text-sm" disabled>
                                            Descargar
                                        </button>
                                        <button class="text-blue-500 hover:text-blue-700 font-medium text-sm icon-hover">
                                            Ver Progreso
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
                        Mostrando 3 de 24 reportes
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
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 13h6m-3-3v6m-9 1V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z"/>
                            </svg>
                            Nuevo Reporte
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal de Políticas -->
    <div id="policies-modal" class="modal-overlay">
        <div class="modal-container">
            <div class="modal-header">
                <div>
                    <h2 class="text-2xl font-heading font-bold text-health-black">Políticas de Permisos y Vacaciones</h2>
                    <p class="text-dark-gray mt-1">Consulta todas las políticas de la organización sobre permisos y vacaciones</p>
                </div>
                <button id="close-policies-modal" class="modal-close">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
            
            <div class="modal-body">
                <!-- Navegación de políticas -->
                <div class="flex flex-wrap gap-2 mb-6 border-b border-gray-200 pb-4">
                    <button class="policy-tab active px-4 py-2 rounded-lg bg-health-green text-white font-medium transition-all duration-300" data-tab="vacations">
                        Vacaciones
                    </button>
                    <button class="policy-tab px-4 py-2 rounded-lg bg-gray-100 text-gray-700 hover:bg-gray-200 font-medium transition-all duration-300" data-tab="maternity">
                        Maternidad/Paternidad
                    </button>
                    <button class="policy-tab px-4 py-2 rounded-lg bg-gray-100 text-gray-700 hover:bg-gray-200 font-medium transition-all duration-300" data-tab="medical">
                        Permisos Médicos
                    </button>
                    <button class="policy-tab px-4 py-2 rounded-lg bg-gray-100 text-gray-700 hover:bg-gray-200 font-medium transition-all duration-300" data-tab="special">
                        Permisos Especiales
                    </button>
                    <button class="policy-tab px-4 py-2 rounded-lg bg-gray-100 text-gray-700 hover:bg-gray-200 font-medium transition-all duration-300" data-tab="procedures">
                        Procedimientos
                    </button>
                </div>
                
                <!-- Contenido de Políticas de Vacaciones -->
                <div id="vacations-tab" class="policy-content active">
                    <div class="policy-category">
                        <h3 class="text-xl font-heading font-bold text-health-black mb-4">Política de Vacaciones</h3>
                        
                        <div class="policy-item">
                            <div class="flex items-start">
                                <div class="policy-icon bg-health-green/20">
                                    <svg class="w-6 h-6 text-health-green" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <h4 class="font-semibold text-health-black">Días de Vacaciones</h4>
                                    <p class="text-dark-gray mt-1">15 días hábiles por periodo de un año</p>
                                    <div class="policy-requirements mt-2">
                                        <p class="text-sm font-medium text-dark-gray mb-2">Detalles importantes:</p>
                                        <ul class="text-sm text-dark-gray space-y-1">
                                            <li>Los días de vacaciones son acumulables, solo 2 periodos</li>
                                            <li>Los sábados cuentan como día hábil</li>
                                            <li>La solicitud de vacaciones se puede realizar inmediatamente después de cumplir el periodo anual</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="policy-item">
                            <div class="flex items-start">
                                <div class="policy-icon bg-health-yellow/20">
                                    <svg class="w-6 h-6 text-health-yellow" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <h4 class="font-semibold text-health-black">Gestión de Reemplazo</h4>
                                    <p class="text-dark-gray mt-1">El 70% de los funcionarios deben estar disponibles</p>
                                    <div class="policy-requirements mt-2">
                                        <p class="text-sm font-medium text-dark-gray mb-2">Condiciones:</p>
                                        <ul class="text-sm text-dark-gray space-y-1">
                                            <li>Si varias personas de la misma dependencia solicitan vacaciones, no pueden salir al mismo tiempo</li>
                                            <li>Se debe garantizar la continuidad operativa del área</li>
                                            <li>La aprobación está sujeta a la disponibilidad del personal</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="policy-item">
                            <div class="flex items-start">
                                <div class="policy-icon bg-health-green/20">
                                    <svg class="w-6 h-6 text-health-green" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <h4 class="font-semibold text-health-black">Plazos de Solicitud</h4>
                                    <p class="text-dark-gray mt-1">Días hábiles para realizar una solicitud</p>
                                    <div class="policy-requirements mt-2">
                                        <p class="text-sm font-medium text-dark-gray mb-2">Especificaciones:</p>
                                        <ul class="text-sm text-dark-gray space-y-1">
                                            <li>Las vacaciones se pueden solicitar inmediatamente después de cumplir el periodo anual</li>
                                            <li>Si hoy cumplo el año, lo puedo solicitar mañana</li>
                                            <li>Debe solicitar las vacaciones un mes posterior a la fecha de cumplimiento</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Contenido de Políticas de Maternidad/Paternidad -->
                <div id="maternity-tab" class="policy-content hidden">
                    <div class="policy-category">
                        <h3 class="text-xl font-heading font-bold text-health-black mb-4">Permiso de Maternidad y Paternidad</h3>
                        
                        <div class="policy-item">
                            <div class="flex items-start">
                                <div class="policy-icon bg-pink-100">
                                    <svg class="w-6 h-6 text-pink-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"/>
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <h4 class="font-semibold text-health-black">Permiso de Maternidad</h4>
                                    <p class="text-dark-gray mt-1">4 meses para las mujeres</p>
                                    <div class="policy-requirements mt-2">
                                        <p class="text-sm font-medium text-dark-gray mb-2">Requisitos:</p>
                                        <ul class="text-sm text-dark-gray space-y-1">
                                            <li>Certificado médico que confirme el embarazo</li>
                                            <li>Comunicación con anticipación al departamento de RRHH</li>
                                            <li>Plan de entrega de responsabilidades durante la ausencia</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="policy-item">
                            <div class="flex items-start">
                                <div class="policy-icon bg-blue-100">
                                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <h4 class="font-semibold text-health-black">Permiso de Paternidad</h4>
                                    <p class="text-dark-gray mt-1">15 días para los hombres</p>
                                    <div class="policy-requirements mt-2">
                                        <p class="text-sm font-medium text-dark-gray mb-2">Requisitos:</p>
                                        <ul class="text-sm text-dark-gray space-y-1">
                                            <li>Certificado de nacimiento del hijo/a</li>
                                            <li>Comprobante de relación parental</li>
                                            <li>Notificación al jefe inmediato con al menos 2 semanas de anticipación</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="policy-item">
                            <div class="flex items-start">
                                <div class="policy-icon bg-green-100">
                                    <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <h4 class="font-semibold text-health-black">Acompañamiento a Citas Médicas</h4>
                                    <p class="text-dark-gray mt-1">Permiso para acompañar a hijos a citas médicas</p>
                                    <div class="policy-requirements mt-2">
                                        <p class="text-sm font-medium text-dark-gray mb-2">Condiciones:</p>
                                        <ul class="text-sm text-dark-gray space-y-1">
                                            <li>Válido para padres que necesiten acompañar a sus hijos a citas médicas</li>
                                            <li>Se requiere presentar comprobante de la cita médica</li>
                                            <li>Máximo 1 día por cita médica</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Contenido de Políticas de Permisos Médicos -->
                <div id="medical-tab" class="policy-content hidden">
                    <div class="policy-category">
                        <h3 class="text-xl font-heading font-bold text-health-black mb-4">Permisos Médicos</h3>
                        
                        <div class="policy-item">
                            <div class="flex items-start">
                                <div class="policy-icon bg-red-100">
                                    <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"/>
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <h4 class="font-semibold text-health-black">Documentación Requerida</h4>
                                    <p class="text-dark-gray mt-1">Deben estar acompañados de las órdenes médicas</p>
                                    <div class="policy-requirements mt-2">
                                        <p class="text-sm font-medium text-dark-gray mb-2">Documentos necesarios:</p>
                                        <ul class="text-sm text-dark-gray space-y-1">
                                            <li>Certificado médico con diagnóstico</li>
                                            <li>Órdenes médicas correspondientes</li>
                                            <li>Todo anexo que tenga que ver con la enfermedad</li>
                                            <li>Comprobante de incapacidad si aplica</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="policy-item">
                            <div class="flex items-start">
                                <div class="policy-icon bg-purple-100">
                                    <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <h4 class="font-semibold text-health-black">Proceso de Aprobación</h4>
                                    <p class="text-dark-gray mt-1">Flujo de aprobación según la duración</p>
                                    <div class="policy-requirements mt-2">
                                        <p class="text-sm font-medium text-dark-gray mb-2">Autorización:</p>
                                        <ul class="text-sm text-dark-gray space-y-1">
                                            <li>Permisos menores de 2 días: Aprobación con jefe inmediato</li>
                                            <li>Permisos de más de 3 días: Aprobación con recursos humanos</li>
                                            <li>En casos de emergencia, notificar posteriormente</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Contenido de Políticas de Permisos Especiales -->
                <div id="special-tab" class="policy-content hidden">
                    <div class="policy-category">
                        <h3 class="text-xl font-heading font-bold text-health-black mb-4">Permisos Especiales</h3>
                        
                        <div class="policy-item">
                            <div class="flex items-start">
                                <div class="policy-icon bg-yellow-100">
                                    <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"/>
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <h4 class="font-semibold text-health-black">Permiso por Ser Miembro o Jurado</h4>
                                    <p class="text-dark-gray mt-1">Permiso especial para funciones cívicas</p>
                                    <div class="policy-requirements mt-2">
                                        <p class="text-sm font-medium text-dark-gray mb-2">Requisitos:</p>
                                        <ul class="text-sm text-dark-gray space-y-1">
                                            <li>Citación oficial que acredite la función</li>
                                            <li>Comunicación previa al departamento de RRHH</li>
                                            <li>Justificación del tiempo requerido</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="policy-item">
                            <div class="flex items-start">
                                <div class="policy-icon bg-gray-100">
                                    <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <h4 class="font-semibold text-health-black">Permiso por Fallecimiento de Familiar</h4>
                                    <p class="text-dark-gray mt-1">Licencia por duelo</p>
                                    <div class="policy-requirements mt-2">
                                        <p class="text-sm font-medium text-dark-gray mb-2">Documentación:</p>
                                        <ul class="text-sm text-dark-gray space-y-1">
                                            <li>Se necesita el certificado de defunción</li>
                                            <li>Comprobante de parentesco con el fallecido</li>
                                            <li>Duración según el grado de parentesco (consultar con RRHH)</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="policy-item">
                            <div class="flex items-start">
                                <div class="policy-icon bg-indigo-100">
                                    <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <h4 class="font-semibold text-health-black">Permisos por Otras Causas</h4>
                                    <p class="text-dark-gray mt-1">Casos no contemplados en otras categorías</p>
                                    <div class="policy-requirements mt-2">
                                        <p class="text-sm font-medium text-dark-gray mb-2">Procedimiento:</p>
                                        <ul class="text-sm text-dark-gray space-y-1">
                                            <li>Si es por otras causas se adjunta el anexo correspondiente</li>
                                            <li>Evaluación caso por caso por el departamento de RRHH</li>
                                            <li>Se requiere justificación detallada de la solicitud</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Contenido de Políticas de Procedimientos -->
                <div id="procedures-tab" class="policy-content hidden">
                    <div class="policy-category">
                        <h3 class="text-xl font-heading font-bold text-health-black mb-4">Procedimientos y Flujos de Aprobación</h3>
                        
                        <div class="policy-item">
                            <div class="flex items-start">
                                <div class="policy-icon bg-blue-100">
                                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <h4 class="font-semibold text-health-black">Flujo de Aprobación</h4>
                                    <p class="text-dark-gray mt-1">Diferenciación según duración del permiso</p>
                                    <div class="policy-requirements mt-2">
                                        <p class="text-sm font-medium text-dark-gray mb-2">Autorización por duración:</p>
                                        <ul class="text-sm text-dark-gray space-y-1">
                                            <li><span class="font-semibold">Menos de 2 días:</span> Aprobación con jefe inmediato</li>
                                            <li><span class="font-semibold">Más de 3 días:</span> Aprobación con recursos humanos</li>
                                            <li>En todos los casos, se debe notificar al departamento correspondiente</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="policy-item">
                            <div class="flex items-start">
                                <div class="policy-icon bg-green-100">
                                    <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <h4 class="font-semibold text-health-black">Documentación Requerida</h4>
                                    <p class="text-dark-gray mt-1">Resumen de documentos necesarios por tipo de permiso</p>
                                    <div class="policy-requirements mt-2">
                                        <p class="text-sm font-medium text-dark-gray mb-2">Documentos por categoría:</p>
                                        <ul class="text-sm text-dark-gray space-y-1">
                                            <li><span class="font-semibold">Maternidad/Paternidad:</span> Certificado</li>
                                            <li><span class="font-semibold">Permisos Médicos:</span> Órdenes médicas y todo anexo relacionado</li>
                                            <li><span class="font-semibold">Fallecimiento:</span> Certificado de defunción</li>
                                            <li><span class="font-semibold">Otras causas:</span> Anexo correspondiente</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="policy-item">
                            <div class="flex items-start">
                                <div class="policy-icon bg-purple-100">
                                    <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <h4 class="font-semibold text-health-black">Plazos y Consideraciones</h4>
                                    <p class="text-dark-gray mt-1">Aspectos importantes a considerar</p>
                                    <div class="policy-requirements mt-2">
                                        <p class="text-sm font-medium text-dark-gray mb-2">Consideraciones generales:</p>
                                        <ul class="text-sm text-dark-gray space-y-1">
                                            <li>Los sábados cuentan como día hábil para el cómputo de permisos</li>
                                            <li>Las vacaciones son acumulables solo por 2 periodos consecutivos</li>
                                            <li>Para vacaciones, se puede solicitar un mes posterior al cumplimiento del año</li>
                                            <li>La gestión de reemplazo requiere que el 70% del personal esté disponible</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Resumen de políticas -->
                <div class="mt-8 p-6 bg-gradient-to-r from-health-green/10 to-health-yellow/10 rounded-xl border border-health-green/20">
                    <h3 class="text-xl font-heading font-bold text-health-black mb-4">Resumen de Políticas</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="flex items-center">
                            <span class="policy-tag vacation mr-2">Vacaciones</span>
                            <span class="text-sm text-dark-gray">15 días hábiles/año</span>
                        </div>
                        <div class="flex items-center">
                            <span class="policy-tag maternity mr-2">Maternidad</span>
                            <span class="text-sm text-dark-gray">4 meses</span>
                        </div>
                        <div class="flex items-center">
                            <span class="policy-tag maternity mr-2">Paternidad</span>
                            <span class="text-sm text-dark-gray">15 días</span>
                        </div>
                        <div class="flex items-center">
                            <span class="policy-tag medical mr-2">Médicos</span>
                            <span class="text-sm text-dark-gray">Con documentación</span>
                        </div>
                        <div class="flex items-center">
                            <span class="policy-tag special mr-2">Miembro/Jurado</span>
                            <span class="text-sm text-dark-gray">Permiso especial</span>
                        </div>
                        <div class="flex items-center">
                            <span class="policy-tag emergency mr-2">Fallecimiento</span>
                            <span class="text-sm text-dark-gray">Con certificado</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal de Configuración -->
    <div id="settings-modal" class="modal-overlay">
        <div class="modal-container">
            <div class="modal-header">
                <div>
                    <h2 class="text-2xl font-heading font-bold text-health-black">Configuración del Sistema</h2>
                    <p class="text-dark-gray mt-1">Personaliza la plataforma ComfaTime según las necesidades de tu organización</p>
                </div>
                <button id="close-settings-modal" class="modal-close">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
            
            <div class="modal-body">
                <!-- Navegación de configuración -->
                <div class="flex flex-wrap gap-2 mb-6 border-b border-gray-200 pb-4">
                    <button class="config-tab active px-4 py-2 rounded-lg bg-health-green text-white font-medium transition-all duration-300" data-tab="general">
                        General
                    </button>
                    <button class="config-tab px-4 py-2 rounded-lg bg-gray-100 text-gray-700 hover:bg-gray-200 font-medium transition-all duration-300" data-tab="policies">
                        Políticas
                    </button>
                    <button class="config-tab px-4 py-2 rounded-lg bg-gray-100 text-gray-700 hover:bg-gray-200 font-medium transition-all duration-300" data-tab="notifications">
                        Notificaciones
                    </button>
                    <button class="config-tab px-4 py-2 rounded-lg bg-gray-100 text-gray-700 hover:bg-gray-200 font-medium transition-all duration-300" data-tab="integrations">
                        Integraciones
                    </button>
                    <button class="config-tab px-4 py-2 rounded-lg bg-gray-100 text-gray-700 hover:bg-gray-200 font-medium transition-all duration-300" data-tab="security">
                        Seguridad
                    </button>
                </div>
                
                <!-- Contenido de Configuración General -->
                <div id="general-tab" class="config-content active">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                        <!-- Información de la Empresa -->
                        <div class="premium-card p-6">
                            <h3 class="text-xl font-heading font-bold text-health-black mb-4">Información de la Empresa</h3>
                            
                            <div class="space-y-4">
                                <div>
                                    <label class="block text-sm font-medium text-dark-gray mb-2">Nombre de la Empresa</label>
                                    <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-health-green focus:border-transparent" value="Comfachocó">
                                </div>
                                
                                <div>
                                    <label class="block text-sm font-medium text-dark-gray mb-2">Logo de la Empresa</label>
                                    <div class="flex items-center space-x-4">
                                        <div class="w-16 h-16 bg-gradient-to-r from-health-green to-health-yellow rounded-lg flex items-center justify-center text-white font-bold text-sm">
                                            <img src="../public/images/logo-comfachoco.png" alt="Logo de comfachoco">
                                        </div>
                                        <div>
                                            <button class="px-4 py-2 bg-health-green text-white rounded-lg hover:bg-health-green/90 transition-colors duration-300">
                                                Cambiar Logo
                                            </button>
                                            <p class="text-xs text-dark-gray mt-1">Recomendado: 200x200px, PNG o JPG</p>
                                        </div>
                                    </div>
                                </div>
                                
                                <div>
                                    <label class="block text-sm font-medium text-dark-gray mb-2">Slogan</label>
                                    <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-health-green focus:border-transparent" value="Tu bienestar laboral, simplificado">
                                </div>
                            </div>
                        </div>
                        
                        <!-- Configuración de la Plataforma -->
                        <div class="premium-card p-6">
                            <h3 class="text-xl font-heading font-bold text-health-black mb-4">Configuración de la Plataforma</h3>
                            
                            <div class="space-y-4">
                                <div>
                                    <label class="block text-sm font-medium text-dark-gray mb-2">Nombre de la Plataforma</label>
                                    <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-health-green focus:border-transparent" value="ComfaTime">
                                </div>
                                
                                <div>
                                    <label class="block text-sm font-medium text-dark-gray mb-2">Descripción</label>
                                    <textarea class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-health-green focus:border-transparent" rows="3">Gestiona tus vacaciones, permisos y licencias de manera fácil y transparente. Menos trámites, más tiempo para lo importante.</textarea>
                                </div>
                                
                                <div class="flex items-center justify-between">
                                    <div>
                                        <label class="block text-sm font-medium text-dark-gray mb-1">Modo Oscuro</label>
                                        <p class="text-xs text-dark-gray">Activa el modo oscuro para toda la plataforma</p>
                                    </div>
                                    <label class="relative inline-flex items-center cursor-pointer">
                                        <input type="checkbox" class="sr-only peer">
                                        <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-health-green"></div>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Características de la Plataforma -->
                    <div class="premium-card p-6 mb-6">
                        <h3 class="text-xl font-heading font-bold text-health-black mb-4">Características de la Plataforma</h3>
                        
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <div class="flex items-center p-4 bg-health-green/5 rounded-xl border border-health-green/20">
                                <div class="w-10 h-10 bg-health-green rounded-xl flex items-center justify-center flex-shrink-0 mr-4">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-health-black">Gestión Rápida</h4>
                                    <p class="text-sm text-dark-gray">Solicita permisos en minutos</p>
                                </div>
                            </div>
                            
                            <div class="flex items-center p-4 bg-health-yellow/5 rounded-xl border border-health-yellow/20">
                                <div class="w-10 h-10 bg-health-yellow rounded-xl flex items-center justify-center flex-shrink-0 mr-4">
                                    <svg class="w-5 h-5 text-health-black" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-health-black">Transparencia Total</h4>
                                    <p class="text-sm text-dark-gray">Sigue el estado de tus solicitudes</p>
                                </div>
                            </div>
                            
                            <div class="flex items-center p-4 bg-health-green/5 rounded-xl border border-health-green/20">
                                <div class="w-10 h-10 bg-health-green rounded-xl flex items-center justify-center flex-shrink-0 mr-4">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-health-black">Autogestión</h4>
                                    <p class="text-sm text-dark-gray">Controla tus días disponibles</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Botones de acción -->
                    <div class="flex justify-end space-x-3">
                        <button class="px-6 py-2 bg-white border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors duration-300">
                            Cancelar
                        </button>
                        <button class="px-6 py-2 btn-primary text-white rounded-lg transition-all duration-300">
                            Guardar Cambios
                        </button>
                    </div>
                </div>
                
                <!-- Contenido de Configuración de Políticas -->
                <div id="policies-tab" class="config-content hidden">
                    <div class="premium-card p-6 mb-6">
                        <h3 class="text-xl font-heading font-bold text-health-black mb-4">Políticas de Vacaciones y Permisos</h3>
                        
                        <div class="space-y-6">
                            <!-- Vacaciones -->
                            <div class="p-4 bg-health-green/5 rounded-xl border border-health-green/20">
                                <div class="flex items-center justify-between mb-4">
                                    <h4 class="font-semibold text-health-black">Política de Vacaciones</h4>
                                    <button class="text-health-green hover:text-health-green/80 font-medium text-sm icon-hover">
                                        Editar
                                    </button>
                                </div>
                                
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label class="block text-sm font-medium text-dark-gray mb-2">Días de Vacaciones por Año</label>
                                        <input type="number" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-health-green focus:border-transparent" value="15">
                                    </div>
                                    
                                    <div>
                                        <label class="block text-sm font-medium text-dark-gray mb-2">Días Máximos Acumulables</label>
                                        <input type="number" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-health-green focus:border-transparent" value="30">
                                    </div>
                                    
                                    <div class="md:col-span-2">
                                        <label class="block text-sm font-medium text-dark-gray mb-2">Período de Vacaciones</label>
                                        <select class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-health-green focus:border-transparent">
                                            <option value="calendar">Año Calendario</option>
                                            <option value="fiscal">Año Fiscal</option>
                                            <option value="anniversary">Aniversario de Contratación</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Permisos Médicos -->
                            <div class="p-4 bg-health-yellow/5 rounded-xl border border-health-yellow/20">
                                <div class="flex items-center justify-between mb-4">
                                    <h4 class="font-semibold text-health-black">Permisos Médicos</h4>
                                    <button class="text-health-green hover:text-health-green/80 font-medium text-sm icon-hover">
                                        Editar
                                    </button>
                                </div>
                                
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label class="block text-sm font-medium text-dark-gray mb-2">Días Máximos por Año</label>
                                        <input type="number" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-health-green focus:border-transparent" value="5">
                                    </div>
                                    
                                    <div>
                                        <label class="block text-sm font-medium text-dark-gray mb-2">Requiere Certificado</label>
                                        <select class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-health-green focus:border-transparent">
                                            <option value="yes">Sí</option>
                                            <option value="no">No</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Permisos Personales -->
                            <div class="p-4 bg-health-green/5 rounded-xl border border-health-green/20">
                                <div class="flex items-center justify-between mb-4">
                                    <h4 class="font-semibold text-health-black">Permisos Personales</h4>
                                    <button class="text-health-green hover:text-health-green/80 font-medium text-sm icon-hover">
                                        Editar
                                    </button>
                                </div>
                                
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label class="block text-sm font-medium text-dark-gray mb-2">Días por Año</label>
                                        <input type="number" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-health-green focus:border-transparent" value="3">
                                    </div>
                                    
                                    <div>
                                        <label class="block text-sm font-medium text-dark-gray mb-2">Notificación Mínima</label>
                                        <select class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-health-green focus:border-transparent">
                                            <option value="24">24 horas</option>
                                            <option value="48">48 horas</option>
                                            <option value="72">72 horas</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Botones de acción -->
                    <div class="flex justify-end space-x-3">
                        <button class="px-6 py-2 bg-white border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors duration-300">
                            Cancelar
                        </button>
                        <button class="px-6 py-2 btn-primary text-white rounded-lg transition-all duration-300">
                            Guardar Cambios
                        </button>
                    </div>
                </div>
                
                <!-- Contenido de Configuración de Notificaciones -->
                <div id="notifications-tab" class="config-content hidden">
                    <div class="premium-card p-6 mb-6">
                        <h3 class="text-xl font-heading font-bold text-health-black mb-4">Configuración de Notificaciones</h3>
                        
                        <div class="space-y-6">
                            <!-- Notificaciones por Email -->
                            <div class="p-4 bg-health-green/5 rounded-xl border border-health-green/20">
                                <h4 class="font-semibold text-health-black mb-4">Notificaciones por Email</h4>
                                
                                <div class="space-y-4">
                                    <div class="flex items-center justify-between">
                                        <div>
                                            <label class="block text-sm font-medium text-dark-gray mb-1">Solicitudes Pendientes</label>
                                            <p class="text-xs text-dark-gray">Recibir notificaciones cuando haya solicitudes pendientes de revisión</p>
                                        </div>
                                        <label class="relative inline-flex items-center cursor-pointer">
                                            <input type="checkbox" class="sr-only peer" checked>
                                            <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-health-green"></div>
                                        </label>
                                    </div>
                                    
                                    <div class="flex items-center justify-between">
                                        <div>
                                            <label class="block text-sm font-medium text-dark-gray mb-1">Aprobaciones/Rechazos</label>
                                            <p class="text-xs text-dark-gray">Recibir notificaciones cuando se aprueben o rechacen solicitudes</p>
                                        </div>
                                        <label class="relative inline-flex items-center cursor-pointer">
                                            <input type="checkbox" class="sr-only peer" checked>
                                            <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-health-green"></div>
                                        </label>
                                    </div>
                                    
                                    <div class="flex items-center justify-between">
                                        <div>
                                            <label class="block text-sm font-medium text-dark-gray mb-1">Reportes Automáticos</label>
                                            <p class="text-xs text-dark-gray">Recibir reportes periódicos de actividad</p>
                                        </div>
                                        <label class="relative inline-flex items-center cursor-pointer">
                                            <input type="checkbox" class="sr-only peer">
                                            <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-health-green"></div>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Notificaciones en Plataforma -->
                            <div class="p-4 bg-health-yellow/5 rounded-xl border border-health-yellow/20">
                                <h4 class="font-semibold text-health-black mb-4">Notificaciones en Plataforma</h4>
                                
                                <div class="space-y-4">
                                    <div class="flex items-center justify-between">
                                        <div>
                                            <label class="block text-sm font-medium text-dark-gray mb-1">Recordatorios</label>
                                            <p class="text-xs text-dark-gray">Mostrar recordatorios de acciones pendientes</p>
                                        </div>
                                        <label class="relative inline-flex items-center cursor-pointer">
                                            <input type="checkbox" class="sr-only peer" checked>
                                            <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-health-green"></div>
                                        </label>
                                    </div>
                                    
                                    <div class="flex items-center justify-between">
                                        <div>
                                            <label class="block text-sm font-medium text-dark-gray mb-1">Actualizaciones en Tiempo Real</label>
                                            <p class="text-xs text-dark-gray">Mostrar actualizaciones de estado en tiempo real</p>
                                        </div>
                                        <label class="relative inline-flex items-center cursor-pointer">
                                            <input type="checkbox" class="sr-only peer" checked>
                                            <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-health-green"></div>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Frecuencia de Notificaciones -->
                            <div class="p-4 bg-health-green/5 rounded-xl border border-health-green/20">
                                <h4 class="font-semibold text-health-black mb-4">Frecuencia de Notificaciones</h4>
                                
                                <div class="space-y-4">
                                    <div>
                                        <label class="block text-sm font-medium text-dark-gray mb-2">Frecuencia de Recordatorios</label>
                                        <select class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-health-green focus:border-transparent">
                                            <option value="daily">Diariamente</option>
                                            <option value="weekly" selected>Semanalmente</option>
                                            <option value="monthly">Mensualmente</option>
                                        </select>
                                    </div>
                                    
                                    <div>
                                        <label class="block text-sm font-medium text-dark-gray mb-2">Hora de Envío</label>
                                        <input type="time" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-health-green focus:border-transparent" value="09:00">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Botones de acción -->
                    <div class="flex justify-end space-x-3">
                        <button class="px-6 py-2 bg-white border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors duration-300">
                            Cancelar
                        </button>
                        <button class="px-6 py-2 btn-primary text-white rounded-lg transition-all duration-300">
                            Guardar Cambios
                        </button>
                    </div>
                </div>
                
                <!-- Contenido de Configuración de Integraciones -->
                <div id="integrations-tab" class="config-content hidden">
                    <div class="premium-card p-6 mb-6">
                        <h3 class="text-xl font-heading font-bold text-health-black mb-4">Integraciones</h3>
                        
                        <div class="space-y-6">
                            <!-- Sistema de Nómina -->
                            <div class="p-4 bg-health-green/5 rounded-xl border border-health-green/20">
                                <div class="flex items-center justify-between mb-4">
                                    <div class="flex items-center">
                                        <div class="w-10 h-10 bg-health-green rounded-xl flex items-center justify-center flex-shrink-0 mr-4">
                                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                            </svg>
                                        </div>
                                        <div>
                                            <h4 class="font-semibold text-health-black">Sistema de Nómina</h4>
                                            <p class="text-sm text-dark-gray">Sincronización con sistema de nómina</p>
                                        </div>
                                    </div>
                                    <label class="relative inline-flex items-center cursor-pointer">
                                        <input type="checkbox" class="sr-only peer">
                                        <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-health-green"></div>
                                    </label>
                                </div>
                                
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
                                    <div>
                                        <label class="block text-sm font-medium text-dark-gray mb-2">URL del Sistema</label>
                                        <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-health-green focus:border-transparent" placeholder="https://">
                                    </div>
                                    
                                    <div>
                                        <label class="block text-sm font-medium text-dark-gray mb-2">API Key</label>
                                        <input type="password" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-health-green focus:border-transparent" placeholder="••••••••">
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Sistema de Asistencia -->
                            <div class="p-4 bg-health-yellow/5 rounded-xl border border-health-yellow/20">
                                <div class="flex items-center justify-between mb-4">
                                    <div class="flex items-center">
                                        <div class="w-10 h-10 bg-health-yellow rounded-xl flex items-center justify-center flex-shrink-0 mr-4">
                                            <svg class="w-5 h-5 text-health-black" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                            </svg>
                                        </div>
                                        <div>
                                            <h4 class="font-semibold text-health-black">Sistema de Asistencia</h4>
                                            <p class="text-sm text-dark-gray">Sincronización con sistema de control de asistencia</p>
                                        </div>
                                    </div>
                                    <label class="relative inline-flex items-center cursor-pointer">
                                        <input type="checkbox" class="sr-only peer" checked>
                                        <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-health-green"></div>
                                    </label>
                                </div>
                                
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
                                    <div>
                                        <label class="block text-sm font-medium text-dark-gray mb-2">Tipo de Sistema</label>
                                        <select class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-health-green focus:border-transparent">
                                            <option value="biometrico">Biométrico</option>
                                            <option value="tarjeta">Tarjeta</option>
                                            <option value="app">Aplicación Móvil</option>
                                        </select>
                                    </div>
                                    
                                    <div>
                                        <label class="block text-sm font-medium text-dark-gray mb-2">Frecuencia de Sincronización</label>
                                        <select class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-health-green focus:border-transparent">
                                            <option value="daily">Diariamente</option>
                                            <option value="weekly">Semanalmente</option>
                                            <option value="monthly">Mensualmente</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Correo Electrónico -->
                            <div class="p-4 bg-health-green/5 rounded-xl border border-health-green/20">
                                <div class="flex items-center justify-between mb-4">
                                    <div class="flex items-center">
                                        <div class="w-10 h-10 bg-health-green rounded-xl flex items-center justify-center flex-shrink-0 mr-4">
                                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                            </svg>
                                        </div>
                                        <div>
                                            <h4 class="font-semibold text-health-black">Servidor de Correo</h4>
                                            <p class="text-sm text-dark-gray">Configuración del servidor de correo para notificaciones</p>
                                        </div>
                                    </div>
                                    <label class="relative inline-flex items-center cursor-pointer">
                                        <input type="checkbox" class="sr-only peer" checked>
                                        <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-health-green"></div>
                                    </label>
                                </div>
                                
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
                                    <div>
                                        <label class="block text-sm font-medium text-dark-gray mb-2">Servidor SMTP</label>
                                        <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-health-green focus:border-transparent" value="smtp.comfachoco.com">
                                    </div>
                                    
                                    <div>
                                        <label class="block text-sm font-medium text-dark-gray mb-2">Puerto</label>
                                        <input type="number" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-health-green focus:border-transparent" value="587">
                                    </div>
                                    
                                    <div>
                                        <label class="block text-sm font-medium text-dark-gray mb-2">Usuario</label>
                                        <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-health-green focus:border-transparent" value="notificaciones@comfachoco.com">
                                    </div>
                                    
                                    <div>
                                        <label class="block text-sm font-medium text-dark-gray mb-2">Contraseña</label>
                                        <input type="password" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-health-green focus:border-transparent" placeholder="••••••••">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Botones de acción -->
                    <div class="flex justify-end space-x-3">
                        <button class="px-6 py-2 bg-white border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors duration-300">
                            Cancelar
                        </button>
                        <button class="px-6 py-2 btn-primary text-white rounded-lg transition-all duration-300">
                            Guardar Cambios
                        </button>
                    </div>
                </div>
                
                <!-- Contenido de Configuración de Seguridad -->
                <div id="security-tab" class="config-content hidden">
                    <div class="premium-card p-6 mb-6">
                        <h3 class="text-xl font-heading font-bold text-health-black mb-4">Configuración de Seguridad</h3>
                        
                        <div class="space-y-6">
                            <!-- Autenticación -->
                            <div class="p-4 bg-health-green/5 rounded-xl border border-health-green/20">
                                <h4 class="font-semibold text-health-black mb-4">Autenticación</h4>
                                
                                <div class="space-y-4">
                                    <div class="flex items-center justify-between">
                                        <div>
                                            <label class="block text-sm font-medium text-dark-gray mb-1">Autenticación de Dos Factores</label>
                                            <p class="text-xs text-dark-gray">Requerir verificación en dos pasos para acceder</p>
                                        </div>
                                        <label class="relative inline-flex items-center cursor-pointer">
                                            <input type="checkbox" class="sr-only peer">
                                            <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-health-green"></div>
                                        </label>
                                    </div>
                                    
                                    <div class="flex items-center justify-between">
                                        <div>
                                            <label class="block text-sm font-medium text-dark-gray mb-1">Inicio de Sesión Único (SSO)</label>
                                            <p class="text-xs text-dark-gray">Permitir inicio de sesión con credenciales corporativas</p>
                                        </div>
                                        <label class="relative inline-flex items-center cursor-pointer">
                                            <input type="checkbox" class="sr-only peer">
                                            <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-health-green"></div>
                                        </label>
                                    </div>
                                    
                                    <div>
                                        <label class="block text-sm font-medium text-dark-gray mb-2">Tiempo de Expiración de Sesión</label>
                                        <select class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-health-green focus:border-transparent">
                                            <option value="30">30 minutos</option>
                                            <option value="60" selected>1 hora</option>
                                            <option value="120">2 horas</option>
                                            <option value="240">4 horas</option>
                                            <option value="480">8 horas</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Contraseñas -->
                            <div class="p-4 bg-health-yellow/5 rounded-xl border border-health-yellow/20">
                                <h4 class="font-semibold text-health-black mb-4">Política de Contraseñas</h4>
                                
                                <div class="space-y-4">
                                    <div>
                                        <label class="block text-sm font-medium text-dark-gray mb-2">Longitud Mínima</label>
                                        <input type="number" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-health-green focus:border-transparent" value="8">
                                    </div>
                                    
                                    <div class="flex items-center justify-between">
                                        <div>
                                            <label class="block text-sm font-medium text-dark-gray mb-1">Requerir Caracteres Especiales</label>
                                            <p class="text-xs text-dark-gray">Las contraseñas deben incluir caracteres especiales</p>
                                        </div>
                                        <label class="relative inline-flex items-center cursor-pointer">
                                            <input type="checkbox" class="sr-only peer" checked>
                                            <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-health-green"></div>
                                        </label>
                                    </div>
                                    
                                    <div class="flex items-center justify-between">
                                        <div>
                                            <label class="block text-sm font-medium text-dark-gray mb-1">Requerir Números</label>
                                            <p class="text-xs text-dark-gray">Las contraseñas deben incluir números</p>
                                        </div>
                                        <label class="relative inline-flex items-center cursor-pointer">
                                            <input type="checkbox" class="sr-only peer" checked>
                                            <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-health-green"></div>
                                        </label>
                                    </div>
                                    
                                    <div>
                                        <label class="block text-sm font-medium text-dark-gray mb-2">Caducidad de Contraseñas (días)</label>
                                        <input type="number" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-health-green focus:border-transparent" value="90">
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Registro de Actividad -->
                            <div class="p-4 bg-health-green/5 rounded-xl border border-health-green/20">
                                <h4 class="font-semibold text-health-black mb-4">Registro de Actividad</h4>
                                
                                <div class="space-y-4">
                                    <div class="flex items-center justify-between">
                                        <div>
                                            <label class="block text-sm font-medium text-dark-gray mb-1">Registro de Inicios de Sesión</label>
                                            <p class="text-xs text-dark-gray">Registrar todos los intentos de inicio de sesión</p>
                                        </div>
                                        <label class="relative inline-flex items-center cursor-pointer">
                                            <input type="checkbox" class="sr-only peer" checked>
                                            <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-health-green"></div>
                                        </label>
                                    </div>
                                    
                                    <div class="flex items-center justify-between">
                                        <div>
                                            <label class="block text-sm font-medium text-dark-gray mb-1">Registro de Cambios</label>
                                            <p class="text-xs text-dark-gray">Registrar cambios en datos sensibles</p>
                                        </div>
                                        <label class="relative inline-flex items-center cursor-pointer">
                                            <input type="checkbox" class="sr-only peer" checked>
                                            <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-health-green"></div>
                                        </label>
                                    </div>
                                    
                                    <div>
                                        <label class="block text-sm font-medium text-dark-gray mb-2">Retención de Registros (días)</label>
                                        <input type="number" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-health-green focus:border-transparent" value="365">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Botones de acción -->
                    <div class="flex justify-end space-x-3">
                        <button class="px-6 py-2 bg-white border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors duration-300">
                            Cancelar
                        </button>
                        <button class="px-6 py-2 btn-primary text-white rounded-lg transition-all duration-300">
                            Guardar Cambios
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

            // Gráfico de distribución de permisos (para el modal de reportes)
            const permissionsDistributionCtx = document.getElementById('permissionsDistributionChart').getContext('2d');
            const permissionsDistributionChart = new Chart(permissionsDistributionCtx, {
                type: 'pie',
                data: {
                    labels: ['Vacaciones', 'Permiso Médico', 'Permiso Personal', 'Emergencia'],
                    datasets: [{
                        data: [45, 25, 20, 10],
                        backgroundColor: [
                            '#3B82F6',
                            '#10B981',
                            '#F59E0B',
                            '#EF4444'
                        ],
                        borderColor: [
                            '#3B82F6',
                            '#10B981',
                            '#F59E0B',
                            '#EF4444'
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
                    }
                }
            });

            // Gráfico de tendencia mensual (para el modal de reportes)
            const monthlyTrendCtx = document.getElementById('monthlyTrendChart').getContext('2d');
            const monthlyTrendChart = new Chart(monthlyTrendCtx, {
                type: 'line',
                data: {
                    labels: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago'],
                    datasets: [{
                        label: 'Solicitudes',
                        data: [45, 52, 38, 65, 72, 58, 63, 70],
                        backgroundColor: 'rgba(0, 147, 52, 0.1)',
                        borderColor: '#009334',
                        borderWidth: 2,
                        tension: 0.3,
                        fill: true
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
                    if (this.textContent.includes('Ver') || this.textContent.includes('Revisar') || this.textContent.includes('Generar')) {
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

            // Abrir modal de empleados
            openEmployeesModal.addEventListener('click', function(e) {
                e.preventDefault();
                employeesModal.classList.add('active');
                document.body.style.overflow = 'hidden';
            });

            // Cerrar modal de empleados
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

            // Funcionalidad del modal de permisos
            const permissionsModal = document.getElementById('permissions-modal');
            const openPermissionsModal = document.getElementById('open-permissions-modal');
            const closePermissionsModal = document.getElementById('close-permissions-modal');

            // Abrir modal de permisos
            openPermissionsModal.addEventListener('click', function(e) {
                e.preventDefault();
                permissionsModal.classList.add('active');
                document.body.style.overflow = 'hidden';
            });

            // Cerrar modal de permisos
            closePermissionsModal.addEventListener('click', function() {
                permissionsModal.classList.remove('active');
                document.body.style.overflow = 'auto';
            });

            // Cerrar modal al hacer clic fuera del contenido
            permissionsModal.addEventListener('click', function(e) {
                if (e.target === permissionsModal) {
                    permissionsModal.classList.remove('active');
                    document.body.style.overflow = 'auto';
                }
            });

            // Funcionalidad del modal de reportes
            const reportsModal = document.getElementById('reports-modal');
            const openReportsModal = document.getElementById('open-reports-modal');
            const closeReportsModal = document.getElementById('close-reports-modal');

            // Abrir modal de reportes
            openReportsModal.addEventListener('click', function(e) {
                e.preventDefault();
                reportsModal.classList.add('active');
                document.body.style.overflow = 'hidden';
            });

            // Cerrar modal de reportes
            closeReportsModal.addEventListener('click', function() {
                reportsModal.classList.remove('active');
                document.body.style.overflow = 'auto';
            });

            // Cerrar modal al hacer clic fuera del contenido
            reportsModal.addEventListener('click', function(e) {
                if (e.target === reportsModal) {
                    reportsModal.classList.remove('active');
                    document.body.style.overflow = 'auto';
                }
            });

            // Funcionalidad del modal de políticas
            const policiesModal = document.getElementById('policies-modal');
            const openPoliciesModal = document.getElementById('open-policies-modal');
            const openPoliciesModalAction = document.getElementById('open-policies-modal-action');
            const closePoliciesModal = document.getElementById('close-policies-modal');

            // Abrir modal de políticas desde la navegación
            openPoliciesModal.addEventListener('click', function(e) {
                e.preventDefault();
                policiesModal.classList.add('active');
                document.body.style.overflow = 'hidden';
            });

            // Abrir modal de políticas desde la tarjeta de políticas
            if (openPoliciesModalAction) {
                openPoliciesModalAction.addEventListener('click', function(e) {
                    e.preventDefault();
                    policiesModal.classList.add('active');
                    document.body.style.overflow = 'hidden';
                });
            }

            // Cerrar modal de políticas
            closePoliciesModal.addEventListener('click', function() {
                policiesModal.classList.remove('active');
                document.body.style.overflow = 'auto';
            });

            // Cerrar modal al hacer clic fuera del contenido
            policiesModal.addEventListener('click', function(e) {
                if (e.target === policiesModal) {
                    policiesModal.classList.remove('active');
                    document.body.style.overflow = 'auto';
                }
            });

            // Funcionalidad del modal de configuración
            const settingsModal = document.getElementById('settings-modal');
            const openSettingsModal = document.getElementById('open-settings-modal');
            const openSettingsModalAction = document.getElementById('open-settings-modal-action');
            const closeSettingsModal = document.getElementById('close-settings-modal');

            // Abrir modal de configuración desde la navegación
            openSettingsModal.addEventListener('click', function(e) {
                e.preventDefault();
                settingsModal.classList.add('active');
                document.body.style.overflow = 'hidden';
            });

            // Abrir modal de configuración desde acciones rápidas
            openSettingsModalAction.addEventListener('click', function(e) {
                e.preventDefault();
                settingsModal.classList.add('active');
                document.body.style.overflow = 'hidden';
            });

            // Cerrar modal de configuración
            closeSettingsModal.addEventListener('click', function() {
                settingsModal.classList.remove('active');
                document.body.style.overflow = 'auto';
            });

            // Cerrar modal al hacer clic fuera del contenido
            settingsModal.addEventListener('click', function(e) {
                if (e.target === settingsModal) {
                    settingsModal.classList.remove('active');
                    document.body.style.overflow = 'auto';
                }
            });

            // Funcionalidad del modal de calendario
            const calendarModal = document.getElementById('calendar-modal');
            const openCalendarModal = document.getElementById('open-calendar-modal');
            const closeCalendarModal = document.getElementById('close-calendar-modal');

            // Abrir modal de calendario
            openCalendarModal.addEventListener('click', function(e) {
                e.preventDefault();
                calendarModal.classList.add('active');
                document.body.style.overflow = 'hidden';
                generateCalendar(); // Generar el calendario cuando se abre el modal
            });

            // Cerrar modal de calendario
            closeCalendarModal.addEventListener('click', function() {
                calendarModal.classList.remove('active');
                document.body.style.overflow = 'auto';
            });

            // Cerrar modal al hacer clic fuera del contenido
            calendarModal.addEventListener('click', function(e) {
                if (e.target === calendarModal) {
                    calendarModal.classList.remove('active');
                    document.body.style.overflow = 'auto';
                }
            });

            // Cerrar modales con tecla Escape
            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape') {
                    if (employeesModal.classList.contains('active')) {
                        employeesModal.classList.remove('active');
                        document.body.style.overflow = 'auto';
                    }
                    if (permissionsModal.classList.contains('active')) {
                        permissionsModal.classList.remove('active');
                        document.body.style.overflow = 'auto';
                    }
                    if (reportsModal.classList.contains('active')) {
                        reportsModal.classList.remove('active');
                        document.body.style.overflow = 'auto';
                    }
                    if (policiesModal.classList.contains('active')) {
                        policiesModal.classList.remove('active');
                        document.body.style.overflow = 'auto';
                    }
                    if (settingsModal.classList.contains('active')) {
                        settingsModal.classList.remove('active');
                        document.body.style.overflow = 'auto';
                    }
                    if (calendarModal.classList.contains('active')) {
                        calendarModal.classList.remove('active');
                        document.body.style.overflow = 'auto';
                    }
                }
            });

            // Funcionalidad de pestañas en políticas
            const policyTabs = document.querySelectorAll('.policy-tab');
            const policyContents = document.querySelectorAll('.policy-content');

            policyTabs.forEach(tab => {
                tab.addEventListener('click', function() {
                    const targetTab = this.getAttribute('data-tab');
                    
                    // Remover clase activa de todas las pestañas
                    policyTabs.forEach(t => {
                        t.classList.remove('active', 'bg-health-green', 'text-white');
                        t.classList.add('bg-gray-100', 'text-gray-700');
                    });
                    
                    // Agregar clase activa a la pestaña clickeada
                    this.classList.add('active', 'bg-health-green', 'text-white');
                    this.classList.remove('bg-gray-100', 'text-gray-700');
                    
                    // Ocultar todos los contenidos
                    policyContents.forEach(content => {
                        content.classList.add('hidden');
                        content.classList.remove('active');
                    });
                    
                    // Mostrar el contenido correspondiente
                    const targetContent = document.getElementById(`${targetTab}-tab`);
                    if (targetContent) {
                        targetContent.classList.remove('hidden');
                        targetContent.classList.add('active');
                    }
                });
            });

            // Funcionalidad de pestañas en configuración
            const configTabs = document.querySelectorAll('.config-tab');
            const configContents = document.querySelectorAll('.config-content');

            configTabs.forEach(tab => {
                tab.addEventListener('click', function() {
                    const targetTab = this.getAttribute('data-tab');
                    
                    // Remover clase activa de todas las pestañas
                    configTabs.forEach(t => {
                        t.classList.remove('active', 'bg-health-green', 'text-white');
                        t.classList.add('bg-gray-100', 'text-gray-700');
                    });
                    
                    // Agregar clase activa a la pestaña clickeada
                    this.classList.add('active', 'bg-health-green', 'text-white');
                    this.classList.remove('bg-gray-100', 'text-gray-700');
                    
                    // Ocultar todos los contenidos
                    configContents.forEach(content => {
                        content.classList.add('hidden');
                        content.classList.remove('active');
                    });
                    
                    // Mostrar el contenido correspondiente
                    const targetContent = document.getElementById(`${targetTab}-tab`);
                    if (targetContent) {
                        targetContent.classList.remove('hidden');
                        targetContent.classList.add('active');
                    }
                });
            });

            // Simulación de acciones en permisos
            const approveButtons = document.querySelectorAll('button:contains("Aprobar")');
            const rejectButtons = document.querySelectorAll('button:contains("Rechazar")');
            
            approveButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const row = this.closest('tr');
                    const statusCell = row.querySelector('.status-pending');
                    if (statusCell) {
                        statusCell.innerHTML = '<span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium status-approved">Aprobado</span>';
                        
                        // Mostrar notificación de éxito
                        showNotification('Permiso aprobado correctamente', 'success');
                    }
                });
            });
            
            rejectButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const row = this.closest('tr');
                    const statusCell = row.querySelector('.status-pending');
                    if (statusCell) {
                        statusCell.innerHTML = '<span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium status-rejected">Rechazado</span>';
                        
                        // Mostrar notificación de éxito
                        showNotification('Permiso rechazado correctamente', 'warning');
                    }
                });
            });

            // Simulación de generación de reportes
            const generateReportButtons = document.querySelectorAll('.report-card button');
            generateReportButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const card = this.closest('.report-card');
                    const title = card.querySelector('h4').textContent;
                    
                    showNotification(`Generando reporte: ${title}`, 'success');
                    
                    // Simular proceso de generación
                    setTimeout(() => {
                        showNotification(`Reporte "${title}" generado correctamente`, 'success');
                    }, 2000);
                });
            });

            // Función para mostrar notificaciones
            function showNotification(message, type) {
                const notification = document.createElement('div');
                notification.className = `fixed top-4 right-4 p-4 rounded-lg shadow-lg z-50 transform transition-transform duration-300 ${
                    type === 'success' ? 'bg-health-green text-white' : 'bg-health-yellow text-health-black'
                }`;
                notification.textContent = message;
                
                document.body.appendChild(notification);
                
                // Animación de entrada
                setTimeout(() => {
                    notification.style.transform = 'translateX(0)';
                }, 10);
                
                // Remover después de 3 segundos
                setTimeout(() => {
                    notification.style.transform = 'translateX(100%)';
                    setTimeout(() => {
                        document.body.removeChild(notification);
                    }, 300);
                }, 3000);
            }

            // Funcionalidad del calendario
            let currentDate = new Date();
            let currentMonth = currentDate.getMonth();
            let currentYear = currentDate.getFullYear();

            function generateCalendar() {
                const calendarBody = document.getElementById('calendar-body');
                calendarBody.innerHTML = '';

                const firstDay = new Date(currentYear, currentMonth, 1);
                const lastDay = new Date(currentYear, currentMonth + 1, 0);
                const daysInMonth = lastDay.getDate();
                const startingDay = firstDay.getDay();

                // Actualizar el título del mes
                const monthNames = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];
                document.getElementById('current-month').textContent = `${monthNames[currentMonth]} ${currentYear}`;

                let date = 1;
                for (let i = 0; i < 6; i++) {
                    const row = document.createElement('tr');
                    
                    for (let j = 0; j < 7; j++) {
                        const cell = document.createElement('td');
                        
                        if (i === 0 && j < startingDay) {
                            // Celda vacía antes del primer día del mes
                            cell.innerHTML = '';
                        } else if (date > daysInMonth) {
                            // Celda vacía después del último día del mes
                            cell.innerHTML = '';
                        } else {
                            // Celda con día del mes
                            const dayDiv = document.createElement('div');
                            dayDiv.className = 'calendar-day';
                            dayDiv.textContent = date;
                            
                            // Marcar el día actual
                            const today = new Date();
                            if (date === today.getDate() && currentMonth === today.getMonth() && currentYear === today.getFullYear()) {
                                dayDiv.classList.add('current-day');
                            }
                            
                            cell.appendChild(dayDiv);
                            
                            // Agregar eventos de ejemplo
                            if (date === 15 && currentMonth === 8) { // 15 de septiembre
                                const event = document.createElement('div');
                                event.className = 'calendar-event vacation';
                                event.textContent = 'Carlos González - Vacaciones';
                                cell.appendChild(event);
                            }
                            
                            if (date === 10 && currentMonth === 8) { // 10 de septiembre
                                const event = document.createElement('div');
                                event.className = 'calendar-event medical';
                                event.textContent = 'María Pérez - Médico';
                                cell.appendChild(event);
                            }
                            
                            if (date === 22 && currentMonth === 8) { // 22 de septiembre
                                const event = document.createElement('div');
                                event.className = 'calendar-event personal';
                                event.textContent = 'Roberto Martínez - Personal';
                                cell.appendChild(event);
                            }
                            
                            if (date === 5 && currentMonth === 8) { // 5 de septiembre
                                const event = document.createElement('div');
                                event.className = 'calendar-event emergency';
                                event.textContent = 'Ana López - Emergencia';
                                cell.appendChild(event);
                            }
                            
                            // Agregar evento de clic para mostrar detalles
                            cell.addEventListener('click', function() {
                                showDayDetails(date, currentMonth, currentYear);
                            });
                            
                            date++;
                        }
                        
                        row.appendChild(cell);
                    }
                    
                    calendarBody.appendChild(row);
                }
            }

            // Navegación del calendario
            document.getElementById('prev-month').addEventListener('click', function() {
                currentMonth--;
                if (currentMonth < 0) {
                    currentMonth = 11;
                    currentYear--;
                }
                generateCalendar();
            });

            document.getElementById('next-month').addEventListener('click', function() {
                currentMonth++;
                if (currentMonth > 11) {
                    currentMonth = 0;
                    currentYear++;
                }
                generateCalendar();
            });

            // Función para mostrar detalles del día
            function showDayDetails(day, month, year) {
                const dayDetails = document.getElementById('day-details');
                const selectedDate = document.getElementById('selected-date');
                const permissionsList = document.getElementById('permissions-list');
                
                const monthNames = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];
                selectedDate.textContent = `Permisos para ${day} de ${monthNames[month]} de ${year}`;
                
                permissionsList.innerHTML = '';
                
                // Datos de ejemplo para permisos
                const permissions = [];
                
                if (day === 15 && month === 8) {
                    permissions.push({
                        employee: 'Carlos González',
                        type: 'Vacaciones',
                        dates: '15 - 25 Septiembre 2024',
                        status: 'Aprobado'
                    });
                }
                
                if (day === 10 && month === 8) {
                    permissions.push({
                        employee: 'María Pérez',
                        type: 'Permiso Médico',
                        dates: '10 Septiembre 2024',
                        status: 'Pendiente'
                    });
                }
                
                if (day === 22 && month === 8) {
                    permissions.push({
                        employee: 'Roberto Martínez',
                        type: 'Permiso Personal',
                        dates: '22 Septiembre 2024',
                        status: 'Pendiente'
                    });
                }
                
                if (day === 5 && month === 8) {
                    permissions.push({
                        employee: 'Ana López',
                        type: 'Emergencia',
                        dates: '5 Septiembre 2024',
                        status: 'Aprobado'
                    });
                }
                
                if (permissions.length === 0) {
                    permissionsList.innerHTML = '<p>No hay permisos programados para este día.</p>';
                } else {
                    permissions.forEach(permission => {
                        const permissionItem = document.createElement('div');
                        permissionItem.className = 'permission-item';
                        
                        permissionItem.innerHTML = `
                            <div class="permission-item-header">
                                <span class="permission-employee">${permission.employee}</span>
                                <span class="permission-type ${permission.type.toLowerCase().replace(' ', '-')}">${permission.type}</span>
                            </div>
                            <div class="permission-dates">${permission.dates}</div>
                            <div class="permission-status ${permission.status.toLowerCase()}">${permission.status}</div>
                        `;
                        
                        permissionsList.appendChild(permissionItem);
                    });
                }
                
                dayDetails.classList.remove('hidden');
            }

            // Inicializar el calendario
            generateCalendar();

            // Botón "Nuevo Empleado" en Acciones Rápidas
            const quickNewEmployee = document.querySelector('.flex.flex-col.items-center.justify-center.p-4.bg-health-green\\/10:nth-child(1)');
            if (quickNewEmployee) {
                quickNewEmployee.addEventListener('click', function(e) {
                    e.preventDefault();
                    employeesModal.classList.add('active');
                    document.body.style.overflow = 'hidden';
                });
            }

            // Botón "Gestionar Permisos" en Acciones Rápidas
            const quickManagePermissions = document.querySelector('.flex.flex-col.items-center.justify-center.p-4.bg-health-yellow\\/10:nth-child(2)');
            if (quickManagePermissions) {
                quickManagePermissions.addEventListener('click', function(e) {
                    e.preventDefault();
                    permissionsModal.classList.add('active');
                    document.body.style.overflow = 'hidden';
                });
            }

            // Botón "Reportes" en Acciones Rápidas
            const quickReports = document.querySelector('.flex.flex-col.items-center.justify-center.p-4.bg-health-green\\/10:nth-child(3)');
            if (quickReports) {
                quickReports.addEventListener('click', function(e) {
                    e.preventDefault();
                    reportsModal.classList.add('active');
                    document.body.style.overflow = 'hidden';
                });
            }
        });
    </script>
</body>
</html>