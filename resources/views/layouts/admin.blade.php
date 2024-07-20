<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistema de Reservas de Citas Médicas</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    <!-- Iconos de Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- jQuery -->
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <!-- Sweetalert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <!-- Fullcalendar -->
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.14/index.global.min.js'></script>
    <script src='{{ url('fullcalendar/es.global.js') }}'></script>
    <!-- Select2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/i18n/es.js"></script>
    <!-- Ckeditor5 -->
    <link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/42.0.1/ckeditor5.css" />


</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{ route('admin.index') }}" class="nav-link">Sistema de Reservas de Citas Médicas</a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">

                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                        <i class="fas fa-th-large"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="{{ route('admin.index') }}" class="brand-link">
                <img src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
                    class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">SIS Médical</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="info">
                        <a href="#" class="d-block">{{ Auth::user()->name }}</a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">

                        <!-- Configuraciones -->
                        @can('admin.configuraciones.index')
                            <li
                                class="nav-item {{ request()->routeIs('admin.configuraciones.index', 'admin.configuraciones.create') ? 'menu-open' : '' }}">
                                <a href="{{ route('admin.configuraciones.index') }}"
                                    class="nav-link {{ request()->routeIs('admin.configuraciones.index', 'admin.configuraciones.create', 'admin.configuraciones.show') ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-cog"></i>
                                    <p>
                                        Configuraciones
                                    </p>
                                </a>
                            </li>
                        @endcan
                        <!-- Usuarios -->
                        @can('admin.usuarios.index')
                            <li
                                class="nav-item {{ request()->routeIs('admin.usuarios.index', 'admin.usuarios.create') ? 'menu-open' : '' }}">
                                <a href="#"
                                    class="nav-link {{ request()->routeIs('admin.usuarios.index', 'admin.usuarios.create') ? 'active' : '' }}">
                                    <i class="nav-icon fas bi bi-people-fill"></i>
                                    <p>
                                        Usuarios
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('admin.usuarios.create') }}"
                                            class="nav-link {{ request()->routeIs('admin.usuarios.create') ? 'active' : '' }}">
                                            <i class="fas fa-plus-circle nav-icon"></i>
                                            <p>Creación de usuario</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('admin.usuarios.index') }}"
                                            class="nav-link {{ request()->routeIs('admin.usuarios.index') ? 'active' : '' }}">
                                            <i class="fas fa-list nav-icon"></i>
                                            <p>Listado de usuarios</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        @endcan

                        <!-- Secretarias -->
                        @can('admin.secretarias.index')
                            <li
                                class="nav-item {{ request()->routeIs('admin.secretarias.index', 'admin.secretarias.create') ? 'menu-open' : '' }}">
                                <a href="#"
                                    class="nav-link {{ request()->routeIs('admin.secretarias.index', 'admin.secretarias.create') ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-phone-alt"></i>
                                    <p>
                                        Secretarias
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('admin.secretarias.create') }}"
                                            class="nav-link {{ request()->routeIs('admin.secretarias.create') ? 'active' : '' }}">
                                            <i class="fas fa-plus-circle nav-icon"></i>
                                            <p>Creación de secretaria</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('admin.secretarias.index') }}"
                                            class="nav-link {{ request()->routeIs('admin.secretarias.index') ? 'active' : '' }}">
                                            <i class="fas fa-list nav-icon"></i>
                                            <p>Listado de secretarias</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        @endcan

                        <!-- Pacientes -->
                        @can('admin.pacientes.index')
                            <li
                                class="nav-item {{ request()->routeIs('admin.pacientes.index', 'admin.pacientes.create') ? 'menu-open' : '' }}">
                                <a href="#"
                                    class="nav-link {{ request()->routeIs('admin.pacientes.index', 'admin.pacientes.create') ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-medkit"></i>
                                    <p>
                                        Pacientes
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('admin.pacientes.create') }}"
                                            class="nav-link {{ request()->routeIs('admin.pacientes.create') ? 'active' : '' }}">
                                            <i class="fas fa-plus-circle nav-icon"></i>
                                            <p>Creación de paciente</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('admin.pacientes.index') }}"
                                            class="nav-link {{ request()->routeIs('admin.pacientes.index') ? 'active' : '' }}">
                                            <i class="fas fa-list nav-icon"></i>
                                            <p>Listado de pacientes</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        @endcan

                        <!-- Consultorios -->
                        @can('admin.consultorios.index')
                            <li
                                class="nav-item {{ request()->routeIs('admin.consultorios.index', 'admin.consultorios.create') ? 'menu-open' : '' }}">
                                <a href="#"
                                    class="nav-link {{ request()->routeIs('admin.consultorios.index', 'admin.consultorios.create') ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-clinic-medical"></i>
                                    <p>

                                        Consultorios
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('admin.consultorios.create') }}"
                                            class="nav-link {{ request()->routeIs('admin.consultorios.create') ? 'active' : '' }}">
                                            <i class="fas fa-plus-circle nav-icon"></i>
                                            <p>Creación de consultorio</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('admin.consultorios.index') }}"
                                            class="nav-link {{ request()->routeIs('admin.consultorios.index') ? 'active' : '' }}">
                                            <i class="fas fa-list nav-icon"></i>
                                            <p>Listado de consultorios</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        @endcan

                        <!-- Doctores -->
                        @can('admin.doctores.index')
                            <li
                                class="nav-item {{ request()->routeIs('admin.doctores.index', 'admin.doctores.create', 'admin.doctores.reportes') ? 'menu-open' : '' }}">
                                <a href="#"
                                    class="nav-link {{ request()->routeIs('admin.doctores.index', 'admin.doctores.create', 'admin.doctores.reportes') ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-stethoscope"></i>
                                    <p>

                                        Doctores
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('admin.doctores.create') }}"
                                            class="nav-link {{ request()->routeIs('admin.doctores.create') ? 'active' : '' }}">
                                            <i class="fas fa-plus-circle nav-icon"></i>
                                            <p>Creación de doctor</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('admin.doctores.index') }}"
                                            class="nav-link {{ request()->routeIs('admin.doctores.index') ? 'active' : '' }}">
                                            <i class="fas fa-list nav-icon"></i>
                                            <p>Listado de doctores</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('admin.doctores.reportes') }}"
                                            class="nav-link {{ request()->routeIs('admin.doctores.reportes') ? 'active' : '' }}">
                                            <i class="fas fa-file nav-icon"></i>
                                            <p>Reportes</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        @endcan

                        <!-- Horarios -->
                        @can('admin.horarios.index')
                            <li
                                class="nav-item {{ request()->routeIs('admin.horarios.index', 'admin.horarios.create') ? 'menu-open' : '' }}">
                                <a href="#"
                                    class="nav-link {{ request()->routeIs('admin.horarios.index', 'admin.horarios.create') ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-clock"></i>
                                    <p>

                                        Horarios
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('admin.horarios.create') }}"
                                            class="nav-link {{ request()->routeIs('admin.horarios.create') ? 'active' : '' }}">
                                            <i class="fas fa-plus-circle nav-icon"></i>
                                            <p>Creación de horario</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('admin.horarios.index') }}"
                                            class="nav-link {{ request()->routeIs('admin.horarios.index') ? 'active' : '' }}">
                                            <i class="fas fa-list nav-icon"></i>
                                            <p>Listado de horarios</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        @endcan

                        <!-- Reservas -->
                        @can('admin.usuarios.index')
                            <li class="nav-item {{ request()->routeIs('admin.reservas.reportes') ? 'menu-open' : '' }}">
                                <a href="#"
                                    class="nav-link {{ request()->routeIs('admin.reservas.reportes') ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-calendar"></i>
                                    <p>

                                        Reservas
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('admin.reservas.reportes') }}"
                                            class="nav-link {{ request()->routeIs('admin.reservas.reportes') ? 'active' : '' }}">
                                            <i class="fas fa-file nav-icon"></i>
                                            <p>Reportes</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        @endcan

                        <!-- Historial -->
                        @can('admin.historial.index')
                            <li
                                class="nav-item {{ request()->routeIs('admin.historial.index', 'admin.historial.create', 'admin.historial.show', 'admin.historial.edit', 'admin.historial.paciente') ? 'menu-open' : '' }}">
                                <a href="#"
                                    class="nav-link {{ request()->routeIs('admin.historial.index', 'admin.historial.create', 'admin.historial.show', 'admin.historial.edit', 'admin.historial.paciente') ? 'active' : '' }}">
                                    <i class="nav-icon fas bi bi-file-earmark-medical"></i>
                                    <p>

                                        Historial Clínico
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('admin.historial.index') }}"
                                            class="nav-link {{ request()->routeIs('admin.historial.index') ? 'active' : '' }}">
                                            <i class="fas fa-list nav-icon"></i>
                                            <p>Listado del historial</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('admin.historial.paciente') }}"
                                            class="nav-link {{ request()->routeIs('admin.historial.paciente') ? 'active' : '' }}">
                                            <i class="fas bi bi-heart nav-icon"></i>
                                            <p>Paciente</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        @endcan

                        <!-- Pagos -->
                        @can('admin.pagos.index')
                            <li
                                class="nav-item {{ request()->routeIs('admin.pagos.index', 'admin.pagos.create', 'admin.pagos.show', 'admin.pagos.edit', 'admin.pagos.paciente') ? 'menu-open' : '' }}">
                                <a href="#"
                                    class="nav-link {{ request()->routeIs('admin.pagos.index', 'admin.pagos.create', 'admin.pagos.show', 'admin.pagos.edit', 'admin.pagos.paciente') ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-credit-card"></i>
                                    <p>

                                        Pagos
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('admin.pagos.index') }}"
                                            class="nav-link {{ request()->routeIs('admin.pagos.index') ? 'active' : '' }}">
                                            <i class="fas fa-list nav-icon"></i>
                                            <p>Listado del pagos</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        @endcan


                        <li class="nav-item">
                            <a href="{{ route('logout') }}" class="nav-link bg-danger"
                                onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                <i class="nav-icon fas bi bi-door-closed"></i>
                                <p>
                                    Cerrar sesión
                                </p>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Mensaje Alerta -->
        @if (($message = Session::get('mensaje')) && ($icono = Session::get('icono')))
            <script>
                Swal.fire({
                    position: "center",
                    icon: "{{ $icono }}",
                    title: "{{ $message }}",
                    showConfirmButton: false,
                    timer: 2500
                });
            </script>
        @endif

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <div class="container-fluid">
                @yield('content')
            </div>
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
            <div class="p-3">
                <h5>Title</h5>
                <p>Sidebar content</p>
            </div>
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <!-- To the right -->
            <div class="float-right d-none d-sm-inline">
                Anything you want
            </div>
            <!-- Default to the left -->
            <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights
            reserved.
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- Bootstrap 4 -->
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Datatables -->
    <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>

    <!-- AdminLTE App -->
    <script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
</body>

</html>
