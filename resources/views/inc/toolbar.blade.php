<div class="toolbar" id="kt_toolbar">
    <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
        <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1 ml-10">
            @if( @$breadcrump )
                @php
                    $numItems = count($breadcrump);
                    $i = 0;
                @endphp
                @foreach( @$breadcrump as $key => $value )
                    <li class="breadcrumb-item text-muted">
                        <a href="{{ route($key) }}" class="{{ (request()->route()->getName() == $key )?" ": " text-muted"  }} text-hover-primary">
                            {{ $value }}
                        </a>
                    </li>

                    @if( ++$i != $numItems )
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-300 w-5px h-2px"></span>
                        </li>
                    @endif

                @endforeach
            @endif
            {{--  <li class="breadcrumb-item text-muted">
                <a href="{{ route('store') }}" class="text-muted text-hover-primary">
                    Home
                </a>
            </li>
            <li class="breadcrumb-item">
                <span class="bullet bg-gray-300 w-5px h-2px"></span>
            </li>
            <li class="breadcrumb-item text-muted">
                <a href="{{ route('dashbord') }}"> Dashbord</a>
            </li>
            <li class="breadcrumb-item">
                <span class="bullet bg-gray-300 w-5px h-2px"></span>
            </li>
            <li class="breadcrumb-item text-muted">
                <a href="{{ route('customer') }}">
                    Customers Listing
                </a>
            </li  --}}
        </ul>
        <div data-kt-swapper="true" data-kt-swapper-mode="prepend"
            data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
            class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
            <h1 class="d-flex text-dark fw-bolder fs-3 align-items-center my-1">{{ @$name }}
                <span class="h-20px border-1 border-gray-200 border-start ms-3 mx-2 me-1"></span>
            </h1>
        </div>
    </div>
</div>
