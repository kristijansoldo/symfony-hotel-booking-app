<?php

namespace App\Security;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Exception\CustomUserMessageAuthenticationException;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Core\Exception\InvalidCsrfTokenException;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Csrf\CsrfToken;
use Symfony\Component\Security\Csrf\CsrfTokenManagerInterface;
use Symfony\Component\Security\Guard\Authenticator\AbstractFormLoginAuthenticator;
use Symfony\Component\Security\Http\Util\TargetPathTrait;

/**
 * Class        LoginFormAuthenticator
 *
 * @since       1.0.0
 * @package     App\Security
 * @author      Kristijan Soldo <soldokristijan@yahoo.com>
 */
class LoginFormAuthenticator extends AbstractFormLoginAuthenticator
{
    use TargetPathTrait;

    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    /**
     * @var UrlGeneratorInterface
     */
    private $urlGenerator;

    /**
     * @var CsrfTokenManagerInterface
     */
    private $csrfTokenManager;

    /**
     * @var UserPasswordEncoderInterface
     */
    private $passwordEncoder;

    /**
     * LoginFormAuthenticator constructor.
     *
     * @param EntityManagerInterface $entityManager
     * @param UrlGeneratorInterface $urlGenerator
     * @param CsrfTokenManagerInterface $csrfTokenManager
     * @param UserPasswordEncoderInterface $passwordEncoder
     */
    public function __construct(
        EntityManagerInterface $entityManager,
        UrlGeneratorInterface $urlGenerator,
        CsrfTokenManagerInterface $csrfTokenManager,
        UserPasswordEncoderInterface $passwordEncoder
    ) {
        $this->entityManager    = $entityManager;
        $this->urlGenerator     = $urlGenerator;
        $this->csrfTokenManager = $csrfTokenManager;
        $this->passwordEncoder  = $passwordEncoder;
    }

    /**
     * Checks is authenticator supports request.
     *
     * @param Request $request
     *
     * @return bool
     */
    public function supports(Request $request)
    {
        return 'admin_login' === $request->attributes->get('_route')
               && $request->isMethod('POST');
    }

    /**
     * Gets credentials.
     *
     * @param Request $request
     *
     * @return array|mixed
     */
    public function getCredentials(Request $request)
    {
        $credentials = [
            'username'   => $request->request->get('username'),
            'password'   => $request->request->get('password'),
            'csrf_token' => $request->request->get('_csrf_token'),
        ];
        $request->getSession()->set(
            Security::LAST_USERNAME,
            $credentials['username']
        );

        return $credentials;
    }

    /**
     * Gets user.
     *
     * @param mixed $credentials
     * @param UserProviderInterface $userProvider
     *
     * @return User|null|object|UserInterface
     */
    public function getUser($credentials, UserProviderInterface $userProvider)
    {
        // Gets token
        $token = new CsrfToken('authenticate', $credentials['csrf_token']);

        // If token is invalid
        if ( ! $this->csrfTokenManager->isTokenValid($token)) {
            // Throws exception
            throw new InvalidCsrfTokenException();
        }

        // Tries to get user
        $user = $this->entityManager->getRepository(User::class)->findOneBy(['username' => $credentials['username']]);

        // If user does not exists
        if ( ! $user) {
            // Fail authentication with a custom error
            throw new CustomUserMessageAuthenticationException('Username could not be found.');
        }

        // Returns user
        return $user;
    }

    /**
     * Check for credentials.
     *
     * @param mixed $credentials
     * @param UserInterface $user
     *
     * @return bool
     */
    public function checkCredentials($credentials, UserInterface $user)
    {
        return $this->passwordEncoder->isPasswordValid($user, $credentials['password']);
    }

    /**
     * Fires on authentication success.
     *
     * @param Request $request
     * @param TokenInterface $token
     * @param string $providerKey
     *
     * @return null|RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function onAuthenticationSuccess(Request $request, TokenInterface $token, $providerKey)
    {
        // If logged - redirect
        if ($targetPath = $this->getTargetPath($request->getSession(), $providerKey)) {
            return new RedirectResponse($targetPath);
        }

        // Redirect after login
        return new RedirectResponse($this->urlGenerator->generate('admin_login'));
    }

    /**
     * Gets login url.
     *
     * @return string
     */
    protected function getLoginUrl()
    {
        return $this->urlGenerator->generate('admin_login');
    }
}
