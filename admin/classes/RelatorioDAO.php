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

    public function contarPerfil($table = 'comentario', $condicao = '')
    {
        $where = '';
        if($condicao != ''){
            $where = "where filme_id = {$condicao}";
        }
        $sql = "SELECT count(*) as total FROM {$table} {$where};";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function contarFilmesAvaliacao($table = 'avaliacao', $condicao = '')
    {
        $where = '';
        if($condicao != '') {
            $where = " WHERE {$condicao}";
        }
        $sql = "SELECT f.nome, round(avg(avaliacao)) as avaliacao, count(*) as total
                FROM avaliacao a 
                LEFT JOIN filme f ON f.id = a.filme_id
                GROUP BY a.filme_id;";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}