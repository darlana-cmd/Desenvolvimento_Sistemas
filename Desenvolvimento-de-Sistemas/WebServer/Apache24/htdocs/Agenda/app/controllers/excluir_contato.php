<?php

        $id= $_GET["var"];
 
        include_once("../models/Contato.php");

        $obj = new Contato();
        $resp = $obj->ExcluirContato($id);

        
?>