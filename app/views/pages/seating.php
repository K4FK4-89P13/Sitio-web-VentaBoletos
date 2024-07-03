<?php include_once  __DIR__ . '/../inc/header.php' ?>

<style>
        .seat {
            cursor: pointer;
            margin: 5px;
            width: 30px;
            height: 30px;
            background-color: #d3d3d3;
            border-radius: 5px;
        }
        .seat.selected {
            background-color: #6c757d;
        }
        .seat.occupied {
            background-color: #ff4d4d;
            cursor: not-allowed;
        }
    </style>
<div class="container text-center">
<div class="container mt-5">
        <h2>Elige tus asientos</h2>
        <div class="row">
            <div class="col-md-8" id="cambio">
                <div class="bus">
                    <div class="row">
                        <!-- Example of seats -->
                        <div class="col-md-2">
                            <!-- <div class="seat" data-seat-number="1">1</div>
                            <div class="seat" data-seat-number="2">2</div> -->
                            <?php foreach($data['asientosOcupados'] as $asiento){
                                print_r($asiento['num_asiento']);
                            };
                            for ($i=1; $i <= 45; $i++) { 
                                echo "<div class='seat' data-seat-number='{$i}'>{$i}</div>";
                            } ?>
                        </div>
                        <!-- <div class="col-md-2">
                            <div class="seat" data-seat-number="3">3</div>
                            <div class="seat" data-seat-number="4">4</div>
                        </div> -->
                        <!-- Repeat for all seats -->
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <h4>Su selección de viaje</h4>
                <ul id="selected-seats" class="list-group mb-3">
                    <!-- Selected seats will be displayed here -->
                </ul>
                <button class="btn btn-primary" id="continue">Continuar con los pasajeros</button>
            </div>
        </div>
    </div>
    <?php print_r($data) ?>



    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
            const seats = document.querySelectorAll('.seat:not(.occupied)');
            //console.log(seats);
            const selectedSeatsList = document.getElementById('selected-seats');
            let selectedSeats = [];

            //Marcar los asientos ocupados
            <?php if (!empty($data['asientosOcupados'])): ?>let seat; <?php
                    foreach ($data['asientosOcupados'] as $asiento): ?>
                        seat = document.querySelector(`.seat[data-seat-number="<?= $asiento['num_asiento'] ?>"]`);
                        console.log(seat);
                        if (seat) {
                            seat.classList.add('occupied');
                        }
            <?php  endforeach; endif; ?>

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
                    li.textContent = `Pasajero ${seatNumber}    S/ 50.00`;
                    selectedSeatsList.appendChild(li);
                });
            }


            if ( document.getElementById('continue') ) {

                document.getElementById('continue').addEventListener('click', () => {
    
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

                const requestOptions = {
                    method: 'POST',
                    headers: {'Content-type': 'application/json'},
                    body: JSON.stringify(data)
                };

                fetch('url', requestOptions)
                .then(response => response.json())
                .then(data => console.log(data))

                //console.log(data);
            }
        });
    </script>

</div>

<?php include_once  __DIR__ . '/../inc/footer.php' ?>