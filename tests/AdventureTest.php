<?php

    /**
    * @backupGlobals disabled
    * @backupGlobals disabled
    */

    $DB = new PDO('pgsql:host=localhost;dbname = travel_test');

    require_once "src/Adventure.php";
    require_once "src/Activity.php";
    require_once "src/Country.php";

    class AdventureTest extends PHPUnit_Framework_TestCase
    {

        protected function tearDown()
        {
            Adventure::deleteAll();
            Activity::deleteAll();
            Country::deleteAll();

        }

        function test_GetId()
        {
            $name = "Marathon1";
            $id = 2;
            $test_adventure = new Adventure($name, $id);

            $result = $test_adventure->getId();

            $this->assertEquals(2, $result);
        }

        function test_SetId()
        {
            $name = "Marathon1";
            $id = 2;
            $test_adventure = new Adventure($name, $id);

            $test_adventure->setId(4);
            $result = $test_adventure->getId();

            $this->assertEquals(4, $result);

        }

        function test_GetName()
        {
            $name = "Marathon1";
            $test_adventure = new Adventure($name);

            $result = $test_adventure->getName();

            $this->assertEquals("Marathon1", $result);

        }

        function test_setName()
        {
            $name = "Climb";
            $test_adventure = new Adventure($name);
            $new_name = "Run";

            $test_adventure->setName($new_name);
            $result = $test_adventure->getName();

            $this->assertEquals("Run", $new_name);

        }

        function test_save()
        {
            $name = "Run";
            $test_adventure = new Adventure($name);
            $test_adventure->save();

            $result = Adventure::getAll();

            $this->assertEquals([$test_adventure], $result);
        }

        function test_getAll()
        {
            $name = "Ironman";
            $test_adventure = new Adventure($name);
            $test_adventure->save();

            $name1 = "Marathon";
            $test_adventure1 = new Adventure($name1);
            $test_adventure1->save();

            $result = Adventure::getAll();

            $this->assertEquals([$test_adventure, $test_adventure1], $result);
        }

        function test_deleteAll()
        {
            $name = "Ironman";
            $test_adventure = new Adventure($name);
            $test_adventure->save();

            $name1 = "Marathon";
            $test_adventure1 = new Adventure($name1);
            $test_adventure->save();

            Adventure::deleteAll();
            $result = Adventure::getAll();

            $this->assertEquals([], $result);
        }

        function test_search()
        {
<<<<<<< HEAD
            $name= "I";
=======
            $name= "Ironman";
            $test_adventure = new Adventure($name);
            $test_adventure->save();

            $name1 = "Marathon";
            $test_adventure1 = new Adventure($name1);
            $test_adventure1->save();

            $search_id = $test_adventure1->getId();
            $result = Adventure::find($search_id);

            $this->assertEquals($test_adventure1, $result);

        }

        function test_update()
        {
            $name = "Ironman";
            $test_adventure = new Adventure($name);
            $new_name = "Marathon";

            $test_adventure->update($new_name);
            $result = $test_adventure->getName();

            $this->assertEquals("Marathon", $result);
        }

        function test_UpdateDatabase()
        {
            $name = "Ironman";
            $test_adventure = new Adventure($name);
            $new_name = "Marathon";

            $test_adventure->save();
            $test_adventure->update($new_name);
            $result = Adventure::getAll();

            $this->assertEquals("Marathon", $result[0]->getName());
        }

        function test_singleDelete()
        {
            $test_adventure = new Adventure("Ironman");
            $test_adventure->save();

            $test_adventure1 = new Adventure("Marathon");
            $test_adventure1->save();

            $test_adventure->singleDelete();
            $result = Adventure::getAll();

            $this->assertEquals([$test_adventure1], $result);
        }

        function test_addActivity()
        {
            $test_adventure = new Adventure("Ironman");
            $test_adventure->save();
            $test_activity = new Activity("Run");
            $test_activity->save();

            $test_adventure->addActivity($test_activity);
            $result = $test_adventure->getActivities();

            $this->assertEquals([$test_activity], $result);

        }

        function test_getActivities()
        {
            $test_adventure = new Adventure("Ironman");
            $test_adventure->save();
            $test_activity = new Activity("Run");
            $test_activity->save();
            $test_activity1 = new Activity("Swim");
            $test_activity1->save();

            $test_adventure->addActivity($test_activity);
            $test_adventure->addActivity($test_activity1);
            $result = $test_adventure->getActivities();

            $this->assertEquals([$test_activity, $test_activity1], $result);

        }

        function test_addCountry()
        {
            $test_adventure = new Adventure("Ironman");
            $test_adventure->save();
            $test_country = new Country("USA");
            $test_country->save();

            $test_adventure->addCountry($test_country);
            $result = $test_adventure->getCountries();
            $this->assertEquals([$test_country], $result);

        }

        function test_getCountries()
        {
            $test_adventure = new Adventure("Climb Everest");
            $test_adventure->save();
            $test_country = new Country("Nepal");
            $test_country->save();
            $test_country1 = new Country("Tibet");
            $test_country1->save();

            $test_adventure->addCountry($test_country);
            $test_adventure->addCountry($test_country1);
            $result = $test_adventure->getCountries();

            $this->assertEquals([$test_country, $test_country1], $result);

        }

        function test_dropActivity()
        {
            $test_adventure = new Adventure("Ironman");
            $test_adventure->save();
            $test_activity = new Activity("Run");
            $test_activity->save();
            $test_activity1 = new Activity("Swim");
            $test_activity1->save();

            $test_adventure->addActivity($test_activity);
            $test_adventure->addActivity($test_activity1);

            $test_adventure->dropActivity($test_activity);
            $result = $test_adventure->getActivities();

            $this->assertEquals([$test_activity1], $result);
        }

        function test_dropCountry()
        {
            $test_adventure = new Adventure("Ironman");
            $test_adventure->save();
            $test_country = new Country("America");
            $test_country->save();
            $test_country1 = new Country("Brazil");
            $test_country1->save();

            $test_adventure->addCountry($test_country);
            $test_adventure->addCountry($test_country1);

            $test_adventure->dropCountry($test_country);
            $result = $test_adventure->getCountries();

            $this->assertEquals([$test_country1], $result);
>>>>>>> 4aeadf190d88095c6b4d336774aeb0c5c732a11c
        }
    }


 ?>
