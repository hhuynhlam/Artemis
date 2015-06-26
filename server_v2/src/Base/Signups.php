<?php

namespace Base;

use \Members as ChildMembers;
use \MembersQuery as ChildMembersQuery;
use \Shifts as ChildShifts;
use \ShiftsQuery as ChildShiftsQuery;
use \Signups as ChildSignups;
use \SignupsQuery as ChildSignupsQuery;
use \Exception;
use \PDO;
use Map\SignupsTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveRecord\ActiveRecordInterface;
use Propel\Runtime\Collection\Collection;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\BadMethodCallException;
use Propel\Runtime\Exception\LogicException;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Parser\AbstractParser;

/**
 * Base class that represents a row from the 'signups' table.
 *
 *
 *
* @package    propel.generator..Base
*/
abstract class Signups implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\Map\\SignupsTableMap';


    /**
     * attribute to determine if this object has previously been saved.
     * @var boolean
     */
    protected $new = true;

    /**
     * attribute to determine whether this object has been deleted.
     * @var boolean
     */
    protected $deleted = false;

    /**
     * The columns that have been modified in current object.
     * Tracking modified columns allows us to only update modified columns.
     * @var array
     */
    protected $modifiedColumns = array();

    /**
     * The (virtual) columns that are added at runtime
     * The formatters can add supplementary columns based on a resultset
     * @var array
     */
    protected $virtualColumns = array();

    /**
     * The value for the user field.
     * Note: this column has a database default value of: 0
     * @var        int
     */
    protected $user;

    /**
     * The value for the shift field.
     * Note: this column has a database default value of: 0
     * @var        int
     */
    protected $shift;

    /**
     * The value for the event field.
     * Note: this column has a database default value of: 0
     * @var        int
     */
    protected $event;

    /**
     * The value for the driver field.
     * Note: this column has a database default value of: 0
     * @var        int
     */
    protected $driver;

    /**
     * The value for the chair field.
     * Note: this column has a database default value of: 0
     * @var        int
     */
    protected $chair;

    /**
     * The value for the credit field.
     * Note: this column has a database default value of: -1
     * @var        double
     */
    protected $credit;

    /**
     * The value for the timestamp field.
     * Note: this column has a database default value of: 0
     * @var        int
     */
    protected $timestamp;

    /**
     * @var        ChildMembers
     */
    protected $aMembers;

    /**
     * @var        ChildShifts
     */
    protected $aShifts;

    /**
     * @var        ObjectCollection|ChildShifts[] Collection to store aggregation of ChildShifts objects.
     */
    protected $collShiftssRelatedById;
    protected $collShiftssRelatedByIdPartial;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     *
     * @var boolean
     */
    protected $alreadyInSave = false;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildShifts[]
     */
    protected $shiftssRelatedByIdScheduledForDeletion = null;

    /**
     * Applies default values to this object.
     * This method should be called from the object's constructor (or
     * equivalent initialization method).
     * @see __construct()
     */
    public function applyDefaultValues()
    {
        $this->user = 0;
        $this->shift = 0;
        $this->event = 0;
        $this->driver = 0;
        $this->chair = 0;
        $this->credit = -1;
        $this->timestamp = 0;
    }

    /**
     * Initializes internal state of Base\Signups object.
     * @see applyDefaults()
     */
    public function __construct()
    {
        $this->applyDefaultValues();
    }

    /**
     * Returns whether the object has been modified.
     *
     * @return boolean True if the object has been modified.
     */
    public function isModified()
    {
        return !!$this->modifiedColumns;
    }

    /**
     * Has specified column been modified?
     *
     * @param  string  $col column fully qualified name (TableMap::TYPE_COLNAME), e.g. Book::AUTHOR_ID
     * @return boolean True if $col has been modified.
     */
    public function isColumnModified($col)
    {
        return $this->modifiedColumns && isset($this->modifiedColumns[$col]);
    }

    /**
     * Get the columns that have been modified in this object.
     * @return array A unique list of the modified column names for this object.
     */
    public function getModifiedColumns()
    {
        return $this->modifiedColumns ? array_keys($this->modifiedColumns) : [];
    }

    /**
     * Returns whether the object has ever been saved.  This will
     * be false, if the object was retrieved from storage or was created
     * and then saved.
     *
     * @return boolean true, if the object has never been persisted.
     */
    public function isNew()
    {
        return $this->new;
    }

    /**
     * Setter for the isNew attribute.  This method will be called
     * by Propel-generated children and objects.
     *
     * @param boolean $b the state of the object.
     */
    public function setNew($b)
    {
        $this->new = (boolean) $b;
    }

    /**
     * Whether this object has been deleted.
     * @return boolean The deleted state of this object.
     */
    public function isDeleted()
    {
        return $this->deleted;
    }

    /**
     * Specify whether this object has been deleted.
     * @param  boolean $b The deleted state of this object.
     * @return void
     */
    public function setDeleted($b)
    {
        $this->deleted = (boolean) $b;
    }

    /**
     * Sets the modified state for the object to be false.
     * @param  string $col If supplied, only the specified column is reset.
     * @return void
     */
    public function resetModified($col = null)
    {
        if (null !== $col) {
            if (isset($this->modifiedColumns[$col])) {
                unset($this->modifiedColumns[$col]);
            }
        } else {
            $this->modifiedColumns = array();
        }
    }

    /**
     * Compares this with another <code>Signups</code> instance.  If
     * <code>obj</code> is an instance of <code>Signups</code>, delegates to
     * <code>equals(Signups)</code>.  Otherwise, returns <code>false</code>.
     *
     * @param  mixed   $obj The object to compare to.
     * @return boolean Whether equal to the object specified.
     */
    public function equals($obj)
    {
        if (!$obj instanceof static) {
            return false;
        }

        if ($this === $obj) {
            return true;
        }

        if (null === $this->getPrimaryKey() || null === $obj->getPrimaryKey()) {
            return false;
        }

        return $this->getPrimaryKey() === $obj->getPrimaryKey();
    }

    /**
     * Get the associative array of the virtual columns in this object
     *
     * @return array
     */
    public function getVirtualColumns()
    {
        return $this->virtualColumns;
    }

    /**
     * Checks the existence of a virtual column in this object
     *
     * @param  string  $name The virtual column name
     * @return boolean
     */
    public function hasVirtualColumn($name)
    {
        return array_key_exists($name, $this->virtualColumns);
    }

    /**
     * Get the value of a virtual column in this object
     *
     * @param  string $name The virtual column name
     * @return mixed
     *
     * @throws PropelException
     */
    public function getVirtualColumn($name)
    {
        if (!$this->hasVirtualColumn($name)) {
            throw new PropelException(sprintf('Cannot get value of inexistent virtual column %s.', $name));
        }

        return $this->virtualColumns[$name];
    }

    /**
     * Set the value of a virtual column in this object
     *
     * @param string $name  The virtual column name
     * @param mixed  $value The value to give to the virtual column
     *
     * @return $this|Signups The current object, for fluid interface
     */
    public function setVirtualColumn($name, $value)
    {
        $this->virtualColumns[$name] = $value;

        return $this;
    }

    /**
     * Logs a message using Propel::log().
     *
     * @param  string  $msg
     * @param  int     $priority One of the Propel::LOG_* logging levels
     * @return boolean
     */
    protected function log($msg, $priority = Propel::LOG_INFO)
    {
        return Propel::log(get_class($this) . ': ' . $msg, $priority);
    }

    /**
     * Export the current object properties to a string, using a given parser format
     * <code>
     * $book = BookQuery::create()->findPk(9012);
     * echo $book->exportTo('JSON');
     *  => {"Id":9012,"Title":"Don Juan","ISBN":"0140422161","Price":12.99,"PublisherId":1234,"AuthorId":5678}');
     * </code>
     *
     * @param  mixed   $parser                 A AbstractParser instance, or a format name ('XML', 'YAML', 'JSON', 'CSV')
     * @param  boolean $includeLazyLoadColumns (optional) Whether to include lazy load(ed) columns. Defaults to TRUE.
     * @return string  The exported data
     */
    public function exportTo($parser, $includeLazyLoadColumns = true)
    {
        if (!$parser instanceof AbstractParser) {
            $parser = AbstractParser::getParser($parser);
        }

        return $parser->fromArray($this->toArray(TableMap::TYPE_PHPNAME, $includeLazyLoadColumns, array(), true));
    }

    /**
     * Clean up internal collections prior to serializing
     * Avoids recursive loops that turn into segmentation faults when serializing
     */
    public function __sleep()
    {
        $this->clearAllReferences();

        return array_keys(get_object_vars($this));
    }

    /**
     * Get the [user] column value.
     *
     * @return int
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Get the [shift] column value.
     *
     * @return int
     */
    public function getShift()
    {
        return $this->shift;
    }

    /**
     * Get the [event] column value.
     *
     * @return int
     */
    public function getEvent()
    {
        return $this->event;
    }

    /**
     * Get the [driver] column value.
     *
     * @return int
     */
    public function getDriver()
    {
        return $this->driver;
    }

    /**
     * Get the [chair] column value.
     *
     * @return int
     */
    public function getChair()
    {
        return $this->chair;
    }

    /**
     * Get the [credit] column value.
     *
     * @return double
     */
    public function getCredit()
    {
        return $this->credit;
    }

    /**
     * Get the [timestamp] column value.
     *
     * @return int
     */
    public function getTimestamp()
    {
        return $this->timestamp;
    }

    /**
     * Set the value of [user] column.
     *
     * @param int $v new value
     * @return $this|\Signups The current object (for fluent API support)
     */
    public function setUser($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->user !== $v) {
            $this->user = $v;
            $this->modifiedColumns[SignupsTableMap::COL_USER] = true;
        }

        if ($this->aMembers !== null && $this->aMembers->getId() !== $v) {
            $this->aMembers = null;
        }

        return $this;
    } // setUser()

    /**
     * Set the value of [shift] column.
     *
     * @param int $v new value
     * @return $this|\Signups The current object (for fluent API support)
     */
    public function setShift($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->shift !== $v) {
            $this->shift = $v;
            $this->modifiedColumns[SignupsTableMap::COL_SHIFT] = true;
        }

        if ($this->aShifts !== null && $this->aShifts->getId() !== $v) {
            $this->aShifts = null;
        }

        return $this;
    } // setShift()

    /**
     * Set the value of [event] column.
     *
     * @param int $v new value
     * @return $this|\Signups The current object (for fluent API support)
     */
    public function setEvent($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->event !== $v) {
            $this->event = $v;
            $this->modifiedColumns[SignupsTableMap::COL_EVENT] = true;
        }

        return $this;
    } // setEvent()

    /**
     * Set the value of [driver] column.
     *
     * @param int $v new value
     * @return $this|\Signups The current object (for fluent API support)
     */
    public function setDriver($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->driver !== $v) {
            $this->driver = $v;
            $this->modifiedColumns[SignupsTableMap::COL_DRIVER] = true;
        }

        return $this;
    } // setDriver()

    /**
     * Set the value of [chair] column.
     *
     * @param int $v new value
     * @return $this|\Signups The current object (for fluent API support)
     */
    public function setChair($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->chair !== $v) {
            $this->chair = $v;
            $this->modifiedColumns[SignupsTableMap::COL_CHAIR] = true;
        }

        return $this;
    } // setChair()

    /**
     * Set the value of [credit] column.
     *
     * @param double $v new value
     * @return $this|\Signups The current object (for fluent API support)
     */
    public function setCredit($v)
    {
        if ($v !== null) {
            $v = (double) $v;
        }

        if ($this->credit !== $v) {
            $this->credit = $v;
            $this->modifiedColumns[SignupsTableMap::COL_CREDIT] = true;
        }

        return $this;
    } // setCredit()

    /**
     * Set the value of [timestamp] column.
     *
     * @param int $v new value
     * @return $this|\Signups The current object (for fluent API support)
     */
    public function setTimestamp($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->timestamp !== $v) {
            $this->timestamp = $v;
            $this->modifiedColumns[SignupsTableMap::COL_TIMESTAMP] = true;
        }

        return $this;
    } // setTimestamp()

    /**
     * Indicates whether the columns in this object are only set to default values.
     *
     * This method can be used in conjunction with isModified() to indicate whether an object is both
     * modified _and_ has some values set which are non-default.
     *
     * @return boolean Whether the columns in this object are only been set with default values.
     */
    public function hasOnlyDefaultValues()
    {
            if ($this->user !== 0) {
                return false;
            }

            if ($this->shift !== 0) {
                return false;
            }

            if ($this->event !== 0) {
                return false;
            }

            if ($this->driver !== 0) {
                return false;
            }

            if ($this->chair !== 0) {
                return false;
            }

            if ($this->credit !== -1) {
                return false;
            }

            if ($this->timestamp !== 0) {
                return false;
            }

        // otherwise, everything was equal, so return TRUE
        return true;
    } // hasOnlyDefaultValues()

    /**
     * Hydrates (populates) the object variables with values from the database resultset.
     *
     * An offset (0-based "start column") is specified so that objects can be hydrated
     * with a subset of the columns in the resultset rows.  This is needed, for example,
     * for results of JOIN queries where the resultset row includes columns from two or
     * more tables.
     *
     * @param array   $row       The row returned by DataFetcher->fetch().
     * @param int     $startcol  0-based offset column which indicates which restultset column to start with.
     * @param boolean $rehydrate Whether this object is being re-hydrated from the database.
     * @param string  $indexType The index type of $row. Mostly DataFetcher->getIndexType().
                                  One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                            TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *
     * @return int             next starting column
     * @throws PropelException - Any caught Exception will be rewrapped as a PropelException.
     */
    public function hydrate($row, $startcol = 0, $rehydrate = false, $indexType = TableMap::TYPE_NUM)
    {
        try {

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : SignupsTableMap::translateFieldName('User', TableMap::TYPE_PHPNAME, $indexType)];
            $this->user = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : SignupsTableMap::translateFieldName('Shift', TableMap::TYPE_PHPNAME, $indexType)];
            $this->shift = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : SignupsTableMap::translateFieldName('Event', TableMap::TYPE_PHPNAME, $indexType)];
            $this->event = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : SignupsTableMap::translateFieldName('Driver', TableMap::TYPE_PHPNAME, $indexType)];
            $this->driver = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : SignupsTableMap::translateFieldName('Chair', TableMap::TYPE_PHPNAME, $indexType)];
            $this->chair = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : SignupsTableMap::translateFieldName('Credit', TableMap::TYPE_PHPNAME, $indexType)];
            $this->credit = (null !== $col) ? (double) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 6 + $startcol : SignupsTableMap::translateFieldName('Timestamp', TableMap::TYPE_PHPNAME, $indexType)];
            $this->timestamp = (null !== $col) ? (int) $col : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 7; // 7 = SignupsTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\Signups'), 0, $e);
        }
    }

    /**
     * Checks and repairs the internal consistency of the object.
     *
     * This method is executed after an already-instantiated object is re-hydrated
     * from the database.  It exists to check any foreign keys to make sure that
     * the objects related to the current object are correct based on foreign key.
     *
     * You can override this method in the stub class, but you should always invoke
     * the base method from the overridden method (i.e. parent::ensureConsistency()),
     * in case your model changes.
     *
     * @throws PropelException
     */
    public function ensureConsistency()
    {
        if ($this->aMembers !== null && $this->user !== $this->aMembers->getId()) {
            $this->aMembers = null;
        }
        if ($this->aShifts !== null && $this->shift !== $this->aShifts->getId()) {
            $this->aShifts = null;
        }
    } // ensureConsistency

    /**
     * Reloads this object from datastore based on primary key and (optionally) resets all associated objects.
     *
     * This will only work if the object has been saved and has a valid primary key set.
     *
     * @param      boolean $deep (optional) Whether to also de-associated any related objects.
     * @param      ConnectionInterface $con (optional) The ConnectionInterface connection to use.
     * @return void
     * @throws PropelException - if this object is deleted, unsaved or doesn't have pk match in db
     */
    public function reload($deep = false, ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("Cannot reload a deleted object.");
        }

        if ($this->isNew()) {
            throw new PropelException("Cannot reload an unsaved object.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(SignupsTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildSignupsQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
        $row = $dataFetcher->fetch();
        $dataFetcher->close();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true, $dataFetcher->getIndexType()); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aMembers = null;
            $this->aShifts = null;
            $this->collShiftssRelatedById = null;

        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param      ConnectionInterface $con
     * @return void
     * @throws PropelException
     * @see Signups::setDeleted()
     * @see Signups::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(SignupsTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildSignupsQuery::create()
                ->filterByPrimaryKey($this->getPrimaryKey());
            $ret = $this->preDelete($con);
            if ($ret) {
                $deleteQuery->delete($con);
                $this->postDelete($con);
                $this->setDeleted(true);
            }
        });
    }

    /**
     * Persists this object to the database.
     *
     * If the object is new, it inserts it; otherwise an update is performed.
     * All modified related objects will also be persisted in the doSave()
     * method.  This method wraps all precipitate database operations in a
     * single transaction.
     *
     * @param      ConnectionInterface $con
     * @return int             The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws PropelException
     * @see doSave()
     */
    public function save(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("You cannot save an object that has been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(SignupsTableMap::DATABASE_NAME);
        }

        return $con->transaction(function () use ($con) {
            $isInsert = $this->isNew();
            $ret = $this->preSave($con);
            if ($isInsert) {
                $ret = $ret && $this->preInsert($con);
            } else {
                $ret = $ret && $this->preUpdate($con);
            }
            if ($ret) {
                $affectedRows = $this->doSave($con);
                if ($isInsert) {
                    $this->postInsert($con);
                } else {
                    $this->postUpdate($con);
                }
                $this->postSave($con);
                SignupsTableMap::addInstanceToPool($this);
            } else {
                $affectedRows = 0;
            }

            return $affectedRows;
        });
    }

    /**
     * Performs the work of inserting or updating the row in the database.
     *
     * If the object is new, it inserts it; otherwise an update is performed.
     * All related objects are also updated in this method.
     *
     * @param      ConnectionInterface $con
     * @return int             The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws PropelException
     * @see save()
     */
    protected function doSave(ConnectionInterface $con)
    {
        $affectedRows = 0; // initialize var to track total num of affected rows
        if (!$this->alreadyInSave) {
            $this->alreadyInSave = true;

            // We call the save method on the following object(s) if they
            // were passed to this object by their corresponding set
            // method.  This object relates to these object(s) by a
            // foreign key reference.

            if ($this->aMembers !== null) {
                if ($this->aMembers->isModified() || $this->aMembers->isNew()) {
                    $affectedRows += $this->aMembers->save($con);
                }
                $this->setMembers($this->aMembers);
            }

            if ($this->aShifts !== null) {
                if ($this->aShifts->isModified() || $this->aShifts->isNew()) {
                    $affectedRows += $this->aShifts->save($con);
                }
                $this->setShifts($this->aShifts);
            }

            if ($this->isNew() || $this->isModified()) {
                // persist changes
                if ($this->isNew()) {
                    $this->doInsert($con);
                    $affectedRows += 1;
                } else {
                    $affectedRows += $this->doUpdate($con);
                }
                $this->resetModified();
            }

            if ($this->shiftssRelatedByIdScheduledForDeletion !== null) {
                if (!$this->shiftssRelatedByIdScheduledForDeletion->isEmpty()) {
                    \ShiftsQuery::create()
                        ->filterByPrimaryKeys($this->shiftssRelatedByIdScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->shiftssRelatedByIdScheduledForDeletion = null;
                }
            }

            if ($this->collShiftssRelatedById !== null) {
                foreach ($this->collShiftssRelatedById as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            $this->alreadyInSave = false;

        }

        return $affectedRows;
    } // doSave()

    /**
     * Insert the row in the database.
     *
     * @param      ConnectionInterface $con
     *
     * @throws PropelException
     * @see doSave()
     */
    protected function doInsert(ConnectionInterface $con)
    {
        $modifiedColumns = array();
        $index = 0;


         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(SignupsTableMap::COL_USER)) {
            $modifiedColumns[':p' . $index++]  = 'user';
        }
        if ($this->isColumnModified(SignupsTableMap::COL_SHIFT)) {
            $modifiedColumns[':p' . $index++]  = 'shift';
        }
        if ($this->isColumnModified(SignupsTableMap::COL_EVENT)) {
            $modifiedColumns[':p' . $index++]  = 'event';
        }
        if ($this->isColumnModified(SignupsTableMap::COL_DRIVER)) {
            $modifiedColumns[':p' . $index++]  = 'driver';
        }
        if ($this->isColumnModified(SignupsTableMap::COL_CHAIR)) {
            $modifiedColumns[':p' . $index++]  = 'chair';
        }
        if ($this->isColumnModified(SignupsTableMap::COL_CREDIT)) {
            $modifiedColumns[':p' . $index++]  = 'credit';
        }
        if ($this->isColumnModified(SignupsTableMap::COL_TIMESTAMP)) {
            $modifiedColumns[':p' . $index++]  = 'timestamp';
        }

        $sql = sprintf(
            'INSERT INTO signups (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case 'user':
                        $stmt->bindValue($identifier, $this->user, PDO::PARAM_INT);
                        break;
                    case 'shift':
                        $stmt->bindValue($identifier, $this->shift, PDO::PARAM_INT);
                        break;
                    case 'event':
                        $stmt->bindValue($identifier, $this->event, PDO::PARAM_INT);
                        break;
                    case 'driver':
                        $stmt->bindValue($identifier, $this->driver, PDO::PARAM_INT);
                        break;
                    case 'chair':
                        $stmt->bindValue($identifier, $this->chair, PDO::PARAM_INT);
                        break;
                    case 'credit':
                        $stmt->bindValue($identifier, $this->credit, PDO::PARAM_STR);
                        break;
                    case 'timestamp':
                        $stmt->bindValue($identifier, $this->timestamp, PDO::PARAM_INT);
                        break;
                }
            }
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute INSERT statement [%s]', $sql), 0, $e);
        }

        $this->setNew(false);
    }

    /**
     * Update the row in the database.
     *
     * @param      ConnectionInterface $con
     *
     * @return Integer Number of updated rows
     * @see doSave()
     */
    protected function doUpdate(ConnectionInterface $con)
    {
        $selectCriteria = $this->buildPkeyCriteria();
        $valuesCriteria = $this->buildCriteria();

        return $selectCriteria->doUpdate($valuesCriteria, $con);
    }

    /**
     * Retrieves a field from the object by name passed in as a string.
     *
     * @param      string $name name
     * @param      string $type The type of fieldname the $name is of:
     *                     one of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                     TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *                     Defaults to TableMap::TYPE_PHPNAME.
     * @return mixed Value of field.
     */
    public function getByName($name, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = SignupsTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
        $field = $this->getByPosition($pos);

        return $field;
    }

    /**
     * Retrieves a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param      int $pos position in xml schema
     * @return mixed Value of field at $pos
     */
    public function getByPosition($pos)
    {
        switch ($pos) {
            case 0:
                return $this->getUser();
                break;
            case 1:
                return $this->getShift();
                break;
            case 2:
                return $this->getEvent();
                break;
            case 3:
                return $this->getDriver();
                break;
            case 4:
                return $this->getChair();
                break;
            case 5:
                return $this->getCredit();
                break;
            case 6:
                return $this->getTimestamp();
                break;
            default:
                return null;
                break;
        } // switch()
    }

    /**
     * Exports the object as an array.
     *
     * You can specify the key type of the array by passing one of the class
     * type constants.
     *
     * @param     string  $keyType (optional) One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME,
     *                    TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *                    Defaults to TableMap::TYPE_PHPNAME.
     * @param     boolean $includeLazyLoadColumns (optional) Whether to include lazy loaded columns. Defaults to TRUE.
     * @param     array $alreadyDumpedObjects List of objects to skip to avoid recursion
     * @param     boolean $includeForeignObjects (optional) Whether to include hydrated related objects. Default to FALSE.
     *
     * @return array an associative array containing the field names (as keys) and field values
     */
    public function toArray($keyType = TableMap::TYPE_PHPNAME, $includeLazyLoadColumns = true, $alreadyDumpedObjects = array(), $includeForeignObjects = false)
    {

        if (isset($alreadyDumpedObjects['Signups'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Signups'][$this->hashCode()] = true;
        $keys = SignupsTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getUser(),
            $keys[1] => $this->getShift(),
            $keys[2] => $this->getEvent(),
            $keys[3] => $this->getDriver(),
            $keys[4] => $this->getChair(),
            $keys[5] => $this->getCredit(),
            $keys[6] => $this->getTimestamp(),
        );
        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
            if (null !== $this->aMembers) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'members';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'members';
                        break;
                    default:
                        $key = 'Members';
                }

                $result[$key] = $this->aMembers->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aShifts) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'shifts';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'shifts';
                        break;
                    default:
                        $key = 'Shifts';
                }

                $result[$key] = $this->aShifts->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collShiftssRelatedById) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'shiftss';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'shiftss';
                        break;
                    default:
                        $key = 'Shiftss';
                }

                $result[$key] = $this->collShiftssRelatedById->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
        }

        return $result;
    }

    /**
     * Sets a field from the object by name passed in as a string.
     *
     * @param  string $name
     * @param  mixed  $value field value
     * @param  string $type The type of fieldname the $name is of:
     *                one of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *                Defaults to TableMap::TYPE_PHPNAME.
     * @return $this|\Signups
     */
    public function setByName($name, $value, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = SignupsTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\Signups
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setUser($value);
                break;
            case 1:
                $this->setShift($value);
                break;
            case 2:
                $this->setEvent($value);
                break;
            case 3:
                $this->setDriver($value);
                break;
            case 4:
                $this->setChair($value);
                break;
            case 5:
                $this->setCredit($value);
                break;
            case 6:
                $this->setTimestamp($value);
                break;
        } // switch()

        return $this;
    }

    /**
     * Populates the object using an array.
     *
     * This is particularly useful when populating an object from one of the
     * request arrays (e.g. $_POST).  This method goes through the column
     * names, checking to see whether a matching key exists in populated
     * array. If so the setByName() method is called for that column.
     *
     * You can specify the key type of the array by additionally passing one
     * of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME,
     * TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     * The default key type is the column's TableMap::TYPE_PHPNAME.
     *
     * @param      array  $arr     An array to populate the object from.
     * @param      string $keyType The type of keys the array uses.
     * @return void
     */
    public function fromArray($arr, $keyType = TableMap::TYPE_PHPNAME)
    {
        $keys = SignupsTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setUser($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setShift($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setEvent($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setDriver($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setChair($arr[$keys[4]]);
        }
        if (array_key_exists($keys[5], $arr)) {
            $this->setCredit($arr[$keys[5]]);
        }
        if (array_key_exists($keys[6], $arr)) {
            $this->setTimestamp($arr[$keys[6]]);
        }
    }

     /**
     * Populate the current object from a string, using a given parser format
     * <code>
     * $book = new Book();
     * $book->importFrom('JSON', '{"Id":9012,"Title":"Don Juan","ISBN":"0140422161","Price":12.99,"PublisherId":1234,"AuthorId":5678}');
     * </code>
     *
     * You can specify the key type of the array by additionally passing one
     * of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME,
     * TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     * The default key type is the column's TableMap::TYPE_PHPNAME.
     *
     * @param mixed $parser A AbstractParser instance,
     *                       or a format name ('XML', 'YAML', 'JSON', 'CSV')
     * @param string $data The source data to import from
     * @param string $keyType The type of keys the array uses.
     *
     * @return $this|\Signups The current object, for fluid interface
     */
    public function importFrom($parser, $data, $keyType = TableMap::TYPE_PHPNAME)
    {
        if (!$parser instanceof AbstractParser) {
            $parser = AbstractParser::getParser($parser);
        }

        $this->fromArray($parser->toArray($data), $keyType);

        return $this;
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(SignupsTableMap::DATABASE_NAME);

        if ($this->isColumnModified(SignupsTableMap::COL_USER)) {
            $criteria->add(SignupsTableMap::COL_USER, $this->user);
        }
        if ($this->isColumnModified(SignupsTableMap::COL_SHIFT)) {
            $criteria->add(SignupsTableMap::COL_SHIFT, $this->shift);
        }
        if ($this->isColumnModified(SignupsTableMap::COL_EVENT)) {
            $criteria->add(SignupsTableMap::COL_EVENT, $this->event);
        }
        if ($this->isColumnModified(SignupsTableMap::COL_DRIVER)) {
            $criteria->add(SignupsTableMap::COL_DRIVER, $this->driver);
        }
        if ($this->isColumnModified(SignupsTableMap::COL_CHAIR)) {
            $criteria->add(SignupsTableMap::COL_CHAIR, $this->chair);
        }
        if ($this->isColumnModified(SignupsTableMap::COL_CREDIT)) {
            $criteria->add(SignupsTableMap::COL_CREDIT, $this->credit);
        }
        if ($this->isColumnModified(SignupsTableMap::COL_TIMESTAMP)) {
            $criteria->add(SignupsTableMap::COL_TIMESTAMP, $this->timestamp);
        }

        return $criteria;
    }

    /**
     * Builds a Criteria object containing the primary key for this object.
     *
     * Unlike buildCriteria() this method includes the primary key values regardless
     * of whether or not they have been modified.
     *
     * @throws LogicException if no primary key is defined
     *
     * @return Criteria The Criteria object containing value(s) for primary key(s).
     */
    public function buildPkeyCriteria()
    {
        throw new LogicException('The Signups object has no primary key');

        return $criteria;
    }

    /**
     * If the primary key is not null, return the hashcode of the
     * primary key. Otherwise, return the hash code of the object.
     *
     * @return int Hashcode
     */
    public function hashCode()
    {
        $validPk = false;

        $validPrimaryKeyFKs = 0;
        $primaryKeyFKs = [];

        if ($validPk) {
            return crc32(json_encode($this->getPrimaryKey(), JSON_UNESCAPED_UNICODE));
        } elseif ($validPrimaryKeyFKs) {
            return crc32(json_encode($primaryKeyFKs, JSON_UNESCAPED_UNICODE));
        }

        return spl_object_hash($this);
    }

    /**
     * Returns NULL since this table doesn't have a primary key.
     * This method exists only for BC and is deprecated!
     * @return null
     */
    public function getPrimaryKey()
    {
        return null;
    }

    /**
     * Dummy primary key setter.
     *
     * This function only exists to preserve backwards compatibility.  It is no longer
     * needed or required by the Persistent interface.  It will be removed in next BC-breaking
     * release of Propel.
     *
     * @deprecated
     */
    public function setPrimaryKey($pk)
    {
        // do nothing, because this object doesn't have any primary keys
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {
        return ;
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param      object $copyObj An object of \Signups (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setUser($this->getUser());
        $copyObj->setShift($this->getShift());
        $copyObj->setEvent($this->getEvent());
        $copyObj->setDriver($this->getDriver());
        $copyObj->setChair($this->getChair());
        $copyObj->setCredit($this->getCredit());
        $copyObj->setTimestamp($this->getTimestamp());

        if ($deepCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);

            foreach ($this->getShiftssRelatedById() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addShiftsRelatedById($relObj->copy($deepCopy));
                }
            }

        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
        }
    }

    /**
     * Makes a copy of this object that will be inserted as a new row in table when saved.
     * It creates a new object filling in the simple attributes, but skipping any primary
     * keys that are defined for the table.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param  boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @return \Signups Clone of current object.
     * @throws PropelException
     */
    public function copy($deepCopy = false)
    {
        // we use get_class(), because this might be a subclass
        $clazz = get_class($this);
        $copyObj = new $clazz();
        $this->copyInto($copyObj, $deepCopy);

        return $copyObj;
    }

    /**
     * Declares an association between this object and a ChildMembers object.
     *
     * @param  ChildMembers $v
     * @return $this|\Signups The current object (for fluent API support)
     * @throws PropelException
     */
    public function setMembers(ChildMembers $v = null)
    {
        if ($v === null) {
            $this->setUser(0);
        } else {
            $this->setUser($v->getId());
        }

        $this->aMembers = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildMembers object, it will not be re-added.
        if ($v !== null) {
            $v->addSignups($this);
        }


        return $this;
    }


    /**
     * Get the associated ChildMembers object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return ChildMembers The associated ChildMembers object.
     * @throws PropelException
     */
    public function getMembers(ConnectionInterface $con = null)
    {
        if ($this->aMembers === null && ($this->user !== null)) {
            $this->aMembers = ChildMembersQuery::create()
                ->filterBySignups($this) // here
                ->findOne($con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aMembers->addSignupss($this);
             */
        }

        return $this->aMembers;
    }

    /**
     * Declares an association between this object and a ChildShifts object.
     *
     * @param  ChildShifts $v
     * @return $this|\Signups The current object (for fluent API support)
     * @throws PropelException
     */
    public function setShifts(ChildShifts $v = null)
    {
        if ($v === null) {
            $this->setShift(0);
        } else {
            $this->setShift($v->getId());
        }

        $this->aShifts = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildShifts object, it will not be re-added.
        if ($v !== null) {
            $v->addSignupsRelatedByShift($this);
        }


        return $this;
    }


    /**
     * Get the associated ChildShifts object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return ChildShifts The associated ChildShifts object.
     * @throws PropelException
     */
    public function getShifts(ConnectionInterface $con = null)
    {
        if ($this->aShifts === null && ($this->shift !== null)) {
            $this->aShifts = ChildShiftsQuery::create()
                ->filterBySignupsRelatedByShift($this) // here
                ->findOne($con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aShifts->addSignupssRelatedByShift($this);
             */
        }

        return $this->aShifts;
    }


    /**
     * Initializes a collection based on the name of a relation.
     * Avoids crafting an 'init[$relationName]s' method name
     * that wouldn't work when StandardEnglishPluralizer is used.
     *
     * @param      string $relationName The name of the relation to initialize
     * @return void
     */
    public function initRelation($relationName)
    {
        if ('ShiftsRelatedById' == $relationName) {
            return $this->initShiftssRelatedById();
        }
    }

    /**
     * Clears out the collShiftssRelatedById collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addShiftssRelatedById()
     */
    public function clearShiftssRelatedById()
    {
        $this->collShiftssRelatedById = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collShiftssRelatedById collection loaded partially.
     */
    public function resetPartialShiftssRelatedById($v = true)
    {
        $this->collShiftssRelatedByIdPartial = $v;
    }

    /**
     * Initializes the collShiftssRelatedById collection.
     *
     * By default this just sets the collShiftssRelatedById collection to an empty array (like clearcollShiftssRelatedById());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initShiftssRelatedById($overrideExisting = true)
    {
        if (null !== $this->collShiftssRelatedById && !$overrideExisting) {
            return;
        }
        $this->collShiftssRelatedById = new ObjectCollection();
        $this->collShiftssRelatedById->setModel('\Shifts');
    }

    /**
     * Gets an array of ChildShifts objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildSignups is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildShifts[] List of ChildShifts objects
     * @throws PropelException
     */
    public function getShiftssRelatedById(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collShiftssRelatedByIdPartial && !$this->isNew();
        if (null === $this->collShiftssRelatedById || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collShiftssRelatedById) {
                // return empty collection
                $this->initShiftssRelatedById();
            } else {
                $collShiftssRelatedById = ChildShiftsQuery::create(null, $criteria)
                    ->filterBySignups($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collShiftssRelatedByIdPartial && count($collShiftssRelatedById)) {
                        $this->initShiftssRelatedById(false);

                        foreach ($collShiftssRelatedById as $obj) {
                            if (false == $this->collShiftssRelatedById->contains($obj)) {
                                $this->collShiftssRelatedById->append($obj);
                            }
                        }

                        $this->collShiftssRelatedByIdPartial = true;
                    }

                    return $collShiftssRelatedById;
                }

                if ($partial && $this->collShiftssRelatedById) {
                    foreach ($this->collShiftssRelatedById as $obj) {
                        if ($obj->isNew()) {
                            $collShiftssRelatedById[] = $obj;
                        }
                    }
                }

                $this->collShiftssRelatedById = $collShiftssRelatedById;
                $this->collShiftssRelatedByIdPartial = false;
            }
        }

        return $this->collShiftssRelatedById;
    }

    /**
     * Sets a collection of ChildShifts objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $shiftssRelatedById A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildSignups The current object (for fluent API support)
     */
    public function setShiftssRelatedById(Collection $shiftssRelatedById, ConnectionInterface $con = null)
    {
        /** @var ChildShifts[] $shiftssRelatedByIdToDelete */
        $shiftssRelatedByIdToDelete = $this->getShiftssRelatedById(new Criteria(), $con)->diff($shiftssRelatedById);


        $this->shiftssRelatedByIdScheduledForDeletion = $shiftssRelatedByIdToDelete;

        foreach ($shiftssRelatedByIdToDelete as $shiftsRelatedByIdRemoved) {
            $shiftsRelatedByIdRemoved->setSignups(null);
        }

        $this->collShiftssRelatedById = null;
        foreach ($shiftssRelatedById as $shiftsRelatedById) {
            $this->addShiftsRelatedById($shiftsRelatedById);
        }

        $this->collShiftssRelatedById = $shiftssRelatedById;
        $this->collShiftssRelatedByIdPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Shifts objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related Shifts objects.
     * @throws PropelException
     */
    public function countShiftssRelatedById(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collShiftssRelatedByIdPartial && !$this->isNew();
        if (null === $this->collShiftssRelatedById || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collShiftssRelatedById) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getShiftssRelatedById());
            }

            $query = ChildShiftsQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterBySignups($this)
                ->count($con);
        }

        return count($this->collShiftssRelatedById);
    }

    /**
     * Method called to associate a ChildShifts object to this object
     * through the ChildShifts foreign key attribute.
     *
     * @param  ChildShifts $l ChildShifts
     * @return $this|\Signups The current object (for fluent API support)
     */
    public function addShiftsRelatedById(ChildShifts $l)
    {
        if ($this->collShiftssRelatedById === null) {
            $this->initShiftssRelatedById();
            $this->collShiftssRelatedByIdPartial = true;
        }

        if (!$this->collShiftssRelatedById->contains($l)) {
            $this->doAddShiftsRelatedById($l);
        }

        return $this;
    }

    /**
     * @param ChildShifts $shiftsRelatedById The ChildShifts object to add.
     */
    protected function doAddShiftsRelatedById(ChildShifts $shiftsRelatedById)
    {
        $this->collShiftssRelatedById[]= $shiftsRelatedById;
        $shiftsRelatedById->setSignups($this);
    }

    /**
     * @param  ChildShifts $shiftsRelatedById The ChildShifts object to remove.
     * @return $this|ChildSignups The current object (for fluent API support)
     */
    public function removeShiftsRelatedById(ChildShifts $shiftsRelatedById)
    {
        if ($this->getShiftssRelatedById()->contains($shiftsRelatedById)) {
            $pos = $this->collShiftssRelatedById->search($shiftsRelatedById);
            $this->collShiftssRelatedById->remove($pos);
            if (null === $this->shiftssRelatedByIdScheduledForDeletion) {
                $this->shiftssRelatedByIdScheduledForDeletion = clone $this->collShiftssRelatedById;
                $this->shiftssRelatedByIdScheduledForDeletion->clear();
            }
            $this->shiftssRelatedByIdScheduledForDeletion[]= clone $shiftsRelatedById;
            $shiftsRelatedById->setSignups(null);
        }

        return $this;
    }

    /**
     * Clears the current object, sets all attributes to their default values and removes
     * outgoing references as well as back-references (from other objects to this one. Results probably in a database
     * change of those foreign objects when you call `save` there).
     */
    public function clear()
    {
        if (null !== $this->aMembers) {
            $this->aMembers->removeSignups($this);
        }
        if (null !== $this->aShifts) {
            $this->aShifts->removeSignupsRelatedByShift($this);
        }
        $this->user = null;
        $this->shift = null;
        $this->event = null;
        $this->driver = null;
        $this->chair = null;
        $this->credit = null;
        $this->timestamp = null;
        $this->alreadyInSave = false;
        $this->clearAllReferences();
        $this->applyDefaultValues();
        $this->resetModified();
        $this->setNew(true);
        $this->setDeleted(false);
    }

    /**
     * Resets all references and back-references to other model objects or collections of model objects.
     *
     * This method is used to reset all php object references (not the actual reference in the database).
     * Necessary for object serialisation.
     *
     * @param      boolean $deep Whether to also clear the references on all referrer objects.
     */
    public function clearAllReferences($deep = false)
    {
        if ($deep) {
            if ($this->collShiftssRelatedById) {
                foreach ($this->collShiftssRelatedById as $o) {
                    $o->clearAllReferences($deep);
                }
            }
        } // if ($deep)

        $this->collShiftssRelatedById = null;
        $this->aMembers = null;
        $this->aShifts = null;
    }

    /**
     * Return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(SignupsTableMap::DEFAULT_STRING_FORMAT);
    }

    /**
     * Code to be run before persisting the object
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preSave(ConnectionInterface $con = null)
    {
        return true;
    }

    /**
     * Code to be run after persisting the object
     * @param ConnectionInterface $con
     */
    public function postSave(ConnectionInterface $con = null)
    {

    }

    /**
     * Code to be run before inserting to database
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preInsert(ConnectionInterface $con = null)
    {
        return true;
    }

    /**
     * Code to be run after inserting to database
     * @param ConnectionInterface $con
     */
    public function postInsert(ConnectionInterface $con = null)
    {

    }

    /**
     * Code to be run before updating the object in database
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preUpdate(ConnectionInterface $con = null)
    {
        return true;
    }

    /**
     * Code to be run after updating the object in database
     * @param ConnectionInterface $con
     */
    public function postUpdate(ConnectionInterface $con = null)
    {

    }

    /**
     * Code to be run before deleting the object in database
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preDelete(ConnectionInterface $con = null)
    {
        return true;
    }

    /**
     * Code to be run after deleting the object in database
     * @param ConnectionInterface $con
     */
    public function postDelete(ConnectionInterface $con = null)
    {

    }


    /**
     * Derived method to catches calls to undefined methods.
     *
     * Provides magic import/export method support (fromXML()/toXML(), fromYAML()/toYAML(), etc.).
     * Allows to define default __call() behavior if you overwrite __call()
     *
     * @param string $name
     * @param mixed  $params
     *
     * @return array|string
     */
    public function __call($name, $params)
    {
        if (0 === strpos($name, 'get')) {
            $virtualColumn = substr($name, 3);
            if ($this->hasVirtualColumn($virtualColumn)) {
                return $this->getVirtualColumn($virtualColumn);
            }

            $virtualColumn = lcfirst($virtualColumn);
            if ($this->hasVirtualColumn($virtualColumn)) {
                return $this->getVirtualColumn($virtualColumn);
            }
        }

        if (0 === strpos($name, 'from')) {
            $format = substr($name, 4);

            return $this->importFrom($format, reset($params));
        }

        if (0 === strpos($name, 'to')) {
            $format = substr($name, 2);
            $includeLazyLoadColumns = isset($params[0]) ? $params[0] : true;

            return $this->exportTo($format, $includeLazyLoadColumns);
        }

        throw new BadMethodCallException(sprintf('Call to undefined method: %s.', $name));
    }

}
