<?php
require_once 'Model.php';

class FilmeDiretorDAO extends Model
{
    public function __construct()
    {
        parent::__construct();
        $this->class = 'FilmeDiretor';
        $this->tabela = 'filme_diretor';
    }

	public function insereFilmeDiretor(FilmeDiretor $filme_diretor) {
		$values = "null, '{$filme_diretor->getIdFilme()}',
						 '{$filme_diretor->getIdDiretor()}'";
		return $this->inserir($values);
	}

    public function deletaDiretor($id)
    {
    	$sql = "DELETE FROM {$this->tabela} WHERE id_filme = {$id}";
    	$stmt = $this->db->prepare($sql);
    	$stmt->execute();
    }

}