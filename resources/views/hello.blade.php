<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Formulário</title>
  </head>
  <body>
    <form action="{{ route('hello-submit') }}" method="GET">
      <label for="nome">Digite seu nome:</label>
      <input type="text" id="nome" name="nome" required>
      <br>
      <button type="submit">Enviar</button>
    </form>
  </body>
</html>
