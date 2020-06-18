<?php

class FilmeDiretor
{
	private $id;
	private $id_filme;
    private $id_diretor;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     *
     * @return self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getIdFilme()
    {
        return $this->id_filme;
    }

    /**
     * @param mixed $id_filme
     *
     * @return self
     */
    public function setIdFilme($id_filme)
    {
        $this->id_filme = $id_filme;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getIdDiretor()
    {
        return $this->id_diretor;
    }

    /**
     * @param mixed $id_diretor
     *
     * @return self
     */
    public function setIdDiretor($id_diretor)
    {
        $this->id_diretor = $id_diretor;

        return $this;
    }
}