/*============= Función de paginación de productos en pag. tienda============================*/
function pagination(){

    var target = $('#pagination-demo');

    if(target.length > 0){

        target.each(function() {

            var el = $(this),
                totalPages = el.data("total-pages"),
                currentPage = el.data("current-page"),
                urlPage = el.data("url-page");

            el.twbsPagination({

                totalPages: totalPages,
                startPage: currentPage,
                visiblePages: 3,
                first: '<i class="fas fa-angle-double-left"></i>',
                last: '<i class="fas fa-angle-double-right"></i>',
                prev: '<i class="fas fa-angle-left"></i>',
                next: '<i class="fas fa-angle-right"></i>'

            }).on("page", function(evt, page){
                //(tienda?categoria3?2?alto)
                if(urlPage.split("?").length==4){
                    var a1= urlPage.split("?")[0];
                    var a2= urlPage.split("?")[1];
                    var a3= urlPage.split("?")[2];
                    var a4= urlPage.split("?")[2];

                    
                    urlPage = urlPage.replace("?"+currentPage,"?"+page);
                    window.location = urlPage;
                    
                }else if(urlPage.split("?").length==3){
                    var tiend= urlPage.split("?")[0];
                    var cate= urlPage.split("?")[1];
                    var numpag= urlPage.split("?")[2];
                    ///document.write(urlPage.split("?").length);
                    //return;
                    urlPage = urlPage.replace("?"+currentPage,"?"+page);
                    window.location = urlPage;
                    
                }else if(urlPage.split("?").length==2){
                    var cat= urlPage.split("?")[0];
                    var pag= urlPage.split("?")[1];
                    
                    
                    if(pag==currentPage){
                        urlPage = urlPage.replace("?"+currentPage, "?"+page);
                        window.location = urlPage;
                    }else{
                        
                        window.location = urlPage+"?"+page;
                    }
                }else{
                    

                    window.location = urlPage+"?"+page;
                }     

            })

        })
    }
}
/*============= Fin Función de paginación========================*/



//==============Ejecutar función paginación =========
$(function() {
    pagination();

});
//==================================================



// ========  Validación Bootstrap 5 ==================
(function () {
'use strict';

// Fetch all the forms we want to apply custom Bootstrap validation styles to
var forms = document.querySelectorAll('.needs-validation')

// Loop over them and prevent submission
Array.prototype.slice.call(forms)
  .forEach(function (form) {
    form.addEventListener('submit', function (event) {
      if (!form.checkValidity()) {
        event.preventDefault()
        event.stopPropagation()
      }

      form.classList.add('was-validated')
    }, false)
  })
})()




/*============= Función de Ordenar productos por precio ==========*/
function sortProduct(event){
    var url= event.target.value.split("+")[0];
    var sort= event.target.value.split("+")[1];
    //document.write("<h1>"+url+"</h1>");
    
        
    //validar si la url es (tienda?categoría) o (tienda?2)
    if(url.split("?").length==2){

        //(tienda?2) isNAN devuelve falso siempre y cuando el valor que le pasemos sea un número
        if(!isNaN(url.split("?")[1])){
            var endUrl = url.split("?")[0];
        //(tienda?categoría)
        }else{
            var endUrl = url;
        }
        
    //validar si la url es (tienda?categoría?2) o (tienda?2?alto) o (tienda?search?fresa)
    }else if(url.split("?").length==3){
        var s1 = url.split("?")[0];
        var s2 = url.split("?")[1];
        var s3 = url.split("?")[2];
        
        //(tienda?categoría?2)
        if(!isNaN(url.split("?")[2])){
            var endUrl = url.split("?")[0]+"?"+url.split("?")[1];
        
        //(tienda?search?fresa)
        }else if(url.split("?")[1]=="search"){
            //document.write("<h1>"+url+"?"+sort+"</h1>");
        //return;
            var endUrl = url;
        //(tienda?2?alto)
        }else{
            var endUrl = s1;
        }
        
        //validar si la url es (tienda?categoría?2?alto)
    }else if(url.split("?").length==4){
        var t1 = url.split("?")[0];
        var t2 = url.split("?")[1];
        var t3 = url.split("?")[2];
        var t4 = url.split("?")[3];

        //return;
        var endUrl = t1+"?"+t2;
        //document.write("<h1>"+endUrl+"</h1>");
        //return;
    }else{
        var endUrl = url;
    }
    //document.write("<h1>"+endUrl+"?1?"+sort+"</h1>");  
    //return; 
    window.location = endUrl+"?1?"+sort;
}
/*============= Fin Función de Ordenar productos por precio ======*/




/*============= Función de buscar productos =====================*/
$(document).on("click", ".btnSearch", function(){


    var path = $(this).attr("path"); 
    var search = $(this).parent().children(".inputSearch").val().toLowerCase();

    var match = /^[a-z0-9ñÑáéíóú ]*$/;

    if(match.test(search)){

        var searchTest = search.replace(/[ ]/g, "_");
        searchTest = searchTest.replace(/[ñ]/g, "n");
        searchTest = searchTest.replace(/[á]/g, "a");
        searchTest = searchTest.replace(/[é]/g, "e");
        searchTest = searchTest.replace(/[í]/g, "i");
        searchTest = searchTest.replace(/[ó]/g, "o");
        searchTest = searchTest.replace(/[ú]/g, "u");
    if(searchTest==""){
        window.location = path+"tienda";
    }else{
        window.location = path+"tienda?search?"+searchTest;

    }
    }else{

        $(this).parent().children(".inputSearch").val(" ");

    }
})
/*============= Función de buscar productos =====================*/




/*============= Función de buscar productos tecla ENTER ==========*/
var inputSearch = $(".inputSearch");
var btnSearch = $(".btnSearch");

    for(let i = 0; i < inputSearch.length; i++){
        
        $(inputSearch[i]).keyup(function(event) {
            
            event.preventDefault();

            if(event.keyCode == 13 && $(inputSearch[i]).val() !== ""){
            
                var path =  $(btnSearch[i]).attr("path");
                var search = $(this).val().toLowerCase();
                var match = /^[a-z0-9ñÑáéíóú ]*$/;

                if(match.test(search)){

                    var searchTest = search.replace(/[ ]/g, "_");
                    searchTest = searchTest.replace(/[ñ]/g, "n");
                    searchTest = searchTest.replace(/[á]/g, "a");
                    searchTest = searchTest.replace(/[é]/g, "e");
                    searchTest = searchTest.replace(/[í]/g, "i");
                    searchTest = searchTest.replace(/[ó]/g, "o");
                    searchTest = searchTest.replace(/[ú]/g, "u");
                    
                    if(searchTest==""){
                        window.location = path+"tienda";
                    }else{
                        window.location = path+"tienda?search?"+searchTest;

                    }

                }else{

                    $(this).parent().children(".inputSearch").val(" ");
                    //window.location = path+"tienda"
                
                }


            }


        })

    }
/*============= Función de buscar productos tecla ENTER ==========*/








/*============= Función cambiar cantidad en pag INFOPRODUCTO  ==========*/
function cambiarCantidadInfo(quantity, move, index){
    
    if(move == "up"){

        cantidadP = Number(quantity)+1;
    
    }

    if(move == "down" && Number(quantity) > 1){

        cantidadP = Number(quantity)-1;
    }
    //console.log("cantidadP",cantidadP);

    $("#input_cantidad"+index).val(cantidadP);
}



/*============= Función cantidad de productos  CART ==========*/

function cambiarCantidad(quantity, move, index){
    
    if(move == "up"){

        cantidadP = Number(quantity)+1;
    
    }

    if(move == "down" && Number(quantity) > 1){

        cantidadP = Number(quantity)-1;
    }
    //console.log("cantidadP",cantidadP);

    $("#input_cantidad"+index).val(cantidadP);

    modificarPrecios();

}
    
/*============= Fin Función  ==========*/




/*============= Función cantidad de productos  CART ==========*/

function cambiarCantidadMercados(quantity, move, index){
    
    if(move == "up"){

        cantidadP = Number(quantity)+1;
    
    }

    if(move == "down" && Number(quantity) > 1){

        cantidadP = Number(quantity)-1;
    }
    //console.log("cantidadP",cantidadP);

    $("#input_cantidad"+index).val(cantidadP);
    
    
    //Traer precio del mercado
    var settings = {
            "url": "https://api.agroticnarino.com.co/mercados_campesinos?linkTo=id&equalTo=1",
            "method": "GET",
            "timeout": 0
    };
    var precio;
    $.ajax(settings).done(function (response){
        
        if(response.status == 200){
            
            precio=JSON.parse(response.results[0]["precio"]);
            // Modificar el valor del span con ID "spanSub"
            document.getElementById("spanSub").textContent = cantidadP*precio;
            // Modificar el valor del span con ID "spanTot"
            document.getElementById("spanTot").textContent = cantidadP*precio;
        }
    });

    

    

}
    
/*============= Fin Función  ==========*/



/*============= Función cantidad de productos  CART ==========*/

