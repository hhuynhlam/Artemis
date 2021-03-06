<?php

namespace Base;

use \MiscCommittee as ChildMiscCommittee;
use \MiscCommitteeQuery as ChildMiscCommitteeQuery;
use \Exception;
use \PDO;
use Map\MiscCommitteeTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'misc_committee' table.
 *
 *
 *
 * @method     ChildMiscCommitteeQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildMiscCommitteeQuery orderByPage($order = Criteria::ASC) Order by the page column
 * @method     ChildMiscCommitteeQuery orderByLink($order = Criteria::ASC) Order by the link column
 * @method     ChildMiscCommitteeQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method     ChildMiscCommitteeQuery orderByDescription($order = Criteria::ASC) Order by the description column
 * @method     ChildMiscCommitteeQuery orderByContent($order = Criteria::ASC) Order by the content column
 * @method     ChildMiscCommitteeQuery orderByLastEdited($order = Criteria::ASC) Order by the last_edited column
 *
 * @method     ChildMiscCommitteeQuery groupById() Group by the id column
 * @method     ChildMiscCommitteeQuery groupByPage() Group by the page column
 * @method     ChildMiscCommitteeQuery groupByLink() Group by the link column
 * @method     ChildMiscCommitteeQuery groupByName() Group by the name column
 * @method     ChildMiscCommitteeQuery groupByDescription() Group by the description column
 * @method     ChildMiscCommitteeQuery groupByContent() Group by the content column
 * @method     ChildMiscCommitteeQuery groupByLastEdited() Group by the last_edited column
 *
 * @method     ChildMiscCommitteeQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildMiscCommitteeQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildMiscCommitteeQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildMiscCommittee findOne(ConnectionInterface $con = null) Return the first ChildMiscCommittee matching the query
 * @method     ChildMiscCommittee findOneOrCreate(ConnectionInterface $con = null) Return the first ChildMiscCommittee matching the query, or a new ChildMiscCommittee object populated from the query conditions when no match is found
 *
 * @method     ChildMiscCommittee findOneById(int $id) Return the first ChildMiscCommittee filtered by the id column
 * @method     ChildMiscCommittee findOneByPage(string $page) Return the first ChildMiscCommittee filtered by the page column
 * @method     ChildMiscCommittee findOneByLink(string $link) Return the first ChildMiscCommittee filtered by the link column
 * @method     ChildMiscCommittee findOneByName(string $name) Return the first ChildMiscCommittee filtered by the name column
 * @method     ChildMiscCommittee findOneByDescription(string $description) Return the first ChildMiscCommittee filtered by the description column
 * @method     ChildMiscCommittee findOneByContent(string $content) Return the first ChildMiscCommittee filtered by the content column
 * @method     ChildMiscCommittee findOneByLastEdited(string $last_edited) Return the first ChildMiscCommittee filtered by the last_edited column *

 * @method     ChildMiscCommittee requirePk($key, ConnectionInterface $con = null) Return the ChildMiscCommittee by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMiscCommittee requireOne(ConnectionInterface $con = null) Return the first ChildMiscCommittee matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildMiscCommittee requireOneById(int $id) Return the first ChildMiscCommittee filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMiscCommittee requireOneByPage(string $page) Return the first ChildMiscCommittee filtered by the page column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMiscCommittee requireOneByLink(string $link) Return the first ChildMiscCommittee filtered by the link column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMiscCommittee requireOneByName(string $name) Return the first ChildMiscCommittee filtered by the name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMiscCommittee requireOneByDescription(string $description) Return the first ChildMiscCommittee filtered by the description column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMiscCommittee requireOneByContent(string $content) Return the first ChildMiscCommittee filtered by the content column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMiscCommittee requireOneByLastEdited(string $last_edited) Return the first ChildMiscCommittee filtered by the last_edited column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildMiscCommittee[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildMiscCommittee objects based on current ModelCriteria
 * @method     ChildMiscCommittee[]|ObjectCollection findById(int $id) Return ChildMiscCommittee objects filtered by the id column
 * @method     ChildMiscCommittee[]|ObjectCollection findByPage(string $page) Return ChildMiscCommittee objects filtered by the page column
 * @method     ChildMiscCommittee[]|ObjectCollection findByLink(string $link) Return ChildMiscCommittee objects filtered by the link column
 * @method     ChildMiscCommittee[]|ObjectCollection findByName(string $name) Return ChildMiscCommittee objects filtered by the name column
 * @method     ChildMiscCommittee[]|ObjectCollection findByDescription(string $description) Return ChildMiscCommittee objects filtered by the description column
 * @method     ChildMiscCommittee[]|ObjectCollection findByContent(string $content) Return ChildMiscCommittee objects filtered by the content column
 * @method     ChildMiscCommittee[]|ObjectCollection findByLastEdited(string $last_edited) Return ChildMiscCommittee objects filtered by the last_edited column
 * @method     ChildMiscCommittee[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class MiscCommitteeQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\MiscCommitteeQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'aphio', $modelName = '\\MiscCommittee', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildMiscCommitteeQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildMiscCommitteeQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildMiscCommitteeQuery) {
            return $criteria;
        }
        $query = new ChildMiscCommitteeQuery();
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
     * @return ChildMiscCommittee|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = MiscCommitteeTableMap::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(MiscCommitteeTableMap::DATABASE_NAME);
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
     * @return ChildMiscCommittee A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT `id`, `page`, `link`, `name`, `description`, `content`, `last_edited` FROM `misc_committee` WHERE `id` = :p0';
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
            /** @var ChildMiscCommittee $obj */
            $obj = new ChildMiscCommittee();
            $obj->hydrate($row);
            MiscCommitteeTableMap::addInstanceToPool($obj, (string) $key);
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
     * @return ChildMiscCommittee|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildMiscCommitteeQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(MiscCommitteeTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildMiscCommitteeQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(MiscCommitteeTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildMiscCommitteeQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(MiscCommitteeTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(MiscCommitteeTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MiscCommitteeTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the page column
     *
     * Example usage:
     * <code>
     * $query->filterByPage('fooValue');   // WHERE page = 'fooValue'
     * $query->filterByPage('%fooValue%'); // WHERE page LIKE '%fooValue%'
     * </code>
     *
     * @param     string $page The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildMiscCommitteeQuery The current query, for fluid interface
     */
    public function filterByPage($page = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($page)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $page)) {
                $page = str_replace('*', '%', $page);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(MiscCommitteeTableMap::COL_PAGE, $page, $comparison);
    }

    /**
     * Filter the query on the link column
     *
     * Example usage:
     * <code>
     * $query->filterByLink('fooValue');   // WHERE link = 'fooValue'
     * $query->filterByLink('%fooValue%'); // WHERE link LIKE '%fooValue%'
     * </code>
     *
     * @param     string $link The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildMiscCommitteeQuery The current query, for fluid interface
     */
    public function filterByLink($link = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($link)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $link)) {
                $link = str_replace('*', '%', $link);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(MiscCommitteeTableMap::COL_LINK, $link, $comparison);
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
     * @return $this|ChildMiscCommitteeQuery The current query, for fluid interface
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

        return $this->addUsingAlias(MiscCommitteeTableMap::COL_NAME, $name, $comparison);
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
     * @return $this|ChildMiscCommitteeQuery The current query, for fluid interface
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

        return $this->addUsingAlias(MiscCommitteeTableMap::COL_DESCRIPTION, $description, $comparison);
    }

    /**
     * Filter the query on the content column
     *
     * Example usage:
     * <code>
     * $query->filterByContent('fooValue');   // WHERE content = 'fooValue'
     * $query->filterByContent('%fooValue%'); // WHERE content LIKE '%fooValue%'
     * </code>
     *
     * @param     string $content The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildMiscCommitteeQuery The current query, for fluid interface
     */
    public function filterByContent($content = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($content)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $content)) {
                $content = str_replace('*', '%', $content);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(MiscCommitteeTableMap::COL_CONTENT, $content, $comparison);
    }

    /**
     * Filter the query on the last_edited column
     *
     * Example usage:
     * <code>
     * $query->filterByLastEdited(1234); // WHERE last_edited = 1234
     * $query->filterByLastEdited(array(12, 34)); // WHERE last_edited IN (12, 34)
     * $query->filterByLastEdited(array('min' => 12)); // WHERE last_edited > 12
     * </code>
     *
     * @param     mixed $lastEdited The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildMiscCommitteeQuery The current query, for fluid interface
     */
    public function filterByLastEdited($lastEdited = null, $comparison = null)
    {
        if (is_array($lastEdited)) {
            $useMinMax = false;
            if (isset($lastEdited['min'])) {
                $this->addUsingAlias(MiscCommitteeTableMap::COL_LAST_EDITED, $lastEdited['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastEdited['max'])) {
                $this->addUsingAlias(MiscCommitteeTableMap::COL_LAST_EDITED, $lastEdited['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MiscCommitteeTableMap::COL_LAST_EDITED, $lastEdited, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildMiscCommittee $miscCommittee Object to remove from the list of results
     *
     * @return $this|ChildMiscCommitteeQuery The current query, for fluid interface
     */
    public function prune($miscCommittee = null)
    {
        if ($miscCommittee) {
            $this->addUsingAlias(MiscCommitteeTableMap::COL_ID, $miscCommittee->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the misc_committee table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(MiscCommitteeTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            MiscCommitteeTableMap::clearInstancePool();
            MiscCommitteeTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(MiscCommitteeTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(MiscCommitteeTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            MiscCommitteeTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            MiscCommitteeTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // MiscCommitteeQuery
