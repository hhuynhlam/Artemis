<?php

namespace Base;

use \GalleryComments as ChildGalleryComments;
use \GalleryCommentsQuery as ChildGalleryCommentsQuery;
use \Exception;
use \PDO;
use Map\GalleryCommentsTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'gallery_comments' table.
 *
 *
 *
 * @method     ChildGalleryCommentsQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildGalleryCommentsQuery orderByImage($order = Criteria::ASC) Order by the image column
 * @method     ChildGalleryCommentsQuery orderByPostedBy($order = Criteria::ASC) Order by the posted_by column
 * @method     ChildGalleryCommentsQuery orderByTime($order = Criteria::ASC) Order by the time column
 * @method     ChildGalleryCommentsQuery orderByComment($order = Criteria::ASC) Order by the comment column
 *
 * @method     ChildGalleryCommentsQuery groupById() Group by the id column
 * @method     ChildGalleryCommentsQuery groupByImage() Group by the image column
 * @method     ChildGalleryCommentsQuery groupByPostedBy() Group by the posted_by column
 * @method     ChildGalleryCommentsQuery groupByTime() Group by the time column
 * @method     ChildGalleryCommentsQuery groupByComment() Group by the comment column
 *
 * @method     ChildGalleryCommentsQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildGalleryCommentsQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildGalleryCommentsQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildGalleryComments findOne(ConnectionInterface $con = null) Return the first ChildGalleryComments matching the query
 * @method     ChildGalleryComments findOneOrCreate(ConnectionInterface $con = null) Return the first ChildGalleryComments matching the query, or a new ChildGalleryComments object populated from the query conditions when no match is found
 *
 * @method     ChildGalleryComments findOneById(int $id) Return the first ChildGalleryComments filtered by the id column
 * @method     ChildGalleryComments findOneByImage(int $image) Return the first ChildGalleryComments filtered by the image column
 * @method     ChildGalleryComments findOneByPostedBy(int $posted_by) Return the first ChildGalleryComments filtered by the posted_by column
 * @method     ChildGalleryComments findOneByTime(int $time) Return the first ChildGalleryComments filtered by the time column
 * @method     ChildGalleryComments findOneByComment(string $comment) Return the first ChildGalleryComments filtered by the comment column *

 * @method     ChildGalleryComments requirePk($key, ConnectionInterface $con = null) Return the ChildGalleryComments by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildGalleryComments requireOne(ConnectionInterface $con = null) Return the first ChildGalleryComments matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildGalleryComments requireOneById(int $id) Return the first ChildGalleryComments filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildGalleryComments requireOneByImage(int $image) Return the first ChildGalleryComments filtered by the image column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildGalleryComments requireOneByPostedBy(int $posted_by) Return the first ChildGalleryComments filtered by the posted_by column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildGalleryComments requireOneByTime(int $time) Return the first ChildGalleryComments filtered by the time column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildGalleryComments requireOneByComment(string $comment) Return the first ChildGalleryComments filtered by the comment column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildGalleryComments[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildGalleryComments objects based on current ModelCriteria
 * @method     ChildGalleryComments[]|ObjectCollection findById(int $id) Return ChildGalleryComments objects filtered by the id column
 * @method     ChildGalleryComments[]|ObjectCollection findByImage(int $image) Return ChildGalleryComments objects filtered by the image column
 * @method     ChildGalleryComments[]|ObjectCollection findByPostedBy(int $posted_by) Return ChildGalleryComments objects filtered by the posted_by column
 * @method     ChildGalleryComments[]|ObjectCollection findByTime(int $time) Return ChildGalleryComments objects filtered by the time column
 * @method     ChildGalleryComments[]|ObjectCollection findByComment(string $comment) Return ChildGalleryComments objects filtered by the comment column
 * @method     ChildGalleryComments[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class GalleryCommentsQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\GalleryCommentsQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'aphio', $modelName = '\\GalleryComments', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildGalleryCommentsQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildGalleryCommentsQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildGalleryCommentsQuery) {
            return $criteria;
        }
        $query = new ChildGalleryCommentsQuery();
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
     * @return ChildGalleryComments|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = GalleryCommentsTableMap::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(GalleryCommentsTableMap::DATABASE_NAME);
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
     * @return ChildGalleryComments A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, image, posted_by, time, comment FROM gallery_comments WHERE id = :p0';
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
            /** @var ChildGalleryComments $obj */
            $obj = new ChildGalleryComments();
            $obj->hydrate($row);
            GalleryCommentsTableMap::addInstanceToPool($obj, (string) $key);
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
     * @return ChildGalleryComments|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildGalleryCommentsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(GalleryCommentsTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildGalleryCommentsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(GalleryCommentsTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildGalleryCommentsQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(GalleryCommentsTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(GalleryCommentsTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(GalleryCommentsTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the image column
     *
     * Example usage:
     * <code>
     * $query->filterByImage(1234); // WHERE image = 1234
     * $query->filterByImage(array(12, 34)); // WHERE image IN (12, 34)
     * $query->filterByImage(array('min' => 12)); // WHERE image > 12
     * </code>
     *
     * @param     mixed $image The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildGalleryCommentsQuery The current query, for fluid interface
     */
    public function filterByImage($image = null, $comparison = null)
    {
        if (is_array($image)) {
            $useMinMax = false;
            if (isset($image['min'])) {
                $this->addUsingAlias(GalleryCommentsTableMap::COL_IMAGE, $image['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($image['max'])) {
                $this->addUsingAlias(GalleryCommentsTableMap::COL_IMAGE, $image['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(GalleryCommentsTableMap::COL_IMAGE, $image, $comparison);
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
     * @return $this|ChildGalleryCommentsQuery The current query, for fluid interface
     */
    public function filterByPostedBy($postedBy = null, $comparison = null)
    {
        if (is_array($postedBy)) {
            $useMinMax = false;
            if (isset($postedBy['min'])) {
                $this->addUsingAlias(GalleryCommentsTableMap::COL_POSTED_BY, $postedBy['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($postedBy['max'])) {
                $this->addUsingAlias(GalleryCommentsTableMap::COL_POSTED_BY, $postedBy['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(GalleryCommentsTableMap::COL_POSTED_BY, $postedBy, $comparison);
    }

    /**
     * Filter the query on the time column
     *
     * Example usage:
     * <code>
     * $query->filterByTime(1234); // WHERE time = 1234
     * $query->filterByTime(array(12, 34)); // WHERE time IN (12, 34)
     * $query->filterByTime(array('min' => 12)); // WHERE time > 12
     * </code>
     *
     * @param     mixed $time The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildGalleryCommentsQuery The current query, for fluid interface
     */
    public function filterByTime($time = null, $comparison = null)
    {
        if (is_array($time)) {
            $useMinMax = false;
            if (isset($time['min'])) {
                $this->addUsingAlias(GalleryCommentsTableMap::COL_TIME, $time['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($time['max'])) {
                $this->addUsingAlias(GalleryCommentsTableMap::COL_TIME, $time['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(GalleryCommentsTableMap::COL_TIME, $time, $comparison);
    }

    /**
     * Filter the query on the comment column
     *
     * Example usage:
     * <code>
     * $query->filterByComment('fooValue');   // WHERE comment = 'fooValue'
     * $query->filterByComment('%fooValue%'); // WHERE comment LIKE '%fooValue%'
     * </code>
     *
     * @param     string $comment The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildGalleryCommentsQuery The current query, for fluid interface
     */
    public function filterByComment($comment = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($comment)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $comment)) {
                $comment = str_replace('*', '%', $comment);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(GalleryCommentsTableMap::COL_COMMENT, $comment, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildGalleryComments $galleryComments Object to remove from the list of results
     *
     * @return $this|ChildGalleryCommentsQuery The current query, for fluid interface
     */
    public function prune($galleryComments = null)
    {
        if ($galleryComments) {
            $this->addUsingAlias(GalleryCommentsTableMap::COL_ID, $galleryComments->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the gallery_comments table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(GalleryCommentsTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            GalleryCommentsTableMap::clearInstancePool();
            GalleryCommentsTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(GalleryCommentsTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(GalleryCommentsTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            GalleryCommentsTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            GalleryCommentsTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // GalleryCommentsQuery