function cambiarCantidadMercados2(quantity, move, index){
    
    if(move == "up"){

        cantidadP = Number(quantity)+1;
    
    }

    if(move == "down" && Number(quantity) > 1){

        cantidadP = Number(quantity)-1;
    }
    //console.log("cantidadP",cantidadP);

    $("#input_cantidad"+index).val(cantidadP);
    
    //Traer precio del mercado
        var settings = {
                "url": "https://api.agroticnarino.com.co/mercados_campesinos?linkTo=id&equalTo=2",
                "method": "GET",
                "timeout": 0
        };
        
        $.ajax(settings).done(function (response){
            if(response.status == 200){
                precio=JSON.parse(response.results[0]["precio"]);
                // Modificar el valor del span con ID "spanSub"
                document.getElementById("spanSub").textContent = cantidadP*precio;
            
                // Modificar el valor del span con ID "spanTot"
                document.getElementById("spanTot").textContent = cantidadP*precio;
            }
        });
    

}




/*============= Función presentación de productos  INFOPRODUCTO==========*/

function presentacion(index,idProduct){
    
    //Traer presentación seleccionada del producto en infoproducto
    let presv = document.getElementById('select_presentation0');
    //Seleccionamos el valor del atributo value
    let pres = presv.value;
    //Si no se seleccionar ninguna presentación se coloca la presentación más pequeña enviada en la variable def='1 kg:1000:2.58'
    if (presv.value == "Presentaciones"){
        pres = document.getElementById('pres_oculto').value;;
    }
    var gramaje="0"; 
    var priceG="0";
    
    //Traer desde BD el precio del gramo según presentación
    var settings = {
            "url": "https://api.agroticnarino.com.co/productos_dpto_narino?linkTo=id_product&equalTo="+idProduct,
            "method": "GET",
            "timeout": 0,
    };
    
    $.ajax(settings).done(function (response){
        
        if(response.status == 200){
            var arrayPresentation=JSON.parse(response.results[0]["presentation"]);

            for (var i = 0; i < arrayPresentation.length; i++) {
                var objeto = arrayPresentation[i];
                
                // Verificar la condición de búsqueda
                if (objeto.name === pres) {
                    // Realizar acciones con el objeto encontrado
                    //console.log("ingresó a if",objeto.incrementPrice)
                    gramaje = objeto.grams;
                    priceG = objeto.incrementPrice;
                }
            }
            
            // Colocar en span la presentación seleccionada
            document.getElementById('span_presentation').innerText = pres;
            
            //Convertir a número con decimal
            var priceGNumeric = parseFloat(priceG);
            // Redondear a un solo decimal
            var priceGRounded = priceGNumeric.toFixed(2);
            //Colocar precio del gramo
            document.getElementById('span_precioGramo').innerText = priceGRounded;
            
            //Convertir a número con decimal
            var priceGNumeric = parseInt(gramaje);
            
            
            
            // Colocar en span el precio correspondiente a presentación seleccionada
            document.getElementById('span_valorpresentation').innerText = Math.trunc(gramaje*priceGRounded);
        }
        
    });
    
}
/*============= Fin Función presentación de productos (unidad, libra, kilogramo) ==========*/






/*===================Función para crear Cookies en JS ====================================*/

function setCookie(name, value, exp){

    var now = new Date();
    now.setTime(now.getTime() + (exp*24*60*60*1000));
    var expDate = "expires="+now.toUTCString();
    document.cookie = name + "=" +value+"; "+expDate;
    
    //Almacenar en varibales sesión
    

}
/*================ Fin Función para crear Cookies en JS ====================================*/





/*===================Función para crear norificaciones ====================================*/
function fncSweetAlert(type, text, url){

	switch (type) {

		/*=============================================
		Cuando ocurre un error
		=============================================*/
        case "errorpass":

            //console.log("type",type);
            Swal.fire({
                icon: 'error',
                title: 'Contraseña incorrecta!',
                text: text
            })
        break;

        case "perfilOk":

            //console.log("type",type);
            Swal.fire({
                icon: 'success',
                title: 'Perfil actualizado!',
                text: text
            }).then(() => {
                window.location=("myCount?editProfile");
            }) 
        break;
        
		/*=============================================
		Cuando contraseña correcta
		=============================================*/
        case "passOk":

            //console.log("type",type);
            Swal.fire({
                icon: 'success',
                title: 'Contraseña actualizada!',
                text: text
            }).then(() => {
                window.location=("myCount?");
            }) 
        break;


		/*=============================================
		Compra realizada con éxito
		=============================================*/
        case "compraOk":

            //console.log("type",type);
            Swal.fire({
                icon: 'success',
                title: 'Compra realizada!',
                text: text
            }).then(() => {
                window.location=("myCount?myShopping");
            }) 
        break;


		/*=============================================
		Cuando no se encuentra producto
		=============================================*/
        case "noProduct":

            //console.log("type",type);
            Swal.fire({
                icon: 'info',
                title: 'Atención!',
                text: text
            }).then(() => {
                window.location=("tienda");
       }) 
        break;

		/*=============================================
		Información
		=============================================*/
        case "info":
            Swal.fire({
                icon: 'info',
                title: 'Atención!',
                text: text
            }) 
        break;


		/*=============================================
		Producto agregado a carrito
		=============================================*/
        case "agregado":
            Swal.fire({
                allowOutsideClick: false,
                icon: 'success',
                title: '¡Producto Agregado!',
                showDenyButton: true,
                confirmButtonColor: '#091E3E',
                denyButtonColor: '#85A633',
                
                text: text,
                confirmButtonText: 'Seguir comprando',
                denyButtonText: 'Ir al carrito de compras',
                
            }).then((result) => {
              /* Read more about isConfirmed, isDenied below */
              if (result.isConfirmed) {
                window.location=(lasturlinfo);
                
              } else if (result.isDenied) {
                  window.location=("cart");
                
              }
            })

        break;
        

		/*=============================================
		Producto NO agregado a carrito
		=============================================*/
        case "noAgregado":
            Swal.fire({
                allowOutsideClick: false,
                icon: 'info',
                title: '¡Producto ya agregado!',
                showDenyButton: true,
                confirmButtonColor: '#091E3E',
                denyButtonColor: '#85A633',
                
                text: text,
                confirmButtonText: 'Seguir comprando',
                denyButtonText: 'Ir al carrito de compras',

            }).then((result) => {
              /* Read more about isConfirmed, isDenied below */
              if (result.isConfirmed) {
                window.location=(lasturlinfo);
                
              } else if (result.isDenied) {
                  window.location=("cart");
                
              }
            })
            
        break;

        
		/*=============================================
		Avisos
		=============================================*/        
        case "aviso":
            Swal.fire({
                allowOutsideClick: false,
                icon: 'warning',
                title: '¡Atención!',
                confirmButtonColor: '#091E3E',
                text: text,
                confirmButtonText: 'Entiendo',

            }).then((result) => {
              /* Read more about isConfirmed, isDenied below */
              if (result.isConfirmed) {
                window.location=("#");
                
              } 
                
              
            })

        break;
        
        
        
        case "aviso2":
            Swal.fire({
                allowOutsideClick: false,
                icon: 'warning',
                title: '¡Atención!',
                confirmButtonColor: '#091E3E',
                text: text,
                confirmButtonText: 'Volver a la tienda',
                
                
                
  
                
            }).then((result) => {
              /* Read more about isConfirmed, isDenied below */
              if (result.isConfirmed) {
                window.location=("tienda");
                
              } 
                
              
            })
            

        break;
        
        case "aviso22":
            Swal.fire({
                allowOutsideClick: false,
                icon: 'warning',
                title: '¡Atención!',
                confirmButtonColor: '#091E3E',
                text: text,
                confirmButtonText: 'Volver a la tienda',
                
                
                
  
                
            }).then((result) => {
              /* Read more about isConfirmed, isDenied below */
              if (result.isConfirmed) {
                window.location=("mercados-campesinos");
                
              } 
                
              
            })
            

        break;
        

		case "error":

		if(url == null){
        
            Swal.fire({
            icon: 'error',
            title: 'Error',
            text: text
            }) 

	    }else{

	    	Swal.fire({
	            icon: 'error',
	            title: 'Error',
	            text: text
	        }).then((result) => {

    	 		if (result.value) { 

    	 			window.open(url, "_top");

    	 		}

	        }) 

	    }

        break;

        /*=============================================
		Cuando es correcto
		=============================================*/

		case "success":

		if(url == null){

		  	Swal.fire({
		  	    allowOutsideClick: false,
	            icon: 'success',
	            title: 'Correcto!',
	            text: text,
                
	        }) 

	    }else{

	    	Swal.fire({
	    	    allowOutsideClick: false,
	            icon: 'success',
	            title: 'Correcto!',
	            text: text,
                
	        }).then((result) => {

    	 		if (result.value) { 

    	 			window.open(url, "_top");

    	 		}

	        }) 

	    }

        break;

        /*=============================================
		Cuando estamos precargando
		=============================================*/

		case "loading":

		  Swal.fire({
            allowOutsideClick: false,
            icon: 'info',
            text:text
          })
          Swal.showLoading()

        break;  

        /*=============================================
		Cuando necesitamos cerrar la alerta suave
		=============================================*/

		case "close":

		 	Swal.close()
		 	
		break;

		 /*=============================================
		Cuando solicitamos confirmación
		=============================================*/

		case "confirm":

		 	return new Promise(resolve=>{ 

		 		Swal.fire({
		 			text: text,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    cancelButtonText: 'Cancelar',
                    confirmButtonText: 'Si, eliminar!'
		 		}).then(function(result){
         
                    resolve(result.value);
               
                })

		 	})

		break;

		/*=============================================
		Cuando necesitamos incorporar un HTML
		=============================================*/

		case "html":

		Swal.fire({
            //No pueda dar click a los lados
            allowOutsideClick: false,
            
            title: '¿Continuar con el pago?',
            icon: 'info',
            html:text,
            showConfirmButton: false,
            showCancelButton: true,
            cancelButtonColor: '#d33'
        })

		break;
	}
}
/*===================Fin Función para crear notificaciones ====================================*/




