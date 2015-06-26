<?php

namespace Base;

use \Signups as ChildSignups;
use \SignupsQuery as ChildSignupsQuery;
use \Exception;
use \PDO;
use Map\SignupsTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'signups' table.
 *
 *
 *
 * @method     ChildSignupsQuery orderByUser($order = Criteria::ASC) Order by the user column
 * @method     ChildSignupsQuery orderByShift($order = Criteria::ASC) Order by the shift column
 * @method     ChildSignupsQuery orderByEvent($order = Criteria::ASC) Order by the event column
 * @method     ChildSignupsQuery orderByDriver($order = Criteria::ASC) Order by the driver column
 * @method     ChildSignupsQuery orderByChair($order = Criteria::ASC) Order by the chair column
 * @method     ChildSignupsQuery orderByCredit($order = Criteria::ASC) Order by the credit column
 * @method     ChildSignupsQuery orderByTimestamp($order = Criteria::ASC) Order by the timestamp column
 * @method     ChildSignupsQuery orderById($order = Criteria::ASC) Order by the id column
 *
 * @method     ChildSignupsQuery groupByUser() Group by the user column
 * @method     ChildSignupsQuery groupByShift() Group by the shift column
 * @method     ChildSignupsQuery groupByEvent() Group by the event column
 * @method     ChildSignupsQuery groupByDriver() Group by the driver column
 * @method     ChildSignupsQuery groupByChair() Group by the chair column
 * @method     ChildSignupsQuery groupByCredit() Group by the credit column
 * @method     ChildSignupsQuery groupByTimestamp() Group by the timestamp column
 * @method     ChildSignupsQuery groupById() Group by the id column
 *
 * @method     ChildSignupsQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildSignupsQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildSignupsQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildSignupsQuery leftJoinMembers($relationAlias = null) Adds a LEFT JOIN clause to the query using the Members relation
 * @method     ChildSignupsQuery rightJoinMembers($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Members relation
 * @method     ChildSignupsQuery innerJoinMembers($relationAlias = null) Adds a INNER JOIN clause to the query using the Members relation
 *
 * @method     \MembersQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildSignups findOne(ConnectionInterface $con = null) Return the first ChildSignups matching the query
 * @method     ChildSignups findOneOrCreate(ConnectionInterface $con = null) Return the first ChildSignups matching the query, or a new ChildSignups object populated from the query conditions when no match is found
 *
 * @method     ChildSignups findOneByUser(int $user) Return the first ChildSignups filtered by the user column
 * @method     ChildSignups findOneByShift(int $shift) Return the first ChildSignups filtered by the shift column
 * @method     ChildSignups findOneByEvent(int $event) Return the first ChildSignups filtered by the event column
 * @method     ChildSignups findOneByDriver(int $driver) Return the first ChildSignups filtered by the driver column
 * @method     ChildSignups findOneByChair(int $chair) Return the first ChildSignups filtered by the chair column
 * @method     ChildSignups findOneByCredit(double $credit) Return the first ChildSignups filtered by the credit column
 * @method     ChildSignups findOneByTimestamp(int $timestamp) Return the first ChildSignups filtered by the timestamp column
 * @method     ChildSignups findOneById(int $id) Return the first ChildSignups filtered by the id column *

 * @method     ChildSignups requirePk($key, ConnectionInterface $con = null) Return the ChildSignups by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSignups requireOne(ConnectionInterface $con = null) Return the first ChildSignups matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSignups requireOneByUser(int $user) Return the first ChildSignups filtered by the user column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSignups requireOneByShift(int $shift) Return the first ChildSignups filtered by the shift column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSignups requireOneByEvent(int $event) Return the first ChildSignups filtered by the event column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSignups requireOneByDriver(int $driver) Return the first ChildSignups filtered by the driver column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSignups requireOneByChair(int $chair) Return the first ChildSignups filtered by the chair column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSignups requireOneByCredit(double $credit) Return the first ChildSignups filtered by the credit column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSignups requireOneByTimestamp(int $timestamp) Return the first ChildSignups filtered by the timestamp column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSignups requireOneById(int $id) Return the first ChildSignups filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSignups[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildSignups objects based on current ModelCriteria
 * @method     ChildSignups[]|ObjectCollection findByUser(int $user) Return ChildSignups objects filtered by the user column
 * @method     ChildSignups[]|ObjectCollection findByShift(int $shift) Return ChildSignups objects filtered by the shift column
 * @method     ChildSignups[]|ObjectCollection findByEvent(int $event) Return ChildSignups objects filtered by the event column
 * @method     ChildSignups[]|ObjectCollection findByDriver(int $driver) Return ChildSignups objects filtered by the driver column
 * @method     ChildSignups[]|ObjectCollection findByChair(int $chair) Return ChildSignups objects filtered by the chair column
 * @method     ChildSignups[]|ObjectCollection findByCredit(double $credit) Return ChildSignups objects filtered by the credit column
 * @method     ChildSignups[]|ObjectCollection findByTimestamp(int $timestamp) Return ChildSignups objects filtered by the timestamp column
 * @method     ChildSignups[]|ObjectCollection findById(int $id) Return ChildSignups objects filtered by the id column
 * @method     ChildSignups[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class SignupsQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\SignupsQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'aphio', $modelName = '\\Signups', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildSignupsQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildSignupsQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildSignupsQuery) {
            return $criteria;
        }
        $query = new ChildSignupsQuery();
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
     * @return ChildSignups|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = SignupsTableMap::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(SignupsTableMap::DATABASE_NAME);
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
     * @return ChildSignups A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT `user`, `shift`, `event`, `driver`, `chair`, `credit`, `timestamp`, `id` FROM `signups` WHERE `id` = :p0';
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
            /** @var ChildSignups $obj */
            $obj = new ChildSignups();
            $obj->hydrate($row);
            SignupsTableMap::addInstanceToPool($obj, (string) $key);
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
     * @return ChildSignups|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildSignupsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(SignupsTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildSignupsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(SignupsTableMap::COL_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the user column
     *
     * Example usage:
     * <code>
     * $query->filterByUser(1234); // WHERE user = 1234
     * $query->filterByUser(array(12, 34)); // WHERE user IN (12, 34)
     * $query->filterByUser(array('min' => 12)); // WHERE user > 12
     * </code>
     *
     * @see       filterByMembers()
     *
     * @param     mixed $user The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSignupsQuery The current query, for fluid interface
     */
    public function filterByUser($user = null, $comparison = null)
    {
        if (is_array($user)) {
            $useMinMax = false;
            if (isset($user['min'])) {
                $this->addUsingAlias(SignupsTableMap::COL_USER, $user['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($user['max'])) {
                $this->addUsingAlias(SignupsTableMap::COL_USER, $user['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SignupsTableMap::COL_USER, $user, $comparison);
    }

    /**
     * Filter the query on the shift column
     *
     * Example usage:
     * <code>
     * $query->filterByShift(1234); // WHERE shift = 1234
     * $query->filterByShift(array(12, 34)); // WHERE shift IN (12, 34)
     * $query->filterByShift(array('min' => 12)); // WHERE shift > 12
     * </code>
     *
     * @param     mixed $shift The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSignupsQuery The current query, for fluid interface
     */
    public function filterByShift($shift = null, $comparison = null)
    {
        if (is_array($shift)) {
            $useMinMax = false;
            if (isset($shift['min'])) {
                $this->addUsingAlias(SignupsTableMap::COL_SHIFT, $shift['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($shift['max'])) {
                $this->addUsingAlias(SignupsTableMap::COL_SHIFT, $shift['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SignupsTableMap::COL_SHIFT, $shift, $comparison);
    }

    /**
     * Filter the query on the event column
     *
     * Example usage:
     * <code>
     * $query->filterByEvent(1234); // WHERE event = 1234
     * $query->filterByEvent(array(12, 34)); // WHERE event IN (12, 34)
     * $query->filterByEvent(array('min' => 12)); // WHERE event > 12
     * </code>
     *
     * @param     mixed $event The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSignupsQuery The current query, for fluid interface
     */
    public function filterByEvent($event = null, $comparison = null)
    {
        if (is_array($event)) {
            $useMinMax = false;
            if (isset($event['min'])) {
                $this->addUsingAlias(SignupsTableMap::COL_EVENT, $event['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($event['max'])) {
                $this->addUsingAlias(SignupsTableMap::COL_EVENT, $event['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SignupsTableMap::COL_EVENT, $event, $comparison);
    }

    /**
     * Filter the query on the driver column
     *
     * Example usage:
     * <code>
     * $query->filterByDriver(1234); // WHERE driver = 1234
     * $query->filterByDriver(array(12, 34)); // WHERE driver IN (12, 34)
     * $query->filterByDriver(array('min' => 12)); // WHERE driver > 12
     * </code>
     *
     * @param     mixed $driver The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSignupsQuery The current query, for fluid interface
     */
    public function filterByDriver($driver = null, $comparison = null)
    {
        if (is_array($driver)) {
            $useMinMax = false;
            if (isset($driver['min'])) {
                $this->addUsingAlias(SignupsTableMap::COL_DRIVER, $driver['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($driver['max'])) {
                $this->addUsingAlias(SignupsTableMap::COL_DRIVER, $driver['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SignupsTableMap::COL_DRIVER, $driver, $comparison);
    }

    /**
     * Filter the query on the chair column
     *
     * Example usage:
     * <code>
     * $query->filterByChair(1234); // WHERE chair = 1234
     * $query->filterByChair(array(12, 34)); // WHERE chair IN (12, 34)
     * $query->filterByChair(array('min' => 12)); // WHERE chair > 12
     * </code>
     *
     * @param     mixed $chair The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSignupsQuery The current query, for fluid interface
     */
    public function filterByChair($chair = null, $comparison = null)
    {
        if (is_array($chair)) {
            $useMinMax = false;
            if (isset($chair['min'])) {
                $this->addUsingAlias(SignupsTableMap::COL_CHAIR, $chair['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($chair['max'])) {
                $this->addUsingAlias(SignupsTableMap::COL_CHAIR, $chair['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SignupsTableMap::COL_CHAIR, $chair, $comparison);
    }

    /**
     * Filter the query on the credit column
     *
     * Example usage:
     * <code>
     * $query->filterByCredit(1234); // WHERE credit = 1234
     * $query->filterByCredit(array(12, 34)); // WHERE credit IN (12, 34)
     * $query->filterByCredit(array('min' => 12)); // WHERE credit > 12
     * </code>
     *
     * @param     mixed $credit The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSignupsQuery The current query, for fluid interface
     */
    public function filterByCredit($credit = null, $comparison = null)
    {
        if (is_array($credit)) {
            $useMinMax = false;
            if (isset($credit['min'])) {
                $this->addUsingAlias(SignupsTableMap::COL_CREDIT, $credit['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($credit['max'])) {
                $this->addUsingAlias(SignupsTableMap::COL_CREDIT, $credit['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SignupsTableMap::COL_CREDIT, $credit, $comparison);
    }

    /**
     * Filter the query on the timestamp column
     *
     * Example usage:
     * <code>
     * $query->filterByTimestamp(1234); // WHERE timestamp = 1234
     * $query->filterByTimestamp(array(12, 34)); // WHERE timestamp IN (12, 34)
     * $query->filterByTimestamp(array('min' => 12)); // WHERE timestamp > 12
     * </code>
     *
     * @param     mixed $timestamp The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSignupsQuery The current query, for fluid interface
     */
    public function filterByTimestamp($timestamp = null, $comparison = null)
    {
        if (is_array($timestamp)) {
            $useMinMax = false;
            if (isset($timestamp['min'])) {
                $this->addUsingAlias(SignupsTableMap::COL_TIMESTAMP, $timestamp['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($timestamp['max'])) {
                $this->addUsingAlias(SignupsTableMap::COL_TIMESTAMP, $timestamp['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SignupsTableMap::COL_TIMESTAMP, $timestamp, $comparison);
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
     * @return $this|ChildSignupsQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(SignupsTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(SignupsTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SignupsTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query by a related \Members object
     *
     * @param \Members|ObjectCollection $members The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildSignupsQuery The current query, for fluid interface
     */
    public function filterByMembers($members, $comparison = null)
    {
        if ($members instanceof \Members) {
            return $this
                ->addUsingAlias(SignupsTableMap::COL_USER, $members->getId(), $comparison);
        } elseif ($members instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(SignupsTableMap::COL_USER, $members->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByMembers() only accepts arguments of type \Members or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Members relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSignupsQuery The current query, for fluid interface
     */
    public function joinMembers($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Members');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Members');
        }

        return $this;
    }

    /**
     * Use the Members relation Members object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \MembersQuery A secondary query class using the current class as primary query
     */
    public function useMembersQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinMembers($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Members', '\MembersQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildSignups $signups Object to remove from the list of results
     *
     * @return $this|ChildSignupsQuery The current query, for fluid interface
     */
    public function prune($signups = null)
    {
        if ($signups) {
            $this->addUsingAlias(SignupsTableMap::COL_ID, $signups->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the signups table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SignupsTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            SignupsTableMap::clearInstancePool();
            SignupsTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(SignupsTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(SignupsTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            SignupsTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            SignupsTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // SignupsQuery
