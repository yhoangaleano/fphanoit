<?php 

class gnhanoit 
{
	private $conn = null;

	function __construct()
	{
		$this->conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
	}

	public function index(){
		$Table = "";
		$tableList = array();
		$res = $this->conn->query("SHOW TABLES");
		while($cRow = mysqli_fetch_array($res))
		{	
			$Table .= '<option value='.'"'.$cRow[0].'"'.'>'.$cRow[0].'</option>';
		}
		return $Table;
	}

	public function crear(){

		if($_POST["table"] != null){
			$columns = $this->conn->query("SHOW COLUMNS FROM ".DB_NAME.".".$_POST["table"]);
			$array = array();
			while($cCol = mysqli_fetch_array($columns))
			{	
				$array[] = array(
					'Field'=>$cCol["Field"],
					'Key'=>$cCol["Key"]
				);
			}
			echo $this->crearModelo($_POST["table"],$array)?"Creo el modelo":"No fue posible crear el modelo";
		}else{
			echo "Debes seleccionar una base de datos";
		}
	}

	public function crearModelo($nombreClase, $columns){

		$primary = "";
		foreach ($columns as $value) {
			if($value["Key"] == "PRI"){
				$primary = strtolower($value["Field"]);
			}
		}
		
		$cModel = "";
		$cModel .= "<?php\n"; 
		$cModel .= "\tclass ".ucwords($nombreClase)." extends ActiveRecord\Model\n";
		$cModel .= "\t{\n";
		$cModel .= "\t\tpublic static $"."table_name = ".'"'.$nombreClase.'"'.";\n";
		$cModel .= "\t\tpublic static $"."primary_key = ".'"'.$primary.'"'.";\n";
		$cModel .= "\t}\n";
		$cModel .= "?>";

		try{
			$archivo=fopen('application/models/'.ucwords($nombreClase).'.php','w');//abrir archivo, nombre archivo, modo apertura
			fwrite($archivo, $cModel);
			fclose($archivo); //cerrar archivo
			return true;
		}catch(Excpetion $e){
			return false;
		}

	}

	public function crearControlador($nombreClase, $columns){

		$apguardar = "$"."parametros = array(";
		$apmodificar = "";
		foreach ($columns as $value) {
			$apguardar .= "'".$value["Field"]."'=>$"."_POST['txt".ucwords($value["Field"])."'],";
			$apmodificar .= "$"."modelo->".strtolower($value["Field"])."'= $"."_POST['txt".ucwords($value["Field"])."'];";
		}
		$apguardar = ");";
		
		$cModel = "";
		$cModel .= "<?php\n"; 
		$cModel .= "\tclass ".ucwords($nombreClase)." extends controller\n";
		$cModel .= "\t{\n";
		$cModel .= "\t\tpublic function index(){\n";
		$cModel .= "\t\t\tpublic static $"."primary_key = ".'"'.$primary.'"'.";\n";
		$cModel .= "\t}\n";
		$cModel .= "?>";

		try{
			$archivo=fopen('application/controller/'.ucwords($nombreClase).'Controller.php','w');//abrir archivo, nombre archivo, modo apertura
			fwrite($archivo, $cModel);
			fclose($archivo); //cerrar archivo
			return true;
		}catch(Excpetion $e){
			return false;
		}

	}
}
?>