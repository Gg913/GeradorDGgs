<?php

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<style>
		*{
			margin: 0;
			padding: 0;
		}
		body{
			display: grid;
			justify-content: center;
			font-family: 'Trebuchet MS','Helvetica',sans-serif;
			text-align: center;
			background: #000;
			color: white;
		}
		h1{
			margin:30px 0px 2px 0px;
		}
		input[type=text]{
			width: 260px;
			height: 25px;
			font-size: 1.2em;
			background: #000;
			border: none;
			border: 2px solid white;
			background: #000;
			color: white;
		}
		input[type=text]::placeholder{
			color: white;
		}
		select{
			background: #000;
			border: 2px solid white;
			color: white;
		}
		option{
			background: #000;
			border: 2px solid white;
			color: white;
		}
		#cvv{
			width: 50px;
		}
		select{
			width: 90px;
			height: 28px;
			font-size: 1.2em;
			margin: 5px 0px;
		}
		select + select{
			margin-right: 10px;
			margin-left: 10px;
		}
		#qtd{
			width: 70px;
		}
		button{
			width: 80px;
			height: 30px;
			margin-top: 10px;
			background: #000;
			border: 2px solid white;
			color: white;
			cursor: pointer;
			margin-bottom: 20px;
		}
		button:hover{
			font-size: 1.2em;
			transition: .3s;
		}
		a{
			text-decoration: none;
			color: white;
		}
	</style>
	<title>Gerador de CC</title>
</head>
<body>
	<h1>Gerador CCs</h1>
	<p>Validadas no algoritimo de lunh</p>
    <p>by @T00lsPubl1c</p>
	<div>
		<form action="index.php" method="post">
			<div>
				<input type="text" name="cc" id="cc" placeholder="matriz" required>
			</div>
			<div>
				<select name="mes" id="mes">
					<option value="01">Mês 01</option>
					<option value="02">Mês 02</option>
					<option value="03">Mês 03</option>
					<option value="04">Mês 04</option>
					<option value="05">Mês 05</option>
					<option value="06">Mês 06</option>
					<option value="07">Mês 07</option>
					<option value="08">Mês 08</option>
					<option value="09">Mês 09</option>
					<option value="10">Mês 10</option>
					<option value="11">Mês 11</option>
					<option value="12">Mês 12</option>
				</select>

				<select name="ano" id="ano">
					<option value="2023">2023</option>
					<option value="2024">2024</option>
					<option value="2025">2025</option>
					<option value="2026">2026</option>
					<option value="2027">2027</option>
					<option value="2028">2028</option>
					<option value="2029">2029</option>
					<option value="2030">2030</option>
				</select>
				<input type="text" name="cvv" placeholder="CVV" id="cvv" required>
			</div>

			<div>
				<button type="submit" name="gerar">Gerar</button>
			</div>
		</form>
	</div>
	<div>

<?php

if(isset($_POST['gerar'])){

    $cc = $_POST['cc'];
    $mes = $_POST['mes'];
    $ano = $_POST['ano'];
    $cvv = $_POST['cvv'];


    $qtd = "150";
    $results = []; 

    for($x=0; $x<$qtd; $x++){
        
      $count = substr($cc, 0, 12);
      
      $digits = 16 - strlen($count);
      $cc_resto = substr(str_shuffle("0123456789"), 0, $digits);

 
            $number = $cc.$cc_resto;
            $sumTable = array(
                array(0,1,2,3,4,5,6,7,8,9),
                array(0,2,4,6,8,1,3,5,7,9)
            );
            $sum = 0;
            $flip = 0;
            for ($i = strlen($number) - 1; $i >= 0; $i--) {
                $sum += $sumTable[$flip++ & 0x1][$number[$i]];
            }
            if($sum % 10 === 0){
                $results[] = $number."|".$mes."|".$ano."|".$cvv;
            }
        }
    
   echo implode("<br>", $results);

}
?>
	</div>
</body>
</html>