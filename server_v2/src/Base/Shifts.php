<?php

namespace Base;

use \Shifts as ChildShifts;
use \ShiftsQuery as ChildShiftsQuery;
use \Signups as ChildSignups;
use \SignupsQuery as ChildSignupsQuery;
use \Exception;
use \PDO;
use Map\ShiftsTableMap;
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
 * Base class that represents a row from the 'shifts' table.
 *
 *
 *
* @package    propel.generator..Base
*/
abstract class Shifts implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\Map\\ShiftsTableMap';


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
     * The value for the id field.
     * @var        int
     */
    protected $id;

    /**
     * The value for the event field.
     * Note: this column has a database default value of: 0
     * @var        int
     */
    protected $event;

    /**
     * The value for the start_time field.
     * Note: this column has a database default value of: '0'
     * @var        string
     */
    protected $start_time;

    /**
     * The value for the end_time field.
     * Note: this column has a database default value of: '0'
     * @var        string
     */
    protected $end_time;

    /**
     * The value for the open_to field.
     * Note: this column has a database default value of: 0
     * @var        int
     */
    protected $open_to;

    /**
     * The value for the cap field.
     * Note: this column has a database default value of: -1
     * @var        int
     */
    protected $cap;

    /**
     * The value for the description field.
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $description;

    /**
     * @var        ChildSignups
     */
    protected $aSignups;

    /**
     * @var        ObjectCollection|ChildSignups[] Collection to store aggregation of ChildSignups objects.
     */
    protected $collSignupssRelatedByShift;
    protected $collSignupssRelatedByShiftPartial;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     *
     * @var boolean
     */
    protected $alreadyInSave = false;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildSignups[]
     */
    protected $signupssRelatedByShiftScheduledForDeletion = null;

    /**
     * Applies default values to this object.
     * This method should be called from the object's constructor (or
     * equivalent initialization method).
     * @see __construct()
     */
    public function applyDefaultValues()
    {
        $this->event = 0;
        $this->start_time = '0';
        $this->end_time = '0';
        $this->open_to = 0;
        $this->cap = -1;
        $this->description = '';
    }

    /**
     * Initializes internal state of Base\Shifts object.
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
     * Compares this with another <code>Shifts</code> instance.  If
     * <code>obj</code> is an instance of <code>Shifts</code>, delegates to
     * <code>equals(Shifts)</code>.  Otherwise, returns <code>false</code>.
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
     * @return $this|Shifts The current object, for fluid interface
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
     * Get the [id] column value.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
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
     * Get the [start_time] column value.
     *
     * @return string
     */
    public function getStartTime()
    {
        return $this->start_time;
    }

    /**
     * Get the [end_time] column value.
     *
     * @return string
     */
    public function getEndTime()
    {
        return $this->end_time;
    }

    /**
     * Get the [open_to] column value.
     *
     * @return int
     */
    public function getOpenTo()
    {
        return $this->open_to;
    }

    /**
     * Get the [cap] column value.
     *
     * @return int
     */
    public function getCap()
    {
        return $this->cap;
    }

    /**
     * Get the [description] column value.
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of [id] column.
     *
     * @param int $v new value
     * @return $this|\Shifts The current object (for fluent API support)
     */
    public function setId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[ShiftsTableMap::COL_ID] = true;
        }

        if ($this->aSignups !== null && $this->aSignups->getShift() !== $v) {
            $this->aSignups = null;
        }

        return $this;
    } // setId()

    /**
     * Set the value of [event] column.
     *
     * @param int $v new value
     * @return $this|\Shifts The current object (for fluent API support)
     */
    public function setEvent($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->event !== $v) {
            $this->event = $v;
            $this->modifiedColumns[ShiftsTableMap::COL_EVENT] = true;
        }

        return $this;
    } // setEvent()

    /**
     * Set the value of [start_time] column.
     *
     * @param string $v new value
     * @return $this|\Shifts The current object (for fluent API support)
     */
    public function setStartTime($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->start_time !== $v) {
            $this->start_time = $v;
            $this->modifiedColumns[ShiftsTableMap::COL_START_TIME] = true;
        }

        return $this;
    } // setStartTime()

    /**
     * Set the value of [end_time] column.
     *
     * @param string $v new value
     * @return $this|\Shifts The current object (for fluent API support)
     */
    public function setEndTime($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->end_time !== $v) {
            $this->end_time = $v;
            $this->modifiedColumns[ShiftsTableMap::COL_END_TIME] = true;
        }

        return $this;
    } // setEndTime()

    /**
     * Set the value of [open_to] column.
     *
     * @param int $v new value
     * @return $this|\Shifts The current object (for fluent API support)
     */
    public function setOpenTo($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->open_to !== $v) {
            $this->open_to = $v;
            $this->modifiedColumns[ShiftsTableMap::COL_OPEN_TO] = true;
        }

        return $this;
    } // setOpenTo()

    /**
     * Set the value of [cap] column.
     *
     * @param int $v new value
     * @return $this|\Shifts The current object (for fluent API support)
     */
    public function setCap($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->cap !== $v) {
            $this->cap = $v;
            $this->modifiedColumns[ShiftsTableMap::COL_CAP] = true;
        }

        return $this;
    } // setCap()

    /**
     * Set the value of [description] column.
     *
     * @param string $v new value
     * @return $this|\Shifts The current object (for fluent API support)
     */
    public function setDescription($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->description !== $v) {
            $this->description = $v;
            $this->modifiedColumns[ShiftsTableMap::COL_DESCRIPTION] = true;
        }

        return $this;
    } // setDescription()

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
            if ($this->event !== 0) {
                return false;
            }

            if ($this->start_time !== '0') {
                return false;
            }

            if ($this->end_time !== '0') {
                return false;
            }

            if ($this->open_to !== 0) {
                return false;
            }

            if ($this->cap !== -1) {
                return false;
            }

            if ($this->description !== '') {
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

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : ShiftsTableMap::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : ShiftsTableMap::translateFieldName('Event', TableMap::TYPE_PHPNAME, $indexType)];
            $this->event = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : ShiftsTableMap::translateFieldName('StartTime', TableMap::TYPE_PHPNAME, $indexType)];
            $this->start_time = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : ShiftsTableMap::translateFieldName('EndTime', TableMap::TYPE_PHPNAME, $indexType)];
            $this->end_time = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : ShiftsTableMap::translateFieldName('OpenTo', TableMap::TYPE_PHPNAME, $indexType)];
            $this->open_to = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : ShiftsTableMap::translateFieldName('Cap', TableMap::TYPE_PHPNAME, $indexType)];
            $this->cap = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 6 + $startcol : ShiftsTableMap::translateFieldName('Description', TableMap::TYPE_PHPNAME, $indexType)];
            $this->description = (null !== $col) ? (string) $col : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 7; // 7 = ShiftsTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\Shifts'), 0, $e);
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
        if ($this->aSignups !== null && $this->id !== $this->aSignups->getShift()) {
            $this->aSignups = null;
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
            $con = Propel::getServiceContainer()->getReadConnection(ShiftsTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildShiftsQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
        $row = $dataFetcher->fetch();
        $dataFetcher->close();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true, $dataFetcher->getIndexType()); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aSignups = null;
            $this->collSignupssRelatedByShift = null;

        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param      ConnectionInterface $con
     * @return void
     * @throws PropelException
     * @see Shifts::setDeleted()
     * @see Shifts::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(ShiftsTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildShiftsQuery::create()
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
            $con = Propel::getServiceContainer()->getWriteConnection(ShiftsTableMap::DATABASE_NAME);
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
                ShiftsTableMap::addInstanceToPool($this);
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

            if ($this->aSignups !== null) {
                if ($this->aSignups->isModified() || $this->aSignups->isNew()) {
                    $affectedRows += $this->aSignups->save($con);
                }
                $this->setSignups($this->aSignups);
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

            if ($this->signupssRelatedByShiftScheduledForDeletion !== null) {
                if (!$this->signupssRelatedByShiftScheduledForDeletion->isEmpty()) {
                    \SignupsQuery::create()
                        ->filterByPrimaryKeys($this->signupssRelatedByShiftScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->signupssRelatedByShiftScheduledForDeletion = null;
                }
            }

            if ($this->collSignupssRelatedByShift !== null) {
                foreach ($this->collSignupssRelatedByShift as $referrerFK) {
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
        if ($this->isColumnModified(ShiftsTableMap::COL_ID)) {
            $modifiedColumns[':p' . $index++]  = 'id';
        }
        if ($this->isColumnModified(ShiftsTableMap::COL_EVENT)) {
            $modifiedColumns[':p' . $index++]  = 'event';
        }
        if ($this->isColumnModified(ShiftsTableMap::COL_START_TIME)) {
            $modifiedColumns[':p' . $index++]  = 'start_time';
        }
        if ($this->isColumnModified(ShiftsTableMap::COL_END_TIME)) {
            $modifiedColumns[':p' . $index++]  = 'end_time';
        }
        if ($this->isColumnModified(ShiftsTableMap::COL_OPEN_TO)) {
            $modifiedColumns[':p' . $index++]  = 'open_to';
        }
        if ($this->isColumnModified(ShiftsTableMap::COL_CAP)) {
            $modifiedColumns[':p' . $index++]  = 'cap';
        }
        if ($this->isColumnModified(ShiftsTableMap::COL_DESCRIPTION)) {
            $modifiedColumns[':p' . $index++]  = 'description';
        }

        $sql = sprintf(
            'INSERT INTO shifts (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case 'id':
                        $stmt->bindValue($identifier, $this->id, PDO::PARAM_INT);
                        break;
                    case 'event':
                        $stmt->bindValue($identifier, $this->event, PDO::PARAM_INT);
                        break;
                    case 'start_time':
                        $stmt->bindValue($identifier, $this->start_time, PDO::PARAM_INT);
                        break;
                    case 'end_time':
                        $stmt->bindValue($identifier, $this->end_time, PDO::PARAM_INT);
                        break;
                    case 'open_to':
                        $stmt->bindValue($identifier, $this->open_to, PDO::PARAM_INT);
                        break;
                    case 'cap':
                        $stmt->bindValue($identifier, $this->cap, PDO::PARAM_INT);
                        break;
                    case 'description':
                        $stmt->bindValue($identifier, $this->description, PDO::PARAM_STR);
                        break;
                }
            }
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute INSERT statement [%s]', $sql), 0, $e);
        }

        try {
            $pk = $con->lastInsertId();
        } catch (Exception $e) {
            throw new PropelException('Unable to get autoincrement id.', 0, $e);
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
        $pos = ShiftsTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
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
                return $this->getId();
                break;
            case 1:
                return $this->getEvent();
                break;
            case 2:
                return $this->getStartTime();
                break;
            case 3:
                return $this->getEndTime();
                break;
            case 4:
                return $this->getOpenTo();
                break;
            case 5:
                return $this->getCap();
                break;
            case 6:
                return $this->getDescription();
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

        if (isset($alreadyDumpedObjects['Shifts'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Shifts'][$this->hashCode()] = true;
        $keys = ShiftsTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getId(),
            $keys[1] => $this->getEvent(),
            $keys[2] => $this->getStartTime(),
            $keys[3] => $this->getEndTime(),
            $keys[4] => $this->getOpenTo(),
            $keys[5] => $this->getCap(),
            $keys[6] => $this->getDescription(),
        );
        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
            if (null !== $this->aSignups) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'signups';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'signups';
                        break;
                    default:
                        $key = 'Signups';
                }

                $result[$key] = $this->aSignups->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collSignupssRelatedByShift) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'signupss';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'signupss';
                        break;
                    default:
                        $key = 'Signupss';
                }

                $result[$key] = $this->collSignupssRelatedByShift->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
     * @return $this|\Shifts
     */
    public function setByName($name, $value, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = ShiftsTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\Shifts
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setId($value);
                break;
            case 1:
                $this->setEvent($value);
                break;
            case 2:
                $this->setStartTime($value);
                break;
            case 3:
                $this->setEndTime($value);
                break;
            case 4:
                $this->setOpenTo($value);
                break;
            case 5:
                $this->setCap($value);
                break;
            case 6:
                $this->setDescription($value);
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
        $keys = ShiftsTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setId($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setEvent($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setStartTime($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setEndTime($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setOpenTo($arr[$keys[4]]);
        }
        if (array_key_exists($keys[5], $arr)) {
            $this->setCap($arr[$keys[5]]);
        }
        if (array_key_exists($keys[6], $arr)) {
            $this->setDescription($arr[$keys[6]]);
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
     * @return $this|\Shifts The current object, for fluid interface
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
        $criteria = new Criteria(ShiftsTableMap::DATABASE_NAME);

        if ($this->isColumnModified(ShiftsTableMap::COL_ID)) {
            $criteria->add(ShiftsTableMap::COL_ID, $this->id);
        }
        if ($this->isColumnModified(ShiftsTableMap::COL_EVENT)) {
            $criteria->add(ShiftsTableMap::COL_EVENT, $this->event);
        }
        if ($this->isColumnModified(ShiftsTableMap::COL_START_TIME)) {
            $criteria->add(ShiftsTableMap::COL_START_TIME, $this->start_time);
        }
        if ($this->isColumnModified(ShiftsTableMap::COL_END_TIME)) {
            $criteria->add(ShiftsTableMap::COL_END_TIME, $this->end_time);
        }
        if ($this->isColumnModified(ShiftsTableMap::COL_OPEN_TO)) {
            $criteria->add(ShiftsTableMap::COL_OPEN_TO, $this->open_to);
        }
        if ($this->isColumnModified(ShiftsTableMap::COL_CAP)) {
            $criteria->add(ShiftsTableMap::COL_CAP, $this->cap);
        }
        if ($this->isColumnModified(ShiftsTableMap::COL_DESCRIPTION)) {
            $criteria->add(ShiftsTableMap::COL_DESCRIPTION, $this->description);
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
        throw new LogicException('The Shifts object has no primary key');

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
     * @param      object $copyObj An object of \Shifts (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setEvent($this->getEvent());
        $copyObj->setStartTime($this->getStartTime());
        $copyObj->setEndTime($this->getEndTime());
        $copyObj->setOpenTo($this->getOpenTo());
        $copyObj->setCap($this->getCap());
        $copyObj->setDescription($this->getDescription());

        if ($deepCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);

            foreach ($this->getSignupssRelatedByShift() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addSignupsRelatedByShift($relObj->copy($deepCopy));
                }
            }

        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setId(NULL); // this is a auto-increment column, so set to default value
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
     * @return \Shifts Clone of current object.
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
     * Declares an association between this object and a ChildSignups object.
     *
     * @param  ChildSignups $v
     * @return $this|\Shifts The current object (for fluent API support)
     * @throws PropelException
     */
    public function setSignups(ChildSignups $v = null)
    {
        if ($v === null) {
            $this->setId(NULL);
        } else {
            $this->setId($v->getShift());
        }

        $this->aSignups = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildSignups object, it will not be re-added.
        if ($v !== null) {
            $v->addShiftsRelatedById($this);
        }


        return $this;
    }


    /**
     * Get the associated ChildSignups object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return ChildSignups The associated ChildSignups object.
     * @throws PropelException
     */
    public function getSignups(ConnectionInterface $con = null)
    {
        if ($this->aSignups === null && ($this->id !== null)) {
            $this->aSignups = ChildSignupsQuery::create()
                ->filterByShiftsRelatedById($this) // here
                ->findOne($con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aSignups->addShiftssRelatedById($this);
             */
        }

        return $this->aSignups;
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
        if ('SignupsRelatedByShift' == $relationName) {
            return $this->initSignupssRelatedByShift();
        }
    }

    /**
     * Clears out the collSignupssRelatedByShift collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addSignupssRelatedByShift()
     */
    public function clearSignupssRelatedByShift()
    {
        $this->collSignupssRelatedByShift = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collSignupssRelatedByShift collection loaded partially.
     */
    public function resetPartialSignupssRelatedByShift($v = true)
    {
        $this->collSignupssRelatedByShiftPartial = $v;
    }

    /**
     * Initializes the collSignupssRelatedByShift collection.
     *
     * By default this just sets the collSignupssRelatedByShift collection to an empty array (like clearcollSignupssRelatedByShift());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initSignupssRelatedByShift($overrideExisting = true)
    {
        if (null !== $this->collSignupssRelatedByShift && !$overrideExisting) {
            return;
        }
        $this->collSignupssRelatedByShift = new ObjectCollection();
        $this->collSignupssRelatedByShift->setModel('\Signups');
    }

    /**
     * Gets an array of ChildSignups objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildShifts is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildSignups[] List of ChildSignups objects
     * @throws PropelException
     */
    public function getSignupssRelatedByShift(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collSignupssRelatedByShiftPartial && !$this->isNew();
        if (null === $this->collSignupssRelatedByShift || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collSignupssRelatedByShift) {
                // return empty collection
                $this->initSignupssRelatedByShift();
            } else {
                $collSignupssRelatedByShift = ChildSignupsQuery::create(null, $criteria)
                    ->filterByShifts($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collSignupssRelatedByShiftPartial && count($collSignupssRelatedByShift)) {
                        $this->initSignupssRelatedByShift(false);

                        foreach ($collSignupssRelatedByShift as $obj) {
                            if (false == $this->collSignupssRelatedByShift->contains($obj)) {
                                $this->collSignupssRelatedByShift->append($obj);
                            }
                        }

                        $this->collSignupssRelatedByShiftPartial = true;
                    }

                    return $collSignupssRelatedByShift;
                }

                if ($partial && $this->collSignupssRelatedByShift) {
                    foreach ($this->collSignupssRelatedByShift as $obj) {
                        if ($obj->isNew()) {
                            $collSignupssRelatedByShift[] = $obj;
                        }
                    }
                }

                $this->collSignupssRelatedByShift = $collSignupssRelatedByShift;
                $this->collSignupssRelatedByShiftPartial = false;
            }
        }

        return $this->collSignupssRelatedByShift;
    }

    /**
     * Sets a collection of ChildSignups objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $signupssRelatedByShift A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildShifts The current object (for fluent API support)
     */
    public function setSignupssRelatedByShift(Collection $signupssRelatedByShift, ConnectionInterface $con = null)
    {
        /** @var ChildSignups[] $signupssRelatedByShiftToDelete */
        $signupssRelatedByShiftToDelete = $this->getSignupssRelatedByShift(new Criteria(), $con)->diff($signupssRelatedByShift);


        $this->signupssRelatedByShiftScheduledForDeletion = $signupssRelatedByShiftToDelete;

        foreach ($signupssRelatedByShiftToDelete as $signupsRelatedByShiftRemoved) {
            $signupsRelatedByShiftRemoved->setShifts(null);
        }

        $this->collSignupssRelatedByShift = null;
        foreach ($signupssRelatedByShift as $signupsRelatedByShift) {
            $this->addSignupsRelatedByShift($signupsRelatedByShift);
        }

        $this->collSignupssRelatedByShift = $signupssRelatedByShift;
        $this->collSignupssRelatedByShiftPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Signups objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related Signups objects.
     * @throws PropelException
     */
    public function countSignupssRelatedByShift(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collSignupssRelatedByShiftPartial && !$this->isNew();
        if (null === $this->collSignupssRelatedByShift || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collSignupssRelatedByShift) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getSignupssRelatedByShift());
            }

            $query = ChildSignupsQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByShifts($this)
                ->count($con);
        }

        return count($this->collSignupssRelatedByShift);
    }

    /**
     * Method called to associate a ChildSignups object to this object
     * through the ChildSignups foreign key attribute.
     *
     * @param  ChildSignups $l ChildSignups
     * @return $this|\Shifts The current object (for fluent API support)
     */
    public function addSignupsRelatedByShift(ChildSignups $l)
    {
        if ($this->collSignupssRelatedByShift === null) {
            $this->initSignupssRelatedByShift();
            $this->collSignupssRelatedByShiftPartial = true;
        }

        if (!$this->collSignupssRelatedByShift->contains($l)) {
            $this->doAddSignupsRelatedByShift($l);
        }

        return $this;
    }

    /**
     * @param ChildSignups $signupsRelatedByShift The ChildSignups object to add.
     */
    protected function doAddSignupsRelatedByShift(ChildSignups $signupsRelatedByShift)
    {
        $this->collSignupssRelatedByShift[]= $signupsRelatedByShift;
        $signupsRelatedByShift->setShifts($this);
    }

    /**
     * @param  ChildSignups $signupsRelatedByShift The ChildSignups object to remove.
     * @return $this|ChildShifts The current object (for fluent API support)
     */
    public function removeSignupsRelatedByShift(ChildSignups $signupsRelatedByShift)
    {
        if ($this->getSignupssRelatedByShift()->contains($signupsRelatedByShift)) {
            $pos = $this->collSignupssRelatedByShift->search($signupsRelatedByShift);
            $this->collSignupssRelatedByShift->remove($pos);
            if (null === $this->signupssRelatedByShiftScheduledForDeletion) {
                $this->signupssRelatedByShiftScheduledForDeletion = clone $this->collSignupssRelatedByShift;
                $this->signupssRelatedByShiftScheduledForDeletion->clear();
            }
            $this->signupssRelatedByShiftScheduledForDeletion[]= clone $signupsRelatedByShift;
            $signupsRelatedByShift->setShifts(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Shifts is new, it will return
     * an empty collection; or if this Shifts has previously
     * been saved, it will retrieve related SignupssRelatedByShift from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Shifts.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildSignups[] List of ChildSignups objects
     */
    public function getSignupssRelatedByShiftJoinMembers(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildSignupsQuery::create(null, $criteria);
        $query->joinWith('Members', $joinBehavior);

        return $this->getSignupssRelatedByShift($query, $con);
    }

    /**
     * Clears the current object, sets all attributes to their default values and removes
     * outgoing references as well as back-references (from other objects to this one. Results probably in a database
     * change of those foreign objects when you call `save` there).
     */
    public function clear()
    {
        if (null !== $this->aSignups) {
            $this->aSignups->removeShiftsRelatedById($this);
        }
        $this->id = null;
        $this->event = null;
        $this->start_time = null;
        $this->end_time = null;
        $this->open_to = null;
        $this->cap = null;
        $this->description = null;
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
            if ($this->collSignupssRelatedByShift) {
                foreach ($this->collSignupssRelatedByShift as $o) {
                    $o->clearAllReferences($deep);
                }
            }
        } // if ($deep)

        $this->collSignupssRelatedByShift = null;
        $this->aSignups = null;
    }

    /**
     * Return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(ShiftsTableMap::DEFAULT_STRING_FORMAT);
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
