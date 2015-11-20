<?php

namespace AppBundle\Security;

use KnpU\Guard\AbstractGuardAuthenticator;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;

class ApiTokenAuthenticator extends AbstractGuardAuthenticator
{
    private $em;
    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    public function getCredentials(Request $request)
    {
        return $request->headers->get('X-TOKEN');
    }

    public function getUser($credentials, UserProviderInterface $userProvider)
    {
        $user = $this->em->getRepository('AppBundle:Admin')
            ->findOneBy(array('apiToken' => $credentials));
        // we could just return null, but this allows us to control the message a bit more
        if (!$user) {
            throw new AuthenticationCredentialsNotFoundException();
        }
        return $user;
    }
    public function getCredentials(Request $request)
    {
        // TODO: Implement getCredentials() method.
    }

    public function getUser($credentials, UserProviderInterface $userProvider)
    {
        // TODO: Implement getUser() method.
    }

    public function checkCredentials($credentials, UserInterface $user)
    {
        // TODO: Implement checkCredentials() method.
    }

    public function onAuthenticationFailure(Request $request, AuthenticationException $exception)
    {
        // TODO: Implement onAuthenticationFailure() method.
    }

    public function onAuthenticationSuccess(Request $request, TokenInterface $token, $providerKey)
    {
        // TODO: Implement onAuthenticationSuccess() method.
    }

    public function supportsRememberMe()
    {
        // TODO: Implement supportsRememberMe() method.
    }

    public function start(Request $request, AuthenticationException $authException = null)
    {
        // TODO: Implement start() method.
    }
}
