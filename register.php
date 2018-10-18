<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
        <div id="separator">
            <hr>
        </div>
        <div id="greetings">
            <p id="welcome"> BEM-VINDO <br> </p>
            <p> GOMA is a company form Portugal that creates integrated web-based solutions. <br>
            We work with organizations of all sizes to design and build great digital products.</p>

        </div>
        <div id="full_body">
        <div id="data_form">
            <p id="insert"> INSERIR CLIENTE </p>

            <form action="register.php" method="post">
            <div class="form_full_width">
                <p>Nome:</p>
                <input type="text" name="name">
            </div>
            <div class="form_half_width">
                <div class="form_col1">
                    <p>NIF:</p>
                    <input type="number" name="nif">
                </div>
                <div class="form_col2">
                    <p> Telefone: </p>
                    <input type="text" name="phone">
                </div>
            </div>
            <div class="form_full_width">
                <p>Morada:</p>
                <input type="text" name="address">
            </div>
            <div class="form_half_width">
                <div class="form_col1">
                    <p>Localidade:</p>
                    <input type="text" name="city">
                </div>
                <div class="form_col2">
                    <p> País:</p>
                    <select name="country">
                    <option disabled selected value></option>
                    <option value="portugal">Portugal</option>
                    <option value="espanha">Espanha</option>
                    <option value="holanda">Holanda</option>
                    <option value="franca">França</option>
                     </select>
                </div>
            </div>
            <div id="button_container">
                <input id="button_submit" type="submit">
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