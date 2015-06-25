<?php

namespace Base;

use \SignupsBkup as ChildSignupsBkup;
use \SignupsBkupQuery as ChildSignupsBkupQuery;
use \Exception;
use Map\SignupsBkupTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\LogicException;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'signups_bkup' table.
 *
 *
 *
 * @method     ChildSignupsBkupQuery orderByUser($order = Criteria::ASC) Order by the user column
 * @method     ChildSignupsBkupQuery orderByShift($order = Criteria::ASC) Order by the shift column
 * @method     ChildSignupsBkupQuery orderByEvent($order = Criteria::ASC) Order by the event column
 * @method     ChildSignupsBkupQuery orderByDriver($order = Criteria::ASC) Order by the driver column
 * @method     ChildSignupsBkupQuery orderByChair($order = Criteria::ASC) Order by the chair column
 * @method     ChildSignupsBkupQuery orderByCredit($order = Criteria::ASC) Order by the credit column
 * @method     ChildSignupsBkupQuery orderByTimestamp($order = Criteria::ASC) Order by the timestamp column
 *
 * @method     ChildSignupsBkupQuery groupByUser() Group by the user column
 * @method     ChildSignupsBkupQuery groupByShift() Group by the shift column
 * @method     ChildSignupsBkupQuery groupByEvent() Group by the event column
 * @method     ChildSignupsBkupQuery groupByDriver() Group by the driver column
 * @method     ChildSignupsBkupQuery groupByChair() Group by the chair column
 * @method     ChildSignupsBkupQuery groupByCredit() Group by the credit column
 * @method     ChildSignupsBkupQuery groupByTimestamp() Group by the timestamp column
 *
 * @method     ChildSignupsBkupQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildSignupsBkupQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildSignupsBkupQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildSignupsBkup findOne(ConnectionInterface $con = null) Return the first ChildSignupsBkup matching the query
 * @method     ChildSignupsBkup findOneOrCreate(ConnectionInterface $con = null) Return the first ChildSignupsBkup matching the query, or a new ChildSignupsBkup object populated from the query conditions when no match is found
 *
 * @method     ChildSignupsBkup findOneByUser(int $user) Return the first ChildSignupsBkup filtered by the user column
 * @method     ChildSignupsBkup findOneByShift(int $shift) Return the first ChildSignupsBkup filtered by the shift column
 * @method     ChildSignupsBkup findOneByEvent(int $event) Return the first ChildSignupsBkup filtered by the event column
 * @method     ChildSignupsBkup findOneByDriver(int $driver) Return the first ChildSignupsBkup filtered by the driver column
 * @method     ChildSignupsBkup findOneByChair(int $chair) Return the first ChildSignupsBkup filtered by the chair column
 * @method     ChildSignupsBkup findOneByCredit(double $credit) Return the first ChildSignupsBkup filtered by the credit column
 * @method     ChildSignupsBkup findOneByTimestamp(int $timestamp) Return the first ChildSignupsBkup filtered by the timestamp column *

 * @method     ChildSignupsBkup requirePk($key, ConnectionInterface $con = null) Return the ChildSignupsBkup by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSignupsBkup requireOne(ConnectionInterface $con = null) Return the first ChildSignupsBkup matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSignupsBkup requireOneByUser(int $user) Return the first ChildSignupsBkup filtered by the user column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSignupsBkup requireOneByShift(int $shift) Return the first ChildSignupsBkup filtered by the shift column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSignupsBkup requireOneByEvent(int $event) Return the first ChildSignupsBkup filtered by the event column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSignupsBkup requireOneByDriver(int $driver) Return the first ChildSignupsBkup filtered by the driver column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSignupsBkup requireOneByChair(int $chair) Return the first ChildSignupsBkup filtered by the chair column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSignupsBkup requireOneByCredit(double $credit) Return the first ChildSignupsBkup filtered by the credit column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSignupsBkup requireOneByTimestamp(int $timestamp) Return the first ChildSignupsBkup filtered by the timestamp column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSignupsBkup[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildSignupsBkup objects based on current ModelCriteria
 * @method     ChildSignupsBkup[]|ObjectCollection findByUser(int $user) Return ChildSignupsBkup objects filtered by the user column
 * @method     ChildSignupsBkup[]|ObjectCollection findByShift(int $shift) Return ChildSignupsBkup objects filtered by the shift column
 * @method     ChildSignupsBkup[]|ObjectCollection findByEvent(int $event) Return ChildSignupsBkup objects filtered by the event column
 * @method     ChildSignupsBkup[]|ObjectCollection findByDriver(int $driver) Return ChildSignupsBkup objects filtered by the driver column
 * @method     ChildSignupsBkup[]|ObjectCollection findByChair(int $chair) Return ChildSignupsBkup objects filtered by the chair column
 * @method     ChildSignupsBkup[]|ObjectCollection findByCredit(double $credit) Return ChildSignupsBkup objects filtered by the credit column
 * @method     ChildSignupsBkup[]|ObjectCollection findByTimestamp(int $timestamp) Return ChildSignupsBkup objects filtered by the timestamp column
 * @method     ChildSignupsBkup[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class SignupsBkupQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\SignupsBkupQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'aphio', $modelName = '\\SignupsBkup', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildSignupsBkupQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildSignupsBkupQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildSignupsBkupQuery) {
            return $criteria;
        }
        $query = new ChildSignupsBkupQuery();
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
     * @return ChildSignupsBkup|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        throw new LogicException('The SignupsBkup object has no primary key');
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
        throw new LogicException('The SignupsBkup object has no primary key');
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildSignupsBkupQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        throw new LogicException('The SignupsBkup object has no primary key');
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildSignupsBkupQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        throw new LogicException('The SignupsBkup object has no primary key');
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
     * @return $this|ChildSignupsBkupQuery The current query, for fluid interface
     */
    public function filterByUser($user = null, $comparison = null)
    {
        if (is_array($user)) {
            $useMinMax = false;
            if (isset($user['min'])) {
                $this->addUsingAlias(SignupsBkupTableMap::COL_USER, $user['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($user['max'])) {
                $this->addUsingAlias(SignupsBkupTableMap::COL_USER, $user['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SignupsBkupTableMap::COL_USER, $user, $comparison);
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
     * @return $this|ChildSignupsBkupQuery The current query, for fluid interface
     */
    public function filterByShift($shift = null, $comparison = null)
    {
        if (is_array($shift)) {
            $useMinMax = false;
            if (isset($shift['min'])) {
                $this->addUsingAlias(SignupsBkupTableMap::COL_SHIFT, $shift['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($shift['max'])) {
                $this->addUsingAlias(SignupsBkupTableMap::COL_SHIFT, $shift['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SignupsBkupTableMap::COL_SHIFT, $shift, $comparison);
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
     * @return $this|ChildSignupsBkupQuery The current query, for fluid interface
     */
    public function filterByEvent($event = null, $comparison = null)
    {
        if (is_array($event)) {
            $useMinMax = false;
            if (isset($event['min'])) {
                $this->addUsingAlias(SignupsBkupTableMap::COL_EVENT, $event['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($event['max'])) {
                $this->addUsingAlias(SignupsBkupTableMap::COL_EVENT, $event['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SignupsBkupTableMap::COL_EVENT, $event, $comparison);
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
     * @return $this|ChildSignupsBkupQuery The current query, for fluid interface
     */
    public function filterByDriver($driver = null, $comparison = null)
    {
        if (is_array($driver)) {
            $useMinMax = false;
            if (isset($driver['min'])) {
                $this->addUsingAlias(SignupsBkupTableMap::COL_DRIVER, $driver['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($driver['max'])) {
                $this->addUsingAlias(SignupsBkupTableMap::COL_DRIVER, $driver['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SignupsBkupTableMap::COL_DRIVER, $driver, $comparison);
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
     * @return $this|ChildSignupsBkupQuery The current query, for fluid interface
     */
    public function filterByChair($chair = null, $comparison = null)
    {
        if (is_array($chair)) {
            $useMinMax = false;
            if (isset($chair['min'])) {
                $this->addUsingAlias(SignupsBkupTableMap::COL_CHAIR, $chair['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($chair['max'])) {
                $this->addUsingAlias(SignupsBkupTableMap::COL_CHAIR, $chair['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SignupsBkupTableMap::COL_CHAIR, $chair, $comparison);
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
     * @return $this|ChildSignupsBkupQuery The current query, for fluid interface
     */
    public function filterByCredit($credit = null, $comparison = null)
    {
        if (is_array($credit)) {
            $useMinMax = false;
            if (isset($credit['min'])) {
                $this->addUsingAlias(SignupsBkupTableMap::COL_CREDIT, $credit['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($credit['max'])) {
                $this->addUsingAlias(SignupsBkupTableMap::COL_CREDIT, $credit['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SignupsBkupTableMap::COL_CREDIT, $credit, $comparison);
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
     * @return $this|ChildSignupsBkupQuery The current query, for fluid interface
     */
    public function filterByTimestamp($timestamp = null, $comparison = null)
    {
        if (is_array($timestamp)) {
            $useMinMax = false;
            if (isset($timestamp['min'])) {
                $this->addUsingAlias(SignupsBkupTableMap::COL_TIMESTAMP, $timestamp['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($timestamp['max'])) {
                $this->addUsingAlias(SignupsBkupTableMap::COL_TIMESTAMP, $timestamp['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SignupsBkupTableMap::COL_TIMESTAMP, $timestamp, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildSignupsBkup $signupsBkup Object to remove from the list of results
     *
     * @return $this|ChildSignupsBkupQuery The current query, for fluid interface
     */
    public function prune($signupsBkup = null)
    {
        if ($signupsBkup) {
            throw new LogicException('SignupsBkup object has no primary key');

        }

        return $this;
    }

    /**
     * Deletes all rows from the signups_bkup table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SignupsBkupTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            SignupsBkupTableMap::clearInstancePool();
            SignupsBkupTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(SignupsBkupTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(SignupsBkupTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            SignupsBkupTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            SignupsBkupTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // SignupsBkupQuery
