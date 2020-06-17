<?php

class FilmeGenero
{
	private $id;
	private $id_filme;
    private $id_genero;

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
    public function getIdGenero()
    {
        return $this->id_genero;
    }

    /**
     * @param mixed $id_genero
     *
     * @return self
     */
    public function setIdGenero($id_genero)
    {
        $this->id_genero = $id_genero;

        return $this;
    }
}