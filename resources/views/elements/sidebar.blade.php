<!--**********************************Sidebar start***********************************-->
<div class="deznav">
    <div class="deznav-scroll">
        <ul class="metismenu" id="menu">
            {{-- @if(!(Auth::user()->inRole('admin')))
            @endif --}}
            <li>
                <a href="{{ route('home')}}" aria-expanded="false">
                    <i class="flaticon-381-networking"></i>
                    <span class="nav-text">Dashboard</span>
                </a>
            </li>
            @php 
                $userParentList  = '';
                $userChildList    = '';
                $UserArr = ['user', 'user-add', 'user-edit'];
                if(in_array(Route::currentRouteName(), $UserArr)){
                    $userParentList  = 'active';
                    $userChildList    = 'show';
                }
            @endphp

            @if(Gate::check('user'))
                <li>
                    <a class="has-arrow ai-icon{{ $userParentList }}" href="javascript:void()" aria-expanded="false">
                        <i class="flaticon-381-user"></i>
                        <span class="nav-text">Users</span>
                    </a>
                    <ul aria-expanded="false" class="{{ $userChildList }}">
                        @can('user')
                            <li><a href="{{ route('user')}}">List of Users</a></li>
                        @endcan
                    </ul>
                </li>
            @endif

            @php 
                $storeParent  = '';
                $storeChild    = '';
                $SystemArr = ['store', 'store-add', 'store-edit'];
                if(in_array(Route::currentRouteName(), $SystemArr)){
                    $storeParent  = 'active';
                    $storeChild    = 'show';
                }
            @endphp

            @if(Gate::check('store'))
                <li>
                    <a class="has-arrow ai-icon {{$storeParent}}" href="javascript:void()" aria-expanded="false">
                        <i class="la la-store"></i>
                        <span class="nav-text">Stores</span>
                    </a>
                    <ul aria-expanded="false" class="{{$storeChild}}">
                        @can('store')
                            <li><a href="{{ route('store')}}">List of Restaurants</a></li>
                        @endcan
                    </ul>
                </li>
            @endif

            @php 
                $roleParent  = '';
                $roleChild    = '';
                $SystemArr = ['role', 'role-add', 'role-edit'];
                if(in_array(Route::currentRouteName(), $SystemArr)){
                    $roleParent  = 'active';
                    $roleChild    = 'show';
                }
            @endphp

            @if(Gate::check('role'))
                <li>
                    <a class="has-arrow ai-icon {{$roleParent}}" href="javascript:void()" aria-expanded="false">
                        <i class="flaticon-381-layer-1"></i>
                        <span class="nav-text">Groups</span>
                    </a>
                    <ul aria-expanded="false" class="{{$roleChild }}">
                        @can('role')
                            <li><a href="{{route('role')}}">Add groups </a></li>
                        @endcan
                    </ul>
                </li>
            @endif

            @php 
                $tableParent  = '';
                $tableChild    = '';
                $SystemArr = ['table', 'table-add', 'table-edit'];
                if(in_array(Route::currentRouteName(), $SystemArr)){
                    $tableParent  = 'active';
                    $tableChild    = 'show';
                }
            @endphp
            
            @if(Gate::check('table'))
                <li>
                    <a class="has-arrow ai-icon {{$tableParent}}" href="javascript:void()" aria-expanded="false">
                        <i class="flaticon-381-network"></i>
                        <span class="nav-text">Tables</span>
                    </a>
                    <ul aria-expanded="false" class="{{$tableChild}}">
                        @can('table')
                            <li><a href="{{ route('table')}}">Manages Tables </a></li>
                        @endcan
                    </ul>
                </li>
            @endif
            
            @php 
                $categoryParent  = '';
                $categoryChild    = '';
                $SystemArr = ['category', 'category-add', 'category-edit'];
                if(in_array(Route::currentRouteName(), $SystemArr)){
                    $categoryParent  = 'active';
                    $categoryChild    = 'show';
                }
            @endphp
            
            @if(Gate::check('category'))
                <li>
                    <a class="has-arrow ai-icon {{$categoryChild}}" href="javascript:void()" aria-expanded="false">
                        <i class="flaticon-381-layer-1"></i>
                        <span class="nav-text">Category</span>
                    </a>
                    <ul aria-expanded="false" class="{{$categoryChild}}">
                        @can('category')
                            <li><a href="{{ route('category')}}">Manage Category </a></li>
                        @endcan
                    </ul>
                </li>
            @endif
            
            @php 
                $menuParent  = '';
                $menuChild    = '';
                $SystemArr = ['menu', 'menu-add', 'menu-edit'];
                if(in_array(Route::currentRouteName(), $SystemArr)){
                    $menuParent  = 'active';
                    $menuChild    = 'show';
                }
            @endphp
            
            @if(Gate::check('menu'))
                <li>
                    <a class="has-arrow ai-icon {{$menuParent}}" href="javascript:void()" aria-expanded="false">
                        <i class="flaticon-381-networking"></i>
                        <span class="nav-text">Products</span>
                    </a>
                    <ul aria-expanded="false" class="{{$menuChild }}">
                        @can('menu')
                            <li><a href="{{ route('menu')}}">Products</a></li>
                        @endcan
                    </ul>
                </li>
            @endif

            <li>
                <a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-381-networking"></i>
                    <span class="nav-text">Orders</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="#">List of Orders</a></li>
                </ul>
            </li>

            <li>
                <a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-381-controls-3"></i>
                    <span class="nav-text">Payments</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="#">Payments</a></li>
                </ul>
            </li>

            {{-- <li>
                <a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-381-layer-1"></i>
                    <span class="nav-text">Authentication</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="page-register.html">Register</a></li>
                    <li><a href="login.php">Login</a></li>
                </ul>
            </li> --}}

        </ul>
    </div>
</div>
<!--**********************************Sidebar end***********************************-->


		