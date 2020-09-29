<?php require('header.php'); ?>

<title>Login</title>
<!-- Mask -->
<div id="intro" class="view">
    <div class="container-fluid full-bg-img mask rgba-black-strong d-flex align-items-center justify-content-center">
        <div class="row d-flex justify-content-center">
            <div class="col-md-12 text-center">
                <!-- Material form login -->
                <div class="card">
                    <h5 class="card-header info-color white-text text-center py-4 peach-gradient">
                        <strong>Entrar</strong>
                    </h5>
  
                    <!--Card content-->
                    <div class="card-body px-lg-5 pt-0">
  
                        <!-- Form -->
                        <form class="text-center" style="color: #757575;" action="homeAdmin.php">
  
                            <!-- Email -->
                            <div class="md-form">
                                <input type="email" id="materialLoginFormEmail" class="form-control">
                                <label for="materialLoginFormEmail">E-mail</label>
                            </div>
  
                            <!-- Senha -->
                            <div class="md-form">
                                <input type="password" id="materialLoginFormPassword" class="form-control">
                                <label for="materialLoginFormPassword">Senha</label>
                            </div>
  
                            <div class="d-flex justify-content-around">
                                <div>
                                    <!-- Lembrar-me -->
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="materialLoginFormRemember">
                                        <label class="form-check-label" for="materialLoginFormRemember">Lembrar login</label>
                                    </div>
                                </div>
                                <br>
                                <div>
                                    <!-- Esqueceu Senha -->
                                    <a href="">Esqueceu a senha?</a>
                                </div>
                            </div>
  
                            <!-- Botão -->
                            <button class="btn btn-outline-danger btn-rounded btn-block my-4 waves-effect z-depth-0" type="submit">Entrar</button>
            
                        </form>
                        <!-- Form -->
  
                    </div>
  
                </div>
                <!-- Material form login -->

             </div>
        </div>
    </div>
</div>
<!-- Mask -->

<?php require('footer.php'); ?>          