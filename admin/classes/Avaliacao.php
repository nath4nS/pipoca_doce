<?php

class Avaliacao
{
	private $id;
	private $avaliacao;
	private $data_avaliacao;
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
    public function getAvaliacao()
    {
        return $this->avaliacao;
    }

    /**
     * @param mixed $avaliacao
     *
     * @return self
     */
    public function setAvaliacao($avaliacao)
    {
        $this->avaliacao = $avaliacao;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getDataAvaliacao()
    {
        return $this->data_avaliacao;
    }

    /**
     * @param mixed $data_avaliacao
     *
     * @return self
     */
    public function setDataAvaliacao($data_avaliacao)
    {
        $this->data_avaliacao = $data_avaliacao;

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