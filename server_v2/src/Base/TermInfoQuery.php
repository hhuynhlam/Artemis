<?php

namespace Base;

use \TermInfo as ChildTermInfo;
use \TermInfoQuery as ChildTermInfoQuery;
use \Exception;
use \PDO;
use Map\TermInfoTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'term_info' table.
 *
 *
 *
 * @method     ChildTermInfoQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildTermInfoQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method     ChildTermInfoQuery orderByStartDate($order = Criteria::ASC) Order by the start_date column
 * @method     ChildTermInfoQuery orderByQuarter($order = Criteria::ASC) Order by the quarter column
 * @method     ChildTermInfoQuery orderByYear($order = Criteria::ASC) Order by the year column
 * @method     ChildTermInfoQuery orderByPledgeStartDate($order = Criteria::ASC) Order by the pledge_start_date column
 * @method     ChildTermInfoQuery orderByCurrent($order = Criteria::ASC) Order by the current column
 *
 * @method     ChildTermInfoQuery groupById() Group by the id column
 * @method     ChildTermInfoQuery groupByName() Group by the name column
 * @method     ChildTermInfoQuery groupByStartDate() Group by the start_date column
 * @method     ChildTermInfoQuery groupByQuarter() Group by the quarter column
 * @method     ChildTermInfoQuery groupByYear() Group by the year column
 * @method     ChildTermInfoQuery groupByPledgeStartDate() Group by the pledge_start_date column
 * @method     ChildTermInfoQuery groupByCurrent() Group by the current column
 *
 * @method     ChildTermInfoQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildTermInfoQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildTermInfoQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildTermInfo findOne(ConnectionInterface $con = null) Return the first ChildTermInfo matching the query
 * @method     ChildTermInfo findOneOrCreate(ConnectionInterface $con = null) Return the first ChildTermInfo matching the query, or a new ChildTermInfo object populated from the query conditions when no match is found
 *
 * @method     ChildTermInfo findOneById(int $id) Return the first ChildTermInfo filtered by the id column
 * @method     ChildTermInfo findOneByName(string $name) Return the first ChildTermInfo filtered by the name column
 * @method     ChildTermInfo findOneByStartDate(string $start_date) Return the first ChildTermInfo filtered by the start_date column
 * @method     ChildTermInfo findOneByQuarter(string $quarter) Return the first ChildTermInfo filtered by the quarter column
 * @method     ChildTermInfo findOneByYear(int $year) Return the first ChildTermInfo filtered by the year column
 * @method     ChildTermInfo findOneByPledgeStartDate(string $pledge_start_date) Return the first ChildTermInfo filtered by the pledge_start_date column
 * @method     ChildTermInfo findOneByCurrent(boolean $current) Return the first ChildTermInfo filtered by the current column *

 * @method     ChildTermInfo requirePk($key, ConnectionInterface $con = null) Return the ChildTermInfo by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTermInfo requireOne(ConnectionInterface $con = null) Return the first ChildTermInfo matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildTermInfo requireOneById(int $id) Return the first ChildTermInfo filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTermInfo requireOneByName(string $name) Return the first ChildTermInfo filtered by the name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTermInfo requireOneByStartDate(string $start_date) Return the first ChildTermInfo filtered by the start_date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTermInfo requireOneByQuarter(string $quarter) Return the first ChildTermInfo filtered by the quarter column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTermInfo requireOneByYear(int $year) Return the first ChildTermInfo filtered by the year column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTermInfo requireOneByPledgeStartDate(string $pledge_start_date) Return the first ChildTermInfo filtered by the pledge_start_date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTermInfo requireOneByCurrent(boolean $current) Return the first ChildTermInfo filtered by the current column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildTermInfo[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildTermInfo objects based on current ModelCriteria
 * @method     ChildTermInfo[]|ObjectCollection findById(int $id) Return ChildTermInfo objects filtered by the id column
 * @method     ChildTermInfo[]|ObjectCollection findByName(string $name) Return ChildTermInfo objects filtered by the name column
 * @method     ChildTermInfo[]|ObjectCollection findByStartDate(string $start_date) Return ChildTermInfo objects filtered by the start_date column
 * @method     ChildTermInfo[]|ObjectCollection findByQuarter(string $quarter) Return ChildTermInfo objects filtered by the quarter column
 * @method     ChildTermInfo[]|ObjectCollection findByYear(int $year) Return ChildTermInfo objects filtered by the year column
 * @method     ChildTermInfo[]|ObjectCollection findByPledgeStartDate(string $pledge_start_date) Return ChildTermInfo objects filtered by the pledge_start_date column
 * @method     ChildTermInfo[]|ObjectCollection findByCurrent(boolean $current) Return ChildTermInfo objects filtered by the current column
 * @method     ChildTermInfo[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class TermInfoQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\TermInfoQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'aphio', $modelName = '\\TermInfo', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildTermInfoQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildTermInfoQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildTermInfoQuery) {
            return $criteria;
        }
        $query = new ChildTermInfoQuery();
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
     * @return ChildTermInfo|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = TermInfoTableMap::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(TermInfoTableMap::DATABASE_NAME);
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
     * @return ChildTermInfo A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT `id`, `name`, `start_date`, `quarter`, `year`, `pledge_start_date`, `current` FROM `term_info` WHERE `id` = :p0';
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
            /** @var ChildTermInfo $obj */
            $obj = new ChildTermInfo();
            $obj->hydrate($row);
            TermInfoTableMap::addInstanceToPool($obj, (string) $key);
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
     * @return ChildTermInfo|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildTermInfoQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(TermInfoTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildTermInfoQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(TermInfoTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildTermInfoQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(TermInfoTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(TermInfoTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TermInfoTableMap::COL_ID, $id, $comparison);
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
     * @return $this|ChildTermInfoQuery The current query, for fluid interface
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

        return $this->addUsingAlias(TermInfoTableMap::COL_NAME, $name, $comparison);
    }

    /**
     * Filter the query on the start_date column
     *
     * Example usage:
     * <code>
     * $query->filterByStartDate(1234); // WHERE start_date = 1234
     * $query->filterByStartDate(array(12, 34)); // WHERE start_date IN (12, 34)
     * $query->filterByStartDate(array('min' => 12)); // WHERE start_date > 12
     * </code>
     *
     * @param     mixed $startDate The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTermInfoQuery The current query, for fluid interface
     */
    public function filterByStartDate($startDate = null, $comparison = null)
    {
        if (is_array($startDate)) {
            $useMinMax = false;
            if (isset($startDate['min'])) {
                $this->addUsingAlias(TermInfoTableMap::COL_START_DATE, $startDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($startDate['max'])) {
                $this->addUsingAlias(TermInfoTableMap::COL_START_DATE, $startDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TermInfoTableMap::COL_START_DATE, $startDate, $comparison);
    }

    /**
     * Filter the query on the quarter column
     *
     * Example usage:
     * <code>
     * $query->filterByQuarter('fooValue');   // WHERE quarter = 'fooValue'
     * $query->filterByQuarter('%fooValue%'); // WHERE quarter LIKE '%fooValue%'
     * </code>
     *
     * @param     string $quarter The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTermInfoQuery The current query, for fluid interface
     */
    public function filterByQuarter($quarter = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($quarter)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $quarter)) {
                $quarter = str_replace('*', '%', $quarter);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(TermInfoTableMap::COL_QUARTER, $quarter, $comparison);
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
     * @return $this|ChildTermInfoQuery The current query, for fluid interface
     */
    public function filterByYear($year = null, $comparison = null)
    {
        if (is_array($year)) {
            $useMinMax = false;
            if (isset($year['min'])) {
                $this->addUsingAlias(TermInfoTableMap::COL_YEAR, $year['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($year['max'])) {
                $this->addUsingAlias(TermInfoTableMap::COL_YEAR, $year['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TermInfoTableMap::COL_YEAR, $year, $comparison);
    }

    /**
     * Filter the query on the pledge_start_date column
     *
     * Example usage:
     * <code>
     * $query->filterByPledgeStartDate(1234); // WHERE pledge_start_date = 1234
     * $query->filterByPledgeStartDate(array(12, 34)); // WHERE pledge_start_date IN (12, 34)
     * $query->filterByPledgeStartDate(array('min' => 12)); // WHERE pledge_start_date > 12
     * </code>
     *
     * @param     mixed $pledgeStartDate The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTermInfoQuery The current query, for fluid interface
     */
    public function filterByPledgeStartDate($pledgeStartDate = null, $comparison = null)
    {
        if (is_array($pledgeStartDate)) {
            $useMinMax = false;
            if (isset($pledgeStartDate['min'])) {
                $this->addUsingAlias(TermInfoTableMap::COL_PLEDGE_START_DATE, $pledgeStartDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($pledgeStartDate['max'])) {
                $this->addUsingAlias(TermInfoTableMap::COL_PLEDGE_START_DATE, $pledgeStartDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TermInfoTableMap::COL_PLEDGE_START_DATE, $pledgeStartDate, $comparison);
    }

    /**
     * Filter the query on the current column
     *
     * Example usage:
     * <code>
     * $query->filterByCurrent(true); // WHERE current = true
     * $query->filterByCurrent('yes'); // WHERE current = true
     * </code>
     *
     * @param     boolean|string $current The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTermInfoQuery The current query, for fluid interface
     */
    public function filterByCurrent($current = null, $comparison = null)
    {
        if (is_string($current)) {
            $current = in_array(strtolower($current), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(TermInfoTableMap::COL_CURRENT, $current, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildTermInfo $termInfo Object to remove from the list of results
     *
     * @return $this|ChildTermInfoQuery The current query, for fluid interface
     */
    public function prune($termInfo = null)
    {
        if ($termInfo) {
            $this->addUsingAlias(TermInfoTableMap::COL_ID, $termInfo->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the term_info table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(TermInfoTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            TermInfoTableMap::clearInstancePool();
            TermInfoTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(TermInfoTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(TermInfoTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            TermInfoTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            TermInfoTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // TermInfoQuery
