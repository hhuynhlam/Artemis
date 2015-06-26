<?php

namespace Map;

use \FinanceTransactions;
use \FinanceTransactionsQuery;
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
 * This class defines the structure of the 'finance_transactions' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class FinanceTransactionsTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.FinanceTransactionsTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'aphio';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'finance_transactions';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\FinanceTransactions';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'FinanceTransactions';

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
     * the column name for the id field
     */
    const COL_ID = 'finance_transactions.id';

    /**
     * the column name for the amount field
     */
    const COL_AMOUNT = 'finance_transactions.amount';

    /**
     * the column name for the account field
     */
    const COL_ACCOUNT = 'finance_transactions.account';

    /**
     * the column name for the entered_by field
     */
    const COL_ENTERED_BY = 'finance_transactions.entered_by';

    /**
     * the column name for the item field
     */
    const COL_ITEM = 'finance_transactions.item';

    /**
     * the column name for the status field
     */
    const COL_STATUS = 'finance_transactions.status';

    /**
     * the column name for the type field
     */
    const COL_TYPE = 'finance_transactions.type';

    /**
     * the column name for the src_dst field
     */
    const COL_SRC_DST = 'finance_transactions.src_dst';

    /**
     * the column name for the notes field
     */
    const COL_NOTES = 'finance_transactions.notes';

    /**
     * the column name for the request_date field
     */
    const COL_REQUEST_DATE = 'finance_transactions.request_date';

    /**
     * the column name for the complete_date field
     */
    const COL_COMPLETE_DATE = 'finance_transactions.complete_date';

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
        self::TYPE_PHPNAME       => array('Id', 'Amount', 'Account', 'EnteredBy', 'Item', 'Status', 'Type', 'SrcDst', 'Notes', 'RequestDate', 'CompleteDate', ),
        self::TYPE_CAMELNAME     => array('id', 'amount', 'account', 'enteredBy', 'item', 'status', 'type', 'srcDst', 'notes', 'requestDate', 'completeDate', ),
        self::TYPE_COLNAME       => array(FinanceTransactionsTableMap::COL_ID, FinanceTransactionsTableMap::COL_AMOUNT, FinanceTransactionsTableMap::COL_ACCOUNT, FinanceTransactionsTableMap::COL_ENTERED_BY, FinanceTransactionsTableMap::COL_ITEM, FinanceTransactionsTableMap::COL_STATUS, FinanceTransactionsTableMap::COL_TYPE, FinanceTransactionsTableMap::COL_SRC_DST, FinanceTransactionsTableMap::COL_NOTES, FinanceTransactionsTableMap::COL_REQUEST_DATE, FinanceTransactionsTableMap::COL_COMPLETE_DATE, ),
        self::TYPE_FIELDNAME     => array('id', 'amount', 'account', 'entered_by', 'item', 'status', 'type', 'src_dst', 'notes', 'request_date', 'complete_date', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'Amount' => 1, 'Account' => 2, 'EnteredBy' => 3, 'Item' => 4, 'Status' => 5, 'Type' => 6, 'SrcDst' => 7, 'Notes' => 8, 'RequestDate' => 9, 'CompleteDate' => 10, ),
        self::TYPE_CAMELNAME     => array('id' => 0, 'amount' => 1, 'account' => 2, 'enteredBy' => 3, 'item' => 4, 'status' => 5, 'type' => 6, 'srcDst' => 7, 'notes' => 8, 'requestDate' => 9, 'completeDate' => 10, ),
        self::TYPE_COLNAME       => array(FinanceTransactionsTableMap::COL_ID => 0, FinanceTransactionsTableMap::COL_AMOUNT => 1, FinanceTransactionsTableMap::COL_ACCOUNT => 2, FinanceTransactionsTableMap::COL_ENTERED_BY => 3, FinanceTransactionsTableMap::COL_ITEM => 4, FinanceTransactionsTableMap::COL_STATUS => 5, FinanceTransactionsTableMap::COL_TYPE => 6, FinanceTransactionsTableMap::COL_SRC_DST => 7, FinanceTransactionsTableMap::COL_NOTES => 8, FinanceTransactionsTableMap::COL_REQUEST_DATE => 9, FinanceTransactionsTableMap::COL_COMPLETE_DATE => 10, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'amount' => 1, 'account' => 2, 'entered_by' => 3, 'item' => 4, 'status' => 5, 'type' => 6, 'src_dst' => 7, 'notes' => 8, 'request_date' => 9, 'complete_date' => 10, ),
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
        $this->setName('finance_transactions');
        $this->setPhpName('FinanceTransactions');
        $this->setIdentifierQuoting(true);
        $this->setClassName('\\FinanceTransactions');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('amount', 'Amount', 'FLOAT', true, null, 0);
        $this->addColumn('account', 'Account', 'INTEGER', true, null, 0);
        $this->addColumn('entered_by', 'EnteredBy', 'VARCHAR', true, 30, '');
        $this->addColumn('item', 'Item', 'INTEGER', true, null, 0);
        $this->addColumn('status', 'Status', 'TINYINT', true, 2, 0);
        $this->addColumn('type', 'Type', 'SMALLINT', true, 2, 0);
        $this->addColumn('src_dst', 'SrcDst', 'VARCHAR', true, 30, '');
        $this->addColumn('notes', 'Notes', 'VARCHAR', true, 200, '');
        $this->addColumn('request_date', 'RequestDate', 'INTEGER', true, null, 0);
        $this->addColumn('complete_date', 'CompleteDate', 'INTEGER', true, null, 0);
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
        return $withPrefix ? FinanceTransactionsTableMap::CLASS_DEFAULT : FinanceTransactionsTableMap::OM_CLASS;
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
     * @return array           (FinanceTransactions object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = FinanceTransactionsTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = FinanceTransactionsTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + FinanceTransactionsTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = FinanceTransactionsTableMap::OM_CLASS;
            /** @var FinanceTransactions $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            FinanceTransactionsTableMap::addInstanceToPool($obj, $key);
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
            $key = FinanceTransactionsTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = FinanceTransactionsTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var FinanceTransactions $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                FinanceTransactionsTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(FinanceTransactionsTableMap::COL_ID);
            $criteria->addSelectColumn(FinanceTransactionsTableMap::COL_AMOUNT);
            $criteria->addSelectColumn(FinanceTransactionsTableMap::COL_ACCOUNT);
            $criteria->addSelectColumn(FinanceTransactionsTableMap::COL_ENTERED_BY);
            $criteria->addSelectColumn(FinanceTransactionsTableMap::COL_ITEM);
            $criteria->addSelectColumn(FinanceTransactionsTableMap::COL_STATUS);
            $criteria->addSelectColumn(FinanceTransactionsTableMap::COL_TYPE);
            $criteria->addSelectColumn(FinanceTransactionsTableMap::COL_SRC_DST);
            $criteria->addSelectColumn(FinanceTransactionsTableMap::COL_NOTES);
            $criteria->addSelectColumn(FinanceTransactionsTableMap::COL_REQUEST_DATE);
            $criteria->addSelectColumn(FinanceTransactionsTableMap::COL_COMPLETE_DATE);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.amount');
            $criteria->addSelectColumn($alias . '.account');
            $criteria->addSelectColumn($alias . '.entered_by');
            $criteria->addSelectColumn($alias . '.item');
            $criteria->addSelectColumn($alias . '.status');
            $criteria->addSelectColumn($alias . '.type');
            $criteria->addSelectColumn($alias . '.src_dst');
            $criteria->addSelectColumn($alias . '.notes');
            $criteria->addSelectColumn($alias . '.request_date');
            $criteria->addSelectColumn($alias . '.complete_date');
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
        return Propel::getServiceContainer()->getDatabaseMap(FinanceTransactionsTableMap::DATABASE_NAME)->getTable(FinanceTransactionsTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(FinanceTransactionsTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(FinanceTransactionsTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new FinanceTransactionsTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a FinanceTransactions or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or FinanceTransactions object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(FinanceTransactionsTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \FinanceTransactions) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(FinanceTransactionsTableMap::DATABASE_NAME);
            $criteria->add(FinanceTransactionsTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = FinanceTransactionsQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            FinanceTransactionsTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                FinanceTransactionsTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the finance_transactions table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return FinanceTransactionsQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a FinanceTransactions or Criteria object.
     *
     * @param mixed               $criteria Criteria or FinanceTransactions object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(FinanceTransactionsTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from FinanceTransactions object
        }

        if ($criteria->containsKey(FinanceTransactionsTableMap::COL_ID) && $criteria->keyContainsValue(FinanceTransactionsTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.FinanceTransactionsTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = FinanceTransactionsQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // FinanceTransactionsTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
FinanceTransactionsTableMap::buildTableMap();
