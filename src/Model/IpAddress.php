<?php

namespace App\Model;

class IpAddress
{
    private $ip;
    private $id;
    private $status;
    private $date_decouvert;
    private $dateDernOn;
    private $date_dern_on;
    private $dateKo;
    private $ip_Num;
    private $name;
    private $type_mat;
    private $detail;

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    public function getIp(): string
    {
        return $this->ip;
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
     * Get the value of dateDernOn
     */ 
    public function getDateDernOn()
    {
        return $this->date_dern_on;
        // return $this->dateDernOn;
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
     * Get the value of dateKo
     */ 
    public function getDateKo()
    {
        return $this->date_ko;
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
     * Get the value of status
     */ 
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set the value of status
     *
     * @return  self
     */ 
    public function setStatus(string $status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get the value of ipNum
     */ 
    public function getIpNum()
    {
        return $this->ip_Num;
    }

    /**
     * Set the value of ipNum
     *
     * @return  self
     */ 
    public function setIpNum(int $ipNum)
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
    public function setName(string $name)
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
    public function setTypeMat(string $typeMat)
    {
        $this->typeMat = $typeMat;

        return $this;
    }


    /**
     * Get the value of detail
     */ 
    public function getDetail()
    {
        return $this->detail;
    }

    /**
     * Set the value of detail
     *
     * @return  self
     */ 
    public function setDetail(string $detail)
    {
        $this->detail = $detail;

        return $this;
    }

    /**
     * Get the value of dateDecouvert
     */ 
    public function getDateDecouvert()
    {
        return $this->date_decouvert;
    }

    /**
     * Set the value of dateDecouvert
     *
     * @return  self
     */ 
    public function setDateDecouvert($dateDecouvert)
    {
        $this->dateDecouvert = $dateDecouvert;

        return $this;
    }
}