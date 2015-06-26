<?php

namespace Base;

use \InterchapterSignups as ChildInterchapterSignups;
use \InterchapterSignupsQuery as ChildInterchapterSignupsQuery;
use \Exception;
use \PDO;
use Map\InterchapterSignupsTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'interchapter_signups' table.
 *
 *
 *
 * @method     ChildInterchapterSignupsQuery orderByEventId($order = Criteria::ASC) Order by the event_id column
 * @method     ChildInterchapterSignupsQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildInterchapterSignupsQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method     ChildInterchapterSignupsQuery orderByChapter($order = Criteria::ASC) Order by the chapter column
 * @method     ChildInterchapterSignupsQuery orderByEmail($order = Criteria::ASC) Order by the email column
 * @method     ChildInterchapterSignupsQuery orderByPhone($order = Criteria::ASC) Order by the phone column
 * @method     ChildInterchapterSignupsQuery orderByDate($order = Criteria::ASC) Order by the date column
 * @method     ChildInterchapterSignupsQuery orderByShirtSize($order = Criteria::ASC) Order by the shirt_size column
 * @method     ChildInterchapterSignupsQuery orderByVegetarian($order = Criteria::ASC) Order by the vegetarian column
 * @method     ChildInterchapterSignupsQuery orderByHousingNeeded($order = Criteria::ASC) Order by the housing_needed column
 * @method     ChildInterchapterSignupsQuery orderByDeleted($order = Criteria::ASC) Order by the deleted column
 *
 * @method     ChildInterchapterSignupsQuery groupByEventId() Group by the event_id column
 * @method     ChildInterchapterSignupsQuery groupById() Group by the id column
 * @method     ChildInterchapterSignupsQuery groupByName() Group by the name column
 * @method     ChildInterchapterSignupsQuery groupByChapter() Group by the chapter column
 * @method     ChildInterchapterSignupsQuery groupByEmail() Group by the email column
 * @method     ChildInterchapterSignupsQuery groupByPhone() Group by the phone column
 * @method     ChildInterchapterSignupsQuery groupByDate() Group by the date column
 * @method     ChildInterchapterSignupsQuery groupByShirtSize() Group by the shirt_size column
 * @method     ChildInterchapterSignupsQuery groupByVegetarian() Group by the vegetarian column
 * @method     ChildInterchapterSignupsQuery groupByHousingNeeded() Group by the housing_needed column
 * @method     ChildInterchapterSignupsQuery groupByDeleted() Group by the deleted column
 *
 * @method     ChildInterchapterSignupsQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildInterchapterSignupsQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildInterchapterSignupsQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildInterchapterSignups findOne(ConnectionInterface $con = null) Return the first ChildInterchapterSignups matching the query
 * @method     ChildInterchapterSignups findOneOrCreate(ConnectionInterface $con = null) Return the first ChildInterchapterSignups matching the query, or a new ChildInterchapterSignups object populated from the query conditions when no match is found
 *
 * @method     ChildInterchapterSignups findOneByEventId(int $event_id) Return the first ChildInterchapterSignups filtered by the event_id column
 * @method     ChildInterchapterSignups findOneById(int $id) Return the first ChildInterchapterSignups filtered by the id column
 * @method     ChildInterchapterSignups findOneByName(string $name) Return the first ChildInterchapterSignups filtered by the name column
 * @method     ChildInterchapterSignups findOneByChapter(string $chapter) Return the first ChildInterchapterSignups filtered by the chapter column
 * @method     ChildInterchapterSignups findOneByEmail(string $email) Return the first ChildInterchapterSignups filtered by the email column
 * @method     ChildInterchapterSignups findOneByPhone(string $phone) Return the first ChildInterchapterSignups filtered by the phone column
 * @method     ChildInterchapterSignups findOneByDate(int $date) Return the first ChildInterchapterSignups filtered by the date column
 * @method     ChildInterchapterSignups findOneByShirtSize(string $shirt_size) Return the first ChildInterchapterSignups filtered by the shirt_size column
 * @method     ChildInterchapterSignups findOneByVegetarian(boolean $vegetarian) Return the first ChildInterchapterSignups filtered by the vegetarian column
 * @method     ChildInterchapterSignups findOneByHousingNeeded(int $housing_needed) Return the first ChildInterchapterSignups filtered by the housing_needed column
 * @method     ChildInterchapterSignups findOneByDeleted(int $deleted) Return the first ChildInterchapterSignups filtered by the deleted column *

 * @method     ChildInterchapterSignups requirePk($key, ConnectionInterface $con = null) Return the ChildInterchapterSignups by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInterchapterSignups requireOne(ConnectionInterface $con = null) Return the first ChildInterchapterSignups matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildInterchapterSignups requireOneByEventId(int $event_id) Return the first ChildInterchapterSignups filtered by the event_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInterchapterSignups requireOneById(int $id) Return the first ChildInterchapterSignups filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInterchapterSignups requireOneByName(string $name) Return the first ChildInterchapterSignups filtered by the name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInterchapterSignups requireOneByChapter(string $chapter) Return the first ChildInterchapterSignups filtered by the chapter column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInterchapterSignups requireOneByEmail(string $email) Return the first ChildInterchapterSignups filtered by the email column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInterchapterSignups requireOneByPhone(string $phone) Return the first ChildInterchapterSignups filtered by the phone column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInterchapterSignups requireOneByDate(int $date) Return the first ChildInterchapterSignups filtered by the date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInterchapterSignups requireOneByShirtSize(string $shirt_size) Return the first ChildInterchapterSignups filtered by the shirt_size column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInterchapterSignups requireOneByVegetarian(boolean $vegetarian) Return the first ChildInterchapterSignups filtered by the vegetarian column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInterchapterSignups requireOneByHousingNeeded(int $housing_needed) Return the first ChildInterchapterSignups filtered by the housing_needed column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInterchapterSignups requireOneByDeleted(int $deleted) Return the first ChildInterchapterSignups filtered by the deleted column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildInterchapterSignups[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildInterchapterSignups objects based on current ModelCriteria
 * @method     ChildInterchapterSignups[]|ObjectCollection findByEventId(int $event_id) Return ChildInterchapterSignups objects filtered by the event_id column
 * @method     ChildInterchapterSignups[]|ObjectCollection findById(int $id) Return ChildInterchapterSignups objects filtered by the id column
 * @method     ChildInterchapterSignups[]|ObjectCollection findByName(string $name) Return ChildInterchapterSignups objects filtered by the name column
 * @method     ChildInterchapterSignups[]|ObjectCollection findByChapter(string $chapter) Return ChildInterchapterSignups objects filtered by the chapter column
 * @method     ChildInterchapterSignups[]|ObjectCollection findByEmail(string $email) Return ChildInterchapterSignups objects filtered by the email column
 * @method     ChildInterchapterSignups[]|ObjectCollection findByPhone(string $phone) Return ChildInterchapterSignups objects filtered by the phone column
 * @method     ChildInterchapterSignups[]|ObjectCollection findByDate(int $date) Return ChildInterchapterSignups objects filtered by the date column
 * @method     ChildInterchapterSignups[]|ObjectCollection findByShirtSize(string $shirt_size) Return ChildInterchapterSignups objects filtered by the shirt_size column
 * @method     ChildInterchapterSignups[]|ObjectCollection findByVegetarian(boolean $vegetarian) Return ChildInterchapterSignups objects filtered by the vegetarian column
 * @method     ChildInterchapterSignups[]|ObjectCollection findByHousingNeeded(int $housing_needed) Return ChildInterchapterSignups objects filtered by the housing_needed column
 * @method     ChildInterchapterSignups[]|ObjectCollection findByDeleted(int $deleted) Return ChildInterchapterSignups objects filtered by the deleted column
 * @method     ChildInterchapterSignups[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class InterchapterSignupsQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\InterchapterSignupsQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'aphio', $modelName = '\\InterchapterSignups', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildInterchapterSignupsQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildInterchapterSignupsQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildInterchapterSignupsQuery) {
            return $criteria;
        }
        $query = new ChildInterchapterSignupsQuery();
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
     * @return ChildInterchapterSignups|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = InterchapterSignupsTableMap::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(InterchapterSignupsTableMap::DATABASE_NAME);
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
     * @return ChildInterchapterSignups A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT `event_id`, `id`, `name`, `chapter`, `email`, `phone`, `date`, `shirt_size`, `vegetarian`, `housing_needed`, `deleted` FROM `interchapter_signups` WHERE `id` = :p0';
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
            /** @var ChildInterchapterSignups $obj */
            $obj = new ChildInterchapterSignups();
            $obj->hydrate($row);
            InterchapterSignupsTableMap::addInstanceToPool($obj, (string) $key);
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
     * @return ChildInterchapterSignups|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildInterchapterSignupsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(InterchapterSignupsTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildInterchapterSignupsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(InterchapterSignupsTableMap::COL_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the event_id column
     *
     * Example usage:
     * <code>
     * $query->filterByEventId(1234); // WHERE event_id = 1234
     * $query->filterByEventId(array(12, 34)); // WHERE event_id IN (12, 34)
     * $query->filterByEventId(array('min' => 12)); // WHERE event_id > 12
     * </code>
     *
     * @param     mixed $eventId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildInterchapterSignupsQuery The current query, for fluid interface
     */
    public function filterByEventId($eventId = null, $comparison = null)
    {
        if (is_array($eventId)) {
            $useMinMax = false;
            if (isset($eventId['min'])) {
                $this->addUsingAlias(InterchapterSignupsTableMap::COL_EVENT_ID, $eventId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($eventId['max'])) {
                $this->addUsingAlias(InterchapterSignupsTableMap::COL_EVENT_ID, $eventId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InterchapterSignupsTableMap::COL_EVENT_ID, $eventId, $comparison);
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
     * @return $this|ChildInterchapterSignupsQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(InterchapterSignupsTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(InterchapterSignupsTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InterchapterSignupsTableMap::COL_ID, $id, $comparison);
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
     * @return $this|ChildInterchapterSignupsQuery The current query, for fluid interface
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

        return $this->addUsingAlias(InterchapterSignupsTableMap::COL_NAME, $name, $comparison);
    }

    /**
     * Filter the query on the chapter column
     *
     * Example usage:
     * <code>
     * $query->filterByChapter('fooValue');   // WHERE chapter = 'fooValue'
     * $query->filterByChapter('%fooValue%'); // WHERE chapter LIKE '%fooValue%'
     * </code>
     *
     * @param     string $chapter The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildInterchapterSignupsQuery The current query, for fluid interface
     */
    public function filterByChapter($chapter = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($chapter)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $chapter)) {
                $chapter = str_replace('*', '%', $chapter);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(InterchapterSignupsTableMap::COL_CHAPTER, $chapter, $comparison);
    }

    /**
     * Filter the query on the email column
     *
     * Example usage:
     * <code>
     * $query->filterByEmail('fooValue');   // WHERE email = 'fooValue'
     * $query->filterByEmail('%fooValue%'); // WHERE email LIKE '%fooValue%'
     * </code>
     *
     * @param     string $email The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildInterchapterSignupsQuery The current query, for fluid interface
     */
    public function filterByEmail($email = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($email)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $email)) {
                $email = str_replace('*', '%', $email);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(InterchapterSignupsTableMap::COL_EMAIL, $email, $comparison);
    }

    /**
     * Filter the query on the phone column
     *
     * Example usage:
     * <code>
     * $query->filterByPhone('fooValue');   // WHERE phone = 'fooValue'
     * $query->filterByPhone('%fooValue%'); // WHERE phone LIKE '%fooValue%'
     * </code>
     *
     * @param     string $phone The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildInterchapterSignupsQuery The current query, for fluid interface
     */
    public function filterByPhone($phone = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($phone)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $phone)) {
                $phone = str_replace('*', '%', $phone);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(InterchapterSignupsTableMap::COL_PHONE, $phone, $comparison);
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
     * @return $this|ChildInterchapterSignupsQuery The current query, for fluid interface
     */
    public function filterByDate($date = null, $comparison = null)
    {
        if (is_array($date)) {
            $useMinMax = false;
            if (isset($date['min'])) {
                $this->addUsingAlias(InterchapterSignupsTableMap::COL_DATE, $date['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($date['max'])) {
                $this->addUsingAlias(InterchapterSignupsTableMap::COL_DATE, $date['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InterchapterSignupsTableMap::COL_DATE, $date, $comparison);
    }

    /**
     * Filter the query on the shirt_size column
     *
     * Example usage:
     * <code>
     * $query->filterByShirtSize('fooValue');   // WHERE shirt_size = 'fooValue'
     * $query->filterByShirtSize('%fooValue%'); // WHERE shirt_size LIKE '%fooValue%'
     * </code>
     *
     * @param     string $shirtSize The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildInterchapterSignupsQuery The current query, for fluid interface
     */
    public function filterByShirtSize($shirtSize = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($shirtSize)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $shirtSize)) {
                $shirtSize = str_replace('*', '%', $shirtSize);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(InterchapterSignupsTableMap::COL_SHIRT_SIZE, $shirtSize, $comparison);
    }

    /**
     * Filter the query on the vegetarian column
     *
     * Example usage:
     * <code>
     * $query->filterByVegetarian(true); // WHERE vegetarian = true
     * $query->filterByVegetarian('yes'); // WHERE vegetarian = true
     * </code>
     *
     * @param     boolean|string $vegetarian The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildInterchapterSignupsQuery The current query, for fluid interface
     */
    public function filterByVegetarian($vegetarian = null, $comparison = null)
    {
        if (is_string($vegetarian)) {
            $vegetarian = in_array(strtolower($vegetarian), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(InterchapterSignupsTableMap::COL_VEGETARIAN, $vegetarian, $comparison);
    }

    /**
     * Filter the query on the housing_needed column
     *
     * Example usage:
     * <code>
     * $query->filterByHousingNeeded(1234); // WHERE housing_needed = 1234
     * $query->filterByHousingNeeded(array(12, 34)); // WHERE housing_needed IN (12, 34)
     * $query->filterByHousingNeeded(array('min' => 12)); // WHERE housing_needed > 12
     * </code>
     *
     * @param     mixed $housingNeeded The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildInterchapterSignupsQuery The current query, for fluid interface
     */
    public function filterByHousingNeeded($housingNeeded = null, $comparison = null)
    {
        if (is_array($housingNeeded)) {
            $useMinMax = false;
            if (isset($housingNeeded['min'])) {
                $this->addUsingAlias(InterchapterSignupsTableMap::COL_HOUSING_NEEDED, $housingNeeded['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($housingNeeded['max'])) {
                $this->addUsingAlias(InterchapterSignupsTableMap::COL_HOUSING_NEEDED, $housingNeeded['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InterchapterSignupsTableMap::COL_HOUSING_NEEDED, $housingNeeded, $comparison);
    }

    /**
     * Filter the query on the deleted column
     *
     * Example usage:
     * <code>
     * $query->filterByDeleted(1234); // WHERE deleted = 1234
     * $query->filterByDeleted(array(12, 34)); // WHERE deleted IN (12, 34)
     * $query->filterByDeleted(array('min' => 12)); // WHERE deleted > 12
     * </code>
     *
     * @param     mixed $deleted The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildInterchapterSignupsQuery The current query, for fluid interface
     */
    public function filterByDeleted($deleted = null, $comparison = null)
    {
        if (is_array($deleted)) {
            $useMinMax = false;
            if (isset($deleted['min'])) {
                $this->addUsingAlias(InterchapterSignupsTableMap::COL_DELETED, $deleted['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($deleted['max'])) {
                $this->addUsingAlias(InterchapterSignupsTableMap::COL_DELETED, $deleted['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InterchapterSignupsTableMap::COL_DELETED, $deleted, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildInterchapterSignups $interchapterSignups Object to remove from the list of results
     *
     * @return $this|ChildInterchapterSignupsQuery The current query, for fluid interface
     */
    public function prune($interchapterSignups = null)
    {
        if ($interchapterSignups) {
            $this->addUsingAlias(InterchapterSignupsTableMap::COL_ID, $interchapterSignups->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the interchapter_signups table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(InterchapterSignupsTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            InterchapterSignupsTableMap::clearInstancePool();
            InterchapterSignupsTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(InterchapterSignupsTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(InterchapterSignupsTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            InterchapterSignupsTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            InterchapterSignupsTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // InterchapterSignupsQuery
