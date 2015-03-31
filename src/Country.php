<?php
    class Country {
        private $name;
        private $id;

        function __construct($name, $id){
            $this->name = $name;
            //language
            //geographic area
            $this->id = $id;
        }
    //SET GET PROPS
        function setName($new_name){
            $this->name = (string) $new_name;
        }
        function getName(){
            return $this->name;
        }
        function setId($new_id){
            $this->id = (int) $new_id;
        }
        function getId(){
            return $this->id;
        }
    //SAVE GET-ALL, DELETE-ALL
        function save(){
            $statement = $GLOBALS['DB']->query("INSERT INTO countries (name) VALUES ('{$this->getName()}') RETURNING id;");
            $result = $statement->fetch(PDO::FETCH_ASSOC);
            $this->setId($result['id']);
        }
        static function getAll(){
            $returned_countries = $GLOBALS['DB']->query("SELECT * FROM countries;");
            $countries = array();
            foreach ($returned_countries as $country){
                $name = $country['name'];
                $id = $country['id'];
                $new_country = new Country($name, $id);
                array_push($countries, $new_country);
            }
            return $countries;
        }
        static function deleteAll(){
            $GLOBALS['DB']->exec("DELETE FROM countries *;");
        }
    // √ FIND, UPDATE & DELETE STORE
        static function find($search_id){
            $found_country = null;
            $countries = Country::getAll();
            foreach($countries as $country){
                $country_id = $country->getId();
                if($country_id == $search_id){
                    $found_country = $country;
                }
            }
            return $found_country;
        }
        function update($new_name){
            $GLOBALS['DB']->exec("UPDATE countries SET name = '{$new_name}' WHERE id = {$this->getId()};");
            $this->setName($new_name);
        }
        function deleteCountry(){ //?
            $GLOBALS['DB']->exec("DELETE FROM countries WHERE id = {$this->getId()};");
            $GLOBALS['DB']->exec("DELETE FROM countries_activities WHERE country_id = {$this->getId()};");
        }
    // JOIN
        function addCountryActivity($activity){
            $GLOBALS['DB']->exec("INSERT INTO countries_activities (country_id, activity_id) VALUES ({$this->getId()}, {$activity->getId()});");
        }
        function getCountryActivities(){
            $query = $GLOBALS['DB']->query("SELECT activities.* FROM countries
                JOIN countries_activities ON (countries.id = countries_activities.country_id)
                JOIN activities ON (countries_activities.activity_id = activities.id)
                WHERE countries.id = {$this->getId()};");
            $returned_activities = $query->fetchAll(PDO::FETCH_ASSOC);
            $activities = array();
            foreach($returned_activities as $activity){
                $activity_name = $activity['activity_name'];
                $id = $activity['id'];
                $new_activity = new Activity($activity_name, $id);
                array_push($activities, $new_activity);
            }
            return $activities;
        }
    }
?>
