<?php

namespace Base;

use \ForumSubscriptions as ChildForumSubscriptions;
use \ForumSubscriptionsQuery as ChildForumSubscriptionsQuery;
use \Exception;
use Map\ForumSubscriptionsTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\LogicException;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'forum_subscriptions' table.
 *
 *
 *
 * @method     ChildForumSubscriptionsQuery orderByTopicId($order = Criteria::ASC) Order by the topic_id column
 * @method     ChildForumSubscriptionsQuery orderByMemberId($order = Criteria::ASC) Order by the member_id column
 *
 * @method     ChildForumSubscriptionsQuery groupByTopicId() Group by the topic_id column
 * @method     ChildForumSubscriptionsQuery groupByMemberId() Group by the member_id column
 *
 * @method     ChildForumSubscriptionsQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildForumSubscriptionsQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildForumSubscriptionsQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildForumSubscriptions findOne(ConnectionInterface $con = null) Return the first ChildForumSubscriptions matching the query
 * @method     ChildForumSubscriptions findOneOrCreate(ConnectionInterface $con = null) Return the first ChildForumSubscriptions matching the query, or a new ChildForumSubscriptions object populated from the query conditions when no match is found
 *
 * @method     ChildForumSubscriptions findOneByTopicId(int $topic_id) Return the first ChildForumSubscriptions filtered by the topic_id column
 * @method     ChildForumSubscriptions findOneByMemberId(int $member_id) Return the first ChildForumSubscriptions filtered by the member_id column *

 * @method     ChildForumSubscriptions requirePk($key, ConnectionInterface $con = null) Return the ChildForumSubscriptions by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildForumSubscriptions requireOne(ConnectionInterface $con = null) Return the first ChildForumSubscriptions matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildForumSubscriptions requireOneByTopicId(int $topic_id) Return the first ChildForumSubscriptions filtered by the topic_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildForumSubscriptions requireOneByMemberId(int $member_id) Return the first ChildForumSubscriptions filtered by the member_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildForumSubscriptions[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildForumSubscriptions objects based on current ModelCriteria
 * @method     ChildForumSubscriptions[]|ObjectCollection findByTopicId(int $topic_id) Return ChildForumSubscriptions objects filtered by the topic_id column
 * @method     ChildForumSubscriptions[]|ObjectCollection findByMemberId(int $member_id) Return ChildForumSubscriptions objects filtered by the member_id column
 * @method     ChildForumSubscriptions[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class ForumSubscriptionsQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\ForumSubscriptionsQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'aphio', $modelName = '\\ForumSubscriptions', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildForumSubscriptionsQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildForumSubscriptionsQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildForumSubscriptionsQuery) {
            return $criteria;
        }
        $query = new ChildForumSubscriptionsQuery();
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
     * @return ChildForumSubscriptions|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        throw new LogicException('The ForumSubscriptions object has no primary key');
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
        throw new LogicException('The ForumSubscriptions object has no primary key');
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildForumSubscriptionsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        throw new LogicException('The ForumSubscriptions object has no primary key');
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildForumSubscriptionsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        throw new LogicException('The ForumSubscriptions object has no primary key');
    }

    /**
     * Filter the query on the topic_id column
     *
     * Example usage:
     * <code>
     * $query->filterByTopicId(1234); // WHERE topic_id = 1234
     * $query->filterByTopicId(array(12, 34)); // WHERE topic_id IN (12, 34)
     * $query->filterByTopicId(array('min' => 12)); // WHERE topic_id > 12
     * </code>
     *
     * @param     mixed $topicId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildForumSubscriptionsQuery The current query, for fluid interface
     */
    public function filterByTopicId($topicId = null, $comparison = null)
    {
        if (is_array($topicId)) {
            $useMinMax = false;
            if (isset($topicId['min'])) {
                $this->addUsingAlias(ForumSubscriptionsTableMap::COL_TOPIC_ID, $topicId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($topicId['max'])) {
                $this->addUsingAlias(ForumSubscriptionsTableMap::COL_TOPIC_ID, $topicId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ForumSubscriptionsTableMap::COL_TOPIC_ID, $topicId, $comparison);
    }

    /**
     * Filter the query on the member_id column
     *
     * Example usage:
     * <code>
     * $query->filterByMemberId(1234); // WHERE member_id = 1234
     * $query->filterByMemberId(array(12, 34)); // WHERE member_id IN (12, 34)
     * $query->filterByMemberId(array('min' => 12)); // WHERE member_id > 12
     * </code>
     *
     * @param     mixed $memberId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildForumSubscriptionsQuery The current query, for fluid interface
     */
    public function filterByMemberId($memberId = null, $comparison = null)
    {
        if (is_array($memberId)) {
            $useMinMax = false;
            if (isset($memberId['min'])) {
                $this->addUsingAlias(ForumSubscriptionsTableMap::COL_MEMBER_ID, $memberId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($memberId['max'])) {
                $this->addUsingAlias(ForumSubscriptionsTableMap::COL_MEMBER_ID, $memberId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ForumSubscriptionsTableMap::COL_MEMBER_ID, $memberId, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildForumSubscriptions $forumSubscriptions Object to remove from the list of results
     *
     * @return $this|ChildForumSubscriptionsQuery The current query, for fluid interface
     */
    public function prune($forumSubscriptions = null)
    {
        if ($forumSubscriptions) {
            throw new LogicException('ForumSubscriptions object has no primary key');

        }

        return $this;
    }

    /**
     * Deletes all rows from the forum_subscriptions table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ForumSubscriptionsTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            ForumSubscriptionsTableMap::clearInstancePool();
            ForumSubscriptionsTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(ForumSubscriptionsTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(ForumSubscriptionsTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            ForumSubscriptionsTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            ForumSubscriptionsTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // ForumSubscriptionsQuery
