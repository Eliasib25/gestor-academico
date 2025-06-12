<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard teacher</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">

<style>

    .card-hover{
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .card-hover:hover{
         /* transform: translateY(-8px); */
         transform: scale(1.05);
        
    }
</style>
</head>
<body class="bg-light">

  <div class="container py-5" style="max-width: 800px;">
    <div class="mb-4 text-center">
      <h2 class="fw-bold">Bienvenido docente <?php echo $_SESSION["teacherName"]; ?></h2>
      <p class="text-muted">Aquí puedes gestionar todas las funcionalidades de tu rol</p>
    </div>

    <h4 class="mb-3">Opciones disponibles:</h4>

    <div class="row row-cols-1 row-cols-md-2 g-4 justify-content-center">

      <div class="col">
        <a href="../viewsteacher/managmentNote.php" class="text-decoration-none text-dark">
          <div class="card card-hover shadow-sm text-center h-100">
            <div class="card-body">
              <img src="../../public/assets/lapiz.png" alt="Gestionar grados" width="60" class="mb-3">
              <h6 class="card-title">Gestionar notas</h6>
            </div>
          </div>
        </a>
      </div>
    </div>

    <div class="text-center mt-5">
      <button class="btn btn-danger" onclick="window.location.href='../auth/login.php'">Cerrar sesión</button>
    </div>
  </div>

</body>
</html>