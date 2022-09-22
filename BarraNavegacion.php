<header class="main-header">
    <nav class="navbar navbar-static-top">
      <div class="container">
           <div class="navbar-header" >
           <a href="Principal.php?cedula= <?php echo $_GET['cedula'];?>&email= <?php echo $_GET['email']; ?>" class="navbar-brand"><b>Residencias Sayecito</b></a>
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
            <i class="fa fa-bars"></i>
          </button>
        </div> 


  

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse pull-right" id="navbar-collapse">
          <ul class="nav navbar-nav">
            <li>
              <?php
                  $email  = $_GET['email'];
                  $cedula = $_GET['cedula'];
                  echo "  <a href='Principal.php?cedula=$cedula&email=$email' ><b>Principal</b>
                    </a>";
                ?>                              
            </li>
            <li>
                <a href="#">Quienes Somos
                </a>
            </li>

            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Articulos Relacionados <span class="caret"></span>
              </a>
              <ul class="dropdown-menu" role="menu">
                <li>
                    <a href="https://www.condominiosvenezuela.com/" target="_blank">Condominios Venezuela
                    </a>
                </li>
                <li class="divider">
                </li>
                <li>
                    <a href="https://www.procondominios.com.ve/" target="_blank">Qué es la Junta de Condominio
                    </a>
                </li>
                <li class="divider">
                </li>
                <li>
                    <a href="https://www.monografias.com/trabajos61/actividades-responsabilidades-junta-condominio/actividades-responsabilidades-junta-condominio" target="_blank">
                      Principales actividades y responsabilidades
                        <br> de una Junta de Condominio                       
                    </a>
                </li>
                <li class="divider">
                </li>
                <li>
                    <a href="#">Poner mas link                        
                    </a>
                </li>
                <li class="divider">
                </li>
                <li>
                    <a href="#">Otro link       
                    </a>
                </li>
              </ul>
            </li>
          </ul>
        </div>

      </div>
      <!-- /.container-fluid -->
    </nav>
  </header>  
 