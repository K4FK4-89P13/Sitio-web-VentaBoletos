<?php include_once  __DIR__ . '/../inc/header.php';
    $ruta = $data['datos'];
?>

<style>
    .seat {
        cursor: pointer;
        margin: 5px;
        width: 50px;
        height: 50px;
        background-color: #fffffe;
        border: 1px solid #094067;
        border-radius: 5px;
    }
    .seat.selected {
        background-color: #90b4ce;
    }
    .seat.occupied {
        background-color: #ef4565;
        cursor: not-allowed;
    }
    .asientos{
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        
    }
    .seat:nth-child(3n+1) {
        grid-column: 1;
    }
    .seat:nth-child(3n+2) {
        grid-column: 2;
    }
    .seat.seat:nth-child(3n) {
        grid-column: 4;
    }

    .card-borderless,
    .card-borderless > .card-header,
    .card-footer {
        border: none;
    }
</style>

<div class="d-flex justify-content-around container text-center mt-5">
    <div class="w-50" id="cambio">
        <div class="card border bg-border">
            <div class="card-header bg-white bottom bg-border">
                <h4 class="justify-content-start">Elige tus asientos</h4>
            </div>
            <div class="card-body">

                <div class="bus p-2 rounded mx-auto w-50 border bg-border">
                    <div class="card mb-3 card-borderless">
                        <div class="card-header bus bg-bus">
                            Primer piso
                        </div>
                        <div class="card-body">
                            <div class='asientos text-center'>
                                <?php for($i = 1; $i <= 12; $i++) {
                                    echo  "<div class='seat' data-seat-number='{$i}' id='{$i}s'>{$i}</div>";
                                } ?>
                            </div>
                        </div>
                        <div class="card-footer bus bg-bus"></div>
                    </div>
                    <div class="card card-borderless">
                        <div class="card-header bus bg-bus">
                            Segundo piso
                        </div>
                        <div class="card-body">
                            <div class="asientos">
                                <?php for($i = 13; $i <= 45; $i++) {
                                    echo "<div class='seat' data-seat-number='{$i}'>{$i}</div>";
                                } ?>
                            </div>
                        </div>
                        <div class="card-footer bus bg-bus"></div>
                    </div>
                    <!-- Example of seats -->
                    <!-- <div class=""> -->
                        <!-- <div class="seat" data-seat-number="1">1</div>
                        <div class="seat" data-seat-number="2">2</div> -->
                        <?php /* foreach($data['asientosOcupados'] as $asiento){
                            print_r($asiento['num_asiento']);
                        }; */
                        /* for ($i=1; $i <= 45; $i++) { 
                            echo "<div class='seat' data-seat-number='{$i}'>{$i}</div>";
                        }  */?>
                    <!-- </div> -->
                    <!-- <div class="col-md-2">
                        <div class="seat" data-seat-number="3">3</div>
                        <div class="seat" data-seat-number="4">4</div>
                    </div> -->
                    <!-- Repeat for all seats -->
                </div>
            </div>
        </div>
    </div>
    <div class="w-25" id="detalles">
        <div class="card mb-4 border bg-border">
            <div class="card-header bottom bg-border">
                <h4>Su selección de viaje</h4>
            </div>
            <div class="card-body">
                <div class="badge-viaje d-flex justify-content-end">
                    <span class="badge bg-badge ¿"><b class="text-black">Saliente: </b><?=$ruta['fecha']?></span>
                </div>
                <div class="details-viaje">
                    <p class="d-flex justify-content-start"><b><?=$ruta['hora_salida']?><i class="bi bi-record-circle-fill mx-2"></i></b><?=$ruta['ciudad_origen']?></p>
                    <p class="d-flex justify-content-start"><b><?=$ruta['hora_llegada']?><i class="bi bi-geo-alt-fill mx-2"></i></b><?=$ruta['ciudad_destino']?></p>
                </div>
                <div class="d-flex justify-content-start">
                    <small> <i class="bi bi-clock"></i> <b><?=$ruta['duracion']?></b></small>
                </div>
            </div>
        </div>
        <div class="card mb-3 border bg-border">
            <div class="card-header bottom bg-border">
                <h4>Tus asientos</h4>
            </div>
            <div class="card-body">
                <div class="">
                    <ul id="selected-seats" class="list-group mb-3">
                        <!-- Selected seats will be displayed here -->
                    </ul>
                </div>
            </div>
        </div>
        <button class="btn secondary form-control" id="continue">Continuar con los pasajeros</button>

        <div class="alert alert-danger d-none mt-3" id="wSeats">
            <span id="msgWSeats">No se a seleccionado nungun asiento</span>
        </div>
    </div>
</div>
<?php print_r($data); echo "<br>"; print_r($data['datos']) ?>

