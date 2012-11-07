<?php
/**
 * Eadrax/Repository-MySQL User/Login.php
 *
 * @package   Repository
 * @author    Dion Moult <dion@thinkmoult.com>
 * @copyright (c) 2012 Dion Moult
 * @license   ISC http://opensource.org/licenses/isc-license.txt
 * @link      http://wipup.org/
 */

namespace Eadrax\Repository\User;

/**
 * Handles persistance during user registration.
 *
 * @package Repository
 */
class Login
{
    /**
     * For MySQL user table interactions.
     * @var Gateway_User
     */
    public $gateway_mysql_user;

    /**
     * Sets up DAOs
     *
     * @return void
     */
    public function __construct()
    {
        $this->gateway_mysql_user = new Gateway_MySQL_User;
    }

    /**
     * Checks whether or not an account exists.
     *
     * @param string $username The username of the account
     * @param string $password The password of the account
     * @return bool
     */
    public function is_existing_account($username, $password)
    {
        return $this->gateway_mysql_user->exists(array(
            'username' => $username,
            'password' => $password
        ));
    }
}
