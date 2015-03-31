<?php

    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once "src/Activity.php";
    require_once "src/Location.php";

    $DB = new PDO('pgsql:host=localhost;dbname=travel_test');

    class LocationTest extends PHPUnit_Framework_TestCase
    {
        
        protected function tearDown()
        {
            Activity::deleteAll();
            Location::deleteAll();
        }

        function test_setId()
        {
            //Arrange
            $lat = 1.1;
            $long = 4.4;
            $activity_id = 3;
            $id = 1;
            $test_location = new Location($lat, $long, $activity_id, $id);
            //Act
            $test_location->setId(3);
            $result = $test_location->getId();

            //Assert
            $this->assertEquals(3, $result);
        }

        function test_setLat()
        {
            //Arrange
            $lat = 1.1;
            $long = 4.4;
            $activity_id = 3;
            $id = 1;
            $test_location = new Location($lat, $long, $activity_id, $id);
            //Act
            $test_location->setLatitude(3.1);
            $result = $test_location->getLatitude();

            //Assert
            $this->assertEquals(3.1, $result);
        }

        function test_setLong()
        {
            //Arrange
            $lat = 1.1;
            $long = 4.4;
            $activity_id = 3;
            $id = 1;
            $test_location = new Location($lat, $long, $activity_id, $id);
            //Act
            $test_location->setLongitude(3.1);
            $result = $test_location->getLongitude();

            //Assert
            $this->assertEquals(3.1, $result);
        }

        function test_setActivityID()
        {
            //Arrange
            $lat = 1.1;
            $long = 4.4;
            $activity_id = 3;
            $id = 1;
            $test_location = new Location($lat, $long, $activity_id, $id);
            //Act
            $test_location->setActivity_id(3);
            $result = $test_location->getActivity_id();

            //Assert
            $this->assertEquals(3, $result);
        }

        function test_save()
        {
            //Arrange
            $lat = 1.1;
            $long = 4.4;
            $activity_id = 3;
            $id = 1;
            $test_location = new Location($lat, $long, $activity_id, $id);
            $test_location->save();
            //Act
            $result = Location::getAll();

            //Assert
            $this->assertEquals($test_location, $result[0]);
        }

        function test_getAll()
        {
            //Arrange
            $lat = 1.1;
            $long = 4.4;
            $activity_id = 3;
            $id = 1;
            $test_location = new Location($lat, $long, $activity_id, $id);
            $test_location->save();

            $lat2 = 1.4;
            $long2 = 4.1;
            $activity_id2 = 2;
            $id2 = 3;
            $test_location2 = new Location($lat2, $long2, $activity_id2, $id2);
            $test_location2->save();
            //Act
            $result = Location::getAll();

            //Assert
            $this->assertEquals([$test_location, $test_location2], $result);
        }

        function test_deleteAll()
        {
            //Arrange
            $lat = 1.1;
            $long = 4.4;
            $activity_id = 3;
            $id = 1;
            $test_location = new Location($lat, $long, $activity_id, $id);
            $test_location->save();

            $lat2 = 1.4;
            $long2 = 4.1;
            $activity_id2 = 2;
            $id2 = 3;
            $test_location2 = new Location($lat2, $long2, $activity_id2, $id2);
            $test_location2->save();
            //Act
            Location::deleteAll();
            $result = Location::getAll();

            //Assert
            $this->assertEquals([], $result);
        }

        // function test_find()
        // {
        //     //Arrange
        //     $name = "eating";
        //     $test_activity = new Activity($name);
        //     $test_activity->save();
        //     $name2 = "sightseeing";
        //     $test_activity2 = new Activity($name2);
        //     $test_activity2->save();
        //
        //     //Act
        //     $result = Activity::find($test_activity2->getId());
        //
        //     //Assert
        //     $this->assertEquals($test_activity2, $result);
        // }
        //
        // function test_update()
        // {
        //     //Arrange
        //     $name = "eating";
        //     $test_activity = new Activity($name);
        //     $test_activity->save();
        //     $new_name = "cycling";
        //
        //     //Act
        //     $test_activity->update($new_name);
        //     $result = $test_activity->getName();
        //
        //     //Assert
        //     $this->assertEquals($new_name, $result);
        // }
        //
        // function test_delete()
        // {
        //     //Arrange
        //     $lat = 1.1;
        //     $test_lat = new Location($lat);
        //     $test_lat->save();
        //     $lat2 = 1.2;
        //     $test_lat2 = new Location($lat2);
        //     $test_lat2->save();
        //
        //     //Act
        //     $test_lat2->delete();
        //     $result = Location::getAll();
        //
        //     //Assert
        //     $this->assertEquals([$test_lat], $result);
        // }






    }
