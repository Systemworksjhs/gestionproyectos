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






//Función para seleccionar la key de la orden
function selectkey(key){
    setCookie("ko", key, 0.2);
}

