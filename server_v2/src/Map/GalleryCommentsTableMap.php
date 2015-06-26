<?php

namespace Map;

use \GalleryComments;
use \GalleryCommentsQuery;
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
 * This class defines the structure of the 'gallery_comments' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class GalleryCommentsTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.GalleryCommentsTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'aphio';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'gallery_comments';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\GalleryComments';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'GalleryComments';

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
     * the column name for the id field
     */
    const COL_ID = 'gallery_comments.id';

    /**
     * the column name for the image field
     */
    const COL_IMAGE = 'gallery_comments.image';

    /**
     * the column name for the posted_by field
     */
    const COL_POSTED_BY = 'gallery_comments.posted_by';

    /**
     * the column name for the time field
     */
    const COL_TIME = 'gallery_comments.time';

    /**
     * the column name for the comment field
     */
    const COL_COMMENT = 'gallery_comments.comment';

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
        self::TYPE_PHPNAME       => array('Id', 'Image', 'PostedBy', 'Time', 'Comment', ),
        self::TYPE_CAMELNAME     => array('id', 'image', 'postedBy', 'time', 'comment', ),
        self::TYPE_COLNAME       => array(GalleryCommentsTableMap::COL_ID, GalleryCommentsTableMap::COL_IMAGE, GalleryCommentsTableMap::COL_POSTED_BY, GalleryCommentsTableMap::COL_TIME, GalleryCommentsTableMap::COL_COMMENT, ),
        self::TYPE_FIELDNAME     => array('id', 'image', 'posted_by', 'time', 'comment', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'Image' => 1, 'PostedBy' => 2, 'Time' => 3, 'Comment' => 4, ),
        self::TYPE_CAMELNAME     => array('id' => 0, 'image' => 1, 'postedBy' => 2, 'time' => 3, 'comment' => 4, ),
        self::TYPE_COLNAME       => array(GalleryCommentsTableMap::COL_ID => 0, GalleryCommentsTableMap::COL_IMAGE => 1, GalleryCommentsTableMap::COL_POSTED_BY => 2, GalleryCommentsTableMap::COL_TIME => 3, GalleryCommentsTableMap::COL_COMMENT => 4, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'image' => 1, 'posted_by' => 2, 'time' => 3, 'comment' => 4, ),
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
        $this->setName('gallery_comments');
        $this->setPhpName('GalleryComments');
        $this->setIdentifierQuoting(true);
        $this->setClassName('\\GalleryComments');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, 10, null);
        $this->addColumn('image', 'Image', 'INTEGER', true, 10, 0);
        $this->addColumn('posted_by', 'PostedBy', 'INTEGER', true, 10, 0);
        $this->addColumn('time', 'Time', 'INTEGER', true, 10, 0);
        $this->addColumn('comment', 'Comment', 'VARCHAR', true, 200, '');
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
        return $withPrefix ? GalleryCommentsTableMap::CLASS_DEFAULT : GalleryCommentsTableMap::OM_CLASS;
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
     * @return array           (GalleryComments object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = GalleryCommentsTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = GalleryCommentsTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + GalleryCommentsTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = GalleryCommentsTableMap::OM_CLASS;
            /** @var GalleryComments $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            GalleryCommentsTableMap::addInstanceToPool($obj, $key);
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
            $key = GalleryCommentsTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = GalleryCommentsTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var GalleryComments $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                GalleryCommentsTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(GalleryCommentsTableMap::COL_ID);
            $criteria->addSelectColumn(GalleryCommentsTableMap::COL_IMAGE);
            $criteria->addSelectColumn(GalleryCommentsTableMap::COL_POSTED_BY);
            $criteria->addSelectColumn(GalleryCommentsTableMap::COL_TIME);
            $criteria->addSelectColumn(GalleryCommentsTableMap::COL_COMMENT);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.image');
            $criteria->addSelectColumn($alias . '.posted_by');
            $criteria->addSelectColumn($alias . '.time');
            $criteria->addSelectColumn($alias . '.comment');
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
        return Propel::getServiceContainer()->getDatabaseMap(GalleryCommentsTableMap::DATABASE_NAME)->getTable(GalleryCommentsTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(GalleryCommentsTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(GalleryCommentsTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new GalleryCommentsTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a GalleryComments or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or GalleryComments object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(GalleryCommentsTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \GalleryComments) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(GalleryCommentsTableMap::DATABASE_NAME);
            $criteria->add(GalleryCommentsTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = GalleryCommentsQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            GalleryCommentsTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                GalleryCommentsTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the gallery_comments table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return GalleryCommentsQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a GalleryComments or Criteria object.
     *
     * @param mixed               $criteria Criteria or GalleryComments object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(GalleryCommentsTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from GalleryComments object
        }

        if ($criteria->containsKey(GalleryCommentsTableMap::COL_ID) && $criteria->keyContainsValue(GalleryCommentsTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.GalleryCommentsTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = GalleryCommentsQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // GalleryCommentsTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
GalleryCommentsTableMap::buildTableMap();
