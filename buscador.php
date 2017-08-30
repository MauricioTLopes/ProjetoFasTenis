<?php
	include "conexao.inc";
	

		
?>
<head>		
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
<section id="main">
	<p class="titulo">Encontre um tênis</p>
	<form name="fbuscador" id="fbuscador" action="index_busca.php" class="f_colaborador" method="get">
		<input type="hidden" name="num" value="<?php echo $n1; ?>">

		<div class="divbusca">
			<input type="submit" value="BUSCAR" name="f_submit" class="btmenu">
		</div>
	<?php
		if(isset($_GET["f_sapatos"])){
			$vid=$_GET["f_sapatos"];
			$sql="SELECT * FROM tb_sapatos WHERE id_sapato=$vid";
			$col=mysqli_query($con,$sql)or die(mysql_error());
			$exibe=mysqli_fetch_array($col);
			if($exibe >= 1){
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
	?>	
		
		
	</form>

		

</section>
