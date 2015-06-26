<?php

namespace Map;

use \Members;
use \MembersQuery;
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
 * This class defines the structure of the 'members' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class MembersTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.MembersTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'aphio';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'members';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Members';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'Members';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 26;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 26;

    /**
     * the column name for the id field
     */
    const COL_ID = 'members.id';

    /**
     * the column name for the first_name field
     */
    const COL_FIRST_NAME = 'members.first_name';

    /**
     * the column name for the middle_name field
     */
    const COL_MIDDLE_NAME = 'members.middle_name';

    /**
     * the column name for the last_name field
     */
    const COL_LAST_NAME = 'members.last_name';

    /**
     * the column name for the position field
     */
    const COL_POSITION = 'members.position';

    /**
     * the column name for the mail_list field
     */
    const COL_MAIL_LIST = 'members.mail_list';

    /**
     * the column name for the email field
     */
    const COL_EMAIL = 'members.email';

    /**
     * the column name for the aim field
     */
    const COL_AIM = 'members.aim';

    /**
     * the column name for the website field
     */
    const COL_WEBSITE = 'members.website';

    /**
     * the column name for the phone field
     */
    const COL_PHONE = 'members.phone';

    /**
     * the column name for the perm_address field
     */
    const COL_PERM_ADDRESS = 'members.perm_address';

    /**
     * the column name for the temp_address field
     */
    const COL_TEMP_ADDRESS = 'members.temp_address';

    /**
     * the column name for the avatar field
     */
    const COL_AVATAR = 'members.avatar';

    /**
     * the column name for the signature field
     */
    const COL_SIGNATURE = 'members.signature';

    /**
     * the column name for the class field
     */
    const COL_CLASS = 'members.class';

    /**
     * the column name for the username field
     */
    const COL_USERNAME = 'members.username';

    /**
     * the column name for the password field
     */
    const COL_PASSWORD = 'members.password';

    /**
     * the column name for the family field
     */
    const COL_FAMILY = 'members.family';

    /**
     * the column name for the birthday field
     */
    const COL_BIRTHDAY = 'members.birthday';

    /**
     * the column name for the shirt_size field
     */
    const COL_SHIRT_SIZE = 'members.shirt_size';

    /**
     * the column name for the total_service field
     */
    const COL_TOTAL_SERVICE = 'members.total_service';

    /**
     * the column name for the total_fellowship field
     */
    const COL_TOTAL_FELLOWSHIP = 'members.total_fellowship';

    /**
     * the column name for the notes field
     */
    const COL_NOTES = 'members.notes';

    /**
     * the column name for the fees_owed field
     */
    const COL_FEES_OWED = 'members.fees_owed';

    /**
     * the column name for the email_list field
     */
    const COL_EMAIL_LIST = 'members.email_list';

    /**
     * the column name for the reminder field
     */
    const COL_REMINDER = 'members.reminder';

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
        self::TYPE_PHPNAME       => array('Id', 'FirstName', 'MiddleName', 'LastName', 'Position', 'MailList', 'Email', 'Aim', 'Website', 'Phone', 'PermAddress', 'TempAddress', 'Avatar', 'Signature', 'Class', 'Username', 'Password', 'Family', 'Birthday', 'ShirtSize', 'TotalService', 'TotalFellowship', 'Notes', 'FeesOwed', 'EmailList', 'Reminder', ),
        self::TYPE_CAMELNAME     => array('id', 'firstName', 'middleName', 'lastName', 'position', 'mailList', 'email', 'aim', 'website', 'phone', 'permAddress', 'tempAddress', 'avatar', 'signature', 'class', 'username', 'password', 'family', 'birthday', 'shirtSize', 'totalService', 'totalFellowship', 'notes', 'feesOwed', 'emailList', 'reminder', ),
        self::TYPE_COLNAME       => array(MembersTableMap::COL_ID, MembersTableMap::COL_FIRST_NAME, MembersTableMap::COL_MIDDLE_NAME, MembersTableMap::COL_LAST_NAME, MembersTableMap::COL_POSITION, MembersTableMap::COL_MAIL_LIST, MembersTableMap::COL_EMAIL, MembersTableMap::COL_AIM, MembersTableMap::COL_WEBSITE, MembersTableMap::COL_PHONE, MembersTableMap::COL_PERM_ADDRESS, MembersTableMap::COL_TEMP_ADDRESS, MembersTableMap::COL_AVATAR, MembersTableMap::COL_SIGNATURE, MembersTableMap::COL_CLASS, MembersTableMap::COL_USERNAME, MembersTableMap::COL_PASSWORD, MembersTableMap::COL_FAMILY, MembersTableMap::COL_BIRTHDAY, MembersTableMap::COL_SHIRT_SIZE, MembersTableMap::COL_TOTAL_SERVICE, MembersTableMap::COL_TOTAL_FELLOWSHIP, MembersTableMap::COL_NOTES, MembersTableMap::COL_FEES_OWED, MembersTableMap::COL_EMAIL_LIST, MembersTableMap::COL_REMINDER, ),
        self::TYPE_FIELDNAME     => array('id', 'first_name', 'middle_name', 'last_name', 'position', 'mail_list', 'email', 'aim', 'website', 'phone', 'perm_address', 'temp_address', 'avatar', 'signature', 'class', 'username', 'password', 'family', 'birthday', 'shirt_size', 'total_service', 'total_fellowship', 'notes', 'fees_owed', 'email_list', 'reminder', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'FirstName' => 1, 'MiddleName' => 2, 'LastName' => 3, 'Position' => 4, 'MailList' => 5, 'Email' => 6, 'Aim' => 7, 'Website' => 8, 'Phone' => 9, 'PermAddress' => 10, 'TempAddress' => 11, 'Avatar' => 12, 'Signature' => 13, 'Class' => 14, 'Username' => 15, 'Password' => 16, 'Family' => 17, 'Birthday' => 18, 'ShirtSize' => 19, 'TotalService' => 20, 'TotalFellowship' => 21, 'Notes' => 22, 'FeesOwed' => 23, 'EmailList' => 24, 'Reminder' => 25, ),
        self::TYPE_CAMELNAME     => array('id' => 0, 'firstName' => 1, 'middleName' => 2, 'lastName' => 3, 'position' => 4, 'mailList' => 5, 'email' => 6, 'aim' => 7, 'website' => 8, 'phone' => 9, 'permAddress' => 10, 'tempAddress' => 11, 'avatar' => 12, 'signature' => 13, 'class' => 14, 'username' => 15, 'password' => 16, 'family' => 17, 'birthday' => 18, 'shirtSize' => 19, 'totalService' => 20, 'totalFellowship' => 21, 'notes' => 22, 'feesOwed' => 23, 'emailList' => 24, 'reminder' => 25, ),
        self::TYPE_COLNAME       => array(MembersTableMap::COL_ID => 0, MembersTableMap::COL_FIRST_NAME => 1, MembersTableMap::COL_MIDDLE_NAME => 2, MembersTableMap::COL_LAST_NAME => 3, MembersTableMap::COL_POSITION => 4, MembersTableMap::COL_MAIL_LIST => 5, MembersTableMap::COL_EMAIL => 6, MembersTableMap::COL_AIM => 7, MembersTableMap::COL_WEBSITE => 8, MembersTableMap::COL_PHONE => 9, MembersTableMap::COL_PERM_ADDRESS => 10, MembersTableMap::COL_TEMP_ADDRESS => 11, MembersTableMap::COL_AVATAR => 12, MembersTableMap::COL_SIGNATURE => 13, MembersTableMap::COL_CLASS => 14, MembersTableMap::COL_USERNAME => 15, MembersTableMap::COL_PASSWORD => 16, MembersTableMap::COL_FAMILY => 17, MembersTableMap::COL_BIRTHDAY => 18, MembersTableMap::COL_SHIRT_SIZE => 19, MembersTableMap::COL_TOTAL_SERVICE => 20, MembersTableMap::COL_TOTAL_FELLOWSHIP => 21, MembersTableMap::COL_NOTES => 22, MembersTableMap::COL_FEES_OWED => 23, MembersTableMap::COL_EMAIL_LIST => 24, MembersTableMap::COL_REMINDER => 25, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'first_name' => 1, 'middle_name' => 2, 'last_name' => 3, 'position' => 4, 'mail_list' => 5, 'email' => 6, 'aim' => 7, 'website' => 8, 'phone' => 9, 'perm_address' => 10, 'temp_address' => 11, 'avatar' => 12, 'signature' => 13, 'class' => 14, 'username' => 15, 'password' => 16, 'family' => 17, 'birthday' => 18, 'shirt_size' => 19, 'total_service' => 20, 'total_fellowship' => 21, 'notes' => 22, 'fees_owed' => 23, 'email_list' => 24, 'reminder' => 25, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, )
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
        $this->setName('members');
        $this->setPhpName('Members');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Members');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addColumn('id', 'Id', 'INTEGER', true, 10, null);
        $this->addColumn('first_name', 'FirstName', 'LONGVARCHAR', true, null, null);
        $this->addColumn('middle_name', 'MiddleName', 'LONGVARCHAR', false, null, null);
        $this->addColumn('last_name', 'LastName', 'LONGVARCHAR', true, null, null);
        $this->addColumn('position', 'Position', 'INTEGER', true, 10, 0);
        $this->addColumn('mail_list', 'MailList', 'BOOLEAN', true, 1, false);
        $this->addColumn('email', 'Email', 'LONGVARCHAR', true, null, null);
        $this->addColumn('aim', 'Aim', 'LONGVARCHAR', false, null, null);
        $this->addColumn('website', 'Website', 'LONGVARCHAR', false, null, null);
        $this->addColumn('phone', 'Phone', 'VARCHAR', true, 12, '');
        $this->addColumn('perm_address', 'PermAddress', 'LONGVARCHAR', false, null, null);
        $this->addColumn('temp_address', 'TempAddress', 'LONGVARCHAR', false, null, null);
        $this->addColumn('avatar', 'Avatar', 'LONGVARCHAR', false, null, null);
        $this->addColumn('signature', 'Signature', 'LONGVARCHAR', false, null, null);
        $this->addColumn('class', 'Class', 'LONGVARCHAR', true, null, null);
        $this->addColumn('username', 'Username', 'VARCHAR', true, 12, '');
        $this->addColumn('password', 'Password', 'LONGVARCHAR', true, null, null);
        $this->addColumn('family', 'Family', 'VARCHAR', false, 5, null);
        $this->addColumn('birthday', 'Birthday', 'INTEGER', false, 10, null);
        $this->addColumn('shirt_size', 'ShirtSize', 'VARCHAR', false, 2, null);
        $this->addColumn('total_service', 'TotalService', 'DOUBLE', true, null, 0);
        $this->addColumn('total_fellowship', 'TotalFellowship', 'DOUBLE', true, null, 0);
        $this->addColumn('notes', 'Notes', 'LONGVARCHAR', true, null, null);
        $this->addColumn('fees_owed', 'FeesOwed', 'FLOAT', true, null, 0);
        $this->addColumn('email_list', 'EmailList', 'BOOLEAN', true, 1, true);
        $this->addColumn('reminder', 'Reminder', 'TINYINT', true, null, 1);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Signups', '\\Signups', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':user',
    1 => ':id',
  ),
), null, null, 'Signupss', false);
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
        return $withPrefix ? MembersTableMap::CLASS_DEFAULT : MembersTableMap::OM_CLASS;
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
     * @return array           (Members object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = MembersTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = MembersTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + MembersTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = MembersTableMap::OM_CLASS;
            /** @var Members $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            MembersTableMap::addInstanceToPool($obj, $key);
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
            $key = MembersTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = MembersTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Members $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                MembersTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(MembersTableMap::COL_ID);
            $criteria->addSelectColumn(MembersTableMap::COL_FIRST_NAME);
            $criteria->addSelectColumn(MembersTableMap::COL_MIDDLE_NAME);
            $criteria->addSelectColumn(MembersTableMap::COL_LAST_NAME);
            $criteria->addSelectColumn(MembersTableMap::COL_POSITION);
            $criteria->addSelectColumn(MembersTableMap::COL_MAIL_LIST);
            $criteria->addSelectColumn(MembersTableMap::COL_EMAIL);
            $criteria->addSelectColumn(MembersTableMap::COL_AIM);
            $criteria->addSelectColumn(MembersTableMap::COL_WEBSITE);
            $criteria->addSelectColumn(MembersTableMap::COL_PHONE);
            $criteria->addSelectColumn(MembersTableMap::COL_PERM_ADDRESS);
            $criteria->addSelectColumn(MembersTableMap::COL_TEMP_ADDRESS);
            $criteria->addSelectColumn(MembersTableMap::COL_AVATAR);
            $criteria->addSelectColumn(MembersTableMap::COL_SIGNATURE);
            $criteria->addSelectColumn(MembersTableMap::COL_CLASS);
            $criteria->addSelectColumn(MembersTableMap::COL_USERNAME);
            $criteria->addSelectColumn(MembersTableMap::COL_PASSWORD);
            $criteria->addSelectColumn(MembersTableMap::COL_FAMILY);
            $criteria->addSelectColumn(MembersTableMap::COL_BIRTHDAY);
            $criteria->addSelectColumn(MembersTableMap::COL_SHIRT_SIZE);
            $criteria->addSelectColumn(MembersTableMap::COL_TOTAL_SERVICE);
            $criteria->addSelectColumn(MembersTableMap::COL_TOTAL_FELLOWSHIP);
            $criteria->addSelectColumn(MembersTableMap::COL_NOTES);
            $criteria->addSelectColumn(MembersTableMap::COL_FEES_OWED);
            $criteria->addSelectColumn(MembersTableMap::COL_EMAIL_LIST);
            $criteria->addSelectColumn(MembersTableMap::COL_REMINDER);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.first_name');
            $criteria->addSelectColumn($alias . '.middle_name');
            $criteria->addSelectColumn($alias . '.last_name');
            $criteria->addSelectColumn($alias . '.position');
            $criteria->addSelectColumn($alias . '.mail_list');
            $criteria->addSelectColumn($alias . '.email');
            $criteria->addSelectColumn($alias . '.aim');
            $criteria->addSelectColumn($alias . '.website');
            $criteria->addSelectColumn($alias . '.phone');
            $criteria->addSelectColumn($alias . '.perm_address');
            $criteria->addSelectColumn($alias . '.temp_address');
            $criteria->addSelectColumn($alias . '.avatar');
            $criteria->addSelectColumn($alias . '.signature');
            $criteria->addSelectColumn($alias . '.class');
            $criteria->addSelectColumn($alias . '.username');
            $criteria->addSelectColumn($alias . '.password');
            $criteria->addSelectColumn($alias . '.family');
            $criteria->addSelectColumn($alias . '.birthday');
            $criteria->addSelectColumn($alias . '.shirt_size');
            $criteria->addSelectColumn($alias . '.total_service');
            $criteria->addSelectColumn($alias . '.total_fellowship');
            $criteria->addSelectColumn($alias . '.notes');
            $criteria->addSelectColumn($alias . '.fees_owed');
            $criteria->addSelectColumn($alias . '.email_list');
            $criteria->addSelectColumn($alias . '.reminder');
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
        return Propel::getServiceContainer()->getDatabaseMap(MembersTableMap::DATABASE_NAME)->getTable(MembersTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(MembersTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(MembersTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new MembersTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a Members or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Members object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(MembersTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Members) { // it's a model object
            // create criteria based on pk value
            $criteria = $values->buildCriteria();
        } else { // it's a primary key, or an array of pks
            throw new LogicException('The Members object has no primary key');
        }

        $query = MembersQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            MembersTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                MembersTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the members table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return MembersQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Members or Criteria object.
     *
     * @param mixed               $criteria Criteria or Members object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(MembersTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Members object
        }


        // Set the correct dbName
        $query = MembersQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // MembersTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
MembersTableMap::buildTableMap();
