<?php

namespace Map;

use \TermInfo;
use \TermInfoQuery;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\InstancePoolTrait;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\DataFetcher\DataFetcherInterface;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\RelationMap;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Map\TableMapTrait;


/**
 * This class defines the structure of the 'term_info' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class TermInfoTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.TermInfoTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'aphio';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'term_info';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\TermInfo';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'TermInfo';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 7;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 7;

    /**
     * the column name for the id field
     */
    const COL_ID = 'term_info.id';

    /**
     * the column name for the name field
     */
    const COL_NAME = 'term_info.name';

    /**
     * the column name for the start_date field
     */
    const COL_START_DATE = 'term_info.start_date';

    /**
     * the column name for the quarter field
     */
    const COL_QUARTER = 'term_info.quarter';

    /**
     * the column name for the year field
     */
    const COL_YEAR = 'term_info.year';

    /**
     * the column name for the pledge_start_date field
     */
    const COL_PLEDGE_START_DATE = 'term_info.pledge_start_date';

    /**
     * the column name for the current field
     */
    const COL_CURRENT = 'term_info.current';

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
        self::TYPE_PHPNAME       => array('Id', 'Name', 'StartDate', 'Quarter', 'Year', 'PledgeStartDate', 'Current', ),
        self::TYPE_CAMELNAME     => array('id', 'name', 'startDate', 'quarter', 'year', 'pledgeStartDate', 'current', ),
        self::TYPE_COLNAME       => array(TermInfoTableMap::COL_ID, TermInfoTableMap::COL_NAME, TermInfoTableMap::COL_START_DATE, TermInfoTableMap::COL_QUARTER, TermInfoTableMap::COL_YEAR, TermInfoTableMap::COL_PLEDGE_START_DATE, TermInfoTableMap::COL_CURRENT, ),
        self::TYPE_FIELDNAME     => array('id', 'name', 'start_date', 'quarter', 'year', 'pledge_start_date', 'current', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'Name' => 1, 'StartDate' => 2, 'Quarter' => 3, 'Year' => 4, 'PledgeStartDate' => 5, 'Current' => 6, ),
        self::TYPE_CAMELNAME     => array('id' => 0, 'name' => 1, 'startDate' => 2, 'quarter' => 3, 'year' => 4, 'pledgeStartDate' => 5, 'current' => 6, ),
        self::TYPE_COLNAME       => array(TermInfoTableMap::COL_ID => 0, TermInfoTableMap::COL_NAME => 1, TermInfoTableMap::COL_START_DATE => 2, TermInfoTableMap::COL_QUARTER => 3, TermInfoTableMap::COL_YEAR => 4, TermInfoTableMap::COL_PLEDGE_START_DATE => 5, TermInfoTableMap::COL_CURRENT => 6, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'name' => 1, 'start_date' => 2, 'quarter' => 3, 'year' => 4, 'pledge_start_date' => 5, 'current' => 6, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, )
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
        $this->setName('term_info');
        $this->setPhpName('TermInfo');
        $this->setIdentifierQuoting(true);
        $this->setClassName('\\TermInfo');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('name', 'Name', 'VARCHAR', true, 10, '');
        $this->addColumn('start_date', 'StartDate', 'BIGINT', true, null, 0);
        $this->addColumn('quarter', 'Quarter', 'VARCHAR', true, 7, '');
        $this->addColumn('year', 'Year', 'INTEGER', true, null, 0);
        $this->addColumn('pledge_start_date', 'PledgeStartDate', 'BIGINT', true, null, 0);
        $this->addColumn('current', 'Current', 'BOOLEAN', true, 1, false);
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
        // If the PK cannot be derived from the row, return NULL.
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)];
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
        return (int) $row[
            $indexType == TableMap::TYPE_NUM
                ? 0 + $offset
                : self::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)
        ];
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
        return $withPrefix ? TermInfoTableMap::CLASS_DEFAULT : TermInfoTableMap::OM_CLASS;
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
     * @return array           (TermInfo object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = TermInfoTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = TermInfoTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + TermInfoTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = TermInfoTableMap::OM_CLASS;
            /** @var TermInfo $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            TermInfoTableMap::addInstanceToPool($obj, $key);
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
            $key = TermInfoTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = TermInfoTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var TermInfo $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                TermInfoTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(TermInfoTableMap::COL_ID);
            $criteria->addSelectColumn(TermInfoTableMap::COL_NAME);
            $criteria->addSelectColumn(TermInfoTableMap::COL_START_DATE);
            $criteria->addSelectColumn(TermInfoTableMap::COL_QUARTER);
            $criteria->addSelectColumn(TermInfoTableMap::COL_YEAR);
            $criteria->addSelectColumn(TermInfoTableMap::COL_PLEDGE_START_DATE);
            $criteria->addSelectColumn(TermInfoTableMap::COL_CURRENT);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.name');
            $criteria->addSelectColumn($alias . '.start_date');
            $criteria->addSelectColumn($alias . '.quarter');
            $criteria->addSelectColumn($alias . '.year');
            $criteria->addSelectColumn($alias . '.pledge_start_date');
            $criteria->addSelectColumn($alias . '.current');
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
        return Propel::getServiceContainer()->getDatabaseMap(TermInfoTableMap::DATABASE_NAME)->getTable(TermInfoTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(TermInfoTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(TermInfoTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new TermInfoTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a TermInfo or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or TermInfo object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(TermInfoTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \TermInfo) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(TermInfoTableMap::DATABASE_NAME);
            $criteria->add(TermInfoTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = TermInfoQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            TermInfoTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                TermInfoTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the term_info table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return TermInfoQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a TermInfo or Criteria object.
     *
     * @param mixed               $criteria Criteria or TermInfo object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(TermInfoTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from TermInfo object
        }

        if ($criteria->containsKey(TermInfoTableMap::COL_ID) && $criteria->keyContainsValue(TermInfoTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.TermInfoTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = TermInfoQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // TermInfoTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
TermInfoTableMap::buildTableMap();
