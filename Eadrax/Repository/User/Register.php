<?php
/**
 * Eadrax/Repository-MySQL User/Register.php
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
 * @package    Repository
 */
class Register
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
     * Saves a user in the database
     *
     * @param Model_User $model_user The user to save
     * @return void
     */
    public function register($model_user)
    {
        $this->gateway_mysql_user->insert(array(
            'username' => $model_user->username,
            'password' => $model_user->password,
            'email' => $model_user->email
        ));
    }

    /**
     * Checks whether or not a username is unique
     *
     * @param string $username The username to check
     * @return bool
     */
    public function is_unique_username($username)
    {
        return ! $this->gateway_mysql_user->exists(array(
            'username' => $username
        ));
    }
}