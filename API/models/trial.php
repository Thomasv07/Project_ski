<?php
class Trial implements JsonSerializable
{
    protected $id_trial;
    protected $number_sign;
    protected $first_time;
    protected $second_time;
    protected $average;

    public function __construct(array $datas)
    {
        $this->hydrate($datas);
    }

    public function hydrate(array $datas)
    {
        foreach ($datas as $key => $value) {
            $method = 'set' . ucfirst($key);

            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }

    //////////GETTER////////////

    public function getId_trial()
    {
        return $this->id_trial;
    }

    public function getNumber_sign()
    {
        return $this->number_sign;
    }

    public function getFirst_time()
    {
        return $this->first_time;
    }

    public function getSecond_time()
    {
        return $this->second_time;
    }

    public function getAverage()
    {
        return $this->average;
    }

    //////////SETTER////////////

    public function setId($id_trial)
    {
        $id_trial = (int) $id_trial;

        if ($id_trial > 0) {
            $this->id_trial = $id_trial;
        }
    }

    public function setNumber_sign($number_sign)
    {
        $this->number_sign = $number_sign;
    }

    public function setFirst_time($first_time)
    {
        $this->first_time = $first_time;
    }

    public function setSecond_time($second_time)
    {
        $this->second_time = $second_time;
    }

    public function setAverage($average)
    {
        $this->average = $average;
    }

    public function jsonSerialize()
    {
        return
            [
                'id_trial' => $this->id_trial,
                'number_sign' => $this->number_sign,
                'first_time' => $this->first_time,
                'second_time' => $this->second_time,
                'average' => $this->average
            ];
    }
}
