window.onload=function(){
    let modelos = document.getElementsByClassName("nombre_p");
    let precios = document.getElementsByClassName("precio_p");
    let cantidades = document.getElementsByClassName("cantidad_p");
    let cant_p=document.getElementById("cant_p");
    let costos_envios=document.getElementById("costos_envio");
    let subtotal=document.getElementById("subtotal");
    let total=document.getElementById("total");
    let suma=0;
    for(let i = 0; i < cantidades.length; i++){
        suma += parseInt(cantidades[i].value);
    }

    cant_p.innerHTML = suma;
    let suma_costo_envio = 0.0;
    costos_envios.innerHTML = parseFloat(suma_costo_envio);

    let suma_subtotal=0;
    
    for(let i = 0; i < precios.length; i++){
        suma_subtotal += parseInt(precios[i].textContent)*parseInt(cantidades[i].value);
    }

    subtotal.innerHTML = "$ "+parseInt(suma_subtotal);
  
    total.innerHTML = "$ "+ parseInt(suma_subtotal+suma_costo_envio);


}


