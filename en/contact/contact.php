<?php
if (isset($_POST) && ($_POST != "")){

    if ( (isset($_POST["name"])) && (isset($_POST["email"])) ){

        $para      = 'jnajul@btncapital.com';
        $titulo    = 'Contact Form';


        // Para enviar un correo HTML, debe establecerse la cabecera Content-type
        $cabeceras  = 'MIME-Version: 1.0' . "\r\n";
        $cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

        $cabeceras .= 'From: BTN Capital <jnajul@btncapital.com>' . "\r\n" .
            'Reply-To: '. $_POST["email"] . "\r\n" .
            'X-Mailer: PHP/' . phpversion();

        $mensaje   = '<html><body>';
        $mensaje   .= '<br/><h1>Contacto:</h1>';
        $mensaje   .= '<br/><strong>Nombre:</strong> ' . $_POST["name"];
        $mensaje   .= '<br/><strong>Email:</strong> ' . $_POST["email"];
		if(isset($_POST["comments"]) && ($_POST["comments"] != "") ){
        $mensaje   .= '<br/><br/><strong>Mensaje:</strong> ' . $_POST["comments"];
        }

        $mensaje   .= '<br/></div></body></html>';

        /*var_dump($mensaje);echo '<br/>';var_dump($cabeceras);die;*/

        //ENVIO
        $success = mail($para, $titulo, $mensaje, $cabeceras);

        if(($success == "true")){

            if(isset($_POST["backurl"])){

                $url = 'Location: ' . $_POST["backurl"].'?mail=1';
                header($url);

            }
           // echo "para: ".$para."t: ".$titulo. "mens: ".$mensaje." cab: ". $cabeceras;

        }else{
                echo 'ERROR EN EL ENVIO';
        }


    }else{
        echo "Por favor, rellene todos los campos necesarios.";
    }

}else{
    echo "Acceso Restringido";
}
?>
