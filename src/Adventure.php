<?php

    class Adventure
    {
        private $name;
        private $id;

        function __construct($name, $id = null)
        {
            $this->name = $name;
            $this->id = $id;
        }

        function getName()
        {
            return $this->name;
        }

        function setName($new_name)
        {
            $this->name = $new_name;
        }

        function getId()
        {
            return $this->id;
        }

        function setId($new_id)
        {
            $this->id = $new_id;
        }

        function save()
        {
            $query = $GLOBALS['DB']->query("INSERT INTO adventures (name) VALUES ('{$this->getName()}') RETURNING id;");
            $query_fetched = $query->fetch(PDO::FETCH_ASSOC);
            $this->setId($query_fetched['id']);

        }

        function update($new_name)
        {
            $GLOBALS['DB']->exec("UPDATE adventures SET name = '{$new_name}' WHERE id = {$this->getId()};");
            $this->setName($new_name);
        }

        function singleDelete()
        {
            $GLOBALS['DB']->exec("DELETE FROM adventures WHERE id = {$this->getId()};");
            $GLOBALS['DB']->exec("DELETE FROM activities_adventures WHERE id = {$this->getId()};");
            $GLOBALS['DB']->exec("DELETE FROM activities_countries WHERE id = {$this->getId()};");
        }


        function addActivity($new_activity)
        {
            $GLOBALS['DB']->exec("INSERT INTO activities_adventures (activity_id, adventure_id) VALUES ({$new_activity->getId()}, {$this->getId()});");
        }

        function getActivities()
        {
            $query = $GLOBALS['DB']->query("SELECT activities.* FROM adventures JOIN activities_adventures ON (adventures.id = activities_adventures.adventure_id) JOIN activities ON (activities.id = activities_adventures.activity_id) WHERE adventures.id = {$this->getId()};");

            $query_fetched = $query->fetchAll(PDO::FETCH_ASSOC);
            $return_activities = array ();

            foreach ($query_fetched as $element)
            {
                $new_name = $element['name'];
                $new_id = $element['id'];
                $new_activity = new Activity($new_name, $new_id);
                array_push($return_activities, $new_activity);
            }
            return $return_activities;
        }

        function addCountry($new_country)
        {
            $GLOBALS['DB']->exec("INSERT INTO adventures_countries (adventure_id, country_id) VALUES ({$this->getId()}, {$new_country->getId()});");
        }

        function getCountries()
        {
            $query = $GLOBALS['DB']->query("SELECT countries.* FROM adventures JOIN adventures_countries ON (adventures.id = adventures_countries.adventure_id) JOIN countries ON (countries.id = adventures_countries.country_id) WHERE adventures.id = {$this->getId()};");
            $query_fetched = $query->fetchAll(PDO::FETCH_ASSOC);
            $return_countries = array();

            foreach ($query_fetched as $element)
            {
                $new_name = $element['name'];
                $new_id = $element['id'];
                $new_country = new Country($new_name, $new_id);
                array_push ($return_countries, $new_country);
            }
            return $return_countries;

        }



        static function getAll()
        {
            $query = $GLOBALS['DB']->query("SELECT * FROM adventures");
            $query_fetched = $query->fetchAll(PDO::FETCH_ASSOC);
            $return_adventures = array();

            foreach($query_fetched as $element)
            {
                $name = $element['name'];
                $id = $element['id'];
                $new_adventure = new Adventure($name, $id);
                array_push($return_adventures, $new_adventure);
            }
            return $return_adventures;
        }

        static function deleteAll()
        {
            $GLOBALS['DB']->exec("DELETE FROM adventures *;");
            
        }

        static function find($search_id)
        {
            $query = $GLOBALS['DB']->query("SELECT * FROM adventures WHERE id = {$search_id};");
            $query_fetched = $query->fetchAll(PDO::FETCH_ASSOC);
            $found_adventure = null;

            foreach ($query_fetched as $element)
            {
                $new_name = $element['name'];
                $new_id = $element['id'];
                $found_adventure = new Adventure($new_name, $new_id);
            }
            return $found_adventure;

        }







    }


 ?>
