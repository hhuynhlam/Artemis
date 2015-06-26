<?php

namespace Map;

use \ImportantDates;
use \ImportantDatesQuery;
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
 * This class defines the structure of the 'important_dates' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class ImportantDatesTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.ImportantDatesTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'aphio';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'important_dates';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\ImportantDates';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'ImportantDates';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 6;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 6;

    /**
     * the column name for the id field
     */
    const COL_ID = 'important_dates.id';

    /**
     * the column name for the date field
     */
    const COL_DATE = 'important_dates.date';

    /**
     * the column name for the title field
     */
    const COL_TITLE = 'important_dates.title';

    /**
     * the column name for the description field
     */
    const COL_DESCRIPTION = 'important_dates.description';

    /**
     * the column name for the posted_by field
     */
    const COL_POSTED_BY = 'important_dates.posted_by';

    /**
     * the column name for the permissions field
     */
    const COL_PERMISSIONS = 'important_dates.permissions';

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
        self::TYPE_PHPNAME       => array('Id', 'Date', 'Title', 'Description', 'PostedBy', 'Permissions', ),
        self::TYPE_CAMELNAME     => array('id', 'date', 'title', 'description', 'postedBy', 'permissions', ),
        self::TYPE_COLNAME       => array(ImportantDatesTableMap::COL_ID, ImportantDatesTableMap::COL_DATE, ImportantDatesTableMap::COL_TITLE, ImportantDatesTableMap::COL_DESCRIPTION, ImportantDatesTableMap::COL_POSTED_BY, ImportantDatesTableMap::COL_PERMISSIONS, ),
        self::TYPE_FIELDNAME     => array('id', 'date', 'title', 'description', 'posted_by', 'permissions', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'Date' => 1, 'Title' => 2, 'Description' => 3, 'PostedBy' => 4, 'Permissions' => 5, ),
        self::TYPE_CAMELNAME     => array('id' => 0, 'date' => 1, 'title' => 2, 'description' => 3, 'postedBy' => 4, 'permissions' => 5, ),
        self::TYPE_COLNAME       => array(ImportantDatesTableMap::COL_ID => 0, ImportantDatesTableMap::COL_DATE => 1, ImportantDatesTableMap::COL_TITLE => 2, ImportantDatesTableMap::COL_DESCRIPTION => 3, ImportantDatesTableMap::COL_POSTED_BY => 4, ImportantDatesTableMap::COL_PERMISSIONS => 5, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'date' => 1, 'title' => 2, 'description' => 3, 'posted_by' => 4, 'permissions' => 5, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, )
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
        $this->setName('important_dates');
        $this->setPhpName('ImportantDates');
        $this->setIdentifierQuoting(true);
        $this->setClassName('\\ImportantDates');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('date', 'Date', 'INTEGER', true, null, 0);
        $this->addColumn('title', 'Title', 'VARCHAR', true, 100, '');
        $this->addColumn('description', 'Description', 'LONGVARCHAR', false, null, null);
        $this->addColumn('posted_by', 'PostedBy', 'INTEGER', true, null, 0);
        $this->addColumn('permissions', 'Permissions', 'INTEGER', true, null, null);
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
        return $withPrefix ? ImportantDatesTableMap::CLASS_DEFAULT : ImportantDatesTableMap::OM_CLASS;
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
     * @return array           (ImportantDates object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = ImportantDatesTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = ImportantDatesTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + ImportantDatesTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = ImportantDatesTableMap::OM_CLASS;
            /** @var ImportantDates $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            ImportantDatesTableMap::addInstanceToPool($obj, $key);
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
            $key = ImportantDatesTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = ImportantDatesTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var ImportantDates $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                ImportantDatesTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(ImportantDatesTableMap::COL_ID);
            $criteria->addSelectColumn(ImportantDatesTableMap::COL_DATE);
            $criteria->addSelectColumn(ImportantDatesTableMap::COL_TITLE);
            $criteria->addSelectColumn(ImportantDatesTableMap::COL_DESCRIPTION);
            $criteria->addSelectColumn(ImportantDatesTableMap::COL_POSTED_BY);
            $criteria->addSelectColumn(ImportantDatesTableMap::COL_PERMISSIONS);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.date');
            $criteria->addSelectColumn($alias . '.title');
            $criteria->addSelectColumn($alias . '.description');
            $criteria->addSelectColumn($alias . '.posted_by');
            $criteria->addSelectColumn($alias . '.permissions');
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
        return Propel::getServiceContainer()->getDatabaseMap(ImportantDatesTableMap::DATABASE_NAME)->getTable(ImportantDatesTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(ImportantDatesTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(ImportantDatesTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new ImportantDatesTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a ImportantDates or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or ImportantDates object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(ImportantDatesTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \ImportantDates) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(ImportantDatesTableMap::DATABASE_NAME);
            $criteria->add(ImportantDatesTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = ImportantDatesQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            ImportantDatesTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                ImportantDatesTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the important_dates table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return ImportantDatesQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a ImportantDates or Criteria object.
     *
     * @param mixed               $criteria Criteria or ImportantDates object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ImportantDatesTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from ImportantDates object
        }

        if ($criteria->containsKey(ImportantDatesTableMap::COL_ID) && $criteria->keyContainsValue(ImportantDatesTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.ImportantDatesTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = ImportantDatesQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // ImportantDatesTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
ImportantDatesTableMap::buildTableMap();
