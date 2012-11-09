<?php
/**
 * Eadrax/Repository-MySQL Project/Add.php
 *
 * @package   Repository
 * @author    Dion Moult <dion@thinkmoult.com>
 * @copyright (c) 2012 Dion Moult
 * @license   ISC http://opensource.org/licenses/isc-license.txt
 * @link      http://wipup.org/
 */

namespace Eadrax\Repository\Project;
use Eadrax\Eadrax\Context\Project\Add\Repository;

/**
 * Handles persistance during adding a project.
 *
 * @package    Repository
 */
class Add implements Repository
{
    public function add_project($model_project)
    {
        $query = DB::insert('projects', array(
            'name',
            'summary',
            'uid'
        ))->values(array(
            $model_project->name,
            $model_project->summary,
            $model_project->author->id
        ));
        $query->execute();
    }
}
