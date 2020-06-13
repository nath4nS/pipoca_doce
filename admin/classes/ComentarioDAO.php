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
					WHERE data like '%{$pesquisa}%'
						OR data like '%{$pesquisa}%'";
		} else {
			$sql = "SELECT * FROM {$this->tabela}";
		}
		$stmt = $this->db->prepare($sql);
		$stmt->setFetchMode(PDO::FETCH_CLASS, $this->class);
		$stmt->execute();
		return $stmt->fetchAll();
	}

}