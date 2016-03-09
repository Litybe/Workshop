<?php
class MysqlConnector
{
	private $bdd;

	public function __construct()
	{
		$this->bdd = new PDO('mysql:host=localhost;dbname=loginsite;charset=utf8', 'root', '');
	}

	public function execStroredProcedureNonQuery($name, $parameters)
	{
		$stmt = $this->bdd->prepare($this->getProcedureString($name, $parameters));
		$stmt->execute($parameters);
	}

	public function execStroredProcedureQuery($name, $parameters)
	{
		$stmt = $this->bdd->prepare($this->getProcedureString($name, $parameters));
		$stmt->execute($parameters);
		return $stmt;
		/*$resultat=$stmt->fetchAll();
		print_r($resultat);*/
	}

	public function stopConnexion(){
		$this->bdd=NULL;
	}
	public function getProcedureString($name, $parameters)
	{
		$procedure = "";
		$procedure .= "CALL ".$name;
		if(count($parameters) > 0)
			$procedure.= "(";
		for($i = 0; $i < count($parameters); $i++)
		{
			$procedure.= "?";
			if(($i < count($parameters)-1))
			{
				$procedure.= ",";
			}
		}
		if(count($parameters) > 0)
			$procedure .= ")";

		return $procedure;
	}
}
?>