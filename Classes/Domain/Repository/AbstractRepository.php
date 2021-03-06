<?php
namespace AOE\Crawler\Domain\Repository;

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2019 AOE GmbH <dev@aoe.com>
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

use TYPO3\CMS\Extbase\Persistence\Repository;

/**
 * Class AbstractRepository
 *
 * @package AOE\Crawler\Domain\Repository
 */
abstract class AbstractRepository extends Repository
{

    /**
     * @var string table name
     */
    protected $tableName;

    /**
     * Counts items by a given where clause
     *
     * @param  string $where
     *
     * @return integer
     */
    protected function countByWhere($where)
    {
        $db = $this->getDB();
        $rs = $db->exec_SELECTquery('count(*) as anz', $this->tableName, $where);
        $res = $db->sql_fetch_assoc($rs);

        return intval($res['anz']);
    }

    /**
     * Returns an instance of the TYPO3 database class.
     *
     * @return \TYPO3\CMS\Core\Database\DatabaseConnection
     * @deprecated since crawler v6.5.1, will be removed in crawler v9.0.0.
     */
    protected function getDB()
    {
        return $GLOBALS['TYPO3_DB'];
    }
}
