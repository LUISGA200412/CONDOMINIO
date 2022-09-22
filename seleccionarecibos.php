<?php   include("header.php") ?>
    <section class="main">
        <div class="wrapp">
            <div class="mensaje">
                <h1>Seleccionar Recibos de Pagos</h1>
            </div>

            <div class="articulo">
                <article>
  <table border="1"  align="center">


<div align="center">
      <?php  

          $ii = 0;
       
          $the_array = Array(); 
          $handle = opendir('fpdf/RECIBOSDEPAGO'); 
          while (false !== ($file = readdir($handle))) 
          { 
                if ($file != "." && $file != "..") 
                { 
                  $the_array[] = $file; 
                } 
          } 
          closedir($handle); 
          sort ($the_array); 


          foreach($the_array as $val)
          {     

              echo "<tr>";
              echo "<td align='center' WIDTH='100'>"; 
               $ii++;
               echo $ii;
              echo "</td>";

              echo "<td align='center' WIDTH='300'>"; 
              
                echo "<a target='_blank' href='fpdf/RECIBOSDEPAGO/$val'> $val</a>"; 
                echo "</td>";
                echo "</tr>";   
          }
          //$xx = end( $the_array );
          //echo "<a href='../fpdf/RECIBOSDEPAGO/$xx'>$xx</a>"; 
         
 
        ?>

 
  </table>
    <?php
    $email = $_GET['email']  ;
    $cedula  = $_GET['cedula']  ;
 
    echo "<br>";
    echo "<h4 style='margin-left: 150px'>"; 
    echo "<A  HREF='entrada.php?cedula=$cedula&email=$email' > Regresar </A>";
    echo "</h4>"; 

  ?>
                </article>
            </div>

        <?php include("sidebar.php") ?>

        </div>
<?php echo "<br><br>"; ?>
    <?php include("footer.php") ?>
    </section>
    
</body>
</html>