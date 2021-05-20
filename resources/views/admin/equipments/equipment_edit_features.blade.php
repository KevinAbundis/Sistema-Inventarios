@extends('admin.master')

@section('title','Equipment Edit Features')

@section('breadcrumb')
<li class="breadcrumb-item">
    <a href="{{ url('/admin/equipments/all') }}"><i class="fas fa-boxes"></i>   Equipos de Cómputo</a>
</li>

<li class="breadcrumb-item">
    <a href="{{ url('/admin/equipment/'.$cpufeature->id.'/edit/features') }}"><i class="fas fa-edit"></i>    Editar Características de Equipo</a>
</li>
@endsection

@section('content')
<div class="container-fluid">
    <div class="panel shadow">
        <div class="header">
            <h2 class="title"><i class="fas fa-edit"></i>    Editar Características de Equipo</a>
        </div>

        <div class="inside">
            {!!Form::open(['url' => '/admin/equipment/'.$cpufeature->id.'/edit/features', 'files' => true]) !!}
            <div class="row">
                <div class="col-md-4">
                        <label for="Serie_Equipo">Número de Serie: </label>
                            <div class="input-group">
                                    <span class="input-group-text" id="basic-addon1">
                                        <i class="fas fa-keyboard"></i>
                                    </span>
                            {!!Form::text('Serie_Equipo', $cpufeature->Serie_Equipo, ['class' => 'form-control', 'required'])!!}
                        </div>
                </div>

                <div class="col-md-4">
                        <label for="Procesador">Procesador: </label>
                            <div class="input-group">
                                    <span class="input-group-text" id="basic-addon1">
                                        <i class="fas fa-keyboard"></i>
                                    </span>
                            {!!Form::text('Procesador', $cpufeature->Procesador, ['class' => 'form-control'])!!}
                        </div>
                </div>

                <div class="col-md-4">
                        <label for="Velocidad_Procesador">Velocidad Procesador: </label>
                            <div class="input-group">
                                    <span class="input-group-text" id="basic-addon1">
                                        <i class="fas fa-keyboard"></i>
                                    </span>
                                    {!!Form::select('Velocidad_Procesador', [
                                        '2.30 MHz' => '2.30 MHz',
                                        '1.07 GHz' => '1.07 GHz',
                                        '1.14 GHz' => '1.14 GHz',
                                        '1.40 GHz' => '1.40 GHz',
                                        '1.50 GHz' => '1.50 GHz',
                                        '2.0 GHz' => '2.0 GHz',
                                        '2.20 GHz' => '2.20 GHz',
                                        '2.33 GHz' => '2.33 GHz',
                                        '2.40 GHz' => '2.40 GHz',
                                        '2.60 GHz' => '2.60 GHz',
                                        '2.66 GHz' => '2.66 GHz',
                                        '2.80 GHz' => '2.80 GHz',
                                        '3.0 GHz' => '3.0 GHz',
                                        '3.20 GHz' => '3.20 GHz',
                                        '3.60 GHz' => '3.60 GHz',
                                        '3.70 GHz' => '3.70 GHz',
                                        '3.90 GHz' => '3.90 GHz',
                                        ], $cpufeature->Velocidad_Procesador, ['class' => 'form-select'])!!}
                        </div>
                </div>

            </div>

            <div class="row mtop16">
                <div class="col-md-4">
                        <label for="Memoria_RAM">Memoria RAM: </label>
                            <div class="input-group">
                                    <span class="input-group-text" id="basic-addon1">
                                        <i class="fas fa-keyboard"></i>
                                    </span>
                                {!!Form::select('Memoria_RAM', [
                                    '1 GB' => '1 GB',
                                    '2 GB' => '2 GB',
                                    '4 GB' => '4 GB',
                                    '6 GB' => '6 GB',
                                    '8 GB' => '8 GB',
                                    '12 GB' => '12 GB',
                                    '16 GB' => '16 GB',
                                    ], $cpufeature->Memoria_RAM, ['class' => 'form-select'])!!}
                        </div>
                </div>

                <div class="col-md-4">
                    <label for="Capacidad_DiscoDuro">Capacidad DiscoDuro: </label>
                    <div class="input-group">
                        <span class="input-group-text" id="basic-addon1">
                            <i class="fas fa-keyboard"></i>
                        </span>
                        {!!Form::text('Capacidad_DiscoDuro', $cpufeature->Capacidad_DiscoDuro, ['class' => 'form-control'])!!}

                    </div>
                </div>

                <div class="col-md-4">
                    <label for="Sistema_Operativo">Sistema Operativo: </label>
                    <div class="input-group">
                        <span class="input-group-text" id="basic-addon1">
                            <i class="fas fa-keyboard"></i>
                        </span>
                        {!!Form::select('Sistema_Operativo', [
                            'Windows XP' => 'Windows XP',
                            'Windows 7 x86' => 'Windows 7 x86',
                            'Windows 7 x64' => 'Windows 7 x64',
                            'Windows 8 x86' => 'Windows 8 x86',
                            'Windows 8 x64' => 'Windows 8 x64',
                            'Windows 10 x86' => 'Windows 10 x86',
                            'Windows 10 x64' => 'Windows 10 x64',
                            ], $cpufeature->Sistema_Operativo, ['class' => 'form-select'])!!}
                    </div>
                </div>
            </div>

            <div class="row mtop16">
                <div class="col-md-4">
                        <label for="ESET32">ESET32:</label>
                            <div class="input-group">
                                    <span class="input-group-text" id="basic-addon1">
                                        <i class="fas fa-keyboard"></i>
                                    </span>
                            {!!Form::text('ESET32', $cpufeature->ESET32, ['class' => 'form-control'])!!}
                        </div>
                </div>

                <div class="col-md-4">
                    <label for="Office">Office: </label>
                    <div class="input-group">
                        <span class="input-group-text" id="basic-addon1">
                            <i class="fas fa-keyboard"></i>
                        </span>
                        {!!Form::select('Office', [
                            '365' => '365',
                            '2007' => '2007',
                            '2010' => '2010',
                            '2013' => '2013',
                            '2016' => '2016',
                            '2019' => '2019',
                            ], $cpufeature->Office, ['class' => 'form-select'])!!}
                    </div>
                </div>

                <div class="col-md-4">
                    <label for="Service_Tag">Service Tag: </label>
                    <div class="input-group">
                        <span class="input-group-text" id="basic-addon1">
                            <i class="fas fa-keyboard"></i>
                        </span>
                        {!!Form::text('Service_Tag', $cpufeature->Service_Tag, ['class' => 'form-control'])!!}
                    </div>
                </div>
            </div>


        <div class="row mtop16">
                <div class="col-md-4">
                        <label for="Service_Code">Service Code:</label>
                            <div class="input-group">
                                    <span class="input-group-text" id="basic-addon1">
                                        <i class="fas fa-keyboard"></i>
                                    </span>
                            {!!Form::text('Service_Code', $cpufeature->Service_Code, ['class' => 'form-control'])!!}
                        </div>
                </div>

                <div class="col-md-4">
                    <label for="IP">IP: </label>
                    <div class="input-group">
                        <span class="input-group-text" id="basic-addon1">
                            <i class="fas fa-keyboard"></i>
                        </span>
                        {!!Form::text('IP', $cpufeature->IP, ['class' => 'form-control'])!!}

                    </div>
                </div>

                <div class="col-md-4">
                    <label for="Usuario">Usuario: </label>
                    <div class="input-group">
                        <span class="input-group-text" id="basic-addon1">
                            <i class="fas fa-keyboard"></i>
                        </span>
                        {!!Form::text('Usuario', $cpufeature->Usuario, ['class' => 'form-control'])!!}
                    </div>
                </div>
        </div>

            <div class="row mtop16">
                <div class="col-md-4">
                        <label for="Contrasenia_CPU">Contraseña CPU:</label>
                            <div class="input-group">
                                    <span class="input-group-text" id="basic-addon1">
                                        <i class="fas fa-keyboard"></i>
                                    </span>
                            {!!Form::text('Contrasenia_CPU', $cpufeature->Contrasenia_CPU, ['class' => 'form-control'])!!}
                        </div>
                </div>

                <div class="col-md-4">
                    <label for="Remoto">Remoto: </label>
                    <div class="input-group">
                        <span class="input-group-text" id="basic-addon1">
                            <i class="fas fa-keyboard"></i>
                        </span>
                        {!!Form::text('Remoto', $cpufeature->Remoto, ['class' => 'form-control'])!!}

                    </div>
                </div>

                <div class="col-md-4">
                    <label for="Contrasenia_Remoto">Contraseña Remoto: </label>
                    <div class="input-group">
                        <span class="input-group-text" id="basic-addon1">
                            <i class="fas fa-keyboard"></i>
                        </span>
                        {!!Form::text('Contrasenia_Remoto', $cpufeature->Contrasenia_Remoto, ['class' => 'form-control'])!!}
                    </div>
                </div>
            </div>

            <div class="row mtop16">
                <div class="col-md-4">
                        <label for="Serie_Raton">Serie Raton:</label>
                            <div class="input-group">
                                    <span class="input-group-text" id="basic-addon1">
                                        <i class="fas fa-keyboard"></i>
                                    </span>
                            {!!Form::text('Serie_Raton', $cpufeature->Serie_Raton, ['class' => 'form-control'])!!}
                        </div>
                </div>

                <div class="col-md-4">
                    <label for="Serie_Teclado">Serie Teclado: </label>
                    <div class="input-group">
                        <span class="input-group-text" id="basic-addon1">
                            <i class="fas fa-keyboard"></i>
                        </span>
                        {!!Form::text('Serie_Teclado', $cpufeature->Serie_Teclado, ['class' => 'form-control'])!!}

                    </div>
                </div>

                <div class="col-md-4">
                    <label for="Serie_Monitor">Serie Monitor: </label>
                    <div class="input-group">
                        <span class="input-group-text" id="basic-addon1">
                            <i class="fas fa-keyboard"></i>
                        </span>
                        {!!Form::text('Serie_Monitor', $cpufeature->Serie_Monitor, ['class' => 'form-control'])!!}
                    </div>
                </div>
            </div>

            <div class="row mtop32">
                <div class="col-md-12">
                    {!!Form::submit('Actualizar Características de Equipo', ['class' => 'btn btn-primary', 'style' => 'float: right'])!!}
                </div>
            </div>


            {!!Form::close()!!}
        </div>
    </div>

    </div>

</div>
@endsection

