<?php
require_once 'Model.php';
class GeneroDAO extends Model
{
	public function __construct() {
		parent::__construct();
		$this->tabela = 'genero';
		$this->class = 'Genero';
	}

	public function insereGenero(Genero $genero) {
		$values = "null, '{$genero->getNome()}'";
		return $this->inserir($values);
	}

	public function alteraGenero(Genero $genero) {
		$values = "nome = '{$genero->getNome()}'";
		$this->alterar($genero->getId(), $values);
	}

	public function listar($pesquisa = '')
	{
		if ($pesquisa != '') {
			$sql = "SELECT * FROM {$this->tabela}
					WHERE nome like '%{$pesquisa}%'
						OR nome like '%{$pesquisa}%'";
		} else {
			$sql = "SELECT * FROM {$this->tabela}";
		}
		$stmt = $this->db->prepare($sql);
		$stmt->setFetchMode(PDO::FETCH_CLASS, $this->class);
		$stmt->execute();
		return $stmt->fetchAll();
	}

}