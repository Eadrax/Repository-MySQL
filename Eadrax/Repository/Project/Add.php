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

/**
 * Handles persistance during adding a project.
 *
 * @package    Repository
 */
class Add
{
    /**
     * For MySQL project table interactions.
     * @var Gateway_Project
     */
    public $gateway_mysql_project;

    /**
     * Sets up DAOs
     *
     * @return void
     */
    public function __construct()
    {
        $this->gateway_mysql_project = new Gateway_MySQL_Project;
    }

    /**
     * Saves a project in the database
     *
     * @param Model_Project $model_project The project to save
     * @return void
     */
    public function add_project($model_project)
    {
        $this->gateway_mysql_project->insert(array(
            'name' => $model_project->name,
            'summary' => $model_project->summary,
            'uid' => $model_project->author->id
        ));
    }
}
