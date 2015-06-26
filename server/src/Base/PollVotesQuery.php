<?php

namespace Base;

use \PollVotes as ChildPollVotes;
use \PollVotesQuery as ChildPollVotesQuery;
use \Exception;
use Map\PollVotesTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\LogicException;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'poll_votes' table.
 *
 *
 *
 * @method     ChildPollVotesQuery orderByUserid($order = Criteria::ASC) Order by the userid column
 * @method     ChildPollVotesQuery orderByPollId($order = Criteria::ASC) Order by the poll_id column
 * @method     ChildPollVotesQuery orderByOptionId($order = Criteria::ASC) Order by the option_id column
 *
 * @method     ChildPollVotesQuery groupByUserid() Group by the userid column
 * @method     ChildPollVotesQuery groupByPollId() Group by the poll_id column
 * @method     ChildPollVotesQuery groupByOptionId() Group by the option_id column
 *
 * @method     ChildPollVotesQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildPollVotesQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildPollVotesQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildPollVotes findOne(ConnectionInterface $con = null) Return the first ChildPollVotes matching the query
 * @method     ChildPollVotes findOneOrCreate(ConnectionInterface $con = null) Return the first ChildPollVotes matching the query, or a new ChildPollVotes object populated from the query conditions when no match is found
 *
 * @method     ChildPollVotes findOneByUserid(int $userid) Return the first ChildPollVotes filtered by the userid column
 * @method     ChildPollVotes findOneByPollId(int $poll_id) Return the first ChildPollVotes filtered by the poll_id column
 * @method     ChildPollVotes findOneByOptionId(int $option_id) Return the first ChildPollVotes filtered by the option_id column *

 * @method     ChildPollVotes requirePk($key, ConnectionInterface $con = null) Return the ChildPollVotes by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPollVotes requireOne(ConnectionInterface $con = null) Return the first ChildPollVotes matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildPollVotes requireOneByUserid(int $userid) Return the first ChildPollVotes filtered by the userid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPollVotes requireOneByPollId(int $poll_id) Return the first ChildPollVotes filtered by the poll_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPollVotes requireOneByOptionId(int $option_id) Return the first ChildPollVotes filtered by the option_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildPollVotes[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildPollVotes objects based on current ModelCriteria
 * @method     ChildPollVotes[]|ObjectCollection findByUserid(int $userid) Return ChildPollVotes objects filtered by the userid column
 * @method     ChildPollVotes[]|ObjectCollection findByPollId(int $poll_id) Return ChildPollVotes objects filtered by the poll_id column
 * @method     ChildPollVotes[]|ObjectCollection findByOptionId(int $option_id) Return ChildPollVotes objects filtered by the option_id column
 * @method     ChildPollVotes[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class PollVotesQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\PollVotesQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'aphio', $modelName = '\\PollVotes', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildPollVotesQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildPollVotesQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildPollVotesQuery) {
            return $criteria;
        }
        $query = new ChildPollVotesQuery();
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
     * @return ChildPollVotes|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        throw new LogicException('The PollVotes object has no primary key');
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
        throw new LogicException('The PollVotes object has no primary key');
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildPollVotesQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        throw new LogicException('The PollVotes object has no primary key');
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildPollVotesQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        throw new LogicException('The PollVotes object has no primary key');
    }

    /**
     * Filter the query on the userid column
     *
     * Example usage:
     * <code>
     * $query->filterByUserid(1234); // WHERE userid = 1234
     * $query->filterByUserid(array(12, 34)); // WHERE userid IN (12, 34)
     * $query->filterByUserid(array('min' => 12)); // WHERE userid > 12
     * </code>
     *
     * @param     mixed $userid The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPollVotesQuery The current query, for fluid interface
     */
    public function filterByUserid($userid = null, $comparison = null)
    {
        if (is_array($userid)) {
            $useMinMax = false;
            if (isset($userid['min'])) {
                $this->addUsingAlias(PollVotesTableMap::COL_USERID, $userid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($userid['max'])) {
                $this->addUsingAlias(PollVotesTableMap::COL_USERID, $userid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PollVotesTableMap::COL_USERID, $userid, $comparison);
    }

    /**
     * Filter the query on the poll_id column
     *
     * Example usage:
     * <code>
     * $query->filterByPollId(1234); // WHERE poll_id = 1234
     * $query->filterByPollId(array(12, 34)); // WHERE poll_id IN (12, 34)
     * $query->filterByPollId(array('min' => 12)); // WHERE poll_id > 12
     * </code>
     *
     * @param     mixed $pollId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPollVotesQuery The current query, for fluid interface
     */
    public function filterByPollId($pollId = null, $comparison = null)
    {
        if (is_array($pollId)) {
            $useMinMax = false;
            if (isset($pollId['min'])) {
                $this->addUsingAlias(PollVotesTableMap::COL_POLL_ID, $pollId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($pollId['max'])) {
                $this->addUsingAlias(PollVotesTableMap::COL_POLL_ID, $pollId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PollVotesTableMap::COL_POLL_ID, $pollId, $comparison);
    }

    /**
     * Filter the query on the option_id column
     *
     * Example usage:
     * <code>
     * $query->filterByOptionId(1234); // WHERE option_id = 1234
     * $query->filterByOptionId(array(12, 34)); // WHERE option_id IN (12, 34)
     * $query->filterByOptionId(array('min' => 12)); // WHERE option_id > 12
     * </code>
     *
     * @param     mixed $optionId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPollVotesQuery The current query, for fluid interface
     */
    public function filterByOptionId($optionId = null, $comparison = null)
    {
        if (is_array($optionId)) {
            $useMinMax = false;
            if (isset($optionId['min'])) {
                $this->addUsingAlias(PollVotesTableMap::COL_OPTION_ID, $optionId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($optionId['max'])) {
                $this->addUsingAlias(PollVotesTableMap::COL_OPTION_ID, $optionId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PollVotesTableMap::COL_OPTION_ID, $optionId, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildPollVotes $pollVotes Object to remove from the list of results
     *
     * @return $this|ChildPollVotesQuery The current query, for fluid interface
     */
    public function prune($pollVotes = null)
    {
        if ($pollVotes) {
            throw new LogicException('PollVotes object has no primary key');

        }

        return $this;
    }

    /**
     * Deletes all rows from the poll_votes table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(PollVotesTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            PollVotesTableMap::clearInstancePool();
            PollVotesTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(PollVotesTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(PollVotesTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            PollVotesTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            PollVotesTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // PollVotesQuery
