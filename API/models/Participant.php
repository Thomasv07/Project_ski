<?php

class Participant extends Trial implements JsonSerializable{
    protected $id_participant;
    protected $firstname;
    protected $lastname;
    protected $dob;
    protected $email;
    protected $picture;
    protected $id_category;
    protected $number_sign;

    public function __construct(array $datas){
        $this->hydrate($datas);
    }

    public function hydrate(array $datas){
        foreach($datas as $key => $value){
           $method = 'set' . ucfirst($key);

           if(method_exists($this, $method)){
               $this->$method($value);
           }
        }
    }

    //////////GETTER////////////

    public function getId_participant(){
        return $this->id_participant;
    }

    public function getFirstname(){
        return $this->firstname;
    }

    public function getLastname(){
        return $this->lastname;
    }

    public function getDob(){
        return $this->dob;
    }

    public function getEmail(){
        return $this->email;
    }

    public function getPicture(){
        return $this->picture;
    }

    public function getId_category(){
        return $this->id_category;
    }

    public function getNumber_sign(){
        return $this->number_sign;
    }

    //////////SETTER////////////

    public function setId_participant($id_participant){
        $id_participant = (int) $id_participant;

        if($id_participant > 0){
            $this->id_participant = $id_participant;
        }        
    }

    public function setFirstname($firstname){
            $this->firstname = $firstname;
    }

    public function setLastname($lastname){
            $this->lastname = $lastname;
    }

    public function setDob($dob){
            $this->dob = $dob;
    }

    public function setEmail($email){
            $this->email = $email;
    }

    public function setPicture($picture){
            $this->picture = $picture; 
    }

    public function setId_category($id_category){
            $this->id_category = $id_category;   
    }

    public function setNumber_sign($number_sign){
        $this->number_sign = $number_sign; 
    }

    public function jsonSerialize()
    {
        return 
        [
            'id_participant' => $this->id_participant,
            'firstname' => $this->firstname,
            'lastname' => $this->lastname,
            'dob' => $this->dob,
            'email' => $this->email,
            'picture' => $this->picture,
            'id_category' => $this->id_category,
            'number_sign' => $this->number_sign,
            'id_trial' => $this->id_trial,
            'first_time' => $this->first_time,
            'second_time' => $this->second_time,
            'average' => $this->average
        ];
    }
}