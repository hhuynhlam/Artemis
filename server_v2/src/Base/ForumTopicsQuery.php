<?php

namespace Base;

use \ForumTopics as ChildForumTopics;
use \ForumTopicsQuery as ChildForumTopicsQuery;
use \Exception;
use \PDO;
use Map\ForumTopicsTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'forum_topics' table.
 *
 *
 *
 * @method     ChildForumTopicsQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildForumTopicsQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method     ChildForumTopicsQuery orderByForum($order = Criteria::ASC) Order by the forum column
 * @method     ChildForumTopicsQuery orderByType($order = Criteria::ASC) Order by the type column
 * @method     ChildForumTopicsQuery orderByCreator($order = Criteria::ASC) Order by the creator column
 * @method     ChildForumTopicsQuery orderByViewedList($order = Criteria::ASC) Order by the viewed_list column
 *
 * @method     ChildForumTopicsQuery groupById() Group by the id column
 * @method     ChildForumTopicsQuery groupByName() Group by the name column
 * @method     ChildForumTopicsQuery groupByForum() Group by the forum column
 * @method     ChildForumTopicsQuery groupByType() Group by the type column
 * @method     ChildForumTopicsQuery groupByCreator() Group by the creator column
 * @method     ChildForumTopicsQuery groupByViewedList() Group by the viewed_list column
 *
 * @method     ChildForumTopicsQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildForumTopicsQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildForumTopicsQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildForumTopics findOne(ConnectionInterface $con = null) Return the first ChildForumTopics matching the query
 * @method     ChildForumTopics findOneOrCreate(ConnectionInterface $con = null) Return the first ChildForumTopics matching the query, or a new ChildForumTopics object populated from the query conditions when no match is found
 *
 * @method     ChildForumTopics findOneById(int $id) Return the first ChildForumTopics filtered by the id column
 * @method     ChildForumTopics findOneByName(string $name) Return the first ChildForumTopics filtered by the name column
 * @method     ChildForumTopics findOneByForum(int $forum) Return the first ChildForumTopics filtered by the forum column
 * @method     ChildForumTopics findOneByType(int $type) Return the first ChildForumTopics filtered by the type column
 * @method     ChildForumTopics findOneByCreator(int $creator) Return the first ChildForumTopics filtered by the creator column
 * @method     ChildForumTopics findOneByViewedList(string $viewed_list) Return the first ChildForumTopics filtered by the viewed_list column *

 * @method     ChildForumTopics requirePk($key, ConnectionInterface $con = null) Return the ChildForumTopics by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildForumTopics requireOne(ConnectionInterface $con = null) Return the first ChildForumTopics matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildForumTopics requireOneById(int $id) Return the first ChildForumTopics filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildForumTopics requireOneByName(string $name) Return the first ChildForumTopics filtered by the name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildForumTopics requireOneByForum(int $forum) Return the first ChildForumTopics filtered by the forum column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildForumTopics requireOneByType(int $type) Return the first ChildForumTopics filtered by the type column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildForumTopics requireOneByCreator(int $creator) Return the first ChildForumTopics filtered by the creator column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildForumTopics requireOneByViewedList(string $viewed_list) Return the first ChildForumTopics filtered by the viewed_list column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildForumTopics[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildForumTopics objects based on current ModelCriteria
 * @method     ChildForumTopics[]|ObjectCollection findById(int $id) Return ChildForumTopics objects filtered by the id column
 * @method     ChildForumTopics[]|ObjectCollection findByName(string $name) Return ChildForumTopics objects filtered by the name column
 * @method     ChildForumTopics[]|ObjectCollection findByForum(int $forum) Return ChildForumTopics objects filtered by the forum column
 * @method     ChildForumTopics[]|ObjectCollection findByType(int $type) Return ChildForumTopics objects filtered by the type column
 * @method     ChildForumTopics[]|ObjectCollection findByCreator(int $creator) Return ChildForumTopics objects filtered by the creator column
 * @method     ChildForumTopics[]|ObjectCollection findByViewedList(string $viewed_list) Return ChildForumTopics objects filtered by the viewed_list column
 * @method     ChildForumTopics[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class ForumTopicsQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\ForumTopicsQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'aphio', $modelName = '\\ForumTopics', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildForumTopicsQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildForumTopicsQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildForumTopicsQuery) {
            return $criteria;
        }
        $query = new ChildForumTopicsQuery();
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
     * @return ChildForumTopics|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ForumTopicsTableMap::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(ForumTopicsTableMap::DATABASE_NAME);
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
     * @return ChildForumTopics A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT `id`, `name`, `forum`, `type`, `creator`, `viewed_list` FROM `forum_topics` WHERE `id` = :p0';
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
            /** @var ChildForumTopics $obj */
            $obj = new ChildForumTopics();
            $obj->hydrate($row);
            ForumTopicsTableMap::addInstanceToPool($obj, (string) $key);
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
     * @return ChildForumTopics|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildForumTopicsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ForumTopicsTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildForumTopicsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ForumTopicsTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildForumTopicsQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(ForumTopicsTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(ForumTopicsTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ForumTopicsTableMap::COL_ID, $id, $comparison);
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
     * @return $this|ChildForumTopicsQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ForumTopicsTableMap::COL_NAME, $name, $comparison);
    }

    /**
     * Filter the query on the forum column
     *
     * Example usage:
     * <code>
     * $query->filterByForum(1234); // WHERE forum = 1234
     * $query->filterByForum(array(12, 34)); // WHERE forum IN (12, 34)
     * $query->filterByForum(array('min' => 12)); // WHERE forum > 12
     * </code>
     *
     * @param     mixed $forum The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildForumTopicsQuery The current query, for fluid interface
     */
    public function filterByForum($forum = null, $comparison = null)
    {
        if (is_array($forum)) {
            $useMinMax = false;
            if (isset($forum['min'])) {
                $this->addUsingAlias(ForumTopicsTableMap::COL_FORUM, $forum['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($forum['max'])) {
                $this->addUsingAlias(ForumTopicsTableMap::COL_FORUM, $forum['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ForumTopicsTableMap::COL_FORUM, $forum, $comparison);
    }

    /**
     * Filter the query on the type column
     *
     * Example usage:
     * <code>
     * $query->filterByType(1234); // WHERE type = 1234
     * $query->filterByType(array(12, 34)); // WHERE type IN (12, 34)
     * $query->filterByType(array('min' => 12)); // WHERE type > 12
     * </code>
     *
     * @param     mixed $type The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildForumTopicsQuery The current query, for fluid interface
     */
    public function filterByType($type = null, $comparison = null)
    {
        if (is_array($type)) {
            $useMinMax = false;
            if (isset($type['min'])) {
                $this->addUsingAlias(ForumTopicsTableMap::COL_TYPE, $type['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($type['max'])) {
                $this->addUsingAlias(ForumTopicsTableMap::COL_TYPE, $type['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ForumTopicsTableMap::COL_TYPE, $type, $comparison);
    }

    /**
     * Filter the query on the creator column
     *
     * Example usage:
     * <code>
     * $query->filterByCreator(1234); // WHERE creator = 1234
     * $query->filterByCreator(array(12, 34)); // WHERE creator IN (12, 34)
     * $query->filterByCreator(array('min' => 12)); // WHERE creator > 12
     * </code>
     *
     * @param     mixed $creator The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildForumTopicsQuery The current query, for fluid interface
     */
    public function filterByCreator($creator = null, $comparison = null)
    {
        if (is_array($creator)) {
            $useMinMax = false;
            if (isset($creator['min'])) {
                $this->addUsingAlias(ForumTopicsTableMap::COL_CREATOR, $creator['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($creator['max'])) {
                $this->addUsingAlias(ForumTopicsTableMap::COL_CREATOR, $creator['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ForumTopicsTableMap::COL_CREATOR, $creator, $comparison);
    }

    /**
     * Filter the query on the viewed_list column
     *
     * Example usage:
     * <code>
     * $query->filterByViewedList('fooValue');   // WHERE viewed_list = 'fooValue'
     * $query->filterByViewedList('%fooValue%'); // WHERE viewed_list LIKE '%fooValue%'
     * </code>
     *
     * @param     string $viewedList The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildForumTopicsQuery The current query, for fluid interface
     */
    public function filterByViewedList($viewedList = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($viewedList)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $viewedList)) {
                $viewedList = str_replace('*', '%', $viewedList);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ForumTopicsTableMap::COL_VIEWED_LIST, $viewedList, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildForumTopics $forumTopics Object to remove from the list of results
     *
     * @return $this|ChildForumTopicsQuery The current query, for fluid interface
     */
    public function prune($forumTopics = null)
    {
        if ($forumTopics) {
            $this->addUsingAlias(ForumTopicsTableMap::COL_ID, $forumTopics->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the forum_topics table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ForumTopicsTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            ForumTopicsTableMap::clearInstancePool();
            ForumTopicsTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(ForumTopicsTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(ForumTopicsTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            ForumTopicsTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            ForumTopicsTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // ForumTopicsQuery
