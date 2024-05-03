        <!-- 
        expose component model to current view
        e.g $arrDataFromDb = $comp_model->fetchData(); //function name
        -->
        @inject('comp_model', 'App\Models\ComponentsData')
        <?php 
            $pageTitle = "Megayapa"; // set page title
        ?>
        @extends($layout)
        @section('title', $pageTitle)
        @section('content')
        <div>
            <div  class="mb-3" >
                <div class="container-fluid">
                    <div class="row justify-content-center">
                        <div class="col col-sm-6 col-md-3 col-lg-3 comp-grid " >
                            <div class=" card-7 mt-5 bg-light"><div class="h4 fw-bold text-primary text-center">
                                <img src="{{ asset('images/logo.png') }}" width="30px" height="50px" class="img-fluid rounded-circle" /> 
                                Inicio de sesión de usuario
                            </div>
                        </div>
                        <div  class="card card-7 page-content" >
                            
                            <div>
                                @if($errors->any())
                                <div class="alert alert-danger animated bounce">{{ $errors->first() }}</div>
                                @endif
                                <form name="loginForm" action="{{ route('auth.login') }}" class="needs-validation form page-form" method="post">
                                    @csrf
                                    <div class="input-group form-group">
                                        <input placeholder="Nombre de usuario o correo electrónico" name="username"  required="required" class="form-control" type="text"  />
                                        <span class="input-group-text"><i class="form-control-feedback material-icons">account_circle</i></span>
                                    </div>
                                    <div class="input-group form-group">
                                        
                                        <input  placeholder="Contraseña" required="required" name="password" class="form-control " type="password" />
                                        <span class="input-group-text"><i class="form-control-feedback material-icons">lock</i></span>
                                    </div>
                                    <div class="row clearfix mt-3 mb-3">
                                        <div class="col-6">
                                            <label class="">
                                            <input value="true" type="checkbox" name="rememberme" />
                                            Recuérdame
                                            </label>
                                        </div>
                                        <div class="col-6">
                                            <a href="{{ route('password.forgotpassword') }}" class="text-danger"> Restablecer la contraseña</a>
                                        </div>
                                    </div>
                                    <div class="form-group text-center">
                                        <button class="btn btn-primary btn-block btn-md" type="submit"> 
                                        <i class="load-indicator">
                                        <clip-loader :loading="loading" color="#fff" size="20px"></clip-loader> 
                                        </i>
                                        Iniciar sesión <i class="material-icons">lock_open</i>
                                        </button>
                                    </div>
                                </form>
                            </div>
                            
                        </div>
                        <div class=" card-7">                                   <div class="text-center">
                            ¿No tienes una cuenta? <a href="{{ route('auth.register') }}" class="btn btn-success">Registro
                            <i class="material-icons">account_box</i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<!-- Page custom css -->
@section('pagecss')
<style>
<style></style>
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
