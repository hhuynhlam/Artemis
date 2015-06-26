<?php

namespace Base;

use \ChatLogs as ChildChatLogs;
use \ChatLogsQuery as ChildChatLogsQuery;
use \Exception;
use \PDO;
use Map\ChatLogsTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'chat_logs' table.
 *
 *
 *
 * @method     ChildChatLogsQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildChatLogsQuery orderByStartTime($order = Criteria::ASC) Order by the start_time column
 * @method     ChildChatLogsQuery orderByTerm($order = Criteria::ASC) Order by the term column
 * @method     ChildChatLogsQuery orderByTitle($order = Criteria::ASC) Order by the title column
 * @method     ChildChatLogsQuery orderByDescription($order = Criteria::ASC) Order by the description column
 * @method     ChildChatLogsQuery orderByLogLocation($order = Criteria::ASC) Order by the log_location column
 * @method     ChildChatLogsQuery orderByStatus($order = Criteria::ASC) Order by the status column
 * @method     ChildChatLogsQuery orderByRestricted($order = Criteria::ASC) Order by the restricted column
 *
 * @method     ChildChatLogsQuery groupById() Group by the id column
 * @method     ChildChatLogsQuery groupByStartTime() Group by the start_time column
 * @method     ChildChatLogsQuery groupByTerm() Group by the term column
 * @method     ChildChatLogsQuery groupByTitle() Group by the title column
 * @method     ChildChatLogsQuery groupByDescription() Group by the description column
 * @method     ChildChatLogsQuery groupByLogLocation() Group by the log_location column
 * @method     ChildChatLogsQuery groupByStatus() Group by the status column
 * @method     ChildChatLogsQuery groupByRestricted() Group by the restricted column
 *
 * @method     ChildChatLogsQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildChatLogsQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildChatLogsQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildChatLogs findOne(ConnectionInterface $con = null) Return the first ChildChatLogs matching the query
 * @method     ChildChatLogs findOneOrCreate(ConnectionInterface $con = null) Return the first ChildChatLogs matching the query, or a new ChildChatLogs object populated from the query conditions when no match is found
 *
 * @method     ChildChatLogs findOneById(int $id) Return the first ChildChatLogs filtered by the id column
 * @method     ChildChatLogs findOneByStartTime(string $start_time) Return the first ChildChatLogs filtered by the start_time column
 * @method     ChildChatLogs findOneByTerm(int $term) Return the first ChildChatLogs filtered by the term column
 * @method     ChildChatLogs findOneByTitle(string $title) Return the first ChildChatLogs filtered by the title column
 * @method     ChildChatLogs findOneByDescription(string $description) Return the first ChildChatLogs filtered by the description column
 * @method     ChildChatLogs findOneByLogLocation(string $log_location) Return the first ChildChatLogs filtered by the log_location column
 * @method     ChildChatLogs findOneByStatus(boolean $status) Return the first ChildChatLogs filtered by the status column
 * @method     ChildChatLogs findOneByRestricted(string $restricted) Return the first ChildChatLogs filtered by the restricted column *

 * @method     ChildChatLogs requirePk($key, ConnectionInterface $con = null) Return the ChildChatLogs by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildChatLogs requireOne(ConnectionInterface $con = null) Return the first ChildChatLogs matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildChatLogs requireOneById(int $id) Return the first ChildChatLogs filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildChatLogs requireOneByStartTime(string $start_time) Return the first ChildChatLogs filtered by the start_time column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildChatLogs requireOneByTerm(int $term) Return the first ChildChatLogs filtered by the term column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildChatLogs requireOneByTitle(string $title) Return the first ChildChatLogs filtered by the title column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildChatLogs requireOneByDescription(string $description) Return the first ChildChatLogs filtered by the description column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildChatLogs requireOneByLogLocation(string $log_location) Return the first ChildChatLogs filtered by the log_location column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildChatLogs requireOneByStatus(boolean $status) Return the first ChildChatLogs filtered by the status column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildChatLogs requireOneByRestricted(string $restricted) Return the first ChildChatLogs filtered by the restricted column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildChatLogs[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildChatLogs objects based on current ModelCriteria
 * @method     ChildChatLogs[]|ObjectCollection findById(int $id) Return ChildChatLogs objects filtered by the id column
 * @method     ChildChatLogs[]|ObjectCollection findByStartTime(string $start_time) Return ChildChatLogs objects filtered by the start_time column
 * @method     ChildChatLogs[]|ObjectCollection findByTerm(int $term) Return ChildChatLogs objects filtered by the term column
 * @method     ChildChatLogs[]|ObjectCollection findByTitle(string $title) Return ChildChatLogs objects filtered by the title column
 * @method     ChildChatLogs[]|ObjectCollection findByDescription(string $description) Return ChildChatLogs objects filtered by the description column
 * @method     ChildChatLogs[]|ObjectCollection findByLogLocation(string $log_location) Return ChildChatLogs objects filtered by the log_location column
 * @method     ChildChatLogs[]|ObjectCollection findByStatus(boolean $status) Return ChildChatLogs objects filtered by the status column
 * @method     ChildChatLogs[]|ObjectCollection findByRestricted(string $restricted) Return ChildChatLogs objects filtered by the restricted column
 * @method     ChildChatLogs[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class ChatLogsQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\ChatLogsQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'aphio', $modelName = '\\ChatLogs', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildChatLogsQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildChatLogsQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildChatLogsQuery) {
            return $criteria;
        }
        $query = new ChildChatLogsQuery();
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
     * @return ChildChatLogs|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ChatLogsTableMap::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(ChatLogsTableMap::DATABASE_NAME);
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
     * @return ChildChatLogs A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT `id`, `start_time`, `term`, `title`, `description`, `log_location`, `status`, `restricted` FROM `chat_logs` WHERE `id` = :p0';
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
            /** @var ChildChatLogs $obj */
            $obj = new ChildChatLogs();
            $obj->hydrate($row);
            ChatLogsTableMap::addInstanceToPool($obj, (string) $key);
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
     * @return ChildChatLogs|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildChatLogsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ChatLogsTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildChatLogsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ChatLogsTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildChatLogsQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(ChatLogsTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(ChatLogsTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ChatLogsTableMap::COL_ID, $id, $comparison);
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
     * @return $this|ChildChatLogsQuery The current query, for fluid interface
     */
    public function filterByStartTime($startTime = null, $comparison = null)
    {
        if (is_array($startTime)) {
            $useMinMax = false;
            if (isset($startTime['min'])) {
                $this->addUsingAlias(ChatLogsTableMap::COL_START_TIME, $startTime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($startTime['max'])) {
                $this->addUsingAlias(ChatLogsTableMap::COL_START_TIME, $startTime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ChatLogsTableMap::COL_START_TIME, $startTime, $comparison);
    }

    /**
     * Filter the query on the term column
     *
     * Example usage:
     * <code>
     * $query->filterByTerm(1234); // WHERE term = 1234
     * $query->filterByTerm(array(12, 34)); // WHERE term IN (12, 34)
     * $query->filterByTerm(array('min' => 12)); // WHERE term > 12
     * </code>
     *
     * @param     mixed $term The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildChatLogsQuery The current query, for fluid interface
     */
    public function filterByTerm($term = null, $comparison = null)
    {
        if (is_array($term)) {
            $useMinMax = false;
            if (isset($term['min'])) {
                $this->addUsingAlias(ChatLogsTableMap::COL_TERM, $term['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($term['max'])) {
                $this->addUsingAlias(ChatLogsTableMap::COL_TERM, $term['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ChatLogsTableMap::COL_TERM, $term, $comparison);
    }

    /**
     * Filter the query on the title column
     *
     * Example usage:
     * <code>
     * $query->filterByTitle('fooValue');   // WHERE title = 'fooValue'
     * $query->filterByTitle('%fooValue%'); // WHERE title LIKE '%fooValue%'
     * </code>
     *
     * @param     string $title The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildChatLogsQuery The current query, for fluid interface
     */
    public function filterByTitle($title = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($title)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $title)) {
                $title = str_replace('*', '%', $title);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ChatLogsTableMap::COL_TITLE, $title, $comparison);
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
     * @return $this|ChildChatLogsQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ChatLogsTableMap::COL_DESCRIPTION, $description, $comparison);
    }

    /**
     * Filter the query on the log_location column
     *
     * Example usage:
     * <code>
     * $query->filterByLogLocation('fooValue');   // WHERE log_location = 'fooValue'
     * $query->filterByLogLocation('%fooValue%'); // WHERE log_location LIKE '%fooValue%'
     * </code>
     *
     * @param     string $logLocation The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildChatLogsQuery The current query, for fluid interface
     */
    public function filterByLogLocation($logLocation = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($logLocation)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $logLocation)) {
                $logLocation = str_replace('*', '%', $logLocation);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ChatLogsTableMap::COL_LOG_LOCATION, $logLocation, $comparison);
    }

    /**
     * Filter the query on the status column
     *
     * Example usage:
     * <code>
     * $query->filterByStatus(true); // WHERE status = true
     * $query->filterByStatus('yes'); // WHERE status = true
     * </code>
     *
     * @param     boolean|string $status The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildChatLogsQuery The current query, for fluid interface
     */
    public function filterByStatus($status = null, $comparison = null)
    {
        if (is_string($status)) {
            $status = in_array(strtolower($status), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(ChatLogsTableMap::COL_STATUS, $status, $comparison);
    }

    /**
     * Filter the query on the restricted column
     *
     * Example usage:
     * <code>
     * $query->filterByRestricted('fooValue');   // WHERE restricted = 'fooValue'
     * $query->filterByRestricted('%fooValue%'); // WHERE restricted LIKE '%fooValue%'
     * </code>
     *
     * @param     string $restricted The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildChatLogsQuery The current query, for fluid interface
     */
    public function filterByRestricted($restricted = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($restricted)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $restricted)) {
                $restricted = str_replace('*', '%', $restricted);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ChatLogsTableMap::COL_RESTRICTED, $restricted, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildChatLogs $chatLogs Object to remove from the list of results
     *
     * @return $this|ChildChatLogsQuery The current query, for fluid interface
     */
    public function prune($chatLogs = null)
    {
        if ($chatLogs) {
            $this->addUsingAlias(ChatLogsTableMap::COL_ID, $chatLogs->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the chat_logs table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ChatLogsTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            ChatLogsTableMap::clearInstancePool();
            ChatLogsTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(ChatLogsTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(ChatLogsTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            ChatLogsTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            ChatLogsTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // ChatLogsQuery
