<?php

namespace Base;

use \ForumForums as ChildForumForums;
use \ForumForumsQuery as ChildForumForumsQuery;
use \Exception;
use \PDO;
use Map\ForumForumsTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'forum_forums' table.
 *
 *
 *
 * @method     ChildForumForumsQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildForumForumsQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method     ChildForumForumsQuery orderByModerator($order = Criteria::ASC) Order by the moderator column
 * @method     ChildForumForumsQuery orderByViewPermission($order = Criteria::ASC) Order by the view_permission column
 * @method     ChildForumForumsQuery orderByListPos($order = Criteria::ASC) Order by the list_pos column
 *
 * @method     ChildForumForumsQuery groupById() Group by the id column
 * @method     ChildForumForumsQuery groupByName() Group by the name column
 * @method     ChildForumForumsQuery groupByModerator() Group by the moderator column
 * @method     ChildForumForumsQuery groupByViewPermission() Group by the view_permission column
 * @method     ChildForumForumsQuery groupByListPos() Group by the list_pos column
 *
 * @method     ChildForumForumsQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildForumForumsQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildForumForumsQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildForumForums findOne(ConnectionInterface $con = null) Return the first ChildForumForums matching the query
 * @method     ChildForumForums findOneOrCreate(ConnectionInterface $con = null) Return the first ChildForumForums matching the query, or a new ChildForumForums object populated from the query conditions when no match is found
 *
 * @method     ChildForumForums findOneById(int $id) Return the first ChildForumForums filtered by the id column
 * @method     ChildForumForums findOneByName(string $name) Return the first ChildForumForums filtered by the name column
 * @method     ChildForumForums findOneByModerator(int $moderator) Return the first ChildForumForums filtered by the moderator column
 * @method     ChildForumForums findOneByViewPermission(int $view_permission) Return the first ChildForumForums filtered by the view_permission column
 * @method     ChildForumForums findOneByListPos(int $list_pos) Return the first ChildForumForums filtered by the list_pos column *

 * @method     ChildForumForums requirePk($key, ConnectionInterface $con = null) Return the ChildForumForums by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildForumForums requireOne(ConnectionInterface $con = null) Return the first ChildForumForums matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildForumForums requireOneById(int $id) Return the first ChildForumForums filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildForumForums requireOneByName(string $name) Return the first ChildForumForums filtered by the name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildForumForums requireOneByModerator(int $moderator) Return the first ChildForumForums filtered by the moderator column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildForumForums requireOneByViewPermission(int $view_permission) Return the first ChildForumForums filtered by the view_permission column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildForumForums requireOneByListPos(int $list_pos) Return the first ChildForumForums filtered by the list_pos column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildForumForums[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildForumForums objects based on current ModelCriteria
 * @method     ChildForumForums[]|ObjectCollection findById(int $id) Return ChildForumForums objects filtered by the id column
 * @method     ChildForumForums[]|ObjectCollection findByName(string $name) Return ChildForumForums objects filtered by the name column
 * @method     ChildForumForums[]|ObjectCollection findByModerator(int $moderator) Return ChildForumForums objects filtered by the moderator column
 * @method     ChildForumForums[]|ObjectCollection findByViewPermission(int $view_permission) Return ChildForumForums objects filtered by the view_permission column
 * @method     ChildForumForums[]|ObjectCollection findByListPos(int $list_pos) Return ChildForumForums objects filtered by the list_pos column
 * @method     ChildForumForums[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class ForumForumsQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\ForumForumsQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'aphio', $modelName = '\\ForumForums', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildForumForumsQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildForumForumsQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildForumForumsQuery) {
            return $criteria;
        }
        $query = new ChildForumForumsQuery();
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
     * @return ChildForumForums|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ForumForumsTableMap::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(ForumForumsTableMap::DATABASE_NAME);
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
     * @return ChildForumForums A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, name, moderator, view_permission, list_pos FROM forum_forums WHERE id = :p0';
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
            /** @var ChildForumForums $obj */
            $obj = new ChildForumForums();
            $obj->hydrate($row);
            ForumForumsTableMap::addInstanceToPool($obj, (string) $key);
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
     * @return ChildForumForums|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildForumForumsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ForumForumsTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildForumForumsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ForumForumsTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildForumForumsQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(ForumForumsTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(ForumForumsTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ForumForumsTableMap::COL_ID, $id, $comparison);
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
     * @return $this|ChildForumForumsQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ForumForumsTableMap::COL_NAME, $name, $comparison);
    }

    /**
     * Filter the query on the moderator column
     *
     * Example usage:
     * <code>
     * $query->filterByModerator(1234); // WHERE moderator = 1234
     * $query->filterByModerator(array(12, 34)); // WHERE moderator IN (12, 34)
     * $query->filterByModerator(array('min' => 12)); // WHERE moderator > 12
     * </code>
     *
     * @param     mixed $moderator The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildForumForumsQuery The current query, for fluid interface
     */
    public function filterByModerator($moderator = null, $comparison = null)
    {
        if (is_array($moderator)) {
            $useMinMax = false;
            if (isset($moderator['min'])) {
                $this->addUsingAlias(ForumForumsTableMap::COL_MODERATOR, $moderator['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($moderator['max'])) {
                $this->addUsingAlias(ForumForumsTableMap::COL_MODERATOR, $moderator['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ForumForumsTableMap::COL_MODERATOR, $moderator, $comparison);
    }

    /**
     * Filter the query on the view_permission column
     *
     * Example usage:
     * <code>
     * $query->filterByViewPermission(1234); // WHERE view_permission = 1234
     * $query->filterByViewPermission(array(12, 34)); // WHERE view_permission IN (12, 34)
     * $query->filterByViewPermission(array('min' => 12)); // WHERE view_permission > 12
     * </code>
     *
     * @param     mixed $viewPermission The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildForumForumsQuery The current query, for fluid interface
     */
    public function filterByViewPermission($viewPermission = null, $comparison = null)
    {
        if (is_array($viewPermission)) {
            $useMinMax = false;
            if (isset($viewPermission['min'])) {
                $this->addUsingAlias(ForumForumsTableMap::COL_VIEW_PERMISSION, $viewPermission['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($viewPermission['max'])) {
                $this->addUsingAlias(ForumForumsTableMap::COL_VIEW_PERMISSION, $viewPermission['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ForumForumsTableMap::COL_VIEW_PERMISSION, $viewPermission, $comparison);
    }

    /**
     * Filter the query on the list_pos column
     *
     * Example usage:
     * <code>
     * $query->filterByListPos(1234); // WHERE list_pos = 1234
     * $query->filterByListPos(array(12, 34)); // WHERE list_pos IN (12, 34)
     * $query->filterByListPos(array('min' => 12)); // WHERE list_pos > 12
     * </code>
     *
     * @param     mixed $listPos The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildForumForumsQuery The current query, for fluid interface
     */
    public function filterByListPos($listPos = null, $comparison = null)
    {
        if (is_array($listPos)) {
            $useMinMax = false;
            if (isset($listPos['min'])) {
                $this->addUsingAlias(ForumForumsTableMap::COL_LIST_POS, $listPos['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($listPos['max'])) {
                $this->addUsingAlias(ForumForumsTableMap::COL_LIST_POS, $listPos['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ForumForumsTableMap::COL_LIST_POS, $listPos, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildForumForums $forumForums Object to remove from the list of results
     *
     * @return $this|ChildForumForumsQuery The current query, for fluid interface
     */
    public function prune($forumForums = null)
    {
        if ($forumForums) {
            $this->addUsingAlias(ForumForumsTableMap::COL_ID, $forumForums->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the forum_forums table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ForumForumsTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            ForumForumsTableMap::clearInstancePool();
            ForumForumsTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(ForumForumsTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(ForumForumsTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            ForumForumsTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            ForumForumsTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // ForumForumsQuery
