<div class="col-12 col-md-6 order-md-2 order-first">
    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                Halo,
                @if(Auth::check())
                    {{ Auth::user()->nama }}
                @else
                    Guest 
                @endif
            </li>
        </ol>
    </nav>
</div>
