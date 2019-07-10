window.onload =function(){
//    alert('Sos mayor de 18 años') ; 

misProductos= document.querySelector('.productos');
// console.log(misProductos); eso es para probar 
misProductos.onclick = function(){
Swal.fire({
    title: 'Aproveche el black Friday!!!!',
    text: '',
    imageUrl: '/img/black-friday-2901748_1920.png',
    imageWidth: 400,
    imageHeight: 400,
    imageAlt: '',
    animation: false
  })  ; 
};

}
