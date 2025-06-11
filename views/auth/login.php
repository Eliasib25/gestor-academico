<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Iniciar sesión - Gestor Académico</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"/>
  <style>
    body {
      background-color: #f8f9fa;
    }
    .login-container {
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
    }
    .card {
      padding: 2rem;
      border-radius: 1rem;
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    }
    .logo {
      width: 80px;
      height: 80px;
      margin-bottom: 1rem;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .logo:hover{
        transform: scale(1.08);
    }
  </style>
</head>
<body>
  <div class="container login-container">
    <div class="card w-100" style="max-width: 400px;">
      <div class="text-center">
        <img src="../assets/academic.png" alt="Logo gestor académico" class="logo" />
        <h2 class="mb-0">Gestor Académico</h2>
        <p class="text-muted">Inicio de sesión</p>
      </div>
      <form action="../../controllers/AuthController.php" method="POST" id="loginForm">
        <div class="mb-3">
          <label for="user" class="form-label">Usuario</label>
          <input type="text" name="user" id="user" class="form-control" required />
        </div>
        <div class="mb-4">
          <label for="password" class="form-label">Contraseña</label>
          <input type="password" name="password" id="password" class="form-control" required />
        </div>
        <div class="d-grid">
          <button type="submit" class="btn btn-primary" name="login" value="login">Iniciar sesión</button>
        </div>
      </form>
    </div>
  </div>
</body>
</html>
