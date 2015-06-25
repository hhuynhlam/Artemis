<?php

namespace Base;

use \FeedmeBox as ChildFeedmeBox;
use \FeedmeBoxQuery as ChildFeedmeBoxQuery;
use \Exception;
use \PDO;
use Map\FeedmeBoxTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'feedme_box' table.
 *
 *
 *
 * @method     ChildFeedmeBoxQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildFeedmeBoxQuery orderByTopic($order = Criteria::ASC) Order by the topic column
 * @method     ChildFeedmeBoxQuery orderByDate($order = Criteria::ASC) Order by the date column
 * @method     ChildFeedmeBoxQuery orderByMessage($order = Criteria::ASC) Order by the message column
 * @method     ChildFeedmeBoxQuery orderByType($order = Criteria::ASC) Order by the type column
 * @method     ChildFeedmeBoxQuery orderByReadBy($order = Criteria::ASC) Order by the read_by column
 * @method     ChildFeedmeBoxQuery orderByReleasedBy($order = Criteria::ASC) Order by the released_by column
 * @method     ChildFeedmeBoxQuery orderByReply($order = Criteria::ASC) Order by the reply column
 *
 * @method     ChildFeedmeBoxQuery groupById() Group by the id column
 * @method     ChildFeedmeBoxQuery groupByTopic() Group by the topic column
 * @method     ChildFeedmeBoxQuery groupByDate() Group by the date column
 * @method     ChildFeedmeBoxQuery groupByMessage() Group by the message column
 * @method     ChildFeedmeBoxQuery groupByType() Group by the type column
 * @method     ChildFeedmeBoxQuery groupByReadBy() Group by the read_by column
 * @method     ChildFeedmeBoxQuery groupByReleasedBy() Group by the released_by column
 * @method     ChildFeedmeBoxQuery groupByReply() Group by the reply column
 *
 * @method     ChildFeedmeBoxQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildFeedmeBoxQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildFeedmeBoxQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildFeedmeBox findOne(ConnectionInterface $con = null) Return the first ChildFeedmeBox matching the query
 * @method     ChildFeedmeBox findOneOrCreate(ConnectionInterface $con = null) Return the first ChildFeedmeBox matching the query, or a new ChildFeedmeBox object populated from the query conditions when no match is found
 *
 * @method     ChildFeedmeBox findOneById(int $id) Return the first ChildFeedmeBox filtered by the id column
 * @method     ChildFeedmeBox findOneByTopic(string $topic) Return the first ChildFeedmeBox filtered by the topic column
 * @method     ChildFeedmeBox findOneByDate(int $date) Return the first ChildFeedmeBox filtered by the date column
 * @method     ChildFeedmeBox findOneByMessage(string $message) Return the first ChildFeedmeBox filtered by the message column
 * @method     ChildFeedmeBox findOneByType(string $type) Return the first ChildFeedmeBox filtered by the type column
 * @method     ChildFeedmeBox findOneByReadBy(string $read_by) Return the first ChildFeedmeBox filtered by the read_by column
 * @method     ChildFeedmeBox findOneByReleasedBy(int $released_by) Return the first ChildFeedmeBox filtered by the released_by column
 * @method     ChildFeedmeBox findOneByReply(string $reply) Return the first ChildFeedmeBox filtered by the reply column *

 * @method     ChildFeedmeBox requirePk($key, ConnectionInterface $con = null) Return the ChildFeedmeBox by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildFeedmeBox requireOne(ConnectionInterface $con = null) Return the first ChildFeedmeBox matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildFeedmeBox requireOneById(int $id) Return the first ChildFeedmeBox filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildFeedmeBox requireOneByTopic(string $topic) Return the first ChildFeedmeBox filtered by the topic column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildFeedmeBox requireOneByDate(int $date) Return the first ChildFeedmeBox filtered by the date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildFeedmeBox requireOneByMessage(string $message) Return the first ChildFeedmeBox filtered by the message column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildFeedmeBox requireOneByType(string $type) Return the first ChildFeedmeBox filtered by the type column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildFeedmeBox requireOneByReadBy(string $read_by) Return the first ChildFeedmeBox filtered by the read_by column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildFeedmeBox requireOneByReleasedBy(int $released_by) Return the first ChildFeedmeBox filtered by the released_by column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildFeedmeBox requireOneByReply(string $reply) Return the first ChildFeedmeBox filtered by the reply column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildFeedmeBox[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildFeedmeBox objects based on current ModelCriteria
 * @method     ChildFeedmeBox[]|ObjectCollection findById(int $id) Return ChildFeedmeBox objects filtered by the id column
 * @method     ChildFeedmeBox[]|ObjectCollection findByTopic(string $topic) Return ChildFeedmeBox objects filtered by the topic column
 * @method     ChildFeedmeBox[]|ObjectCollection findByDate(int $date) Return ChildFeedmeBox objects filtered by the date column
 * @method     ChildFeedmeBox[]|ObjectCollection findByMessage(string $message) Return ChildFeedmeBox objects filtered by the message column
 * @method     ChildFeedmeBox[]|ObjectCollection findByType(string $type) Return ChildFeedmeBox objects filtered by the type column
 * @method     ChildFeedmeBox[]|ObjectCollection findByReadBy(string $read_by) Return ChildFeedmeBox objects filtered by the read_by column
 * @method     ChildFeedmeBox[]|ObjectCollection findByReleasedBy(int $released_by) Return ChildFeedmeBox objects filtered by the released_by column
 * @method     ChildFeedmeBox[]|ObjectCollection findByReply(string $reply) Return ChildFeedmeBox objects filtered by the reply column
 * @method     ChildFeedmeBox[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class FeedmeBoxQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\FeedmeBoxQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'aphio', $modelName = '\\FeedmeBox', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildFeedmeBoxQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildFeedmeBoxQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildFeedmeBoxQuery) {
            return $criteria;
        }
        $query = new ChildFeedmeBoxQuery();
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
     * @return ChildFeedmeBox|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = FeedmeBoxTableMap::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(FeedmeBoxTableMap::DATABASE_NAME);
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
     * @return ChildFeedmeBox A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, topic, date, message, type, read_by, released_by, reply FROM feedme_box WHERE id = :p0';
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
            /** @var ChildFeedmeBox $obj */
            $obj = new ChildFeedmeBox();
            $obj->hydrate($row);
            FeedmeBoxTableMap::addInstanceToPool($obj, (string) $key);
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
     * @return ChildFeedmeBox|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildFeedmeBoxQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(FeedmeBoxTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildFeedmeBoxQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(FeedmeBoxTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildFeedmeBoxQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(FeedmeBoxTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(FeedmeBoxTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(FeedmeBoxTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the topic column
     *
     * Example usage:
     * <code>
     * $query->filterByTopic('fooValue');   // WHERE topic = 'fooValue'
     * $query->filterByTopic('%fooValue%'); // WHERE topic LIKE '%fooValue%'
     * </code>
     *
     * @param     string $topic The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildFeedmeBoxQuery The current query, for fluid interface
     */
    public function filterByTopic($topic = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($topic)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $topic)) {
                $topic = str_replace('*', '%', $topic);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(FeedmeBoxTableMap::COL_TOPIC, $topic, $comparison);
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
     * @return $this|ChildFeedmeBoxQuery The current query, for fluid interface
     */
    public function filterByDate($date = null, $comparison = null)
    {
        if (is_array($date)) {
            $useMinMax = false;
            if (isset($date['min'])) {
                $this->addUsingAlias(FeedmeBoxTableMap::COL_DATE, $date['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($date['max'])) {
                $this->addUsingAlias(FeedmeBoxTableMap::COL_DATE, $date['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(FeedmeBoxTableMap::COL_DATE, $date, $comparison);
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
     * @return $this|ChildFeedmeBoxQuery The current query, for fluid interface
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

        return $this->addUsingAlias(FeedmeBoxTableMap::COL_MESSAGE, $message, $comparison);
    }

    /**
     * Filter the query on the type column
     *
     * Example usage:
     * <code>
     * $query->filterByType('fooValue');   // WHERE type = 'fooValue'
     * $query->filterByType('%fooValue%'); // WHERE type LIKE '%fooValue%'
     * </code>
     *
     * @param     string $type The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildFeedmeBoxQuery The current query, for fluid interface
     */
    public function filterByType($type = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($type)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $type)) {
                $type = str_replace('*', '%', $type);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(FeedmeBoxTableMap::COL_TYPE, $type, $comparison);
    }

    /**
     * Filter the query on the read_by column
     *
     * Example usage:
     * <code>
     * $query->filterByReadBy('fooValue');   // WHERE read_by = 'fooValue'
     * $query->filterByReadBy('%fooValue%'); // WHERE read_by LIKE '%fooValue%'
     * </code>
     *
     * @param     string $readBy The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildFeedmeBoxQuery The current query, for fluid interface
     */
    public function filterByReadBy($readBy = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($readBy)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $readBy)) {
                $readBy = str_replace('*', '%', $readBy);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(FeedmeBoxTableMap::COL_READ_BY, $readBy, $comparison);
    }

    /**
     * Filter the query on the released_by column
     *
     * Example usage:
     * <code>
     * $query->filterByReleasedBy(1234); // WHERE released_by = 1234
     * $query->filterByReleasedBy(array(12, 34)); // WHERE released_by IN (12, 34)
     * $query->filterByReleasedBy(array('min' => 12)); // WHERE released_by > 12
     * </code>
     *
     * @param     mixed $releasedBy The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildFeedmeBoxQuery The current query, for fluid interface
     */
    public function filterByReleasedBy($releasedBy = null, $comparison = null)
    {
        if (is_array($releasedBy)) {
            $useMinMax = false;
            if (isset($releasedBy['min'])) {
                $this->addUsingAlias(FeedmeBoxTableMap::COL_RELEASED_BY, $releasedBy['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($releasedBy['max'])) {
                $this->addUsingAlias(FeedmeBoxTableMap::COL_RELEASED_BY, $releasedBy['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(FeedmeBoxTableMap::COL_RELEASED_BY, $releasedBy, $comparison);
    }

    /**
     * Filter the query on the reply column
     *
     * Example usage:
     * <code>
     * $query->filterByReply('fooValue');   // WHERE reply = 'fooValue'
     * $query->filterByReply('%fooValue%'); // WHERE reply LIKE '%fooValue%'
     * </code>
     *
     * @param     string $reply The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildFeedmeBoxQuery The current query, for fluid interface
     */
    public function filterByReply($reply = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($reply)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $reply)) {
                $reply = str_replace('*', '%', $reply);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(FeedmeBoxTableMap::COL_REPLY, $reply, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildFeedmeBox $feedmeBox Object to remove from the list of results
     *
     * @return $this|ChildFeedmeBoxQuery The current query, for fluid interface
     */
    public function prune($feedmeBox = null)
    {
        if ($feedmeBox) {
            $this->addUsingAlias(FeedmeBoxTableMap::COL_ID, $feedmeBox->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the feedme_box table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(FeedmeBoxTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            FeedmeBoxTableMap::clearInstancePool();
            FeedmeBoxTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(FeedmeBoxTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(FeedmeBoxTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            FeedmeBoxTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            FeedmeBoxTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // FeedmeBoxQuery
