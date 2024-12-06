<?php
    require 'configuration/conection.php';
    $mostrarId = $_GET["mostrarId"];
    $sql="SELECT * FROM `initiatives_municipalities` WHERE (id_initiative=$mostrarId) AND (estado=1)  LIMIT 1";
    $resultselected = $mysqli->query($sql) or die($mysqli->error);
    while($rowfound = $resultselected->fetch_assoc()) { ?>
        <img class="img-fluid mt-2" src="uploads/imagenes/<?php echo $rowfound['image']; ?>" alt="" >
        <div class="col-contenido text-white m-4">
            <h5 class="text-white"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                </svg> <?php echo $rowfound['name_initiative']; ?></h5>
                <p class="text-white"><?php echo $rowfound['name_initiative']; ?></p>
            <?php 
                if($rowfound['genero']=="MM") { ?>
                    <p style="color:#091E3E;"><img src="admin/uploads/profiles/avatarHombre.PNG" width="70px"  alt="">&nbsp; &nbsp;<strong>Hombre productor</strong></p>
                <?php
                }
                if($rowfound['genero']=="FF") { ?>
                    <p  style="color:#091E3E;"><img src="admin/uploads/profiles/avatarMujer.PNG" width="70px"  alt="">&nbsp; &nbsp;<strong>Mujer productora</strong></p>
                <?php
                }
            ?> 
            <?php if( $rowfound['direction']!=""){?>
                <p><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                        <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"/>
                    </svg>&nbsp; &nbsp;<strong><?php echo $rowfound['direction']; ?></strong>
                </p> 
            <?php }?>
            <?php if( $rowfound['description_initiative']!=""){?>
                <p><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-journals" viewBox="0 0 16 16">
                    <path d="M5 0h8a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2 2 2 0 0 1-2 2H3a2 2 0 0 1-2-2h1a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1H1a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v9a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H5a1 1 0 0 0-1 1H3a2 2 0 0 1 2-2z"/>
                    <path d="M1 6v-.5a.5.5 0 0 1 1 0V6h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V9h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 2.5v.5H.5a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1H2v-.5a.5.5 0 0 0-1 0z"/>
                    </svg>&nbsp; &nbsp;<?php echo $rowfound['description_initiative']; ?>
                </p> 
            <?php }?>
            <?php if( $rowfound['facebook']!=""){?>
                <p><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                    <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/>
                    </svg>&nbsp; &nbsp;<?php echo $rowfound['facebook']; ?>
                </p> 
            <?php }?>
            <?php if( $rowfound['instagram']!=""){?>
                <p><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16">
                    <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"/>
                        </svg>&nbsp;&nbsp;<?php echo $rowfound['instagram']; ?>
                </p>
            <?php }?>
            <?php if( $rowfound['twitter']!=""){?>
                <p><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-twitter" viewBox="0 0 16 16">
                    <path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z"/>
                    </svg>&nbsp;&nbsp;<?php echo $rowfound['twiter']; ?>
                </p>
            <?php }?>
            <?php if( $rowfound['email']!=""){?>
                <p><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-envelope-check-fill" viewBox="0 0 16 16">
                    <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555ZM0 4.697v7.104l5.803-3.558L0 4.697ZM6.761 8.83l-6.57 4.026A2 2 0 0 0 2 14h6.256A4.493 4.493 0 0 1 8 12.5a4.49 4.49 0 0 1 1.606-3.446l-.367-.225L8 9.586l-1.239-.757ZM16 4.697v4.974A4.491 4.491 0 0 0 12.5 8a4.49 4.49 0 0 0-1.965.45l-.338-.207L16 4.697Z"/>
                    <path d="M16 12.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0Zm-1.993-1.679a.5.5 0 0 0-.686.172l-1.17 1.95-.547-.547a.5.5 0 0 0-.708.708l.774.773a.75.75 0 0 0 1.174-.144l1.335-2.226a.5.5 0 0 0-.172-.686Z"/>
                    </svg>&nbsp; &nbsp;<?php echo $rowfound['email']; ?>
                </p> 
            <?php }?>
            <?php if( $rowfound['phone']!=""){?>
                <p><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-telephone-plus" viewBox="0 0 16 16">
                    <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
                    <path fill-rule="evenodd" d="M12.5 1a.5.5 0 0 1 .5.5V3h1.5a.5.5 0 0 1 0 1H13v1.5a.5.5 0 0 1-1 0V4h-1.5a.5.5 0 0 1 0-1H12V1.5a.5.5 0 0 1 .5-.5z"/>
                    </svg>&nbsp; &nbsp;<?php echo $rowfound['phone']; ?>
                </p> 
            <?php }?>
            
            <?php if( $rowfound['url_web']!=""){?>
                <p>
                    <a href="#" class="text-white"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-globe-americas" viewBox="0 0 16 16">
                    <path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0ZM2.04 4.326c.325 1.329 2.532 2.54 3.717 3.19.48.263.793.434.743.484-.08.08-.162.158-.242.234-.416.396-.787.749-.758 1.266.035.634.618.824 1.214 1.017.577.188 1.168.38 1.286.983.082.417-.075.988-.22 1.52-.215.782-.406 1.48.22 1.48 1.5-.5 3.798-3.186 4-5 .138-1.243-2-2-3.5-2.5-.478-.16-.755.081-.99.284-.172.15-.322.279-.51.216-.445-.148-2.5-2-1.5-2.5.78-.39.952-.171 1.227.182.078.099.163.208.273.318.609.304.662-.132.723-.633.039-.322.081-.671.277-.867.434-.434 1.265-.791 2.028-1.12.712-.306 1.365-.587 1.579-.88A7 7 0 1 1 2.04 4.327Z"/>
                    </svg>&nbsp; &nbsp;<?php echo $rowfound['url_web']; ?></a></i>
                </p> <!-- cambiar con svg -->
            <?php }?> 
            <p  style="color:#091E3E;"><img src="img/insignias/avanzado.png" width="35px"  alt="Hitos logrados">&nbsp; &nbsp;<strong>Hitos logrados</strong></p>
            <?php
                if($rowfound['insignia_postcosecha']==1) { ?>
                    <p  style="color:#091E3E;"><img src="img/insignias/Capacitacion-postcosecha.jpeg" width="100px"  alt="Capacitación postcosecha">&nbsp; &nbsp;<strong></strong></p>
                <?php
                }
                if($rowfound['insignia_nutricion']==1) { ?>
                    <p  style="color:#091E3E;"><img src="img/insignias/Capacitacion-nutricion.jpeg" width="100px"  alt="Capacitación nutrición">&nbsp; &nbsp;<strong></strong></p>
                <?php
                }
                if($rowfound['insignia_tics']==1) { ?>
                    <p  style="color:#091E3E;"><img src="img/insignias/Capacitacion-tics.jpeg" width="100px"  alt="Capacitación tics">&nbsp; &nbsp;<strong></strong></p>
                <?php
                }
                if($rowfound['insignia_bioseguridad']==1) { ?>
                    <p  style="color:#091E3E;"><img src="img/insignias/Capacitacion-bioseguridad.jpeg" width="100px"  alt="Capacitación bioseguridad">&nbsp; &nbsp;<strong></strong></p>
                <?php
                }
                if($rowfound['insignia_bmp']==1) { ?>
                    <p  style="color:#091E3E;"><img src="img/insignias/Capacitacion-bmp.jpeg" width="100px"  alt="Capacitación BPM">&nbsp; &nbsp;<strong></strong></p>
                <?php
                }
                if($rowfound['insignia_bpa']==1) { ?>
                    <p  style="color:#091E3E;"><img src="img/insignias/Capacitacion-bpa.jpeg" width="100px"  alt="Capacitación BPA">&nbsp; &nbsp;<strong></strong></p>
                <?php
                }
            ?>
            <?php if( $rowfound['comprasPublicas']==1){?>
                <div class="centrar-text-botton">
                    <a href="descargar"><button class="botton-register w-10 py-3" type="button" name="submit" id="submit"><span>Descargar</span></button></a>
                </div>
            <?php }?> 
            <div class="img-reg ">
                <img src="img/icons/lineas-reg.svg" alt="">
            </div>
        </div>  
        <?php 
    } 
?> 
