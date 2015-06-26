<?php

namespace Map;

use \FeedmeBox;
use \FeedmeBoxQuery;
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
 * This class defines the structure of the 'feedme_box' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class FeedmeBoxTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.FeedmeBoxTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'aphio';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'feedme_box';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\FeedmeBox';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'FeedmeBox';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 8;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 8;

    /**
     * the column name for the id field
     */
    const COL_ID = 'feedme_box.id';

    /**
     * the column name for the topic field
     */
    const COL_TOPIC = 'feedme_box.topic';

    /**
     * the column name for the date field
     */
    const COL_DATE = 'feedme_box.date';

    /**
     * the column name for the message field
     */
    const COL_MESSAGE = 'feedme_box.message';

    /**
     * the column name for the type field
     */
    const COL_TYPE = 'feedme_box.type';

    /**
     * the column name for the read_by field
     */
    const COL_READ_BY = 'feedme_box.read_by';

    /**
     * the column name for the released_by field
     */
    const COL_RELEASED_BY = 'feedme_box.released_by';

    /**
     * the column name for the reply field
     */
    const COL_REPLY = 'feedme_box.reply';

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
        self::TYPE_PHPNAME       => array('Id', 'Topic', 'Date', 'Message', 'Type', 'ReadBy', 'ReleasedBy', 'Reply', ),
        self::TYPE_CAMELNAME     => array('id', 'topic', 'date', 'message', 'type', 'readBy', 'releasedBy', 'reply', ),
        self::TYPE_COLNAME       => array(FeedmeBoxTableMap::COL_ID, FeedmeBoxTableMap::COL_TOPIC, FeedmeBoxTableMap::COL_DATE, FeedmeBoxTableMap::COL_MESSAGE, FeedmeBoxTableMap::COL_TYPE, FeedmeBoxTableMap::COL_READ_BY, FeedmeBoxTableMap::COL_RELEASED_BY, FeedmeBoxTableMap::COL_REPLY, ),
        self::TYPE_FIELDNAME     => array('id', 'topic', 'date', 'message', 'type', 'read_by', 'released_by', 'reply', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'Topic' => 1, 'Date' => 2, 'Message' => 3, 'Type' => 4, 'ReadBy' => 5, 'ReleasedBy' => 6, 'Reply' => 7, ),
        self::TYPE_CAMELNAME     => array('id' => 0, 'topic' => 1, 'date' => 2, 'message' => 3, 'type' => 4, 'readBy' => 5, 'releasedBy' => 6, 'reply' => 7, ),
        self::TYPE_COLNAME       => array(FeedmeBoxTableMap::COL_ID => 0, FeedmeBoxTableMap::COL_TOPIC => 1, FeedmeBoxTableMap::COL_DATE => 2, FeedmeBoxTableMap::COL_MESSAGE => 3, FeedmeBoxTableMap::COL_TYPE => 4, FeedmeBoxTableMap::COL_READ_BY => 5, FeedmeBoxTableMap::COL_RELEASED_BY => 6, FeedmeBoxTableMap::COL_REPLY => 7, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'topic' => 1, 'date' => 2, 'message' => 3, 'type' => 4, 'read_by' => 5, 'released_by' => 6, 'reply' => 7, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, )
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
        $this->setName('feedme_box');
        $this->setPhpName('FeedmeBox');
        $this->setIdentifierQuoting(true);
        $this->setClassName('\\FeedmeBox');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, 10, null);
        $this->addColumn('topic', 'Topic', 'VARCHAR', true, 255, null);
        $this->addColumn('date', 'Date', 'INTEGER', true, 10, 0);
        $this->addColumn('message', 'Message', 'LONGVARCHAR', false, null, null);
        $this->addColumn('type', 'Type', 'CHAR', false, null, '');
        $this->addColumn('read_by', 'ReadBy', 'VARCHAR', false, 255, null);
        $this->addColumn('released_by', 'ReleasedBy', 'INTEGER', false, 10, 0);
        $this->addColumn('reply', 'Reply', 'LONGVARCHAR', false, null, null);
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
        return $withPrefix ? FeedmeBoxTableMap::CLASS_DEFAULT : FeedmeBoxTableMap::OM_CLASS;
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
     * @return array           (FeedmeBox object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = FeedmeBoxTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = FeedmeBoxTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + FeedmeBoxTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = FeedmeBoxTableMap::OM_CLASS;
            /** @var FeedmeBox $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            FeedmeBoxTableMap::addInstanceToPool($obj, $key);
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
            $key = FeedmeBoxTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = FeedmeBoxTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var FeedmeBox $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                FeedmeBoxTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(FeedmeBoxTableMap::COL_ID);
            $criteria->addSelectColumn(FeedmeBoxTableMap::COL_TOPIC);
            $criteria->addSelectColumn(FeedmeBoxTableMap::COL_DATE);
            $criteria->addSelectColumn(FeedmeBoxTableMap::COL_MESSAGE);
            $criteria->addSelectColumn(FeedmeBoxTableMap::COL_TYPE);
            $criteria->addSelectColumn(FeedmeBoxTableMap::COL_READ_BY);
            $criteria->addSelectColumn(FeedmeBoxTableMap::COL_RELEASED_BY);
            $criteria->addSelectColumn(FeedmeBoxTableMap::COL_REPLY);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.topic');
            $criteria->addSelectColumn($alias . '.date');
            $criteria->addSelectColumn($alias . '.message');
            $criteria->addSelectColumn($alias . '.type');
            $criteria->addSelectColumn($alias . '.read_by');
            $criteria->addSelectColumn($alias . '.released_by');
            $criteria->addSelectColumn($alias . '.reply');
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
        return Propel::getServiceContainer()->getDatabaseMap(FeedmeBoxTableMap::DATABASE_NAME)->getTable(FeedmeBoxTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(FeedmeBoxTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(FeedmeBoxTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new FeedmeBoxTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a FeedmeBox or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or FeedmeBox object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(FeedmeBoxTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \FeedmeBox) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(FeedmeBoxTableMap::DATABASE_NAME);
            $criteria->add(FeedmeBoxTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = FeedmeBoxQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            FeedmeBoxTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                FeedmeBoxTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the feedme_box table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return FeedmeBoxQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a FeedmeBox or Criteria object.
     *
     * @param mixed               $criteria Criteria or FeedmeBox object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(FeedmeBoxTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from FeedmeBox object
        }

        if ($criteria->containsKey(FeedmeBoxTableMap::COL_ID) && $criteria->keyContainsValue(FeedmeBoxTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.FeedmeBoxTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = FeedmeBoxQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // FeedmeBoxTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
FeedmeBoxTableMap::buildTableMap();