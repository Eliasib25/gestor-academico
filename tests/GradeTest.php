<?php

use PHPUnit\Framework\TestCase;

require_once(__DIR__ . "/../models/Grade.php");

class GradeTest extends TestCase
{
    private $grade;

    protected function setUp(): void
    {
        $this->grade = new Grade();
    }

    public function testSaveSuccess()
    {
        // Asegúrate de usar datos únicos que no existan
        $id = 0;
        $name = "Test Grade";
        $journey = "Mañana";
        $classroom = "101A";

        $result = $this->grade->save($id, $name, $journey, $classroom);
        $this->assertEquals("success", $result);
    }

    public function testDuplicateGrade()
    {
        // Primero lo insertamos para que exista
        $id = 0;
        $name = "DuplicateGrade";
        $journey = "Tarde";
        $classroom = "102A";
        $this->grade->save($id, $name, $journey, $classroom);

        // Intentamos insertar el mismo grado y jornada
        $result = $this->grade->save(1001, $name, $journey, "103B");
        $this->assertEquals("duplicate_grade", $result);
    }

    public function testDuplicateClassroom()
    {
        // Primero lo insertamos para que exista
        $id = 0;
        $name = "GradeX";
        $journey = "tarde";
        $classroom = "104C";
        $this->grade->save($id, $name, $journey, $classroom);

        // Intentamos insertar mismo salón y jornada con nombre diferente
        $result = $this->grade->save(0, "AnotherGrade", $journey, $classroom);
        $this->assertEquals("duplicate_classroom", $result);
    }
}
