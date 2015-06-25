<?php

namespace Base;

use \Newsletters as ChildNewsletters;
use \NewslettersQuery as ChildNewslettersQuery;
use \Exception;
use \PDO;
use Map\NewslettersTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'newsletters' table.
 *
 *
 *
 * @method     ChildNewslettersQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildNewslettersQuery orderByTitle($order = Criteria::ASC) Order by the title column
 * @method     ChildNewslettersQuery orderByDate($order = Criteria::ASC) Order by the date column
 * @method     ChildNewslettersQuery orderByTerm($order = Criteria::ASC) Order by the term column
 * @method     ChildNewslettersQuery orderByFilename($order = Criteria::ASC) Order by the filename column
 * @method     ChildNewslettersQuery orderByUploadedBy($order = Criteria::ASC) Order by the uploaded_by column
 *
 * @method     ChildNewslettersQuery groupById() Group by the id column
 * @method     ChildNewslettersQuery groupByTitle() Group by the title column
 * @method     ChildNewslettersQuery groupByDate() Group by the date column
 * @method     ChildNewslettersQuery groupByTerm() Group by the term column
 * @method     ChildNewslettersQuery groupByFilename() Group by the filename column
 * @method     ChildNewslettersQuery groupByUploadedBy() Group by the uploaded_by column
 *
 * @method     ChildNewslettersQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildNewslettersQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildNewslettersQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildNewsletters findOne(ConnectionInterface $con = null) Return the first ChildNewsletters matching the query
 * @method     ChildNewsletters findOneOrCreate(ConnectionInterface $con = null) Return the first ChildNewsletters matching the query, or a new ChildNewsletters object populated from the query conditions when no match is found
 *
 * @method     ChildNewsletters findOneById(int $id) Return the first ChildNewsletters filtered by the id column
 * @method     ChildNewsletters findOneByTitle(string $title) Return the first ChildNewsletters filtered by the title column
 * @method     ChildNewsletters findOneByDate(string $date) Return the first ChildNewsletters filtered by the date column
 * @method     ChildNewsletters findOneByTerm(int $term) Return the first ChildNewsletters filtered by the term column
 * @method     ChildNewsletters findOneByFilename(string $filename) Return the first ChildNewsletters filtered by the filename column
 * @method     ChildNewsletters findOneByUploadedBy(int $uploaded_by) Return the first ChildNewsletters filtered by the uploaded_by column *

 * @method     ChildNewsletters requirePk($key, ConnectionInterface $con = null) Return the ChildNewsletters by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildNewsletters requireOne(ConnectionInterface $con = null) Return the first ChildNewsletters matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildNewsletters requireOneById(int $id) Return the first ChildNewsletters filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildNewsletters requireOneByTitle(string $title) Return the first ChildNewsletters filtered by the title column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildNewsletters requireOneByDate(string $date) Return the first ChildNewsletters filtered by the date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildNewsletters requireOneByTerm(int $term) Return the first ChildNewsletters filtered by the term column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildNewsletters requireOneByFilename(string $filename) Return the first ChildNewsletters filtered by the filename column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildNewsletters requireOneByUploadedBy(int $uploaded_by) Return the first ChildNewsletters filtered by the uploaded_by column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildNewsletters[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildNewsletters objects based on current ModelCriteria
 * @method     ChildNewsletters[]|ObjectCollection findById(int $id) Return ChildNewsletters objects filtered by the id column
 * @method     ChildNewsletters[]|ObjectCollection findByTitle(string $title) Return ChildNewsletters objects filtered by the title column
 * @method     ChildNewsletters[]|ObjectCollection findByDate(string $date) Return ChildNewsletters objects filtered by the date column
 * @method     ChildNewsletters[]|ObjectCollection findByTerm(int $term) Return ChildNewsletters objects filtered by the term column
 * @method     ChildNewsletters[]|ObjectCollection findByFilename(string $filename) Return ChildNewsletters objects filtered by the filename column
 * @method     ChildNewsletters[]|ObjectCollection findByUploadedBy(int $uploaded_by) Return ChildNewsletters objects filtered by the uploaded_by column
 * @method     ChildNewsletters[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class NewslettersQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\NewslettersQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'aphio', $modelName = '\\Newsletters', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildNewslettersQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildNewslettersQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildNewslettersQuery) {
            return $criteria;
        }
        $query = new ChildNewslettersQuery();
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
     * @return ChildNewsletters|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = NewslettersTableMap::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(NewslettersTableMap::DATABASE_NAME);
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
     * @return ChildNewsletters A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, title, date, term, filename, uploaded_by FROM newsletters WHERE id = :p0';
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
            /** @var ChildNewsletters $obj */
            $obj = new ChildNewsletters();
            $obj->hydrate($row);
            NewslettersTableMap::addInstanceToPool($obj, (string) $key);
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
     * @return ChildNewsletters|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildNewslettersQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(NewslettersTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildNewslettersQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(NewslettersTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildNewslettersQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(NewslettersTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(NewslettersTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(NewslettersTableMap::COL_ID, $id, $comparison);
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
     * @return $this|ChildNewslettersQuery The current query, for fluid interface
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

        return $this->addUsingAlias(NewslettersTableMap::COL_TITLE, $title, $comparison);
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
     * @return $this|ChildNewslettersQuery The current query, for fluid interface
     */
    public function filterByDate($date = null, $comparison = null)
    {
        if (is_array($date)) {
            $useMinMax = false;
            if (isset($date['min'])) {
                $this->addUsingAlias(NewslettersTableMap::COL_DATE, $date['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($date['max'])) {
                $this->addUsingAlias(NewslettersTableMap::COL_DATE, $date['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(NewslettersTableMap::COL_DATE, $date, $comparison);
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
     * @return $this|ChildNewslettersQuery The current query, for fluid interface
     */
    public function filterByTerm($term = null, $comparison = null)
    {
        if (is_array($term)) {
            $useMinMax = false;
            if (isset($term['min'])) {
                $this->addUsingAlias(NewslettersTableMap::COL_TERM, $term['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($term['max'])) {
                $this->addUsingAlias(NewslettersTableMap::COL_TERM, $term['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(NewslettersTableMap::COL_TERM, $term, $comparison);
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
     * @return $this|ChildNewslettersQuery The current query, for fluid interface
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

        return $this->addUsingAlias(NewslettersTableMap::COL_FILENAME, $filename, $comparison);
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
     * @return $this|ChildNewslettersQuery The current query, for fluid interface
     */
    public function filterByUploadedBy($uploadedBy = null, $comparison = null)
    {
        if (is_array($uploadedBy)) {
            $useMinMax = false;
            if (isset($uploadedBy['min'])) {
                $this->addUsingAlias(NewslettersTableMap::COL_UPLOADED_BY, $uploadedBy['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($uploadedBy['max'])) {
                $this->addUsingAlias(NewslettersTableMap::COL_UPLOADED_BY, $uploadedBy['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(NewslettersTableMap::COL_UPLOADED_BY, $uploadedBy, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildNewsletters $newsletters Object to remove from the list of results
     *
     * @return $this|ChildNewslettersQuery The current query, for fluid interface
     */
    public function prune($newsletters = null)
    {
        if ($newsletters) {
            $this->addUsingAlias(NewslettersTableMap::COL_ID, $newsletters->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the newsletters table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(NewslettersTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            NewslettersTableMap::clearInstancePool();
            NewslettersTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(NewslettersTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(NewslettersTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            NewslettersTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            NewslettersTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // NewslettersQuery
