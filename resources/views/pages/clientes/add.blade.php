<!-- 
expose component model to current view
e.g $arrDataFromDb = $comp_model->fetchData(); //function name
-->

@inject('comp_model', 'App\Models\ComponentsData')
<?php
    $pageTitle = "Agregar carga"; //set dynamic page title
?>
@extends($layout)
@section('title', $pageTitle)
@section('content')
<section class="page" data-page-type="add" data-page-url="{{ url()->full() }}">
    <?php
        if( $show_header == true ){
    ?>
    <div  class="bg-light p-3 mb-3" >
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col-auto  back-btn-col" >
                    <a class="back-btn btn " href="{{ url()->previous() }}" >
                        <i class="material-icons">arrow_back</i>                                
                    </a>
                </div>
                <div class="col  " >
                    <div class="">
                        <div class="h5 font-weight-bold text-primary">Nueva carga</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
        }
    ?>
    <div  class="" >
        <div class="container">
            <div class="row ">
                <div class="col-md-9 comp-grid " >
                    <div  class="card card-1 border rounded page-content" >
                        <!--[form-start]-->
                        <form id="clientes-add-form" role="form" novalidate enctype="multipart/form-data" class="form page-form form-horizontal needs-validation" action="{{ route('clientes.store') }}" method="post">
                            @csrf
                            <div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="nombre">Nombre </label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-nombre-holder" class=" ">
                                                <input id="ctrl-nombre" data-field="nombre"  value="<?php echo get_value('nombre') ?>" type="text" placeholder="Escribir Nombre"  name="nombre"  class="form-control " />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                               <div class="form-group">
    <div class="row">
        <div class="col-sm-4">
            <label class="control-label" for="telefono">Número de Celular <span class="text-danger">*</span></label>
        </div>
        <div class="col-sm-8">
            <div id="ctrl-telefono-holder" class="">
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-mobile-alt"></i></span>
                    <input id="ctrl-telefono" data-field="telefono" value="<?php echo get_value('telefono') ?>" type="text" placeholder="Escribir Teléfono" required="" name="telefono" class="form-control" />
                </div>
            </div>
        </div>
    </div>
</div>

                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="empresa">Elija la Empresa <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-empresa-holder" class=" ">
                                                <select required=""  id="ctrl-empresa" data-field="empresa" name="empresa"  placeholder="Seleccione un valor"    class="form-select" >
                                                <option value="">Seleccionar</option>
                                                <?php
                                                    $options = Menu::empresa();
                                                    if(!empty($options)){
                                                    foreach($options as $option){
                                                    $value = $option['value'];
                                                    $label = $option['label'];
                                                    $selected = Html::get_field_selected('empresa', $value, "");
                                                ?>
                                                <option <?php echo $selected ?> value="<?php echo $value ?>">
                                                <?php echo $label ?>
                                                </option>                                   
                                                <?php
                                                    }
                                                    }
                                                ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <!--    <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="correo">Correo </label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-correo-holder" class=" ">
                                                <input id="ctrl-correo" data-field="correo"  value="<?php echo get_value('correo', "NULL") ?>" type="text" placeholder="Escribir Correo"  name="correo"  class="form-control " />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="direccion">Direccion </label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-direccion-holder" class=" ">
                                                <input id="ctrl-direccion" data-field="direccion"  value="<?php echo get_value('direccion', "NULL") ?>" type="text" placeholder="Escribir Direccion"  name="direccion"  class="form-control " />
                                            </div>
                                        </div>
                                    </div>
                                </div>-->
                              <div class="form-group">
    <div class="row">
        <div class="col-sm-4">
            <label class="control-label" for="monto">Monto <span class="text-danger">*</span></label>
        </div>
        <div class="col-sm-8">
            <div id="ctrl-monto-holder" class="">
                <select id="ctrl-monto" data-field="monto" required="" name="monto" class="form-control">
                    <option value="10">10</option>
                    <option value="20">20</option>
                    <option value="30">30</option>
                </select>
            </div>
        </div>
    </div>
</div>

                                <div class="form-group">
    <div class="row">
        <div class="col-sm-4">
            <label class="control-label" for="fechacarga">Fecha de carga <span class="text-danger">*</span></label>
        </div>
        <div class="col-sm-8">
            <div id="ctrl-fechacarga-holder" class="input-group">
                <input id="ctrl-fechacarga" data-field="fechacarga" class="form-control datepicker datepicker" required="" value="" type="datetime" name="fechacarga" placeholder="Escribir Fechacarga" data-enable-time="true" data-min-date="" data-max-date="" data-date-format="Y-m-d H:i:S" data-alt-format="F j, Y - H:i" data-inline="false" data-no-calendar="false" data-mode="single" />
                <span class="input-group-text"><i class="material-icons">date_range</i></span>
            </div>
        </div>
    </div>
</div>

<script>
    // Obtener el elemento de entrada de fecha y hora
    var fechacargaInput = document.getElementById('ctrl-fechacarga');

    // Obtener la fecha y hora actual
    var fechaHoraActual = new Date();

    // Formatear la fecha y hora actual según el formato esperado (Y-m-d H:i:S)
    var fechaHoraFormateada = fechaHoraActual.toISOString().slice(0, 19).replace('T', ' ');

    // Asignar la fecha y hora actual al valor del campo de entrada
    fechacargaInput.value = fechaHoraFormateada;
</script>
<div class="form-group">
    <div class="row">
        <div class="col-sm-4">
            <label class="control-label" for="usuario">Usuario <span class="text-danger">*</span></label>
        </div>
        <div class="col-sm-8">
            <div id="ctrl-usuario-holder" class="">
                <input id="ctrl-usuario" data-field="usuario" value="<?php echo $user->UserName(); ?>" type="text" placeholder="Escribir Usuario" required="" name="usuario" class="form-control" readonly />
            </div>
        </div>
    </div>
</div>

                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="estado">Estado </label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-estado-holder" class=" ">
                                                <input id="ctrl-estado" data-field="estado"  value="<?php echo get_value('estado', "V") ?>" type="text" placeholder="Escribir Estado"  name="estado"  class="form-control " />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-ajax-status"></div>
                            <!--[form-button-start]-->
                            <div class="form-group form-submit-btn-holder text-center mt-3">
                                <button class="btn btn-primary" type="submit">
                           				Realizar MegaYapa
                                <i class="material-icons">send</i>
                                </button>
                            </div>
                            <!--[form-button-end]-->
                        </form>
                        <!--[form-end]-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
<!-- Page custom css -->
@section('pagecss')
<style>

</style>
@endsection
<!-- Page custom js -->
@section('pagejs')
<script>
    
$(document).ready(function(){
	// custom javascript | jquery codes
});

</script>
@endsection
