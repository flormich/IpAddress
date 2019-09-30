<?php

namespace App\Model;

class IpAddress
{
    private $ip;
    private $id;
    private $status;
    private $dateDernOn;
    private $dateKo;
    private $ipNum;
    private $name;
    private $type_mat;

    public function getIp()
    {
        return $this->ip;
    }

    /**
     * Get the value of dateDernOn
     */ 
    public function getDateDernOn()
    {
        return $this->date_dern_on;
    }

    /**
     * Get the value of dateKo
     */ 
    public function getDateKo()
    {
        return $this->date_ko;
    }

    /**
     * Get the value of status
     */ 
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of ip
     *
     * @return  self
     */ 
    public function setIp($ip)
    {
        $this->ip = $ip;

        return $this;
    }

    /**
     * Set the value of status
     *
     * @return  self
     */ 
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Set the value of dateDernOn
     *
     * @return  self
     */ 
    public function setDateDernOn($dateDernOn)
    {
        $this->dateDernOn = $dateDernOn;

        return $this;
    }

    /**
     * Set the value of dateKo
     *
     * @return  self
     */ 
    public function setDateKo($dateKo)
    {
        $this->dateKo = $dateKo;

        return $this;
    }

    /**
     * Get the value of ipNum
     */ 
    public function getIpNum()
    {
        return $this->ipNum;
    }

    /**
     * Set the value of ipNum
     *
     * @return  self
     */ 
    public function setIpNum($ipNum)
    {
        $this->ipNum = $ipNum;

        return $this;
    }

    /**
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */ 
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of typeMat
     */ 
    public function getTypeMat()
    {
        return $this->type_mat;
    }

    /**
     * Set the value of typeMat
     *
     * @return  self
     */ 
    public function setTypeMat($typeMat)
    {
        $this->typeMat = $typeMat;

        return $this;
    }
}