<?php

namespace src;

use src\Boarding as Boarding;
use \Exception;

class Trip extends Boarding {
    
    use \src\Traits\Sorter;
    
    /**
     *
     * @var boolean
     */
    public $authenticated = false;
    
    /**
     *
     * @var array
     */
    public $credentials;  
    
    /**
     *
     * @var string
     */
    public $from;
    
    /**
     *
     * @var string
     */
    public $to;    
    
    /**
     * Setted inside class for quick demo test
     *
     * @var string 
     */
    private $demoUserId = "12345";
    
    /**
     * Setted inside class for quick demo test
     *
     * @var string 
     */
    private $demoToken = "GTFYJUGDHGSDIII";    
    
    /**
     * Constructor
     * 
     * @param integer $userId        UserId access
     * @param string  $token         Token
     * @param string  $boardingDatas boarding datas
     */
    public function __construct($userId, $token, $boardingDatas) 
    {
        $this->credentials[] = $userId;
        $this->credentials[] = $token;
        $this->authenticate();
        
        $this->set($boardingDatas);
        $this->get();
    }
    
 
    /**
     * By default, grant access for demo credentials
     * 
     * @return boolean
     * @throws Exception
     */
    private function authenticate()
    {
        try {
            if (($this->credentials[0] === $this->demoUserId) && 
                    ($this->credentials[1] === $this->demoToken)) {
                return $this->authenticated = (boolean) true;
            } else {
                throw new Exception("bad credentials");
            }
                        
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }
    
    /**
     * From a destination
     * 
     * @param string $from
     */
    public function from($from = null)
    {
       $this->from = $from; 
    }
    
    /**
     * To a destination
     * 
     * @param string $to
     */
    public function to($to = null)
    {
        $this->to = $to;
    }
    
    /**
     * 
     */
    public function render()
    {
        $boarding = (array)  $this->sort($this->boardings);
        $result   = (string) $this->makeReadable($boarding);
    }
    
}

