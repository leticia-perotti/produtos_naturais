<?php
include "../documentacao.php";
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="\git\natural_cha_tcc\fotos\logo_mini.png">
    <title>Natural Chá</title>

    <style>
        img{
            border-radius:50%;
            width: 30px;
            height: 30px;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-light bg-light">
    <a class="navbar-brand" href="#">
        <img src="\git\natural_cha_tcc\fotos\logo_mini.png" class="d-inline-block align-top">
        Natural Chá
    </a>
</nav>

<div class="container">
    <h1> Cadastro de Cliente </h1>
    <hr>
    <div class="form-group">
        <label for="nomeCliente">Nome completo</label>
        <input type="text" class="form-control" id="nomeCliente" placeholder="Nome Completo" required>
    </div>

    <div class="form-group">
        <label for="telefoneCliente">Telefone</label>
        <input type="text" class="form-control" id="telefoneCliente">
    </div>

    <div class="form-group">
        <label for="emailCliente">Email</label>
        <input type="email" class="form-control" id="emailCliente" placeholder="email@123.com" required>
    </div>

    <div class="form-group">
        <label for="cpfCliente">CPF</label>
        <input type="email" class="form-control" id="cpfCliente" placeholder="email@123.com" required>
    </div>

    <div class="form-group">
        <label for="cidadeCliente">Cidade</label>
        <input type="email" class="form-control" id="cidadeCliente" required>
    </div>

    <div class="form-group">
        <label for="ufCliente">Unidade da Federação</label>
        <input type="email" class="form-control" id="ufCliente" required>
    </div>

    <div class="form-group">
        <label for="dataCliente">Data de nascimento</label>
        <input type="date" class="form-control" id="dataCliente" required>
    </div>


</div>
</body>

