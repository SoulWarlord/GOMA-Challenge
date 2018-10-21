<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>GOMA - Registar Clientes</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="styles/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="styles/style.css" />
    
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    
</head>
<body>
    <div id="wrapper">
        <div id="page_header">
            <div id="logo">
                <img src="styles/gomalogo.png" alt="GOMA Development">
            </div>
            <div id="page_name">
            <p> CLIENTES </p>
            </div> 
        </div>
        <div id="list">
            <a href="client_list.php">LISTAR CLIENTES</a>
        </div>
        <div id="greetings">
            <p id="welcome"> BEM-VINDO <br> </p>
            <p> GOMA is a company form Portugal that creates integrated web-based solutions. <br>
            We work with organizations of all sizes to design and build great digital products.</p>
        </div>
        <div id="full_body">
        <div id="data_form">
        <?php
            $required = array('name', 'nif', 'phone', 'address', 'city', 'country');
            $missing_value = false;
            foreach($required as $field){
                if(empty($_POST[$field])){
                    $missing_value = true;
                }
            }
            if($_SERVER["REQUEST_METHOD"] == "POST" and !$missing_value){
                
                include 'database.php';
                $database = new Database();
                $mysqli = $database->databaseConnect();
        
                $sql = "INSERT INTO client (name, nif, phone, address, city, country) VALUES(?,?,?,?,?,?)";
                $statement = $mysqli->prepare($sql);
                $statement->bind_param("ssssss", $_POST['name'], $_POST['nif'], $_POST['phone'], $_POST['address'], $_POST['city'], $_POST['country']);
                $statement->execute();
                $success_message = ("Os dados foram inseridos na base de dados");
                $database->databaseClose();
            }
            elseif($_SERVER["REQUEST_METHOD"] == "POST" and $missing_value){
                $error_message = ("ERRO, Verifique se preencheu os campos devidamente");
            }   
        ?>
            
            <?php
                if($_SERVER["REQUEST_METHOD"] == "POST" and isset($success_message)){
                    echo("<div id='success_msg'><p>"  . $success_message . "</p></div>");  
                }
                elseif($_SERVER["REQUEST_METHOD"] == "POST" and isset($error_message)){
                    echo("<div id='error_msg'><p>" . $error_message . "</p></div>");
                }
            ?>
            <div id="insert">
                <p> INSERIR CLIENTE </p>
            </div>
            <form action="register.php" method="post">
            <div class="form_full_width">
                <p>Nome:</p>
                <input type="text" class="form-control" name="name">
            </div>
            <div class="form_half_width">
                <div class="form_col1">
                    <p>NIF:</p>
                    <input type="number" class="form-control" name="nif">
                </div>
                <div class="form_col2">
                    <p> Telefone: </p>
                    <input type="text" class="form-control" name="phone">
                </div>
            </div>
            <div class="form_full_width">
                <p>Morada:</p>
                <input type="text" class="form-control" name="address">
            </div>
            <div class="form_half_width">
                <div class="form_col1">
                    <p>Localidade:</p>
                    <input type="text" class="form-control" name="city">
                </div>
                <div class="form_col2">
                    <p> País:</p>
                    <select class="form-control" name="country">
                    <option disabled selected value></option>
                    <option value="Portugal">Portugal</option>
                    <option value="Espanha">Espanha</option>
                    <option value="Holanda">Holanda</option>
                    <option value="França">França</option>
                     </select>
                </div>
            </div>
            <div id="button_container">
                <input id="button_submit" class="btn btn-primary" type="submit" name="submit">
            </div>
            </form>
        </div>
        </div>
    </div> 
</body>
<div class="footer">
    <p> HTTPS:\\GOMADEVELOPMENT.PT </p>
</div>
</html>