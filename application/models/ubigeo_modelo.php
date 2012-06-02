<?php 

/**
* 
*/
class Ubigeo_modelo extends CI_Model
{
	function devolverDepartamentos()
	{
		$sql = $this->db->query("SELECT id,desdep FROM departamentos");

		return $sql->result();
	}

	public function devolverProvincias($coddep)
	{
		$sql = $this->db->where('departamento_id', $coddep)->get('provincias');

		$cadena = "";

		foreach ($sql->result_array() as $reg) {
			$cadena.="<option value='{$reg['id']}'>{$reg['despro']}</option>";
		}

		echo $cadena;
	}

	public function devolverDistritos($codpro)
	{
		$sql = $this->db->where('provincia_id', $codpro)->get('distritos');

		$cadena = "";

		foreach ($sql->result_array() as $reg) {
			$cadena.="<option value='{$reg['id']}'>{$reg['desdist']}</option>";
		}

		echo $cadena;
	}

	public function devolverCentros($coddis)
	{
		$sql = $this->db->where('distrito_id', $coddis)->get('centros');

		$cadena = "";

		foreach ($sql->result_array() as $reg) {
			$cadena.="<option value='{$reg['id']}'>{$reg['descen']}</option>";
		}

		echo $cadena;
	}

}
