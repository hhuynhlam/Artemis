<?php

namespace Map;

use \Polls;
use \PollsQuery;
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
 * This class defines the structure of the 'polls' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class PollsTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.PollsTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'aphio';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'polls';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Polls';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'Polls';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 10;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 10;

    /**
     * the column name for the id field
     */
    const COL_ID = 'polls.id';

    /**
     * the column name for the category field
     */
    const COL_CATEGORY = 'polls.category';

    /**
     * the column name for the title field
     */
    const COL_TITLE = 'polls.title';

    /**
     * the column name for the open_date field
     */
    const COL_OPEN_DATE = 'polls.open_date';

    /**
     * the column name for the close_date field
     */
    const COL_CLOSE_DATE = 'polls.close_date';

    /**
     * the column name for the option_group field
     */
    const COL_OPTION_GROUP = 'polls.option_group';

    /**
     * the column name for the max_votes field
     */
    const COL_MAX_VOTES = 'polls.max_votes';

    /**
     * the column name for the description field
     */
    const COL_DESCRIPTION = 'polls.description';

    /**
     * the column name for the term field
     */
    const COL_TERM = 'polls.term';

    /**
     * the column name for the winner field
     */
    const COL_WINNER = 'polls.winner';

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
        self::TYPE_PHPNAME       => array('Id', 'Category', 'Title', 'OpenDate', 'CloseDate', 'OptionGroup', 'MaxVotes', 'Description', 'Term', 'Winner', ),
        self::TYPE_CAMELNAME     => array('id', 'category', 'title', 'openDate', 'closeDate', 'optionGroup', 'maxVotes', 'description', 'term', 'winner', ),
        self::TYPE_COLNAME       => array(PollsTableMap::COL_ID, PollsTableMap::COL_CATEGORY, PollsTableMap::COL_TITLE, PollsTableMap::COL_OPEN_DATE, PollsTableMap::COL_CLOSE_DATE, PollsTableMap::COL_OPTION_GROUP, PollsTableMap::COL_MAX_VOTES, PollsTableMap::COL_DESCRIPTION, PollsTableMap::COL_TERM, PollsTableMap::COL_WINNER, ),
        self::TYPE_FIELDNAME     => array('id', 'category', 'title', 'open_date', 'close_date', 'option_group', 'max_votes', 'description', 'term', 'winner', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'Category' => 1, 'Title' => 2, 'OpenDate' => 3, 'CloseDate' => 4, 'OptionGroup' => 5, 'MaxVotes' => 6, 'Description' => 7, 'Term' => 8, 'Winner' => 9, ),
        self::TYPE_CAMELNAME     => array('id' => 0, 'category' => 1, 'title' => 2, 'openDate' => 3, 'closeDate' => 4, 'optionGroup' => 5, 'maxVotes' => 6, 'description' => 7, 'term' => 8, 'winner' => 9, ),
        self::TYPE_COLNAME       => array(PollsTableMap::COL_ID => 0, PollsTableMap::COL_CATEGORY => 1, PollsTableMap::COL_TITLE => 2, PollsTableMap::COL_OPEN_DATE => 3, PollsTableMap::COL_CLOSE_DATE => 4, PollsTableMap::COL_OPTION_GROUP => 5, PollsTableMap::COL_MAX_VOTES => 6, PollsTableMap::COL_DESCRIPTION => 7, PollsTableMap::COL_TERM => 8, PollsTableMap::COL_WINNER => 9, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'category' => 1, 'title' => 2, 'open_date' => 3, 'close_date' => 4, 'option_group' => 5, 'max_votes' => 6, 'description' => 7, 'term' => 8, 'winner' => 9, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
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
        $this->setName('polls');
        $this->setPhpName('Polls');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Polls');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('category', 'Category', 'INTEGER', false, null, null);
        $this->addColumn('title', 'Title', 'VARCHAR', true, 200, null);
        $this->addColumn('open_date', 'OpenDate', 'BIGINT', true, null, null);
        $this->addColumn('close_date', 'CloseDate', 'BIGINT', true, null, null);
        $this->addColumn('option_group', 'OptionGroup', 'INTEGER', false, null, null);
        $this->addColumn('max_votes', 'MaxVotes', 'INTEGER', true, null, 1);
        $this->addColumn('description', 'Description', 'LONGVARCHAR', true, null, null);
        $this->addColumn('term', 'Term', 'INTEGER', true, null, null);
        $this->addColumn('winner', 'Winner', 'VARCHAR', false, 255, null);
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
        return $withPrefix ? PollsTableMap::CLASS_DEFAULT : PollsTableMap::OM_CLASS;
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
     * @return array           (Polls object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = PollsTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = PollsTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + PollsTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = PollsTableMap::OM_CLASS;
            /** @var Polls $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            PollsTableMap::addInstanceToPool($obj, $key);
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
            $key = PollsTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = PollsTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Polls $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                PollsTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(PollsTableMap::COL_ID);
            $criteria->addSelectColumn(PollsTableMap::COL_CATEGORY);
            $criteria->addSelectColumn(PollsTableMap::COL_TITLE);
            $criteria->addSelectColumn(PollsTableMap::COL_OPEN_DATE);
            $criteria->addSelectColumn(PollsTableMap::COL_CLOSE_DATE);
            $criteria->addSelectColumn(PollsTableMap::COL_OPTION_GROUP);
            $criteria->addSelectColumn(PollsTableMap::COL_MAX_VOTES);
            $criteria->addSelectColumn(PollsTableMap::COL_DESCRIPTION);
            $criteria->addSelectColumn(PollsTableMap::COL_TERM);
            $criteria->addSelectColumn(PollsTableMap::COL_WINNER);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.category');
            $criteria->addSelectColumn($alias . '.title');
            $criteria->addSelectColumn($alias . '.open_date');
            $criteria->addSelectColumn($alias . '.close_date');
            $criteria->addSelectColumn($alias . '.option_group');
            $criteria->addSelectColumn($alias . '.max_votes');
            $criteria->addSelectColumn($alias . '.description');
            $criteria->addSelectColumn($alias . '.term');
            $criteria->addSelectColumn($alias . '.winner');
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
        return Propel::getServiceContainer()->getDatabaseMap(PollsTableMap::DATABASE_NAME)->getTable(PollsTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(PollsTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(PollsTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new PollsTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a Polls or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Polls object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(PollsTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Polls) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(PollsTableMap::DATABASE_NAME);
            $criteria->add(PollsTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = PollsQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            PollsTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                PollsTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the polls table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return PollsQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Polls or Criteria object.
     *
     * @param mixed               $criteria Criteria or Polls object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(PollsTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Polls object
        }

        if ($criteria->containsKey(PollsTableMap::COL_ID) && $criteria->keyContainsValue(PollsTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.PollsTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = PollsQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // PollsTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
PollsTableMap::buildTableMap();
