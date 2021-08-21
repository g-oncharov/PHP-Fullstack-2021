<?php

namespace Framework\Json;

use ReflectionClass;

class Json
{
    public function dismount(object $object, array $delete = []): array
    {
        $array = [];
        $reflectionClass = new ReflectionClass(get_class($object));

        foreach ($reflectionClass->getProperties() as $property) {
            $property->setAccessible(true);
            if ($property->getValue($object) !== null) {
                $array[$property->getName()] = $property->getValue($object);
            }
            $property->setAccessible(false);
        }

        if (!empty($delete)) {
            foreach ($delete as $elem) {
                unset($array[$elem]);
            }
        }
        return $array;
    }

    public function getJsonByArray($items, $delete)
    {
        header('Content-Type: application/json');
        $json = [];
        foreach ($items as $item) {
            $json[] = $this->dismount($item, $delete);
        }
        echo json_encode($json);
    }

    public function getJson($item, $delete)
    {
        header('Content-Type: application/json');
        $item = $this->dismount($item, $delete);
        echo json_encode($item);
    }
}
