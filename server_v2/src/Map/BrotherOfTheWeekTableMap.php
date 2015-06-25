<?php

namespace Map;

use \BrotherOfTheWeek;
use \BrotherOfTheWeekQuery;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\InstancePoolTrait;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\DataFetcher\DataFetcherInterface;
use Propel\Runtime\Exception\LogicException;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\RelationMap;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Map\TableMapTrait;


/**
 * This class defines the structure of the 'brother_of_the_week' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class BrotherOfTheWeekTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.BrotherOfTheWeekTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'aphio';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'brother_of_the_week';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\BrotherOfTheWeek';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'BrotherOfTheWeek';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 5;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 5;

    /**
     * the column name for the user field
     */
    const COL_USER = 'brother_of_the_week.user';

    /**
     * the column name for the reason field
     */
    const COL_REASON = 'brother_of_the_week.reason';

    /**
     * the column name for the week field
     */
    const COL_WEEK = 'brother_of_the_week.week';

    /**
     * the column name for the year field
     */
    const COL_YEAR = 'brother_of_the_week.year';

    /**
     * the column name for the term field
     */
    const COL_TERM = 'brother_of_the_week.term';

    /**
     * The default string format for model objects of the related table
     */
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldNames[self::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        self::TYPE_PHPNAME       => array('User', 'Reason', 'Week', 'Year', 'Term', ),
        self::TYPE_CAMELNAME     => array('user', 'reason', 'week', 'year', 'term', ),
        self::TYPE_COLNAME       => array(BrotherOfTheWeekTableMap::COL_USER, BrotherOfTheWeekTableMap::COL_REASON, BrotherOfTheWeekTableMap::COL_WEEK, BrotherOfTheWeekTableMap::COL_YEAR, BrotherOfTheWeekTableMap::COL_TERM, ),
        self::TYPE_FIELDNAME     => array('user', 'reason', 'week', 'year', 'term', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('User' => 0, 'Reason' => 1, 'Week' => 2, 'Year' => 3, 'Term' => 4, ),
        self::TYPE_CAMELNAME     => array('user' => 0, 'reason' => 1, 'week' => 2, 'year' => 3, 'term' => 4, ),
        self::TYPE_COLNAME       => array(BrotherOfTheWeekTableMap::COL_USER => 0, BrotherOfTheWeekTableMap::COL_REASON => 1, BrotherOfTheWeekTableMap::COL_WEEK => 2, BrotherOfTheWeekTableMap::COL_YEAR => 3, BrotherOfTheWeekTableMap::COL_TERM => 4, ),
        self::TYPE_FIELDNAME     => array('user' => 0, 'reason' => 1, 'week' => 2, 'year' => 3, 'term' => 4, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, )
    );

    /**
     * Initialize the table attributes and columns
     * Relations are not initialized by this method since they are lazy loaded
     *
     * @return void
     * @throws PropelException
     */
    public function initialize()
    {
        // attributes
        $this->setName('brother_of_the_week');
        $this->setPhpName('BrotherOfTheWeek');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\BrotherOfTheWeek');
        $this->setPackage('');
        $this->setUseIdGenerator(false);
        // columns
        $this->addColumn('user', 'User', 'INTEGER', true, null, null);
        $this->addColumn('reason', 'Reason', 'VARCHAR', true, 300, null);
        $this->addColumn('week', 'Week', 'INTEGER', true, null, null);
        $this->addColumn('year', 'Year', 'INTEGER', true, null, null);
        $this->addColumn('term', 'Term', 'INTEGER', true, null, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
    } // buildRelations()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return string The primary key hash of the row
     */
    public static function getPrimaryKeyHashFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        return null;
    }

    /**
     * Retrieves the primary key from the DB resultset row
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, an array of the primary key columns will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return mixed The primary key of the row
     */
    public static function getPrimaryKeyFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        return '';
    }

    /**
     * The class that the tableMap will make instances of.
     *
     * If $withPrefix is true, the returned path
     * uses a dot-path notation which is translated into a path
     * relative to a location on the PHP include_path.
     * (e.g. path.to.MyClass -> 'path/to/MyClass.php')
     *
     * @param boolean $withPrefix Whether or not to return the path with the class name
     * @return string path.to.ClassName
     */
    public static function getOMClass($withPrefix = true)
    {
        return $withPrefix ? BrotherOfTheWeekTableMap::CLASS_DEFAULT : BrotherOfTheWeekTableMap::OM_CLASS;
    }

    /**
     * Populates an object of the default type or an object that inherit from the default.
     *
     * @param array  $row       row returned by DataFetcher->fetch().
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType The index type of $row. Mostly DataFetcher->getIndexType().
                                 One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     * @return array           (BrotherOfTheWeek object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = BrotherOfTheWeekTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = BrotherOfTheWeekTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + BrotherOfTheWeekTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = BrotherOfTheWeekTableMap::OM_CLASS;
            /** @var BrotherOfTheWeek $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            BrotherOfTheWeekTableMap::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }

    /**
     * The returned array will contain objects of the default type or
     * objects that inherit from the default.
     *
     * @param DataFetcherInterface $dataFetcher
     * @return array
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function populateObjects(DataFetcherInterface $dataFetcher)
    {
        $results = array();

        // set the class once to avoid overhead in the loop
        $cls = static::getOMClass(false);
        // populate the object(s)
        while ($row = $dataFetcher->fetch()) {
            $key = BrotherOfTheWeekTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = BrotherOfTheWeekTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var BrotherOfTheWeek $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                BrotherOfTheWeekTableMap::addInstanceToPool($obj, $key);
            } // if key exists
        }

        return $results;
    }
    /**
     * Add all the columns needed to create a new object.
     *
     * Note: any columns that were marked with lazyLoad="true" in the
     * XML schema will not be added to the select list and only loaded
     * on demand.
     *
     * @param Criteria $criteria object containing the columns to add.
     * @param string   $alias    optional table alias
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function addSelectColumns(Criteria $criteria, $alias = null)
    {
        if (null === $alias) {
            $criteria->addSelectColumn(BrotherOfTheWeekTableMap::COL_USER);
            $criteria->addSelectColumn(BrotherOfTheWeekTableMap::COL_REASON);
            $criteria->addSelectColumn(BrotherOfTheWeekTableMap::COL_WEEK);
            $criteria->addSelectColumn(BrotherOfTheWeekTableMap::COL_YEAR);
            $criteria->addSelectColumn(BrotherOfTheWeekTableMap::COL_TERM);
        } else {
            $criteria->addSelectColumn($alias . '.user');
            $criteria->addSelectColumn($alias . '.reason');
            $criteria->addSelectColumn($alias . '.week');
            $criteria->addSelectColumn($alias . '.year');
            $criteria->addSelectColumn($alias . '.term');
        }
    }

    /**
     * Returns the TableMap related to this object.
     * This method is not needed for general use but a specific application could have a need.
     * @return TableMap
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function getTableMap()
    {
        return Propel::getServiceContainer()->getDatabaseMap(BrotherOfTheWeekTableMap::DATABASE_NAME)->getTable(BrotherOfTheWeekTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(BrotherOfTheWeekTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(BrotherOfTheWeekTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new BrotherOfTheWeekTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a BrotherOfTheWeek or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or BrotherOfTheWeek object or primary key or array of primary keys
     *              which is used to create the DELETE statement
     * @param  ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
     public static function doDelete($values, ConnectionInterface $con = null)
     {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(BrotherOfTheWeekTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \BrotherOfTheWeek) { // it's a model object
            // create criteria based on pk value
            $criteria = $values->buildCriteria();
        } else { // it's a primary key, or an array of pks
            throw new LogicException('The BrotherOfTheWeek object has no primary key');
        }

        $query = BrotherOfTheWeekQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            BrotherOfTheWeekTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                BrotherOfTheWeekTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the brother_of_the_week table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return BrotherOfTheWeekQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a BrotherOfTheWeek or Criteria object.
     *
     * @param mixed               $criteria Criteria or BrotherOfTheWeek object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(BrotherOfTheWeekTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from BrotherOfTheWeek object
        }


        // Set the correct dbName
        $query = BrotherOfTheWeekQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // BrotherOfTheWeekTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BrotherOfTheWeekTableMap::buildTableMap();
