


export const Message_alert = `<div class="alert alert-info" role="alert">
  A simple info alert—check it out!
</div>`;




export function showAlertMessage(message){


let Message_alert = '<div class="alert alert-info" role="alert">   <div class="spinner-border text-primary" role="status"> <span class="visually-hidden">Cargando...</span>  </div>'
+message+'</div>';

return Message_alert;

}

export function showToast(message, id_toast){

    const toastComponent = document.getElementById(id_toast);



    let toast_message = `<div class="position-fixed top-2 end-0 p-3" style="z-index: 11">
    <div id="liveToast" class="toast show text-bg-success" role="alert" aria-live="assertive" aria-atomic="true">
      <div class="toast-header">
        <strong class="me-auto">Notificación</strong>
        <small>now</small>
        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Cerrar"></button>
      </div>
      <div class="toast-body">
        ${message}
      </div>
    </div>
  </div>`;

  toastComponent.innerHTML = toast_message;

}