<script>
        document.addEventListener('DOMContentLoaded', (event) => {
            
            //Marcar los asientos ocupados
            <?php if (!empty($data['asientosOcupados'])): ?>
                    let seat;
                <?php
                    foreach ($data['asientosOcupados'] as $asiento): ?>
                        seat = document.querySelector(`.seat[data-seat-number="<?= $asiento['num_asiento'] ?>"]`);
                        //console.log(seat);
                        if (seat != null) {
                            seat.classList.add('occupied');
                        }
            <?php  endforeach; endif; ?>

            const seats = document.querySelectorAll('.seat:not(.occupied)');
            //console.log(seats);
            const selectedSeatsList = document.getElementById('selected-seats');
            let selectedSeats = [];

            seats.forEach(seat => {
                seat.addEventListener('click', () => {
                    seat.classList.toggle('selected');
                    const seatNumber = seat.getAttribute('data-seat-number');
                    if (seat.classList.contains('selected')) {
                        selectedSeats.push(seatNumber);
                    } else {
                        selectedSeats = selectedSeats.filter(s => s !== seatNumber);
                    }
                    updateSelectedSeatsList();
                });
            });

            function updateSelectedSeatsList() {
                selectedSeatsList.innerHTML = '';
                selectedSeats.forEach(seatNumber => {
                    const li = document.createElement('li');
                    li.classList.add('list-group-item');
                    li.textContent = `Pasajero ${seatNumber} -> S/ 50.00`;
                    selectedSeatsList.appendChild(li);
                });
            }


            if ( document.getElementById('continue') ) {

                document.getElementById('continue').addEventListener('click', () => {
                    let div = document.getElementById('wSeats');
    
                    if (selectedSeats.length == 0) {

                        div.classList.remove('d-none');
                        div.classList.add('d-block');
                    }else{
                        div.classList.remove('d-block');
                        div.classList.add('d-none');

                        // Hacer una solicitud AJAX para cargar el contenido del archivo pasajeros.php
                        const xhttp = new XMLHttpRequest();
                        xhttp.onload =function () {
                            document.getElementById("cambio").innerHTML =this.responseText;
                            console.log("cambio html");
                            updateButton();
                            
                        }
                        xhttp.open('POST', 'http://proyecto.test/Seating/pasajeros');
                        xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                        xhttp.send(`selectedSeats=${selectedSeats}`);
                    }
                });

            }

            function updateButton() {
                let btnContinua = document.getElementById('continue');
                if (btnContinua){
                    console.log("Existe continue");
                    
                    // Cambiar el texto y el ID del botón
                    let btnContinua = document.getElementById('continue');
                    btnContinua.innerText = 'Generar boleto';
                    btnContinua.setAttribute('id', 'continue_boleto');

                    // Eliminar todos los antiguos eventos del botón continue para evitar múltiples eventos
                    let newBtn = btnContinua.cloneNode(true);
                    btnContinua.parentNode.replaceChild(newBtn, btnContinua);

                    // Agregar el nuevo evento al botón #continue_boleto
                    document.getElementById('continue_boleto').addEventListener('click', enviarPasajeros);

                } /* else if ( document.getElementById('continue_boleto') ) {
                    
                    console.log("Existe continue_boleto");

                    document.getElementById('continue_boleto').addEventListener('click', enviarPasajeros(event));
                } */else {
                    console.error("El botón con id 'continue' no existe en el DOM");
                }
            }


            /* document.getElementById('continue').addEventListener('click', () => {
                // Submit the selected seats
                console.log('Selected seats:', selectedSeats);
                // You can send the selectedSeats array to your server here
                fetch('http://proyecto.test/Seating/selectSeats', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({
                        selectedSeats: selectedSeats,
                        horarioId: <?//= $data['horarioId'] ?>
                    })
                })
                .then(response => response.json())
                .then(data => {
                    // Handle success response
                    console.log('Success:', data);
                    // Redirect or update the page as needed
                    if (data.status == 'success') {
                        window.location.href = 'http://proyecto.test/seating/pasajeros';
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                });
            }); */


            /* 
            * Enviar datos de pasajeros al servidor
            */
            function enviarPasajeros() {

                let cantidad = document.getElementById("numAsientos").value;
                let form = document.getElementById('form_pasajeros');
                let formData = new FormData(form);
                const data = Object.fromEntries(formData.entries());

                data.pasajeros = [];
                data.asientos = [];

                for (let i = 0; i < cantidad; i++) {
                    const pasajero = {};
                    pasajero.nombre = document.getElementById(`nombreCompleto[${i}]`).value;
                    pasajero.email = document.getElementById(`email[${i}]`).value;
                    pasajero.telefono = document.getElementById(`telefono[${i}]`).value;
                    pasajero.dni = document.getElementById(`dni[${i}]`).value;

                    let asiento =document.getElementById(`asiento[${i}]`).value;

                    data.pasajeros.push(pasajero);
                    data.asientos.push(asiento);
                }

                console.log(data);

                const requestOptions = {
                    method: 'POST',
                    headers: {'Content-type': 'application/json'},
                    body: JSON.stringify(data)
                };

                fetch('http://proyecto.test/Ticket/index', requestOptions)
                .then(response => response.json())
                .then(data => {
                    console.log('succes:', data);
                    if ( data.status == 'succes' ) {
                        window.location.href = 'http://proyecto.test/Ticket/boleto';
                    }

                })

            }
        });
    </script>

<?php include_once  __DIR__ . '/../inc/footer.php' ?>