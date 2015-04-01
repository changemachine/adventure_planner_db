<?php

    class Location
    {
        private $id;
        private $latitude;
        private $longitude;
        private $activity_id;
        private $adventure_id;

// Constructor for instances of the class
        function __construct($latitude = 1, $longitude = 1, $activity_id = 1, $id = null, $adventure_id = 1)
        {
            $this->latitude = $latitude;
            $this->longitude = $longitude;
            $this->activity_id = $activity_id;
            $this->id = $id;
            $this->adventure_id = $adventure_id;
        }
// Getters and Setters for private properties of class
        function getLongitude()
        {
            return $this->longitude;
        }

        function getLatitude()
        {
            return $this->latitude;
        }

        function getActivity_id()
        {
            return $this->activity_id;
        }

        function getId()
        {
            return $this->id;
        }

        function getAdventure_id()
        {
            return $this->adventure_id;
        }

        function setLatitude($new_latitude)
        {
            $this->latitude = (float) $new_latitude;
        }

        function setLongitude($new_longitude)
        {
            $this->longitude = (float) $new_longitude;
        }

        function setActivity_id($new_id)
        {
            $this->activity_id = (int) $new_id;
        }

        function setId($new_id)
        {
            $this->id = (int) $new_id;
        }

        function setAdventure_id($new_id)
        {
            $this->adventure_id = (int) $new_id;
        }

// Methods to interact with the Database

    // General CRUD methods
        function save()
        {
            $statement = $GLOBALS['DB']->query("INSERT INTO locations (latitude, longitude, activity_id, adventure_id) VALUES ({$this->getLatitude()}, {$this->getLongitude()}, {$this->getActivity_id()}, {$this->getAdventure_id()}) RETURNING id;");
            $result = $statement->fetch(PDO::FETCH_ASSOC);
            $this->setId($result['id']);
        }

        function updateLatitude($new_latitude)
        {
            $GLOBALS['DB']->exec("UPDATE locations SET latitude = {$new_latitude} WHERE id = {$this->getId()};");
            $this->setLatitude($new_latitude);
        }

        function updateLongitude($new_longitude)
        {
            $GLOBALS['DB']->exec("UPDATE locations SET longitude = {$new_longitude} WHERE id = {$this->getId()};");
            $this->setLongitude($new_longitude);
        }

        function updateActivity_id($new_id)
        {
            $GLOBALS['DB']->exec("UPDATE locations SET activity_id = {$new_id} WHERE id = {$this->getId()};");
            $this->setActivity_id($new_id);
        }

        function updateAdventure_id($new_id)
        {
            $GLOBALS['DB']->exec("UPDATE locations SET adventure_id = {$new_id} WHERE id = {$this->getId()};");
            $this->setAdventure_id($new_id);
        }
        // Make sure to delete associations in join tables as well
        function delete()
        {
            $GLOBALS['DB']->exec("DELETE FROM locations WHERE id = {$this->getId()};");
        }

    // General delete all and get all methods
        static function deleteAll()
        {
            $GLOBALS['DB']->exec("DELETE FROM locations *;");
        }

        static function getAll()
        {
            $statement = $GLOBALS['DB']->query("SELECT * FROM locations;");
            $locations = $statement->fetchAll(PDO::FETCH_ASSOC);

            $returned_locations = array();
            foreach($locations as $place){
                $longitude = floatval($place['longitude']);
                $id = $place['id'];
                $activity_id = $place['activity_id'];
                $latitude = floatval($place['latitude']);
                $adventure_id = $place['adventure_id'];
                $new_location = new Location($latitude, $longitude, $activity_id, $id, $adventure_id);
                array_push($returned_locations, $new_location);
            }
            return $returned_locations;
        }
    // Find method to get Activity Id
        static function find($search_id)
        {
            $found_location = null;
            $all_locations = Location::getAll();
            foreach($all_locations as $place){
                if($place->getId() == $search_id){
                    $found_location = $place;
                }
            }
            return $found_location;
        }

        function addActivity($activity){
            $result = $GLOBALS['DB']->query("SELECT id FROM activities WHERE name = {$activity_name->getName()};");
            $found = $result->fetch(PDO::FETCH_ASSOC);
            $found_id = $found['id'];
            $GLOBALS['DB']->exec("UPDATE locations SET activity_id = {$found_id} WHERE id = {$this->getId()};");
            $this->setActivity_id($found_id);
        }





    }

 ?>
