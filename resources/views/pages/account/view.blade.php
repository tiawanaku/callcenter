<!-- 
expose component model to current view
e.g $arrDataFromDb = $comp_model->fetchData(); //function name
-->
@inject('comp_model', 'App\Models\ComponentsData')
<?php
    //check if current user role is allowed access to the pages
    $can_add = $user->canAccess("accounts/add");
    $can_edit = $user->canAccess("accounts/edit");
    $can_view = $user->canAccess("accounts/view");
    $can_delete = $user->canAccess("accounts/delete");
    $pageTitle = "Mi cuenta"; //set dynamic page title
?>
@extends($layout)
@section('title', $pageTitle)
@section('content')
<section class="page" data-page-type="view" data-page-url="{{ url()->full() }}">
    <div  class="" >
        <div class="container">
            <div class="row ">
                <div class="col comp-grid " >
                    <div  class=" page-content" >
                        <?php
                            if($data){
                            $rec_id = ($data['id'] ? urlencode($data['id']) : null);
                        ?>
                        <div class="bg-primary m-2 mb-4">
                            <div class="profile">
                                <div class="avatar">
                                    <?php 
                                        $user_photo = $user->UserPhoto();
                                        if($user_photo){
                                        Html::page_img($user_photo, 100, 100, "small", "large"); 
                                        }
                                    ?>
                                </div>
                                <h1 class="title mt-4"><?php echo $data['user_name']; ?></h1>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="mx-3 mb-3">
                                    <ul class="nav nav-pills flex-column text-left">
                                        <li class="nav-item">
                                            <a data-bs-toggle="tab" href="#AccountPageView" class="nav-link active">
                                                <i class="material-icons">account_box</i> Detalle de cuenta
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a data-bs-toggle="tab" href="#AccountPageEdit" class="nav-link">
                                                <i class="material-icons">edit</i> Editar cuenta
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a data-bs-toggle="tab" href="#AccountPageChangePassword" class="nav-link">
                                                <i class="material-icons">lock</i> Cambia la contraseña
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-sm-9">
                                <div class="mb-3">
                                    <div class="tab-content">
                                        <div class="tab-pane show active fade" id="AccountPageView" role="tabpanel">
                                            <div class="page-data">
                                                <!--PageComponentStart-->
                                                <div class="mb-3 row row justify-content-start g-0">
                                                    <div class="col-12">
                                                        <div class="bg-light mb-1 card-1 p-2 border rounded">
                                                            <div class="row align-items-center">
                                                                <div class="col">
                                                                    <small class="text-muted">Id</small>
                                                                    <div class="fw-bold">
                                                                        <?php echo  $data['id'] ; ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="bg-light mb-1 card-1 p-2 border rounded">
                                                            <div class="row align-items-center">
                                                                <div class="col">
                                                                    <small class="text-muted">User Name</small>
                                                                    <div class="fw-bold">
                                                                        <?php echo  $data['user_name'] ; ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="bg-light mb-1 card-1 p-2 border rounded">
                                                            <div class="row align-items-center">
                                                                <div class="col">
                                                                    <small class="text-muted">Email</small>
                                                                    <div class="fw-bold">
                                                                        <?php echo  $data['email'] ; ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="bg-light mb-1 card-1 p-2 border rounded">
                                                            <div class="row align-items-center">
                                                                <div class="col">
                                                                    <small class="text-muted">Telefono</small>
                                                                    <div class="fw-bold">
                                                                        <?php echo  $data['telefono'] ; ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="bg-light mb-1 card-1 p-2 border rounded">
                                                            <div class="row align-items-center">
                                                                <div class="col">
                                                                    <small class="text-muted">User Role Id</small>
                                                                    <div class="fw-bold">
                                                                        <a size="sm" class="btn btn-sm btn btn-secondary page-modal" href="<?php print_link("roles/view/$data[user_role_id]?subpage=1") ?>">
                                                                        <i class="material-icons">visibility</i> <?php echo "Roles Detail" ?>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--PageComponentEnd-->
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="AccountPageEdit" role="tabpanel">
                                        <div class=" reset-grids">
                                            <x-sub-page url="{{ url('account/edit') }}"></x-sub-page>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="AccountPageChangePassword" role="tabpanel">
                                        <div class=" reset-grids">
                                            @include("pages.account.changepassword")
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                        }
                        else{
                    ?>
                    <!-- Empty Record Message -->
                    <div class="text-muted p-3">
                        <i class="material-icons">block</i> ningún record fue encontrado
                    </div>
                    <?php
                        }
                    ?>
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
<!--custom page css--><!--pagecss-->
</style>
@endsection
<!-- Page custom js -->
@section('pagejs')
<script>
    <!--pageautofill--><!--custom page js--><!--pagejs-->
</script>
@endsection
