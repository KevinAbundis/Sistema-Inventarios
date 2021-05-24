<div class="sidebar shadow">
	<div class="section-top">
		<div class="logo">
			{{-- <img src="{{ url('static/images/chevrolet.png') }}" class="img-fluid">
			<h6>CHEVROLET</h6> --}}
			<img src="{{ url('static/images/chevrolet-trans.png') }}" class="img-fluid img1">
			<img src="{{ url('static/images/buick-trans.png') }}" class="img-fluid img2">
			<img src="{{ url('static/images/gmc-trans.png') }}" class="img-fluid img3">
			{{-- <h6>NOM_PROYEC</h6> --}}

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
			@if(kvfj(Auth::user()->permissions, 'equipment_list'))
			<li>
				<a href="{{ url('/admin/equipments/all') }}" class="lk-equipment_list lk-equipment_add lk-equipment_edit lk-equipment_delete lk-equipment_output">
					<i class="fas fa-boxes"></i>Equipos de Cómputo</a>
			</li>
			@endif
			@if(kvfj(Auth::user()->permissions, 'repair_list'))
			<li>
				<a href="{{ url('/admin/repairs/all') }}" class="lk-repair_list lk-repair_output lk-repair_edit">
					<i class="fas fa-tools"></i>Reparación de Equipos de Cómputo</a>
			</li>
			@endif
			@if(kvfj(Auth::user()->permissions, 'maintenance_list'))
			<li>
				<a href="{{ url('/admin/maintenances/all') }}" class="lk-maintenance_list lk-maintenance_program lk-maintenance_edit">
					<i class="fas fa-toolbox"></i>Mantenimiento de Equipos de Cómputo</a>
			</li>
			@endif
			@if(kvfj(Auth::user()->permissions, 'reports_home'))
			<li>
				<a href="{{ url('/admin/reports/home') }}" class="lk-reports_home">
					<i class="fas fa-file-contract"></i>Reportes</a>
			</li>
			@endif
		</ul>
	</div>
</div>