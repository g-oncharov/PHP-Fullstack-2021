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
    public function removeUnnecessary(array $array, array $delete = []): array
    {
        if (!empty($delete)) {
            foreach ($delete as $elem) {
                unset($array[$elem]);
            }
        }
        return $array;
    }


    public function getObjects($items, array $delete = [])
    {
        header('Content-Type: application/json');
        $json = [];
        foreach ($items as $item) {
            $json[] = $this->dismount($item, $delete);
        }
        echo json_encode($json);
    }

    public function getObject($item, array $delete = [])
    {
        header('Content-Type: application/json');
        $item = $this->dismount($item, $delete);
        echo json_encode($item);
    }

    public function getArrays($item, array $delete = [])
    {
        header('Content-Type: application/json');
        $item = $this->removeUnnecessary($item, $delete);
        echo json_encode($item);
    }

    public function getArray($item, array $delete = [])
    {
        header('Content-Type: application/json');
        $item = ['items' => $item];
        echo json_encode($item);
    }

}
