<?php

namespace PixlMint\CMS\Helpers;

use PixlMint\CMS\Models\TokenUser;
use Nacho\ORM\RepositoryManager;
use Nacho\Security\JsonUserHandler;
use Nacho\Contracts\UserHandlerInterface;
use Nacho\Security\UserInterface;
use Nacho\Security\UserRepository;

final class CustomUserHelper extends JsonUserHandler implements UserHandlerInterface
{
    const ROLE_SUPER_ADMIN = 'Super Admin';
    const ROLE_EDITOR = 'Editor';
    const ROLE_READER = 'Reader';
    const ROLE_GUEST = 'Guest';

    public function getCurrentUser()
    {
        if (!key_exists('HTTP_PIXLTOKEN', $_SERVER)) {
            return new TokenUser(0, 'Guest', self::ROLE_GUEST, null, null, null, null);
        }

        $token = $_SERVER['HTTP_PIXLTOKEN'];
        $tokenHelper = new TokenHelper();

        return $tokenHelper->getUserByToken($token, $this->getUsers());
    }

    public function isGranted(string $minRight = self::ROLE_GUEST, ?UserInterface $user = null): bool
    {
        if (!$user) {
            $user = $this->getCurrentUser();
        }
        return parent::isGranted($minRight, $user);
    }

    public function setPassword(string $username, string $newPassword): UserInterface
    {
        /** @var TokenUser $user */
        $user = $this->findUser($username);
        $this->setPasswordForUser($user, $newPassword);

        return $user;
    }

    public function setPasswordForUser(TokenUser $user, string $newPassword): TokenUser
    {
        $passwordHash = password_hash(SecretHelper::getSecret() . $newPassword, PASSWORD_DEFAULT);
        $user->setPassword($passwordHash);
        RepositoryManager::getInstance()->getRepository(UserRepository::class)->set($user);

        return $user;
    }

    public function passwordVerify(UserInterface $user, string $password): bool
    {
        $secret = SecretHelper::getSecret();

        return password_verify($secret . $password, $user->getPassword());
    }
}
