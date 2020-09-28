<?php require('header.php'); ?>
 <!-- Material form login -->
 <div class="card">
                <h5 class="card-header info-color white-text text-center py-4 peach-gradient">
                    <strong>Login</strong>
                </h5>
  
                <!--Card content-->
                <div class="card-body px-lg-5 pt-0">
  
                    <!-- Form -->
                    <form class="text-center" style="color: #757575;" action="indexAdministrador.php">
  
                        <!-- Email -->
                        <div class="md-form">
                            <input type="email" id="materialLoginFormEmail" class="form-control">
                            <label for="materialLoginFormEmail">E-mail</label>
                        </div>
  
                        <!-- Password -->
                        <div class="md-form">
                            <input type="password" id="materialLoginFormPassword" class="form-control">
                            <label for="materialLoginFormPassword">Senha</label>
                        </div>
  
                        <div class="d-flex justify-content-around">
                            <div>
                                <!-- Remember me -->
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="materialLoginFormRemember">
                                    <label class="form-check-label" for="materialLoginFormRemember">Lembrar login</label>
                                </div>
                            </div>
                            <div>
                                <!-- Forgot password -->
                                <a href="">Esqueceu a senha?</a>
                            </div>
                        </div>
  
                        <!-- Sign in button -->
                        <button class="btn btn-outline-danger btn-rounded btn-block my-4 waves-effect z-depth-0" type="submit">Entrar</button>
  
                    </form>
                    <!-- Form -->
  
                </div>
  
            </div>
            <!-- Material form login -->
            <?php require('footer.php'); ?>
          