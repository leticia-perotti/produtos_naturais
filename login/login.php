<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="../fotos/logo_mini.png">
    <title>Natural Chá</title>

<style>
    @use postcss-preset-env {
        stage: 0;
    }

    /* config.css */

    :root {
        --baseColor: #000;
    }

    /* helpers/align.css */

    .align {
        display: grid;
        place-items: center;
    }

    .grid {
        inline-size: 90%;
        margin-inline: auto;
        max-inline-size: 20rem;
    }

    /* helpers/hidden.css */

    .hidden {
        border: 0;
        clip: rect(0 0 0 0);
        height: 1px;
        margin: -1px;
        overflow: hidden;
        padding: 0;
        position: absolute;
        width: 1px;
    }

    /* helpers/icon.css */

    :root {
        --iconFill: var(--baseColor);
    }

    .icons {
        display: none;
    }

    .icon {
        block-size: 1em;
        display: inline-block;
        fill: var(--iconFill);
        inline-size: 1em;
        vertical-align: middle;
    }

    /* layout/base.css */

    :root {
        --htmlFontSize: 100%;

        --bodyBackgroundColor: #ffffff;
        --bodyColor: var(--baseColor);
        --bodyFontFamily: "Open Sans";
        --bodyFontFamilyFallback: sans-serif;
        --bodyFontSize: 0.875rem;
        --bodyFontWeight: 400;
        --bodyLineHeight: 1.5;
    }

    * {
        box-sizing: inherit;
    }

    html {
        box-sizing: border-box;
        font-size: var(--htmlFontSize);
    }

    body {
        background-color: var(--bodyBackgroundColor);
        color: var(--bodyColor);
        font-family: var(--bodyFontFamily), var(--bodyFontFamilyFallback);
        font-size: var(--bodyFontSize);
        font-weight: var(--bodyFontWeight);
        line-height: var(--bodyLineHeight);
        margin: 0;
        min-block-size: 100vh;
    }

    /* modules/anchor.css */

    :root {
        --anchorColor: #eee;
    }

    a {
        color: var(--anchorColor);
        outline: 0;
        text-decoration: none;
    }

    a:focus,
    a:hover {
        text-decoration: underline;
    }

    /* modules/form.css */

    :root {
        --formGap: 0.875rem;
    }

    input {
        background-image: none;
        border: 0;
        color: inherit;
        font: inherit;
        margin: 0;
        outline: 0;
        padding: 0;
        transition: background-color 0.3s;
    }

    input[type="submit"] {
        cursor: pointer;
    }

    .form {
        display: grid;
        gap: var(--formGap);
    }

    .form input[type="password"],
    .form input[type="text"],
    .form input[type="submit"] {
        inline-size: 100%;
    }

    .form__field {
        display: flex;
    }

    .form__input {
        flex: 1;
    }

    /* modules/login.css */

    :root {
        --loginBorderRadus: 0.25rem;
        --loginColor: #eee;

        --loginInputBackgroundColor: #DCDCDC;
        --loginInputHoverBackgroundColor: #C0C0C0;

        --loginLabelBackgroundColor: #C0C0C0;

        --loginSubmitBackgroundColor: #deb887;
        --loginSubmitColor: #eee;
        --loginSubmitHoverBackgroundColor: burlywood;
    }

    .login {
        color: var(--loginColor);
    }

    .login label,
    .login input[type="text"],
    .login input[type="password"],
    .login input[type="submit"] {
        border-radius: var(--loginBorderRadus);
        padding: 1rem;
    }

    .login label {
        background-color: var(--loginLabelBackgroundColor);
        border-bottom-right-radius: 0;
        border-top-right-radius: 0;
        padding-inline: 1.25rem;
    }

    .login input[type="password"],
    .login input[type="text"] {
        background-color: var(--loginInputBackgroundColor);
        border-bottom-left-radius: 0;
        border-top-left-radius: 0;
    }

    .login input[type="password"]:focus,
    .login input[type="password"]:hover,
    .login input[type="text"]:focus,
    .login input[type="text"]:hover {
        background-color: var(--loginInputHoverBackgroundColor);
    }

    .login input[type="submit"] {
        background-color: var(--loginSubmitBackgroundColor);
        color: var(--loginSubmitColor);
        font-weight: 700;
        text-transform: uppercase;
    }

    .login input[type="submit"]:focus,
    .login input[type="submit"]:hover {
        background-color: var(--loginSubmitHoverBackgroundColor);
    }

    /* modules/text.css */

    p {
        margin-block: 1.5rem;
    }

    .text--center {
        text-align: center;
    }
    .imagem{
        border-radius: 50%;
        width: 50%;
        padding: 10px;
      }
    .botao {
        margin-top: 5px;
        background: none;
        position: relative;
        font-weight: bold;
        font-size: inherit;
        width:100%;
        height:10%;
        border-width: medium;
        border-style: solid;
        border-color: burlywood;
        border-radius: 35px;
    }
    .botao:hover{
        background:burlywood;
        border-width: medium;
        border-style: solid;
        border-color: white;

    }
    .texto{
        font-family: "Open Sans", sans-serif;
        color: #7f757b;
        padding: 3px;
    }

