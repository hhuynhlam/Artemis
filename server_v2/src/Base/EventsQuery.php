<?php

namespace Base;

use \Events as ChildEvents;
use \EventsQuery as ChildEventsQuery;
use \Exception;
use \PDO;
use Map\EventsTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'events' table.
 *
 *
 *
 * @method     ChildEventsQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildEventsQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method     ChildEventsQuery orderByEventCode($order = Criteria::ASC) Order by the event_code column
 * @method     ChildEventsQuery orderByDate($order = Criteria::ASC) Order by the date column
 * @method     ChildEventsQuery orderByLocation($order = Criteria::ASC) Order by the location column
 * @method     ChildEventsQuery orderByMeetLocation($order = Criteria::ASC) Order by the meet_location column
 * @method     ChildEventsQuery orderByMeetTime($order = Criteria::ASC) Order by the meet_time column
 * @method     ChildEventsQuery orderByDescription($order = Criteria::ASC) Order by the description column
 * @method     ChildEventsQuery orderByDriversNeeded($order = Criteria::ASC) Order by the drivers_needed column
 * @method     ChildEventsQuery orderByCreatedBy($order = Criteria::ASC) Order by the created_by column
 * @method     ChildEventsQuery orderByLogPosted($order = Criteria::ASC) Order by the log_posted column
 * @method     ChildEventsQuery orderByLogDescription($order = Criteria::ASC) Order by the log_description column
 * @method     ChildEventsQuery orderByLogComments($order = Criteria::ASC) Order by the log_comments column
 * @method     ChildEventsQuery orderByLogImprovements($order = Criteria::ASC) Order by the log_improvements column
 * @method     ChildEventsQuery orderByLogReattend($order = Criteria::ASC) Order by the log_reattend column
 * @method     ChildEventsQuery orderByOrganization($order = Criteria::ASC) Order by the organization column
 * @method     ChildEventsQuery orderByContactName($order = Criteria::ASC) Order by the contact_name column
 * @method     ChildEventsQuery orderByContactPhone($order = Criteria::ASC) Order by the contact_phone column
 * @method     ChildEventsQuery orderByFratExpense($order = Criteria::ASC) Order by the frat_expense column
 * @method     ChildEventsQuery orderByLogedBy($order = Criteria::ASC) Order by the loged_by column
 * @method     ChildEventsQuery orderByVerified($order = Criteria::ASC) Order by the verified column
 *
 * @method     ChildEventsQuery groupById() Group by the id column
 * @method     ChildEventsQuery groupByName() Group by the name column
 * @method     ChildEventsQuery groupByEventCode() Group by the event_code column
 * @method     ChildEventsQuery groupByDate() Group by the date column
 * @method     ChildEventsQuery groupByLocation() Group by the location column
 * @method     ChildEventsQuery groupByMeetLocation() Group by the meet_location column
 * @method     ChildEventsQuery groupByMeetTime() Group by the meet_time column
 * @method     ChildEventsQuery groupByDescription() Group by the description column
 * @method     ChildEventsQuery groupByDriversNeeded() Group by the drivers_needed column
 * @method     ChildEventsQuery groupByCreatedBy() Group by the created_by column
 * @method     ChildEventsQuery groupByLogPosted() Group by the log_posted column
 * @method     ChildEventsQuery groupByLogDescription() Group by the log_description column
 * @method     ChildEventsQuery groupByLogComments() Group by the log_comments column
 * @method     ChildEventsQuery groupByLogImprovements() Group by the log_improvements column
 * @method     ChildEventsQuery groupByLogReattend() Group by the log_reattend column
 * @method     ChildEventsQuery groupByOrganization() Group by the organization column
 * @method     ChildEventsQuery groupByContactName() Group by the contact_name column
 * @method     ChildEventsQuery groupByContactPhone() Group by the contact_phone column
 * @method     ChildEventsQuery groupByFratExpense() Group by the frat_expense column
 * @method     ChildEventsQuery groupByLogedBy() Group by the loged_by column
 * @method     ChildEventsQuery groupByVerified() Group by the verified column
 *
 * @method     ChildEventsQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildEventsQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildEventsQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildEvents findOne(ConnectionInterface $con = null) Return the first ChildEvents matching the query
 * @method     ChildEvents findOneOrCreate(ConnectionInterface $con = null) Return the first ChildEvents matching the query, or a new ChildEvents object populated from the query conditions when no match is found
 *
 * @method     ChildEvents findOneById(int $id) Return the first ChildEvents filtered by the id column
 * @method     ChildEvents findOneByName(string $name) Return the first ChildEvents filtered by the name column
 * @method     ChildEvents findOneByEventCode(int $event_code) Return the first ChildEvents filtered by the event_code column
 * @method     ChildEvents findOneByDate(string $date) Return the first ChildEvents filtered by the date column
 * @method     ChildEvents findOneByLocation(string $location) Return the first ChildEvents filtered by the location column
 * @method     ChildEvents findOneByMeetLocation(string $meet_location) Return the first ChildEvents filtered by the meet_location column
 * @method     ChildEvents findOneByMeetTime(string $meet_time) Return the first ChildEvents filtered by the meet_time column
 * @method     ChildEvents findOneByDescription(string $description) Return the first ChildEvents filtered by the description column
 * @method     ChildEvents findOneByDriversNeeded(int $drivers_needed) Return the first ChildEvents filtered by the drivers_needed column
 * @method     ChildEvents findOneByCreatedBy(int $created_by) Return the first ChildEvents filtered by the created_by column
 * @method     ChildEvents findOneByLogPosted(boolean $log_posted) Return the first ChildEvents filtered by the log_posted column
 * @method     ChildEvents findOneByLogDescription(string $log_description) Return the first ChildEvents filtered by the log_description column
 * @method     ChildEvents findOneByLogComments(string $log_comments) Return the first ChildEvents filtered by the log_comments column
 * @method     ChildEvents findOneByLogImprovements(string $log_improvements) Return the first ChildEvents filtered by the log_improvements column
 * @method     ChildEvents findOneByLogReattend(string $log_reattend) Return the first ChildEvents filtered by the log_reattend column
 * @method     ChildEvents findOneByOrganization(string $organization) Return the first ChildEvents filtered by the organization column
 * @method     ChildEvents findOneByContactName(string $contact_name) Return the first ChildEvents filtered by the contact_name column
 * @method     ChildEvents findOneByContactPhone(string $contact_phone) Return the first ChildEvents filtered by the contact_phone column
 * @method     ChildEvents findOneByFratExpense(double $frat_expense) Return the first ChildEvents filtered by the frat_expense column
 * @method     ChildEvents findOneByLogedBy(int $loged_by) Return the first ChildEvents filtered by the loged_by column
 * @method     ChildEvents findOneByVerified(boolean $verified) Return the first ChildEvents filtered by the verified column *

 * @method     ChildEvents requirePk($key, ConnectionInterface $con = null) Return the ChildEvents by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEvents requireOne(ConnectionInterface $con = null) Return the first ChildEvents matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildEvents requireOneById(int $id) Return the first ChildEvents filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEvents requireOneByName(string $name) Return the first ChildEvents filtered by the name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEvents requireOneByEventCode(int $event_code) Return the first ChildEvents filtered by the event_code column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEvents requireOneByDate(string $date) Return the first ChildEvents filtered by the date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEvents requireOneByLocation(string $location) Return the first ChildEvents filtered by the location column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEvents requireOneByMeetLocation(string $meet_location) Return the first ChildEvents filtered by the meet_location column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEvents requireOneByMeetTime(string $meet_time) Return the first ChildEvents filtered by the meet_time column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEvents requireOneByDescription(string $description) Return the first ChildEvents filtered by the description column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEvents requireOneByDriversNeeded(int $drivers_needed) Return the first ChildEvents filtered by the drivers_needed column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEvents requireOneByCreatedBy(int $created_by) Return the first ChildEvents filtered by the created_by column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEvents requireOneByLogPosted(boolean $log_posted) Return the first ChildEvents filtered by the log_posted column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEvents requireOneByLogDescription(string $log_description) Return the first ChildEvents filtered by the log_description column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEvents requireOneByLogComments(string $log_comments) Return the first ChildEvents filtered by the log_comments column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEvents requireOneByLogImprovements(string $log_improvements) Return the first ChildEvents filtered by the log_improvements column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEvents requireOneByLogReattend(string $log_reattend) Return the first ChildEvents filtered by the log_reattend column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEvents requireOneByOrganization(string $organization) Return the first ChildEvents filtered by the organization column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEvents requireOneByContactName(string $contact_name) Return the first ChildEvents filtered by the contact_name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEvents requireOneByContactPhone(string $contact_phone) Return the first ChildEvents filtered by the contact_phone column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEvents requireOneByFratExpense(double $frat_expense) Return the first ChildEvents filtered by the frat_expense column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEvents requireOneByLogedBy(int $loged_by) Return the first ChildEvents filtered by the loged_by column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEvents requireOneByVerified(boolean $verified) Return the first ChildEvents filtered by the verified column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildEvents[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildEvents objects based on current ModelCriteria
 * @method     ChildEvents[]|ObjectCollection findById(int $id) Return ChildEvents objects filtered by the id column
 * @method     ChildEvents[]|ObjectCollection findByName(string $name) Return ChildEvents objects filtered by the name column
 * @method     ChildEvents[]|ObjectCollection findByEventCode(int $event_code) Return ChildEvents objects filtered by the event_code column
 * @method     ChildEvents[]|ObjectCollection findByDate(string $date) Return ChildEvents objects filtered by the date column
 * @method     ChildEvents[]|ObjectCollection findByLocation(string $location) Return ChildEvents objects filtered by the location column
 * @method     ChildEvents[]|ObjectCollection findByMeetLocation(string $meet_location) Return ChildEvents objects filtered by the meet_location column
 * @method     ChildEvents[]|ObjectCollection findByMeetTime(string $meet_time) Return ChildEvents objects filtered by the meet_time column
 * @method     ChildEvents[]|ObjectCollection findByDescription(string $description) Return ChildEvents objects filtered by the description column
 * @method     ChildEvents[]|ObjectCollection findByDriversNeeded(int $drivers_needed) Return ChildEvents objects filtered by the drivers_needed column
 * @method     ChildEvents[]|ObjectCollection findByCreatedBy(int $created_by) Return ChildEvents objects filtered by the created_by column
 * @method     ChildEvents[]|ObjectCollection findByLogPosted(boolean $log_posted) Return ChildEvents objects filtered by the log_posted column
 * @method     ChildEvents[]|ObjectCollection findByLogDescription(string $log_description) Return ChildEvents objects filtered by the log_description column
 * @method     ChildEvents[]|ObjectCollection findByLogComments(string $log_comments) Return ChildEvents objects filtered by the log_comments column
 * @method     ChildEvents[]|ObjectCollection findByLogImprovements(string $log_improvements) Return ChildEvents objects filtered by the log_improvements column
 * @method     ChildEvents[]|ObjectCollection findByLogReattend(string $log_reattend) Return ChildEvents objects filtered by the log_reattend column
 * @method     ChildEvents[]|ObjectCollection findByOrganization(string $organization) Return ChildEvents objects filtered by the organization column
 * @method     ChildEvents[]|ObjectCollection findByContactName(string $contact_name) Return ChildEvents objects filtered by the contact_name column
 * @method     ChildEvents[]|ObjectCollection findByContactPhone(string $contact_phone) Return ChildEvents objects filtered by the contact_phone column
 * @method     ChildEvents[]|ObjectCollection findByFratExpense(double $frat_expense) Return ChildEvents objects filtered by the frat_expense column
 * @method     ChildEvents[]|ObjectCollection findByLogedBy(int $loged_by) Return ChildEvents objects filtered by the loged_by column
 * @method     ChildEvents[]|ObjectCollection findByVerified(boolean $verified) Return ChildEvents objects filtered by the verified column
 * @method     ChildEvents[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class EventsQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\EventsQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'aphio', $modelName = '\\Events', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildEventsQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildEventsQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildEventsQuery) {
            return $criteria;
        }
        $query = new ChildEventsQuery();
        if (null !== $modelAlias) {
            $query->setModelAlias($modelAlias);
        }
        if ($criteria instanceof Criteria) {
            $query->mergeWith($criteria);
        }

        return $query;
    }

    /**
     * Find object by primary key.
     * Propel uses the instance pool to skip the database if the object exists.
     * Go fast if the query is untouched.
     *
     * <code>
     * $obj  = $c->findPk(12, $con);
     * </code>
     *
     * @param mixed $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildEvents|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = EventsTableMap::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(EventsTableMap::DATABASE_NAME);
        }
        $this->basePreSelect($con);
        if ($this->formatter || $this->modelAlias || $this->with || $this->select
         || $this->selectColumns || $this->asColumns || $this->selectModifiers
         || $this->map || $this->having || $this->joins) {
            return $this->findPkComplex($key, $con);
        } else {
            return $this->findPkSimple($key, $con);
        }
    }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildEvents A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT `id`, `name`, `event_code`, `date`, `location`, `meet_location`, `meet_time`, `description`, `drivers_needed`, `created_by`, `log_posted`, `log_description`, `log_comments`, `log_improvements`, `log_reattend`, `organization`, `contact_name`, `contact_phone`, `frat_expense`, `loged_by`, `verified` FROM `events` WHERE `id` = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildEvents $obj */
            $obj = new ChildEvents();
            $obj->hydrate($row);
            EventsTableMap::addInstanceToPool($obj, (string) $key);
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @return ChildEvents|array|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, ConnectionInterface $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($dataFetcher);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(12, 56, 832), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     ConnectionInterface $con an optional connection object
     *
     * @return ObjectCollection|array|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getReadConnection($this->getDbName());
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($dataFetcher);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildEventsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(EventsTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildEventsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(EventsTableMap::COL_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id column
     *
     * Example usage:
     * <code>
     * $query->filterById(1234); // WHERE id = 1234
     * $query->filterById(array(12, 34)); // WHERE id IN (12, 34)
     * $query->filterById(array('min' => 12)); // WHERE id > 12
     * </code>
     *
     * @param     mixed $id The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEventsQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(EventsTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(EventsTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EventsTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the name column
     *
     * Example usage:
     * <code>
     * $query->filterByName('fooValue');   // WHERE name = 'fooValue'
     * $query->filterByName('%fooValue%'); // WHERE name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $name The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEventsQuery The current query, for fluid interface
     */
    public function filterByName($name = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($name)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $name)) {
                $name = str_replace('*', '%', $name);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(EventsTableMap::COL_NAME, $name, $comparison);
    }

    /**
     * Filter the query on the event_code column
     *
     * Example usage:
     * <code>
     * $query->filterByEventCode(1234); // WHERE event_code = 1234
     * $query->filterByEventCode(array(12, 34)); // WHERE event_code IN (12, 34)
     * $query->filterByEventCode(array('min' => 12)); // WHERE event_code > 12
     * </code>
     *
     * @param     mixed $eventCode The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEventsQuery The current query, for fluid interface
     */
    public function filterByEventCode($eventCode = null, $comparison = null)
    {
        if (is_array($eventCode)) {
            $useMinMax = false;
            if (isset($eventCode['min'])) {
                $this->addUsingAlias(EventsTableMap::COL_EVENT_CODE, $eventCode['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($eventCode['max'])) {
                $this->addUsingAlias(EventsTableMap::COL_EVENT_CODE, $eventCode['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EventsTableMap::COL_EVENT_CODE, $eventCode, $comparison);
    }

    /**
     * Filter the query on the date column
     *
     * Example usage:
     * <code>
     * $query->filterByDate(1234); // WHERE date = 1234
     * $query->filterByDate(array(12, 34)); // WHERE date IN (12, 34)
     * $query->filterByDate(array('min' => 12)); // WHERE date > 12
     * </code>
     *
     * @param     mixed $date The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEventsQuery The current query, for fluid interface
     */
    public function filterByDate($date = null, $comparison = null)
    {
        if (is_array($date)) {
            $useMinMax = false;
            if (isset($date['min'])) {
                $this->addUsingAlias(EventsTableMap::COL_DATE, $date['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($date['max'])) {
                $this->addUsingAlias(EventsTableMap::COL_DATE, $date['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EventsTableMap::COL_DATE, $date, $comparison);
    }

    /**
     * Filter the query on the location column
     *
     * Example usage:
     * <code>
     * $query->filterByLocation('fooValue');   // WHERE location = 'fooValue'
     * $query->filterByLocation('%fooValue%'); // WHERE location LIKE '%fooValue%'
     * </code>
     *
     * @param     string $location The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEventsQuery The current query, for fluid interface
     */
    public function filterByLocation($location = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($location)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $location)) {
                $location = str_replace('*', '%', $location);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(EventsTableMap::COL_LOCATION, $location, $comparison);
    }

    /**
     * Filter the query on the meet_location column
     *
     * Example usage:
     * <code>
     * $query->filterByMeetLocation('fooValue');   // WHERE meet_location = 'fooValue'
     * $query->filterByMeetLocation('%fooValue%'); // WHERE meet_location LIKE '%fooValue%'
     * </code>
     *
     * @param     string $meetLocation The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEventsQuery The current query, for fluid interface
     */
    public function filterByMeetLocation($meetLocation = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($meetLocation)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $meetLocation)) {
                $meetLocation = str_replace('*', '%', $meetLocation);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(EventsTableMap::COL_MEET_LOCATION, $meetLocation, $comparison);
    }

    /**
     * Filter the query on the meet_time column
     *
     * Example usage:
     * <code>
     * $query->filterByMeetTime('fooValue');   // WHERE meet_time = 'fooValue'
     * $query->filterByMeetTime('%fooValue%'); // WHERE meet_time LIKE '%fooValue%'
     * </code>
     *
     * @param     string $meetTime The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEventsQuery The current query, for fluid interface
     */
    public function filterByMeetTime($meetTime = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($meetTime)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $meetTime)) {
                $meetTime = str_replace('*', '%', $meetTime);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(EventsTableMap::COL_MEET_TIME, $meetTime, $comparison);
    }

    /**
     * Filter the query on the description column
     *
     * Example usage:
     * <code>
     * $query->filterByDescription('fooValue');   // WHERE description = 'fooValue'
     * $query->filterByDescription('%fooValue%'); // WHERE description LIKE '%fooValue%'
     * </code>
     *
     * @param     string $description The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEventsQuery The current query, for fluid interface
     */
    public function filterByDescription($description = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($description)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $description)) {
                $description = str_replace('*', '%', $description);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(EventsTableMap::COL_DESCRIPTION, $description, $comparison);
    }

    /**
     * Filter the query on the drivers_needed column
     *
     * Example usage:
     * <code>
     * $query->filterByDriversNeeded(1234); // WHERE drivers_needed = 1234
     * $query->filterByDriversNeeded(array(12, 34)); // WHERE drivers_needed IN (12, 34)
     * $query->filterByDriversNeeded(array('min' => 12)); // WHERE drivers_needed > 12
     * </code>
     *
     * @param     mixed $driversNeeded The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEventsQuery The current query, for fluid interface
     */
    public function filterByDriversNeeded($driversNeeded = null, $comparison = null)
    {
        if (is_array($driversNeeded)) {
            $useMinMax = false;
            if (isset($driversNeeded['min'])) {
                $this->addUsingAlias(EventsTableMap::COL_DRIVERS_NEEDED, $driversNeeded['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($driversNeeded['max'])) {
                $this->addUsingAlias(EventsTableMap::COL_DRIVERS_NEEDED, $driversNeeded['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EventsTableMap::COL_DRIVERS_NEEDED, $driversNeeded, $comparison);
    }

    /**
     * Filter the query on the created_by column
     *
     * Example usage:
     * <code>
     * $query->filterByCreatedBy(1234); // WHERE created_by = 1234
     * $query->filterByCreatedBy(array(12, 34)); // WHERE created_by IN (12, 34)
     * $query->filterByCreatedBy(array('min' => 12)); // WHERE created_by > 12
     * </code>
     *
     * @param     mixed $createdBy The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEventsQuery The current query, for fluid interface
     */
    public function filterByCreatedBy($createdBy = null, $comparison = null)
    {
        if (is_array($createdBy)) {
            $useMinMax = false;
            if (isset($createdBy['min'])) {
                $this->addUsingAlias(EventsTableMap::COL_CREATED_BY, $createdBy['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdBy['max'])) {
                $this->addUsingAlias(EventsTableMap::COL_CREATED_BY, $createdBy['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EventsTableMap::COL_CREATED_BY, $createdBy, $comparison);
    }

    /**
     * Filter the query on the log_posted column
     *
     * Example usage:
     * <code>
     * $query->filterByLogPosted(true); // WHERE log_posted = true
     * $query->filterByLogPosted('yes'); // WHERE log_posted = true
     * </code>
     *
     * @param     boolean|string $logPosted The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEventsQuery The current query, for fluid interface
     */
    public function filterByLogPosted($logPosted = null, $comparison = null)
    {
        if (is_string($logPosted)) {
            $logPosted = in_array(strtolower($logPosted), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(EventsTableMap::COL_LOG_POSTED, $logPosted, $comparison);
    }

    /**
     * Filter the query on the log_description column
     *
     * Example usage:
     * <code>
     * $query->filterByLogDescription('fooValue');   // WHERE log_description = 'fooValue'
     * $query->filterByLogDescription('%fooValue%'); // WHERE log_description LIKE '%fooValue%'
     * </code>
     *
     * @param     string $logDescription The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEventsQuery The current query, for fluid interface
     */
    public function filterByLogDescription($logDescription = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($logDescription)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $logDescription)) {
                $logDescription = str_replace('*', '%', $logDescription);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(EventsTableMap::COL_LOG_DESCRIPTION, $logDescription, $comparison);
    }

    /**
     * Filter the query on the log_comments column
     *
     * Example usage:
     * <code>
     * $query->filterByLogComments('fooValue');   // WHERE log_comments = 'fooValue'
     * $query->filterByLogComments('%fooValue%'); // WHERE log_comments LIKE '%fooValue%'
     * </code>
     *
     * @param     string $logComments The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEventsQuery The current query, for fluid interface
     */
    public function filterByLogComments($logComments = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($logComments)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $logComments)) {
                $logComments = str_replace('*', '%', $logComments);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(EventsTableMap::COL_LOG_COMMENTS, $logComments, $comparison);
    }

    /**
     * Filter the query on the log_improvements column
     *
     * Example usage:
     * <code>
     * $query->filterByLogImprovements('fooValue');   // WHERE log_improvements = 'fooValue'
     * $query->filterByLogImprovements('%fooValue%'); // WHERE log_improvements LIKE '%fooValue%'
     * </code>
     *
     * @param     string $logImprovements The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEventsQuery The current query, for fluid interface
     */
    public function filterByLogImprovements($logImprovements = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($logImprovements)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $logImprovements)) {
                $logImprovements = str_replace('*', '%', $logImprovements);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(EventsTableMap::COL_LOG_IMPROVEMENTS, $logImprovements, $comparison);
    }

    /**
     * Filter the query on the log_reattend column
     *
     * Example usage:
     * <code>
     * $query->filterByLogReattend('fooValue');   // WHERE log_reattend = 'fooValue'
     * $query->filterByLogReattend('%fooValue%'); // WHERE log_reattend LIKE '%fooValue%'
     * </code>
     *
     * @param     string $logReattend The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEventsQuery The current query, for fluid interface
     */
    public function filterByLogReattend($logReattend = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($logReattend)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $logReattend)) {
                $logReattend = str_replace('*', '%', $logReattend);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(EventsTableMap::COL_LOG_REATTEND, $logReattend, $comparison);
    }

    /**
     * Filter the query on the organization column
     *
     * Example usage:
     * <code>
     * $query->filterByOrganization('fooValue');   // WHERE organization = 'fooValue'
     * $query->filterByOrganization('%fooValue%'); // WHERE organization LIKE '%fooValue%'
     * </code>
     *
     * @param     string $organization The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEventsQuery The current query, for fluid interface
     */
    public function filterByOrganization($organization = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($organization)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $organization)) {
                $organization = str_replace('*', '%', $organization);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(EventsTableMap::COL_ORGANIZATION, $organization, $comparison);
    }

    /**
     * Filter the query on the contact_name column
     *
     * Example usage:
     * <code>
     * $query->filterByContactName('fooValue');   // WHERE contact_name = 'fooValue'
     * $query->filterByContactName('%fooValue%'); // WHERE contact_name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $contactName The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEventsQuery The current query, for fluid interface
     */
    public function filterByContactName($contactName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($contactName)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $contactName)) {
                $contactName = str_replace('*', '%', $contactName);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(EventsTableMap::COL_CONTACT_NAME, $contactName, $comparison);
    }

    /**
     * Filter the query on the contact_phone column
     *
     * Example usage:
     * <code>
     * $query->filterByContactPhone(1234); // WHERE contact_phone = 1234
     * $query->filterByContactPhone(array(12, 34)); // WHERE contact_phone IN (12, 34)
     * $query->filterByContactPhone(array('min' => 12)); // WHERE contact_phone > 12
     * </code>
     *
     * @param     mixed $contactPhone The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEventsQuery The current query, for fluid interface
     */
    public function filterByContactPhone($contactPhone = null, $comparison = null)
    {
        if (is_array($contactPhone)) {
            $useMinMax = false;
            if (isset($contactPhone['min'])) {
                $this->addUsingAlias(EventsTableMap::COL_CONTACT_PHONE, $contactPhone['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($contactPhone['max'])) {
                $this->addUsingAlias(EventsTableMap::COL_CONTACT_PHONE, $contactPhone['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EventsTableMap::COL_CONTACT_PHONE, $contactPhone, $comparison);
    }

    /**
     * Filter the query on the frat_expense column
     *
     * Example usage:
     * <code>
     * $query->filterByFratExpense(1234); // WHERE frat_expense = 1234
     * $query->filterByFratExpense(array(12, 34)); // WHERE frat_expense IN (12, 34)
     * $query->filterByFratExpense(array('min' => 12)); // WHERE frat_expense > 12
     * </code>
     *
     * @param     mixed $fratExpense The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEventsQuery The current query, for fluid interface
     */
    public function filterByFratExpense($fratExpense = null, $comparison = null)
    {
        if (is_array($fratExpense)) {
            $useMinMax = false;
            if (isset($fratExpense['min'])) {
                $this->addUsingAlias(EventsTableMap::COL_FRAT_EXPENSE, $fratExpense['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fratExpense['max'])) {
                $this->addUsingAlias(EventsTableMap::COL_FRAT_EXPENSE, $fratExpense['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EventsTableMap::COL_FRAT_EXPENSE, $fratExpense, $comparison);
    }

    /**
     * Filter the query on the loged_by column
     *
     * Example usage:
     * <code>
     * $query->filterByLogedBy(1234); // WHERE loged_by = 1234
     * $query->filterByLogedBy(array(12, 34)); // WHERE loged_by IN (12, 34)
     * $query->filterByLogedBy(array('min' => 12)); // WHERE loged_by > 12
     * </code>
     *
     * @param     mixed $logedBy The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEventsQuery The current query, for fluid interface
     */
    public function filterByLogedBy($logedBy = null, $comparison = null)
    {
        if (is_array($logedBy)) {
            $useMinMax = false;
            if (isset($logedBy['min'])) {
                $this->addUsingAlias(EventsTableMap::COL_LOGED_BY, $logedBy['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($logedBy['max'])) {
                $this->addUsingAlias(EventsTableMap::COL_LOGED_BY, $logedBy['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EventsTableMap::COL_LOGED_BY, $logedBy, $comparison);
    }

    /**
     * Filter the query on the verified column
     *
     * Example usage:
     * <code>
     * $query->filterByVerified(true); // WHERE verified = true
     * $query->filterByVerified('yes'); // WHERE verified = true
     * </code>
     *
     * @param     boolean|string $verified The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEventsQuery The current query, for fluid interface
     */
    public function filterByVerified($verified = null, $comparison = null)
    {
        if (is_string($verified)) {
            $verified = in_array(strtolower($verified), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(EventsTableMap::COL_VERIFIED, $verified, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildEvents $events Object to remove from the list of results
     *
     * @return $this|ChildEventsQuery The current query, for fluid interface
     */
    public function prune($events = null)
    {
        if ($events) {
            $this->addUsingAlias(EventsTableMap::COL_ID, $events->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the events table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(EventsTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            EventsTableMap::clearInstancePool();
            EventsTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    /**
     * Performs a DELETE on the database based on the current ModelCriteria
     *
     * @param ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public function delete(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(EventsTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(EventsTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            EventsTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            EventsTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // EventsQuery
