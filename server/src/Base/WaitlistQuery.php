<?php

namespace Base;

use \Waitlist as ChildWaitlist;
use \WaitlistQuery as ChildWaitlistQuery;
use \Exception;
use \PDO;
use Map\WaitlistTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'waitlist' table.
 *
 *
 *
 * @method     ChildWaitlistQuery orderByUser($order = Criteria::ASC) Order by the user column
 * @method     ChildWaitlistQuery orderByShift($order = Criteria::ASC) Order by the shift column
 * @method     ChildWaitlistQuery orderByEvent($order = Criteria::ASC) Order by the event column
 * @method     ChildWaitlistQuery orderByTimestamp($order = Criteria::ASC) Order by the timestamp column
 * @method     ChildWaitlistQuery orderById($order = Criteria::ASC) Order by the id column
 *
 * @method     ChildWaitlistQuery groupByUser() Group by the user column
 * @method     ChildWaitlistQuery groupByShift() Group by the shift column
 * @method     ChildWaitlistQuery groupByEvent() Group by the event column
 * @method     ChildWaitlistQuery groupByTimestamp() Group by the timestamp column
 * @method     ChildWaitlistQuery groupById() Group by the id column
 *
 * @method     ChildWaitlistQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildWaitlistQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildWaitlistQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildWaitlistQuery leftJoinMembers($relationAlias = null) Adds a LEFT JOIN clause to the query using the Members relation
 * @method     ChildWaitlistQuery rightJoinMembers($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Members relation
 * @method     ChildWaitlistQuery innerJoinMembers($relationAlias = null) Adds a INNER JOIN clause to the query using the Members relation
 *
 * @method     ChildWaitlistQuery leftJoinEvents($relationAlias = null) Adds a LEFT JOIN clause to the query using the Events relation
 * @method     ChildWaitlistQuery rightJoinEvents($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Events relation
 * @method     ChildWaitlistQuery innerJoinEvents($relationAlias = null) Adds a INNER JOIN clause to the query using the Events relation
 *
 * @method     ChildWaitlistQuery leftJoinShifts($relationAlias = null) Adds a LEFT JOIN clause to the query using the Shifts relation
 * @method     ChildWaitlistQuery rightJoinShifts($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Shifts relation
 * @method     ChildWaitlistQuery innerJoinShifts($relationAlias = null) Adds a INNER JOIN clause to the query using the Shifts relation
 *
 * @method     \MembersQuery|\EventsQuery|\ShiftsQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildWaitlist findOne(ConnectionInterface $con = null) Return the first ChildWaitlist matching the query
 * @method     ChildWaitlist findOneOrCreate(ConnectionInterface $con = null) Return the first ChildWaitlist matching the query, or a new ChildWaitlist object populated from the query conditions when no match is found
 *
 * @method     ChildWaitlist findOneByUser(int $user) Return the first ChildWaitlist filtered by the user column
 * @method     ChildWaitlist findOneByShift(int $shift) Return the first ChildWaitlist filtered by the shift column
 * @method     ChildWaitlist findOneByEvent(int $event) Return the first ChildWaitlist filtered by the event column
 * @method     ChildWaitlist findOneByTimestamp(string $timestamp) Return the first ChildWaitlist filtered by the timestamp column
 * @method     ChildWaitlist findOneById(int $id) Return the first ChildWaitlist filtered by the id column *

 * @method     ChildWaitlist requirePk($key, ConnectionInterface $con = null) Return the ChildWaitlist by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildWaitlist requireOne(ConnectionInterface $con = null) Return the first ChildWaitlist matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildWaitlist requireOneByUser(int $user) Return the first ChildWaitlist filtered by the user column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildWaitlist requireOneByShift(int $shift) Return the first ChildWaitlist filtered by the shift column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildWaitlist requireOneByEvent(int $event) Return the first ChildWaitlist filtered by the event column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildWaitlist requireOneByTimestamp(string $timestamp) Return the first ChildWaitlist filtered by the timestamp column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildWaitlist requireOneById(int $id) Return the first ChildWaitlist filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildWaitlist[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildWaitlist objects based on current ModelCriteria
 * @method     ChildWaitlist[]|ObjectCollection findByUser(int $user) Return ChildWaitlist objects filtered by the user column
 * @method     ChildWaitlist[]|ObjectCollection findByShift(int $shift) Return ChildWaitlist objects filtered by the shift column
 * @method     ChildWaitlist[]|ObjectCollection findByEvent(int $event) Return ChildWaitlist objects filtered by the event column
 * @method     ChildWaitlist[]|ObjectCollection findByTimestamp(string $timestamp) Return ChildWaitlist objects filtered by the timestamp column
 * @method     ChildWaitlist[]|ObjectCollection findById(int $id) Return ChildWaitlist objects filtered by the id column
 * @method     ChildWaitlist[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class WaitlistQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\WaitlistQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'aphio', $modelName = '\\Waitlist', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildWaitlistQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildWaitlistQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildWaitlistQuery) {
            return $criteria;
        }
        $query = new ChildWaitlistQuery();
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
     * @return ChildWaitlist|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = WaitlistTableMap::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(WaitlistTableMap::DATABASE_NAME);
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
     * @return ChildWaitlist A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT `user`, `shift`, `event`, `timestamp`, `id` FROM `waitlist` WHERE `id` = :p0';
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
            /** @var ChildWaitlist $obj */
            $obj = new ChildWaitlist();
            $obj->hydrate($row);
            WaitlistTableMap::addInstanceToPool($obj, (string) $key);
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
     * @return ChildWaitlist|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildWaitlistQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(WaitlistTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildWaitlistQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(WaitlistTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildWaitlistQuery The current query, for fluid interface
     */
    public function filterByUser($user = null, $comparison = null)
    {
        if (is_array($user)) {
            $useMinMax = false;
            if (isset($user['min'])) {
                $this->addUsingAlias(WaitlistTableMap::COL_USER, $user['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($user['max'])) {
                $this->addUsingAlias(WaitlistTableMap::COL_USER, $user['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(WaitlistTableMap::COL_USER, $user, $comparison);
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
     * @see       filterByShifts()
     *
     * @param     mixed $shift The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildWaitlistQuery The current query, for fluid interface
     */
    public function filterByShift($shift = null, $comparison = null)
    {
        if (is_array($shift)) {
            $useMinMax = false;
            if (isset($shift['min'])) {
                $this->addUsingAlias(WaitlistTableMap::COL_SHIFT, $shift['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($shift['max'])) {
                $this->addUsingAlias(WaitlistTableMap::COL_SHIFT, $shift['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(WaitlistTableMap::COL_SHIFT, $shift, $comparison);
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
     * @see       filterByEvents()
     *
     * @param     mixed $event The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildWaitlistQuery The current query, for fluid interface
     */
    public function filterByEvent($event = null, $comparison = null)
    {
        if (is_array($event)) {
            $useMinMax = false;
            if (isset($event['min'])) {
                $this->addUsingAlias(WaitlistTableMap::COL_EVENT, $event['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($event['max'])) {
                $this->addUsingAlias(WaitlistTableMap::COL_EVENT, $event['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(WaitlistTableMap::COL_EVENT, $event, $comparison);
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
     * @return $this|ChildWaitlistQuery The current query, for fluid interface
     */
    public function filterByTimestamp($timestamp = null, $comparison = null)
    {
        if (is_array($timestamp)) {
            $useMinMax = false;
            if (isset($timestamp['min'])) {
                $this->addUsingAlias(WaitlistTableMap::COL_TIMESTAMP, $timestamp['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($timestamp['max'])) {
                $this->addUsingAlias(WaitlistTableMap::COL_TIMESTAMP, $timestamp['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(WaitlistTableMap::COL_TIMESTAMP, $timestamp, $comparison);
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
     * @return $this|ChildWaitlistQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(WaitlistTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(WaitlistTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(WaitlistTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query by a related \Members object
     *
     * @param \Members|ObjectCollection $members The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildWaitlistQuery The current query, for fluid interface
     */
    public function filterByMembers($members, $comparison = null)
    {
        if ($members instanceof \Members) {
            return $this
                ->addUsingAlias(WaitlistTableMap::COL_USER, $members->getId(), $comparison);
        } elseif ($members instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(WaitlistTableMap::COL_USER, $members->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return $this|ChildWaitlistQuery The current query, for fluid interface
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
     * Filter the query by a related \Events object
     *
     * @param \Events|ObjectCollection $events The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildWaitlistQuery The current query, for fluid interface
     */
    public function filterByEvents($events, $comparison = null)
    {
        if ($events instanceof \Events) {
            return $this
                ->addUsingAlias(WaitlistTableMap::COL_EVENT, $events->getId(), $comparison);
        } elseif ($events instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(WaitlistTableMap::COL_EVENT, $events->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByEvents() only accepts arguments of type \Events or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Events relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildWaitlistQuery The current query, for fluid interface
     */
    public function joinEvents($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Events');

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
            $this->addJoinObject($join, 'Events');
        }

        return $this;
    }

    /**
     * Use the Events relation Events object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \EventsQuery A secondary query class using the current class as primary query
     */
    public function useEventsQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinEvents($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Events', '\EventsQuery');
    }

    /**
     * Filter the query by a related \Shifts object
     *
     * @param \Shifts|ObjectCollection $shifts The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildWaitlistQuery The current query, for fluid interface
     */
    public function filterByShifts($shifts, $comparison = null)
    {
        if ($shifts instanceof \Shifts) {
            return $this
                ->addUsingAlias(WaitlistTableMap::COL_SHIFT, $shifts->getId(), $comparison);
        } elseif ($shifts instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(WaitlistTableMap::COL_SHIFT, $shifts->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByShifts() only accepts arguments of type \Shifts or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Shifts relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildWaitlistQuery The current query, for fluid interface
     */
    public function joinShifts($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Shifts');

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
            $this->addJoinObject($join, 'Shifts');
        }

        return $this;
    }

    /**
     * Use the Shifts relation Shifts object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \ShiftsQuery A secondary query class using the current class as primary query
     */
    public function useShiftsQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinShifts($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Shifts', '\ShiftsQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildWaitlist $waitlist Object to remove from the list of results
     *
     * @return $this|ChildWaitlistQuery The current query, for fluid interface
     */
    public function prune($waitlist = null)
    {
        if ($waitlist) {
            $this->addUsingAlias(WaitlistTableMap::COL_ID, $waitlist->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the waitlist table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(WaitlistTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            WaitlistTableMap::clearInstancePool();
            WaitlistTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(WaitlistTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(WaitlistTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            WaitlistTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            WaitlistTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // WaitlistQuery
