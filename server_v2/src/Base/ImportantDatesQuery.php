<?php

namespace Base;

use \ImportantDates as ChildImportantDates;
use \ImportantDatesQuery as ChildImportantDatesQuery;
use \Exception;
use \PDO;
use Map\ImportantDatesTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'important_dates' table.
 *
 *
 *
 * @method     ChildImportantDatesQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildImportantDatesQuery orderByDate($order = Criteria::ASC) Order by the date column
 * @method     ChildImportantDatesQuery orderByTitle($order = Criteria::ASC) Order by the title column
 * @method     ChildImportantDatesQuery orderByDescription($order = Criteria::ASC) Order by the description column
 * @method     ChildImportantDatesQuery orderByPostedBy($order = Criteria::ASC) Order by the posted_by column
 * @method     ChildImportantDatesQuery orderByPermissions($order = Criteria::ASC) Order by the permissions column
 *
 * @method     ChildImportantDatesQuery groupById() Group by the id column
 * @method     ChildImportantDatesQuery groupByDate() Group by the date column
 * @method     ChildImportantDatesQuery groupByTitle() Group by the title column
 * @method     ChildImportantDatesQuery groupByDescription() Group by the description column
 * @method     ChildImportantDatesQuery groupByPostedBy() Group by the posted_by column
 * @method     ChildImportantDatesQuery groupByPermissions() Group by the permissions column
 *
 * @method     ChildImportantDatesQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildImportantDatesQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildImportantDatesQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildImportantDates findOne(ConnectionInterface $con = null) Return the first ChildImportantDates matching the query
 * @method     ChildImportantDates findOneOrCreate(ConnectionInterface $con = null) Return the first ChildImportantDates matching the query, or a new ChildImportantDates object populated from the query conditions when no match is found
 *
 * @method     ChildImportantDates findOneById(int $id) Return the first ChildImportantDates filtered by the id column
 * @method     ChildImportantDates findOneByDate(int $date) Return the first ChildImportantDates filtered by the date column
 * @method     ChildImportantDates findOneByTitle(string $title) Return the first ChildImportantDates filtered by the title column
 * @method     ChildImportantDates findOneByDescription(string $description) Return the first ChildImportantDates filtered by the description column
 * @method     ChildImportantDates findOneByPostedBy(int $posted_by) Return the first ChildImportantDates filtered by the posted_by column
 * @method     ChildImportantDates findOneByPermissions(int $permissions) Return the first ChildImportantDates filtered by the permissions column *

 * @method     ChildImportantDates requirePk($key, ConnectionInterface $con = null) Return the ChildImportantDates by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildImportantDates requireOne(ConnectionInterface $con = null) Return the first ChildImportantDates matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildImportantDates requireOneById(int $id) Return the first ChildImportantDates filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildImportantDates requireOneByDate(int $date) Return the first ChildImportantDates filtered by the date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildImportantDates requireOneByTitle(string $title) Return the first ChildImportantDates filtered by the title column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildImportantDates requireOneByDescription(string $description) Return the first ChildImportantDates filtered by the description column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildImportantDates requireOneByPostedBy(int $posted_by) Return the first ChildImportantDates filtered by the posted_by column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildImportantDates requireOneByPermissions(int $permissions) Return the first ChildImportantDates filtered by the permissions column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildImportantDates[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildImportantDates objects based on current ModelCriteria
 * @method     ChildImportantDates[]|ObjectCollection findById(int $id) Return ChildImportantDates objects filtered by the id column
 * @method     ChildImportantDates[]|ObjectCollection findByDate(int $date) Return ChildImportantDates objects filtered by the date column
 * @method     ChildImportantDates[]|ObjectCollection findByTitle(string $title) Return ChildImportantDates objects filtered by the title column
 * @method     ChildImportantDates[]|ObjectCollection findByDescription(string $description) Return ChildImportantDates objects filtered by the description column
 * @method     ChildImportantDates[]|ObjectCollection findByPostedBy(int $posted_by) Return ChildImportantDates objects filtered by the posted_by column
 * @method     ChildImportantDates[]|ObjectCollection findByPermissions(int $permissions) Return ChildImportantDates objects filtered by the permissions column
 * @method     ChildImportantDates[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class ImportantDatesQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\ImportantDatesQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'aphio', $modelName = '\\ImportantDates', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildImportantDatesQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildImportantDatesQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildImportantDatesQuery) {
            return $criteria;
        }
        $query = new ChildImportantDatesQuery();
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
     * @return ChildImportantDates|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ImportantDatesTableMap::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(ImportantDatesTableMap::DATABASE_NAME);
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
     * @return ChildImportantDates A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT `id`, `date`, `title`, `description`, `posted_by`, `permissions` FROM `important_dates` WHERE `id` = :p0';
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
            /** @var ChildImportantDates $obj */
            $obj = new ChildImportantDates();
            $obj->hydrate($row);
            ImportantDatesTableMap::addInstanceToPool($obj, (string) $key);
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
     * @return ChildImportantDates|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildImportantDatesQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ImportantDatesTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildImportantDatesQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ImportantDatesTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildImportantDatesQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(ImportantDatesTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(ImportantDatesTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ImportantDatesTableMap::COL_ID, $id, $comparison);
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
     * @return $this|ChildImportantDatesQuery The current query, for fluid interface
     */
    public function filterByDate($date = null, $comparison = null)
    {
        if (is_array($date)) {
            $useMinMax = false;
            if (isset($date['min'])) {
                $this->addUsingAlias(ImportantDatesTableMap::COL_DATE, $date['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($date['max'])) {
                $this->addUsingAlias(ImportantDatesTableMap::COL_DATE, $date['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ImportantDatesTableMap::COL_DATE, $date, $comparison);
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
     * @return $this|ChildImportantDatesQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ImportantDatesTableMap::COL_TITLE, $title, $comparison);
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
     * @return $this|ChildImportantDatesQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ImportantDatesTableMap::COL_DESCRIPTION, $description, $comparison);
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
     * @return $this|ChildImportantDatesQuery The current query, for fluid interface
     */
    public function filterByPostedBy($postedBy = null, $comparison = null)
    {
        if (is_array($postedBy)) {
            $useMinMax = false;
            if (isset($postedBy['min'])) {
                $this->addUsingAlias(ImportantDatesTableMap::COL_POSTED_BY, $postedBy['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($postedBy['max'])) {
                $this->addUsingAlias(ImportantDatesTableMap::COL_POSTED_BY, $postedBy['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ImportantDatesTableMap::COL_POSTED_BY, $postedBy, $comparison);
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
     * @return $this|ChildImportantDatesQuery The current query, for fluid interface
     */
    public function filterByPermissions($permissions = null, $comparison = null)
    {
        if (is_array($permissions)) {
            $useMinMax = false;
            if (isset($permissions['min'])) {
                $this->addUsingAlias(ImportantDatesTableMap::COL_PERMISSIONS, $permissions['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($permissions['max'])) {
                $this->addUsingAlias(ImportantDatesTableMap::COL_PERMISSIONS, $permissions['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ImportantDatesTableMap::COL_PERMISSIONS, $permissions, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildImportantDates $importantDates Object to remove from the list of results
     *
     * @return $this|ChildImportantDatesQuery The current query, for fluid interface
     */
    public function prune($importantDates = null)
    {
        if ($importantDates) {
            $this->addUsingAlias(ImportantDatesTableMap::COL_ID, $importantDates->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the important_dates table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ImportantDatesTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            ImportantDatesTableMap::clearInstancePool();
            ImportantDatesTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(ImportantDatesTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(ImportantDatesTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            ImportantDatesTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            ImportantDatesTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // ImportantDatesQuery
