<?php

include_once("../models/DashboardModel.php");

$id_compromisso = $_GET['id'] ?? null;

if ($id_compromisso) {
    $dashboard = new DashboardModel();
    $dashboard->ExcluirCompromisso($id_compromisso);
} else {
    header("Location: ../views/dashboard.php");
}