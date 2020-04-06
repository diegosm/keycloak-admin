<?php

declare(strict_types=1);

namespace Tests\Users;

use KeycloakAdmin\Users\Exceptions\UserEmptyCredentialRepresentationException;
use KeycloakAdmin\Users\UserManager;
use Tests\BaseTest;

class UserResetPasswordTest extends BaseTest
{
    public function testItCanResetPassword()
    {
        $client = $this->createStubClient('', 204);

        $manager = $this->createUserManager($client);

        $this->assertNull(
            $manager->resetPassword('fdca49c1-80c8-4492-9c97-e808202f87dd')
                ->createFromJson('{ "type": "password", "temporary": false, "value": "my-new-password" }')
                ->save()
        );
    }

    public function testMustHaveClientCredentialRepresentation()
    {
        $this->expectException(UserEmptyCredentialRepresentationException::class);

        $client = $this->createStubClient('', 409);

        $manager = $this->createUserManager($client);

        $manager->resetPassword('my-id')->save();
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
