const formularios_ajax = document.querySelectorAll(".FormularioAjax");

function enviar_formulario_ajax(e){
    e.preventDefault();
    
    let data = new FormData(this);
	let method = this.getAttribute("method");
	let action = this.getAttribute("action");
	let tipo = this.getAttribute("data-form");

}///

formularios_ajax.forEach(formularios=> {
    formularios.addEventListener("submit", enviar_formulario_ajax);
})

function alertas_ajax(alerta){
    if(alerta.Alerta==="simple"){
        Swal.fire({
            title:'alerta.Titulo',
            text: 'alerta.Texto',
            type: 'alerta.Tipo',
            confirmButtonText:'Aceptar'
            
        });

    }else if(alerta.Alerta==="recargar"){
        Swal.fire({
            title:'alerta.Titulo',
            text: 'alerta.Texto',
            type: 'alerta.Tipo',
            confirmButtonText:'Aceptar'
            
          }).then((result) => {
            if(result.value) {
                location.reload();
        
            }
          });

    }else if(alerta.Alerta==="Limpiar"){
        Swal.fire({
            title:'alerta.Titulo',
            text: 'alerta.Texto',
            type: 'alerta.Tipo',
            confirmButtonText:'Aceptar'
            
          }).then((result) => {
            if(result.value) {
                document.querySelector(".FormularioAjax").reset();      
            }
          });
    }else if(alerta.Alerta==="redireccinar"){
        window.location.href=alerta.URL;
    }

}