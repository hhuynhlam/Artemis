<?php

namespace Base;

use \Members as ChildMembers;
use \MembersQuery as ChildMembersQuery;
use \Signups as ChildSignups;
use \SignupsQuery as ChildSignupsQuery;
use \Exception;
use \PDO;
use Map\MembersTableMap;
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
 * Base class that represents a row from the 'members' table.
 *
 *
 *
* @package    propel.generator..Base
*/
abstract class Members implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\Map\\MembersTableMap';


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
     * The value for the first_name field.
     * @var        string
     */
    protected $first_name;

    /**
     * The value for the middle_name field.
     * @var        string
     */
    protected $middle_name;

    /**
     * The value for the last_name field.
     * @var        string
     */
    protected $last_name;

    /**
     * The value for the position field.
     * Note: this column has a database default value of: 0
     * @var        int
     */
    protected $position;

    /**
     * The value for the mail_list field.
     * Note: this column has a database default value of: false
     * @var        boolean
     */
    protected $mail_list;

    /**
     * The value for the email field.
     * @var        string
     */
    protected $email;

    /**
     * The value for the aim field.
     * @var        string
     */
    protected $aim;

    /**
     * The value for the website field.
     * @var        string
     */
    protected $website;

    /**
     * The value for the phone field.
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $phone;

    /**
     * The value for the perm_address field.
     * @var        string
     */
    protected $perm_address;

    /**
     * The value for the temp_address field.
     * @var        string
     */
    protected $temp_address;

    /**
     * The value for the avatar field.
     * @var        string
     */
    protected $avatar;

    /**
     * The value for the signature field.
     * @var        string
     */
    protected $signature;

    /**
     * The value for the class field.
     * @var        string
     */
    protected $class;

    /**
     * The value for the username field.
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $username;

    /**
     * The value for the password field.
     * @var        string
     */
    protected $password;

    /**
     * The value for the family field.
     * @var        string
     */
    protected $family;

    /**
     * The value for the birthday field.
     * @var        int
     */
    protected $birthday;

    /**
     * The value for the shirt_size field.
     * @var        string
     */
    protected $shirt_size;

    /**
     * The value for the total_service field.
     * Note: this column has a database default value of: 0
     * @var        double
     */
    protected $total_service;

    /**
     * The value for the total_fellowship field.
     * Note: this column has a database default value of: 0
     * @var        double
     */
    protected $total_fellowship;

    /**
     * The value for the notes field.
     * @var        string
     */
    protected $notes;

    /**
     * The value for the fees_owed field.
     * Note: this column has a database default value of: 0
     * @var        double
     */
    protected $fees_owed;

    /**
     * The value for the email_list field.
     * Note: this column has a database default value of: true
     * @var        boolean
     */
    protected $email_list;

    /**
     * The value for the reminder field.
     * Note: this column has a database default value of: 1
     * @var        int
     */
    protected $reminder;

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
        $this->position = 0;
        $this->mail_list = false;
        $this->phone = '';
        $this->username = '';
        $this->total_service = 0;
        $this->total_fellowship = 0;
        $this->fees_owed = 0;
        $this->email_list = true;
        $this->reminder = 1;
    }

    /**
     * Initializes internal state of Base\Members object.
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
     * Compares this with another <code>Members</code> instance.  If
     * <code>obj</code> is an instance of <code>Members</code>, delegates to
     * <code>equals(Members)</code>.  Otherwise, returns <code>false</code>.
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
     * @return $this|Members The current object, for fluid interface
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
     * Get the [first_name] column value.
     *
     * @return string
     */
    public function getFirstName()
    {
        return $this->first_name;
    }

    /**
     * Get the [middle_name] column value.
     *
     * @return string
     */
    public function getMiddleName()
    {
        return $this->middle_name;
    }

    /**
     * Get the [last_name] column value.
     *
     * @return string
     */
    public function getLastName()
    {
        return $this->last_name;
    }

    /**
     * Get the [position] column value.
     *
     * @return int
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * Get the [mail_list] column value.
     *
     * @return boolean
     */
    public function getMailList()
    {
        return $this->mail_list;
    }

    /**
     * Get the [mail_list] column value.
     *
     * @return boolean
     */
    public function isMailList()
    {
        return $this->getMailList();
    }

    /**
     * Get the [email] column value.
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Get the [aim] column value.
     *
     * @return string
     */
    public function getAim()
    {
        return $this->aim;
    }

    /**
     * Get the [website] column value.
     *
     * @return string
     */
    public function getWebsite()
    {
        return $this->website;
    }

    /**
     * Get the [phone] column value.
     *
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Get the [perm_address] column value.
     *
     * @return string
     */
    public function getPermAddress()
    {
        return $this->perm_address;
    }

    /**
     * Get the [temp_address] column value.
     *
     * @return string
     */
    public function getTempAddress()
    {
        return $this->temp_address;
    }

    /**
     * Get the [avatar] column value.
     *
     * @return string
     */
    public function getAvatar()
    {
        return $this->avatar;
    }

    /**
     * Get the [signature] column value.
     *
     * @return string
     */
    public function getSignature()
    {
        return $this->signature;
    }

    /**
     * Get the [class] column value.
     *
     * @return string
     */
    public function getClass()
    {
        return $this->class;
    }

    /**
     * Get the [username] column value.
     *
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Get the [password] column value.
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Get the [family] column value.
     *
     * @return string
     */
    public function getFamily()
    {
        return $this->family;
    }

    /**
     * Get the [birthday] column value.
     *
     * @return int
     */
    public function getBirthday()
    {
        return $this->birthday;
    }

    /**
     * Get the [shirt_size] column value.
     *
     * @return string
     */
    public function getShirtSize()
    {
        return $this->shirt_size;
    }

    /**
     * Get the [total_service] column value.
     *
     * @return double
     */
    public function getTotalService()
    {
        return $this->total_service;
    }

    /**
     * Get the [total_fellowship] column value.
     *
     * @return double
     */
    public function getTotalFellowship()
    {
        return $this->total_fellowship;
    }

    /**
     * Get the [notes] column value.
     *
     * @return string
     */
    public function getNotes()
    {
        return $this->notes;
    }

    /**
     * Get the [fees_owed] column value.
     *
     * @return double
     */
    public function getFeesOwed()
    {
        return $this->fees_owed;
    }

    /**
     * Get the [email_list] column value.
     *
     * @return boolean
     */
    public function getEmailList()
    {
        return $this->email_list;
    }

    /**
     * Get the [email_list] column value.
     *
     * @return boolean
     */
    public function isEmailList()
    {
        return $this->getEmailList();
    }

    /**
     * Get the [reminder] column value.
     *
     * @return int
     */
    public function getReminder()
    {
        return $this->reminder;
    }

    /**
     * Set the value of [id] column.
     *
     * @param int $v new value
     * @return $this|\Members The current object (for fluent API support)
     */
    public function setId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[MembersTableMap::COL_ID] = true;
        }

        return $this;
    } // setId()

    /**
     * Set the value of [first_name] column.
     *
     * @param string $v new value
     * @return $this|\Members The current object (for fluent API support)
     */
    public function setFirstName($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->first_name !== $v) {
            $this->first_name = $v;
            $this->modifiedColumns[MembersTableMap::COL_FIRST_NAME] = true;
        }

        return $this;
    } // setFirstName()

    /**
     * Set the value of [middle_name] column.
     *
     * @param string $v new value
     * @return $this|\Members The current object (for fluent API support)
     */
    public function setMiddleName($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->middle_name !== $v) {
            $this->middle_name = $v;
            $this->modifiedColumns[MembersTableMap::COL_MIDDLE_NAME] = true;
        }

        return $this;
    } // setMiddleName()

    /**
     * Set the value of [last_name] column.
     *
     * @param string $v new value
     * @return $this|\Members The current object (for fluent API support)
     */
    public function setLastName($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->last_name !== $v) {
            $this->last_name = $v;
            $this->modifiedColumns[MembersTableMap::COL_LAST_NAME] = true;
        }

        return $this;
    } // setLastName()

    /**
     * Set the value of [position] column.
     *
     * @param int $v new value
     * @return $this|\Members The current object (for fluent API support)
     */
    public function setPosition($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->position !== $v) {
            $this->position = $v;
            $this->modifiedColumns[MembersTableMap::COL_POSITION] = true;
        }

        return $this;
    } // setPosition()

    /**
     * Sets the value of the [mail_list] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param  boolean|integer|string $v The new value
     * @return $this|\Members The current object (for fluent API support)
     */
    public function setMailList($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->mail_list !== $v) {
            $this->mail_list = $v;
            $this->modifiedColumns[MembersTableMap::COL_MAIL_LIST] = true;
        }

        return $this;
    } // setMailList()

    /**
     * Set the value of [email] column.
     *
     * @param string $v new value
     * @return $this|\Members The current object (for fluent API support)
     */
    public function setEmail($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->email !== $v) {
            $this->email = $v;
            $this->modifiedColumns[MembersTableMap::COL_EMAIL] = true;
        }

        return $this;
    } // setEmail()

    /**
     * Set the value of [aim] column.
     *
     * @param string $v new value
     * @return $this|\Members The current object (for fluent API support)
     */
    public function setAim($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->aim !== $v) {
            $this->aim = $v;
            $this->modifiedColumns[MembersTableMap::COL_AIM] = true;
        }

        return $this;
    } // setAim()

    /**
     * Set the value of [website] column.
     *
     * @param string $v new value
     * @return $this|\Members The current object (for fluent API support)
     */
    public function setWebsite($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->website !== $v) {
            $this->website = $v;
            $this->modifiedColumns[MembersTableMap::COL_WEBSITE] = true;
        }

        return $this;
    } // setWebsite()

    /**
     * Set the value of [phone] column.
     *
     * @param string $v new value
     * @return $this|\Members The current object (for fluent API support)
     */
    public function setPhone($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->phone !== $v) {
            $this->phone = $v;
            $this->modifiedColumns[MembersTableMap::COL_PHONE] = true;
        }

        return $this;
    } // setPhone()

    /**
     * Set the value of [perm_address] column.
     *
     * @param string $v new value
     * @return $this|\Members The current object (for fluent API support)
     */
    public function setPermAddress($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->perm_address !== $v) {
            $this->perm_address = $v;
            $this->modifiedColumns[MembersTableMap::COL_PERM_ADDRESS] = true;
        }

        return $this;
    } // setPermAddress()

    /**
     * Set the value of [temp_address] column.
     *
     * @param string $v new value
     * @return $this|\Members The current object (for fluent API support)
     */
    public function setTempAddress($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->temp_address !== $v) {
            $this->temp_address = $v;
            $this->modifiedColumns[MembersTableMap::COL_TEMP_ADDRESS] = true;
        }

        return $this;
    } // setTempAddress()

    /**
     * Set the value of [avatar] column.
     *
     * @param string $v new value
     * @return $this|\Members The current object (for fluent API support)
     */
    public function setAvatar($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->avatar !== $v) {
            $this->avatar = $v;
            $this->modifiedColumns[MembersTableMap::COL_AVATAR] = true;
        }

        return $this;
    } // setAvatar()

    /**
     * Set the value of [signature] column.
     *
     * @param string $v new value
     * @return $this|\Members The current object (for fluent API support)
     */
    public function setSignature($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->signature !== $v) {
            $this->signature = $v;
            $this->modifiedColumns[MembersTableMap::COL_SIGNATURE] = true;
        }

        return $this;
    } // setSignature()

    /**
     * Set the value of [class] column.
     *
     * @param string $v new value
     * @return $this|\Members The current object (for fluent API support)
     */
    public function setClass($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->class !== $v) {
            $this->class = $v;
            $this->modifiedColumns[MembersTableMap::COL_CLASS] = true;
        }

        return $this;
    } // setClass()

    /**
     * Set the value of [username] column.
     *
     * @param string $v new value
     * @return $this|\Members The current object (for fluent API support)
     */
    public function setUsername($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->username !== $v) {
            $this->username = $v;
            $this->modifiedColumns[MembersTableMap::COL_USERNAME] = true;
        }

        return $this;
    } // setUsername()

    /**
     * Set the value of [password] column.
     *
     * @param string $v new value
     * @return $this|\Members The current object (for fluent API support)
     */
    public function setPassword($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->password !== $v) {
            $this->password = $v;
            $this->modifiedColumns[MembersTableMap::COL_PASSWORD] = true;
        }

        return $this;
    } // setPassword()

    /**
     * Set the value of [family] column.
     *
     * @param string $v new value
     * @return $this|\Members The current object (for fluent API support)
     */
    public function setFamily($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->family !== $v) {
            $this->family = $v;
            $this->modifiedColumns[MembersTableMap::COL_FAMILY] = true;
        }

        return $this;
    } // setFamily()

    /**
     * Set the value of [birthday] column.
     *
     * @param int $v new value
     * @return $this|\Members The current object (for fluent API support)
     */
    public function setBirthday($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->birthday !== $v) {
            $this->birthday = $v;
            $this->modifiedColumns[MembersTableMap::COL_BIRTHDAY] = true;
        }

        return $this;
    } // setBirthday()

    /**
     * Set the value of [shirt_size] column.
     *
     * @param string $v new value
     * @return $this|\Members The current object (for fluent API support)
     */
    public function setShirtSize($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->shirt_size !== $v) {
            $this->shirt_size = $v;
            $this->modifiedColumns[MembersTableMap::COL_SHIRT_SIZE] = true;
        }

        return $this;
    } // setShirtSize()

    /**
     * Set the value of [total_service] column.
     *
     * @param double $v new value
     * @return $this|\Members The current object (for fluent API support)
     */
    public function setTotalService($v)
    {
        if ($v !== null) {
            $v = (double) $v;
        }

        if ($this->total_service !== $v) {
            $this->total_service = $v;
            $this->modifiedColumns[MembersTableMap::COL_TOTAL_SERVICE] = true;
        }

        return $this;
    } // setTotalService()

    /**
     * Set the value of [total_fellowship] column.
     *
     * @param double $v new value
     * @return $this|\Members The current object (for fluent API support)
     */
    public function setTotalFellowship($v)
    {
        if ($v !== null) {
            $v = (double) $v;
        }

        if ($this->total_fellowship !== $v) {
            $this->total_fellowship = $v;
            $this->modifiedColumns[MembersTableMap::COL_TOTAL_FELLOWSHIP] = true;
        }

        return $this;
    } // setTotalFellowship()

    /**
     * Set the value of [notes] column.
     *
     * @param string $v new value
     * @return $this|\Members The current object (for fluent API support)
     */
    public function setNotes($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->notes !== $v) {
            $this->notes = $v;
            $this->modifiedColumns[MembersTableMap::COL_NOTES] = true;
        }

        return $this;
    } // setNotes()

    /**
     * Set the value of [fees_owed] column.
     *
     * @param double $v new value
     * @return $this|\Members The current object (for fluent API support)
     */
    public function setFeesOwed($v)
    {
        if ($v !== null) {
            $v = (double) $v;
        }

        if ($this->fees_owed !== $v) {
            $this->fees_owed = $v;
            $this->modifiedColumns[MembersTableMap::COL_FEES_OWED] = true;
        }

        return $this;
    } // setFeesOwed()

    /**
     * Sets the value of the [email_list] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param  boolean|integer|string $v The new value
     * @return $this|\Members The current object (for fluent API support)
     */
    public function setEmailList($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->email_list !== $v) {
            $this->email_list = $v;
            $this->modifiedColumns[MembersTableMap::COL_EMAIL_LIST] = true;
        }

        return $this;
    } // setEmailList()

    /**
     * Set the value of [reminder] column.
     *
     * @param int $v new value
     * @return $this|\Members The current object (for fluent API support)
     */
    public function setReminder($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->reminder !== $v) {
            $this->reminder = $v;
            $this->modifiedColumns[MembersTableMap::COL_REMINDER] = true;
        }

        return $this;
    } // setReminder()

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
            if ($this->position !== 0) {
                return false;
            }

            if ($this->mail_list !== false) {
                return false;
            }

            if ($this->phone !== '') {
                return false;
            }

            if ($this->username !== '') {
                return false;
            }

            if ($this->total_service !== 0) {
                return false;
            }

            if ($this->total_fellowship !== 0) {
                return false;
            }

            if ($this->fees_owed !== 0) {
                return false;
            }

            if ($this->email_list !== true) {
                return false;
            }

            if ($this->reminder !== 1) {
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

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : MembersTableMap::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : MembersTableMap::translateFieldName('FirstName', TableMap::TYPE_PHPNAME, $indexType)];
            $this->first_name = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : MembersTableMap::translateFieldName('MiddleName', TableMap::TYPE_PHPNAME, $indexType)];
            $this->middle_name = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : MembersTableMap::translateFieldName('LastName', TableMap::TYPE_PHPNAME, $indexType)];
            $this->last_name = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : MembersTableMap::translateFieldName('Position', TableMap::TYPE_PHPNAME, $indexType)];
            $this->position = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : MembersTableMap::translateFieldName('MailList', TableMap::TYPE_PHPNAME, $indexType)];
            $this->mail_list = (null !== $col) ? (boolean) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 6 + $startcol : MembersTableMap::translateFieldName('Email', TableMap::TYPE_PHPNAME, $indexType)];
            $this->email = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 7 + $startcol : MembersTableMap::translateFieldName('Aim', TableMap::TYPE_PHPNAME, $indexType)];
            $this->aim = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 8 + $startcol : MembersTableMap::translateFieldName('Website', TableMap::TYPE_PHPNAME, $indexType)];
            $this->website = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 9 + $startcol : MembersTableMap::translateFieldName('Phone', TableMap::TYPE_PHPNAME, $indexType)];
            $this->phone = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 10 + $startcol : MembersTableMap::translateFieldName('PermAddress', TableMap::TYPE_PHPNAME, $indexType)];
            $this->perm_address = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 11 + $startcol : MembersTableMap::translateFieldName('TempAddress', TableMap::TYPE_PHPNAME, $indexType)];
            $this->temp_address = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 12 + $startcol : MembersTableMap::translateFieldName('Avatar', TableMap::TYPE_PHPNAME, $indexType)];
            $this->avatar = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 13 + $startcol : MembersTableMap::translateFieldName('Signature', TableMap::TYPE_PHPNAME, $indexType)];
            $this->signature = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 14 + $startcol : MembersTableMap::translateFieldName('Class', TableMap::TYPE_PHPNAME, $indexType)];
            $this->class = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 15 + $startcol : MembersTableMap::translateFieldName('Username', TableMap::TYPE_PHPNAME, $indexType)];
            $this->username = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 16 + $startcol : MembersTableMap::translateFieldName('Password', TableMap::TYPE_PHPNAME, $indexType)];
            $this->password = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 17 + $startcol : MembersTableMap::translateFieldName('Family', TableMap::TYPE_PHPNAME, $indexType)];
            $this->family = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 18 + $startcol : MembersTableMap::translateFieldName('Birthday', TableMap::TYPE_PHPNAME, $indexType)];
            $this->birthday = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 19 + $startcol : MembersTableMap::translateFieldName('ShirtSize', TableMap::TYPE_PHPNAME, $indexType)];
            $this->shirt_size = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 20 + $startcol : MembersTableMap::translateFieldName('TotalService', TableMap::TYPE_PHPNAME, $indexType)];
            $this->total_service = (null !== $col) ? (double) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 21 + $startcol : MembersTableMap::translateFieldName('TotalFellowship', TableMap::TYPE_PHPNAME, $indexType)];
            $this->total_fellowship = (null !== $col) ? (double) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 22 + $startcol : MembersTableMap::translateFieldName('Notes', TableMap::TYPE_PHPNAME, $indexType)];
            $this->notes = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 23 + $startcol : MembersTableMap::translateFieldName('FeesOwed', TableMap::TYPE_PHPNAME, $indexType)];
            $this->fees_owed = (null !== $col) ? (double) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 24 + $startcol : MembersTableMap::translateFieldName('EmailList', TableMap::TYPE_PHPNAME, $indexType)];
            $this->email_list = (null !== $col) ? (boolean) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 25 + $startcol : MembersTableMap::translateFieldName('Reminder', TableMap::TYPE_PHPNAME, $indexType)];
            $this->reminder = (null !== $col) ? (int) $col : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 26; // 26 = MembersTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\Members'), 0, $e);
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
            $con = Propel::getServiceContainer()->getReadConnection(MembersTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildMembersQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
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
     * @see Members::setDeleted()
     * @see Members::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(MembersTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildMembersQuery::create()
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
            $con = Propel::getServiceContainer()->getWriteConnection(MembersTableMap::DATABASE_NAME);
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
                MembersTableMap::addInstanceToPool($this);
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

        $this->modifiedColumns[MembersTableMap::COL_ID] = true;
        if (null !== $this->id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . MembersTableMap::COL_ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(MembersTableMap::COL_ID)) {
            $modifiedColumns[':p' . $index++]  = '`id`';
        }
        if ($this->isColumnModified(MembersTableMap::COL_FIRST_NAME)) {
            $modifiedColumns[':p' . $index++]  = '`first_name`';
        }
        if ($this->isColumnModified(MembersTableMap::COL_MIDDLE_NAME)) {
            $modifiedColumns[':p' . $index++]  = '`middle_name`';
        }
        if ($this->isColumnModified(MembersTableMap::COL_LAST_NAME)) {
            $modifiedColumns[':p' . $index++]  = '`last_name`';
        }
        if ($this->isColumnModified(MembersTableMap::COL_POSITION)) {
            $modifiedColumns[':p' . $index++]  = '`position`';
        }
        if ($this->isColumnModified(MembersTableMap::COL_MAIL_LIST)) {
            $modifiedColumns[':p' . $index++]  = '`mail_list`';
        }
        if ($this->isColumnModified(MembersTableMap::COL_EMAIL)) {
            $modifiedColumns[':p' . $index++]  = '`email`';
        }
        if ($this->isColumnModified(MembersTableMap::COL_AIM)) {
            $modifiedColumns[':p' . $index++]  = '`aim`';
        }
        if ($this->isColumnModified(MembersTableMap::COL_WEBSITE)) {
            $modifiedColumns[':p' . $index++]  = '`website`';
        }
        if ($this->isColumnModified(MembersTableMap::COL_PHONE)) {
            $modifiedColumns[':p' . $index++]  = '`phone`';
        }
        if ($this->isColumnModified(MembersTableMap::COL_PERM_ADDRESS)) {
            $modifiedColumns[':p' . $index++]  = '`perm_address`';
        }
        if ($this->isColumnModified(MembersTableMap::COL_TEMP_ADDRESS)) {
            $modifiedColumns[':p' . $index++]  = '`temp_address`';
        }
        if ($this->isColumnModified(MembersTableMap::COL_AVATAR)) {
            $modifiedColumns[':p' . $index++]  = '`avatar`';
        }
        if ($this->isColumnModified(MembersTableMap::COL_SIGNATURE)) {
            $modifiedColumns[':p' . $index++]  = '`signature`';
        }
        if ($this->isColumnModified(MembersTableMap::COL_CLASS)) {
            $modifiedColumns[':p' . $index++]  = '`class`';
        }
        if ($this->isColumnModified(MembersTableMap::COL_USERNAME)) {
            $modifiedColumns[':p' . $index++]  = '`username`';
        }
        if ($this->isColumnModified(MembersTableMap::COL_PASSWORD)) {
            $modifiedColumns[':p' . $index++]  = '`password`';
        }
        if ($this->isColumnModified(MembersTableMap::COL_FAMILY)) {
            $modifiedColumns[':p' . $index++]  = '`family`';
        }
        if ($this->isColumnModified(MembersTableMap::COL_BIRTHDAY)) {
            $modifiedColumns[':p' . $index++]  = '`birthday`';
        }
        if ($this->isColumnModified(MembersTableMap::COL_SHIRT_SIZE)) {
            $modifiedColumns[':p' . $index++]  = '`shirt_size`';
        }
        if ($this->isColumnModified(MembersTableMap::COL_TOTAL_SERVICE)) {
            $modifiedColumns[':p' . $index++]  = '`total_service`';
        }
        if ($this->isColumnModified(MembersTableMap::COL_TOTAL_FELLOWSHIP)) {
            $modifiedColumns[':p' . $index++]  = '`total_fellowship`';
        }
        if ($this->isColumnModified(MembersTableMap::COL_NOTES)) {
            $modifiedColumns[':p' . $index++]  = '`notes`';
        }
        if ($this->isColumnModified(MembersTableMap::COL_FEES_OWED)) {
            $modifiedColumns[':p' . $index++]  = '`fees_owed`';
        }
        if ($this->isColumnModified(MembersTableMap::COL_EMAIL_LIST)) {
            $modifiedColumns[':p' . $index++]  = '`email_list`';
        }
        if ($this->isColumnModified(MembersTableMap::COL_REMINDER)) {
            $modifiedColumns[':p' . $index++]  = '`reminder`';
        }

        $sql = sprintf(
            'INSERT INTO `members` (%s) VALUES (%s)',
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
                    case '`first_name`':
                        $stmt->bindValue($identifier, $this->first_name, PDO::PARAM_STR);
                        break;
                    case '`middle_name`':
                        $stmt->bindValue($identifier, $this->middle_name, PDO::PARAM_STR);
                        break;
                    case '`last_name`':
                        $stmt->bindValue($identifier, $this->last_name, PDO::PARAM_STR);
                        break;
                    case '`position`':
                        $stmt->bindValue($identifier, $this->position, PDO::PARAM_INT);
                        break;
                    case '`mail_list`':
                        $stmt->bindValue($identifier, (int) $this->mail_list, PDO::PARAM_INT);
                        break;
                    case '`email`':
                        $stmt->bindValue($identifier, $this->email, PDO::PARAM_STR);
                        break;
                    case '`aim`':
                        $stmt->bindValue($identifier, $this->aim, PDO::PARAM_STR);
                        break;
                    case '`website`':
                        $stmt->bindValue($identifier, $this->website, PDO::PARAM_STR);
                        break;
                    case '`phone`':
                        $stmt->bindValue($identifier, $this->phone, PDO::PARAM_STR);
                        break;
                    case '`perm_address`':
                        $stmt->bindValue($identifier, $this->perm_address, PDO::PARAM_STR);
                        break;
                    case '`temp_address`':
                        $stmt->bindValue($identifier, $this->temp_address, PDO::PARAM_STR);
                        break;
                    case '`avatar`':
                        $stmt->bindValue($identifier, $this->avatar, PDO::PARAM_STR);
                        break;
                    case '`signature`':
                        $stmt->bindValue($identifier, $this->signature, PDO::PARAM_STR);
                        break;
                    case '`class`':
                        $stmt->bindValue($identifier, $this->class, PDO::PARAM_STR);
                        break;
                    case '`username`':
                        $stmt->bindValue($identifier, $this->username, PDO::PARAM_STR);
                        break;
                    case '`password`':
                        $stmt->bindValue($identifier, $this->password, PDO::PARAM_STR);
                        break;
                    case '`family`':
                        $stmt->bindValue($identifier, $this->family, PDO::PARAM_STR);
                        break;
                    case '`birthday`':
                        $stmt->bindValue($identifier, $this->birthday, PDO::PARAM_INT);
                        break;
                    case '`shirt_size`':
                        $stmt->bindValue($identifier, $this->shirt_size, PDO::PARAM_STR);
                        break;
                    case '`total_service`':
                        $stmt->bindValue($identifier, $this->total_service, PDO::PARAM_STR);
                        break;
                    case '`total_fellowship`':
                        $stmt->bindValue($identifier, $this->total_fellowship, PDO::PARAM_STR);
                        break;
                    case '`notes`':
                        $stmt->bindValue($identifier, $this->notes, PDO::PARAM_STR);
                        break;
                    case '`fees_owed`':
                        $stmt->bindValue($identifier, $this->fees_owed, PDO::PARAM_STR);
                        break;
                    case '`email_list`':
                        $stmt->bindValue($identifier, (int) $this->email_list, PDO::PARAM_INT);
                        break;
                    case '`reminder`':
                        $stmt->bindValue($identifier, $this->reminder, PDO::PARAM_INT);
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
        $pos = MembersTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
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
                return $this->getFirstName();
                break;
            case 2:
                return $this->getMiddleName();
                break;
            case 3:
                return $this->getLastName();
                break;
            case 4:
                return $this->getPosition();
                break;
            case 5:
                return $this->getMailList();
                break;
            case 6:
                return $this->getEmail();
                break;
            case 7:
                return $this->getAim();
                break;
            case 8:
                return $this->getWebsite();
                break;
            case 9:
                return $this->getPhone();
                break;
            case 10:
                return $this->getPermAddress();
                break;
            case 11:
                return $this->getTempAddress();
                break;
            case 12:
                return $this->getAvatar();
                break;
            case 13:
                return $this->getSignature();
                break;
            case 14:
                return $this->getClass();
                break;
            case 15:
                return $this->getUsername();
                break;
            case 16:
                return $this->getPassword();
                break;
            case 17:
                return $this->getFamily();
                break;
            case 18:
                return $this->getBirthday();
                break;
            case 19:
                return $this->getShirtSize();
                break;
            case 20:
                return $this->getTotalService();
                break;
            case 21:
                return $this->getTotalFellowship();
                break;
            case 22:
                return $this->getNotes();
                break;
            case 23:
                return $this->getFeesOwed();
                break;
            case 24:
                return $this->getEmailList();
                break;
            case 25:
                return $this->getReminder();
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

        if (isset($alreadyDumpedObjects['Members'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Members'][$this->hashCode()] = true;
        $keys = MembersTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getId(),
            $keys[1] => $this->getFirstName(),
            $keys[2] => $this->getMiddleName(),
            $keys[3] => $this->getLastName(),
            $keys[4] => $this->getPosition(),
            $keys[5] => $this->getMailList(),
            $keys[6] => $this->getEmail(),
            $keys[7] => $this->getAim(),
            $keys[8] => $this->getWebsite(),
            $keys[9] => $this->getPhone(),
            $keys[10] => $this->getPermAddress(),
            $keys[11] => $this->getTempAddress(),
            $keys[12] => $this->getAvatar(),
            $keys[13] => $this->getSignature(),
            $keys[14] => $this->getClass(),
            $keys[15] => $this->getUsername(),
            $keys[16] => $this->getPassword(),
            $keys[17] => $this->getFamily(),
            $keys[18] => $this->getBirthday(),
            $keys[19] => $this->getShirtSize(),
            $keys[20] => $this->getTotalService(),
            $keys[21] => $this->getTotalFellowship(),
            $keys[22] => $this->getNotes(),
            $keys[23] => $this->getFeesOwed(),
            $keys[24] => $this->getEmailList(),
            $keys[25] => $this->getReminder(),
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
     * @return $this|\Members
     */
    public function setByName($name, $value, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = MembersTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\Members
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setId($value);
                break;
            case 1:
                $this->setFirstName($value);
                break;
            case 2:
                $this->setMiddleName($value);
                break;
            case 3:
                $this->setLastName($value);
                break;
            case 4:
                $this->setPosition($value);
                break;
            case 5:
                $this->setMailList($value);
                break;
            case 6:
                $this->setEmail($value);
                break;
            case 7:
                $this->setAim($value);
                break;
            case 8:
                $this->setWebsite($value);
                break;
            case 9:
                $this->setPhone($value);
                break;
            case 10:
                $this->setPermAddress($value);
                break;
            case 11:
                $this->setTempAddress($value);
                break;
            case 12:
                $this->setAvatar($value);
                break;
            case 13:
                $this->setSignature($value);
                break;
            case 14:
                $this->setClass($value);
                break;
            case 15:
                $this->setUsername($value);
                break;
            case 16:
                $this->setPassword($value);
                break;
            case 17:
                $this->setFamily($value);
                break;
            case 18:
                $this->setBirthday($value);
                break;
            case 19:
                $this->setShirtSize($value);
                break;
            case 20:
                $this->setTotalService($value);
                break;
            case 21:
                $this->setTotalFellowship($value);
                break;
            case 22:
                $this->setNotes($value);
                break;
            case 23:
                $this->setFeesOwed($value);
                break;
            case 24:
                $this->setEmailList($value);
                break;
            case 25:
                $this->setReminder($value);
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
        $keys = MembersTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setId($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setFirstName($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setMiddleName($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setLastName($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setPosition($arr[$keys[4]]);
        }
        if (array_key_exists($keys[5], $arr)) {
            $this->setMailList($arr[$keys[5]]);
        }
        if (array_key_exists($keys[6], $arr)) {
            $this->setEmail($arr[$keys[6]]);
        }
        if (array_key_exists($keys[7], $arr)) {
            $this->setAim($arr[$keys[7]]);
        }
        if (array_key_exists($keys[8], $arr)) {
            $this->setWebsite($arr[$keys[8]]);
        }
        if (array_key_exists($keys[9], $arr)) {
            $this->setPhone($arr[$keys[9]]);
        }
        if (array_key_exists($keys[10], $arr)) {
            $this->setPermAddress($arr[$keys[10]]);
        }
        if (array_key_exists($keys[11], $arr)) {
            $this->setTempAddress($arr[$keys[11]]);
        }
        if (array_key_exists($keys[12], $arr)) {
            $this->setAvatar($arr[$keys[12]]);
        }
        if (array_key_exists($keys[13], $arr)) {
            $this->setSignature($arr[$keys[13]]);
        }
        if (array_key_exists($keys[14], $arr)) {
            $this->setClass($arr[$keys[14]]);
        }
        if (array_key_exists($keys[15], $arr)) {
            $this->setUsername($arr[$keys[15]]);
        }
        if (array_key_exists($keys[16], $arr)) {
            $this->setPassword($arr[$keys[16]]);
        }
        if (array_key_exists($keys[17], $arr)) {
            $this->setFamily($arr[$keys[17]]);
        }
        if (array_key_exists($keys[18], $arr)) {
            $this->setBirthday($arr[$keys[18]]);
        }
        if (array_key_exists($keys[19], $arr)) {
            $this->setShirtSize($arr[$keys[19]]);
        }
        if (array_key_exists($keys[20], $arr)) {
            $this->setTotalService($arr[$keys[20]]);
        }
        if (array_key_exists($keys[21], $arr)) {
            $this->setTotalFellowship($arr[$keys[21]]);
        }
        if (array_key_exists($keys[22], $arr)) {
            $this->setNotes($arr[$keys[22]]);
        }
        if (array_key_exists($keys[23], $arr)) {
            $this->setFeesOwed($arr[$keys[23]]);
        }
        if (array_key_exists($keys[24], $arr)) {
            $this->setEmailList($arr[$keys[24]]);
        }
        if (array_key_exists($keys[25], $arr)) {
            $this->setReminder($arr[$keys[25]]);
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
     * @return $this|\Members The current object, for fluid interface
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
        $criteria = new Criteria(MembersTableMap::DATABASE_NAME);

        if ($this->isColumnModified(MembersTableMap::COL_ID)) {
            $criteria->add(MembersTableMap::COL_ID, $this->id);
        }
        if ($this->isColumnModified(MembersTableMap::COL_FIRST_NAME)) {
            $criteria->add(MembersTableMap::COL_FIRST_NAME, $this->first_name);
        }
        if ($this->isColumnModified(MembersTableMap::COL_MIDDLE_NAME)) {
            $criteria->add(MembersTableMap::COL_MIDDLE_NAME, $this->middle_name);
        }
        if ($this->isColumnModified(MembersTableMap::COL_LAST_NAME)) {
            $criteria->add(MembersTableMap::COL_LAST_NAME, $this->last_name);
        }
        if ($this->isColumnModified(MembersTableMap::COL_POSITION)) {
            $criteria->add(MembersTableMap::COL_POSITION, $this->position);
        }
        if ($this->isColumnModified(MembersTableMap::COL_MAIL_LIST)) {
            $criteria->add(MembersTableMap::COL_MAIL_LIST, $this->mail_list);
        }
        if ($this->isColumnModified(MembersTableMap::COL_EMAIL)) {
            $criteria->add(MembersTableMap::COL_EMAIL, $this->email);
        }
        if ($this->isColumnModified(MembersTableMap::COL_AIM)) {
            $criteria->add(MembersTableMap::COL_AIM, $this->aim);
        }
        if ($this->isColumnModified(MembersTableMap::COL_WEBSITE)) {
            $criteria->add(MembersTableMap::COL_WEBSITE, $this->website);
        }
        if ($this->isColumnModified(MembersTableMap::COL_PHONE)) {
            $criteria->add(MembersTableMap::COL_PHONE, $this->phone);
        }
        if ($this->isColumnModified(MembersTableMap::COL_PERM_ADDRESS)) {
            $criteria->add(MembersTableMap::COL_PERM_ADDRESS, $this->perm_address);
        }
        if ($this->isColumnModified(MembersTableMap::COL_TEMP_ADDRESS)) {
            $criteria->add(MembersTableMap::COL_TEMP_ADDRESS, $this->temp_address);
        }
        if ($this->isColumnModified(MembersTableMap::COL_AVATAR)) {
            $criteria->add(MembersTableMap::COL_AVATAR, $this->avatar);
        }
        if ($this->isColumnModified(MembersTableMap::COL_SIGNATURE)) {
            $criteria->add(MembersTableMap::COL_SIGNATURE, $this->signature);
        }
        if ($this->isColumnModified(MembersTableMap::COL_CLASS)) {
            $criteria->add(MembersTableMap::COL_CLASS, $this->class);
        }
        if ($this->isColumnModified(MembersTableMap::COL_USERNAME)) {
            $criteria->add(MembersTableMap::COL_USERNAME, $this->username);
        }
        if ($this->isColumnModified(MembersTableMap::COL_PASSWORD)) {
            $criteria->add(MembersTableMap::COL_PASSWORD, $this->password);
        }
        if ($this->isColumnModified(MembersTableMap::COL_FAMILY)) {
            $criteria->add(MembersTableMap::COL_FAMILY, $this->family);
        }
        if ($this->isColumnModified(MembersTableMap::COL_BIRTHDAY)) {
            $criteria->add(MembersTableMap::COL_BIRTHDAY, $this->birthday);
        }
        if ($this->isColumnModified(MembersTableMap::COL_SHIRT_SIZE)) {
            $criteria->add(MembersTableMap::COL_SHIRT_SIZE, $this->shirt_size);
        }
        if ($this->isColumnModified(MembersTableMap::COL_TOTAL_SERVICE)) {
            $criteria->add(MembersTableMap::COL_TOTAL_SERVICE, $this->total_service);
        }
        if ($this->isColumnModified(MembersTableMap::COL_TOTAL_FELLOWSHIP)) {
            $criteria->add(MembersTableMap::COL_TOTAL_FELLOWSHIP, $this->total_fellowship);
        }
        if ($this->isColumnModified(MembersTableMap::COL_NOTES)) {
            $criteria->add(MembersTableMap::COL_NOTES, $this->notes);
        }
        if ($this->isColumnModified(MembersTableMap::COL_FEES_OWED)) {
            $criteria->add(MembersTableMap::COL_FEES_OWED, $this->fees_owed);
        }
        if ($this->isColumnModified(MembersTableMap::COL_EMAIL_LIST)) {
            $criteria->add(MembersTableMap::COL_EMAIL_LIST, $this->email_list);
        }
        if ($this->isColumnModified(MembersTableMap::COL_REMINDER)) {
            $criteria->add(MembersTableMap::COL_REMINDER, $this->reminder);
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
        $criteria = ChildMembersQuery::create();
        $criteria->add(MembersTableMap::COL_ID, $this->id);

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
     * @param      object $copyObj An object of \Members (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setFirstName($this->getFirstName());
        $copyObj->setMiddleName($this->getMiddleName());
        $copyObj->setLastName($this->getLastName());
        $copyObj->setPosition($this->getPosition());
        $copyObj->setMailList($this->getMailList());
        $copyObj->setEmail($this->getEmail());
        $copyObj->setAim($this->getAim());
        $copyObj->setWebsite($this->getWebsite());
        $copyObj->setPhone($this->getPhone());
        $copyObj->setPermAddress($this->getPermAddress());
        $copyObj->setTempAddress($this->getTempAddress());
        $copyObj->setAvatar($this->getAvatar());
        $copyObj->setSignature($this->getSignature());
        $copyObj->setClass($this->getClass());
        $copyObj->setUsername($this->getUsername());
        $copyObj->setPassword($this->getPassword());
        $copyObj->setFamily($this->getFamily());
        $copyObj->setBirthday($this->getBirthday());
        $copyObj->setShirtSize($this->getShirtSize());
        $copyObj->setTotalService($this->getTotalService());
        $copyObj->setTotalFellowship($this->getTotalFellowship());
        $copyObj->setNotes($this->getNotes());
        $copyObj->setFeesOwed($this->getFeesOwed());
        $copyObj->setEmailList($this->getEmailList());
        $copyObj->setReminder($this->getReminder());

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
     * @return \Members Clone of current object.
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
     * If this ChildMembers is new, it will return
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
                    ->filterByMembers($this)
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
     * @return $this|ChildMembers The current object (for fluent API support)
     */
    public function setSignupss(Collection $signupss, ConnectionInterface $con = null)
    {
        /** @var ChildSignups[] $signupssToDelete */
        $signupssToDelete = $this->getSignupss(new Criteria(), $con)->diff($signupss);


        $this->signupssScheduledForDeletion = $signupssToDelete;

        foreach ($signupssToDelete as $signupsRemoved) {
            $signupsRemoved->setMembers(null);
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
                ->filterByMembers($this)
                ->count($con);
        }

        return count($this->collSignupss);
    }

    /**
     * Method called to associate a ChildSignups object to this object
     * through the ChildSignups foreign key attribute.
     *
     * @param  ChildSignups $l ChildSignups
     * @return $this|\Members The current object (for fluent API support)
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
        $signups->setMembers($this);
    }

    /**
     * @param  ChildSignups $signups The ChildSignups object to remove.
     * @return $this|ChildMembers The current object (for fluent API support)
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
            $signups->setMembers(null);
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
        $this->id = null;
        $this->first_name = null;
        $this->middle_name = null;
        $this->last_name = null;
        $this->position = null;
        $this->mail_list = null;
        $this->email = null;
        $this->aim = null;
        $this->website = null;
        $this->phone = null;
        $this->perm_address = null;
        $this->temp_address = null;
        $this->avatar = null;
        $this->signature = null;
        $this->class = null;
        $this->username = null;
        $this->password = null;
        $this->family = null;
        $this->birthday = null;
        $this->shirt_size = null;
        $this->total_service = null;
        $this->total_fellowship = null;
        $this->notes = null;
        $this->fees_owed = null;
        $this->email_list = null;
        $this->reminder = null;
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
        return (string) $this->exportTo(MembersTableMap::DEFAULT_STRING_FORMAT);
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
