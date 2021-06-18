<?php
class Category
{
    private $id_category;
    private $type;

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

    public function getId_category()
    {
        return $this->id_category;
    }

    public function getType()
    {
        return $this->type;
    }



    //////////SETTER////////////

    public function setId_category($id_category)
    {
        $id_category = (int) $id_category;

        if ($id_category > 0) {
            $this->id_category = $id_category;
        }
    }

    public function setType($type)
    {
        if (is_string($type)) {
            $this->type = $type;
        }
    }

}
