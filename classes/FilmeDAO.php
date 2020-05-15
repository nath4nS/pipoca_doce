<?php
require_once 'Model.php';
class FilmeDAO extends Model
{
    public function __construct()
    {
    	parent::__construct();
        $this->tabela = 'filme';
        $this->class  = 'Filme';
    }

    public function insereFilme(Filme $filme)
    {
    	$values = "null, 
    				'{$filme->getNome()}',
                    '{$filme->getDuracao()}',
                    '{$filme->getGenero()->getId()}',
    				'{$filme->getDataLancamento()}', 
                    '{$filme->getSinopse()}', 
                    '{$filme->getElenco()}', 
                    '{$filme->getDiretor()->getId()}'
                    ";
    	return $this->inserir($values);
    }

    public function alteraFilme(Filme $filme) 
    {
    	$values = 	"nome = '{$filme->getNome()}',
                    duracao = '{$filme->getDuracao()}',
    				dataLancamento = '{$filme->getDataLancamento()}',
    				sinopse = '{$filme->getSinopse()}',
    				elenco = '{$filme->getElenco()}',
                    genero = '{$filme->getGenero()->getId()}',
    				diretor = '{$filme->getDiretor()->getId()}'
    				";
    	$this->alterar($filme->getId(), $values);
    }

    public function listar($pesquisa = '')
    {
        if($pesquisa != '') {
            $sql = "SELECT * FROM {$this->tabela} ";
        } else {
            $sql = "SELECT * FROM {$this->tabela}";
        }
        $stmt = $this->db->prepare($sql);
        $stmt->setFetchMode(PDO::FETCH_CLASS, $this->class);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}