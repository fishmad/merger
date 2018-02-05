<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="shortcut icon" href="{{ asset('img/favicon.png') }}">
  <title>iConform Worker Safety &amp; Compliance Management System</title>
  <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
  <link href="{{ asset('css/simple-line-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('css/style.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/custom.css') }}">  
</head>

<body class="app header-fixed sidebar-fixed aside-menu-fixed aside-menu-hidden">
  @include('_partials.coreui.navbar')
  
  <div class="app-body">
    @include('_partials.coreui.sidebar')
	
    <main class="main">
      @include('_partials.coreui.breadcrumb')
	  
      @yield('content')
    </main>

    @include('_partials.coreui.asidemenu')
  </div>

  @include('_partials.coreui.footer')

  @include('_partials.coreui.scripts')
  
  @yield('myscript')

  <!-- BODY options, add following classes to body to change options
  '.header-fixed' - Fixed Header
  '.brand-minimized' - Minimized brand (Only symbol)
  '.sidebar-fixed' - Fixed Sidebar
  '.sidebar-hidden' - Hidden Sidebar
  '.sidebar-off-canvas' - Off Canvas Sidebar
  '.sidebar-minimized'- Minimized Sidebar (Only icons)
  '.sidebar-compact'    - Compact Sidebar
  '.aside-menu-fixed' - Fixed Aside Menu
  '.aside-menu-hidden'- Hidden Aside Menu
  '.aside-menu-off-canvas' - Off Canvas Aside Menu
  '.breadcrumb-fixed'- Fixed Breadcrumb
  '.footer-fixed'- Fixed footer
  -->

  </body>
</html>