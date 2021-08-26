<?php

namespace Framework\Json;

use ReflectionClass;

class Json
{

    /**
     * Remove unnecessary from the array
     *
     * @param array $array
     * @param array $delete
     * @return array
     */
    public function removeUnnecessary(array $array, array $delete = []): array
    {
        if (!empty($delete)) {
            foreach ($delete as $elem) {
                unset($array[$elem]);
            }
        }
        return $array;
    }

    /**
     * Convert object to array
     *
     * @param object $object
     * @param array $delete
     * @return array
     */
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

        return $this->removeUnnecessary($array, $delete);
    }


    /**
     * Get objects in json format
     *
     * @param $items
     * @param array $delete
     */
    public function getObjects($items, array $delete = []): void
    {
        header('Content-Type: application/json');
        $json = [];
        foreach ($items as $item) {
            $json[] = $this->dismount($item, $delete);
        }
        echo json_encode($json);
    }

    /**
     * Get object in json format
     *
     * @param $item
     * @param array $delete
     */
    public function getObject($item, array $delete = []): void
    {
        header('Content-Type: application/json');
        $item = $this->dismount($item, $delete);
        echo json_encode($item);
    }

    /**
     * Get arrays in json format
     *
     * @param $items
     * @param array $delete
     */

    public function getArrays($items, array $delete = []): void
    {
        header('Content-Type: application/json');
        $items = $this->removeUnnecessary($items, $delete);
        echo json_encode($items);
    }

    /**
     * Get array in json format
     *
     * @param $item
     * @param array $delete
     */
    public function getArray($item, array $delete = []): void
    {
        header('Content-Type: application/json');
        $item = ['items' => $item];
        echo json_encode($item);
    }

    /** Get empty in json format */
    public function getEmpty(): void
    {
        header('Content-Type: application/json');
        echo '{}';
    }

}
