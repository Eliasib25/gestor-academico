<?php

use PHPUnit\Framework\TestCase;

require_once(__DIR__ . "/../models/User.php");

class UserTest extends TestCase
{
    private $user;

    protected function setUp(): void
    {
        $this->user = new User();
    }

    public function testSaveSuccess()
    {
        $id = 1000;
        $username = "testuser_" . uniqid();
        $password = "123456";
        $role = "coordinator";

        $result = $this->user->save($id, $username, $password, $role);
        $this->assertEquals("success", $result);
    }

    public function testLoginSuccess()
    {
        $id = 1001;
        $username = "loginuser_" . uniqid();
        $password = "mypassword";
        $role = "secretary";

        // Guardamos el usuario primero
        $this->user->save($id, $username, $password, $role);

        // Intentamos hacer login
        $result = $this->user->Login($username, $password);
        $this->assertNotNull($result);
        $this->assertGreaterThan(0, $result->num_rows);
    }

    public function testLoginFail()
    {
        $username = "nonexistent_user_" . uniqid();
        $password = "wrongpass";

        $result = $this->user->Login($username, $password);
        $this->assertNull($result);
    }

    public function testSearchOneFound()
    {
        $id = 1002;
        $username = "searchuser_" . uniqid();
        $password = "abc123";
        $role = "teacher";

        $this->user->save($id, $username, $password, $role);
        $result = $this->user->searchOne($username);
        $this->assertIsObject($result);
        $this->assertGreaterThan(0, $result->num_rows);
    }

    public function testSearchOneNotFound()
    {
        $username = "doesnotexist_" . uniqid();
        $result = $this->user->searchOne($username);
        $this->assertEquals("User not found", $result);
    }
}
