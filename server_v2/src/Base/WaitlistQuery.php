<?php

namespace Base;

use \Waitlist as ChildWaitlist;
use \WaitlistQuery as ChildWaitlistQuery;
use \Exception;
use Map\WaitlistTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\LogicException;
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
 *
 * @method     ChildWaitlistQuery groupByUser() Group by the user column
 * @method     ChildWaitlistQuery groupByShift() Group by the shift column
 * @method     ChildWaitlistQuery groupByEvent() Group by the event column
 * @method     ChildWaitlistQuery groupByTimestamp() Group by the timestamp column
 *
 * @method     ChildWaitlistQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildWaitlistQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildWaitlistQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildWaitlist findOne(ConnectionInterface $con = null) Return the first ChildWaitlist matching the query
 * @method     ChildWaitlist findOneOrCreate(ConnectionInterface $con = null) Return the first ChildWaitlist matching the query, or a new ChildWaitlist object populated from the query conditions when no match is found
 *
 * @method     ChildWaitlist findOneByUser(int $user) Return the first ChildWaitlist filtered by the user column
 * @method     ChildWaitlist findOneByShift(int $shift) Return the first ChildWaitlist filtered by the shift column
 * @method     ChildWaitlist findOneByEvent(int $event) Return the first ChildWaitlist filtered by the event column
 * @method     ChildWaitlist findOneByTimestamp(string $timestamp) Return the first ChildWaitlist filtered by the timestamp column *

 * @method     ChildWaitlist requirePk($key, ConnectionInterface $con = null) Return the ChildWaitlist by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildWaitlist requireOne(ConnectionInterface $con = null) Return the first ChildWaitlist matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildWaitlist requireOneByUser(int $user) Return the first ChildWaitlist filtered by the user column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildWaitlist requireOneByShift(int $shift) Return the first ChildWaitlist filtered by the shift column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildWaitlist requireOneByEvent(int $event) Return the first ChildWaitlist filtered by the event column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildWaitlist requireOneByTimestamp(string $timestamp) Return the first ChildWaitlist filtered by the timestamp column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildWaitlist[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildWaitlist objects based on current ModelCriteria
 * @method     ChildWaitlist[]|ObjectCollection findByUser(int $user) Return ChildWaitlist objects filtered by the user column
 * @method     ChildWaitlist[]|ObjectCollection findByShift(int $shift) Return ChildWaitlist objects filtered by the shift column
 * @method     ChildWaitlist[]|ObjectCollection findByEvent(int $event) Return ChildWaitlist objects filtered by the event column
 * @method     ChildWaitlist[]|ObjectCollection findByTimestamp(string $timestamp) Return ChildWaitlist objects filtered by the timestamp column
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
        throw new LogicException('The Waitlist object has no primary key');
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(array(12, 56), array(832, 123), array(123, 456)), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     ConnectionInterface $con an optional connection object
     *
     * @return ObjectCollection|array|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, ConnectionInterface $con = null)
    {
        throw new LogicException('The Waitlist object has no primary key');
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
        throw new LogicException('The Waitlist object has no primary key');
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
        throw new LogicException('The Waitlist object has no primary key');
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
     * Exclude object from result
     *
     * @param   ChildWaitlist $waitlist Object to remove from the list of results
     *
     * @return $this|ChildWaitlistQuery The current query, for fluid interface
     */
    public function prune($waitlist = null)
    {
        if ($waitlist) {
            throw new LogicException('Waitlist object has no primary key');

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
