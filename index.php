<?php
$hotels = [
  [
    'name' => 'Hotel Belvedere',
    'description' => 'Hotel Belvedere Descrizione',
    'parking' => true,
    'vote' => 4,
    'distance_to_center' => 10.4
  ],
  [
    'name' => 'Hotel Futuro',
    'description' => 'Hotel Futuro Descrizione',
    'parking' => true,
    'vote' => 2,
    'distance_to_center' => 2
  ],
  [
    'name' => 'Hotel Rivamare',
    'description' => 'Hotel Rivamare Descrizione',
    'parking' => false,
    'vote' => 1,
    'distance_to_center' => 1
  ],
  [
    'name' => 'Hotel Bellavista',
    'description' => 'Hotel Bellavista Descrizione',
    'parking' => false,
    'vote' => 5,
    'distance_to_center' => 5.5
  ],
  [
    'name' => 'Hotel Milano',
    'description' => 'Hotel Milano Descrizione',
    'parking' => true,
    'vote' => 2,
    'distance_to_center' => 50
  ],
];
$parkingP = $_GET['parkingSelect'] == 'null' ? 'null' : filter_var($_GET['parkingSelect'], FILTER_VALIDATE_BOOLEAN);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.css' integrity='sha512-VcyUgkobcyhqQl74HS1TcTMnLEfdfX6BbjhH8ZBjFU9YTwHwtoRtWSGzhpDVEJqtMlvLM2z3JIixUOu63PNCYQ==' crossorigin='anonymous' />
  <title>Document</title>
</head>

<body>
  <div class="container">
    <form method="GET" action="index.php">
      <div class="mb-3">
        <label for="parking" class="form-label">Filtri</label>
        <select name="parkingSelect" class="form-select" aria-label="Default select example">
          <option value="null" selected>Disponibilita parcheggio</option>
          <option value="false">No</option>
          <option value="true">Si</option>
        </select>
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
  <div class="container">

    <div class="row">
      <?php foreach ($hotels as $hotel) : ?>
        <?php if ($hotel['parking'] == $parkingP || is_string($parkingP) || !isset($parkingP)) : ?>
          <div class="col-4 my-3 ">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title"> <?php echo $hotel['name'] ?> </h5>
                <h6 class="card-subtitle mb-2 text-body-secondary">Distanza dal centro: : <?php echo $hotel['distance_to_center'] ?></h6>
                <h6 class="card-subtitle mb-2 text-body-secondary">Voto: <?php echo $hotel['vote'] ?></h6>
                <h6 class="card-subtitle mb-2 text-body-secondary">Parcheggio: <?php echo ($hotel['parking']) ? 'Si' : 'No' ?></h6>
                <h5>Descrizione:</h5>
                <p class="card-text"><?php echo $hotel['description'] ?></p>
              </div>
            </div>
          </div>
        <?php endif ?>
      <?php endforeach ?>
    </div>
  </div>
  </div>
</body>

</html>