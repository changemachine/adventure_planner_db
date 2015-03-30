<?php

    class Activity
    {
        private $id;
        private $name;

// Constructor for instances of the class
        function __construct($name, $id = null)
        {
            $this->name = $name;
            $this->id = $id;
        }
// Getters and Setters for private properties of class
        function getName()
        {
            return $this->name;
        }

        function getId()
        {
            return $this->id;
        }

        function setId($new_id)
        {
            $this->id = (int) $new_id;
        }

        function setName($new_name)
        {
            $this->name = (string) $new_name;
        }
// Methods to interact with the Database

        function save()
        {
            $statement = $GLOBALS['DB']->query("INSERT INTO activities (name) VALUES ('{$this->getName()}') RETURNING id;");
            $result = $statement->fetch(PDO::FETCH_ASSOC);
            $this->setId($result['id']);
        }

        static function deleteAll()
        {
            $GLOBALS['DB']->exec("DELETE FROM activities *;");
        }

        static function getAll()
        {
            $statement = $GLOBALS['DB']->query("SELECT * FROM activities;");
            $activities = $statement->fetchAll(PDO::FETCH_ASSOC);

            $returned_activities = array();
            foreach($activities as $thing){
                $name = $thing['name'];
                $id = $thing['id'];
                $new_activity = new Activity($name, $id);
                array_push($returned_activities, $new_activity);
            }
            return $returned_activities;
        }



    }

 ?>
