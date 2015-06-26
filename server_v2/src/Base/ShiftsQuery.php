<?php

namespace Base;

use \Shifts as ChildShifts;
use \ShiftsQuery as ChildShiftsQuery;
use \Exception;
use \PDO;
use Map\ShiftsTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'shifts' table.
 *
 *
 *
 * @method     ChildShiftsQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildShiftsQuery orderByEvent($order = Criteria::ASC) Order by the event column
 * @method     ChildShiftsQuery orderByStartTime($order = Criteria::ASC) Order by the start_time column
 * @method     ChildShiftsQuery orderByEndTime($order = Criteria::ASC) Order by the end_time column
 * @method     ChildShiftsQuery orderByOpenTo($order = Criteria::ASC) Order by the open_to column
 * @method     ChildShiftsQuery orderByCap($order = Criteria::ASC) Order by the cap column
 * @method     ChildShiftsQuery orderByDescription($order = Criteria::ASC) Order by the description column
 *
 * @method     ChildShiftsQuery groupById() Group by the id column
 * @method     ChildShiftsQuery groupByEvent() Group by the event column
 * @method     ChildShiftsQuery groupByStartTime() Group by the start_time column
 * @method     ChildShiftsQuery groupByEndTime() Group by the end_time column
 * @method     ChildShiftsQuery groupByOpenTo() Group by the open_to column
 * @method     ChildShiftsQuery groupByCap() Group by the cap column
 * @method     ChildShiftsQuery groupByDescription() Group by the description column
 *
 * @method     ChildShiftsQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildShiftsQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildShiftsQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildShifts findOne(ConnectionInterface $con = null) Return the first ChildShifts matching the query
 * @method     ChildShifts findOneOrCreate(ConnectionInterface $con = null) Return the first ChildShifts matching the query, or a new ChildShifts object populated from the query conditions when no match is found
 *
 * @method     ChildShifts findOneById(int $id) Return the first ChildShifts filtered by the id column
 * @method     ChildShifts findOneByEvent(int $event) Return the first ChildShifts filtered by the event column
 * @method     ChildShifts findOneByStartTime(string $start_time) Return the first ChildShifts filtered by the start_time column
 * @method     ChildShifts findOneByEndTime(string $end_time) Return the first ChildShifts filtered by the end_time column
 * @method     ChildShifts findOneByOpenTo(int $open_to) Return the first ChildShifts filtered by the open_to column
 * @method     ChildShifts findOneByCap(int $cap) Return the first ChildShifts filtered by the cap column
 * @method     ChildShifts findOneByDescription(string $description) Return the first ChildShifts filtered by the description column *

 * @method     ChildShifts requirePk($key, ConnectionInterface $con = null) Return the ChildShifts by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildShifts requireOne(ConnectionInterface $con = null) Return the first ChildShifts matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildShifts requireOneById(int $id) Return the first ChildShifts filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildShifts requireOneByEvent(int $event) Return the first ChildShifts filtered by the event column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildShifts requireOneByStartTime(string $start_time) Return the first ChildShifts filtered by the start_time column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildShifts requireOneByEndTime(string $end_time) Return the first ChildShifts filtered by the end_time column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildShifts requireOneByOpenTo(int $open_to) Return the first ChildShifts filtered by the open_to column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildShifts requireOneByCap(int $cap) Return the first ChildShifts filtered by the cap column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildShifts requireOneByDescription(string $description) Return the first ChildShifts filtered by the description column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildShifts[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildShifts objects based on current ModelCriteria
 * @method     ChildShifts[]|ObjectCollection findById(int $id) Return ChildShifts objects filtered by the id column
 * @method     ChildShifts[]|ObjectCollection findByEvent(int $event) Return ChildShifts objects filtered by the event column
 * @method     ChildShifts[]|ObjectCollection findByStartTime(string $start_time) Return ChildShifts objects filtered by the start_time column
 * @method     ChildShifts[]|ObjectCollection findByEndTime(string $end_time) Return ChildShifts objects filtered by the end_time column
 * @method     ChildShifts[]|ObjectCollection findByOpenTo(int $open_to) Return ChildShifts objects filtered by the open_to column
 * @method     ChildShifts[]|ObjectCollection findByCap(int $cap) Return ChildShifts objects filtered by the cap column
 * @method     ChildShifts[]|ObjectCollection findByDescription(string $description) Return ChildShifts objects filtered by the description column
 * @method     ChildShifts[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class ShiftsQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\ShiftsQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'aphio', $modelName = '\\Shifts', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildShiftsQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildShiftsQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildShiftsQuery) {
            return $criteria;
        }
        $query = new ChildShiftsQuery();
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
     * @return ChildShifts|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ShiftsTableMap::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(ShiftsTableMap::DATABASE_NAME);
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
     * @return ChildShifts A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT `id`, `event`, `start_time`, `end_time`, `open_to`, `cap`, `description` FROM `shifts` WHERE `id` = :p0';
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
            /** @var ChildShifts $obj */
            $obj = new ChildShifts();
            $obj->hydrate($row);
            ShiftsTableMap::addInstanceToPool($obj, (string) $key);
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
     * @return ChildShifts|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildShiftsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ShiftsTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildShiftsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ShiftsTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildShiftsQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(ShiftsTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(ShiftsTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ShiftsTableMap::COL_ID, $id, $comparison);
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
     * @return $this|ChildShiftsQuery The current query, for fluid interface
     */
    public function filterByEvent($event = null, $comparison = null)
    {
        if (is_array($event)) {
            $useMinMax = false;
            if (isset($event['min'])) {
                $this->addUsingAlias(ShiftsTableMap::COL_EVENT, $event['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($event['max'])) {
                $this->addUsingAlias(ShiftsTableMap::COL_EVENT, $event['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ShiftsTableMap::COL_EVENT, $event, $comparison);
    }

    /**
     * Filter the query on the start_time column
     *
     * Example usage:
     * <code>
     * $query->filterByStartTime(1234); // WHERE start_time = 1234
     * $query->filterByStartTime(array(12, 34)); // WHERE start_time IN (12, 34)
     * $query->filterByStartTime(array('min' => 12)); // WHERE start_time > 12
     * </code>
     *
     * @param     mixed $startTime The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildShiftsQuery The current query, for fluid interface
     */
    public function filterByStartTime($startTime = null, $comparison = null)
    {
        if (is_array($startTime)) {
            $useMinMax = false;
            if (isset($startTime['min'])) {
                $this->addUsingAlias(ShiftsTableMap::COL_START_TIME, $startTime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($startTime['max'])) {
                $this->addUsingAlias(ShiftsTableMap::COL_START_TIME, $startTime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ShiftsTableMap::COL_START_TIME, $startTime, $comparison);
    }

    /**
     * Filter the query on the end_time column
     *
     * Example usage:
     * <code>
     * $query->filterByEndTime(1234); // WHERE end_time = 1234
     * $query->filterByEndTime(array(12, 34)); // WHERE end_time IN (12, 34)
     * $query->filterByEndTime(array('min' => 12)); // WHERE end_time > 12
     * </code>
     *
     * @param     mixed $endTime The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildShiftsQuery The current query, for fluid interface
     */
    public function filterByEndTime($endTime = null, $comparison = null)
    {
        if (is_array($endTime)) {
            $useMinMax = false;
            if (isset($endTime['min'])) {
                $this->addUsingAlias(ShiftsTableMap::COL_END_TIME, $endTime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($endTime['max'])) {
                $this->addUsingAlias(ShiftsTableMap::COL_END_TIME, $endTime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ShiftsTableMap::COL_END_TIME, $endTime, $comparison);
    }

    /**
     * Filter the query on the open_to column
     *
     * Example usage:
     * <code>
     * $query->filterByOpenTo(1234); // WHERE open_to = 1234
     * $query->filterByOpenTo(array(12, 34)); // WHERE open_to IN (12, 34)
     * $query->filterByOpenTo(array('min' => 12)); // WHERE open_to > 12
     * </code>
     *
     * @param     mixed $openTo The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildShiftsQuery The current query, for fluid interface
     */
    public function filterByOpenTo($openTo = null, $comparison = null)
    {
        if (is_array($openTo)) {
            $useMinMax = false;
            if (isset($openTo['min'])) {
                $this->addUsingAlias(ShiftsTableMap::COL_OPEN_TO, $openTo['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($openTo['max'])) {
                $this->addUsingAlias(ShiftsTableMap::COL_OPEN_TO, $openTo['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ShiftsTableMap::COL_OPEN_TO, $openTo, $comparison);
    }

    /**
     * Filter the query on the cap column
     *
     * Example usage:
     * <code>
     * $query->filterByCap(1234); // WHERE cap = 1234
     * $query->filterByCap(array(12, 34)); // WHERE cap IN (12, 34)
     * $query->filterByCap(array('min' => 12)); // WHERE cap > 12
     * </code>
     *
     * @param     mixed $cap The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildShiftsQuery The current query, for fluid interface
     */
    public function filterByCap($cap = null, $comparison = null)
    {
        if (is_array($cap)) {
            $useMinMax = false;
            if (isset($cap['min'])) {
                $this->addUsingAlias(ShiftsTableMap::COL_CAP, $cap['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($cap['max'])) {
                $this->addUsingAlias(ShiftsTableMap::COL_CAP, $cap['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ShiftsTableMap::COL_CAP, $cap, $comparison);
    }

    /**
     * Filter the query on the description column
     *
     * Example usage:
     * <code>
     * $query->filterByDescription('fooValue');   // WHERE description = 'fooValue'
     * $query->filterByDescription('%fooValue%'); // WHERE description LIKE '%fooValue%'
     * </code>
     *
     * @param     string $description The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildShiftsQuery The current query, for fluid interface
     */
    public function filterByDescription($description = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($description)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $description)) {
                $description = str_replace('*', '%', $description);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ShiftsTableMap::COL_DESCRIPTION, $description, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildShifts $shifts Object to remove from the list of results
     *
     * @return $this|ChildShiftsQuery The current query, for fluid interface
     */
    public function prune($shifts = null)
    {
        if ($shifts) {
            $this->addUsingAlias(ShiftsTableMap::COL_ID, $shifts->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the shifts table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ShiftsTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            ShiftsTableMap::clearInstancePool();
            ShiftsTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(ShiftsTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(ShiftsTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            ShiftsTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            ShiftsTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // ShiftsQuery
