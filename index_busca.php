<?php
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
			
			<a href="index.php" target="_self" class="btmenu">voltar</a>
			<h1>Encontrar Tênis</h1>
			
			<form name="f_editar_sapato" action="index_busca.php" class="f_colaborador" method="get">
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
				<input type="submit" name="f_bt_editar_sapato" class="btmenu" value="buscar">	
			</form>
			
			<?php
			
				if(isset($_GET["f_sapatos"])){
					$vid=$_GET["f_sapatos"];
					$sql="SELECT * FROM tb_sapatos WHERE id_sapato=$vid";
					$col=mysqli_query($con,$sql)or die(mysql_error());
					$exibe=mysqli_fetch_array($col);
					if($exibe >= 1){
						echo "<div id=tabela>
							<table class=tabela_sapato>
							<thead>
							<tr><th colspan='9'>Marca: <u class=exibe_dados>".$exibe['marca']."</u> - Modelo: <u class=exibe_dados>".$exibe['modelo']."</u></th></tr>
							</thead>
							<tfoot>
							<tr><td colspan='9'>Observação: <u class=exibe_dados>".$exibe['obs']." </u> </td></tr>
							</tfoot>
							<tbody>
							<tr>
							<td>Quantidade:</td>
							<td>Id Sapato:</td>
							<td>Valor R$:</td>
							<td>Tamanho:</td>
							<td>Tipo:</td>
							<td>Cor:</td>
							<td>Gênero:</td>
							</tr>
							<tr>
							<td class=exibe_dados>".$exibe['quantidade']."</td>
							<td class=exibe_dados>".$exibe['id_sapato']."</td>
							<td class=exibe_dados>".number_format($exibe['valor'],2,',','.')."</td>
							<td class=exibe_dados>".$exibe['tamanho']."</td>
							<td class=exibe_dados>".$exibe['tipo']."</td>
							<td class=exibe_dados>".$exibe['cor']."</td>
							<td class=exibe_dados>".$exibe['genero']."</td>
							</tr>
							</tbody>
							</table>
							<hr>
						</div>";
					}
				}
			
				
			?>
			

		</section>

		
	</body>
</html>