/*===================Función para adicionar productos al carrito (pagina infoProduct) ====================================*/
function adicionarProductos(idProduct,currentUrl,def){

    //Traer presentación seleccionada del producto en infoproducto
    let presv = document.getElementById('select_presentation0');
    //Seleccionamos el valor del atributo value
    let pres = presv.value;
    //Si no se seleccionar ninguna presentación se coloca la presentación más pequeña enviada en la variable def='1 kg:1000:2.58'
    if (presv.value == "Presentaciones"){
        pres = document.getElementById('pres_oculto').value;;
    }
    var gramaje="0"; 
    var priceG="0";
    
    //Traer desde BD el precio del gramo según presentación
    var settings = {
            "url": "https://api.agroticnarino.com.co/productos_dpto_narino?linkTo=id_product&equalTo="+idProduct,
            "method": "GET",
            "timeout": 0,
    };
    
    $.ajax(settings).done(function (response){
        
        if(response.status == 200){
            var arrayPresentation=JSON.parse(response.results[0]["presentation"]);
            var nombreProducto = response.results[0]["name_product"];

            for (var i = 0; i < arrayPresentation.length; i++) {
                var objeto = arrayPresentation[i];
                
                // Verificar la condición de búsqueda
                if (objeto.name === pres) {
                    // Realizar acciones con el objeto encontrado
                    //console.log("ingresó a if",objeto.incrementPrice)
                    gramaje = objeto.grams;
                    priceG = objeto.incrementPrice;
                }
            }
            //Se crea objeto para ser enviado y almacenado
            var arrayListSC = {
                "product": idProduct,
                "nameProduct": nombreProducto, 
                "nombrePres": pres,
                "gramaje": gramaje,
                "incrementPrice": priceG,
                "cantidad": $("#input_cantidad0").val()
            };
    
            //Se envía arreglo a archivo almacenarOrden.php para ser almacenado en variable sesion listSC
            $.ajax({
                type: "POST",
                url: "../adicionarProductos.php",
                data: {
                    listSC: JSON.stringify(arrayListSC)
                },
                success: function(response) {
                    //console.log(response);
                    //Si la respuesta es 0 significa que el producto no se almaceno anteriormente
                    if(response==0){
                        fncSweetAlert(
                        "agregado", 
                        "El producto se adicionó al carrito de compras",
                        currentUrl
                        )            
                    //De lo contrario el producto ya fue almaceno anteriormente
                    }else{
                        fncSweetAlert(
                            "noAgregado", 
                            "El producto ya fue adicionado anteriormente",
                            currentUrl
                        ) 
                    }
                }
            });
        }
    });
}
//================ Función para adicionar productos al carrito (pagina infoProduct)  ====================================





// ==============Función para quitar productos de carrito de compras (pagina cart) ==========
function removeProduct(idProduct, currentUrl){
    fncSweetAlert("confirm","¿Está seguro de eliminar este producto?","").then(resp=>{
        if(resp){
            $.ajax({
                type: "POST",
                url: "../eliminarProducto.php",
                data: {
                    idProd: idProduct
                },
                success: function(response) {
                    //console.log(response);
                    //Si la respuesta es 1 significa que el producto se ha eliminado correctamente
                    if(response==1){
                        fncSweetAlert(
                                "success", 
                                "Producto eliminado del carrito de compras",
                                currentUrl
                         
                        );            
                    //De lo contrario no se logró eliminar el producto
                    }else{
                        
                    }
                }
            });
        }
    });
}
// ================= Fin para función quitar productos de carrito de compras (página cart) ==============




//=============Función para calcular subtotal y total (página cart) ============
async function modificarPrecios() {
  //Traemos valor de variables de la página cart

  //subtotal
  var subtotal = $(".subtotal");
  //Total
  var subtotal2 = $(".subtotal2");
  //precio del gramo
  var price = $(".p_precio_gramo");
  //total
  var total = $(".total");

  var valorsubtotal2 = 0;
  var arrayListSC = [];

  function fetchPresentationData(i) {
    // Obtener el id del producto con el div correspondiente al índice i
    var divElement = document.querySelector('.listSC' + i);
    var idp = divElement.getAttribute('idp');
    // Obtenemos el nombre de la presentación
    var presentations = document.getElementById('select_presentation' + i);
    var presenta = presentations.value;

    return new Promise(function(resolve, reject) {
      // Crear la configuración para la llamada AJAX
      var settings = {
        "url": "https://api.agroticnarino.com.co/productos_dpto_narino?linkTo=id_product&equalTo=" + idp,
        "method": "GET",
        "timeout": 0,
      };

      // Realizar la llamada AJAX
      $.ajax(settings).done(function(response) {
        if (response.status == 200) {
          //Capurar las presentaciones del producto
          var arrayPresentation = JSON.parse(response.results[0]["presentation"]);
          var nombreProducto = response.results[0]["name_product"];
          for (var j = 0; j < arrayPresentation.length; j++) {
            var objeto = arrayPresentation[j];

            if (objeto.name === presenta) {
              resolve({
                nomP: nombreProducto,
                idPro: idp,
                nomPre: presenta,
                gramaje: objeto.grams,
                priceG: objeto.incrementPrice
              });
              return;
            }
          }
        }
        reject("No se encontró la presentación");
      });
    });
  }

  const promises = price.map(async function(i) {
    try {
      var results = await fetchPresentationData(i);

      //Nombre de presentación
      var nompres = results.nomPre;

      //Gramos de presentacón
      var grapres = parseInt(results.gramaje);

      //Convertir a número con decimal
      var priceGNumeric = parseFloat(results.priceG);
      // Redondear a un solo decimal
      var priceGRounded = priceGNumeric.toFixed(2);

      //Precio del gramo
      var precioGramo = priceGRounded;

      //Capturamos la cantidad
      var cant = $("#input_cantidad" + i);
      //se asigna a la variable el valor de la cantidad convertido en número para operar posteriormente
      var canti = Number($(cant[0]).val());

      //Precio del producto individual = gramos de presentación * precio del gramo
      var precioP = Math.round(grapres * precioGramo);

      //Se calcula el valor del subtotal por cada producto
      var valorsubtotal = Math.round(precioP * canti);

      //Se suman los subtotales de cada producto para calcular el TOTAL
      valorsubtotal2 += valorsubtotal;

      //Actualizar en pantalla el precio del gramo
      $(price[i]).html(precioGramo);

      //Actualizar en pantalla el valor de subtotal por cada producto
      $(subtotal[i]).html(valorsubtotal);

      //Actualizar subtotal
      $(subtotal2).html(valorsubtotal2);
      $(total).html(valorsubtotal2);

      //Actualizar cookie
      arrayListSC.push({
        "product": results.idPro,
        "nameProduct": results.nomP,
        "incrementPrice": precioGramo,
        "nombrePres": nompres,
        "gramaje": grapres,
        "precio": precioP,
        "cantidad": canti,
        "subtotal1": valorsubtotal,
        "subtotal2": valorsubtotal2
      });

    } catch (error) {
      console.error("Error:", error);
    }
  });

  Promise.all(promises)
    .then(function() {
      //console.log("todas las promesas cumplidas:");

      $.ajax({
        type: "POST",
        url: "../crearOrden.php",
        data: {
          listSC: JSON.stringify(arrayListSC)
        },
        success: function(response) {
          //console.log(response);
        }
      });
    })
    .catch(function(error) {
      console.error("Error al procesar las promesas:", error);
    });
}





