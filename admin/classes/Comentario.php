<?php

class Comentario
{
	private $id;
	private $comentario;
	private $data_comentario;
    private $usuario_id;
    private $filme_id;

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
    public function getComentario()
    {
        return $this->comentario;
    }

    /**
     * @param mixed $comentario
     *
     * @return self
     */
    public function setComentario($comentario)
    {
        $this->comentario = $comentario;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getDataComentario()
    {
        return $this->data_comentario;
    }

    /**
     * @param mixed $data_comentario
     *
     * @return self
     */
    public function setDataComentario($data_comentario)
    {
        $this->data_comentario = $data_comentario;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getUsuarioId()
    {
        return $this->usuario_id;
    }

    /**
     * @param mixed $usuario_id
     *
     * @return self
     */
    public function setUsuarioId($usuario_id)
    {
        $this->usuario_id = $usuario_id;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getFilmeId()
    {
        return $this->filme_id;
    }

    /**
     * @param mixed $filme_id
     *
     * @return self
     */
    public function setFilmeId($filme_id)
    {
        $this->filme_id = $filme_id;

        return $this;
    }
}