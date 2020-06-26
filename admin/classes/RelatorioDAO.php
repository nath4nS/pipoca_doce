<?php
require_once 'Model.php';
class RelatorioDAO extends Model
{
	public function __construct()
    {
        parent::__construct();
    }
	public function contar($table = 'usuario', $condicao = '')
	{
		$where = '';
		if($condicao != ''){
			$where = "where {$condicao}";
		}
		$sql = "SELECT count(*) as total FROM {$table} {$where};";
		$stmt = $this->db->prepare($sql);
		$stmt->execute();
		return $stmt->fetch(PDO::FETCH_ASSOC);
	}

/*	public function contarFilmesGenero($table = 'filme-genero', $condicao = '')
    {
        $where = '';
        if($condicao != '') {
            $where = "WHERE {$condicao}";
        }
        $sql = "SELECT g.nome as genero, count(*) as total 
                FROM {$table} f
                LEFT JOIN genero g ON g.id = g.nome
                {$where}
                GROUP BY g.nome;";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);  
    }*/
}