/*        
        
        //Actualizar costo de envío 
        
        //Traigo todas las cookies
        var myCookies = document.cookie;
        //formar vector de cookies
        var listCookies = myCookies.split(";");
        //Recorrer vector de cookies
        for(const i in listCookies){
            // Si list es superior a -1 es porque encontró la cookie
            if(listCookies[i].search("listSC") > -1){
                var shoppingCart = JSON.parse(listCookies[i].split("=")[1]);
            }else if ((listCookies[i].search("selectCity") > -1)){
                var shoppingCart = [];
            }
        }
        
        // Suma de gramos para fijar el precio del domicilio
        var pesoTotal = 0;
        for(const i in shoppingCart){
           pesoTotal+=shoppingCart[i].cantidad*shoppingCart[i].gramosPres;
           //console.log("pesoTotal",pesoTotal);
        }
        //console.log("pesoTotal",pesoTotal);
        //Fijar precio de domicilio
        
        if (pesoTotal<=10000){
            var precioDomicilio = 4000;
        }if (pesoTotal>10000 && pesoTotal<=30000){
            var precioDomicilio = 8000;
        }else if(pesoTotal>30000 && pesoTotal<500000){
            var precioDomicilio = 15000;
        }else if(pesoTotal>=500000){
            var precioDomicilio = 0;
        }
        
         //Actualizar el costo de envío
    
        function ventanamodalCart(){
            var cookies = document.cookie;
            // Separar las cookies en un array
            var cookiesArray = cookies.split(';');
            // Buscar la cookie específica
            for (var i = 0; i < cookiesArray.length; i++) {
                var cookie = cookiesArray[i];
                while (cookie.charAt(0) == ' ') {
                    cookie = cookie.substring(1);
                }
                if (cookie.indexOf('selectCity=') == 0) {
                  // Encontramos la cookie
                  var city = cookie.substring('selectCity='.length, cookie.length);
                }
            }
            //console.log("city",city);
            let varTitle;
            if (city == 28) {
              varTitle = 'Tabla de costos de envío Ipiales';
            } else if (city == 61) {
              varTitle = 'Tabla de costos de envío Tumaco';
            } else if (city == 64) {
              varTitle = 'Tabla de costos de envío Pasto';
            }
            //console.log("varTitle",varTitle);
            
            //Opciones para PASTO
            let varHtml;
            if(city==64 && pesoTotal <=10000){
                varHtml = `
                  <table class="table">
                    <thead>
                      <tr>
                        <th>Lugar</th>
                        <th>Costo de envío</th>
                      </tr>
                    </thead>
            
                    <tbody>
                      <tr>
                        <td>Casco urbano</td>
                        <td>$ 4.000</td>
                      </tr>
                      <tr>
                        <td>Afueras de la ciudad</td>
                        <td>$ 5.000</td>
                      </tr>
                    </tbody>
                  </table>
                  <br>
                  <p>Querido cliente, recuerde que el costo de envío se pagará contra entrega (cuando reciba su pedido), por este motivo este valor no se verá reflejado en el total a pagar. </p>
                `;
            }
        
        
        
        
            if(city==64 && pesoTotal >10000 && pesoTotal <=100000){
                varHtml = `
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Lugar</th>
                                <th>Costo de envío</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            <tr>
                                <td>Casco urbano</td>
                                <td>$ 8.000</td>
                            </tr>
                            
                        </tbody>
                    </table>
                    <br>
                    <p>Querido cliente, recuerde que el costo de envío se pagará contra entrega (cuando reciba su pedido), por este motivo este valor no se verá reflejado en el total a pagar. </p>
            
                `;
            }
                
            if(city==64 && pesoTotal >100000 && pesoTotal <=500000){
                varHtml = `
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Lugar</th>
                                <th>Costo de envío</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            <tr>
                                <td>Casco urbano</td>
                                <td>$ 10.000</td>
                            </tr>
                            <tr>
                                <td>Afueras de la ciudad</td>
                                <td>$ 15.000</td>
                            </tr>
                        </tbody>
                    </table>
                    <br>
                    <p>Querido cliente, recuerde que el costo de envío se pagará contra entrega (cuando reciba su pedido), por este motivo este valor no se verá reflejado en el total a pagar. </p>
            
                `;
            }
                
            if(city==64 && pesoTotal >500000){
                varHtml = `
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Lugar</th>
                                <th>Costo de envío</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            <tr>
                                <td>Casco urbano</td>
                                <td>Envío gratis</td>
                            </tr>
                            <tr>
                                <td>Afueras de la ciudad</td>
                                <td>Envío gratis</td>
                            </tr>
                        </tbody>
                    </table>
                    <br>
                    <p>Querido cliente, recuerde que el costo de envío se pagará contra entrega (cuando reciba su pedido), por este motivo este valor no se verá reflejado en el total a pagar. </p>
            
                `;
            }
              
              
            //Opciones para IPIALES
            if(city==28 && pesoTotal <=100000){
                varHtml = `
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Lugar</th>
                                <th>Costo de envío</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            <tr>
                                <td>Casco urbano</td>
                                <td>$ 6.000</td>
                            </tr>
                            <tr>
                                <td>Afueras de la ciudad</td>
                                <td>$ 8.000</td>
                            </tr>
                        </tbody>
                    </table>
                    <br>
                    <p>Querido cliente, recuerde que el costo de envío se pagará contra entrega (cuando reciba su pedido), por este motivo este valor no se verá reflejado en el total a pagar. </p>
            
                `;
            }
                
            if(city==28 && pesoTotal >100000 && pesoTotal <=500000){
                varHtml = `
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Lugar</th>
                                <th>Costo de envío</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            <tr>
                                <td>Casco urbano</td>
                                <td>$ 12.000</td>
                            </tr>
                            <tr>
                                <td>Afueras de la ciudad</td>
                                <td>$ 20.000</td>
                            </tr>
                            
                        </tbody>
                    </table>
                    <br>
                    <p>Querido cliente, recuerde que el costo de envío se pagará contra entrega (cuando reciba su pedido), por este motivo este valor no se verá reflejado en el total a pagar. </p>
            
                `;
            }
                
            if(city==28 && pesoTotal >500000){
                varHtml = `
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Lugar</th>
                                <th>Costo de envío</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            <tr>
                                <td>Casco urbano</td>
                                <td>Envío gratis</td>
                            </tr>
                            <tr>
                                <td>Afueras de la ciudad</td>
                                <td>Envío gratis</td>
                            </tr>
                        </tbody>
                    </table>
                    <br>
                    <p>Querido cliente, recuerde que el costo de envío se pagará contra entrega (cuando reciba su pedido), por este motivo este valor no se verá reflejado en el total a pagar. </p>
            
                `;
            }
              
                
            //Opciones para TUMACO
            if(city==61 && pesoTotal <=15000){
                varHtml = `
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Lugar</th>
                                <th>Costo de envío</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            <tr>
                                <td>Casco urbano</td>
                                <td>$ 4.000</td>
                            </tr>
                            <tr>
                                <td>Afueras de la ciudad</td>
                                <td>$ 5.000</td>
                            </tr>
                        </tbody>
                    </table>
                    <br>
                    <p>Querido cliente, recuerde que el costo de envío se pagará contra entrega (cuando reciba su pedido), por este motivo este valor no se verá reflejado en el total a pagar. </p>
            
                `;
            }
                
            if(city==61 && pesoTotal >15000 && pesoTotal <=90000){
                varHtml = `
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Lugar</th>
                                <th>Costo de envío</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            <tr>
                                <td>Casco urbano</td>
                                <td>$ 10.000</td>
                            </tr>
                            <tr>
                                <td>Afueras de la ciudad</td>
                                <td>$ 15.000</td>
                            </tr>
                            
                        </tbody>
                    </table>
                    <br>
                    <p>Querido cliente, recuerde que el costo de envío se pagará contra entrega (cuando reciba su pedido), por este motivo este valor no se verá reflejado en el total a pagar. </p>
            
                `;
            }
                
            if(city==61 && pesoTotal >90000){
                varHtml = `
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Lugar</th>
                                <th>Costo de envío</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            <tr>
                                <td>Casco urbano</td>
                                <td>Envío gratis</td>
                            </tr>
                            <tr>
                                <td>Afueras de la ciudad</td>
                                <td>Envío gratis</td>
                            </tr>
                        </tbody>
                    </table>
                    <br>
                    <p>Querido cliente, recuerde que el costo de envío se pagará contra entrega (cuando reciba su pedido), por este motivo este valor no se verá reflejado en el total a pagar. </p>
            
                `;
            }
    

            // Mostrar SweetAlert
            swal.fire({
                title: varTitle,
                html: varHtml,
                icon: "info",
                showCancelButton: false,
                cancelButtonText: "Entiendo"
                
            });
        }
    
    

        $(cEnvio).html("");
        var nuevoEnlace = $('<a>').attr('href', '#').text('Ver tabla de costos').click(function() {
            // Aquí es donde se coloca la función que deseas ejecutar cuando el usuario haga clic en el enlace.
            ventanamodalCart();
        });  
        cEnvio.append(nuevoEnlace);
            //$(cEnvio).html(precioDomicilio);
        
        

    }
    
    
}

*/

//console.log("arrayListSC",arrayListSC);

// ==================Capturamos el método de envío ===============

var metodoEnvio = $('[name="shipping-option"]').val(); 

