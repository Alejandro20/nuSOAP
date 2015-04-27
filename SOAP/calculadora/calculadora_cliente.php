<?php
 
require_once ('config/nusoap.php');

?>

<html>
	
    <head>
    
    	<title>Calculadora en nuSOAP</title>
    
    </head>
    
    <body>
		
        <h1> Calculadora Soap</h1>
        
        <form name="calc" method="post" action="#">
        	
            <p>Operador 1: <input type="number" id="op1" name="op1" value="<?php $op1 = $_POST['op1'];?>"/></p>
            <p>Operador 2: <input type="number" id="op2" name="op2" value="<?php $op2 = $_POST['op2'];?>"/></p>
            <p>Selecciona una Operacion:</p>
            <p><select name="Operacion" style="width:19.7%;">
            	
                <option value="<?php $Operacion = $_POST['Operacion']; ?>"> </option>
            	<option value="Add">Sumar</option>
                <option value="Rest">Restar</option>
                <option value="Mult">Multiplicar</option>
                <option value="Div">Dividir</option>
                
           	</select></p>

            <?php 
				
				$wsdl="http://localhost/ProjectosM7/SOAP/calculadora/calculadora_server.php?wsdl";
				$client = new nusoap_client($wsdl,'wsdl');
				$params = array('a' => $op1, 'b'=>$op2);
			
			?>
            <p>Resultado: <input type="number" id="result" name="result" value="<?php $result = $client->call($Operacion, $params); 																					  print_r($result);
																				?>"/>
            </p>
            
            <input type="submit" value="Calcula"/>
        
        </form>    
    
    </body>

</html>



