<?php

    /**
    * @backupGlobals disabled
    * @backupGlobals disabled
    */

    $DB = new PDO('pgsql:host=localhost;dbname = travel_test');

    require_once "src/Adventure.php";

    class AdventureTest extends PHPUnit_Framework_TestCase
    {

        protected function tearDown()
        {
            Adventure::deleteAll();
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
            $name= "I";
        }
    }


 ?>