function cambioEnvio(event){
    let direccion = document.getElementById("address").value;
    var costo = $(".costo_envio");
    metodoEnvio = event.target.value;
   
   //console.log("metodoEnvio",metodoEnvio);
    var precioDom = (document.getElementById("priceDom").value);
   if (metodoEnvio == "recoger"){
    $(costo).html(0);
   }else{
        $(costo).html("")
        var nuevoEnlace = $('<a>').attr('href', '#').text('Ver tabla de costos').click(function() {

        ventanamodal();


    }); 
    //fncSweetAlert("aviso","Su dirección registrada en el sistema es:\n"+direccion+". Si no es correcta por favor modifiquela en el campo dirección ubicado en esta página.", null);
    //Generar notificación de dirección
    Swal.fire({
        allowOutsideClick: false,
        icon: 'warning',
        title: '¡Atención!',
        confirmButtonColor: '#091E3E',
        html: "La dirección registrada en el sistema es:<br><b>"+direccion+".</b><br>Si no es correcta por favor modifiquela en el campo dirección ubicado en esta página.",
        confirmButtonText: 'Entiendo',
        
        
        

        
    }).then((result) => {
      /* Read more about isConfirmed, isDenied below */
      if (result.isConfirmed) {
        window.location=("#");
        
      } 
        
      
    })
   
    
    
    
    costo.append(nuevoEnlace);
    //$(costo).html(precioDom);
   }
   
}



