<?php include_once __DIR__ . '/../inc/header.php' ?>

    <div class="container mt-3">
    <h2>Toggleable Tabs</h2>
    <br>
    <!-- Nav tabs -->
    <ul class="nav nav-tabs" role="tablist">
        <li class="nav-item">
        <a class="nav-link active" data-bs-toggle="tab" href="#rutas" onclick="cargarRutas()">Rutas</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" data-bs-toggle="tab" href="#buses" onclick="cargarBuses()">Buses</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" data-bs-toggle="tab" href="#conductores" onclick="cargarConductores()">Conductores</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" data-bs-toggle="tab" href="#horarios" onclick="cargarHorarios()">Horarios</a>
        </li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
        <div id="rutas" class="container tab-pane active"><br>
            <h3>Rutas</h3>
            <table class="table caption-top">
                <caption>Lista de rutas</caption>
                <thead>
                    <tr>
                       <th scope="col">#</th> 
                       <th scope="col">Origen</th> 
                       <th scope="col">Destino</th> 
                       <th scope="col">Duracion</th> 
                    </tr>
                </thead>
                <tbody id="bodyRutas">

                </tbody>
            </table>

            <!-- <button type="button" class="btn btn-success">Nuevo registro</button> -->
            <button class="btn btn-success" type="button" data-bs-toggle="collapse" data-bs-target="#contenido" onclick="get_ciudades()">
                Nuevo registro
            </button>
            
            <!-- Contenido colapsable -->
            <div class="collapse mt-3" id="contenido">
                <div class="card card-body">
                    <form action="">
                        <div class="row">
                            <div class="mb-2 mt-2 col">
                                <label for="c_origen" class="form-label">Ciudad de origen</label>
                                <select name="c_origen" id="c_origen" class="form-control">

                                </select>
                            </div>
                            <div class="mb-2 mt-2 col">
                                <label for="c_destino" class="form-label">Ciudad de destino</label>
                                <select name="c_destino" id="c_destino" class="form-control">
                                    
                                </select>
                            </div>
                        </div>
                        <div class="mb-2 mt-2">
                            <label for="duracion">Tiempo de viaje</label>
                            <input type="time" name="duracion" id="duracion" class="form-control">
                        </div>
                    </form>
                    <!-- Botón interno para ocultar -->
                    <button class="btn btn-primary" type="button" onclick="insertRutas()">
                        Registrar
                    </button>
                    <div class="mt-2 alert alert-danger d-none" id="divAvertencia">
                        <span id="msgAdvertencia">El campo duracion no puede ser vacío</span>
                    </div>
                </div>
            </div>
        </div>

        <div id="buses" class="container tab-pane fade"><br>
            <h3>Buses</h3>
            <table class="table caption-top">
                <caption>Lista de buses</caption>
                <thead>
                    <tr>
                       <th scope="col">#</th> 
                       <th scope="col">Placa</th> 
                       <th scope="col">Modelo</th> 
                       <th scope="col">Capacidad</th> 
                    </tr>
                </thead>
                <tbody id="bodyBuses">
                    <tr>
                        <th>1</th>
                        <td>Placa 1</td>
                        <td>Modelo 2</td>
                        <td>50</td>
                    </tr>
                </tbody>
            </table>

            <button type="button" class="btn btn-success" data-bs-toggle="collapse" data-bs-target="#formBuses">
                Nuevo registro
            </button>

            <div class="collapse mt-3" id="formBuses">
                <div class="card card-body">

                    <div class="alert alert-danger mt-2 d-none" id="warningBuses">
                        <span id="msgWarningBuses">Hay campos vacios</span>
                    </div>

                    <form action="">
                        <div class="row">
                            <div class="col">
                                <div class="form-floating mb-2">
                                    <input type="text" id="placa" class="form-control" placeholder="Enter placa">
                                    <label for="placa">Placa</label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-floating mb-2">
                                    <input type="text" class="form-control" id="modelo" placeholder="Enter model" name="nModelo">
                                    <label for="modelo">Modelo</label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-floating mb-2">
                                    <input type="number" class="form-control" name="capacidad" id="capacidad" placeholder="Enter capacidad" value="45" disabled>
                                    <label for="capacidad">Capacidad</label>
                                </div>
                            </div>
                        </div>
                    </form>
                    <button type="button" class="btn btn-primary" onclick="insertBuses()">Registrar</button>
             
                </div>
            </div>
        </div>

        <div id="conductores" class="container tab-pane fade"><br>
            <h3>Conductores</h3>
            <table class="table caption-top">
                <caption>Lista de Conductores</caption>
                <thead>
                    <tr>
                       <th scope="col">#</th> 
                       <th scope="col">Nombre</th> 
                       <th scope="col">Licencia</th> 
                       <th scope="col">Telefono</th> 
                    </tr>
                </thead>
                <tbody id="bodyConductores">
                    <tr>
                        <th>1</th>
                        <td>Placa 1</td>
                        <td>Modelo 2</td>
                        <td>50</td>
                    </tr>
                </tbody>
            </table>

            <button type="button" class="btn btn-success" data-bs-toggle="collapse" data-bs-target="#formConductores">
                Nuevo registro
            </button>

            <div class="collapse mt-3" id="formConductores">
                <div class="card card-body">

                    <div class="alert alert-danger d-none" id="wConductores">
                        <span id="msgWConductores"></span>
                    </div>

                    <form action="">
                        <div class="row mb-2">
                            <div class="col">
                                <div class="form-floating mb-2">
                                    <input type="text" id="nombre" class="form-control" placeholder="Enter name">
                                    <label for="nombre">Nombre</label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-floating mb-2">
                                    <input type="text" id="licencia" class="form-control" placeholder="Enter licencia">
                                    <label for="licencia">Licencia</label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-floating mb-2">
                                    <input type="text" id="telefono" class="form-control" placeholder="Enter tel">
                                    <label for="telefono">Telefono</label>
                                </div>
                            </div>
                        </div>
                    </form>

                    <button type="button" class="btn btn-primary" onclick="insertConductores()">Registrar</button>

                    </div>
                </div>
            </div>
        </div>

        <div id="horarios" class="container tab-pane fade"><br>
            <h3>Horarios</h3>
            <table class="table caption-top">
                <caption>Lista de Horarios</caption>
                <thead>
                    <tr>
                       <th>#</th> 
                       <th>Ruta (codigo)</th> 
                       <th>Bus (codigo)</th> 
                       <th>Conductor (codigo)</th> 
                       <th>Fecha</th> 
                       <th>Hora salida</th> 
                       <th>Hora Llegada</th> 
                    </tr>
                </thead>
                <tbody id="bodyHorarios">
                    <tr>
                        <th>1</th>
                        <td>Placa 1</td>
                        <td>Modelo 2</td>
                        <td>50</td>
                    </tr>
                </tbody>
            </table>

            <button type="button" class="btn btn-success" data-bs-toggle="collapse" data-bs-target="#formHorarios" onclick="getDataHorario()">
                Nuevo registro
            </button>

            <div class="collapse mt-3" id="formHorarios">
                <div class="card card-body">
                    <form action="">
                        <div class="row mb-2">
                            <div class="col">
                                <label for="id_ruta">Ruta</label>
                                <select name="id_ruta" id="id_ruta" class="form-control">

                                </select>
                            </div>
                            <div class="col">
                                <label for="id_bus">Bus</label>
                                <select name="id_bus" id="id_bus" class="form-control">

                                </select>
                            </div>
                            <div class="col">
                                <label for="id_conductor">Conductor</label>
                                <select name="id_conductor" id="id_conductor" class="form-control">

                                </select>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col">
                                <label for="fecha">Fecha</label>
                                <input type="date" name="fecha" id="fecha" class="form-control">
                            </div>
                            <div class="col">
                                <label for="hora_salida">Hora salida</label>
                                <input type="time" name="hora_salida" id="hora_salida" class="form-control">
                            </div>
                            <div class="col">
                                <label for="hora_llegada">Hora llegada</label>
                                <input type="time" name="hora_llegafa" id="hora_llegada" class="form-control" disabled>
                            </div>
                        </div>
                    </form>

                    <button type="button" class="btn btn-primary" onclick="insertHorarios()">Registrar</button>

                    <div class="alert alert-danger d-none mt-3" id="warningHorario">
                        <span id="msgWarningHorario">Hay campos vacios</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <script>

        window.addEventListener("DOMContentLoaded", cargarRutas);
        function cargarRutas() {

            const xhttp = new XMLHttpRequest();
            xhttp.onload = function() {
                let rutas = JSON.parse(this.responseText);
                let bodyRutas = document.getElementById("bodyRutas");
                let contenido = '';

                for(let i = 0; i < rutas.length; i++) {
                    contenido += 
                    `<tr>
                        <th scope='row'>${rutas[i].id}</th>
                        <td>${rutas[i].origen}</td>
                        <td>${rutas[i].destino}</td>
                        <td>${rutas[i].duracion}</td>
                    </tr>`;
                }
                bodyRutas.innerHTML = contenido;
            }

            xhttp.open("GET", "http://proyecto.test/Admin/allRutas");
            xhttp.send();
        }
        function insertRutas() {

            let origen =document.getElementById("c_origen").value;
            let destino =document.getElementById("c_destino").value;
            let duracion =document.getElementById("duracion").value;

            let div =document.getElementById("divAvertencia");
            let msg =document.getElementById("msgAdvertencia");

            if (duracion == '') {
                div.classList.remove('d-none');
                div.classList.add('d-block');
            }else if(origen == destino) {
                msg.innerText = "La ciudad de origen y destino no pueden ser iguales";
                div.classList.remove('d-none');
                div.classList.add('d-block');
            }else{
                const xhttp = new XMLHttpRequest();
                xhttp.onload = function() {
                    div.classList.remove('alert-danger', 'd-none');
                    div.classList.add('alert-success', 'd-block');
                    msg.innerText =this.responseText;
                    cargarRutas();
                }
                xhttp.open("POST", "http://proyecto.test/Admin/insertRutas");
                xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhttp.send(`origen=${origen}&destino=${destino}&duracion=${duracion}`);
            }
        }

        function cargarBuses() {

            const xhttp = new XMLHttpRequest();
            xhttp.onload = function() {
                let buses =JSON.parse(this.responseText);
                let bodyBuses =document.getElementById("bodyBuses");
                let contenido = '';

                for (let i=0; i<buses.length; i++) {
                    contenido +=
                    `<tr>
                        <th>${buses[i].id_bus}</th>
                        <td>${buses[i].placa}</td>
                        <td>${buses[i].modelo}</td>
                        <td>${buses[i].capacidad}</td>
                    </tr>`
                }
                bodyBuses.innerHTML = contenido;
            }

            xhttp.open("GET", "http://proyecto.test/Admin/allBuses");
            xhttp.send();
        }
        function insertBuses() {

            let placa =document.getElementById("placa").value;
            let modelo =document.getElementById("modelo").value;
            let capacidad =document.getElementById("capacidad").value;

            let div =document.getElementById("warningBuses");
            let msg = document.getElementById("msgWarningBuses");

            const formData = new FormData();
            formData.append('placa', placa);
            formData.append('modelo', modelo);
            formData.append('capacidad', capacidad);

            let datos =Object.fromEntries(formData.entries());
            datos = JSON.stringify(datos);


            if (placa == '' || modelo == '') {
                div.classList.remove('d-none', 'alert-success');
                div.classList.add('d-block', 'alert-danger');
                msg.innerText = "Hay campos vacios";

            } else {

                const xhttp = new XMLHttpRequest();
                xhttp.onload = function() {

                    div.classList.remove('d-none', 'alert-danger');
                    div.classList.add('d-block', 'alert-success');
                    msg.innerHTML =xhttp.responseText;
                    cargarBuses();
                }
                xhttp.open('POST', 'http://proyecto.test/Admin/insertBuses');
                xhttp.setRequestHeader('Content-Type', 'application/json');
                xhttp.send(datos);

            }
        }

        function cargarConductores() {

            const xhttp = new XMLHttpRequest();
            xhttp.onload = function() {
                let conductores =JSON.parse(this.responseText);
                let bodyConductores =document.getElementById("bodyConductores");
                let contenido = '';

                for (let i=0; i<conductores.length; i++) {
                    contenido +=
                    `<tr>
                        <th>${conductores[i].id_conductor}</th>
                        <td>${conductores[i].nombre}</td>
                        <td>${conductores[i].licencia}</td>
                        <td>${conductores[i].telefono}</td>
                    </tr>`
                }
                bodyConductores.innerHTML = contenido;
            }

            xhttp.open("GET", "http://proyecto.test/Admin/allConductores");
            xhttp.send();
        }
        function insertConductores() {

            let nombre = document.getElementById('nombre').value;
            let licencia = document.getElementById('licencia').value;
            let telefono = document.getElementById('telefono').value;

            let div =document.getElementById('wConductores');
            let msg = document.getElementById('msgWConductores');

            const formData = new FormData();
            formData.append('nombre', nombre);
            formData.append('licencia', licencia);
            formData.append('telefono', telefono);

            let datos = Object.fromEntries(formData.entries());
            datos = JSON.stringify(datos);

            if ( nombre == '' || telefono == '' || licencia == '' ) {

                div.classList.remove('d-none');
                div.classList.add('d-block');
                msg.innerText = 'No puede haber campos vacíos';
            } else {

                const xhttp = new XMLHttpRequest();
                xhttp.onload = function() {

                    div.classList.remove('d-none', 'alert-danger');
                    div.classList.add('d-block', 'alert-success');
                    msg.innerHTML = xhttp.responseText;

                    cargarConductores();
                }
                xhttp.open('POST', 'http://proyecto.test/Admin/insertConductores');
                xhttp.send(datos);
            }
        }

        function cargarHorarios() {

            const xhttp = new XMLHttpRequest();
            xhttp.onload = function() {
                let horarios =JSON.parse(this.responseText);
                let bodyHorarios =document.getElementById("bodyHorarios");
                let contenido = '';

                for (let i=0; i<horarios.length; i++) {
                    contenido +=
                    `<tr>
                        <th>${horarios[i].id_horario}</th>
                        <td>${horarios[i].fk_ruta}</td>
                        <td>${horarios[i].fk_bus}</td>
                        <td>${horarios[i].fk_conductor}</td>
                        <td>${horarios[i].fecha}</td>
                        <td>${horarios[i].hora_salida}</td>
                        <td>${horarios[i].hora_llegada}</td>
                    </tr>`
                }
                bodyHorarios.innerHTML = contenido;
            }

            xhttp.open("GET", "http://proyecto.test/Admin/allHorarios");
            xhttp.send();
        }
        function getDataHorario() {

            let rutas = document.getElementById("id_ruta");
            let buses = document.getElementById("id_bus");
            let conductores = document.getElementById("id_conductor");

            let hora_llegada =document.getElementById('hora_llegada');

            const xhttp = new XMLHttpRequest();
            xhttp.onload = function() {
                let datos = JSON.parse(this.responseText);

                let listRutas = '';
                datos[0].forEach(ruta => {
                    listRutas +=
                    `<option value='${ruta.id}'>${ruta.origen} -> ${ruta.destino}</option>`;
                });
                rutas.innerHTML = listRutas;console.log(datos);

                let listBuses = '';
                datos[1].forEach(bus => {
                    listBuses +=
                    `<option value='${bus.id_bus}'>${bus.placa}, ${bus.modelo}</option>`;
                });
                buses.innerHTML =listBuses;

                let listConductor = '';
                datos[2].forEach(conductor => {
                    listConductor +=
                    `<option value='${conductor.id_conductor}'>${conductor.nombre}, ${conductor.licencia}, ${conductor.telefono}</option>`;
                });
                conductores.innerHTML =listConductor;

                document.getElementById("hora_salida").addEventListener('input', function() {
                    let hora_salida = this.value;
                    let hora_increment = 0;
                    datos[0].forEach(ruta => {
                        if (ruta.id == rutas.value) {
                            hora_increment = ruta.duracion;
                        }
                    });

                    let [hours1, minutes1] = hora_salida.split(':').map(Number);
                    let [hours2, minutes2] =hora_increment.split(':').map(Number);
                    //console.log([hours2, minutes2]);

                    hours1 += hours2; minutes1 += minutes2;
                    if (minutes1 >= 60) {
                        minutes1 -= 60; hours1 += 1;
                    }
                    if (hours1 >= 24) hours1 -= 24;

                    hora_llegada.value = (hours1 < 10 ? '0' : '') + hours1 + ':' + (minutes1 < 10 ? '0' : '') + minutes1;
                });
            }

            xhttp.open('GET', 'http://proyecto.test/Admin/getDataHorario');
            xhttp.send();
        }
        function insertHorarios() {

            let rutas = document.getElementById("id_ruta").value;
            let buses = document.getElementById("id_bus").value;
            let conductor = document.getElementById("id_conductor").value;
            let hora_llegada =document.getElementById('hora_llegada').value;
            let fecha = document.getElementById('fecha').value;
            let hora_salida = document.getElementById('hora_salida').value;

            let div =document.getElementById('warningHorario');
            let msg =document.getElementById('msgWarningHorario');

            if (fecha == '' || hora_salida == '') {
                div.classList.remove('d.none');
                div.classList.add('d-block');
            }else{

                const formData = new FormData();
                formData.append('rutas', rutas);
                formData.append('buses', buses);
                formData.append('conductor', conductor);
                formData.append('fecha', fecha);
                formData.append('hora_llegada', hora_llegada);
                formData.append('hora_salida', hora_salida);

                let datos =Object.fromEntries(formData.entries());
                datos =JSON.stringify(datos);
                console.log(datos);
                
                const xhttp = new XMLHttpRequest();
                xhttp.onload = function() {
                    div.classList.remove('d-none', 'alert-danger');
                    div.classList.add('d-block', 'alert-success');

                    cargarHorarios();
                }

                xhttp.open('POST', 'http://proyecto.test/Admin/insertHorario');
                xhttp.send(datos);
               
            }
        }

        function get_ciudades() {

            const xhttp = new XMLHttpRequest();
            xhttp.onload = function() {
                let ciudades = JSON.parse(this.responseText);
                let c_origen = document.getElementById("c_origen");
                let c_destino = document.getElementById("c_destino");
                contenido = '';

                for (let i=0; i<ciudades.length; i++) {
                    contenido += 
                    `<option value='${ciudades[i].id}'>${ciudades[i].nombre}</option>`;
                }

                c_origen.innerHTML =contenido;
                c_destino.innerHTML =contenido;
            }

            xhttp.open("GET", "http://proyecto.test/Admin/selectCiudades");
            xhttp.send();
        }
    </script>

<?php include_once __DIR__ . '/../inc/footer.php' ?>