welcome page
@if(Auth::user())
    Halo {{ Auth::user()->roles->first()->name }}
@else
    Halo Guest
@endif