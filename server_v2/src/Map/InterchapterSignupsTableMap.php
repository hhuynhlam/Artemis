<?php

namespace Map;

use \InterchapterSignups;
use \InterchapterSignupsQuery;
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
 * This class defines the structure of the 'interchapter_signups' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class InterchapterSignupsTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.InterchapterSignupsTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'aphio';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'interchapter_signups';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\InterchapterSignups';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'InterchapterSignups';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 11;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 11;

    /**
     * the column name for the event_id field
     */
    const COL_EVENT_ID = 'interchapter_signups.event_id';

    /**
     * the column name for the id field
     */
    const COL_ID = 'interchapter_signups.id';

    /**
     * the column name for the name field
     */
    const COL_NAME = 'interchapter_signups.name';

    /**
     * the column name for the chapter field
     */
    const COL_CHAPTER = 'interchapter_signups.chapter';

    /**
     * the column name for the email field
     */
    const COL_EMAIL = 'interchapter_signups.email';

    /**
     * the column name for the phone field
     */
    const COL_PHONE = 'interchapter_signups.phone';

    /**
     * the column name for the date field
     */
    const COL_DATE = 'interchapter_signups.date';

    /**
     * the column name for the shirt_size field
     */
    const COL_SHIRT_SIZE = 'interchapter_signups.shirt_size';

    /**
     * the column name for the vegetarian field
     */
    const COL_VEGETARIAN = 'interchapter_signups.vegetarian';

    /**
     * the column name for the housing_needed field
     */
    const COL_HOUSING_NEEDED = 'interchapter_signups.housing_needed';

    /**
     * the column name for the deleted field
     */
    const COL_DELETED = 'interchapter_signups.deleted';

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
        self::TYPE_PHPNAME       => array('EventId', 'Id', 'Name', 'Chapter', 'Email', 'Phone', 'Date', 'ShirtSize', 'Vegetarian', 'HousingNeeded', 'Deleted', ),
        self::TYPE_CAMELNAME     => array('eventId', 'id', 'name', 'chapter', 'email', 'phone', 'date', 'shirtSize', 'vegetarian', 'housingNeeded', 'deleted', ),
        self::TYPE_COLNAME       => array(InterchapterSignupsTableMap::COL_EVENT_ID, InterchapterSignupsTableMap::COL_ID, InterchapterSignupsTableMap::COL_NAME, InterchapterSignupsTableMap::COL_CHAPTER, InterchapterSignupsTableMap::COL_EMAIL, InterchapterSignupsTableMap::COL_PHONE, InterchapterSignupsTableMap::COL_DATE, InterchapterSignupsTableMap::COL_SHIRT_SIZE, InterchapterSignupsTableMap::COL_VEGETARIAN, InterchapterSignupsTableMap::COL_HOUSING_NEEDED, InterchapterSignupsTableMap::COL_DELETED, ),
        self::TYPE_FIELDNAME     => array('event_id', 'id', 'name', 'chapter', 'email', 'phone', 'date', 'shirt_size', 'vegetarian', 'housing_needed', 'deleted', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('EventId' => 0, 'Id' => 1, 'Name' => 2, 'Chapter' => 3, 'Email' => 4, 'Phone' => 5, 'Date' => 6, 'ShirtSize' => 7, 'Vegetarian' => 8, 'HousingNeeded' => 9, 'Deleted' => 10, ),
        self::TYPE_CAMELNAME     => array('eventId' => 0, 'id' => 1, 'name' => 2, 'chapter' => 3, 'email' => 4, 'phone' => 5, 'date' => 6, 'shirtSize' => 7, 'vegetarian' => 8, 'housingNeeded' => 9, 'deleted' => 10, ),
        self::TYPE_COLNAME       => array(InterchapterSignupsTableMap::COL_EVENT_ID => 0, InterchapterSignupsTableMap::COL_ID => 1, InterchapterSignupsTableMap::COL_NAME => 2, InterchapterSignupsTableMap::COL_CHAPTER => 3, InterchapterSignupsTableMap::COL_EMAIL => 4, InterchapterSignupsTableMap::COL_PHONE => 5, InterchapterSignupsTableMap::COL_DATE => 6, InterchapterSignupsTableMap::COL_SHIRT_SIZE => 7, InterchapterSignupsTableMap::COL_VEGETARIAN => 8, InterchapterSignupsTableMap::COL_HOUSING_NEEDED => 9, InterchapterSignupsTableMap::COL_DELETED => 10, ),
        self::TYPE_FIELDNAME     => array('event_id' => 0, 'id' => 1, 'name' => 2, 'chapter' => 3, 'email' => 4, 'phone' => 5, 'date' => 6, 'shirt_size' => 7, 'vegetarian' => 8, 'housing_needed' => 9, 'deleted' => 10, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
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
        $this->setName('interchapter_signups');
        $this->setPhpName('InterchapterSignups');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\InterchapterSignups');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addColumn('event_id', 'EventId', 'INTEGER', true, null, 0);
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('name', 'Name', 'VARCHAR', true, 40, '');
        $this->addColumn('chapter', 'Chapter', 'VARCHAR', true, 20, '');
        $this->addColumn('email', 'Email', 'LONGVARCHAR', true, null, null);
        $this->addColumn('phone', 'Phone', 'VARCHAR', true, 12, '0');
        $this->addColumn('date', 'Date', 'INTEGER', true, 10, 0);
        $this->addColumn('shirt_size', 'ShirtSize', 'VARCHAR', true, 2, '');
        $this->addColumn('vegetarian', 'Vegetarian', 'BOOLEAN', true, 1, false);
        $this->addColumn('housing_needed', 'HousingNeeded', 'TINYINT', true, null, 0);
        $this->addColumn('deleted', 'Deleted', 'INTEGER', true, 10, 0);
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return (string) $row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)];
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
                ? 1 + $offset
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
        return $withPrefix ? InterchapterSignupsTableMap::CLASS_DEFAULT : InterchapterSignupsTableMap::OM_CLASS;
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
     * @return array           (InterchapterSignups object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = InterchapterSignupsTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = InterchapterSignupsTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + InterchapterSignupsTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = InterchapterSignupsTableMap::OM_CLASS;
            /** @var InterchapterSignups $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            InterchapterSignupsTableMap::addInstanceToPool($obj, $key);
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
            $key = InterchapterSignupsTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = InterchapterSignupsTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var InterchapterSignups $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                InterchapterSignupsTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(InterchapterSignupsTableMap::COL_EVENT_ID);
            $criteria->addSelectColumn(InterchapterSignupsTableMap::COL_ID);
            $criteria->addSelectColumn(InterchapterSignupsTableMap::COL_NAME);
            $criteria->addSelectColumn(InterchapterSignupsTableMap::COL_CHAPTER);
            $criteria->addSelectColumn(InterchapterSignupsTableMap::COL_EMAIL);
            $criteria->addSelectColumn(InterchapterSignupsTableMap::COL_PHONE);
            $criteria->addSelectColumn(InterchapterSignupsTableMap::COL_DATE);
            $criteria->addSelectColumn(InterchapterSignupsTableMap::COL_SHIRT_SIZE);
            $criteria->addSelectColumn(InterchapterSignupsTableMap::COL_VEGETARIAN);
            $criteria->addSelectColumn(InterchapterSignupsTableMap::COL_HOUSING_NEEDED);
            $criteria->addSelectColumn(InterchapterSignupsTableMap::COL_DELETED);
        } else {
            $criteria->addSelectColumn($alias . '.event_id');
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.name');
            $criteria->addSelectColumn($alias . '.chapter');
            $criteria->addSelectColumn($alias . '.email');
            $criteria->addSelectColumn($alias . '.phone');
            $criteria->addSelectColumn($alias . '.date');
            $criteria->addSelectColumn($alias . '.shirt_size');
            $criteria->addSelectColumn($alias . '.vegetarian');
            $criteria->addSelectColumn($alias . '.housing_needed');
            $criteria->addSelectColumn($alias . '.deleted');
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
        return Propel::getServiceContainer()->getDatabaseMap(InterchapterSignupsTableMap::DATABASE_NAME)->getTable(InterchapterSignupsTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(InterchapterSignupsTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(InterchapterSignupsTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new InterchapterSignupsTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a InterchapterSignups or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or InterchapterSignups object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(InterchapterSignupsTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \InterchapterSignups) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(InterchapterSignupsTableMap::DATABASE_NAME);
            $criteria->add(InterchapterSignupsTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = InterchapterSignupsQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            InterchapterSignupsTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                InterchapterSignupsTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the interchapter_signups table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return InterchapterSignupsQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a InterchapterSignups or Criteria object.
     *
     * @param mixed               $criteria Criteria or InterchapterSignups object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(InterchapterSignupsTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from InterchapterSignups object
        }

        if ($criteria->containsKey(InterchapterSignupsTableMap::COL_ID) && $criteria->keyContainsValue(InterchapterSignupsTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.InterchapterSignupsTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = InterchapterSignupsQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // InterchapterSignupsTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
InterchapterSignupsTableMap::buildTableMap();
