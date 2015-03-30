<?php

    /**
    * @backupGlobals disabled
    * @backupGlobals disabled
    */

    //$DB = new PDO('pgsql:host=localhost;dbname = WHATEVER');

    require_once "src/Adventures.php";

    class AdventuresTest extends PHPUnit_Framework_TestCase
    {
        function test_GetId()
        {
            $name = "Marathon1";
            $id = 2;
            $test_adventure = new Adventures($name, $id);

            $result = $test_adventure->getId();

            $this->assertEquals(2, $result);
        }

        function test_SetId()
        {
            $name = "Marathon1";
            $id = 2;
            $test_adventure = new Adventures($name, $id);

            $test_adventure->setId(4);
            $result = $test_adventure->getId();

            $this->assertEquals(4, $result);

        }

        function test_GetName()
        {
            $name = "Marathon1";
            $test_adventure = new Adventures($name);

            $result = $test_adventure->getName();

            $this->assertEquals("Marathon1", $result);

        }

        function test_setName()
        {
            $name = "Climb";
            $test_adventure = new Adventures($name);
            $new_name = "Run";

            $test_adventure->setName($new_name);
            $result = $test_adventure->getName();

            $this->assertEquals("Run", $new_name);

        }


    }


 ?>
