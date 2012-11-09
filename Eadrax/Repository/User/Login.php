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
    public function is_existing_account($username, $password)
    {
        $query = DB::select('id')->from('users')->limit(1)
            ->where('username', '=', $username)
            ->where('password', '=', Auth::instance()->hash($password));
        return (bool) $query->execute()->count();
    }
}
