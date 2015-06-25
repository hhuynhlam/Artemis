<?php

namespace Base;

use \ForumWinner as ChildForumWinner;
use \ForumWinnerQuery as ChildForumWinnerQuery;
use \Exception;
use Map\ForumWinnerTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\LogicException;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'forum_winner' table.
 *
 *
 *
 * @method     ChildForumWinnerQuery orderBySetDate($order = Criteria::ASC) Order by the set_date column
 * @method     ChildForumWinnerQuery orderByPostId($order = Criteria::ASC) Order by the post_id column
 *
 * @method     ChildForumWinnerQuery groupBySetDate() Group by the set_date column
 * @method     ChildForumWinnerQuery groupByPostId() Group by the post_id column
 *
 * @method     ChildForumWinnerQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildForumWinnerQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildForumWinnerQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildForumWinner findOne(ConnectionInterface $con = null) Return the first ChildForumWinner matching the query
 * @method     ChildForumWinner findOneOrCreate(ConnectionInterface $con = null) Return the first ChildForumWinner matching the query, or a new ChildForumWinner object populated from the query conditions when no match is found
 *
 * @method     ChildForumWinner findOneBySetDate(int $set_date) Return the first ChildForumWinner filtered by the set_date column
 * @method     ChildForumWinner findOneByPostId(int $post_id) Return the first ChildForumWinner filtered by the post_id column *

 * @method     ChildForumWinner requirePk($key, ConnectionInterface $con = null) Return the ChildForumWinner by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildForumWinner requireOne(ConnectionInterface $con = null) Return the first ChildForumWinner matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildForumWinner requireOneBySetDate(int $set_date) Return the first ChildForumWinner filtered by the set_date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildForumWinner requireOneByPostId(int $post_id) Return the first ChildForumWinner filtered by the post_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildForumWinner[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildForumWinner objects based on current ModelCriteria
 * @method     ChildForumWinner[]|ObjectCollection findBySetDate(int $set_date) Return ChildForumWinner objects filtered by the set_date column
 * @method     ChildForumWinner[]|ObjectCollection findByPostId(int $post_id) Return ChildForumWinner objects filtered by the post_id column
 * @method     ChildForumWinner[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class ForumWinnerQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\ForumWinnerQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'aphio', $modelName = '\\ForumWinner', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildForumWinnerQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildForumWinnerQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildForumWinnerQuery) {
            return $criteria;
        }
        $query = new ChildForumWinnerQuery();
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
     * @return ChildForumWinner|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        throw new LogicException('The ForumWinner object has no primary key');
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
        throw new LogicException('The ForumWinner object has no primary key');
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildForumWinnerQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        throw new LogicException('The ForumWinner object has no primary key');
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildForumWinnerQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        throw new LogicException('The ForumWinner object has no primary key');
    }

    /**
     * Filter the query on the set_date column
     *
     * Example usage:
     * <code>
     * $query->filterBySetDate(1234); // WHERE set_date = 1234
     * $query->filterBySetDate(array(12, 34)); // WHERE set_date IN (12, 34)
     * $query->filterBySetDate(array('min' => 12)); // WHERE set_date > 12
     * </code>
     *
     * @param     mixed $setDate The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildForumWinnerQuery The current query, for fluid interface
     */
    public function filterBySetDate($setDate = null, $comparison = null)
    {
        if (is_array($setDate)) {
            $useMinMax = false;
            if (isset($setDate['min'])) {
                $this->addUsingAlias(ForumWinnerTableMap::COL_SET_DATE, $setDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($setDate['max'])) {
                $this->addUsingAlias(ForumWinnerTableMap::COL_SET_DATE, $setDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ForumWinnerTableMap::COL_SET_DATE, $setDate, $comparison);
    }

    /**
     * Filter the query on the post_id column
     *
     * Example usage:
     * <code>
     * $query->filterByPostId(1234); // WHERE post_id = 1234
     * $query->filterByPostId(array(12, 34)); // WHERE post_id IN (12, 34)
     * $query->filterByPostId(array('min' => 12)); // WHERE post_id > 12
     * </code>
     *
     * @param     mixed $postId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildForumWinnerQuery The current query, for fluid interface
     */
    public function filterByPostId($postId = null, $comparison = null)
    {
        if (is_array($postId)) {
            $useMinMax = false;
            if (isset($postId['min'])) {
                $this->addUsingAlias(ForumWinnerTableMap::COL_POST_ID, $postId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($postId['max'])) {
                $this->addUsingAlias(ForumWinnerTableMap::COL_POST_ID, $postId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ForumWinnerTableMap::COL_POST_ID, $postId, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildForumWinner $forumWinner Object to remove from the list of results
     *
     * @return $this|ChildForumWinnerQuery The current query, for fluid interface
     */
    public function prune($forumWinner = null)
    {
        if ($forumWinner) {
            throw new LogicException('ForumWinner object has no primary key');

        }

        return $this;
    }

    /**
     * Deletes all rows from the forum_winner table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ForumWinnerTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            ForumWinnerTableMap::clearInstancePool();
            ForumWinnerTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(ForumWinnerTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(ForumWinnerTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            ForumWinnerTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            ForumWinnerTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // ForumWinnerQuery
