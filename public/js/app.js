
/* 
Peticion de Rutas disponibles
*/
function getRutas() {
    let origen = document.getElementById("origen").value;
    let destino = document.getElementById("destino").value;
    let fechaSalida = document.getElementById("FSalida").value;

    let div = document.getElementById('wRutas');
    let msg = document.getElementById('msgWRutas');
    //console.log(origen, destino, fechaSalida);

    if ( origen == destino ) {
        div.classList.remove('d-none');
        div.classList.add('d-block');
    }else if( fechaSalida == '' ){
        div.classList.remove('d-none');
        div.classList.add('d-block');
        msg.innerText = "Debes elegir una fecha";
    }else{

        div.classList.remove('d-block');
        div.classList.add('d-none');

        const xhttp = new XMLHttpRequest();
        xhttp.onload = function () {
            let rutas = JSON.parse(this.responseText);
            console.log(rutas);
            let container = document.getElementById("container");
            let resultado = '';

            if ( rutas.length === 0 ) {
                container.innerHTML = 
                `<div class='alert alert-secondary'>
                    <span>No hay viajes disponibles</span>
                </div>`;
            }else{
                for (let i=0; i<rutas.length; i++){
                    let ruta = JSON.stringify(rutas[i]);
                    resultado += `
                    <div class='card mb-2'>
                        <div class='card-body border bg-border rounded'>

                            <div class='d-flex justify-content-between'>
                                <h4>${rutas[i].id_horario}</h4>
                                <h4>S/ 50.00</h4>
                            </div>
                            <div class='mb-2'>
                                <span>
                                    <i class="bi bi-record-circle-fill"></i> ${rutas[i].hora_salida} - <b>${rutas[i].ciudad_origen}</b>
                                </span>
                            </div>
                            <div class='mb-2'>
                                <span>
                                    <i class="bi bi-geo-alt-fill"></i> ${rutas[i].hora_llegada} - <b>${rutas[i].ciudad_destino}</b>
                                </span>
                            </div>
                            <div class='d-flex justify-content-between align-items-end'>
                                <div class=''>
                                    <span>
                                    <img width="20" height="20" src="https://img.icons8.com/ios/50/flight-seat.png" alt="flight-seat"/> <b>50 asientos</b>
                                    </span>
                                    <span class='mx-2'>
                                        <i class="bi bi-clock"></i> <b>${rutas[i].duracion}</b>
                                    </span>
                                </div>
                                <form method='POST' action='http://proyecto.test/seating/index'>
                                <input type="hidden" name="arrayRutas" value='${ruta}'>
                                <button type="submit" class="btn secondary">Seleccionar</button>
                                </form>

                            </div>

                        </div>
                    </div>
                    `;
                };
                container.innerHTML = resultado;
            }
            
            
        }
        xhttp.open("POST", "http://proyecto.test/Home/consulta");
        xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhttp.send(`origen=${origen}&destino=${destino}&FSalida=${fechaSalida}`);
    }  
}

function selectSeating(datos) {

    const xhttp = new XMLHttpRequest();
    xhttp.open('POST', 'http://proyecto.test/seating/index');
    xhttp.setRequestHeader('Content-Type', 'application/json');
    xhttp.onreadystatechange = function() {
        if (xhttp.readyState == 4 && xhttp.status == 200) {
            console.log(xhttp.responseText);
        }
    }
    xhttp.send(datos);
}

/* 
* Seccion Administrador
*/
    //Consultar Rutas
    function getAllRutas() {

        const xhttp = new XMLHttpRequest();
        xhttp.onload = function() {
            let rutas = JSON.parse(this.responseText);
            let bodyRutas = document.getElementById("bodyRutas");
            let contenido = '';

            for(let i = 0; i < rutas.length; i++) {
                resultado += 
                `<tr>
                    <td>${rutas[i].id}</td>
                    <td>${rutas[i].origen}</td>
                    <td>${rutas[i].destino}</td>
                    <td>${rutas[i].duracion}</td>
                </tr>`;
            }
            bodyRutas.innerHTML = contenido;
        }

        xhttp.open("GET", 'http://proyecto.test/Rutas/allRutas');
        xhttp.send();
    }


