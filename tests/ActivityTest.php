<?php

    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once "src/Activity.php";

    $DB = new PDO('pgsql:host=localhost;dbname=travel_test');

    class ActivityTest extends PHPUnit_Framework_TestCase
    {
        protected function tearDown()
        {
            Activity::deleteAll();
        }

        function test_setId()
        {
            //Arrange
            $name = "bike";
            $id = 1;
            $test_activity = new Activity($name, $id);
            //Act
            $test_activity->setId(3);
            $result = $test_activity->getId();

            //Assert
            $this->assertEquals(3, $result);
        }

        function test_setName()
        {
            //Arrange
            $name = "bike";
            $test_activity = new Activity($name);
            $new_name = "swimming";

            //Act
            $test_activity->setName($new_name);
            $result = $test_activity->getName();

            //Assert
            $this->assertEquals($new_name, $result);
        }

        function test_save()
        {
            //Arrange
            $name = "eating";
            $test_activity = new Activity($name);
            $test_activity->save();

            //Act
            $result = Activity::getAll();

            //Assert
            $this->assertEquals($test_activity, $result[0]);
        }

        function test_getAll()
        {
            //Arrange
            $name = "eating";
            $test_activity = new Activity($name);
            $test_activity->save();
            $name2 = "sightseeing";
            $test_activity2 = new Activity($name2);
            $test_activity2->save();

            //Act
            $result = Activity::getAll();

            //Assert
            $this->assertEquals([$test_activity, $test_activity2], $result);
        }

        function test_deleteAll()
        {
            //Arrange
            $name = "eating";
            $test_activity = new Activity($name);
            $test_activity->save();
            $name2 = "sightseeing";
            $test_activity2 = new Activity($name2);
            $test_activity2->save();

            //Act
            Activity::deleteAll();
            $result = Activity::getAll();

            //Assert
            $this->assertEquals([], $result);
        }



    }
