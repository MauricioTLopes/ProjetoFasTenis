<?php
	session_start();
	if(isset($_SESSION["numlogin"])){
		$n1=$_GET["num"];
		$n2=$_SESSION["numlogin"];
		if($n1!=$n2){
			echo "<p>Acesso Negado</p>";
			exit;
		}
	}else{
			echo "<p>Acesso Negado</p>";
			exit;
	}
	include "conexao.inc";
?>


<!doctype html>
<html lang="pt-br">
	<head >
		<meta charset="utf-8">
		<title>Fornecedora FasTenis</title>
		<link rel="stylesheet" href="estilos.css"/>
		<script src="jquery-3.2.1.min.js"></script>
		<script>	
			$(document).ready(function(){
				$('select[name="f_marca"]').on('change',function(){
					var vmarcas=this.value;
					$('select[name="f_modelo"] option').each(function(){
						var $this=$(this);
						if($this.data('marca') == vmarcas){
							$this.show();
						}else{
							$this.hide();
						}
					});
				});
				$('select[name="f_modelo"]').val('');
			});
			
			
		</script>
	</head>
	<body>
		<header>
			<?php
				include "topo.php"
			?>
		</header>

		<section id="main">
			
			<a href="gerenciamento.php?num=<?php echo $n1; ?>" target="_self" class="btmenu">voltar</a>
			<h1>Novo Tênis</h1>
			<?php
				
				if(isset($_GET["f_bt_novosapato"])){
					$vmarca=$_GET["f_marca"];
					$vmodelo=$_GET["f_modelo"];
					$vvalor=$_GET["f_valor"];
					$vquantidade=$_GET["f_quantidade"];
					$vtamanho=$_GET["f_tamanho"];
					$vtipo=$_GET["f_tipo"];
					$vcor=$_GET["f_cor"];
					$vgenero=$_GET["f_genero"];
					$vobs=$_GET["f_observacao"];
					
					$sql="INSERT INTO tb_sapatos(marca,modelo,valor,quantidade,tamanho,tipo,cor,genero,obs) VALUES('$vmarca','$vmodelo','$vvalor','$vquantidade','$vtamanho','$vtipo','$vcor','$vgenero','$vobs')";
					mysqli_query($con,$sql);
					$linhas=mysqli_affected_rows($con);
					if($linhas >= 1){
						echo "<p>Novo Tênis gravado com sucesso</p>";
					}else{
						echo "<p>Erro ao gravar novo Tênis</p>";
					}
				}
			
			?>
			
			<form name="f_novo_sapato" action="novo_sapato.php" class="f_novosapato" method="get">
				<input type="hidden" name="num" value="<?php echo $n1; ?>">
				<label>Marca</label>
				<select name="f_marca">
					<option value=""></option>
					<?php
						$sql="SELECT * FROM tb_marcas";
						$res=mysqli_query($con,$sql);
						while($linha=mysqli_fetch_array($res)){
							echo "<option value='".$linha[0]."'>".$linha[1]."</option>";
						}	
						
					?>
				</select>
				<label>Modelo</label>
				<select name="f_modelo">
					<option value=""></option>
					<?php
						$sql="SELECT * FROM tb_modelos";
						$res=mysqli_query($con,$sql);
						while($linha=mysqli_fetch_array($res)){
							echo "<option value='".$linha[1]."' data-marca='".$linha[2]."'>".$linha[1]."</option>";
						}		
						
					?>
				</select>
			
					<label>Valor R$</label>
					<input type="text" name="f_valor" maxlength="10" size="10" patter="[0-4]+$ required="required">
					<label>Quantidade</label>
					<input type="text" name="f_quantidade" maxlength="4" size="4" required="required">
					<label>Tamanho</label>
					<input type="text" name="f_tamanho" maxlength="2" size="2" required="required">
					<label>Tipo</label>
					<input type="text" name="f_tipo" maxlength="15" size="15" required="required">
					<label>Cor</label>
					<input type="text" name="f_cor" maxlength="20" size="20" required="required">
					<label>Genêro</label>
					<input type="text" name="f_genero" maxlength="10" size="10" required="required">
					<label>Observação</label>
					<textarea type="text" name="f_observacao" rows="5" cols="51" size="255" required="required"></textarea>

					<input type="submit" name="f_bt_novosapato" class="btmenu" value="gravar">
					
			</form>
		</section>

		
	</body>
</html>