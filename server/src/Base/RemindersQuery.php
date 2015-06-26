<?php

namespace Base;

use \Reminders as ChildReminders;
use \RemindersQuery as ChildRemindersQuery;
use \Exception;
use \PDO;
use Map\RemindersTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'reminders' table.
 *
 *
 *
 * @method     ChildRemindersQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildRemindersQuery orderByType($order = Criteria::ASC) Order by the type column
 * @method     ChildRemindersQuery orderByDate($order = Criteria::ASC) Order by the date column
 * @method     ChildRemindersQuery orderByMessage($order = Criteria::ASC) Order by the message column
 * @method     ChildRemindersQuery orderByPostedBy($order = Criteria::ASC) Order by the posted_by column
 * @method     ChildRemindersQuery orderByCurrent($order = Criteria::ASC) Order by the current column
 *
 * @method     ChildRemindersQuery groupById() Group by the id column
 * @method     ChildRemindersQuery groupByType() Group by the type column
 * @method     ChildRemindersQuery groupByDate() Group by the date column
 * @method     ChildRemindersQuery groupByMessage() Group by the message column
 * @method     ChildRemindersQuery groupByPostedBy() Group by the posted_by column
 * @method     ChildRemindersQuery groupByCurrent() Group by the current column
 *
 * @method     ChildRemindersQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildRemindersQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildRemindersQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildReminders findOne(ConnectionInterface $con = null) Return the first ChildReminders matching the query
 * @method     ChildReminders findOneOrCreate(ConnectionInterface $con = null) Return the first ChildReminders matching the query, or a new ChildReminders object populated from the query conditions when no match is found
 *
 * @method     ChildReminders findOneById(int $id) Return the first ChildReminders filtered by the id column
 * @method     ChildReminders findOneByType(int $type) Return the first ChildReminders filtered by the type column
 * @method     ChildReminders findOneByDate(string $date) Return the first ChildReminders filtered by the date column
 * @method     ChildReminders findOneByMessage(string $message) Return the first ChildReminders filtered by the message column
 * @method     ChildReminders findOneByPostedBy(int $posted_by) Return the first ChildReminders filtered by the posted_by column
 * @method     ChildReminders findOneByCurrent(boolean $current) Return the first ChildReminders filtered by the current column *

 * @method     ChildReminders requirePk($key, ConnectionInterface $con = null) Return the ChildReminders by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildReminders requireOne(ConnectionInterface $con = null) Return the first ChildReminders matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildReminders requireOneById(int $id) Return the first ChildReminders filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildReminders requireOneByType(int $type) Return the first ChildReminders filtered by the type column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildReminders requireOneByDate(string $date) Return the first ChildReminders filtered by the date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildReminders requireOneByMessage(string $message) Return the first ChildReminders filtered by the message column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildReminders requireOneByPostedBy(int $posted_by) Return the first ChildReminders filtered by the posted_by column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildReminders requireOneByCurrent(boolean $current) Return the first ChildReminders filtered by the current column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildReminders[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildReminders objects based on current ModelCriteria
 * @method     ChildReminders[]|ObjectCollection findById(int $id) Return ChildReminders objects filtered by the id column
 * @method     ChildReminders[]|ObjectCollection findByType(int $type) Return ChildReminders objects filtered by the type column
 * @method     ChildReminders[]|ObjectCollection findByDate(string $date) Return ChildReminders objects filtered by the date column
 * @method     ChildReminders[]|ObjectCollection findByMessage(string $message) Return ChildReminders objects filtered by the message column
 * @method     ChildReminders[]|ObjectCollection findByPostedBy(int $posted_by) Return ChildReminders objects filtered by the posted_by column
 * @method     ChildReminders[]|ObjectCollection findByCurrent(boolean $current) Return ChildReminders objects filtered by the current column
 * @method     ChildReminders[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class RemindersQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\RemindersQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'aphio', $modelName = '\\Reminders', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildRemindersQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildRemindersQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildRemindersQuery) {
            return $criteria;
        }
        $query = new ChildRemindersQuery();
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
     * @return ChildReminders|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = RemindersTableMap::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(RemindersTableMap::DATABASE_NAME);
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
     * @return ChildReminders A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT `id`, `type`, `date`, `message`, `posted_by`, `current` FROM `reminders` WHERE `id` = :p0';
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
            /** @var ChildReminders $obj */
            $obj = new ChildReminders();
            $obj->hydrate($row);
            RemindersTableMap::addInstanceToPool($obj, (string) $key);
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
     * @return ChildReminders|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildRemindersQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(RemindersTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildRemindersQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(RemindersTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildRemindersQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(RemindersTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(RemindersTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RemindersTableMap::COL_ID, $id, $comparison);
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
     * @return $this|ChildRemindersQuery The current query, for fluid interface
     */
    public function filterByType($type = null, $comparison = null)
    {
        if (is_array($type)) {
            $useMinMax = false;
            if (isset($type['min'])) {
                $this->addUsingAlias(RemindersTableMap::COL_TYPE, $type['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($type['max'])) {
                $this->addUsingAlias(RemindersTableMap::COL_TYPE, $type['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RemindersTableMap::COL_TYPE, $type, $comparison);
    }

    /**
     * Filter the query on the date column
     *
     * Example usage:
     * <code>
     * $query->filterByDate(1234); // WHERE date = 1234
     * $query->filterByDate(array(12, 34)); // WHERE date IN (12, 34)
     * $query->filterByDate(array('min' => 12)); // WHERE date > 12
     * </code>
     *
     * @param     mixed $date The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildRemindersQuery The current query, for fluid interface
     */
    public function filterByDate($date = null, $comparison = null)
    {
        if (is_array($date)) {
            $useMinMax = false;
            if (isset($date['min'])) {
                $this->addUsingAlias(RemindersTableMap::COL_DATE, $date['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($date['max'])) {
                $this->addUsingAlias(RemindersTableMap::COL_DATE, $date['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RemindersTableMap::COL_DATE, $date, $comparison);
    }

    /**
     * Filter the query on the message column
     *
     * Example usage:
     * <code>
     * $query->filterByMessage('fooValue');   // WHERE message = 'fooValue'
     * $query->filterByMessage('%fooValue%'); // WHERE message LIKE '%fooValue%'
     * </code>
     *
     * @param     string $message The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildRemindersQuery The current query, for fluid interface
     */
    public function filterByMessage($message = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($message)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $message)) {
                $message = str_replace('*', '%', $message);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(RemindersTableMap::COL_MESSAGE, $message, $comparison);
    }

    /**
     * Filter the query on the posted_by column
     *
     * Example usage:
     * <code>
     * $query->filterByPostedBy(1234); // WHERE posted_by = 1234
     * $query->filterByPostedBy(array(12, 34)); // WHERE posted_by IN (12, 34)
     * $query->filterByPostedBy(array('min' => 12)); // WHERE posted_by > 12
     * </code>
     *
     * @param     mixed $postedBy The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildRemindersQuery The current query, for fluid interface
     */
    public function filterByPostedBy($postedBy = null, $comparison = null)
    {
        if (is_array($postedBy)) {
            $useMinMax = false;
            if (isset($postedBy['min'])) {
                $this->addUsingAlias(RemindersTableMap::COL_POSTED_BY, $postedBy['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($postedBy['max'])) {
                $this->addUsingAlias(RemindersTableMap::COL_POSTED_BY, $postedBy['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RemindersTableMap::COL_POSTED_BY, $postedBy, $comparison);
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
     * @return $this|ChildRemindersQuery The current query, for fluid interface
     */
    public function filterByCurrent($current = null, $comparison = null)
    {
        if (is_string($current)) {
            $current = in_array(strtolower($current), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(RemindersTableMap::COL_CURRENT, $current, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildReminders $reminders Object to remove from the list of results
     *
     * @return $this|ChildRemindersQuery The current query, for fluid interface
     */
    public function prune($reminders = null)
    {
        if ($reminders) {
            $this->addUsingAlias(RemindersTableMap::COL_ID, $reminders->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the reminders table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(RemindersTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            RemindersTableMap::clearInstancePool();
            RemindersTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(RemindersTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(RemindersTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            RemindersTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            RemindersTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // RemindersQuery
