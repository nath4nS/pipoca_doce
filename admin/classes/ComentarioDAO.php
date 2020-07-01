<?php
require_once 'Model.php';

class ComentarioDAO extends Model
{
    public function __construct()
    {
        parent::__construct();
        $this->class = 'Comentario';
        $this->tabela = 'comentario';
    }

	public function insereComentario(Comentario $comentario) {
		$values = "null, '{$comentario->getComentario()}',
						 '{$comentario->getDataComentario()}',
						 '{$comentario->getUsuarioId()}',
						 '{$comentario->getFilmeId()}'";
		return $this->inserir($values);
	}

	public function alteraComentario(Comentario $comentario) {
		$values = "comentario = '{$comentario->getComentario()}',
				   data_comentario = '{$comentario->getDataComentario()}'
				   ";
		$this->alterar($comentario->getId(), $values);
	}

	public function listar($pesquisa = '')
	{
		if ($pesquisa != '') {
            $sql = "SELECT * FROM {$this->tabela}
                    WHERE comentario like '%{$pesquisa}%'
                        ORDER BY id DESC";
        } else {
            $sql = "SELECT * FROM {$this->tabela}
                    ORDER BY id DESC";
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

	public function listarComentario($id_filme)
	{

			$sql = "SELECT  * FROM {$this->tabela}
					WHERE filme_id = '{$id_filme}'
					ORDER BY id DESC";
		$stmt = $this->db->prepare($sql);
		$stmt->setFetchMode(PDO::FETCH_CLASS, $this->class);
		$stmt->execute();
		return $stmt->fetchAll();
	}

	public function deletaComentarioUser($id)
    {
    	$sql = "DELETE FROM {$this->tabela} WHERE usuario_id = {$id}";
    	$stmt = $this->db->prepare($sql);
    	$stmt->execute();
    }

	public function deletaComentario($id)
    {
    	$sql = "DELETE FROM {$this->tabela} WHERE filme_id = {$id}";
    	$stmt = $this->db->prepare($sql);
    	$stmt->execute();
    }

}