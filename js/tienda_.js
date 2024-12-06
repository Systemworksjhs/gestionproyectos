/*============= Función de paginación============================*/
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




$(function() {
    pagination();
    
    
});


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

            if(event.keyCode == 13 && $(inputSearch[i]).val() != ""){
            
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








/*============= Función cantidad de productos   ==========*/
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
    
/*============= Fin Función presentación de productos (unidad, libra, kilogramo) ==========*/




/*============= Función presentación de productos  ==========*/

function presentacion(index){
    let presentations = document.getElementById('select_presentation'+index);
    var presentation = presentations.value;
    var arrayPresen = presentation.split(":");
    var precio = arrayPresen[2];
    //console.log("precio",precio);

    // Colocar en span la presentación seleccionada
    document.getElementById('span_presentation').innerText = `${arrayPresen[0]}`.toLowerCase();
    
    //Colocar precio del gramo
    document.getElementById('span_precioGramo').innerText = `${precio}`;
    
    
    // Colocar en span el precio correspondiente a presentación seleccionada
    document.getElementById('span_valorpresentation').innerText = Math.trunc(`${arrayPresen[2]}`*Number(arrayPresen[1]));
    
    //modificarPrecios();
    
    //console.log("arrayPresen",arrayPresen[1]);
    //return;



    
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





/*===================Función para crear alertas ====================================*/

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

        case "info":

		
            Swal.fire({
                icon: 'info',
                title: 'Atención!',
                text: text
            }) 


        break;

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
/*===================Fin Función para crear alertas ====================================*/




/*===================Función para adicionar productos al carrito ====================================*/

function adicionarProductos(idProduct,urlApi,currentUrl,def){

    //Traer campos o información del producto
    var select = "presentation";
    let presv = document.getElementById('select_presentation0');
    //console.log("presentación actual : ",presv.value);
    //console.log("def : ",def);
    let pres = presv.value;
    if (presv.value == "Presentaciones"){
        //console.log("ingresó a if");
        pres = def;
            
    }
        //console.log("pres final: ",pres);
        
    
    
    
    var arrayPresen = pres.split(":");
    //console.log("arrayPresen",arrayPresen);
    //return;

    //Trae información
    var settings = {
        "url": urlApi+"productos_dpto_narino?linkTo=id_product&equalTo="+idProduct+"&select="+select,
        "method": "GET",
        "timeout": 0
    }

    $.ajax(settings).done(function (response) {
    //console.log("settings",settings);
    //return;

        if(response.status == 200){

            
        
            /* Para adicionar más productos Preguntar si la Cookie ya existe*/

            //Seleccionar cookies del navegador
            var myCookies = document.cookie;


            //Enlistar las cookies
            var listCookies = myCookies.split(";");
            var count = 0;
            
            for(const i in listCookies){
                

                //si no encuentra coinsidencia devuelve -1, si la encuentra devuelve 1
                list = listCookies[i].search("listSC");
                
                /* Si list es superior a -1 es porque encontró la cookie*/

                if(list > -1){

                    count--

                    var arrayListSC = JSON.parse(listCookies[i].split("=")[1]);
                    
                }else{
                    // si no encuentra coinsidencias recorre todo el arreglo listCookies
                    count++
                }

            }
            

            /*=============================================
            Trabajamos sobre la cookie que ya existe
            =============================================*/


            //Si encontró coinsidencia, es decir si existe una cookie, ya existen productos agregados
            if(count != listCookies.length){

                if(arrayListSC != undefined){

                    //Preguntar si el producto se repite

                    var count = 0;

                    for(const i in arrayListSC){
                        //console.log("arrayListSC",arrayListSC.length);
                        //return;

                        if(arrayListSC[i].product == idProduct){
                            count--
                        }else{
                            count++
                        }
                        
                    }

                    if(count == arrayListSC.length){

                        arrayListSC.push({

                        "presentation": pres,
                        "product": idProduct,
                        "nombrePres": arrayPresen[0],
                        "gramosPres": arrayPresen[1],
                        "incrementPrice": arrayPresen[2],
                        "cantidad": $("#input_cantidad0").val()
                        
                        })
                        
                        fncSweetAlert(
                            "agregado", 
                            "El producto se adicionó al carrito de compras",
                            currentUrl
                        )

                    }else{

                        fncSweetAlert(
                            "info", 
                            "El producto ya fue adicionado anteriormente",
                            currentUrl
                        ) 
                    }

                    //Creamos cookie actualizada 
                    setCookie("listSC", JSON.stringify(arrayListSC), 1);
                    
                    $.ajax({
                        type: "POST",
                        url: "almacenarOrden.php",
                        data: {
                            listSC: JSON.stringify(arrayListSC)
                        },
                        success: function(response) {
                            //console.log(response);
                        }
                    });
                    
                }

            //Si no encontró coinsidencia quieres decir que no existen cookies sobre productos agregados anteriormente
            }else{

                // Creamos cookie

                var arrayListSC = [];

                arrayListSC.push({

                    "presentation": pres,
                    "product": idProduct,
                    "nombrePres": arrayPresen[0],
                    "gramosPres":arrayPresen[1],
                    "incrementPrice": arrayPresen[2],
                    "cantidad": $("#input_cantidad0").val()
                    
                
                }) 
                

                setCookie("listSC", JSON.stringify(arrayListSC), 1);  
                //console.log("arrayListSC",arrayListSC);
                //return;
                
                $.ajax({
                        type: "POST",
                        url: "almacenarOrden.php",
                        data: {
                            listSC: JSON.stringify(arrayListSC)
                        },
                        success: function(response) {
                            //console.log(response);
                        }
                    });
                    
                fncSweetAlert(
                    "agregado", 
                    "El producto se adicionó al carrito de compras",
                    currentUrl
                ) 

            }

        }

        
    })

}
//================ Fin Función para crear Cookies en JS ====================================





// ==============Función para quitar productos de carrito de compras ==========
function removeProduct(idProduct, currentUrl){

    fncSweetAlert("confirm","¿Está seguro de eliminar este producto?","").then(resp=>{

        if(resp){

            /*=============================================
            Preguntar si la Cookie ya existe
            =============================================*/

            var myCookies = document.cookie;
            var listCookies = myCookies.split(";");
            var count = 0;
            
            for(const i in listCookies){

                list = listCookies[i].search("listSC");
                
                /*=============================================
                Si list es superior a -1 es porque encontró la cookie
                =============================================*/

                if(list > -1){

                    count--

                    var arrayListSC = JSON.parse(listCookies[i].split("=")[1]);

                }else{

                    count++
                }

            }


            /*=============================================
            Trabajamos sobre la cookie que ya existe
            =============================================*/

            if(count != listCookies.length){

                if(arrayListSC != undefined){

                    arrayListSC.forEach((list, index)=>{

                        if(list.product == idProduct){

                            arrayListSC.splice(index, 1); 

                        }    

                    })

                    setCookie("listSC", JSON.stringify(arrayListSC), 1);
                    
                    $.ajax({
                        type: "POST",
                        url: "almacenarOrden.php",
                        data: {
                            listSC: JSON.stringify(arrayListSC)
                        },
                        success: function(response) {
                            //console.log(response);
                        }
                    });

                    fncSweetAlert(
                        "success", 
                        "Producto eliminado del carrito de compras",
                        currentUrl
                    ) 

                }

            }    
        }

    })

}
// ================= Fin para función quitar productos de carrito de compras ==============




//=============Cálculo de subtotal y total============

//var precioproducto = $(".precio_producto");
var price = $(".p_precio_gramo");
var cEnvio = $(".cEnvio");
var subtotal = $(".subtotal");
var subtotal2 = $(".subtotal2");
var precioP = 0;
var idp= $(".listSC");


//console.log("price",price);

function modificarPrecios(){
    
    var valorsubtotal =0;
    var valorsubtotal2=0;
    var total = $(".total");
    var canti = 0;
    var precioGramo =0;
    var arrayListSC = [];
    
    
    
    
    
    
    if(price.length > 0) {
        
        price.each(function(i){

            
            //Capturamos la presentación
            let presentations = document.getElementById('select_presentation'+i);
            var presenta = presentations.value;
            
            //console.log("presenta",presenta);

            //convertimos en array (1 kilo:1000:2.14)
            var arrayPresen = presenta.split(":");
            
            
            
            //Nombre de presentación
            var nompres = arrayPresen[0];

            //Gramos de presentacón
            var grapres = Number(arrayPresen[1]);
            
            //Precio del gramo
            precioGramo = Number(arrayPresen[2]);
            
            //Capturamos la cantidad
            var cant= $("#input_cantidad"+i);

            //Actualizar en pantalla el precio del gramo
            //$(price[i]).html(precioGramo);
            $(price[i]).html(precioGramo);

            //Precio del gramo
            //precioGramo = Number($(price[i]).html());

            //Precio del producto individual = gramos de presentación * precio del gramo
            precioP = Math.round(grapres*precioGramo);
            
            //Actualiza en pantalla el precio del producto individual
            //$(precioproducto[i]).html(precioP);

            //se asigna a la variable el valor de la cantidad
            canti = Number($(cant[0]).val());

            //Se calcula el valor del subtotal por cada producto
            valorsubtotal = Math.round(precioP*canti);

            //se ectualiza en pantalla el valor de subtotal por cada producto
            $(subtotal[i]).html(valorsubtotal);

            //Se suman los subtotales de cada producto para calcular el TOTAL
            valorsubtotal2 += valorsubtotal;
            

            //Actualizar cookie
            arrayListSC.push({
                "product": $(idp[i]).attr("idp"),
                "nameProduct":$(idp[i]).attr("np"),
                "incrementPrice": precioGramo,
                "presentation": presenta,
                "nombrePres": nompres,
                "gramosPres": grapres,
                "precio": precioP,
                "cantidad": canti,
                "subtotal1": valorsubtotal,
                "subtotal2": valorsubtotal2
                
                            
            })
           

            //console.log("arrayListSC",arrayListSC);
            //return;


        
            
        })
        $(subtotal2).html(valorsubtotal2);
        $(total).html(valorsubtotal2);
        //console.log("arrayListSC",arrayListSC);

        //Actualizar variable SESSION
        $.ajax({
            type: "POST",
            url: "almacenarOrden.php",
            data: {
                listSC: JSON.stringify(arrayListSC)
            },
            success: function(response) {
                //console.log(response);
            }
        });
        
        //Actualizar cookies
        setCookie("listSC", JSON.stringify(arrayListSC),1)
        
         
        
        
        
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
    
            /*const configuracion = {
                title: varTitle,
                html: '<p>',
                icon: "info",
                showCancelButton: false,
                cancelButtonText: "Entiendo"
            };*/

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


modificarPrecios();
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


function selectCity(city){

    
    //Seleccionar cookies del navegador
    var myCookies = document.cookie;


    //Enlistar las cookies
    var listCookies = myCookies.split(";");
    var count = 0;
    
    for(const i in listCookies){
        

        //Recorre todas las cookies buscando si alguna tiene el nombre selectCity
        list = listCookies[i].search("selectCity");
        
        /* Si list es superior a -1 es porque encontró la cookie*/
        

        if(list > -1){

            //Encuentra (selectCity=28)
            //console.log("listCookies[i]",listCookies[i]);

            count--
            //Almacena la cookie selectCity después del igual (28)
            var findCity = JSON.parse(listCookies[i].split("=")[1]);
            
        }else{
            // si no encuentra coinsidencias recorre todo el arreglo listCookies y count es igual al tamaño 
            // de listCookies
            count++
        }

    }
    

    /*=============================================
    Trabajamos sobre la cookie que ya existe
    =============================================*/
    

    //Si count es diferente al tamaño de listCookies es por que si existe una cookie selectCity
    if(count != listCookies.length){


        //Preguntar si la ciudad se repite
        if(findCity == city){
            setCookie("selectCity", city,1)
                
        }else{
            var arrayListSC = [];
            setCookie("listSC", arrayListSC, 0);
            setCookie("selectCity", city,1)
        }

    //No existe cookies selectCity, entonces simplemente se crea
    }else{
        setCookie("selectCity", city,1);
    }
    
    

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
    

    var forms = document.getElementsByClassName('needs-validation');

    var validation = Array.prototype.filter.call(forms, function(form) { 

        if (form.checkValidity()){
            
            return [""];
        }

    })

    if(validation.length > 0){ 
        
            
        /*=============================================
        Inicio de Variables de Payu
        =============================================*/

        /*var action = "https://checkout.payulatam.com/ppp-web-gateway-payu/";
        
        var merchantId =982368;
        var accountId =990419;
        var apiKey ="k0laeJ4rTQPWa5Dw6x275TtvYe";

        // Valor total a pagar
        var total = $(".granTotal").attr("granTotal");
        
        //Gererar un código de referencia aleatorio
        var referenceCode = parseInt((document.getElementById("refCode").value),10)+1;
        

        //Crear la descripción de la compra: nombre de producto, cantidad y presentación
        var nameProduct = $(".name_product");
        var cantProduct = $(".cant_product");
        var presentationProduct = $(".presentation_product");
        var description = "";

        nameProduct.each(i=>{

            description += $(nameProduct[i]).html() +": "+$(cantProduct[i]).html()+$(presentationProduct[i]).html()+", "
                    
        })
        description = description.slice(0, -2);
        
        //Encriptar md5
        var signature = hex_md5(apiKey+"~"+merchantId+"~"+referenceCode+"~"+total+"~COP");
        
        //Variable test colocar 1 para prueba y 0 para producción.
        var test = 0;

        var url = $("#url").val()+"checkout";
        var ciudad = $(".input_ciudad").attr("ciu");
        let direccion = document.getElementById("address").value;
        let emailOrder = document.getElementById("inputEmail").value;

        //console.log("action:",action);
        //console.log("merchantId:",merchantId);
        //console.log("accountId:",accountId);
        //console.log("description:",description);
        //console.log("referenceCode:",referenceCode);
        //console.log("total:",total);
        //console.log("signature:",signature);
        //console.log("test:",test);
        //console.log("emailOrder:",emailOrder);
        //console.log("url:",url);
        //console.log("direccion:",direccion);
        //console.log("ciudad:",ciudad);
        //console.log("apiKey:",apiKey);
        /*=============================================
        Fin de Variables Payu
        =============================================*/
        
        
        
        /*=============================================
        Inicio de formulario Payu
        =============================================*/
 
        /*var formPayu = `
            <form method="post" action="`+action+`">
                <div>
                <img src="images/payu.png" style="width:200px" />
                </div>
                <input name="merchantId"    type="hidden"  value="`+merchantId+`">
                <input name="accountId"     type="hidden"  value="`+accountId+`">
                <input name="description"   type="hidden"  value="`+description+`">
                <input name="referenceCode" type="hidden"  value="`+referenceCode+`">
                <input name="amount"        type="hidden"  value="`+total+`">
                <input name="tax"           type="hidden"  value="0">
                <input name="taxReturnBase" type="hidden"  value="0">
                <input name="currency"      type="hidden"  value="COP">
                <input name="signature"     type="hidden"  value="`+signature+`">
                <input name="test"          type="hidden"  value="`+test+`" >
                <input name="buyerEmail"    type="hidden"  value="`+emailOrder+`">
                <input name="responseUrl"    type="hidden"  value="`+url+`">
                <input name="confirmationUrl"    type="hidden"  value="`+url+`">
                <input name="shippingAddress"    type="hidden"  value="`+direccion+`">
                <input name="shippingCity"       type="hidden"  value="`+ciudad+`">
                
                <div class="justify-content-center">
                    <input name="Submit" class="btn py-0 px-4 mb-2 rounded-3 btn-primary" type="submit" value="Pagar" style="color: #ffffff; font-size: 1rem;">
                </div>

            </form>`;
        fncSweetAlert("html", formPayu, null);
        
        /*=============================================
        Fin de Formulario Payu
        =============================================*/
        
       //----------------------------------------------------------------- 
        
        
        
        
        /*=============================================
        Inicio de Variables Wompi
        =============================================*/
        // Valor total a pagar
        let total =  document.getElementById("granTotall").value;
        total = parseInt(total,10)*100;
        
        //Gererar un código de referencia aleatorio
        //var referenceCode = parseInt((document.getElementById("refCode").value),10)+1;
        referenceCode = Math.ceil(Math.random()*10000000);
        setCookie("views",referenceCode,0.1);
        
        //console.log("referenceCode:",referenceCode);

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
          <input type="hidden" name="redirect-url" value="https://gestionproyectos.narino.gov.co/checkout" />
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
        
        crearOrdenWompi();
        
        //Verificar si existe cookie
        var myCookies = document.cookie;
        var listCookies = myCookies.split(";");
        var encuentracookie = 0;
        
        for(const i in listCookies){
    
            // Si list es superior a -1 es porque encontró la cookie
    
            if(listCookies[i].search("listSC") > -1){
    
                fncSweetAlert("html", formWompi, null);
                var encuentracookie = 1;
            
            }
    
        }
        if(encuentracookie == 0){
    
                fncSweetAlert("aviso2","Querido cliente, el tiempo para realizar su compra ha expirado, por favor vuelva a seleccionar sus productos", null);
        }
        
        /*=============================================
        Fin de Formulario Wompi
        =============================================*/


        
        return false;







    }else{

        return false;

    }
}




function checkoutMercadoCampesino(){

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
        let total =  document.getElementById("granTotall").value;;
        total = parseInt(total,10)*100;
        
        //Gererar un código de referencia aleatorio
        //var referenceCode = parseInt((document.getElementById("refCode").value),10)+1;
        referenceCode = Math.ceil(Math.random()*10000000);
        setCookie("views",referenceCode,0.1);
        
        //console.log("referenceCode:",referenceCode);

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
          <input type="hidden" name="redirect-url" value="https://gestionproyectos.narino.gov.co/checkout" />
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
        
        crearOrdenWompiMC();
 
    
        fncSweetAlert("html", formWompi, null);
                
        
        
        /*=============================================
        Fin de Formulario Wompi
        =============================================*/

        return false;

    }else{

        return false;

    }
}








function crearOrden(){
/* ============= Crear orden en base de datos ============*/

//-----Traer cookies-----
    var myCookies = document.cookie;
    var listCookies = myCookies.split(";");

    for(const i in listCookies){

        // Si list es superior a -1 es porque encontró la cookie

        if(listCookies[i].search("listSC") > -1){

            var detailsOrder = JSON.parse(listCookies[i].split("=")[1]);

        }else if ((listCookies[i].search("selectCity") > -1)){

            var cityOrder = listCookies[i].split("=")[1];
        }

    }   
    
    

    //----- Actualizar sales de productos------
    //Traer número de sales de cada producto
    for(const i in detailsOrder){

        var settings = {
            "url": $("#urlApi").val()+"productos_dpto_narino?linkTo=id_product&equalTo="+detailsOrder[i].product,
            "method": "GET",
            "timeout": 0,
        };
        
        $.ajax(settings).done(function (response){
        
            
            if(response.status == 200){
                var sales = response.results[0].sales;
                sales = parseInt(sales)+1;
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
    

    //Capturar total, dirección, email, código de referencia, código pol
    var priceOrder = $(".granTotal").attr("granTotal");
    let addressOrder = document.getElementById("address").value;
    let emailOrder = document.getElementById("inputEmail").value;
    //let referenceCode = document.getElementById("referenceCode").value;
    //let reference_pol = document.getElementById("reference_pol").value;
    let phoneOrder = document.getElementById("phoneOrder").value;
    var dateOrder = formatDate(new Date());



    var settings = {
        "url": $("#urlApi").val()+"orders",
        "method": "POST",
        "timeout": 0,
        "headers": {
            "Content-Type": "application/x-www-form-urlencoded"
        },
        "data": {
            "status":"aprobado",
            "id_municipality": cityOrder,
            "referenceCode": referenceCode,
            "reference_pol": reference_pol,
            "id_user_order":"1",
            "price": priceOrder,
            "details": JSON.stringify(detailsOrder),
            "email": emailOrder,
            "phone": phoneOrder,
            "date_created_order": dateOrder,
            "address": addressOrder,
        }
    };
    //console.log("settings", settings);

    $.ajax(settings).done(function (response) {
        //console.log("response",response);

        if(response.status == 200){
            //console.log("Orden creadaaa!!!!!!!!!!!!!");
            
            setCookie("listSC",0, 0);
            //console.log("Cookies borradas!!!!!!!!!!!!!");
            fncSweetAlert("compraOk", "Puede hacer seguimiento de su compra ingresando a 'Mi cuenta'",)
            //window.location = "tienda";
            //return false;
        }

    })
}




//Respaldo de ordenes
function respaldoOrder(){
    var myCookies = document.cookie;
    var listCookies = myCookies.split(";");
    var priceOrder = $(".granTotal").attr("granTotal");
    let idUsua = document.getElementById("idusua").value;
    
        for(const i in listCookies){
    
            // Si list es superior a -1 es porque encontró la cookie
    
            if(listCookies[i].search("listSC") > -1){
    
                //var detailsOrder1 = JSON.parse(listCookies[i].split("=")[1]);
    
            }else if ((listCookies[i].search("selectCity") > -1)){
    
                var cityOrder = listCookies[i].split("=")[1];
            }
    
        }  
        
        let detailsOrder = JSON.parse(document.getElementById("listSC").value);
        
        
        // Respaldo ordenes
        
        var settings = {
            "url": $("#urlApi").val()+"respaldo_ordenes",
            "method": "POST",
            "timeout": 0,
            "headers": {
                "Content-Type": "application/x-www-form-urlencoded"
            },
            "data": {
                
                "usuario": idUsua,
                "detalles": detailsOrder,
                "valor_total": priceOrder,
                "codigo_referencia": referenceCode,
                
    
            }
        };

        $.ajax(settings).done(function (response) {
            //console.log("response",response);
    
            if(response.status == 200){
      
            }
    
        });
}






function crearOrdenWompi(){
/* ============= Crear orden en base de datos ============*/

//-----Traer cookies-----
    var myCookies = document.cookie;
    var listCookies = myCookies.split(";");
    var priceOrder = $(".granTotal").attr("granTotal");
    let idUsua = document.getElementById("idusua").value;
    
        for(const i in listCookies){
    
            // Si list es superior a -1 es porque encontró la cookie
    
            if(listCookies[i].search("listSC") > -1){
    
                //var detailsOrder = JSON.parse(listCookies[i].split("=")[1]);
    
            }else if ((listCookies[i].search("selectCity") > -1)){
    
                var cityOrder = listCookies[i].split("=")[1];
            }
    
        }
        
        //Obtener detalles de la compra y Eliminar \ del arreglo
        let detailsOrder = JSON.parse(document.getElementById("listSC").value);
        //Convertirlo en objeto
        detailsOrder= JSON.parse(detailsOrder);
        
        //----- Actualizar ventas de productos------
        //Traer número de sales de cada producto
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
        
        //Capturar total, dirección, email, código de referencia, código pol
        let addressOrder = document.getElementById("address").value;
        let emailOrder = document.getElementById("inputEmail").value;
        //var referenceCod = parseInt((document.getElementById("refCode").value),10)+1;
        //var referenceCode = referenceCod.toString();
        let sCost = document.getElementById("priceDom").value;
        
        let phoneOrder = document.getElementById("phoneOrder").value;
        let dateOrder = formatDate(new Date());
        
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
                "funcionario": funcionario,
                "secretaria": secretaria,
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

function crearOrdenWompiMC(){
/* ============= Crear orden en base de datos ============*/

//-----Traer cookies-----
    var myCookies = document.cookie;
    var listCookies = myCookies.split(";");
    var priceOrder = $(".granTotal").attr("granTotal");
    let idUsua = document.getElementById("idusua").value;
    
        for(const i in listCookies){
    
            // Si list es superior a -1 es porque encontró la cookie
    
            if(listCookies[i].search("listSC") > -1){
    
                //var detailsOrder = JSON.parse(listCookies[i].split("=")[1]);
    
            }else if ((listCookies[i].search("selectCity") > -1)){
    
                var cityOrder = listCookies[i].split("=")[1];
            }
    
        }
        
        //Obtener detalles de la compra y Eliminar \ del arreglo
        let detailsOrder = JSON.parse(document.getElementById("listSC").value);
        //Convertirlo en objeto
        detailsOrder= JSON.parse(detailsOrder);
        
        //----- Actualizar ventas de productos------
        //Traer número de sales de cada producto
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
        
        //Capturar total, dirección, email, código de referencia, código pol
        let addressOrder = document.getElementById("address").value;
        let emailOrder = document.getElementById("inputEmail").value;
        //var referenceCod = parseInt((document.getElementById("refCode").value),10)+1;
        //var referenceCode = referenceCod.toString();
        let sCost = document.getElementById("priceDom").value;
        
        let phoneOrder = document.getElementById("phoneOrder").value;
        let dateOrder = formatDate(new Date());
        
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
                "id_municipality": "64",
                "referenceCode": referenceCode,
                "id_user_order": idUsua,
                "funcionario": funcionario,
                "secretaria": secretaria,
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




// ------- Función para actualizar datos del perfil de usuario

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