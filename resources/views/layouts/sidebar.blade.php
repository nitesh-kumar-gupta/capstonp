@section('sidebar')
<div class="sidebar" data-color="green" data-image="{{asset('images/sidebarBg.jpg') }}">
    <div class="logo hidden-xs hidden-sm">
        <a href="{{ route('home') }}" class="simple-text">Logo</a>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="{{ Request::path() == 'home' ? 'active' : '' }}">
                <a href="{{ route('home') }}">
                    <i class="material-icons">home</i>
                    <p>Home</p>
                </a>
            </li>
            <li class="{{ Request::path() == 'profile' ? 'active' : '' }}">
                <a href="{{ route('profile') }}">
                    <i class="material-icons">person</i>
                    <p>My Profile</p>
                </a>
            </li>
			<li class="{{ Request::path() == 'quotes' ? 'active' : '' }}">
				<a href="{{ route('quotes') }}">
					<i class="material-icons">record_voice_over</i>
					<p>Quotes</p>
				</a>
			</li>
        </ul>
    </div>
</div>
@section('sidebar')