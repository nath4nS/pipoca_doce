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
                    '{$filme->getGenero()->getId()}',
                    '{$filme->getDuracao()}',
    				'{$filme->getDataLancamento()}', 
                    '{$filme->getSinopse()}', 
                    '{$filme->getElenco()}', 
                    '{$filme->getDiretor()->getId()}',
                    '{$filme->getImagem()}'
                    ";
    	return $this->inserir($values);
    }

    public function alteraFilme(Filme $filme) 
    {
        $altera_imagem = ($filme->getImagem() != '' ? ", imagem = '{$filme->getImagem()}'" : '');

    	$values = 	"nome = '{$filme->getNome()}',
                    genero = '{$filme->getGenero()->getId()}',
                    duracao = '{$filme->getDuracao()}',
    				dataLancamento = '{$filme->getDataLancamento()}',
    				sinopse = '{$filme->getSinopse()}',
    				elenco = '{$filme->getElenco()}',
    				diretor = '{$filme->getDiretor()->getId()}'
                    {$altera_imagem}
    				";
    	$this->alterar($filme->getId(), $values);
    }

    public function listar($pesquisa = '')
    {
        if($pesquisa != '') {
            $sql = "SELECT * FROM {$this->tabela} 
                        WHERE nome like '%{$pesquisa}%'
                            OR genero like '%{$pesquisa}%'
                            OR duracao like '%{$pesquisa}%'
                            OR dataLancamento like '%{$pesquisa}%'
                            OR elenco like '%{$pesquisa}%'
                            OR diretor like '%{$pesquisa}%'";
        } else {
            $sql = "SELECT * FROM {$this->tabela}";
        }
        $stmt = $this->db->prepare($sql);
        $stmt->setFetchMode(PDO::FETCH_CLASS, $this->class);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}