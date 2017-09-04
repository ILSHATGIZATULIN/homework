<?php

class Db
{
    public static $count = 0;

    protected $content = [];
    protected $type = '';

    public function __construct($type)
    {
        if (method_exists($this, 'loadFrom' . $type)) {
            $this->{'loadFrom' . $type}();
        }

        $this->type = $type;

        self::$count += 1;
    }

    public function getContents()
    {
        return $this->content;
    }

    public function saveNewItem($item)
    {
        $this->{'save' . $this->type}($item);
    }

    protected function saveJson($item)
    {
        $saved = $this->content;

        $ceh = $item['ceh'];

        if (!isset($saved[$ceh])) {
            $saved[$ceh] = [];
        }
        $saved[$ceh][] = [
            "name" => $item['name'],
            "email" => $item['email'],
            "date" => date('Y-m-d H:i')
        ];
        $row = json_encode($saved);
        file_put_contents('./contacts.json', $row);
    }

    protected function saveDsv($item)
    {
        $row = date('Y-m-d H:i') . ';' . $item['name'] . ';' . $item['email'] . ';' . $item['ceh']
            . PHP_EOL;
        file_put_contents('contacts.txt', $row, FILE_APPEND);
    }

    protected function loadFromDb()
    {
        $this->content = [];

        return $this;
    }

    protected function loadFromJson()
    {
        $this->content = json_decode(file_get_contents('contacts.json'), true);

        return $this;
    }

    protected function loadFromDsv()
    {
        $list = file('contacts.txt');

        foreach ($list as $line) {
            list($date, $name, $email, $ceh) = explode(';', $line);
             if (!isset($this->content[$ceh])) {
                 $this->content[$ceh] = [];
             }

             $this->content[$ceh][] = [
                 'name' => $name,
                 'email' => $email,
                 'date' => $date
             ];
        }

        return $this;
    }
}