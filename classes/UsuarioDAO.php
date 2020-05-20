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

	public function insereUsuario(Usuario $Usuario) {
		$values = "null, '{$Usuario->getNome()}'";
		$values = "null, '{$Usuario->getDataNascimento()}'";
		$values = "null, '{$Usuario->getEmail()}'";
		$values = "null, '{$Usuario->getSenha()}'";
		$values = "null, '{$Usuario->getTipo()}'";
		$values = "null, '{$Usuario->getImagem()}'";
		return $this->inserir($values);
	}

	public function alteraUsuario(Usuario $Usuario) 
	{
		$altera_senha = ($usuario->getSenha() != '' ? ", senha = '{$usuario->getSenha()}'" : '');
		$altera_imagem = ($usuario->getImagem() != '' ? ", imagem = '{$usuario->getImagem()}'" : '');

		$values = "nome = '{$Usuario->getNome()}',
					dataNascimento = '{$Usuario->getDataNascimento()}',
					email = '{$Usuario->getEmail()}',
					senha = '{$Usuario->getSenha()}',
					tipo = '{$Usuario->getTipo()}'
					{$altera_imagem}
					{$altera_senha}";
		$this->alterar($Usuario->getId(), $values);
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