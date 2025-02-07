<!DOCTYPE html>
<html >

  <x-head/>
  @stack('css')
   <style type="text/css">
     #laravel-notify .notify {
    z-index: +9999999999 !important;
}
   </style>

<body>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
       <x-header/>

      <div class="main-sidebar sidebar-style-2">
          <x-aside/>

       
      </div>

      <!-- Main Content -->
      <div class="main-content">
          @yield('content')
           <x-notify::notify />
        
      </div>
     
    </div>
  </div>

  <!-- General JS Scripts -->
   <x-footer/>
   @stack('js')

     @notifyJs

</body>
</html>