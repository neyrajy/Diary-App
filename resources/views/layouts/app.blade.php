<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>KJDA</title>
    <link rel="icon" type="image/x-icon" href="favicon.ico">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Henny+Penny&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=ABeeZee:ital@0;1&display=swap" rel="stylesheet">
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        @include('layouts.navigation')

        <!-- Page Heading -->
        @if (isset($header))
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif

        <!-- Page Content -->
        <main>
            <!-- Sidebar Section -->
            <section id="sidebar">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-2 sidebar">
                            @if(Auth::check())
                                @if(Auth::user()->role_id == 1)
                                    <a href="{{ route('superadmin.dashboard') }}"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
                                    <a href="{{ route('superadmin.parents') }}"><i class="fas fa-user-friends"></i> Parents</a>
                                    <a href="{{ route('superadmin.teachers') }}"><i class="fas fa-chalkboard-teacher"></i> Teachers</a>
                                    <a href="{{ route('superadmin.staff') }}"><i class="fas fa-user-tie"></i> Staff</a>
                                    <a href="{{ route('superadmin.users') }}"><i class="fa fa-users"></i> Users</a>
                                    <a href="{{ route('superadmin.students') }}"><i class="fas fa-user-graduate"></i> Students</a>
                                    <a href="{{ route('classes.index') }}"><i class="fas fa-chalkboard-teacher"></i> Classes</a>
                                    <a href="{{ route('sections.index') }}"><i class="fas fa-chalkboard-teacher"></i> Sections</a>
                                    <a href="{{ route('superadmin.drivers') }}"><i class="fas fa-bus"></i> Drivers</a>
                                    <a href="{{ route('superadmin.events') }}"><i class="fas fa-calendar-alt"></i> Events</a>
                                    <a href="{{ route('superadmin.notifications') }}"><i class="fas fa-bell"></i> Notifications</a>
                                    <a href="{{ route('superadmin.fees') }}"><i class="fas fa-dollar-sign"></i> Fees</a>
                                @elseif(Auth::user()->role_id == 2)
                                    <a href="{{ route('admin.dashboard') }}"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
                                    <a href="{{ route('superadmin.parents') }}"><i class="fas fa-user-friends"></i> Parents</a>
                                    <a href="{{ route('superadmin.teachers') }}"><i class="fas fa-chalkboard-teacher"></i> Teachers</a>
                                    <a href="{{ route('superadmin.staff') }}"><i class="fas fa-users"></i> Staff</a>
                                    <a href="{{ route('superadmin.students') }}"><i class="fas fa-user-graduate"></i> Students</a>
                                    <a href="{{ route('superadmin.drivers') }}"><i class="fas fa-bus"></i> Drivers</a>
                                    <a href="{{ route('superadmin.events') }}"><i class="fas fa-calendar-alt"></i> Events</a>
                                    <a href="{{ route('superadmin.notifications') }}"><i class="fas fa-bell"></i> Notifications</a>
                                    <a href="{{ route('superadmin.fees') }}"><i class="fas fa-dollar-sign"></i> Fees</a>
                                @elseif(Auth::user()->role_id == 3)
                                    <a href="{{ route('manager.dashboard') }}"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
                                    <a href="{{ route('manager.parents') }}"><i class="fas fa-user-friends"></i> Parents</a>
                                    <a href="{{ route('manager.teachers') }}"><i class="fas fa-chalkboard-teacher"></i> Teachers</a>
                                    <a href="{{ route('manager.staff') }}"><i class="fas fa-users"></i> Staff</a>
                                    <a href="{{ route('manager.students') }}"><i class="fas fa-user-graduate"></i> Students</a>
                                    <a href="{{ route('manager.drivers') }}"><i class="fas fa-bus"></i> Drivers</a>
                                    <a href="{{ route('manager.events') }}"><i class="fas fa-calendar-alt"></i> Events</a>
                                    <a href="{{ route('manager.notifications') }}"><i class="fas fa-bell"></i> Notifications</a>
                                    <a href="{{ route('manager.fees') }}"><i class="fas fa-dollar-sign"></i> Fees</a>
                                @elseif(Auth::user()->role_id == 4)
                                    <a href="{{ route('parent.dashboard') }}"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
                                    <a href="{{ route('parent.drivers') }}"><i class="fas fa-bus"></i> Drivers</a>
                                    <a href="{{ route('parent.fees') }}"><i class="fas fa-dollar-sign"></i> Fees</a>
                                    <a href="{{ route('parent.events') }}"><i class="fas fa-calendar-alt"></i> Events</a>
                                    <a href="{{ route('parent.messages') }}"><i class="fa fa-comments"></i> Messages</a>
                                    <a href="{{ route('parent.notifications') }}"><i class="fas fa-bell"></i> Notifications</a>
                                @elseif(Auth::user()->role_id == 5)
                                    <a href="{{ route('teacher.dashboard') }}"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
                                    <a href="{{ route('teacher.notifications') }}"><i class="fas fa-bell"></i> Notification</a>
                                    <a href="{{ route('teacher.message') }}"><i class="fas fa-comments"></i> Messages</a>
                                    <a href="{{ route('teacher.events') }}"><i class="fas fa-calendar-alt"></i> Events</a>
                                    <a href="{{ route('teacher.students') }}"><i class="fas fa-user-graduate"></i> Students</a>
                                    <a href="{{ route('teacher.attendance') }}"><i class="fas fa-user-check"></i> Attendance</a>
                                    <form action="/logout" method="POST">
                                        @csrf
                                        <button type="submit" style="color:#FFF;"><i class="fa fa-sign-out"></i> Sign Out</button>
                                    </form>
                                @elseif(Auth::user()->role_id == 6)
                                    <a href="{{ route('driver.dashboard') }}"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
                                    <a href="{{ route('driver.notifications') }}"><i class="fas fa-bell"></i> Notifications</a>
                                    <a href="{{ route('driver.events') }}"><i class="fas fa-calendar-alt"></i> Events</a>
                                    <a href="{{ route('driver.students') }}"><i class="fas fa-user-graduate"></i> Students</a>
                                @elseif(Auth::user()->role_id == 7)
                                    <a href="{{ route('staff.dashboard') }}"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
                                    <a href="{{ route('staff.notifications') }}"><i class="fas fa-bell"></i> Notifications</a>
                                    <a href="{{ route('staff.events') }}"><i class="fas fa-calendar-alt"></i> Events</a>
                                @endif
                            @endif
                        </div>

                        <div class="col-md-10">
                            @yield('content')
                        </div>
                    </div>
                </div>
            </section>
        </main>
    </div>
      <!-- Bootstrap JS, jQuery, Popper.js -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <!-- Font Awesome JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"></script>
  
  
</body>
</html>
