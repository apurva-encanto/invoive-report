 <nav class="sidebar sidebar-offcanvas " id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="{{url('/dashboard')}}">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          @if(auth()->user()->invoice=='1')

          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <i class="icon-layout menu-icon"></i>
              <span class="menu-title">Invoices</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"><a class="nav-link" href="{{ url('/create-invoice') }}">Create Invoice</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ url('/manage-invoice') }}">Manage Invoice</a></li>
                {{-- <li class="nav-item"> <a class="nav-link" href="pages/ui-features/typography.html">Download CSV</a></li> --}}
              </ul>
            </div>
          </li>
          @endif
          @if(auth()->user()->project=='1')

          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#form-elements" aria-expanded="false" aria-controls="form-elements">
              <i class="icon-columns menu-icon"></i>
              <span class="menu-title">Projects</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="form-elements">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"><a class="nav-link" href="{{url('add-project')}}">Add Projects</a></li>
                <li class="nav-item"><a class="nav-link" href="{{url('manage-project')}}">Manage Projects</a></li>
              </ul>
            </div>
          </li>
          @endif
          @if(auth()->user()->customer=='1')
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#charts" aria-expanded="false" aria-controls="charts">
              <i class="ti-user menu-icon"></i>
              <span class="menu-title">Customer</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="charts">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{url('add-customer')}}">Add Customer</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{url('manage-customer')}}">Manage Customer</a></li>
              </ul>
            </div>
          </li>
          @endif
          @if(auth()->user()->access=='1')
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#tables" aria-expanded="false" aria-controls="tables">
              <i class="ti-file menu-icon"></i>
              <span class="menu-title">System User</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="tables">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{url('add-user')}}">Create User</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{url('manage-user')}}">Manager User</a></li>
              </ul>
            </div>
          </li>
            <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#management" aria-expanded="false" aria-controls="tables">
              <i class="ti-file menu-icon"></i>
              <span class="menu-title">Management</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="management">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{url('manage-department')}}">Department</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{url('manage-country')}}">Country</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{url('manage-currency')}}">Currency</a></li>
              </ul>
            </div>
          </li>
          @endif

          <li class="nav-item">
            <a class="nav-link" href="{{url('setting')}}">
              <i class="ti-settings menu-icon"></i>
              <span class="menu-title">Settings</span>
            </a>
          </li>


        </ul>
        <div class="text-center">

          <button type="button" class="btn btn-info w-75" data-toggle="modal" data-target="#myModal">
         Logout
        </button>
        <!-- Modal -->


        </div>
      </nav>

<!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Are you sure?</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
       You will be logged out of the system!
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
           <a href="{{ url('/logout')}}" class="btn btn-info">Save changes</a>

      </div>

    </div>
  </div>
</div>

