<?php
require_once 'Model.php';

class DiretorDAO extends Model
{
    public function __construct()
    {
        parent::__construct();
        $this->class = 'Diretor';
        $this->tabela = 'diretor';
    }

	public function insereDiretor(Diretor $diretor) {
		$values = "null, '{$diretor->getNome()}'";
		return $this->inserir($values);
	}

	public function alteraDiretor(Diretor $diretor) {
		$values = "nome = '{$diretor->getNome()}'";
		$this->alterar($diretor->getId(), $values);
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