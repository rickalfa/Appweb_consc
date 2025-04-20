

import { Message_alert, showAlertMessage, showToast } from './alertcomponent';
/**Registro de usuario Asyn */

//funcion para quitar los caracteres de la url actular hasta el primer '/'
// para enviar al usuario registrado a la Url base de la web (home)
function quitarNombreHastaPrimerSlash(url) {
  const lastSlashIndex = url.lastIndexOf('/');
  if (lastSlashIndex !== -1) {
    return url.substring(0, lastSlashIndex);
  } else {
    // Si no hay ningún '/', devolvemos una cadena vacía o la URL original,
    // dependiendo de lo que necesites. Aquí devolvemos una cadena vacía.
    return '';
  }
}

function resetearMensajesError(){

    const formRegister = document.getElementById('form-register');

    if (formRegister) {
      const inputFields = formRegister.querySelectorAll('input');
      const errorMessages = formRegister.querySelectorAll('.error-message');
  
      inputFields.forEach(input => {
        input.addEventListener('focus', () => {
          errorMessages.forEach(error => {
            error.textContent = ''; // Limpiar el texto de todos los mensajes de error
          });
          // O, si quieres ser más específico y limpiar solo el error asociado al input enfocado:
          // const errorContainer = input.nextElementSibling;
          // if (errorContainer && errorContainer.classList.contains('error-message')) {
          //   errorContainer.textContent = '';
          // }
        });
      });
    } else {
      console.warn('No se encontró el formulario con la clase .form-register');
    }
}

console.log(' modulo register ');
    

const loadingComponent = document.getElementById('loadingComponent');

if (loadingComponent) {
    loadingComponent.innerHTML = showAlertMessage('Cargando peticion');

}

const successMessage = document.getElementById('successMessage');
const generalError = document.getElementById('generalError');


try {

    // obetenemos el id del del formulario de registro
    const formregister = document.getElementById('form-register');

    resetearMensajesError();

// Cuando se active el evento submit Ejecutara la funcion asincronica REGISTER
    formregister.addEventListener('submit', 
   
      async function Register(e){  // funcion asincronica para el envio de datos del formulario
        
            e.preventDefault();
        
            console.log(' evento prevenido formulario');

            // obtenemos los datos del formulario
           const formData = new FormData(formregister);

            const nameInput = document.getElementById('name');
            const nameError = nameInput.nextElementSibling; // El div con la clase 'error-message' después del input name
        
            // Validación adicional para el nombre
            if (nameInput.value.trim().length <= 3) {
                nameError.textContent = 'El nombre debe tener más de 3 letras.';
                loadingComponent.classList.add('d-none'); // Ocultar el cargando si hay error
                return; // Detener el envío del formulario
            }


            try {
                const response = await fetch(formregister.action, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': formData.get('_token'), // Incluir el token CSRF
                        'Accept': 'application/json', // Esperar una respuesta JSON
                    },
                    body: formData,
                });
    
                console.log('carga de peticion');

                // Mostrar el componente de carga
                loadingComponent.classList.remove('d-none');
                await new Promise(resolve => setTimeout(resolve, 1000));
       

                const data = await response.json();
             
                if (response.ok) {
                    // Registro exitoso

                     // Ocultar el componente de carga
                    loadingComponent.classList.add('d-none');
    
                    successMessage.textContent = data.message;
                    successMessage.classList.remove('d-none');
    
                   showToast('usuario registrado exitosamente', 'toastComponent');
                    await new Promise(resolve => setTimeout(resolve, 1000));
       

                    // Mostrar los datos del usuario
                    console.log('Usuario registrado:', data.user);
                    // Aquí podrías actualizar la interfaz para mostrar el nombre y email del usuario
                    window.location.hostname;
                    window.location.href;
                    
                    const urlRedirect = quitarNombreHastaPrimerSlash(window.location.href);

                    window.location.replace(urlRedirect);
                } else {
                       // Ocultar el componente de carga
                       loadingComponent.classList.add('d-none');
    
                    // Hubo errores de validación u otro error
                    if (data.errors) {
                        // Mostrar errores de validación específicos por campo
                        console.log('errores : ', data.errors);
                        for (const field in data.errors) {
                            const inputField = formregister.querySelector(`[name="${field}"]`);
                            if (inputField && inputField.nextElementSibling && inputField.nextElementSibling.classList.contains('error-message')) {
                                inputField.nextElementSibling.textContent = data.errors[field].join(', ');
                            }
                        }
                    } else if (data.message) {
                        // Mostrar un mensaje de error general del servidor
                        generalError.textContent = data.message;
                        generalError.classList.remove('d-none');
                    } else {
                        generalError.textContent = 'Ocurrió un error al registrar el usuario.';
                        generalError.classList.remove('d-none');
                    }
                }
    

            } catch (error) {
                console.error('Error en la petición:', error);
                loadingComponent.classList.add('d-none');
                generalError.textContent = 'Ocurrió un error de red.';
                generalError.classList.remove('d-none');
            }
        
        
         
        }
        
        );

    
} catch (error) {
    
    console.log(' elemento form id no found', error);
}




