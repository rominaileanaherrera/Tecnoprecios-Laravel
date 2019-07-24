window.onload=function(){
    let miDiv= document.querySelector('.py-4');
    console.log(miDiv);
    miDiv.style.backgroundImage="url('/img/fondoAzul.jpg')";

    //var registerForm = document.forms[0]
    let register= document.querySelector('.form')
    //console.log(register.elements.first_name)
    //register.elements.first_name.focus();
    //console.log(register.elements.first_name.value);
    register.onsubmit = function(evento) {
        if (!validateRegister()) {
          evento.preventDefault()
        }else{
          register.submit()
        }
      }
      function validateRegister() {
        let {name, email, password,password_confirm, avatar} = register.elements
        if (!validateName(name)) return false;
        if (!validateEmail(email)) return false;
        if (!validatePassword(password)) return false;
        if (!validatePasswordRepeat(password, password_confirm)) return false;
        if(!validateAvatar(avatar)) return false;
        return true;
        }
        function validateName(name) {
            console.log("Hola");
            let errorName = document.getElementById('errorName');
            if (name.value.length < 1){
              errorName.innerHTML = "Por favor complete el campo Nombre";
              errorName.classList.add('alert-danger');
              name.classList.add('is-invalid');
              return false;
            } else{
              errorName.innerHTML = "";
              errorName.classList.remove('alert-danger');
              name.classList.remove('is-invalid');
              name.classList.add('is-valid');
              register.elements.email.focus();
              return true;
            }
    }
    /* function validateLastName(last_name) {
        let errorLastName = document.getElementById('errorApellido');
        if (last_name.value.length < 1){
          errorLastName.innerHTML = "Por favor complete el campo Apellido";
          errorLastName.classList.add('alert-danger');
          last_name.classList.add('is-invalid');
          return false;
        } else{
          errorLastName.innerHTML = "";
          errorLastName.classList.remove('alert-danger');
          last_name.classList.remove('is-invalid');
          last_name.classList.add('is-valid');
          register.elements.email.focus();
          return true;
        }
    } */
    function validateEmail(email) {
        let re = /^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/
        let error = document.getElementById('errorEmail');
        if (!re.test(email.value)){
          email.classList.add('is-invalid');
          console.log(error);
          error.innerHTML= "Debe colocar un email válido";
          error.classList.add('alert-danger');
          //errorEmail.classList.add('alert-danger');
         // email.addEventListener('change',cambioNombre);
        return false
      }else{
        error.innerHTML= "";
        error.classList.remove('alert-danger');
        email.classList.remove('is-invalid');
        email.classList.add('is-valid');
        register.elements.password.focus()
        return true;
      }
    }
    function validatePassword(password) {
          let re = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/
          let errorPass = document.getElementById('errorPass');
          if (!re.test(password.value)) {
            errorPass.innerHTML = "Debe especificar una contraseña válida";
            errorPass.classList.add('alert-danger');
            password.classList.add('is-invalid');
            return false;
          }else{
            errorPass.innerHTML = "";
            errorPass.classList.remove('alert-danger');
            password.classList.remove('is-invalid');
            password.classList.add('is-valid');
            register.elements.password_confirm.focus();
            // swal('Error', 'Ingrese una contraseña válida', 'error')
            return true;
          }
        }
        function validatePasswordRepeat(password,password_confirm){
          console.log(password.value);
          console.log(password_confirm.value);
          if (password.value != password_confirm.value) {
            errorPass2.innerHTML = "Las conraseñas no coinciden";
            errorPass2.classList.add('alert-danger');
            password_confirm.classList.add('is-invalid');
            return false;
          }else{
            errorPass2.innerHTML = "";
            errorPass2.classList.remove('alert-danger');
            password_confirm.classList.remove('is-invalid');
            password_confirm.classList.add('is-valid');
            register.elements.button.focus();
            return true;
          }
        }
    }
    