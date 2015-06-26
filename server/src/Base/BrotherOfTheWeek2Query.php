<?php

namespace Base;

use \BrotherOfTheWeek2 as ChildBrotherOfTheWeek2;
use \BrotherOfTheWeek2Query as ChildBrotherOfTheWeek2Query;
use \Exception;
use Map\BrotherOfTheWeek2TableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\LogicException;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'brother_of_the_week_2' table.
 *
 *
 *
 * @method     ChildBrotherOfTheWeek2Query orderByUser($order = Criteria::ASC) Order by the user column
 * @method     ChildBrotherOfTheWeek2Query orderByReason($order = Criteria::ASC) Order by the reason column
 * @method     ChildBrotherOfTheWeek2Query orderByWeek($order = Criteria::ASC) Order by the week column
 * @method     ChildBrotherOfTheWeek2Query orderByYear($order = Criteria::ASC) Order by the year column
 * @method     ChildBrotherOfTheWeek2Query orderByTerm($order = Criteria::ASC) Order by the term column
 *
 * @method     ChildBrotherOfTheWeek2Query groupByUser() Group by the user column
 * @method     ChildBrotherOfTheWeek2Query groupByReason() Group by the reason column
 * @method     ChildBrotherOfTheWeek2Query groupByWeek() Group by the week column
 * @method     ChildBrotherOfTheWeek2Query groupByYear() Group by the year column
 * @method     ChildBrotherOfTheWeek2Query groupByTerm() Group by the term column
 *
 * @method     ChildBrotherOfTheWeek2Query leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildBrotherOfTheWeek2Query rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildBrotherOfTheWeek2Query innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildBrotherOfTheWeek2 findOne(ConnectionInterface $con = null) Return the first ChildBrotherOfTheWeek2 matching the query
 * @method     ChildBrotherOfTheWeek2 findOneOrCreate(ConnectionInterface $con = null) Return the first ChildBrotherOfTheWeek2 matching the query, or a new ChildBrotherOfTheWeek2 object populated from the query conditions when no match is found
 *
 * @method     ChildBrotherOfTheWeek2 findOneByUser(int $user) Return the first ChildBrotherOfTheWeek2 filtered by the user column
 * @method     ChildBrotherOfTheWeek2 findOneByReason(string $reason) Return the first ChildBrotherOfTheWeek2 filtered by the reason column
 * @method     ChildBrotherOfTheWeek2 findOneByWeek(int $week) Return the first ChildBrotherOfTheWeek2 filtered by the week column
 * @method     ChildBrotherOfTheWeek2 findOneByYear(int $year) Return the first ChildBrotherOfTheWeek2 filtered by the year column
 * @method     ChildBrotherOfTheWeek2 findOneByTerm(int $term) Return the first ChildBrotherOfTheWeek2 filtered by the term column *

 * @method     ChildBrotherOfTheWeek2 requirePk($key, ConnectionInterface $con = null) Return the ChildBrotherOfTheWeek2 by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBrotherOfTheWeek2 requireOne(ConnectionInterface $con = null) Return the first ChildBrotherOfTheWeek2 matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildBrotherOfTheWeek2 requireOneByUser(int $user) Return the first ChildBrotherOfTheWeek2 filtered by the user column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBrotherOfTheWeek2 requireOneByReason(string $reason) Return the first ChildBrotherOfTheWeek2 filtered by the reason column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBrotherOfTheWeek2 requireOneByWeek(int $week) Return the first ChildBrotherOfTheWeek2 filtered by the week column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBrotherOfTheWeek2 requireOneByYear(int $year) Return the first ChildBrotherOfTheWeek2 filtered by the year column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBrotherOfTheWeek2 requireOneByTerm(int $term) Return the first ChildBrotherOfTheWeek2 filtered by the term column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildBrotherOfTheWeek2[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildBrotherOfTheWeek2 objects based on current ModelCriteria
 * @method     ChildBrotherOfTheWeek2[]|ObjectCollection findByUser(int $user) Return ChildBrotherOfTheWeek2 objects filtered by the user column
 * @method     ChildBrotherOfTheWeek2[]|ObjectCollection findByReason(string $reason) Return ChildBrotherOfTheWeek2 objects filtered by the reason column
 * @method     ChildBrotherOfTheWeek2[]|ObjectCollection findByWeek(int $week) Return ChildBrotherOfTheWeek2 objects filtered by the week column
 * @method     ChildBrotherOfTheWeek2[]|ObjectCollection findByYear(int $year) Return ChildBrotherOfTheWeek2 objects filtered by the year column
 * @method     ChildBrotherOfTheWeek2[]|ObjectCollection findByTerm(int $term) Return ChildBrotherOfTheWeek2 objects filtered by the term column
 * @method     ChildBrotherOfTheWeek2[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class BrotherOfTheWeek2Query extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\BrotherOfTheWeek2Query object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'aphio', $modelName = '\\BrotherOfTheWeek2', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildBrotherOfTheWeek2Query object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildBrotherOfTheWeek2Query
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildBrotherOfTheWeek2Query) {
            return $criteria;
        }
        $query = new ChildBrotherOfTheWeek2Query();
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
     * @return ChildBrotherOfTheWeek2|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        throw new LogicException('The BrotherOfTheWeek2 object has no primary key');
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
        throw new LogicException('The BrotherOfTheWeek2 object has no primary key');
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildBrotherOfTheWeek2Query The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        throw new LogicException('The BrotherOfTheWeek2 object has no primary key');
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildBrotherOfTheWeek2Query The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        throw new LogicException('The BrotherOfTheWeek2 object has no primary key');
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
     * @return $this|ChildBrotherOfTheWeek2Query The current query, for fluid interface
     */
    public function filterByUser($user = null, $comparison = null)
    {
        if (is_array($user)) {
            $useMinMax = false;
            if (isset($user['min'])) {
                $this->addUsingAlias(BrotherOfTheWeek2TableMap::COL_USER, $user['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($user['max'])) {
                $this->addUsingAlias(BrotherOfTheWeek2TableMap::COL_USER, $user['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BrotherOfTheWeek2TableMap::COL_USER, $user, $comparison);
    }

    /**
     * Filter the query on the reason column
     *
     * Example usage:
     * <code>
     * $query->filterByReason('fooValue');   // WHERE reason = 'fooValue'
     * $query->filterByReason('%fooValue%'); // WHERE reason LIKE '%fooValue%'
     * </code>
     *
     * @param     string $reason The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildBrotherOfTheWeek2Query The current query, for fluid interface
     */
    public function filterByReason($reason = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($reason)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $reason)) {
                $reason = str_replace('*', '%', $reason);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(BrotherOfTheWeek2TableMap::COL_REASON, $reason, $comparison);
    }

    /**
     * Filter the query on the week column
     *
     * Example usage:
     * <code>
     * $query->filterByWeek(1234); // WHERE week = 1234
     * $query->filterByWeek(array(12, 34)); // WHERE week IN (12, 34)
     * $query->filterByWeek(array('min' => 12)); // WHERE week > 12
     * </code>
     *
     * @param     mixed $week The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildBrotherOfTheWeek2Query The current query, for fluid interface
     */
    public function filterByWeek($week = null, $comparison = null)
    {
        if (is_array($week)) {
            $useMinMax = false;
            if (isset($week['min'])) {
                $this->addUsingAlias(BrotherOfTheWeek2TableMap::COL_WEEK, $week['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($week['max'])) {
                $this->addUsingAlias(BrotherOfTheWeek2TableMap::COL_WEEK, $week['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BrotherOfTheWeek2TableMap::COL_WEEK, $week, $comparison);
    }

    /**
     * Filter the query on the year column
     *
     * Example usage:
     * <code>
     * $query->filterByYear(1234); // WHERE year = 1234
     * $query->filterByYear(array(12, 34)); // WHERE year IN (12, 34)
     * $query->filterByYear(array('min' => 12)); // WHERE year > 12
     * </code>
     *
     * @param     mixed $year The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildBrotherOfTheWeek2Query The current query, for fluid interface
     */
    public function filterByYear($year = null, $comparison = null)
    {
        if (is_array($year)) {
            $useMinMax = false;
            if (isset($year['min'])) {
                $this->addUsingAlias(BrotherOfTheWeek2TableMap::COL_YEAR, $year['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($year['max'])) {
                $this->addUsingAlias(BrotherOfTheWeek2TableMap::COL_YEAR, $year['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BrotherOfTheWeek2TableMap::COL_YEAR, $year, $comparison);
    }

    /**
     * Filter the query on the term column
     *
     * Example usage:
     * <code>
     * $query->filterByTerm(1234); // WHERE term = 1234
     * $query->filterByTerm(array(12, 34)); // WHERE term IN (12, 34)
     * $query->filterByTerm(array('min' => 12)); // WHERE term > 12
     * </code>
     *
     * @param     mixed $term The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildBrotherOfTheWeek2Query The current query, for fluid interface
     */
    public function filterByTerm($term = null, $comparison = null)
    {
        if (is_array($term)) {
            $useMinMax = false;
            if (isset($term['min'])) {
                $this->addUsingAlias(BrotherOfTheWeek2TableMap::COL_TERM, $term['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($term['max'])) {
                $this->addUsingAlias(BrotherOfTheWeek2TableMap::COL_TERM, $term['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BrotherOfTheWeek2TableMap::COL_TERM, $term, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildBrotherOfTheWeek2 $brotherOfTheWeek2 Object to remove from the list of results
     *
     * @return $this|ChildBrotherOfTheWeek2Query The current query, for fluid interface
     */
    public function prune($brotherOfTheWeek2 = null)
    {
        if ($brotherOfTheWeek2) {
            throw new LogicException('BrotherOfTheWeek2 object has no primary key');

        }

        return $this;
    }

    /**
     * Deletes all rows from the brother_of_the_week_2 table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(BrotherOfTheWeek2TableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            BrotherOfTheWeek2TableMap::clearInstancePool();
            BrotherOfTheWeek2TableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(BrotherOfTheWeek2TableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(BrotherOfTheWeek2TableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            BrotherOfTheWeek2TableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            BrotherOfTheWeek2TableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // BrotherOfTheWeek2Query
