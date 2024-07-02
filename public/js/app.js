
/* 
Peticion a Rutas disponibles
*/
function getRutas() {
    let origen = document.getElementById("origen").value;
    let destino = document.getElementById("destino").value;
    let fechaSalida = document.getElementById("FSalida").value;
    console.log(origen, destino, fechaSalida);
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function () {
        let rutas = JSON.parse(this.responseText);
        let container = document.getElementById("container");
        let resultado = '';

        for (let i = 0; i < rutas.length; i++) {
            resultado += `
            <div class='card mb-2'>
                <div class='card-body'>
                    <p><b>ID Horario: </b>${rutas[i].id_horario}</p>
                    <p><b>Origen: </b>${rutas[i].ciudad_origen}</p>
                    <p><b>Destino: </b>${rutas[i].ciudad_destino}</p>
                    <p><b>Duración: </b>${rutas[i].duracion}</p>
                    <p><b>Hora Salida: </b>${rutas[i].hora_salida}</p>
                    <p><b>Hora Llegada: </b>${rutas[i].hora_llegada}</p>
                    <p><b>Fecha: </b>${rutas[i].fecha}</p>
                    <p><b>Capacidad: </b>${rutas[i].capacidad}</p>

                    <form method='POST' action='http://proyecto.test/seating/index'>
                        <input type="hidden" name="horario_id" value='${rutas[i].id_horario}'>
                        <button type="submit" class="btn btn-primary">Seleccionar</button>
                    </form>
                </div>
            </div>
            `;
        }
        container.innerHTML = resultado;
    }
    xhttp.open("POST", "http://proyecto.test/Home/consulta");
    xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhttp.send(`origen=${origen}&destino=${destino}&FSalida=${fechaSalida}`);
}