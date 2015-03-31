<?php
    /**
    * @backupGlobals disabled
    * $backupStaticAttribute disabled
    */

    $DB = new PDO('pgsql:host=localhost;dbname=travel_test');

    require_once "src/Country.php";

    class CountryTest extends PHPUnit_Framework_TestCase{

//tearDown()
    protected function tearDown(){
        Country::deleteAll();
    }

//Set-n-Get Props, save

    function test_setGetSave(){
        //Arrange
        $name = "eritrea";
        $id = 1;
        $eritrea = new Country($name, $id);
        $eritrea->save();

        //Act
        $eritrea->setName('Eritrea');
        $eritrea->setId(2);
        $result = $eritrea->getName();
        $id2 = $eritrea->getId();

        //Assert
        $this->assertEquals(['Eritrea', $id2], [$result, 2]);
    }

//The Static Twins: GetAll, DeleteAll
    function test_getAll(){
        //Arrange
        $name = "eritrea";
        $id = 1;
        $eritrea = new Country($name, $id);
        $eritrea->save();

        $name2 = "Colorado";
        $id2 = 2;
        $colorado = new Country($name2, $id2);
        $colorado->save();
        //Act
        $result = Country::getAll();
        //Assert
        $this->assertEquals([$eritrea, $colorado], $result);
    }

    function test_deleteAll() {

        //Arrange
        $name = "eritrea";
        $id = 1;
        $eritrea = new Country($name, $id);
        $eritrea->save();

        $name2 = "Colorado";
        $id2 = 2;
        $colorado = new Country($name2, $id2);
        $colorado->save();

        //Act
        $result = Country::getAll();

        //Assert
        $this->assertEquals([$eritrea, $colorado], $result);
    }

//Find, Update & Delete Each

    function test_find(){
        //Arrange
        $name = "eritrea";
        $id = 1;
        $eritrea = new Country($name, $id);
        $eritrea->save();

        $name2 = "Colorado";
        $id2 = 2;
        $colorado = new Country($name2, $id2);
        $colorado->save();

        //Act
        $result = Country::find($id2);

        //Assert
        $this->assertEquals(2, $result);
    }

    function test_update(){
        //Arrange
        $name = "Czechoslovakia";
        $id = 1;
        $eritrea = new Country($name, $id);
        $eritrea->save();

        //Act
        $eritrea->update('Czech Republic');
        $result = $name->getName();

        //Assert
        $this->assertEquals('Czech Republic', $result);
    }

    function test_delete(){
        //Arrange
        $name = "eritrea";
        $id = 1;
        $eritrea = new Country($name, $id);
        $eritrea->save();

        $name2 = "Colorado";
        $id2 = 2;
        $colorado = new Country($name2, $id2);
        $colorado->save();

        //Act
        $colorado->delete();
        $result = Country::getAll();

        //Assert
        $this->assertEquals($eritrea, $result);
    }







    }

?>
