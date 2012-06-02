<!DOCTYPE html>
<html lang='es'>
<head>
	<meta charset='utf-8' />
	<title><?php echo $titulo?></title>
	<link rel="stylesheet" href="<?php echo base_url()?>css/bootstrap.css" />
	<script type="text/javascript" src="<?php echo base_url()?>js/jquery-1.7.2.js"></script>
	<script type="text/javascript">
		var path = '<?php echo base_url()?>index.php/';

		jQuery(document).ready(function() {
			cargarProvincias();

			$('#sDep').change(cargarProvincias);
			$('#sPro').change(cargarDistritos);
			$('#sDis').change(cargarCentros);
		});

		function cargarProvincias () {
			var cd = $('#sDep').val();

			$.get(path + 'ubigeo/prov', {'id' : cd}, function(resp) {
				$('#sPro').empty().html(resp);
				cargarDistritos();
			});
		}
		function cargarDistritos () {
			var cp = $('#sPro').val();

			$.get(path + 'ubigeo/dist', {'id' : cp}, function(resp) {
				$('#sDis').empty().html(resp);
				cargarCentros()
			});
		}
		function cargarCentros () {
			var cd = $('#sDis').val();

			$.get(path + 'ubigeo/cent', {'id' : cd}, function(resp) {
				$('#sCen').empty().html(resp);
			});
		}
		
	</script>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="offset2 span8 well">
				<h1>Listas Desplegables con CI y jQuery</h1>

				<label for="dpto">Departamentos</label>
				<select name="sDep" id="sDep">
<?php foreach ($dptos as $dpto) : ?>
<option value="<?php echo $dpto->id?>"><?php echo $dpto->desdep?></option>
<?php endforeach;?>
				</select>

				<label for="prov">Provincias</label>
				<select name="sPro" id="sPro"></select>
				<label for="dist">Distritos</label>
				<select name="sDis" id="sDis"></select>
				<label for="cent">Centros</label>
				<select name="sCen" id="sCen" class="span4"></select>
			</div>
		</div>
	</div>
</body>
</html>