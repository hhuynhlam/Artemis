<?php

namespace Map;

use \ForumBbcode;
use \ForumBbcodeQuery;
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
 * This class defines the structure of the 'forum_bbcode' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class ForumBbcodeTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.ForumBbcodeTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'aphio';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'forum_bbcode';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\ForumBbcode';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'ForumBbcode';

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
    const COL_ID = 'forum_bbcode.id';

    /**
     * the column name for the name field
     */
    const COL_NAME = 'forum_bbcode.name';

    /**
     * the column name for the bbcode_expr field
     */
    const COL_BBCODE_EXPR = 'forum_bbcode.bbcode_expr';

    /**
     * the column name for the html_rep field
     */
    const COL_HTML_REP = 'forum_bbcode.html_rep';

    /**
     * the column name for the html_expr field
     */
    const COL_HTML_EXPR = 'forum_bbcode.html_expr';

    /**
     * the column name for the bbcode_rep field
     */
    const COL_BBCODE_REP = 'forum_bbcode.bbcode_rep';

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
        self::TYPE_PHPNAME       => array('Id', 'Name', 'BbcodeExpr', 'HtmlRep', 'HtmlExpr', 'BbcodeRep', ),
        self::TYPE_CAMELNAME     => array('id', 'name', 'bbcodeExpr', 'htmlRep', 'htmlExpr', 'bbcodeRep', ),
        self::TYPE_COLNAME       => array(ForumBbcodeTableMap::COL_ID, ForumBbcodeTableMap::COL_NAME, ForumBbcodeTableMap::COL_BBCODE_EXPR, ForumBbcodeTableMap::COL_HTML_REP, ForumBbcodeTableMap::COL_HTML_EXPR, ForumBbcodeTableMap::COL_BBCODE_REP, ),
        self::TYPE_FIELDNAME     => array('id', 'name', 'bbcode_expr', 'html_rep', 'html_expr', 'bbcode_rep', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'Name' => 1, 'BbcodeExpr' => 2, 'HtmlRep' => 3, 'HtmlExpr' => 4, 'BbcodeRep' => 5, ),
        self::TYPE_CAMELNAME     => array('id' => 0, 'name' => 1, 'bbcodeExpr' => 2, 'htmlRep' => 3, 'htmlExpr' => 4, 'bbcodeRep' => 5, ),
        self::TYPE_COLNAME       => array(ForumBbcodeTableMap::COL_ID => 0, ForumBbcodeTableMap::COL_NAME => 1, ForumBbcodeTableMap::COL_BBCODE_EXPR => 2, ForumBbcodeTableMap::COL_HTML_REP => 3, ForumBbcodeTableMap::COL_HTML_EXPR => 4, ForumBbcodeTableMap::COL_BBCODE_REP => 5, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'name' => 1, 'bbcode_expr' => 2, 'html_rep' => 3, 'html_expr' => 4, 'bbcode_rep' => 5, ),
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
        $this->setName('forum_bbcode');
        $this->setPhpName('ForumBbcode');
        $this->setIdentifierQuoting(true);
        $this->setClassName('\\ForumBbcode');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('name', 'Name', 'VARCHAR', true, 15, '');
        $this->addColumn('bbcode_expr', 'BbcodeExpr', 'VARCHAR', true, 200, '');
        $this->addColumn('html_rep', 'HtmlRep', 'VARCHAR', true, 200, '');
        $this->addColumn('html_expr', 'HtmlExpr', 'VARCHAR', true, 200, '');
        $this->addColumn('bbcode_rep', 'BbcodeRep', 'VARCHAR', true, 200, '');
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
        return $withPrefix ? ForumBbcodeTableMap::CLASS_DEFAULT : ForumBbcodeTableMap::OM_CLASS;
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
     * @return array           (ForumBbcode object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = ForumBbcodeTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = ForumBbcodeTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + ForumBbcodeTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = ForumBbcodeTableMap::OM_CLASS;
            /** @var ForumBbcode $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            ForumBbcodeTableMap::addInstanceToPool($obj, $key);
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
            $key = ForumBbcodeTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = ForumBbcodeTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var ForumBbcode $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                ForumBbcodeTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(ForumBbcodeTableMap::COL_ID);
            $criteria->addSelectColumn(ForumBbcodeTableMap::COL_NAME);
            $criteria->addSelectColumn(ForumBbcodeTableMap::COL_BBCODE_EXPR);
            $criteria->addSelectColumn(ForumBbcodeTableMap::COL_HTML_REP);
            $criteria->addSelectColumn(ForumBbcodeTableMap::COL_HTML_EXPR);
            $criteria->addSelectColumn(ForumBbcodeTableMap::COL_BBCODE_REP);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.name');
            $criteria->addSelectColumn($alias . '.bbcode_expr');
            $criteria->addSelectColumn($alias . '.html_rep');
            $criteria->addSelectColumn($alias . '.html_expr');
            $criteria->addSelectColumn($alias . '.bbcode_rep');
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
        return Propel::getServiceContainer()->getDatabaseMap(ForumBbcodeTableMap::DATABASE_NAME)->getTable(ForumBbcodeTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(ForumBbcodeTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(ForumBbcodeTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new ForumBbcodeTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a ForumBbcode or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or ForumBbcode object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(ForumBbcodeTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \ForumBbcode) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(ForumBbcodeTableMap::DATABASE_NAME);
            $criteria->add(ForumBbcodeTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = ForumBbcodeQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            ForumBbcodeTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                ForumBbcodeTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the forum_bbcode table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return ForumBbcodeQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a ForumBbcode or Criteria object.
     *
     * @param mixed               $criteria Criteria or ForumBbcode object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ForumBbcodeTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from ForumBbcode object
        }

        if ($criteria->containsKey(ForumBbcodeTableMap::COL_ID) && $criteria->keyContainsValue(ForumBbcodeTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.ForumBbcodeTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = ForumBbcodeQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // ForumBbcodeTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
ForumBbcodeTableMap::buildTableMap();
