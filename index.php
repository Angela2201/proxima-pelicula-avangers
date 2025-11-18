<?php

const API_URL = "https://whenisthenextmcufilm.com/api";
# Inicializar una nueva sesión de cURL; ch = cURL handle
$ch = curl_init(API_URL);

# Indicar que quiero recibir el resultado de la petición y no mostrarla en pantalla
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

# Ejecutar la petición y guardar el resultado
$result = curl_exec($ch);
$data = json_decode($result, true);

curl_close($ch);
?>

<head>
  <meta charset="UTF-8" />
  <title>La próxima película de Marvel</title>
  <meta name="description" content="La próxima película de Marvel" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.classless.min.css">
</head>

<main>
  <hgroup>
    <h3 style="text-align: center;">
      <?= $data["title"]; ?> se estrena en <?= $data["days_until"]; ?> días
    </h3>
    <p style="text-align: center; margin-top: 10px;">
      Fecha de estreno: <?= $data["release_date"]; ?>
    </p>
  </hgroup>

  <section style="display: flex; justify-content: center;">
    <img src="<?= $data["poster_url"]; ?>" width="300" alt="Poster de <?= $data["title"]; ?>"
      style="border-radius: 16px;" />
  </section>

  <hgroup style="text-align: center;">
    <p style="font-size: 30px;">
      La siguiente película es:
    </p>
    <p style="font-size: 25px; font-weight: 700;">
      <?= $data["following_production"]["title"]; ?>
    </p>
  </hgroup>
</main>

<style>
  :root {
    color-scheme: light-dark;
  }

  body {
    display: grid;
    place-content: center;
  }
</style>