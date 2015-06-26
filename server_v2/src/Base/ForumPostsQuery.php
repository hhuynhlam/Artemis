<?php

namespace Base;

use \ForumPosts as ChildForumPosts;
use \ForumPostsQuery as ChildForumPostsQuery;
use \Exception;
use \PDO;
use Map\ForumPostsTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'forum_posts' table.
 *
 *
 *
 * @method     ChildForumPostsQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildForumPostsQuery orderByTopic($order = Criteria::ASC) Order by the topic column
 * @method     ChildForumPostsQuery orderByContent($order = Criteria::ASC) Order by the content column
 * @method     ChildForumPostsQuery orderByAuthor($order = Criteria::ASC) Order by the author column
 * @method     ChildForumPostsQuery orderByPostTime($order = Criteria::ASC) Order by the post_time column
 * @method     ChildForumPostsQuery orderByEditTime($order = Criteria::ASC) Order by the edit_time column
 *
 * @method     ChildForumPostsQuery groupById() Group by the id column
 * @method     ChildForumPostsQuery groupByTopic() Group by the topic column
 * @method     ChildForumPostsQuery groupByContent() Group by the content column
 * @method     ChildForumPostsQuery groupByAuthor() Group by the author column
 * @method     ChildForumPostsQuery groupByPostTime() Group by the post_time column
 * @method     ChildForumPostsQuery groupByEditTime() Group by the edit_time column
 *
 * @method     ChildForumPostsQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildForumPostsQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildForumPostsQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildForumPosts findOne(ConnectionInterface $con = null) Return the first ChildForumPosts matching the query
 * @method     ChildForumPosts findOneOrCreate(ConnectionInterface $con = null) Return the first ChildForumPosts matching the query, or a new ChildForumPosts object populated from the query conditions when no match is found
 *
 * @method     ChildForumPosts findOneById(int $id) Return the first ChildForumPosts filtered by the id column
 * @method     ChildForumPosts findOneByTopic(int $topic) Return the first ChildForumPosts filtered by the topic column
 * @method     ChildForumPosts findOneByContent(string $content) Return the first ChildForumPosts filtered by the content column
 * @method     ChildForumPosts findOneByAuthor(int $author) Return the first ChildForumPosts filtered by the author column
 * @method     ChildForumPosts findOneByPostTime(int $post_time) Return the first ChildForumPosts filtered by the post_time column
 * @method     ChildForumPosts findOneByEditTime(int $edit_time) Return the first ChildForumPosts filtered by the edit_time column *

 * @method     ChildForumPosts requirePk($key, ConnectionInterface $con = null) Return the ChildForumPosts by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildForumPosts requireOne(ConnectionInterface $con = null) Return the first ChildForumPosts matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildForumPosts requireOneById(int $id) Return the first ChildForumPosts filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildForumPosts requireOneByTopic(int $topic) Return the first ChildForumPosts filtered by the topic column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildForumPosts requireOneByContent(string $content) Return the first ChildForumPosts filtered by the content column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildForumPosts requireOneByAuthor(int $author) Return the first ChildForumPosts filtered by the author column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildForumPosts requireOneByPostTime(int $post_time) Return the first ChildForumPosts filtered by the post_time column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildForumPosts requireOneByEditTime(int $edit_time) Return the first ChildForumPosts filtered by the edit_time column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildForumPosts[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildForumPosts objects based on current ModelCriteria
 * @method     ChildForumPosts[]|ObjectCollection findById(int $id) Return ChildForumPosts objects filtered by the id column
 * @method     ChildForumPosts[]|ObjectCollection findByTopic(int $topic) Return ChildForumPosts objects filtered by the topic column
 * @method     ChildForumPosts[]|ObjectCollection findByContent(string $content) Return ChildForumPosts objects filtered by the content column
 * @method     ChildForumPosts[]|ObjectCollection findByAuthor(int $author) Return ChildForumPosts objects filtered by the author column
 * @method     ChildForumPosts[]|ObjectCollection findByPostTime(int $post_time) Return ChildForumPosts objects filtered by the post_time column
 * @method     ChildForumPosts[]|ObjectCollection findByEditTime(int $edit_time) Return ChildForumPosts objects filtered by the edit_time column
 * @method     ChildForumPosts[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class ForumPostsQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\ForumPostsQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'aphio', $modelName = '\\ForumPosts', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildForumPostsQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildForumPostsQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildForumPostsQuery) {
            return $criteria;
        }
        $query = new ChildForumPostsQuery();
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
     * @return ChildForumPosts|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ForumPostsTableMap::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(ForumPostsTableMap::DATABASE_NAME);
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
     * @return ChildForumPosts A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT `id`, `topic`, `content`, `author`, `post_time`, `edit_time` FROM `forum_posts` WHERE `id` = :p0';
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
            /** @var ChildForumPosts $obj */
            $obj = new ChildForumPosts();
            $obj->hydrate($row);
            ForumPostsTableMap::addInstanceToPool($obj, (string) $key);
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
     * @return ChildForumPosts|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildForumPostsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ForumPostsTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildForumPostsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ForumPostsTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildForumPostsQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(ForumPostsTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(ForumPostsTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ForumPostsTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the topic column
     *
     * Example usage:
     * <code>
     * $query->filterByTopic(1234); // WHERE topic = 1234
     * $query->filterByTopic(array(12, 34)); // WHERE topic IN (12, 34)
     * $query->filterByTopic(array('min' => 12)); // WHERE topic > 12
     * </code>
     *
     * @param     mixed $topic The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildForumPostsQuery The current query, for fluid interface
     */
    public function filterByTopic($topic = null, $comparison = null)
    {
        if (is_array($topic)) {
            $useMinMax = false;
            if (isset($topic['min'])) {
                $this->addUsingAlias(ForumPostsTableMap::COL_TOPIC, $topic['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($topic['max'])) {
                $this->addUsingAlias(ForumPostsTableMap::COL_TOPIC, $topic['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ForumPostsTableMap::COL_TOPIC, $topic, $comparison);
    }

    /**
     * Filter the query on the content column
     *
     * Example usage:
     * <code>
     * $query->filterByContent('fooValue');   // WHERE content = 'fooValue'
     * $query->filterByContent('%fooValue%'); // WHERE content LIKE '%fooValue%'
     * </code>
     *
     * @param     string $content The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildForumPostsQuery The current query, for fluid interface
     */
    public function filterByContent($content = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($content)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $content)) {
                $content = str_replace('*', '%', $content);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ForumPostsTableMap::COL_CONTENT, $content, $comparison);
    }

    /**
     * Filter the query on the author column
     *
     * Example usage:
     * <code>
     * $query->filterByAuthor(1234); // WHERE author = 1234
     * $query->filterByAuthor(array(12, 34)); // WHERE author IN (12, 34)
     * $query->filterByAuthor(array('min' => 12)); // WHERE author > 12
     * </code>
     *
     * @param     mixed $author The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildForumPostsQuery The current query, for fluid interface
     */
    public function filterByAuthor($author = null, $comparison = null)
    {
        if (is_array($author)) {
            $useMinMax = false;
            if (isset($author['min'])) {
                $this->addUsingAlias(ForumPostsTableMap::COL_AUTHOR, $author['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($author['max'])) {
                $this->addUsingAlias(ForumPostsTableMap::COL_AUTHOR, $author['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ForumPostsTableMap::COL_AUTHOR, $author, $comparison);
    }

    /**
     * Filter the query on the post_time column
     *
     * Example usage:
     * <code>
     * $query->filterByPostTime(1234); // WHERE post_time = 1234
     * $query->filterByPostTime(array(12, 34)); // WHERE post_time IN (12, 34)
     * $query->filterByPostTime(array('min' => 12)); // WHERE post_time > 12
     * </code>
     *
     * @param     mixed $postTime The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildForumPostsQuery The current query, for fluid interface
     */
    public function filterByPostTime($postTime = null, $comparison = null)
    {
        if (is_array($postTime)) {
            $useMinMax = false;
            if (isset($postTime['min'])) {
                $this->addUsingAlias(ForumPostsTableMap::COL_POST_TIME, $postTime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($postTime['max'])) {
                $this->addUsingAlias(ForumPostsTableMap::COL_POST_TIME, $postTime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ForumPostsTableMap::COL_POST_TIME, $postTime, $comparison);
    }

    /**
     * Filter the query on the edit_time column
     *
     * Example usage:
     * <code>
     * $query->filterByEditTime(1234); // WHERE edit_time = 1234
     * $query->filterByEditTime(array(12, 34)); // WHERE edit_time IN (12, 34)
     * $query->filterByEditTime(array('min' => 12)); // WHERE edit_time > 12
     * </code>
     *
     * @param     mixed $editTime The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildForumPostsQuery The current query, for fluid interface
     */
    public function filterByEditTime($editTime = null, $comparison = null)
    {
        if (is_array($editTime)) {
            $useMinMax = false;
            if (isset($editTime['min'])) {
                $this->addUsingAlias(ForumPostsTableMap::COL_EDIT_TIME, $editTime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($editTime['max'])) {
                $this->addUsingAlias(ForumPostsTableMap::COL_EDIT_TIME, $editTime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ForumPostsTableMap::COL_EDIT_TIME, $editTime, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildForumPosts $forumPosts Object to remove from the list of results
     *
     * @return $this|ChildForumPostsQuery The current query, for fluid interface
     */
    public function prune($forumPosts = null)
    {
        if ($forumPosts) {
            $this->addUsingAlias(ForumPostsTableMap::COL_ID, $forumPosts->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the forum_posts table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ForumPostsTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            ForumPostsTableMap::clearInstancePool();
            ForumPostsTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(ForumPostsTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(ForumPostsTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            ForumPostsTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            ForumPostsTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // ForumPostsQuery
