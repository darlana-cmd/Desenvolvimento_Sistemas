<?php
session_name("Agenda");
session_start();

if (session_status() === PHP_SESSION_NONE) {
    session_name("Agenda");
    session_start();
}

if (!isset($_SESSION["login"])) {
    header("Location: http://localhost:8080/Agenda");
    exit();
}

include_once("../models/DashboardModel.php");
$id_usuario = $_SESSION["id_usuario"] ?? 1;

$dashboard = new DashboardModel();

$totalContatos = $dashboard->contarContatos($id_usuario);
$proximosCompromissos = $dashboard->buscarProximosCompromissos($id_usuario);
$totalCompromissos = $dashboard->contarCompromissos($id_usuario);
$contatosRecentes = $dashboard->buscarContatos($id_usuario);
?>