window.onload =function(){
    let miDiv= document.querySelector('.py-4');
    console.log(miDiv);
    miDiv.style.backgroundImage="url('/img/fondoAzul.jpg')";


    let formulario = document.querySelector('.form');
    formulario.elements.name.focus();
    console.log(formulario.elements);
    formulario.onsubmit = function(e){
        if(!validaciones()){
            e.preventDefault();
        }else{
            formulario.submit();
        }
    }
     function validaciones(){
        //let email = formulario.elements.email.value;
        let {name,email,password,passwordconfirm,avatar} = formulario.elements;
        if(!validarEmail(name)) return false;
        if(!validarEmail(email)) return false;
        if(!validarPassword(password)) return false;
        if(!validarPasswordRepeat(password,passwordconfirm)) return false;
        if(!validarUserName(avatar)) return false;
        return true; 
    }    
    /*function validarEmail(email){
        console.log("Hermano querido estoy en la función");
        console.log(email);
        let errorEmail = document.getElementById('errorEmail');
        let re = /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/;
        if(!re.test(email.value)){
            email.classList.add('is-invalid');
            errorEmail.classList.add('alert-danger');    
            errorEmail.innerHTML = "Email inválido...";
            return false;
        }else{
            errorEmail.innerHTML = "";
            email.classList.remove('is-invalid');
            email.classList.add('is-valid');
            errorEmail.classList.remove('alert-danger');
            formulario.password.focus();
            return true;
        }
    }
    function validarPassword(password){
        
    }
 */


    var name = document.getElementById("name")//si name
    var errorName = document.getElementById("errorName")//si error name

    var errorEmail = document.getElementById("errorEmail")//si error email
    var email = document.getElementById("email")//si email
    var emailRegex = (/^[^@]+@[^@]+\.[a-zA-Z]{2,}$/)//si email regex

    var pasRegex = (/^(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{8,16}$/)//si pass regex
    var password2 = document.getElementById("password-confirm");//si pass-confirm
    var password1 = document.getElementById("password");//si pass
    var errorPass = document.getElementById("errorPass")// si error pass
    var errorPass2 = document.getElementById("errorPass2")//si error pass-confirm

    //var formulario = document.querySelector("#form")//si todo el form

    var avatar= document.getElementById("avatar")//si avatar
    var errorAvatar=document.getElementById("errorAvatar")//si error avatar


   /*  formulario.onsubmit = function(e)
   {
       if (!validaciones()){
        e.preventDefault()
      }
      else{
         formulario.submit
      }
      
   }
         function validaciones() {
 */
//---------------------------nombre-----------------------------------------
if (name.value === "" || name.value === null)
{

    errorName.innerHTML = "El campo nombre no puede quedar vacio"
    errorName.setAttribute("class","invalid-feedback" )
    name.setAttribute("class", "form-control is-invalid")
    name.addEventListener("change", changeName)
    return false;
}


    function changeName(){
    errorName.innerHTML = ""
    errorName.setAttribute("class","" )
    name.setAttribute("class", "form-control")
    return 
   }

   //----------------------------email----------------------------------
   if(email.value === "" || email.value === null)
   {


      errorEmail.innerHTML = "Debe ingresar un email"
      errorEmail.setAttribute("class","invalid-feedback" )
      email.setAttribute("class", "form-control is-invalid")
      email.addEventListener("change", changeEmail)

      return false
   }
   if(email.value === "" || email.value === null || emailRegex.test(email.value)!==true)
     {
        errorEmail.innerHTML = "El  email ingresado no es valido"
        errorEmail.setAttribute("class","invalid-feedback" )
        email.setAttribute("class", "form-control is-invalid")
        email.addEventListener("change", changeEmail)

        return false
     }

   function changeEmail(){
               errorEmail.innerHTML = ""
               errorEmail.setAttribute("class","" )
               email.setAttribute("class", "form-control")
                    }

//--------------------------------------password-------------------------------------


if(password1.value === "" || password1.value === null)
{


   errorPass.innerHTML = "Debe ingresar un contraseña"
   errorPass.setAttribute("class","invalid-feedback" )
   password1.setAttribute("class", "form-control is-invalid")
   password1.addEventListener('change', changePass1)
   return false;

}
if(pasRegex.test(password1.value)!== true)
               {
                  errorPass.innerHTML = "La contraseña ingresada no es valida"
                  errorPass.setAttribute("class","invalid-feedback" )
                  password1.setAttribute("class", "form-control is-invalid")
                  password1.addEventListener('change', changePass1)
                 return false
               }
function changePass1()
{
  errorPass.innerHTML = ""
  errorPass.setAttribute("class","" )
  password1.setAttribute("class", "form-control")
}
  


//--------------------------------------password2------------------------------------


if(password1.value!==password2.value)
{


  errorPass2.innerHTML = "Las contraseñas ingresadas no coinciden"
  errorPass2.setAttribute("class","invalid-feedback" )
  password2.setAttribute("class", "form-control is-invalid")
  password2.addEventListener("change", changePass2)
  return false;

}


function changePass2(){
     
         errorPass2.innerHTML = ""
         errorPass2.setAttribute("class","" )
         password2.setAttribute("class", "form-control")
  }

//--------------------------------AVATAR-----------------------------------------
if(avatar.value === "" || avatar.value === null)
{


   errorAvatar.innerHTML = "Debe seleccionar una imagen"
   errorAvatar.setAttribute("class","invalid-feedback" )
   avatar.setAttribute("class", "form-control is-invalid")
   //avatar.addEventListener("change", changeAva)
   return false;
}
               
/* avatar.addEventListener("change", changeAva)


function changeAva(){
    errorAvatar.innerHTML = ""
    errorAvatar.setAttribute("class","" )
    avatar.setAttribute("class", "form-control")
    return false;
      }
 */
   }




