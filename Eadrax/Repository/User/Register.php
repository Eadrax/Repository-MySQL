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
use Eadrax\Eadrax\Context\User\Register\Repository;
use Eadrax\Eadrax\Data;

/**
 * Handles persistance during user registration.
 *
 * @package    Repository
 */
class Register implements Repository
{
    public function register(Data\User $data_user)
    {
        $query = \DB::insert('users', array(
            'username',
            'password',
            'email'
        ))->value(array(
            $data_user->username,
            \Auth::instance()->hash($data_user->password),
            $data_user->email
        ));
        $query->execute();
    }

    public function is_unique_username($username)
    {
        $query = \DB::select('id')->from('users')->limit(1)
            ->where('username', '=', $username);
        return (bool) ! $query->execute()->count();
    }
}
