<?php
    /**
    * @backupGlobals disabled
    * $backupStaticAttribute disabled
    */

    $DB = new PDO('pgsql:host=localhost;dbname=travel_test');

    require_once "src/Country.php";

    class CountryTest extends PHPUnit_Framework_TestCase
    {

//tearDown()
     protected function tearDown(){
        Country::deleteAll();
    }

//Set-n-Get Props, save

    function test_save(){
        //Arrange
        $name = "Constantinople";
        $id = 2;
        $test_country = new Country($name, $id);
        $test_country->save();
        //Act
        $result = Country::getAll();
        //Assert
        $this->assertEquals([$test_country], $result);
    }
    function test_setGetName(){
        //Arrange
        $name = "Constantinople";
        $test_country = new Country($name);
        //Act
        $test_country->setName('Istanbul');
        $result = $test_country->getName();
        //Assert
        $this->assertEquals('Istanbul', $result);
    }
    function test_setGetId(){
        //Arrange
        $name = "Constantinople";
        $id = 1;
        $test_country = new Country($name, $id);
        //Act
        $test_country->setId(2);
        $result = $test_country->getId();
        //Assert
        $this->assertEquals(2, $result);
    }

//The Static Twins: GetAll, DeleteAll
    function test_getAll(){
        //Arrange
        $name = "test_country1";
        $test_country = new Country($name);
        $test_country->save();

        $name2 = "test_country2";
        $test_country2 = new Country($name2);
        $test_country2->save();
        //Act
        $result = Country::getAll();
        //Assert
        $this->assertEquals([$test_country, $test_country2], $result);
    }

    function test_deleteAll() {

        //Arrange
        $name = "test_country1";
        $test_country1 = new Country($name);
        $test_country1->save();

        $name2 = "test_country2";
        $test_country2 = new Country($name2);
        $test_country2->save();

        //Act
        $result = Country::getAll();

        //Assert
        $this->assertEquals([$test_country1, $test_country2], $result);
    }

//Find, Update & Delete Each

    function test_find(){
        //Arrange
        $name = "test_country1";
        $test_country1 = new Country($name);
        $test_country1->save();

        $name2 = "test_country2";
        $test_country2 = new Country($name2);
        $test_country2->save();

        //Act
        $result = Country::find($test_country1->getId());

        //Assert
        $this->assertEquals($test_country1, $result);
    }

    function test_update(){
        //Arrange
        $name = "Czechoslovakia";
        $id = 1;
        $test_country = new Country($name, $id);
        $test_country->save();

        //Act
        $test_country->update('Czech Republic');
        $result = $test_country->getName();

        //Assert
        $this->assertEquals('Czech Republic', $result);
    }

    function test_delete(){
        //Arrange
        $name = "USSR";
        $id = 1;
        $test_country1 = new Country($name, $id);
        $test_country1->save();

        $name2 = "Poland";
        $id2 = 2;
        $test_country2 = new Country($name2, $id2);
        $test_country2->save();

        //Act
        $test_country1->deleteCountry();
        $result = Country::getAll();

        //Assert
        $this->assertEquals([$test_country2], $result);
    }







    }

?>
