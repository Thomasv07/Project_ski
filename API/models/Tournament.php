<?php
class Tournament
{
    private $id_tournament;
    private $city;
    private $date;

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

    public function getId_tournament()
    {
        return $this->id_tournament;
    }

    public function getCity()
    {
        return $this->city;
    }

    public function getDate()
    {
        return $this->date;
    }

    //////////SETTER////////////

    public function setId_tournament($id_tournament)
    {
        $id_tournament = (int) $id_tournament;

        if ($id_tournament > 0) {
            $this->id_tournament = $id_tournament;
        }
    }

    public function setCity($city)
    {
        if (is_string($city)) {
            $this->city = $city;
        }
    }

    public function setDate($date)
    {
        $this->date = $date;
    }
}
