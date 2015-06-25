<?php

namespace Base;

use \Tools as ChildTools;
use \ToolsQuery as ChildToolsQuery;
use \Exception;
use \PDO;
use Map\ToolsTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'tools' table.
 *
 *
 *
 * @method     ChildToolsQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildToolsQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method     ChildToolsQuery orderByPermissions($order = Criteria::ASC) Order by the permissions column
 * @method     ChildToolsQuery orderByRestrictions($order = Criteria::ASC) Order by the restrictions column
 * @method     ChildToolsQuery orderByLink($order = Criteria::ASC) Order by the link column
 *
 * @method     ChildToolsQuery groupById() Group by the id column
 * @method     ChildToolsQuery groupByName() Group by the name column
 * @method     ChildToolsQuery groupByPermissions() Group by the permissions column
 * @method     ChildToolsQuery groupByRestrictions() Group by the restrictions column
 * @method     ChildToolsQuery groupByLink() Group by the link column
 *
 * @method     ChildToolsQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildToolsQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildToolsQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildTools findOne(ConnectionInterface $con = null) Return the first ChildTools matching the query
 * @method     ChildTools findOneOrCreate(ConnectionInterface $con = null) Return the first ChildTools matching the query, or a new ChildTools object populated from the query conditions when no match is found
 *
 * @method     ChildTools findOneById(int $id) Return the first ChildTools filtered by the id column
 * @method     ChildTools findOneByName(string $name) Return the first ChildTools filtered by the name column
 * @method     ChildTools findOneByPermissions(int $permissions) Return the first ChildTools filtered by the permissions column
 * @method     ChildTools findOneByRestrictions(int $restrictions) Return the first ChildTools filtered by the restrictions column
 * @method     ChildTools findOneByLink(string $link) Return the first ChildTools filtered by the link column *

 * @method     ChildTools requirePk($key, ConnectionInterface $con = null) Return the ChildTools by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTools requireOne(ConnectionInterface $con = null) Return the first ChildTools matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildTools requireOneById(int $id) Return the first ChildTools filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTools requireOneByName(string $name) Return the first ChildTools filtered by the name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTools requireOneByPermissions(int $permissions) Return the first ChildTools filtered by the permissions column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTools requireOneByRestrictions(int $restrictions) Return the first ChildTools filtered by the restrictions column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTools requireOneByLink(string $link) Return the first ChildTools filtered by the link column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildTools[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildTools objects based on current ModelCriteria
 * @method     ChildTools[]|ObjectCollection findById(int $id) Return ChildTools objects filtered by the id column
 * @method     ChildTools[]|ObjectCollection findByName(string $name) Return ChildTools objects filtered by the name column
 * @method     ChildTools[]|ObjectCollection findByPermissions(int $permissions) Return ChildTools objects filtered by the permissions column
 * @method     ChildTools[]|ObjectCollection findByRestrictions(int $restrictions) Return ChildTools objects filtered by the restrictions column
 * @method     ChildTools[]|ObjectCollection findByLink(string $link) Return ChildTools objects filtered by the link column
 * @method     ChildTools[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class ToolsQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\ToolsQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'aphio', $modelName = '\\Tools', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildToolsQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildToolsQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildToolsQuery) {
            return $criteria;
        }
        $query = new ChildToolsQuery();
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
     * @return ChildTools|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ToolsTableMap::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(ToolsTableMap::DATABASE_NAME);
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
     * @return ChildTools A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, name, permissions, restrictions, link FROM tools WHERE id = :p0';
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
            /** @var ChildTools $obj */
            $obj = new ChildTools();
            $obj->hydrate($row);
            ToolsTableMap::addInstanceToPool($obj, (string) $key);
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
     * @return ChildTools|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildToolsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ToolsTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildToolsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ToolsTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildToolsQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(ToolsTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(ToolsTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ToolsTableMap::COL_ID, $id, $comparison);
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
     * @return $this|ChildToolsQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ToolsTableMap::COL_NAME, $name, $comparison);
    }

    /**
     * Filter the query on the permissions column
     *
     * Example usage:
     * <code>
     * $query->filterByPermissions(1234); // WHERE permissions = 1234
     * $query->filterByPermissions(array(12, 34)); // WHERE permissions IN (12, 34)
     * $query->filterByPermissions(array('min' => 12)); // WHERE permissions > 12
     * </code>
     *
     * @param     mixed $permissions The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildToolsQuery The current query, for fluid interface
     */
    public function filterByPermissions($permissions = null, $comparison = null)
    {
        if (is_array($permissions)) {
            $useMinMax = false;
            if (isset($permissions['min'])) {
                $this->addUsingAlias(ToolsTableMap::COL_PERMISSIONS, $permissions['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($permissions['max'])) {
                $this->addUsingAlias(ToolsTableMap::COL_PERMISSIONS, $permissions['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ToolsTableMap::COL_PERMISSIONS, $permissions, $comparison);
    }

    /**
     * Filter the query on the restrictions column
     *
     * Example usage:
     * <code>
     * $query->filterByRestrictions(1234); // WHERE restrictions = 1234
     * $query->filterByRestrictions(array(12, 34)); // WHERE restrictions IN (12, 34)
     * $query->filterByRestrictions(array('min' => 12)); // WHERE restrictions > 12
     * </code>
     *
     * @param     mixed $restrictions The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildToolsQuery The current query, for fluid interface
     */
    public function filterByRestrictions($restrictions = null, $comparison = null)
    {
        if (is_array($restrictions)) {
            $useMinMax = false;
            if (isset($restrictions['min'])) {
                $this->addUsingAlias(ToolsTableMap::COL_RESTRICTIONS, $restrictions['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($restrictions['max'])) {
                $this->addUsingAlias(ToolsTableMap::COL_RESTRICTIONS, $restrictions['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ToolsTableMap::COL_RESTRICTIONS, $restrictions, $comparison);
    }

    /**
     * Filter the query on the link column
     *
     * Example usage:
     * <code>
     * $query->filterByLink('fooValue');   // WHERE link = 'fooValue'
     * $query->filterByLink('%fooValue%'); // WHERE link LIKE '%fooValue%'
     * </code>
     *
     * @param     string $link The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildToolsQuery The current query, for fluid interface
     */
    public function filterByLink($link = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($link)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $link)) {
                $link = str_replace('*', '%', $link);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ToolsTableMap::COL_LINK, $link, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildTools $tools Object to remove from the list of results
     *
     * @return $this|ChildToolsQuery The current query, for fluid interface
     */
    public function prune($tools = null)
    {
        if ($tools) {
            $this->addUsingAlias(ToolsTableMap::COL_ID, $tools->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the tools table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ToolsTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            ToolsTableMap::clearInstancePool();
            ToolsTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(ToolsTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(ToolsTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            ToolsTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            ToolsTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // ToolsQuery