// ============Función para validar formulario ===============
function validateJS(event, type){

    /*=============================================
    Validamos texto
    =============================================*/

    if(type == "text"){

        var pattern = /^[A-Za-zñÑáéíóúÁÉÍÓÚ ]{1,}$/;

        if(!pattern.test(event.target.value)){

            $(event.target).parent().addClass("was-validated");

            $(event.target).parent().children(".invalid-feedback").html("No use números o carácteres especiales");

            event.target.value = "";

            return;

        }

    }

    /*=============================================
    Validamos email
    =============================================*/

    if(type == "email"){

        var pattern = /^[^0-9][.a-zA-Z0-9_]+([.][.a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/;

        if(!pattern.test(event.target.value)){

            $(event.target).parent().addClass("was-validated");

            $(event.target).parent().children(".invalid-feedback").html("El correo electrónico está mal escrito");

            event.target.value = "";

            return;

        }

    }

    /*=============================================
    Validamos contraseña
    =============================================*/

    if(type == "password"){

        var pattern = /^[#\\=\\$\\;\\*\\_\\?\\¿\\!\\¡\\:\\.\\,\\0-9a-zA-Z]{1,}$/;

        if(!pattern.test(event.target.value)){

            $(event.target).parent().addClass("was-validated");

            $(event.target).parent().children(".invalid-feedback").html("La contraseña es incorrecta");

            event.target.value = "";

            return;

        }

    }

    /*=============================================
    Validamos imagen
    =============================================*/

    if(type == "image"){

        var image = event.target.files[0];

        /*=============================================
        Validamos el formato
        =============================================*/

        if(image["type"] !== "image/jpeg" && image["type"] !== "image/png"){

            fncSweetAlert("error", "The image must be in JPG or PNG format", null)

            return;
        }

        /*=============================================
        Validamos el tamaño
        =============================================*/

        else if(image["size"] > 2000000){

            fncSweetAlert("error", "Image must not weigh more than 2MB", null)

            return;

        }

        /*=============================================
        Mostramos la imagen temporal
        =============================================*/

        else{

            var data = new FileReader();
            data.readAsDataURL(image);

            $(data).on("load", function(event){

                var path = event.target.result; 

                $(".changePicture").attr("src", path);    

            })

        }

    }

    /*=============================================
    Validamos teléfono
    =============================================*/

    if(type == "phone"){

        var pattern = /^[-\\(\\)\\0-9 ]{1,}$/;

        if(!pattern.test(event.target.value)){

            $(event.target).parent().addClass("was-validated");

            $(event.target).parent().children(".invalid-feedback").html("El número de teléfono es incorrecto");

            event.target.value = "";

            return;

        }

    }

    /*=============================================
    Validamos párrafos
    =============================================*/

    if(type == "paragraphs"){

        var pattern = /^[-\\(\\)\\=\\%\\&\\$\\;\\_\\*\\"\\#\\?\\¿\\!\\¡\\:\\,\\.\\0-9a-zA-ZñÑáéíóúÁÉÍÓÚ ]{1,}$/;

        if(!pattern.test(event.target.value)){

            $(event.target).parent().addClass("was-validated");

            $(event.target).parent().children(".invalid-feedback").html("The input is misspelled");

            event.target.value = "";

            return;

        }

    }

}




// ----------------- Creamos cookie para ciudad --------- ////
function selectCity2(city){
    
    // Obtener todas las cookies
    var cookies = document.cookie;
    
    // Separar las cookies en un array
    var cookiesArray = cookies.split(';');
    
    // Buscar la cookie "miCookie" en el array
    var miCookie = cookiesArray.find(function(cookie) {
      return cookie.includes('selecCity');
    });
    
    // Obtener el valor de la cookie
    if (miCookie){
        
    }
    var miCookieValor = miCookie.split('=')[1];
}




// ----------- Función para obtener fecha--------------------
function formatDate(date){
    var day = date.getDate().toString().padStart(2, '0');
    var month = (date.getMonth()+1).toString().padStart(2, '0');
    var year = date.getFullYear();
    
    var hour = date.getHours();
    if(hour < 12){
        ampm= "am";
    }else if (hour == 12){
        ampm = "pm";
        hour = hour;
    }else{
        ampm= "pm";
        hour = hour-12;
    }
    
    var minutes = date.getMinutes().toString().padStart(2, '0');
    var seconds = date.getSeconds().toString().padStart(2, '0');
    
    return year + '-' + month + '-' + day + ' '+hour+ ':'+minutes+''+ampm;
    
}










// ----------------- Validar botón de checkout-------

let referenceCode;
function checkout(){
    //debugger;

    var forms = document.getElementsByClassName('needs-validation');
    
    var validation = Array.prototype.filter.call(forms, function(form) { 

        if (form.checkValidity()){
            
            return [""];
        }

    })

    if(validation.length > 0){ 
        
        /*=============================================
        Inicio de Variables Wompi
        =============================================*/
        let total= valoraPagar;
        total = parseInt(total, 10) * 100; // Asignar el valor a la variable total dentro del bloque de la función then
        console.log("totallllllll",total);
        
        //Gererar un código de referencia aleatorio
        //var referenceCode = parseInt((document.getElementById("refCode").value),10)+1;
        referenceCode = Math.ceil(Math.random()*10000000);
        //Almacenarlo en cookie
        setCookie("views",referenceCode,0.1);

        //email
        let emailOrder = document.getElementById("inputEmail").value;
        
        //nombre comprador
        let nombre = document.getElementById("firstName").value;
        
        //Apellido comprador
        let apellido = document.getElementById("lastName").value;

        //telefono comprador
        let telefono = document.getElementById("phoneOrder").value;
    
        //dirección comprador
        let direccion = document.getElementById("address").value;
        
        //ciudad
        var ciudad = $(".input_ciudad").attr("ciu");
        
        var idUser = document.getElementById("idUser").value;
        
        var idMunicipality = document.getElementById("city").value;
        
        let identification = document.getElementById("identifiation_").value;


        /*=============================================
        Fin de Variables Wompi
        =============================================*/


        /*=============================================
        Formulario de Wompi
        =============================================*/
        var formWompi = `
        <form action="https://checkout.wompi.co/p/" method="GET">
            <div>
                <img src="images/wompi.PNG" style="width:200px" />
            </div>
          <!-- OBLIGATORIOS -->
          <input type="hidden" name="public-key" value="pub_prod_EOqs0GMfPum2mdYvqyB346A2OqzKOKAs" />
          <input type="hidden" name="currency" value="COP" />
          <input type="hidden" name="amount-in-cents" value="`+total+`" />
          <input type="hidden" name="reference" value="`+referenceCode+`" />
          <!-- OPCIONALES -->
          <input type="hidden" name="redirect-url" value="https://agroticnarino.com.co/checkout" />
          <input type="hidden" name="customer-data:email" value="`+emailOrder+`" />
          <input type="hidden" name="customer-data:full-name" value="`+nombre+` `+apellido+`" />
          <input type="hidden" name="customer-data:phone-number" value="+57`+telefono+`" />
          <input type="hidden" name="shipping-address:address-line-1" value="`+direccion+`" />
          <input type="hidden" name="shipping-address:country" value="CO" />
          <input type="hidden" name="shipping-address:phone-number" value="`+telefono+`" />
          <input type="hidden" name="shipping-address:city" value="`+ciudad+`" />
          <input type="hidden" name="shipping-address:region" value="Nariño" />
          <div class="justify-content-center">
            <input name="Submit" class="btn py-0 px-4 mb-2 rounded-3 btn-primary" type="submit" value="Pagar" style="color: #ffffff; font-size: 1rem;">
        </div>
        </form>`

        /*=============================================
        Fin de Formulario Wompi
        =============================================*/
        
        
        
        /*========== Actualizar perfil ==========*/
        
        var settings = {
                "url": "https://api.agroticnarino.com.co/usuarios?nameId=id_user&id="+idUser,
                "method": "PUT",
                "timeout": 0,
                "headers": {
                    "Content-Type": "application/x-www-form-urlencoded"
                },
                "data": {
                    "names": nombre,
                    "lastnames": apellido,
                    "phone": telefono,
                    "address": direccion,
                    "email": emailOrder,
                    "identificacion": identification,
                    "id_municipality_user": idMunicipality
                    
                }
            };
            //console.log("settings data: ", settings.data)
            $.ajax(settings).done(function (response) {
                //console.log("ajaxxx");
                if(response.status == 200){
                    //console.log("response: ", response)
                    //fncSweetAlert("perfilOk", "Sus datos personales han sido actualizados correctamente",)

                    //window.location = "";
                }else{
                    //console.log("perfil errorrrr!!!!!!!!")

                }
                

            });
        
        
        
        
        /*================fin actualizar perfil================*/
        
        
        //Creamos la orden    
        crearOrdenWompi();
        //Mostrar notificación para pagar
        fncSweetAlert("html", formWompi, null);
        return false;
        
    }else{

        return false;

    }
}



// =========== Checkout Mercados campesinos ============================================
function checkoutMercadoCampesino(){
    //debugger;
    var forms = document.getElementsByClassName('needs-validation');

    var validation = Array.prototype.filter.call(forms, function(form) { 

        if (form.checkValidity()){
            
            return [""];
        }

    })

    if(validation.length > 0){ 
        

        /*=============================================
        Inicio de Variables Wompi
        =============================================*/
        // Valor total a pagar
        var inputCantidad = document.getElementById('input_cantidad1').value;
        
        //Traer precio del mercado
        var settings = {
                "url": "https://api.agroticnarino.com.co/mercados_campesinos?linkTo=id&equalTo=1",
                "method": "GET",
                "timeout": 0
        };
        
        $.ajax(settings).done(function (response){
            if(response.status == 200){
                var precio=JSON.parse(response.results[0]["precio"]);
                var total =  inputCantidad*precio;
                //Colocar el total en centavos
                total = parseInt(total,10)*100;
                
                //var referenceCode = parseInt((document.getElementById("refCode").value),10)+1;
                referenceCode = Math.ceil(Math.random()*10000000);
                setCookie("views",referenceCode,0.1);
                
                //email
                let emailOrder = document.getElementById("inputEmail").value;
                
                //nombre comprador
                let nombre = document.getElementById("firstName").value;
                
                //Apellido comprador
                let apellido = document.getElementById("lastName").value;
                
                //telefono comprador
                let telefono = document.getElementById("phoneOrder").value;
                
                //dirección comprador
                let direccion = document.getElementById("address").value;
                
                //ciudad
                var ciudad = $(".input_ciudad").attr("ciu");
                
                var idUser = document.getElementById("idUser").value;
                
                var idMunicipality = document.getElementById("city").value;
                
                let identification = document.getElementById("identifiation_").value;
                
                
                /*=============================================
                Fin de Variables Wompi
                =============================================*/
                
                /*=============================================
                Formulario de Wompi
                =============================================*/
                var formWompi = `
                <form action="https://checkout.wompi.co/p/" method="GET">
                    <div>
                        <img src="images/wompi.PNG" style="width:200px" />
                    </div>
                  <!-- OBLIGATORIOS -->
                  <input type="hidden" name="public-key" value="pub_prod_EOqs0GMfPum2mdYvqyB346A2OqzKOKAs" />
                  <input type="hidden" name="currency" value="COP" />
                  <input type="hidden" name="amount-in-cents" value="`+total+`" />
                  <input type="hidden" name="reference" value="`+referenceCode+`" />
                  <!-- OPCIONALES -->
                  <input type="hidden" name="redirect-url" value="https://agroticnarino.com.co/checkout" />
                  <input type="hidden" name="customer-data:email" value="`+emailOrder+`" />
                  <input type="hidden" name="customer-data:full-name" value="`+nombre+` `+apellido+`" />
                  <input type="hidden" name="customer-data:phone-number" value="+57`+telefono+`" />
                  <input type="hidden" name="shipping-address:address-line-1" value="`+direccion+`" />
                  <input type="hidden" name="shipping-address:country" value="CO" />
                  <input type="hidden" name="shipping-address:phone-number" value="`+telefono+`" />
                  <input type="hidden" name="shipping-address:city" value="`+ciudad+`" />
                  <input type="hidden" name="shipping-address:region" value="Nariño" />
                  <div class="justify-content-center">
                    <input name="Submit" class="btn py-0 px-4 mb-2 rounded-3 btn-primary" type="submit" value="Pagar" style="color: #ffffff; font-size: 1rem;">
                </div>
                </form>`
                /*=============================================
                Fin de Formulario Wompi
                =============================================*/
                
                
                
                /*========== Actualizar perfil ==========*/
                
                var settings = {
                        "url": "https://api.agroticnarino.com.co/usuarios?nameId=id_user&id="+idUser,
                        "method": "PUT",
                        "timeout": 0,
                        "headers": {
                            "Content-Type": "application/x-www-form-urlencoded"
                        },
                        "data": {
                            "names": nombre,
                            "lastnames": apellido,
                            "phone": telefono,
                            "address": direccion,
                            "email": emailOrder,
                            "identificacion": identification,
                            "id_municipality_user": idMunicipality
                            
                        }
                    };
                    //console.log("settings data: ", settings.data)
                    $.ajax(settings).done(function (response) {
                        //console.log("ajaxxx");
                        if(response.status == 200){
                            //console.log("response: ", response)
                            //fncSweetAlert("perfilOk", "Sus datos personales han sido actualizados correctamente",)
        
                            //window.location = "";
                        }else{
                            //console.log("perfil errorrrr!!!!!!!!")
        
                        }
                        
        
                    });
                
                /*================fin actualizar perfil================*/
                
                
                crearOrdenWompiMC();
                fncSweetAlert("html", formWompi, null);
                
                
                
            }
        });
        return false;
                
    }else{

        return false;

    }
}


// =========== Checkout Mercados campesinos ============================================
function checkoutMercadoCampesino2(){
    //debugger;
    var forms = document.getElementsByClassName('needs-validation');

    var validation = Array.prototype.filter.call(forms, function(form) { 

        if (form.checkValidity()){
            
            return [""];
        }

    })

    if(validation.length > 0){ 
        

        /*=============================================
        Inicio de Variables Wompi
        =============================================*/
        // Valor total a pagar
        var inputCantidad = document.getElementById('input_cantidad1').value;
        
        //Traer precio del mercado
        var settings = {
                "url": "https://api.agroticnarino.com.co/mercados_campesinos?linkTo=id&equalTo=2",
                "method": "GET",
                "timeout": 0
        };
        
        $.ajax(settings).done(function (response){
            if(response.status == 200){
                precio=JSON.parse(response.results[0]["precio"]);
                var total =  inputCantidad*precio;
                //Colocar el total en centavos
                total = parseInt(total,10)*100;
                
                //Gererar un código de referencia aleatorio
                //var referenceCode = parseInt((document.getElementById("refCode").value),10)+1;
                referenceCode = Math.ceil(Math.random()*10000000);
                setCookie("views",referenceCode,0.1);
                
                //email
                let emailOrder = document.getElementById("inputEmail").value;
                
                //nombre comprador
                let nombre = document.getElementById("firstName").value;
                
                //Apellido comprador
                let apellido = document.getElementById("lastName").value;
        
                
                //telefono comprador
                let telefono = document.getElementById("phoneOrder").value;
                
                //dirección comprador
                let direccion = document.getElementById("address").value;
                
                //ciudad
                var ciudad = $(".input_ciudad").attr("ciu");
                
                
                var idUser = document.getElementById("idUser").value;
                
                var idMunicipality = document.getElementById("city").value;
                
                let identification = document.getElementById("identifiation_").value;
                
                /*=============================================
                Fin de Variables Wompi
                =============================================*/
                
                /*=============================================
                Formulario de Wompi
                =============================================*/
                var formWompi = `
                <form action="https://checkout.wompi.co/p/" method="GET">
                    <div>
                        <img src="images/wompi.PNG" style="width:200px" />
                    </div>
                  <!-- OBLIGATORIOS -->
                  <input type="hidden" name="public-key" value="pub_prod_EOqs0GMfPum2mdYvqyB346A2OqzKOKAs" />
                  <input type="hidden" name="currency" value="COP" />
                  <input type="hidden" name="amount-in-cents" value="`+total+`" />
                  <input type="hidden" name="reference" value="`+referenceCode+`" />
                  <!-- OPCIONALES -->
                  <input type="hidden" name="redirect-url" value="https://agroticnarino.com.co/checkout" />
                  <input type="hidden" name="customer-data:email" value="`+emailOrder+`" />
                  <input type="hidden" name="customer-data:full-name" value="`+nombre+` `+apellido+`" />
                  <input type="hidden" name="customer-data:phone-number" value="+57`+telefono+`" />
                  <input type="hidden" name="shipping-address:address-line-1" value="`+direccion+`" />
                  <input type="hidden" name="shipping-address:country" value="CO" />
                  <input type="hidden" name="shipping-address:phone-number" value="`+telefono+`" />
                  <input type="hidden" name="shipping-address:city" value="`+ciudad+`" />
                  <input type="hidden" name="shipping-address:region" value="Nariño" />
                  <div class="justify-content-center">
                    <input name="Submit" class="btn py-0 px-4 mb-2 rounded-3 btn-primary" type="submit" value="Pagar" style="color: #ffffff; font-size: 1rem;">
                </div>
                </form>`
                /*=============================================
                Fin de Formulario Wompi
                =============================================*/
                
                
                
                /*========== Actualizar perfil ==========*/
                
                var settings = {
                        "url": "https://api.agroticnarino.com.co/usuarios?nameId=id_user&id="+idUser,
                        "method": "PUT",
                        "timeout": 0,
                        "headers": {
                            "Content-Type": "application/x-www-form-urlencoded"
                        },
                        "data": {
                            "names": nombre,
                            "lastnames": apellido,
                            "phone": telefono,
                            "address": direccion,
                            "email": emailOrder,
                            "identificacion": identification,
                            "id_municipality_user": idMunicipality
                            
                        }
                    };
                    //console.log("settings data: ", settings.data)
                    $.ajax(settings).done(function (response) {
                        //console.log("ajaxxx");
                        if(response.status == 200){
                            //console.log("response: ", response)
                            //fncSweetAlert("perfilOk", "Sus datos personales han sido actualizados correctamente",)
        
                            //window.location = "";
                        }else{
                            //console.log("perfil errorrrr!!!!!!!!")
        
                        }
                        
        
                    });
                
                /*================fin actualizar perfil================*/
                
                
                crearOrdenWompiMC2();
                fncSweetAlert("html", formWompi, null);
            }
        });
        
        return false;
        
        

        

    }else{

        return false;

    }
}







/*function crearOrden(){
/* ============= Crear orden en base de datos ============*/

//-----Traer cookies-----
/*    var myCookies = document.cookie;
    var listCookies = myCookies.split(";");

    for(const i in listCookies){

        // Si list es superior a -1 es porque encontró la cookie

        if(listCookies[i].search("listSC") > -1){

            var detailsOrder = JSON.parse(listCookies[i].split("=")[1]);

        }else if ((listCookies[i].search("selectCity") > -1)){

            var cityOrder = listCookies[i].split("=")[1];
        }

    }   
    
 

/* ============= Crear orden Wompi en base de datos ============*/
function crearOrdenWompi(){

    //Valor total a pagar
    var priceOrder = valoraPagar;
    //Traemos id de usuario
    let idUsua = document.getElementById("idusua").value;
    //Traemos valor de ciudad almacenada en cookie
    var cityOrder = document.getElementById("inputSelectCity").value;
    
        
        
    //Obtener detalles de la compra y Eliminar \ del arreglo
    let detailsOrder = detallesCompra;
    //Convertirlo en objeto
    //detailsOrder= JSON.parse(detailsOrder);
        
    //----- Actualizar ventas de productos------
    for(const i in detailsOrder){

        var settings = {
            "url": $("#urlApi").val()+"productos_dpto_narino?linkTo=id_product&equalTo="+detailsOrder[i].product,
            "method": "GET",
            "timeout": 0,
        };
        
        $.ajax(settings).done(function (response){
        
            
            if(response.status == 200){
                var sales = parseInt(response.results[0].sales)+1;
                var settings = {
                    "url": $("#urlApi").val()+"productos_dpto_narino?nameId=id_product&id="+detailsOrder[i].product,
                    "method": "PUT",
                    "timeout": 0,
                    "headers": {
                        "Content-Type": "application/x-www-form-urlencoded"
                    },
                    "data": {
                        "sales": sales,
                    }
                };
    
                $.ajax(settings).done(function (response) {
                    if(response.status == 200){
                        //console.log("sales actualizada");
                    }
                });
                


            }
        });

    }
    //Fin actualización de ventas
        
    //Capturar dirección 
    let addressOrder = document.getElementById("address").value;
    //Capturar email
    let emailOrder = document.getElementById("inputEmail").value;
    //Capturar costo domicilio
    let sCost = document.getElementById("priceDom").value;
    //Capturar telefono
    let phoneOrder = document.getElementById("phoneOrder").value;
    //Generar fecha en formato 12 horas
    let dateOrder = formatDate(new Date());
    //nombre comprador
    let nombre = document.getElementById("firstName").value;
    //Apellido comprador
    let apellido = document.getElementById("lastName").value;
    let identification = document.getElementById("identifiation_").value;
    
    if (metodoEnvio == "recoger"){
        var sMetodo="Recoger en PackingH";
        sCost=0;
    }else{
        var sMetodo="Servicio domicilio";
        sCost="Tabla de costo de envío";
    }
        
    var funcionarioInput = document.getElementById("searchFuncionario");
    // Si funcionarioInput existe, accedemos a su propiedad value y la asignamos a la variable funcionario.
    //De lo contrario, asignamos una cadena vacía a funcionario.
    var funcionario = funcionarioInput ? funcionarioInput.value : "";
    if (funcionario === "1") {
        var secretaria = document.getElementById("selectSecretaria").value;
    }else {
        var secretaria = "No aplica";

    }
        
        
    
    //Crear orden, organizar variables para almacenar en BD
    var settings = {
        "url": $("#urlApi").val()+"orders",
        "method": "POST",
        "timeout": 0,
        "headers": {
            "Content-Type": "application/x-www-form-urlencoded"
        },
        "data": {
            "status":"Pendiente",
            "id_municipality": cityOrder,
            "referenceCode": referenceCode,
            "id_user_order": idUsua,
            "name_user": nombre + ' ' + apellido,
            "identification_user": identification,
            "funcionario": "NA", //funcionario....Cambiar si se habilita select de funcionario
            "secretaria": "NA",//secretaria....Cambiar
            "price": priceOrder,
            "details": JSON.stringify(detailsOrder),
            "email": emailOrder,
            "phone": phoneOrder,
            "date_created_order": dateOrder,
            "address": addressOrder,
            "shipping_method": sMetodo,
            "shipping_cost": sCost,
        }
    };
        
    //Almacenar en BD
    $.ajax(settings).done(function (response) {
        if(response.status == 200){
        }

    });

}

/* ============= Crear orden en base de datos para mercados campesinos============*/
function crearOrdenWompiMC(){
    
    //Valor total a pagar
    var inputCantidad = document.getElementById('input_cantidad1').value;
    
    
    //Traer precio del mercado
    var settings = {
            "url": "https://api.agroticnarino.com.co/mercados_campesinos?linkTo=id&equalTo=1",
            "method": "GET",
            "timeout": 0
    };
    
    $.ajax(settings).done(function (response){
        
        if(response.status == 200){
     
            var precio=JSON.parse(response.results[0]["precio"]);
            var priceOrder =  inputCantidad*precio;
            //Obtener detalles de la compra y Eliminar \ del arreglo
            let detailsOrder = detallesCompra;
            //Modificar cantidad y precio a arreglo de detalles
            var detalle = detailsOrder[0];
            detalle.subtotal1 = priceOrder;
            detalle.subtotal2 = priceOrder;
            // Actualiza los campos deseados
            detalle.cantidad = inputCantidad;
            //Traemos id de usuario
            let idUsua = document.getElementById("idusua").value;
            //Capturar dirección 
            let addressOrder = document.getElementById("address").value;
            //Capturar email
            let emailOrder = document.getElementById("inputEmail").value;
            //Capturar costo domicilio
            let sCost = document.getElementById("priceDom").value;
            //Capturar telefono
            let phoneOrder = document.getElementById("phoneOrder").value;
            //Capturar telefono
            let identification = document.getElementById("identifiation_").value;
            //Generar fecha en formato 12 horas
            let dateOrder = formatDate(new Date());
            
            if (metodoEnvio == "recoger"){
                var sMetodo="Recoger en PackingH";
                sCost=0;
            }else{
                var sMetodo="Servicio domicilio";
                sCost="Tabla de costo de envío";
            }
            
            //nombre comprador
            let nombre = document.getElementById("firstName").value;
            //Apellido comprador
            let apellido = document.getElementById("lastName").value;
     
            //Crear orden, organizar variables para almacenar en BD
            var settings = {
                "url": $("#urlApi").val()+"orders",
                "method": "POST",
                "timeout": 0,
                "headers": {
                    "Content-Type": "application/x-www-form-urlencoded"
                },
                "data": {
                    "status":"Pendiente",
                    "id_municipality": "28",
                    "referenceCode": referenceCode,
                    "id_user_order": idUsua,
                    "name_user": nombre + ' ' + apellido,
                    "identification_user": identification,
                    "funcionario": "NA", //funcionario....Cambiar si se habilita select de funcionario
                    "secretaria": "NA",//secretaria....Cambiar
                    "price": priceOrder,
                    "details": JSON.stringify(detailsOrder),
                    "email": emailOrder,
                    "phone": phoneOrder,
                    "date_created_order": dateOrder,
                    "address": addressOrder,
                    "shipping_method": sMetodo,
                    "shipping_cost": sCost,
                }
            };
                
            //Almacenar en BD
            $.ajax(settings).done(function (response) {
                if(response.status == 200){
                }
        
            });
     
        }
    });
}


/* ============= Crear orden en base de datos para mercados campesinos============*/
function crearOrdenWompiMC2(){
    
    //Valor total a pagar
    var inputCantidad = document.getElementById('input_cantidad1').value;
    
    //Traer precio del mercado
    var settings = {
            "url": "https://api.agroticnarino.com.co/mercados_campesinos?linkTo=id&equalTo=2",
            "method": "GET",
            "timeout": 0
    };
    
    $.ajax(settings).done(function (response){
        
        if(response.status == 200){
     
            var precio=JSON.parse(response.results[0]["precio"]);
            var priceOrder =  inputCantidad*precio;
            //Traemos id de usuario
            let idUsua = document.getElementById("idusua").value;
            //Traemos valor de ciudad almacenada en cookie
            //var cityOrder = valorCookie("selectCity");
                
                
            //Obtener detalles de la compra y Eliminar \ del arreglo
            let detailsOrder = detallesCompra;
            
            //Modificar cantidad y precio a arreglo de detalles
            var detalle = detailsOrder[0];
            // Actualiza los campos deseados
        
            detalle.cantidad = inputCantidad;
            detalle.subtotal1 = priceOrder;
            detalle.subtotal2 = priceOrder;
             
            //Capturar dirección 
            let addressOrder = document.getElementById("address").value;
            //Capturar email
            let emailOrder = document.getElementById("inputEmail").value;
            //Capturar costo domicilio
            let sCost = document.getElementById("priceDom").value;
            //Capturar telefono
            let phoneOrder = document.getElementById("phoneOrder").value;
            //Capturar telefono
            let identification = document.getElementById("identifiation_").value;
            //Generar fecha en formato 12 horas
            let dateOrder = formatDate(new Date());
            
            if (metodoEnvio == "recoger"){
                var sMetodo="Recoger en PackingH";
                sCost=0;
            }else{
                var sMetodo="Servicio domicilio";
                sCost="Tabla de costo de envío";
            }
                
            //Capturar si es funcionario de gobernación (Mercados campesinos)
            var funcionarioInput = document.getElementById("searchFuncionario");
            // Si funcionarioInput existe, accedemos a su propiedad value y la asignamos a la variable funcionario.
            //De lo contrario, asignamos una cadena vacía a funcionario.
            var funcionario = funcionarioInput ? funcionarioInput.value : "";
            //Capturamos secretaría si es usuario es funcionario
            if (funcionario === "1") {
                var secretaria = document.getElementById("selectSecretaria").value;
            }else {
                var secretaria = "No aplica";
                funcionario = "NA";
            }
            
            //nombre comprador
            let nombre = document.getElementById("firstName").value;
            //Apellido comprador
            let apellido = document.getElementById("lastName").value;
        
            //Crear orden, organizar variables para almacenar en BD
            var settings = {
                "url": $("#urlApi").val()+"orders",
                "method": "POST",
                "timeout": 0,
                "headers": {
                    "Content-Type": "application/x-www-form-urlencoded"
                },
                "data": {
                    "status":"Pendiente",
                    "id_municipality": "28",
                    "referenceCode": referenceCode,
                    "id_user_order": idUsua,
                    "name_user": nombre + ' ' + apellido,
                    "identification_user": identification,
                    "funcionario": "NA", //funcionario....Cambiar si se habilita select de funcionario
                    "secretaria": "NA",//secretaria....Cambiar
                    "price": priceOrder,
                    "details": JSON.stringify(detailsOrder),
                    "email": emailOrder,
                    "phone": phoneOrder,
                    "date_created_order": dateOrder,
                    "address": addressOrder,
                    "shipping_method": sMetodo,
                    "shipping_cost": sCost,
                }
            };
            //Almacenar en BD
            $.ajax(settings).done(function (response) {
                if(response.status == 200){
                }
            });
        }
    });
}




// --============ Función para actualizar datos del perfil de usuario================
function guardarPerfil(){

        var forms = document.getElementsByClassName('needs-validation');
        var validation = Array.prototype.filter.call(forms, function(form) { 
    
            if (form.checkValidity()){
                
                return [""];
            }
    
        })
    
        if(validation.length > 0){ 

            //console.log("ingresó");
            let idUser = $(".namesUsu").attr("idUsuer");
            let names = document.getElementById("namesUsu").value;
            let lastnames = document.getElementById("lastnamesUsu").value;
            let phone = document.getElementById("phoneUsu").value;
            let email = document.getElementById("emailUsu").value;
            let idMunicipality = document.getElementById("idMunicipalityUsu").value;
            let address = document.getElementById("addressUsu").value;

            var settings = {
                "url": $("#urlApi").val()+"usuarios?nameId=id_user&id="+idUser,
                "method": "PUT",
                "timeout": 0,
                "headers": {
                    "Content-Type": "application/x-www-form-urlencoded"
                },
                "data": {
                    "names": names,
                    "lastnames": lastnames,
                    "phone": phone,
                    "address": address,
                    "email": email,
                    "id_municipality_user": idMunicipality
                }
            };
            //console.log("settings data: ", settings.data)
            $.ajax(settings).done(function (response) {
                //console.log("ajaxxx");
                if(response.status == 200){
                    //console.log("response: ", response)
                    fncSweetAlert("perfilOk", "Sus datos personales han sido actualizados correctamente",)

                    //window.location = "";
                }else{
                    //console.log("perfil errorrrr!!!!!!!!")

                }
                

            });
            return false;

        }else{
            return false;
        }

    
}



/// =============== Función para cambiar contraseña ====================================
function cambiarContraseña(){
    //console.log("cambiar contraseña");
    var idUser = $(".namesUsu").attr("idUsuer");
    var forms = document.getElementsByClassName('needs-validation');
    var validation = Array.prototype.filter.call(forms, function(form) { 

        if (form.checkValidity()){
            
            return [""];
        }

    })

    if(validation.length > 0){ 
        var idUser = $(".namesUsu").attr("idUsuer");
        let wet = document.getElementById("passUser").value;
        let wetNew = document.getElementById("passUserNew").value;
        $.post('/actPass.php',{idU:idUser,passold:wet,passnew:wetNew},function(data){
                if(data!=null){
                    //console.log("respuesta: ",data);
               }
            
        });

        /*var settings = {
            "url": $("#urlApi").val()+"usuarios?linkTo=id_user&equalTo="+idUser,
            "method": "GET",
            "timeout": 0,
        }*/
        //console.log("settings: ",settings);

        /*$.ajax(settings).done(function (response) {
        
            var pass = response.results[0].password;
            //console.log("response: ",response);
            
            if(response.status == 200){
                //console.log("response if: ",response);
                
                let wet = document.getElementById("passUser").value;
                //console.log("wet: ",wet);

                wet = hex_md5(wet);
                //console.log("wetmd5: ",wet);

                


                /*let wetNew = document.getElementById("passUserNew").value;
                wetNew = hex_md5(wetNew);

                if(wet == pass){
                    //console.log("correcto");
                    var settings = {
                        "url": $("#urlApi").val()+"usuarios?nameId=id_user&id="+idUser,
                        "method": "PUT",
                        "timeout": 0,
                        "headers": {
                            "Content-Type": "application/x-www-form-urlencoded"
                        },
                        "data": {
                            "password": wetNew,
                        }
                    };
        
                    $.ajax(settings).done(function (response) {
                        

                        if(response.status == 200){
                            //console.log("perfil actualizado!!!!!!!!")
                            fncSweetAlert("passOk", "Su contraseña ha sido atualizada correctamente",)

                        }
                    
                    })

                }else{

                    fncSweetAlert("errorpass", "Por favor, verifique su contraseña", null)


                }*/
            //}
        
        //})
        return false;
    }else{
        return false;
    }


}


//Función para seleccionar la key de la orden
function selectkey(key){
    setCookie("ko", key, 0.2);
}


//Barra de progreso para página mycount
    var stat = $(".sta").attr("st");
    //console.log("status inicial: ", stat);

    const one = document.querySelector(".one");
    const two = document.querySelector(".two");
    const three = document.querySelector(".three");
    const four = document.querySelector(".four");
    const five = document.querySelector(".five");

    if(stat == "Aprobado"){
        //console.log("stat", stat);

        one.classList.add("active");
        two.classList.remove("active");
        three.classList.remove("active");
        four.classList.remove("active");
        five.classList.remove("active");

    }else if(stat == "En proceso"){ 
        //console.log("stat", stat);

        one.classList.add("active");
        two.classList.add("active");
        three.classList.add("active");
        four.classList.remove("active");
        five.classList.remove("active");
        
    }else if(stat == "En ruta"){ 
        //console.log("stat", stat);

        one.classList.add("active");
        two.classList.add("active");
        three.classList.add("active");
        four.classList.add("active");
        five.classList.remove("active");
        
    }else if(stat == "Listo para recoger"){ 
        //console.log("stat", stat);

        one.classList.add("active");
        two.classList.add("active");
        three.classList.add("active");
        four.classList.add("active");
        five.classList.remove("active");
        
    }else if(stat == "Entregado"){ 
        //console.log("stat", stat);

        one.classList.add("active");
        two.classList.add("active");
        three.classList.add("active");
        four.classList.add("active");
        five.classList.add("active");
        
    }else if(stat == "Alistamiento"){ 
        //console.log("stat", stat);

        one.classList.add("active");
        two.classList.add("active");
        three.classList.remove("active");
        four.classList.remove("active");
        five.classList.remove("active");
    }