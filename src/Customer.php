<?php
    class Customer
    {
        private $name;
        private $password;
        private $access;
        private $id;
// Constructor of Class
        function __construct($name, $password = "admin", $access, $id = null)
        {
            $this->name = $name;
            $this->password = $password;
            $this->access = $access;
            $this->id = $id;
        }
// Getters and Setters for private properties
        function getName(){
            return $this->name;
        }
        function setName($new_name){
            $this->name = (string) $new_name;
        }

        function getId(){
            return $this->id;
        }
        function setId($new_id){
            $this->id = (int) $new_id;
        }

        function getPassword(){
            return $this->password;
        }
        function setPassword($new_password){
            $this->password = (string) $new_password;
        }

        // function validatePW($inputPW){
        //
        // }
        //
        // function setAccess($access_level){
        //     //if($this->)
        // }

// Methods to interact with Database
        function save(){
            $statement = $GLOBALS['DB']->query("INSERT INTO customers (name, password) VALUES ('{$this->getName()}', '{$this->getPassword()}') RETURNING id;");
            $result = $statement ->fetch(PDO::FETCH_ASSOC);
            $this->setId($result['id']);
        }

        static function getAll(){
            $statement = $GLOBALS['DB']->query("SELECT * FROM customers;");
            $all_customers = array();
            foreach($statement as $person){
                $name = $person['name'];
                $id = $person['id'];
                $password = $person['password'];
                $new_patron = new Customer($name, $id, $password);
                array_push($all_customers, $new_patron);
            }
            return $all_customers;
        }

        static function deleteAll(){
            $GLOBALS['DB']->exec("DELETE FROM customers *;");
        }

        static function find($search_id){
            $found_customer = null;
            $customers = Customer::getAll();
            foreach($customers as $person){
                if ($person->getId() == $search_id) {
                    $found_customer = $person;
                }
            }
            return $found_customer;
        }

        function updateName($new_name){
            $GLOBALS['DB']->exec("UPDATE customers SET name = '{$new_name}' WHERE id = {$this->getId()};");
            $this->setName($new_name);
        }

        function updatePassword($new_password){
            $GLOBALS['DB']->exec("UPDATE customers SET password = '{$new_password}' WHERE id = {$this->getId()};");
            $this->setPassword($new_password);
        }

        function delete(){
            $GLOBALS['DB']->exec("DELETE FROM customers WHERE id = {$this->getId()};");
        }

        function rank(){
        // user enters prefs and submits to /recommendations...
        // Route gets ALL levels (aLL adventures) from DB.
        // $levels = fetchAll(PDO::FETCH_ASSOC);
        // (! $levels == array['level_keys' => values])
        //loop through levels as level
            //subtract level value from $POST['value'];
            //Add up all abs(scores);
            //array_push($rankings, [adv_id => $score]);

            $rankings = array();
            $levels_query = $GLOBALS['DB']->query("SELECT * FROM levels;");
            $levels = $levels_query->fetchAll(PDO::FETCH_ASSOC);
            // id=>1, hike_level=>4, run_level=>2, ... adv_id=>23
            // id=>2, hike_level=>9, run_level=>6, ... adv_id=>20

            $prefs_query = $GLOBALS['DB']->query("SELECT * FROM preferences WHERE user_id = {$this->getId()};");

            //FIND APPLICABLE PREFS
            $query = $GLOBALS['DB']->query("SELECT activities.* FROM countries
                JOIN activities_countries ON (countries.id = activities_countries.country_id)
                JOIN activities ON (activities_countries.activity_id = activities.id)
                WHERE countries.id = {$this->getId()};");

            $returned_activities = $query->fetchAll(PDO::FETCH_ASSOC);

            $prefs = $prefs_query->fetchAll(PDO::FETCH_ASSOC);
            // = all user prefs for each activity

            $score = 0;
            foreach($prefs as $pref){
                foreach ($levels as $level){
                    $adv_id = $level['adv_id'];
                    $score += abs($pref['hike_pref'] - $level['hike_level']);
                    $score += abs($pref['run_pref'] - $level['run_level']);
                    $score += abs($pref['culture_pref'] - $level['culture_level']);
                    $score += abs($pref['eat_pref'] - $level['eat_level']);
                    $score += abs($pref['swim_pref'] - $level['swim_level']);
                    $score += abs($pref['sail_pref'] - $level['sail_level']);
                    $score += abs($pref['camp_pref'] - $level['camp_level']);

                    array_push($rankings, [$adv_id => $score]);
                }
                return $rankings;
            }
        }


/* 1-TIME SEARCH (POST)
       foreach ($levels as $level){
            $adv_id = $level['adv_id'];
            $score += abs($POST['hike_pref'] - $level['hike_level']);
            $score += abs($POST['run_pref'] - $level['run_level']);
            $score += abs($POST['culture_pref'] - $level['culture_level']);
            $score += abs($POST['eat_pref'] - $level['eat_level']);
            $score += abs($POST['swim_pref'] - $level['swim_level']);
            $score += abs($POST['sail_pref'] - $level['sail_level']);
            $score += abs($POST['camp_pref'] - $level['camp_level']);

            array_push($rankings, [$adv_id => $score]);
        }*/

        /*        function recomend(){
                    // Get all data from customer preference form for that customer
                    $customer_result = $GLOBALS['DB']->query("SELECT * FROM preferences WHERE user_id = {$this->getId()};");
                    $custom_pref = $customer_result->fetchAll(PDO::FETCH_ASSOC);
                    // Get all data from adventure levels
                    $adventure_result = $GLOBALS['DB']->query("SELECT * FROM levels;");
                    $adventure_levels = $adventure_result->fetchAll(PDO::FETCH_ASSOC);
                    $recomendations = array();
                    // loop through adventure levels
                        //customer data compares to levels for each adventure
                        // Output array with key as adventure id and value as match score
                    foreach($adventure_result as $adventure){
                    }
        */










    }
 ?>
