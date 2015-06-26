<?php

namespace Base;

use \Events as ChildEvents;
use \EventsQuery as ChildEventsQuery;
use \Signups as ChildSignups;
use \SignupsQuery as ChildSignupsQuery;
use \Exception;
use \PDO;
use Map\EventsTableMap;
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
 * Base class that represents a row from the 'events' table.
 *
 *
 *
* @package    propel.generator..Base
*/
abstract class Events implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\Map\\EventsTableMap';


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
     * The value for the name field.
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $name;

    /**
     * The value for the event_code field.
     * Note: this column has a database default value of: 0
     * @var        int
     */
    protected $event_code;

    /**
     * The value for the date field.
     * Note: this column has a database default value of: '0'
     * @var        string
     */
    protected $date;

    /**
     * The value for the location field.
     * @var        string
     */
    protected $location;

    /**
     * The value for the meet_location field.
     * @var        string
     */
    protected $meet_location;

    /**
     * The value for the meet_time field.
     * @var        string
     */
    protected $meet_time;

    /**
     * The value for the description field.
     * @var        string
     */
    protected $description;

    /**
     * The value for the drivers_needed field.
     * Note: this column has a database default value of: 0
     * @var        int
     */
    protected $drivers_needed;

    /**
     * The value for the created_by field.
     * Note: this column has a database default value of: 0
     * @var        int
     */
    protected $created_by;

    /**
     * The value for the log_posted field.
     * Note: this column has a database default value of: false
     * @var        boolean
     */
    protected $log_posted;

    /**
     * The value for the log_description field.
     * @var        string
     */
    protected $log_description;

    /**
     * The value for the log_comments field.
     * @var        string
     */
    protected $log_comments;

    /**
     * The value for the log_improvements field.
     * @var        string
     */
    protected $log_improvements;

    /**
     * The value for the log_reattend field.
     * @var        string
     */
    protected $log_reattend;

    /**
     * The value for the organization field.
     * @var        string
     */
    protected $organization;

    /**
     * The value for the contact_name field.
     * @var        string
     */
    protected $contact_name;

    /**
     * The value for the contact_phone field.
     * @var        string
     */
    protected $contact_phone;

    /**
     * The value for the frat_expense field.
     * @var        double
     */
    protected $frat_expense;

    /**
     * The value for the loged_by field.
     * @var        int
     */
    protected $loged_by;

    /**
     * The value for the verified field.
     * Note: this column has a database default value of: false
     * @var        boolean
     */
    protected $verified;

    /**
     * @var        ObjectCollection|ChildSignups[] Collection to store aggregation of ChildSignups objects.
     */
    protected $collSignupss;
    protected $collSignupssPartial;

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
    protected $signupssScheduledForDeletion = null;

    /**
     * Applies default values to this object.
     * This method should be called from the object's constructor (or
     * equivalent initialization method).
     * @see __construct()
     */
    public function applyDefaultValues()
    {
        $this->name = '';
        $this->event_code = 0;
        $this->date = '0';
        $this->drivers_needed = 0;
        $this->created_by = 0;
        $this->log_posted = false;
        $this->verified = false;
    }

    /**
     * Initializes internal state of Base\Events object.
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
     * Compares this with another <code>Events</code> instance.  If
     * <code>obj</code> is an instance of <code>Events</code>, delegates to
     * <code>equals(Events)</code>.  Otherwise, returns <code>false</code>.
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
     * @return $this|Events The current object, for fluid interface
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
     * Get the [name] column value.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Get the [event_code] column value.
     *
     * @return int
     */
    public function getEventCode()
    {
        return $this->event_code;
    }

    /**
     * Get the [date] column value.
     *
     * @return string
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Get the [location] column value.
     *
     * @return string
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * Get the [meet_location] column value.
     *
     * @return string
     */
    public function getMeetLocation()
    {
        return $this->meet_location;
    }

    /**
     * Get the [meet_time] column value.
     *
     * @return string
     */
    public function getMeetTime()
    {
        return $this->meet_time;
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
     * Get the [drivers_needed] column value.
     *
     * @return int
     */
    public function getDriversNeeded()
    {
        return $this->drivers_needed;
    }

    /**
     * Get the [created_by] column value.
     *
     * @return int
     */
    public function getCreatedBy()
    {
        return $this->created_by;
    }

    /**
     * Get the [log_posted] column value.
     *
     * @return boolean
     */
    public function getLogPosted()
    {
        return $this->log_posted;
    }

    /**
     * Get the [log_posted] column value.
     *
     * @return boolean
     */
    public function isLogPosted()
    {
        return $this->getLogPosted();
    }

    /**
     * Get the [log_description] column value.
     *
     * @return string
     */
    public function getLogDescription()
    {
        return $this->log_description;
    }

    /**
     * Get the [log_comments] column value.
     *
     * @return string
     */
    public function getLogComments()
    {
        return $this->log_comments;
    }

    /**
     * Get the [log_improvements] column value.
     *
     * @return string
     */
    public function getLogImprovements()
    {
        return $this->log_improvements;
    }

    /**
     * Get the [log_reattend] column value.
     *
     * @return string
     */
    public function getLogReattend()
    {
        return $this->log_reattend;
    }

    /**
     * Get the [organization] column value.
     *
     * @return string
     */
    public function getOrganization()
    {
        return $this->organization;
    }

    /**
     * Get the [contact_name] column value.
     *
     * @return string
     */
    public function getContactName()
    {
        return $this->contact_name;
    }

    /**
     * Get the [contact_phone] column value.
     *
     * @return string
     */
    public function getContactPhone()
    {
        return $this->contact_phone;
    }

    /**
     * Get the [frat_expense] column value.
     *
     * @return double
     */
    public function getFratExpense()
    {
        return $this->frat_expense;
    }

    /**
     * Get the [loged_by] column value.
     *
     * @return int
     */
    public function getLogedBy()
    {
        return $this->loged_by;
    }

    /**
     * Get the [verified] column value.
     *
     * @return boolean
     */
    public function getVerified()
    {
        return $this->verified;
    }

    /**
     * Get the [verified] column value.
     *
     * @return boolean
     */
    public function isVerified()
    {
        return $this->getVerified();
    }

    /**
     * Set the value of [id] column.
     *
     * @param int $v new value
     * @return $this|\Events The current object (for fluent API support)
     */
    public function setId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[EventsTableMap::COL_ID] = true;
        }

        return $this;
    } // setId()

    /**
     * Set the value of [name] column.
     *
     * @param string $v new value
     * @return $this|\Events The current object (for fluent API support)
     */
    public function setName($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->name !== $v) {
            $this->name = $v;
            $this->modifiedColumns[EventsTableMap::COL_NAME] = true;
        }

        return $this;
    } // setName()

    /**
     * Set the value of [event_code] column.
     *
     * @param int $v new value
     * @return $this|\Events The current object (for fluent API support)
     */
    public function setEventCode($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->event_code !== $v) {
            $this->event_code = $v;
            $this->modifiedColumns[EventsTableMap::COL_EVENT_CODE] = true;
        }

        return $this;
    } // setEventCode()

    /**
     * Set the value of [date] column.
     *
     * @param string $v new value
     * @return $this|\Events The current object (for fluent API support)
     */
    public function setDate($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->date !== $v) {
            $this->date = $v;
            $this->modifiedColumns[EventsTableMap::COL_DATE] = true;
        }

        return $this;
    } // setDate()

    /**
     * Set the value of [location] column.
     *
     * @param string $v new value
     * @return $this|\Events The current object (for fluent API support)
     */
    public function setLocation($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->location !== $v) {
            $this->location = $v;
            $this->modifiedColumns[EventsTableMap::COL_LOCATION] = true;
        }

        return $this;
    } // setLocation()

    /**
     * Set the value of [meet_location] column.
     *
     * @param string $v new value
     * @return $this|\Events The current object (for fluent API support)
     */
    public function setMeetLocation($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->meet_location !== $v) {
            $this->meet_location = $v;
            $this->modifiedColumns[EventsTableMap::COL_MEET_LOCATION] = true;
        }

        return $this;
    } // setMeetLocation()

    /**
     * Set the value of [meet_time] column.
     *
     * @param string $v new value
     * @return $this|\Events The current object (for fluent API support)
     */
    public function setMeetTime($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->meet_time !== $v) {
            $this->meet_time = $v;
            $this->modifiedColumns[EventsTableMap::COL_MEET_TIME] = true;
        }

        return $this;
    } // setMeetTime()

    /**
     * Set the value of [description] column.
     *
     * @param string $v new value
     * @return $this|\Events The current object (for fluent API support)
     */
    public function setDescription($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->description !== $v) {
            $this->description = $v;
            $this->modifiedColumns[EventsTableMap::COL_DESCRIPTION] = true;
        }

        return $this;
    } // setDescription()

    /**
     * Set the value of [drivers_needed] column.
     *
     * @param int $v new value
     * @return $this|\Events The current object (for fluent API support)
     */
    public function setDriversNeeded($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->drivers_needed !== $v) {
            $this->drivers_needed = $v;
            $this->modifiedColumns[EventsTableMap::COL_DRIVERS_NEEDED] = true;
        }

        return $this;
    } // setDriversNeeded()

    /**
     * Set the value of [created_by] column.
     *
     * @param int $v new value
     * @return $this|\Events The current object (for fluent API support)
     */
    public function setCreatedBy($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->created_by !== $v) {
            $this->created_by = $v;
            $this->modifiedColumns[EventsTableMap::COL_CREATED_BY] = true;
        }

        return $this;
    } // setCreatedBy()

    /**
     * Sets the value of the [log_posted] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param  boolean|integer|string $v The new value
     * @return $this|\Events The current object (for fluent API support)
     */
    public function setLogPosted($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->log_posted !== $v) {
            $this->log_posted = $v;
            $this->modifiedColumns[EventsTableMap::COL_LOG_POSTED] = true;
        }

        return $this;
    } // setLogPosted()

    /**
     * Set the value of [log_description] column.
     *
     * @param string $v new value
     * @return $this|\Events The current object (for fluent API support)
     */
    public function setLogDescription($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->log_description !== $v) {
            $this->log_description = $v;
            $this->modifiedColumns[EventsTableMap::COL_LOG_DESCRIPTION] = true;
        }

        return $this;
    } // setLogDescription()

    /**
     * Set the value of [log_comments] column.
     *
     * @param string $v new value
     * @return $this|\Events The current object (for fluent API support)
     */
    public function setLogComments($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->log_comments !== $v) {
            $this->log_comments = $v;
            $this->modifiedColumns[EventsTableMap::COL_LOG_COMMENTS] = true;
        }

        return $this;
    } // setLogComments()

    /**
     * Set the value of [log_improvements] column.
     *
     * @param string $v new value
     * @return $this|\Events The current object (for fluent API support)
     */
    public function setLogImprovements($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->log_improvements !== $v) {
            $this->log_improvements = $v;
            $this->modifiedColumns[EventsTableMap::COL_LOG_IMPROVEMENTS] = true;
        }

        return $this;
    } // setLogImprovements()

    /**
     * Set the value of [log_reattend] column.
     *
     * @param string $v new value
     * @return $this|\Events The current object (for fluent API support)
     */
    public function setLogReattend($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->log_reattend !== $v) {
            $this->log_reattend = $v;
            $this->modifiedColumns[EventsTableMap::COL_LOG_REATTEND] = true;
        }

        return $this;
    } // setLogReattend()

    /**
     * Set the value of [organization] column.
     *
     * @param string $v new value
     * @return $this|\Events The current object (for fluent API support)
     */
    public function setOrganization($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->organization !== $v) {
            $this->organization = $v;
            $this->modifiedColumns[EventsTableMap::COL_ORGANIZATION] = true;
        }

        return $this;
    } // setOrganization()

    /**
     * Set the value of [contact_name] column.
     *
     * @param string $v new value
     * @return $this|\Events The current object (for fluent API support)
     */
    public function setContactName($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->contact_name !== $v) {
            $this->contact_name = $v;
            $this->modifiedColumns[EventsTableMap::COL_CONTACT_NAME] = true;
        }

        return $this;
    } // setContactName()

    /**
     * Set the value of [contact_phone] column.
     *
     * @param string $v new value
     * @return $this|\Events The current object (for fluent API support)
     */
    public function setContactPhone($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->contact_phone !== $v) {
            $this->contact_phone = $v;
            $this->modifiedColumns[EventsTableMap::COL_CONTACT_PHONE] = true;
        }

        return $this;
    } // setContactPhone()

    /**
     * Set the value of [frat_expense] column.
     *
     * @param double $v new value
     * @return $this|\Events The current object (for fluent API support)
     */
    public function setFratExpense($v)
    {
        if ($v !== null) {
            $v = (double) $v;
        }

        if ($this->frat_expense !== $v) {
            $this->frat_expense = $v;
            $this->modifiedColumns[EventsTableMap::COL_FRAT_EXPENSE] = true;
        }

        return $this;
    } // setFratExpense()

    /**
     * Set the value of [loged_by] column.
     *
     * @param int $v new value
     * @return $this|\Events The current object (for fluent API support)
     */
    public function setLogedBy($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->loged_by !== $v) {
            $this->loged_by = $v;
            $this->modifiedColumns[EventsTableMap::COL_LOGED_BY] = true;
        }

        return $this;
    } // setLogedBy()

    /**
     * Sets the value of the [verified] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param  boolean|integer|string $v The new value
     * @return $this|\Events The current object (for fluent API support)
     */
    public function setVerified($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->verified !== $v) {
            $this->verified = $v;
            $this->modifiedColumns[EventsTableMap::COL_VERIFIED] = true;
        }

        return $this;
    } // setVerified()

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
            if ($this->name !== '') {
                return false;
            }

            if ($this->event_code !== 0) {
                return false;
            }

            if ($this->date !== '0') {
                return false;
            }

            if ($this->drivers_needed !== 0) {
                return false;
            }

            if ($this->created_by !== 0) {
                return false;
            }

            if ($this->log_posted !== false) {
                return false;
            }

            if ($this->verified !== false) {
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

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : EventsTableMap::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : EventsTableMap::translateFieldName('Name', TableMap::TYPE_PHPNAME, $indexType)];
            $this->name = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : EventsTableMap::translateFieldName('EventCode', TableMap::TYPE_PHPNAME, $indexType)];
            $this->event_code = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : EventsTableMap::translateFieldName('Date', TableMap::TYPE_PHPNAME, $indexType)];
            $this->date = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : EventsTableMap::translateFieldName('Location', TableMap::TYPE_PHPNAME, $indexType)];
            $this->location = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : EventsTableMap::translateFieldName('MeetLocation', TableMap::TYPE_PHPNAME, $indexType)];
            $this->meet_location = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 6 + $startcol : EventsTableMap::translateFieldName('MeetTime', TableMap::TYPE_PHPNAME, $indexType)];
            $this->meet_time = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 7 + $startcol : EventsTableMap::translateFieldName('Description', TableMap::TYPE_PHPNAME, $indexType)];
            $this->description = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 8 + $startcol : EventsTableMap::translateFieldName('DriversNeeded', TableMap::TYPE_PHPNAME, $indexType)];
            $this->drivers_needed = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 9 + $startcol : EventsTableMap::translateFieldName('CreatedBy', TableMap::TYPE_PHPNAME, $indexType)];
            $this->created_by = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 10 + $startcol : EventsTableMap::translateFieldName('LogPosted', TableMap::TYPE_PHPNAME, $indexType)];
            $this->log_posted = (null !== $col) ? (boolean) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 11 + $startcol : EventsTableMap::translateFieldName('LogDescription', TableMap::TYPE_PHPNAME, $indexType)];
            $this->log_description = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 12 + $startcol : EventsTableMap::translateFieldName('LogComments', TableMap::TYPE_PHPNAME, $indexType)];
            $this->log_comments = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 13 + $startcol : EventsTableMap::translateFieldName('LogImprovements', TableMap::TYPE_PHPNAME, $indexType)];
            $this->log_improvements = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 14 + $startcol : EventsTableMap::translateFieldName('LogReattend', TableMap::TYPE_PHPNAME, $indexType)];
            $this->log_reattend = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 15 + $startcol : EventsTableMap::translateFieldName('Organization', TableMap::TYPE_PHPNAME, $indexType)];
            $this->organization = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 16 + $startcol : EventsTableMap::translateFieldName('ContactName', TableMap::TYPE_PHPNAME, $indexType)];
            $this->contact_name = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 17 + $startcol : EventsTableMap::translateFieldName('ContactPhone', TableMap::TYPE_PHPNAME, $indexType)];
            $this->contact_phone = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 18 + $startcol : EventsTableMap::translateFieldName('FratExpense', TableMap::TYPE_PHPNAME, $indexType)];
            $this->frat_expense = (null !== $col) ? (double) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 19 + $startcol : EventsTableMap::translateFieldName('LogedBy', TableMap::TYPE_PHPNAME, $indexType)];
            $this->loged_by = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 20 + $startcol : EventsTableMap::translateFieldName('Verified', TableMap::TYPE_PHPNAME, $indexType)];
            $this->verified = (null !== $col) ? (boolean) $col : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 21; // 21 = EventsTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\Events'), 0, $e);
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
            $con = Propel::getServiceContainer()->getReadConnection(EventsTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildEventsQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
        $row = $dataFetcher->fetch();
        $dataFetcher->close();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true, $dataFetcher->getIndexType()); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->collSignupss = null;

        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param      ConnectionInterface $con
     * @return void
     * @throws PropelException
     * @see Events::setDeleted()
     * @see Events::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(EventsTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildEventsQuery::create()
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
            $con = Propel::getServiceContainer()->getWriteConnection(EventsTableMap::DATABASE_NAME);
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
                EventsTableMap::addInstanceToPool($this);
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

            if ($this->signupssScheduledForDeletion !== null) {
                if (!$this->signupssScheduledForDeletion->isEmpty()) {
                    \SignupsQuery::create()
                        ->filterByPrimaryKeys($this->signupssScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->signupssScheduledForDeletion = null;
                }
            }

            if ($this->collSignupss !== null) {
                foreach ($this->collSignupss as $referrerFK) {
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

        $this->modifiedColumns[EventsTableMap::COL_ID] = true;
        if (null !== $this->id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . EventsTableMap::COL_ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(EventsTableMap::COL_ID)) {
            $modifiedColumns[':p' . $index++]  = '`id`';
        }
        if ($this->isColumnModified(EventsTableMap::COL_NAME)) {
            $modifiedColumns[':p' . $index++]  = '`name`';
        }
        if ($this->isColumnModified(EventsTableMap::COL_EVENT_CODE)) {
            $modifiedColumns[':p' . $index++]  = '`event_code`';
        }
        if ($this->isColumnModified(EventsTableMap::COL_DATE)) {
            $modifiedColumns[':p' . $index++]  = '`date`';
        }
        if ($this->isColumnModified(EventsTableMap::COL_LOCATION)) {
            $modifiedColumns[':p' . $index++]  = '`location`';
        }
        if ($this->isColumnModified(EventsTableMap::COL_MEET_LOCATION)) {
            $modifiedColumns[':p' . $index++]  = '`meet_location`';
        }
        if ($this->isColumnModified(EventsTableMap::COL_MEET_TIME)) {
            $modifiedColumns[':p' . $index++]  = '`meet_time`';
        }
        if ($this->isColumnModified(EventsTableMap::COL_DESCRIPTION)) {
            $modifiedColumns[':p' . $index++]  = '`description`';
        }
        if ($this->isColumnModified(EventsTableMap::COL_DRIVERS_NEEDED)) {
            $modifiedColumns[':p' . $index++]  = '`drivers_needed`';
        }
        if ($this->isColumnModified(EventsTableMap::COL_CREATED_BY)) {
            $modifiedColumns[':p' . $index++]  = '`created_by`';
        }
        if ($this->isColumnModified(EventsTableMap::COL_LOG_POSTED)) {
            $modifiedColumns[':p' . $index++]  = '`log_posted`';
        }
        if ($this->isColumnModified(EventsTableMap::COL_LOG_DESCRIPTION)) {
            $modifiedColumns[':p' . $index++]  = '`log_description`';
        }
        if ($this->isColumnModified(EventsTableMap::COL_LOG_COMMENTS)) {
            $modifiedColumns[':p' . $index++]  = '`log_comments`';
        }
        if ($this->isColumnModified(EventsTableMap::COL_LOG_IMPROVEMENTS)) {
            $modifiedColumns[':p' . $index++]  = '`log_improvements`';
        }
        if ($this->isColumnModified(EventsTableMap::COL_LOG_REATTEND)) {
            $modifiedColumns[':p' . $index++]  = '`log_reattend`';
        }
        if ($this->isColumnModified(EventsTableMap::COL_ORGANIZATION)) {
            $modifiedColumns[':p' . $index++]  = '`organization`';
        }
        if ($this->isColumnModified(EventsTableMap::COL_CONTACT_NAME)) {
            $modifiedColumns[':p' . $index++]  = '`contact_name`';
        }
        if ($this->isColumnModified(EventsTableMap::COL_CONTACT_PHONE)) {
            $modifiedColumns[':p' . $index++]  = '`contact_phone`';
        }
        if ($this->isColumnModified(EventsTableMap::COL_FRAT_EXPENSE)) {
            $modifiedColumns[':p' . $index++]  = '`frat_expense`';
        }
        if ($this->isColumnModified(EventsTableMap::COL_LOGED_BY)) {
            $modifiedColumns[':p' . $index++]  = '`loged_by`';
        }
        if ($this->isColumnModified(EventsTableMap::COL_VERIFIED)) {
            $modifiedColumns[':p' . $index++]  = '`verified`';
        }

        $sql = sprintf(
            'INSERT INTO `events` (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '`id`':
                        $stmt->bindValue($identifier, $this->id, PDO::PARAM_INT);
                        break;
                    case '`name`':
                        $stmt->bindValue($identifier, $this->name, PDO::PARAM_STR);
                        break;
                    case '`event_code`':
                        $stmt->bindValue($identifier, $this->event_code, PDO::PARAM_INT);
                        break;
                    case '`date`':
                        $stmt->bindValue($identifier, $this->date, PDO::PARAM_INT);
                        break;
                    case '`location`':
                        $stmt->bindValue($identifier, $this->location, PDO::PARAM_STR);
                        break;
                    case '`meet_location`':
                        $stmt->bindValue($identifier, $this->meet_location, PDO::PARAM_STR);
                        break;
                    case '`meet_time`':
                        $stmt->bindValue($identifier, $this->meet_time, PDO::PARAM_STR);
                        break;
                    case '`description`':
                        $stmt->bindValue($identifier, $this->description, PDO::PARAM_STR);
                        break;
                    case '`drivers_needed`':
                        $stmt->bindValue($identifier, $this->drivers_needed, PDO::PARAM_INT);
                        break;
                    case '`created_by`':
                        $stmt->bindValue($identifier, $this->created_by, PDO::PARAM_INT);
                        break;
                    case '`log_posted`':
                        $stmt->bindValue($identifier, (int) $this->log_posted, PDO::PARAM_INT);
                        break;
                    case '`log_description`':
                        $stmt->bindValue($identifier, $this->log_description, PDO::PARAM_STR);
                        break;
                    case '`log_comments`':
                        $stmt->bindValue($identifier, $this->log_comments, PDO::PARAM_STR);
                        break;
                    case '`log_improvements`':
                        $stmt->bindValue($identifier, $this->log_improvements, PDO::PARAM_STR);
                        break;
                    case '`log_reattend`':
                        $stmt->bindValue($identifier, $this->log_reattend, PDO::PARAM_STR);
                        break;
                    case '`organization`':
                        $stmt->bindValue($identifier, $this->organization, PDO::PARAM_STR);
                        break;
                    case '`contact_name`':
                        $stmt->bindValue($identifier, $this->contact_name, PDO::PARAM_STR);
                        break;
                    case '`contact_phone`':
                        $stmt->bindValue($identifier, $this->contact_phone, PDO::PARAM_INT);
                        break;
                    case '`frat_expense`':
                        $stmt->bindValue($identifier, $this->frat_expense, PDO::PARAM_STR);
                        break;
                    case '`loged_by`':
                        $stmt->bindValue($identifier, $this->loged_by, PDO::PARAM_INT);
                        break;
                    case '`verified`':
                        $stmt->bindValue($identifier, (int) $this->verified, PDO::PARAM_INT);
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
        $this->setId($pk);

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
        $pos = EventsTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
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
                return $this->getName();
                break;
            case 2:
                return $this->getEventCode();
                break;
            case 3:
                return $this->getDate();
                break;
            case 4:
                return $this->getLocation();
                break;
            case 5:
                return $this->getMeetLocation();
                break;
            case 6:
                return $this->getMeetTime();
                break;
            case 7:
                return $this->getDescription();
                break;
            case 8:
                return $this->getDriversNeeded();
                break;
            case 9:
                return $this->getCreatedBy();
                break;
            case 10:
                return $this->getLogPosted();
                break;
            case 11:
                return $this->getLogDescription();
                break;
            case 12:
                return $this->getLogComments();
                break;
            case 13:
                return $this->getLogImprovements();
                break;
            case 14:
                return $this->getLogReattend();
                break;
            case 15:
                return $this->getOrganization();
                break;
            case 16:
                return $this->getContactName();
                break;
            case 17:
                return $this->getContactPhone();
                break;
            case 18:
                return $this->getFratExpense();
                break;
            case 19:
                return $this->getLogedBy();
                break;
            case 20:
                return $this->getVerified();
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

        if (isset($alreadyDumpedObjects['Events'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Events'][$this->hashCode()] = true;
        $keys = EventsTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getId(),
            $keys[1] => $this->getName(),
            $keys[2] => $this->getEventCode(),
            $keys[3] => $this->getDate(),
            $keys[4] => $this->getLocation(),
            $keys[5] => $this->getMeetLocation(),
            $keys[6] => $this->getMeetTime(),
            $keys[7] => $this->getDescription(),
            $keys[8] => $this->getDriversNeeded(),
            $keys[9] => $this->getCreatedBy(),
            $keys[10] => $this->getLogPosted(),
            $keys[11] => $this->getLogDescription(),
            $keys[12] => $this->getLogComments(),
            $keys[13] => $this->getLogImprovements(),
            $keys[14] => $this->getLogReattend(),
            $keys[15] => $this->getOrganization(),
            $keys[16] => $this->getContactName(),
            $keys[17] => $this->getContactPhone(),
            $keys[18] => $this->getFratExpense(),
            $keys[19] => $this->getLogedBy(),
            $keys[20] => $this->getVerified(),
        );
        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
            if (null !== $this->collSignupss) {

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

                $result[$key] = $this->collSignupss->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
     * @return $this|\Events
     */
    public function setByName($name, $value, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = EventsTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\Events
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setId($value);
                break;
            case 1:
                $this->setName($value);
                break;
            case 2:
                $this->setEventCode($value);
                break;
            case 3:
                $this->setDate($value);
                break;
            case 4:
                $this->setLocation($value);
                break;
            case 5:
                $this->setMeetLocation($value);
                break;
            case 6:
                $this->setMeetTime($value);
                break;
            case 7:
                $this->setDescription($value);
                break;
            case 8:
                $this->setDriversNeeded($value);
                break;
            case 9:
                $this->setCreatedBy($value);
                break;
            case 10:
                $this->setLogPosted($value);
                break;
            case 11:
                $this->setLogDescription($value);
                break;
            case 12:
                $this->setLogComments($value);
                break;
            case 13:
                $this->setLogImprovements($value);
                break;
            case 14:
                $this->setLogReattend($value);
                break;
            case 15:
                $this->setOrganization($value);
                break;
            case 16:
                $this->setContactName($value);
                break;
            case 17:
                $this->setContactPhone($value);
                break;
            case 18:
                $this->setFratExpense($value);
                break;
            case 19:
                $this->setLogedBy($value);
                break;
            case 20:
                $this->setVerified($value);
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
        $keys = EventsTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setId($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setName($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setEventCode($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setDate($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setLocation($arr[$keys[4]]);
        }
        if (array_key_exists($keys[5], $arr)) {
            $this->setMeetLocation($arr[$keys[5]]);
        }
        if (array_key_exists($keys[6], $arr)) {
            $this->setMeetTime($arr[$keys[6]]);
        }
        if (array_key_exists($keys[7], $arr)) {
            $this->setDescription($arr[$keys[7]]);
        }
        if (array_key_exists($keys[8], $arr)) {
            $this->setDriversNeeded($arr[$keys[8]]);
        }
        if (array_key_exists($keys[9], $arr)) {
            $this->setCreatedBy($arr[$keys[9]]);
        }
        if (array_key_exists($keys[10], $arr)) {
            $this->setLogPosted($arr[$keys[10]]);
        }
        if (array_key_exists($keys[11], $arr)) {
            $this->setLogDescription($arr[$keys[11]]);
        }
        if (array_key_exists($keys[12], $arr)) {
            $this->setLogComments($arr[$keys[12]]);
        }
        if (array_key_exists($keys[13], $arr)) {
            $this->setLogImprovements($arr[$keys[13]]);
        }
        if (array_key_exists($keys[14], $arr)) {
            $this->setLogReattend($arr[$keys[14]]);
        }
        if (array_key_exists($keys[15], $arr)) {
            $this->setOrganization($arr[$keys[15]]);
        }
        if (array_key_exists($keys[16], $arr)) {
            $this->setContactName($arr[$keys[16]]);
        }
        if (array_key_exists($keys[17], $arr)) {
            $this->setContactPhone($arr[$keys[17]]);
        }
        if (array_key_exists($keys[18], $arr)) {
            $this->setFratExpense($arr[$keys[18]]);
        }
        if (array_key_exists($keys[19], $arr)) {
            $this->setLogedBy($arr[$keys[19]]);
        }
        if (array_key_exists($keys[20], $arr)) {
            $this->setVerified($arr[$keys[20]]);
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
     * @return $this|\Events The current object, for fluid interface
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
        $criteria = new Criteria(EventsTableMap::DATABASE_NAME);

        if ($this->isColumnModified(EventsTableMap::COL_ID)) {
            $criteria->add(EventsTableMap::COL_ID, $this->id);
        }
        if ($this->isColumnModified(EventsTableMap::COL_NAME)) {
            $criteria->add(EventsTableMap::COL_NAME, $this->name);
        }
        if ($this->isColumnModified(EventsTableMap::COL_EVENT_CODE)) {
            $criteria->add(EventsTableMap::COL_EVENT_CODE, $this->event_code);
        }
        if ($this->isColumnModified(EventsTableMap::COL_DATE)) {
            $criteria->add(EventsTableMap::COL_DATE, $this->date);
        }
        if ($this->isColumnModified(EventsTableMap::COL_LOCATION)) {
            $criteria->add(EventsTableMap::COL_LOCATION, $this->location);
        }
        if ($this->isColumnModified(EventsTableMap::COL_MEET_LOCATION)) {
            $criteria->add(EventsTableMap::COL_MEET_LOCATION, $this->meet_location);
        }
        if ($this->isColumnModified(EventsTableMap::COL_MEET_TIME)) {
            $criteria->add(EventsTableMap::COL_MEET_TIME, $this->meet_time);
        }
        if ($this->isColumnModified(EventsTableMap::COL_DESCRIPTION)) {
            $criteria->add(EventsTableMap::COL_DESCRIPTION, $this->description);
        }
        if ($this->isColumnModified(EventsTableMap::COL_DRIVERS_NEEDED)) {
            $criteria->add(EventsTableMap::COL_DRIVERS_NEEDED, $this->drivers_needed);
        }
        if ($this->isColumnModified(EventsTableMap::COL_CREATED_BY)) {
            $criteria->add(EventsTableMap::COL_CREATED_BY, $this->created_by);
        }
        if ($this->isColumnModified(EventsTableMap::COL_LOG_POSTED)) {
            $criteria->add(EventsTableMap::COL_LOG_POSTED, $this->log_posted);
        }
        if ($this->isColumnModified(EventsTableMap::COL_LOG_DESCRIPTION)) {
            $criteria->add(EventsTableMap::COL_LOG_DESCRIPTION, $this->log_description);
        }
        if ($this->isColumnModified(EventsTableMap::COL_LOG_COMMENTS)) {
            $criteria->add(EventsTableMap::COL_LOG_COMMENTS, $this->log_comments);
        }
        if ($this->isColumnModified(EventsTableMap::COL_LOG_IMPROVEMENTS)) {
            $criteria->add(EventsTableMap::COL_LOG_IMPROVEMENTS, $this->log_improvements);
        }
        if ($this->isColumnModified(EventsTableMap::COL_LOG_REATTEND)) {
            $criteria->add(EventsTableMap::COL_LOG_REATTEND, $this->log_reattend);
        }
        if ($this->isColumnModified(EventsTableMap::COL_ORGANIZATION)) {
            $criteria->add(EventsTableMap::COL_ORGANIZATION, $this->organization);
        }
        if ($this->isColumnModified(EventsTableMap::COL_CONTACT_NAME)) {
            $criteria->add(EventsTableMap::COL_CONTACT_NAME, $this->contact_name);
        }
        if ($this->isColumnModified(EventsTableMap::COL_CONTACT_PHONE)) {
            $criteria->add(EventsTableMap::COL_CONTACT_PHONE, $this->contact_phone);
        }
        if ($this->isColumnModified(EventsTableMap::COL_FRAT_EXPENSE)) {
            $criteria->add(EventsTableMap::COL_FRAT_EXPENSE, $this->frat_expense);
        }
        if ($this->isColumnModified(EventsTableMap::COL_LOGED_BY)) {
            $criteria->add(EventsTableMap::COL_LOGED_BY, $this->loged_by);
        }
        if ($this->isColumnModified(EventsTableMap::COL_VERIFIED)) {
            $criteria->add(EventsTableMap::COL_VERIFIED, $this->verified);
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
        $criteria = ChildEventsQuery::create();
        $criteria->add(EventsTableMap::COL_ID, $this->id);

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
        $validPk = null !== $this->getId();

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
     * Returns the primary key for this object (row).
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->getId();
    }

    /**
     * Generic method to set the primary key (id column).
     *
     * @param       int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setId($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {
        return null === $this->getId();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param      object $copyObj An object of \Events (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setName($this->getName());
        $copyObj->setEventCode($this->getEventCode());
        $copyObj->setDate($this->getDate());
        $copyObj->setLocation($this->getLocation());
        $copyObj->setMeetLocation($this->getMeetLocation());
        $copyObj->setMeetTime($this->getMeetTime());
        $copyObj->setDescription($this->getDescription());
        $copyObj->setDriversNeeded($this->getDriversNeeded());
        $copyObj->setCreatedBy($this->getCreatedBy());
        $copyObj->setLogPosted($this->getLogPosted());
        $copyObj->setLogDescription($this->getLogDescription());
        $copyObj->setLogComments($this->getLogComments());
        $copyObj->setLogImprovements($this->getLogImprovements());
        $copyObj->setLogReattend($this->getLogReattend());
        $copyObj->setOrganization($this->getOrganization());
        $copyObj->setContactName($this->getContactName());
        $copyObj->setContactPhone($this->getContactPhone());
        $copyObj->setFratExpense($this->getFratExpense());
        $copyObj->setLogedBy($this->getLogedBy());
        $copyObj->setVerified($this->getVerified());

        if ($deepCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);

            foreach ($this->getSignupss() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addSignups($relObj->copy($deepCopy));
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
     * @return \Events Clone of current object.
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
     * Initializes a collection based on the name of a relation.
     * Avoids crafting an 'init[$relationName]s' method name
     * that wouldn't work when StandardEnglishPluralizer is used.
     *
     * @param      string $relationName The name of the relation to initialize
     * @return void
     */
    public function initRelation($relationName)
    {
        if ('Signups' == $relationName) {
            return $this->initSignupss();
        }
    }

    /**
     * Clears out the collSignupss collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addSignupss()
     */
    public function clearSignupss()
    {
        $this->collSignupss = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collSignupss collection loaded partially.
     */
    public function resetPartialSignupss($v = true)
    {
        $this->collSignupssPartial = $v;
    }

    /**
     * Initializes the collSignupss collection.
     *
     * By default this just sets the collSignupss collection to an empty array (like clearcollSignupss());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initSignupss($overrideExisting = true)
    {
        if (null !== $this->collSignupss && !$overrideExisting) {
            return;
        }
        $this->collSignupss = new ObjectCollection();
        $this->collSignupss->setModel('\Signups');
    }

    /**
     * Gets an array of ChildSignups objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildEvents is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildSignups[] List of ChildSignups objects
     * @throws PropelException
     */
    public function getSignupss(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collSignupssPartial && !$this->isNew();
        if (null === $this->collSignupss || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collSignupss) {
                // return empty collection
                $this->initSignupss();
            } else {
                $collSignupss = ChildSignupsQuery::create(null, $criteria)
                    ->filterByEvents($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collSignupssPartial && count($collSignupss)) {
                        $this->initSignupss(false);

                        foreach ($collSignupss as $obj) {
                            if (false == $this->collSignupss->contains($obj)) {
                                $this->collSignupss->append($obj);
                            }
                        }

                        $this->collSignupssPartial = true;
                    }

                    return $collSignupss;
                }

                if ($partial && $this->collSignupss) {
                    foreach ($this->collSignupss as $obj) {
                        if ($obj->isNew()) {
                            $collSignupss[] = $obj;
                        }
                    }
                }

                $this->collSignupss = $collSignupss;
                $this->collSignupssPartial = false;
            }
        }

        return $this->collSignupss;
    }

    /**
     * Sets a collection of ChildSignups objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $signupss A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildEvents The current object (for fluent API support)
     */
    public function setSignupss(Collection $signupss, ConnectionInterface $con = null)
    {
        /** @var ChildSignups[] $signupssToDelete */
        $signupssToDelete = $this->getSignupss(new Criteria(), $con)->diff($signupss);


        $this->signupssScheduledForDeletion = $signupssToDelete;

        foreach ($signupssToDelete as $signupsRemoved) {
            $signupsRemoved->setEvents(null);
        }

        $this->collSignupss = null;
        foreach ($signupss as $signups) {
            $this->addSignups($signups);
        }

        $this->collSignupss = $signupss;
        $this->collSignupssPartial = false;

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
    public function countSignupss(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collSignupssPartial && !$this->isNew();
        if (null === $this->collSignupss || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collSignupss) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getSignupss());
            }

            $query = ChildSignupsQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByEvents($this)
                ->count($con);
        }

        return count($this->collSignupss);
    }

    /**
     * Method called to associate a ChildSignups object to this object
     * through the ChildSignups foreign key attribute.
     *
     * @param  ChildSignups $l ChildSignups
     * @return $this|\Events The current object (for fluent API support)
     */
    public function addSignups(ChildSignups $l)
    {
        if ($this->collSignupss === null) {
            $this->initSignupss();
            $this->collSignupssPartial = true;
        }

        if (!$this->collSignupss->contains($l)) {
            $this->doAddSignups($l);
        }

        return $this;
    }

    /**
     * @param ChildSignups $signups The ChildSignups object to add.
     */
    protected function doAddSignups(ChildSignups $signups)
    {
        $this->collSignupss[]= $signups;
        $signups->setEvents($this);
    }

    /**
     * @param  ChildSignups $signups The ChildSignups object to remove.
     * @return $this|ChildEvents The current object (for fluent API support)
     */
    public function removeSignups(ChildSignups $signups)
    {
        if ($this->getSignupss()->contains($signups)) {
            $pos = $this->collSignupss->search($signups);
            $this->collSignupss->remove($pos);
            if (null === $this->signupssScheduledForDeletion) {
                $this->signupssScheduledForDeletion = clone $this->collSignupss;
                $this->signupssScheduledForDeletion->clear();
            }
            $this->signupssScheduledForDeletion[]= clone $signups;
            $signups->setEvents(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Events is new, it will return
     * an empty collection; or if this Events has previously
     * been saved, it will retrieve related Signupss from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Events.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildSignups[] List of ChildSignups objects
     */
    public function getSignupssJoinShifts(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildSignupsQuery::create(null, $criteria);
        $query->joinWith('Shifts', $joinBehavior);

        return $this->getSignupss($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Events is new, it will return
     * an empty collection; or if this Events has previously
     * been saved, it will retrieve related Signupss from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Events.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildSignups[] List of ChildSignups objects
     */
    public function getSignupssJoinMembers(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildSignupsQuery::create(null, $criteria);
        $query->joinWith('Members', $joinBehavior);

        return $this->getSignupss($query, $con);
    }

    /**
     * Clears the current object, sets all attributes to their default values and removes
     * outgoing references as well as back-references (from other objects to this one. Results probably in a database
     * change of those foreign objects when you call `save` there).
     */
    public function clear()
    {
        $this->id = null;
        $this->name = null;
        $this->event_code = null;
        $this->date = null;
        $this->location = null;
        $this->meet_location = null;
        $this->meet_time = null;
        $this->description = null;
        $this->drivers_needed = null;
        $this->created_by = null;
        $this->log_posted = null;
        $this->log_description = null;
        $this->log_comments = null;
        $this->log_improvements = null;
        $this->log_reattend = null;
        $this->organization = null;
        $this->contact_name = null;
        $this->contact_phone = null;
        $this->frat_expense = null;
        $this->loged_by = null;
        $this->verified = null;
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
            if ($this->collSignupss) {
                foreach ($this->collSignupss as $o) {
                    $o->clearAllReferences($deep);
                }
            }
        } // if ($deep)

        $this->collSignupss = null;
    }

    /**
     * Return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(EventsTableMap::DEFAULT_STRING_FORMAT);
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
