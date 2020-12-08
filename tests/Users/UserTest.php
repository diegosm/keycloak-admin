<?php

declare(strict_types=1);

namespace Tests\Users;

use GuzzleHttp\Psr7\Response;
use KeycloakAdmin\Users\User;
use KeycloakAdmin\Users\UserCollection;
use KeycloakAdmin\Users\UserManager;
use KeycloakAdmin\Users\UserRoleMapperManager;
use Tests\BaseTest;

class UserTest extends BaseTest
{
    public function testItCanListUsers()
    {
        $client = $this->createStubClient('Users/list.json');

        $manager = $this->createUserManager($client);

        $result = $manager->list();

        $this->assertInstanceOf(UserCollection::class, $result);
    }

    public function testOnlyCanSaveWhenHaveUsername()
    {
        $this->expectException(\Exception::class);

        $manager = $this->createUserManager();

        $userInvalid = '{"name": "error"}';

        $manager->createFromJson($userInvalid)->save();
    }

    public function testItCanSaveUser()
    {
        $client = $this->createStubClient('', 201);

        $manager = $this->createUserManager($client);

        $json = '{"username": "diego@email.com"}';

        $result = $manager->createFromJson($json)->save();

        $this->assertInstanceOf(User::class, $result);
    }

    public function testItCanShowUserInfo()
    {
        $client = $this->createStubClient('Users/show.json', 200);

        $manager = $this->createUserManager($client);

        $result = $manager->show('fb2f0f35-ca93-48dc-96fc-4a29c8f2f734');

        $this->assertInstanceOf(User::class, $result);

        $this->assertEquals('123123', $result->getAttributes('account_id')[0]);
    }

    public function testItCanUpdateUser()
    {
        $json = '{
            "id": "fdca49c1-80c8-4492-9c97-e808202f87dd",
            "username": "user@email.com",
            "email": "meunovo@email.com",
            "notBefore": 10000,
            "attributes": {
                "key": "value",
                "key2": "value2"
            }
        }';

        $updateResponse = new Response(
            204,
            [],
            file_get_contents('tests/Stubs/Users/update.json')
        );

        $showResponse = new Response(
            200,
            [],
            $json
        );

        $client = $this->getMockBuilder(\GuzzleHttp\Client::class)->getMock();
        $client->method('request')
            ->willReturnOnConsecutiveCalls(
                $updateResponse,
                $showResponse
            );

        $manager = $this->createUserManager($client);

        $result = $manager->createFromJson($json)->update();
        $this->assertEquals("user@email.com", $result->getUsername());
    }

    public function testItCanDeleteUser()
    {
        $client = $this->createStubClient('', 204);

        $manager = $this->createUserManager($client);

        $this->assertNull(
            $manager->delete('fdca49c1-80c8-4492-9c97-e808202f87dd')
        );
    }

    public function testMustHaveRoleMapperManager()
    {
        $client = $this->createStubClient('', 204);

        $manager = $this->createUserManager($client);

        $this->assertInstanceOf(UserRoleMapperManager::class, $manager->roleMappings('user-id'));
    }

    protected function createUserManager($clientHTTP = null) : UserManager
    {
        if (null === $clientHTTP) {
            $clientHTTP = $this->createStubClient();
        }

        return new UserManager(
            $clientHTTP,
            $this->keycloakAdminConfig,
            $this->serializer,
            $this->keycloakAuth,
            'master'
        );
    }
}
