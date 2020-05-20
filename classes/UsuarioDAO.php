<?php
require_once 'Model.php';

class UsuarioDAO extends Model
{
	public function __construct() 
	{
		parent::__construct();
		$this->tabela = 'usuario';
		$this->class = 'Usuario';
	}

	public function insereUsuario(Usuario $usuario) {
		$values = "null,
				  '{$usuario->getNome()}',
				  '{$usuario->getDataNascimento()}',
				  '{$usuario->getEmail()}',
				  '{$usuario->getSenha()}',
				  '{$usuario->getTipo()}',
				  '{$usuario->getImagem()}'
				  ";
		return $this->inserir($values);
	}

	public function alteraUsuario(Usuario $usuario) 
	{
		$altera_senha = ($usuario->getSenha() != '' ? ", senha = '{$usuario->getSenha()}'" : '');
		$altera_imagem = ($usuario->getImagem() != '' ? ", imagem = '{$usuario->getImagem()}'" : '');

		$values = "nome = '{$usuario->getNome()}',
					dataNascimento = '{$usuario->getDataNascimento()}',
					email = '{$usuario->getEmail()}',
					senha = '{$usuario->getSenha()}',
					tipo = '{$usuario->getTipo()}'
					{$altera_imagem}
					{$altera_senha}";
		$this->alterar($usuario->getId(), $values);
	}

	public function listar($pesquisa = '')
	{
		if ($pesquisa != '') {
			$sql = "SELECT * FROM {$this->tabela}
					WHERE nome like '%{$pesquisa}%'
						OR nome like '%{$pesquisa}%'";
		} else {
			$sql = "SELECT * FROM {$this->tabela}";
		}
		$stmt = $this->db->prepare($sql);
		$stmt->setFetchMode(PDO::FETCH_CLASS, $this->class);
		$stmt->execute();
		return $stmt->fetchAll();
	}
}