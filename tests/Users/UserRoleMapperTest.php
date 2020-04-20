<?php

declare(strict_types=1);

namespace Tests\Users;

use KeycloakAdmin\Roles\RoleCollection;
use KeycloakAdmin\Users\UserManager;
use Tests\BaseTest;

class UserRoleMapperTest extends BaseTest
{
    public function testItCanListRolesOfResource()
    {
        $client = $this->createStubClient('Users/RoleMappings/list.json');

        $manager = $this->createUserManager($client);

        $result = $manager->roleMappings('id-user')->list();

        $this->assertInstanceOf(RoleCollection::class, $result);
    }

    public function testItCanSaveRolesOfResource()
    {
        $client = $this->createStubClient('', 204);

        $manager = $this->createUserManager($client);

        $data = [
            [
                'id' => 'id-of-role',
                'name' => 'roleName',
                'composite' => false,
                'clientRole' => false
            ]
        ];

        $this->assertInstanceOf(
            RoleCollection::class,
            $manager->roleMappings('id-of-user')->createFromArray($data)->save()
        );
    }

    public function testItCanDeleteRolesOfResource()
    {
        $client = $this->createStubClient('', 204);

        $manager = $this->createUserManager($client);

        $data = [
            [
                'id' => 'id-of-role',
                'name' => 'roleName',
                'composite' => false,
                'clientRole' => false
            ]
        ];

        $this->assertEmpty(
            $manager->roleMappings('id-of-user')->createFromArray($data)->delete()
        );
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
