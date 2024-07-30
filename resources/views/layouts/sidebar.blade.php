<div class="sidebar-wrapper" sidebar-layout="stroke-svg">
    <div>
      <div class="logo-wrapper">
        <a href="{{ route('/')}}">
         <h2> KC-PDS</h2>
         <p>Version [{{config('app.kc-pds-version')}}]</p>
      </a>
        <div class="back-btn"><i class="fa fa-angle-left"></i></div>
        <div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="grid"> </i></div>
      </div>
      <div class="logo-icon-wrapper"><a href="{{ route('/')}}"><img class="img-fluid" src="{{ asset('assets/images/logo/logo-icon.png') }}" alt=""></a></div>
      <nav class="sidebar-main">
        <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
        <div id="sidebar-menu">
          <ul class="sidebar-links" id="simple-bar">
            <li class="back-btn">
              <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2" aria-hidden="true"></i></div>
            </li>
            <li class="sidebar"><a class="sidebar-link " href="{{ route('index')}}" >
      
                <i data-feather="home"></i>
                <span>Home</span></a>
            </li>
            <li class="sidebar"><a class="sidebar-link " href="{{ route('print.index')}}" >
              <i data-feather="instagram"></i>
              <span>Captures</span></a>
            </li>
            <li class="sidebar"><a class="sidebar-link " href="{{ route('print.duplicate-capture')}}" >
              <i data-feather="instagram"></i>    
              <span>Duplicate Captures</span></a>
            </li>
            <li class="sidebar"><a class="sidebar-link " href="{{ route('payroll.index')}}">
            <i data-feather="file-minus"></i>
              <span>Payroll </span></a>
              </li>
              <li class="sidebar"><a class="sidebar-link " href="{{ route('print.ny-capture')}}" >
              <i data-feather="instagram"></i>    
              <span>Not Yet Capture</span></a>
            </li>
            <li class="sidebar"><a class="sidebar-link " href="{{ route('print.ny-payroll')}}" >
              <i data-feather="instagram"></i>    
              <span>Not in Payroll</span></a>
            </li>
            <li class="sidebar"><a class="sidebar-link " href="{{ route('print.trash')}}" >
              <i data-feather="trash"></i>    
              <span>Trash Capture</span></a>
            </li>
            <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title" href="#">
                  <i data-feather="list"></i>    
                    <span>Master Records </span></a>
                    <ul class="sidebar-submenu">
                      <li><a href="{{route('lib_modalities.index')}}">Modality</a></li>
                    </ul>
              </li>

              <li class="sidebar"><a class="sidebar-link " href="/api/documentation" target="_blank">
              <i data-feather="layers"></i>
              <span>API Documentation </span></a></li>

              <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title" href="#">
                  <i data-feather="settings"></i>    
                    <span>Settings </span></a>
                    <ul class="sidebar-submenu">
                      <li><a href="{{route('database.index')}}">Database Settings</a></li>
                    </ul>
              </li>

          </ul>
        </div>
        <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
      </nav>
    </div>
  </div>