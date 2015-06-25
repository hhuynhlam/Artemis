<?php

namespace Base;

use \GalleryImages as ChildGalleryImages;
use \GalleryImagesQuery as ChildGalleryImagesQuery;
use \Exception;
use Map\GalleryImagesTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\LogicException;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'gallery_images' table.
 *
 *
 *
 * @method     ChildGalleryImagesQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildGalleryImagesQuery orderByGallery($order = Criteria::ASC) Order by the gallery column
 * @method     ChildGalleryImagesQuery orderByPostedBy($order = Criteria::ASC) Order by the posted_by column
 * @method     ChildGalleryImagesQuery orderByDescription($order = Criteria::ASC) Order by the description column
 *
 * @method     ChildGalleryImagesQuery groupById() Group by the id column
 * @method     ChildGalleryImagesQuery groupByGallery() Group by the gallery column
 * @method     ChildGalleryImagesQuery groupByPostedBy() Group by the posted_by column
 * @method     ChildGalleryImagesQuery groupByDescription() Group by the description column
 *
 * @method     ChildGalleryImagesQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildGalleryImagesQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildGalleryImagesQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildGalleryImages findOne(ConnectionInterface $con = null) Return the first ChildGalleryImages matching the query
 * @method     ChildGalleryImages findOneOrCreate(ConnectionInterface $con = null) Return the first ChildGalleryImages matching the query, or a new ChildGalleryImages object populated from the query conditions when no match is found
 *
 * @method     ChildGalleryImages findOneById(int $id) Return the first ChildGalleryImages filtered by the id column
 * @method     ChildGalleryImages findOneByGallery(int $gallery) Return the first ChildGalleryImages filtered by the gallery column
 * @method     ChildGalleryImages findOneByPostedBy(int $posted_by) Return the first ChildGalleryImages filtered by the posted_by column
 * @method     ChildGalleryImages findOneByDescription(string $description) Return the first ChildGalleryImages filtered by the description column *

 * @method     ChildGalleryImages requirePk($key, ConnectionInterface $con = null) Return the ChildGalleryImages by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildGalleryImages requireOne(ConnectionInterface $con = null) Return the first ChildGalleryImages matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildGalleryImages requireOneById(int $id) Return the first ChildGalleryImages filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildGalleryImages requireOneByGallery(int $gallery) Return the first ChildGalleryImages filtered by the gallery column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildGalleryImages requireOneByPostedBy(int $posted_by) Return the first ChildGalleryImages filtered by the posted_by column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildGalleryImages requireOneByDescription(string $description) Return the first ChildGalleryImages filtered by the description column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildGalleryImages[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildGalleryImages objects based on current ModelCriteria
 * @method     ChildGalleryImages[]|ObjectCollection findById(int $id) Return ChildGalleryImages objects filtered by the id column
 * @method     ChildGalleryImages[]|ObjectCollection findByGallery(int $gallery) Return ChildGalleryImages objects filtered by the gallery column
 * @method     ChildGalleryImages[]|ObjectCollection findByPostedBy(int $posted_by) Return ChildGalleryImages objects filtered by the posted_by column
 * @method     ChildGalleryImages[]|ObjectCollection findByDescription(string $description) Return ChildGalleryImages objects filtered by the description column
 * @method     ChildGalleryImages[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class GalleryImagesQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\GalleryImagesQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'aphio', $modelName = '\\GalleryImages', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildGalleryImagesQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildGalleryImagesQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildGalleryImagesQuery) {
            return $criteria;
        }
        $query = new ChildGalleryImagesQuery();
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
     * @return ChildGalleryImages|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        throw new LogicException('The GalleryImages object has no primary key');
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
        throw new LogicException('The GalleryImages object has no primary key');
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildGalleryImagesQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        throw new LogicException('The GalleryImages object has no primary key');
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildGalleryImagesQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        throw new LogicException('The GalleryImages object has no primary key');
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
     * @return $this|ChildGalleryImagesQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(GalleryImagesTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(GalleryImagesTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(GalleryImagesTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the gallery column
     *
     * Example usage:
     * <code>
     * $query->filterByGallery(1234); // WHERE gallery = 1234
     * $query->filterByGallery(array(12, 34)); // WHERE gallery IN (12, 34)
     * $query->filterByGallery(array('min' => 12)); // WHERE gallery > 12
     * </code>
     *
     * @param     mixed $gallery The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildGalleryImagesQuery The current query, for fluid interface
     */
    public function filterByGallery($gallery = null, $comparison = null)
    {
        if (is_array($gallery)) {
            $useMinMax = false;
            if (isset($gallery['min'])) {
                $this->addUsingAlias(GalleryImagesTableMap::COL_GALLERY, $gallery['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($gallery['max'])) {
                $this->addUsingAlias(GalleryImagesTableMap::COL_GALLERY, $gallery['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(GalleryImagesTableMap::COL_GALLERY, $gallery, $comparison);
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
     * @return $this|ChildGalleryImagesQuery The current query, for fluid interface
     */
    public function filterByPostedBy($postedBy = null, $comparison = null)
    {
        if (is_array($postedBy)) {
            $useMinMax = false;
            if (isset($postedBy['min'])) {
                $this->addUsingAlias(GalleryImagesTableMap::COL_POSTED_BY, $postedBy['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($postedBy['max'])) {
                $this->addUsingAlias(GalleryImagesTableMap::COL_POSTED_BY, $postedBy['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(GalleryImagesTableMap::COL_POSTED_BY, $postedBy, $comparison);
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
     * @return $this|ChildGalleryImagesQuery The current query, for fluid interface
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

        return $this->addUsingAlias(GalleryImagesTableMap::COL_DESCRIPTION, $description, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildGalleryImages $galleryImages Object to remove from the list of results
     *
     * @return $this|ChildGalleryImagesQuery The current query, for fluid interface
     */
    public function prune($galleryImages = null)
    {
        if ($galleryImages) {
            throw new LogicException('GalleryImages object has no primary key');

        }

        return $this;
    }

    /**
     * Deletes all rows from the gallery_images table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(GalleryImagesTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            GalleryImagesTableMap::clearInstancePool();
            GalleryImagesTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(GalleryImagesTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(GalleryImagesTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            GalleryImagesTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            GalleryImagesTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // GalleryImagesQuery
