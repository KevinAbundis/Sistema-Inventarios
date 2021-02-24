<div class="sidebar shadow">
	<div class="section-top">
		<div class="logo">
			<img src="{{ url('static/images/chevrolet.png') }}" class="img-fluid">
			<h6>CHEVROLET</h6>
		</div>
		{{-- <div class="user mtop16">
			<span class="subtitle">Bienvenido:</span>
			<div class="name">
				{{ Auth::user()->name }}	{{ Auth::user()->lastname }}
				<a href="{{ url('/logout') }}" data-toggle="tooltip" data-placement="top" title="Cerrar Sesión">
					<i class="fas fa-sign-out-alt"></i>
				</a>
			</div>
			<div class="email">{{ Auth::user()->email }}</div>
		</div> --}}
	</div>

	<div class="main">
		<ul>
			@if(kvfj(Auth::user()->permissions, 'dashboard'))
			<li>
				<a href="{{ url('/admin') }}" class="lk-dashboard"><i class="fas fa-home"></i>Inicio</a>
			</li>
			@endif
			@if(kvfj(Auth::user()->permissions, 'user_list'))
			<li>
				<a href="{{ url('/admin/users/all') }}" class="lk-user_list lk-user_add lk-user_edit lk-user_search lk-account_edit lk-user_permissions"><i class="fas fa-user-friends"></i>Usuarios</a>
			</li>
			@endif
		</ul>
	</div>
</div>