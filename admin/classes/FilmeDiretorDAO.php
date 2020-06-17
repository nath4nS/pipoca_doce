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
						 '{$filme_diretor->getIdGenero()}'";
		return $this->inserir($values);
	}

	public function alteraFilmeDiretor(FilmeDiretor $filme_diretor) {
		$values = "id_filme = '{$filme_diretor->getIdFilme()}',
				   id_genero = '{$filme_diretor->getIdGenero()}'";
		$this->alterar($filmeDiretor->getId(), $values);
	}

}