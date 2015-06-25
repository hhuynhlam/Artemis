<?php

namespace Base;

use \Minutes as ChildMinutes;
use \MinutesQuery as ChildMinutesQuery;
use \Exception;
use Map\MinutesTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\LogicException;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'minutes' table.
 *
 *
 *
 * @method     ChildMinutesQuery orderByDate($order = Criteria::ASC) Order by the date column
 * @method     ChildMinutesQuery orderByDescription($order = Criteria::ASC) Order by the description column
 * @method     ChildMinutesQuery orderByFilename($order = Criteria::ASC) Order by the filename column
 * @method     ChildMinutesQuery orderByUploadedBy($order = Criteria::ASC) Order by the uploaded_by column
 *
 * @method     ChildMinutesQuery groupByDate() Group by the date column
 * @method     ChildMinutesQuery groupByDescription() Group by the description column
 * @method     ChildMinutesQuery groupByFilename() Group by the filename column
 * @method     ChildMinutesQuery groupByUploadedBy() Group by the uploaded_by column
 *
 * @method     ChildMinutesQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildMinutesQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildMinutesQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildMinutes findOne(ConnectionInterface $con = null) Return the first ChildMinutes matching the query
 * @method     ChildMinutes findOneOrCreate(ConnectionInterface $con = null) Return the first ChildMinutes matching the query, or a new ChildMinutes object populated from the query conditions when no match is found
 *
 * @method     ChildMinutes findOneByDate(int $date) Return the first ChildMinutes filtered by the date column
 * @method     ChildMinutes findOneByDescription(string $description) Return the first ChildMinutes filtered by the description column
 * @method     ChildMinutes findOneByFilename(string $filename) Return the first ChildMinutes filtered by the filename column
 * @method     ChildMinutes findOneByUploadedBy(int $uploaded_by) Return the first ChildMinutes filtered by the uploaded_by column *

 * @method     ChildMinutes requirePk($key, ConnectionInterface $con = null) Return the ChildMinutes by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMinutes requireOne(ConnectionInterface $con = null) Return the first ChildMinutes matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildMinutes requireOneByDate(int $date) Return the first ChildMinutes filtered by the date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMinutes requireOneByDescription(string $description) Return the first ChildMinutes filtered by the description column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMinutes requireOneByFilename(string $filename) Return the first ChildMinutes filtered by the filename column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMinutes requireOneByUploadedBy(int $uploaded_by) Return the first ChildMinutes filtered by the uploaded_by column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildMinutes[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildMinutes objects based on current ModelCriteria
 * @method     ChildMinutes[]|ObjectCollection findByDate(int $date) Return ChildMinutes objects filtered by the date column
 * @method     ChildMinutes[]|ObjectCollection findByDescription(string $description) Return ChildMinutes objects filtered by the description column
 * @method     ChildMinutes[]|ObjectCollection findByFilename(string $filename) Return ChildMinutes objects filtered by the filename column
 * @method     ChildMinutes[]|ObjectCollection findByUploadedBy(int $uploaded_by) Return ChildMinutes objects filtered by the uploaded_by column
 * @method     ChildMinutes[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class MinutesQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\MinutesQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'aphio', $modelName = '\\Minutes', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildMinutesQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildMinutesQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildMinutesQuery) {
            return $criteria;
        }
        $query = new ChildMinutesQuery();
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
     * @return ChildMinutes|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        throw new LogicException('The Minutes object has no primary key');
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(array(12, 56), array(832, 123), array(123, 456)), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     ConnectionInterface $con an optional connection object
     *
     * @return ObjectCollection|array|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, ConnectionInterface $con = null)
    {
        throw new LogicException('The Minutes object has no primary key');
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildMinutesQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        throw new LogicException('The Minutes object has no primary key');
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildMinutesQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        throw new LogicException('The Minutes object has no primary key');
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
     * @return $this|ChildMinutesQuery The current query, for fluid interface
     */
    public function filterByDate($date = null, $comparison = null)
    {
        if (is_array($date)) {
            $useMinMax = false;
            if (isset($date['min'])) {
                $this->addUsingAlias(MinutesTableMap::COL_DATE, $date['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($date['max'])) {
                $this->addUsingAlias(MinutesTableMap::COL_DATE, $date['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MinutesTableMap::COL_DATE, $date, $comparison);
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
     * @return $this|ChildMinutesQuery The current query, for fluid interface
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

        return $this->addUsingAlias(MinutesTableMap::COL_DESCRIPTION, $description, $comparison);
    }

    /**
     * Filter the query on the filename column
     *
     * Example usage:
     * <code>
     * $query->filterByFilename('fooValue');   // WHERE filename = 'fooValue'
     * $query->filterByFilename('%fooValue%'); // WHERE filename LIKE '%fooValue%'
     * </code>
     *
     * @param     string $filename The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildMinutesQuery The current query, for fluid interface
     */
    public function filterByFilename($filename = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($filename)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $filename)) {
                $filename = str_replace('*', '%', $filename);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(MinutesTableMap::COL_FILENAME, $filename, $comparison);
    }

    /**
     * Filter the query on the uploaded_by column
     *
     * Example usage:
     * <code>
     * $query->filterByUploadedBy(1234); // WHERE uploaded_by = 1234
     * $query->filterByUploadedBy(array(12, 34)); // WHERE uploaded_by IN (12, 34)
     * $query->filterByUploadedBy(array('min' => 12)); // WHERE uploaded_by > 12
     * </code>
     *
     * @param     mixed $uploadedBy The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildMinutesQuery The current query, for fluid interface
     */
    public function filterByUploadedBy($uploadedBy = null, $comparison = null)
    {
        if (is_array($uploadedBy)) {
            $useMinMax = false;
            if (isset($uploadedBy['min'])) {
                $this->addUsingAlias(MinutesTableMap::COL_UPLOADED_BY, $uploadedBy['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($uploadedBy['max'])) {
                $this->addUsingAlias(MinutesTableMap::COL_UPLOADED_BY, $uploadedBy['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MinutesTableMap::COL_UPLOADED_BY, $uploadedBy, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildMinutes $minutes Object to remove from the list of results
     *
     * @return $this|ChildMinutesQuery The current query, for fluid interface
     */
    public function prune($minutes = null)
    {
        if ($minutes) {
            throw new LogicException('Minutes object has no primary key');

        }

        return $this;
    }

    /**
     * Deletes all rows from the minutes table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(MinutesTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            MinutesTableMap::clearInstancePool();
            MinutesTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(MinutesTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(MinutesTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            MinutesTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            MinutesTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // MinutesQuery
