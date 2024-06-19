<?php include_once  __DIR__ . '/../inc/header.php' ?>

<div class="container text-center">
    <div class="row align-items-start">
        <div class="col">
            ASIENTOS

            <?php /* for ($i=0; $i <= $data['seatings']; $i++) { 
                echo "<div>$i</div>";
            } */ print_r($data)?>

            <!-- <div class="grid text-center" style="--bs-columns: 3;">
                <div>1</div>
                <div>2</div>
                <div>3</div>
                <div>3</div>
                <div>3</div>
                <div>3</div>
                <div>3</div>
                <div>3</div>
            </div> -->
        </div>
        <div class="col">
            DETALLES
        </div>
    </div>
</div>

<?php include_once  __DIR__ . '/../inc/footer.php' ?>