</style>
<body class="align">

  <div class="grid">

     <center><img src="../fotos/logo_mini.png" class="imagem"></center>

      <form action="verificaLogin.php" method="post">

          <div class="form-group">
              <label for="email">Email</label>
              <input type="email" class="form-control" id="email" name="email" placeholder="email@123.com" required>
          </div>

          <div class="form-group">
              <label for="cpf">CPF</label>
              <input type="number" class="form-control" name="cpf" id="cpf" required>
          </div>

       <div class="form__field">
        <input type="submit" value="Login">
      </div>

    </form>
      <br>

      <button type="button" class="bnt botao"><div class="texto">Esqueceu a senha?
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right-short" viewBox="0 0 16 16">
              <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z"/>
          </svg>
          </div>
      </button>

      <a href="cadastroCliente.php"><button type="button" class="bnt botao"><div class="texto">Cliente novo?
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right-short" viewBox="0 0 16 16">
              <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z"/>
          </svg>
          </div>
      </button>
      </a>
  </div>

  <svg xmlns="http://www.w3.org/2000/svg" class="icons">
    <symbol id="icon-arrow-right" viewBox="0 0 1792 1792">
      <path d="M1600 960q0 54-37 91l-651 651q-39 37-91 37-51 0-90-37l-75-75q-38-38-38-91t38-91l293-293H245q-52 0-84.5-37.5T128 1024V896q0-53 32.5-90.5T245 768h704L656 474q-38-36-38-90t38-90l75-75q38-38 90-38 53 0 91 38l651 651q37 35 37 90z" />
    </symbol>
    <symbol id="icon-lock" viewBox="0 0 1792 1792">
      <path d="M640 768h512V576q0-106-75-181t-181-75-181 75-75 181v192zm832 96v576q0 40-28 68t-68 28H416q-40 0-68-28t-28-68V864q0-40 28-68t68-28h32V576q0-184 132-316t316-132 316 132 132 316v192h32q40 0 68 28t28 68z" />
    </symbol>
    <symbol id="icon-user" viewBox="0 0 1792 1792">
      <path d="M1600 1405q0 120-73 189.5t-194 69.5H459q-121 0-194-69.5T192 1405q0-53 3.5-103.5t14-109T236 1084t43-97.5 62-81 85.5-53.5T538 832q9 0 42 21.5t74.5 48 108 48T896 971t133.5-21.5 108-48 74.5-48 42-21.5q61 0 111.5 20t85.5 53.5 62 81 43 97.5 26.5 108.5 14 109 3.5 103.5zm-320-893q0 159-112.5 271.5T896 896 624.5 783.5 512 512t112.5-271.5T896 128t271.5 112.5T1280 512z" />
    </symbol>
  </svg>

</body>