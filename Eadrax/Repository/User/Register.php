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
    public function register($model_user)
    {
        $query = DB::insert('users', array(
            'username',
            'password',
            'email'
        ))->value(array(
            $model_user->username,
            Auth::instance()->hash($model_user->password),
            $model_user->email
        ));
        $query->execute();
    }

    public function is_unique_username($username)
    {
        $query = DB::select('id')->from('users')->limit(1)
            ->where('username', '=', $username);
        return (bool) ! $query->execute()->count();
    }
}
