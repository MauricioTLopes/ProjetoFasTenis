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
			<h1>Excluir Tênis</h1>
			
			<?php
				
				if(isset($_GET["f_bt_excluir_sapato"])){
					$vid=$_GET["f_sapatos"];
					$sql="DELETE FROM tb_sapatos WHERE id_sapato=$vid";
					mysqli_query($con,$sql);
					$linhas=mysqli_affected_rows($con);
					if($linhas >= 1){
						echo "<p>Tênis deletado com sucesso</p>";
					}else{
						echo "<p>Erro ao deletar Tênis</p>";
					}
				}
			
			?>
			
			<form name="f_excluir_sapato" action="excluir_sapato.php" class="f_colaborador" method="get">
				<input type="hidden" name="num" value="<?php echo $n1; ?>">
				<label>Selecione o Tênis</label>
				<select name="f_sapatos" size="30">
					<?php
						$sql="SELECT * FROM tb_sapatos";
						$col=mysqli_query($con,$sql);
						//$total_col=mysqli_num_rows($col);
						while($exibe=mysqli_fetch_array($col)){
						echo "<option value='".$exibe['id_sapato']."'>".$exibe['marca']." - ".$exibe['modelo']." - ".$exibe['tipo']."</option>";
							
						}
					?>
				</select>
				<input type="submit" name="f_bt_excluir_sapato" class="btmenu" value="excluir">
				
			</form>
		</section>

		
	</body>
</html>