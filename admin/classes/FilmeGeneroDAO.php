<?php
require_once 'Model.php';

class FilmeGeneroDAO extends Model
{
    public function __construct()
    {
        parent::__construct();
        $this->class = 'FilmeGenero';
        $this->tabela = 'filme_genero';
    }

	public function insereFilmeGenero(FilmeGenero $filme_genero) {
		$values = "null, '{$filme_genero->getIdFilme()}',
						 '{$filme_genero->getIdGenero()}'";
		return $this->inserir($values);
	}

	public function alteraFilmeGenero(FilmeGenero $filme_genero) {
		$values = "id_filme = '{$filme_genero->getIdFilme()}',
				   id_genero = '{$filme_genero->getIdGenero()}'";
		$this->alterar($filmeGenero->getId(), $values);
	}

}