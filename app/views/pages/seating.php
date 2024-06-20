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
            <div class="col-md-8">
                <div class="bus">
                    <div class="row">
                        <!-- Example of seats -->
                        <div class="col-md-2">
                            <div class="seat" data-seat-number="1">1</div>
                            <div class="seat" data-seat-number="2">2</div>
                        </div>
                        <div class="col-md-2">
                            <div class="seat occupied" data-seat-number="3">3</div>
                            <div class="seat" data-seat-number="4">4</div>
                        </div>
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

    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
            const seats = document.querySelectorAll('.seat:not(.occupied)');
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
                    li.textContent = `Asiento ${seatNumber}`;
                    selectedSeatsList.appendChild(li);
                });
            }

            document.getElementById('continue').addEventListener('click', () => {
                // Submit the selected seats
                console.log('Selected seats:', selectedSeats);
                // You can send the selectedSeats array to your server here
            });
        });
    </script>
</div>

<?php include_once  __DIR__ . '/../inc/footer.php' ?>