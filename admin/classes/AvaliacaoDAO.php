<?php
require_once 'Model.php';

class AvaliacaoDAO extends Model
{
    public function __construct()
    {
        parent::__construct();
        $this->class = 'Avaliacao';
        $this->tabela = 'avaliacao';
    }

	public function insereAvaliacao(Avaliacao $avaliacao) {
		$values = "null, '{$avaliacao->getAvaliacao()}',
						 '{$avaliacao->getDataAvaliacao()}',
						 '{$avaliacao->getUsuarioId()}',
						 '{$avaliacao->getFilmeId()}'";
		return $this->inserir($values);
	}

	public function alteraAvaliacao(Avaliacao $avaliacao) {
		$values = "avaliacao = '{$avaliacao->getAvaliacao()}',
				   data_avaliacao = '{$avaliacao->getDataAvaliacao()}'
				   ";
		$this->alterar($avaliacao->getId(), $values);
	}

	public function listar($pesquisa = '')
	{
		if ($pesquisa != '') {
			$sql = "SELECT * FROM {$this->tabela}
					WHERE avaliacao like '%{$pesquisa}%'";
		} else {
			$sql = "SELECT * FROM {$this->tabela}";
		}
		$stmt = $this->db->prepare($sql);
		$stmt->setFetchMode(PDO::FETCH_CLASS, $this->class);
		$stmt->execute();
		return $stmt->fetchAll();
	}

	public function mostrar($condicao = '')
    {
        $where = '';
        if($condicao != ''){
            $where = "where usuario_id = {$condicao}";
        }
        $sql = "SELECT * FROM {$this->tabela} {$where};";

        $stmt = $this->db->prepare($sql);
        $stmt->setFetchMode(PDO::FETCH_CLASS, $this->class);
        $stmt->execute();
        return $stmt->fetchAll();
    }

	public function listarAvaliacao($id_filme)
	{

			$sql = "SELECT  round(avg(avaliacao)) as avaliacao FROM {$this->tabela}
					WHERE filme_id = '{$id_filme}'";
		$stmt = $this->db->prepare($sql);
		$stmt->setFetchMode(PDO::FETCH_CLASS, $this->class);
		$stmt->execute();
		return $stmt->fetchAll();
	}

    public function filmeAvaliacao($id_filme)
    {

            $sql = "SELECT round(avg(avaliacao)) as avaliacao FROM {$this->tabela}
                    WHERE filme_id = '{$id_filme}'";
        $stmt = $this->db->prepare($sql);
        $stmt->setFetchMode(PDO::FETCH_CLASS, $this->class);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function deletaAvaliacaoUser($id)
    {
    	$sql = "DELETE FROM {$this->tabela} WHERE usuario_id = {$id}";
    	$stmt = $this->db->prepare($sql);
    	$stmt->execute();
    }

	public function deletaAvaliacao($id)
    {
    	$sql = "DELETE FROM {$this->tabela} WHERE filme_id = {$id}";
    	$stmt = $this->db->prepare($sql);
    	$stmt->execute();
    }


}