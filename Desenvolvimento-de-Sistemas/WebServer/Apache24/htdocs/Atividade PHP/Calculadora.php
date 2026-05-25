<?php

    class CalculadoraSimples
    {
        private $a;
        private $b;
        private $resultado;

        public function setSoma($num1, $num2)
        {
            $this->a = $num1;
            $this->b = $num2;

            $this->resultado = $num1 + $num2;
        }
        public function setSubtracao($num1, $num2)
        {
            $this->resultado = $num1 - $num2;
        }
        public function setMultiplicacao ($num1, $num2)
        {
            $this->resultado = $num1 * $num2;
        }
        public function setDivisao ($num1, $num2)
        {
            if($num2 == 0)
                {
                    echo ("Não e possível fazer essa divisão!");

                }
            else
                {
                    $this->resultado = $num1 / $num2;
                }
        }
        public function getResultado()
        {
            return $this->resultado;
        }
    }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora Online</title>
</head>
<body>
    <form method="post" action="Calculadora.php">
        <label>Digite um número:</label>   
        <input type="number" name="num1" require>
        <br/>
        <label>Digite um outro número:</label>   
        <input type="number" name="num2" require>
        <br/>
        <input type="submit" name="soma" value="+"/>
        <input type="submit" name="subtrair" value="-"/>
        <input type="submit" name="multiplicar" value="*"/>
        <input type="submit" name="dividir" value="/"/>
    </form>    
    
    
</body>
</html>

<?php

    
    if($_SERVER["REQUEST_METHOD"]== "POST")
        {
            $meuresultado = new CalculadoraSimplis();
            
            if(isset($_POST["Soma"]))
            {
                echo $meuresultado->setSomar($_POST["num1"],$_POST["num2"]);
            }
            if(isset($_POST["sacar"]))
            {
                echo $minhaConta->setSubtracao($_POST["num1"],$_POST["num2"]);
            }
            if(isset($_POST["Divisão"]))
            {
                echo $minhaConta->setMultiplicacao($_POST["num1"],$_POST["num2"]);
            }
        }
?>