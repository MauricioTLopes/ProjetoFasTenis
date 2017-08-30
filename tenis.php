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
		<p>Organizar por:<br></p>
		<form name="f_opcao" action="tenis.php" class="f_colaborador" method="get">
			<input type="submit" name="f_bt_quantidade" class="btmenu" value="Quantidade">
			<input type="submit" name="f_bt_tamanho" class="btmenu" value="Tamanho">
			<input type="submit" name="f_bt_preco" class="btmenu" value="Preço">
			<br>
		</form>
		<?php
			if(isset($_GET["f_bt_quantidade"])){
				$sql="SELECT * FROM tb_sapatos ORDER BY quantidade";
				$res=mysqli_query($con,$sql);
				while($exibe=mysqli_fetch_array($res)){
					echo"<div id=tabela>
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
			
			if(isset($_GET["f_bt_tamanho"])){
				$sql="SELECT * FROM tb_sapatos ORDER BY tamanho";
				$res=mysqli_query($con,$sql);
				while($exibe=mysqli_fetch_array($res)){
					echo"<div id=tabela>
							<table class=tabela_sapato>
							<thead>
							<tr><th colspan='9'>Marca: <u class=exibe_dados>".$exibe['marca']."</u> - Modelo: <u class=exibe_dados>".$exibe['modelo']."</u></th></tr>
							</thead>
							<tfoot>
							<tr><td colspan='9'>Observação: <u class=exibe_dados>".$exibe['obs']." </u> </td></tr>
							</tfoot>
							<tbody>
							<tr>
							<td>Tamanho:</td>
							<td>Quantidade:</td>
							<td>Id Sapato:</td>
							<td>Valor R$:</td>
							<td>Tipo:</td>
							<td>Cor:</td>
							<td>Gênero:</td>
							</tr>
							<tr>
							<td class=exibe_dados>".$exibe['tamanho']."</td>
							<td class=exibe_dados>".$exibe['quantidade']."</td>
							<td class=exibe_dados>".$exibe['id_sapato']."</td>
							<td class=exibe_dados>".number_format($exibe['valor'],2,',','.')."</td>
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
				
			if(isset($_GET["f_bt_preco"])){
				$sql="SELECT * FROM tb_sapatos ORDER BY valor";
				$res=mysqli_query($con,$sql);
				while($exibe=mysqli_fetch_array($res)){
					echo"<div id=tabela>
							<table class=tabela_sapato>
							<thead>
							<tr><th colspan='9'>Marca: <u class=exibe_dados>".$exibe['marca']."</u> - Modelo: <u class=exibe_dados>".$exibe['modelo']."</u></th></tr>
							</thead>
							<tfoot>
							<tr><td colspan='9'>Observação: <u class=exibe_dados>".$exibe['obs']." </u> </td></tr>
							</tfoot>
							<tbody>
							<tr>
							<td>Valor R$:</td>
							<td>Tamanho:</td>
							<td>Quantidade:</td>
							<td>Id Sapato:</td>
							<td>Tipo:</td>
							<td>Cor:</td>
							<td>Gênero:</td>
							</tr>
							<tr>
							<td class=exibe_dados>".number_format($exibe['valor'],2,',','.')."</td>
							<td class=exibe_dados>".$exibe['tamanho']."</td>
							<td class=exibe_dados>".$exibe['quantidade']."</td>
							<td class=exibe_dados>".$exibe['id_sapato']."</td>
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
	
		<footer>
			<?php
				include "rodape.html";
			?>
		</footer>
		
	</body>
</html>