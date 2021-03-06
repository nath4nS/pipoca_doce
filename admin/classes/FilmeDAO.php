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
    				'{$filme->getDataLancamento()}', 
                    '{$filme->getUrl()}', 
                    '{$filme->getTipo()}', 
                    '{$filme->getSinopse()}', 
                    '{$filme->getElenco()}', 
                    '{$filme->getImagem()}'
                    ";
    	return $this->inserir($values);
    }

    public function alteraFilme(Filme $filme) 
    {
        $altera_imagem = ($filme->getImagem() != '' ? ", imagem = '{$filme->getImagem()}'" : '');

    	$values = 	"nome = '{$filme->getNome()}',
                    duracao = '{$filme->getDuracao()}',
    				dataLancamento = '{$filme->getDataLancamento()}',
    				url = '{$filme->getUrl()}',
                    tipo = '{$filme->getTipo()}',
                    sinopse = '{$filme->getSinopse()}',
    				elenco = '{$filme->getElenco()}'
                    {$altera_imagem}
    				";
    	$this->alterar($filme->getId(), $values);
    }

    public function listar($pesquisa = '', $limit = 300, $offset = 0)
    {
        if($pesquisa != '') {
            $sql = "SELECT f.*,group_concat(distinct d.nome) as nome_diretor, group_concat(distinct g.nome) as nome_genero FROM filme f 
                        LEFT JOIN filme_genero fg on fg.id_filme = f.id
                        LEFT JOIN genero g on g.id = fg.id_genero
                        LEFT JOIN filme_diretor fd on fd.id_filme = f.id
                        LEFT JOIN diretor d on d.id = fd.id_diretor                               
                            WHERE f.nome like '%{$pesquisa}%'
                                        OR g.nome like '%{$pesquisa}%'
                                        OR f.duracao like '%{$pesquisa}%'
                                        OR f.dataLancamento like '%{$pesquisa}%'
                                        OR f.tipo like '%{$pesquisa}%'
                                        OR f.elenco like '%{$pesquisa}%'
                                        OR d.nome like '%{$pesquisa}%'
                                            GROUP BY f.id
                                            LIMIT {$offset}, {$limit}";
        } else {
            $sql = "SELECT f.*,group_concat(distinct d.nome) as nome_diretor, group_concat(distinct g.nome) as nome_genero FROM filme f 
                        LEFT JOIN filme_genero fg on fg.id_filme = f.id
                        LEFT JOIN genero g on g.id = fg.id_genero
                        LEFT JOIN filme_diretor fd on fd.id_filme = f.id
                        LEFT JOIN diretor d on d.id = fd.id_diretor
                                GROUP BY f.id
                                LIMIT {$offset}, {$limit}";
        }
        $stmt = $this->db->prepare($sql);
        $stmt->setFetchMode(PDO::FETCH_CLASS, $this->class);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function listarPopulares($pesquisa = '', $limit = 300, $offset = 0)
    {
        if($pesquisa != '') {
            $sql = "SELECT f.* , round(avg(avaliacao)) as avaliacao FROM pipoca_doce.filme f
                            LEFT JOIN avaliacao a on a.filme_id = f.id 
                            WHERE f.nome like '%{$pesquisa}%'
                                        OR g.nome like '%{$pesquisa}%'
                                        OR f.duracao like '%{$pesquisa}%'
                                        OR f.dataLancamento like '%{$pesquisa}%'
                                        OR f.tipo like '%{$pesquisa}%'
                                        OR f.elenco like '%{$pesquisa}%'
                                        OR d.nome like '%{$pesquisa}%'
                                            GROUP BY f.id
                                            order by avaliacao DESC
                                            LIMIT {$offset}, {$limit}";
        } else {
            $sql = "SELECT f.* , round(avg(avaliacao)) as avaliacao FROM pipoca_doce.filme f
                                LEFT JOIN avaliacao a on a.filme_id = f.id 
                                group by f.id
                                order by avaliacao DESC
                                LIMIT {$offset}, {$limit}";
        }
        $stmt = $this->db->prepare($sql);
        $stmt->setFetchMode(PDO::FETCH_CLASS, $this->class);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function trailer($limit = 300, $offset = 1)
    {

            $sql = "SELECT * FROM filme
                            ORDER BY Rand()
                            LIMIT {$offset}, {$limit}";

        $stmt = $this->db->prepare($sql);
        $stmt->setFetchMode(PDO::FETCH_CLASS, $this->class);
        $stmt->execute();
        return $stmt->fetchAll();
    }

public function alfabetica($letra = '',$limit = 300, $offset = 1)
    {
        $sql = "SELECT * FROM filme
                where nome like '$letra%'
                LIMIT {$offset}, {$limit};";

        $stmt = $this->db->prepare($sql);
        $stmt->setFetchMode(PDO::FETCH_CLASS, $this->class);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function paginacao($pesquisa = '', $letra = '')
    {
        if($pesquisa != '') 
        {
            $sql = "SELECT COUNT(*) as total  FROM filme f 
                        LEFT JOIN filme_genero fg on fg.id_filme = f.id
                        LEFT JOIN genero g on g.id = fg.id_genero
                        LEFT JOIN filme_diretor fd on fd.id_filme = f.id
                        LEFT JOIN diretor d on d.id = fd.id_diretor
                            WHERE f.nome like '%{$pesquisa}%'
                                        OR g.nome like '%{$pesquisa}%'
                                        OR f.duracao like '%{$pesquisa}%'
                                        OR f.dataLancamento like '%{$pesquisa}%'
                                        OR f.tipo like '%{$pesquisa}%'
                                        OR f.elenco like '%{$pesquisa}%'
                                        OR d.nome like '%{$pesquisa}%' ;";
        } else if($letra != '')
        {
            $sql = "SELECT COUNT(*) as total  FROM filme
                        where nome like '{$letra}%';";
        } else {
            $sql = "SELECT COUNT(*) as total FROM {$this->tabela} ";
        }
        $stmt = $this->db->prepare($sql);
        $stmt->setFetchMode(PDO::FETCH_CLASS, $this->class);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function listarBreve($limit = 300)
    {

            $sql = "SELECT * FROM {$this->tabela} 
                        WHERE tipo = 'Em Breve'
                        limit {$limit}";
        $stmt = $this->db->prepare($sql);
        $stmt->setFetchMode(PDO::FETCH_CLASS, $this->class);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getGeneros($id)
    {
    /*      $where = '';
            if(condicao != '') {
                $where = " WHERE {$condicao}";
            }*/
            $sql = "SELECT g.id, g.nome FROM filme f 
                    LEFT JOIN filme_genero fg on fg.id_filme = f.id
                    LEFT JOIN genero g on g.id = fg.id_genero
                    WHERE f.id = {$id};";
            $stmt = $this->db->prepare($sql);
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Genero');
            $stmt->execute();
            return $stmt->fetchAll();
    }

    public function getDiretor($id)
    {
    /*      $where = '';
            if(condicao != '') {
                $where = " WHERE {$condicao}";
            }*/
            $sql = "SELECT d.id, d.nome FROM filme f 
                    LEFT JOIN filme_diretor fd on fd.id_filme = f.id
                    LEFT JOIN diretor d on d.id = fd.id_diretor
                    WHERE f.id = {$id};";
            $stmt = $this->db->prepare($sql);
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Genero');
            $stmt->execute();
            return $stmt->fetchAll();
    }

}