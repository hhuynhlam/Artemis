<?php

namespace Map;

use \ChatLogs;
use \ChatLogsQuery;
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
 * This class defines the structure of the 'chat_logs' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class ChatLogsTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.ChatLogsTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'aphio';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'chat_logs';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\ChatLogs';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'ChatLogs';

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
    const COL_ID = 'chat_logs.id';

    /**
     * the column name for the start_time field
     */
    const COL_START_TIME = 'chat_logs.start_time';

    /**
     * the column name for the term field
     */
    const COL_TERM = 'chat_logs.term';

    /**
     * the column name for the title field
     */
    const COL_TITLE = 'chat_logs.title';

    /**
     * the column name for the description field
     */
    const COL_DESCRIPTION = 'chat_logs.description';

    /**
     * the column name for the log_location field
     */
    const COL_LOG_LOCATION = 'chat_logs.log_location';

    /**
     * the column name for the status field
     */
    const COL_STATUS = 'chat_logs.status';

    /**
     * the column name for the restricted field
     */
    const COL_RESTRICTED = 'chat_logs.restricted';

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
        self::TYPE_PHPNAME       => array('Id', 'StartTime', 'Term', 'Title', 'Description', 'LogLocation', 'Status', 'Restricted', ),
        self::TYPE_CAMELNAME     => array('id', 'startTime', 'term', 'title', 'description', 'logLocation', 'status', 'restricted', ),
        self::TYPE_COLNAME       => array(ChatLogsTableMap::COL_ID, ChatLogsTableMap::COL_START_TIME, ChatLogsTableMap::COL_TERM, ChatLogsTableMap::COL_TITLE, ChatLogsTableMap::COL_DESCRIPTION, ChatLogsTableMap::COL_LOG_LOCATION, ChatLogsTableMap::COL_STATUS, ChatLogsTableMap::COL_RESTRICTED, ),
        self::TYPE_FIELDNAME     => array('id', 'start_time', 'term', 'title', 'description', 'log_location', 'status', 'restricted', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'StartTime' => 1, 'Term' => 2, 'Title' => 3, 'Description' => 4, 'LogLocation' => 5, 'Status' => 6, 'Restricted' => 7, ),
        self::TYPE_CAMELNAME     => array('id' => 0, 'startTime' => 1, 'term' => 2, 'title' => 3, 'description' => 4, 'logLocation' => 5, 'status' => 6, 'restricted' => 7, ),
        self::TYPE_COLNAME       => array(ChatLogsTableMap::COL_ID => 0, ChatLogsTableMap::COL_START_TIME => 1, ChatLogsTableMap::COL_TERM => 2, ChatLogsTableMap::COL_TITLE => 3, ChatLogsTableMap::COL_DESCRIPTION => 4, ChatLogsTableMap::COL_LOG_LOCATION => 5, ChatLogsTableMap::COL_STATUS => 6, ChatLogsTableMap::COL_RESTRICTED => 7, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'start_time' => 1, 'term' => 2, 'title' => 3, 'description' => 4, 'log_location' => 5, 'status' => 6, 'restricted' => 7, ),
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
        $this->setName('chat_logs');
        $this->setPhpName('ChatLogs');
        $this->setIdentifierQuoting(true);
        $this->setClassName('\\ChatLogs');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('start_time', 'StartTime', 'BIGINT', true, null, 0);
        $this->addColumn('term', 'Term', 'INTEGER', true, null, 0);
        $this->addColumn('title', 'Title', 'VARCHAR', true, 50, '');
        $this->addColumn('description', 'Description', 'VARCHAR', true, 200, '');
        $this->addColumn('log_location', 'LogLocation', 'VARCHAR', true, 100, '');
        $this->addColumn('status', 'Status', 'BOOLEAN', true, 1, false);
        $this->addColumn('restricted', 'Restricted', 'LONGVARCHAR', true, null, null);
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
        return $withPrefix ? ChatLogsTableMap::CLASS_DEFAULT : ChatLogsTableMap::OM_CLASS;
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
     * @return array           (ChatLogs object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = ChatLogsTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = ChatLogsTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + ChatLogsTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = ChatLogsTableMap::OM_CLASS;
            /** @var ChatLogs $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            ChatLogsTableMap::addInstanceToPool($obj, $key);
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
            $key = ChatLogsTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = ChatLogsTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var ChatLogs $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                ChatLogsTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(ChatLogsTableMap::COL_ID);
            $criteria->addSelectColumn(ChatLogsTableMap::COL_START_TIME);
            $criteria->addSelectColumn(ChatLogsTableMap::COL_TERM);
            $criteria->addSelectColumn(ChatLogsTableMap::COL_TITLE);
            $criteria->addSelectColumn(ChatLogsTableMap::COL_DESCRIPTION);
            $criteria->addSelectColumn(ChatLogsTableMap::COL_LOG_LOCATION);
            $criteria->addSelectColumn(ChatLogsTableMap::COL_STATUS);
            $criteria->addSelectColumn(ChatLogsTableMap::COL_RESTRICTED);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.start_time');
            $criteria->addSelectColumn($alias . '.term');
            $criteria->addSelectColumn($alias . '.title');
            $criteria->addSelectColumn($alias . '.description');
            $criteria->addSelectColumn($alias . '.log_location');
            $criteria->addSelectColumn($alias . '.status');
            $criteria->addSelectColumn($alias . '.restricted');
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
        return Propel::getServiceContainer()->getDatabaseMap(ChatLogsTableMap::DATABASE_NAME)->getTable(ChatLogsTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(ChatLogsTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(ChatLogsTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new ChatLogsTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a ChatLogs or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or ChatLogs object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(ChatLogsTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \ChatLogs) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(ChatLogsTableMap::DATABASE_NAME);
            $criteria->add(ChatLogsTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = ChatLogsQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            ChatLogsTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                ChatLogsTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the chat_logs table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return ChatLogsQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a ChatLogs or Criteria object.
     *
     * @param mixed               $criteria Criteria or ChatLogs object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ChatLogsTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from ChatLogs object
        }

        if ($criteria->containsKey(ChatLogsTableMap::COL_ID) && $criteria->keyContainsValue(ChatLogsTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.ChatLogsTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = ChatLogsQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // ChatLogsTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
ChatLogsTableMap::buildTableMap();
