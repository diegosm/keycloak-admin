<?php

declare(strict_types=1);

namespace Tests\Users;

use KeycloakAdmin\Users\UserManager;
use Tests\BaseTest;

class UserLogoutTest extends BaseTest
{
    public function testItCanLogoutUserById()
    {
        $client = $this->createStubClient('', 204);

        $manager = $this->createUserManager($client);

        $this->assertNull(
            $manager->logout('my-id')
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
