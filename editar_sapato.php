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
	</head>
	<body>
		<header>
			<?php
				include "topo.php"
			?>
		</header>

		<section id="main">
			
			<a href="gerenciamento.php?num=<?php echo $n1; ?>" target="_self" class="btmenu">voltar</a>
			<h1>Editar Tênis</h1>
			
			<form name="f_editar_sapato" action="editar_sapato.php" class="f_colaborador" method="get">
				<input type="hidden" name="num" value="<?php echo $n1; ?>">
				<label>Selecione o Tênis</label>
				<select name="f_sapatos" size="20">
					<?php
						$sql="SELECT * FROM tb_sapatos ORDER BY marca";
						$col=mysqli_query($con,$sql);
						$total_col=mysqli_num_rows($col);
						while($exibe=mysqli_fetch_array($col)){
							echo "<option value='".$exibe['id_sapato']."'> ".$exibe['marca']." - ".$exibe['modelo']."</option>";
							
						}
					?>
				</select>
				<input type="submit" name="f_bt_editar_sapato" class="btmenu" value="editar">	
			</form>
			
			<?php
			
				if(isset($_GET["f_sapatos"])){
					$vid=$_GET["f_sapatos"];
					$sql="SELECT * FROM tb_sapatos WHERE id_sapato=$vid";
					$col=mysqli_query($con,$sql)or die(mysql_error());
					$exibe=mysqli_fetch_array($col);
					if($exibe >= 1){
						echo "
							<form name='f_edita_sapato' action='editar_sapato.php' class='f_colaborador' method='get'>
							<input type='hidden' name='num' value=$n1>
							<input type='hidden' name='id' value='".$exibe['id_sapato']."'>
							<label>Marca</label>
							<input type='text' name='f_marca' size='30' maxlength='30' required='required' value='".$exibe['marca']."'>
							<label>Modelo</label>
					        <input type='text' name='f_modelo' size='30' maxlength='30' required='required' value='".$exibe['modelo']."'>
							<label>Valor</label>
							<input type='text' name='f_valor' size='5' maxlength='5' required='required' value='".$exibe['valor']."'>
							<label>Quantidade</label>
							<input type='text' name='f_quantidade' size='5' maxlength='5' required='required' value='".$exibe['quantidade']."'>
							<label>Tamanho</label>
							<input type='text' name='f_tamanho' size='5' maxlength='5' required='required' value='".$exibe['tamanho']."'>
							<label>Tipo</label>
					        <input type='text' name='f_tipo' size='20' maxlength='20' required='required' value='".$exibe['tipo']."'>
							<label>Cor</label>
							<input type='text' name='f_cor' size='20' maxlength='20' required='required' value='".$exibe['cor']."'>
							<label>Gênero</label>
							<input type='text' name='f_genero' size='10' maxlength='10' required='required' value='".$exibe['genero']."' >
							<label>Observação</label>
							<textarea type='text' name='f_observacao' rows='5' cols='51' size='255' required='required' name='texto'>".$exibe['obs']."</textarea>
							<input type='submit' name='f_bt_edita_sapato' class='btmenu' value='gravar'
						";
					}
				}
			
				
				if(isset($_GET["f_bt_edita_sapato"])){
					$vid=$_GET["id"];
					$vmarca=$_GET["f_marca"];
					$vmodelo=$_GET["f_modelo"];
					$vvalor=$_GET["f_valor"];
					$vquantidade=$_GET["f_quantidade"];
					$vtamanho=$_GET["f_tamanho"];
					$vtipo=$_GET["f_tipo"];
					$vcor=$_GET["f_cor"];
					$vgenero=$_GET["f_genero"];
					$vobservacao=$_GET["f_observacao"];
					
					$sql="UPDATE tb_sapatos SET marca='$vmarca', modelo='$vmodelo', valor='$vvalor', quantidade='$vquantidade', tamanho='$vtamanho', tipo='$vtipo', cor='$vcor', genero='$vgenero', obs='$vobservacao' WHERE id_sapato=$vid";
					$res=mysqli_query($con,$sql);
					$linhas=mysqli_affected_rows($con);
					if($linhas >= 1){
						header('Location:editar_sapato.php?num='.$n1);
					}else{
						echo "<p>Erro ao atualizar colaborador</p>";
					}
				}
				
			?>
			

		</section>

		
	</body>
</html>