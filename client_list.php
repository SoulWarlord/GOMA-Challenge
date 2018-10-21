<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>GOMA - Clientes Registados</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="styles/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="styles/style.css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
</head>
<body>
    <?php
        require_once 'database.php';
        $database = new Database();
        $mysqli = $database->databaseConnect();
        $sql = mysqli_query($mysqli, "SELECT COUNT(*) as register FROM client");
        $registers = mysqli_fetch_assoc($sql);
        $database->databaseClose();
    ?>
    <div id="wrapper">
        <div id="page_header">
            <div id="logo">
                <img src="styles/gomalogo.png" alt="GOMA Development">
            </div>
            <div id="page_name">
                <p> CLIENTES </p>
            </div> 
        </div>
        <div>
            <a id="insert_new" href="register.php">INSERIR NOVO</a>
        </div>
        <div class="grid-container">
            <div id="page_title">
                <p> LISTA DE CLIENTES </p>
            </div>
            <div id="results">
                <p> ( <span id="php_result"><?php echo($registers['register'])?></span> resultados no sistema) </p>
            </div>
            <div id="last_reg">
                <a href="client_list.php?last_reg">ULTIMOS 3 REGISTOS</a>
            </div>
        </div>
        
        <div id="client_list_data"<?php if (isset($_GET['last_reg'])){?>style="display:none"<?php } ?>>
        <?php
                require_once 'clientes.php';
                $client = new Clients();
                $data_array = $client->listClients();
                $array_length = count($data_array);
                for ($i = $array_length-1; $i >= 0; $i--) {
                    if($i == 0){
                        echo("<div class='client_data_final'>
                         <span class='client_name'>"  . $data_array[$i]['name'] . " </span><br>
                        <span class='client_info'>" . $data_array[$i]['address'] . ", " . $data_array[$i]['city'] .
                        ", " . $data_array[$i]['country'] . " - NIF: " . $data_array[$i]['nif'] . ", Tel. " 
                        . $data_array[$i]['phone'] . "</span>
                        </div>");
                    }
                    else{
                        echo("<div class='client_data'>
                        <span class='client_name'>"  . $data_array[$i]['name'] . " </span><br>
                        <span class='client_info'>" . $data_array[$i]['address'] . ", " . $data_array[$i]['city'] .
                        ", " . $data_array[$i]['country'] . " - NIF: " . $data_array[$i]['nif'] . ", Tel. " 
                        . $data_array[$i]['phone'] . "</span>
                        </div>");
                    }
                }
            ?>
        </div>
        <div id="last_reg_list_data" <?php if (isset($_GET['last_reg'])){?>style="display:block"<?php } ?>>
        <?php
                require_once 'clientes.php';
                $client = new Clients();
                $last_data_array = $client->last3Registers();
                $last_array_length = count($last_data_array);
                for ($i = 0; $i < $last_array_length; $i++) {
                    if($i == $last_array_length-1){
                        echo("<div class='client_data_final'>
                         <span class='client_name'>"  . $last_data_array[$i]['name'] . " </span><br>
                        <span class='client_info'>" . $last_data_array[$i]['address'] . ", " . $last_data_array[$i]['city'] .
                        ", " . $last_data_array[$i]['country'] . " - NIF: " . $last_data_array[$i]['nif'] . ", Tel. " 
                        . $last_data_array[$i]['phone'] . "</span>
                        </div>");
                    }
                    else{
                        echo("<div class='client_data'>
                        <span class='client_name'>"  . $last_data_array[$i]['name'] . " </span><br>
                        <span class='client_info'>" . $last_data_array[$i]['address'] . ", " . $last_data_array[$i]['city'] .
                        ", " . $last_data_array[$i]['country'] . " - NIF: " . $last_data_array[$i]['nif'] . ", Tel. " 
                        . $last_data_array[$i]['phone'] . "</span>
                        </div>");
                    }
                }
            ?>
            <div id="back">
                <a href="client_list.php">VOLTAR AO REGISTO COMPLETO</a>
            </div>
        </div>
        
    </div> 
</body>
<div class="footer">
    <p> HTTPS:\\GOMADEVELOPMENT.PT </p>
</div>
</html>